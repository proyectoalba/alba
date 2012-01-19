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
 * evento actions
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: actions.class.php 4566 2007-04-25 15:07:43Z josx $
 * @filesource
 * @license GPL
 */

class eventoActions extends sfActions
{

    public function executeIndex() {
        return $this->forward('evento', 'edit');
//         $this->evento = new Evento();
    }


    protected function saveEvento($evento) {
        $evento->save();

    }

    public function executeCreate() {
        return $this->forward('evento', 'edit');
    }


    public function executeEdit() {
        $this->evento = $this->getEventoOrCreate();
        
        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            $this->updateEventoFromRequest();
            $this->saveEvento($this->evento);
            $this->getUser()->setFlash('notice', 'Your modifications have been saved');
            return $this->redirect('evento/');
            /*
            if ($this->getRequestParameter('save_and_add')) {
                return $this->redirect('evento/create');
            } else if ($this->getRequestParameter('save_and_list')) {
                return $this->redirect('evento/list');
            } else {
                return $this->redirect('evento/edit?id='.$this->evento->getId());
            }
            */

        } else {
//             $this->labels = $this->getLabels();
        }
    }

    public function handleErrorEdit() {
        $this->preExecute();
        $this->evento = $this->getEventoOrCreate();
        $this->updateEventoFromRequest();
//         $this->labels = $this->getLabels();
        return sfView::SUCCESS;
    }


  protected function getEventoOrCreate($id = 'id')  {
    if (!$this->getRequestParameter($id)) {
        $evento = new Evento();
    } else {
      $evento = EventoPeer::retrieveByPk($this->getRequestParameter($id));
      $this->forward404Unless($evento);
    }
    return $evento;
  }




    protected function updateEventoFromRequest() {
        $evento = $this->getRequestParameter('evento');

        if (isset($evento['fecha_inicio'])) {
            if ($evento['fecha_inicio']) {
                try {
                    $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                    if(!is_array($evento['fecha_inicio'])) {

                        if(isset($evento['hora_asociada']) AND $evento['hora_asociada'] == 1) {
                            if($evento['hora_inicio']) {
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
                            }
                        } 

                        $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
                    }

                    $this->evento->setFechaInicio($value);
                }
                catch (sfException $e) {
                // not a date
                }
            } else {
                $this->evento->setFechaInicio(null);
            }
        }

        if (isset($evento['fecha_fin'])) {
            if ($evento['fecha_fin']) {
                try {
                    $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                    if (!is_array($evento['fecha_fin'])) {

                        if(isset($evento['hora_asociada']) AND $evento['hora_asociada'] == 1) {
                            if($evento['hora_fin']) {
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
                            }
                        } 

                        $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
                    }
                    $this->evento->setFechaFin($value);
                }
                catch (sfException $e) {
                // not a date
                }
            } else {
                $this->evento->setFechaFin(null);
            }
        }


        if(isset($evento['titulo'])) {
            $this->evento->setTitulo($evento['titulo']);
        }
        

        if(isset($evento['tipo'])) {
            $this->evento->setTipo($evento['titulo']);
        } else {
            $this->evento->setTipo(1); //  (0 = PRIVATE | 1 = PUBLIC | 2 = CONFIDENTIAL)
        }

        if(isset($evento['estado'])) {
            $this->evento->setEstado($evento['estado']);
        } else {
            $this->evento->setEstado(1);  // (0 = TENTATIVE, 1 = CONFIRMED, 2 = CANCELLED)
        }




        if(isset($evento['activar_repeticion']) AND $evento['activar_repeticion'] == 1) {
            if(isset($evento['frecuencia']) AND is_array($evento['frecuencia']) ) {
                $this->evento->setFrecuencia($evento['frecuencia'][0]);
                
                switch($evento['frecuencia'][0]) { // dia: 4, semana: 5, mes: 6, año: 7
                    case '4':  $this->evento->setFrecuenciaIntervalo($evento['frecuencia_intervalo_diaria']);
                               break;
                    case '5':  $this->evento->setFrecuenciaIntervalo($evento['frecuencia_intervalo_semana']);
                               $aSemanaBinario = array ( 1, 2, 4, 8, 16, 32, 64 );
                               $suma_total = 0;
                               foreach($evento['recurrencia_dias'] as $dia) {
                                    $suma_total += $aSemanaBinario[$dia];
                               }
                                // guardamos en binario para saber todos los dias de la semana seleccionados
                               $this->evento->setRecurrenciaDias($suma_total); 
                               break;
                    case '6':  break;
                    case '7':  break;
                }
            }
            
            switch($evento['recurrencia_fin_tipo'][0]) {
                case '0':   $this->evento->setRecurrenciaFin(''); 
                            break;
                case '1':   $this->evento->setRecurrenciaFin($evento['recurrencia_fin_repeticion']);
                            break;
                case '2':   $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                            $value = $dateFormat->format($evento['recurrencia_fin_fecha']." 00:00:00", 'I', $dateFormat->getInputPattern('g'));
                            $this->evento->setRecurrenciaFin($value);
                            break; 
            }
        }

  }


}
?>
