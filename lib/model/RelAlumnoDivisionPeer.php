<?php

  // include base peer class
  require_once 'lib/model/om/BaseRelAlumnoDivisionPeer.php';
  
  // include object class
  include_once 'lib/model/RelAlumnoDivision.php';


/**
 * Skeleton subclass for performing query and update operations on the 'rel_alumno_division' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class RelAlumnoDivisionPeer extends BaseRelAlumnoDivisionPeer {

  public static function existe($alumno_id, $division_id) {

    $c = new Criteria();
    $c->add(RelAlumnodivisionPeer::FK_ALUMNO_ID, $alumno_id);
    $c->add(RelAlumnodivisionPeer::FK_DIVISION_ID, $division_id);
    return RelAlumnoDivisionPeer::doSelectOne($c);
  }
} // RelAlumnoDivisionPeer
