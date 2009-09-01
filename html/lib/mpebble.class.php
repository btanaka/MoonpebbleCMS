<?php

error_reporting(E_ALL); # Report all PHP errors

class Mpebble {



    function Mpebble() {
        include_once "markdown.php";
        include_once "mpebble.conf.php"; // installation specific configurations
    }



    function render_template($p) {
    	// consult config constants for particulars
    	// print the template, substituting along the way
	
    	$themepath = "./themes/" . MPEBBLETHEME . "/";
    	$themetemplate = "$themepath" . MPEBBLETHEME .  ".html";
    	$themecss = "$themepath" . MPEBBLETHEME .  ".css";
	
    	// if p corresponds EXACTLY to a page in MPEBBLECONTENTPATH, then
    	// set current_content variable
    	if ( $p == "NOTSET") {
            $current_content = MPEBBLECONTENTPATH . "mpebble.content.mdwn";
        } else {
        	$requested_content = MPEBBLECONTENTPATH . "$p" . ".mdwn";
            if (file_exists($requested_content)) {
                $current_content = $requested_content;
            } else {
                $current_content = "bad_input";
            }
        }
	
        if ($handle = fopen($themetemplate, "r")) {
            $content = "";
            while (!feof($handle)) {
                $buffer = fgets($handle, 4096);
                $noprint = 0;
                
                // substitute here
                $patterns[0] = '/<%SITETITLE%>/';
                    $replacements[0] = SITETITLE;
                $patterns[1] = '/<%CSS%>/';
                    $replacements[1] = $themecss;
                $patterns[2] = '/<%TAGLINE%>/';
                    $replacements[2] = TAGLINE;
                $patterns[3] = '/<%FOOTER%>/';
                    $replacements[3] = FOOTER;
                $newbuffer = preg_replace($patterns, $replacements, $buffer);
                
                // if content, mardownify the content
                if (preg_match("/<%CONTENT%>/", $buffer)) {
                    if ($handle2 = fopen($current_content, "r")) { 
                        $content = "";
                        while (!feof($handle2)) {
                            $buffer2 = fgets($handle2, 4096);
                            $content = $content . $buffer2;
                        }
                            $my_html = Markdown($content);
                            print $my_html;
                			fclose($handle2);
                			$noprint++;
                    } else {
            			print "<h1>Uh oh!</h1> The page you seek cannot be found.";
        		    }
                }
                
                // if menu, include the menu
                if (preg_match("/<%MENU%>/", $buffer)) {
                    if ($menu_handle = fopen(MENU, "r")) { 
                        $content = "";
                        while (!feof($menu_handle)) {
                            $buffer3 = fgets($menu_handle, 4096);
                            $content = $content . $buffer3;
                        }
                            $my_html = Markdown($content);
                            print $my_html;
                			fclose($menu_handle);
                			$noprint++;
                    } else {
            			print "<h1>Uh oh!</h1> The page you seek cannot be found.";
        		    }
                }
                
                # substitution is done. print the post-replacement buffer.
                if ( $noprint < 1) {
                    print $newbuffer;
                }
            }
            fclose($handle);
        } else {
            print "<h1>Uh oh!</h1> The page you seek cannot be found.";
        }
    }


} #class

