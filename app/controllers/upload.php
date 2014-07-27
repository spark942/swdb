<?php namespace controllers;
use core\view as View;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Upload extends \core\controller{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * define page title and load template files
	 */
	public function form(){	

		$data['title'] = 'Upload a screenshot';

		View::rendertemplate('header',$data);
		if (isset($_SESSION['user_level']) && ($_SESSION['user_level'] >= 50)) {
			View::render('upload/form',$data);
		}
		else{
			View::render('error/404',$data);
		}
		
		View::rendertemplate('footer',$data);
	}
	public function save(){
		$data['title'] = 'Images successful added';
		/*var_dump($_POST);
		var_dump($_FILES);*/
		$path = "C:\\wamp\\www\\swdb\\public\\images\\monsters\\";

		$OK = array();
		if ($_FILES['fire']['error'] == 0){
			$src = imagecreatefromjpeg($_FILES['fire']['tmp_name']);
			$dest = imagecreatetruecolor(96, 96);
			imagecopy($dest, $src, 0, 0, 231, 75, 96, 96);
			imagejpeg($dest, $path.'fire-'.strtolower(str_replace(' ', '_', $_POST['monster_name_fire'])).'.jpg');
			imagedestroy($src);
			imagedestroy($dest);
			$OK['fire'] = 1;
		}
		if ($_FILES['water']['error'] == 0){
			$src = imagecreatefromjpeg($_FILES['water']['tmp_name']);
			$dest = imagecreatetruecolor(96, 96);
			imagecopy($dest, $src, 0, 0, 231, 75, 96, 96);
			imagejpeg($dest, $path.'water-'.strtolower(str_replace(' ', '_', $_POST['monster_name_water'])).'.jpg');
			imagedestroy($src);
			imagedestroy($dest);
			$OK['water'] = 1;
		}
		if ($_FILES['wind']['error'] == 0){
			$src = imagecreatefromjpeg($_FILES['wind']['tmp_name']);
			$dest = imagecreatetruecolor(96, 96);
			imagecopy($dest, $src, 0, 0, 231, 75, 96, 96);
			imagejpeg($dest, $path.'wind-'.strtolower(str_replace(' ', '_', $_POST['monster_name_wind'])).'.jpg');
			imagedestroy($src);
			imagedestroy($dest);
			$OK['wind'] = 1;
		}
		if ($_FILES['light']['error'] == 0){
			$src = imagecreatefromjpeg($_FILES['light']['tmp_name']);
			$dest = imagecreatetruecolor(96, 96);
			imagecopy($dest, $src, 0, 0, 231, 75, 96, 96);
			imagejpeg($dest, $path.'light-'.strtolower(str_replace(' ', '_', $_POST['monster_name_light'])).'.jpg');
			imagedestroy($src);
			imagedestroy($dest);
			$OK['light'] = 1;
		}
		if ($_FILES['dark']['error'] == 0){
			$src = imagecreatefromjpeg($_FILES['dark']['tmp_name']);
			$dest = imagecreatetruecolor(96, 96);
			imagecopy($dest, $src, 0, 0, 231, 75, 96, 96);
			imagejpeg($dest, $path.'dark-'.strtolower(str_replace(' ', '_', $_POST['monster_name_dark'])).'.jpg');
			imagedestroy($src);
			imagedestroy($dest);
			$OK['dark'] = 1;
		}
		var_dump($OK);
	}
}