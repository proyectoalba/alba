<?php

  // include base peer class
  require_once 'lib/model/om/BaseLocacionPeer.php';
  
  // include object class
  include_once 'lib/model/Locacion.php';


/**
 * Skeleton subclass for performing query and update operations on the 'locacion' table.
 *
 * Lugar donde están los niveles
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class LocacionPeer extends BaseLocacionPeer {
    public function __toString() {
        return $this->getNombre();
    }
} // LocacionPeer
