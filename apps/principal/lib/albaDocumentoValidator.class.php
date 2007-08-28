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
 * albaDocumentoValidator Valida documento
 *
 * @package    alba
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>  
 * @version    SVN: $Id: albaDNIValidator.class.php 4347 2007-02-28 21:19:57Z josx $
 * @filesource
 * @license GPL
 */

class albaDocumentoValidator extends sfValidator {
    
    function initialize($context, $parameters = null) 
    {
        // initialize parent
        parent::initialize($context);
        // set defaults
        $this->getParameterHolder()->set('documento_error', 'Documento Invalido');
        $this->getParameterHolder()->set('nombre_campo1', null);
        $this->getParameterHolder()->set('nombre_campo2', null);
        $this->getParameterHolder()->add($parameters);

        return true;
    }
    
    public function execute(&$value, &$error)
    {
        $value_sin_puntos = str_replace(".", "", $value); // reemplaza si existen puntos en el documento

        if((!is_numeric($value_sin_puntos)) OR ($this->getParameterHolder()->get('nombre_campo1') == null)) { //verifica si es un valor numerico
            $error = $this->getParameterHolder()->get('documento_error');
            return false;
        }        

        // Esto quizas no deberia estar aqui
        // graba en el request el valor sin puntos
         if($this->getParameterHolder()->get('nombre_campo1') != null AND $this->getParameterHolder()->get('nombre_campo2') != null) {
             $temp = $this->getContext()->getRequest()->getParameter($this->getParameterHolder()->get('nombre_campo1'));
             $idx = $this->getParameterHolder()->get('nombre_campo2');
             $temp["$idx"] = str_replace(".", "", $temp["$idx"]); // esto se hace nuevamente por algun problema muy raro que no permite asignarle $value_sin_puntos
//           $temp["$idx"] = $b;
//           var_dump($temp);die;
             sfContext::getInstance()->getRequest()->setParameter($this->getParameterHolder()->get('nombre_campo1'), $temp);
         } else {
             sfContext::getInstance()->getRequest()->setParameter($this->getParameterHolder()->get('nombre_campo1'), $value_sin_puntos);
         }

        return true;
    }
}
?>