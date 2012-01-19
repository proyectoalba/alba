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
 * division Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class divisionActions extends autodivisionActions
{
    public function executeAlumnosPorDivision() {
        $this->redirect('alumno/list?filters%5Bdivision%5D='.$this->getRequestParameter('id').'&filter=filtrar');
    }

    protected function addFiltersCriteria($c) {
    
        $c->addJoin(TurnoPeer::ID, DivisionPeer::FK_TURNO_ID);
        $c->add(TurnoPeer::FK_CICLOLECTIVO_ID, $this->getUser()->getAttribute('fk_ciclolectivo_id'));
    
        if (isset($this->filters['fk_anio_id_is_empty'])) {
            $criterion = $c->getNewCriterion(DivisionPeer::FK_ANIO_ID, '');
            $criterion->addOr($c->getNewCriterion(DivisionPeer::FK_ANIO_ID, null, Criteria::ISNULL));
            $c->add($criterion);
        }  else if (isset($this->filters['fk_anio_id']) && $this->filters['fk_anio_id'] !== '') {
            $c->add(DivisionPeer::FK_ANIO_ID, $this->filters['fk_anio_id']);
        }

        if (isset($this->filters['fk_orientacion_id_is_empty'])) {
            $criterion = $c->getNewCriterion(DivisionPeer::FK_ORIENTACION_ID, '');
            $criterion->addOr($c->getNewCriterion(DivisionPeer::FK_ORIENTACION_ID, null, Criteria::ISNULL));
            $c->add($criterion);
        } else if (isset($this->filters['fk_orientacion_id']) && $this->filters['fk_orientacion_id'] !== '') {
            $c->add(DivisionPeer::FK_ORIENTACION_ID, $this->filters['fk_orientacion_id']);
        }

        if (isset($this->filters['fk_turno_id_is_empty'])) {
           $criterion = $c->getNewCriterion(DivisionPeer::FK_TURNO_ID, '');
           $criterion->addOr($c->getNewCriterion(DivisionPeer::FK_TURNO_ID, null, Criteria::ISNULL));
           $c->add($criterion);
        }
        else if (isset($this->filters['fk_turno_id']) && $this->filters['fk_turno_id'] !== '') {
           $c->add(DivisionPeer::FK_TURNO_ID, $this->filters['fk_turno_id']);
        }

        if (isset($this->filters['carrera']) && $this->filters['carrera'] !== '') {
            $c->add(AnioPeer::FK_CARRERA_ID, $this->filters['carrera']);
            $c->addJoin(AnioPeer::ID, DivisionPeer::FK_ANIO_ID);
        }
    }

}

?>
