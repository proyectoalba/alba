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
 * legajopedagogico Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class legajopedagogicoActions extends sfActions
{
  /**
   * Executes index action
   *
   */
    public function executeIndex(){
        // inicializando variables
        $optionsDivision = array();
        $aAlumno  = array();        

        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('division_id');
        $txt_apellido = $this->getRequestParameter('txt_apellido');
        $txt_nombre = $this->getRequestParameter('txt_nombre');

        // llenando el combo de division segun establecimiento
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
        $criteria = new Criteria();
        $criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        $divisiones = DivisionPeer::doSelectJoinAnio($criteria);
        $optionsDivision[]  = "";
        foreach($divisiones as $division) {
            $optionsDivision[$division->getId()] = $division->getAnio()->getDescripcion()." ".$division->getDescripcion();
        }
        asort($optionsDivision);
       
        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            // buscando alumnos
            $criteria = new Criteria();
            $criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
            if($division_id) {
                $criteria->add(DivisionPeer::ID, $division_id);
                $criteria->addJoin(RelAlumnoDivisionPeer::FK_ALUMNO_ID, AlumnoPeer::ID);
                $criteria->addJoin(RelAlumnoDivisionPeer::FK_DIVISION_ID, DivisionPeer::ID);
            }
            
            if($txt_apellido) {
                $criteria->add(AlumnoPeer::APELLIDO, "$txt_apellido%", Criteria::LIKE);
            }

            if($txt_nombre) {
                $criteria->add(AlumnoPeer::NOMBRE, "$txt_nombre%", Criteria::LIKE);
            }

            $aAlumno = AlumnoPeer::doSelect($criteria);
        }

        // asignando variables para ser usadas en el template
        $this->optionsDivision = $optionsDivision;
        $this->division_id = $division_id;
        $this->txt_apellido = $txt_apellido;
        $this->txt_nombre = $txt_nombre;
        $this->aAlumno = $aAlumno;
    }

    public function executeVerLegajo() {
        // inicializando variables
        $aEntradaLegajo = array();
        $optionsCategoriaLegajo = array();
        $alumno = "";

        // tomando los datos del formulario
        $alumno_id = $this->getRequestParameter('aid');
        $legajo_categoria_id  = $this->getRequestParameter('cid');
        
        if($alumno_id) {
            $alumno = AlumnoPeer::retrieveByPk($alumno_id);

            //traigo todas los items del legajo para el alumno
            $criteria = new Criteria();
            $criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $alumno_id);
            if($legajo_categoria_id) {
                $criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $legajo_categoria_id);
            }
            $aEntradaLegajo= LegajopedagogicoPeer::doSelect($criteria);
        }

        // lleno en combo de categorias de legajo
        $optionsCategoriaLegajo = $this->getCategorias();

        // asignando variables para ser usadas en el template
        $this->optionsCategoriaLegajo = $optionsCategoriaLegajo;        
        $this->aEntradaLegajo = $aEntradaLegajo;
        $this->alumno  = $alumno;
        $this->legajo_categoria_id  = $legajo_categoria_id;
    }

    protected function getCategorias() {
        $optionsCategoriaLegajo = array();
        $criteria = new Criteria();
        $categoriaLegajos = LegajocategoriaPeer::doSelect($criteria);
        $optionsCategoriaLegajo[]  = "";
        foreach($categoriaLegajos as $categoriaLegajo) {
            $optionsCategoriaLegajo[$categoriaLegajo->getId()] = $categoriaLegajo->getDescripcion();
        }
        asort($optionsCategoriaLegajo);
        return $optionsCategoriaLegajo;    
    }

    public function executeCreate (){
        return $this->forward('legajopedagogico', 'edit');
    }

    public function executeSave (){
        $this->legajopedagogico = $this->getLegajopedagogicoOrCreate();
        $this->updateLegajopedagogicoFromRequest();
        $this->legajopedagogico->setFkUsuarioId($this->getUser()->getAttribute('id'));   // guardo el usuario que hizo esta entrada
        $this->saveLegajopedagogico($this->legajopedagogico);
       
        // adding a attachment
        if($this->getRequest()->getFileName('file')) {
            $mimetype  = $this->getRequest()->getFileType('file');
            $ext = $this->getRequest()->getFileExtension('file');                        
            $realFileName = $this->getRequest()->getFileName('file');       
            $uniqueFileName = uniqid(rand()) . $ext;            
            $this->getRequest()->moveFile('file', sfConfig::get('sf_upload_dir').'/'.$uniqueFileName);
            $adjunto = new Adjunto(); 
            $adjunto->setFecha(date('Y-m-d'));
            $adjunto->setNombreArchivo($realFileName);
            $adjunto->setTipoArchivo($mimetype);     
            $adjunto->setRuta($uniqueFileName);
            $adjunto->save();
            $legajoadjunto = new Legajoadjunto();
            $legajoadjunto->setFkLegajopedagogicoId($this->legajopedagogico->getId());  
            $legajoadjunto->setFkAdjuntoId($adjunto->getId());  
            $legajoadjunto->save(); 
        }

        $this->getUser()->setFlash('notice', 'Your modifications have been saved');
        if ($this->getRequestParameter('save_and_add')) {
            return $this->redirect('legajopedagogico/create?aid='.$this->legajopedagogico->getFkAlumnoId().'&cid='.$this->legajopedagogico->getFkLegajocategoriaId());
        } else  {
            return $this->redirect('legajopedagogico/edit?aid='.$this->legajopedagogico->getFkAlumnoId().'&cid='.$this->legajopedagogico->getFkLegajocategoriaId().'&id='.$this->legajopedagogico->getId());
        }

    }

    public function executeEdit() {
        $this->alumno_id = $this->getRequestParameter('aid');
        $this->legajo_categoria_id  = $this->getRequestParameter('cid');
        $this->optionsCategoriaLegajo = $this->getCategorias();
        $this->legajopedagogico = $this->getLegajopedagogicoOrCreate();
        $this->alumno = AlumnoPeer::retrieveByPk($this->alumno_id);
        $this->aFile = array();

        // buscando los adjuntos de la entrada al legajo pedagogico
        if($this->legajopedagogico->getId()) {
            $criteria = new Criteria();
            $criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->legajopedagogico->getId());
            $criteria->addJoin(LegajoadjuntoPeer::FK_ADJUNTO_ID, AdjuntoPeer::ID);
            $adjuntos = AdjuntoPeer::doSelect($criteria);                        
            $tmpFile = array();
            foreach($adjuntos as $adjunto) {
                array_push($tmpFile,(object) array ( 'id' => $adjunto->getId() ,'nombre_archivo' => $adjunto->getNombreArchivo(), 'ruta' => $adjunto->getRuta()));
            }
            $this->aFile = $tmpFile;
        } 

        // add javascripts
        $this->getResponse()->addJavascript(sfConfig::get('sf_prototype_web_dir').'/js/prototype');
        $this->getResponse()->addJavascript(sfConfig::get('sf_admin_web_dir').'/js/collapse');
    }

    public function handleErrorSave() {
        $this->executeEdit();
        $this->updateLegajopedagogicoFromRequest();
        $this->setTemplate('edit');
        return sfView::SUCCESS;
    }

    protected function saveLegajopedagogico($legajopedagogico) {
        $legajopedagogico->save();
    }

    protected function updateLegajopedagogicoFromRequest() {
        $legajopedagogico= $this->getRequestParameter('legajopedagogico');

        if (isset($legajopedagogico['fk_alumno_id'])) {
            $this->legajopedagogico->setFkAlumnoId($legajopedagogico['fk_alumno_id']);
        }

        if (isset($legajopedagogico['titulo'])) {
            $this->legajopedagogico->setTitulo($legajopedagogico['titulo']);
        }

        if (isset($legajopedagogico['fecha'])) {
            if ($legajopedagogico['fecha']) {
                list($d, $m, $y) = $this->getContext()->getI18N()->getDateForCulture($legajopedagogico['fecha'], $this->getUser()->getCulture());
                $this->legajopedagogico->setFecha("$y-$m-$d");
            } else {
                $this->legajopedagogico->setFecha(null);        
            }
        }

        if (isset($legajopedagogico['resumen'])) {
            $this->legajopedagogico->setResumen($legajopedagogico['resumen']);
        }

        if (isset($legajopedagogico['texto'])) {
            $this->legajopedagogico->setTexto($legajopedagogico['texto']);
        }

        if (isset($legajopedagogico['fk_usuario_id'])) {
            $this->legajopedagogico->setFkUsuarioId($legajopedagogico['fk_usuario_id']);
        }

        if (isset($legajopedagogico['fk_legajocategoria_id'])) {
            $this->legajopedagogico->setFkLegajocategoriaId($legajopedagogico['fk_legajocategoria_id']);
        }
    }

    protected function getLegajopedagogicoOrCreate($id = 'id') {
        if (!$this->getRequestParameter('id', 0)) {
            $legajopedagogico = new Legajopedagogico();
        } else {
            $legajopedagogico= LegajopedagogicoPeer::retrieveByPk($this->getRequestParameter($id));
            $this->forward404Unless($legajopedagogico);
        }
        return $legajopedagogico;
    }

    public function executeDelete(){
        $alumno_id = $this->getRequestParameter('aid');
        $legajo_categoria_id  = $this->getRequestParameter('cid');
        $this->legajopedagogico = LegajopedagogicoPeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($this->legajopedagogico);
        $this->deleteLegajopedagogico($this->legajopedagogico);
        return $this->redirect("legajopedagogico/verLegajo?aid=".$alumno_id."&cid=".$legajo_categoria_id);
    }

    protected function deleteLegajopedagogico($legajopedagogico){
        $legajopedagogico->delete();
    }

    public function executeBorrarAdjunto() {
        $this->alumno_id = $this->getRequestParameter('aid');
        $this->legajopedagogico_id = $this->getRequestParameter('id');
        $this->adjunto_id  = $this->getRequestParameter('ajid');
        
        $adjunto = AdjuntoPeer::retrieveByPk($this->adjunto_id);
        unlink(sfConfig::get('sf_upload_dir')."/".$adjunto->getRuta());        
        $adjunto->delete();

        $criteria = new Criteria();
        $criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->legajopedagogico_id);
        $criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->adjunto_id);
        $adjuntos = LegajoadjuntoPeer::doDelete($criteria);  

        return $this->redirect("legajopedagogico/edit?aid=".$this->alumno_id."&id=".$this->legajopedagogico_id);
    }

    public function executeAutocompletarApe() {
        $txt_apellido = $this->getRequestParameter('txt_apellido');
        $criteria = new Criteria();
        $criteria->add(AlumnoPeer::APELLIDO, "$txt_apellido%", Criteria::LIKE);
        $alumnos = AlumnoPeer::doSelect($criteria);
        $this->forward404Unless($alumnos);

        $this->aAlumno = $alumnos;
    }

    public function executeAutocompletarNom() {
        $txt_nombre = $this->getRequestParameter('txt_nombre');
        $criteria = new Criteria();
        $criteria->add(AlumnoPeer::NOMBRE, "$txt_nombre%", Criteria::LIKE);
        $alumnos = AlumnoPeer::doSelect($criteria);
        $this->forward404Unless($alumnos);
        $this->aAlumno = $alumnos;
    }
}
?>
