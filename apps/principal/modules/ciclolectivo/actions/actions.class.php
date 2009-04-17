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
 * ciclolectivo actions
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class ciclolectivoActions extends autociclolectivoActions
{

    public function executeAgregarTurnosYPeriodos() {

        $ciclolectivo_id = "";
        $aTurnos = array();
        $aPeriodo = array();
        $ciclolectivo = "";

        if($this->getRequestParameter('id')) {
            $ciclolectivo_id = $this->getRequestParameter('id');
        } else {

            $ciclolectivo_id = $this->getUser()->getAttribute('fk_ciclolectivo_id');
        }

        // info para completar el combo de ciclo lectivos
        $c = new Criteria();
        //$c->add(CiclolectivoPeer::ACTIVO, 1);
        $c->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID,$this->getUser()->getAttribute('fk_establecimiento_id'));
        $c->addAscendingOrderByColumn(CiclolectivoPeer::DESCRIPCION);
        $aCiclolectivo  = CiclolectivoPeer::doSelect($c);

        $optionsCiclolectivo = array();
        foreach($aCiclolectivo  as $ciclolectivo) {
            $optionsCiclolectivo[$ciclolectivo->getId()] = $ciclolectivo->getDescripcion();
        }
        
        $this->optionsCiclolectivo = $optionsCiclolectivo;

        if($ciclolectivo_id) {        
            $ciclolectivo = CiclolectivoPeer::retrieveByPk($ciclolectivo_id);
        
            $c = new Criteria();
            $c->add(TurnoPeer::FK_CICLOLECTIVO_ID, $ciclolectivo_id);
            $aTurnos  = TurnoPeer::doSelect($c);
        
            $c = new Criteria();
            $c->add(PeriodoPeer::FK_CICLOLECTIVO_ID, $ciclolectivo_id);
            $aPeriodo  = PeriodoPeer::doSelect($c);
        } else {
            $ciclolectivo  = new Ciclolectivo();
        }

        $this->aPeriodo = $aPeriodo;
        $this->aTurnos = $aTurnos;
        $this->ciclolectivo = $ciclolectivo;
    
    }

    public function executeDeleteTurno ()  {
        $this->turnos = TurnoPeer::retrieveByPk($this->getRequestParameter('idTurno'));
        $this->forward404Unless($this->turnos);
        $this->turnos->delete();
        return $this->forward('ciclolectivo','agregarTurnosYPeriodos','id/'.$this->getRequestParameter('id'));                
    }
                     
    public function executeDeletePeriodo ()  {
        $this->periodo = PeriodoPeer::retrieveByPk($this->getRequestParameter('idPeriodo'));
        $this->forward404Unless($this->periodo);
        $this->periodo->delete();
        return $this->forward('ciclolectivo','agregarTurnosYPeriodos','id/'.$this->getRequestParameter('id'));                
    }


    public function executeGrabarTurnosYPeriodos() {
        $ciclolectivo = $this->getRequestParameter('ciclolectivo');
        if(is_numeric($ciclolectivo['id'])) {
            $this->ciclolectivo = CiclolectivoPeer::retrieveByPk($ciclolectivo['id']);
            if(isset($ciclolectivo['descripcion'])) $this->ciclolectivo->setDescripcion($ciclolectivo['descripcion']);
            if(isset($ciclolectivo['fecha_fin'])) { 
                if($ciclolectivo['fecha_fin']) { 
                    list($d, $m, $y) =  sfContext::getInstance()->getI18N()->getDateForCulture($ciclolectivo['fecha_fin'], $this->getUser()->getCulture());
                    $this->ciclolectivo->setFechaFin("$y-$m-$d");
                }
            }    

            if(isset($ciclolectivo['fecha_inicio'])) { 
                if($ciclolectivo['fecha_inicio']) { 
                    list($d, $m, $y) = sfContext::getInstance()->getI18N()->getDateForCulture($ciclolectivo['fecha_inicio'], $this->getUser()->getCulture());
                    $this->ciclolectivo->setFechaInicio("$y-$m-$d");
                }
            }
                
            $this->ciclolectivo->save();            
        }
        
        $aTurnos = $this->getRequestParameter('turnos');
        if(is_array($aTurnos)) {        
            foreach($aTurnos as $turnos) {
                
                $horaInicio = $this->_add_zeros($turnos['hora_inicio']['hour'],2).":".$this->_add_zeros($turnos['hora_inicio']['minute'],2)." ".$turnos['hora_inicio']['ampm'];
                $horaFin = $this->_add_zeros($turnos['hora_fin']['hour'],2).":".$this->_add_zeros($turnos['hora_fin']['minute'],2)." ".$turnos['hora_fin']['ampm'];
                
                if($turnos['descripcion'] AND ($horaInicio != $horaFin) )  {
                
                    if(isset($turnos['id']) AND is_numeric($turnos['id'])) {
                        $this->turnos = TurnoPeer::retrieveByPk($turnos['id']);
                    } else {
                        $this->turnos = new Turno();
                    }
                
                    if(isset($turnos['descripcion'])) {
                        $this->turnos->setDescripcion($turnos['descripcion']);
                    }
                
                    $this->turnos->setHoraInicio($horaInicio);
                    $this->turnos->setHoraFin($horaFin);

                    $this->turnos->setFkCiclolectivoId($ciclolectivo['id']);
                    $this->turnos->save();
                }
            }    
        }


        $aPeriodo = $this->getRequestParameter('periodo');
        if(is_array($aPeriodo)) {        
            foreach($aPeriodo as $periodo) {
                if($periodo['descripcion'] AND ($periodo['fecha_inicio'] OR $periodo['fecha_fin']))  {
                
                    if(isset($periodo['id']) AND is_numeric($periodo['id'])) {
                        $this->periodo = PeriodoPeer::retrieveByPk($periodo['id']);
                    } else {
                        $this->periodo = new Periodo();
                    }
                
                    if(isset($periodo['descripcion'])) $this->periodo->setDescripcion($periodo['descripcion']);
                    
                    if(isset($periodo['fecha_inicio'])) { 
                        if($periodo['fecha_inicio']) { 
                            list($d, $m, $y) = sfContext::getInstance()->getI18N()->getDateForCulture($periodo['fecha_inicio'], $this->getUser()->getCulture());
                            $this->periodo->setFechaInicio("$y-$m-$d");
                        }
                    }    
                
                    if(isset($periodo['fecha_fin'])) { 
                        if($periodo['fecha_fin']) { 
                            list($d, $m, $y) = sfContext::getInstance()->getI18N()->getDateForCulture($periodo['fecha_fin'], $this->getUser()->getCulture());
                            $this->periodo->setFechaFin("$y-$m-$d");
                        }
                    }    
                    $this->periodo->setFkCiclolectivoId($ciclolectivo['id']);
                    $this->periodo->save();
                }

            }    
        }

        return $this->redirect('ciclolectivo/agregarTurnosYPeriodos?id='.$ciclolectivo['id']);        
    }

    public function handleErrorGrabarTurnosYPeriodos() {
        $ciclolectivo = $this->getRequestParameter('ciclolectivo');
        $this->forward('ciclolectivo','agregarTurnosYPeriodos','id='.$ciclolectivo['id']);
    }
    
    private function _add_zeros($string, $strlen) {
        if ($strlen > strlen($string))  {
            for ($x = strlen($string); $x < $strlen; $x++) {
                $string = '0' . $string;
            }
        }
        return $string;
    }

    protected function addFiltersCriteria($c)
     {
         
         $c->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $this->getUser()->getAttribute('fk_establecimiento_id'));
     }
	protected function saveCiclolectivo($ciclolectivo)                                      
   	{                                                                                       
		//si se guarda el ciclo y se marca como actual
		//los demas ciclo del establecimiento tiene que quedar como ACUAL = false

		// $con = sfContext::getInstance()->getDatabaseConnection('propel');
//		new sfUser(); // nasty hack to load propel

		$con = Propel::getConnection();
		try {
			$con->begin();
			if ($ciclolectivo->getActual()) {
				$c1 = new Criteria();
				$c1->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID,$this->getUser()->getAttribute('fk_establecimiento_id'));
				$c2 = new Criteria();
				$c2->add(CiclolectivoPeer::ACTUAL,false);
				BasePeer::doUpdate($c1,$c2,$con);
						
			}
            $ciclolectivo->setFkEstablecimientoId($this->getUser()->getAttribute('fk_establecimiento_id'));			
    		$ciclolectivo->save();                                                                
			$con->commit();

			//cambio el attributo porque se cambio el ciclo actual
			$this->getUser()->setAttribute('fk_ciclolectivo_id',$ciclolectivo->getId());
			$this->getUser()->setAttribute('ciclolectivo_descripcion',$ciclolectivo->getDescripcion());
		
		}
		catch (Exception $e){
			$con->rollback();
			throw $e;
		}
   	}
    
    /**
    * Cambia el ciclo lectivo actual   
    */                                
    public function executeCambiar() {
        $c = new Criteria ();
        $c->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID,$this->getUser()->getAttribute('fk_establecimiento_id'));
        $this->cicloslectivos = CiclolectivoPeer::doSelect($c);
        $this->referer =  $this->getRequest()->getReferer();   
    }                                                       
    
    /**
    * pone como actual elciclo lectivo seleccionado
    */
    public function executeActual() {
        $id = $this->getRequestParameter('ciclolectivo');
        $c = new Criteria();
        $c->add(CiclolectivoPeer::ID,$id);
        $ciclolectivo = CiclolectivoPeer::doSelectOne($c);
        if ($ciclolectivo) {
            $this->getUser()->setAttribute('fk_ciclolectivo_id',$id);
            $this->getUser()->setAttribute('ciclolectivo_descripcion',$ciclolectivo->getDescripcion());
//            $this->getUser()->setFlash('notice','Se ha cambiado correctamente de ciclo lectivo.');
        }
        
        return $this->redirect($this->getRequestParameter('referer', '@homepage'));
   
    }

    /**
    * Elimino el ciclo lectivo si es el actual 
    * el usuario debe quedar con ciclolectivo "No seleccionado"
    */
    public function executeDelete () {
       
        $this->ciclolectivo = CiclolectivoPeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($this->ciclolectivo);
        try { 
            $this->deleteCiclolectivo($this->ciclolectivo);
            if ($this->getUser()->getAttribute('fk_ciclolectivo_id') == $this->getRequestParameter('id')) {
                $this->getUser()->setAttribute('fk_ciclolectivo_id',0);
                $this->getUser()->setAttribute('ciclolectivo_descripcion','No seleccionado');
            }
        }
        catch (Exeception $e){
            echo $e->getMessage();
            die();
        }
        
        return $this->redirect('ciclolectivo/list');
    }
    
    function validateDelete() {
        $this->ciclolectivo = CiclolectivoPeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($this->ciclolectivo);
        if ($this->ciclolectivo->countTurnos() >0) {
            $this->error = "El ciclo lectivo contiene turnos asociados";
            return false;
        }
        if ($this->ciclolectivo->countPeriodos() > 0) {
            $this->error = "El ciclo lectivo contiene Peridos asociados";
            return false;
        }
        if ($this->ciclolectivo->countFeriados() > 0) {
            $this->error = "El ciclo lectivo contiene Feriados asociados";
            return false;
        }
            
        return true;            
    }

    public function executeSinciclolectivo() {
        $this->modulo = $this->getRequestParameter('m');
    }    



  protected function updateCiclolectivoFromRequest()
  {
    $ciclolectivo = $this->getRequestParameter('ciclolectivo');

    if (isset($ciclolectivo['descripcion']))
    {
      $this->ciclolectivo->setDescripcion($ciclolectivo['descripcion']);
    }
    if (isset($ciclolectivo['fecha_inicio']))
    {
      if ($ciclolectivo['fecha_inicio'])
      {
        try
        {
            list($d, $m, $y) = sfContext::getInstance()->getI18N()->getDateForCulture($ciclolectivo['fecha_inicio'], $this->getUser()->getCulture());

            $this->ciclolectivo->setFechaInicio("$y-$m-$d");
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ciclolectivo->setFechaInicio(null);
      }
    }
    if (isset($ciclolectivo['fecha_fin']))
    {
      if ($ciclolectivo['fecha_fin'])
      {
        try
        {
            list($d, $m, $y) = sfContext::getInstance()->getI18N()->getDateForCulture($ciclolectivo['fecha_fin'], $this->getUser()->getCulture());
            $this->ciclolectivo->setFechaFin("$y-$m-$d");
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ciclolectivo->setFechaFin(null);
      }
    }
    $this->ciclolectivo->setActual(isset($ciclolectivo['actual']) ? $ciclolectivo['actual'] : 0);
  }




}

?>
