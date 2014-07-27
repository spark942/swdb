<div id="logo">
	<section id="welcome">
		<h1>Welcome to swdb.ws</h1>
		<h2>Summoners War Database</h2>

		<p>This project is made by fans for fans.</p>
		<p>We want to give you the best tool to improve your gaming experience.</p>

	</section>
	<section id="monsters">
	<?php 
		if (isset($_SESSION['user_level']) && ($_SESSION['user_level'] >= 50)) {
			?>
			<section id="addform">
			<h1>Add a new monster</h1>
			<form name="newmonster" action="../../../../../monster/add" method="post">
			Summoners War version: 
			<select name="app_version">
				<?php 
				foreach ($data['sw']['app_versions'] as $key => $vdata) {
					echo '<option value="'.$vdata->id.'">'.$vdata->date.' _ version '.$vdata->version.'</option>';
				}
				?>
			</select> <br />
			Monster Property:
			<select name="monster_property">
				<?php 
				foreach ($data['monster']['properties'] as $key => $pdata) {
					if ($pdata->id >= 5) {
						echo '<option value="'.$pdata->id.'">'.$pdata->name.'</option>';
					}
				}
				?>
			</select> <br />
			Monster grade: 
			<select name="monster_grade">
				<?php 
				foreach ($data['monster']['grades'] as $key => $gdata) {
					if ($gdata->id >= 1){
						echo '<option value="'.$gdata->id.'" style="background-color: '.$gdata->special_name_color.'">'.$gdata->name.' - '.$gdata->description.'</option>';
					}
				}
				?>
			</select> <br />
			Name: 
			<input type="text" name="name" autofocus><br />
			Monster family: 
			<select name="monster_family">
				<?php 
				foreach ($data['monster']['families'] as $key => $fdata) {
					echo '<option value="'.$fdata->id.'">'.$fdata->name.'</option>';
				}
				?>
			</select> <br />
			Monster Role:
			<select name="monster_role">
				<?php 
				foreach ($data['monster']['roles'] as $key => $rdata) {
					echo '<option value="'.$rdata->id.'">'.$rdata->name.'</option>';
				}
				?>
			</select> <br />
			<input type="submit" value="Submit">
			</form> 
		</section>
			<?php
		}
	?>
		

		<section id="list">
			<h1>Monster List (<?php echo count($data['monster']['list']); ?>)</h1>
			<div>Views : <a href="../../../../../../monsters/0/1">List</a> | <a href="../../../../../../monsters/0/0">Game</a></div>
			<?php 
				if ($_SESSION['pref']['monsters']['view'] == 0) {
					include('view_game.php');
				}
				else{
					include('view_list.php');
				}
			?>
		</section>
	</section>
	<footer>
		
	</footer>
</div>
