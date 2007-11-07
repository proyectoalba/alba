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
 * informes actions
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: actions.class.php 4099 2007-01-29 18:59:24Z josx $
 * @filesource
 * @license GPL
 */

class InformesActions extends sfActions
{

  public function executeIndex()
  {
    return $this->forward('informes', 'list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/informes/filters');

    // pager
    $this->pager = new sfPropelPager('Informe', 10);
    $c = new Criteria();
    $this->addSortCriteria($c);
//     $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function executeCreate()
  {
    return $this->forward('informes', 'edit');
  }

  public function executeSave()
  {
    return $this->forward('informes', 'edit');
  }

  public function executeEdit()
  {
    $this->informe = $this->getInformeOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
        $this->updateInformeFromRequest();

        if($this->getRequest()->getFileName('file')) {
            $mimetype  = $this->getRequest()->getFileType('file');
            $ext = substr($this->getRequest()->getFileName('file'),strrpos($this->getRequest()->getFileName('file'),'.'));
            $realFileName = $this->getRequest()->getFileName('file');
            $uniqueFileName = uniqid(rand()) . $ext;
            $this->getRequest()->moveFile('file', sfConfig::get('sf_informe_dir').'/'.$uniqueFileName);
            $adjunto = new Adjunto(); 
            $adjunto->setFecha(date('Y-m-d'));
            $adjunto->setNombreArchivo($realFileName);
            $adjunto->setTipoArchivo($mimetype);     
            $adjunto->setRuta($uniqueFileName);
            $adjunto->save();
            $this->informe->setFkAdjuntoId($adjunto->getId());
            $this->saveInforme($this->informe);
        }


      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('informes/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('informes/list');
      }
      else
      {
        return $this->redirect('informes/edit?id='.$this->informe->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->informe = InformePeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->informe);

    try
    {
      unlink(sfConfig::get('sf_informe_dir')."/".$this->informe->getAdjunto()->getRuta());
      $adjunto_id = $this->informe->getFkAdjuntoId();
      $this->deleteInforme($this->informe);
      $adjunto = AdjuntoPeer::retrieveByPk($adjunto_id);
      $adjunto->delete();
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected informe. Make sure it does not have any associated items.');
      return $this->forward('informes', 'list');
    }

    return $this->redirect('informes/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->informe = $this->getInformeOrCreate();
    $this->updateInformeFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveInforme($informe)
  {
    $informe->save();

  }

  protected function deleteInforme($informe)
  {
    $informe->delete();
  }

  protected function updateInformeFromRequest()
  {
    $informe = $this->getRequestParameter('informe');

    if (isset($informe['variables']))
    {
      $this->informe->setVariables($informe['variables']);
    }

    if (isset($informe['descripcion']))
    {
      $this->informe->setDescripcion($informe['descripcion']);
    }

    if (isset($informe['nombre']))
    {
      $this->informe->setNombre($informe['nombre']);
    }

    $this->informe->setListado(isset($informe['listado']) ? $informe['listado'] : 0);

    if (isset($informe['fk_adjunto_id']))
    {
    $this->informe->setFkAdjuntoId($informe['fk_adjunto_id'] ? $informe['fk_adjunto_id'] : null);
    }

    if (isset($informe['fk_tipoinforme_id']))
    {
    $this->informe->setFkTipoinformeId($informe['fk_tipoinforme_id'] ? $informe['fk_tipoinforme_id'] : null);
    }

  }

  protected function getInformeOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $informe = new Informe();
    }
    else
    {
      $informe = InformePeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($informe);
    }

    return $informe;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $filters = $this->getRequestParameter('filters');

      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/informes/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/informes/filters');
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/informes/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/alumno/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/informes/sort'))
    {
    }
  }

/*
  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['nombre_apellido_is_empty']))
    {
      $criterion = $c->getNewCriterion(AlumnoPeer::NOMBRE_APELLIDO, '');
      $criterion->addOr($c->getNewCriterion(AlumnoPeer::NOMBRE_APELLIDO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nombre_apellido']) && $this->filters['nombre_apellido'] !== '')
    {
      $c->add(AlumnoPeer::NOMBRE_APELLIDO, $this->filters['nombre_apellido']);
    }
    if (isset($this->filters['division_is_empty']))
    {
      $criterion = $c->getNewCriterion(AlumnoPeer::DIVISION, '');
      $criterion->addOr($c->getNewCriterion(AlumnoPeer::DIVISION, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['division']) && $this->filters['division'] !== '')
    {
      $c->add(AlumnoPeer::DIVISION, $this->filters['division']);
    }
    if (isset($this->filters['nro_documento_is_empty']))
    {
      $criterion = $c->getNewCriterion(AlumnoPeer::NRO_DOCUMENTO, '');
      $criterion->addOr($c->getNewCriterion(AlumnoPeer::NRO_DOCUMENTO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nro_documento']) && $this->filters['nro_documento'] !== '')
    {
      $c->add(AlumnoPeer::NRO_DOCUMENTO, strtr($this->filters['nro_documento'], '*', '%'), Criteria::LIKE);
    }
  }
*/
  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/informes/sort'))
    {
      $sort_column = InformePeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/informes/sort') == 'asc')
      {
        $c->addAscendingOrderByColumn($sort_column);
      }
      else
      {
        $c->addDescendingOrderByColumn($sort_column);
      }
    }
  }

  protected function getLabels()
  {
    return array(
      'informe{descripcion}' => 'Descripci&oacute;n:',
      'informe{nombre}' => 'Nombre:',
      'informe{listado}' => '¿Es un Listado?:',
      'informe{fk_tipoinforme_id}' => 'Tipo de Informe:',
      'informe{fk_adjunto_id}' => 'Plantilla del informe:',
      'informe{variables}' => 'Variables:',
      'file' => 'Plantilla del informe :',
    );
  }

    public function executeBorrarAdjunto() {
        $id = $this->getRequestParameter('id');
        $this->forward404Unless($id);
        $informe = InformePeer::retrieveByPk($id);
        $informe->setFkAdjuntoId();
        $informe->save();
        $adjunto = AdjuntoPeer::retrieveByPk($informe->getFkAdjuntoId());
        unlink(sfConfig::get('sf_informe_dir')."/".$adjunto->getRuta());
        $adjunto->delete();
        return $this->redirect("informes?action=edit&id=".$id);
    }


    public function executeBusqueda() {
        $informe = InformePeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($informe);
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');

        switch($informe->getTipoInforme()->getNombre()) {
            case 'Alumnos': 
                if($informe->getListado() != 1) {
                    $this->redirect('informes/busquedaAlumnos?id='.$informe->getId()); break;
                } else {
                    $this->redirect('informes/busquedaListadoAlumnos?id='.$informe->getId()); break;
                }
            default: $this->redirect('informes/busquedaAlumnos?id='.$informe->getId());
        }
    }



    public function executeMostrar() {
        $informe = InformePeer::retrieveByPk($this->getRequestParameter('id'));

        $this->forward404Unless($informe);
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');

        if($informe->getVariables() AND $this->getRequestParameter('v')!= 1) {
            $this->redirect('informes/variables?id='.$informe->getId().'&alumno_id='.$this->getRequestParameter('alumno_id'));
        } else {
            $aDato = array();
            switch($informe->getTipoInforme()->getNombre()) {
                case 'Alumnos': 

                            if($informe->getListado() == 1) {

                                $division_id = $this->getRequestParameter('division_id');
                                $d = DivisionPeer::retrieveByPK($division_id);
                                $aDato['division'] = $d->toArrayInforme();

                                // buscando alumnos
                                $criteria = new Criteria();
                                $criteria->add(DivisionPeer::ID, $division_id);
                                $criteria->addJoin(RelAlumnoDivisionPeer::FK_ALUMNO_ID, AlumnoPeer::ID);
                                $criteria->addJoin(RelAlumnoDivisionPeer::FK_DIVISION_ID, DivisionPeer::ID);
                                $criteria->addAscendingOrderByColumn(AlumnoPeer::APELLIDO);
                                $alumnos = AlumnoPeer::doSelect($criteria);

                                foreach($alumnos as $alumno) {
                                    $aDato['alumno'][] = $alumno->toArrayInforme();
                                }
                            } else {

                                $alumno = AlumnoPeer::retrieveByPk($this->getRequestParameter('alumno_id'));
                                $aDato['alumno'] = $alumno->toArrayInforme();

                                $establecimiento = EstablecimientoPeer::retrieveByPk($establecimiento_id);
                                $aDato['establecimiento'] = $establecimiento->toArrayInforme();

                                $c = new Criteria();
                                $c->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $alumno->getId());
                                $relAlumnoDivision = RelAlumnoDivisionPeer::doSelectOne($c);
                                $d = $relAlumnoDivision->getDivision();
                                $aDato['division'] = $d->toArrayInforme();

                                $aDato['informe'] = $informe->toArray();

                                $ciclolectivo_id = $this->getUser()->getAttribute('fk_ciclolectivo_id');
                                $ciclolectivo = CiclolectivoPeer::retrieveByPk($ciclolectivo_id);
                                $aDato['ciclolectivo'] = $ciclolectivo->toArray();

                            }

                            if($informe->getVariables()) {
                                $aDato['variable'] = array();
                                $variables = explode(";",$informe->getVariables());
                                foreach($variables as $variable) {
                                    $aDato['variable'] = array_merge( $aDato['variable'], array ( $variable => $this->getRequestParameter($variable)));
                                }
                            }

                            break;

                default: $this->forward404();
            }
        }

        $this->reporteTBSOO($informe->getAdjunto()->getRuta(), $informe->getTipoInforme()->getNombre(), $aDato);
        return sfview::NONE;
    }


