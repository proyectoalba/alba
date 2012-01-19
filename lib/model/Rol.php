<?php

require_once 'lib/model/om/BaseRol.php';


/**
 * Skeleton subclass for representing a row from the 'rol' table.
 *
 * Roles del sistema
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class Rol extends BaseRol {

    public function __toString()
    {
        return $this->getNombre();
    }
} // Rol
