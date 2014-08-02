<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $data['title'].' '.SITETITLE; //SITETITLE defined in index.php?></title>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,300italic,300,400italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
	<link href="<?php echo \helpers\url::get_template_path();?>css/style.css" rel="stylesheet">
	<link href="<?php echo \helpers\url::get_template_path();?>css/logo.css" rel="stylesheet">
	<?php 
	if (isset($data['rel_image'])){
		?>
		<link rel="image_src" href="../../../../../../public/images/monsters/<?php echo $data['rel_image']; ?>" >
		<?php
	}
	?>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
<header>
	<nav id="website">
		<ul>
			<li class="navtitle">Website : </li>
			<li><a href="../../../../../../../../">Home</a></li>
			<li><a href="../../../../../../../../#">Last activities</a></li>
			<li class="nav-comingsoon"><a href="../../../../../../../../#">Monster ladders</a></li>
			<li class="nav-comingsoon"><a href="../../../../../../../../#">Guides</a></li>
			<?php 
			if (!isset($_SESSION['USER'])){
				echo '<li><a href="../../../../../../../../sign">Sign up / Sign in</a></li>';
			}
			else{
				echo '
				<li id="logout"><a href="../../../../../../../../logout">Logout</a></li>';
			}
			?>
		</ul>
	</nav>
	<nav id="database">
		<ul>
			<li class="navtitle">Database : </li>
			<li><a href="../../../../../../../../monsters">Monsters (beta)</a></li>
			<li class="nav-comingsoon"><a href="../../../../../../../../#">Skills</a></li>
			<li class="nav-comingsoon"><a href="../../../../../../../../#">Dungeons</a></li>
			<li class="nav-comingsoon"><a href="../../../../../../../../#">Buildings</a></li>
		</ul>
	</nav>
</header>
<div id='wrapper'>
