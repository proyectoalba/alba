<?php


abstract class BaseRelAnioActividadPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'rel_anio_actividad';

	
	const CLASS_DEFAULT = 'lib.model.RelAnioActividad';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'rel_anio_actividad.ID';

	
	const FK_ANIO_ID = 'rel_anio_actividad.FK_ANIO_ID';

	
	const FK_ACTIVIDAD_ID = 'rel_anio_actividad.FK_ACTIVIDAD_ID';

	
	const FK_ORIENTACION_ID = 'rel_anio_actividad.FK_ORIENTACION_ID';

	
	const HORAS = 'rel_anio_actividad.HORAS';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkAnioId', 'FkActividadId', 'FkOrientacionId', 'Horas', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'fkAnioId', 'fkActividadId', 'fkOrientacionId', 'horas', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::FK_ANIO_ID, self::FK_ACTIVIDAD_ID, self::FK_ORIENTACION_ID, self::HORAS, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_anio_id', 'fk_actividad_id', 'fk_orientacion_id', 'horas', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkAnioId' => 1, 'FkActividadId' => 2, 'FkOrientacionId' => 3, 'Horas' => 4, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'fkAnioId' => 1, 'fkActividadId' => 2, 'fkOrientacionId' => 3, 'horas' => 4, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::FK_ANIO_ID => 1, self::FK_ACTIVIDAD_ID => 2, self::FK_ORIENTACION_ID => 3, self::HORAS => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_anio_id' => 1, 'fk_actividad_id' => 2, 'fk_orientacion_id' => 3, 'horas' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new RelAnioActividadMapBuilder();
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
		return str_replace(RelAnioActividadPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RelAnioActividadPeer::ID);

		$criteria->addSelectColumn(RelAnioActividadPeer::FK_ANIO_ID);

		$criteria->addSelectColumn(RelAnioActividadPeer::FK_ACTIVIDAD_ID);

		$criteria->addSelectColumn(RelAnioActividadPeer::FK_ORIENTACION_ID);

		$criteria->addSelectColumn(RelAnioActividadPeer::HORAS);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelAnioActividadPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelAnioActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = RelAnioActividadPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return RelAnioActividadPeer::populateObjects(RelAnioActividadPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			RelAnioActividadPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(RelAnioActividad $obj, $key = null)
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
			if (is_object($value) && $value instanceof RelAnioActividad) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RelAnioActividad object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = RelAnioActividadPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = RelAnioActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = RelAnioActividadPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				RelAnioActividadPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinAnio(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelAnioActividadPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelAnioActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelAnioActividadPeer::FK_ANIO_ID,), array(AnioPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinActividad(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelAnioActividadPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelAnioActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelAnioActividadPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinOrientacion(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelAnioActividadPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelAnioActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelAnioActividadPeer::FK_ORIENTACION_ID,), array(OrientacionPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAnio(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelAnioActividadPeer::addSelectColumns($c);
		$startcol = (RelAnioActividadPeer::NUM_COLUMNS - RelAnioActividadPeer::NUM_LAZY_LOAD_COLUMNS);
		AnioPeer::addSelectColumns($c);

		$c->addJoin(array(RelAnioActividadPeer::FK_ANIO_ID,), array(AnioPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelAnioActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelAnioActividadPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = RelAnioActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelAnioActividadPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = AnioPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = AnioPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = AnioPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					AnioPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelAnioActividad($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinActividad(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelAnioActividadPeer::addSelectColumns($c);
		$startcol = (RelAnioActividadPeer::NUM_COLUMNS - RelAnioActividadPeer::NUM_LAZY_LOAD_COLUMNS);
		ActividadPeer::addSelectColumns($c);

		$c->addJoin(array(RelAnioActividadPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelAnioActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelAnioActividadPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = RelAnioActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelAnioActividadPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = ActividadPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ActividadPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = ActividadPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ActividadPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelAnioActividad($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinOrientacion(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelAnioActividadPeer::addSelectColumns($c);
		$startcol = (RelAnioActividadPeer::NUM_COLUMNS - RelAnioActividadPeer::NUM_LAZY_LOAD_COLUMNS);
		OrientacionPeer::addSelectColumns($c);

		$c->addJoin(array(RelAnioActividadPeer::FK_ORIENTACION_ID,), array(OrientacionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelAnioActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelAnioActividadPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = RelAnioActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelAnioActividadPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = OrientacionPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = OrientacionPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = OrientacionPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					OrientacionPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelAnioActividad($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelAnioActividadPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelAnioActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelAnioActividadPeer::FK_ANIO_ID,), array(AnioPeer::ID,), $join_behavior);
		$criteria->addJoin(array(RelAnioActividadPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$criteria->addJoin(array(RelAnioActividadPeer::FK_ORIENTACION_ID,), array(OrientacionPeer::ID,), $join_behavior);
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

		RelAnioActividadPeer::addSelectColumns($c);
		$startcol2 = (RelAnioActividadPeer::NUM_COLUMNS - RelAnioActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		AnioPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (AnioPeer::NUM_COLUMNS - AnioPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		OrientacionPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (OrientacionPeer::NUM_COLUMNS - OrientacionPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(RelAnioActividadPeer::FK_ANIO_ID,), array(AnioPeer::ID,), $join_behavior);
		$c->addJoin(array(RelAnioActividadPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$c->addJoin(array(RelAnioActividadPeer::FK_ORIENTACION_ID,), array(OrientacionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelAnioActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelAnioActividadPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelAnioActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelAnioActividadPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = AnioPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = AnioPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = AnioPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AnioPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelAnioActividad($obj1);
			} 
			
			$key3 = ActividadPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = ActividadPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = ActividadPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ActividadPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addRelAnioActividad($obj1);
			} 
			
			$key4 = OrientacionPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = OrientacionPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$omClass = OrientacionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					OrientacionPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addRelAnioActividad($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptAnio(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelAnioActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(RelAnioActividadPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$criteria->addJoin(array(RelAnioActividadPeer::FK_ORIENTACION_ID,), array(OrientacionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptActividad(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelAnioActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(RelAnioActividadPeer::FK_ANIO_ID,), array(AnioPeer::ID,), $join_behavior);
				$criteria->addJoin(array(RelAnioActividadPeer::FK_ORIENTACION_ID,), array(OrientacionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptOrientacion(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelAnioActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(RelAnioActividadPeer::FK_ANIO_ID,), array(AnioPeer::ID,), $join_behavior);
				$criteria->addJoin(array(RelAnioActividadPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptAnio(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelAnioActividadPeer::addSelectColumns($c);
		$startcol2 = (RelAnioActividadPeer::NUM_COLUMNS - RelAnioActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		OrientacionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (OrientacionPeer::NUM_COLUMNS - OrientacionPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(RelAnioActividadPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$c->addJoin(array(RelAnioActividadPeer::FK_ORIENTACION_ID,), array(OrientacionPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelAnioActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelAnioActividadPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelAnioActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelAnioActividadPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = ActividadPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ActividadPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = ActividadPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ActividadPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelAnioActividad($obj1);

			} 
				
				$key3 = OrientacionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = OrientacionPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = OrientacionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					OrientacionPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addRelAnioActividad($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptActividad(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelAnioActividadPeer::addSelectColumns($c);
		$startcol2 = (RelAnioActividadPeer::NUM_COLUMNS - RelAnioActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		AnioPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (AnioPeer::NUM_COLUMNS - AnioPeer::NUM_LAZY_LOAD_COLUMNS);

		OrientacionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (OrientacionPeer::NUM_COLUMNS - OrientacionPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(RelAnioActividadPeer::FK_ANIO_ID,), array(AnioPeer::ID,), $join_behavior);
				$c->addJoin(array(RelAnioActividadPeer::FK_ORIENTACION_ID,), array(OrientacionPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelAnioActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelAnioActividadPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelAnioActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelAnioActividadPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = AnioPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = AnioPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = AnioPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AnioPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelAnioActividad($obj1);

			} 
				
				$key3 = OrientacionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = OrientacionPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = OrientacionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					OrientacionPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addRelAnioActividad($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptOrientacion(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelAnioActividadPeer::addSelectColumns($c);
		$startcol2 = (RelAnioActividadPeer::NUM_COLUMNS - RelAnioActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		AnioPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (AnioPeer::NUM_COLUMNS - AnioPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(RelAnioActividadPeer::FK_ANIO_ID,), array(AnioPeer::ID,), $join_behavior);
				$c->addJoin(array(RelAnioActividadPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelAnioActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelAnioActividadPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelAnioActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelAnioActividadPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = AnioPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = AnioPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = AnioPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AnioPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelAnioActividad($obj1);

			} 
				
				$key3 = ActividadPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ActividadPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ActividadPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ActividadPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addRelAnioActividad($obj1);

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
		return RelAnioActividadPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(RelAnioActividadPeer::ID) && $criteria->keyContainsValue(RelAnioActividadPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.RelAnioActividadPeer::ID.')');
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
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(RelAnioActividadPeer::ID);
			$selectCriteria->add(RelAnioActividadPeer::ID, $criteria->remove(RelAnioActividadPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(RelAnioActividadPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												RelAnioActividadPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof RelAnioActividad) {
						RelAnioActividadPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RelAnioActividadPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								RelAnioActividadPeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(RelAnioActividad $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RelAnioActividadPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RelAnioActividadPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RelAnioActividadPeer::DATABASE_NAME, RelAnioActividadPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RelAnioActividadPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = RelAnioActividadPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(RelAnioActividadPeer::DATABASE_NAME);
		$criteria->add(RelAnioActividadPeer::ID, $pk);

		$v = RelAnioActividadPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(RelAnioActividadPeer::DATABASE_NAME);
			$criteria->add(RelAnioActividadPeer::ID, $pks, Criteria::IN);
			$objs = RelAnioActividadPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseRelAnioActividadPeer::DATABASE_NAME)->addTableBuilder(BaseRelAnioActividadPeer::TABLE_NAME, BaseRelAnioActividadPeer::getMapBuilder());

