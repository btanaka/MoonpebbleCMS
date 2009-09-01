<?php

#
# MoonpebbleCMS
#

error_reporting(E_ALL); # Report all PHP errors - test
//error_reporting(0); # Report no PHP errors - production

require("./lib/mpebble.class.php");

$site = new Mpebble();
$p = ( isset($_GET['p'] ) ) ? $_GET['p'] : "NOTSET";
$site->render_template($p);

?>
