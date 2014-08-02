<?php namespace core;
use core\config as Config,
    core\view as View,
    core\error as Error;
use models\user as UserModel;
use models\gamification as GamificationModel;
/*
 * controller - base controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Controller {

	/**
	 * view variable to use the view class
	 * @var string
	 */
	public $view;

	/**
	 * on run make an instance of the config class and view class 
	 */
	public function __construct(){
		
		//initialise the config object
		new config();

		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 7200)) {
		    // last request was more than 120 minutes ago
		    session_unset();     // unset $_SESSION variable for the run-time 
		    session_destroy();   // destroy session data in storage
		    header("Location: ../../../../../../sign?msg=sessionexpired");
		}
		if (isset($_SESSION['USER'])) {
			$_SESSION['LAST_ACTIVITY'] = time();

			$user = new UserModel();

			$user->updateActivity();

			$user_stats_data = $user->getStatsById($_SESSION['USER']['id']);
			$_SESSION['USER']['STAT']['level'] = $user_stats_data[0]->level;
			$_SESSION['USER']['STAT']['exp'] = $user_stats_data[0]->exp;
			$_SESSION['USER']['STAT']['maxexp'] = GamificationModel::userExpLevelTable()[$user_stats_data[0]->level];
			$_SESSION['USER']['STAT']['exppervotepoint'] = GamificationModel::expPerVotePointTable()[$user_stats_data[0]->level];
			$_SESSION['USER']['STAT']['pollstone'] = $user_stats_data[0]->pollstone;
			$_SESSION['USER']['STAT']['basepollstoneperweek'] = GamificationModel::basePollstonePerWeekTable()[$user_stats_data[0]->level];
			$_SESSION['USER']['STAT']['bonuspollstoneperreputationperweek'] = GamificationModel::bonusPollstonePerReputationPerWeekTable()[$user_stats_data[0]->level];
			$_SESSION['USER']['STAT']['upvotepollstonecostperpoint'] = GamificationModel::upVotePollstoneCostPerPointTable()[$user_stats_data[0]->level];
			$_SESSION['USER']['STAT']['downvotepollstonecostperpoint'] = GamificationModel::downVotePollstoneCostPerPointTable()[$user_stats_data[0]->level];
			$_SESSION['USER']['STAT']['reputation'] = $user_stats_data[0]->reputation;
		}
		//initialise the views object
		$this->view = new view();
	}

	//Display an error page if nothing exists
	protected function _error($error) {
		require 'app/core/error.php';
		$this->_controller = new error($error);
	    	$this->_controller->index();
	    	die;
	}

}
