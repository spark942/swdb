</div>



<footer>
	<?php 
		if (isset($_SESSION['USER'])) {
			?>
			<nav id="userbar">
				<ul>
					<li id="username"><?php echo $_SESSION['USER']['username']; ?></li>
					<li></li>
					<li id="level">LV <?php echo $_SESSION['USER']['STAT']['level']; ?></li>
					<li id="userexp">
						<progress max="<?php echo $_SESSION['USER']['STAT']['maxexp']; ?>" value="<?php echo $_SESSION['USER']['STAT']['exp']; ?>"></progress>
						<div class="user_expnumber"><?php echo $_SESSION['USER']['STAT']['exp']; ?> / <?php echo $_SESSION['USER']['STAT']['maxexp']; ?></div>
					</li>
					<li id="pollstone">
						<span><?php echo $_SESSION['USER']['STAT']['pollstone']; ?></span> <i class="fa fa-ge"></i>
						<div class="user_tooltip">
							<h2>What is Pollstone <i class="fa fa-ge"></i> ? </h2>
							<p>You need Pollstone to vote rune combination submitted by other summoners,  monster rankings, and guides.</p>
						</div>
					</li>
					<li id="reputation">
						<span><?php echo $_SESSION['USER']['STAT']['reputation']; ?></span> <i class="fa fa-star"></i>
						<div class="user_tooltip">
							<h2>What is Reputation <i class="fa fa-star"></i> ? </h2>
							<p>You get Reputation Point when other summoners vote for your submissions (rune combination, guides).</p>
						</div>
					</li>
				</ul>
			</nav>
			<?php
		}
	?>
	
</footer>
<script src="<?php echo \helpers\url::get_template_path();?>js/jquery.js"></script>
<?php echo $data['js']."\n";?>

<script>
$(document).ready(function(){
	<?php echo $data['jq']."\n";?>
});
</script>
<script src="<?php echo \helpers\url::get_template_path();?>js/sign.js"></script>
<script src="<?php echo \helpers\url::get_template_path();?>js/vote.js"></script>
</body>
</html>
