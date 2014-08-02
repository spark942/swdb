<?php 
namespace controllers;
use core\view as View;
use models\user as UserModel;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class User extends \core\controller{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * define page title and load template files
	 */
	public function index(){	

		$data['title'] = 'Signup / Signin';

		if (isset($_SESSION['USER'])){
			\helpers\url::redirect('../../../../../../');
		}
		View::rendertemplate('header',$data);
		View::render('user/form',$data);
		View::rendertemplate('footer',$data);
	}
	public function name($name){	

		$data['title'] = 'Hello '.$name;

		View::rendertemplate('header',$data);
		View::render('welcome/welcome',$data);
		View::rendertemplate('footer',$data);
	}

	public function setfakesession(){
		//$_SESSION['user_level'] = 50;
		unset($_SESSION['user_level']);
		var_dump("OK vous etes connecté.");
	}

	public function signup(){
		$data['title'] = 'Signup / Signin';
		$data['signup']['error'] = '';

		$user = new UserModel();

		//recheck
		if (isset($_SESSION['USER'])){
			\helpers\url::redirect('../../../../../../');
		}
		elseif (isset($_POST['email']) 
			&& isset($_POST['username'])
			&& isset($_POST['password'])
			&& isset($_POST['password2'])
			) {
			$email_pattern = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
			$username_pattern = '/^(?=.{3,15}$)[a-zA-Z][a-zA-Z0-9]*(?:[ _.-][a-zA-Z0-9]+)*$/';

			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip = $_SERVER['REMOTE_ADDR'];
			}
			$checkemail = $user->checkEmail($_POST['email']);
			if (preg_match($email_pattern, $_POST['email']) 
				&& !empty($checkemail)
				) {
				$data['signup']['error'] .= 'The email is not correct or is already used.<br />';
			}
			$checkname = $user->checkName($_POST['username']);
			if (preg_match($username_pattern, $_POST['username']) 
				&& !empty($checkname)
				) {
				$data['signup']['error'] .= 'The username is not correct or is already used.<br />';
			}
			if ($_POST['password'] != $_POST['password2']){
				$data['signup']['error'] .= 'The password confirmation doesn\'t match.<br />';
			}
			$count_ip = $user->checkIP($ip);
			if ($count_ip[0]->count_ip >= 3) {
				$data['signup']['error'] .= 'You have too many accounts.<br />';
			}
		}
		else{
			$data['error'] .= 'The signup form is not correctly filled.<br />';
		}

		if (!empty($data['signup']['error'])) {
			$data['signup']['error'] = '<p><span style="color:#e74c3c;">Registration failed</span><br />' . $data['signup']['error'].'</p>';
			View::rendertemplate('header',$data);
			View::render('user/form',$data);
			View::rendertemplate('footer',$data);
		}
		else{
			$user_id = $user->add($_POST['email'], $_POST['username'], $_POST['password'], $ip);
			$this->createSession($user_id);

			\helpers\url::redirect('../../../../../../');
			View::rendertemplate('header',$data);
			echo '<br /><br /><br /><br /><br />haha';
			View::rendertemplate('footer',$data);
		}
	}

	public function signin(){
		$data['title'] = 'Signup / Signin';
		$data['signin']['error'] = '';

		$user = new UserModel();

		//recheck
		if (isset($_SESSION['USER'])){
			\helpers\url::redirect('../../../../../../');
		}
		elseif (isset($_POST['email']) 
			&& isset($_POST['password'])
			) {
			$email_pattern = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
			$checkemail = $user->checkEmail($_POST['email']);
			if (preg_match($email_pattern, $_POST['email']) 
				&& empty($checkemail)
				) {
				$data['signin']['error'] .= 'The email is not correct.<br />';
			}
			else{
				$userdata = $user->emailAndPasswordMatch($_POST['email'],$_POST['password']);
			}
		}
		else{
			$data['error'] .= 'The signin form is not correctly filled.<br />';
		}

		if (!empty($data['signin']['error'])) {
			$data['signin']['error'] = '<p><span style="color:#e74c3c;">Failed connection</span><br />' . $data['signin']['error'].'</p>';
			View::rendertemplate('header',$data);
			View::render('user/form',$data);
			View::rendertemplate('footer',$data);
		}
		else{
			$user_id = $userdata[0]->id;
			$this->createSession($user_id);
			header("Location: ../../../../../../");
			View::rendertemplate('header',$data);
			echo '<br /><br /><h1>Welcome '.$_SESSION['USER']['username'].'</h1>';
			View::rendertemplate('footer',$data);
		}
	}

	public function logout(){
		if (isset($_SESSION['USER'])){
			session_unset();     // unset $_SESSION variable for the run-time 
		    session_destroy();
		}
		header("Location: ../../../../../../sign?msg=logout");
	}

	public function createSession($user_id){
		if (isset($_SESSION['user'])){
			session_unset();     // unset $_SESSION variable for the run-time 
		    session_destroy();
		}
		session_start();
		$_SESSION['LAST_ACTIVITY'] = time();

		$user = new UserModel();

		$user_data = $user->getById($user_id);

		$_SESSION['USER']['id'] = $user_id;
		$_SESSION['USER']['username'] = $user_data[0]->username;
		$_SESSION['USER']['email'] = $user_data[0]->email;
		$_SESSION['USER']['avatar'] = $user_data[0]->avatar;
		$_SESSION['USER']['url'] = $user_data[0]->url;
	}

	/* AJAX CALL */
	public function checkemail(){
		$user = new UserModel();
		$data = $user->checkEmail($_POST['email']);
		$pattern = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
		$match = preg_match($pattern, $_POST['email']);
		if (empty($data) && !empty($match)){
			echo "<i class=\"fa fa-check\" style=\"color:#1abc9c;\"></i>";
		}
		elseif (empty($data)){
			echo "<i class=\"fa fa-times\" style=\"color:#e74c3c;\"></i> Not valid";
		}
		else{
			echo "<i class=\"fa fa-times\" style=\"color:#e74c3c;\"></i> Used";
		}
	}
	public function checkname(){
		$user = new UserModel();
		$data = $user->checkName($_POST['username']);
		$pattern = '/^(?=.{3,15}$)[a-zA-Z][a-zA-Z0-9]*(?:[ _.-][a-zA-Z0-9]+)*$/';
		$match = preg_match($pattern, $_POST['username']);
		if (empty($data) && !empty($match)){
			echo "<i class=\"fa fa-check\" style=\"color:#1abc9c;\"></i>";
		}
		elseif (empty($data)){
			echo "<i class=\"fa fa-times\" style=\"color:#e74c3c;\"></i> Not valid";
		}
		else{
			echo "<i class=\"fa fa-times\" style=\"color:#e74c3c;\"></i> Used";
		}
	}
}