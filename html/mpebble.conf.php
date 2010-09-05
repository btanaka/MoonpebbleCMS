<?php

#
#  MoonpebbleCMS Config
#

# Set the constants below to taste

# Title, Tagline, and Footer
define('SITETITLE', 'MoonpebbleCMS');
define('TAGLINE', 'A tiny, lightweight, super cool CMS...');
define('FOOTER', 'Powered by MoonpebbleCMS');

# Content
define('MENU', './mpebble_user_files/menu.mdwn');
define('MPEBBLECONTENT', './mpebble_user_files/mpebble.content.mdwn');
define('MPEBBLECONTENTPATH', './mpebble_user_files/');

# System Stuff
define('BASEURL', 'http://localpebble.com:8888/');
//define('BASEPATH', '/Users/btanaka/stuffs/stuff.1/m/moonpebblecms.d/html');
//define('BASEURL', 'http://localhost:8888/moonpebble/');

# When the wiki syntax builds a link, include one of the two prefixes, depending
# on your mod_rewrite settings. Uncomment one or the other.
define('WIKI_PREFIX', 'index.php?p='); # index.php?p=foo style
#define('WIKI_PREFIX', ''); # /foo style. mod_rewrite, anyone?

# Themes. Uncomment one. Add your own. Go nuts.
define('MPEBBLETHEME', 'superplain'); // set to theme's name
//define('MPEBBLETHEME', 'greenfade'); // set to theme's name
//define('MPEBBLETHEME', 'bigheadline'); // set to theme's name
//define('MPEBBLETHEME', 'greentop'); // set to theme's name

?>

