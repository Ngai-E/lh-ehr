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
            .form-check input[type="radio"] {
                padding-left: 12%;
            }
            .form-check input[type="radio"]::first-child {
                padding-left: unset;
            }
        </style>
	</head>
<body>
	<form method=post action="<?php echo $rootdir;?>/forms/admission_database/save.php?mode=new" name="my_form" onsubmit="beforeSubmit(); return top.restoreSession()">
		<div class="row">
			<div class="col-md-4">
				<!-- Save/Cancel buttons -->
				<input type="submit" id="save" class="btn btn-success" value="<?php echo xla('Save'); ?>"> &nbsp;
				<input type="button" id="dontsave" class="deleter btn btn-danger" value="<?php echo xla('Cancel'); ?>"> &nbsp;
			</div>
		</div>
		<div style="width: 50%; margin: auto" ><h1 class="title"><strong><?php xl('Admission Database','e'); ?></strong></h1></div>
		<div class="row" >
            <div style="width: 50%; margin: auto">
                <h2>Admit info</h2>
                <div class="form-group">
                    <label for="Arrived_by">Arrived by</label>
                    <textarea class="form-control" name="Arrived_by" id="Arrived_by"></textarea>
                </div>
                <div class="form-group">
                    <label for="Accompanied_by">Accompanied by</label>
                    <textarea class="form-control" name="Accompanied_by" id="Accompanied_by"></textarea>
                </div>
                <hr>
                <h2>Travel Screen</h2>
                <div class="form-group">
                    <label for="companion_traveled_today">Has the patient or anyone accompanying the patient traveled today?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="companion_traveled_today" id="companion_traveled_today" value="Yes">
                        <label class="form-check-label" for="companion_traveled_today">Yes</label>
                        <input class="form-check-input" type="radio" name="companion_traveled_today" id="companion_traveled_today2" value="No">
                        <label class="form-check-label" for="companion_traveled_today2">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Which_country">Which country</label>
                    <textarea class="form-control" name="Which_country" id="Which_country"></textarea>
                </div>
            </div>
            <!-- <div class="col-12 col-md-4">.col-6 .col-md-4</div>
            <div class="col-12 col-md-4">.col-6 .col-md-4</div> -->
		</div>
		<div>
			<!-- Save/Cancel buttons -->
			<input type="submit" id="save" class='btn btn-success' value="<?php echo xla('Save'); ?>"> &nbsp;
			<input type="button" id="dontsave" class="deleter btn btn-danger" value="<?php echo xla('Cancel'); ?>"> &nbsp;
		</div>
	</form>

	<script>
		
		function beforeSubmit() {
			$('input[name="pews_total"]').val(total);
		}
	</script>
</body>
</html>