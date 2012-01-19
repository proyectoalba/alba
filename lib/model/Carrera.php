<?php

/**
 * Subclass for representing a row from the 'carrera' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Carrera extends BaseCarrera
{
    public function __toString() {
        return $this->getDescripcion();
    }
}
