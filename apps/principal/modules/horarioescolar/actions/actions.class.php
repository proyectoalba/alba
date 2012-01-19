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
 * horarioescolar Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class horarioescolarActions extends autohorarioescolarActions
{

    public function executeEdit($request)
    {
        $evento_generico = new miEvento(new sfEventDispatcher());
        $this->horarioescolar = $this->getHorarioescolarOrCreate();
        $this->evento = $evento_generico->getEventoOrCreate($this->horarioescolar->getFkEventoId());
        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            $evento = $this->getRequestParameter('evento');
            if($evento['fecha_inicio'] AND $evento['fecha_fin']) {
                $e = $this->getRequestParameter('evento');
                $h = $this->getRequestParameter('horarioescolar');
                $e['titulo'] = $h["nombre"];
                $this->evento = $evento_generico->updateEventoFromRequest($this->evento, $e, $this->getUser()->getCulture());
                $this->evento->save();
                $this->forward404Unless($this->evento);
                $this->updateHorarioescolarFromRequest($this->evento->getId());
            } else {
                $this->updateHorarioescolarFromRequest($this->evento->getId());
            }
            $this->saveHorarioescolar($this->horarioescolar);
            $this->getUser()->setFlash('notice', 'Your modifications have been saved');
            if ($this->getRequestParameter('save_and_add')) {
                return $this->redirect('horarioescolar/create');
            } else if ($this->getRequestParameter('save_and_list')) {
                return $this->redirect('horarioescolar/list');
            } else {
                return $this->redirect('horarioescolar/edit?id='.$this->horarioescolar->getId());
            }
        } else {
            $this->labels = $this->getLabels();
        }
    }

    protected function updateHorarioescolarFromRequest($fk_evento_id = '') {
        $horarioescolar = $this->getRequestParameter('horarioescolar');

        if ($fk_evento_id) {
            $this->horarioescolar->setFkEventoId($fk_evento_id);
        } else {
            $this->horarioescolar->setFkEventoId(null);
        }

        if (isset($horarioescolar['nombre'])) {
            $this->horarioescolar->setNombre($horarioescolar['nombre']);
        }

        if (isset($horarioescolar['descripcion'])) {
            $this->horarioescolar->setDescripcion($horarioescolar['descripcion']);
        }

        if (isset($horarioescolar['fk_horarioescolartipo_id'])) {
            $this->horarioescolar->setFkHorarioescolartipoId($horarioescolar['fk_horarioescolartipo_id']);
        }

        if (isset($horarioescolar['fk_establecimiento_id'])) {
            $this->horarioescolar->setFkEstablecimientoId($horarioescolar['fk_establecimiento_id']);
        }

        if (isset($horarioescolar['fk_turno_id'])) {
            $this->horarioescolar->setFkTurnoId($horarioescolar['fk_turno_id']);
        }
    }


    function addFiltersCriteria($c) {
        $c->add(horarioescolarPeer::FK_ESTABLECIMIENTO_ID,$this->getUser()->getAttribute('fk_establecimiento_id'));
    }


    function saveHorarioescolar($horarioescolar) {
        $horarioescolar->setFkEstablecimientoId($this->getUser()->getAttribute('fk_establecimiento_id'));
        $horarioescolar->save();
    }


    public function executeExportToIcal() {
        $this->executeList();
        include(sfConfig::get('sf_app_lib_dir')."/miExportadorIcal.class.php");
        $e  = new miExportadorIcal(new sfEventDispatcher());
        $e->exportar($this->pager->getResults());
    }


    public function executeVerCalendario() {
        $this->executeList();
        include(sfConfig::get('sf_app_lib_dir')."/miExportadorIcal.class.php");
        $e  = new miExportadorIcal(new sfEventDispatcher());
        $this->archivo = sfConfig::get('sf_cache_dir')."/".$e->exportar($this->pager->getResults(), 0);
        if($this->getRequestParameter('date')) {
            $this->date_component = $this->getRequestParameter('date');
        } else {
            $this->date_component = "";
        }
 	    $this->view = $this->getRequestParameter('view','verPorDia');
    }



    protected function getLabels() {
        return array(
        'horarioescolar{nombre}' => 'Nombre:',
        'horarioescolar{descripcion}' => 'Descripcion:',
        'horarioescolar{fk_horarioescolartipo_id}' => 'Tipo Horario Escolar:',
        'horarioescolar{fk_turno_id}' => 'Turno:',
        'horarioescolar{fk_evento_id}' => 'Evento:',
        'evento{fecha_inicio}' => 'Fecha inicio:',
        'evento{fecha_fin}' => 'Fecha fin:',
        'evento{hora_inicio}' => 'Hora inicio:',
        'evento{hora_fin}' => 'Hora fin:',

        );
    }


    public function handleErrorEdit() {
        $this->preExecute();
        $this->horarioescolar = $this->getHorarioescolarOrCreate();
        $evento_generico = new miEvento();
        $this->evento = $evento_generico->getEventoOrCreate($this->horarioescolar->getFkEventoId());
        $this->evento = $evento_generico->updateEventoFromRequest($this->evento, $this->getRequestParameter('evento'), $this->getUser()->getCulture());
        $this->updateHorarioescolarFromRequest($this->evento->getId());
//print_R($this->evento);
        $this->labels = $this->getLabels();
        return sfView::SUCCESS;
    }
}
?>
