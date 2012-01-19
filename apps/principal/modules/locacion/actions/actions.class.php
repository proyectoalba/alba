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
    // Automaticamente al guardar por primera vez una locacion, además guarda una relación con el establecimeinto actual
    public function saveLocacion($locacion) {

        $id = $locacion->getId();
        //new sfUser(); // nasty hack to load propel
        $con = Propel::getConnection();
        try {

            $con->beginTransaction();

            if ($locacion->getPrincipal()) {

                // Aparentemente propel no soporta aun joins dentro del update
                $s = "UPDATE rel_establecimiento_locacion,locacion SET locacion.principal = 0 ";
                $s .= "WHERE locacion.id = rel_establecimiento_locacion.fk_locacion_id AND ";
                $s .= "rel_establecimiento_locacion.fk_establecimiento_id = ".$this->getUser()->getAttribute('fk_establecimiento_id');

                $alumnos = $con->query($s);
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
            $con->rollBack();
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
        $this->redirect( 'establecimiento/editLocacion?id='.$establecimiento_id);
    }

    public function executeCambiarPais() {
        $this->pais_id = $this->getRequestParameter('pais_id');
        $this->provincia_id = $this->getRequestParameter('provincia_id');
        $c = new Criteria();
        $c->add(ProvinciaPeer::FK_PAIS_ID, $this->pais_id);
        $this->provincias = ProvinciaPeer::getEnOrden($c);
    }

    protected function addFiltersCriteria($c){
        if (isset($this->filters['nombre']) && $this->filters['nombre'] !== ''){
            $c->add(LocacionPeer::NOMBRE, "%". $this->filters['nombre']."%", Criteria::LIKE);
        }
    }
}
?>
