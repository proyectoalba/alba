<?php

require_once 'lib/model/om/BaseConceptobaja.php';


/**
 * Skeleton subclass for representing a row from the 'conceptobaja' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class Conceptobaja extends BaseConceptobaja {
    public function __toString() {
         return $this->getNombre();
    }        

} // Conceptobaja
