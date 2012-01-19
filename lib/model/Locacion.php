<?php

require_once 'lib/model/om/BaseLocacion.php';


/**
 * Skeleton subclass for representing a row from the 'locacion' table.
 *
 * Lugar donde están los niveles
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class Locacion extends BaseLocacion {
    public function __toString() {
            return $this->getNombre();
    }
                
} // Locacion
