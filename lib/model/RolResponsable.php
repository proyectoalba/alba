<?php

/**
 * Subclass for representing a row from the 'rol_responsable' table.
 *
 * 
 *
 * @package lib.model
 */ 
class RolResponsable extends BaseRolResponsable
{
 public function __toString() {
         return $this->getNombre();
             }
             
}
