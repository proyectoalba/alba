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
 * docenteHorario Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class DocenteHorarioActions extends sfActions
{

  public function executeIndex ()
  {
    return $this->forward('docenteHorario', 'list');
  }

  public function executeList ()
  {

    $optionsDocente = array();
    $aHorario = array();

    $c = new Criteria();
    $aDocente  = DocentePeer::doSelect($c);
    $optionsDocente = array();
    foreach($aDocente as $docente) {
        $optionsDocente[$docente->getId()] = $docente->getApellido().' '.$docente->getNombre();
    }

    if(count($optionsDocente) > 0) {
        $docente_id = ($this->getRequestParameter('idDocente')) ? $this->getRequestParameter('idDocente') : key($optionsDocente) ;
    } else {
        // error si no tiene docente_id y no hay cargados docentes.
    }

    $c = new Criteria();
    $c->add(DocenteHorarioPeer::FK_DOCENTE_ID, $docente_id);
    $aHorario  = DocenteHorarioPeer::doSelect($c);

    $this->aHorario = $aHorario;
    $this->optionsDocente = $optionsDocente;

  }

    public function executeDeleteHorario ()  {
//         $this->docenteHorario = DocenteHorarioPeer::retrieveByPk( array( $this->getRequestParameter('idDocente'), $this->getRequestParameter('idEvento')));
        $c = new Criteria();
        $c->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->getRequestParameter('idDocente'));
        $c->add(DocenteHorarioPeer::FK_EVENTO_ID, $this->getRequestParameter('idEvento'));
        $this->docenteHorario = DocenteHorarioPeer::doSelectOne($c);
        $this->forward404Unless($this->docenteHorario);
        $idDocente = $this->docenteHorario->getFkDocenteId();
        $link = 'docenteHorario/list?idDocente='.$idDocente;
        try {
            $this->docenteHorario->delete();
        }
        catch (PropelException $e) {
            $this->getRequest()->setError('delete', 'Could not delete the selected Docente Horario. Make sure it does not have any associated items.');
            return $this->redirect($link);
        }
        return $this->redirect($link);
    }


  protected function saveDocenteHorario($docenteHorario)
  {
    $docenteHorario->save();

  }

  protected function deleteDocenteHorario($docenteHorario)
  {
    $docenteHorario->delete();
  }


  protected function getDocenteHorarioOrCreate($id = 'idDocente', $id2 = 'idEvento')
  {
    if (!$this->getRequestParameter($id2))    {
        $docenteHorario = new DocenteHorario();
    } else { 
        $c = new Criteria();
        $c->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->getRequestParameter($id));
        $c->add(DocenteHorarioPeer::FK_EVENTO_ID, $this->getRequestParameter($id2));
        $docenteHorario = DocenteHorarioPeer::doSelectOne($c);
// Esta linea de aca abajo deberia funcionar pero da un error no se si es del propel o que
//         $docenteHorario = DocenteHorarioPeer::retrieveByPK(array($this->getRequestParameter($id2), $this->getRequestParameter($id)) );
        $this->forward404Unless($docenteHorario);
    }

    return $docenteHorario;
  }


  public function executeSave()
  {
    return $this->forward('docenteHorario', 'edit');
  }


  public function executeEdit()
  {
    $this->docente = DocentePeer::retrieveByPk($this->getRequestParameter('idDocente'));
    $this->docenteHorario = $this->getDocenteHorarioOrCreate();

    $evento_generico = new miEvento(new sfEventDispatcher());
    $this->evento = $evento_generico->getEventoOrCreate($this->docenteHorario->getFkEventoId());

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
        $this->evento = $evento_generico->updateEventoFromRequest($this->evento, $this->getRequestParameter('evento'), $this->getUser()->getCulture());
        $this->evento->save();
        $this->forward404Unless($this->evento);
        $this->updateDocenteHorarioFromRequest($this->evento->getId());
 

        $this->saveDocenteHorario($this->docenteHorario);
        $this->getUser()->setFlash('notice', 'Your modifications have been saved');

        if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('docenteHorario/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('docenteHorario/list');
      }
      else
      {
        return $this->redirect('docenteHorario/edit?idDocente='.$this->docenteHorario->getFkDocenteId().'&idEvento='.$this->docenteHorario->getFkEventoId());
      }
    }
    else
    {
       $this->labels = $this->getLabels();
    }

  }

  protected function updateDocenteHorarioFromRequest($fk_evento_id = '')  {
    $docenteHorario = $this->getRequestParameter('docente_horario');

    if ($fk_evento_id) {
            $this->docenteHorario->setFkEventoId($fk_evento_id);
    } else {
            $this->docenteHorario->setFkEventoId(null);
    }

//     if (isset($docenteHorario['fk_evento_id'])) {
//         $this->docenteHorario->setFkEventoId($docenteHorario['fk_evento_id'] ? $docenteHorario['fk_evento_id'] : null);
//     }

    if (isset($docenteHorario['fk_docente_id'])) {
        $this->docenteHorario->setFkDocenteId($docenteHorario['fk_docente_id'] ? $docenteHorario['fk_docente_id'] : null);
    }
  }


  protected function getLabels()  {
    return array(
      'docente_horario{fk_docente_id}' => 'Docente:',
      'docente_horario{fk_evento_id}' => 'Evento:',
      'evento{fecha_inicio}' => 'Fecha inicio:',
      'evento{fecha_fin}' => 'Fecha fin:',
      'evento{hora_inicio}' => 'Hora inicio:',
      'evento{hora_fin}' => 'Hora fin:',      
    );
  }


    public function handleErrorEdit() {
        $this->preExecute();
        $this->docenteHorario = $this->getDocenteHorarioOrCreate();
        $this->docente = DocentePeer::retrieveByPk($this->getRequestParameter('docente_horario[fk_docente_id]'));
        $evento_generico = new miEvento(new sfEventDispatcher());
        $this->evento = $evento_generico->getEventoOrCreate($this->docenteHorario->getFkEventoId());
        $this->evento = $evento_generico->updateEventoFromRequest($this->evento, $this->getRequestParameter('evento'), $this->getUser()->getCulture());
        $this->updateDocenteHorarioFromRequest($this->evento->getId());
        $this->labels = $this->getLabels();
        return sfView::SUCCESS;
    }
                                                                     



}

?>
