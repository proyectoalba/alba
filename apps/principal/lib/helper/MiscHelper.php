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
 * MiscHelper Funciones generales
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

    function Sexos($opcionBlanco = false) {

        if($opcionBlanco) {
            $aSexo[] = "";
        }

        $aSexo["M"] = "Masculino";
        $aSexo["F"] = "Femenino";

        return $aSexo;
    }


    function EstadoCivil($opcionBlanco = falase) {
        if($opcionBlanco) {
            $aEstadoCivil[] = "";
        }

        $aEstadoCivil["C"] = "Casado";
        $aEstadoCivil["S"] = "Soltero";
        $aEstadoCivil["D"] = "Divorciado";

        return $aEstadoCivil;
    }

    function colorTurnos() {
        $aColor = array ();
        $aColor[] = "#E5E5E5";
        $aColor[] = "#C0C0C0";
        $aColor[] = "#A1A1A1";
        $aColor[] = "#808080";
        $aColor[] = "#636363";
        $aColor[] = "#4D4D4D";
        return $aColor;
    }


    function Meses() {
        $aMeses = array( 1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre');
        return  $aMeses;
    }    
 
    function diasDeLaSemana($opcionSemanal = 0) {
        $aSemana = array( '1' => 'Lunes', '2' => 'Martes', '3' => 'Miercoles', '4' => 'Jueves', '5' => 'Viernes', '6' => 'Sabado', '7' => 'Domingo');
        if($opcionSemanal != 0) {
            $aSemana['8'] = "Semanal";
        }
        return  $aSemana;
    }

    function repeticiones($indice = 'N'){
        if ($indice == 'N')
           return array('1' => "Diario",'2' => "Semanal", '3' => "Quincenal", '4' => "Mensual");
        else
            return array('Diario' => "1",'Semanal' => "2", 'Quincenal' => "3", 'Mensual' => "4");
    }
    
    /**
    * Devuelve un array de dias depende la vista seleccionada
    * @param int $d
    * @param int $m
    * @param int $y
    * @param int $intervalo
    * @return mixed Array of timestamps or dates if given format
    **/ 
    function diasxintervalo($d,$m,$y,$intervalo){
        $aDias = array();
        $aRepeticion = repeticiones("S");
        
        //TODO: Hacer que funcione esto y cambiar los parametros
         //include_once('symfony/helper/I18NHelper.php');
        // $user_culture = sfContext::getInstance()->getUser()->getCulture();
        //list($d, $m, $y) = sfI18N::getDateForCulture($fecha, $user_culture);

        switch($intervalo) {
            case $aRepeticion['Diario']: 
                $aDias[] = "$y-$m-$d";  
                break;
            case $aRepeticion['Semanal']: 
                //Muestro los dias de la semana en que estoy
                $fecha_actual =strtotime("$y-$m-$d");
                $dia  = date("w",$fecha_actual);
                $fecha_inicio = date ("d-m-Y",strtotime("- $dia days",$fecha_actual));
                $fecha_fin = date ("d-m-Y",strtotime("+ 6 days",strtotime($fecha_inicio)));
                $aDias = dates_between($fecha_inicio,$fecha_fin,"Y-m-d");   
                break;
            case $aRepeticion['Quincenal']: 
                //Me fijo en que quincena estoy y muestro la 1 o 2 quincena del mes
                if ( $d < 15 ){
                   $fecha_inicio = "01-$m-$y";
                   $fecha_fin = "15-$m-$y";;
                }   
                else{
                   $fecha_inicio = "15-$m-$y";
                   $last_day = cal_days_in_month(CAL_GREGORIAN, $m, $y);
                   $fecha_fin = $last_day."-$m-$y";
                }
                $aDias = dates_between($fecha_inicio,$fecha_fin,"Y-m-d");   
                break;       
            case $aRepeticion['Mensual']: 
                //captura el mes, y muestro todos los dias del mes
                $last_day = cal_days_in_month(CAL_GREGORIAN, $m, $y);
                $fecha_inicio = "01-$m-$y";
                $fecha_fin = $last_day."-$m-$y";
                $aDias = dates_between($fecha_inicio,$fecha_fin,"Y-m-d");
                break;           
        }    
        return $aDias;
    }
        
      /**
     * Returns an array with the dates between to dates given.
     *
     * @link http://us3.php.net/manual/en/function.date.php#AEN25217
     * 
     * @param mixed $startdate Timestamp or strtotime() recognizeable string
     * @param mixed $enddate Timestamp or strtotime() recognizeable string
     * @param string[optional] $format date() format string
     * @return mixed Array of timestamps or dates if given format
     */
    function dates_between($startdate, $enddate, $format=null){
 
        (is_int($startdate)) ? 1 : $startdate = strtotime($startdate);
        (is_int($enddate)) ? 1 : $enddate = strtotime($enddate);
 
        if($startdate > $enddate){
            return false; //The end date is before start date
        }
 
        while($startdate < $enddate){
            $arr[] = ($format) ? date($format, $startdate) : $startdate;
            $startdate += 86400;
        }
        $arr[] = ($format) ? date($format, $enddate) : $enddate; 
        return $arr;
    }	
?>
