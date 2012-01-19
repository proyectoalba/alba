<?php

require_once 'lib/model/om/BaseOrganizacion.php';


/**
 * Skeleton subclass for representing a row from the 'organizacion' table.
 *
 * Organización a la que pertenecen los usuarios
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class Organizacion extends BaseOrganizacion {
    public function __toString() {
        return $this->getNombre();
    }
    
} // Organizacion
