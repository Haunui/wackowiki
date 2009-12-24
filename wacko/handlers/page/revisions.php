<div id="page">
<?php

// redirect to show method if page don't exists
#if (!$this->page) $this->Redirect($this->href("show"));

// deny for comment
if ($this->page["comment_on_id"])
	$this->Redirect($this->href("", $this->GetCommentOnTag($this->page["comment_on_id"]), "show_comments=1")."#".$this->page["tag"]);

if ($this->HasAccess("read"))
{


	// load revisions for this page
	if ($pages = $this->LoadRevisions($this->page["id"]))
	{
		$this->context[++$this->current_context] = "";
		$output .= $this->FormOpen("diff", "", "get");
		$output .= "<p>\n";
		$output .= "<input type=\"submit\" value=\"".$this->GetTranslation("ShowDifferencesButton")."\" />";
		#$output .= "<input type=\"button\" value=\"".$this->GetTranslation("CancelDifferencesButton")."\" onclick=\"document.location='".addslashes($this->href(""))."';\" />\n";
		$output .= "&nbsp;&nbsp;&nbsp;<input type=\"checkbox\" id=\"fastdiff\" name=\"fastdiff\" />\n <label for=\"fastdiff\">".$this->GetTranslation("SimpleDiff")."</label>";
		$output .= "&nbsp;&nbsp;&nbsp;<input type=\"checkbox\" id=\"source\" name=\"source\" />\n <label for=\"source\">".$this->GetTranslation("SourceDiff")."</label>";
		$output .= "&nbsp;&nbsp;&nbsp;<a href=\"".$this->href("revisions.xml")."\"><img src=\"".$this->GetConfigValue("theme_url")."icons/xml.gif"."\" title=\"".$this->GetTranslation("RevisionXMLTip")."\" alt=\"XML\" /></a>";
		$output .= "</p>\n<ul class=\"revisions\">\n";

		if ($_GET["show"] == "all")
			$max = 0;
		else if ($user = $this->GetUser())
		{
			$max = $user["revisioncount"];
		}
		else
		{
			$max = 20;
		}

		$c = 0;
		$t = $a = count($pages);
		foreach ($pages as $page)
		{
			if ($page["edit_note"])
			{
				$edit_note = " <span class=\"editnote\">[".$page["edit_note"]."]</span>";
			}
			else
			{
				$edit_note = "";
			}

			if (++$c <= $max || !$max)
			{
				$output .= "<li>";
				$output .= "".($t--).".";
				$output .= "&nbsp;&nbsp;&nbsp;<input type=\"radio\" name=\"a\" value=\"".($c == 1 ? "-1" : $page["id"])."\" ".($c == 1 ? "checked=\"checked\"" : "")." />";
				$output .= "&nbsp;&nbsp;&nbsp;<input type=\"radio\" name=\"b\" value=\"".($c == 1 ? "-1" : $page["id"])."\" ".($c == 2 ? "checked=\"checked\"" : "")." />";
				$output .= "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"".$this->href("show").($this->GetConfigValue("rewrite_mode") ? "?" : "&amp;")."time=".urlencode($page["time"])."\">".$this->GetTimeStringFormatted($page["time"])."</a>";
				$output .= " � id ".$page["id"]." ";
				$output .= "&nbsp;&nbsp;&nbsp;&nbsp;".$this->GetTranslation("By")." ".($this->IsWikiName($page["user"]) ? $this->Link($page["user"]) : $page["user"])."";
				$output .= "".$edit_note."";
				$output .= "</li>\n";
			}
		}
		$output .= "</ul>\n<br />\n";

		if (!$this->GetConfigValue("revisions_hide_cancel")) $output .= "<input type=\"button\" value=\"".$this->GetTranslation("CancelDifferencesButton")."\" onclick=\"document.location='".addslashes($this->href(""))."';\" />\n";
		$output .= $this->FormClose()."\n";
	}
	print($output);
	$this->current_context--;

	if ($max && $a > $max)
		echo "<a href=\"".$this->href("revisions", "", "show=all")."\">".$this->GetTranslation("RevisionsShowAll")."</a>";
}
else
{
	echo $this->GetTranslation("ReadAccessDenied");
}
?>
</div>
