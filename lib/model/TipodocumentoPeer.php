<?php

  // include base peer class
  require_once 'lib/model/om/BaseTipodocumentoPeer.php';
  
  // include object class
  include_once 'lib/model/Tipodocumento.php';


/**
 * Skeleton subclass for performing query and update operations on the 'tipodocumento' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class TipodocumentoPeer extends BaseTipodocumentoPeer {

   public static function getEnOrden() {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(TipodocumentoPeer::ORDEN);
        return TipodocumentoPeer::populateObjects(TipodocumentoPeer::doSelectStmt($c, null));
    }

} // TipodocumentoPeer
