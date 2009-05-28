<?php

#
# MoonpebbleCMS
#

error_reporting(E_ALL); # Report all PHP errors - test
//error_reporting(0); # Report no PHP errors - production

require("./lib/mpebble.class.php");

$site = new Mpebble();
$site->render_template();

?>
