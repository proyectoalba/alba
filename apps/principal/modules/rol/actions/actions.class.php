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
 * rol Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class rolActions extends autorolActions
{
    public function preExecute() {
             $this->vista = $this->getRequestParameter('vista');
    }

    function executeEditPermiso() {
        // estos son los permisos que tiene el rol
        $c = new Criteria();
        $c->add(RelRolPermisoPeer::FK_ROL_ID, $this->getRequestParameter('id'));
        $rolPermisos = RelRolPermisoPeer::doSelectJoinPermiso($c);
    
            // esto puede ser descartado usando en el select_tag, objects_for_select                               
        $this->optionsRolPermisos = array();
        foreach($rolPermisos as $rolPermiso) {
            $this->optionsRolPermisos[$rolPermiso->getFkPermisoId()] = $rolPermiso->getPermiso()->getNombre();
        }

        //estos son todos los permisos existentes
        $permisos = PermisoPeer::doSelect(new Criteria());
        $todosLosPermisos = array();
        foreach($permisos as $permiso) {
            $todosLosPermisos[$permiso->getId()] = $permiso->getNombre();
        }
        
        // estos son los permisos existentes menos los del usuario
        $this->optionsPermisos = array_diff_key($todosLosPermisos, $this->optionsRolPermisos);
         
        $c = new Criteria();
        //$c->clearSelectColumns()->addSelectColumn(RolPeer::NOMBRE);
        //$c->addSelectColumn(RolPeer::ID);
        
        $c->add(RolPeer::ACTIVO, 1);
        $roles  = RolPeer::doSelect($c);

        $this->optionsRol = array();
        foreach($roles as $rol) {
            $this->optionsRol[$rol->getId()] = $rol->getNombre(); 
        }
        
    }        
    
    function executeSavePermiso() {
      
        // borrar todo los permisos para un usuarios determinado
        $rolId = $this->getRequestParameter('id');
        $aPermiso = $this->getRequest()->getParameterHolder()->get('rolPermisos');

        $c =  new Criteria();
        $c->add(RelRolPermisoPeer::FK_ROL_ID, $rolId);
        RelRolPermisoPeer::doDelete($c);

        if(count($aPermiso) > 0) {
            // grabar todos los que vienen seleccionados
            // aqui se debe poder grabar haciendo un solo insert
                        
            $c =  new Criteria();
            foreach($aPermiso as $permisoId) {
                $p = new RelRolPermiso();
                $p->setFkRolId($rolId);
                $p->setFkPermisoId($permisoId);
                $p->save();
                unset($p);
            }
        }
        return $this->redirect('rol/editPermiso?id='.$rolId);
               
    }        
    

}

?>
