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
            .form-check input[type="radio"]:first-child {
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
                <h2>Symptoms/Exposures</h2>
                <div class="form-group">
                    <label for="recent_rash_symptoms">Have you had (rash, cold, fever, n/v/d symptoms) in the last 7 days?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="recent_rash_symptoms" id="recent_rash_symptoms" value="Yes">
                        <label class="form-check-label" for="recent_rash_symptoms">Yes</label>
                        <input class="form-check-input" type="radio" name="recent_rash_symptoms" id="recent_rash_symptoms2" value="No">
                        <label class="form-check-label" for="recent_rash_symptoms2">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Exposures_to_chicken_pox">Exposures to chicken pox, measles, mumps, strep, hepatitis, or tb in the last 3 weeks?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Exposures_to_chicken_pox" id="Exposures_to_chicken_pox" value="Yes">
                        <label class="form-check-label" for="Exposures_to_chicken_pox">Yes</label>
                        <input class="form-check-input" type="radio" name="Exposures_to_chicken_pox" id="Exposures_to_chicken_pox2" value="No">
                        <label class="form-check-label" for="Exposures_to_chicken_pox2">No</label>
                    </div>
                </div>
                <h2>Nutrition info</h2>
                <div class="form-group">
                    <label for="Diagnosis">Diagnosis</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Diagnosis" id="Diagnosis" value="Yes">
                        <label class="form-check-label" for="Diagnosis">Yes</label>
                        <input class="form-check-input" type="radio" name="Diagnosis" id="Diagnosis2" value="No">
                        <label class="form-check-label" for="Diagnosis2">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Nutrition_source">Nutrition source</label>
                    <textarea class="form-control" name="Nutrition_source" id="Nutrition_source"></textarea>
                </div>
                <div class="form-group">
                    <label for="food_allergy_Rxn">food allergy Rxn</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="food_allergy_Rxn" id="food_allergy_Rxn" value="Yes">
                        <label class="form-check-label" for="food_allergy_Rxn">Yes</label>
                        <input class="form-check-input" type="radio" name="food_allergy_Rxn" id="food_allergy_Rxn2" value="No">
                        <label class="form-check-label" for="food_allergy_Rxn2">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="appetite">appetite</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="appetite" id="appetite" value="Yes">
                        <label class="form-check-label" for="appetite">Yes</label>
                        <input class="form-check-input" type="radio" name="appetite" id="appetite2" value="No">
                        <label class="form-check-label" for="appetite2">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="recent_wt_loss___how_much____">recent wt loss (how much)</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="recent_wt_loss___how_much____" id="recent_wt_loss___how_much____" value="Yes">
                        <label class="form-check-label" for="recent_wt_loss___how_much____">Yes</label>
                        <input class="form-check-input" type="radio" name="recent_wt_loss___how_much____" id="recent_wt_loss___how_much____2" value="No">
                        <label class="form-check-label" for="recent_wt_loss___how_much____2">No</label>
                    </div>
                </div>
                <h2>Feeding info</h2>
                <div class="form-group">
                    <label for="Pt_takes_liquids_from">Pt takes liquids from</label>
                    <textarea class="form-control" name="Pt_takes_liquids_from" id="Pt_takes_liquids_from"></textarea>
                </div>
                <div class="form-group">
                    <label for="nipple_type">nipple type</label>
                    <textarea class="form-control" name="nipple_type" id="nipple_type"></textarea>
                </div>
                <div class="form-group">
                    <label for="feeding_tube_type__size">feeding tube type/size</label>
                    <textarea class="form-control" name="feeding_tube_type__size" id="feeding_tube_type__size"></textarea>
                </div>
                <div class="form-group">
                    <label for="formula_type">formula type</label>
                    <textarea class="form-control" name="formula_type" id="formula_type"></textarea>
                </div>
                <div class="form-group">
                    <label for="feeding_schedule">feeding schedule</label>
                    <textarea class="form-control" name="feeding_schedule" id="feeding_schedule"></textarea>
                </div>
                <div class="form-group">
                    <label for="pt_eats_table_food?">pt eats table food?:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pt_eats_table_food?" id="pt_eats_table_food?" value="Yes">
                        <label class="form-check-label" for="pt_eats_table_food?">Yes</label>
                        <input class="form-check-input" type="radio" name="pt_eats_table_food?" id="pt_eats_table_food?2" value="No">
                        <label class="form-check-label" for="pt_eats_table_food?2">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pt_feeds_self?">pt feeds self?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pt_feeds_self?" id="pt_feeds_self?" value="Yes">
                        <label class="form-check-label" for="pt_feeds_self?">Yes</label>
                        <input class="form-check-input" type="radio" name="pt_feeds_self?" id="pt_feeds_self?2" value="No">
                        <label class="form-check-label" for="pt_feeds_self?2">No</label>
                    </div>
                </div>
                <h2>Recent PO intake</h2>
                <div class="form-group">
                    <label for="Type">Type</label>
                    <textarea class="form-control" name="Type" id="Type"></textarea>
                </div>
                <div class="form-group">
                    <label for="Time">Time</label>
                    <textarea class="form-control" name="Time" id="Time"></textarea>
                </div>
                <div class="form-group">
                    <label for="Amount">Amount</label>
                    <textarea class="form-control" name="Amount" id="Amount"></textarea>
                </div>
                <h2>Immunizations</h2>
                <div class="form-group">
                    <label for="Up_to_date?">Up to date?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Up_to_date?" id="Up_to_date?" value="Yes">
                        <label class="form-check-label" for="Up_to_date?">Yes</label>
                        <input class="form-check-input" type="radio" name="Up_to_date?" id="Up_to_date?2" value="No">
                        <label class="form-check-label" for="Up_to_date?2">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Flu_vaccine_completed_this_season?">Flu vaccine completed this season?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Flu_vaccine_completed_this_season?" id="Flu_vaccine_completed_this_season?" value="Yes">
                        <label class="form-check-label" for="Flu_vaccine_completed_this_season?">Yes</label>
                        <input class="form-check-input" type="radio" name="Flu_vaccine_completed_this_season?" id="Flu_vaccine_completed_this_season?2" value="No">
                        <label class="form-check-label" for="Flu_vaccine_completed_this_season?2">No</label>
                    </div>
                </div>
                <h2>Home Medications</h2>
                <div class="form-group">
                    <label for="Name">Name</label>
                    <textarea class="form-control" name="Name" id="Name"></textarea>
                </div>
                <div class="form-group">
                    <label for="Dose">Dose</label>
                    <textarea class="form-control" name="Dose" id="Dose"></textarea>
                </div>
                <div class="form-group">
                    <label for="Frequency">Frequency</label>
                    <textarea class="form-control" name="Frequency" id="Frequency"></textarea>
                </div>
                <h2>Patient information</h2>
                <div class="form-group">
                    <label for="Patient_developmentally_delayed?">Patient developmentally delayed?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Patient_developmentally_delayed?" id="Patient_developmentally_delayed?" value="Yes">
                        <label class="form-check-label" for="Patient_developmentally_delayed?">Yes</label>
                        <input class="form-check-input" type="radio" name="Patient_developmentally_delayed?" id="Patient_developmentally_delayed?2" value="No">
                        <label class="form-check-label" for="Patient_developmentally_delayed?2">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Movement__mobility_problems?">Movement/mobility problems?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Movement__mobility_problems?" id="Movement__mobility_problems?" value="Yes">
                        <label class="form-check-label" for="Movement__mobility_problems?">Yes</label>
                        <input class="form-check-input" type="radio" name="Movement__mobility_problems?" id="Movement__mobility_problems?2" value="No">
                        <label class="form-check-label" for="Movement__mobility_problems?2">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Learning_problems?">Learning problems?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Learning_problems?" id="Learning_problems?" value="Yes">
                        <label class="form-check-label" for="Learning_problems?">Yes</label>
                        <input class="form-check-input" type="radio" name="Learning_problems?" id="Learning_problems?2" value="No">
                        <label class="form-check-label" for="Learning_problems?2">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="speech_problems?">speech problems?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="speech_problems?" id="speech_problems?" value="Yes">
                        <label class="form-check-label" for="speech_problems?">Yes</label>
                        <input class="form-check-input" type="radio" name="speech_problems?" id="speech_problems?2" value="No">
                        <label class="form-check-label" for="speech_problems?2">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Hearing_problems?">Hearing problems?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Hearing_problems?" id="Hearing_problems?" value="Yes">
                        <label class="form-check-label" for="Hearing_problems?">Yes</label>
                        <input class="form-check-input" type="radio" name="Hearing_problems?" id="Hearing_problems?2" value="No">
                        <label class="form-check-label" for="Hearing_problems?2">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Vision_problems?">Vision problems?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Vision_problems?" id="Vision_problems?" value="Yes">
                        <label class="form-check-label" for="Vision_problems?">Yes</label>
                        <input class="form-check-input" type="radio" name="Vision_problems?" id="Vision_problems?2" value="No">
                        <label class="form-check-label" for="Vision_problems?2">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Behavior_problems?">Behavior problems?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Behavior_problems?" id="Behavior_problems?" value="Yes">
                        <label class="form-check-label" for="Behavior_problems?">Yes</label>
                        <input class="form-check-input" type="radio" name="Behavior_problems?" id="Behavior_problems?2" value="No">
                        <label class="form-check-label" for="Behavior_problems?2">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Assistive_devices">Assistive devices: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Assistive_devices" id="Assistive_devices" value="Yes">
                        <label class="form-check-label" for="Assistive_devices">Yes</label>
                        <input class="form-check-input" type="radio" name="Assistive_devices" id="Assistive_devices2" value="No">
                        <label class="form-check-label" for="Assistive_devices2">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dental_appliances?">dental appliances?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="dental_appliances?" id="dental_appliances?" value="Yes">
                        <label class="form-check-label" for="dental_appliances?">Yes</label>
                        <input class="form-check-input" type="radio" name="dental_appliances?" id="dental_appliances?2" value="No">
                        <label class="form-check-label" for="dental_appliances?2">No</label>
                    </div>
                </div>
                <h2>Psychiatric issues</h2>
                <div class="form-group">
                    <label for="Does_the_patient_have_psych_issues?">Does the patient have psych issues?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Does_the_patient_have_psych_issues?" id="Does_the_patient_have_psych_issues?" value="Yes">
                        <label class="form-check-label" for="Does_the_patient_have_psych_issues?">Yes</label>
                        <input class="form-check-input" type="radio" name="Does_the_patient_have_psych_issues?" id="Does_the_patient_have_psych_issues?2" value="No">
                        <label class="form-check-label" for="Does_the_patient_have_psych_issues?2">No</label>
                    </div>
                </div>
                <h2>Smoking/tobacco use</h2>
                <div class="form-group">
                    <label for="Do_you_or_anyone_who_lives_with_smoke">Do you or anyone who lives with smoke or use tobacco products?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Do_you_or_anyone_who_lives_with_smoke" id="Do_you_or_anyone_who_lives_with_smoke" value="Yes">
                        <label class="form-check-label" for="Do_you_or_anyone_who_lives_with_smoke">Yes</label>
                        <input class="form-check-input" type="radio" name="Do_you_or_anyone_who_lives_with_smoke" id="Do_you_or_anyone_who_lives_with_smoke2" value="No">
                        <label class="form-check-label" for="Do_you_or_anyone_who_lives_with_smoke2">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Would_you_like_information_about_stopping?">Would you like information about stopping?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Would_you_like_information_about_stopping?" id="Would_you_like_information_about_stopping?" value="Yes">
                        <label class="form-check-label" for="Would_you_like_information_about_stopping?">Yes</label>
                        <input class="form-check-input" type="radio" name="Would_you_like_information_about_stopping?" id="Would_you_like_information_about_stopping?2" value="No">
                        <label class="form-check-label" for="Would_you_like_information_about_stopping?2">No</label>
                    </div>
                </div>
            </div>
            <h2>Comfort measures/Chronic Pain</h2>
            <div class="form-group">
                <label for="What_are_nonmedicinal_comfort">What are nonmedicinal comfort measures that help you with pain?</label>
                <textarea class="form-control" name="What_are_nonmedicinal_comfort" id="What_are_nonmedicinal_comfort"></textarea>
            </div>
            <div class="form-group">
                    <label for="suffer_cronic_pain">Do you suffer from chronic pain?: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="suffer_cronic_pain" id="suffer_cronic_pain" value="Yes">
                        <label class="form-check-label" for="suffer_cronic_pain">Yes</label>
                        <input class="form-check-input" type="radio" name="suffer_cronic_pain" id="suffer_cronic_pain2" value="No">
                        <label class="form-check-label" for="suffer_cronic_pain2">No</label>
                    </div>
                </div>
            <div class="form-group">
                <label for="Location">Location</label>
                <textarea class="form-control" name="Location" id="Location"></textarea>
            </div>
            <div class="form-group">
                <label for="Current_pain_level">Current pain level</label>
                    <select class="form-control" id="Current_pain_level" name="Current_pain_level">
                        <option></option>
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>
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
		
		function beforeSubmit() {
			$('input[name="pews_total"]').val(total);
		}
	</script>
</body>
</html>