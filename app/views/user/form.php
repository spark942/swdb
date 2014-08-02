<div id="logo">
	<section id="welcome">
		<h1>Welcome to swdb.ws</h1>
		<h2>Summoners War Database</h2>

		<p>This project is made by fans for fans.</p>
		<p>We want to give you the best tool to improve your gaming experience.</p>

	</section>
	<section id="userforms">
		<section class="userform" id="signup">
			<h2>Sign up</h2>
			<?php
				if (isset($data['signup']['error'])){
					echo $data['signup']['error'];
				}
			?>
			<form action="../../../../../signup" method="post">
				<input id="su-email" type="text" name="email" placeholder="Email" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" maxlength="99">
				<span id="su-email-result" class="formvalid"></span><br />
				<input id="su-username" type="text" name="username" placeholder="Username" pattern="^(?=.{3,15}$)[a-zA-Z][a-zA-Z0-9]*(?:[ _.-][a-zA-Z0-9]+)*$"  maxlength="15">
				<span id="su-username-result" class="formvalid">3 to 15 chars</span><br />
				<input id="su-password" type="password" name="password" placeholder="Password" pattern="^.{6,32}$" maxlength="32"><br />
				<input id="su-password2" type="password" name="password2" placeholder="Confirm Password" pattern="^.{6,32}$" maxlength="32">
				<span id="su-match-password" class="formvalid">6 to 32 chars</span><br />
				<input type="submit" name="submit" value="Sign up">
			</form>
			<br />
			<h3>Why sign up?</h3>
			<p>Share your experience and your knowledge with other summoners</p>
		</section>
		<section class="userform" id="signin">
			<h2>Sign in</h2>
			<?php
				if (isset($data['signin']['error'])){
					echo $data['signin']['error'];
				}
			?>
			<form action="../../../../../signin" method="post">
				<input type="text" name="email" placeholder="Email" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$"><br />
				<input type="password" name="password" placeholder="Password"><br />
				<input type="submit" name="submit" value="Sign in">
			</form>
			<br />
			<h3>What can I do?</h3>
			<p>Create rune set for monsters and vote the others set</p>
		</section>
	</section>
</div>
