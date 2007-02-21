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
    public function preExecute() {
        $this->vista = $this->getRequestParameter('vista');
    }
    protected function addFiltersCriteria (&$c)                                                                                
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

}
?>
