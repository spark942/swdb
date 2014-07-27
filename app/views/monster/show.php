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
			<p>You must be logged to share your combinations !</p>
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
	<footer>
		
	</footer>
</div>
