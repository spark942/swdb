<?php 
namespace controllers;
use core\view as View;
use models\summonerswar as SWModel;
use models\monster as MonsterModel;
use models\rune as RuneModel;
/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Rune extends \core\controller{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * define page title and load template files
	 */
	public function index($action = null){	
		$data['title'] = 'SWDB.WS Runes';

		$sw = new SWModel();
		$data['sw']['app_versions'] = $sw->versions("DESC");

		$monster = new MonsterModel();
		$data['monster']['families'] = $monster->families();
		$data['monster']['grades'] = $monster->grades();
		$data['monster']['properties'] = $monster->properties();
		$data['monster']['roles'] = $monster->roles();
		$data['monster']['list'] = $monster->listBy();

		View::rendertemplate('header',$data);
		View::render('rune/setlist',$data);
		View::rendertemplate('footer',$data);
	}

	public function saveset(){
		$data['title'] = 'SWDB.WS Runes';

		$monster = new MonsterModel();
		$rune = new RuneModel();

		if (isset($_SESSION['USER']['id'])
			&& isset($_POST['monster'])
			&& isset($_POST['set_name']) && isset($_POST['set_desc'])
			&& isset($_POST['set-1']) && isset($_POST['primary-1'])
			&& isset($_POST['set-2']) && isset($_POST['primary-2'])
			&& isset($_POST['set-3']) && isset($_POST['primary-3'])
			&& isset($_POST['set-4']) && isset($_POST['primary-4'])
			&& isset($_POST['set-5']) && isset($_POST['primary-5'])
			&& isset($_POST['set-6']) && isset($_POST['primary-6'])
			&& isset($_POST['ssecondary1']) && isset($_POST['ssecondary2']) && isset($_POST['ssecondary3'])
			&& isset($_POST['nssecondary1']) && isset($_POST['nssecondary2']) && isset($_POST['nssecondary3'])
			) {
			$monster_id = $monster->findByAbsName($_POST['monster'])[0]->monster_id;
			$set_data = array(
				'user_id' => $_SESSION['USER']['id'],
				'date' => date("Y-m-d H:i:s"), 
				'monster_id' => $monster_id, 
				'set_name' => $_POST['set_name'], 'set_desc' => $_POST['set_desc'], 
				'set-1' => $_POST['set-1'], 'primary-1' => $_POST['primary-1'], 
				'set-2' => $_POST['set-2'], 'primary-2' => $_POST['primary-2'], 
				'set-3' => $_POST['set-3'], 'primary-3' => $_POST['primary-3'], 
				'set-4' => $_POST['set-4'], 'primary-4' => $_POST['primary-4'], 
				'set-5' => $_POST['set-5'], 'primary-5' => $_POST['primary-5'], 
				'set-6' => $_POST['set-6'], 'primary-6' => $_POST['primary-6'], 
				'ssecondary1' => $_POST['ssecondary1'], 
				'ssecondary2' => $_POST['ssecondary2'], 
				'ssecondary3' => $_POST['ssecondary3'],  
				'nssecondary1' => $_POST['nssecondary1'], 
				'nssecondary2' => $_POST['nssecondary2'], 
				'nssecondary3' => $_POST['nssecondary3']
				);
			if (is_numeric($rune->addNewSetCombination($set_data))){
				\helpers\url::redirect('../../../../../../monster/'.$_POST['monster']);
			}
		}
		else{
			if (isset($_POST['monster'])){
				\helpers\url::redirect('../../../../../../monster/'.$_POST['monster']);
			}
		}
		

		var_dump($monster_id);
		View::rendertemplate('header',$data);
		var_dump("toto");
		var_dump($_POST);
		//View::render('rune/setlist',$data);
		View::rendertemplate('footer',$data);
	}

	public function show($absname){	
		$monster = new MonsterModel();
		$show_monster = $monster->findByAbsName($absname);
		$data['title'] = $absname.' swdb.ws';
		$data['rel_image'] = $show_monster[0]->monster_image;

		$data['monster']['show'] = $show_monster;
		$data['monster']['show']['family'] = $monster->findByFamilyId($show_monster[0]->family_id);

		$rune = new RuneModel();
		$data['rune']['stats'] = $rune->runeStats();

		View::rendertemplate('header',$data);
		View::render('monster/show',$data);
		View::rendertemplate('disqus_comment',$data);
		View::rendertemplate('footer',$data);
	}
}