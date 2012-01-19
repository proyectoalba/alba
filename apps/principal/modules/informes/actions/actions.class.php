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

  public function executeBasic(sfWebRequest $request) {
      $doc = new sfTinyDoc();
      $doc->createFrom();
      $doc->loadXml('content.xml');
/*      $doc->mergeXmlField('field1', 'variable');

      $doc->mergeXmlField('field2', array('id' => 55, 'name' => 'bob'));

 */


//      $doc->mergeXmlField('field4', AlumnoPeer::doSelect(new Criteria()));





//      $doc->mergeXmlBlock('block1', AlumnoPeer::doSelectJoinAsistencia = array();

      $nbr_col = 10;
      $nbr_row = 5;


      for ($col=1;$col<=$nbr_col;$col++) {
                  $columns[$col] = 'column_'.$col;
      }

      // Creating data
       $data = array();
       for ($row=1;$row<=$nbr_row;$row++) {
          $record = array();
          for ($col=1;$col<=$nbr_col;$col++) {
              $record[$columns[$col]] = $row * $col * 2;
          }
          $data[$row] = $record;
       }

      $doc->mergeXmlBlock('c0,c1,c2', $columns);
      $doc->mergeXmlBlock('r', $data);
      $doc->saveXml();
      $doc->close();
      $doc->sendResponse();
      $doc->remove();
      throw new sfStopException;
  }






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


      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

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

            case 'Docente':
                    $this->redirect('informes/busquedaDocentes?id='.$informe->getId()); break;
                break;
            case 'General':
                $this->redirect('informes/mostrar?id='.$informe->getId());
                break;
            default: $this->redirect('informes/busquedaAlumnos?id='.$informe->getId());
        }
    }



    public function executeMostrar() {
        $informe = InformePeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($informe);

        if($informe->getVariables() AND $this->getRequestParameter('v')!= 1) {
            $url = 'informes/variables?id='.$informe->getId();
            if($this->getRequestParameter('alumno_id')) {
                $url .= '&alumno_id='.$this->getRequestParameter('alumno_id');
            }
            if($this->getRequestParameter('division_id')) {
                $url .= '&division_id='.$this->getRequestParameter('division_id');
            }
            if($this->getRequestParameter('docente_id')) {
                $url .= '&docente_id='.$this->getRequestParameter('docente_id');
            }

            $this->redirect($url);
        } else {
            $this->reporteTBSOO($informe);
        }

        return sfview::NONE;
    }


    public function executeVariables() {
        $informe = InformePeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($informe);

        if($this->getRequestParameter('alumno_id')) {
            $alumno = AlumnoPeer::retrieveByPk($this->getRequestParameter('alumno_id'));
            $this->forward404Unless($alumno);
            $this->alumno = $alumno;
        }
        // El formato normal es ->   variable1;variable2;variableN
        // Se puede agregar variables para select ->  variable:valor1,valor2,valorN
        $variables = explode(";",$informe->getVariables());
        foreach($variables as $variable) {
            $pos = stripos($variable,":");
            if($pos === false) {
                $final_variables["$variable"] = $variable;
            } else {
                $str_op = substr($variable, $pos+1);
                $idx_op = substr($variable, 0, $pos);
                $aOp = explode(",",$str_op);
                $final_variables["$idx_op"] = array_combine($aOp,$aOp);
            }
        }
        $this->variables = $final_variables;
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

    public function executeBusquedaDocentes() {

        $informe = InformePeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($informe);

        // inicializando variables
        $aDocente  = array();

        // tomando los datos del formulario
        $txt = $this->getRequestParameter('txt');

        // llenando el combo de division segun establecimiento
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');

        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            $aDocente = $this->_getDocentes( $txt);
        }

        // asignando variables para ser usadas en el template
        $this->txt = $txt;
        $this->aDocente = $aDocente;
        $this->informe = $informe;

    }


    private function reporteTBSOO($informe) {
        define('BASE',sfConfig::get('sf_app_module_dir') .'/informes/lib/');
        require_once(BASE.'tbs_class_php5.php');
        require_once(BASE.'tbsooo_class.php');
        $OOo = new clsTinyButStrongOOo;
        $OOo->noErr = true;
        $OOo->SetZipBinary('zip');
        $OOo->SetUnzipBinary('unzip');
        $OOo->SetProcessDir(sfConfig::get('sf_informe_dir'));
        $OOo->SetDataCharset('UTF8');
        $OOo->NewDocFromTpl(sfConfig::get('sf_informe_dir').'/'.$informe->getAdjunto()->getRuta());
        $OOo->LoadXmlFromDoc('content.xml');

        $aVariable = $this->leerTemplate($OOo->Source);

        $aDato = array();
        $aDato = $this->llenarVariables($aVariable); //busco en las variables encontradas en el template y reemplaza contenido
        $aDato['informe'] = $informe->toArray(); //agregando datos del registro informe

        // variables adicionales dinamicas de los formulario
        if($informe->getVariables()) {
            $aDato['variable'] = array();
            $variables = explode(";",$informe->getVariables());

            foreach($variables as $variable) {
                $pos = stripos($variable,":");
                if($pos === false) {
                } else {
                    $variable = substr($variable, 0, $pos);
                }
                $aDato['variable'] = array_merge( $aDato['variable'], array ( $variable => $this->getRequestParameter($variable)));
            }

        }
        // lleno finalmente de diferente forma si es un array (ciclo) o no (variable comun)
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
        // OJO hay headers locos para que funcione en internet explorer
        header('Content-type: '.$OOo->GetMimetypeDoc());
        //header("Content-Type: application/force-download"); //para que funcione en konqueror
        header("Cache-Control: public, must-revalidate");
        header("Pragma: hack");
        header('Content-Length: '.filesize($OOo->GetPathnameDoc()));
        header('Content-Disposition: attachment; filename="informe'.$informe->getNombre().'.odt"');
        header("Content-Transfer-Encoding: binary");
        $OOo->FlushDoc();
        $OOo->RemoveDoc();
    }

