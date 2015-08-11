<?php

if (!defined('IN_WACKO'))
{
	exit;
}

?>
<div id="page">
<?php

$is_global		= '';
$message		= '';
$error			= '';
$registered		= '';

// redirect to show method if page don't exists
if (!$this->page)
{
	$this->redirect($this->href('show'));
}

// deny for comment
if ($this->page['comment_on_id'])
{
	$this->redirect($this->href('', $this->get_page_tag($this->page['comment_on_id']), 'show_comments=1').'#'.$this->page['tag']);
}

if ($user = $this->get_user())
{
	$user_name		= strtolower($this->get_user_name());
	$registered		= true;
}
else
{
	$user_name		= GUEST;
}

if ($registered
	&&
	(
	($this->config['upload'] === true) || ($this->config['upload'] == 1) ||
	($this->check_acl($user_name, $this->config['upload']))
	)
	&&
	($this->has_access('upload') && $this->has_access('write') && $this->has_access('read') || $this->is_owner() || $this->is_admin() || (isset($_POST['to']) && $_POST['to'] == 'global'))
	)
{
	if (isset($_GET['remove'])) // show the form
	{
		if ($_GET['remove'] == 'global')
		{
			$page_id = 0;
		}
		else
		{
			$page_id = $this->page['page_id'];
		}

		$file = $this->load_single(
			"SELECT f.user_id, u.user_name, f.upload_id, f.file_name, f.file_size, f.file_description, f.uploaded_dt ".
			"FROM ".$this->config['table_prefix']."upload f ".
				"INNER JOIN ".$this->config['table_prefix']."user u ON (f.user_id = u.user_id) ".
			"WHERE f.page_id = '". $page_id."'".
				"AND f.upload_id ='".(int)$_GET['file_id']."' ".
			"LIMIT 1");

		if (count($file) > 0)
		{
			if ($this->is_admin() || (
				$page_id && (
				$this->page['owner_id'] == $this->get_user_id())) || (
				$file['user_id'] == $this->get_user_id()))
			{
				$message = '<strong>'.$this->get_translation('UploadRemoveConfirm').'</strong>';
				$this->show_message($message, 'info');

				echo $this->form_open('remove_file', 'upload');
				// !!!!! place here a reference to delete files
?>
	<br />
	<ul class="upload">
		<li><?php echo $this->link('file:'.$file['file_name'] ); ?>
			<ul>
				<li><span>&nbsp;</span></li>
				<li><span class="info_title"><?php echo $this->get_translation('UploadBy'); ?>:</span><?php echo '<a href="'.$this->href('', $this->config['users_page'], 'profile='.$file['user_name']).'">'.$file['user_name'].'</a>'; ?></li>
				<li><span class="info_title"><?php echo $this->get_translation('FileAdded'); ?>:</span><?php echo $this->get_time_string_formatted($file['uploaded_dt']); ?></li>
				<li><span class="info_title"><?php echo $this->get_translation('FileSize'); ?>:</span><?php echo '('.$this->binary_multiples($file['file_size'], false, true, true).')'; ?></li>
				<li><span>&nbsp;</span></li>
				<li><span class="info_title"><?php echo $this->get_translation('FileName'); ?>:</span><?php echo $file['file_name']; ?></li>
				<li><span class="info_title"><?php echo $this->get_translation('UploadDesc'); ?>:</span><?php echo $file['file_description']; ?></li>
			</ul>
		</li>
	</ul>
	<br />
	<input type="hidden" name="remove" value="<?php echo $_GET['remove'];?>" />
	<input type="hidden" name="file_id" value="<?php echo $_GET['file_id'];?>" />
	<input class="OkBtn" name="submit" type="submit" value="<?php echo $this->get_translation('RemoveButton'); ?>" />
	&nbsp;
	<a href="<?php echo $this->href();?>" style="text-decoration: none;"><input class="CancelBtn" type="button" value="<?php echo str_replace("\n"," ",$this->get_translation('EditCancelButton')); ?>"/></a>
	<br />
	<br />
<?php
				echo $this->form_close();
			}
			else
			{
				$this->set_message($this->get_translation('UploadRemoveDenied'));
			}
		}
		else
		{
			$message = $this->get_translation('UploadFileNotFound');
			$this->show_message($message, 'info');
		}

		echo '</div>'; // ???
		return true;
	}
	else if (isset($_GET['edit'])) // show the form
	{
		if ($_GET['edit'] == 'global')
		{
			$page_id = 0;
		}
		else
		{
			$page_id = $this->page['page_id'];
		}

		$file = $this->load_single(
			"SELECT f.user_id, u.user_name, f.upload_id, f.file_name, f.file_size, f.file_description, f.uploaded_dt ".
			"FROM ".$this->config['table_prefix']."upload f ".
				"INNER JOIN ".$this->config['table_prefix']."user u ON (f.user_id = u.user_id) ".
			"WHERE f.page_id = '".$page_id."'".
				"AND f.upload_id ='".(int)$_GET['file_id']."' ".
			"LIMIT 1");

		if (count($file) > 0)
		{
			if ($this->is_admin() || (
				$page_id && (
				$this->page['owner_id'] == $this->get_user_id())) || (
				$file['user_id'] == $this->get_user_id()))
			{
				$message = '<strong>'.$this->get_translation('UploadEditConfirm').'</strong>';
				$this->show_message($message, 'info');

				echo $this->form_open('upload_file', 'upload');
				// !!!!! place here a reference to delete files
?>
	<br />
	<ul class="upload">
		<li><?php echo $this->link('file:'.$file['file_name'] ); ?>
			<ul>
				<li><span>&nbsp;</span></li>
				<li><span class="info_title"><?php echo $this->get_translation('UploadBy'); ?>:</span><?php echo '<a href="'.$this->href('', $this->config['users_page'], 'profile='.$file['user_name']).'">'.$file['user_name'].'</a>'; ?></li>
				<li><span class="info_title"><?php echo $this->get_translation('FileAdded'); ?>:</span><?php echo $this->get_time_string_formatted($file['uploaded_dt']); ?></li>
				<li><span class="info_title"><?php echo $this->get_translation('FileSize'); ?>:</span><?php echo '('.$this->binary_multiples($file['file_size'], false, true, true).')'; ?></li>
				<li><span>&nbsp;</span></li>
				<li><span class="info_title"><?php echo $this->get_translation('FileName'); ?>:</span><?php echo $file['file_name']; ?></li>
				<li><span class="info_title"><?php echo $this->get_translation('UploadDesc'); ?>:</span><input name="file_description" id="UploadDesc" type="text" size="80" value="<?php echo $file['file_description']; ?>"/></li>
			</ul>
		</li>
	</ul>
	<br />


	<input type="hidden" name="edit" value="<?php echo $_GET['edit']?>" />
	<input type="hidden" name="file_id" value="<?php echo $_GET['file_id']?>" />
	<input class="OkBtn" name="submit" type="submit" value="<?php echo $this->get_translation('EditStoreButton'); ?>" />
	&nbsp;
	<a href="<?php echo $this->href();?>" style="text-decoration: none;"><input class="CancelBtn" type="button" value="<?php echo str_replace("\n"," ",$this->get_translation('EditCancelButton')); ?>"/></a>
	<br />
	<br />
<?php
				echo $this->form_close();
			}
			else
			{
				$this->set_message($this->get_translation('UploadEditDenied'));
			}
		}
		else
		{
			$message = $this->get_translation('UploadFileNotFound');
			$this->show_message($message, 'info');
		}

		echo '</div>';
		return true;
	}
	else
	{
		if (isset($_POST['remove'])) // delete
		{
			// 1. where, existence
			if ($_POST['remove'] == 'global')
			{
				$page_id = 0;
			}
			else
			{
				$page_id = $this->page['page_id'];
			}

			$file = $this->load_single(
				"SELECT f.user_id, u.user_name, f.upload_id, f.file_name, f.file_size, f.file_description ".
				"FROM ".$this->config['table_prefix']."upload f ".
					"INNER JOIN ".$this->config['table_prefix']."user u ON (f.user_id = u.user_id) ".
				"WHERE f.page_id = '".$page_id."'".
					"AND f.upload_id ='".(int)$_POST['file_id']."' ".
				"LIMIT 1");

			if (count($file) > 0)
			{
				if ($this->is_admin() || (
					$page_id && (
					$this->page['owner_id'] == $this->get_user_id())) || (
					$file['user_id'] == $this->get_user_id()))
				{
					// 2. remove from DB
					$this->sql_query(
						"DELETE FROM ".$this->config['table_prefix']."upload ".
						"WHERE upload_id = '".$file['upload_id']."'" );

					// update user uploads count
					$this->sql_query(
						"UPDATE {$this->config['user_table']} ".
						"SET total_uploads = total_uploads - 1 ".
						"WHERE user_id = '".$file['user_id']."' ".
						"LIMIT 1");

					$message .= $this->get_translation('UploadRemovedFromDB').'<br />';

					// 3. remove from FS
					$real_filename = ($page_id
						? ($this->config['upload_path_per_page'].'/@'.$page_id.'@')
						: ($this->config['upload_path'].'/')).
						$file['file_name'];

					if (@unlink($real_filename))
					{
						$message .= $this->get_translation('UploadRemovedFromFS');
					}
					else
					{
						$message .= '<span class="error">'.$this->get_translation('UploadRemovedFromFSError').'</span>';
					}

					if ($message)
					{
						$this->set_message($message);
					}

					// log event
					$this->log(1, str_replace('%2', $file['file_name'], str_replace('%1', $this->tag.' '.$this->page['title'], $this->get_translation('LogRemovedFile', $this->config['language']))));
				}
				else
				{
					$this->set_message($this->get_translation('UploadRemoveDenied'));
				}
			}
			else
			{
				$this->set_message($this->get_translation('UploadRemoveNotFound')); // TODO: add message set to lang files
			}
		}
		else if (isset($_POST['edit'])) // edit
		{
			// 1. where, existence
			if ($_POST['edit'] == 'global')
			{
				$page_id = 0;
			}
			else
			{
				$page_id = $this->page['page_id'];
			}

			$file = $this->load_single(
				"SELECT f.user_id, u.user_name, f.upload_id, f.file_name, f.file_size, f.file_description ".
				"FROM ".$this->config['table_prefix']."upload f ".
					"INNER JOIN ".$this->config['table_prefix']."user u ON (f.user_id = u.user_id) ".
				"WHERE f.page_id = '".$page_id."'".
					"AND f.upload_id ='".(int)$_POST['file_id']."' ".
				"LIMIT 1");

			if (count($file) > 0)
			{
				if ($this->is_admin() || (
					$page_id && (
					$this->page['owner_id'] == $this->get_user_id())) || (
					$file['user_id'] == $this->get_user_id()))
				{
					$description = substr(quote($this->dblink, $_POST['file_description']), 0, 250);
					$description = rtrim( $description, '\\' );

					// Make HTML in the description redundant
					$description = $this->format($description, 'pre_wacko');
					$description = $this->format($description, 'safehtml');
					$description = htmlspecialchars($description, ENT_COMPAT, $this->get_charset());

					// 2. update file metadata
					$this->sql_query(
						"UPDATE ".$this->config['table_prefix']."upload SET ".
							"lang				= '".quote($this->dblink, $this->page['lang'])."', ".
							"file_description	= '".quote($this->dblink, $description)."' ".
						"WHERE upload_id = '". $file['upload_id']."' ".
						"LIMIT 1");

					$message .= $this->get_translation('UploadEditedMeta')."<br />";

					// 3. TODO: rename file
					#$real_filename = ($page_id
					#	? ($this->config['upload_path_per_page'].'/@'.$page_id.'@')
					#	: ($this->config['upload_path'].'/')).
					#	$file['file_name'];

					#if (@unlink($real_filename))
					#{
					#	$message .= $this->get_translation('UploadRemovedFromFS');
					#}
					#else
					#{
					#	$this->set_message($this->get_translation('UploadRemovedFromFSError'), 'error');
					#}

					if ($message)
					{
						$this->set_message($message);
					}

					// log event
					$this->log(1, str_replace('%2', $file['file_name'], str_replace('%1', $this->tag.' '.$this->page['title'], $this->get_translation('LogUpdatedFileMeta', $this->config['language']))));
				}
				else
				{
					$this->set_message($this->get_translation('UploadEditDenied'));
				}
			}
			else
			{
				$this->set_message($this->get_translation('UploadRemoveNotFound'));
			}
		}
		else // process upload
		{
			$user		= $this->get_user();
			// TODO: Set user used_quota in user table (?)
			$user_files	= $this->load_single(
				"SELECT SUM(file_size) AS used_user_quota ".
				"FROM ".$this->config['table_prefix']."upload ".
				"WHERE user_id = '".$user['user_id']."'".
				"LIMIT 1");
			// TODO: Set used_quota in config table (?)
			$files	= $this->load_single(
				"SELECT SUM(file_size) AS used_quota ".
				"FROM ".$this->config['table_prefix']."upload ".
				"LIMIT 1");

			// Checks
			if (!isset($this->config['upload_path_per_page']))
			{
			}
			if (!isset($this->config['upload_path']))
			{
			}

			// 1. upload quota
			if ( (!$this->config['upload_quota_per_user'] ||
				 ($user_files['used_user_quota'] < $this->config['upload_quota_per_user'] * 1024)) &&
				 (!$this->config['upload_quota'] ||
				 ($files['used_quota'] < $this->config['upload_quota'] * 1024)) )
			{
				if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) // there is file
				{
					// 1. check out $data
					$_data	= explode('.', $_FILES['file']['name']);
					$ext	= $_data[count($_data) - 1];
					unset($_data[count($_data) - 1]);

					// 3. extensions
					$ext	= strtolower($ext);
					$banned	= explode('|', $this->config['upload_banned_exts']);

					if (in_array($ext, $banned))
					{
						$ext = $ext.'.txt';
					}

					$name	= implode('.', $_data);
					$name	= str_replace('@', '_', $name);

					// here would be place for translit
					$name = $this->format($name, 'translit');

					// 1.5. +write @page_id@ to name
					if (isset($_POST['to']) && $_POST['to'] != 'global')
					{
						$name = '@'.$this->page['page_id'].'@'.$name;
					}
					else
					{
						$is_global = 1;
					}

					if ($is_global)
					{
						$dir = $this->config['upload_path'].'/';
					}
					else
					{
						$dir = $this->config['upload_path_per_page'].'/';
					}

					$_name	= $name;
					$count	= 1;

					while (file_exists($dir.$name.'.'.$ext))
					{
						if ($name === $_name)
						{
							$name = $_name.$count;
						}
						else
						{
							$name = $_name.(++$count);
						}
					}

					$result_name	= $name.'.'.$ext;
					$file_size		= $_FILES['file']['size'];

					// 1.6. check filesize, if asked
					$maxfilesize = $this->config['upload_max_size'];

					if (isset($_POST['maxsize']))
					{
						if ($maxfilesize > 1 * $_POST['maxsize'])
						{
							$maxfilesize = 1 * $_POST['maxsize'];
						}
					}

					// Admins can upload unlimited
					if (($file_size < $maxfilesize * 1024) || $this->is_admin())
					{
						// 1.7. check is image, if asked
						$forbid		= 0;
						$size		= array(0, 0);
						$src		= $_FILES['file']['tmp_name'];
						$size		= @getimagesize($src);

						if ($this->config['upload_images_only'])
						{
							if ($size[0] == 0)
							{
								$forbid = 1;
							}
						}

						if (!$forbid)
						{
							// 3. save to permanent location
							move_uploaded_file($_FILES['file']['tmp_name'], $dir.$result_name);
							chmod($dir.$result_name, 0644);

							if ($is_global)
							{
								$small_name = $result_name;
							}
							else
							{
								$small_name = explode('@', $result_name);
								$small_name = $small_name[ count($small_name) -1 ];
							}

							$file_size_kb	= ceil($file_size / 1024);
							$uploaded_dt	= date('Y-m-d H:i:s');

							$description = substr(quote($this->dblink, $_POST['file_description']), 0, 250);
							$description = rtrim( $description, '\\' );

							// Make HTML in the description redundant
							$description = $this->format($description, 'pre_wacko');
							$description = $this->format($description, 'safehtml');
							$description = htmlspecialchars($description, ENT_COMPAT, $this->get_charset());

							// 5. insert line into DB
							$this->sql_query(
								"INSERT INTO ".$this->config['table_prefix']."upload SET ".
									"page_id			= '".($is_global ? "0" : $this->page['page_id'])."', ".
									"user_id			= '".$user['user_id']."',".
									"file_name			= '".quote($this->dblink, $small_name)."', ".
									"lang				= '".quote($this->dblink, $this->page['lang'])."', ".
									"file_description	= '".quote($this->dblink, $description)."', ".
									"file_size			= '".(int)$file_size."',".
									"picture_w			= '".(int)$size[0]."',".
									"picture_h			= '".(int)$size[1]."',".
									"file_ext			= '".quote($this->dblink, substr($ext, 0, 10))."',".
									"uploaded_dt		= '".quote($this->dblink, $uploaded_dt)."' ");

							// update user uploads count
							$this->sql_query(
								"UPDATE {$this->config['user_table']} ".
								"SET total_uploads = total_uploads + 1 ".
								"WHERE user_id = '".$user['user_id']."' ".
								"LIMIT 1");

							// 4. output link to file
							// !!!!! write after providing filelink syntax
							$this->set_message('<strong>'.$this->get_translation('UploadDone').'</strong>');

							// log event
							if ($is_global)
							{
								$this->log(4, str_replace('%3', $file_size_kb, str_replace('%2', $small_name, $this->get_translation('LogFileUploadedGlobal', $this->config['language']))));
							}
							else
							{
								$this->log(4, str_replace('%3', $file_size_kb, str_replace('%2', $small_name, str_replace('%1', $this->page['tag']." ".$this->page['title'], $this->get_translation('LogFileUploadedLocal', $this->config['language'])))));
							}
							?>
		<br />
		<ul class="upload">
			<li><?php echo $this->link('file:'.$small_name); ?>
				<ul>
					<li><span>&nbsp;</span></li>
					<li><span class="info_title"><?php echo $this->get_translation('FileSyntax'); ?>:</span><?php echo '<code>file:'.$small_name.'</code>'; ?></li>
					<li><span class="info_title"><?php echo $this->get_translation('FileAdded'); ?>:</span><?php echo $this->get_time_string_formatted($uploaded_dt); ?></li>
					<li><span class="info_title"><?php echo $this->get_translation('FileSize'); ?>:</span><?php echo '('.$file_size_kb.' '.$this->get_translation('UploadKB').')'; ?></li>
					<li><span>&nbsp;</span></li>
					<li><span class="info_title"><?php echo $this->get_translation('FileName'); ?>:</span><?php echo $small_name; ?></li>
					<li><span class="info_title"><?php echo $this->get_translation('UploadDesc'); ?>:</span><?php echo $description; ?></li>
				</ul>
			</li>
		</ul>
		<br />
	<?php

						}
						else //forbid
						{
							$error = $this->get_translation('UploadNotAPicture');
						}
					}
					else //maxsize
					{
						$error = $this->get_translation('UploadMaxSizeReached');
					}
				} //!is_uploaded_file
				else
				{
					if (isset($_FILES['file']['error']) && ($_FILES['file']['error'] == UPLOAD_ERR_INI_SIZE || $_FILES['file']['error'] == UPLOAD_ERR_FORM_SIZE))
					{
						$error = $this->get_translation('UploadMaxSizeReached');
					}
					else if (isset($_FILES['file']['error']) && ($_FILES['file']['error'] == UPLOAD_ERR_PARTIAL || $_FILES['file']['error'] == UPLOAD_ERR_NO_FILE))
					{
						$error = $this->get_translation('UploadNoFile');
					}
					else
					{
						$error = '';
					}
				}
			}
			else
			{
				// TODO: we use KiB for quota in config -> * 1024 which is error prone
				$error = $this->get_translation('UploadMaxFileQuota').'. <br />Storage in use '.$this->binary_multiples($user_files['used_user_quota'], false, true, true).' ('.round(($user_files['used_user_quota']/($this->config['upload_quota_per_user'] * 1024) * 100), 2).'%) of '.$this->binary_multiples(($this->config['upload_quota_per_user'] * 1024), true, true, true);
				$error .= '<br />'.$this->get_translation('UploadMaxFileQuota').'. <br />Storage in use '.$this->binary_multiples($files['used_quota'], false, true, true).' ('.round(($files['used_quota']/($this->config['upload_quota'] * 1024) * 100), 2).'%) of '.$this->binary_multiples(($this->config['upload_quota'] * 1024), true, true, true);
			}
		}

		if ($error)
		{
			$this->set_message($error, 'error');
		}

		echo $this->action('upload', array()).'<br />';

	// if (!$error) echo '<br /><hr />'.$this->action('upload', array()).'<hr /><br />';
	}
}
else
{
	$this->set_message($this->get_translation('UploadForbidden'));
}

// show uploaded files for current page
if ($this->has_access('read'))
{
	echo $this->action('files', array()).'<br />';
}

if (!$this->config['revisions_hide_cancel'])
{
	echo '<a href="'.$this->href().'" style="text-decoration: none;"><input type="button" value="'.$this->get_translation('CancelDifferencesButton').'" /></a>'."\n";
}

?>
</div>