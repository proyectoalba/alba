<?php

require_once 'model/om/BaseModulo.php';


/**
 * Skeleton subclass for representing a row from the 'modulo' table.
 *
 * Modulos del sistema
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class Modulo extends BaseModulo {

    public function __toString() {
        return $this->getNombre();
    }


} // Modulo
