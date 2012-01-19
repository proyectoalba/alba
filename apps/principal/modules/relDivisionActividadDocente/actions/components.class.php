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
 * relDivisionActividadDocente components
 *
 * @package    alba
 * @subpackage relDivisionActividadDocente
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: actions.class.php 4492 2007-03-19 14:59:17Z josx $
 * @filesource
 * @license GPL
 */
class relDivisionActividadDocenteComponents extends sfComponents
{
    public function executePorDivision() {
        $c = new Criteria();
        if($this->id_division) {
            $division = DivisionPeer::retrieveByPk($this->id_division);
            $c->add(RelAnioActividadPeer::FK_ANIO_ID, $division->getFkAnioId());
            $c->addJoin(ActividadPeer::ID, RelAnioActividadPeer::FK_ACTIVIDAD_ID);
        }
        $actividades = ActividadPeer::doSelect($c);
        $this->actividades = $actividades;
    }
}
?>
