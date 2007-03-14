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
 * calendario actions
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class calendarioActions extends sfActions
{

    public function preExecute() {
        $this->vista = $this->getRequestParameter('vista');
    }
  
    private function getHorasMaterias($anio_id, $actividad_id = 0)  {
        // traigo todos las materias/actividades para un año determinado
        $criteria = new Criteria();
        $criteria->add(RelAnioActividadPeer::FK_ANIO_ID, $anio_id);
        if($actividad_id) {
            $criteria->add(ActividadPeer::ID, $actividad_id);
        }
        $criteria->addJoin(RelAnioActividadPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);
        $criteria->addJoin(RelAnioActividadPeer::FK_ACTIVIDAD_ID, RelActividadDocentePeer::FK_ACTIVIDAD_ID, Criteria::LEFT_JOIN);
        $criteria->addJoin(RelActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID, Criteria::LEFT_JOIN);
        $criteria->addJoin(RelActividadDocentePeer::FK_DOCENTE_ID, DocenteHorarioPeer::FK_DOCENTE_ID, Criteria::LEFT_JOIN);

        $criteria->addAsColumn("actividad_id", ActividadPeer::ID);
        $criteria->addAsColumn("docente_id", DocentePeer::ID);
        $criteria->addAsColumn("docente_apellido", DocentePeer::APELLIDO);
        $criteria->addAsColumn("docente_nombre", DocentePeer::NOMBRE);
        $criteria->addAsColumn("actividad_nombre", ActividadPeer::NOMBRE);
        $criteria->addAsColumn("horas", RelAnioActividadPeer::HORAS);

        $criteria->addAsColumn("dia", DocenteHorarioPeer::DIA);
        $criteria->addAsColumn("hora_inicio", DocenteHorarioPeer::HORA_INICIO);
        $criteria->addAsColumn("hora_fin", DocenteHorarioPeer::HORA_FIN);

//      $actividades = RelAnioActividadPeer::doSelectRS($criteria);
        $actividades = BasePeer::doSelect($criteria);

        $horarios_disponibles = array();
        $optionsHorasMaterias = array();

        foreach($actividades as $actividad) {
            if(!$actividad[1]) $actividad[1] = 0;
            $idx = $actividad[0]."_".$actividad[1];
            $docente = $actividad[3]." ".$actividad[2];

            $actividad_horario_disponible = $this->horariosATexto($actividad[6], $actividad[7], $actividad[8]);
            if(array_key_exists($idx, $horarios_disponibles)) {
                $horarios_disponibles[$idx] .= $actividad_horario_disponible;
            } else {
                $horarios_disponibles[$idx] = $actividad_horario_disponible;
            }

            $optionsHorasMaterias[$idx] = (object) array ( 
                                                                    'cantidad' => $actividad[5] , 
                                                                    'nombre' => $actividad[4]." x ".$docente, 
                                                                    'docente' => $docente,
                                                                    'horarios_disponibles' => $horarios_disponibles[$idx]
                                                                );
        }
        return $optionsHorasMaterias;
    }


    private function horariosATexto($dia, $hora_inicio, $hora_fin) {
        Misc::use_helper('Misc');
        $aSemana = diasDeLaSemana(1);
        $res = "";
        if($dia AND $hora_inicio AND $hora_fin) {
            $txt_dia = $aSemana[$dia];
            $res = $txt_dia." de ".$hora_inicio." a ".$hora_fin."\n";
        } 
        return $res;
    }


    public function executeAdd() {
        list($name, $horasMaterias_id, $docente_id) = $this->getIdFromRequest();
        $horarios = $this->getUser()->getAttribute('horarios_'.$name);
        $anio_id = $this->getUser()->getAttribute('anio_id');
        $division_id = $this->getUser()->getAttribute('division_id');
        $this->horasMaterias = $this->getHorasMaterias($anio_id);

        if(!isset($horarios[$horasMaterias_id."_".$docente_id])) {
            if(count($horarios) <= 0) { // to let just one activity for each hour
                $horarios[$horasMaterias_id."_".$docente_id] = 1;
                $aEvent = $this->getUser()->getAttribute('event');
                $this->agregarItemCalendario($horasMaterias_id, $docente_id, $division_id, $aEvent[$name]);
                //$this->horasMaterias[$horasMaterias_id]->cantidad--;
            }
        } else {
            //commented out to let just one 
            //++$horarios[$horasMaterias_id]; 
        }
        $this->getUser()->setAttribute('horarios_'.$name, $horarios);
        $this->vista = "noMuestraMenu"; 
        $this->name = $name;
    }


    public function executeRemove() {
        list($name, $horasMaterias_id, $docente_id) = $this->getIdFromRequest();
        $horarios = $this->getUser()->getAttribute('horarios_'.$name);
        $division_id = $this->getUser()->getAttribute('division_id');
        if (isset($horarios[$horasMaterias_id."_".$docente_id]) && $horarios[$horasMaterias_id."_".$docente_id] > 1) {
            --$horarios[$horasMaterias_id."_".$docente_id];
        } else {
            unset($horarios[$horasMaterias_id."_".$docente_id]);
            $aEvent = $this->getUser()->getAttribute('event');
            $this->borrarItemCalendario($horasMaterias_id, $docente_id, $division_id, $aEvent[$name]);
        }
        $this->getUser()->setAttribute('horarios_'.$name, $horarios);
        $division_id = $this->getUser()->getAttribute('division_id');
        $anio_id = $this->getUser()->getAttribute('anio_id');
        $this->horasMaterias = $this->getHorasMaterias($anio_id);
        $this->vista = "noMuestraMenu";
        $this->name = $name;
    }

    private function getIdFromRequest()  {
        $name = $this->getRequestParameter('name');
        $id = $this->getRequestParameter('id', '');

        if (!$id) {
            return 0;
        }

        $tmp = split('_', $id);
        $horasMaterias_id = $tmp[1];
        $docente_id = $tmp[2];

        return array($name, $horasMaterias_id, $docente_id);
    }



  /**
   * Executes index action
   *
   */
    public function executeIndex() {
        $this->horasMaterias = array();
        $this->getUser()->setAttribute('horarios', array());
        $this->getUser()->setAttribute('anio_id', 0);
        $this->getUser()->setAttribute('division_id', 0);
        $this->getUser()->setAttribute('event', array());
    
        $turnos_id = "";
        $actividad_id = "";
        $optionsActividad = array();
        $horasMateriasTodas = array();
        $aAnio = array();
        $anio_id = "";
        
/*
        $criteria = new Criteria();
        //$criteria->add(EstablecimientoPeer::IS_LIVE, 1);
        $establecimientos = EstablecimientoPeer::doSelect($criteria);
        $optionsEstablecimiento = array();
        foreach ($establecimientos as $establecimiento) {
            $optionsEstablecimiento[$establecimiento->getId()] = $establecimiento->getNombre();
        }
        asort($optionsEstablecimiento);
        $this->optionsEstablecimiento = $optionsEstablecimiento;        

        $establecimiento_id = $this->getRequestParameter('establecimiento_id');
        if(!$establecimiento_id) {
            if(count($optionsEstablecimiento) > 0) {
                $establecimiento_id = key($optionsEstablecimiento);
            }   
        }*/


        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
        $this->establecimiento_id = $establecimiento_id;
        

/*      $criteria = new Criteria();
        $criteria->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        $ciclolectivos = CiclolectivoPeer::doSelect($criteria);
        $optionsCiclolectivo = array();
        foreach ($ciclolectivos as $ciclolectivo) {
            $optionsCiclolectivo[$ciclolectivo->getId()] = $ciclolectivo->getDescripcion();
        }
        asort($optionsCiclolectivo);
        $this->optionsCiclolectivo = $optionsCiclolectivo;        

            
        $ciclolectivo_id = $this->getRequestParameter('ciclolectivo_id');
        if(!$ciclolectivo_id) {
            if(count($optionsCiclolectivo) > 0) {
                $ciclolectivo_id = key($optionsCiclolectivo);
            }   
        }*/

        $ciclolectivo_id = $this->getUser()->getAttribute('fk_ciclolectivo_id');
        $this->ciclolectivo_id = $ciclolectivo_id;


/*        $criteriaT = new Criteria(); 
        $criteriaT->add(TurnosPeer::FK_CICLOLECTIVO_ID, $ciclolectivo_id);
        $turnos = TurnosPeer::doSelect($criteriaT);*/
        $turnos = $this->getTurnos($ciclolectivo_id);

        $optionsTurnos = array();
        foreach ($turnos as $turno) {
            $optionsTurnos[$turno->getId()] = $turno->getDescripcion();
        }
        asort($optionsTurnos);
        $this->optionsTurnos = $optionsTurnos;

        $this->aHour = array();
        $horarioescolares = array();
        
        Misc::use_helper('Misc');       
        $aSemana = diasDeLaSemana(1);

        $this->aDayNames = array("Lunes","Martes","Miercoles","Jueves","Viernes");

        $this->aDay= array(strtotime("2006-09-11"), strtotime("2006-09-12"), strtotime("2006-09-13"), strtotime("2006-09-14"), strtotime("2006-09-15"));

        $this->optionsDivision = array();

        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            $this->division_id = $this->getRequestParameter('division_id');
            $this->actividad_id = $actividad_id = $this->getRequestParameter('actividad_id');
            
//             $ciclolectivo_id = $this->getRequestParameter('ciclolectivo_id');
//             $establecimiento_id = $this->getRequestParameter('establecimiento_id');

            $turnos_id = $this->getRequestParameter('turnos_id');
            $turno = TurnosPeer::retrieveByPK($turnos_id);
            
            if($this->getRequestParameter('time_interval')) {
                $this->time_interval = $this->getRequestParameter('time_interval');
            } else {
                $this->time_interval = 15;
            }

           
            $this->aHour = array(strtotime($turno->getHoraInicio()), strtotime($turno->getHoraFin()));


//             $criteria = new Criteria(); 
//             $criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
//             $criteria->add(HorarioescolarPeer::FK_TURNOS_ID, $turnos_id);
//             $horarioescolares = HorarioescolarPeer::doSelect($criteria);

            $horarioescolares  = $this->getHorarioEscolar($establecimiento_id, $turnos_id);

            $criteria = new Criteria();
            $criteria->add(DivisionPeer::FK_TURNOS_ID, $turnos_id);
            $criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
            $criteria->addJoin(AnioPeer::ID, DivisionPeer::FK_ANIO_ID);
            $divisiones = DivisionPeer::doSelect($criteria);
            $optionsDivision = array();
            
            foreach($divisiones as $division) {
                $optionsDivision[$division->getId()] = $division->getAnio()->getDescripcion()." ".$division->getDescripcion();
                $aAnio[$division->getId()] = $division->getAnio()->getId();
            }
            asort($optionsDivision);
            $this->optionsDivision = $optionsDivision;

            if(!$this->division_id OR !array_key_exists($this->division_id, $aAnio) ) {
                $eachDivision = each($optionsDivision); 
                $this->division_id = $eachDivision[0];  // me quedo con el primer indice del array
            }

            if(array_key_exists($this->division_id,$aAnio)) {
                $horasMateriasTodas = $this->getHorasMaterias($aAnio[$this->division_id]);
                $this->horasMaterias = $this->getHorasMaterias($aAnio[$this->division_id], $actividad_id);
                $this->getUser()->setAttribute('anio_id', $aAnio[$this->division_id]); 
                $this->getUser()->setAttribute('division_id', $this->division_id);
//              $this->turnos_id = $turnos_id;
                $anio_id = $aAnio[$this->division_id];
            }

        } else {
            $this->aHour = array(strtotime("8:00"), strtotime("17:00"));
            $this->time_interval = 15;
        }
        
        //Eventos 
        $this->aEvent = array();
        if(count($horarioescolares) > 0) {

            // Tomar todas las materias y docentes para una division X
            $criteria = new Criteria();
            $criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->division_id);
            $items = RelDivisionActividadDocentePeer::doSelect($criteria);

            $aColor = array ("silver", "gray");
            $aColorSet = array();
            $aEvent = array();
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


                for($j=0;$j<count($aDia);$j++) {

                    $oEvent = (object) array ( 'id'=> $i ,'name' => $nombre ,'date' => $aDia[$j],'start_time' => $hora_inicio, 'end_time' => $hora_fin, 'desc' => $descripcion, 'color' => $aColorSet[$horarioescolar->getFkHorarioescolartipoId()]);
                    $this->getUser()->setAttribute('horarios_eventname'.$i, array());
                    $aEvent["eventname".$i] = $oEvent;
                    //$this->aEvent[] = $oEvent;
                    $i++;
                }
            }

            $this->aEvent = $this->cargarItemCalendario($this->division_id, $aEvent, $horasMateriasTodas );
            $this->getUser()->setAttribute('event', $aEvent);

        }

        $optionsActividad[""] = "";        
        $criteria = new Criteria();
        $criteria->add(ActividadPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        $criteria->addJoin(RelAnioActividadPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);
        if($anio_id)  {
            $criteria->add(RelAnioActividadPeer::FK_ANIO_ID, $anio_id);
        }
        $actividades = ActividadPeer::doSelect($criteria);   
        foreach($actividades as $actividad) {
            $optionsActividad[$actividad->getId()] = $actividad->getNombre();
        }
        $this->optionsActividad = $optionsActividad;     
        $this->turnos_id = $turnos_id;
    }


    private function agregarItemCalendario($horasMaterias_id, $docente_id, $division_id, $oEvent) {
        $item = new RelDivisionActividadDocente();
        //$item->setId($id);
        $item->setFkDivisionId($division_id);
        $item->setFkActividadId($horasMaterias_id);
        $item->setFkRepeticionId(1); // id de semanal en tabla repeticion
        $item->setFechaInicio($oEvent->date);
        $item->setFechaFin($oEvent->date);
        $item->setHoraInicio($oEvent->start_time);
        $item->setHoraFin($oEvent->end_time);
        $item->setFkDocenteId($docente_id);
        //$item->setFkCargobajaId();
        //$item->setFkTipodocenteId();
        $item->save();
    }

    private function borrarItemCalendario($horasMaterias_id, $docente_id, $division_id, $oEvent) {
        $criteria = new Criteria(); 
        $criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $horasMaterias_id);
        $criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $division_id);
        $criteria->add(RelDivisionActividadDocentePeer::FECHA_INICIO, $oEvent->date);
        $criteria->add(RelDivisionActividadDocentePeer::FECHA_FIN, $oEvent->date);
        $criteria->add(RelDivisionActividadDocentePeer::HORA_INICIO, $oEvent->start_time);
        $criteria->add(RelDivisionActividadDocentePeer::HORA_FIN, $oEvent->end_time);
        $criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $docente_id);
        RelDivisionActividadDocentePeer::doDelete($criteria);
    }

    private function cargarItemCalendario($division_id, $aEvent, $horasMaterias) {

        $criteria = new Criteria();
        $criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $division_id);
        $items = RelDivisionActividadDocentePeer::doSelect($criteria);
        
        $nombre = "";
        $aResEvent = array();

        foreach($aEvent as $idx => $event) {
            $diaEvent = date("D",strtotime($event->date));
            $flag = 0;
            foreach ($items as $item) {
                $diaItem = date("D",strtotime($item->getFechaInicio()));
                if( $item->getHoraInicio() == $event->start_time AND 
                    $item->getHoraFin() == $event->end_time AND 
                    $item->getFechaInicio() == $item->getFechaFin() AND
                    $diaItem == $diaEvent) {
                    
                    $name = "eventname".$event->id;
                    $horarioMaterias_id = $item->getFkActividadId();
                    $docente_id = $item->getFkDocenteId();
                    $var = $name."_".$horarioMaterias_id."_".$docente_id;

                    $nombre = "<img src='".sfContext::getInstance()->getRequest()->getRelativeUrlRoot()."/sf/sf_admin/images/tick.png' id='".$var."_1'  style='position:relative' class='horarioMaterias-items' ><span class='title'>".$horasMaterias[$horarioMaterias_id."_".$docente_id]->nombre."</span>
<script type='text/javascript'>
//<![CDATA[
new Draggable('".$var."_1', {revert:1})
//]]
</script>";

                    $aResEvent[] = (object) array ( 'id'=> $event->id ,'name' => $nombre ,'date' => $event->date,'start_time' => $event->start_time, 'end_time' => $event->end_time, 'desc' => $event->desc, 'color' => $event->color);
                    $flag=1;
                }
            }
            if($flag==0) {
                $aResEvent[] = (object) array ( 'id'=> $event->id ,'name' => $event->name ,'date' => $event->date,'start_time' => $event->start_time, 'end_time' => $event->end_time, 'desc' => $event->desc, 'color' => $event->color);
            }   
        }

        return $aResEvent;    
    }


    public function executeBusquedaDocente() {
        // inicializando variables
        $aDocente  = array();        

        // tomando los datos del formulario
        $txt = $this->getRequestParameter('txt');

/*      $organizacion_id = $this->getUser()->getAttribute('fk_organizacion_id');
        $criteria = new Criteria();
        $criteria->add(DocentePeer::FK_ORGANIZACION_ID, $organizacion_id);
*/
       
        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            // buscando alumnos
            $criteria = new Criteria();
       
            if($txt) {
                $cton1 = $criteria->getNewCriterion(DocentePeer::NOMBRE, "%$txt%", Criteria::LIKE);
                $cton2 = $criteria->getNewCriterion(DocentePeer::APELLIDO, "%$txt%", Criteria::LIKE);
                $cton1->addOr($cton2);
                $criteria->add($cton1);
            }

            $aDocente = DocentePeer::doSelect($criteria);

            if(count($aDocente) == 1) {
                $this->redirect( 'calendario/horarioSegunDocente?id='.$aDocente[0]->getId());
            }
   
        }

        // asignando variables para ser usadas en el template
        //$this->organizacion_id = $organizacion_id;
        $this->txt = $txt;
        $this->aDocente = $aDocente;
    }

    public function executeHorarioSegunDocente() {

        Misc::use_helper('Misc');
        
        //Iniciando Variables
        $aHoras = array();
        $aEvento = array();

        // tomando los datos del formulario
        $docente_id = $this->getRequestParameter('id');
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
        //$ciclolectivo_id = $this->getUser()->getAttribute('fk_ciclolectivo_id');

       
        // Trayendo datos necesarios
        $docente = DocentePeer::retrieveByPK($docente_id);
        $aHoras  = $this->getHorarioEscolar($establecimiento_id,0,1);

        foreach($aHoras as $hora) {
            $aDatosHoras[$hora->getHoraInicio().$hora->getHoraFin()] = $hora->getId();
            $aHorasIdx[$hora->getId()] = $hora;
        }

        //$aTurnos = $this->getTurnos($ciclolectivo_id);




        $criteria = new Criteria();
        $criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $docente_id);
        $criteria->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID, Criteria::LEFT_JOIN);
        $criteria->addAsColumn("actividad_nombre", ActividadPeer::NOMBRE);
        $criteria->addAsColumn("hora_inicio", RelDivisionActividadDocentePeer::HORA_INICIO);
        $criteria->addAsColumn("hora_fin", RelDivisionActividadDocentePeer::HORA_FIN);
        $criteria->addAsColumn("fecha_inicio", RelDivisionActividadDocentePeer::FECHA_INICIO);
        $criteria->addAsColumn("fecha_fin", RelDivisionActividadDocentePeer::FECHA_FIN);

