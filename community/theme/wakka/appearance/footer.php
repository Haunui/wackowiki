<?php

/*
 Default theme.
 Common footer file.
 */

?>
</div>
<div id="footer">
<div class="footer">
<div class="footerlist">
<ul>
<?php
// If User has rights to edit page, show Edit link
echo ($this->has_access('write') && ($this->method != 'edit')) ? '<li><a href="'.$this->href('edit').'" accesskey="E" title="'.$this->get_translation('EditTip').'">'.$this->get_translation('EditText')."</a></li>\n" : '';

// If this page exists
if ($this->page)
{
	if ($this->has_access('read'))
	{
		// Revisions link
		echo (( $this->hide_revisions === false || $this->is_admin() )
				? "<li><a href=\"".$this->href('revisions')."\" title=\"".$this->get_translation('RevisionTip')."\">".$this->get_time_formatted($this->page['modified'])."</a></li>\n"
				: "<li>".$this->get_time_formatted($this->page['modified'])."</li>\n"
			);
		// If owner is current user
		if ($this->is_owner())
		{
			echo "<li>".$this->get_translation('YouAreOwner')."</li>\n";

			// Add page link
			(($this->method == 'new')
				? ""
				: print("<li><a href=\"".$this->href('new')."\"><img src=\"".$this->config['theme_url']."icon/add_page.png\" title=\"".$this->get_translation('CreateNewPageTip')."\" alt=\"".$this->get_translation('CreateNewPageTip')."\" /></a></li>\n")
			);

			// Rename link
			print("<li><a href=\"".$this->href('rename')."\"><img src=\"".$this->config['theme_url']."icon/rename.png\" title=\"".$this->get_translation('RenameText')."\" alt=\"".$this->get_translation('RenameText')."\" /></a></li>\n");

			// Remove link (shows only for page owner if allowed)
			if (!$this->config['remove_onlyadmins']) print("<li><a href=\"".$this->href('remove')."\"><img src=\"".$this->config['theme_url']."icon/delete_page.png\" title=\"".$this->get_translation('DeleteTip')."\" alt=\"".$this->get_translation('DeleteText')."\" /></a></li>\n");

			//Edit ACLs link
			print("<li><a href=\"".$this->href('permissions')."\"".(($this->method=='edit')?" onclick=\"return window.confirm('".$this->get_translation('EditACLConfirm')."');\"":"").">".$this->get_translation('ACLText')."</a></li>\n");
		}
		// If owner is NOT current user
		else
		{
			// Show Owner of this page
			if ($owner = $this->get_page_owner())
			{
				if ($owner == 'System')
				{
					echo "<li>".$this->get_translation('Owner').": ".$owner."</li>\n";
				}
				else
				{
					echo "<li>".$this->get_translation('Owner').": ".$this->user_link($owner, $lang = '', true, false)."</li>\n";
				}
			}
			else if (!$this->page['comment_on_id'])
			{
				print("<li>".$this->get_translation('Nobody').($this->get_user() ? " (<a href=\"".$this->href('claim')."\">".$this->get_translation('TakeOwnership')."</a></li>\n)" : ""));
			}

			// Add page link
			(($this->method == 'new')
				? ""
				: print("<li><a href=\"".$this->href('new')."\"><img src=\"".$this->config['theme_url']."icon/add_page.png\" title=\"".$this->get_translation('CreateNewPageTip')."\" alt=\"".$this->get_translation('CreateNewPageTip')."\" /></a></li>\n")
			);
		}

		// Rename link
		if ($this->check_acl($this->get_user_name(),$this->config['rename_globalacl']) && !$this->is_owner())
		{
			print("<li><a href=\"".$this->href('rename')."\"><img src=\"".$this->config['theme_url']."icon/rename.png\" title=\"".$this->get_translation('RenameText')."\" alt=\"".$this->get_translation('RenameText')."\" /></a></li>\n");
		}
		// Remove link (shows only for Admins)
		if ($this->is_admin() && !$this->is_owner())
		{
			print("<li><a href=\"".$this->href('remove')."\"><img src=\"".$this->config['theme_url']."icon/delete_page.png\" title=\"".$this->get_translation('DeleteTip')."\" alt=\"".$this->get_translation('DeleteText')."\" /></a></li>\n");

			// Edit ACLs link (shows also for Admins)
			print("<li><a href=\"".$this->href('permissions')."\"".(($this->method=='edit')?" onclick=\"return window.confirm('".$this->get_translation('EditACLConfirm')."');\"":"").">".$this->get_translation('ACLText')."</a></li>\n");
		}

		if($this->has_access('write') && $this->get_user() || $this->is_admin())
		{
			// Page  settings link
			print("<li><a href=\"".$this->href('properties'). "\"".(($this->method=='edit')?" onclick=\"return window.confirm('".$this->get_translation('EditPropertiesConfirm')."');\"":"").">".$this->get_translation('PropertiesText')."</a></li>\n");

			// referrers icon
			print("<li><a href=\"".$this->href('referrers')."\"><img src=\"".$this->config['theme_url']."icon/referrer.png\" title=\"".$this->get_translation('ReferrersTip')."\" alt=\"".$this->get_translation('ReferrersText')."\" /></a></li>\n");
		}

		if ($this->get_user())
		{
			// Watch/Unwatch icon
			echo ($this->is_watched === true ? "<li><a href=\"".$this->href('watch')."\"><img src=\"".$this->config['theme_url']."icon/unwatch.png\" title=\"".$this->get_translation('RemoveWatch')."\" alt=\"".$this->get_translation('RemoveWatch')."\"  /></a></li>\n" : "<li><a href=\"".$this->href('watch')."\"><img src=\"".$this->config['theme_url']."icon/watch.png\" title=\"".$this->get_translation('SetWatch')."\" alt=\"".$this->get_translation('SetWatch')."\" /></a></li>\n");
		}

		// Print icon
		echo"<li><a href=\"".$this->href('print')."\"><img src=\"".$this->config['theme_url']."icon/print.png\" title=\"".$this->get_translation('PrintVersion')."\" alt=\"".$this->get_translation('PrintVersion')."\" /></a></li>\n";
	}
}

?>
</ul>
</div>
</div>
<div id="credits"><?php
if ($this->get_user())
{
	echo $this->get_translation('PoweredBy').' '.$this->link('WackoWiki:HomePage', '', 'WackoWiki');
}
?></div>
</div>
</div>
<?php

// Don't place final </body></html> here. Wacko closes HTML automatically.
?>