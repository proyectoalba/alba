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
 * Subclass for representing a row from the 'evento' table.
 *
 * @package lib.model
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: actions.class.php 4566 2007-04-25 15:07:43Z josx $
 * @filesource
 * @license GPL
 */

class Evento extends BaseEvento
{

    var $aFreq = array ( '', 'SECONDLY', 'MINUTELY' , 'HOURLY', 'DAILY' ,'WEEKLY', 'MONTHLY', 'YEARLY');
    var $aDias = array ( 'SA', 'FR', 'TH', 'WE', 'TU', 'MO', 'SU');


    function getHoraInicio() {
        // si la hora de ambos es diferente de 00:00:00 entonces si tiene hora
    }


    function getHoraFin() {
        // si la hora de ambos es diferente de 00:00:00 entonces si tiene hora
    }


    function getRecurrenciaDiasIcal() {
        if(is_numeric($this->getRecurrenciaDias())) {
            $dias = "";
            $numero_binario = $this->getRecurrenciaDiasEnBinario();
            foreach( array(0,1,2,3,4,5,6) as $idx ) {
                $dias .= ($numero_binario[$idx] == 1)?$this->aDias[$idx].",":"";
            }
            return substr($dias,0,-1);
        } else {
            return '';
        }
    }


    function getRecurrenciaDiasEnBinario() {
        return str_pad(decbin($this->getRecurrenciaDias()), 7, "0", STR_PAD_LEFT); 
    }

    function getFrecuenciaTexo() {
        return $aFreq[$this->getFrecuencia()];
    }


    function getInfoEnTexto() {
        $txt_salida = "";
        $frecuencia = " con una frecuencia ";
        $recurrencia_fin = "Termina ";
        $frecuencia_intervalo = "";
        $dias_semana = "";

        switch($this->getFrecuencia()) {
            case '0' : $frecuencia = ""; break;
            case '4' : $frecuencia .= "diaria"; 
                       $frecuencia_intervalo = " cada " . $this->getFrecuenciaIntervalo() . (($this->getFrecuenciaIntervalo()==1)?" d&iacute;a":" d&iacute;as");
                       break;
            case '5' : $frecuencia .= "semanal"; 
                       $numero_binario = $this->getRecurrenciaDiasEnBinario(); 
                       $dias_semana .= ($numero_binario[6] == 1)?" Dom":"";
                       $dias_semana .= ($numero_binario[5] == 1)?" Lun":"";
                       $dias_semana .= ($numero_binario[4] == 1)?" Mar":"";
                       $dias_semana .= ($numero_binario[3] == 1)?" Mie":"";
                       $dias_semana .= ($numero_binario[2] == 1)?" Jue":"";
                       $dias_semana .= ($numero_binario[1] == 1)?" Vie":"";
                       $dias_semana .= ($numero_binario[0] == 1)?" Sab" :"";
                       $frecuencia_intervalo = " de todos los "  . $dias_semana . " cada " .$this->getFrecuenciaIntervalo(). " semanas";
                       break;
            case '6' : $frecuencia .= "mensual"; break;
            case '7' : $frecuencia .= "anual"; break;
        }


        if($this->getRecurrenciaFin() != "") {
            if(is_numeric($this->getRecurrenciaFin())) {
                $recurrencia_fin = " luego de " .$this->getRecurrenciaFin(). " veces";
            } else {
                $recurrencia_fin = " hasta el " .date( "d-m-Y" , strtotime($this->getRecurrenciaFin()));
            }
        } else {
            $recurrencia_fin = "";
        }

        $hora_inicio = date( "H:i" , strtotime($this->getFechaInicio()));;
        $hora_fin = date( "H:i" , strtotime($this->getFechaFin()));;
        $dia_inicio = date( "d-m-Y" , strtotime($this->getFechaInicio()));
        $dia_fin = date( "d-m-Y" , strtotime($this->getFechaFin()));
        
        if($dia_inicio == $dia_fin) {
            if($hora_inicio == "00:00" AND $hora_fin == "00:00") {
                $dia = $dia_inicio;
            } else {
                $dia = $dia_inicio . " ". $hora_inicio . "hs a " .$hora_fin . "hs";
            }
        } else {
            if($hora_inicio == "00:00" AND $hora_fin == "00:00") {
                $dia = $dia_inicio . " a ". $dia_fin;
            } else {
                $dia = $dia_inicio . " ". $hora_inicio . "hs a " .$dia_fin ." ". $hora_fin. "hs";
            }            
        }

     
        $txt_salida = $dia . $frecuencia . $frecuencia_intervalo .$recurrencia_fin;

        return $txt_salida;
    }

}
?>