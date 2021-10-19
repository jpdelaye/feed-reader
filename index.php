<?php

/**
 * Feedreader Class
 * This class read and display feeds from a given RSS url.
 * input: RSS URL, number of feed to display.
 * @author Jean Paul Delaye 
 */


require_once('class.feedreader.php');

	$rss=  new feedreader( "https://www.lavanguardia.com/rss/home.xml", 10);


?>
