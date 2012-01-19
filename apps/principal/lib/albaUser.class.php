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
 * Clase albaUser
 * Maneja la autenticacion del usuario
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class albaUser extends sfBasicSecurityUser
{
    /**
     * deuelve el establecimento del usuario
     * @return array $establecimientos
     * @todo: tienen que ser varios!
     */
    public function getEstablecimientos() {
      $establecimientos = array();
      $e = EstablecimientoPeer::retrieveByPk($this->getAttribute('fk_establecimiento_id'));
      array_push($establecimientos,$e);
      return  $establecimientos;
    }

    /**
     * obtiene el tema del la interfaz del usuario
     */
    public function getTheme() {
      return $this->getAttribute('theme');
    }

    /**
     * Asigna un tema al usuario
     */
    public function setTheme($theme) {
      $this->setAttribute('theme',$theme);
    }

    /**
     * Carga las credenciales del usuario
     * en la session del usuario
     *
     * @param integer $usuario_id identificador del usuario a cargar
     * en la session
     */
    public function cargarCredenciales($usuario_id)
    {
      //limpio las credenciales actuales si las hay
      $this->clearCredentials();

      /* asigno las credenciales x rol */
      $crol = new Criteria();
      $crol->add(UsuarioRolPeer::FK_USUARIO_ID, $usuario_id);
      $roles = UsuarioRolPeer::doSelect($crol);
      $user_roles = array();
      //por cada rol los cargo y tambien busco los permisos y los asigno
      foreach ($roles as $rol) {
        $user_rol['id'] = $rol->getRol()->getId();
        $user_rol['nombre'] = $rol->getRol();
        array_push($user_roles, $user_rol);
        $this->log('obteniendo rol: ' . $rol->getRol()->getNombre());
        $permisos = $rol->getRol()->getRolPermisos();
        foreach ($permisos as $permiso) {
          $this->log(sprintf('permiso desde rol: %s', $permiso->getPermiso()));
          $this->addCredential($permiso->getPermiso()->getNombre());
        }
      }
      $this->setAttribute('roles', $user_roles);
      /* asign credenciales por usuario */
      $this->log('obteniendo permisos x usuario:');
      $cuser = new Criteria();
      $cuser->add(UsuarioPermisoPeer::FK_USUARIO_ID, $usuario_id);
      $permisos = UsuarioPermisoPeer::doSelect($cuser);
      foreach ($permisos as $permiso) {
        $this->log('permiso desde usuario: ' . $permiso->getPermiso());
        $this->addCredential($permiso->getPermiso()->getNombre());
      }

      // quitando credenciales para la demo
      if(sfConfig::get('sf_environment') =='demo'){
        $this->log('{DEMO} quitando credenciales');
        $this->removeCredential('usuario');
        $this->removeCredential('rol');
      }

    }

    /***
     * Log para debug
     *
     * @param string $msg texto
     */
    private function log($msg)
    {
      sfContext::getInstance()->getLogger()->debug($msg);
    }
}

?>
