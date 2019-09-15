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
	<form method=post action="<?php echo $rootdir;?>/forms/education/save.php?mode=new" name="my_form" onsubmit="beforeSubmit(); return top.restoreSession()">
		<div class="row">
			<div class="col-md-4">
				<!-- Save/Cancel buttons -->
				<input type="submit" id="save" class="btn btn-success" value="<?php echo xla('Save'); ?>"> &nbsp;
				<input type="button" id="dontsave" class="deleter btn btn-danger" value="<?php echo xla('Cancel'); ?>"> &nbsp;
			</div>
		</div>
		
		<table style="width:100%">
			<thead>
				<tr>
				    <th>Topic #</th>
				    <th>Education Topic <span><a href="#" ><span title="add topic" onclick="addTopic()" style="color: #337ab7" class="glyphicon glyphicon-plus-sign"></span></a></span></th> 
				    <th>Learners </th> 
				    <th>Remarks </th> 
		 	 	</tr>
			</thead>

			<tbody class="addTopic">
				<tr id="row_1">
				  	<td>
				  		<mark>1</mark>
				  		<mark class="labelTopic_1"></mark>
				  		<a href="#" ><span style="color: #337ab7" onclick="addLearner(1)" class="glyphicon glyphicon-plus-sign" title="Add Learner"></span> </a>
				  		<a href="#"><span style="color: red" onclick="inactivateTopic(1)" class="glyphicon glyphicon-ban-circle" title="inactivate Topic"></span> </a> 
				  	</td>
				  	<td><input type="text" name="topic[]" placeholder="Education topic"></td>
				  	<input type="hidden" class="status_1" name="status[]" value="1">
				  	<input type="hidden"  name="count[]" value="1">
				  	<td>
				      <table>
				      	<thead>
				      		<tr>
							   <th>Learners</th>
							   <th>Learner's Readiness for Education</th> 
							   <th>Method of Education</th>
							   <th>Response to Eduction</th>
							   <th>Further interventions Needed</th>
							</tr>
				      	</thead>
				      	<tbody class="learner_1">
				      		<tr>
				      		  <td><a href="#"><span style="color: red" onclick="inactivateLearner(this, 1)" class="glyphicon glyphicon-ban-circle" title="inactivate learner"></span> </a> 
				      		  <input hidden="hidden" value="1" name="status_learner_1[]">
				      		  <mark class="labelLearner"></mark></td>
					          <td><textarea name="learners_1[]"></textarea></td>
					          <td><textarea name="readiness_1[]"></textarea></td>
					          <td><textarea name="response_1[]"></textarea></td>
					          <td><textarea name="method_1[]"></textarea></td>  
					          <td><textarea name="interventions_1[]"></textarea></td>  
					        </tr>
				      	</tbody>   
				      </table>
				    </td>  
				    <td><textarea name="remark[]"></textarea></td>  
			  </tr>
			</tbody>
		  
		</table>
		<textarea hidden="hidden"   name="learners"></textarea>
		<textarea hidden="hidden" name="readiness"></textarea>
		<textarea hidden="hidden" name="response"></textarea>
		<textarea hidden="hidden"  name="method" ></textarea>
		<textarea hidden="hidden"  name="interventions" ></textarea>
		<input name="learner_status" hidden="hidden" />

	</form>

	<script type="text/javascript">
		var count = 1; 
		function addLearner(currentTopicNumber ) {
			let learner = createLearnerHtml(currentTopicNumber);
			$(`.learner_${currentTopicNumber}`).prepend(learner);
		}
		
		function addTopic() {
			let topic = newTopicHtml();
			$('.addTopic').prepend(topic);
		}
		function inactivateTopic(TopicNumber) {
			console.log(TopicNumber);
			$(`.status_${TopicNumber}`).attr("value", "0");
			$(`.labelTopic_${TopicNumber}`).html("Topic Completed");
		}
		function inactivateLearner(element, TopicNumber) {
			var learner = $(element).parent().parent().parent();
			learner.find(`input[name="status_learner_${TopicNumber}[]"]`).attr("value", "0");
			learner.css("background-color", "#c5c5bc");
			learner.find(`.labelLearner`).html("Completed ED Topic");
			learner.find("textarea").attr("readonly","readonly");
		}
		function newTopicHtml() {
			count++;
			return `<tr id="row_${count}">
					  	<td>
					  		<mark>${count}</mark>
					  		<mark class="labelTopic_${count}"></mark>
					  		<a href="#" ><span style="color: #337ab7" onclick="addLearner(${count})" class="glyphicon glyphicon-plus-sign" title="Add Learners"></span> </a>
					  		<a href="#"><span style="color: red" onclick="inactivateTopic(${count})" class="glyphicon glyphicon-ban-circle" title="Deactivate Topic"></span> </a> 
					  	</td>
					  	<td><input type="text" name="topic[]" placeholder="Education topic"></td>
					  	<input type="hidden" class="status_${count}" name="status[]" value="1">
					  	<input type="hidden"  name="count[]" value="${count}">
					  	<td>
					      <table>
					      	<thead>
					      		<tr>
								   <th>Learners</th>
								   <th>Learner's Readiness for Education</th> 
								   <th>Method of Education</th>
								   <th>Response to Eduction</th>
								   <th>Further interventions Needed</th>
								</tr>
					      	</thead>
					      	<tbody class="learner_${count}">
					      		<tr>
					      			<td><a href="#"><span style="color: red" onclick="inactivateLearner(this)" class="glyphicon glyphicon-ban-circle" title="inactivate learner"></span> </a> 
					      			<input  hidden="hidden" value="1" name="status_learner_${count}[]">
				      		  		<mark class="labelLearner_${count}"></mark></td>
						          	<td><textarea name="learners_${count}[]"></textarea></td>
								    <td><textarea name="readiness_${count}[]"></textarea></td>
								    <td><textarea name="response_${count}[]"></textarea></td>
								    <td><textarea name="method_${count}[]"></textarea></td>   
								    <td><textarea name="interventions_${count}[]"></textarea></td>   
						        </tr>
					      	</tbody>   
					      </table>
					    </td>
					    <td><textarea name="remark[]"></textarea></td>  
				  </tr>
				  `
		}

		function createLearnerHtml(issue_number){
			return `<tr>
						<td><a href="#"><span style="color: red" onclick="inactivateLearner(this)" class="glyphicon glyphicon-ban-circle" title="inactivate learner"></span> </a> 
						<input  hidden="hidden" value="1" name="status_learner_${issue_number}[]">
				      	<mark class="labelLearner_${issue_number}"></mark></td>
			          	<td><textarea name="learners_${issue_number}[]"></textarea></td>
					    <td><textarea name="readiness_${issue_number}[]"></textarea></td>
					    <td><textarea name="response_${issue_number}[]"></textarea></td>
					    <td><textarea name="method_${issue_number}[]"></textarea></td>   
					    <td><textarea name="interventions_${issue_number}[]"></textarea></td>   
			        </tr>
				 `
		}

		function beforeSubmit() {
			var learner = new Array();
			var readiness = new Array();
			var response = new Array();
			var method = new Array();
			var intervention = new Array();
			var learners_status = new Array();
			for (var i = 1; i <= count; i++){
				let value = $(`textarea[name='learners_${i}[]']`)
              					.map(function(){return $(this).val();}).get();
              	learner.push(JSON.stringify(value));

             	value = $(`textarea[name='interventions_${i}[]']`)
              					.map(function(){return $(this).val();}).get();
              	intervention.push(JSON.stringify(value));

              	value = $(`textarea[name='readiness_${i}[]']`)
              					.map(function(){return $(this).val();}).get();
              	readiness.push(JSON.stringify(value));

              	value = $(`textarea[name='response_${i}[]']`)
              					.map(function(){return $(this).val();}).get();
              	response.push(JSON.stringify(value));

              	value = $(`textarea[name='method_${i}[]']`)
              					.map(function(){return $(this).val();}).get();
              	method.push(JSON.stringify(value));

              	value = $(`input[name='status_learner_${i}[]']`)
              					.map(function(){return $(this).val();}).get();
              	learners_status.push(JSON.stringify(value));

			}

			objectLearner = {"learner": learner};
			objectReadiness = {"readiness": readiness};
			objectResponse = {"response": response};
			objectMethod = {"method": method};
			objectIntervention = {"intervention": intervention};
			objectLearnerStatus = {"learners_status": learners_status};
			$('textarea[name="learners"]').val(JSON.stringify(objectLearner));
            $('textarea[name="readiness"]').val(JSON.stringify(objectReadiness));
            $('textarea[name="response"]').val(JSON.stringify(objectResponse));
            $('textarea[name="method"]').val(JSON.stringify(objectMethod));
            $('textarea[name="interventions"]').val(JSON.stringify(objectIntervention));
            $('input[name="learner_status"]').val(JSON.stringify(objectLearnerStatus));

		}
	</script>
</body>
</html>