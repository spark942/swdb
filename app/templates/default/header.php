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
</head>
<body>
<header>
	<nav>
		<ul>
			<li><a href="../../../../../../../../">Home</a></li>
			<li><a href="../../../../../../../../monsters">Monsters (beta)</a></li>
			<li><a href="../../../../../../../../#">Skills (coming soon)</a></li>
		</ul>
	</nav>
</header>
<div id='wrapper'>
