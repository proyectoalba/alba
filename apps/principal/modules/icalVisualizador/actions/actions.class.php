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

    $date = $this->getRequestParameter("date");
    $view = $this->getRequestParameter("view");

    if(!$date) {
        $this->date_component="20070404";
    } else {
        $this->date_component = $date;
    }

    switch($view) {
        case "day": $this->view = "verPorDia";  break;
        case "week": $this->view = "verPorSemana"; break;
        case "month":  $this->view = "verPorDia"; break;
        case "year": $this->view = "verPorDia"; break;
        default: $this->view = "verPorDia"; 
    }

    // falta ver en el calendario mensual:

    // de juntar la actuales dos
    // partes donde se cicla por 4 trs y luego por cada dia de toda la semana
    // Esto es por no poder discriminar entre en los que hay eventos o no previamente

    // Además incorporar el tema de que funcione para todos los dias de la semana (no solo para el primero)

    // También considerar si no empiezan en punto.
    


    $this->archivo = "/tmp/pepe.ics";

  }


}
?>