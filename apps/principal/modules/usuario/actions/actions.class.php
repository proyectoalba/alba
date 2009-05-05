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
 * Usuario Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class usuarioActions extends autousuarioActions
{

    function updateUsuarioFromRequest() {
        $usuario = $this->getRequestParameter('usuario');

        if (isset($usuario['usuario'])) {
          $this->usuario->setUsuario($usuario['usuario']);
        }

        if (isset($usuario['clave']) && $usuario['clave'] != '') {
          $this->usuario->setClave(md5($usuario['clave']));
        }

        if (isset($usuario['correo_publico'])) {
          $this->usuario->setCorreoPublico(isset($usuario['correo_publico']) ? $usuario['correo_publico'] : 0);
        }

        if (isset($usuario['email'])) {
          $this->usuario->setEmail($usuario['email']);
        }

        if (isset($usuario['activo'])) {
          $this->usuario->setActivo(isset($usuario['activo']) ? $usuario['activo'] : 0);
        }

        if ($this->usuario->isNew()) {
          $this->usuario->setFechaCreado(date("Y-m-d"));
        }

        $this->usuario->setFechaActualizado(date("Y-m-d H:i:s"));

        if (isset($usuario['seguridad_pregunta'])) {
          $this->usuario->setSeguridadPregunta($usuario['seguridad_pregunta']);
        }

        if (isset($usuario['seguridad_respuesta'])) {
            $this->usuario->setSeguridadRespuesta($usuario['seguridad_respuesta']);
        }

        if (isset($usuario['fk_establecimiento_id'])) {
            $this->usuario->setFkEstablecimientoId($usuario['fk_establecimiento_id']);
        }
    }


    public function executeDelete($request) {
        $this->usuario = UsuarioPeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($this->usuario);
        $this->usuario->setBorrado(1);
        $this->usuario->save();
        return $this->redirect('usuario/list');
    }


    public function executeList($request) {
        $this->processSort();
        $this->processFilters();
        $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/usuario/filters');
        // pager
        $this->pager = new sfPropelPager('Usuario', 20);
        $c = new Criteria();

        // Muestra solo los registros con borrado = 0
        $c->add(UsuarioPeer::BORRADO, 0, Criteria::EQUAL);

        $this->addSortCriteria($c);
        $this->addFiltersCriteria($c);
        $this->pager->setCriteria($c);
        $this->pager->setPage($this->getRequestParameter('page', 1));
        $this->pager->init();
    }

    /**
     * Modificar los roles y permisos del usuario
     */
    function executeEditPermiso($request) {

        $this->usuario = UsuarioPeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($this->usuario);

        // estos son los permisos que tiene el usuario
        $c = new Criteria();
        $c->add(UsuarioPermisoPeer::FK_USUARIO_ID, $this->usuario->getId());
        $usuarioPermisos = UsuarioPermisoPeer::doSelectJoinPermiso($c);

        $optionsUsuarioPermisos = array();
        foreach($usuarioPermisos as $usuarioPermiso) {
            $optionsUsuarioPermisos[$usuarioPermiso->getFkPermisoId()] = $usuarioPermiso->getPermiso()->getNombre();
        }
        $this->optionsUsuarioPermisos = $optionsUsuarioPermisos;

        // estos son todos los permisos existentes
        $todosLosPermisos = array();
        $c = new Criteria();
        // permisos
        $permisos = PermisoPeer::doSelect(new Criteria());
        foreach($permisos as $permiso) {
            $todosLosPermisos[$permiso->getId()] = $permiso->getNombre();
        }

        // estos son los permisos existentes menos los del usuario
        $this->optionsPermisos = array_diff_key($todosLosPermisos, $this->optionsUsuarioPermisos);

        //cargo todos roles
        $c = new Criteria();
        $c->add(RolPeer::ACTIVO, 1);
        $roles = RolPeer::doSelect($c);

        $optionsRol = array();
        foreach($roles as $rol) {
          $optionsRol[$rol->getId()] = $rol->getNombre();
        }
        $this->optionsRol = $optionsRol;

        //cargo roles del usuario
        $c = new Criteria();
        $c->add(UsuarioRolPeer::FK_USUARIO_ID, $this->usuario->getId());
        $this->usuarioroles = UsuarioRolPeer::doSelectJoinRol($c);
    }

    /**
     * Guarda los permisos del usuario
     */
    function executeSavePermiso($request) {

        // borrar todo los permisos para un usuarios determinado
        $usuarioId = $this->getRequestParameter('id');
        $aPermiso = $this->getRequest()->getParameterHolder()->get('usuarioPermisos');

        $c =  new Criteria();
        $c->add(UsuarioPermisoPeer::FK_USUARIO_ID, $usuarioId);
        UsuarioPermisoPeer::doDelete($c);

        if(count($aPermiso) > 0) {
            // grabar todos los que vienen seleccionados
            // aqui se debe poder grabar haciendo un solo insert

            $c =  new Criteria();
            foreach($aPermiso as $permisoId) {
                $p = new UsuarioPermiso();
                $p->setFkUsuarioId($usuarioId);
                $p->setFkPermisoId($permisoId);
                $p->save();
                unset($p);
            }
        }
        //si los permisos que se estan guardando son del
        //usuario actual refresco las credenciales para evitar el logout/login
        $this->logMessage("Comprobar si el usuario es el actual: " . $this->getUser()->getAttribute('id'), 'debug');
        if ($this->getUser()->getAttribute('id') == $usuarioId) {
          $this->logMessage("Modificando permisos del usuario actual", 'debug');
          $this->getUser()->cargarCredenciales($usuarioId);
        }
        return $this->redirect('usuario/editPermiso?id='.$usuarioId);
    }

  /**
   * Asigna un rol al usuario
   *
   * @param integer $rol_id identificador del rol
   * @param integer $usuario_id identificador del usuario
   */
  public function executeSaveRol(sfWebRequest $request)
  {
    $this->usuario = UsuarioPeer::retrieveByPk($request->getParameter('usuario_id'));
    $this->forward404Unless($this->usuario);
    $this->rol = RolPeer::retrieveByPk($request->getParameter('rol_id'));
    $this->forward404Unless($this->rol);
    $ur = new UsuarioRol();
    $ur->setRol($this->rol);
    $ur->setUsuario($this->usuario);
    $ur->save();

    //si el Rol que se estan guardando son del
    //usuario actual refresco las credenciales para evitar el logout/login
    $this->logMessage("Comprobar si el usuario es el actual: " . $this->getUser()->getAttribute('id'), 'debug');
    if ($this->getUser()->getAttribute('id') == $this->usuario->getId()) {
      $this->logMessage("Modificando permisos del usuario actual", 'debug');
      $this->getUser()->cargarCredenciales($this->usuario->getId());
    }
    return $this->redirect('usuario/editPermiso?id=' . $this->usuario->getId());
  }

  /**
   * Elimina un rol del usuario
   *
   * @param integer $user_id identificador del usuari
   * @param integer $rol_id identificador del rol
   *
   */
  public function executeDeleteRol(sfWebRequest $request)
  {
    $this->usuario = UsuarioPeer::retrieveByPk($request->getParameter('usuario_id'));
    $this->forward404Unless($this->usuario);
    $this->rol = RolPeer::retrieveByPk($request->getParameter('rol_id'));
    $this->forward404Unless($this->rol);
    $ur = new UsuarioRol();
    $ur->setRol($this->rol);
    $ur->setUsuario($this->usuario);
    $ur->delete();
    //si el Rol que se estan eliminando son del
    //usuario actual refresco las credenciales para evitar el logout/login
    $this->logMessage("Comprobar si el usuario es el actual: " . $this->getUser()->getAttribute('id'), 'debug');
    if ($this->getUser()->getAttribute('id') == $this->usuario->getId()) {
      $this->logMessage("Modificando permisos del usuario actual", 'debug');
      $this->getUser()->cargarCredenciales($this->usuario->getId());
    }
    return $this->redirect('usuario/editPermiso?id=' . $this->usuario->getId());

  }
}

?>
