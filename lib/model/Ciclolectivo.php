<?php

require_once 'lib/model/om/BaseCiclolectivo.php';


/**
 * Skeleton subclass for representing a row from the 'ciclolectivo' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class Ciclolectivo extends BaseCiclolectivo {

    public function __toString() {
        return $this->getDescripcion();
    }

    public function getPeriodosArray() {
        $optionsPeriodo = array();
        $criteria = new Criteria();
        $criteria->add(PeriodoPeer::FK_CICLOLECTIVO_ID, $this->getId());
        $aPeriodo = PeriodoPeer::doSelect($criteria);
        foreach($aPeriodo as $periodo) {
            $optionsPeriodo[$periodo->getId()] = $periodo->getDescripcion();
        }
        return $optionsPeriodo;
    }

    public function getDivisionesArray() {
      $c = new Criteria();
      $c->add(TurnoPeer::FK_CICLOLECTIVO_ID, $this->getId());
      $c->addJoin(AnioPeer::ID,DivisionPeer::FK_ANIO_ID);
      $c->addJoin(TurnoPeer::ID,DivisionPeer::FK_TURNO_ID);
      $divisiones = DivisionPeer::doSelect($c);
      $optionsDivisiones = array();
      $optionsDivisiones[""] = "";
      foreach ($divisiones as $division) {
        $optionsDivisiones[$division->getId()] = $division->__toString();
      }
      return $optionsDivisiones;
    }
} // Ciclolectivo