// deberia agregar la division para mostrar
        $eventos = BasePeer::doSelect($criteria);

        foreach($eventos as $evento) {
            if($evento[1] != "00:00:00" AND $evento[2] != "00:00:00") {
                $dia = date("w",strtotime($evento[3]));
                $aEvento[$aDatosHoras[$evento[1].$evento[2]]][$dia] = $evento[0];
            }
        }
        
        // asignando variables para ser usadas en el template
        $this->docente = $docente;
        $this->aHoras = $aHorasIdx;
        $this->aEvento = $aEvento;
        $this->aDia = diasDeLaSemana();
    }





    public function executeBusquedaDivision() {
        // inicializando variables
        $aDivision  = array();        

        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('division_id');
        $txt = $this->getRequestParameter('txt');

        // llenando el combo de division segun establecimiento
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
        $criteria = new Criteria();
        $criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        $divisiones = DivisionPeer::doSelectJoinAnio($criteria);

        // asignando variables para ser usadas en el template
        $this->aDivision = $divisiones;
    }


    public function executeHorarioSegunDivision() {

        Misc::use_helper('Misc');

        $aEvento = array();
        $aHorasIdx = array();
        $aDatosHoras = array();

        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('id');
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');


        // trayendo datos necesarios
        $division = DivisionPeer::retrieveByPK($division_id);

        $aHoras  = $this->getHorarioEscolar($establecimiento_id, $division->getFkTurnosId() ,1);
//         if(count($aHoras) == 0) {
//             $aHoras  = $this->getHorarioEscolar($establecimiento_id, 0,1);
//         }

        foreach($aHoras as $hora) {
            $aDatosHoras[$hora->getHoraInicio().$hora->getHoraFin()] = $hora->getId();
            $aHorasIdx[$hora->getId()] = $hora;
        }


        $criteria = new Criteria();
        $criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $division_id);
        $criteria->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID, Criteria::LEFT_JOIN);
        $criteria->addAsColumn("actividad_nombre", ActividadPeer::NOMBRE);
        $criteria->addAsColumn("hora_inicio", RelDivisionActividadDocentePeer::HORA_INICIO);
        $criteria->addAsColumn("hora_fin", RelDivisionActividadDocentePeer::HORA_FIN);
        $criteria->addAsColumn("fecha_inicio", RelDivisionActividadDocentePeer::FECHA_INICIO);
        $criteria->addAsColumn("fecha_fin", RelDivisionActividadDocentePeer::FECHA_FIN);

