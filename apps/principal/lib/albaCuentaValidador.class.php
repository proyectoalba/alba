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
 * albaCuentaValidador valida el cuenta.
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: albaCuentaValidador.class.php 4242 2007-02-16 20:00:22Z ftoledo $
 * @filesource
 * @license GPL
 */

class albaCuentaValidador extends sfValidator {

    
    function initialize($context, $parameters = null) 
    {
        // initialize parent
        parent::initialize($context);
        
        // set defaults
        $this->getParameterHolder()->set('cuenta_error', 'Invalid input');
        $this->getParameterHolder()->add($parameters);
        return true;
    }
    
    /**
      * Ejecuta la validación del cuenta.
      *
      * @param value A file or parameter value/array.
      * @param error An error message reference.
      *
      * @return bool verdadero, si ha pasado con éxtio la validación, de lo contrario falso.
    */

    public function execute(&$value, &$error)
    {

        $campo_param1 = $this->getParameterHolder()->get('campo');
        $cuenta = $this->getContext()->getRequest()->getParameter('cuenta');

        $campo_param = $this->getParameterHolder()->get('campo_id');
        $id = $this->getContext()->getRequest()->getParameter($campo_param);

        $c = new Criteria();
        $c->add(CuentaPeer::NOMBRE, $cuenta["$campo_param1"], Criteria::EQUAL);
        $cuentas = CuentaPeer::doSelectOne($c);

        // existe o no el mismo usuario en la DB
        if($cuentas) {
           if(($cuentas->getNombre() == $cuenta["$campo_param1"]) AND ($id ==  $cuentas->getId())) {
            return true;
           } else {
            $error = $this->getParameterHolder()->get('cuenta_error');
            return false;
           } 
        } else {
            return true;
        }
    }

}

?>