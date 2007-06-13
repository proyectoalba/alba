<?php

/**
 * icalVisualizador actions.
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

class icalVisualizadorActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('default', 'module');
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




    public function  executeVerPorDia() {
//         $aWeek = array('Domingo','Lunes','Martes'.'Miercoles','Jueves','Viernes','Sabado');
        $aAllDay = array();
        $aTime  = array();
        $aEvent = array();

        $minutes = 60;
        $time_start = "7:00";
        $time_end = "23:00";

        $date = $this->getRequestParameter('date');
        if($date) {
            $unix_time = strtotime($date);
        } else {
            $unix_time = strtotime ("now");
        }

        $day_of_week = date("w", $unix_time); // get number of the day of the week
        $day_start_of_week = $unix_time - ($day_of_week * 86400); // get the starts day the of this week
        $day_end_of_week = $day_start_of_week + (7 * 86400); // get the end day the of this week
        for($day= $day_start_of_week; $day < $day_end_of_week; $day += 86400) {
             $aWeek[] = array ( 'day' =>  $day );
         }

        // get all time between time_start and time_end
        for($time = strtotime($time_start),  $max_time = strtotime($time_end) ; $time < $max_time; $time += (15*60)) {
            $aTime[] = $time;
        }


        require(sfConfig::get('sf_app_module_dir')."/icalVisualizador/".sfConfig::get('sf_app_module_lib_dir_name')."/ical_parser.php");


        $aEvent = @icalToArray("/tmp/pepe.ics");


        $nbrGridCols = 1;
        foreach($aEvent as $day) {
            foreach($day as $time) {
                foreach($time as $event) {
                     $nbrGridCols = $this->kgv($nbrGridCols, ($event['event_overlap'] + 1));
                }
            }
        }

        $this->nbrGridCols = $nbrGridCols;
        $this->aEvent = $aEvent;
        $this->aWeek = $aWeek;
        $this->aAllDay = $aAllDay;
        $this->l_calendar = "";
        $this->calendar_name = "XXXX";
        $this->date = $unix_time;
        $this->aTime = $aTime;
    }

}

?>