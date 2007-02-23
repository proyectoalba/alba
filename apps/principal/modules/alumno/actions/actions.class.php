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
 * alumno actions.
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class alumnoActions extends autoalumnoActions
{

    public function preExecute() {
        $this->vista = $this->getRequestParameter('vista');
    }
  
  /**
  * Ver las Asistencias del alumno
  */  
  function executeAsistencia() {
    $this->redirect( 'asistencia?action=index&vistas=2&alumno_id='.$this->getRequestParameter('id'));
  }

  /**
  * Ver el Legajo del alumno
  */  
  function executeLegajo() {
    $this->redirect( 'legajopedagogico?action=verLegajo&aid='.$this->getRequestParameter('id'));
  }

  /**
  * Ver las vacunas del alumno
  */  
  function executeVacunas(){
   $this->redirect( 'relCalendariovacunacionAlumno/list?filters%5Bfk_alumno_id%5D='.$this->getRequestParameter('id') .'&filter=filtrar');
  }  
  
  function saveAlumno ($alumno) {
    $alumno->setSexo($this->getRequestParameter('sexo'));  
    $alumno->setFkEstablecimientoId($this->getUser()->getAttribute('fk_establecimiento_id'));
    $alumno->save();
  }
  
  protected function addFiltersCriteria(&$c) {
    $c->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID,$this->getUser()->getAttribute('fk_establecimiento_id'));

    if(isset($this->filters['nombre_apellido']) && $this->filters['nombre_apellido'] != '') {
        $cton1 = $c->getNewCriterion(AlumnoPeer::NOMBRE, "%".$this->filters['nombre_apellido']."%", Criteria::LIKE);
        $cton2 = $c->getNewCriterion(AlumnoPeer::APELLIDO, "%".$this->filters['nombre_apellido']."%", Criteria::LIKE);
        $cton1->addOr($cton2);
        $c->add($cton1);
    }

    if(isset($this->filters['nro_documento']) && $this->filters['nro_documento'] != '') {
        $c->add(AlumnoPeer::NRO_DOCUMENTO,$this->filters['nro_documento']);
    }

    if (isset($this->filters['division']) && $this->filters['division'] != '' && $this->filters['division'] != 0) {
        $c->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->filters['division']);
        $c->addJoin(AlumnoPeer::ID, RelAlumnoDivisionPeer::FK_ALUMNO_ID);
    }


  }
    protected function addSortCriteria (&$c) {                                                                                                                          
        if ($sort_column = $this->getUser()->getAttribute('sort', 'apellido', 'sf_admin/alumno/sort')) {                                                                                                                        
            $sort_column = Propel::getDB($c->getDbName())->quoteIdentifier($sort_column);                                          
            if ($this->getUser()->getAttribute('type', 'asc', 'sf_admin/alumno/sort') == 'asc') {                                                                                                                      
                $c->addAscendingOrderByColumn($sort_column);                                                                         
            }                                                                                                                      
            else {                                                                                                                      
                $c->addDescendingOrderByColumn($sort_column);                                                                        
            }                                                                                                                      
        }                                                                                                                        
    }                                                                                                                          
  public function executeEdit ()
  {
    $this->alumno = $this->getAlumnoOrCreate();

    $datosCuenta = "";
    if($this->getRequestParameter("fk_cuenta_id")) {
        $datosCuenta = CuentaPeer::retrieveByPk($this->getRequestParameter("fk_cuenta_id"));
    }
    if($this->alumno->getFkCuentaId()) {
        $datosCuenta = CuentaPeer::retrieveByPk($this->alumno->getFkCuentaId());
    }
    $this->datosCuenta = $datosCuenta;

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->alumno = $this->getAlumnoOrCreate();

      $this->updateAlumnoFromRequest();

      $this->saveAlumno($this->alumno);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('alumno/create');
      }
      else
      {
        return $this->redirect('alumno/edit?id='.$this->alumno->getId());
      }
    }
    else
    {
      // add javascripts
      $this->getResponse()->addJavascript('/sf/js/prototype/prototype');
      $this->getResponse()->addJavascript('/sf/js/sf_admin/collapse');
    }
  }


    public function executeBuscar() {
        $aCuentas = array();

        $txt_cuenta = $this->getRequestParameter("txt_cuenta");
        
        $criteria = new Criteria();
        $cton1 = $criteria->getNewCriterion(CuentaPeer::NOMBRE, "%$txt_cuenta%", Criteria::LIKE);
        $cton2 = $criteria->getNewCriterion(CuentaPeer::RAZON_SOCIAL, "%$txt_cuenta%", Criteria::LIKE);
        $cton1->addOr($cton2);
        $criteria->add($cton1);
        $aCuentas = CuentaPeer::doSelect($criteria);

        $this->txt_cuenta = $txt_cuenta;
        $this->aCuentas = $aCuentas;
    }

    public function executeSeleccionarCuenta() {

        $id_cuenta = $this->getRequestParameter("id");
        $this->cuenta = CuentaPeer::retrieveByPk($id_cuenta);
    }


    public function executeCambiarCuenta() {
    }
    

    public function handleErrorGrabarCuenta() {
        $this->cuenta = $this->updateCuentaFromRequest();
        $this->setTemplate("nuevaCuenta");
        $this->vista = "noMuestraMenu";
        return sfView::SUCCESS;
    }


    public function executeGrabarCuenta() {
        $cuenta = $this->updateCuentaFromRequest();
        $cuenta->save();
    }


    public function updateCuentaFromRequest() {
        $cuenta = $this->getRequestParameter('cuenta');

        $cuenta_obj = new Cuenta();

    if (isset($cuenta['nombre']))
    {
      $cuenta_obj->setNombre($cuenta['nombre']);
    }
    if (isset($cuenta['razon_social']))
    {
      $cuenta_obj->setRazonSocial($cuenta['razon_social']);
    }
    if (isset($cuenta['cuit']))
    {
      $cuenta_obj->setCuit($cuenta['cuit']);
    }
    if (isset($cuenta['direccion']))
    {
      $cuenta_obj->setDireccion($cuenta['direccion']);
    }
    if (isset($cuenta['ciudad']))
    {
      $cuenta_obj->setCiudad($cuenta['ciudad']);
    }
    if (isset($cuenta['codigo_postal']))
    {
      $cuenta_obj->setCodigoPostal($cuenta['codigo_postal']);
    }
    if (isset($cuenta['pais_id']))
    {
      $cuenta_obj->setPaisId($cuenta['pais_id']);
    }
    if (isset($cuenta['fk_provincia_id']))
    {
      $cuenta_obj->setFkProvinciaId($cuenta['fk_provincia_id']);
    }
    if (isset($cuenta['fk_tipoiva_id']))
    {
      $cuenta_obj->setFkTipoivaId($cuenta['fk_tipoiva_id']);
    }
    if (isset($cuenta['telefono']))
    {
      $cuenta_obj->setTelefono($cuenta['telefono']);
    }    

        return $cuenta_obj;
    }


    public function executeNuevaCuenta() {
        $this->cuenta = new Cuenta();
    }
    

}
?>