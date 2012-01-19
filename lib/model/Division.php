<?php

require_once 'lib/model/om/BaseDivision.php';


/**
 * Skeleton subclass for representing a row from the 'division' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */

class Division extends BaseDivision {

   public function __toString() {
        return $this->getAnio()->getDescripcion()." ".$this->getDescripcion().(($this->getOrientacion())?" ".$this->getOrientacion()->getNombre():"");
   }


    public function toArrayInforme($keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = DivisionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            'Año' => ($this->getAnio())?$this->getAnio()->getDescripcion():'' ,
            $keys[2] => $this->getDescripcion(),
            'Turno' => ($this->getTurno())?$this->getTurno()->getDescripcion():'' ,
            'Orientacion' => ($this->getOrientacion())?$this->getOrientacion()->getDescripcion():'',
            $keys[5] => $this->getOrden(),
        );
        return $result;
    }

   public function getActividadesArray() {
        $optionsActividad = array();
        $criteria = new Criteria();
        $criteria->add(DivisionPeer::ID, $this->getId());
        $criteria->addJoin(DivisionPeer::FK_ANIO_ID, AnioPeer::ID);
        $criteria->addJoin(RelAnioActividadPeer::FK_ANIO_ID, AnioPeer::ID);
        $criteria->addJoin(RelAnioActividadPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);
        $actividades = ActividadPeer::doSelect($criteria);
        foreach($actividades as $actividad) {
            $optionsActividad[$actividad->getId()] = $actividad->getNombre();
        }
        asort($optionsActividad);
        return $optionsActividad;
   }

} // Division
