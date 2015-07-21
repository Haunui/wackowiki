<?php

if (!defined('IN_WACKO'))
{
	exit;
}

########################################################
##   System Log                                       ##
########################################################

$module['system_log'] = array(
		'order'	=> 1,
		'cat'	=> 'Basic functions',
		'status'=> true,
		'mode'	=> 'system_log',
		'name'	=> 'System log',
		'title'	=> 'Log system events',
	);

########################################################

function admin_system_log(&$engine, &$module)
{
?>
	<h1><?php echo $module['title']; ?></h1>
<?php
	if (isset($_POST['reset']))
	{
		$engine->redirect(rawurldecode($engine->href('', 'admin.php?mode='.$module['mode'])));
	}

	if (isset($_POST['update']) || isset($_GET['level_mod']))
	{
		$_level_mod	= isset($_POST['level_mod']) ? $_POST['level_mod'] : (isset($_GET['level_mod']) ? $_GET['level_mod'] : '');
		$_level		= isset($_POST['level']) ? (int)$_POST['level'] : (isset($_GET['level']) ? (int)$_GET['level'] : '');

		// level filtering
		switch ($_level_mod)
		{
			case 'not_lower':
				$mod = '<=';
				break;
			case 'not_higher':
				$mod = '>=';
				break;
			case 'equal':
				$mod = '=';
				break;
		}

		$where = "WHERE l.level $mod '".$_level."' ";
	}

	// set time ordering
	if (isset($_GET['order']) && $_GET['order'] == 'time_asc')
	{
		$order		= 'ORDER BY l.log_time ASC ';
		$ordertime	= 'time_desc';
	}
	else if (isset($_GET['order']) && $_GET['order'] == 'time_desc')
	{
		$order		= 'ORDER BY l.log_time DESC ';
		$ordertime	= 'time_asc';
	}
	else
	{
		$ordertime	= 'time_asc';
	}

	// set level ordering
	if (isset($_GET['order']) && $_GET['order'] == 'level_asc')
	{
		$order		= 'ORDER BY l.level DESC ';		// we make level sorting
		$orderlevel	= 'level_desc';					// in reverse orber because
	}												// higher level is denoted
	else if (isset($_GET['order']) && $_GET['order'] == 'level_desc')		// by lower value (e.g.
	{												// 1 = critical, 2 = highest,
		$order		= 'ORDER BY l.level ASC ';		// and so on)
		$orderlevel	= 'level_asc';
	}
	else
	{
		$orderlevel	= 'level_desc';
	}

	// filter by username or user ip
	if (isset($_GET['user_id']))
	{
		$where = "WHERE l.user_id = '".(int)$_GET['user_id']."' ";
	}
	else if (isset($_GET['ip']))
	{
		$where = "WHERE l.ip = '".quote($engine->dblink, $_GET['ip'])."' ";
	}

	// entries to display
	$limit = 100;

	// set default level
	if (!isset($level)) $level = $engine->config['log_default_show'];
	if (!isset($where)) $where = '';
	if (!isset($order)) $order = '';

	// collecting data
	$count = $engine->load_single(
		"SELECT COUNT(log_id) AS n ".
		"FROM {$engine->config['table_prefix']}log l ".
		( $where ? $where : 'WHERE level <= '.(int)$level.' ' ));

	$order_pagination		= isset($_GET['order'])		? $_GET['order']		: '';
	$level_pagination		= isset($_GET['level'])		? $_GET['level']		: (isset($_POST['level'])		? $_POST['level']		: '');
	$level_mod_pagination	= isset($_GET['level_mod'])	? $_GET['level_mod']	: (isset($_POST['level_mod'])	? $_POST['level_mod']	: '');
	$pagination				= $engine->pagination($count['n'], $limit, 'p', 'mode=system_log'.(!empty($order_pagination) ? '&order='.htmlspecialchars($order_pagination, ENT_COMPAT | ENT_HTML401, HTML_ENTITIES_CHARSET) : '').(!empty($level_pagination) ? '&level='.htmlspecialchars($level_pagination, ENT_COMPAT | ENT_HTML401, HTML_ENTITIES_CHARSET) : '').(!empty($level_mod_pagination) ? '&level_mod='.htmlspecialchars($level_mod_pagination, ENT_COMPAT | ENT_HTML401, HTML_ENTITIES_CHARSET) : ''), '', 'admin.php');

	$log = $engine->load_all(
		"SELECT l.log_id, l.log_time, l.level, l.user_id, l.message, u.user_name, l.ip ".
		"FROM {$engine->config['table_prefix']}log l ".
			"LEFT JOIN {$engine->config['table_prefix']}user u ON (l.user_id = u.user_id) ".
		( $where ? $where : 'WHERE l.level <= '.(int)$level.' ' ).
		( $order ? $order : 'ORDER BY l.log_id DESC ' ).
		"LIMIT {$pagination['offset']}, $limit");

	echo $engine->form_open('systemlog', '', 'post', true, '', '');

?>
		<div>
			<h4><?php echo $engine->get_translation('LogFilterTip'); ?>:</h4><br />
			<?php echo $engine->get_translation('LogLevel'); ?>
			<select name="level_mod">
				<option value="not_lower"<?php echo ( !isset($_POST['level_mod']) || (isset($_POST['level_mod']) && $_POST['level_mod'] == 'not_lower') ? ' selected="selected"' : '' ); ?>><?php echo $engine->get_translation('LogLevelNotLower'); ?></option>
				<option value="not_higher"<?php echo ( isset($_POST['level_mod']) && $_POST['level_mod'] == 'not_higher' ? ' selected="selected"' : '' ); ?>><?php echo $engine->get_translation('LogLevelNotHigher'); ?></option>
				<option value="equal"<?php echo ( isset($_POST['level_mod']) && $_POST['level_mod'] == 'equal' ? ' selected="selected"' : '' ); ?>><?php echo $engine->get_translation('LogLevelEqual'); ?></option>
			</select>
			<select name="level">
<?php
	for ($i = 1; $i <= 7; $i++)
	{
		echo '<option value="'.$i.'"'.( (!isset($_POST['level']) && $level == $i) || (isset($_POST['level']) && $_POST['level'] == $i) ? ' selected="selected"' : '' ).'>'.strtolower($engine->get_translation('LogLevel'.$i)).'</option>'."\n";
	}
?>
			</select>

			<input name="update" id="submit" type="submit" value="update" />
			<input name="reset" id="submit" type="submit" value="reset" />
		</div>
<?php
		if (isset($pagination['text']))
		{
			echo '<div class="right">'.( $pagination['text'] == true ? '<small>'.$pagination['text'].'</small>' : '&nbsp;' ).'</div>'."\n";
		}
?>
		<table style="padding: 3px;" class="formation">
			<tr>
				<th style="width:5px;">ID</th>
				<th style="width:20px;"><a href="?mode=system_log&order=<?php echo $ordertime;  ?>"><?php echo $engine->get_translation('LogDate'); ?></a></th>
				<th style="width:20px;"><a href="?mode=system_log&order=<?php echo $orderlevel; ?>"><?php echo $engine->get_translation('LogLevel'); ?></a></th>
				<th><?php echo $engine->get_translation('LogEvent'); ?></th>
				<th style="width:20px;"><?php echo $engine->get_translation('LogUsername'); ?></th>
			</tr>
<?php
	if ($log)
	{
		foreach ($log as $row)
		{
			// level highlighting
			if ($row['level'] == 1)
			{
				$row['level'] = '<strong class="red">'.$engine->get_translation('LogLevel1').'</strong>';
			}
			else if ($row['level'] == 2)
			{
				$row['level'] = '<span class="red">'.$engine->get_translation('LogLevel2').'</span>';
			}
			else if ($row['level'] == 3)
			{
				$row['level'] = '<strong>'.$engine->get_translation('LogLevel3').'</strong>';
			}
			else if ($row['level'] == 4)
			{
				$row['level'] = $engine->get_translation('LogLevel'.$row['level']);
			}
			else if ($row['level'] == 5)
			{
				$row['level'] = '<small>'.$engine->get_translation('LogLevel'.$row['level']).'</small>';
			}
			else if ($row['level'] > 5)
			{
				$row['level'] = '<small class="grey">'.$engine->get_translation('LogLevel'.$row['level']).'</small>';
			}

			// tz offset
			$time_tz = $engine->get_time_tz( strtotime($row['log_time']) );
			$time_tz = date($engine->config['date_precise_format'], $time_tz);

			echo '<tr class="lined">'."\n".
					'<td style="vertical-align:top; text-align:center;">'.$row['log_id'].'</td>'.
					'<td style="vertical-align:top; text-align:center;"><small>'.$time_tz.'</small></td>'.
					'<td style="vertical-align:top; text-align:center; padding-left:5px; padding-right:5px;">'.$row['level'].'</td>'.
					'<td style="vertical-align:top;">'.$engine->format($row['message'], 'post_wacko').'</td>'.
					'<td style="vertical-align:top; text-align:center;"><small>'.
						'<a href="?mode=system_log&user_id='.$row['user_id'].'">'.( $row['user_id'] == 0 ? '<em>'.$engine->get_translation('Guest').'</em>' : $row['user_name'] ).'</a>'.
						'<br />'.'<a href="?mode=system_log&ip='.$row['ip'].'">'.$row['ip'].'</a>'.
					'</small></td>'.
				'</tr>';
		}
	}
	else
	{
		echo '<tr><td colspan="5" style="text-align:center;"><br /><em>'.$engine->get_translation('LogNoMatch').'</em></td></tr>';
	}
?>
		</table>
		<?php
		if (isset($pagination['text']))
		{
			echo '<div class="right">'.( $pagination['text'] == true ? '<small>'.$pagination['text'].'</small>' : '' ).'</div>'."\n";
		}

	echo $engine->form_close();
}

?>