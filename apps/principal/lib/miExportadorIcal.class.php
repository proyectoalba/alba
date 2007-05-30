<?php
/**
 *    This file is part of Alba.
 *
 *    Alba is free software; you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation; either version 2 of the License, or
 *    (at your option) any later version.
 *
 *    Alba is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with Alba; if not, write to the Free Software
 *    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/**
 *  Clase para manejo de exportacion a ical
 *
 * @package miEvento
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: actions.class.php 4566 2007-04-25 15:07:43Z josx $
 * @filesource
 * @license GPL
 */

include "iCalcreator/iCalcreator.class.php";

class miExportadorIcal extends sfWebRequest {

    var $aFreq = array ( '', 'SECONDLY', 'MINUTELY' , 'HOURLY', 'DAILY' ,'WEEKLY', 'MONTHLY', 'YEARLY');
    var $aDias = array ( 'SA', 'FR', 'TH', 'WE', 'TU', 'MO', 'SU');

    function exportar($aObj = array() ) {
        if(is_array($aObj)) {
            $v = new vcalendar();
            $v->setConfig('DIRECTORY',sfConfig::get('sf_upload_dir_name')); //sfConfig::get('app_alba_tmpdir');

            foreach ($aObj as $rel_division_actividad_docente) {
                if($rel_division_actividad_docente->getEvento()) {
                    $e = new vevent();
                    $e->setProperty( 'DESCRIPTION', 'Horas de maestro/profesor' );
                    $e->setProperty('SUMMARY', $rel_division_actividad_docente->getDivision()."-".$rel_division_actividad_docente->getActividad()."-".$rel_division_actividad_docente->getDocente());
                    $e->setProperty('class', 'PUBLIC');
                    $aFechaInicio = getdate(strtotime($rel_division_actividad_docente->getEvento()->getFechaInicio()));
                    $e->setProperty('dtstart', $aFechaInicio['year'], $aFechaInicio['mon'],$aFechaInicio['mday'], $aFechaInicio['hours'], $aFechaInicio['minutes'], 0);
                    $aFechaFin = getdate(strtotime($rel_division_actividad_docente->getEvento()->getFechaFin()));
                    $e->setProperty('dtend', $aFechaFin['year'], $aFechaFin['mon'],$aFechaFin['mday'], $aFechaFin['hours'], $aFechaFin['minutes'], 0);

//                 $segundos = strtotime($rel_division_actividad_docente->getEvento()->getFechaFin())-strtotime($rel_division_actividad_docente->getEvento()->getFechaInicio());
//                 $horas = floor($segundos / 3600);
//                 $minutos = floor(($segundos - ($horas * 3600)) / 60);
//                 $segundos = $segundos - ($horas * 60) - ($minutos * 60);
//                 $e->setProperty('DURATION', '','', $horas, $minutos);
                    $e->setProperty('dtstamp', gmdate('Ymd\THi00\Z'));

                    if($rel_division_actividad_docente->getEvento()->getFrecuencia()) {
                        $freq = $this->aFreq[$rel_division_actividad_docente->getEvento()->getFrecuencia()];
                        $interval = $rel_division_actividad_docente->getEvento()->getFrecuenciaIntervalo();

                        $aRrule = array();
                        $aRrule['FREQ'] = $freq;
                        $aRrule['INTERVAL'] = $interval;

                        if($freq == "WEEKLY") {
                            $aRrule['BYDAY'] = array_chunk(explode ( ",", $rel_division_actividad_docente->getEvento()->getRecurrenciaDiasIcal()),1);
                        }

                        if($rel_division_actividad_docente->getEvento()->getRecurrenciaFin() != "") {
                            if(is_numeric($rel_division_actividad_docente->getEvento()->getRecurrenciaFin())) {
                                $aRrule['COUNT'] = $rel_division_actividad_docente->getEvento()->getRecurrenciaFin();
                            } else {
                                $aRrule['UNTIL'] = gmdate('Ymd\THi00\Z',strtotime($rel_division_actividad_docente->getEvento()->getRecurrenciaFin()));
                            }
                        }
                        $e->setProperty( 'rrule' , $aRrule);
                    }
                    $v->addComponent($e);	
                }
            }
            $v->returnCalendar();
        } else {
            $error = 'No envío un array para la exportación';
            throw new Exception($error);
        }
    }
}
?>