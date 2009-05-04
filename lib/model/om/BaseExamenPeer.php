<?php


abstract class BaseExamenPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'examen';

	
	const CLASS_DEFAULT = 'lib.model.Examen';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'examen.ID';

	
	const FK_ESCALANOTA_ID = 'examen.FK_ESCALANOTA_ID';

	
	const FK_ALUMNO_ID = 'examen.FK_ALUMNO_ID';

	
	const FK_ACTIVIDAD_ID = 'examen.FK_ACTIVIDAD_ID';

	
	const FK_PERIODO_ID = 'examen.FK_PERIODO_ID';

	
	const NOMBRE = 'examen.NOMBRE';

	
	const OBSERVACION = 'examen.OBSERVACION';

	
	const FECHA = 'examen.FECHA';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkEscalanotaId', 'FkAlumnoId', 'FkActividadId', 'FkPeriodoId', 'Nombre', 'Observacion', 'Fecha', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'fkEscalanotaId', 'fkAlumnoId', 'fkActividadId', 'fkPeriodoId', 'nombre', 'observacion', 'fecha', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::FK_ESCALANOTA_ID, self::FK_ALUMNO_ID, self::FK_ACTIVIDAD_ID, self::FK_PERIODO_ID, self::NOMBRE, self::OBSERVACION, self::FECHA, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_escalanota_id', 'fk_alumno_id', 'fk_actividad_id', 'fk_periodo_id', 'nombre', 'observacion', 'fecha', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkEscalanotaId' => 1, 'FkAlumnoId' => 2, 'FkActividadId' => 3, 'FkPeriodoId' => 4, 'Nombre' => 5, 'Observacion' => 6, 'Fecha' => 7, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'fkEscalanotaId' => 1, 'fkAlumnoId' => 2, 'fkActividadId' => 3, 'fkPeriodoId' => 4, 'nombre' => 5, 'observacion' => 6, 'fecha' => 7, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::FK_ESCALANOTA_ID => 1, self::FK_ALUMNO_ID => 2, self::FK_ACTIVIDAD_ID => 3, self::FK_PERIODO_ID => 4, self::NOMBRE => 5, self::OBSERVACION => 6, self::FECHA => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_escalanota_id' => 1, 'fk_alumno_id' => 2, 'fk_actividad_id' => 3, 'fk_periodo_id' => 4, 'nombre' => 5, 'observacion' => 6, 'fecha' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new ExamenMapBuilder();
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
		return str_replace(ExamenPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ExamenPeer::ID);

		$criteria->addSelectColumn(ExamenPeer::FK_ESCALANOTA_ID);

		$criteria->addSelectColumn(ExamenPeer::FK_ALUMNO_ID);

		$criteria->addSelectColumn(ExamenPeer::FK_ACTIVIDAD_ID);

		$criteria->addSelectColumn(ExamenPeer::FK_PERIODO_ID);

		$criteria->addSelectColumn(ExamenPeer::NOMBRE);

		$criteria->addSelectColumn(ExamenPeer::OBSERVACION);

		$criteria->addSelectColumn(ExamenPeer::FECHA);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ExamenPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ExamenPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = ExamenPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return ExamenPeer::populateObjects(ExamenPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ExamenPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(Examen $obj, $key = null)
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
			if (is_object($value) && $value instanceof Examen) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Examen object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = ExamenPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ExamenPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ExamenPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ExamenPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinEscalanota(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ExamenPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ExamenPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ExamenPeer::FK_ESCALANOTA_ID,), array(EscalanotaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAlumno(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ExamenPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ExamenPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ExamenPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);

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

								$criteria->setPrimaryTableName(ExamenPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ExamenPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ExamenPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinPeriodo(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ExamenPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ExamenPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ExamenPeer::FK_PERIODO_ID,), array(PeriodoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinEscalanota(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ExamenPeer::addSelectColumns($c);
		$startcol = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS);
		EscalanotaPeer::addSelectColumns($c);

		$c->addJoin(array(ExamenPeer::FK_ESCALANOTA_ID,), array(EscalanotaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ExamenPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ExamenPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ExamenPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ExamenPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = EscalanotaPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = EscalanotaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = EscalanotaPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					EscalanotaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addExamen($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAlumno(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ExamenPeer::addSelectColumns($c);
		$startcol = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS);
		AlumnoPeer::addSelectColumns($c);

		$c->addJoin(array(ExamenPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ExamenPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ExamenPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ExamenPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ExamenPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addExamen($obj1);

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

		ExamenPeer::addSelectColumns($c);
		$startcol = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS);
		ActividadPeer::addSelectColumns($c);

		$c->addJoin(array(ExamenPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ExamenPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ExamenPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ExamenPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ExamenPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addExamen($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinPeriodo(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ExamenPeer::addSelectColumns($c);
		$startcol = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS);
		PeriodoPeer::addSelectColumns($c);

		$c->addJoin(array(ExamenPeer::FK_PERIODO_ID,), array(PeriodoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ExamenPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ExamenPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ExamenPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ExamenPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = PeriodoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = PeriodoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = PeriodoPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					PeriodoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addExamen($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ExamenPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ExamenPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ExamenPeer::FK_ESCALANOTA_ID,), array(EscalanotaPeer::ID,), $join_behavior);
		$criteria->addJoin(array(ExamenPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$criteria->addJoin(array(ExamenPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$criteria->addJoin(array(ExamenPeer::FK_PERIODO_ID,), array(PeriodoPeer::ID,), $join_behavior);
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

		ExamenPeer::addSelectColumns($c);
		$startcol2 = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS);

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EscalanotaPeer::NUM_COLUMNS - EscalanotaPeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		PeriodoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (PeriodoPeer::NUM_COLUMNS - PeriodoPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(ExamenPeer::FK_ESCALANOTA_ID,), array(EscalanotaPeer::ID,), $join_behavior);
		$c->addJoin(array(ExamenPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$c->addJoin(array(ExamenPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$c->addJoin(array(ExamenPeer::FK_PERIODO_ID,), array(PeriodoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ExamenPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ExamenPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ExamenPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ExamenPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = EscalanotaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = EscalanotaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = EscalanotaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EscalanotaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addExamen($obj1);
			} 
			
			$key3 = AlumnoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = AlumnoPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = AlumnoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					AlumnoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addExamen($obj1);
			} 
			
			$key4 = ActividadPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = ActividadPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$omClass = ActividadPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ActividadPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addExamen($obj1);
			} 
			
			$key5 = PeriodoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = PeriodoPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$omClass = PeriodoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					PeriodoPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addExamen($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptEscalanota(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ExamenPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ExamenPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ExamenPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ExamenPeer::FK_PERIODO_ID,), array(PeriodoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptAlumno(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ExamenPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ExamenPeer::FK_ESCALANOTA_ID,), array(EscalanotaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ExamenPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ExamenPeer::FK_PERIODO_ID,), array(PeriodoPeer::ID,), $join_behavior);
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
			ExamenPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ExamenPeer::FK_ESCALANOTA_ID,), array(EscalanotaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ExamenPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ExamenPeer::FK_PERIODO_ID,), array(PeriodoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptPeriodo(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ExamenPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ExamenPeer::FK_ESCALANOTA_ID,), array(EscalanotaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ExamenPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ExamenPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptEscalanota(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ExamenPeer::addSelectColumns($c);
		$startcol2 = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		PeriodoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (PeriodoPeer::NUM_COLUMNS - PeriodoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ExamenPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$c->addJoin(array(ExamenPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$c->addJoin(array(ExamenPeer::FK_PERIODO_ID,), array(PeriodoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ExamenPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ExamenPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ExamenPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ExamenPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addExamen($obj1);

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
								$obj3->addExamen($obj1);

			} 
				
				$key4 = PeriodoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = PeriodoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = PeriodoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					PeriodoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addExamen($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptAlumno(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ExamenPeer::addSelectColumns($c);
		$startcol2 = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS);

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EscalanotaPeer::NUM_COLUMNS - EscalanotaPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		PeriodoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (PeriodoPeer::NUM_COLUMNS - PeriodoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ExamenPeer::FK_ESCALANOTA_ID,), array(EscalanotaPeer::ID,), $join_behavior);
				$c->addJoin(array(ExamenPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$c->addJoin(array(ExamenPeer::FK_PERIODO_ID,), array(PeriodoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ExamenPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ExamenPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ExamenPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ExamenPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = EscalanotaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EscalanotaPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = EscalanotaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EscalanotaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addExamen($obj1);

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
								$obj3->addExamen($obj1);

			} 
				
				$key4 = PeriodoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = PeriodoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = PeriodoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					PeriodoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addExamen($obj1);

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

		ExamenPeer::addSelectColumns($c);
		$startcol2 = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS);

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EscalanotaPeer::NUM_COLUMNS - EscalanotaPeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		PeriodoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (PeriodoPeer::NUM_COLUMNS - PeriodoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ExamenPeer::FK_ESCALANOTA_ID,), array(EscalanotaPeer::ID,), $join_behavior);
				$c->addJoin(array(ExamenPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$c->addJoin(array(ExamenPeer::FK_PERIODO_ID,), array(PeriodoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ExamenPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ExamenPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ExamenPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ExamenPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = EscalanotaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EscalanotaPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = EscalanotaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EscalanotaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addExamen($obj1);

			} 
				
				$key3 = AlumnoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = AlumnoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = AlumnoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					AlumnoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addExamen($obj1);

			} 
				
				$key4 = PeriodoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = PeriodoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = PeriodoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					PeriodoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addExamen($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptPeriodo(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ExamenPeer::addSelectColumns($c);
		$startcol2 = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS);

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EscalanotaPeer::NUM_COLUMNS - EscalanotaPeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ExamenPeer::FK_ESCALANOTA_ID,), array(EscalanotaPeer::ID,), $join_behavior);
				$c->addJoin(array(ExamenPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$c->addJoin(array(ExamenPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ExamenPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ExamenPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ExamenPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ExamenPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = EscalanotaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EscalanotaPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = EscalanotaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EscalanotaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addExamen($obj1);

			} 
				
				$key3 = AlumnoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = AlumnoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = AlumnoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					AlumnoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addExamen($obj1);

			} 
				
				$key4 = ActividadPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ActividadPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = ActividadPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ActividadPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addExamen($obj1);

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
		return ExamenPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(ExamenPeer::ID) && $criteria->keyContainsValue(ExamenPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ExamenPeer::ID.')');
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
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(ExamenPeer::ID);
			$selectCriteria->add(ExamenPeer::ID, $criteria->remove(ExamenPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ExamenPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												ExamenPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof Examen) {
						ExamenPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ExamenPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								ExamenPeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(Examen $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ExamenPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ExamenPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ExamenPeer::DATABASE_NAME, ExamenPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ExamenPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ExamenPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ExamenPeer::DATABASE_NAME);
		$criteria->add(ExamenPeer::ID, $pk);

		$v = ExamenPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ExamenPeer::DATABASE_NAME);
			$criteria->add(ExamenPeer::ID, $pks, Criteria::IN);
			$objs = ExamenPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseExamenPeer::DATABASE_NAME)->addTableBuilder(BaseExamenPeer::TABLE_NAME, BaseExamenPeer::getMapBuilder());

