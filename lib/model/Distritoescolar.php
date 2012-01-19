<?php

require_once 'lib/model/om/BaseDistritoescolar.php';


/**
 * Skeleton subclass for representing a row from the 'distritoescolar' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class Distritoescolar extends BaseDistritoescolar {
    public function __toString() {
         return $this->getNombre();
    }        

} // Distritoescolar
