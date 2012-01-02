<?php

/**
 * alumno_salud module helper.
 *
 * @package    alba
 * @subpackage alumno_salud
 * @author     Your name here
 * @version    SVN: $Id: helper.php 12474 2008-10-31 10:41:27Z fabien $
 */
class alumno_saludGeneratorHelper extends BaseAlumno_saludGeneratorHelper
{
	public function linkToList($params){
		return '<li class="sf_admin_action_list">'.link_to('Cancelar', 'alumno_salud/index?alumno_id=' . $params['params']['alumno_id']).'</li>';
	}
}
