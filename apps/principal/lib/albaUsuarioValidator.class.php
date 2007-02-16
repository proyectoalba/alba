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
 * albaUsuarioValidator valida el usuario.
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class albaUsuarioValidator extends sfValidator {

    
    function initialize($context, $parameters = null) 
    {
        // initialize parent
        parent::initialize($context);
        
        // set defaults
        $this->getParameterHolder()->set('usuario_error', 'Invalid input');
        $this->getParameterHolder()->add($parameters);
        return true;
    }
    
    /**
      * Ejecuta la validación del usuario.
      *
      * @param value A file or parameter value/array.
      * @param error An error message reference.
      *
      * @return bool verdadero, si ha pasado con éxtio la validación, de lo contrario falso.
    */

    public function execute(&$value, &$error)
    {

        $campo_param = $this->getParameterHolder()->get('campo');
        $usuario = $this->getContext()->getRequest()->getParameter($campo_param);

        $campo_param = $this->getParameterHolder()->get('campo_id');
        $id = $this->getContext()->getRequest()->getParameter($campo_param);

        $c = new Criteria();
        $c->add(UsuarioPeer::USUARIO, $usuario['usuario'], Criteria::EQUAL);
        $u = UsuarioPeer::doSelectOne($c);

/*
        print_R($id);
        print_R($usuario['usuario']);
        print_R($u->getUsuario());die;
  */     
        // existe o no el mismo usuario en la DB
        if($u) {
           if(($u->getUsuario() == $usuario['usuario']) AND ($id ==  $u->getId())) {
            return true;
           } else {
            $error = $this->getParameterHolder()->get('usuario_error');
            return false;
           } 
        } else {
            return true;
        }
    }

}

?>