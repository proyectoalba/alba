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
 * relDivisionActividadDocente actions.
 *
 * @package    alba
 * @subpackage relDivisionActividadDocente
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: actions.class.php 4492 2007-03-19 14:59:17Z josx $
 * @filesource
 * @license GPL
 */
class relDivisionActividadDocenteActions extends autorelDivisionActividadDocenteActions
{
  public function executeEdit()
  {

    $evento_generico = new miEvento();

    $this->rel_division_actividad_docente = $this->getRelDivisionActividadDocenteOrCreate();
    $this->evento = $evento_generico->getEventoOrCreate($this->rel_division_actividad_docente->getFkEventoId());
    
    if ($this->getRequest()->getMethod() == sfRequest::POST) {

      $this->evento = $evento_generico->updateEventoFromRequest($this->evento, $this->getRequestParameter('evento'), $this->getUser()->getCulture());
      $this->evento->save();
      $this->forward404Unless($this->evento);

      $this->updateRelDivisionActividadDocenteFromRequest($this->evento->getId());
      $this->saveRelDivisionActividadDocente($this->rel_division_actividad_docente);
     
      $this->setFlash('notice', 'Your modifications have been saved');
      if ($this->getRequestParameter('save_and_add')) {
        return $this->redirect('relDivisionActividadDocente/create');
      }
      else if ($this->getRequestParameter('save_and_list')) {
        return $this->redirect('relDivisionActividadDocente/list');
      } else {
        return $this->redirect('relDivisionActividadDocente/edit?id='.$this->rel_division_actividad_docente->getId());
      }
    } else {
      $this->labels = $this->getLabels();
    }
  }

  protected function getLabels()
  {
    return array(
      'rel_division_actividad_docente{fk_division_id}' => 'Divisi&oacute;n:',
      'rel_division_actividad_docente{fk_actividad_id}' => 'Actividad:',
      'rel_division_actividad_docente{fk_docente_id}' => 'Docente:',
      'evento{fecha_inicio}' => 'Fecha inicio:',
      'evento{fecha_fin}' => 'Fecha fin:',
    );
  }


  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->rel_division_actividad_docente = $this->getRelDivisionActividadDocenteOrCreate();
    $this->updateRelDivisionActividadDocenteFromRequest();
    $this->labels = $this->getLabels();
    $this->evento = new Evento();
    return sfView::SUCCESS;
  }


    public function executeExportToIcal() {
        $this->executeList();
        include("miExportadorIcal.class.php");
        $e  = new miExportadorIcal();
        $e->exportar($this->pager->getResults());
    }


    public function executeVerCalendario() {
        $this->executeList();
        include("miExportadorIcal.class.php");
        $e  = new miExportadorIcal();
        $this->archivo = sfConfig::get('app_alba_tmpdir')."/".$e->exportar($this->pager->getResults(), 0);
        if($this->getRequestParameter('date')) {
            $this->date_component = $this->getRequestParameter('date');
        } else {
            $this->date_component = "";
        }

        if($this->getRequestParameter('view')) {
            switch($this->getRequestParameter('view')) {
                case 'week': $this->view = 'verPorSemana'; break;
                case 'day': $this->view = 'verPorDia'; break;
                default: $this->view = 'verPorDia';
            }
        } else {
            $this->view = "verPorDia";
        }
    }


    protected function updateRelDivisionActividadDocenteFromRequest($fk_evento_id = '') {
        $rel_division_actividad_docente = $this->getRequestParameter('rel_division_actividad_docente');
        if (isset($rel_division_actividad_docente['fk_division_id'])) {
            $this->rel_division_actividad_docente->setFkDivisionId($rel_division_actividad_docente['fk_division_id'] ? $rel_division_actividad_docente['fk_division_id'] : null);
        }
        if (isset($rel_division_actividad_docente['fk_actividad_id'])) {
            $this->rel_division_actividad_docente->setFkActividadId($rel_division_actividad_docente['fk_actividad_id'] ? $rel_division_actividad_docente['fk_actividad_id'] : null);
        }
        if (isset($rel_division_actividad_docente['fk_docente_id'])) {
            $this->rel_division_actividad_docente->setFkDocenteId($rel_division_actividad_docente['fk_docente_id'] ? $rel_division_actividad_docente['fk_docente_id'] : null);
        }
        if ($fk_evento_id) {
            $this->rel_division_actividad_docente->setFkEventoId($fk_evento_id);
        } else {
            $this->rel_division_actividad_docente->setFkEventoId(null);
        }


    }


}
?>