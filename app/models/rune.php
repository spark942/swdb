<?php 
namespace models;
use models\summonerswar as SWModel;
/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Rune extends \core\model{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * define page title and load template files
	 */


	public function allSets(){
		if ($name == null)
			return $this->_db->select(
				"SELECT `swdb_setrunes`.`id`, 
					`swdb_setrunes`.`name` AS 'set_name', 
					`swdb_setrunes`.`set_req` AS 'requirement', 
					`swdb_stats`.`name` AS 'effect_name', 
					`swdb_setrunes`.`effect_value` AS 'effect_value' 
				FROM `swdb_setrunes` 
				LEFT JOIN `swdb_stats` ON `swdb_setrunes`.`effect_stat`=`swdb_stats`.`id` 
				WHERE 1 ");
		else
			return $this->_db->select(
				"SELECT * FROM `".PREFIX."monster_families` WHERE `name` = :name",
				array(':name' => $name));
	}
	public function runeStats(){
		return $this->_db->select(
			"SELECT `swdb_rune_stats`.`id`, 
				`swdb_rune_stats`.`rune_pos`, 
				`swdb_rune_stats`.`stat_id`, 
				`swdb_stats`.`name` AS 'stat_name'
			FROM `swdb_rune_stats` 
			LEFT JOIN `swdb_stats` ON `swdb_rune_stats`.`stat_id`=`swdb_stats`.`id`
			WHERE 1");
	}

	public function addNewSetCombination($set_data){
		$SW = new SWModel();

		$insertdata = array(
			'app_id' => $SW->lastVersion()[0]->id,
			'user_id' => $set_data['user_id'],
			'date' => $set_data['date'], 
			'monster_id' => $set_data['monster_id'], 
			'set_name' => $set_data['set_name'], 
			'set_desc' => $set_data['set_desc'], 
			'set_1' => $set_data['set-1'], 'primary_1' => $set_data['primary-1'], 
			'set_2' => $set_data['set-2'], 'primary_2' => $set_data['primary-2'], 
			'set_3' => $set_data['set-3'], 'primary_3' => $set_data['primary-3'], 
			'set_4' => $set_data['set-4'], 'primary_4' => $set_data['primary-4'], 
			'set_5' => $set_data['set-5'], 'primary_5' => $set_data['primary-5'], 
			'set_6' => $set_data['set-6'], 'primary_6' => $set_data['primary-6'],
			'ssecondary1' => $set_data['ssecondary1'], 
			'ssecondary2' => $set_data['ssecondary2'], 
			'ssecondary3' => $set_data['ssecondary3'],  
			'nssecondary1' => $set_data['nssecondary1'], 
			'nssecondary2' => $set_data['nssecondary2'], 
			'nssecondary3' => $set_data['nssecondary3']
			);
		$this->_db->insert(PREFIX_WS.'runesets',$insertdata);

		$set_id = $this->_db->lastInsertId('id');

		$insertstat = array('runesets_id' => $set_id);
		$this->_db->insert(PREFIX_WS.'runeset_scores',$insertstat);

		return $set_id;
	}

	public function updateScoreUp($runesets_id, $newvalue){
		$data = array(
		'up' => $newvalue
		);
		$where = array('runesets_id' => $runesets_id);
		return $this->_db->update(PREFIX_WS.'runeset_scores',$data, $where);
	}
	public function updateScoreDown($runesets_id, $newvalue){
		$data = array(
		'down' => $newvalue
		);
		$where = array('runesets_id' => $runesets_id);
		return $this->_db->update(PREFIX_WS.'runeset_scores',$data, $where);
	}
	public function getScoresByRunesetsId($runesets_id){
		return $this->_db->select(
			"SELECT * FROM `swdbws_runeset_scores` WHERE `runesets_id`='".$runesets_id."'");
	}

	public function getSimpleSetByRunesetsId($runesets_id){
		return $this->_db->select(
			"SELECT * FROM `swdbws_runesets` WHERE `id`='".$runesets_id."'");
	}

	public function getSetByRunesetsId($runesets_id){
		return $this->_db->select(
			"SELECT `swdbws_runesets`.`id`, 
				`app_version`.`id` AS 'app_id',
				`app_version`.`version` AS 'app_version',
				`app_version`.`date` AS 'app_date',
				`user`.`id` AS 'user_id', 
				`user`.`username` AS 'username',
				`user_stat`.`reputation` AS 'user_reputation',
				`swdbws_runesets`.`date` AS 'date', 
				`monster`.`name` AS 'monster_name', 
				`swdbws_runesets`.`set_name`, 
				`swdbws_runesets`.`set_desc`, 
				`set_1`.`name` AS 'set1_name', `primary_1`.`name` AS 'p1_name', 
				`set_2`.`name` AS 'set2_name', `primary_2`.`name` AS 'p2_name', 
				`set_3`.`name` AS 'set3_name', `primary_3`.`name` AS 'p3_name', 
				`set_4`.`name` AS 'set4_name', `primary_4`.`name` AS 'p4_name', 
				`set_5`.`name` AS 'set5_name', `primary_5`.`name` AS 'p5_name', 
				`set_6`.`name` AS 'set6_name', `primary_6`.`name` AS 'p6_name', 
				`ssecondary1`.`name` AS 'ss1_name', 
				`ssecondary2`.`name` AS 'ss2_name', 
				`ssecondary3`.`name` AS 'ss3_name', 
				`nssecondary1`.`name` AS 'nss1_name', 
				`nssecondary2`.`name` AS 'nss2_name', 
				`nssecondary3`.`name` AS 'nss3_name',
				(`score`.`up`+`score`.`down`) AS 'score',
				`score`.`up`,
				`score`.`down`
			FROM `swdbws_runesets` 
			LEFT JOIN `swdb_app_version` AS app_version ON `swdbws_runesets`.`app_id`=`app_version`.`id`
			LEFT JOIN `swdbws_users` AS user ON `swdbws_runesets`.`user_id`=`user`.`id`
			LEFT JOIN `swdbws_user_stats` AS user_stat ON `swdbws_runesets`.`user_id`=`user_stat`.`user_id`
			LEFT JOIN `swdb_monsters` AS monster ON `swdbws_runesets`.`monster_id`=`monster`.`id`
			LEFT JOIN `swdb_setrunes` AS set_1 ON `swdbws_runesets`.`set_1`=`set_1`.`id`
			LEFT JOIN `swdb_stats` AS primary_1 ON `swdbws_runesets`.`primary_1`=`primary_1`.`id`
			LEFT JOIN `swdb_setrunes` AS set_2 ON `swdbws_runesets`.`set_2`=`set_2`.`id`
			LEFT JOIN `swdb_stats` AS primary_2 ON `swdbws_runesets`.`primary_2`=`primary_2`.`id`
			LEFT JOIN `swdb_setrunes` AS set_3 ON `swdbws_runesets`.`set_3`=`set_3`.`id`
			LEFT JOIN `swdb_stats` AS primary_3 ON `swdbws_runesets`.`primary_3`=`primary_3`.`id`
			LEFT JOIN `swdb_setrunes` AS set_4 ON `swdbws_runesets`.`set_4`=`set_4`.`id`
			LEFT JOIN `swdb_stats` AS primary_4 ON `swdbws_runesets`.`primary_4`=`primary_4`.`id`
			LEFT JOIN `swdb_setrunes` AS set_5 ON `swdbws_runesets`.`set_5`=`set_5`.`id`
			LEFT JOIN `swdb_stats` AS primary_5 ON `swdbws_runesets`.`primary_5`=`primary_5`.`id`
			LEFT JOIN `swdb_setrunes` AS set_6 ON `swdbws_runesets`.`set_6`=`set_6`.`id`
			LEFT JOIN `swdb_stats` AS primary_6 ON `swdbws_runesets`.`primary_6`=`primary_6`.`id`
			LEFT JOIN `swdb_stats` AS ssecondary1 ON `swdbws_runesets`.`ssecondary1`=`ssecondary1`.`id`
			LEFT JOIN `swdb_stats` AS ssecondary2 ON `swdbws_runesets`.`ssecondary2`=`ssecondary2`.`id`
			LEFT JOIN `swdb_stats` AS ssecondary3 ON `swdbws_runesets`.`ssecondary3`=`ssecondary3`.`id`
			LEFT JOIN `swdb_stats` AS nssecondary1 ON `swdbws_runesets`.`nssecondary1`=`nssecondary1`.`id`
			LEFT JOIN `swdb_stats` AS nssecondary2 ON `swdbws_runesets`.`nssecondary2`=`nssecondary2`.`id`
			LEFT JOIN `swdb_stats` AS nssecondary3 ON `swdbws_runesets`.`nssecondary3`=`nssecondary3`.`id`
			LEFT JOIN `swdbws_runeset_scores` AS score ON `swdbws_runesets`.`id`=`score`.`runesets_id`
			WHERE `swdbws_runesets`.`id`='".$runesets_id."'");
	}
	public function getCombinationsByMonsterId($monster_id){
		return $this->_db->select(
			"SELECT `swdbws_runesets`.`id`, 
				`app_version`.`id` AS 'app_id',
				`app_version`.`version` AS 'app_version',
				`app_version`.`date` AS 'app_date',
				`user`.`id` AS 'user_id', 
				`user`.`username` AS 'username',
				`user_stat`.`reputation` AS 'user_reputation',
				`swdbws_runesets`.`date` AS 'date', 
				`monster`.`name` AS 'monster_name', 
				`swdbws_runesets`.`set_name`, 
				`swdbws_runesets`.`set_desc`, 
				`set_1`.`name` AS 'set1_name', `primary_1`.`name` AS 'p1_name', 
				`set_2`.`name` AS 'set2_name', `primary_2`.`name` AS 'p2_name', 
				`set_3`.`name` AS 'set3_name', `primary_3`.`name` AS 'p3_name', 
				`set_4`.`name` AS 'set4_name', `primary_4`.`name` AS 'p4_name', 
				`set_5`.`name` AS 'set5_name', `primary_5`.`name` AS 'p5_name', 
				`set_6`.`name` AS 'set6_name', `primary_6`.`name` AS 'p6_name', 
				`ssecondary1`.`name` AS 'ss1_name', 
				`ssecondary2`.`name` AS 'ss2_name', 
				`ssecondary3`.`name` AS 'ss3_name', 
				`nssecondary1`.`name` AS 'nss1_name', 
				`nssecondary2`.`name` AS 'nss2_name', 
				`nssecondary3`.`name` AS 'nss3_name',
				(`score`.`up`+`score`.`down`) AS 'score',
				`score`.`up`,
				`score`.`down`
			FROM `swdbws_runesets` 
			LEFT JOIN `swdb_app_version` AS app_version ON `swdbws_runesets`.`app_id`=`app_version`.`id`
			LEFT JOIN `swdbws_users` AS user ON `swdbws_runesets`.`user_id`=`user`.`id`
			LEFT JOIN `swdbws_user_stats` AS user_stat ON `swdbws_runesets`.`user_id`=`user_stat`.`user_id`
			LEFT JOIN `swdb_monsters` AS monster ON `swdbws_runesets`.`monster_id`=`monster`.`id`
			LEFT JOIN `swdb_setrunes` AS set_1 ON `swdbws_runesets`.`set_1`=`set_1`.`id`
			LEFT JOIN `swdb_stats` AS primary_1 ON `swdbws_runesets`.`primary_1`=`primary_1`.`id`
			LEFT JOIN `swdb_setrunes` AS set_2 ON `swdbws_runesets`.`set_2`=`set_2`.`id`
			LEFT JOIN `swdb_stats` AS primary_2 ON `swdbws_runesets`.`primary_2`=`primary_2`.`id`
			LEFT JOIN `swdb_setrunes` AS set_3 ON `swdbws_runesets`.`set_3`=`set_3`.`id`
			LEFT JOIN `swdb_stats` AS primary_3 ON `swdbws_runesets`.`primary_3`=`primary_3`.`id`
			LEFT JOIN `swdb_setrunes` AS set_4 ON `swdbws_runesets`.`set_4`=`set_4`.`id`
			LEFT JOIN `swdb_stats` AS primary_4 ON `swdbws_runesets`.`primary_4`=`primary_4`.`id`
			LEFT JOIN `swdb_setrunes` AS set_5 ON `swdbws_runesets`.`set_5`=`set_5`.`id`
			LEFT JOIN `swdb_stats` AS primary_5 ON `swdbws_runesets`.`primary_5`=`primary_5`.`id`
			LEFT JOIN `swdb_setrunes` AS set_6 ON `swdbws_runesets`.`set_6`=`set_6`.`id`
			LEFT JOIN `swdb_stats` AS primary_6 ON `swdbws_runesets`.`primary_6`=`primary_6`.`id`
			LEFT JOIN `swdb_stats` AS ssecondary1 ON `swdbws_runesets`.`ssecondary1`=`ssecondary1`.`id`
			LEFT JOIN `swdb_stats` AS ssecondary2 ON `swdbws_runesets`.`ssecondary2`=`ssecondary2`.`id`
			LEFT JOIN `swdb_stats` AS ssecondary3 ON `swdbws_runesets`.`ssecondary3`=`ssecondary3`.`id`
			LEFT JOIN `swdb_stats` AS nssecondary1 ON `swdbws_runesets`.`nssecondary1`=`nssecondary1`.`id`
			LEFT JOIN `swdb_stats` AS nssecondary2 ON `swdbws_runesets`.`nssecondary2`=`nssecondary2`.`id`
			LEFT JOIN `swdb_stats` AS nssecondary3 ON `swdbws_runesets`.`nssecondary3`=`nssecondary3`.`id`
			LEFT JOIN `swdbws_runeset_scores` AS score ON `swdbws_runesets`.`id`=`score`.`runesets_id`
			WHERE `swdbws_runesets`.`monster_id`='".$monster_id."'
			ORDER BY `swdbws_runesets`.`app_id` DESC, `swdbws_runesets`.`date` DESC");
	}

	public function logVotes($voter_id, $rune_user_id, $runesets_id, $amount){
		$insertdata = array(
			'voter_id' => $voter_id, 
			'rune_user_id' => $rune_user_id, 
			'runesets_id' => $runesets_id, 
			'amount' => $amount
			);
		$this->_db->insert(PREFIX_WS.'rune_vote_logs',$insertdata);
	}
}	