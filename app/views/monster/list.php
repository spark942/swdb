<div id="logo">
	<section id="welcome">
		<h1>Welcome to swdb.ws</h1>
		<h2>Summoners War Database</h2>

		<p>This project is made by fans for fans.</p>
		<p>We want to give you the best tool to improve your gaming experience.</p>

	</section>
	<section id="monsters">
		<section id="addform">
		<?php var_dump($data['monster']['grades'][0]); ?>
			<form name="newmonster" action="../../../../../monster/add" method="post">
			Name: 
			<input type="text" name="name"><br />
			Monster family: 
			<select name="monster_family">
				<?php 
				foreach ($data['monster']['families'] as $key => $fdata) {
					echo '<option value="'.$fdata->id.'">'.$fdata->name.'</option>';
				}
				?>
			</select> <br />
			Monster grade: 
			<select name="monster_grade">
				<?php 
				foreach ($data['monster']['grades'] as $key => $gdata) {
					echo '<option value="'.$gdata->id.'" style="background-color: '.$gdata->special_name_color.'">'.$gdata->name.'</option>';
				}
				?>
			</select> <br />
			Monster Property:
			<select name="monster_property">
				<?php 
				foreach ($data['monster']['properties'] as $key => $pdata) {
					echo '<option value="'.$pdata->id.'">'.$pdata->name.'</option>';
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
		<?php var_dump($data['monster']); ?>
	</section>
	<footer>
		
	</footer>
</div>
