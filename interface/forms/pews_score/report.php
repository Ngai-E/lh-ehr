<?php
	include_once(dirname(__FILE__).'/../../globals.php');
	include_once($GLOBALS["srcdir"]."/api.inc");
	function pews_score_report( $pid, $encounter, $cols, $id) {
		$count = 0;
		$data = formFetch("form_pews_score", $id);
		if ($data) {
			echo "<p style='font-size: 1.2em'>PEWS Score</p>";
			print "<table><tr>";
			foreach($data as $key => $value) {
				$value = trim($value);
				if ($key == "id" || $key == "pid" || $key == "user" || $key == "groupname" || $key == "authorized" || $key == "activity" || $key == "date" || 
					$value == "" || $value == "0" || $value == "0.00" || $value == NULL || $value == " " || $value == "0000-00-00 00:00:00") {
					continue;
				}
				switch ($key) {
					case 'pews_behavior':
						switch ($value) {
							case 0:
								$value =   '<p> 0 - Playing/ Appropriate OR Sleeping comfortably </p>';
								break;
							case 1:
								$value =   '<p> 1 - Irritable and consolable </p>';
								break;
							case 2:
								$value =   '<p> 2 - Irritable and NOT consolable </p>';
								break;
							case 3:
								$value =   '<p> 3 - Lethargic, Confused or Reduced Response to pain - Call Staff Physician and Junior Resident </p>'; 
								break;
						}
						$key = 'PEWS Behavior';
						break;
					case 'pews_card':
						switch ($value) {
							case 0:
								$value =   '<p> 0 - Pink or capillary refill time < 1-2 seconds </p>';
								break;
							case 1:
								$value =   '<p> 1 - Pale <br>OR capillary refill time 3 seconds </p>';
								break;
							case 2:
								$value =   '<p> 2 - Grey or capillary refill time 4 seconds, <br>OR heart rate 20 above or below normal rate for age </p>';
								break;
							case 3:
								$value =   '<p> 3 - Grey and mottled or capillary refill time > 4 seconds, <br>OR heart rate 30 above or below normal heart rate for age - Call Staff Physician and Junior Resident </p>';
								break;
						}
						$key = 'PEWS Cardiovascular ';
						break;
					case 'pews_resp':
						switch ($value) {
							case 0:
								$value =   '<p> 0 - Within normal rate, no retractions, <br>AND SpO2 98- 100% on RA </p>';
								break;
							case 1:
								$value =   '<p> 1 - RR > 10 above normal limits, <br> OR SpO2 98- 100% on any O2 device <br> OR SpO2 94-97% on RA OR using accessory muscles  </p>'; 
								break;
							case 2:
								$value =   '<p> 2 - RR > 20 above normal limits <br> OR SpO2 90-93% <br>OR Retractions </p>'; 
								break;
							case 3:
								$value =   '<p> 3 - RR 5 below normal <br> OR SpO2 < 90% <br> OR Retractions and/or grunting - Call Staff Physician and Junior Resident </p>';
								break;
						}
						$key = 'PEWS Respiratory ';
						break;
					case 'pews_total':
						switch ($value) {
							case 0: case 1: case 2: case 3:
								$value = '<p>' . $value . '-' .  'No action needed, reassess as per order </p>';
								break;
							case 4: case 5: case 6:
								$value = '<p>' . $value . '-' .   'Notify Charge Nurse, Call Junior Resident, & notify Staff Physician </p>';
								break;
							case 7: case 8: case 9:
								$value = '<p style="color:red">' . $value . '-' .  'Call the Rapid Response Team, Call Staff Physician and Junior Resident </p>';
								break;
						}
						$key = 'PEWS Total Score';
						break;
					case 'pews_interventions':
						$key = 'Interventions';
						break;
					case 'pews_disposition':
						$key = 'Disposition';
						break;
				}

				print "<td style='padding: 10px'><span class='bold'>$key </span></td>";
				print "<td style='padding: 10px'><span class='text'>$value </span></td>";

				
				print "</tr><tr>\n";
				
			}
		}
		print "</tr></table>";
	}
?>