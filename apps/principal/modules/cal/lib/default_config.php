<?php

// Configuration file for PHP iCalendar 2.23rc1
//
// To set values, change the text between the single quotes
// Follow instructions to the right for detailed information

$template 				= 'default';		// Template support
$default_view 			= 'day';			// Default view for calendars = 'day', 'week', 'month', 'year'
$minical_view 			= 'current';		// Where do the mini-calendars go when clicked? = 'day', 'week', 'month', 'current'
// $default_cal 			= "$ALL_CALENDARS_COMBINED";		// Exact filename of calendar without .ics. Or set to $ALL_CALENDARS_COMBINED to open all calenders combined into one.
$default_cal 			= "Home";		// Exact filename of calendar without .ics. Or set to $ALL_CALENDARS_COMBINED to open all calenders combined into one.
#$default_cal 			= 'Other_racing';		// Exact filename of calendar without .ics. Or set to $ALL_CALENDARS_COMBINED to open all calenders combined into one.
$language 				= 'Spanish';		// Language support - 'English', 'Polish', 'German', 'French', 'Dutch', 'Danish', 'Italian', 'Japanese', 'Norwegian', 'Spanish', 'Swedish', 'Portuguese', 'Catalan', 'Traditional_Chinese', 'Esperanto', 'Korean'
$week_start_day 		= 'Sunday';			// Day of the week your week starts on
$week_length			= '7';				// Number of days to display in the week view
$day_start 				= '0700';			// Start time for day grid
$day_end				= '2000';			// End time for day grid
$gridLength 			= '10';				// Grid distance in minutes for day view, multiples of 15 preferred
$num_years 				= '1';				// Number of years (up and back) to display in 'Jump to'
$month_event_lines 		= '1';				// Number of lines to wrap each event title in month view, 0 means display all lines.
$tomorrows_events_lines = '1';				// Number of lines to wrap each event title in the 'Tommorrow's events' box, 0 means display all lines.
$allday_week_lines 		= '1';				// Number of lines to wrap each event title in all-day events in week view, 0 means display all lines.
$week_events_lines 		= '1';				// Number of lines to wrap each event title in the 'Tommorrow's events' box, 0 means display all lines.
$timezone 				= '';				// Set timezone. Read TIMEZONES file for more information
$calendar_path 			= '';				// Leave this blank on most installs, place your full FILE SYSTEM PATH to calendars if they are outside the phpicalendar folder.
$second_offset			= '';				// The time in seconds between your time and your server's time.
$bleed_time				= '-1';				// This allows events past midnight to just be displayed on the starting date, only good up to 24 hours. Range from '0000' to '2359', or '-1' for no bleed time.
$cookie_uri				= ''; 				// The HTTP URL to the PHP iCalendar directory, ie. http://www.example.com/phpicalendar -- AUTO SETTING -- Only set if you are having cookie issues.
$download_uri			= ''; 				// The HTTP URL to your calendars directory, ie. http://www.example.com/phpicalendar/calendars -- AUTO SETTING -- Only set if you are having subscribe issues.
$default_path			= ''; 				// The HTTP URL to the PHP iCalendar directory, ie. http://www.example.com/phpicalendar
$charset				= 'UTF-8';			// Character set your calendar is in, suggested UTF-8, or iso-8859-1 for most languages.

// Yes/No questions --- 'yes' means Yes, anything else means no. 'yes' must be lowercase.
$allow_webcals 			= 'no';				// Allow http:// and webcal:// prefixed URLs to be used as the $cal for remote viewing of "subscribe-able" calendars. This does not have to be enabled to allow specific ones below.
$this_months_events 	= 'yes';			// Display "This month's events" at the bottom off the month page.
$enable_rss				= 'yes';			// Enable RSS access to your calendars (good thing).
$rss_link_to_event		= '';				// Set to yes to have links in the feed popup an event window.  Default is to link to day.php
$show_search			= 'no';			// Show the search box in the sidebar.
$allow_preferences		= 'no';			// Allow visitors to change various preferences via cookies.
$printview_default		= 'no';				// Set print view as the default view. day, week, and month only supported views for $default_view (listed well above).
$show_todos				= 'yes';			// Show your todo list on the side of day and week view.
$show_completed			= 'yes';				// Show completed todos on your todo list.
$allow_login			= 'no';				// Set to yes to prompt for login to unlock calendars.
$login_cookies			= 'no';			// Set to yes to store authentication information via (unencrypted) cookies. Set to no to use sessions.
$support_ical			= 'no';			// Set to yes to support the Apple iCal calendar database structure.
$recursive_path			= 'no';			// Set to yes to recurse into subdirectories of the calendar path.

// Calendar Caching (decreases page load times)
$save_parsed_cals 		= 'no';				// Saves a copy of the cal in /tmp after it's been parsed. Improves performance.
$tmp_dir				= '/tmp';			// The temporary directory on your system (/tmp is fine for UNIXes including Mac OS X). Any php-writable folder works.
$webcal_hours			= '24';				// Number of hours to cache webcals. Setting to '0' will always re-parse webcals.

// Webdav style publishing
$phpicalendar_publishing = '0';				// Set to '1' to enable remote webdav style publish. See 'calendars/publish.php' for complete information;

// Administration settings (/admin/)
$allow_admin			= 'no';			// Set to yes to allow the admin page - remember to change the default password if using 'internal' as the $auth_method			
$auth_method			= 'none';			// Valid values are: 'ftp', 'internal', or 'none'. 'ftp' uses the ftp server's username and password as well as ftp commands to delete and copy files. 'internal' uses $auth_internal_username and $auth_internal_password defined below - CHANGE the password. 'none' uses NO authentication - meant to be used with another form of authentication such as http basic.
$auth_internal_username	= 'admin';			// Only used if $auth_method='internal'. The username for the administrator.
$auth_internal_password	= 'admin';			// Only used if $auth_method='internal'. The password for the administrator.
$ftp_server				= 'localhost';		// Only used if $auth_method='ftp'. The ftp server name. 'localhost' will work for most servers.
$ftp_port				= '21';				// Only used if $auth_method='ftp'. The ftp port. '21' is the default for ftp servers.
$ftp_calendar_path		= '';				// Only used if $auth_method='ftp'. The full path to the calendar directory on the ftp server. If = '', will attempt to deduce the path based on $calendar_path, but may not be accurate depending on ftp server config.

// Calendar colors
//
// You can increase the number of unique colors by adding additional images (monthdot_n.gif) 
// and in the css file (default.css) classes .alldaybg_n, .eventbg_n and .eventbg2_n
// Colors will repeat from the beginning for calendars past $unique_colors (7 by default), with no limit.
$unique_colors			= '7';	

$blacklisted_cals = array();
$list_webcals = array();
$locked_cals = array();
$locked_map = array();

?>
