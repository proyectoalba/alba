<?php

// include base peer class
require_once 'lib/model/om/BaseDivisionPeer.php';

// include object class
include_once 'lib/model/Division.php';

/**
 * Skeleton subclass for performing query and update operations on the 'division' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */
class DivisionPeer extends BaseDivisionPeer {

  public static function doSelectJoinAnioByOrden(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
//      $c->addAscendingOrderByColumn(AnioPeer::ORDEN);   
    $c->addAscendingOrderByColumn(AnioPeer::DESCRIPCION);
    $c->addAscendingOrderByColumn(DivisionPeer::ORDEN);
    $c->addAscendingOrderByColumn(DivisionPeer::DESCRIPCION);
    return DivisionPeer::doSelectJoinAnio($c);
  }

  /*
    public static function doSelectJoinAnioByOrden(Criteria $c, $con = null)
    {
    $c = clone $c;
    if ($c->getDbName() == Propel::getDefaultDB()) {
    $c->setDbName(self::DATABASE_NAME);
    }

    DivisionPeer::addSelectColumns($c);
    $startcol = (DivisionPeer::NUM_COLUMNS - DivisionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
    AnioPeer::addSelectColumns($c);

    $c->addJoin(DivisionPeer::FK_ANIO_ID, AnioPeer::ID);
    $c->addAscendingOrderByColumn(AnioPeer::DESCRIPCION);
    $c->addAscendingOrderByColumn(DivisionPeer::ORDEN);
    $c->addAscendingOrderByColumn(DivisionPeer::DESCRIPCION);
    $rs = BasePeer::doSelect($c, $con);
    $results = array();

    while( $row = $rs->fetch(PDO::FETCH_NUM)) {

    $omClass = DivisionPeer::getOMClass();

    $cls = Propel::importClass($omClass);
    $obj1 = new $cls();
    $obj1->hydrate($row);

    $omClass = AnioPeer::getOMClass();

    $cls = Propel::importClass($omClass);
    $obj2 = new $cls();
    $obj2->hydrate($row, $startcol);

    $newObject = true;
    foreach($results as $temp_obj1) {
    $temp_obj2 = $temp_obj1->getAnio();
    if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
    $newObject = false;
    $temp_obj2->addDivision($obj1);
    break;
    }
    }
    if ($newObject) {
    $obj2->initDivisions();
    $obj2->addDivision($obj1);
    }
    $results[] = $obj1;
    }
    return $results;
    }
   */

  /**
   * obtiene las divisones del ciclo y establecimiento del usuario logueado
   * @return PropelCollection
   */
  public static function getDivisiones() {
    $establecimiento_id = sfContext::getInstance()->getUser()->getAttribute('fk_establecimiento_id');
    $ciclolectivo_id = sfContext::getInstance()->getUser()->getAttribute('fk_ciclolectivo_id');
    $c = new Criteria();
    $c->addJoin(DivisionPeer::FK_TURNO_ID,TurnoPeer::ID);
    $c->add(TurnoPeer::FK_CICLOLECTIVO_ID, $ciclolectivo_id);
    $c->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
    
    return DivisionPeer::doSelectJoinAnio($c);
  }

}

// DivisionPeer
