<?php

error_reporting(E_ALL); # Report all PHP errors

class Mpebble {

    //var $basepath;

    function Mpebble() {
        include_once "markdown.php";
        include_once "mpebble.conf.php"; // installation specific configurations
    }


    function printheader() {
        print <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
EOF;
    }



    function printfooter() {
        print <<<EOF
</div> <!-- wrapper -->
</body>
</html>
EOF;
    }


    // deprecated. remove when ready
    function display_body_content() {
        print "<div id=\"headwrapper\">\n";
        print "<div id=\"sitetitle\">" . SITETITLE . "</div>"; // set in mpebble.conf.php
        print "<div id=\"tagline\">" . TAGLINE . "</div>"; // set in mpebble.conf.php
        print "</div> <!-- headwrapper -->";
        
        print "<div id=\"wrapper\">\n";
        print "<div class=\"content\">";
        if ($handle = fopen(MPEBBLECONTENT, "r")) {
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

    function render_template() {
	// consult config constants for particulars
	// print the template, substituting along the way
        if ($handle = fopen(MPEBBLETEMPLATE, "r")) {
            $content = "";
            while (!feof($handle)) {
                $buffer = fgets($handle, 4096);
                // substitute here
                $patterns[0] = '/<%SITETITLE%>/';
                    $replacements[0] = SITETITLE;
                $patterns[1] = '/<%CSS%>/';
                    $replacements[1] = CSS;
                $patterns[2] = '/<%TAGLINE%>/';
                    $replacements[2] = TAGLINE;
                $patterns[3] = '/<%FOOTER%>/';
                    $replacements[3] = FOOTER;
                $newbuffer = preg_replace($patterns, $replacements, $buffer);
                // if content, mardownify the content
                if (preg_match("/<%CONTENT%>/", $buffer)) {
                    if ($handle2 = fopen(MPEBBLECONTENT, "r")) { 
                        $content = "";
                        while (!feof($handle2)) {
                            $buffer2 = fgets($handle2, 4096);
                            $content = $content . $buffer2;
                        }
                            $my_html = Markdown($content);
                            print $my_html;
			fclose($handle2);
                    } else {
			print "<h1>Uh oh!</h1> The page you seek cannot be found.";
		    }
                } else { // this wasn't the content so print away
                    print $newbuffer;
                }
            }
            fclose($handle);
        } else {
            print "<h1>Uh oh!</h1> The page you seek cannot be found.";
        }

    }

} #class
