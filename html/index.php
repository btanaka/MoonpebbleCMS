<?php

#
# One Page Wonder
#

// errors
error_reporting(E_ALL); # Report all PHP errors
//error_reporting(0); # Report no PHP errors

require("./lib/mpebble.class.php");

$site = new Mpebble();
$site->printheader();
//$site->printmenu();
$site->display_body_content(); 
$site->printfooter();

?>
