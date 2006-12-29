<?php

require_once 'model/om/BaseTurnos.php';


/**
 * Skeleton subclass for representing a row from the 'turnos' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class Turnos extends BaseTurnos {
    public function __toString() {
         return $this->getDescripcion() ;
    }        

} // Turnos
