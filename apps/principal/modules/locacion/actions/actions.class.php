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
 * locacion Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class locacionActions extends autolocacionActions
{
    public function preExecute() {
         $this->vista = $this->getRequestParameter('vista');
    }
    

    // Automaticamente al guardar por primera vez una locacion, además guarda una relación con el establecimeinto actual
    public function saveLocacion($locacion) {

        $id = $locacion->getId();

        new sfUser(); // nasty hack to load propel
        $con = Propel::getConnection();
        try {

            $con->begin();

            if ($locacion->getPrincipal()) {

//                 $c1 = new Criteria();
//                 $c1->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->getUser()->getAttribute('fk_establecimiento_id'));
//                 $c1->addJoin(LocacionPeer::ID, RelEstablecimientoLocacionPeer::FK_LOCACION_ID);
//                 $c2 = new Criteria();
//                 $c2->add(LocacionPeer::PRINCIPAL,false);
//                 BasePeer::doUpdate($c1,$c2,$con);

                // Aparentemente propel no soporta aun joins dentro del update
                $s = "UPDATE rel_establecimiento_locacion,locacion SET locacion.principal = 0 WHERE locacion.id = rel_establecimiento_locacion.fk_locacion_id AND rel_establecimiento_locacion.fk_establecimiento_id = ".$this->getUser()->getAttribute('fk_establecimiento_id');
                $stmt = $con->createStatement();
                $alumnos = $stmt->executeQuery($s);
            }
            
            $locacion->save();                                                                
            if(!$id) {
                $relEstablecimientoLocacion = new RelEstablecimientoLocacion();
                $relEstablecimientoLocacion ->setFkEstablecimientoId($this->getUser()->getAttribute('fk_establecimiento_id'));
                $relEstablecimientoLocacion ->setFkLocacionId($locacion->getId());
                $relEstablecimientoLocacion ->save();
            }

            $con->commit();

        }
        catch (Exception $e) {
            $con->rollback();
            throw $e;
        }

    }

    protected function deleteLocacion($locacion) {
        $id = $locacion->getId();
        $locacion->delete();
        $criteria = new Criteria();
        $criteria->add(RelEstablecimientoLocacionPeer::FK_LOCACION_ID, $id);
        $relEstablecimientoLocacion = RelEstablecimientoLocacionPeer::doDelete($criteria);
    }


    public function executeVerEstablecimiento() {
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
        $this->redirect( 'establecimiento?action=editLocacion&id='.$establecimiento_id);
    }

}

?>