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
 * feriado Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class feriadoActions extends autoferiadoActions
{

    public function executeLinkMinisterio() {

        return $this->redirect("http://www.mininterior.gov.ar/servicios/feriados.asp");
    
    }


/* 
    Sobreescribo la accion del generator porque nefecito que el combo 
    del ciclo lectivo sea dependiente de la session fk_establecimiento_id
*/
  public function executeEdit ()                                                                    
  {                                                                                                 
    $this->feriado = $this->getFeriadoOrCreate();                    
    
    $criteria = new Criteria();                                                       
    $criteria->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $this->getUser()->getAttribute('fk_establecimiento_id'));
    $cicloslectivos = CiclolectivoPeer::doSelect($criteria);                     
    $this->debugMessage(count($cicloslectivos));
    $optionsCiclolectivo = array();                                                
    foreach ($cicloslectivos as $ciclolectivo) {                                 
        $optionsCiclolectivo[$ciclolectivo->getId()] = $ciclolectivo->getDescripcion();
    }                                                                                 
    asort($optionsCiclolectivo);                                                   
    $this->optionsCiclolectivo = $optionsCiclolectivo;                          
                                                                                                                 
                                                                                                    
    if ($this->getRequest()->getMethod() == sfRequest::POST)                                        
    {                                                                                               
      $this->feriado = $this->getFeriadoOrCreate();                                                 
                                                                                                    
      $this->updateFeriadoFromRequest();                                                            
                                                                                                    
      $this->saveFeriado($this->feriado);                                                           
                                                                                                    
      $this->setFlash('notice', 'Your modifications have been saved');                              
                                                                                                    
      if ($this->getRequestParameter('save_and_add'))                                               
      {                                                                                             
        return $this->redirect('feriado/create');                                                   
      }                                                                                             
      else                                                                                          
      {                                                                                             
        return $this->redirect('feriado/edit?id='.$this->feriado->getId());                         
      }                                                                                             
    }                                                                                               
    else                                                                                            
    {                                                                                               
      // add javascripts                                                                            
      $this->getResponse()->addJavascript('/sf/js/prototype/prototype');                            
      $this->getResponse()->addJavascript('/sf/js/sf_admin/collapse');                              
    }                                                                                               
  }                                                                                                 
           
	protected function addFiltersCriteria(&$c) {                                                                                    
		$c->add(FeriadoPeer::FK_CICLOLECTIVO_ID,$this->getUser()->getAttribute('fk_ciclolectivo_id'));
    }                                                                                                   

}

?>
