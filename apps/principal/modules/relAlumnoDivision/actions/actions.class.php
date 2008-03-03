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

    function executeEdit() {

        //Listado de alumnos
        $c = new Criteria();
        $aAlumno = AlumnoPeer::doSelect($c);
        $this->optionsAlumno = $aAlumno;

        //Listado de division
        $c = new Criteria();
        $aDivision = DivisionPeer::doSelect($c);

        $optionsDivision = array();
        foreach($aDivision as $division) {
            $optionsDivision[$division->getId()] = $division->__toString();
        }
        $this->optionsDivision = $optionsDivision;
    }


    function executeSave()    {
        $aAlumno = $this->getRequest()->getParameterHolder()->get('alumno');
        $aDivision = $this->getRequest()->getParameterHolder()->get('division');

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
                        $ad = new RelAlumnosDivision();
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


  public function executeDelete(){

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
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Rel alumno division. Make sure it does not have any associated items.');
//       return $this->forward('relAlumnoDivision', 'list');
    }
//     return $this->redirect('relAlumnoDivision/list');
  }
    public function executeAsignarAlumno(){
        print_r($_GET);
        print_r($_POST);
    }  
}
?>
