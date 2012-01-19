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
 * relAlumnoDivision Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @licence GPL
 */

class relAlumnoDivisionActions extends autorelAlumnoDivisionActions
{
    protected function addFiltersCriteria ($c)                                                                                
    {                                                                                                                          
        $c->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID,$this->getUser()->getAttribute('fk_establecimiento_id'));                      
        $c->addJoin(AlumnoPeer::ID,RelAlumnoDivisionPeer::FK_ALUMNO_ID);
        if (isset($this->filters['fk_alumno_id_is_empty']))                                                                      
        {                                                                                                                        
          $criterion = $c->getNewCriterion(RelAlumnoDivisionPeer::FK_ALUMNO_ID, '');                                             
          $criterion->addOr($c->getNewCriterion(RelAlumnoDivisionPeer::FK_ALUMNO_ID, null, Criteria::ISNULL));                   
          $c->add($criterion);                                                                                                   
        }                                                                                                                        
        else if (isset($this->filters['fk_alumno_id']) && $this->filters['fk_alumno_id'] !== '')                                 
        {                                                                                                                        
          $c->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->filters['fk_alumno_id']);                                          
        }                                                                                                                        
        if (isset($this->filters['fk_division_id_is_empty']))                                                                    
        {                                                                                                                        
          $criterion = $c->getNewCriterion(RelAlumnoDivisionPeer::FK_DIVISION_ID, '');                                           
          $criterion->addOr($c->getNewCriterion(RelAlumnoDivisionPeer::FK_DIVISION_ID, null, Criteria::ISNULL));                 
          $c->add($criterion);                                                                                                   
        }                                                                                                                        
        else if (isset($this->filters['fk_division_id']) && $this->filters['fk_division_id'] !== '')                             
        {                                                                                                                        
          $c->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->filters['fk_division_id']);                                      
        }                                                                                                                        
    }  


    // Valida si ya esta en la tabla este conjunto de datos ( alumno, division )
/*
    function validateEdit() {
         if ($this->getRequest()->getMethod() == sfRequest::POST) {
            $rel_alumno_division = $this->getRequestParameter('rel_alumno_division');
            $c = new Criteria();
            $c->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $rel_alumno_division['fk_alumno_id']);
            $c->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $rel_alumno_division['fk_division_id']);
            $aRelAlumnoDivision = RelAlumnoDivisionPeer::doSelect($c);
            if(count($aRelAlumnoDivision) > 0) {
                $this->getRequest()->setError('rel_alumno_division{fk_alumno_id}', 'Esta asociaci&oacute;n ya fue hecha');
                $this->getRequest()->setError('rel_alumno_division{fk_division_id}', 'Esta asociaci&oacute;n ya fue hecha');
                return false;
            }
        }
        return true;
    }
*/



        function executeBusqueda() {
        $aAlumnoId = array();
        $criteria = new Criteria();

        if($this->getRequestParameter('filtro_nombre_alumnos')) {
            $txt_nombre = $this->getRequestParameter('filtro_nombre_alumnos');
            $cton1 = $criteria->getNewCriterion(AlumnoPeer::APELLIDO, "$txt_nombre%", Criteria::LIKE);
        }

        if($this->getRequestParameter('filtro_alumnos')) {
            switch($this->getRequestParameter('filtro_alumnos')) {
                case 0: break;
                case 1: 
                        $c = new Criteria();
                        $c->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $this->getUser()->getAttribute('fk_establecimiento_id'));
                        $c->addJoin(RelAlumnoDivisionPeer::FK_DIVISION_ID, DivisionPeer::ID);
                        $c->addJoin(AnioPeer::ID, DivisionPeer::FK_ANIO_ID);
                        $relAlumnoDivision = RelAlumnoDivisionPeer::doSelect($c);
                        foreach($relAlumnoDivision as $r) {
                            $aAlumnoId[] = $r->getFkAlumnoId();
                        }
                        $criteria->add(AlumnoPeer::ID, $r->getFkAlumnoId(), Criteria::NOT_IN);
                        $cton2 = $criteria->getNewCriterion(AlumnoPeer::ID, $aAlumnoId, Criteria::NOT_IN);
                        if($this->getRequestParameter('filtro_nombre_alumnos')) {
                            $cton1->addAnd($cton2);
                        } else {
                            $criteria->add($cton2);
                        }

                        break;
                default:
            }
        }

        if($this->getRequestParameter('filtro_nombre_alumnos')) {
            $criteria->add($cton1);
        }

        $alumnos = AlumnoPeer::doSelect($criteria);
        $this->optionsAlumno = $alumnos;
    }



    function executeBusquedaDivision() {
        $criteria = new Criteria();

        if($this->getRequestParameter('filtro_nombre_divisiones')) {
            $txt_nombre = $this->getRequestParameter('filtro_nombre_divisiones');
            $criteria->add(DivisionPeer::DESCRIPCION, "$txt_nombre%", Criteria::LIKE);
        }

        if($this->getRequestParameter('fk_turno_id')) {
            $criteria->add(DivisionPeer::FK_TURNO_ID, $this->getRequestParameter('fk_turno_id'));
        }

        if($this->getRequestParameter('fk_orientacion_id')) {
            $criteria->add(DivisionPeer::FK_ORIENTACION_ID, $this->getRequestParameter('fk_orientacion_id'));
        }   

        if($this->getRequestParameter('fk_anio_id')) {
            $criteria->add(DivisionPeer::FK_ANIO_ID, $this->getRequestParameter('fk_anio_id'));
        }

/*

        if($this->getRequestParameter('filtro_divisiones')) {
            switch($this->getRequestParameter('filtro_divisiones')) {
                case 0: break;
                case 1: break;
                default:
            }
        }

*/
        $this->optionsDivision = $this->getDivisionesDeEstablecimiento($criteria);
        $this->alumnoDivision = $this->getAlumnosPorDivision();
    }


    function getDivisionesDeEstablecimiento($c = null ) {
        $optionsDivision = array();
        if($c == null) {
            $c = new Criteria();
        }

        //Listado de division del establecimiento
        $c->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $this->getUser()->getAttribute('fk_establecimiento_id'));
        $c->addJoin(AnioPeer::ID, DivisionPeer::FK_ANIO_ID);
        $aDivision = DivisionPeer::doSelect($c);
        $this->division = $aDivision;

        $optionsDivision = array();
        foreach($aDivision as $division) {
            $optionsDivision[$division->getId()] = $division->__toString();
        }
        return $optionsDivision;

    }

