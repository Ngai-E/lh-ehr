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
			.title {
				    width: fit-content;
				    margin: auto;
				    margin-bottom: 30px;
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
		<div class="col-sm-12 col-md-6 ">
			<div class="panel panel-primary customStyle">
				<div class="panel-heading">
					<h3 class="panel-title"><?php xl('PEWS Behaviour','e'); ?></h3>
				</div>
				<div class="panel-body">
					<input type="radio" value="0" name='pews_behavior'  ><span class="text">
						<?php xl('0: Playing/ Appropriate OR Sleeping comfortably','e'); ?></span><br>
					<input type="radio" value="1" name='pews_behavior'  ><span class="text">
						<?php xl('1: Irritable and consolable
							','e'); ?>
					</span>
						<br>
					<input type="radio" value="2" name='pews_behavior'  ><span class="text"><?php xl('2: Irritable and NOT consolable','e'); ?></span><br>

					<input type="radio" value="3" name='pews_behavior'  ><span class="text"><?php xl('3: Lethargic, Confused or Reduced Response to pain - Call Staff Physician and Junior Resident','e'); ?></span><br>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-6">
			<div class="panel panel-primary customStyle">
				<div class="panel-heading">
					<h3 class="panel-title"><?php xl('PEWS Cardiovascular','e'); ?></h3>
				</div>
				<div class="panel-body">
					<input type="radio" value="0" name='pews_card'  ><span class="text">
						<?php xl('0: Pink or capillary refill time < 1-2 seconds','e'); ?></span><br>
					<input type="radio" value="1" name='pews_card'  ><span class="text">
						<?php xl('1: "Pale
								OR capillary refill time 3 seconds"','e'); ?>
					</span>
						<br>
					<input type="radio" value="2" name='pews_card'  ><span class="text"><?php xl('2: "Grey or capillary refill time 4 seconds, 
						OR heart rate 20 above or below normal rate for age"','e'); ?></span><br>

					<input type="radio" value="3" name='pews_card'  ><span class="text"><?php xl('3: "Grey and mottled or capillary refill time > 4 seconds, 
								OR heart rate 30 above or below normal heart rate for age - Call Staff Physician and Junior Resident"','e'); ?></span><br>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-6">
			<div class="panel panel-primary customStyle">
				<div class="panel-heading">
					<h3 class="panel-title"><?php xl('PEWS Respiratory','e'); ?></h3>
				</div>
				<div class="panel-body">
					<input type="radio" value="0" name='pews_resp'  >
					<span class="text">
						<?php xl('0: "Within normal rate, no retractions, 
								AND SpO2 98- 100% on RA"','e'); ?>						
					</span><br>
					<input type="radio" value="1" name='pews_resp'  >
					<span class="text">
						<?php 
						xl('1: "RR > 10 above normal limits, 
								OR SpO2 98- 100% on any O2 device 
								OR SpO2 94-97% on RA OR using accessory muscles "','e'
						   ); 
						?>
					</span>
						<br>
					<input type="radio" value="2" name='pews_resp'  >
					<span class="text">
						<?php xl('2: "RR > 20 above normal limits 
									OR SpO2 90-93% 
									OR Retractions"','e'
							); 
						?>
						
					</span>
					<input type="radio" value="3" name='pews_resp'  >
					<span class="text"><?php xl('3: "RR 5 below normal 
								OR SpO2 < 90% 
								OR Retractions and/or grunting - Call Staff Physician and Junior Resident"','e'
							); ?>
							
					</span><br>
				</div>
			</div>
		</div> <br>
		<div class="col-sm-12 col-md-6">
			<div class="panel panel-primary customStyle">
				<div class="panel-heading">
					<h3 class="panel-title"><?php xl('PEWS Summary','e'); ?></h3>
				</div>
				<div class="panel-body">	
				<div class="form-group">
			    	<label class="control-label col-sm-4" for="pews_total">PEWS Total Score</label>
			    	<div class="col-sm-6" style="margin-bottom: 20px;">
			    		<input value="3" class="form-control" id="pews_total" name="pews_total">
			    		<textarea  style="display: none" value="3" class="form-control" id="pews_total" name="pews_total"></textarea> 
			    	</div>
				</div>
				<div class="form-group">
			    	<label class="control-label col-sm-4" for="pews_interventions">Interventions</label>
			    	<div class="col-sm-6" style="margin-bottom: 20px;">
			    		<textarea class="form-control" id="pews_interventions" name="pews_interventions"></textarea>
			    	</div>
				</div>
				<div class="form-group">
			    	<label class="control-label col-sm-4" for="pews_disposition">Disposition</label>
			    	<div class="col-sm-6" style="margin-bottom: 20px;">
			    		<textarea class="form-control" id="pews_disposition" name="pews_disposition"></textarea>
			    	</div>
				</div>
				</div>
			</div>
		</div>