<?php 
namespace models;

use models\gamification as GamificationModel;
/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class User extends \core\model{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * define page title and load template files
	 */


	public function add($email, $username, $password, $ip){
		$insertdata = array(
			'username' => $username, 
			'email' => $email,
			'password' => sha1(SALT.$password),
			'ip' => $ip
			);
		$this->_db->insert(PREFIX_WS.'users',$insertdata);

		$user_id = $this->_db->lastInsertId('id');

		$startlevel = GamificationModel::userStartLevel();
		$insertdata_stat = array(
			'user_id' => $user_id, 
			'level' => $startlevel,
			'exp' => 10,
			'pollstone' => GamificationModel::basePollstonePerWeekTable()[$startlevel],
			'reputation' => 0
			);
		$this->_db->insert(PREFIX_WS.'user_stats',$insertdata_stat);
		return $user_id;
	}

	public function getById($user_id){
		return $this->_db->select(
			"SELECT * FROM `swdbws_users` WHERE `id` = '".$user_id."'");
	}
	public function getStatsById($user_id){
		return $this->_db->select(
			"SELECT * FROM `swdbws_user_stats` WHERE `user_id` = '".$user_id."'");
	}

	public function updateActivity(){
		$data = array(
		'last_activity' => date("Y-m-d H:i:s")
		);
		$where = array('user_id' => $_SESSION['USER']['id']);
		return $this->_db->update(PREFIX_WS.'user_stats',$data, $where);
	}

	public function updateLevel($user_id, $newvalue){
		$data = array(
		'level' => $newvalue
		);
		$where = array('user_id' => $user_id);
		return $this->_db->update(PREFIX_WS.'user_stats',$data, $where);
	}

	public function updateExp($user_id, $newvalue){
		$data = array(
		'exp' => $newvalue
		);
		$where = array('user_id' => $user_id);
		return $this->_db->update(PREFIX_WS.'user_stats',$data, $where);
	}


	public function updatePollstone($user_id, $newvalue){
		$data = array(
		'pollstone' => $newvalue
		);
		$where = array('user_id' => $user_id);
		return $this->_db->update(PREFIX_WS.'user_stats',$data, $where);
	}

	public function updateReputation($user_id, $newvalue){
		$data = array(
		'reputation' => $newvalue
		);
		$where = array('user_id' => $user_id);
		return $this->_db->update(PREFIX_WS.'user_stats',$data, $where);
	}

	public function emailAndPasswordMatch($email, $password){
		$email_ok = addslashes(strtolower($email));
		return $this->_db->select(
			"SELECT * FROM `swdbws_users` WHERE `email` = '".$email_ok."' AND `password` = '".sha1(SALT.$password)."'");
	}
	public function nameAndPasswordMatch($username, $password){
		return $this->_db->select(
			"SELECT * FROM `swdbws_users` WHERE `username` = '".$username."' AND `password` = '".sha1(SALT.$password)."'");
	}
	public function checkIP($ip){
		$ip_ok = addslashes(strtolower($ip));
		return $this->_db->select(
			"SELECT COUNT(`id`) AS 'count_ip' FROM `swdbws_users` WHERE `ip` = '".$ip_ok."'");
	}
	public function checkEmail($email){
		$email_ok = addslashes(strtolower($email));
		return $this->_db->select(
			"SELECT * FROM `swdbws_users` WHERE `email` = '".$email_ok."'");
	}
	public function checkName($username){
		$username_ok = addslashes(strtolower($username));
		return $this->_db->select(
			"SELECT * FROM `swdbws_users` WHERE `username` = '".$username_ok."'");
	}
}