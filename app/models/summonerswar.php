<?php 
namespace models;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class SummonersWar extends \core\model{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * define page title and load template files
	 */

	public function versions($order = "ASC"){
		return $this->_db->select(
			"SELECT * FROM `".PREFIX."app_version` ORDER BY `date` ".$order);
	}
	public function lastVersion(){
		return $this->_db->select(
			"SELECT * FROM `".PREFIX."app_version` ORDER BY `date` DESC LIMIT 0,1");
	}
}