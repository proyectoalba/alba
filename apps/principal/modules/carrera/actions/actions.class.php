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
 * carrera actions.
 *
 * @package    alba
 * @subpackage carrera
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z josx $
 */
class carreraActions extends autocarreraActions
{
    protected function addFiltersCriteria ($c) {
        $c->add(CarreraPeer::FK_ESTABLECIMIENTO_ID,$this->getUser()->getAttribute('fk_establecimiento_id'));
    }

    protected function saveCarrera ($carrera) {
        $carrera->setFkEstablecimientoId($this->getUser()->getAttribute('fk_establecimiento_id'));
        $carrera->save();
    }
}

?>
