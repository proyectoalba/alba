<?php


abstract class BaseCiclolectivoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ciclolectivo';

	
	const CLASS_DEFAULT = 'lib.model.Ciclolectivo';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'ciclolectivo.ID';

	
	const FK_ESTABLECIMIENTO_ID = 'ciclolectivo.FK_ESTABLECIMIENTO_ID';

	
	const FECHA_INICIO = 'ciclolectivo.FECHA_INICIO';

	
	const FECHA_FIN = 'ciclolectivo.FECHA_FIN';

	
	const DESCRIPCION = 'ciclolectivo.DESCRIPCION';

	
	const ACTUAL = 'ciclolectivo.ACTUAL';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkEstablecimientoId', 'FechaInicio', 'FechaFin', 'Descripcion', 'Actual', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'fkEstablecimientoId', 'fechaInicio', 'fechaFin', 'descripcion', 'actual', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::FK_ESTABLECIMIENTO_ID, self::FECHA_INICIO, self::FECHA_FIN, self::DESCRIPCION, self::ACTUAL, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_establecimiento_id', 'fecha_inicio', 'fecha_fin', 'descripcion', 'actual', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkEstablecimientoId' => 1, 'FechaInicio' => 2, 'FechaFin' => 3, 'Descripcion' => 4, 'Actual' => 5, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'fkEstablecimientoId' => 1, 'fechaInicio' => 2, 'fechaFin' => 3, 'descripcion' => 4, 'actual' => 5, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::FK_ESTABLECIMIENTO_ID => 1, self::FECHA_INICIO => 2, self::FECHA_FIN => 3, self::DESCRIPCION => 4, self::ACTUAL => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_establecimiento_id' => 1, 'fecha_inicio' => 2, 'fecha_fin' => 3, 'descripcion' => 4, 'actual' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new CiclolectivoMapBuilder();
		}
		return self::$mapBuilder;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(CiclolectivoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CiclolectivoPeer::ID);

		$criteria->addSelectColumn(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID);

		$criteria->addSelectColumn(CiclolectivoPeer::FECHA_INICIO);

		$criteria->addSelectColumn(CiclolectivoPeer::FECHA_FIN);

		$criteria->addSelectColumn(CiclolectivoPeer::DESCRIPCION);

		$criteria->addSelectColumn(CiclolectivoPeer::ACTUAL);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(CiclolectivoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CiclolectivoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}
	
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = CiclolectivoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return CiclolectivoPeer::populateObjects(CiclolectivoPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			CiclolectivoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(Ciclolectivo $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} 			self::$instances[$key] = $obj;
		}
	}

	
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Ciclolectivo) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Ciclolectivo object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} 
	
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; 	}
	
	
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
				if ($row[$startcol + 0] === null) {
			return null;
		}
		return (string) $row[$startcol + 0];
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = CiclolectivoPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = CiclolectivoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = CiclolectivoPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				CiclolectivoPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinEstablecimiento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(CiclolectivoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CiclolectivoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinEstablecimiento(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CiclolectivoPeer::addSelectColumns($c);
		$startcol = (CiclolectivoPeer::NUM_COLUMNS - CiclolectivoPeer::NUM_LAZY_LOAD_COLUMNS);
		EstablecimientoPeer::addSelectColumns($c);

		$c->addJoin(array(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CiclolectivoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CiclolectivoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = CiclolectivoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				CiclolectivoPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = EstablecimientoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = EstablecimientoPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					EstablecimientoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addCiclolectivo($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(CiclolectivoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CiclolectivoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}

	
	public static function doSelectJoinAll(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CiclolectivoPeer::addSelectColumns($c);
		$startcol2 = (CiclolectivoPeer::NUM_COLUMNS - CiclolectivoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CiclolectivoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CiclolectivoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = CiclolectivoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				CiclolectivoPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = EstablecimientoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EstablecimientoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addCiclolectivo($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


  static public function getUniqueColumnNames()
  {
    return array();
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return CiclolectivoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(CiclolectivoPeer::ID) && $criteria->keyContainsValue(CiclolectivoPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.CiclolectivoPeer::ID.')');
		}


				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(CiclolectivoPeer::ID);
			$selectCriteria->add(CiclolectivoPeer::ID, $criteria->remove(CiclolectivoPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(CiclolectivoPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												CiclolectivoPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof Ciclolectivo) {
						CiclolectivoPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CiclolectivoPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								CiclolectivoPeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	public static function doValidate(Ciclolectivo $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CiclolectivoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CiclolectivoPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(CiclolectivoPeer::DATABASE_NAME, CiclolectivoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CiclolectivoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = CiclolectivoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(CiclolectivoPeer::DATABASE_NAME);
		$criteria->add(CiclolectivoPeer::ID, $pk);

		$v = CiclolectivoPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(CiclolectivoPeer::DATABASE_NAME);
			$criteria->add(CiclolectivoPeer::ID, $pks, Criteria::IN);
			$objs = CiclolectivoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseCiclolectivoPeer::DATABASE_NAME)->addTableBuilder(BaseCiclolectivoPeer::TABLE_NAME, BaseCiclolectivoPeer::getMapBuilder());