/**
  * @param array $fuente
  * @returns array
  */
    private function leerTemplate($fuente) {
        // Saco del template todas las variables del tipo [sssss.rrrrr], tambien las del ciclo y además
        // evitando las variables del tbs con ;
        $matches = $results = array();
             if( preg_match_all("/\[[^];]*[;.][^]]*\]/", $fuente, $matches)) {

             foreach ($matches as $tags) {
                foreach($tags as $tag) {
                    $tag = str_replace('[','',$tag);
                    $tag = str_replace(']','',$tag);
                    if (sizeof($aTag =explode('.', $tag)) > 1) { // Breakdown into components
                        $aTag =explode('.', $tag);
                        $tail = array_pop($aTag);
                        if(strpos($tail, "frm=") !== false) {
                            continue;
                        }
                        $pos = strpos($tail, ';block');  // posicion de block
                        if($pos !== false) { // es un listado
                            $tail = substr($tail, 0, $pos);
                            $results[$aTag[0]]['loop'] = 1;
                        }
                        $results[$aTag[0]][] = $tail;
                    } else {
                        $pos = strpos($tag, ';block=end');  // posicion de block
                        if($pos !== false) { // es un listado
                            $tail = substr($tag, 0, $pos);
                            $results[$tail]['loop'] = 1;
                        }
                    }
                }
            }
        }
        return $results;
    }



