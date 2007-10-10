<?php

/**
 * Subclass for representing a row from the 'tipoinforme' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Tipoinforme extends BaseTipoinforme
{
    public function __toString() {
        return $this->getNombre();
    }

}
