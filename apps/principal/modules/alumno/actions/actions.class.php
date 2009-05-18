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

class alumnoActions extends autoAlumnoActions
{

  /**
  * Ver las Asistencias del alumno
  */
  function executeAsistencia() {
    $this->redirect( 'asistencia/index?vistas=2&alumno_id='.$this->getRequestParameter('id'));
  }

  /**
  * Ver el Legajo del alumno
  */
  function executeLegajo() {
    $this->redirect( 'legajopedagogico/verLegajo?aid='.$this->getRequestParameter('id'));
  }


  function executeLegajosalud() {
    $this->redirect('legajosalud/verLegajo?aid='.$this->getRequestParameter('id'));
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

  protected function addFiltersCriteria($c) {
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

    protected function addSortCriteria ($c) {
        if ($sort_column = $this->getUser()->getAttribute('sort', 'apellido', 'sf_admin/alumno/sort')) {
            $sort_column = Propel::getDB($c->getDbName())->quoteIdentifier($sort_column);
            if ($this->getUser()->getAttribute('type', 'asc', 'sf_admin/alumno/sort') == 'asc') {
                $c->addAscendingOrderByColumn($sort_column);
            } else {
                $c->addDescendingOrderByColumn($sort_column);
            }
        }
    }

  public function executeEdit ($request)
  {
    $this->alumno = $this->getAlumnoOrCreate();

    //Datos de la cuenta
    $datosCuenta = "";
    if($this->getRequestParameter("fk_cuenta_id")) {
        $datosCuenta = CuentaPeer::retrieveByPk($this->getRequestParameter("fk_cuenta_id"));
    }
    if($this->alumno->getFkCuentaId()) {
        $datosCuenta = CuentaPeer::retrieveByPk($this->alumno->getFkCuentaId());
    }
    $this->datosCuenta = $datosCuenta;

    //Prefijo y número de legajo
    $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
    $estable = EstablecimientoPeer::retrieveByPk($establecimiento_id);


    $this->prefijo = $this->alumno->getLegajoPrefijo();
    $this->nrolegajo = $this->alumno->getLegajoNumero();

    if ($this->prefijo == "")
        $this->prefijo = $estable->getLegajoPrefijo();

    if ($this->nrolegajo == "")
        $this->nrolegajo = $estable->getLegajoSiguiente();

    //Fecha de nacimiento
    $today = getdate();
    $fecha_nac = $this->alumno->getFechaNacimiento("Y");
    if($fecha_nac != "")
        $this->edad = $today['year'] - $fecha_nac;
    else
        $this->edad = "";

    if ($this->getRequest()->getMethod() == sfRequest::POST) {
      $this->alumno = $this->getAlumnoOrCreate();
      $this->updateAlumnoFromRequest();

      //Obteniendo fecha segun cultura
      $fecha_nacimiento = $this->getRequestParameter('alumno[fecha_nacimiento]');
      if ($fecha_nacimiento) {
        $user_culture = $this->getUser()->getCulture();
        list($d, $m, $y) = $this->getContext()->getI18N()->getDateForCulture($fecha_nacimiento, $user_culture);
        $this->alumno->setFechaNacimiento("$y-$m-$d");
      }

      $this->saveAlumno($this->alumno);

      //Actualizo el nro siguiente.
      $nrosiguiente = $this->alumno->getLegajoNumero() +1;
      $estable->setLegajoSiguiente($nrosiguiente);
      $estable->Save();

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add')) {
        return $this->redirect('alumno/create?fk_cuenta_id=' . $this->alumno->getFkCuentaId());
      } else {
        return $this->redirect('alumno/edit?id='.$this->alumno->getId());
      }
    } else {
      // add javascripts
      $this->getResponse()->addJavascript(sfConfig::get('sf_prototype_web_dir').'/js/prototype');
      $this->getResponse()->addJavascript(sfConfig::get('sf_admin_web_dir').'/js/collapse');
      if ($this->getRequestParameter('fk_cuenta_id')) {
          $this->alumno->setFkCuentaId($this->getRequestParameter('fk_cuenta_id'));
      }
    }
  }

  public function executeAddfoto(sfWebRequest $request)
  {
    $this->alumno = AlumnoPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->alumno);
    if ($this->alumno->getLegajoPrefijo() != '' && $this->alumno->getLegajoNumero() != '') {
      try {
      	$this->getRequest()->moveFile('archivo', sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'alumnos'.DIRECTORY_SEPARATOR.$this->alumno->getLegajo(). '.png');
      	$this->result = 1;
      }
      catch (Exception $e) {
      	$this->result_msg = $e->getMessage();
      	$this->result = 0;
      }
    }
    else {
    	// legajo invalido
    	$this->result_msg = 'El alumno posee un legajo inv&aacute;lido!';
      	$this->result = 0;
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
//         $this->vista = "noMuestraMenu";
        return sfView::SUCCESS;
    }


    public function executeGrabarCuenta() {
        $cuenta = $this->updateCuentaFromRequest();
        $cuenta->save();
        $this->id = $cuenta->getId();
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

    public function executeCambiarPais() {
        $this->pais_id = $this->getRequestParameter('pais_id');
        $this->provincia_id = $this->getRequestParameter('provincia_id');
        $c = new Criteria();
        $c->add(ProvinciaPeer::FK_PAIS_ID, $this->pais_id);
        $this->provincias = ProvinciaPeer::getEnOrden($c);
    }


    function executeIrCuenta(){
        if ($this->getRequestParameter('id')) {
            $this->redirect('cuenta/verCompleta?id='.$this->getRequestParameter('id'));
        } else {
            $this->redirect('alumno/list');
        }
    }

}
?>
