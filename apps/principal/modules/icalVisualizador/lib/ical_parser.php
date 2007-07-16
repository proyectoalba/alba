<?php
//                 ______________________________________
//                |            PHP iCalendar             |
//                | http://www.phpicalendar.net/         |
//                |______________________________________|
//
//Introduction:
//-------------
//PHP iCalendar is a PHP-based iCal file viewer/parser to display iCals in a Web browser.
//Its based on v2.0 of the IETF spec. It displays iCal files in a nice logical,
//clean manner with day, week, month, and year navigation. It is available in 13
//languages and includes support for printing, searching and RSS news feeds.
//If you need a Calendar application (for creating calendar files), please check
//the 'Supported Calendar Applications' section of the README.
//
//This is GPL code extrated from PHP iCalendar
//

//TZIDs in calendars often contain leading information that should be stripped
//Example: TZID=/mozilla.org/20050126_1/Europe/Berlin
//Need to return the last part only
function parse_tz($data){
        $fields = explode("/",$data);
        $tz = array_pop($fields);
        $tmp = array_pop($fields);
        if (isset($tmp) && $tmp != "") $tz = "$tmp/$tz";
        return $tz;
}



// function to compare to dates in Ymd and return the number of days
// that differ between them.
function dayCompare($now, $then) {
        $seconds_now = strtotime($now);
        $seconds_then =  strtotime($then);
        $diff_seconds = $seconds_now - $seconds_then;
        $diff_minutes = $diff_seconds/60;
        $diff_hours = $diff_minutes/60;
        $diff_days = round($diff_hours/24);

        return $diff_days;
}


// function to compare to dates in Ymd and return the number of weeks
// that differ between them. requires dateOfWeek()
function weekCompare($now, $then) {
        $sun_now = dateOfWeek($now, "Sunday");
        $sun_then = dateOfWeek($then, "Sunday");
        $seconds_now = strtotime($sun_now);
        $seconds_then =  strtotime($sun_then);
        $diff_weeks = round(($seconds_now - $seconds_then)/(60*60*24*7));
        return $diff_weeks;
}




// dateOfWeek() takes a date in Ymd and a day of week in 3 letters or more
// and returns the date of that day. (ie: "sun" or "sunday" would be acceptable values of $day but not "su")
function dateOfWeek($Ymd, $day, $week_start_day = 'Sunday') {
//         global $week_start_day;
        if (!isset($week_start_day)) $week_start_day = 'Sunday';
        $timestamp = strtotime($Ymd);
        $num = date('w', strtotime($week_start_day));
        $start_day_time = strtotime((date('w',$timestamp)==$num ? "$week_start_day" : "last $week_start_day"), $timestamp);
        $ret_unixtime = strtotime($day,$start_day_time);
        // Fix for 992744
        // $ret_unixtime = strtotime('+12 hours', $ret_unixtime);
        $ret_unixtime += (12 * 60 * 60);
        $ret = date('Ymd',$ret_unixtime);
        return $ret;
}



// takes iCalendar 2 day format and makes it into 3 characters
// if $txt is true, it returns the 3 letters, otherwise it returns the
// integer of that day; 0=Sun, 1=Mon, etc.
function two2threeCharDays($day, $txt=true) {
        switch($day) {
                case 'SU': return ($txt ? 'sun' : '0');
                case 'MO': return ($txt ? 'mon' : '1');
                case 'TU': return ($txt ? 'tue' : '2');
                case 'WE': return ($txt ? 'wed' : '3');
                case 'TH': return ($txt ? 'thu' : '4');
                case 'FR': return ($txt ? 'fri' : '5');
                case 'SA': return ($txt ? 'sat' : '6');
        }
}

// localizeDate() - similar to strftime but uses our preset arrays of localized
// months and week days and only supports %A, %a, %B, %b, %e, and %Y
// more can be added as needed but trying to keep it small while we can
function localizeDate($format, $timestamp) {

	global $daysofweek_lang, $daysofweekshort_lang, $daysofweekreallyshort_lang, $monthsofyear_lang, $monthsofyear_lang, $monthsofyearshort_lang;


	$year = date("Y", $timestamp);
	$month = date("n", $timestamp)-1;
	$day = date("j", $timestamp);
	$dayofweek = date("w", $timestamp);
	
	$date = str_replace('%Y', $year, $format);
	$date = str_replace('%e', $day, $date);
	$date = str_replace('%B', $monthsofyear_lang[$month], $date);
	$date = str_replace('%b', $monthsofyearshort_lang[$month], $date);
	$date = str_replace('%A', $daysofweek_lang[$dayofweek], $date);
	$date = str_replace('%a', $daysofweekshort_lang[$dayofweek], $date);
	
	return $date;	
	
}


// Remove an event from the overlap data.
// This could be completely bogus, since overlap array is empty when this gets called in my tests, but I'm leaving it in anyways.
function removeOverlap($ol_start_date, $ol_start_time, $ol_key, &$master_array, &$overlap_array) {
// 	global $master_array, $overlap_array;
	if (isset($overlap_array[$ol_start_date])) {
		if (sizeof($overlap_array[$ol_start_date]) > 0) {
			$ol_end_time = $master_array[$ol_start_date][$ol_start_time][$ol_key]['event_end'];
			foreach ($overlap_array[$ol_start_date] as $block_key => $block) {
				if (in_array(array('time' => $ol_start_time, 'key' => $ol_key), $block['events'])) {
					// Check if this is a 2-event block (i.e., there's no block left when we remove $ol_key
					// and if so, just unset it and move on.
					if (count($block['events']) == 2) {
						foreach ($block['events'] as $event) {
							$master_array[$ol_start_date][$event['time']][$event['key']]['event_overlap'] = 0;
						}
						unset($overlap_array[$ol_start_date][$block_key]);
					} else {
						// remove $ol_key from 'events'
						$event_key = array_search(array('time' => $ol_start_time, 'key' => $ol_key), $block['events']);
						unset($overlap_array[$ol_start_date][$block_key]['events'][$event_key]);

						// These may be bogus, since we're not using drawEventTimes.
						// "clean up" 'overlapRanges' and calc the new maxOverlaps.
						// use the special "-2" count to tell merge_range we're deleting.
						$overlap_array[$ol_start_date][$block_key]['overlapRanges'] = merge_range($block['overlapRanges'], $ol_start_time, $ol_end_time, -2);
						$overlap_array[$ol_start_date][$block_key]['maxOverlaps'] = find_max_overlap($block['overlapRanges']);

						// recreate blockStart and blockEnd from the other events, and fix maxOverlap while we're at it.
						$blockStart = $ol_end_time;
						$blockEnd = $ol_start_time;
						foreach ($overlap_array[$ol_start_date][$block_key]['events'] as $event) {
							$blockStart = min($blockStart, $event['time']);
							$blockEnd = max($blockEnd, $master_array[$ol_start_date][$event['time']][$event['key']]['event_end']);
							$master_array[$ol_start_date][$event['time']][$event['key']]['event_overlap'] = $overlap_array[$ol_start_date][$block_key]['maxOverlaps'];
						}
						$overlap_array[$ol_start_date][$block_key]['blockStart'] = $blockStart;
						$overlap_array[$ol_start_date][$block_key]['blockEnd'] = $blockEnd;
					}
				}
			}
		}
	}
}


// Finds the highest value of 'count' in $ol_ranges
function find_max_overlap($ol_ranges) {

	$count = 0;
	foreach ($ol_ranges as $loop_range) {
		if ($count < $loop_range['count'])
			$count = $loop_range['count'];
	}

	return $count;
}



// Merges overlapping blocks
function flatten_ol_blocks($event_date, $ol_blocks, $new_block_key, &$master_array) {

// 	global $master_array;
	// Loop block = each other block in the array, the ones we're merging into new block.
	// New block = the changed block that caused the flatten_ol_blocks call. Everything gets merged into this.
	$new_block = $ol_blocks[$new_block_key];
	reset($ol_blocks);
	while ($loop_block_array = each($ol_blocks)) {
		$loop_block_key = $loop_block_array['key'];
		$loop_block = $loop_block_array['value'];
		// only compare with other blocks
		if ($loop_block_key != $new_block_key) {
			// check if blocks overlap
			if (($loop_block['blockStart'] < $new_block['blockEnd']) && ($loop_block['blockEnd'] > $new_block['blockStart'])) {
				// define start and end of merged overlap block
				if ($new_block['blockStart'] > $loop_block['blockStart']) $ol_blocks[$new_block_key]['blockStart'] = $loop_block['blockStart'];
				if ($new_block['blockEnd'] < $loop_block['blockEnd']) $ol_blocks[$new_block_key]['blockEnd'] = $loop_block['blockEnd'];
				$ol_blocks[$new_block_key]['events'] = array_merge($new_block['events'], $loop_block['events']);
				$new_block['events'] = $ol_blocks[$new_block_key]['events'];
				foreach ($loop_block['overlapRanges'] as $ol_range) {
					$new_block['overlapRanges'] = merge_range($new_block['overlapRanges'], $ol_range['start'], $ol_range['end'], $ol_range['count']);
				}
				$ol_blocks[$new_block_key]['overlapRanges'] = $new_block['overlapRanges'];
				$ol_blocks[$new_block_key]['maxOverlaps'] = find_max_overlap($new_block['overlapRanges']);
				foreach ($ol_blocks[$new_block_key]['events'] as $event) {
					$master_array[$event_date][$event['time']][$event['key']]['event_overlap'] = $ol_blocks[$new_block_key]['maxOverlaps'];
				}
				unset($ol_blocks[$loop_block_key]);
				reset($ol_blocks);
			}
		} 
	}

	return $ol_blocks;
}


