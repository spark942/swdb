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

	public function listBy($opt = array(
			'ORDER_BY' => 'DESC',
			'LIMIT' => '0,600' )
		)
	{

		$query = "SELECT `".PREFIX."app_version`.`version` AS 'app_version', 
				`".PREFIX."monsters`.`id` AS 'monster_id', 
				`".PREFIX."monsters`.`name` AS 'monster_name', 
				`".PREFIX."monster_families`.`name` AS 'family_name', 
				`".PREFIX."monster_grades`.`name` AS 'grade_name', 
				`".PREFIX."monster_grades`.`special_name` AS 'grade_special_name', 
				`".PREFIX."monster_grades`.`special_name_color` AS 'grade_color', 
				`".PREFIX."monster_properties`.`name` AS 'property_name', 
				`".PREFIX."monster_roles`.`name` AS 'role_name', 
				`".PREFIX."monsters`.`image` AS 'monster_image'
			FROM `".PREFIX."monsters` 
			LEFT JOIN `".PREFIX."app_version` 
				ON `".PREFIX."monsters`.`app_version_id`=`".PREFIX."app_version`.`id`
			LEFT JOIN `".PREFIX."monster_families` 
				ON `".PREFIX."monsters`.`monster_family_id`=`".PREFIX."monster_families`.`id`
			LEFT JOIN `".PREFIX."monster_grades` 
				ON `".PREFIX."monsters`.`monster_grade_id`=`".PREFIX."monster_grades`.`id`
			LEFT JOIN `".PREFIX."monster_properties` 
				ON `".PREFIX."monsters`.`monster_property_id`=`".PREFIX."monster_properties`.`id`
			LEFT JOIN `".PREFIX."monster_roles` 
				ON `".PREFIX."monsters`.`monster_role_id`=`".PREFIX."monster_roles`.`id`
			WHERE `".PREFIX."monsters`.`id` >= '1' 
			ORDER BY `".PREFIX."monsters`.`id` ".$opt['ORDER_BY']." 
			LIMIT ".$opt['LIMIT'];
		return $this->_db->select($query);
	}

	public function findByAbsName($absname){
		return $this->_db->select(
			"SELECT `".PREFIX."app_version`.`version` AS 'app_version', 
				`".PREFIX."monsters`.`id` AS 'monster_id', 
				`".PREFIX."monsters`.`name` AS 'monster_name', 
				`".PREFIX."monster_families`.`id` AS 'family_id', 
				`".PREFIX."monster_families`.`name` AS 'family_name', 
				`".PREFIX."monster_grades`.`name` AS 'grade_name', 
				`".PREFIX."monster_grades`.`special_name` AS 'grade_special_name', 
				`".PREFIX."monster_grades`.`special_name_color` AS 'grade_color', 
				`".PREFIX."monster_properties`.`name` AS 'property_name', 
				`".PREFIX."monster_roles`.`name` AS 'role_name', 
				`".PREFIX."monsters`.`image` AS 'monster_image'
			FROM `".PREFIX."monsters` 
			LEFT JOIN `".PREFIX."app_version` 
				ON `".PREFIX."monsters`.`app_version_id`=`".PREFIX."app_version`.`id`
			LEFT JOIN `".PREFIX."monster_families` 
				ON `".PREFIX."monsters`.`monster_family_id`=`".PREFIX."monster_families`.`id`
			LEFT JOIN `".PREFIX."monster_grades` 
				ON `".PREFIX."monsters`.`monster_grade_id`=`".PREFIX."monster_grades`.`id`
			LEFT JOIN `".PREFIX."monster_properties` 
				ON `".PREFIX."monsters`.`monster_property_id`=`".PREFIX."monster_properties`.`id`
			LEFT JOIN `".PREFIX."monster_roles` 
				ON `".PREFIX."monsters`.`monster_role_id`=`".PREFIX."monster_roles`.`id`WHERE `abs_name` = '".$absname."'");
	}

	public function findByFamilyId($family_id){
		return $this->_db->select(
			"SELECT `".PREFIX."app_version`.`version` AS 'app_version', 
				`".PREFIX."monsters`.`id` AS 'monster_id',
				`".PREFIX."monsters`.`abs_name` AS 'absolute_monster_name',  
				`".PREFIX."monsters`.`name` AS 'monster_name', 
				`".PREFIX."monster_families`.`name` AS 'family_name', 
				`".PREFIX."monster_grades`.`name` AS 'grade_name', 
				`".PREFIX."monster_grades`.`special_name` AS 'grade_special_name', 
				`".PREFIX."monster_grades`.`special_name_color` AS 'grade_color', 
				`".PREFIX."monster_properties`.`name` AS 'property_name', 
				`".PREFIX."monster_roles`.`name` AS 'role_name', 
				`".PREFIX."monsters`.`image` AS 'monster_image'
			FROM `".PREFIX."monsters` 
			LEFT JOIN `".PREFIX."app_version` 
				ON `".PREFIX."monsters`.`app_version_id`=`".PREFIX."app_version`.`id`
			LEFT JOIN `".PREFIX."monster_families` 
				ON `".PREFIX."monsters`.`monster_family_id`=`".PREFIX."monster_families`.`id`
			LEFT JOIN `".PREFIX."monster_grades` 
				ON `".PREFIX."monsters`.`monster_grade_id`=`".PREFIX."monster_grades`.`id`
			LEFT JOIN `".PREFIX."monster_properties` 
				ON `".PREFIX."monsters`.`monster_property_id`=`".PREFIX."monster_properties`.`id`
			LEFT JOIN `".PREFIX."monster_roles` 
				ON `".PREFIX."monsters`.`monster_role_id`=`".PREFIX."monster_roles`.`id`
			WHERE `monster_family_id` = '".$family_id."'");
	}

	public function form($id_fam){	
		$monster_families = $this->monsterFamilies();
		$monster_grades = $this->monsterGrades();
		$monster_properties = $this->monsterProperties();
		$monster_roles = $this->monsterRoles();
		return array($monster_families, $monster_grades, $monster_properties, $monster_roles);
	}
	public function exist($name, $property){
		return $this->_db->select(
			"SELECT * FROM `".PREFIX."monsters` 
				WHERE `name` = '".$name."' 
				AND `monster_property_id` = '".$property."'");
	}
	public function insertNew(
		$name,
		$app_version,
		$family,
		$grade,
		$property,
		$role){

		$propertyName = $this->properties();
		$img_prefix = '';
		foreach ($propertyName as $key => $value) {
			if ($value->id == $property) {
				$img_prefix = $value->name;
				break;
			}
		}
		$insertdata = array(
			'app_version_id' => $app_version,
			'name' => $name,
			'monster_family_id' => $family,
			'monster_grade_id' => $grade,
			'monster_property_id' => $property,
			'monster_role_id' => $role,
			'image' => strtolower($img_prefix).'-'.strtolower(str_replace(' ', '_', $name)).'.jpg'
		);
		$this->_db->insert(PREFIX.'monsters',$insertdata);
		return $this->_db->lastInsertId('id');
	}
}