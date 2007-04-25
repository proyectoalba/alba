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
 * evento actions
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: actions.class.php 4566 2007-04-25 15:07:43Z josx $
 * @filesource
 * @license GPL
 */

class eventoActions extends sfActions
{

    public function executeIndex() {
        return $this->forward('evento', 'edit');
//         $this->evento = new Evento();
    }


    protected function saveEvento($evento) {
        $evento->save();

    }

    public function executeCreate() {
        return $this->forward('evento', 'edit');
    }


    public function executeEdit() {
        $this->evento = $this->getEventoOrCreate();
        
        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            $this->updateEventoFromRequest();

/*
            $this->saveEvento($this->evento);
            $this->setFlash('notice', 'Your modifications have been saved');
            if ($this->getRequestParameter('save_and_add')) {
                return $this->redirect('evento/create');
            } else if ($this->getRequestParameter('save_and_list')) {
                return $this->redirect('evento/list');
            } else {
                return $this->redirect('evento/edit?id='.$this->evento->getId());
            }
*/

        } else {
//             $this->labels = $this->getLabels();
        }
    }

    public function handleErrorEdit() {
        $this->preExecute();
        $this->evento = $this->getEventoOrCreate();
        $this->updateEventoFromRequest();
//         $this->labels = $this->getLabels();
        return sfView::SUCCESS;
    }


  protected function getEventoOrCreate($id = 'id')  {
    if (!$this->getRequestParameter($id)) {
        $evento = new Evento();
    } else {
      $evento = EventoPeer::retrieveByPk($this->getRequestParameter($id));
      $this->forward404Unless($evento);
    }
    return $evento;
  }




    protected function updateEventoFromRequest() {
        $evento = $this->getRequestParameter('evento');
        print_R($evento);
        $evento_obj = new Evento();
/*
        if(isset($alumno['apellido'])) {
            $evento_obj->setApellido($alumno['apellido']);
        }
        if (isset($alumno['fecha_nacimiento'])) {
            if ($alumno['fecha_nacimiento']) {
                try {
                    $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                    if (!is_array($alumno['fecha_nacimiento'])) {
                        $value = $dateFormat->format($alumno['fecha_nacimiento'], 'I', $dateFormat->getInputPattern('g'));
                    } else {
                        $value_array = $alumno['fecha_nacimiento'];
                        $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
                    }
                    $this->alumno->setFechaNacimiento($value);
                }
                catch (sfException $e) {
                // not a date
                }
            } else {
                $this->alumno->setFechaNacimiento(null);
            }
        }

    $this->alumno->setActivo(isset($alumno['activo']) ? $alumno['activo'] : 0);
*/

    return $evento_obj;
  }


}
?>  