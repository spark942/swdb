<div id="logo">
	<section id="welcome">
		<h1>Welcome to swdb.ws</h1>
		<h2>Summoners War Database</h2>

		<p>This project is made by fans for fans.</p>
		<p>We want to give you the best tool to improve your gaming experience.</p>

	</section>
	<section id="monster">
		<section id="img" style="background-image: url('../../../../../../public/images/monsters/<?php echo $data['monster']['show'][0]->monster_image; ?>');">
			<img src="../../../../../../public/images/monsters/<?php echo $data['monster']['show'][0]->monster_image; ?>">
		</section>
		<section id="info">
			<h1>
				<?php echo stripslashes($data['monster']['show'][0]->monster_name) ?>
				<?php 
				echo '<span style="color: ' . $data['monster']['show'][0]->grade_color . ';">' . $data['monster']['show'][0]->grade_special_name . '</span>';
				?>
			</h1>
			<hr>
			<h2 class="monster_property"><?php echo $data['monster']['show'][0]->property_name ?></h2>
			<h2 class="monster_role"><?php echo $data['monster']['show'][0]->role_name ?></h2>
			
		</section>
		<section id="skills">
			<h2><?php echo stripslashes($data['monster']['show'][0]->monster_name) ?>'s skills (coming soon)</h2>
			<div class="skill">
				Leader Skill<br />
				Effect
			</div>
			<div class="skill">
				<div class="description">Skill 1 (test)<br />Description</div>
				<div class="upgrades">
					<table>
						<tbody>
							<tr><td class="skill_level">Nv.2</td><td class="skill_upgrade_bonus">Damage +5%</td></tr>
							<tr><td class="skill_level">Nv.3</td><td class="skill_upgrade_bonus">Weakening Effect Rate +5%</td></tr>
							<tr><td class="skill_level">Nv.4</td><td class="skill_upgrade_bonus">Damage +5%</td></tr>
							<tr><td class="skill_level">Nv.5</td><td class="skill_upgrade_bonus">Weakening Effect Rate +5%</td></tr>
							<tr><td class="skill_level">Nv.6</td><td class="skill_upgrade_bonus">Damage +5%</td></tr>
							<tr><td class="skill_level">Nv.7</td><td class="skill_upgrade_bonus">Weakening Effect Rate +5%</td></tr>
							<tr><td class="skill_level">Nv.8</td><td class="skill_upgrade_bonus">Damage +10%</td></tr>
							<tr><td class="skill_level">Nv.9</td><td class="skill_upgrade_bonus">Damage +20%</td></tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="skill">
				<div class="description">Skill 2 (test)<br />Description</div>
				<div class="upgrades">
					<table>
						<tbody>
							<tr><td class="skill_level">Nv.2</td><td class="skill_upgrade_bonus">Damage +5%</td></tr>
							<tr><td class="skill_level">Nv.3</td><td class="skill_upgrade_bonus">Weakening Effect Rate +5%</td></tr>
							<tr><td class="skill_level">Nv.4</td><td class="skill_upgrade_bonus">Damage +5%</td></tr>
							<tr><td class="skill_level">Nv.5</td><td class="skill_upgrade_bonus">Weakening Effect Rate +5%</td></tr>
							<tr><td class="skill_level">Nv.6</td><td class="skill_upgrade_bonus">Damage +5%</td></tr>
							<tr><td class="skill_level">Nv.7</td><td class="skill_upgrade_bonus">Weakening Effect Rate +5%</td></tr>
							<tr><td class="skill_level">Nv.8</td><td class="skill_upgrade_bonus">Damage +10%</td></tr>
							<tr><td class="skill_level">Nv.9</td><td class="skill_upgrade_bonus">Damage +20%</td></tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="skill">
				<div class="description">Skill 3 (test)<br />Description</div>
				<div class="upgrades">
					<table>
						<tbody>
							<tr><td class="skill_level">Nv.2</td><td class="skill_upgrade_bonus">Damage +5%</td></tr>
							<tr><td class="skill_level">Nv.3</td><td class="skill_upgrade_bonus">Weakening Effect Rate +5%</td></tr>
							<tr><td class="skill_level">Nv.4</td><td class="skill_upgrade_bonus">Damage +5%</td></tr>
							<tr><td class="skill_level">Nv.5</td><td class="skill_upgrade_bonus">Weakening Effect Rate +5%</td></tr>
							<tr><td class="skill_level">Nv.6</td><td class="skill_upgrade_bonus">Damage +5%</td></tr>
							<tr><td class="skill_level">Nv.7</td><td class="skill_upgrade_bonus">Weakening Effect Rate +5%</td></tr>
							<tr><td class="skill_level">Nv.8</td><td class="skill_upgrade_bonus">Damage +10%</td></tr>
							<tr><td class="skill_level">Nv.9</td><td class="skill_upgrade_bonus">Damage +20%</td></tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>
		<section id="stats">
			<h2><?php echo stripslashes($data['monster']['show'][0]->monster_name) ?>'s stats (coming soon)</h2>
			<table>
				<thead>
					<tr>
						<th class="stat_grade">Grade</th>
						<th class="stat_level">Level</th>
						<th class="stat_hp">Base HP</th>
						<th class="stat_atk">Base ATK</th>
						<th class="stat_def">Base DEF</th>
						<th class="stat_spd">Base SPD</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="stat_grade">★★</td>
						<td class="stat_level">1</td>
						<td class="stat_hp">1000 (test)</td>
						<td class="stat_atk">20 (test)</td>
						<td class="stat_def">30 (test)</td>
						<td class="stat_spd">100 (test)</td>
					</tr>
					<tr>
						<td class="stat_grade">★★</td>
						<td class="stat_level">2</td>
						<td class="stat_hp">1000 (test)</td>
						<td class="stat_atk">20 (test)</td>
						<td class="stat_def">30 (test)</td>
						<td class="stat_spd">100 (test)</td>
					</tr>
					<tr>
						<td class="stat_grade">★★</td>
						<td class="stat_level">3</td>
						<td class="stat_hp">1000 (test)</td>
						<td class="stat_atk">20 (test)</td>
						<td class="stat_def">30 (test)</td>
						<td class="stat_spd">100 (test)</td>
					</tr>
					<tr>
						<td class="stat_grade">★★</td>
						<td class="stat_level">4</td>
						<td class="stat_hp">1000 (test)</td>
						<td class="stat_atk">20 (test)</td>
						<td class="stat_def">30 (test)</td>
						<td class="stat_spd">100 (test)</td>
					</tr>
					<tr>
						<td class="stat_grade">★★</td>
						<td class="stat_level">5</td>
						<td class="stat_hp">1000 (test)</td>
						<td class="stat_atk">20 (test)</td>
						<td class="stat_def">30 (test)</td>
						<td class="stat_spd">100 (test)</td>
					</tr>
					<tr>
						<td class="stat_grade">★★</td>
						<td class="stat_level">6</td>
						<td class="stat_hp">1000 (test)</td>
						<td class="stat_atk">20 (test)</td>
						<td class="stat_def">30 (test)</td>
						<td class="stat_spd">100 (test)</td>
					</tr>
					<tr>
						<td class="stat_grade">★★</td>
						<td class="stat_level">7</td>
						<td class="stat_hp">1000 (test)</td>
						<td class="stat_atk">20 (test)</td>
						<td class="stat_def">30 (test)</td>
						<td class="stat_spd">100 (test)</td>
					</tr>
					<tr>
						<td class="stat_grade">★★</td>
						<td class="stat_level">8</td>
						<td class="stat_hp">1000 (test)</td>
						<td class="stat_atk">20 (test)</td>
						<td class="stat_def">30 (test)</td>
						<td class="stat_spd">100 (test)</td>
					</tr>
					<tr>
						<td class="stat_grade">★★</td>
						<td class="stat_level">9</td>
						<td class="stat_hp">1000 (test)</td>
						<td class="stat_atk">20 (test)</td>
						<td class="stat_def">30 (test)</td>
						<td class="stat_spd">100 (test)</td>
					</tr>
					<tr>
						<td class="stat_grade">★★</td>
						<td class="stat_level">10</td>
						<td class="stat_hp">1000 (test)</td>
						<td class="stat_atk">20 (test)</td>
						<td class="stat_def">30 (test)</td>
						<td class="stat_spd">100 (test)</td>
					</tr>
					<tr>
						<td class="stat_grade">★★★★★</td>
						<td class="stat_level">1</td>
						<td class="stat_hp">1750 (test)</td>
						<td class="stat_atk">150 (test)</td>
						<td class="stat_def">100 (test)</td>
						<td class="stat_spd">100 (test)</td>
					</tr>
					<tr>
						<td class="stat_grade">★★★★★</td>
						<td class="stat_level">35</td>
						<td class="stat_hp">3500 (test)</td>
						<td class="stat_atk">300 (test)</td>
						<td class="stat_def">200 (test)</td>
						<td class="stat_spd">100 (test)</td>
					</tr>
					<tr>
						<td class="stat_grade">★★★★★★</td>
						<td class="stat_level">1</td>
						<td class="stat_hp">2500 (test)</td>
						<td class="stat_atk">200 (test)</td>
						<td class="stat_def">150 (test)</td>
						<td class="stat_spd">100 (test)</td>
					</tr>
					<tr>
						<td class="stat_grade">★★★★★★</td>
						<td class="stat_level">40</td>
						<td class="stat_hp">5000 (test)</td>
						<td class="stat_atk">400 (test)</td>
						<td class="stat_def">300 (test)</td>
						<td class="stat_spd">100 (test)</td>
					</tr>
				</tbody>
			</table>
		</section>

		<section id="runes">
			<h2>Runes combinations</h2>
			<?php 
				if (isset($_SESSION['USER']['STAT']['level'])){
					if ($_SESSION['USER']['STAT']['level'] >= 1){
						include('show_addruneset.php');
					}
					else{
						echo '<p>You must be level 1 or above to add a new rune set</p>';
					}
				}
				else{
					echo '<p>You must be logged to share your combinations !</p>';
				}
			?>
			<section id="runesets">
				<?php 
					if (!empty($data['rune']['combinations'])) {
						foreach ($data['rune']['combinations'] as $key => $cdata) {
							if ($cdata->score > -500){
							?>
								<article id="runeset_<?php echo $cdata->id; ?>" class="runecombination">
									<span class="set_name"><?php echo $cdata->set_name; ?></span>&nbsp;&nbsp;
									added&nbsp;by&nbsp;&nbsp;<span class="username"><?php echo $cdata->username; ?></span>
									&nbsp;<span class="user_reputation"><?php echo $cdata->user_reputation; ?>&nbsp;<i class="fa fa-star"></i></span>
									&nbsp;&nbsp;&nbsp;<span class="app_version">(version <?php echo $cdata->app_version; ?>)</span>
									<br />
									<div class="rc_info">
										<div class="rc_score">
											<table>
												<tbody>
													<tr>
														<th colspan="2"><h2>Score</h2></th>
													</tr>
													<tr>
														<th class="score" rowspan="2"><span id="score<?php echo $cdata->id; ?>"><?php echo $cdata->score; ?></span></th>
														<td class="score_up"><span id="scoreup<?php echo $cdata->id; ?>"><?php echo $cdata->up; ?></span>&nbsp;<i class="fa fa-thumbs-up"></i></td>
													</tr>
													<tr>
														<td class="score_down"><span id="scoredown<?php echo $cdata->id; ?>"><?php echo $cdata->down; ?></span>&nbsp;<i class="fa fa-thumbs-down"></i></td>
													</tr>
													<?php 
													if (isset($_SESSION['USER']) && ($cdata->user_id != $_SESSION['USER']['id'])) {
														?>
															<tr>
															<th class="b_vote" colspan="2">
																<button 
																	id="plus10-<?php echo $cdata->id; ?>" 
																	class="plus"
																	<?php if($_SESSION['USER']['STAT']['pollstone'] < (10 * $_SESSION['USER']['STAT']['upvotepollstonecostperpoint'])){echo 'disabled="disabled"';} ?>
																	onclick="vote_rune('#plus10-<?php echo $cdata->id; ?>')"
																	>
																	<span class="amount">+10</span>
																	<div class="vote_tooltip">
																		Consume&nbsp;<span class="pollstone"><?php echo 10 * $_SESSION['USER']['STAT']['upvotepollstonecostperpoint']; ?>&nbsp;<i class="fa fa-ge"></i></span>
																	</div>
																</button>
																<button 
																	id="plus1-<?php echo $cdata->id; ?>" 
																	class="plus"
																	<?php if($_SESSION['USER']['STAT']['pollstone'] < (1 * $_SESSION['USER']['STAT']['upvotepollstonecostperpoint'])){echo 'disabled="disabled"';} ?>
																	onclick="vote_rune('#plus1-<?php echo $cdata->id; ?>')"
																	>
																	<span class="amount">+1</span>
																	<div class="vote_tooltip">
																		Consume&nbsp;<span class="pollstone"><?php echo 1 * $_SESSION['USER']['STAT']['upvotepollstonecostperpoint']; ?>&nbsp;<i class="fa fa-ge"></i></span>
																	</div>
																</button>
																<button 
																	id="less1-<?php echo $cdata->id; ?>" 
																	class="less" 
																	<?php if($_SESSION['USER']['STAT']['pollstone'] < (1 * $_SESSION['USER']['STAT']['downvotepollstonecostperpoint'])){echo 'disabled="disabled"';} ?>
																	onclick="vote_rune('#less1-<?php echo $cdata->id; ?>')"
																	>
																	<span class="amount">-1</span>
																	<div class="vote_tooltip">
																		Consume&nbsp;<span class="pollstone"><?php echo 1 * $_SESSION['USER']['STAT']['downvotepollstonecostperpoint']; ?>&nbsp;<i class="fa fa-ge"></i></span>
																	</div>
																</button>
																<button 
																	id="less10-<?php echo $cdata->id; ?>" 
																	class="less" 
																	<?php if($_SESSION['USER']['STAT']['pollstone'] < (10 * $_SESSION['USER']['STAT']['downvotepollstonecostperpoint'])){echo 'disabled="disabled"';} ?>
																	onclick="vote_rune('#less10-<?php echo $cdata->id; ?>')"
																	>
																	<span class="amount">-10</span>
																	<div class="vote_tooltip">
																		Consume&nbsp;<span class="pollstone"><?php echo 10 * $_SESSION['USER']['STAT']['downvotepollstonecostperpoint']; ?>&nbsp;<i class="fa fa-ge"></i></span>
																	</div>
																</button>
															</th>
														</tr>
														<?php
													}
													?>
													
												</tbody>
											</table>
										</div>
										<div class="rc_desc"><p class="set_desc"><?php echo $cdata->set_desc; ?></p></div>
										<div class="rc_rune">
											<table>
												<tbody>
													<tr>
														<th>Rune&nbsp;(1)</th>
														<th>Rune&nbsp;(2)</th>
														<th>Rune&nbsp;(3)</th>
														<th>Rune&nbsp;(4)</th>
														<th>Rune&nbsp;(5)</th>
														<th>Rune&nbsp;(6)</th>
													</tr>
													<tr>
														<td><?php echo $cdata->set1_name; ?></td>
														<td><?php echo $cdata->set2_name; ?></td>
														<td><?php echo $cdata->set3_name; ?></td>
														<td><?php echo $cdata->set4_name; ?></td>
														<td><?php echo $cdata->set5_name; ?></td>
														<td><?php echo $cdata->set6_name; ?></td>
													</tr>
													<tr>
														<td><?php echo $cdata->p1_name; ?></td>
														<td><?php echo $cdata->p2_name; ?></td>
														<td><?php echo $cdata->p3_name; ?></td>
														<td><?php echo $cdata->p4_name; ?></td>
														<td><?php echo $cdata->p5_name; ?></td>
														<td><?php echo $cdata->p6_name; ?></td>
													</tr>
													<tr>
														<th colspan="3">Suitable Secondary Stats</th>
														<th colspan="3">Not suitable Secondary Stats</th>
													</tr>
													<tr>
														<td style="color:#2ecc71;" colspan="3">
															<?php if(!empty($cdata->ss1_name)){echo $cdata->ss1_name .'&nbsp;&nbsp;';} ?> 
															<?php if(!empty($cdata->ss2_name)){echo $cdata->ss2_name .'&nbsp;&nbsp;';} ?>
															<?php echo $cdata->ss3_name; ?>
														</td>
														<td style="color:#e74c3c;" colspan="3">
															<?php if(!empty($cdata->nss1_name)){echo $cdata->nss1_name .'&nbsp;&nbsp;';} ?> 
															<?php if(!empty($cdata->nss2_name)){echo $cdata->nss2_name .'&nbsp;&nbsp;';} ?>
															<?php echo $cdata->nss3_name; ?>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									
								</article>
							<?php
							}
						}
					}
					else{
						echo '<p>No rune combination, be the first to add one!</p>';
					}
				?>		
			</section>
		</section>
		<section id="family">
			<h2><?php echo $data['monster']['show'][0]->family_name ?> family</h2>
			<?php 
				foreach ($data['monster']['show']['family'] as $key => $fdata) {
					?>
					<div class="family_member">
						<div 
							class="fmember_image" 
							style="background-image: url('../../../../../../public/images/monsters/<?php echo $fdata->monster_image; ?>');"
							></div>
						<div class="fmember_info">
							<?php echo '<a href="../../../../../../monster/' . $fdata->absolute_monster_name . '">' . stripslashes($fdata->monster_name) . '</a>' ?>
							&nbsp;<?php echo '<span style="color: ' . $fdata->grade_color . ';">' . $fdata->grade_special_name . '</span>' ?>
							<br />
							<?php echo $fdata->property_name ?> | 
							<?php echo $fdata->role_name ?>
						</div>
					</div>
					<?php
				}
			?>
		</section>
	</section>
</div>