// merge a given range into $ol_ranges. Returns the merged $ol_ranges.
// if count = -2, treat as a "delete" call (for removeOverlap)
// Why -2? That way, there's less fudging of the math in the code.
function merge_range($ol_ranges, $start, $end, $count = 0) {

	foreach ($ol_ranges as $loop_range_key => $loop_range) {
		
		if ($start < $end) {
			// handle ranges between $start and $loop_range['start']
			if ($start < $loop_range['start']) {
				$new_ol_ranges[] = array('count' => $count, 'start' => $start, 'end' => min($loop_range['start'], $end));
				$start = $loop_range['start'];
			}

			// $start is always >= $loop_range['start'] at this point.
			// handles ranges between $loop_range['start'] and $loop_range['end']
			if ($loop_range['start'] < $end && $start < $loop_range['end']) {
				// handles ranges between $loop_range['start'] and $start
				if ($loop_range['start'] < $start) {
					$new_ol_ranges[] = array('count' => $loop_range['count'], 'start' => $loop_range['start'], 'end' => $start);
				}
				// handles ranges between $start and $end (where they're between $loop_range['start'] and $loop_range['end'])
				$new_count = $loop_range['count'] + $count + 1;
				if ($new_count >= 0) {
					$new_ol_ranges[] = array('count' => $new_count, 'start' => $start, 'end' => min($loop_range['end'], $end));
				}
				// handles ranges between $end and $loop_range['end']
				if ($loop_range['end'] > $end) {
					$new_ol_ranges[] = array('count' => $loop_range['count'], 'start' => $end, 'end' => $loop_range['end']);
				}
				$start = $loop_range['end'];
			} else {
				$new_ol_ranges[] = $loop_range;
			}
		} else {
			$new_ol_ranges[] = $loop_range;
		}
	}

	// Catches anything left over.
	if ($start < $end) {
		$new_ol_ranges[] = array('count' => $count, 'start' => $start, 'end' => $end);
	}

	return $new_ol_ranges;
}

// Builds $overlap_array structure, and updates event_overlap in $master_array for the given events.
function checkOverlap($event_date, $event_time, $uid, &$master_array, &$overlap_array) {
// 	global $master_array, $overlap_array;
	if (!isset($event_date)) return;
	$event = $master_array[$event_date][$event_time][$uid];
	// Copy out the array - we replace this at the end.
	$ol_day_array = $overlap_array[$event_date];
	$drawTimes = drawEventTimes($event['event_start'], $event['event_end']);

	// For a given date,
	// 	- check to see if the event's already in a block, and if so, add it.
	//		- make sure the new block doesn't overlap another block, and if so, merge the blocks.
	// - check that there aren't any events we already passed that we should handle.
	//		- "flatten" the structure again, merging the blocks.

	// $overlap_array structure:
	//	array of ($event_dates)
	//		array of unique overlap blocks (no index) -

	// $overlap_block structure
	// 'blockStart'    - $start_time of block - earliest $start_time of the events in the block. 
	//					 Shouldn't be any overlap w/ a different overlap block in that day (as if they overlap, they get merged).
	// 'blockEnd'      - $end_time of block - latest $end_time of the events in the block.
	// 'maxOverlaps'   - max number of overlaps for the whole block (highest 'count' in overlapRanges)
	// 'events'        - array of event "pointers" (no index) - each event in the block.
	//		'time' - $start_time of event in the block
	//		'key'  - $uid of event
	// 'overlapRanges' - array of time ranges + overlap counts (no index) - the specific overlap info.
	//					 Shouldn't be any overlap w/ the overlap ranges in a given overlap_block - if there is overlap, the block should be split.
	//		'count' - number of overlaps that time range (can be zero if that range has no overlaps).
	//		'start' - start_time for the overlap block.
	//		'end'	- end_time for the overlap block.

	$ol_day_array = $overlap_array[$event_date];
	// Track if $event has been merged in, so we don't re-add the details to 'event' or 'overlapRanges' multiple times.
	$already_merged_once = false;
	// First, check the existing overlap blocks, see if the event overlaps with any.
	if (isset($ol_day_array)) {
		foreach ($ol_day_array as $loop_block_key => $loop_ol_block) {
			// Should $event be in this $ol_block? If so, add it.
			if ($loop_ol_block['blockStart'] < $drawTimes['draw_end'] && $loop_ol_block['blockEnd'] > $drawTimes['draw_start']) {
				// ... unless it's already in the $ol_block
				if (!in_array(array('time' => $drawTimes['draw_start'], 'key' => $uid), $loop_ol_block['events'])) {
					$loop_ol_block['events'][] = array('time' => $drawTimes['draw_start'], 'key' => $uid);
					if ($loop_ol_block['blockStart'] > $drawTimes['draw_start']) $loop_ol_block['blockStart'] = $drawTimes['draw_start'];
					if ($loop_ol_block['blockEnd'] < $drawTimes['draw_end']) $loop_ol_block['blockEnd'] = $drawTimes['draw_end'];

					// Merge in the new overlap range
					$loop_ol_block['overlapRanges'] = merge_range($loop_ol_block['overlapRanges'], $drawTimes['draw_start'], $drawTimes['draw_end']);
					$loop_ol_block['maxOverlaps'] = find_max_overlap($loop_ol_block['overlapRanges']);
					foreach ($loop_ol_block['events'] as $max_overlap_event) {
						$master_array[$event_date][$max_overlap_event['time']][$max_overlap_event['key']]['event_overlap'] = $loop_ol_block['maxOverlaps'];
					}
					$ol_day_array[$loop_block_key] = $loop_ol_block;
					$ol_day_array = flatten_ol_blocks($event_date, $ol_day_array, $loop_block_key, $master_array);
					$already_merged_once = true;
					break;
				// Handle repeat calls to checkOverlap - semi-bogus since the event shouldn't be created more than once, but this makes sure we don't get an invalid event_overlap.
				} else {
					$master_array[$event_date][$event_time][$uid]['event_overlap'] = $loop_ol_block['maxOverlaps'];
				}
			}
		}
	}

	// Then, check all the events, make sure there isn't a new overlap that we need to create.
	foreach ($master_array[$event_date] as $time_key => $time) {
		// Skip all-day events for overlap purposes.
		if ($time_key != '-1') {
			foreach ($time as $loop_event_key => $loop_event) {
				// Make sure we haven't already dealt with the event, and we're not checking against ourself.
				if ($loop_event['event_overlap'] == 0 && $loop_event_key != $uid) {
					$loopDrawTimes = drawEventTimes($loop_event['event_start'], $loop_event['event_end']);
					if ($loopDrawTimes['draw_start'] < $drawTimes['draw_end'] && $loopDrawTimes['draw_end'] > $drawTimes['draw_start']) {
						if ($loopDrawTimes['draw_start'] < $drawTimes['draw_start']) {
							$block_start = $loopDrawTimes['draw_start'];
						} else {
							$block_start = $drawTimes['draw_start'];
						}
						if ($loopDrawTimes['draw_end'] > $drawTimes['draw_end']) {
							$block_end = $loopDrawTimes['draw_end'];
						} else {
							$block_end = $drawTimes['draw_end'];
						}
						$events = array(array('time' => $loopDrawTimes['draw_start'], 'key' => $loop_event_key));
						$overlap_ranges = array(array('count' => 0, 'start' => $loopDrawTimes['draw_start'], 'end' => $loopDrawTimes['draw_end']));
						// Only add $event if we haven't already put it in a block
						if (!$already_merged_once) {
							$events[] = array('time' => $drawTimes['draw_start'], 'key' => $uid); 
							$overlap_ranges = merge_range($overlap_ranges, $drawTimes['draw_start'], $drawTimes['draw_end']);
							$already_merged_once = true;
						}
						$ol_day_array[] = array('blockStart' => $block_start, 'blockEnd' => $block_end, 'maxOverlaps' => 1, 'events' => $events, 'overlapRanges' => $overlap_ranges);

						foreach ($events as $max_overlap_event) {
							$master_array[$event_date][$max_overlap_event['time']][$max_overlap_event['key']]['event_overlap'] = 1;
						}
						// Make sure we pass in the key of the newly added item above.
						end($ol_day_array);
						$last_day_key = key($ol_day_array);
						$ol_day_array = flatten_ol_blocks($event_date, $ol_day_array, $last_day_key, $master_array);
					}
				}
			}
		}
	}

	$overlap_array[$event_date] = $ol_day_array;

//for debugging the checkOverlap function
//if ($event_date == '20050506') {
//print 'Date: ' . $event_date . ' / Time: ' . $event_time . ' / Key: ' . $uid . "<br />\n";
//print '<pre>';
//print_r($master_array[$event_date]);
//print_r($overlap_array[$event_date]);
//print '</pre>';
//}

}

