<?php
	/*@annotation
		hay que ver por que no funciona el sfConfig*/
	define('BASE',sfConfig::get('sf_app_module_dir') .'/cal/' .sfConfig::get('sf_app_module_lib_dir_name') .'/');
	
// 	require_once(BASE.'ical_parser.php');
// 	require_once(BASE.'list_functions.php');
// 	require_once(BASE.'template.php');
	
//      
     
class calComponents extends sfComponents
{

	public function  _phpicalendar($current_view) {
		$default_cal_alba = $this->archivo;
// 		print_r( file($this->archivo));
		$context = sfContext::getInstance();
		require_once(BASE.'ical_parser.php');
		require_once(BASE.'list_functions.php');
		require_once(BASE.'template.php');
		$context->getResponse()->addStylesheet ("cal/templates/$template/default", '', array());

// 		if (isset($_GET['jumpto_day'])) {
// 			$jumpto_day_time = strtotime($_GET['jumpto_day']);
// 			if ($jumpto_day_time == -1) {
// 			$getdate = date('Ymd', time() + $second_offset); 
// 			} else {
// 			$getdate = date('Ymd', $jumpto_day_time);
// 			}
// 		}

		//datos para construir las urls
		$modulo = $context->getRequest()->getParameter('module');
		$action = $context->getRequest()->getParameter('action');


		//sacado de arriba para prueba		
		if (!$this->date)
			$getdate = date('Ymd', time() + $second_offset);
		else 
			$getdate = $this->date;
// 		$current_view = 'day';
		
// 		header("Content-Type: text/html; charset=$charset");
		
		if ($minical_view == 'current') $minical_view = 'day';
		
		$weekstart 		= 1;
		$unix_time 		= strtotime($getdate);
		$today_today 	= date('Ymd', time() + $second_offset);  
		$next_day		= date('Ymd', strtotime("+1 day",  $unix_time));
		$prev_day 		= date('Ymd', strtotime("-1 day",  $unix_time));
		
		$globals_local = array();
		$globals_local['daysofweek_lang'] = $daysofweek_lang;
 		$globals_local['daysofweekshort_lang'] = $daysofweekshort_lang; $globals_local['daysofweekreallyshort_lang'] = $daysofweekreallyshort_lang;
		$globals_local['monthsofyear_lang'] = $monthsofyear_lang;
		$globals_local['monthsofyearshort_lang'] = $monthsofyearshort_lang;
		$display_date = localizeDate($dateFormat_day, $unix_time, $globals_local);
		$sidebar_date = localizeDate($dateFormat_week_list, $unix_time, $globals_local);
		$start_week_time = strtotime(dateOfWeek($getdate, $week_start_day));
		
		
		// select for calendars
		/*
		$list_icals 	= display_ical_list(availableCalendars($username, $password, $ALL_CALENDARS_COMBINED));
		$list_years 	= list_years();
		$list_months 	= list_months();
		$list_weeks 	= list_weeks();
		$list_jumps 	= list_jumps();
		$list_calcolors = list_calcolors();
		$list_icals_pick = display_ical_list(availableCalendars($username, $password, $ALL_CALENDARS_COMBINED), TRUE);
		*/
		// login/logout
		/*
		$is_logged_in = ($username != '' && !$invalid_login) ? true : false;
		$show_user_login = (!$is_logged_in && $allow_login == 'yes');
		$login_querys = login_querys();
		$logout_querys = logout_querys();
		*/
		
		//$template = "red";
		
		$page = new Page(BASE.'templates/'.$template."/$current_view.tpl");

	$page->cpath = $cpath;

	$page->template_started = $template_started;

	$page->enable_rss = $enable_rss;

	$page->php_started = $php_started;

	$page->daysofweekshort_lang = $daysofweekshort_lang;

	$page->dateFormat_week_list = $dateFormat_week_list;

	$page->daysofweekreallyshort_lang = $daysofweekreallyshort_lang;

	$page->month_event_lines = $month_event_lines;

	$page->minical_view = $minical_view;

	$page->current_view = $current_view;

	$page->dateFormat_month; //ver = $dateFormat_month //ver;

	$page->this_month = $this_month;

	$page->this_year = $this_year;

	$page->show_todos = $show_todos;

	$page->show_completed = $show_completed;

	$page->tomorrows_events_lines = $tomorrows_events_lines;

	$page->next_day = $next_day;

	$page->week_length = $week_length;

	$page->day_start = $day_start;

	$page->timeFormat_small = $timeFormat_small;

	$page->gridLength = $gridLength;
	$page->day_array = $day_array;
	$page->start_week_time = $start_week_time;
	$page->unique_colors = $unique_colors;
	$page->week_start_day = $week_start_day;
	$page->the_arr = $the_arr;
	$page->lang = $lang;
	$page->week_end = $week_end;
	$page->week_start = $week_start;
	$page->timeFormat = $timeFormat;
	$page->dateFormat_day = $dateFormat_day;
	$page->printview = $printview;
	$page->daysofweek_lang = $daysofweek_lang;
	$page->is_loged_in = $is_loged_in;
	$page->template = $template;
	$page->master_array = $master_array;
	//print_r ($master_array);echo "here";die;
	$page->getdate = $getdate;
	$page->cal = $cal;
	$page->ALL_CALENDARS_COMBINED = $ALL_CALENDARS_COMBINED;
	$page->subscribe_path = $subscribe_path;
	$page->download_filename = $download_filename;

	$relativeUrlRoot = sfContext::getInstance()->getRequest()->getRelativeUrlRoot();
// 	echo $relativeUrlRoot;die;
		
// 		$page->replace_files(array(
// 		'header'			=> BASE.'templates/'.$template.'/header.tpl',
// 		'event_js'			=> BASE.'event.js',
// 		'footer'			=> BASE.'templates/'.$template.'/footer.tpl',
// 		'sidebar'           => BASE.'templates/'.$template.'/sidebar.tpl',
// 		'search_box'        => BASE.'templates/'.$template.'/search_box.tpl'
// 		));

		$page->replace_files(array(
		'header'			=> '',
		'event_js'			=> '',
		'footer'			=> '',
		'sidebar'           => '',
		'search_box'        => ''
		));
		$prefixUri = sfContext::getInstance()->getRequest()->getUriPrefix();
		$globals = array(
		"base"			=> $relativeUrlRoot ."/images/cal",
		'day_view_action'	=> $action.'/'.$this->verPorDia,
		'week_view_action'	=> $action.'/'.$this->verPorSemana,
		'month_view_action'	=> $prefixUri.$relativeUrlRoot.'/'.$action.'/'.$this->verPorMes,
		'year_view_action'	=> $prefixUri.$relativeUrlRoot.'/'.$action.'/'.$this->verPorAnio,
		'version'			=> $phpicalendar_version,
		'charset'			=> $charset,
		'default_path'		=> '',
		'template'			=> $template,
		'cal'				=> $cal,
		'getdate'			=> $getdate,
		'getcpath'			=> "&cpath=$cpath",
		'cpath'				=> $cpath,
		'calendar_name'		=> $cal_displayname,
		'current_view'		=> $current_view,
		'display_date'		=> $display_date,
		'sidebar_date'		=> $sidebar_date,
		'rss_powered'	 	=> $rss_powered,
		'rss_available' 	=> '',
		'rss_valid' 		=> '',
		'show_search' 		=> $show_search,
		'next_day' 			=> $next_day,
		'prev_day'	 		=> $prev_day,
		'show_goto' 		=> '',
		'show_user_login'	=> $show_user_login,
		'invalid_login'		=> $invalid_login,
		'login_querys'		=> $login_querys,
		'is_logged_in' 		=> $is_logged_in,
		'username'			=> $username,
		'logout_querys'		=> $logout_querys,
		'list_icals' 		=> $list_icals,
		'list_icals_pick' 	=> $list_icals_pick,
		'list_years' 		=> $list_years,
		'list_months' 		=> $list_months,
		'list_weeks' 		=> $list_weeks,
		'list_jumps' 		=> $list_jumps,
		'legend'	 		=> $list_calcolors,
		'style_select' 		=> $style_select,
		'l_goprint'			=> $lang['l_goprint'],
		'l_preferences'		=> $lang['l_preferences'],
		'l_calendar'		=> $lang['l_calendar'],
		'l_legend'			=> $lang['l_legend'],
		'l_tomorrows'		=> $lang['l_tomorrows'],
		'l_jump'			=> $lang['l_jump'],
		'l_todo'			=> $lang['l_todo'],
		'l_day'				=> $lang['l_day'],
		'l_week'			=> $lang['l_week'],
		'l_month'			=> $lang['l_month'],
		'l_year'			=> $lang['l_year'],
		'l_pick_multiple'	=> $lang['l_pick_multiple'],
		'l_powered_by'		=> $lang['l_powered_by'],
		'l_subscribe'		=> $lang['l_subscribe'],
		'l_download'		=> $lang['l_download'],
		'l_search'			=> $lang['l_search'],
		'l_this_site_is'	=> $lang['l_this_site_is']
		);

		//print_r($globals);

		$page->replace_tags($globals);
		//echo $page->output(); die;
		if ($allow_preferences != 'yes') {
		$page->replace_tags(array(
		'allow_preferences'	=> ''
		));
		}
		
		if ($allow_login == 'yes') {
		$page->replace_tags(array(
		'l_invalid_login'	=> $lang['l_invalid_login'],
		'l_password'		=> $lang['l_password'],
		'l_username'		=> $lang['l_username'],
		'l_login'			=> $lang['l_login'],
		'l_logout'			=> $lang['l_logout']
		));
		}
		
		if ($show_search != 'yes') {
		$page->nosearch($page);
		}
		
		switch ($current_view) {
		case 'month':
			if ($this_months_events == 'yes') {	
				$page->monthbottom($page);
			} else {
				$page->nomonthbottom($page);
			}
			break;
		case 'day': $page->draw_day($page);
			break;
		case 'week': $page->draw_week($page);
			break;
		case 'year': break;
		}
		$page->tomorrows_events($page);
		$page->get_vtodo($page);
// 		$page->tomorrows_events($page);
// 		$page->get_vtodo($page);
		$page->draw_subscribe($page);
		
		$this->output = $page->output();

	
	}
	public function  executeVerPorDia() {

		$this->_phpicalendar('day');
	}

	public function  executeVerPorSemana() {

		$this->_phpicalendar('week');
	}

	public function  executeVerPorMes() {

		$this->_phpicalendar('month');
	}

	public function  executeVerPorAnio() {

		$this->_phpicalendar('year');
	}
}



?>