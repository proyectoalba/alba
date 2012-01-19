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
 * relAnioActividad Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class relAnioActividadActions extends autorelAnioActividadActions
{

    protected function getRelAnioActividadOrCreate($id = 'id', $horas = '')  {
        if (!$this->getRequestParameter($id)) {
            $rel_anio_actividad = new RelAnioActividad();
        } else {
            $rel_anio_actividad = RelAnioActividadPeer::retrieveByPk($this->getRequestParameter($id));
            $this->forward404Unless($rel_anio_actividad);
        }
        return $rel_anio_actividad;
    }                                     
    
    protected function updateRelAnioActividadFromRequest() {
        $rel_anio_actividad = $this->getRequestParameter('rel_anio_actividad');
        if (isset($rel_anio_actividad['fk_anio_id'])) {
            $this->rel_anio_actividad->setFkAnioId($rel_anio_actividad['fk_anio_id'] ? $rel_anio_actividad['fk_anio_id'] : null);
        }

        if (isset($rel_anio_actividad['fk_actividad_id'])) {
            $this->rel_anio_actividad->setFkActividadId($rel_anio_actividad['fk_actividad_id'] ? $rel_anio_actividad['fk_actividad_id'] : null);
        }

        if (isset($rel_anio_actividad['fk_orientacion_id'])) {
            $this->rel_anio_actividad->setFkOrientacionId($rel_anio_actividad['fk_orientacion_id'] ? $rel_anio_actividad['fk_orientacion_id'] : null);
        }

        if (isset($rel_anio_actividad['horas'])) {
            $this->rel_anio_actividad->setHoras($rel_anio_actividad['horas']);
        }

    }

    protected function addFiltersCriteria($c) {

        if (isset($this->filters['fk_anio_id_is_empty']))
        {
            $criterion = $c->getNewCriterion(RelAnioActividadPeer::FK_ANIO_ID, '');
            $criterion->addOr($c->getNewCriterion(RelAnioActividadPeer::FK_ANIO_ID, null, Criteria::ISNULL));
            $c->add($criterion);
        }
        else if (isset($this->filters['fk_anio_id']) && $this->filters['fk_anio_id'] !== '')
        {
            $c->add(RelAnioActividadPeer::FK_ANIO_ID, $this->filters['fk_anio_id']);
        }
        if (isset($this->filters['fk_actividad_id_is_empty']))
        {
            $criterion = $c->getNewCriterion(RelAnioActividadPeer::FK_ACTIVIDAD_ID, '');
            $criterion->addOr($c->getNewCriterion(RelAnioActividadPeer::FK_ACTIVIDAD_ID, null, Criteria::ISNULL));
            $c->add($criterion);
        }
        else if (isset($this->filters['fk_actividad_id']) && $this->filters['fk_actividad_id'] !== '')
        {
            $c->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->filters['fk_actividad_id']);
        }
        if (isset($this->filters['fk_orientacion_id_is_empty']))
        {
            $criterion = $c->getNewCriterion(RelAnioActividadPeer::FK_ORIENTACION_ID, '');
            $criterion->addOr($c->getNewCriterion(RelAnioActividadPeer::FK_ORIENTACION_ID, null, Criteria::ISNULL));
            $c->add($criterion);
        }
        else if (isset($this->filters['fk_orientacion_id']) && $this->filters['fk_orientacion_id'] !== '')
        {
            $c->add(RelAnioActividadPeer::FK_ORIENTACION_ID, $this->filters['fk_orientacion_id']);
        }

        if (isset($this->filters['carrera']) && $this->filters['carrera'] !== '') {
            $c->add(AnioPeer::FK_CARRERA_ID, $this->filters['carrera']);
            $c->addJoin(AnioPeer::ID, RelAnioActividadPeer::FK_ANIO_ID);
        }
    }

}
?>