/**
  * @param array $aVariable
  * @returns array
  */

    private function llenarVariables($aVariable) {
        $aDato = array();
        foreach($aVariable as $idx => $result) { //Recorrer las variables
            switch($idx) { // me fijo que variables debo enviar al template de resultado

                case 'cuenta':
                    if( array_key_exists('loop', $result) AND $result['loop'] == 1) {
                        $criteria = new Criteria();
                        $cuentas = CuentaPeer::doSelect($criteria);
                        foreach($cuentas as $cuenta) {
                            $aDato['cuenta'][] = $cuenta->toArray();
                        }
                    } else {
                        if($this->getRequestParameter('cuenta_id')) {
                            $cuenta = CuentaPeer::retrieveByPk($this->getRequestParameter('cuenta_id'));
                            $aDato['cuenta'] = $cuenta->toArray();
                        }
                    }
                    break;

                case 'responsable':
                    if( array_key_exists('loop', $result) AND $result['loop'] == 1) {
                        $criteria = new Criteria();
                        if($this->getRequestParameter('fk_cuenta_id')) {
                            $criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getRequestParameter('fk_cuenta_id'));
                        }
                        $responsables = ResponsablePeer::doSelect($criteria);
                        foreach($responsables as $responsable) {
                            $aDato['responsable'][] = $responsable->toArray();
                        }
                    } else {
                        if($this->getRequestParameter('responsable_id')) {
                            $responsable = ResponsablePeer::retrieveByPk($this->getRequestParameter('responsable_id'));
                            $aDato['responsable'] = $responsable->toArray();
                        }
                    }
                    break;

                case 'alumno':
                    //dependiendo si es una variables de cilcos
                    if( array_key_exists('loop', $result) AND $result['loop'] == 1) {
                        $criteria = new Criteria();

                        if($this->getRequestParameter('division_id')) {
                            $criteria->add(DivisionPeer::ID, $this->getRequestParameter('division_id'));
                        }

                        if($this->getRequestParameter('fk_cuenta_id')) {
                            $criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getRequestParameter('fk_cuenta_id'));
                        }

                        $criteria->addJoin(RelAlumnoDivisionPeer::FK_ALUMNO_ID, AlumnoPeer::ID);
                        $criteria->addJoin(RelAlumnoDivisionPeer::FK_DIVISION_ID, DivisionPeer::ID);
                        $criteria->addAscendingOrderByColumn(AlumnoPeer::APELLIDO);
                        $alumnos = AlumnoPeer::doSelect($criteria);
                        foreach($alumnos as $alumno) {
                            $aDato['alumno'][] = $alumno->toArrayInforme();
                        }
                    } else {
                        if($this->getRequestParameter('alumno_id')) {
                            $alumno = AlumnoPeer::retrieveByPk($this->getRequestParameter('alumno_id'));
                            $aDato['alumno'] = $alumno->toArrayInforme();
                        }
                    }
                    break;

                case 'division':
                    if($this->getRequestParameter('division_id')) {
                        $d = DivisionPeer::retrieveByPK($this->getRequestParameter('division_id'));
                    } else {
                        $c = new Criteria();
                        $c->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->getRequestParameter('alumno_id'));
                            $relAlumnoDivision = RelAlumnoDivisionPeer::doSelectOne($c);
                        $d = $relAlumnoDivision->getDivision();
                    }
                    $aDato['division'] = $d->toArrayInforme();
                    break;

                case 'establecimiento':
                    if($this->getUser()->getAttribute('fk_establecimiento_id')) {
                        $establecimiento = EstablecimientoPeer::retrieveByPk($this->getUser()->getAttribute('fk_establecimiento_id'));
                        $aDato['establecimiento'] = $establecimiento->toArrayInforme();
                    }
                    break;

                case 'ciclolectivo':
                    if($this->getUser()->getAttribute('fk_ciclolectivo_id')) {
                        $ciclolectivo_id = $this->getUser()->getAttribute('fk_ciclolectivo_id');
                        $ciclolectivo = CiclolectivoPeer::retrieveByPk($ciclolectivo_id);
                        $aDato['ciclolectivo'] = $ciclolectivo->toArray();
                    }
                    break;

                case 'locacion':
                    if( array_key_exists('loop', $result) AND $result['loop'] == 1 AND $this->getUser()->getAttribute('fk_establecimiento_id')) {
                        $c = new Criteria();
                        $c->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->getUser()->getAttribute('fk_establecimiento_id'));
                        $c->addJoin(RelEstablecimientoLocacionPeer::FK_LOCACION_ID, LocacionPeer::ID);
                        $locaciones = LocacionPeer::doSelect($c);
                        foreach($locaciones as $locacion) {
                            $aDato['locacion'][] = $locacion->toArray();
                        }
                    } else {
                        if($this->getRequestParameter('locacion_id')) {
                            $c = new Criteria();
                            $c->add(LocacionPeer::ID, $this->getRequestParameter('locacion_id'));
                            $locacion = LocacionPeer::doSelect($c);
                            $aDato['locacion'] = $locacion->toArray();
                        }
                    }
                    break;

                case 'espacio':
                    if( array_key_exists('loop', $result) AND $result['loop'] == 1 AND $this->getUser()->getAttribute('fk_establecimiento_id')) {
                        $c = new Criteria();
                        $c->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->getUser()->getAttribute('fk_establecimiento_id'));
                        $c->addJoin(RelEstablecimientoLocacionPeer::FK_LOCACION_ID, LocacionPeer::ID);
                        if($this->getRequestParameter('locacion_id')) {
                            $c->add(LocacionPeer::ID, $this->getRequestParameter('locacion_id'));
                        }
                        $c->addJoin(EspacioPeer::FK_LOCACION_ID, LocacionPeer::ID);
                        $espacios = EspacioPeer::doSelect($c);
                        foreach($espacios as $espacio) {
                            $aDato['espacio'][] = $espacio->toArray();
                        }
                    } else {
                        if($this->getRequestParameter('espacio_id')) {
                            $c = new Criteria();
                            $c->add(EspacioPeer::ID, $this->getRequestParameter('espacio_id'));
                            $espacio = EspacioPeer::doSelect($c);
                            $aDato['espacio'] = $espacio->toArray();
                        }
                    }
                    break;

                case 'organizacion':
                    if($this->getUser()->getAttribute('fk_establecimiento_id')) {
                        $c = new Criteria();
                        $c->add(EstablecimientoPeer::ID, $this->getUser()->getAttribute('fk_establecimiento_id'));
                        $c->addJoin(EstablecimientoPeer::FK_ORGANIZACION_ID, OrganizacionPeer::ID);
                        $organizacion = OrganizacionPeer::doSelectOne($c);
                        $aDato['organizacion'] = $organizacion->toArray();
                    }
                    break;

                case 'usuario':
                    if($this->getUser()->getAttribute('id')) {
                        $usuario = UsuarioPeer::retrieveByPk($this->getUser()->getAttribute('id'));
                        $aUsuario = $usuario->toArray();
                        //por seguridad: para no mostrar otros datos del usuario como clave, preguntas, etc
                        $aDato['usuario'] = array( 'Usuario' => $aUsuario['Usuario'], 'Email' => $aUsuario['Email']);

                    }
                    break;


                case 'docente':
                    if( array_key_exists('loop', $result) AND $result['loop'] == 1 ) {
                        $c = new Criteria();
                        $docentes = DocentePeer::doSelect($c);
                        foreach($docentes as $docente) {
                            $aDato['docente'][] = $docente->toArray();
                        }
                    } else {

                        if($this->getRequestParameter('docente_id')) {
                            $docente = DocentePeer::retrieveByPK($this->getRequestParameter('docente_id'));
                            $aDato['docente'] = $docente->toArray();
                        }
                    }
                    break;

                case 'boletin':


                    break;
                default:
            }
        }
        return $aDato;
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

    private function _getDocentes($txt = '') {
        $aDocente = array();
        $criteria = new Criteria();
        if($txt) {
            $cton1 = $criteria->getNewCriterion(DocentePeer::NOMBRE, "%$txt%", Criteria::LIKE);
            $cton2 = $criteria->getNewCriterion(DocentePeer::APELLIDO, "%$txt%", Criteria::LIKE);
            $cton1->addOr($cton2);
            $criteria->add($cton1);
        }

        $aDocente = DocentePeer::doSelect($criteria);
/*        foreach($docentes as $d) {
            $aDocente[] = $d->toArray();
        }
*/
        return $aDocente;
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
       $this->checks = $this->getRequestParameter('boletin');
       $this->setLayout('layout_sinmenu');
       $this->getResponse()->addStyleSheet('impresion', 'last', array('media' =>'print'));
    }

    public function executeAyuda() {
        $this->setLayout("layout_sinmenu");
    }

}
?>
