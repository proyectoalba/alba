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
 * albaCUITValidator Valida el CUIT
 *
 * @package    alba
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>  
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class albaCUITValidator extends sfValidator {
    
    function initialize($context, $parameters = null) 
    {
        // initialize parent
        parent::initialize($context);
        
        // set defaults
        $this->getParameterHolder()->set('cuit_error', 'CUIT Invalido');
        $this->getParameterHolder()->add($parameters);
        return true;
    }
    
    public function execute(&$value, &$error)
    {
        $cuit = $value;
        $coeficiente = array(5,4,3,2,7,6,5,4,3,2);
        $cuit_rearmado = "";
        //separo cualquier caracter que no tenga que ver con numeros
        for ($i=0; $i < strlen($cuit); $i= $i +1) {
            if ((Ord(substr($cuit, $i, 1)) >= 48) && (Ord(substr($cuit, $i, 1)) <= 57))
                $cuit_rearmado = $cuit_rearmado . substr($cuit, $i, 1);
        }

        // si no estan todos los digitos
        if (strlen($cuit_rearmado) <> 11) {
            $error = $this->getParameterHolder()->get('cuit_error');
            return false;
        } else {
            $sumador = 0;
            $verificador = substr($cuit_rearmado, 10, 1); //tomo el digito verificador

            for ($i=0; $i <=9; $i=$i+1)
                $sumador = $sumador + (substr($cuit_rearmado, $i, 1)) * $coeficiente[$i];//separo cada digito y lo multiplico por el coeficiente

            $resultado = $sumador % 11;
            $resultado = 11 - $resultado;  //saco el digito verificador

            if (intval($verificador) <> $resultado) {
                $error = $this->getParameterHolder()->get('cuit_error');
                return false;
            } else {
                //$cuit_rearmado = substr($cuit_rearmado, 0, 2) . "-" . substr($cuit_rearmado, 2, 8) . "-" . substr($cuit_rearmado, 10, 1);
                return true;
            }
        }
    }
}
?>
