<?php 
namespace controllers;
use core\view as View;
use models\summonerswar as SWModel;
use models\monster as MonsterModel;
/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Monster extends \core\controller{

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

		$data['title'] = 'swdb.ws';

		$sw = new SWModel();
		$data['sw']['app_versions'] = $sw->versions("DESC");

		$monster = new MonsterModel();
		$data['monster']['families'] = $monster->families();
		$data['monster']['grades'] = $monster->grades();
		$data['monster']['properties'] = $monster->properties();
		$data['monster']['roles'] = $monster->roles();
		$data['monster']['list'] = $monster->listBy();

		View::rendertemplate('header',$data);
		View::render('monster/list',$data);
		View::rendertemplate('footer',$data);
	}
	public function add(){
		$data['title'] ='Add new monster - swdb.ws';
		var_dump($_POST);

		$monster = new MonsterModel();
		$exist = $monster->exist($_POST['name'], $_POST['monster_property']);
		if (empty($exist)){
			$data['msg'] = 'Ok, the monster has been added to the table, you can back to the add form';
			$res = $monster->insertNew(
				$_POST['name'],
				$_POST['app_version'],
				$_POST['monster_family'],
				$_POST['monster_grade'],
				$_POST['monster_property'],
				$_POST['monster_role']);
			$data['last_insert_id'] = $res;
		}
		else{
			$data['msg'] = 'This monster already exist.';
			$data['your_commit'] = $_POST;
			$data['onbase'] = $exist;
		}
		var_dump($data);
	}
	public function name($name){	

		$data['title'] = $name.' swdb.ws';

		View::rendertemplate('header',$data);
		View::render('welcome/welcome',$data);
		View::rendertemplate('footer',$data);
	}
}