    public function executeVariables() {
        $informe = InformePeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($informe);

        $alumno = AlumnoPeer::retrieveByPk($this->getRequestParameter('alumno_id'));
        $this->forward404Unless($alumno);

        $this->variables = explode(";",$informe->getVariables());
        $this->alumno = $alumno;
        $this->informe = $informe;
    }


    public function executeBusquedaListadoAlumnos() {
        $informe = InformePeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($informe);

        // inicializando variables
        $optionsDivision = array();
        
        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('division_id');

        // llenando el combo de division segun establecimiento
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
        $optionsDivision = $this->_getDivisiones($establecimiento_id);

        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            $this->redirect('informes/mostrar?id='.$informe->getId()."&division_id=".$division_id);
        }

        // asignando variables para ser usadas en el template
        $this->optionsDivision = $optionsDivision;
        $this->division_id = $division_id;
        $this->informe = $informe;
    }


    public function executeBusquedaAlumnos() {
        $informe = InformePeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($informe);

        // inicializando variables
        $optionsDivision = array();
        $aAlumno  = array();        

        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('division_id');
        $txt = $this->getRequestParameter('txt');

        // llenando el combo de division segun establecimiento
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
        $optionsDivision = $this->_getDivisiones($establecimiento_id);

        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            $aAlumno = $this->_getAlumnosPorDivision($division_id, $txt);             // buscando alumnos
        }

        // asignando variables para ser usadas en el template
        $this->optionsDivision = $optionsDivision;
        $this->division_id = $division_id;
        $this->txt = $txt;
        $this->aAlumno = $aAlumno;
        $this->informe = $informe;
    }


    private function reporteTBSOO($archivo, $tipoinforme, $aDato) {
        // Aquí hay que verificar las variables que están en ODT y verificar si existen 
        // en los datos que envío.
        define('BASE',sfConfig::get('sf_app_module_dir') .'/informes/' .sfConfig::get('sf_app_module_lib_dir_name').'/');
        require_once(BASE.'tbs_class_php5.php');
        require_once(BASE.'tbsooo_class.php');
        $OOo = new clsTinyButStrongOOo;
        $OOo->noErr = true;
        $OOo->SetZipBinary('zip');
        $OOo->SetUnzipBinary('unzip');
        $OOo->SetProcessDir(sfConfig::get('sf_informe_dir'));
        $OOo->SetDataCharset('UTF8');
        $OOo->NewDocFromTpl(sfConfig::get('sf_informe_dir').'/'.$archivo);
        $OOo->LoadXmlFromDoc('content.xml');

        // Saco del template todas las variables del tipo [sssss.rrrrr] y además 
        // evitando las variables del tbs con ;
        //preg_match_all("/\[([^];]*\.[^];]*)\]/", $OOo->Source, $tplVars);
        $matches = $result = array();
        if (preg_match_all("~\[(\w+(?:\.\w+)*)\s*[\];]~", $OOo->Source, $matches)) { // Find tags
            foreach ($matches[1] as $tag) { // Process each
                if (sizeof($tag = explode('.', $tag)) > 1) { // Breakdown into components
                    $tail = array_pop($tag);
                    eval('$result[\''.implode("']['", $tag)."'][] = '$tail';"); // Add to $result
                } else {
                    $result[] = $tag[0]; // Add to $result
                }
            }
        }

        if(is_array($aDato)) {
            foreach($aDato as $idx => $dato) {
                if($this->isNotAssocArray($dato)) {
                    $OOo->MergeBlock($idx, "array", $dato);
                } else {
                    $OOo->MergeField($idx, $dato);
                }
            }
        }

        $OOo->SaveXmlToDoc();
        header('Content-type: '.$OOo->GetMimetypeDoc());
        header('Content-Length: '.filesize($OOo->GetPathnameDoc()));
        $OOo->FlushDoc();
        $OOo->RemoveDoc();
    }



