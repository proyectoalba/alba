<?php

/**
 * Subclass for representing a row from the 'turno' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Turno extends BaseTurno
{
    public function __toString() {
        return $this->getDescripcion();
    }

}