function drawEventTimes ($start, $end) {
        $gridLength=15;

        preg_match ('/([0-9]{2})([0-9]{2})/', $start, $time);
        $sta_h = $time[1];
        $sta_min = $time[2];
        $sta_min = sprintf("%02d", floor($sta_min / $gridLength) * $gridLength);
        if ($sta_min == 60) {
                $sta_h = sprintf("%02d", ($sta_h + 1));
                $sta_min = "00";
        }

        preg_match ('/([0-9]{2})([0-9]{2})/', $end, $time);
        $end_h = $time[1];
        $end_min = $time[2];
        $end_min = sprintf("%02d", floor($end_min / $gridLength) * $gridLength);
        if ($end_min == 60) {
                $end_h = sprintf("%02d", ($end_h + 1));
                $end_min = "00";
        }

        if (($sta_h . $sta_min) == ($end_h . $end_min))  {
                $end_min += $gridLength;
                if ($end_min == 60) {
                        $end_h = sprintf("%02d", ($end_h + 1));
                        $end_min = "00";
                }
        }

        $draw_len = ($end_h * 60 + $end_min) - ($sta_h * 60 + $sta_min);

        return array ("draw_start" => ($sta_h . $sta_min), "draw_end" => ($end_h . $end_min), "draw_length" => $draw_len);
}


// calcTime calculates the unixtime of a new offset by comparing it to the current offset
// $have is the current offset (ie, '-0500')
// $want is the wanted offset (ie, '-0700')
// $time is the unixtime relative to $have
function calcTime($have, $want, $time) {
	if ($have == 'none' || $want == 'none') return $time;
	$have_secs = calcOffset($have);
	$want_secs = calcOffset($want);
	$diff = $want_secs - $have_secs;
	$time += $diff;
	return $time;
}


// calcOffset takes an offset (ie, -0500) and returns it in the number of seconds
function calcOffset($offset_str) {
        $sign = substr($offset_str, 0, 1);
        $hours = substr($offset_str, 1, 2);
        $mins = substr($offset_str, 3, 2);
        $secs = ((int)$hours * 3600) + ((int)$mins * 60);
        if ($sign == '-') $secs = 0 - $secs;
        return $secs;
}



function chooseOffset($time, &$timezone, &$tz_array) {
//         global $timezone, $tz_array;
        if (!isset($timezone)) $timezone = '';
        switch ($timezone) {
                case '':
                        $offset = 'none';
                        break;
                case 'Same as Server':
                        $offset = date('O', $time);
                        break;
                default:
                        if (is_array($tz_array) && array_key_exists($timezone, $tz_array)) {
                                $dlst = date('I', $time);
                                $offset = $tz_array[$timezone][$dlst];
                        } else {
                                $offset = '+0000';
                        }
        }
        return $offset;
}


// Returns an array of the date and time extracted from the data
// passed in. This array contains (unixtime, date, time, allday).
//
// $data		= A string representing a date-time per RFC2445.
// $property	= The property being examined, e.g. DTSTART, DTEND.
// $field		= The full field being examined, e.g. DTSTART;TZID=US/Pacific
function extractDateTime($data, $property, $field, &$tz_array) {
// 	global $tz_array;
	
	// Initialize values.
	unset($unixtime, $date, $time, $allday);
	
	$allday =''; #suppress error on returning undef.
	// Check for zulu time.
	$zulu_time = false;
	if (substr($data,-1) == 'Z') $zulu_time = true;
	$data = str_replace('Z', '', $data);
	
	// Remove some substrings we don't want to look at.
	$data = str_replace('T', '', $data);
	$field = str_replace(';VALUE=DATE-TIME', '', $field); 
	
	// Extract date-only values.
	if ((preg_match('/^'.$property.';VALUE=DATE/i', $field)) || (ereg ('^([0-9]{4})([0-9]{2})([0-9]{2})$', $data)))  {
		// Pull out the date value. Minimum year is 1970.
		ereg ('([0-9]{4})([0-9]{2})([0-9]{2})', $data, $dt_check);
		if ($dt_check[1] < 1970) { 
			$data = '1971'.$dt_check[2].$dt_check[3];
		}
		
		// Set the values.
		$unixtime = strtotime($data);
		$date = date('Ymd', $unixtime);
		$allday = $data;
	}
	
	// Extract date-time values.
	else {
		// Pull out the timezone, or use GMT if zulu time was indicated.
		if (preg_match('/^'.$property.';TZID=/i', $field)) {
			$tz_tmp = explode('=', $field);
			$tz_dt = parse_tz($tz_tmp[1]);
			unset($tz_tmp);
		} elseif ($zulu_time) {
			$tz_dt = 'GMT';
		}

		// Pull out the date and time values. Minimum year is 1970.
		preg_match ('/([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{0,2})([0-9]{0,2})/', $data, $regs);
		if ($regs[1] < 1970) { 
			$regs[1] = '1971';
		}
		$date = $regs[1] . $regs[2] . $regs[3];
		$time = $regs[4] . $regs[5];
		$unixtime = mktime($regs[4], $regs[5], 0, $regs[2], $regs[3], $regs[1]);

		// Check for daylight savings time.
		$dlst = date('I', $unixtime);
		$server_offset_tmp = chooseOffset($unixtime, $timezone, $tz_array);
		if (isset($tz_dt)) {
			if (array_key_exists($tz_dt, $tz_array)) {
				$offset_tmp = $tz_array[$tz_dt][$dlst];
			} else {
				$offset_tmp = '+0000';
			}
		} elseif (isset($calendar_tz)) {
			if (array_key_exists($calendar_tz, $tz_array)) {
				$offset_tmp = $tz_array[$calendar_tz][$dlst];
			} else {
				$offset_tmp = '+0000';
			}
		} else {
			$offset_tmp = $server_offset_tmp;
		}
		
		// Set the values.
		$unixtime = calcTime($offset_tmp, $server_offset_tmp, $unixtime);
		$date = date('Ymd', $unixtime);
		$time = date('Hi', $unixtime);
	}
	
	// Return the results.
	return array($unixtime, $date, $time, $allday);
}



