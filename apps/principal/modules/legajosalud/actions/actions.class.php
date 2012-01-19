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
 * legajosalud Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 * @filesource
 * @license GPL
 */

class legajosaludActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */

    public function executeVerLegajo() {
        // inicializando variables
        $aEntradaLegajo = array();
        $alumno = "";

        // tomando los datos del formulario
        $alumno_id = $this->getRequestParameter('aid');
        
        if($alumno_id) {
            $alumno = AlumnoPeer::retrieveByPk($alumno_id);

            //traigo todas los items del legajo para el alumno
            $criteria = new Criteria();
            $criteria->add(LegajosaludPeer::FK_ALUMNO_ID, $alumno_id);
            $aEntradaLegajo= LegajosaludPeer::doSelect($criteria);
        }


        // asignando variables para ser usadas en el template
        $this->aEntradaLegajo = $aEntradaLegajo;
        $this->alumno  = $alumno;
    }

    public function executeCreate (){
        return $this->forward('legajosalud', 'edit');
    }

    public function executeSave ($request){
        $this->legajosalud = $this->getLegajosaludOrCreate();
        $this->updateLegajosaludFromRequest();
        $this->legajosalud->setFkUsuarioId($this->getUser()->getAttribute('id'));   // guardo el usuario que hizo esta entrada
        $this->saveLegajosalud($this->legajosalud);
       
        $this->getUser()->setFlash('notice', 'Your modifications have been saved');
        if ($this->getRequestParameter('save_and_add')) {
            return $this->redirect('legajosalud/create?aid='.$this->legajosalud->getFkAlumnoId());
        } else  {
            return $this->redirect('legajosalud/edit?aid='.$this->legajosalud->getFkAlumnoId().'&id='.$this->legajosalud->getId());
        }

    }

    public function executeEdit() {
        $this->alumno_id = $this->getRequestParameter('aid');
        $this->legajosalud = $this->getLegajosaludOrCreate();
        $this->alumno = AlumnoPeer::retrieveByPk($this->alumno_id);

        // add javascripts
        $this->getResponse()->addJavascript(sfConfig::get('sf_prototype_web_dir').'/js/prototype');
        $this->getResponse()->addJavascript(sfConfig::get('sf_admin_web_dir').'/js/collapse');
    }

    public function handleErrorSave() {
        $this->executeEdit();
        $this->updateLegajosaludFromRequest();
        $this->setTemplate('edit');
        return sfView::SUCCESS;
    }

    protected function saveLegajosalud($legajosalud) {
        $legajosalud->save();
    }

    protected function updateLegajosaludFromRequest() {
        $legajosalud = $this->getRequestParameter('legajosalud');

        if (isset($legajosalud['fk_alumno_id'])) {
            $this->legajosalud->setFkAlumnoId($legajosalud['fk_alumno_id']);
        }

        if (isset($legajosalud['titulo'])) {
            $this->legajosalud->setTitulo($legajosalud['titulo']);
        }

        if (isset($legajosalud['fecha'])) {
            if ($legajosalud['fecha']) {
                list($d, $m, $y) = $this->getContext()->getI18N()->getDateForCulture($legajosalud['fecha'], $this->getUser()->getCulture());
                $this->legajosalud->setFecha("$y-$m-$d");
            } else {
                $this->legajosalud->setFecha(null);        
            }
        }

        if (isset($legajosalud['descripcion'])) {
            $this->legajosalud->setDescripcion($legajosalud['descripcion']);
        }

        if (isset($legajopedagogico['fk_usuario_id'])) {
            $this->legajopedagogico->setFkUsuarioId($legajopedagogico['fk_usuario_id']);
        }
    }

    protected function getLegajosaludOrCreate($id = 'id') {
        if (!$this->getRequestParameter('id', 0)) {
            $legajosalud = new Legajosalud();
        } else {
            $legajosalud = LegajosaludPeer::retrieveByPk($this->getRequestParameter($id));
            $this->forward404Unless($legajosalud);
        }
        return $legajosalud;
    }

    public function executeDelete(){
        $alumno_id = $this->getRequestParameter('aid');
        $this->legajosalud = LegajosaludPeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($this->legajosalud);
        $this->deleteLegajosalud($this->legajosalud);
        return $this->redirect("legajosalud/verLegajo?aid=".$alumno_id);
    }

    protected function deleteLegajosalud($legajosalud){
        $legajosalud->delete();
    }


}
