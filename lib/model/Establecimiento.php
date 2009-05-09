<?php

require_once 'lib/model/om/BaseEstablecimiento.php';


/**
 * Skeleton subclass for representing a row from the 'establecimiento' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class Establecimiento extends BaseEstablecimiento {

   public function __toString() {
    return $this->getNombre();
   }


    public function toArrayInforme($keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = EstablecimientoPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getNombre(),
            $keys[2] => $this->getDescripcion(),
            'DistritoEscolar' => ($this->getDistritoescolar())?$this->getDistritoescolar()->getNombre():'',
            'Organizacion' => ($this->getOrganizacion())?$this->getOrganizacion()->getNombre():'',
            'NivelTipo' => ($this->getNiveltipo())?$this->getNiveltipo()->getNombre():'',
        );
        return $result;
    }


   public function getConceptosArray() {
        $optionsConcepto = array();
        $criteria = new Criteria();
        $criteria->add(ConceptoPeer::FK_ESTABLECIMIENTO_ID, $this->getId() );
        $conceptos = ConceptoPeer::doSelect($criteria);
        foreach($conceptos as $concepto) {
            $optionsConcepto[$concepto->getId()] = $concepto->getNombre();
        }
        return $optionsConcepto;
   }


} // Establecimiento
