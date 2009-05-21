<?php

error_reporting(E_ALL); # Report all PHP errors

class Opw {

    //var $basepath;

    function Opw() {
        include_once "markdown.php";
        include_once "opw.conf.php"; // installation specific configurations
    }


    function printheader() {
        print <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>
EOF;
        print SITETITLE; // set in opw.conf.php
        print <<<EOF
</title>
    <link rel="stylesheet" href="
EOF;
        print CSS; 
        print <<<EOF
" type="text/css" media="all" />
</head>
<body>
EOF;
    }


    function printfooter() {
        print <<<EOF
</div> <!-- wrapper -->
</body>
</html>
EOF;
    }


    function display_body_content() {
        print "<div id=\"headwrapper\">\n";
        print "<div id=\"sitetitle\">" . SITETITLE . "</div>"; // set in opw.conf.php
        print "<div id=\"tagline\">" . TAGLINE . "</div>"; // set in opw.conf.php
        print "</div> <!-- headwrapper -->";
        
        print "<div id=\"wrapper\">\n";
        print "<div class=\"content\">";
        if ($handle = fopen(OPWCONTENT, "r")) {
            $content = "";
            while (!feof($handle)) {
                $buffer = fgets($handle, 4096);
                $content = $content . $buffer;
            }
            fclose($handle);
                $my_html = Markdown($content);
                print $my_html;
        } else {
            print "<h1>Uh oh!</h1> The page you seek cannot be found.";
        }
    }

}