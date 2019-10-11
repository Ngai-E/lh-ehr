<?php

$fake_register_globals=false;
$sanitize_all_escapes=true;

include_once("../../globals.php");
include_once("$srcdir/api.inc");
include_once("$srcdir/headers.inc.php");
formHeader("Education Form");
$returnurl = 'encounter_top.php';
?>
<html>
	<head>
		<?php html_header_show();?>
		<?php call_required_libraries(['bootstrap', 'jquery-min-1-9-1', 'font-awesome']); ?>
		<link rel="stylesheet" href="<?php echo $css_header;?>" type="text/css">
		<style>
			table, th, td {
			  border: 0px;
			  border-collapse: collapse;
			}
			.text {
				font-size: 1.4em;
			}
			.title {
				    width: fit-content;
				    margin: auto;
				    margin-bottom: 30px;
			}
			.warning {
				color: red;
			}
			th, td {
			  padding: 5px;
			  text-align: left;    
			}
			.col-sm-6 ,.col-md-3{
				padding-left: 3px;
				padding-right: 3px;
			}
			.customStyle {
				    margin: unset;
				    width: unset;
					margin-top: 12px;
			}
			@media only screen and (min-width: 600px) {
				.customStyle {
				    margin-left: auto;
				    margin-right: auto;
				    max-width: 600px
			}
			}
			input:focus, textarea:focus, select:focus {
				border-color: #ca1278 !important;
				border-width: 2px !important;
			}
		</style>
	</head>