/**
  * @param array $arr
  * @returns boolean
  */
function isNotAssocArray($arr)
{
    return (0 !== array_reduce(
        array_keys($arr),
        create_function('$a, $b', 'return ($b === $a ? $a + 1 : 0);'),
        0
        )
    );
}



/**
 *  Informe: Alumnos por Division 
 *
 */

    private function _getDivisiones($establecimiento_id)  {
        $optionsDivision = array();
        $criteria = new Criteria();
        $criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        $criteria->addAscendingOrderByColumn(DivisionPeer::ORDEN);
        $divisiones = DivisionPeer::doSelectJoinAnio($criteria);
        $optionsDivision['']  = "";
        foreach($divisiones as $division) {
            $optionsDivision[$division->getId()] = $division->getAnio()->getDescripcion()." ".$division->getDescripcion();
        }
        return $optionsDivision;

    }



    private function _getAlumnosPorDivision($division_id = '', $txt = '') {
        $aAlumno = array();

        $criteria = new Criteria();
        if($division_id) {
            $criteria->add(DivisionPeer::ID, $division_id);
        }
        $criteria->addJoin(RelAlumnoDivisionPeer::FK_ALUMNO_ID, AlumnoPeer::ID);
        $criteria->addJoin(RelAlumnoDivisionPeer::FK_DIVISION_ID, DivisionPeer::ID);
        $criteria->addJoin(DivisionPeer::FK_ANIO_ID, AnioPeer::ID);

        if($txt) {
            $cton1 = $criteria->getNewCriterion(AlumnoPeer::NOMBRE, "%$txt%", Criteria::LIKE);
            $cton2 = $criteria->getNewCriterion(AlumnoPeer::APELLIDO, "%$txt%", Criteria::LIKE);
            $cton1->addOr($cton2);
            $criteria->add($cton1);
        }

        $criteria->addAsColumn("alumno_id", AlumnoPeer::ID);
        $criteria->addAsColumn("alumno_nombre", AlumnoPeer::NOMBRE);
        $criteria->addAsColumn("alumno_apellido", AlumnoPeer::APELLIDO);
        $criteria->addAsColumn("division_id", DivisionPeer::ID);
        $criteria->addAsColumn("division_descripcion", DivisionPeer::DESCRIPCION);
        $criteria->addAsColumn("anio_descripcion", AnioPeer::DESCRIPCION);

        $alumnos = BasePeer::doSelect($criteria);
        foreach($alumnos as $alumno) {
            $aAlumno[] = (object) array( 'alumno_id' => $alumno[0],'alumno_nombre' => $alumno[1], 'alumno_apellido' => $alumno[2], 'division_id' => $alumno[3], 'division_nombre' => $alumno[4], 'anio_descripcion' => $alumno[5] );
        }

        return $aAlumno;
    }   



    private function _getTodosLosAlumnos($establecimiento_id = '', $txt = '') {
        $aAlumno = array();

        $criteria = new Criteria();
        if($establecimiento_id) {
            $criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        }

        if($txt) {
            $cton1 = $criteria->getNewCriterion(AlumnoPeer::NOMBRE, "%$txt%", Criteria::LIKE);
            $cton2 = $criteria->getNewCriterion(AlumnoPeer::APELLIDO, "%$txt%", Criteria::LIKE);
            $cton1->addOr($cton2);
            $criteria->add($cton1);
        }

        $criteria->addAsColumn("alumno_id", AlumnoPeer::ID);
        $criteria->addAsColumn("alumno_nombre", AlumnoPeer::NOMBRE);
        $criteria->addAsColumn("alumno_apellido", AlumnoPeer::APELLIDO);

        $alumnos = BasePeer::doSelect($criteria);
        foreach($alumnos as $alumno) {
            $aAlumno[] = (object) array( 'alumno_id' => $alumno[0],'alumno_nombre' => $alumno[1], 'alumno_apellido' => $alumno[2]);
        }

        return $aAlumno;
    }




