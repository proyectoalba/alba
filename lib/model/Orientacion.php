<?php

/**
 * Subclass for representing a row from the 'orientacion' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Orientacion extends BaseOrientacion
{
    public function __toString() {
        return $this->getNombre();
    }
}
