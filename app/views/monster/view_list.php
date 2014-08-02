<table>
				<thead>
					<tr>
						<th>Update</th>
						<th>Img</th>
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
							echo '<img src="../../../../../../public/images/monsters/' . $value->monster_image . '" >';
							?>
							</td>
							<td class="monster_name">
							<?php 
							echo '<a href="../../../../../../monster/'
								. strtolower($value->property_name)
								. '-'
								. strtolower(strtr(stripslashes($value->monster_name), array(" " => "_", "'" => "")))
								. '" style="color: ' 
								. $value->grade_color 
								. ';">' 
								. stripslashes($value->monster_name) . '</a>';
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