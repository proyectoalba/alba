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

        $aEvent['20070508'] = array(

            "1600" => array ( "xxx1" =>  array(
                            "event_start" => 1600,
                            "event_end" => 2200,
                            "start_unixtime" => 117864000,
                            "end_unixtime" => 1178661600,
                            "event_text" => "Primer",
                            "event_length" => 17900,
                            "event_overlap" => 2,
                            "description" => "Horas+de+maestro%2Fprofesor",
                            "status" => '',
                            "class" => "PUBLIC",
                            "spans_day" => '',
                            "location" => '',
                            "organizer" => "a:0:{}",
                            "attendee" => "a:0:{}",
                            "calnumber" => 1,
                            "calname" => 20070608153450,
                            "url" => '',
                                                ),
),







            "1700" => array ( "xxx1" =>  array(
                            "event_start" => 1700,
                            "event_end" => 2200,
                            "start_unixtime" => 1178643600,
                            "end_unixtime" => 1178661600,
                            "event_text" => "Primer",
                            "event_length" => 17900,
                            "event_overlap" => 2,
                            "description" => "Horas+de+maestro%2Fprofesor",
                            "status" => '',
                            "class" => "PUBLIC",
                            "spans_day" => '',
                            "location" => '',
                            "organizer" => "a:0:{}",
                            "attendee" => "a:0:{}",
                            "calnumber" => 1,
                            "calname" => 20070608153450,
                            "url" => '',
                                                ),
"xxx44" =>  array(
                            "event_start" => 1700,
                            "event_end" => 2200,
                            "start_unixtime" => 1178643600,
                            "end_unixtime" => 1178661600,
                            "event_text" => "Primer",
                            "event_length" => 17900,
                            "event_overlap" => 2,
                            "description" => "Horas+de+maestro%2Fprofesor",
                            "status" => '',
                            "class" => "PUBLIC",
                            "spans_day" => '',
                            "location" => '',
                            "organizer" => "a:0:{}",
                            "attendee" => "a:0:{}",
                            "calnumber" => 1,
                            "calname" => 20070608153450,
                            "url" => '',
                                                ),





                            ),



          "1300" => array ( "xxx2" =>  array(
                            "event_start" => 1300,
                            "event_end" => 1400,
                            "start_unixtime" => 1181307600,
                            "end_unixtime" => 1181311200,
                            "event_text" => "JOSX",
                            "event_length" => 3600,
                            "event_overlap" => 2,
                            "description" => "Horas",
                            "status" => '',
                            "class" => "PUBLIC",
                            "spans_day" => '',
                            "location" => '',
                            "organizer" => "a:0:{}",
                            "attendee" => "a:0:{}",
                            "calnumber" => 1,
                            "calname" => 20070608153450,
                            "url" => '',
                                                ),
/*"xxx3" =>  array(
                            "event_start" => 1300,
                            "event_end" => 1400,
                            "start_unixtime" => 1181307600,
                            "end_unixtime" => 1181311200,
                            "event_text" => "JOSX",
                            "event_length" => 3600,
                            "event_overlap" => 2,
                            "description" => "Horas+de+maestro%2Fprofesor",
                            "status" => '',
                            "class" => "PUBLIC",
                            "spans_day" => '',
                            "location" => '',
                            "organizer" => "a:0:{}",
                            "attendee" => "a:0:{}",
                            "calnumber" => 1,
                            "calname" => 20070608153450,
                            "url" => '',
                                                ),*/
"xxx5" =>  array(
                            "event_start" => 1300,
                            "event_end" => 1400,
                            "start_unixtime" => 1181307600,
                            "end_unixtime" => 1181311200,
                            "event_text" => "JOSX",
                            "event_length" => 3600,
                            "event_overlap" => 2,
                            "description" => "Horas+de+maestro%2Fprofesor",
                            "status" => '',
                            "class" => "PUBLIC",
                            "spans_day" => '',
                            "location" => '',
                            "organizer" => "a:0:{}",
                            "attendee" => "a:0:{}",
                            "calnumber" => 1,
                            "calname" => 20070608153450,
                            "url" => '',
                                                )
                            ),

          "1245" => array ( "xxx2" =>  array(
                            "event_start" => 1245,
                            "event_end" => 1400,
                            "start_unixtime" => 1181306700,
                            "end_unixtime" => 1181311200,
                            "event_text" => "JOSX",
                            "event_length" => 3600,
                            "event_overlap" => 2,
                            "description" => "Horas",
                            "status" => '',
                            "class" => "PUBLIC",
                            "spans_day" => '',
                            "location" => '',
                            "organizer" => "a:0:{}",
                            "attendee" => "a:0:{}",
                            "calnumber" => 1,
                            "calname" => 20070608153450,
                            "url" => '',
                                                )),



        );

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


/*
[20070510] => Array
        (
            [1400] => Array
                (
                    [20070608T153450CEST-njzdXfKppU@192.168.1.20] => Array
                        (
                            [event_start] => 1400
                            [event_end] => 1500
                            [start_unixtime] => 1178805600
                            [end_unixtime] => 1178809200
                            [event_text] => S%C3%83%C2%A9ptimo+Grado+B-Formaci%C3%83%C2%B3n+%C3%83%C2%A9tica+y+ciudadana.-222222222222+2222222222222
                            [event_length] => 3600
                            [event_overlap] => 0
                            [description] => Horas+de+maestro%2Fprofesor
                            [status] => 
                            [class] => PUBLIC
                            [spans_day] => 
                            [location] => 
                            [organizer] => a:0:{}
                            [attendee] => a:0:{}
                            [calnumber] => 1
                            [calname] => 20070608153450
                            [url] => 
                            [recur] => Array
                                (
                                    [FREQ] => daily
                                    [INTERVAL] => 1
                                    [UNTIL] => 30 de Diciembre
                                )

                        )

                )
*/





?>