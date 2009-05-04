<?php


abstract class BaseLegajoadjuntoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'legajoadjunto';

	
	const CLASS_DEFAULT = 'lib.model.Legajoadjunto';

	
	const NUM_COLUMNS = 3;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const FK_LEGAJOPEDAGOGICO_ID = 'legajoadjunto.FK_LEGAJOPEDAGOGICO_ID';

	
	const FK_ADJUNTO_ID = 'legajoadjunto.FK_ADJUNTO_ID';

	
	const ID = 'legajoadjunto.ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('FkLegajopedagogicoId', 'FkAdjuntoId', 'Id', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('fkLegajopedagogicoId', 'fkAdjuntoId', 'id', ),
		BasePeer::TYPE_COLNAME => array (self::FK_LEGAJOPEDAGOGICO_ID, self::FK_ADJUNTO_ID, self::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('fk_legajopedagogico_id', 'fk_adjunto_id', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('FkLegajopedagogicoId' => 0, 'FkAdjuntoId' => 1, 'Id' => 2, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('fkLegajopedagogicoId' => 0, 'fkAdjuntoId' => 1, 'id' => 2, ),
		BasePeer::TYPE_COLNAME => array (self::FK_LEGAJOPEDAGOGICO_ID => 0, self::FK_ADJUNTO_ID => 1, self::ID => 2, ),
		BasePeer::TYPE_FIELDNAME => array ('fk_legajopedagogico_id' => 0, 'fk_adjunto_id' => 1, 'id' => 2, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new LegajoadjuntoMapBuilder();
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
		return str_replace(LegajoadjuntoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID);

		$criteria->addSelectColumn(LegajoadjuntoPeer::FK_ADJUNTO_ID);

		$criteria->addSelectColumn(LegajoadjuntoPeer::ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(LegajoadjuntoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LegajoadjuntoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = LegajoadjuntoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return LegajoadjuntoPeer::populateObjects(LegajoadjuntoPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			LegajoadjuntoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(Legajoadjunto $obj, $key = null)
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
			if (is_object($value) && $value instanceof Legajoadjunto) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Legajoadjunto object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
				if ($row[$startcol + 2] === null) {
			return null;
		}
		return (string) $row[$startcol + 2];
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = LegajoadjuntoPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = LegajoadjuntoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = LegajoadjuntoPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				LegajoadjuntoPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinLegajopedagogico(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(LegajoadjuntoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LegajoadjuntoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID,), array(LegajopedagogicoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAdjunto(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(LegajoadjuntoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LegajoadjuntoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(LegajoadjuntoPeer::FK_ADJUNTO_ID,), array(AdjuntoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinLegajopedagogico(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LegajoadjuntoPeer::addSelectColumns($c);
		$startcol = (LegajoadjuntoPeer::NUM_COLUMNS - LegajoadjuntoPeer::NUM_LAZY_LOAD_COLUMNS);
		LegajopedagogicoPeer::addSelectColumns($c);

		$c->addJoin(array(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID,), array(LegajopedagogicoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LegajoadjuntoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LegajoadjuntoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = LegajoadjuntoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				LegajoadjuntoPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = LegajopedagogicoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = LegajopedagogicoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = LegajopedagogicoPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					LegajopedagogicoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addLegajoadjunto($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAdjunto(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LegajoadjuntoPeer::addSelectColumns($c);
		$startcol = (LegajoadjuntoPeer::NUM_COLUMNS - LegajoadjuntoPeer::NUM_LAZY_LOAD_COLUMNS);
		AdjuntoPeer::addSelectColumns($c);

		$c->addJoin(array(LegajoadjuntoPeer::FK_ADJUNTO_ID,), array(AdjuntoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LegajoadjuntoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LegajoadjuntoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = LegajoadjuntoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				LegajoadjuntoPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = AdjuntoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = AdjuntoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = AdjuntoPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					AdjuntoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addLegajoadjunto($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(LegajoadjuntoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LegajoadjuntoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID,), array(LegajopedagogicoPeer::ID,), $join_behavior);
		$criteria->addJoin(array(LegajoadjuntoPeer::FK_ADJUNTO_ID,), array(AdjuntoPeer::ID,), $join_behavior);
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

		LegajoadjuntoPeer::addSelectColumns($c);
		$startcol2 = (LegajoadjuntoPeer::NUM_COLUMNS - LegajoadjuntoPeer::NUM_LAZY_LOAD_COLUMNS);

		LegajopedagogicoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (LegajopedagogicoPeer::NUM_COLUMNS - LegajopedagogicoPeer::NUM_LAZY_LOAD_COLUMNS);

		AdjuntoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (AdjuntoPeer::NUM_COLUMNS - AdjuntoPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID,), array(LegajopedagogicoPeer::ID,), $join_behavior);
		$c->addJoin(array(LegajoadjuntoPeer::FK_ADJUNTO_ID,), array(AdjuntoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LegajoadjuntoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LegajoadjuntoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = LegajoadjuntoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				LegajoadjuntoPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = LegajopedagogicoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = LegajopedagogicoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = LegajopedagogicoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					LegajopedagogicoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addLegajoadjunto($obj1);
			} 
			
			$key3 = AdjuntoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = AdjuntoPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = AdjuntoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					AdjuntoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addLegajoadjunto($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptLegajopedagogico(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LegajoadjuntoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(LegajoadjuntoPeer::FK_ADJUNTO_ID,), array(AdjuntoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptAdjunto(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LegajoadjuntoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID,), array(LegajopedagogicoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptLegajopedagogico(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LegajoadjuntoPeer::addSelectColumns($c);
		$startcol2 = (LegajoadjuntoPeer::NUM_COLUMNS - LegajoadjuntoPeer::NUM_LAZY_LOAD_COLUMNS);

		AdjuntoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (AdjuntoPeer::NUM_COLUMNS - AdjuntoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(LegajoadjuntoPeer::FK_ADJUNTO_ID,), array(AdjuntoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LegajoadjuntoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LegajoadjuntoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = LegajoadjuntoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				LegajoadjuntoPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = AdjuntoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = AdjuntoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = AdjuntoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AdjuntoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addLegajoadjunto($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptAdjunto(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LegajoadjuntoPeer::addSelectColumns($c);
		$startcol2 = (LegajoadjuntoPeer::NUM_COLUMNS - LegajoadjuntoPeer::NUM_LAZY_LOAD_COLUMNS);

		LegajopedagogicoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (LegajopedagogicoPeer::NUM_COLUMNS - LegajopedagogicoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID,), array(LegajopedagogicoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LegajoadjuntoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LegajoadjuntoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = LegajoadjuntoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				LegajoadjuntoPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = LegajopedagogicoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = LegajopedagogicoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = LegajopedagogicoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					LegajopedagogicoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addLegajoadjunto($obj1);

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
		return LegajoadjuntoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(LegajoadjuntoPeer::ID) && $criteria->keyContainsValue(LegajoadjuntoPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.LegajoadjuntoPeer::ID.')');
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
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(LegajoadjuntoPeer::ID);
			$selectCriteria->add(LegajoadjuntoPeer::ID, $criteria->remove(LegajoadjuntoPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(LegajoadjuntoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												LegajoadjuntoPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof Legajoadjunto) {
						LegajoadjuntoPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LegajoadjuntoPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								LegajoadjuntoPeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(Legajoadjunto $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LegajoadjuntoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LegajoadjuntoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LegajoadjuntoPeer::DATABASE_NAME, LegajoadjuntoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LegajoadjuntoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = LegajoadjuntoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(LegajoadjuntoPeer::DATABASE_NAME);
		$criteria->add(LegajoadjuntoPeer::ID, $pk);

		$v = LegajoadjuntoPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(LegajoadjuntoPeer::DATABASE_NAME);
			$criteria->add(LegajoadjuntoPeer::ID, $pks, Criteria::IN);
			$objs = LegajoadjuntoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseLegajoadjuntoPeer::DATABASE_NAME)->addTableBuilder(BaseLegajoadjuntoPeer::TABLE_NAME, BaseLegajoadjuntoPeer::getMapBuilder());

