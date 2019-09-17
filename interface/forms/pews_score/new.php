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
			th, td {
			  padding: 5px;
			  text-align: left;    
			}
			.col-sm-6 ,.col-md-3{
				padding-left: 3px;
				padding-right: 3px;
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
		<div class="col-sm-12"><h4 class="title"><strong><?php xl('PEWS Score','e'); ?></strong></h4></div>
		<div class="col-sm-6 col-md-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"><?php xl('PEWS Behaviour','e'); ?></h3>
				</div>
				<div class="panel-body">
					<input type="radio" value="1" name='pews_behavior'  ><span class=text>
						<?php xl('1: Playing/ Appropriate OR Sleeping comfortably','e'); ?></span><br>
					<input type="radio" value="2" name='pews_behavior'  ><span class=text>
						<?php xl('2: Irritable and consolable
							','e'); ?>
					</span>
						<br>
					<input type="radio" value="3" name='pews_behavior'  ><span class=text><?php xl('3: Irritable and NOT consolable','e'); ?></span><br>

					<input type="radio" value="4" name='pews_behavior'  ><span class=text><?php xl('4: Lethargic, Confused or Reduced Response to pain - Call Staff Physician and Junior Resident','e'); ?></span><br>
				</div>
			</div>
		</div>