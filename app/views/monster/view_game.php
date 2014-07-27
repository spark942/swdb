<div id="view_game">
	<?php 
	$data['monster']['list'] = array_reverse($data['monster']['list']);
	foreach ($data['monster']['list'] as $key => $value) {
		?>
		<div class="monsters_list_game_icon" <?php 
			echo 'style="background-image: url(\'../../../../../../public/images/monsters/' . $value->monster_image . '\');"';
			?>
			>
			<?php 
			echo '&nbsp;<span style="font-size: 1.6em; letter-spacing: -0.36em; color: ' . $value->grade_color . ';">' . $value->grade_special_name . '</span>';
			?>
		</div>
		<?php
	}
	?>
</div>