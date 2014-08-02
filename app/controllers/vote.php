<?php 
namespace controllers;
use core\view as View;
use models\summonerswar as SWModel;
use models\user as UserModel;
use models\monster as MonsterModel;
use models\rune as RuneModel;
use models\gamification as GamificationModel;
/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Vote extends \core\controller{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * define page title and load template files
	 */
	public function rune(){
		if (isset($_POST['param'])){
			$params = explode('-', $_POST['param']);
			if (($params[0][0] == '#') && (is_numeric($params[1]))){
				$user = new UserModel();
				$rune = new RuneModel();

				$operator = substr($params[0], 1, 4);
				$score_value = intval(substr($params[0], 5));
				$rune_id = $params[1];

				$runeset_data = $rune->getSetByRunesetsId($rune_id);
				// verify if dont vote for his combination
				if ($runeset_data[0]->user_id != $_SESSION['USER']['id']){
					$user_stats_data = $user->getStatsById($_SESSION['USER']['id']);

					if ($operator == 'plus'){
						$pollstone_cost_per_point = GamificationModel::upVotePollstoneCostPerPointTable()[$user_stats_data[0]->level];
					}
					else{
						$pollstone_cost_per_point = GamificationModel::downVotePollstoneCostPerPointTable()[$user_stats_data[0]->level];
					}

					$exp_per_votepoint = GamificationModel::expPerVotePointTable()[$user_stats_data[0]->level];

					$cur_pollstone = $user_stats_data[0]->pollstone;
					$vote_cost = $pollstone_cost_per_point * $score_value;
					//verify if the user has enough pollstone
					if ($vote_cost <= $cur_pollstone){
						// deduct pollstone
						$new_pollstone = $cur_pollstone - $vote_cost;
						$user->updatePollstone($_SESSION['USER']['id'], $new_pollstone);

						// add vote
						$cur_score = $rune->getScoresByRunesetsId($rune_id);
						if ($operator == 'plus'){
							// update score-up
							$new_score = $cur_score[0]->up + $score_value;
							$rune->updateScoreUp($rune_id, $new_score);
						}
						else{
							// update score-down
							$new_score = $cur_score[0]->down + ($score_value * -1);
							$rune->updateScoreDown($rune_id, $new_score);
						}

						// give exp to user
						$exp_gained = $exp_per_votepoint * $score_value;
						$cur_level = $user_stats_data[0]->level;
						$cur_exp = $user_stats_data[0]->exp;
						$max_exp = GamificationModel::userExpLevelTable()[$cur_level];
						// levelup
						if ((intval($cur_exp) + intval($exp_gained)) >= intval($max_exp)) {
							$cur_level = intval($cur_level) + 1;
							$cur_exp = (intval($cur_exp) + intval($exp_gained)) - intval($max_exp);

							$new_user_stats_data = $user->getStatsById($_SESSION['USER']['id']);
							$next_level_base_pollstone = GamificationModel::basePollstonePerWeekTable()[$cur_level];
							$new_pollstone = $new_user_stats_data[0]->pollstone + $next_level_base_pollstone;

							$user->updateLevel($_SESSION['USER']['id'], $cur_level);
							$user->updateExp($_SESSION['USER']['id'], $cur_exp);
							$user->updatePollstone($_SESSION['USER']['id'], $new_pollstone);
						}
						else{
							$cur_exp = intval($cur_exp) + intval($exp_gained);

							$user->updateExp($_SESSION['USER']['id'], $cur_exp);
						}



						// update reputation
						// TO DO

						// give exp to combination's user if upvote
						$set_user_id = $runeset_data[0]->user_id;
						if ($operator == 'plus'){
							// give exp to combination's user
							$set_user_stats_data = $user->getStatsById($set_user_id);
							$set_cur_level = $set_user_stats_data[0]->level;
							$set_exp_gained = $score_value * GamificationModel::expPerPersonUpVotePointTable()[$set_cur_level];
							$set_cur_exp = $set_user_stats_data[0]->exp;
							$set_max_exp = GamificationModel::userExpLevelTable()[$set_cur_level];
							// levelup
							if ((intval($set_cur_exp) + intval($set_exp_gained)) >= intval($set_max_exp)) {
								$set_cur_level = intval($set_cur_level) + 1;
								$set_cur_exp = (intval($set_cur_exp) + intval($set_exp_gained)) - intval($set_max_exp);

								$user->updateLevel($set_user_id, $set_cur_level);
								$user->updateExp($set_user_id, $set_cur_exp);
							}
							else{
								$set_cur_exp = intval($set_cur_exp) + intval($set_exp_gained);

								$user->updateExp($set_user_id, $set_cur_exp);
							}

							// update combination's user reputation
							// TO DO
						}

						// log
						if ($operator != 'plus'){
							$log_score = $score_value * -1;
						}
						else{
							$log_score = $score_value;
						}
						$rune->logVotes($_SESSION['USER']['id'], $set_user_id, $rune_id, $log_score);
						
					}

				}
				if ($operator == 'plus') {
					echo '+'.$score_value;
				}
				else{
					echo '-'.$score_value;
				}

				$new_set = $rune->getSetByRunesetsId($rune_id);
				$new_set_score = $new_set[0]->score;
				$new_set_scoreup = $new_set[0]->up;
				$new_set_scoredown = $new_set[0]->down;

				$updated_stats = $user->getStatsById($_SESSION['USER']['id']);
				$max_exp = GamificationModel::userExpLevelTable()[$updated_stats[0]->level];
				$exp = $updated_stats[0]->exp;
				$pollstone = $updated_stats[0]->pollstone;
				$reputation = $updated_stats[0]->reputation;

				echo '
				<script>
				console.log("caca");
				$("#score'.$rune_id.'").html("'.$new_set_score.'");
				$("#scoreup'.$rune_id.'").html("'.$new_set_scoreup.'");
				$("#scoredown'.$rune_id.'").html("'.$new_set_scoredown.'");
				$("#userexp").html("<progress max=\"'.$max_exp.'\" value=\"'.$exp.'\"></progress><div class=\"user_expnumber\">'.$exp.' / '.$max_exp.'</div>");
				$("#pollstone span").html("'.$pollstone.'");
				$("#reputation span").html("'.$reputation.'");
				</script>';
			}
		}
	}
}