<body>
	<form method=post action="<?php echo $rootdir;?>/forms/pews_score/save.php?mode=new" name="my_form" onsubmit="beforeSubmit(); return top.restoreSession()">
		<div class="row">
			<div class="col-md-4">
				<!-- Save/Cancel buttons -->
				<input type="submit" id="save" class="btn btn-success" value="<?php echo xla('Save'); ?>"> &nbsp;
				<input type="button" id="dontsave" class="deleter btn btn-danger" value="<?php echo xla('Cancel'); ?>"> &nbsp;
			</div>
		</div>
		<div class="col-sm-12" ><h1 class="title"><strong><?php xl('PEWS Score','e'); ?></strong></h1></div>
		<div class="row">
		<div class="col-sm-12 col-md-6 ">
			<div class="panel panel-primary customStyle">
				<div class="panel-heading">
					<h3 class="panel-title"><?php xl('PEWS Behaviour','e'); ?></h3>
				</div>
				<div class="panel-body">
					<div class="radio">
						<div class="radio"><label><input type="radio" value="0"    onchange="onInputChange('behavior', this)" name='pews_behavior'  ><span class="text">
							<?php echo xl('0: Playing/ Appropriate OR Sleeping comfortably'); ?></span></label> </div>
						<div class="radio"><label><input type="radio" value="1" onchange="onInputChange('behavior', this)" name='pews_behavior'  ><span class="text">
							<?php xl('1: Irritable and consolable','e'); ?>
						</span></label> </div>
						<div class="radio"><label><input type="radio" value="2" onchange="onInputChange('behavior', this)" name='pews_behavior'  ><span class="text"><?php xl('2: Irritable and NOT consolable','e'); ?></span></label> </div>

						<div class="radio"><label><input type="radio" value="3" onchange="onInputChange('behavior', this)" name='pews_behavior'  ><span class="text" id="behaviorMax"><?php xl('3: Lethargic, Confused or Reduced Response to pain - Call Staff Physician and Junior Resident','e'); ?></span></label> </div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-6">
			<div class="panel panel-primary customStyle">
				<div class="panel-heading">
					<h3 class="panel-title"><?php xl('PEWS Cardiovascular','e'); ?></h3>
				</div>
				<div class="panel-body">
					<div class="radio"><label><input type="radio" value="0"    onchange="onInputChange('cardiacVascular', this)" name='pews_card'  ><span class="text">
						<?php xl('0: Pink or capillary refill time < 1-2 seconds','e'); ?></span></label> </div>
					<div class="radio"><label><input type="radio" value="1" onchange="onInputChange('cardiacVascular', this)" name='pews_card'  ><span class="text">
						<?php xl('1: "Pale <br>OR capillary refill time 3 seconds"','e'); ?>
					</span></label> </div>
					<div class="radio"><label><input type="radio" value="2" onchange="onInputChange('cardiacVascular', this)" name='pews_card'  ><span class="text"><?php xl('2: "Grey or capillary refill time 4 seconds, <br>OR heart rate 20 above or below normal rate for age"','e'); ?></span></label> </div>

					<div class="radio"><label><input type="radio" value="3" onchange="onInputChange('cardiacVascular', this)" name='pews_card'  ><span class="text" id="cardiacVascularMax"><?php xl('3: "Grey and mottled or capillary refill time > 4 seconds, <br>OR heart rate 30 above or below normal heart rate for age - Call Staff Physician and Junior Resident"','e'); ?></span></label> </div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-6">
			<div class="panel panel-primary customStyle">
				<div class="panel-heading">
					<h3 class="panel-title"><?php xl('PEWS Respiratory','e'); ?></h3>
				</div>
				<div class="panel-body">
					<div class="radio"><label><input type="radio" value="0"    onchange="onInputChange('respiratory', this)"  name='pews_resp'  >
						<span class="text">
							<?php xl('0: "Within normal rate, no retractions, <br>AND SpO2 98- 100% on RA"','e'); ?>						
						</span></label> 
					</div>
					<div class="radio"><label><input type="radio" value="1" onchange="onInputChange('respiratory', this)"  name='pews_resp'  >
						<span class="text">
							<?php 
							xl('1: "RR > 10 above normal limits, <br> OR SpO2 98- 100% on any O2 device <br> OR SpO2 94-97% on RA OR using accessory muscles "','e'); 
							?>
						</span></label> 
					</div>
					<div class="radio"><label><input type="radio" value="2" onchange="onInputChange('respiratory', this)"  name='pews_resp'  >
						<span class="text" id="respiratoryMax">
							<?php xl('2: "RR > 20 above normal limits <br> OR SpO2 90-93% <br>OR Retractions"','e'
								); 
							?>
							
						</span></label> 
					</div>
					<div class="radio"><label><input type="radio" value="3" onchange="onInputChange('respiratory', this)"  name='pews_resp'  >
						<span class="text"><?php xl('3: "RR 5 below normal <br> OR SpO2 < 90% <br> OR Retractions and/or grunting - Call Staff Physician and Junior Resident"','e'
								); ?>
								
						</span></label> 
					</div>
				</div>
			</div>
		</div> 
		<div class="col-sm-12 col-md-6">
			<div class="panel panel-primary customStyle">
				<div class="panel-heading">
					<h3 class="panel-title"><?php xl('PEWS Summary','e'); ?></h3>
				</div>
				<div class="panel-body" style="display:flex; flex-direction: column">	
					<div class="form-group">
						<label class="control-label text col-sm-4" for="pews_total">PEWS Total Score: </label>
						<div class="col-sm-6" style="margin-bottom: 20px;">
							<p id="total_value" class="text">0</p>
							<input hidden="hidden"   name="pews_total">
							<p id="total_description">No action needed, reassess as per order</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label text col-sm-4" for="pews_interventions">Interventions</label>
						<div class="col-sm-6" style="margin-bottom: 20px;">
							<textarea class="form-control" id="pews_interventions" name="pews_interventions"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label text col-sm-4" for="pews_disposition">Disposition</label>
						<div class="col-sm-6" style="margin-bottom: 20px;">
							<textarea class="form-control" id="pews_disposition" name="pews_disposition"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<div>
			<!-- Save/Cancel buttons -->
			<input type="submit" id="save" class='btn btn-success' value="<?php echo xla('Save'); ?>"> &nbsp;
			<input type="button" id="dontsave" class="deleter btn btn-danger" value="<?php echo xla('Cancel'); ?>"> &nbsp;
		</div>
	</form>

	<script>
		let cardiacVascular = respiratory = behavior = total = 0;
		const MAX = 3;
		$(document).ready(function() { 
			$('#total_value').html(total + ''); 
		});

		function onInputChange(type, element) {
			let value = Number($(element).val());
			switch (type) {
				case 'respiratory':
					respiratory = value;
					if (value === MAX ) {
						$("#respiratoryMax").addClass("warning");
					} else {
						$("#respiratoryMax").removeClass("warning");
					}
					break;
				case 'behavior':
					behavior = value;
					if (value === MAX ) {
						$("#behaviorMax").addClass("warning");
					} else {
						$("#behaviorMax").removeClass("warning");
					}
					break;
				case 'cardiacVascular':
					cardiacVascular = value;
					if (value === MAX ) {
						$("#cardiacVascularMax").addClass("warning");
					} else {
						$("#cardiacVascularMax").removeClass("warning");
					}
					break;
			}
			total = cardiacVascular + respiratory + behavior ;
			$('#total_value').html(total + ''); 
			if ( total >= 0 && total <= 3 ) {
				$('#total_description').html('<p> No action needed, reassess as per order </p>'); 
			} else if (total >= 4 && total <= 6 ) {
				$('#total_description').html('<p> Notify Charge Nurse, Call Junior Resident, & notify Staff Physician </p>'); 
			} else if ( total >= 7) {
				$('#total_description').html('<p style="color:red">Call the Rapid Response Team, Call Staff Physician and Junior Resident </p>'); 
			}
		}
		function beforeSubmit() {
			$('input[name="pews_total"]').val(total);
		}
	</script>
</body>
</html>