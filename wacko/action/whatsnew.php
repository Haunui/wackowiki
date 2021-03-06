<?php

if (!defined('IN_WACKO'))
{
	exit;
}

/*
 What's New Action
 Displays a list of all new, deleted, or changed pages, new attachments, and comments.

 {{whatsnew}}

 TODO: per cluster, RSS feed
*/

if (!isset($max))		$max		= null;
if (!isset($noxml))		$noxml		= 0;
if (!isset($printed))	$printed	= [];

if (!$max || $max > 100) $max = 100;

$admin	= $this->is_admin();
$user	= $this->get_user();

// process 'mark read' - reset session time
if (isset($_GET['markread']) && $user == true)
{
	$this->update_last_mark($user);
	$this->set_user_setting('last_mark', date('Y-m-d H:i:s', time()));
	$user = $this->get_user();
}

// loading new pages/comments
$pages1 = $this->db->load_all(
	"SELECT p.page_id, p.owner_id, p.user_id, p.tag, p.created, p.modified, p.title, p.comment_on_id, p.ip, p.created AS date, p.edit_note, p.page_lang, c.page_lang AS cf_lang, c.tag AS comment_on_page, c.title AS title_on_page, user_name, 1 AS ctype, p.deleted " .
	"FROM " . $this->db->table_prefix . "page p " .
		"LEFT JOIN " . $this->db->table_prefix . "page c ON (p.comment_on_id = c.page_id) " .
		"LEFT JOIN " . $this->db->table_prefix . "user u ON (p.user_id = u.user_id) " .
	"WHERE (u.account_type = 0 OR p.user_id = 0) " .
	"ORDER BY p.created DESC " .
	"LIMIT " . ($max * 2), true);

// loading revisions
$pages2 = $this->db->load_all(
	"SELECT p.page_id, p.owner_id, p.user_id, p.tag, p.created, p.modified, p.title, p.comment_on_id, p.ip, p.modified AS date, p.edit_note, p.page_lang, c.page_lang AS cf_lang, c.tag AS comment_on_page, c.title AS title_on_page, user_name, 1 AS ctype, p.deleted " .
	"FROM " . $this->db->table_prefix . "page p " .
		"LEFT JOIN " . $this->db->table_prefix . "page c ON (p.comment_on_id = c.page_id) " .
		"LEFT JOIN " . $this->db->table_prefix . "user u ON (p.user_id = u.user_id) " .
	"WHERE p.comment_on_id = 0 " .
		"AND p.deleted = 0 " .
		"AND (u.account_type = 0 OR p.user_id = 0) " .
	"ORDER BY modified DESC " .
	"LIMIT " . ($max * 2), true);

// loading uloads
$files = $this->db->load_all(
	"SELECT f.page_id, c.owner_id, c.user_id, c.tag, f.uploaded_dt AS created, f.uploaded_dt AS modified, f.file_name AS title, f.file_id AS comment_on_id, f.hits AS ip, f.uploaded_dt AS date, f.file_description AS edit_note, c.page_lang, f.file_lang AS cf_lang, c.tag AS comment_on_page, c.title AS title_on_page, user_name, 2 AS ctype, f.deleted " .
	"FROM " . $this->db->table_prefix . "file f " .
		"LEFT JOIN " . $this->db->table_prefix . "page c ON (f.page_id = c.page_id) " .
		"LEFT JOIN " . $this->db->table_prefix . "user u ON (f.user_id = u.user_id) " .
	"WHERE u.account_type = 0 " .
		"AND f.deleted = 0 " .
	"ORDER BY f.uploaded_dt DESC " .
	"LIMIT " . ($max * 2), true);

