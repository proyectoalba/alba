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
 * establecimiento Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class establecimientoActions extends autoestablecimientoActions
{
    public function preExecute() {
        $this->vista = $this->getRequestParameter('vista');
    }

    function executeEditLocacion() {

        $c = new Criteria();
        $c->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->getRequestParameter('id'));
        // estas son las locaciones del establecimiento actual
        $establecimientoLocaciones = RelEstablecimientoLocacionPeer::doSelectJoinLocacion($c);
                     
        $this->optionsEstablecimientoLocaciones = array();
        foreach($establecimientoLocaciones as $establecimientoLocacion) {
            $this->optionsEstablecimientoLocaciones[$establecimientoLocacion->getFkLocacionId()] = $establecimientoLocacion->getLocacion()->getNombre();
        }
                                                               
        // estos son todas las locaciones existentes
        $todasLasLocaciones = array();
        $locaciones = LocacionPeer::doSelect(new Criteria());
        foreach($locaciones as $locacion) {
            $todasLasLocaciones[$locacion->getId()] = $locacion->getNombre();
        }
        
        // estos son las locaciones existentes menos las del establecimiento
        $this->optionsLocaciones = array_diff_key($todasLasLocaciones, $this->optionsEstablecimientoLocaciones);
        $this->establecimiento = EstablecimientoPeer::retrieveByPK($this->getRequestParameter('id'));
    }


    function executeSaveLocacion() {
       // borrar todas las locaciones para un establecimientos determinado
        $establecimientoId = $this->getRequestParameter('id');
        $aLocacion = $this->getRequest()->getParameterHolder()->get('establecimientoLocacion');

        $c =  new Criteria();
        $c->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $establecimientoId);
        RelEstablecimientoLocacionPeer::doDelete($c);

        if(count($aLocacion) > 0) {
            // grabar todos los que vienen seleccionados
            // aqui se debe poder grabar haciendo un solo insert
            $c =  new Criteria();
            foreach($aLocacion as $locacionId) {
                $p = new RelEstablecimientoLocacion();
                $p->setFkLocacionId($locacionId);
                $p->setFkEstablecimientoId($establecimientoId);
                $p->save();
                unset($p);
            }
        }
        $this->setFlash('notice','Se ha grabado correctamente.');
        return $this->redirect('establecimiento/editLocacion?id='.$establecimientoId);
    
    }

    /**
    * form para cambiar el establecimiento actual
    */
    public function executeCambiar() {
        $this->establecimientos = EstablecimientoPeer::doSelect(new Criteria());                           
        $this->referer =  $this->getRequest()->getReferer();
    }

    public function executeActual() {
        $id = $this->getRequestParameter('establecimiento');
        $c = new Criteria();
        $c->add(EstablecimientoPeer::ID,$id);
        $establecimiento = EstablecimientoPeer::doSelectOne($c);
        if ($establecimiento) {
            $this->getUser()->setAttribute('fk_establecimiento_id',$id);
            $this->getUser()->setAttribute('establecimiento_nombre',$establecimiento->getNombre());
            //  $this->setFlash('notice', 'Se ha cambiado de establecimiento');
        }
  
        return $this->redirect($this->getRequestParameter('referer', '@homepage'));
    }
    

}

?>