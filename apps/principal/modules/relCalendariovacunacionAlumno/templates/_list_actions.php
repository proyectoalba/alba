<?php
	$agregado = "";
	if (isset($filters['fk_alumno_id']) && $filters['fk_alumno_id'] != '' && $filters['fk_alumno_id'] != 0) {
		$agregado = "?fk_alumno_id=".$filters['fk_alumno_id'];
	}
	$url = 'relCalendariovacunacionAlumno/create'.$agregado;
?>
<ul class="sf_admin_actions">
  <li><?php echo button_to(__('create'), $url , array (
  'class' => 'sf_admin_action_create',
)) ?></li>
</ul>
