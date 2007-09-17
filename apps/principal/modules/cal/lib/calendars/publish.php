<?php

/*
Extension to PHP iCalendar for supporting publishing from Apple iCal
Date: 11.12.2003
Author: Dietrich Ayala
Copyright 2003 Dietrich Ayala

Description:
This allows iCal to publish to your PHP iCalendar site *without* WebDAV support.
This helps with commercial hosts where WebDAV is not available.

Features:
- supports publishing and deleting calendars
- does not require WebDAV

Installation:
1. place this file in your PHP iCalendar calendars directory (or anywhere else)
2. configure path to PHP iCalendar config file (below)
3. make sure that PHP has write access to the calendars directory (or whatever you set $calendar_path to)
4. set up directory security on your calendars directory
5. turn on publishing in your PHP iCalendar config file by setting $phpicalendar_publishing to 1.

Security:
The calendars directory should be configured to require authentication. 
This protects any private calendar data, and prevents unauthorized users
from updating or deleting your calendar data.

Three methods of HTTP authorization are supported.

1. Server-provided authentication - This can be done via any method supported by 
   your webserver. There is much documentation available on the web for doing 
   per-directory authentication for Apache.

2. PHP authentication against $auth_internal_username and $auth_internal_password.

 2a. using mod_php it just works.

 2b. If you can't configure the server for http authentication, and you are running
     PHP in CGI mode *AND* you have mod_rewrite enabled, then you should put the
     following lines in the .htaccess file in your directory:

<IfModule mod_rewrite.c>
RewriteEngine on
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization},L]
</IfModule>

Usage (Apple iCal):
1. Open iCal, select a calendar for publishing
2. Select "Publish" from the "Calendar" menu
3. Configure to your liking, and set the URL to (eg): http://example.com/path/to/publish.php
4. Click the "Publish" button
5. Some PHP versions require a '?' at the end of the URL (eg): http://localhost/~dietricha/calendar/calendars/publish.php?

Usage (Sunbird Calendar):
1. Create a new calendar in Sunbird
	Type Remote
	Location http://example.com/path/to/publish.php/calendarname.ics
		calendarname.ics should be a unique filename and must end with .ics
	Username: either your web server username, or auth_internal_username 
	Password: either your web server password, or auth_internal_password 

Hints:
1. PHP 4.3.0 or greater is required
2. Your version of php and apache MUST support $_SERVER['PATH_INFO']
3. Depending on your web server environment, you may need to set safe_mode = Off
   (this won't be necessary if you are using a wrapper like cgiwrap or suexec) 

Troubleshooting:
You can turn on logging by setting the PHPICALENDAR_LOG_PUBLISHING constant to 1 below.
This will write out a log file to the same directory as this script.
Don't forget to turn off logging when done!!
*/

// include PHP iCalendar configuration variables
include('../config.inc.php');

// set calendar path, or just use current directory...make sure there's a trailing slash
if (isset($calendar_path) && $calendar_path != '') {
	if (substr($calendar_path, -1, 1) !='/') $calendar_path = $calendar_path.'/';
} else {
	$calendar_path = '';
}
// allow/disallow publishing

$phpicalendar_publishing = isset($phpicalendar_publishing) ? $phpicalendar_publishing : 0;
define( 'PHPICALENDAR_PUBLISHING', $phpicalendar_publishing );

// toggle logging
define( 'PHPICALENDAR_LOG_PUBLISHING', 1 );
if(defined('PHPICALENDAR_LOG_PUBLISHING') && PHPICALENDAR_LOG_PUBLISHING == 1) {
	if( ! $logfile = fopen('publish_log.txt','a+') ) {
		header('HTTP/1.1 401 Unauthorized');
		header('WWW-Authenticate: Basic realm="ERROR: Unable to open log file"');
		echo 'Unable to open log file.';
		exit;
	}
}

// Require authentication 
if (!isset($_SERVER['REMOTE_USER'])) {

	// Require authentication 
	if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
		list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])
			= explode( ':', base64_decode( substr($_SERVER['HTTP_AUTHORIZATION'], 6) ) );
	}

	if (!isset($_SERVER['PHP_AUTH_USER'])) {
		header('WWW-Authenticate: Basic realm="phpICalendar"');
		header('HTTP/1.1 401 Unauthorized');
		echo 'You must be authorized!';
		exit;
	} else {
		if ($_SERVER['PHP_AUTH_USER'] != $auth_internal_username || $_SERVER['PHP_AUTH_PW'] != $auth_internal_password) {
			header('WWW-Authenticate: Basic realm="phpICalendar"');
			header('HTTP/1.1 401 Unauthorized');
			echo 'You must be authorized!';
			exit;
		}
	}
}

