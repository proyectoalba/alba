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
 * Responsable Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class responsableActions extends autoresponsableActions {
         
    protected function addSortCriteria ($c) { 
        if ($sort_column = $this->getUser()->getAttribute('sort', 'apellido', 'sf_admin/responsable/sort')) {                                                                                                                        
            $sort_column = Propel::getDB($c->getDbName())->quoteIdentifier($sort_column);                                          
            if ($this->getUser()->getAttribute('type', 'asc', 'sf_admin/responsable/sort') == 'asc') {                                                                                                                      
                $c->addAscendingOrderByColumn($sort_column);                                                                         
            }                                                                                                                      
            else                                                                            
                $c->addDescendingOrderByColumn($sort_column);                                                                        
        }
    }
    public function executeEdit ($request){                                                       
        $this->responsable = $this->getResponsableOrCreate();                                                                    

        $datosCuenta = "";
        if($this->getRequestParameter("fk_cuenta_id")) {
            $datosCuenta = CuentaPeer::retrieveByPk($this->getRequestParameter("fk_cuenta_id"));
        }
        if($this->responsable->getFkCuentaId()) {
            $datosCuenta = CuentaPeer::retrieveByPk($this->responsable->getFkCuentaId());
        }
        $this->datosCuenta = $datosCuenta;

        if ($this->getRequest()->getMethod() == sfRequest::POST) {                                                                                                                        
            $this->responsable = $this->getResponsableOrCreate(); 
            $this->updateResponsableFromRequest();
            $this->saveResponsable($this->responsable);
            $this->getUser()->setFlash('notice', 'Your modifications have been saved');
            if ($this->getRequestParameter('save_and_add')) {                                                                                                                      
                //el save_and_add debe volver al create pero pasando la cuenta actual
                return $this->redirect('responsable/create?fk_cuenta_id=' . $this->responsable->getFkCuentaId());                                                                        
            }                                                                                                    
            else {                                                                                                                      
                return $this->redirect('responsable/edit?id='.$this->responsable->getId());
            }
        }                                                                                                                    
        else {                                                                                                                        
            // add javascripts                                                                                                     
            $this->getResponse()->addJavascript(sfConfig::get('sf_prototype_web_dir').'/js/prototype');                                                     
            $this->getResponse()->addJavascript(sfConfig::get('sf_admin_web_dir').'/js/collapse');
            if ($this->getRequestParameter('fk_cuenta_id'))
                $this->responsable->setFkCuentaId($this->getRequestParameter('fk_cuenta_id'));
        }
    }

    protected function updateResponsableFromRequest(){
        $responsable = $this->getRequestParameter('responsable');

        if (isset($responsable['apellido']))
        {
          $this->responsable->setApellido($responsable['apellido']);
        }
        if (isset($responsable['apellido_materno']))
        {
          $this->responsable->setApellidoMaterno($responsable['apellido_materno']);
        }
        if (isset($responsable['nombre']))
        {
          $this->responsable->setNombre($responsable['nombre']);
        }
        if (isset($responsable['sexo']))
        {
          $this->responsable->setSexo($responsable['sexo']);
        }
        if (isset($responsable['fk_tipodocumento_id']))
        {
          $this->responsable->setFkTipodocumentoId($responsable['fk_tipodocumento_id']);
        }
        if (isset($responsable['nro_documento']))
        {
          $this->responsable->setNroDocumento($responsable['nro_documento']);
        }
        if (isset($responsable['direccion']))
        {
          $this->responsable->setDireccion($responsable['direccion']);
        }
        if (isset($responsable['ciudad']))
        {
          $this->responsable->setCiudad($responsable['ciudad']);
        }
        if (isset($responsable['fk_provincia_id']))
        {
          $this->responsable->setFkProvinciaId($responsable['fk_provincia_id']);
        }
        if (isset($responsable['codigo_postal']))
        {
          $this->responsable->setCodigoPostal($responsable['codigo_postal']);
        }
        if (isset($responsable['telefono']))
        {
          $this->responsable->setTelefono($responsable['telefono']);
        }
        if (isset($responsable['telefono_movil']))
        {
          $this->responsable->setTelefonoMovil($responsable['telefono_movil']);
        }
        if (isset($responsable['email']))
        {
          $this->responsable->setEmail($responsable['email']);
        }
        if (isset($responsable['relacion']))
        {
          $this->responsable->setRelacion($responsable['relacion']);
        }
        if (isset($responsable['observacion']))
        {
          $this->responsable->setObservacion($responsable['observacion']);
        }
        if (isset($responsable['fk_cuenta_id']))
        {
          $this->responsable->setFkCuentaId($responsable['fk_cuenta_id']);
        }
        if (isset($responsable['fk_rolresponsable_id']))
        {
          $this->responsable->setFkRolresponsableId($responsable['fk_rolresponsable_id']);
        }    
        $this->responsable->setAutorizacionRetiro(isset($responsable['autorizacion_retiro']) ? $responsable['autorizacion_retiro'] : 0);
  }
  
    public function executeIrCuenta() {
        //Obtener el id de cuenta.
  
        $c = new Criteria();
        $c->add(ResponsablePeer::ID, $this->getRequestParameter('id'));
        $Resp = ResponsablePeer::doSelectOne($c);
        return $this->redirect('cuenta/verCompleta?id='.$Resp->getFkCuentaId());
    }   

    public function executeCambiarPais() {
        $this->pais_id = $this->getRequestParameter('pais_id');
        $this->provincia_id = $this->getRequestParameter('provincia_id');
        $c = new Criteria();
        $c->add(ProvinciaPeer::FK_PAIS_ID, $this->pais_id);
        $this->provincias = ProvinciaPeer::getEnOrden($c);
    }

  protected function addFiltersCriteria($c){
        if (isset($this->filters['apellido']) && $this->filters['apellido'] !== ''){
            $c->add(ResponsablePeer::APELLIDO, "%". $this->filters['apellido']."%", Criteria::LIKE);
        }
  }
}  

?>
