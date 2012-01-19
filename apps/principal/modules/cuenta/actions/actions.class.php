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
 * cuenta Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class cuentaActions extends autocuentaActions
{

  /**
  * Muestra la cuenta, los alumnos y los responsables
  **/
  public function executeVerCompleta(){
        $c = new Criteria();
        $c->add(CuentaPeer::ID, $this->getRequestParameter('id'));
        $this->cuenta  = CuentaPeer::doSelectOne($c);
        $this->forward404Unless($this->cuenta);
        $c = new Criteria();
        $c->add(AlumnoPeer::FK_CUENTA_ID, $this->getRequestParameter('id'));
        $this->aAlumno  = AlumnoPeer::doSelect($c);

        $c = new Criteria();
        $c->add(ResponsablePeer::FK_CUENTA_ID, $this->getRequestParameter('id'));
        $this->aResponsable  = ResponsablePeer::doSelect($c);
  }  
 protected function addSortCriteria ($c)                                                
  {                                                                                       
    if ($sort_column = $this->getUser()->getAttribute('sort', 'nombre', 'sf_admin/cuenta/sort'))
    {                                                                                     
      $sort_column = Propel::getDB($c->getDbName())->quoteIdentifier($sort_column);       
      if ($this->getUser()->getAttribute('type', 'asc', 'sf_admin/cuenta/sort') == 'asc')
      {                                                                                   
        $c->addAscendingOrderByColumn($sort_column);                                      
      }                                                                                   
      else                                                                                
      {                                                                                   
        $c->addDescendingOrderByColumn($sort_column);                                     
      }                                                                                   
    }                                                                                     
  }

    public function executeCambiarPais() {
        $this->pais_id = $this->getRequestParameter('pais_id');
        $this->provincia_id = $this->getRequestParameter('provincia_id'); 
        $c = new Criteria();
        $c->add(ProvinciaPeer::FK_PAIS_ID, $this->pais_id);
        $this->provincias = ProvinciaPeer::getEnOrden($c);
    }

    public function executeAutocompletar() {
        $txt_cuenta = $this->getRequestParameter('txt_cuenta');
        $criteria = new Criteria();
        $criteria->add(CuentaPeer::NOMBRE, "$txt_cuenta%", Criteria::LIKE);
        $cuentas = CuentaPeer::doSelect($criteria);
        $this->forward404Unless($cuentas);
        $this->aCuenta = $cuentas;
    }



}

?>
