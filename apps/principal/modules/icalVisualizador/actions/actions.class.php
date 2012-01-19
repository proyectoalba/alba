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
//         case "month":  $this->view = "verPorDia"; break;
//         case "year": $this->view = "verPorDia"; break;
        default: $this->view = "verPorDia"; 
    }

    // Falta ver porque genera una columna mas y cuando no empieza en punto no grafica las filas hacia la derecha

    $this->archivo = "/tmp/pepe.ics";

  }


}
?>
