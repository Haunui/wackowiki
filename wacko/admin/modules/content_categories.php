<?php

if (!defined('IN_WACKO'))
{
	exit;
}

########################################################
##   Pages                                            ##
########################################################

$module['content_categories'] = array(
		'order'	=> 3,
		'cat'	=> 'Content',
		'status'=> false,
		'mode'	=> 'content_categories',
		'name'	=> 'Categories',
		'title'	=> 'Manage categories',
	);

########################################################

function admin_content_categories(&$engine, &$module)
{
	$order = '';
	$error = '';
?>
	<h1><?php echo $module['title']; ?></h1>
	<br />


<?php

}

?>