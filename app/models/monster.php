<?php 
namespace models;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Monster extends \core\model{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * define page title and load template files
	 */
	public function form($id_fam){	
		$monster_families = $this->monsterFamilies();
		$monster_grades = $this->monsterGrades();
		$monster_properties = $this->monsterProperties();
		$monster_roles = $this->monsterRoles();
		return array($monster_families, $monster_grades, $monster_properties, $monster_roles);
	}

	public function families($name = null){
		if ($name == null)
			return $this->_db->select(
				"SELECT * FROM `".PREFIX."monster_families` ORDER BY `name` ASC");
		else
			return $this->_db->select(
				"SELECT * FROM `".PREFIX."monster_families` WHERE `name` = :name",
				array(':name' => $name));
	}
	public function grades(){
		return $this->_db->select(
			"SELECT * FROM `".PREFIX."monster_grades` ORDER BY `id` ASC");
	}
	public function properties(){
		return $this->_db->select(
			"SELECT * FROM `".PREFIX."monster_properties` ORDER BY `id` ASC");
	}
	public function roles(){
		return $this->_db->select(
			"SELECT * FROM `".PREFIX."monster_roles` ORDER BY `id` ASC");
	}
}