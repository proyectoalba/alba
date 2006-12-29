<?php

require_once 'model/om/BaseMenu.php';


/**
 * Skeleton subclass for representing a row from the 'menu' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class Menu extends BaseMenu {
    public function __toString() {
        return $this->getNombre();
    }

} // Menu
