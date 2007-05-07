<?php

/**
 * Subclass for representing a row from the 'evento' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Evento extends BaseEvento
{

    function getHoraInicio() {
        // si la hora de ambos es diferente de 00:00:00 entonces si tiene hora
    }


    function getHoraFin() {
        // si la hora de ambos es diferente de 00:00:00 entonces si tiene hora
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
                       $frecuencia_intervalo = " cada " . $this->getFrecuenciaIntervalo() . "d&iacute;as";;
                       break;
            case '5' : $frecuencia .= "semanal"; 
                       $numero_binario = str_pad(decbin($this->getRecurrenciaDias()), 7, "0", STR_PAD_LEFT); 
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
                $recurrencia_fin = " el " .$this->getRecurrenciaFin();
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