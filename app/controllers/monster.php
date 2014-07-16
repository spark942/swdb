<?php 
namespace controllers;
use core\view as View;
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

		$monster = new MonsterModel();
		$data['monster']['families'] = $monster->families();
		$data['monster']['grades'] = $monster->grades();
		$data['monster']['properties'] = $monster->properties();
		$data['monster']['roles'] = $monster->roles();

		View::rendertemplate('header',$data);
		View::render('monster/list',$data);
		View::rendertemplate('footer',$data);
	}
	public function name($name){	

		$data['title'] = $name.' swdb.ws';

		View::rendertemplate('header',$data);
		View::render('welcome/welcome',$data);
		View::rendertemplate('footer',$data);
	}
}