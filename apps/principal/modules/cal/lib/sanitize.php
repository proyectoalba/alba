<?php
//@annotation en este archivo se parsea los parametros del _GET etc

foreach ($_REQUEST as $key=>$val){
	switch ($key){
		case 'event_data':
			# modify this to allow or disallow different HTML tags in event popups
			$allowed = "<p><br><b><i><em><a><img><div><span><ul><ol><li><h1><h2><h3><h4><h5><h6><hr><em><strong><small><table><tr><td><th>";
			$val = strip_tags($val,$allowed);
			break;
		default:	
			# cpath
			$val = strip_tags($val);
	}

	$_REQUEST[$key] = $val;
}
foreach ($_POST as $key=>$val){
	switch ($key){
		case 'action':
			$actions = array('login','logout','addupdate','delete');
			if (!in_array($val,$actions)) $val = '';
			break;
		case 'date':
		case 'time':
			if (!is_numeric($val)) $val = '';
			break;
		default:	
			$val = strip_tags($val);
	}
	$_POST[$key] = $val;

}
foreach ($_GET as $key=>$val){
	switch ($key){
		case 'cal':
			if (!is_array($val)){
				$val = strip_tags($val);
				$_GET['cal'] = strip_tags($val);
			}else{
				unset ($_GET['cal']);
				foreach($val as $cal){
					$_GET['cal'][]= strip_tags($cal);
				}
			}
			break;
		case 'getdate':
			if (!is_numeric($val)) $val = ''; 
			break;
		default:	
			$val = strip_tags($val);
	}
	if ($key != 'cal') $_GET[$key] = $val;

}
foreach ($_COOKIE as $key=>$val){
	switch ($key){
		case 'time':
			if (!is_numeric($val)) $val = '';
			break;
		default:	
		$val = strip_tags($val);
	}
	$_COOKIE[$key] = $val;
}
?>