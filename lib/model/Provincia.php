<?php

require_once 'lib/model/om/BaseProvincia.php';


/**
 * Skeleton subclass for representing a row from the 'provincia' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class Provincia extends BaseProvincia {
    public function __toString() {
        return $this->getNombreLargo();
    }
} // Provincia