// only allow publishing if explicitly enabled
if(PHPICALENDAR_PUBLISHING != 1) {
	header('WWW-Authenticate: Basic realm="ERROR: Calendar Publishing is disabled on this server"');
	header('HTTP/1.1 401 Unauthorized');
	echo 'You must be authorized!';
	exit;
}

// unpublishing
if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
	// get calendar filename
	$calendar_file = $calendar_path.substr($_SERVER['REQUEST_URI'] , ( strrpos($_SERVER['REQUEST_URI'], '/') + 1) ) ;

	$calendar_file = urldecode($calendar_file);
	
	logmsg('received request to delete '.$calendar_file);
	
	// remove calendar file
	if(!unlink($calendar_file))
	{
		logmsg('unable to delete the calendar file');
	}
	else
	{
		logmsg('deleted');
	}
	return;
}

// publishing
elseif($_SERVER['REQUEST_METHOD'] == 'PUT'){
	logmsg('PUT request');

	// get calendar data
	if($datain = fopen('php://input','r')){
		while(!@feof($datain)){
			$data .= fgets($datain,4096);
		}
		
		@fclose($datain);
	}else{
		logmsg('unable to read input data');
	}
	
	if(isset($data)){
		if (isset($_SERVER['PATH_INFO'])) {
			preg_match("/\/([\w\-\.\+ ]*).ics/i",$_SERVER['PATH_INFO'],$matches);
			$calendar_name = urldecode($matches[1]);
		}

		// If we don't have it from path info, use the supplied calendar name
		if( ! isset($calendar_name) ) {
		
			$cal_arr = explode("\n",$data);
		
			foreach($cal_arr as $k => $v){
				if(strstr($v,'X-WR-CALNAME:')){
					$arr = explode(':',$v);
					$calendar_name = trim($arr[1]);
					break;
				}
			}
		}

		logmsg('Received request to update: ' . $calendar_name);

		// Remove any invalid characters from the filename
		$calendar_name = preg_replace( "/[^\w\.\- ]/", '', $calendar_name );

		if( ( ! isset($calendar_name) ) || ( $calendar_name == '' ) ) {
			header('HTTP/1.1 401 Invalid calendar name');
			header('WWW-Authenticate: Basic realm="ERROR: Invalid calendar name."');
			echo 'Invalid calendar name.';
		}
		
		// If we don't have a name, assume default
		$calendar_name = isset($calendar_name) ? $calendar_name : 'default';

		logmsg('Updating calendar: ' . $calendar_name);

		// If this is Apple iCal, an event with a blank summary is private - mark as such
		if( preg_match( "/Apple.*iCal/", $_SERVER['HTTP_USER_AGENT'] ) ) {
			$data = preg_replace(
				"/^\s*SUMMARY:\s*$/m",
				"SUMMARY: **PRIVATE**\nCLASS:PRIVATE",
				$data
			);
		}

		// write to file
		if($dataout = fopen($calendar_path.$calendar_name.'.ics','w+')){
			fputs($dataout, $data, strlen($data) );
			@fclose($dataout);
		}else{
			logmsg( 'could not open file '.$calendar_path.$calendar_name.'.ics' );
		}
	}
	else {
		logmsg('PUT ERROR - No data supplied.');
	}
}
elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if (isset($_SERVER['PATH_INFO'])) {
		preg_match("/\/([ A-Za-z0-9._]*).ics/i",$_SERVER['PATH_INFO'],$matches);
		$icsfile = urldecode($matches[1]);

		// get calendar data
		if (file_exists($calendar_path . $icsfile . '.ics') &&
			is_readable($calendar_path . $icsfile . '.ics') &&
			is_file($calendar_path . $icsfile . '.ics')
		) {
			echo file_get_contents($calendar_path . $icsfile . '.ics');
			logmsg('downloaded calendar ' . $icsfile);
		}
	}
}

if(defined('PHPICALENDAR_LOG_PUBLISHING') && PHPICALENDAR_LOG_PUBLISHING == 1) {
	fclose($logfile);
}

header('HTTP/1.1 200 OK');
exit;


// for logging
function logmsg($str){
	global $logfile;

	if(defined('PHPICALENDAR_LOG_PUBLISHING') && PHPICALENDAR_LOG_PUBLISHING == 1) {
		if( $_SERVER['PHP_AUTH_USER'] )
			$user =  $_SERVER['PHP_AUTH_USER'];
		else
			$user =  $_SERVER['REMOTE_USER'];

		$logline = date('Y-m-d H:i:s ') . $_SERVER['REMOTE_ADDR'] . ' ' . $user . ' ' . ${str} . "\n";

		fputs($logfile, $logline, strlen($logline) );
	}
}
?>
