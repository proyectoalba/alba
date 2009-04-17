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
 * calendario actions
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class calendarioActions extends sfActions
{
  /**
   * Executes index action
   *
   */
    public function executeIndex() {

    }

    public function executeBusquedaDocente() {
        // inicializando variables
        $aDocente  = array();        

        // tomando los datos del formulario
        $txt = $this->getRequestParameter('txt');

/*      $organizacion_id = $this->getUser()->getAttribute('fk_organizacion_id');
        $criteria = new Criteria();
        $criteria->add(DocentePeer::FK_ORGANIZACION_ID, $organizacion_id);
*/
       
        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            // buscando alumnos
            $criteria = new Criteria();
       
            if($txt) {
                $cton1 = $criteria->getNewCriterion(DocentePeer::NOMBRE, "%$txt%", Criteria::LIKE);
                $cton2 = $criteria->getNewCriterion(DocentePeer::APELLIDO, "%$txt%", Criteria::LIKE);
                $cton1->addOr($cton2);
                $criteria->add($cton1);
            }

            $aDocente = DocentePeer::doSelect($criteria);

            if(count($aDocente) == 1) {
                $this->redirect( 'calendario/horarioSegunDocente?id='.$aDocente[0]->getId());
            }
        }

        // asignando variables para ser usadas en el template
        //$this->organizacion_id = $organizacion_id;
        $this->txt = $txt;
        $this->aDocente = $aDocente;
    }

    function getEventos($aRes, $vista) {
        include(sfConfig::get('sf_app_lib_dir')."/miExportadorIcal.class.php");
        $e  = new miExportadorIcal(new sfEventDispatcher());
        $archivo = sfConfig::get('sf_cache_dir')."/".$e->exportar($aRes, 0);
        if($this->getRequestParameter('date')) {
            $date_component = $this->getRequestParameter('date');
        } else {
            $date_component = "";
        }

        $view = $this->getRequestParameter('view', $vista);

        return array($view, $archivo, $date_component);
    }


    public function executeHorarioSegunDocente() {
        // tomando los datos del formulario
        $docente_id = $this->getRequestParameter('id');
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
       
        // Trayendo datos necesarios
        $docente = DocentePeer::retrieveByPK($docente_id);

        //para hora de inicio y hora de fin 
        $aHoras  = $this->getHorarioEscolar($establecimiento_id,0,1);

        // Horarios del Docente
        $criteria = new Criteria();
        $criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $docente_id);
        $aEvento = RelDivisionActividadDocentePeer::doSelect($criteria);

        list($this->view, $this->archivo, $this->date_component) = $this->getEventos($aEvento, "verPorSemana");
        $this->docente = $docente;
    }

    public function executeBusquedaDivision() {
        // inicializando variables
        $aDivision  = array();        

        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('division_id');
        $txt = $this->getRequestParameter('txt');

        // llenando el combo de division segun establecimiento
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
        $criteria = new Criteria();
        $criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        $divisiones = DivisionPeer::doSelectJoinAnio($criteria);
        
        // asignando variables para ser usadas en el template
        $this->aDivision = $divisiones;
    }

    public function executeHorarioSegunDivision() {

        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('id');
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');

        // trayendo datos necesarios
        $division = DivisionPeer::retrieveByPK($division_id);
        $aHoras  = $this->getHorarioEscolar($establecimiento_id, $division->getFkTurnoId() ,1);

        $criteria = new Criteria();
        $criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $division_id);
        $aEvento = RelDivisionActividadDocentePeer::doSelect($criteria);

        list($this->view, $this->archivo, $this->date_component) = $this->getEventos($aEvento, "verPorSemana");        
        
        // asignando variables para ser usadas en el template
        $this->division = $division;
    }

    protected function getHorarioEscolar($establecimiento_id = 0, $turno_id = 0, $orden = 0) {
        $criteria = new Criteria();
        if($establecimiento_id) {
            $criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        }
        if($turno_id) {
            $criteria->add(HorarioescolarPeer::FK_TURNO_ID, $turno_id);
        }

        if($orden) {
            $criteria->addAscendingOrderByColumn(HorarioescolarPeer::FK_TURNO_ID);
        } 

        $horarioescolares = HorarioescolarPeer::doSelect($criteria);
        return $horarioescolares;
    }

    public function handleErrorIndex() {
        $this->redirect('calendario');
    }
}
?>