// deberia agregar la division para mostrar
        $eventos = BasePeer::doSelect($criteria);

        foreach($eventos as $evento) {
            if($evento[1] != "00:00:00" AND $evento[2] != "00:00:00") {
                $dia = date("w",strtotime($evento[3]));
                $idx = $evento[1].$evento[2];
                if(array_key_exists($idx,$aDatosHoras)) {
                    $aEvento[$aDatosHoras[$idx]][$dia] = $evento[0];
                }
            }
        }
        
        
        // asignando variables para ser usadas en el template
        $this->division = $division;
        $this->aHoras = $aHorasIdx;
        $this->aEvento = $aEvento;
        $this->aDia = diasDeLaSemana();


    }

    protected function getHorarioEscolar($establecimiento_id = 0, $turnos_id = 0, $orden = 0) {
        $criteria = new Criteria(); 
        if($establecimiento_id) {
            $criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        }
        if($turnos_id) {
            $criteria->add(HorarioescolarPeer::FK_TURNOS_ID, $turnos_id);
        }

        if($orden) {
            $criteria->addAscendingOrderByColumn(HorarioescolarPeer::FK_TURNOS_ID);            
            $criteria->addAscendingOrderByColumn(HorarioescolarPeer::HORA_INICIO);
            $criteria->addAscendingOrderByColumn(HorarioescolarPeer::HORA_FIN);
        } 

        $horarioescolares = HorarioescolarPeer::doSelect($criteria);
        return $horarioescolares;
    }

    protected function getTurnos($ciclolectivo_id = 0) {
        $criteriaT = new Criteria(); 
        if($ciclolectivo_id) {
            $criteriaT->add(TurnosPeer::FK_CICLOLECTIVO_ID, $ciclolectivo_id);
        }
        $turnos = TurnosPeer::doSelect($criteriaT);
        return $turnos;
    }


    public function handleErrorIndex() {
        $this->redirect('calendario');
    }

}

?>