<?php
/**
 * Componente para la foto del alumno
 *
 * @author Fernando Toledo <ftoledo@docksud.com.ar>
 * @version SVN: $Id$
 */

class alumnoComponents extends sfComponents
{
	public function executeVerfoto()
	{
	    $this->foto = 'nofoto.png';
	    $archivo_foto = sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR.sfConfig::get('sf_upload_dir_name').DIRECTORY_SEPARATOR.'alumnos'.DIRECTORY_SEPARATOR.$this->alumno->getLegajo();
		if (file_exists($archivo_foto . '.png')) {
		  $this->foto = '..'.DIRECTORY_SEPARATOR.sfConfig::get('sf_upload_dir_name').DIRECTORY_SEPARATOR.'alumnos'.DIRECTORY_SEPARATOR.$this->alumno->getLegajo();
		}

	}

}
?>