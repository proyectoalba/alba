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
 * Turnos Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class turnosActions extends autoturnosActions
{
    function addFiltersCriteria(&$c) {
        $c->add(TurnosPeer::FK_CICLOLECTIVO_ID,$this->getUser()->getAttribute('fk_ciclolectivo_id'));
    }
    
    function saveTurnos($turno) {
        $turno->setFkCiclolectivoId($this->getUser()->getAttribute('fk_ciclolectivo_id'));
        $turno->save();
    
    }


    protected function updateTurnosFromRequest()  {
    
        $turnos = $this->getRequestParameter('turnos');
    
        $turnos['hora_inicio'] = $this->_add_zeros($turnos['hora_inicio']['hour'],2).":".$this->_add_zeros($turnos['hora_inicio']['minute'],2)." ".$turnos['hora_inicio']['ampm'];
        $turnos['hora_fin']= $this->_add_zeros($turnos['hora_fin']['hour'],2).":".$this->_add_zeros($turnos['hora_fin']['minute'],2)." ".$turnos['hora_fin']['ampm'];




        if (isset($turnos['descripcion']))    {
            $this->turnos->setDescripcion($turnos['descripcion']);
        }
    
        if (isset($turnos['hora_inicio'])) {
            $this->turnos->setHoraInicio($turnos['hora_inicio']);
        }
        
        if (isset($turnos['hora_fin'])) {
        $this->turnos->setHoraFin($turnos['hora_fin']);
        }
  }

    function _add_zeros($string, $strlen) {
        if ($strlen > strlen($string))  {
            for ($x = strlen($string); $x < $strlen; $x++) {
                $string = '0' . $string;
            }
        }
        return $string;
    }


}

?>