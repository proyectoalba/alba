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
 * relDivisionActividadDocente actions.
 *
 * @package    alba
 * @subpackage relDivisionActividadDocente
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: actions.class.php 4492 2007-03-19 14:59:17Z josx $
 * @filesource
 * @license GPL
 */
class relDivisionActividadDocenteActions extends autorelDivisionActividadDocenteActions
{
/*
    protected function updateEventoFromRequest($evento_obj) {
        $evento = $this->getRequestParameter('evento');
      
        if (isset($evento['fecha_inicio'])) {
            if ($evento['fecha_inicio']) {
                try {
                    $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                    if(!is_array($evento['fecha_inicio'])) {

                        if(isset($evento['hora_asociada']) AND $evento['hora_asociada'] == 1) {
                            if($evento['hora_inicio']) {
                                $evento['hora_inicio']['hour'] = ($evento['hora_inicio']['hour'] != "12" AND $evento['hora_inicio']['ampm'] == "PM")?$evento['hora_inicio']['hour'] + 12:$evento['hora_inicio']['hour'];
                                $evento['hora_inicio']['hour'] = ($evento['hora_inicio']['hour'] == "12" AND $evento['hora_inicio']['ampm'] == "AM")?"00":$evento['hora_inicio']['hour'];
                                $evento['fecha_inicio'] .= " ".$evento['hora_inicio']['hour'].":".$evento['hora_inicio']['minute'];
                            } else {
                                $evento['fecha_inicio'] .= " 00:00:00";
                            }
                        } else {
                            $evento['fecha_inicio'] .= " 00:00:00";
                        }

                        $value = $dateFormat->format($evento['fecha_inicio'], 'I', $dateFormat->getInputPattern('g'));

                    } else {
                        $value_array = $evento['fecha_inicio'];
                        
                        $value_array['hour']['hour'] = "00";
                        $value_array['hour']['minute'] = "00";
                        $value_array['hour']['second'] = "00";
                        if($evento['hora_asociada'] == 1) {
                            if($evento['hora_inicio']) {
                                $value_array['hour'] = $evento['hora_inicio']['hour'];
                                $value_array['minute'] = $evento['hora_inicio']['minute'];
                                $value_array['ampm'] = $evento['hora_inicio']['ampm'];
                            }
                        } 

                        $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
                    }

                    $evento_obj->setFechaInicio($value);
                }
                catch (sfException $e) {
                // not a date
                }
            } else {
                $evento_obj->setFechaInicio(null);
            }
        }

        if (isset($evento['fecha_fin'])) {
            if ($evento['fecha_fin']) {
                try {
                    $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                    if (!is_array($evento['fecha_fin'])) {

                        if(isset($evento['hora_asociada']) AND $evento['hora_asociada'] == 1) {
                            if($evento['hora_fin']) {
                                $evento['hora_fin']['hour'] = ($evento['hora_fin']['hour'] != "12" AND $evento['hora_fin']['ampm'] == "PM")?$evento['hora_fin']['hour'] + 12:$evento['hora_fin']['hour'];
                                $evento['hora_fin']['hour'] = ($evento['hora_fin']['hour'] == "12" AND $evento['hora_fin']['ampm'] == "AM")?"00":$evento['hora_fin']['hour'];

                                $evento['fecha_fin'] .= " ".$evento['hora_fin']['hour'].":".$evento['hora_fin']['minute'];
                            } else {
                                $evento['fecha_fin'] .= " 00:00:00";
                            }
                        } else {
                            $evento['fecha_fin'] .= " 00:00:00";
                        }

                        $value = $dateFormat->format($evento['fecha_fin'], 'I', $dateFormat->getInputPattern('g'));

                    } else {
                        $value_array = $evento['fecha_fin'];

                        $value_array['hour']['hour'] = "00";
                        $value_array['hour']['minute'] = "00";
                        $value_array['hour']['second'] = "00";
                        if($evento['hora_asociada'] == 1) {
                            if($evento['hora_fin']) {
                                $value_array['hour'] = $evento['hora_fin']['hour'];
                                $value_array['minute'] = $evento['hora_fin']['minute'];
                                $value_array['ampm'] = $evento['hora_inicio']['ampm'];
                            }
                        } 

                        $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
                    }
                    $evento_obj->setFechaFin($value);
                }
                catch (sfException $e) {
                // not a date
                }
            } else {
                $evento_obj->setFechaFin(null);
            }
        }


        if(isset($evento['titulo'])) {
            $evento_obj->setTitulo($evento['titulo']);
        }
        

        if(isset($evento['tipo'])) {
            $evento_obj->setTipo($evento['titulo']);
        } else {
            $evento_obj->setTipo(1); //  (0 = PRIVATE | 1 = PUBLIC | 2 = CONFIDENTIAL)
        }

        if(isset($evento['estado'])) {
            $evento_obj->setEstado($evento['estado']);
        } else {
            $evento_obj->setEstado(1);  // (0 = TENTATIVE, 1 = CONFIRMED, 2 = CANCELLED)
        }




        if(isset($evento['activar_repeticion']) AND $evento['activar_repeticion'] == 1) {
            if(isset($evento['frecuencia']) AND is_array($evento['frecuencia']) ) {
                $evento_obj->setFrecuencia($evento['frecuencia'][0]);
                
                switch($evento['frecuencia'][0]) { // dia: 4, semana: 5, mes: 6, año: 7
                    case '4':  $evento_obj->setFrecuenciaIntervalo($evento['frecuencia_intervalo_diaria']);
                               break;
                    case '5':  $evento_obj->setFrecuenciaIntervalo($evento['frecuencia_intervalo_semana']);
                               $aSemanaBinario = array ( 1, 2, 4, 8, 16, 32, 64 );
                               $suma_total = 0;
                               foreach($evento['recurrencia_dias'] as $dia) {
                                    $suma_total += $aSemanaBinario[$dia];
                               }
                                // guardamos en binario para saber todos los dias de la semana seleccionados
                               $evento_obj->setRecurrenciaDias($suma_total); 
                               break;
                    case '6':  break;
                    case '7':  break;
                }
            }
            
            if(isset($evento['recurrencia_fin_tipo']) AND is_array($evento['recurrencia_fin_tipo'])) {
            
                switch($evento['recurrencia_fin_tipo'][0]) {
                    case '0':   $evento_obj->setRecurrenciaFin(''); 
                                break;
                    case '1':   $evento_obj->setRecurrenciaFin($evento['recurrencia_fin_repeticion']);
                                break;
                    case '2':   $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                                $value = $dateFormat->format($evento['recurrencia_fin_fecha']." 00:00:00", 'I', $dateFormat->getInputPattern('g'));
                                $evento_obj->setRecurrenciaFin($value);
                                break; 
                }
            }
       } else {
            $evento_obj->setFrecuenciaIntervalo(null);
            $evento_obj->setRecurrenciaFin(null);
            $evento_obj->setRecurrenciaDias(null);
            $evento_obj->setFrecuencia(null); 
       }

       return $evento_obj;
  }


  protected function getEventoOrCreate($id = 0)  {
    if (!$id) {
        $evento = new Evento();
    } else {
      $evento = EventoPeer::retrieveByPk($id);
      $this->forward404Unless($evento);
    }
    return $evento;
  }
*/

