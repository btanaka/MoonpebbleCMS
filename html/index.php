<?php

#
# Moonstone Template Engine 
# Brian Tanaka, brian@briantanaka.com
#

// errors
error_reporting(E_ALL); # Report all PHP errors
//error_reporting(0); # Report no PHP errors

require("./lib/opw.class.php");

$site = new Opw();
$site->printheader();
//$site->printmenu();
$site->display_body_content(); 
$site->printfooter();

?>