function icalToArray($filename, $fromdate, $todate) {
//      $filename = "/var/www/phpicalendar/calendars/pepe.ics";

        $timezone = "America/Buenos_Aires";
        $tz_array['America/Buenos_Aires']       = array('-0300', '-0300');

                $master_array = array();
		$ifile = @fopen($filename, "r");
		if ($ifile == FALSE) exit("Cant Open file: ". $filename."\n");
		$nextline = fgets($ifile, 1024);
		if (trim($nextline) != 'BEGIN:VCALENDAR') exit("It is not a valid ical file: ". $filename."\n");
		
//     $master_array['-4'] = Array ( Array  ( 'mtime' => 1182541233, 'filename'  => './calendars/pepe.ics','webcal' => 'no'));

//     $master_array['-3'] = Array  ( 'pepe');
        
		// Set a value so we can check to make sure $master_array contains valid data
  		$master_array['-1'] = 'valid cal file';
	
		// Set default calendar name - can be overridden by X-WR-CALNAME
		$calendar_name = $cal_filename;
  		$master_array['calendar_name'] 	= $calendar_name;

        $overlap_array = array();
		
	// read file in line by line
	// XXX end line is skipped because of the 1-line readahead
		while (!feof($ifile)) {
			$line = $nextline;
			$nextline = fgets($ifile, 1024);
			$nextline = ereg_replace("[\r\n]", "", $nextline);
			#handle continuation lines that start with either a space or a tab (MS Outlook)
			while ($nextline{0} == " " || $nextline{0} == "\t") { 
				$line = $line . substr($nextline, 1);
				$nextline = fgets($ifile, 1024);
				$nextline = ereg_replace("[\r\n]", "", $nextline);
			}
			$line = trim($line);
			
		switch ($line) {
			case 'BEGIN:VEVENT':
				// each of these vars were being set to an empty string
				unset (
					$start_time, $end_time, $start_date, $end_date, $summary, 
					$allday_start, $allday_end, $start, $end, $the_duration, 
					$beginning, $rrule_array, $start_of_vevent, $description, $url, 
					$valarm_description, $start_unixtime, $end_unixtime, $display_end_tmp, $end_time_tmp1, 
					$recurrence_id, $uid, $class, $location, $rrule, $abs_until, $until_check,
					$until, $bymonth, $byday, $bymonthday, $byweek, $byweekno, 
					$byminute, $byhour, $bysecond, $byyearday, $bysetpos, $wkst,
					$interval, $number
				);
					
				$except_dates 	= array();
				$except_times 	= array();
				$bymonth	 	= array();
				$bymonthday 	= array();
				$first_duration = TRUE;
				$count 			= 1000000;
				$valarm_set 	= FALSE;
				$attendee		= array();
				$organizer		= array();
				
				break;
			
			case 'END:VEVENT':
				
				if (!isset($url)) $url = '';
				if (!isset($type)) $type = '';
				
				// Handle DURATION
				if (!isset($end_unixtime) && isset($the_duration)) {
					$end_unixtime 	= $start_unixtime + $the_duration;
					$end_time 	= date ('Hi', $end_unixtime);
				}
					
				// CLASS support
				if (isset($class)) {
					if ($class == 'PRIVATE') {
						$summary ='**PRIVATE**';
						$description ='**PRIVATE**';
					} elseif ($class == 'CONFIDENTIAL') {
						$summary ='**CONFIDENTIAL**';
						$description ='**CONFIDENTIAL**';
					}
				}	 
				
				// make sure we have some value for $uid
				if (!isset($uid)) {
					$uid = $uid_counter;
					$uid_counter++;
					$uid_valid = false;
				} else {
					$uid_valid = true;
				}
				
				if ($uid_valid && isset($processed[$uid]) && isset($recurrence_id['date'])) {
					
					$old_start_date = $processed[$uid][0];
					$old_start_time = $processed[$uid][1];
					if ($recurrence_id['value'] == 'DATE') $old_start_time = '-1';
					$start_date_tmp = $recurrence_id['date'];
					if (!isset($start_date)) $start_date = $old_start_date;
					if (!isset($start_time)) $start_time = $master_array[$old_start_date][$old_start_time][$uid]['event_start'];
					if (!isset($start_unixtime)) $start_unixtime = $master_array[$old_start_date][$old_start_time][$uid]['start_unixtime'];
					if (!isset($end_unixtime)) $end_unixtime = $master_array[$old_start_date][$old_start_time][$uid]['end_unixtime'];
					if (!isset($end_time)) $end_time = $master_array[$old_start_date][$old_start_time][$uid]['event_end'];
					if (!isset($summary)) $summary = $master_array[$old_start_date][$old_start_time][$uid]['event_text'];
					if (!isset($length)) $length = $master_array[$old_start_date][$old_start_time][$uid]['event_length'];
					if (!isset($description)) $description = $master_array[$old_start_date][$old_start_time][$uid]['description'];
					if (!isset($location)) $location = $master_array[$old_start_date][$old_start_time][$uid]['location'];
					if (!isset($organizer)) $organizer = $master_array[$old_start_date][$old_start_time][$uid]['organizer'];
					if (!isset($status)) $status = $master_array[$old_start_date][$old_start_time][$uid]['status'];
					if (!isset($attendee)) $attendee = $master_array[$old_start_date][$old_start_time][$uid]['attendee'];
					if (!isset($url)) $url = $master_array[$old_start_date][$old_start_time][$uid]['url'];
					removeOverlap($start_date_tmp, $old_start_time, $uid, $master_array, $overlap_array);
					if (isset($master_array[$start_date_tmp][$old_start_time][$uid])) {
						unset($master_array[$start_date_tmp][$old_start_time][$uid]);  // SJBO added $uid twice here
						if (sizeof($master_array[$start_date_tmp][$old_start_time]) == 0) {
							unset($master_array[$start_date_tmp][$old_start_time]);
						}
					}
					
					$write_processed = false;
				} else {
					$write_processed = true;
				}
				
				if (!isset($summary)) 		$summary = '';
				if (!isset($description)) 	$description = '';
				if (!isset($status)) 		$status = '';
				if (!isset($class)) 		$class = '';
				if (!isset($location)) 		$location = '';
				
				$mArray_begin = mktime (0,0,0,12,21,($this_year - 1));
				$mArray_end = mktime (0,0,0,1,12,($this_year + 1));
				
				if (isset($start_time) && isset($end_time)) {
					// Mozilla style all-day events or just really long events
					if (($end_time - $start_time) > 2345) {
						$allday_start = $start_date;
						$allday_end = ($start_date + 1);
					}
				}
				if (isset($start_unixtime,$end_unixtime) && date('Ymd',$start_unixtime) != date('Ymd',$end_unixtime)) {
					$spans_day = true;
					$bleed_check = (($start_unixtime - $end_unixtime) < (60*60*24)) ? '-1' : '0';
				} else {
					$spans_day = false;
					$bleed_check = 0;
				}
				if (isset($start_time) && $start_time != '') {
					preg_match ('/([0-9]{2})([0-9]{2})/', $start_time, $time);
					preg_match ('/([0-9]{2})([0-9]{2})/', $end_time, $time2);
					if (isset($start_unixtime) && isset($end_unixtime)) {
						$length = $end_unixtime - $start_unixtime;
					} else {
						$length = ($time2[1]*60+$time2[2]) - ($time[1]*60+$time[2]);
					}
					
					$drawKey = drawEventTimes($start_time, $end_time);

					preg_match ('/([0-9]{2})([0-9]{2})/', $drawKey['draw_start'], $time3);
					$hour = $time3[1];
					$minute = $time3[2];
				}
	
				// RECURRENCE-ID Support
				if (isset($recurrence_d)) {
					
					$recurrence_delete["$recurrence_d"]["$recurrence_t"] = $uid;
				}
					
				// handle single changes in recurring events
				// Maybe this is no longer need since done at bottom of parser? - CL 11/20/02
				if ($uid_valid && $write_processed) {
					if (!isset($hour)) $hour = 00;
					if (!isset($minute)) $minute = 00;
					$processed[$uid] = array($start_date,($hour.$minute), $type);
				}
							
				// Handling of the all day events
				if ((isset($allday_start) && $allday_start != '')) {
  					$start = strtotime($allday_start);
 					if ($spans_day) {
 						$allday_end = date('Ymd',$end_unixtime);
 					}
  					if (isset($allday_end)) {
  						$end = strtotime($allday_end);
  					} else {
						$end = strtotime('+1 day', $start);
					}
					// Changed for 1.0, basically write out the entire event if it starts while the array is written.
					# while loop handles multi-day allday events to write separate master_array elements for each day.
					if (($start < $mArray_end) && ($start < $end)) {
						while (($start != $end) && ($start < $mArray_end)) {
							$start_date2 = date('Ymd', $start);
							$master_array[($start_date2)][('-1')][$uid]= array (
								'event_text' => $summary, 
								'description' => $description, 
								'location' => $location, 
								'organizer' => serialize($organizer), 
								'attendee' => serialize($attendee), 
								'calnumber' => $calnumber, 
								'calname' => $actual_calname, 
								'url' => $url, 
								'status' => $status, 
								'class' => $class );
							$start = strtotime('+1 day', $start);
						}
						if (!$write_processed) $master_array[($start_date)]['-1'][$uid]['exception'] = true;
					}
				}
				
				// Handling regular events
				if ((isset($start_time) && $start_time != '') && (!isset($allday_start) || $allday_start == '')) {
					if (($end_time >= $bleed_time) && ($bleed_check == '-1')) {
						$start_tmp = strtotime(date('Ymd',$start_unixtime));
						$end_date_tmp = date('Ymd',$end_unixtime);
						while ($start_tmp < $end_unixtime) {
							$start_date_tmp = date('Ymd',$start_tmp);
							if ($start_date_tmp == $start_date) {
								$time_tmp = $hour.$minute;
								$start_time_tmp = $start_time;
							} else {
								$time_tmp = '0000';
								$start_time_tmp = '0000';
							}
							if ($start_date_tmp == $end_date_tmp) {
								$end_time_tmp = $end_time;
							} else {
								$end_time_tmp = '2400';
								$display_end_tmp = $end_time;
							}
							
							$master_array[$start_date_tmp][$time_tmp][$uid] = array (
								'event_start' => $start_time_tmp, 
								'event_end' => $end_time_tmp, 
								'start_unixtime' => $start_unixtime, 
								'end_unixtime' => $end_unixtime, 
								'event_text' => $summary, 
								'event_length' => $length, 
								'event_overlap' => 0, 
								'description' => $description, 
								'status' => $status, 
								'class' => $class, 
								'spans_day' => true, 
								'location' => $location, 
								'organizer' => serialize($organizer), 
								'attendee' => serialize($attendee), 
								'calnumber' => $calnumber, 
								'calname' => $actual_calname, 
								'url' => $url );
							if (isset($display_end_tmp)){
								$master_array[$start_date_tmp][$time_tmp][$uid]['display_end'] = $display_end_tmp;
							}
							checkOverlap($start_date_tmp, $time_tmp, $uid, $master_array, $overlap_array);
							$start_tmp = strtotime('+1 day',$start_tmp);
						}
						if (!$write_processed) $master_array[$start_date][($hour.$minute)][$uid]['exception'] = true;
					} else {
						if ($bleed_check == '-1') {
							$display_end_tmp = $end_time;
							$end_time_tmp1 = '2400';	
						}
						
						if (!isset($end_time_tmp1)) $end_time_tmp1 = $end_time;
					
						// This if statement should prevent writing of an excluded date if its the first recurrance - CL
						if (!in_array($start_date, $except_dates)) {
							$master_array[($start_date)][($hour.$minute)][$uid] = array (
								'event_start' => $start_time, 
								'event_end' => $end_time_tmp1, 
								'start_unixtime' => $start_unixtime, 
								'end_unixtime' => $end_unixtime, 
								'event_text' => $summary, 
								'event_length' => $length, 
								'event_overlap' => 0, 
								'description' => $description, 
								'status' => $status, 
								'class' => $class, 
								'spans_day' => false, 
								'location' => $location, 
								'organizer' => serialize($organizer), 
								'attendee' => serialize($attendee), 
								'calnumber' => $calnumber, 
								'calname' => $actual_calname, 
								'url' => $url );
							if (isset($display_end_tmp)){
								$master_array[($start_date)][($hour.$minute)][$uid]['display_end'] = $display_end_tmp;
							}
							checkOverlap($start_date, ($hour.$minute), $uid, $master_array, $overlap_array);
							if (!$write_processed) $master_array[($start_date)][($hour.$minute)][$uid]['exception'] = true;
						}
					}
				}
				
				// Handling of the recurring events, RRULE
				if (isset($rrule_array) && is_array($rrule_array)) {
					if (isset($allday_start) && $allday_start != '') {
						$hour = '-';
						$minute = '1';
						$rrule_array['START_DAY'] = $allday_start;
						$rrule_array['END_DAY'] = $allday_end;
						$rrule_array['END'] = 'end';
						$recur_start = $allday_start;
						$start_date = $allday_start;
						if (isset($allday_end)) {
							$diff_allday_days = dayCompare($allday_end, $allday_start);
						 } else {
							$diff_allday_days = 1;
						}
					} else {
						$rrule_array['START_DATE'] = $start_date;
						$rrule_array['START_TIME'] = $start_time;
						$rrule_array['END_TIME'] = $end_time;
						$rrule_array['END'] = 'end';
					}
					
					$start_date_time = strtotime($start_date);
					if (!isset($fromdate)){
						#this should happen if not in one of the rss views
/*						$this_month_start_time = strtotime($this_year.$this_month.'01');
						if ($current_view == 'year' || ($save_parsed_cals == 'yes' && !$is_webcal)|| $current_view == 'print' && $printview == 'year') {
							$start_range_time = strtotime($this_year.'-01-01 -2 weeks');
							$end_range_time = strtotime($this_year.'-12-31 +2 weeks');
						} else {
							$start_range_time = strtotime('-1 month -2 day', $this_month_start_time);
							$end_range_time = strtotime('+2 month +2 day', $this_month_start_time);
						}*/
					}else{
							$start_range_time = strtotime($fromdate);
							$end_range_time = strtotime($todate)+60*60*24;
					}

					foreach ($rrule_array as $key => $val) {
						switch($key) {
							case 'FREQ':
								switch ($val) {
									case 'YEARLY':		$freq_type = 'year';	break;
									case 'MONTHLY':		$freq_type = 'month';	break;
									case 'WEEKLY':		$freq_type = 'week';	break;
									case 'DAILY':		$freq_type = 'day';		break;
									case 'HOURLY':		$freq_type = 'hour';	break;
									case 'MINUTELY':	$freq_type = 'minute';	break;
									case 'SECONDLY':	$freq_type = 'second';	break;
								}
								$master_array[($start_date)][($hour.$minute)][$uid]['recur'][$key] = strtolower($val);
								break;
							case 'COUNT':
								$count = $val;
								$master_array[($start_date)][($hour.$minute)][$uid]['recur'][$key] = $count;
								break;
							case 'UNTIL':
								$until = str_replace('T', '', $val);
								$until = str_replace('Z', '', $until);
								if (strlen($until) == 8) $until = $until.'235959';
								$abs_until = $until;
								ereg ('([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})', $until, $regs);
								$until = mktime($regs[4],$regs[5],$regs[6],$regs[2],$regs[3],$regs[1]);
								$master_array[($start_date)][($hour.$minute)][$uid]['recur'][$key] = localizeDate($dateFormat_week,$until);
								break;
							case 'INTERVAL':
								if ($val > 0){
								$number = $val;
								$master_array[($start_date)][($hour.$minute)][$uid]['recur'][$key] = $number;
								}
								break;
							case 'BYSECOND':
								$bysecond = $val;
								$bysecond = split (',', $bysecond);
								$master_array[($start_date)][($hour.$minute)][$uid]['recur'][$key] = $bysecond;
								break;
							case 'BYMINUTE':
								$byminute = $val;
								$byminute = split (',', $byminute);
								$master_array[($start_date)][($hour.$minute)][$uid]['recur'][$key] = $byminute;
								break;
							case 'BYHOUR':
								$byhour = $val;
								$byhour = split (',', $byhour);
								$master_array[($start_date)][($hour.$minute)][$uid]['recur'][$key] = $byhour;
								break;
							case 'BYDAY':
								$byday = $val;
								$byday = split (',', $byday);
								$master_array[($start_date)][($hour.$minute)][$uid]['recur'][$key] = $byday;
								break;
							case 'BYMONTHDAY':
								$bymonthday = $val;
								$bymonthday = split (',', $bymonthday);
								$master_array[($start_date)][($hour.$minute)][$uid]['recur'][$key] = $bymonthday;
								break;					
							case 'BYYEARDAY':
								$byyearday = $val;
								$byyearday = split (',', $byyearday);
								$master_array[($start_date)][($hour.$minute)][$uid]['recur'][$key] = $byyearday;
								break;
							case 'BYWEEKNO':
								$byweekno = $val;
								$byweekno = split (',', $byweekno);
								$master_array[($start_date)][($hour.$minute)][$uid]['recur'][$key] = $byweekno;
								break;
							case 'BYMONTH':
								$bymonth = $val;
								$bymonth = split (',', $bymonth);
								$master_array[($start_date)][($hour.$minute)][$uid]['recur'][$key] = $bymonth;
								break;
							case 'BYSETPOS':
								$bysetpos = $val;
								$master_array[($start_date)][($hour.$minute)][$uid]['recur'][$key] = $bysetpos;
								break;
							case 'WKST':
								$wkst = $val;
								$master_array[($start_date)][($hour.$minute)][$uid]['recur'][$key] = $wkst;
								break;
							case 'END':

							$recur = $master_array[($start_date)][($hour.$minute)][$uid]['recur'];

							// Modify the COUNT based on BYDAY
							if ((is_array($byday)) && (isset($count))) {
								$blah = sizeof($byday);
								$count = ($count / $blah);
								unset ($blah);
							}
						
							if (!isset($number)) $number = 1;
							// if $until isn't set yet, we set it to the end of our range we're looking at   
							
							if (!isset($until)) $until = $end_range_time;
							if (!isset($abs_until)) $abs_until = date('YmdHis', $end_range_time);
							$end_date_time = $until;
							$start_range_time_tmp = $start_range_time;
							$end_range_time_tmp = $end_range_time;
// echo date("Ymd",$until)." ".date("Ymd",$end_range_time)."<br>";
// echo date("Ymd",$end_range_time_tmp)." >= ".date("Ymd",$start_date_time)." && ".date("Ymd",$start_range_time_tmp)." <= ".date("Ymd",$end_date_time)."<br>";
							
							// If the $end_range_time is less than the $start_date_time, or $start_range_time is greater
							// than $end_date_time, we may as well forget the whole thing
							// It doesn't do us any good to spend time adding data we aren't even looking at
							// this will prevent the year view from taking way longer than it needs to
							if ($end_range_time_tmp >= $start_date_time && $start_range_time_tmp <= $end_date_time) {
							
								// if the beginning of our range is less than the start of the item, we may as well set it equal to it
								if ($start_range_time_tmp < $start_date_time){
									$start_range_time_tmp = $start_date_time;
								}	
								if ($end_range_time_tmp > $end_date_time) $end_range_time_tmp = $end_date_time;
					
								// initialize the time we will increment
								$next_range_time = $start_range_time_tmp;
								
								// FIXME: This is a hack to fix repetitions with $interval > 1 
								if ($count > 1 && $number > 1) $count = 1 + ($count - 1) * $number; 
								
								$count_to = 0;
								// start at the $start_range and go until we hit the end of our range.
								if(!isset($wkst)) $wkst='SU';
								$wkst3char = two2threeCharDays($wkst);

								while (($next_range_time >= $start_range_time_tmp) && ($next_range_time <= $end_range_time_tmp) && ($count_to != $count)) {
									$func = $freq_type.'Compare';
									$diff = $func(date('Ymd',$next_range_time), $start_date);
									if ($diff < $count) {
										if ($diff % $number == 0) {
											$interval = $number;
											switch ($rrule_array['FREQ']) {
												case 'DAILY':
													$next_date_time = $next_range_time;
													$recur_data[] = $next_date_time;
													break;
												case 'WEEKLY':
													// Populate $byday with the default day if it's not set.
													if (!isset($byday)) {
														$byday[] = strtoupper(substr(date('D', $start_date_time), 0, 2));
													}
													if (is_array($byday)) {
														foreach($byday as $day) {
															$day = two2threeCharDays($day);	
															#need to find the first day of the appropriate week.
															#dateOfweek uses weekstartday as a global variable. This has to be changed to $wkst, 
															#but then needs to be reset for other functions
															$week_start_day_tmp = $week_start_day;
															$week_start_day = $wkst3char;
															
															$the_sunday = dateOfWeek(date("Ymd",$next_range_time), $wkst3char);
															$next_date_time = strtotime($day,strtotime($the_sunday)) + (12 * 60 * 60);
															$week_start_day = $week_start_day_tmp; #see above reset to global value
															
															#reset $next_range_time to first instance in this week.
															if ($next_date_time < $next_range_time){ 
																$next_range_time = $next_date_time; 
															}
															// Since this renders events from $next_range_time to $next_range_time + 1 week, I need to handle intervals
															// as well. This checks to see if $next_date_time is after $day_start (i.e., "next week"), and thus
															// if we need to add $interval weeks to $next_date_time.
															if ($next_date_time > strtotime($week_start_day, $next_range_time) && $interval > 1) {
															#	$next_date_time = strtotime('+'.($interval - 1).' '.$freq_type, $next_date_time);
															}
															$recur_data[] = $next_date_time;
														}
													}
													break;
												case 'MONTHLY':
													if (empty($bymonth)) $bymonth = array(1,2,3,4,5,6,7,8,9,10,11,12);
													$next_range_time = strtotime(date('Y-m-01', $next_range_time));
													$next_date_time = $next_date_time;
													if (isset($bysetpos)){
														/* bysetpos code from dustinbutler
														start on day 1 or last day. 
														if day matches any BYDAY the count is incremented. 
														SETPOS = 4, need 4th match 
														SETPOS = -1, need 1st match 
													 	*/ 
													 	$year = date('Y', $next_range_time); 
													 	$month = date('m', $next_range_time); 
													 	if ($bysetpos > 0) { 
													  		$next_day = '+1 day'; 
													  		$day = 1; 
													 	} else { 
													  		$next_day = '-1 day'; 
													  		$day = $totalDays[$month]; 
													 	} 
													 	$day = mktime(0, 0, 0, $month, $day, $year); 
													 	$countMatch = 0; 
													 	while ($countMatch != abs($bysetpos)) { 
													  		/* Does this day match a BYDAY value? */ 
													  		$thisDay = $day; 
													  		$textDay = strtoupper(substr(date('D', $thisDay), 0, 2)); 
													  		if (in_array($textDay, $byday)) { 
													   			$countMatch++; 
													  		} 
													  		$day = strtotime($next_day, $thisDay); 
													 	} 
													 	$recur_data[] = $thisDay; 
													}elseif ((isset($bymonthday)) && (!isset($byday))) {
														foreach($bymonthday as $day) {
															if ($day < 0) $day = ((date('t', $next_range_time)) + ($day)) + 1;
															$year = date('Y', $next_range_time);
															$month = date('m', $next_range_time);
															if (checkdate($month,$day,$year)) {
																$next_date_time = mktime(0,0,0,$month,$day,$year);
																$recur_data[] = $next_date_time;
															}
														}
													} elseif (is_array($byday)) {
														foreach($byday as $day) {
															ereg ('([-\+]{0,1})?([0-9]{1})?([A-Z]{2})', $day, $byday_arr);
															//Added for 2.0 when no modifier is set
															if ($byday_arr[2] != '') {
																$nth = $byday_arr[2]-1;
															} else {
																$nth = 0;
															}
															$on_day = two2threeCharDays($byday_arr[3]);
															$on_day_num = two2threeCharDays($byday_arr[3],false);
															if ((isset($byday_arr[1])) && ($byday_arr[1] == '-')) {
																$last_day_tmp = date('t',$next_range_time);
																$next_range_time = strtotime(date('Y-m-'.$last_day_tmp, $next_range_time));
																$last_tmp = (date('w',$next_range_time) == $on_day_num) ? '' : 'last ';
																$next_date_time = strtotime($last_tmp.$on_day, $next_range_time) - $nth * 604800;
																$month = date('m', $next_date_time);
																if (in_array($month, $bymonth)) {
																	$recur_data[] = $next_date_time;
																}
																#reset next_range_time to start of month
																$next_range_time = strtotime(date('Y-m-'.'1', $next_range_time));

															} elseif (isset($bymonthday) && (!empty($bymonthday))) {
																// This supports MONTHLY where BYDAY and BYMONTH are both set
																foreach($bymonthday as $day) {
																	$year 	= date('Y', $next_range_time);
																	$month 	= date('m', $next_range_time);
																	if (checkdate($month,$day,$year)) {
																		$next_date_time = mktime(0,0,0,$month,$day,$year);
																		$daday = strtolower(strftime("%a", $next_date_time));
																		if ($daday == $on_day && in_array($month, $bymonth)) {
																			$recur_data[] = $next_date_time;
																		}
																	}
																}
															} elseif ((isset($byday_arr[1])) && ($byday_arr[1] != '-')) {
																$next_date_time = strtotime($on_day, $next_range_time) + $nth * 604800;
																$month = date('m', $next_date_time);
																if (in_array($month, $bymonth)) {
																	$recur_data[] = $next_date_time;
																}
															}
															$next_date = date('Ymd', $next_date_time);
														}
													}
													break;
												case 'YEARLY':
													if ((!isset($bymonth)) || (sizeof($bymonth) == 0)) {
														$m = date('m', $start_date_time);
														$bymonth = array("$m");
													}	

													foreach($bymonth as $month) {
														// Make sure the month & year used is within the start/end_range.
														if ($month < date('m', $next_range_time)) {
															$year = date('Y', $next_range_time);
														} else {
															$year = date('Y', $next_range_time);
														}
														if (isset($bysetpos)){
															/* bysetpos code from dustinbutler
															start on day 1 or last day. 
															if day matches any BYDAY the count is incremented. 
															SETPOS = 4, need 4th match 
															SETPOS = -1, need 1st match 
															*/ 
															if ($bysetpos > 0) { 
																$next_day = '+1 day'; 
																$day = 1; 
															} else { 
																$next_day = '-1 day'; 
																$day = date("t",$month); 
															} 
															$day = mktime(12, 0, 0, $month, $day, $year); 
															$countMatch = 0; 
															while ($countMatch != abs($bysetpos)) { 
																/* Does this day match a BYDAY value? */ 
																$thisDay = $day;
																$textDay = strtoupper(substr(date('D', $thisDay), 0, 2)); 
																if (in_array($textDay, $byday)) { 
																	$countMatch++; 
																} 
																$day = strtotime($next_day, $thisDay); 
															} 
															$recur_data[] = $thisDay; 															
														}
														if ((isset($byday)) && (is_array($byday))) {
															$checkdate_time = mktime(0,0,0,$month,1,$year);
															foreach($byday as $day) {
																ereg ('([-\+]{0,1})?([0-9]{1})?([A-Z]{2})', $day, $byday_arr);
																if ($byday_arr[2] != '') {
																	$nth = $byday_arr[2]-1;
																} else {
																	$nth = 0;
																}
																$on_day = two2threeCharDays($byday_arr[3]);
																$on_day_num = two2threeCharDays($byday_arr[3],false);
																if ($byday_arr[1] == '-') {
																	$last_day_tmp = date('t',$checkdate_time);
																	$checkdate_time = strtotime(date('Y-m-'.$last_day_tmp, $checkdate_time));
																	$last_tmp = (date('w',$checkdate_time) == $on_day_num) ? '' : 'last ';
																	$next_date_time = strtotime($last_tmp.$on_day.' -'.$nth.' week', $checkdate_time);
																} else {															
																	$next_date_time = strtotime($on_day.' +'.$nth.' week', $checkdate_time);
																}
															}
														} else {
															$day 	= date('d', $start_date_time);
															$next_date_time = mktime(0,0,0,$month,$day,$year);
															//echo date('Ymd',$next_date_time).$summary.'<br>';
														}
														$recur_data[] = $next_date_time;
													}
													if (isset($byyearday)) {
														foreach ($byyearday as $yearday) {
															ereg ('([-\+]{0,1})?([0-9]{1,3})', $yearday, $byyearday_arr);
															if ($byyearday_arr[1] == '-') {
																$ydtime = mktime(0,0,0,12,31,$this_year);
																$yearnum = $byyearday_arr[2] - 1;
																$next_date_time = strtotime('-'.$yearnum.' days', $ydtime);
															} else {
																$ydtime = mktime(0,0,0,1,1,$this_year);
																$yearnum = $byyearday_arr[2] - 1;
																$next_date_time = strtotime('+'.$yearnum.' days', $ydtime);
															}
															$recur_data[] = $next_date_time;
														}
													} 
													break;
												default:
													// anything else we need to end the loop
													$next_range_time = $end_range_time_tmp + 100;
													$count_to = $count;
											}
										} else {
											$interval = 1;
										}
										$next_range_time = strtotime('+'.$interval.' '.$freq_type, $next_range_time);
									} else {
										// end the loop because we aren't going to write this event anyway
										$count_to = $count;
									}
									// use the same code to write the data instead of always changing it 5 times						
									if (isset($recur_data) && is_array($recur_data)) {
										$recur_data_hour = @substr($start_time,0,2);
										$recur_data_minute = @substr($start_time,2,2);
										foreach($recur_data as $recur_data_time) {
											$recur_data_year = date('Y', $recur_data_time);
											$recur_data_month = date('m', $recur_data_time);
											$recur_data_day = date('d', $recur_data_time);
											$recur_data_date = $recur_data_year.$recur_data_month.$recur_data_day;

											if (($recur_data_time > $start_date_time) && ($recur_data_time <= $end_date_time) && ($count_to != $count) && !in_array($recur_data_date, $except_dates)) {
												if (isset($allday_start) && $allday_start != '') {
													$start_time2 = $recur_data_time;
													$end_time2 = strtotime('+'.$diff_allday_days.' days', $recur_data_time);
													while ($start_time2 < $end_time2) {
														$start_date2 = date('Ymd', $start_time2);
														$master_array[($start_date2)][('-1')][$uid] = array ('event_text' => $summary, 'description' => $description, 'location' => $location, 'organizer' => serialize($organizer), 'attendee' => serialize($attendee), 'calnumber' => $calnumber, 'calname' => $actual_calname, 'url' => $url, 'status' => $status, 'class' => $class, 'recur' => $recur );
														$start_time2 = strtotime('+1 day', $start_time2);
													}
												} else {
													$start_unixtime_tmp = mktime($recur_data_hour,$recur_data_minute,0,$recur_data_month,$recur_data_day,$recur_data_year);
													$end_unixtime_tmp = $start_unixtime_tmp + $length;
													
													if (($end_time >= $bleed_time) && ($bleed_check == '-1')) {
														$start_tmp = strtotime(date('Ymd',$start_unixtime_tmp));
														$end_date_tmp = date('Ymd',$end_unixtime_tmp);
														while ($start_tmp < $end_unixtime_tmp) {
															$start_date_tmp = date('Ymd',$start_tmp);
															if ($start_date_tmp == $recur_data_year.$recur_data_month.$recur_data_day) {
																$time_tmp = $hour.$minute;
																$start_time_tmp = $start_time;
															} else {
																$time_tmp = '0000';
																$start_time_tmp = '0000';
															}
															if ($start_date_tmp == $end_date_tmp) {
																$end_time_tmp = $end_time;
															} else {
																$end_time_tmp = '2400';
																$display_end_tmp = $end_time;
															}
															
															// Let's double check the until to not write past it
															$until_check = $start_date_tmp.$time_tmp.'00';
															if ($abs_until > $until_check) {
																$master_array[$start_date_tmp][$time_tmp][$uid] = array (
																	'event_start' => $start_time_tmp, 
																	'event_end' => $end_time_tmp, 
																	'start_unixtime' => $start_unixtime_tmp, 
																	'end_unixtime' => $end_unixtime_tmp, 
																	'event_text' => $summary, 
																	'event_length' => $length, 
																	'event_overlap' => 0, 
																	'description' => $description, 
																	'status' => $status, 
																	'class' => $class, 
																	'spans_day' => true, 
																	'location' => $location, 
																	'organizer' => serialize($organizer), 
																	'attendee' => serialize($attendee), 
																	'calnumber' => $calnumber, 
																	'calname' => $actual_calname, 
																	'url' => $url, 
																	'recur' => $recur);
																if (isset($display_end_tmp)){
																	$master_array[$start_date_tmp][$time_tmp][$uid]['display_end'] = $display_end_tmp;
																}
																checkOverlap($start_date_tmp, $time_tmp, $uid, $master_array, $overlap_array);
															}
															$start_tmp = strtotime('+1 day',$start_tmp);
														}
													} else {
														if ($bleed_check == '-1') {
															$display_end_tmp = $end_time;
															$end_time_tmp1 = '2400';
																
														}
														if (!isset($end_time_tmp1)) $end_time_tmp1 = $end_time;
													
														// Let's double check the until to not write past it
														$until_check = $recur_data_date.$hour.$minute.'00';
														if ($abs_until > $until_check) {
															$master_array[($recur_data_date)][($hour.$minute)][$uid] = array (
																'event_start' => $start_time, 
																'event_end' => $end_time_tmp1, 
																'start_unixtime' => $start_unixtime_tmp, 
																'end_unixtime' => $end_unixtime_tmp, 
																'event_text' => $summary, 
																'event_length' => $length, 
																'event_overlap' => 0, 
																'description' => $description, 
																'status' => $status, 
																'class' => $class, 
																'spans_day' => false, 
																'location' => $location, 
																'organizer' => serialize($organizer), 
																'attendee' => serialize($attendee), 
																'calnumber' => $calnumber, 
																'calname' => $actual_calname, 
																'url' => $url, 
																'recur' => $recur);
															if (isset($display_end_tmp)){
																$master_array[($recur_data_date)][($hour.$minute)][$uid]['display_end'] = $display_end_tmp;
															}
															checkOverlap($recur_data_date, ($hour.$minute), $uid, $master_array, $overlap_array);
														}
													}
												}
											}
										}
										unset($recur_data);
									}
								}
							}
						}	
					}
				}

				// This should remove any exdates that were missed.
				// Added for version 0.9.5 modified in 2.22 remove anything that doesn't have an event_start
				if (is_array($except_dates)) {
					foreach ($except_dates as $key => $value) {
						if (isset ($master_array[$value])){
							foreach ($master_array[$value] as $time => $value2){
								if (!isset($value2[$uid]['event_start'])){
						unset($master_array[$value][$time][$uid]);
							}
						}
					}
				}
				}
				
			   // Clear event data now that it's been saved.
			   unset($start_time, $start_time_tmp, $end_time, $end_time_tmp, $start_unixtime, $start_unixtime_tmp, $end_unixtime, $end_unixtime_tmp, $summary, $length, $description, $status, $class, $location, $organizer, $attendee);

				break;
			case 'END:VTODO':
				if ((!$vtodo_priority) && ($status == 'COMPLETED')) {
					$vtodo_sort = 11;
				} elseif (!$vtodo_priority) { 
					$vtodo_sort = 10;
				} else {
					$vtodo_sort = $vtodo_priority;
				}
				
				// CLASS support
				if (isset($class)) {
					if ($class == 'PRIVATE') {
						$summary = '**PRIVATE**';
						$description = '**PRIVATE**';
					} elseif ($class == 'CONFIDENTIAL') {
						$summary = '**CONFIDENTIAL**';
						$description = '**CONFIDENTIAL**';
					}
				}
				
				$master_array['-2']["$vtodo_sort"]["$uid"] = array ('start_date' => $start_date, 'start_time' => $start_time, 'vtodo_text' => $summary, 'due_date'=> $due_date, 'due_time'=> $due_time, 'completed_date' => $completed_date, 'completed_time' => $completed_time, 'priority' => $vtodo_priority, 'status' => $status, 'class' => $class, 'categories' => $vtodo_categories, 'description' => $description, 'calname' => $actual_calname);
				unset ($start_date, $start_time, $due_date, $due_time, $completed_date, $completed_time, $vtodo_priority, $status, $class, $vtodo_categories, $summary, $description);
				$vtodo_set = FALSE;
				
				break;
				
			case 'BEGIN:VTODO':
				$vtodo_set = TRUE;
				break;
			case 'BEGIN:VALARM':
				$valarm_set = TRUE;
				break;
			case 'END:VALARM':
				$valarm_set = FALSE;
				break;
				
			default:
		
				unset ($field, $data, $prop_pos, $property);
				if (ereg ("([^:]+):(.*)", $line, $line)){
				$field = $line[1];
				$data = $line[2];
				
				$property = $field;
				$prop_pos = strpos($property,';');
				if ($prop_pos !== false) $property = substr($property,0,$prop_pos);
				$property = strtoupper($property);
				
				switch ($property) {
					
					// Start VTODO Parsing
					//
					case 'DUE':
						$datetime = extractDateTime($data, $property, $field, $tz_array);
						$due_date = $datetime[1];
						$due_time = $datetime[2];
						break;
						
					case 'COMPLETED':
						$datetime = extractDateTime($data, $property, $field, $tz_array);
						$completed_date = $datetime[1];
						$completed_time = $datetime[2];
						break;
						
					case 'PRIORITY':
						$vtodo_priority = "$data";
						break;
						
					case 'STATUS':
						$status = "$data";
						break;
						
					case 'CLASS':
						$class = "$data";
						break;
						
					case 'CATEGORIES':
						$vtodo_categories = "$data";
						break;
					//
					// End VTODO Parsing				
						
					case 'DTSTART':
						$datetime = extractDateTime($data, $property, $field, $tz_array);
						$start_unixtime = $datetime[0];
						$start_date = $datetime[1];
						$start_time = $datetime[2];
						$allday_start = $datetime[3];
						break;
						
					case 'DTEND':
						$datetime = extractDateTime($data, $property, $field, $tz_array);
						$end_unixtime = $datetime[0];
						$end_date = $datetime[1];
						$end_time = $datetime[2];
						$allday_end = $datetime[3];
						break;
						
					case 'EXDATE':
						$data = split(",", $data);
						foreach ($data as $exdata) {
							$exdata = str_replace('T', '', $exdata);
							$exdata = str_replace('Z', '', $exdata);
							preg_match ('/([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{0,2})([0-9]{0,2})/', $exdata, $regs);
							$except_dates[] = $regs[1] . $regs[2] . $regs[3];
							// Added for Evolution, since they dont think they need to tell me which time to exclude.
							if (($regs[4] == '') && ($start_time != '')) { 
								$except_times[] = $start_time;
							} else {
								$except_times[] = $regs[4] . $regs[5];
							}
						}
						break;
						
					case 'SUMMARY':
						$data = str_replace("\\n", "<br />", $data);
						$data = str_replace("\\t", "&nbsp;", $data);
						$data = str_replace("\\r", "<br />", $data);
						$data = str_replace('$', '&#36;', $data);
						$data = stripslashes($data);
// 						$data = htmlentities(urlencode($data));
                        $data = htmlentities($data);
						if ($valarm_set == FALSE) { 
							$summary = $data;
						} else {
							$valarm_summary = $data;
						}
						break;
						
					case 'DESCRIPTION':
						$data = str_replace("\\n", "<br />", $data);
						$data = str_replace("\\t", "&nbsp;", $data);
						$data = str_replace("\\r", "<br />", $data);
						$data = str_replace('$', '&#36;', $data);
						$data = stripslashes($data);
						$data = htmlentities(urlencode($data));
						if ($valarm_set == FALSE) { 
							$description = $data;
						} else {
							$valarm_description = $data;
						}
						break;
						
					case 'RECURRENCE-ID':
						$parts = explode(';', $field);
						foreach($parts as $part) {
							$eachval = split('=',$part);
							if ($eachval[0] == 'RECURRENCE-ID') {
								// do nothing
							} elseif ($eachval[0] == 'TZID') {
								$recurrence_id['tzid'] = parse_tz($eachval[1]);
							} elseif ($eachval[0] == 'RANGE') {
								$recurrence_id['range'] = $eachval[1];
							} elseif ($eachval[0] == 'VALUE') {
								$recurrence_id['value'] = $eachval[1];
							} else {
								$recurrence_id[] = $eachval[1];
							}
						}
						unset($parts, $part, $eachval);
						
						$data = str_replace('T', '', $data);
						$data = str_replace('Z', '', $data);
						ereg ('([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{0,2})([0-9]{0,2})', $data, $regs);
						$recurrence_id['date'] = $regs[1] . $regs[2] . $regs[3];
						$recurrence_id['time'] = $regs[4] . $regs[5];
			
						$recur_unixtime = mktime($regs[4], $regs[5], 0, $regs[2], $regs[3], $regs[1]);
			
						$dlst = date('I', $recur_unixtime);
						$server_offset_tmp = chooseOffset($recur_unixtime, &$timezone, &$tz_array);
						if (isset($recurrence_id['tzid'])) {
							$tz_tmp = $recurrence_id['tzid'];
							$offset_tmp = $tz_array[$tz_tmp][$dlst];
						} elseif (isset($calendar_tz)) {
							$offset_tmp = $tz_array[$calendar_tz][$dlst];
						} else {
							$offset_tmp = $server_offset_tmp;
						}
						$recur_unixtime = calcTime($offset_tmp, $server_offset_tmp, $recur_unixtime);
						$recurrence_id['date'] = date('Ymd', $recur_unixtime);
						$recurrence_id['time'] = date('Hi', $recur_unixtime);
						$recurrence_d = date('Ymd', $recur_unixtime);
						$recurrence_t = date('Hi', $recur_unixtime);
						unset($server_offset_tmp);
						break;
						
					case 'UID':
						$uid = $data;
						break;
					case 'X-WR-CALNAME':
						$actual_calname = $data;
						$master_array['calendar_name'] = $actual_calname;
							$cal_displaynames[$cal_key] = $actual_calname; #correct the default calname based on filename
						break;
					case 'X-WR-TIMEZONE':
						$calendar_tz = parse_tz($data);
						$master_array['calendar_tz'] = $calendar_tz;
						break;
					case 'DURATION':
						if (($first_duration == TRUE) && (!stristr($field, '=DURATION'))) {
							ereg ('^P([0-9]{1,2}[W])?([0-9]{1,2}[D])?([T]{0,1})?([0-9]{1,2}[H])?([0-9]{1,2}[M])?([0-9]{1,2}[S])?', $data, $duration); 
							$weeks 			= str_replace('W', '', $duration[1]); 
							$days 			= str_replace('D', '', $duration[2]); 
							$hours 			= str_replace('H', '', $duration[4]); 
							$minutes 		= str_replace('M', '', $duration[5]); 
							$seconds 		= str_replace('S', '', $duration[6]); 
							$the_duration 	= ($weeks * 60 * 60 * 24 * 7) + ($days * 60 * 60 * 24) + ($hours * 60 * 60) + ($minutes * 60) + ($seconds);
							$first_duration = FALSE;
						}	
						break;
					case 'RRULE':
						$data = str_replace ('RRULE:', '', $data);
						$rrule = split (';', $data);
						foreach ($rrule as $recur) {
							ereg ('(.*)=(.*)', $recur, $regs);
							$rrule_array[$regs[1]] = $regs[2];
						}
						break;
					case 'ATTENDEE':
						$field 		= str_replace("ATTENDEE;CN=", "", $field);
						$data 		= str_replace ("mailto:", "", $data);
						$attendee[] = array ('name' => stripslashes($field), 'email' => stripslashes($data));
						break;
					case 'ORGANIZER':
						$field 		 = str_replace("ORGANIZER;CN=", "", $field);
						$data 		 = str_replace ("mailto:", "", $data);
						$organizer[] = array ('name' => stripslashes($field), 'email' => stripslashes($data));
						break;
					case 'LOCATION':
						$data = str_replace("\\n", "<br />", $data);
						$data = str_replace("\\t", "&nbsp;", $data);
						$data = str_replace("\\r", "<br />", $data);
						$data = stripslashes($data);
						$location = $data;
						break;
					case 'URL':
						$url = $data;
						break;
				}
			}
		}
	}
 
    unset($master_array['calendar_name']);
    unset($master_array['-1']);
    unset($master_array['-3']);
    unset($master_array['-4']);

// print_R($master_array);
// print_R($overlap_array);
    return $master_array;
}	
 
?>