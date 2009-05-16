<?php

error_reporting(E_ALL); # Report all PHP errors


class Opw {

    //var $basepath;

    function Opw() {
        include_once "markdown.php";
        //include_once "moonstone_config.php"; // user defined settings
    }


    function printheader() {
    print <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>One Page Wonders</title>
    <link rel="stylesheet" href="./css/moonstone.css" type="text/css" media="all" />
</head>
<body>
EOF;
    }


    function printfooter() {
    print <<<EOF
</body>
</html>
EOF;
    }

    function display_body_content() {
        print "stuff";
    }

}