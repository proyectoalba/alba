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
//     $this->date_component = "20070407";


    $this->archivo = "/tmp/pepe.ics";

    $this->date_component="20070404";
  }


}
?>