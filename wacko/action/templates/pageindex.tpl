
[ === main ===]
	[''' pagination ''']
	[= letter _ =
		<ul class="ul_letters">
		[= l _ =
			['' commit | void  // alternation hack '']
				[= active _ =
					<li class="active"><strong>[ ' ch ' ]</strong></li>
				=]
				[= item _ =
					<li><a href="[ ' link | ' ]">[ ' ch ' ]</a></li>
				=]
		=]
		</ul>
		<br /><br />
	=]
	[= nopages _ =
		[ ' _t: NoPagesFound ' ]
	=]
	<ul class="ul_list">
	[= page _ =
		<li><strong>[ ' ch ' ]</strong>
			<ul>
				[= l _ =
					<li>[ ' link | ' ]</li>
				=]
			</ul>
		</li>
	=]
	</ul>
	[''' pagination ''']

[============================== // assorted utilities ==============================]

[= pagination =]
<nav class="pagination">[ ' text | ' ]</nav>