/**
*   Informe de Alumnos por división
*/


    public function handleErrorBusquedaListadoAlumnos() {
        $this->labels = $this->getLabels();
        $this->informe = InformePeer::retrieveByPk($this->getRequestParameter("id"));
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
        $this->optionsDivision = $this->_getDivisiones($establecimiento_id);
        $this->division_id = "";
        return sfView::SUCCESS;
    }

    public function executeAlumnosPorDivisionFormulario() {
        // inicializando variables
        $optionsDivision = array();

        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('division_id');

        // llenando el combo de division segun establecimiento
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
        $optionsDivision = $this->_getDivisiones($establecimiento_id);

        // asignando variables para ser usadas en el template
        $this->optionsDivision = $optionsDivision;
        $this->division_id = $division_id;

        $this->setLayout("layout_sinmenu");
    }

    public function executeAlumnosPorDivisionListado() {

        // inicializando variables
        $aAlumno  = array();

        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('division_id');

        // buscando division
        $division = DivisionPeer::retrieveByPK($division_id);

        // buscando alumnos
        $criteria = new Criteria();
        $criteria->add(DivisionPeer::ID, $division_id);
        $criteria->addJoin(RelAlumnoDivisionPeer::FK_ALUMNO_ID, AlumnoPeer::ID);
        $criteria->addJoin(RelAlumnoDivisionPeer::FK_DIVISION_ID, DivisionPeer::ID);
        $criteria->addAscendingOrderByColumn(AlumnoPeer::APELLIDO);
        $alumnos = AlumnoPeer::doSelect($criteria);

        // asignando variables para ser usadas en el template
        $this->aAlumno = $alumnos;
        $this->division = $division;
    }




/**
*   Informe Boletin
*/

    public function executeBoletinFormulario() {
        // inicializando variables
        $optionsDivision = array();
        $aAlumno  = array();

        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('division_id');
        $txt = $this->getRequestParameter('txt');

        // llenando el combo de division segun establecimiento
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
        $optionsDivision = $this->_getDivisiones($establecimiento_id);

        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            // buscando alumnos
            $aAlumno = $this->_getAlumnosPorDivision($division_id, $txt);    
        }

        // asignando variables para ser usadas en el template
        $this->optionsDivision = $optionsDivision;
        $this->division_id = $division_id;
        $this->txt = $txt;
        $this->aAlumno = $aAlumno;

        $this->setLayout("layout_sinmenu");
    }


    public function executeBoletinListado() {
        $this->forward('boletin','mostrar');
    }


}
?>