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
 * docente Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class docenteActions extends autodocenteActions
{
    function executeActividadesPorDocente() {
        $this->id_docente = $this->getRequestParameter('id');
        $this->docente = DocentePeer::RetrieveByPK($this->id_docente);
        if (!$this->docente){
            $this->forward404();
        }

        $c  = New Criteria();
        $c->Add(RelAnioActividadDocentePeer::FK_DOCENTE_ID,$this->docente->getId());
        $this->actividades = RelAnioActividadDocentePeer::doSelect($c); 
    }

    function executeHorariosPorDocente() {
        $this->redirect('docenteHorario/list?idDocente='.$this->getRequestParameter('id'));
    }

    protected function saveDocente($docente)
    {
        $id = $docente->getId();
        $docente->save();

        if(!$id) {
            $relDocenteEstablecimiento = new RelDocenteEstablecimiento();
            $relDocenteEstablecimiento->setFkDocenteId($docente->getId());
            $relDocenteEstablecimiento->setFkEstablecimientoId($this->getUser()->getAttribute('fk_establecimiento_id'));
            $relDocenteEstablecimiento->save();
        }
    
        // Update many-to-many for "actividades"
        $c = new Criteria();
        $c->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $docente->getPrimaryKey());
        RelAnioActividadDocentePeer::doDelete($c);
        $ids = $this->getRequestParameter('associated_actividades');
        if (is_array($ids)) {
            foreach ($ids as $id){
                $RelAnioActividadDocente = new RelAnioActividadDocente();
                $RelAnioActividadDocente->setFkDocenteId($docente->getPrimaryKey());
                $RelAnioActividadDocente->setFkAnioActividadId($id);
                $RelAnioActividadDocente->save();
            }
        }
    }

    protected function deleteDocente($docente)
    {
        $id = $docente->getId();
        $docente->delete();     
        $criteria = new Criteria();                                                       
        $criteria->add(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID, $id);
        $relDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doDelete($criteria);
    }

     protected function addFiltersCriteria($c)
     {
         if(isset($this->filters['apellido']) && $this->filters['apellido'] != '') {
            $cton1 = $c->getNewCriterion(DocentePeer::APELLIDO, "%".$this->filters['apellido']."%", Criteria::LIKE);
            $c->add($cton1);
         }
         if(isset($this->filters['nombre']) && $this->filters['nombre'] != '') {
            $cton2 = $c->getNewCriterion(DocentePeer::NOMBRE, "%".$this->filters['nombre']."%", Criteria::LIKE);
            $c->add($cton2);
         }
         $c->addJoin(DocentePeer::ID,RelDocenteEstablecimientoPeer::FK_DOCENTE_ID, Criteria::LEFT_JOIN);
         $c->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->getUser()->getAttribute('fk_establecimiento_id'));
     }

    public function executeCambiarPais() {
        $this->pais_id = $this->getRequestParameter('pais_id');
        $this->provincia_id = $this->getRequestParameter('provincia_id');
        $c = new Criteria();
        $c->add(ProvinciaPeer::FK_PAIS_ID, $this->pais_id);
        $this->provincias = ProvinciaPeer::getEnOrden($c);
    }
}

?>
