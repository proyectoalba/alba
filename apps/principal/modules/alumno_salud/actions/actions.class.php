<?php

require_once dirname(__FILE__).'/../lib/alumno_saludGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/alumno_saludGeneratorHelper.class.php';

/**
 * alumno_salud actions.
 *
 * @package    alba
 * @subpackage alumno_salud
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class alumno_saludActions extends autoAlumno_saludActions
{
	public function executeIndex(sfWebRequest $request){
		$alumno_id = $request->getParameter('alumno_id');
		$establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
		
		$c = new Criteria();
		$c->add(AlumnoPeer::ID, $alumno_id);
		$c->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
	
		$this->alumno = AlumnoPeer::doSelectOne($c);
		$this->forward404Unless(intval($alumno_id) > 0 && $this->alumno);

		$saludes = $this->alumno->getAlumnoSaluds();
		// Si no está el objeto creado, lo creo vacío y lo guardo. Seh...medio loco pero quería cambiar un poco la interfaz.
		if(empty($saludes)){
			$this->alumno_salud = new AlumnoSalud();
			$this->alumno_salud->setAlumno($this->alumno)->save();
			$saludes = $this->alumno->getAlumnoSaluds();
		}
		$this->datos_salud = $saludes[0]->toArray();
		$this->alumno_salud = $saludes[0];
	}
	// El dato no se elimina
	public function executeDelete(sfWebRequest $request){
		$alumno_id = $this->getRoute()->getObject()->getId();
		$this->redirect('alumno_salud/index?alumno_id='.$alumno_id);
	}

}
