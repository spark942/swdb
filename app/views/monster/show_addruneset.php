<label id="displayform" for="newset"><h3 >Add a new rune combination set</h3></label>
						<input type="checkbox" id="newset">
						<section id="new_rune_set">
							<form action="../../../../../rune/saveset" method="post">
								<input type="hidden" name="monster" value="<?php echo $data['monster']['show'][0]->absolute_monster_name ?>">
								<input id="new_set_name" type="text" name="set_name" minlength="3" maxlength="32" pattern="^[a-zA-Z0-9][\w\s-]{1,30}[a-zA-Z0-9]$" placeholder="Name your set (3 to 32 characters)" required>
								&nbsp;/!\ Members may vote your set, it will be hidden if its score is less than -500<br />
								<textarea id="new_set_desc" name="set_desc" maxlength="255" placeholder="Short description of this combination (255 chars max) ENGLISH PLEASE OR SPECIFY [FR] ..." pattern=".{3,255}" required></textarea>
								<input id="new_set_submit" type="submit" value="Add this combination">
								<table id="new_rune_table_left">
									<thead>
										<tr>
											<th class="new_rune_set_pos">Position</th>
											<th class="new_rune_set_set">Set (Negligible order)</th>
											<th>Primary Stat</th>
											</tr>
									</thead>
									<tbody>
										<tr>
											<td class="new_rune_set_pos">Rune (1)</td>
											<td class="new_rune_set_set">
												<select name="set-1">
													<optgroup label="Normal Area">
														<option value="1" selected="selected">Energy (2Set) HP +15%</option>
														<option value="2">Fatal (4Set) ATK +30%</option>
														<option value="3">Blade (2Set) CRI Rate +12%</option>
														<option value="4">Rage (4Set) CRI Dmg +40%</option>
														<option value="5">Swift (4Set) SPD +25%</option>
														<option value="6">Focus (2Set) Effect ACC +20%</option>
														<option value="7">Guard (2Set) DEF +15%</option>
														<option value="8">Endure (2Set) Effect RES +20%</option>
														<option value="9">Violent (4Set) Extra Turn +20%</option>
													</optgroup>
													<optgroup label="Cairos Dungeon">
														<option value="10">Vampire (4Set) Bloodsucking +35%</option>
														<option value="11">Despair (4Set) Stun Rate +25%</option>
													</optgroup>
												</select>
											</td>
											<td class="new_rune_set_stat">
												<select name="primary-1">
													<?php 
													if (isset($data['rune']['stats'])) {
														foreach ($data['rune']['stats'] as $key => $rsvalue) {
															if ($rsvalue->rune_pos == '1'){
																echo '<option value="' . $rsvalue->stat_id . '">' . $rsvalue->stat_name . '</option>';
															}
														}
													}
													?>
												</select>
											</td>
										</tr>
										<tr>
											<td class="new_rune_set_pos">Rune (2)</td>
											<td class="new_rune_set_set">
												<select name="set-2">
													<optgroup label="Normal Area">
														<option value="1" selected="selected">Energy (2Set) HP +15%</option>
														<option value="2">Fatal (4Set) ATK +30%</option>
														<option value="3">Blade (2Set) CRI Rate +12%</option>
														<option value="4">Rage (4Set) CRI Dmg +40%</option>
														<option value="5">Swift (4Set) SPD +25%</option>
														<option value="6">Focus (2Set) Effect ACC +20%</option>
														<option value="7">Guard (2Set) DEF +15%</option>
														<option value="8">Endure (2Set) Effect RES +20%</option>
														<option value="9">Violent (4Set) Extra Turn +20%</option>
													</optgroup>
													<optgroup label="Cairos Dungeon">
														<option value="10">Vampire (4Set) Bloodsucking +35%</option>
														<option value="11">Despair (4Set) Stun Rate +25%</option>
													</optgroup>
												</select>
											</td>
											<td class="new_rune_set_stat">
												<select name="primary-2">
													<?php 
													if (isset($data['rune']['stats'])) {
														foreach ($data['rune']['stats'] as $key => $rsvalue) {
															if ($rsvalue->rune_pos == '2'){
																echo '<option value="' . $rsvalue->stat_id . '">' . $rsvalue->stat_name . '</option>';
															}
														}
													}
													?>
												</select>
											</td>
										</tr>
										<tr>
											<td class="new_rune_set_pos">Rune (3)</td>
											<td class="new_rune_set_set">
												<select name="set-3">
													<optgroup label="Normal Area">
														<option value="1" selected="selected">Energy (2Set) HP +15%</option>
														<option value="2">Fatal (4Set) ATK +30%</option>
														<option value="3">Blade (2Set) CRI Rate +12%</option>
														<option value="4">Rage (4Set) CRI Dmg +40%</option>
														<option value="5">Swift (4Set) SPD +25%</option>
														<option value="6">Focus (2Set) Effect ACC +20%</option>
														<option value="7">Guard (2Set) DEF +15%</option>
														<option value="8">Endure (2Set) Effect RES +20%</option>
														<option value="9">Violent (4Set) Extra Turn +20%</option>
													</optgroup>
													<optgroup label="Cairos Dungeon">
														<option value="10">Vampire (4Set) Bloodsucking +35%</option>
														<option value="11">Despair (4Set) Stun Rate +25%</option>
													</optgroup>
												</select>
											</td>
											<td class="new_rune_set_stat">
												<select name="primary-3">
													<?php 
													if (isset($data['rune']['stats'])) {
														foreach ($data['rune']['stats'] as $key => $rsvalue) {
															if ($rsvalue->rune_pos == '3'){
																echo '<option value="' . $rsvalue->stat_id . '">' . $rsvalue->stat_name . '</option>';
															}
														}
													}
													?>
												</select>
											</td>
										</tr>
										<tr>
											<td class="new_rune_set_pos">Rune (4)</td>
											<td class="new_rune_set_set">
												<select name="set-4">
													<optgroup label="Normal Area">
														<option value="1" selected="selected">Energy (2Set) HP +15%</option>
														<option value="2">Fatal (4Set) ATK +30%</option>
														<option value="3">Blade (2Set) CRI Rate +12%</option>
														<option value="4">Rage (4Set) CRI Dmg +40%</option>
														<option value="5">Swift (4Set) SPD +25%</option>
														<option value="6">Focus (2Set) Effect ACC +20%</option>
														<option value="7">Guard (2Set) DEF +15%</option>
														<option value="8">Endure (2Set) Effect RES +20%</option>
														<option value="9">Violent (4Set) Extra Turn +20%</option>
													</optgroup>
													<optgroup label="Cairos Dungeon">
														<option value="10">Vampire (4Set) Bloodsucking +35%</option>
														<option value="11">Despair (4Set) Stun Rate +25%</option>
													</optgroup>
												</select>
											</td>
											<td class="new_rune_set_stat">
												<select name="primary-4">
													<?php 
													if (isset($data['rune']['stats'])) {
														foreach ($data['rune']['stats'] as $key => $rsvalue) {
															if ($rsvalue->rune_pos == '4'){
																echo '<option value="' . $rsvalue->stat_id . '">' . $rsvalue->stat_name . '</option>';
															}
														}
													}
													?>
												</select>
											</td>
										</tr>
										<tr>
											<td class="new_rune_set_pos">Rune (5)</td>
											<td class="new_rune_set_set">
												<select name="set-5">
													<optgroup label="Normal Area">
														<option value="1" selected="selected">Energy (2Set) HP +15%</option>
														<option value="2">Fatal (4Set) ATK +30%</option>
														<option value="3">Blade (2Set) CRI Rate +12%</option>
														<option value="4">Rage (4Set) CRI Dmg +40%</option>
														<option value="5">Swift (4Set) SPD +25%</option>
														<option value="6">Focus (2Set) Effect ACC +20%</option>
														<option value="7">Guard (2Set) DEF +15%</option>
														<option value="8">Endure (2Set) Effect RES +20%</option>
														<option value="9">Violent (4Set) Extra Turn +20%</option>
													</optgroup>
													<optgroup label="Cairos Dungeon">
														<option value="10">Vampire (4Set) Bloodsucking +35%</option>
														<option value="11">Despair (4Set) Stun Rate +25%</option>
													</optgroup>
												</select>
											</td>
											<td class="new_rune_set_stat">
												<select name="primary-5">
													<?php 
													if (isset($data['rune']['stats'])) {
														foreach ($data['rune']['stats'] as $key => $rsvalue) {
															if ($rsvalue->rune_pos == '5'){
																echo '<option value="' . $rsvalue->stat_id . '">' . $rsvalue->stat_name . '</option>';
															}
														}
													}
													?>
												</select>
											</td>
										</tr>
										<tr>
											<td class="new_rune_set_pos">Rune (6)</td>
											<td class="new_rune_set_set">
												<select name="set-6">
													<optgroup label="Normal Area">
														<option value="1" selected="selected">Energy (2Set) HP +15%</option>
														<option value="2">Fatal (4Set) ATK +30%</option>
														<option value="3">Blade (2Set) CRI Rate +12%</option>
														<option value="4">Rage (4Set) CRI Dmg +40%</option>
														<option value="5">Swift (4Set) SPD +25%</option>
														<option value="6">Focus (2Set) Effect ACC +20%</option>
														<option value="7">Guard (2Set) DEF +15%</option>
														<option value="8">Endure (2Set) Effect RES +20%</option>
														<option value="9">Violent (4Set) Extra Turn +20%</option>
													</optgroup>
													<optgroup label="Cairos Dungeon">
														<option value="10">Vampire (4Set) Bloodsucking +35%</option>
														<option value="11">Despair (4Set) Stun Rate +25%</option>
													</optgroup>
												</select>
											</td>
											<td class="new_rune_set_stat">
												<select name="primary-6">
													<?php 
													if (isset($data['rune']['stats'])) {
														foreach ($data['rune']['stats'] as $key => $rsvalue) {
															if ($rsvalue->rune_pos == '6'){
																echo '<option value="' . $rsvalue->stat_id . '">' . $rsvalue->stat_name . '</option>';
															}
														}
													}
													?>
												</select>
											</td>
										</tr>
									</tbody>
								</table>
								<table id="new_rune_table_right">
									<thead>
										<tr>
											<th style="width: 220px;">Recommendation about secondary stats</th>
											<th>Secondary Stat</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="new_rune_set_stat"><span style="color: #2ecc71;">Suitable</span>&nbsp;Secondary Stat&nbsp;1&nbsp;(optional)</td>
											<td class="new_rune_set_stat">
												<select name="ssecondary1">
													<option value="0" selected="selected"></option>
													<?php 
													if (isset($data['rune']['stats'])) {
														foreach ($data['rune']['stats'] as $key => $rsvalue) {
															if ($rsvalue->rune_pos == '0'){
																echo '<option value="' . $rsvalue->stat_id . '">' . $rsvalue->stat_name . '</option>';
															}
														}
													}
													?>
												</select>
											</td>
										</tr>
										<tr>
											<td class="new_rune_set_stat"><span style="color: #2ecc71;">Suitable</span>&nbsp;Secondary Stat&nbsp;2&nbsp;(optional)</td>
											<td class="new_rune_set_stat">
												<select name="ssecondary2">
													<option value="0" selected="selected"></option>
													<?php 
													if (isset($data['rune']['stats'])) {
														foreach ($data['rune']['stats'] as $key => $rsvalue) {
															if ($rsvalue->rune_pos == '0'){
																echo '<option value="' . $rsvalue->stat_id . '">' . $rsvalue->stat_name . '</option>';
															}
														}
													}
													?>
												</select>
											</td>
										</tr>
										<tr>
											<td class="new_rune_set_stat"><span style="color: #2ecc71;">Suitable</span>&nbsp;Secondary Stat&nbsp;3&nbsp;(optional)</td>
											<td class="new_rune_set_stat">
												<select name="ssecondary3">
													<option value="0" selected="selected"></option>
													<?php 
													if (isset($data['rune']['stats'])) {
														foreach ($data['rune']['stats'] as $key => $rsvalue) {
															if ($rsvalue->rune_pos == '0'){
																echo '<option value="' . $rsvalue->stat_id . '">' . $rsvalue->stat_name . '</option>';
															}
														}
													}
													?>
												</select>
											</td>
										</tr>
										<tr>
											<td class="new_rune_set_stat"><span style="color: #f76c5c;">Not&nbsp;Suitable</span>&nbsp;Secondary Stat&nbsp;1&nbsp;(optional)</td>
											<td class="new_rune_set_stat">
												<select name="nssecondary1">
													<option value="0" selected="selected"></option>
													<?php 
													if (isset($data['rune']['stats'])) {
														foreach ($data['rune']['stats'] as $key => $rsvalue) {
															if ($rsvalue->rune_pos == '0'){
																echo '<option value="' . $rsvalue->stat_id . '">' . $rsvalue->stat_name . '</option>';
															}
														}
													}
													?>
												</select>
											</td>
										</tr>
										<tr>
											<td class="new_rune_set_stat"><span style="color: #f76c5c;">Not&nbsp;Suitable</span>&nbsp;Secondary Stat&nbsp;2&nbsp;(optional)</td>
											<td class="new_rune_set_stat">
												<select name="nssecondary2">
													<option value="0" selected="selected"></option>
													<?php 
													if (isset($data['rune']['stats'])) {
														foreach ($data['rune']['stats'] as $key => $rsvalue) {
															if ($rsvalue->rune_pos == '0'){
																echo '<option value="' . $rsvalue->stat_id . '">' . $rsvalue->stat_name . '</option>';
															}
														}
													}
													?>
												</select>
											</td>
										</tr>
										<tr>
											<td class="new_rune_set_stat"><span style="color: #f76c5c;">Not&nbsp;Suitable</span>&nbsp;Secondary Stat&nbsp;3&nbsp;(optional)</td>
											<td class="new_rune_set_stat">
												<select name="nssecondary3">
													<option value="0" selected="selected"></option>
													<?php 
													if (isset($data['rune']['stats'])) {
														foreach ($data['rune']['stats'] as $key => $rsvalue) {
															if ($rsvalue->rune_pos == '0'){
																echo '<option value="' . $rsvalue->stat_id . '">' . $rsvalue->stat_name . '</option>';
															}
														}
													}
													?>
												</select>
											</td>
										</tr>
									</tbody>
								</table>
							</form>
						</section>