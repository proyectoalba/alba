<?php

require_once 'lib/model/om/BaseResponsable.php';


/**
 * Skeleton subclass for representing a row from the 'responsable' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class Responsable extends BaseResponsable {

    public function getApellidos(){
        return $this->getApellido().' '.$this->getApellidoMaterno();
    }

} // Responsable