/*
    function executeEdit($request) {
        //Listado de alumnos
        $c = new Criteria();
        $aAlumno = AlumnoPeer::doSelect($c);
        $this->optionsAlumno = $aAlumno;

        $this->optionsDivision = $this->getDivisionesDeEstablecimiento();
        $this->alumnoDivision = $this->getAlumnosPorDivision();
    }
*/


    function getAlumnosPorDivision() {
    // Alumnos por division
        $aAlumnoDivision = array();
        $c = new Criteria();
        $c->clearSelectColumns();
        $c->addSelectColumn(AlumnoPeer::NOMBRE);
        $c->addSelectColumn(AlumnoPeer::APELLIDO);
        $c->addSelectColumn(DivisionPeer::ID);
        $c->addSelectColumn(AlumnoPeer::ID);
        $c->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $this->getUser()->getAttribute('fk_establecimiento_id'));
        $c->addJoin(AnioPeer::ID, DivisionPeer::FK_ANIO_ID);
        $c->addJoin(RelAlumnoDivisionPeer::FK_DIVISION_ID, DivisionPeer::ID);
        $c->addJoin(AlumnoPeer::ID, RelAlumnoDivisionPeer::FK_ALUMNO_ID);
        $alumnosDivisiones = BasePeer::doSelect($c);
        foreach($alumnosDivisiones as $alumnoDivision) {
            if(!array_key_exists($alumnoDivision[2], $aAlumnoDivision)) {
                $aAlumnoDivision["{$alumnoDivision['2']}"] = array();
            }
            array_push( $aAlumnoDivision["{$alumnoDivision['2']}"], (object) array(  'nombre' => $alumnoDivision[1].", ".$alumnoDivision[0], 'id' =>  $alumnoDivision[3])); 
        }
        return $aAlumnoDivision;
    }


    function save($aAlumno, $aDivision)    {
//         $aAlumno = $this->getRequest()->getParameterHolder()->get('alumno');
//         $aDivision = $this->getRequest()->getParameterHolder()->get('division');

        if(count($aAlumno) > 0) {
            if(count($aDivision) > 0) {
                foreach($aAlumno as $alumno_id) {
                    foreach($aDivision as $division_id) {

                        //Borro si existe la relacion esta entre esta division y este alumno (Editar)
                        $c =  new Criteria();
                        $c->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $alumno_id);
                        $c->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $division_id);
                        RelAlumnoDivisionPeer::doDelete($c);

                        // Doy de alta la nueva relacion entre alumno y division
                        $ad = new RelAlumnoDivision();
                        $ad->setFkAlumnoId($alumno_id);
                        $ad->setFkDivisionId($division_id);
                        $ad->save();
                        unset($ad);
                    }
                }
            }
        }

//         return $this->redirect('relAlumnoDivision/edit?id='.$usuarioId);
    }

/*
  public function executeDelete($request) {

    $aAlumno = $this->getRequest()->getParameterHolder()->get('alumno');
    $division_id = $this->getRequestParameter('division_id');

    $c =  new Criteria();
    $cton1 = $c->getNewCriterion(RelAlumnoDivisionPeer::FK_DIVISION_ID, $division_id);
    foreach($aAlumno as $alumno_id) {
        $cton1->addOr($c->getNewCriterion(RelAlumnoDivisionPeer::FK_DIVISION_ID, $division_id));
    }
    $c->add($cton1);

    try
    {
      RelAlumnoDivisionPeer::doDelete($c);
      return $this->redirect('relAlumnoDivision/list');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Rel alumno division. Make sure it does not have any associated items.');
//       return $this->forward('relAlumnoDivision', 'list');
    }
  }
  */
    public function executeAsignarAlumno(){
        $division_id = $this->getRequestParameter('division_id');
        $tmp = split('_', $this->getRequestParameter('id', ''));
        $alumno_id = $tmp[1];
        $this->save(array($alumno_id), array($division_id));

        $aAlumno = $this->getAlumnosPorDivision();
        if(array_key_exists($division_id, $aAlumno)) {
            $this->alumnos = $aAlumno[$division_id];
        } else {
            $this->alumnos = array();
        }

    }
}
?>