if (($pages = array_merge($pages1, $pages2, $files)))
{
	// sort by dates
	$sort_dates = function($a, $b)
	{
		if ($a['date'] == $b['date'])
		{
			return 0;
		}

		return ($a['date'] < $b['date'] ? 1 : -1);
	};

	usort($pages, $sort_dates);

	$count	= 0;

	if ($user == true)
	{
		$tpl->mark_href = $this->href('', '', ['markread' => 1]);
	}

	if (!(int) $noxml)
	{
		$tpl->xml_href = $this->db->base_path . XML_DIR . '/changes_' . preg_replace('/[^a-zA-Z0-9]/', '', mb_strtolower($this->db->site_name)) . '.xml';
	}

	$pagination	= $this->pagination(count($pages), @$max, 'n', '', '');
	$pages		= array_slice($pages, $pagination['offset'], $pagination['perpage']);

	$curday		= '';
	$file_ids	= [];
	$page_ids	= [];

	foreach ($pages as $page)
	{
		// file it is
		if ($page['ctype'] == 2)
		{
			$file_ids[] = $page['comment_on_id'];
		}
		else
		{
			$this->cache_page($page, true);
			$page_ids[] = $page['page_id'];

			// cache page_id for for has_access validation in link function
			$this->page_id_cache[$page['tag']] = $page['page_id'];
		}
	}

	// cache acls
	$this->preload_acl($page_ids);

	if (!empty($file_ids))
	{
		if ($files = $this->db->load_all(
			"SELECT f.file_id, f.page_id, f.user_id, f.file_size, f.picture_w, f.picture_h, f.file_ext, f.file_lang, f.file_name, f.file_description, f.uploaded_dt, f.hits, p.tag, u.user_name " .
			"FROM " . $this->db->table_prefix . "file f " .
				"LEFT JOIN  " . $this->db->table_prefix . "page p ON (f.page_id = p.page_id) " .
				"INNER JOIN " . $this->db->table_prefix . "user u ON (f.user_id = u.user_id) " .
			"WHERE f.file_id IN (" . $this->ids_string($file_ids) . ") "
			))
		{
			foreach ($files as $file)
			{
				$this->file_cache[$file['page_id']][$file['file_name']] = $file;
			}
		}
	}

	$tpl->pagination_text = $pagination['text'];

	$tpl->enter('page_');

	foreach ($pages as $page)
	{
		if ($this->db->hide_locked)
		{
			$access = ($page['comment_on_id'] && $page['ctype'] != 2
				? $this->has_access('read', $page['comment_on_id'])
				: $this->has_access('read', $page['page_id']));
		}
		else
		{
			$access = true;
		}

		if (!isset($printed[$page['tag']]))
		{
			$printed[$page['tag']] = '';
		}

		if ($access && $printed[$page['tag']] != $page['date'] && ($count++ < $max))
		{
			$printed[$page['tag']] = $page['date'];	// ignore duplicates

			$this->sql2datetime($page['date'], $day, $time);

			// day header
			if ($day != $curday)
			{
				$tpl->day = $curday = $day;
			}

			// print entry
			$tpl->l_user		= $this->user_link($page['user_name'], true, false);
			$tpl->l_viewed		= (isset($user['last_mark']) && $user['last_mark']
									&& $page['user_name'] != $user['user_name']
									&& $page['date'] > $user['last_mark']
										? ' class="viewed"'
										: '' );
			$tpl->l_revisions	= ($page['ctype'] != 2 || $page['comment_on_id'] === 0)
									? ($this->hide_revisions
										? $time
										: $this->compose_link_to_page($page['tag'], 'revisions', $time, $this->_t('RevisionTip')))
									: $this->compose_link_to_page($page['tag'], 'filemeta', $time, $this->_t('RevisionTip'), false, ['m' => 'show', 'file_id' => $page['comment_on_id']]);

			if (($edit_note = $page['edit_note']))
			{
				$tpl->l_edit_note = $edit_note;
			}

			// new file
			if ($page['ctype'] == 2)
			{
				preg_match('/^[^\/]+/u', $page['comment_on_page'], $sub_tag);

				if ($page['page_id']) // !$global
				{
					$path2				= '_file:/' . $page['tag'] . '/';
					$tpl->l_to_link		= $this->link('/' . $page['comment_on_page'], '', $page['title_on_page'], '', 0, 1);
					$tpl->l_cluster		= $sub_tag[0];
				}
				else
				{
					$path2				= '_file:/';
					$tpl->l_cluster		= $this->_t('UploadGlobal');
				}

				$tpl->l_title	= $this->_t('NewFileAdded');
				$tpl->l_alt		= 'file';
				$tpl->l_class	= 'btn-attachment';
				$tpl->l_link	= $this->link($path2 . $page['title'], '', $this->shorten_string($page['title']), '', 0, 1);
			}
			// deleted
			else if ($page['deleted'])
			{
				if ($page['comment_on_page'])
				{
					preg_match('/^[^\/]+/u', $page['comment_on_page'], $sub_tag);
				}
				else
				{
					preg_match('/^[^\/]+/u', $page['tag'], $sub_tag);
				}

				$tpl->l_title	= $this->_t('NewCommentAdded');
				$tpl->l_alt		= 'deleted';
				$tpl->l_class	= 'btn-delete';
				$tpl->l_link	= $this->link('/' . $page['tag'], '', $page['title'], '', 0, 1);
				$tpl->l_to_link	= $this->link('/' . $page['comment_on_page'], '', $page['title_on_page'], '', 0, 1);
				$tpl->l_cluster	= $sub_tag[0];
			}
			// new comment
			else if ($page['comment_on_id'])
			{
				preg_match('/^[^\/]+/u', $page['comment_on_page'], $sub_tag);

				$tpl->l_title	= $this->_t('NewCommentAdded');
				$tpl->l_alt		= 'comment';
				$tpl->l_class	= 'btn-comment';
				$tpl->l_link	= $this->link('/' . $page['tag'], '', $page['title'], '', 0, 1);
				$tpl->l_to_link	= $this->link('/' . $page['comment_on_page'], '', $page['title_on_page'], '', 0, 1);
				$tpl->l_cluster	= $sub_tag[0];
			}
			// new page
			else if ($page['created'] == $page['date'])
			{
				preg_match('/^[^\/]+/u', $page['tag'], $sub_tag);

				$tpl->l_title	= $this->_t('NewPageCreated');
				$tpl->l_alt		= 'new';
				$tpl->l_class	= 'btn-add-page';
				$tpl->l_link	= $this->link('/' . $page['tag'], '', $page['title'], '', 0, 1);
				$tpl->l_cluster	= $sub_tag[0];
			}
			// new revision
			else
			{
				preg_match('/^[^\/]+/u', $page['tag'], $sub_tag);

				$tpl->l_title	= $this->_t('NewRevisionAdded');
				$tpl->l_alt		= 'changed';
				$tpl->l_class	= 'btn-edit';
				$tpl->l_link	= $this->link('/' . $page['tag'], '', $page['title'], '', 0, 1);
				$tpl->l_cluster	= $sub_tag[0];
			}
		}
	}

	$tpl->leave();
}
