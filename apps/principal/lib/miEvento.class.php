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
 *  Clase para manejo de Evento
 *
 * @package miEvento
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: actions.class.php 4566 2007-04-25 15:07:43Z josx $
 * @filesource
 * @license GPL
 */

class miEvento extends sfWebRequest
{

  public function updateEventoFromRequest($evento_obj, $evento, $cultura) {
//         $evento = $this->getRequestParameter('evento');
      
        if (isset($evento['fecha_inicio'])) {
            if ($evento['fecha_inicio']) {
                try {
                    $dateFormat = new sfDateFormat($cultura);
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
                    $dateFormat = new sfDateFormat($cultura);
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
                    case '5':  
                               if(array_key_exists('frecuencia_intervalo_semana' ,$evento)) {
                                    $evento_obj->setFrecuenciaIntervalo($evento['frecuencia_intervalo_semana']);
                                    $aSemanaBinario = array ( 1, 2, 4, 8, 16, 32, 64 );
                                    $suma_total = 0;
                                    if(array_key_exists('recurrencia_dias', $evento)) {
                                        foreach($evento['recurrencia_dias'] as $dia) {
                                            $suma_total += $aSemanaBinario[$dia];
                                        }
                                    }
                                    // guardamos en binario para saber todos los dias de la semana seleccionados
                                    $evento_obj->setRecurrenciaDias($suma_total); 
                               }
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
                    case '2':   $dateFormat = new sfDateFormat($cultura);
                                $value = $dateFormat->format($evento['recurrencia_fin_fecha']." 00:00", 'I', $dateFormat->getInputPattern('g'));
                                $evento_obj->setRecurrenciaFin($value);
                                break; 
                }
            }
       } else {
            $evento_obj->setFrecuenciaIntervalo(0);
            $evento_obj->setRecurrenciaFin("");
            $evento_obj->setRecurrenciaDias("");
            $evento_obj->setFrecuencia(0); 
       }

       return $evento_obj;
  }


  public function getEventoOrCreate($id = 0)  {
    if (!$id) {
        $evento = new Evento();
    } else {
      $evento = EventoPeer::retrieveByPk($id);
//       $this->forward404Unless($evento);
    }
    return $evento;
  }


}

?>
