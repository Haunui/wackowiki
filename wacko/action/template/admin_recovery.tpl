
[ === main === ]
	[= generated =
		<div class="notice">
			'recovery_password' => '[ ' hash |e ' ]',<br /><br />
		</div>
	=]

	<h2>Generate the password hash for your recovery_password</h2>

	<form action="[ ' href ' ]" method="post" name="generate_hash">
		['' csrf: generate_hash '']
		['' autocomplete '']

		<p><label for="password">[ ' _t: RegistrationPassword ' ]:</label>
		<input type="password" id="recovery_password" name="recovery_password" size="24" autocomplete="new-password" value="[ ' password |e attr ' ]" />

		['' complexity | '']
		</p>

		<p><label for="confpassword">[ ' _t: ConfirmPassword ' ]:</label>
		<input type="password" id="confpassword" name="confpassword" size="24" value="[ ' confpassword |e attr ' ]" /></p>

		<input type="submit" name="preview" value="[ ' _t: CreatePageButton ' ]" />
	</form>