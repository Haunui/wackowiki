[ === main === ]
	[= l _ =
		<span class="page-properties" title="[ ' language ' ] ([ ' charset ' ])">[ ' lang ' ]</span>
	=]
	<h3>[ ' _t: RenamePage ' ] [ ' page ' ]</h3><br>
	[= m _ =
		<div class="msg warning">[ ' warning ' ]</div>
	=]
	[= f _ =
		[ ' _t: NewName ' ]
		<form action="[ ' href: rename ' ]" method="post" name="rename_page">
			[ ' csrf: rename_page ' ]
			<input type="text" maxlength="250" name="new_tag" value="[ ' tag | e attr ' ]" size="60">
			<br>
			<br>
			<input type="checkbox" id="redirect" name="redirect"[ ' checked ' ]>
			<label for="redirect">[ ' _t: NeedRedirect ' ]</label><br>
			[= global _ =
				<input type="checkbox" id="massrename" name="massrename">
				<label for="massrename">[ ' _t: MassRename ' ]</label>
			=]
			<br>
			<br>
			[ ' backlinks ' ]
			<br>
			[ ' tree ' ]
			<br>
			<br>
			<button type="submit" class="OkBtn" name="submit">[ ' _t: RenameButton ' ]</button> &nbsp;
			<a href="[ ' href: ' ]" class="btn-link">
				<button type="button" class="CancelBtn">[ ' _t: CancelButton ' ]</button>
			</a>
			<br>
			<br>
		</form>
	=]
	[= denied _ =
		<div class="msg info">
			[ ' _t: NotOwnerCantRename ' ]
		</div>
	=]

[ === massLog === ]
<strong>[' mode ']</strong><br><br>
[' log ']

[ === log === ]
<ol>
	[= n _ =
		<li><strong><code>[' h | e ']: </code></strong>
			<ul>
				[= l _ =
					<li>['' message '']</li>
				=]
			</ul>
		</li>
	=]
</ol>