  public function executeEdit()
  {

    $evento_generico = new miEvento();

    $this->rel_division_actividad_docente = $this->getRelDivisionActividadDocenteOrCreate();
    $this->evento = $evento_generico->getEventoOrCreate($this->rel_division_actividad_docente->getFkEventoId());
    
    if ($this->getRequest()->getMethod() == sfRequest::POST) {


      $this->evento = $evento_generico->updateEventoFromRequest($this->evento, $this->getRequestParameter('evento'), $this->getUser()->getCulture());
      $this->evento->save();
      $this->forward404Unless($this->evento);

      $this->updateRelDivisionActividadDocenteFromRequest($this->evento->getId());
      $this->saveRelDivisionActividadDocente($this->rel_division_actividad_docente);
     
      $this->setFlash('notice', 'Your modifications have been saved');
      if ($this->getRequestParameter('save_and_add')) {
        return $this->redirect('relDivisionActividadDocente/create');
      }
      else if ($this->getRequestParameter('save_and_list')) {
        return $this->redirect('relDivisionActividadDocente/list');
      } else {
        return $this->redirect('relDivisionActividadDocente/edit?id='.$this->rel_division_actividad_docente->getId());
      }
    } else {
      $this->labels = $this->getLabels();
    }
  }

  protected function getLabels()
  {
    return array(
      'rel_division_actividad_docente{fk_division_id}' => 'Divisi&oacute;n:',
      'rel_division_actividad_docente{fk_actividad_id}' => 'Actividad:',
      'rel_division_actividad_docente{fk_docente_id}' => 'Docente:',
      'evento{fecha_inicio}' => 'Fecha inicio:',
      'evento{fecha_fin}' => 'Fecha fin:',
    );
  }


  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->rel_division_actividad_docente = $this->getRelDivisionActividadDocenteOrCreate();
    $this->updateRelDivisionActividadDocenteFromRequest();
    $this->labels = $this->getLabels();
    $this->evento = new Evento();
    return sfView::SUCCESS;
  }



    protected function updateRelDivisionActividadDocenteFromRequest($fk_evento_id = '') {
        $rel_division_actividad_docente = $this->getRequestParameter('rel_division_actividad_docente');
        if (isset($rel_division_actividad_docente['fk_division_id'])) {
            $this->rel_division_actividad_docente->setFkDivisionId($rel_division_actividad_docente['fk_division_id'] ? $rel_division_actividad_docente['fk_division_id'] : null);
        }
        if (isset($rel_division_actividad_docente['fk_actividad_id'])) {
            $this->rel_division_actividad_docente->setFkActividadId($rel_division_actividad_docente['fk_actividad_id'] ? $rel_division_actividad_docente['fk_actividad_id'] : null);
        }
        if (isset($rel_division_actividad_docente['fk_docente_id'])) {
            $this->rel_division_actividad_docente->setFkDocenteId($rel_division_actividad_docente['fk_docente_id'] ? $rel_division_actividad_docente['fk_docente_id'] : null);
        }
        if ($fk_evento_id) {
            $this->rel_division_actividad_docente->setFkEventoId($fk_evento_id);
        } else {
            $this->rel_division_actividad_docente->setFkEventoId(null);
        }


      }




}
?>