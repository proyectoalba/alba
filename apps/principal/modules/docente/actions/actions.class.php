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
    public function preExecute() {
        $this->vista = $this->getRequestParameter('vista');
    }

    function executeActividadesPorDocente() {
        $this->redirect('relActividadDocente/list?filters%5Bfk_docente_id%5D='.$this->getRequestParameter('id').'&filter=filtrar');
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
    }

    protected function deleteDocente($docente)
    {
        $id = $docente->getId();
        $docente->delete();     
        $criteria = new Criteria();                                                       
        $criteria->add(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID, $id);
        $relDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doDelete($criteria);
    }

     protected function addFiltersCriteria(&$c)
     {
         $c->addJoin(DocentePeer::ID,RelDocenteEstablecimientoPeer::FK_DOCENTE_ID, Criteria::LEFT_JOIN);
         $c->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->getUser()->getAttribute('fk_establecimiento_id'));
     }


}

?>