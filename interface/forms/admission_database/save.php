
<?php

$fake_register_globals=false;
$sanitize_all_escapes=true;

include_once("../../globals.php");
include_once("$srcdir/api.inc");
include_once("$srcdir/forms.inc");
if (!$encounter) { 
    die(xlt("Internal error: we do not seem to be in an encounter!"));
}
if ($_GET["mode"] == "new"){
    $newid = formSubmit("form_admission_database", $_POST, $_GET["id"], $userauthorized);
    addForm($encounter, "Admission database", $newid, "admission_database", $pid, $userauthorized);
}elseif ($_GET["mode"] == "update") {
    formUpdate("form_admission_database", $_POST, $_GET["id"], $userauthorized);
}
$_SESSION["encounter"] = $encounter;
formHeader("Redirecting....");
formJump();
formFooter();
?>