<?php


abstract class BaseRelAnioActividadDocentePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'rel_anio_actividad_docente';

	
	const CLASS_DEFAULT = 'lib.model.RelAnioActividadDocente';

	
	const NUM_COLUMNS = 2;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const FK_ANIO_ACTIVIDAD_ID = 'rel_anio_actividad_docente.FK_ANIO_ACTIVIDAD_ID';

	
	const FK_DOCENTE_ID = 'rel_anio_actividad_docente.FK_DOCENTE_ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('FkAnioActividadId', 'FkDocenteId', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('fkAnioActividadId', 'fkDocenteId', ),
		BasePeer::TYPE_COLNAME => array (self::FK_ANIO_ACTIVIDAD_ID, self::FK_DOCENTE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('fk_anio_actividad_id', 'fk_docente_id', ),
		BasePeer::TYPE_NUM => array (0, 1, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('FkAnioActividadId' => 0, 'FkDocenteId' => 1, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('fkAnioActividadId' => 0, 'fkDocenteId' => 1, ),
		BasePeer::TYPE_COLNAME => array (self::FK_ANIO_ACTIVIDAD_ID => 0, self::FK_DOCENTE_ID => 1, ),
		BasePeer::TYPE_FIELDNAME => array ('fk_anio_actividad_id' => 0, 'fk_docente_id' => 1, ),
		BasePeer::TYPE_NUM => array (0, 1, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new RelAnioActividadDocenteMapBuilder();
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
		return str_replace(RelAnioActividadDocentePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID);

		$criteria->addSelectColumn(RelAnioActividadDocentePeer::FK_DOCENTE_ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelAnioActividadDocentePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelAnioActividadDocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = RelAnioActividadDocentePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return RelAnioActividadDocentePeer::populateObjects(RelAnioActividadDocentePeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			RelAnioActividadDocentePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(RelAnioActividadDocente $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = serialize(array((string) $obj->getFkAnioActividadId(), (string) $obj->getFkDocenteId()));
			} 			self::$instances[$key] = $obj;
		}
	}

	
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof RelAnioActividadDocente) {
				$key = serialize(array((string) $value->getFkAnioActividadId(), (string) $value->getFkDocenteId()));
			} elseif (is_array($value) && count($value) === 2) {
								$key = serialize(array((string) $value[0], (string) $value[1]));
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RelAnioActividadDocente object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
				if ($row[$startcol + 0] === null && $row[$startcol + 1] === null) {
			return null;
		}
		return serialize(array((string) $row[$startcol + 0], (string) $row[$startcol + 1]));
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = RelAnioActividadDocentePeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = RelAnioActividadDocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = RelAnioActividadDocentePeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				RelAnioActividadDocentePeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinRelAnioActividad(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelAnioActividadDocentePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelAnioActividadDocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID,), array(RelAnioActividadPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinDocente(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelAnioActividadDocentePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelAnioActividadDocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelAnioActividadDocentePeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinRelAnioActividad(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelAnioActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelAnioActividadDocentePeer::NUM_COLUMNS - RelAnioActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS);
		RelAnioActividadPeer::addSelectColumns($c);

		$c->addJoin(array(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID,), array(RelAnioActividadPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelAnioActividadDocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelAnioActividadDocentePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = RelAnioActividadDocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelAnioActividadDocentePeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = RelAnioActividadPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = RelAnioActividadPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = RelAnioActividadPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					RelAnioActividadPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelAnioActividadDocente($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinDocente(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelAnioActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelAnioActividadDocentePeer::NUM_COLUMNS - RelAnioActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS);
		DocentePeer::addSelectColumns($c);

		$c->addJoin(array(RelAnioActividadDocentePeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelAnioActividadDocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelAnioActividadDocentePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = RelAnioActividadDocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelAnioActividadDocentePeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DocentePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DocentePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DocentePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelAnioActividadDocente($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelAnioActividadDocentePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelAnioActividadDocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID,), array(RelAnioActividadPeer::ID,), $join_behavior);
		$criteria->addJoin(array(RelAnioActividadDocentePeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);
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

		RelAnioActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelAnioActividadDocentePeer::NUM_COLUMNS - RelAnioActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS);

		RelAnioActividadPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (RelAnioActividadPeer::NUM_COLUMNS - RelAnioActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID,), array(RelAnioActividadPeer::ID,), $join_behavior);
		$c->addJoin(array(RelAnioActividadDocentePeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelAnioActividadDocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelAnioActividadDocentePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelAnioActividadDocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelAnioActividadDocentePeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = RelAnioActividadPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = RelAnioActividadPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = RelAnioActividadPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					RelAnioActividadPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelAnioActividadDocente($obj1);
			} 
			
			$key3 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = DocentePeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					DocentePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addRelAnioActividadDocente($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptRelAnioActividad(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelAnioActividadDocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(RelAnioActividadDocentePeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptDocente(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelAnioActividadDocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID,), array(RelAnioActividadPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptRelAnioActividad(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelAnioActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelAnioActividadDocentePeer::NUM_COLUMNS - RelAnioActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(RelAnioActividadDocentePeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelAnioActividadDocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelAnioActividadDocentePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelAnioActividadDocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelAnioActividadDocentePeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DocentePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DocentePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelAnioActividadDocente($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptDocente(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelAnioActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelAnioActividadDocentePeer::NUM_COLUMNS - RelAnioActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS);

		RelAnioActividadPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (RelAnioActividadPeer::NUM_COLUMNS - RelAnioActividadPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID,), array(RelAnioActividadPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelAnioActividadDocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelAnioActividadDocentePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelAnioActividadDocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelAnioActividadDocentePeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = RelAnioActividadPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = RelAnioActividadPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = RelAnioActividadPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					RelAnioActividadPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelAnioActividadDocente($obj1);

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
		return RelAnioActividadDocentePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID);
			$selectCriteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $criteria->remove(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID), $comparison);

			$comparison = $criteria->getComparison(RelAnioActividadDocentePeer::FK_DOCENTE_ID);
			$selectCriteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $criteria->remove(RelAnioActividadDocentePeer::FK_DOCENTE_ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(RelAnioActividadDocentePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												RelAnioActividadDocentePeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof RelAnioActividadDocente) {
						RelAnioActividadDocentePeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
												if (count($values) == count($values, COUNT_RECURSIVE)) {
								$values = array($values);
			}

			foreach ($values as $value) {

				$criterion = $criteria->getNewCriterion(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $value[0]);
				$criterion->addAnd($criteria->getNewCriterion(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $value[1]));
				$criteria->addOr($criterion);

								RelAnioActividadDocentePeer::removeInstanceFromPool($value);
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

	
	public static function doValidate(RelAnioActividadDocente $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RelAnioActividadDocentePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RelAnioActividadDocentePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RelAnioActividadDocentePeer::DATABASE_NAME, RelAnioActividadDocentePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RelAnioActividadDocentePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($fk_anio_actividad_id, $fk_docente_id, PropelPDO $con = null) {
		$key = serialize(array((string) $fk_anio_actividad_id, (string) $fk_docente_id));
 		if (null !== ($obj = RelAnioActividadDocentePeer::getInstanceFromPool($key))) {
 			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$criteria = new Criteria(RelAnioActividadDocentePeer::DATABASE_NAME);
		$criteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $fk_anio_actividad_id);
		$criteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $fk_docente_id);
		$v = RelAnioActividadDocentePeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 

Propel::getDatabaseMap(BaseRelAnioActividadDocentePeer::DATABASE_NAME)->addTableBuilder(BaseRelAnioActividadDocentePeer::TABLE_NAME, BaseRelAnioActividadDocentePeer::getMapBuilder());

