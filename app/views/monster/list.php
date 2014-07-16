<div id="logo">
	<section id="welcome">
		<h1>Welcome to swdb.ws</h1>
		<h2>Summoners War Database</h2>

		<p>This project is made by fans for fans.</p>
		<p>We want to give you the best tool to improve your gaming experience.</p>

	</section>
	<section id="monsters">
		<section id="addform">
			<h1>Add a new monster</h1>
			<form name="newmonster" action="../../../../../monster/add" method="post">
			Name: 
			<input type="text" name="name"><br />
			Summoners War version: 
			<select name="app_version">
				<?php 
				foreach ($data['sw']['app_versions'] as $key => $vdata) {
					echo '<option value="'.$vdata->id.'">'.$vdata->date.' _ version '.$vdata->version.'</option>';
				}
				?>
			</select> <br />
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
					echo '<option value="'.$gdata->id.'" style="background-color: '.$gdata->special_name_color.'">'.$gdata->name.' - '.$gdata->description.'</option>';
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
		<section id="list">
			<h1>Monster List</h1>
			<table>
				<thead>
					<tr>
						<th>Version added</th>
						<th>Image</th>
						<th>Name</th>
						<th>Base grade</th>
						<th>Property</th>
						<th>Role</th>
						<th>Family</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$count = 0;
					foreach ($data['monster']['list'] as $key => $value) {
						?>
						<tr class="<?php echo (++$count%2 ? "reg" : "alt"); ?>">
							<td class="app_version">
							<?php 
							echo '' . $value->app_version . '';
							?>
							</td>
							<td class="monster_image">
							<?php 
							echo '<img src="' . $value->monster_image . '" >';
							?>
							</td>
							<td class="monster_name">
							<?php 
							echo '' . $value->monster_name . '';
							?>
							</td>
							<td class="grade">
							<?php 
							echo '<span style="color: ' . $value->grade_color . ';">' . $value->grade_special_name . '</span>';
							?>
							</td>
							<td class="property_name">
							<?php 
							echo '' . $value->property_name . '';
							?>
							</td>
							<td class="role_name">
							<?php 
							echo '' . $value->role_name . '';
							?>
							</td>
							<td class="family_name">
							<?php 
							echo '' . $value->family_name . '';
							?>
							</td>
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
		</section>
	</section>
	<footer>
		
	</footer>
</div>
