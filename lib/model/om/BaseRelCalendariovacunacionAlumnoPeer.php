<?php


abstract class BaseRelCalendariovacunacionAlumnoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'rel_calendariovacunacion_alumno';

	
	const CLASS_DEFAULT = 'lib.model.RelCalendariovacunacionAlumno';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'rel_calendariovacunacion_alumno.ID';

	
	const FK_ALUMNO_ID = 'rel_calendariovacunacion_alumno.FK_ALUMNO_ID';

	
	const FK_CALENDARIOVACUNACION_ID = 'rel_calendariovacunacion_alumno.FK_CALENDARIOVACUNACION_ID';

	
	const OBSERVACION = 'rel_calendariovacunacion_alumno.OBSERVACION';

	
	const COMPROBANTE = 'rel_calendariovacunacion_alumno.COMPROBANTE';

	
	const FECHA = 'rel_calendariovacunacion_alumno.FECHA';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkAlumnoId', 'FkCalendariovacunacionId', 'Observacion', 'Comprobante', 'Fecha', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'fkAlumnoId', 'fkCalendariovacunacionId', 'observacion', 'comprobante', 'fecha', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::FK_ALUMNO_ID, self::FK_CALENDARIOVACUNACION_ID, self::OBSERVACION, self::COMPROBANTE, self::FECHA, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_alumno_id', 'fk_calendariovacunacion_id', 'observacion', 'comprobante', 'fecha', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkAlumnoId' => 1, 'FkCalendariovacunacionId' => 2, 'Observacion' => 3, 'Comprobante' => 4, 'Fecha' => 5, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'fkAlumnoId' => 1, 'fkCalendariovacunacionId' => 2, 'observacion' => 3, 'comprobante' => 4, 'fecha' => 5, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::FK_ALUMNO_ID => 1, self::FK_CALENDARIOVACUNACION_ID => 2, self::OBSERVACION => 3, self::COMPROBANTE => 4, self::FECHA => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_alumno_id' => 1, 'fk_calendariovacunacion_id' => 2, 'observacion' => 3, 'comprobante' => 4, 'fecha' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new RelCalendariovacunacionAlumnoMapBuilder();
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
		return str_replace(RelCalendariovacunacionAlumnoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::ID);

		$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID);

		$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID);

		$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::OBSERVACION);

		$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::COMPROBANTE);

		$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::FECHA);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelCalendariovacunacionAlumnoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = RelCalendariovacunacionAlumnoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return RelCalendariovacunacionAlumnoPeer::populateObjects(RelCalendariovacunacionAlumnoPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(RelCalendariovacunacionAlumno $obj, $key = null)
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
			if (is_object($value) && $value instanceof RelCalendariovacunacionAlumno) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RelCalendariovacunacionAlumno object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = RelCalendariovacunacionAlumnoPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = RelCalendariovacunacionAlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = RelCalendariovacunacionAlumnoPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				RelCalendariovacunacionAlumnoPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinAlumno(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelCalendariovacunacionAlumnoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinCalendariovacunacion(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelCalendariovacunacionAlumnoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID,), array(CalendariovacunacionPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAlumno(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelCalendariovacunacionAlumnoPeer::addSelectColumns($c);
		$startcol = (RelCalendariovacunacionAlumnoPeer::NUM_COLUMNS - RelCalendariovacunacionAlumnoPeer::NUM_LAZY_LOAD_COLUMNS);
		AlumnoPeer::addSelectColumns($c);

		$c->addJoin(array(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelCalendariovacunacionAlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelCalendariovacunacionAlumnoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = RelCalendariovacunacionAlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelCalendariovacunacionAlumnoPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = AlumnoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = AlumnoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = AlumnoPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					AlumnoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelCalendariovacunacionAlumno($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinCalendariovacunacion(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelCalendariovacunacionAlumnoPeer::addSelectColumns($c);
		$startcol = (RelCalendariovacunacionAlumnoPeer::NUM_COLUMNS - RelCalendariovacunacionAlumnoPeer::NUM_LAZY_LOAD_COLUMNS);
		CalendariovacunacionPeer::addSelectColumns($c);

		$c->addJoin(array(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID,), array(CalendariovacunacionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelCalendariovacunacionAlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelCalendariovacunacionAlumnoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = RelCalendariovacunacionAlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelCalendariovacunacionAlumnoPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = CalendariovacunacionPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = CalendariovacunacionPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = CalendariovacunacionPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					CalendariovacunacionPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelCalendariovacunacionAlumno($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelCalendariovacunacionAlumnoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$criteria->addJoin(array(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID,), array(CalendariovacunacionPeer::ID,), $join_behavior);
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

		RelCalendariovacunacionAlumnoPeer::addSelectColumns($c);
		$startcol2 = (RelCalendariovacunacionAlumnoPeer::NUM_COLUMNS - RelCalendariovacunacionAlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		CalendariovacunacionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (CalendariovacunacionPeer::NUM_COLUMNS - CalendariovacunacionPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$c->addJoin(array(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID,), array(CalendariovacunacionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelCalendariovacunacionAlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelCalendariovacunacionAlumnoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelCalendariovacunacionAlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelCalendariovacunacionAlumnoPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = AlumnoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = AlumnoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = AlumnoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AlumnoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelCalendariovacunacionAlumno($obj1);
			} 
			
			$key3 = CalendariovacunacionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = CalendariovacunacionPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = CalendariovacunacionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					CalendariovacunacionPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addRelCalendariovacunacionAlumno($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptAlumno(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID,), array(CalendariovacunacionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptCalendariovacunacion(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptAlumno(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelCalendariovacunacionAlumnoPeer::addSelectColumns($c);
		$startcol2 = (RelCalendariovacunacionAlumnoPeer::NUM_COLUMNS - RelCalendariovacunacionAlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		CalendariovacunacionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (CalendariovacunacionPeer::NUM_COLUMNS - CalendariovacunacionPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID,), array(CalendariovacunacionPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelCalendariovacunacionAlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelCalendariovacunacionAlumnoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelCalendariovacunacionAlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelCalendariovacunacionAlumnoPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = CalendariovacunacionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CalendariovacunacionPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = CalendariovacunacionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CalendariovacunacionPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelCalendariovacunacionAlumno($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptCalendariovacunacion(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelCalendariovacunacionAlumnoPeer::addSelectColumns($c);
		$startcol2 = (RelCalendariovacunacionAlumnoPeer::NUM_COLUMNS - RelCalendariovacunacionAlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelCalendariovacunacionAlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelCalendariovacunacionAlumnoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelCalendariovacunacionAlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelCalendariovacunacionAlumnoPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = AlumnoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = AlumnoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = AlumnoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AlumnoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelCalendariovacunacionAlumno($obj1);

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
		return RelCalendariovacunacionAlumnoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(RelCalendariovacunacionAlumnoPeer::ID) && $criteria->keyContainsValue(RelCalendariovacunacionAlumnoPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.RelCalendariovacunacionAlumnoPeer::ID.')');
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
			$con = Propel::getConnection(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(RelCalendariovacunacionAlumnoPeer::ID);
			$selectCriteria->add(RelCalendariovacunacionAlumnoPeer::ID, $criteria->remove(RelCalendariovacunacionAlumnoPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(RelCalendariovacunacionAlumnoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												RelCalendariovacunacionAlumnoPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof RelCalendariovacunacionAlumno) {
						RelCalendariovacunacionAlumnoPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RelCalendariovacunacionAlumnoPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								RelCalendariovacunacionAlumnoPeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(RelCalendariovacunacionAlumno $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RelCalendariovacunacionAlumnoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME, RelCalendariovacunacionAlumnoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RelCalendariovacunacionAlumnoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = RelCalendariovacunacionAlumnoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME);
		$criteria->add(RelCalendariovacunacionAlumnoPeer::ID, $pk);

		$v = RelCalendariovacunacionAlumnoPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME);
			$criteria->add(RelCalendariovacunacionAlumnoPeer::ID, $pks, Criteria::IN);
			$objs = RelCalendariovacunacionAlumnoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseRelCalendariovacunacionAlumnoPeer::DATABASE_NAME)->addTableBuilder(BaseRelCalendariovacunacionAlumnoPeer::TABLE_NAME, BaseRelCalendariovacunacionAlumnoPeer::getMapBuilder());

