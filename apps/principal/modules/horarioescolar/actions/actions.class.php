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
 * horarioescolar Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class horarioescolarActions extends autohorarioescolarActions
{
    
    public function preExecute() {
        $this->vista = $this->getRequestParameter('vista');
    }
 
  protected function updateHorarioescolarFromRequest(){
    $horarioescolar = $this->getRequestParameter('horarioescolar');

    $horarioescolar['hora_inicio'] = $this->_add_zeros($horarioescolar['hora_inicio']['hour'],2).":".$this->_add_zeros($horarioescolar['hora_inicio']['minute'],2)." ".$horarioescolar['hora_inicio']['ampm'];
    $horarioescolar['hora_fin']= $this->_add_zeros($horarioescolar['hora_fin']['hour'],2).":".$this->_add_zeros($horarioescolar['hora_fin']['minute'],2)." ".$horarioescolar['hora_fin']['ampm'];

    if (isset($horarioescolar['nombre']))
    {
      $this->horarioescolar->setNombre($horarioescolar['nombre']);
    }
    if (isset($horarioescolar['descripcion']))
    {
      $this->horarioescolar->setDescripcion($horarioescolar['descripcion']);
    }
    if (isset($horarioescolar['dia']))
    {
      $this->horarioescolar->setDia($horarioescolar['dia']);
    }
    if (isset($horarioescolar['hora_inicio']))
    {
      $this->horarioescolar->setHoraInicio($horarioescolar['hora_inicio']);
    }
    if (isset($horarioescolar['hora_fin']))
    {
      $this->horarioescolar->setHoraFin($horarioescolar['hora_fin']);
    }
    if (isset($horarioescolar['fk_horarioescolartipo_id']))
    {
      $this->horarioescolar->setFkHorarioescolartipoId($horarioescolar['fk_horarioescolartipo_id']);
    }
    if (isset($horarioescolar['fk_establecimiento_id']))
    {
      $this->horarioescolar->setFkEstablecimientoId($horarioescolar['fk_establecimiento_id']);
    }
    if (isset($horarioescolar['fk_turnos_id']))
    {
      $this->horarioescolar->setFkTurnosId($horarioescolar['fk_turnos_id']);
    }


  }


    function addFiltersCriteria(&$c) {
        $c->add(horarioescolarPeer::FK_ESTABLECIMIENTO_ID,$this->getUser()->getAttribute('fk_establecimiento_id'));
    }


    function saveHorarioescolar($horarioescolar) {
        $horarioescolar->setFkEstablecimientoId($this->getUser()->getAttribute('fk_establecimiento_id'));
        $horarioescolar->save();
    }



    function _add_zeros($string, $strlen) {
        if ($strlen > strlen($string))  {
            for ($x = strlen($string); $x < $strlen; $x++) {
                $string = '0' . $string;
            }
        }
        return $string;
    }

    function executeMostrar() {
        

        $criteria = new Criteria();
        //$criteria->add(EstablecimientoPeer::IS_LIVE, 1);
        $establecimientos = EstablecimientoPeer::doSelect($criteria);
        $optionsEstablecimiento = array();
        foreach ($establecimientos as $establecimiento) {
            $optionsEstablecimiento[$establecimiento->getId()] = $establecimiento->getNombre();
        }
        asort($optionsEstablecimiento);
        $this->optionsEstablecimiento = $optionsEstablecimiento;        

//         $establecimiento_id = $this->getRequestParameter('establecimiento_id');
//         if(!$establecimiento_id) {
//             if(count($optionsEstablecimiento) > 0) {
//                 $establecimiento_id = key($optionsEstablecimiento);
//             }   
//         }
//         
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');            
        $this->establecimiento_id = $establecimiento_id;
        
        

        $criteria = new Criteria();
        $criteria->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        $ciclolectivos = CiclolectivoPeer::doSelect($criteria);
        $optionsCiclolectivo = array();
        foreach ($ciclolectivos as $ciclolectivo) {
            $optionsCiclolectivo[$ciclolectivo->getId()] = $ciclolectivo->getDescripcion();
        }
        asort($optionsCiclolectivo);

        $this->optionsCiclolectivo = $optionsCiclolectivo;        

/*            
        $ciclolectivo_id = $this->getRequestParameter('ciclolectivo_id');
        if(!$ciclolectivo_id) {
            if(count($optionsCiclolectivo) > 0) {
                $ciclolectivo_id = key($optionsCiclolectivo);
            }   
        }*/
  
        $ciclolectivo_id = $this->getUser()->getAttribute('fk_ciclolectivo_id');            
        $this->ciclolectivo_id = $ciclolectivo_id;

        $criteriaT = new Criteria(); 
        $criteriaT->add(TurnosPeer::FK_CICLOLECTIVO_ID, $ciclolectivo_id);
        $turnos = TurnosPeer::doSelect($criteriaT);
        $optionsTurnos = array();
        $optionsTurnos[] = ">>Seleccione<<";
        foreach ($turnos as $turno) {
            $optionsTurnos[$turno->getId()] = $turno->getDescripcion();
        }
        asort($optionsTurnos);
        $this->optionsTurnos = $optionsTurnos;

        

        $this->aHour = array();
        $horarioescolares = array();
        
        Misc::use_helper('Misc');       
        $aSemana = diasDeLaSemana(1);

        $this->aDayNames = array('Lunes','Martes','Miercoles','Jueves','Viernes');
        $this->aDay = array(strtotime("2006-09-11"), strtotime("2006-09-12"), strtotime("2006-09-13"), strtotime("2006-09-14"), strtotime("2006-09-15"));


        $turnos_id = $this->getRequestParameter('turnos_id');

        if ($this->getRequest()->getMethod() == sfRequest::POST AND $turnos_id) {
//             $ciclolectivo_id = $this->getRequestParameter('ciclolectivo_id');
//             $establecimiento_id = $this->getRequestParameter('establecimiento_id');


            
                $turno = TurnosPeer::retrieveByPK($turnos_id);
            
                if($this->getRequestParameter('time_interval')) {
                     $this->time_interval = $this->getRequestParameter('time_interval');
                } else {
                     $this->time_interval = 30;
                }
             
                $this->aHour = array(strtotime($turno->getHoraInicio()), strtotime($turno->getHoraFin()));

                $criteria = new Criteria(); 
                $criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
                $criteria->add(HorarioescolarPeer::FK_TURNOS_ID, $turnos_id);
                $horarioescolares = HorarioescolarPeer::doSelect($criteria);


        } else {
            $this->aHour = array(strtotime("8:00"), strtotime("17:00"));
            $this->time_interval = 30;
        }
        

        $this->turnos_id = $turnos_id; 
        //Eventos 
        $this->aEvent = array();
        
        if(count($horarioescolares) > 0) {

            $aColor = array ("silver", "gray");
            $aColorSet = array();
            $optionsHorarioescolar = array();
            $i=1;
            foreach ($horarioescolares as $horarioescolar) {
            
                if(!array_key_exists($horarioescolar->getFkHorarioescolartipoId(),$aColorSet)) {
                    $aColorSet[$horarioescolar->getFkHorarioescolartipoId()] = $aColor[($i%2)];
                }

                $optionsHorarioescolar[$horarioescolar->getId()] = $horarioescolar->getDescripcion();
                $nombre = $horarioescolar->getNombre();
                $hora_inicio = $horarioescolar->getHoraInicio();
                $hora_fin = $horarioescolar->getHoraFin();
                $descripcion = $horarioescolar->getDescripcion();
                $dia_semana = $horarioescolar->getDia();
                $aDia = array();
                switch($dia_semana) {
                    case 8: 
                        $aDia[] = date("Y-m-d", $this->aDay[0]); 
                        $aDia[] = date("Y-m-d", $this->aDay[1]);
                        $aDia[] = date("Y-m-d", $this->aDay[2]);
                        $aDia[] = date("Y-m-d", $this->aDay[3]);
                        $aDia[] = date("Y-m-d", $this->aDay[4]);
                        
                        break;
                    default: $aDia[] = date("Y-m-d", $this->aDay[($dia_semana-1)]);    
                } 
                $tmpEvent= array();
                for($j=0;$j<count($aDia);$j++) {
                    array_push($tmpEvent,(object) array ( 'id'=> $i ,'name' => $nombre ,'date' => $aDia[$j],'start_time' => $hora_inicio, 'end_time' => $hora_fin, 'desc' => $descripcion, 'color' => $aColorSet[$horarioescolar->getFkHorarioescolartipoId()]));
                    $i++;
                }
                $this->aEvent = $tmpEvent;
            }
        }     

    }

   
}
?>