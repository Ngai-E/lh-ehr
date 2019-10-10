<?php
include_once(dirname(__FILE__).'/../../globals.php');
include_once($GLOBALS["srcdir"]."/api.inc");
function pews_score_report( $pid, $encounter, $cols, $id) {
$count = 0;
$data = formFetch("form_pews_score", $id);
if ($data) {
print "<table><tr>";
foreach($data as $key => $value) {
	$value = trim($value);
if ($key == "id" || $key == "pid" || $key == "user" || $key == "groupname" || $key == "authorized" || $key == "activity" || $key == "date" || 
	$value == "" || $value == "0" || $value == "0.00" || $value == NULL || $value == " " || $value == "0000-00-00 00:00:00") {
	continue;
}
$key=ucwords(str_replace("__","/",$key));
$key=ucwords(str_replace("_"," ",$key));

print "<td><span class=bold>$key: </span><span class=text>$value</span></td>";
$count++;
if ($count == $cols) {
$count = 0;
print "</tr><tr>\n";
}
}
}
print "</tr></table>";
}
?>