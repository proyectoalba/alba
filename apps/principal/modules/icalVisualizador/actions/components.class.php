<?php

/**
 * icalVisualizador components.
 *
 * @package    alba
 * @subpackage icalVisualizador
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 * @filesource
 * @license GPL
 */

class icalVisualizadorComponents extends sfComponents
{

    public function  executeVerPorDia() {
        $aAllDay = array();
        $minutes = 60;
        $date = $this->getDate();
        $this->aWeek = $this->getWeekRange($date);

        require(sfConfig::get('sf_app_module_dir')."/icalVisualizador/".sfConfig::get('sf_app_module_lib_dir_name')."/ical_parser.php");
        $aEvent = @icalToArray($this->archivo, date("Ymd",$this->aWeek[0]['day']), date("Ymd",$this->aWeek[6]['day']) );

        $nbrGridCols = 1;
        foreach($aEvent as $day) {
            foreach($day as $time) {
                foreach($time as $event) {
                     $nbrGridCols = $this->kgv($nbrGridCols, ($event['event_overlap'] + 1));
                }
            }
        }

        
        $this->aTime = $this->getTimeRange();
        $this->nbrGridCols = $nbrGridCols;
        $this->aEvent = $aEvent;
        $this->aAllDay = $aAllDay;
        $this->l_calendar = "";
        $this->calendar_name = "";
        $this->date = strtotime($date);
    }


    public function  executeVerPorSemana() {

        $date = $this->getDate();
        $aWeek = $this->getWeekRange($date);

        require(sfConfig::get('sf_app_module_dir')."/icalVisualizador/".sfConfig::get('sf_app_module_lib_dir_name')."/ical_parser.php");
        $aEvent = @icalToArray($this->archivo, date("Ymd",$aWeek[0]['day']), date("Ymd",$aWeek[6]['day']) );

        $this->aEvent = $aEvent;
        $this->aTime = $this->getTimeRange();
        $this->l_calendar = "";
        $this->calendar_name = "";
        $this->date = strtotime($date);
        $this->day_end_of_week = $aWeek[6]['day'];
        $this->day_start_of_week =  $aWeek[0]['day'];

        foreach($aWeek as $week) {
            $nbrGridCols[$week['day']] = 1;
            $idx = date("Ymd", $week['day']);
            if(array_key_exists($idx, $aEvent)) {
                foreach($aEvent[$idx] as $day) {
                    foreach($day as $event) {
                        $nbrGridCols[$week['day']] = $this->kgv($nbrGridCols[$week['day']], ($event['event_overlap'] + 1));
                    }
                }
            }
        }

        $this->nbrGridCols = $nbrGridCols;
        $this->aWeek  = $aWeek;
    }


    private function getTimeRange() {
        $aTime = array();
        $time_start = "7:00";
        $time_end = "23:00";

        // get all time between time_start and time_end
        for($time = strtotime($time_start),  $max_time = strtotime($time_end) ; $time < $max_time; $time += (15*60)) {
            $aTime[] = $time;
        }
        return $aTime;
    }

    private function getWeekRange($date) {
        $aWeek = array();
        $unix_time = strtotime($date);
        $day_of_week = date("w", $unix_time); // get number of the day of the week
        $day_start_of_week = $unix_time - ($day_of_week * 86400); // get the starts day the of this week
        $day_end_of_week = $day_start_of_week + (7 * 86400); // get the end day the of this week
        for($day= $day_start_of_week; $day < $day_end_of_week; $day += 86400) {
             $aWeek[] = array ( 'day' =>  $day );
         }
        return $aWeek;
    }

    // function to determine maximum necessary columns per day
    // actually an algorithm to get the smallest multiple for two numbers
    private function kgv($a, $b) {
        $x = $a;
        $y = $b;
        while ($x != $y) {
            if ($x < $y) $x += $a;
            else $y += $b;
        }
        return $x;
    }


    private function getDate() {
        if(!$this->getRequestParameter('date')) {
            if($this->date_component) {
                $date = $this->date_component;
            } else {
                $date = date("Ymd");
            }
        } else {
            $date = $this->getRequestParameter('date');
        }
        return $date;
    }




}
?>