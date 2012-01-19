<?php


abstract class BaseHorarioescolarPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'horarioescolar';

	
	const CLASS_DEFAULT = 'lib.model.Horarioescolar';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'horarioescolar.ID';

	
	const NOMBRE = 'horarioescolar.NOMBRE';

	
	const DESCRIPCION = 'horarioescolar.DESCRIPCION';

	
	const FK_EVENTO_ID = 'horarioescolar.FK_EVENTO_ID';

	
	const FK_ESTABLECIMIENTO_ID = 'horarioescolar.FK_ESTABLECIMIENTO_ID';

	
	const FK_TURNO_ID = 'horarioescolar.FK_TURNO_ID';

	
	const FK_HORARIOESCOLARTIPO_ID = 'horarioescolar.FK_HORARIOESCOLARTIPO_ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nombre', 'Descripcion', 'FkEventoId', 'FkEstablecimientoId', 'FkTurnoId', 'FkHorarioescolartipoId', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'nombre', 'descripcion', 'fkEventoId', 'fkEstablecimientoId', 'fkTurnoId', 'fkHorarioescolartipoId', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::NOMBRE, self::DESCRIPCION, self::FK_EVENTO_ID, self::FK_ESTABLECIMIENTO_ID, self::FK_TURNO_ID, self::FK_HORARIOESCOLARTIPO_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nombre', 'descripcion', 'fk_evento_id', 'fk_establecimiento_id', 'fk_turno_id', 'fk_horarioescolartipo_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nombre' => 1, 'Descripcion' => 2, 'FkEventoId' => 3, 'FkEstablecimientoId' => 4, 'FkTurnoId' => 5, 'FkHorarioescolartipoId' => 6, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'nombre' => 1, 'descripcion' => 2, 'fkEventoId' => 3, 'fkEstablecimientoId' => 4, 'fkTurnoId' => 5, 'fkHorarioescolartipoId' => 6, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::NOMBRE => 1, self::DESCRIPCION => 2, self::FK_EVENTO_ID => 3, self::FK_ESTABLECIMIENTO_ID => 4, self::FK_TURNO_ID => 5, self::FK_HORARIOESCOLARTIPO_ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nombre' => 1, 'descripcion' => 2, 'fk_evento_id' => 3, 'fk_establecimiento_id' => 4, 'fk_turno_id' => 5, 'fk_horarioescolartipo_id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new HorarioescolarMapBuilder();
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
		return str_replace(HorarioescolarPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HorarioescolarPeer::ID);

		$criteria->addSelectColumn(HorarioescolarPeer::NOMBRE);

		$criteria->addSelectColumn(HorarioescolarPeer::DESCRIPCION);

		$criteria->addSelectColumn(HorarioescolarPeer::FK_EVENTO_ID);

		$criteria->addSelectColumn(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID);

		$criteria->addSelectColumn(HorarioescolarPeer::FK_TURNO_ID);

		$criteria->addSelectColumn(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(HorarioescolarPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			HorarioescolarPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = HorarioescolarPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return HorarioescolarPeer::populateObjects(HorarioescolarPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			HorarioescolarPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(Horarioescolar $obj, $key = null)
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
			if (is_object($value) && $value instanceof Horarioescolar) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Horarioescolar object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = HorarioescolarPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = HorarioescolarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = HorarioescolarPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				HorarioescolarPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinEvento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(HorarioescolarPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			HorarioescolarPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(HorarioescolarPeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinEstablecimiento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(HorarioescolarPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			HorarioescolarPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinTurno(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(HorarioescolarPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			HorarioescolarPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(HorarioescolarPeer::FK_TURNO_ID,), array(TurnoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinHorarioescolartipo(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(HorarioescolarPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			HorarioescolarPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID,), array(HorarioescolartipoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinEvento(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HorarioescolarPeer::addSelectColumns($c);
		$startcol = (HorarioescolarPeer::NUM_COLUMNS - HorarioescolarPeer::NUM_LAZY_LOAD_COLUMNS);
		EventoPeer::addSelectColumns($c);

		$c->addJoin(array(HorarioescolarPeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = HorarioescolarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = HorarioescolarPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = HorarioescolarPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				HorarioescolarPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = EventoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = EventoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = EventoPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					EventoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addHorarioescolar($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinEstablecimiento(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HorarioescolarPeer::addSelectColumns($c);
		$startcol = (HorarioescolarPeer::NUM_COLUMNS - HorarioescolarPeer::NUM_LAZY_LOAD_COLUMNS);
		EstablecimientoPeer::addSelectColumns($c);

		$c->addJoin(array(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = HorarioescolarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = HorarioescolarPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = HorarioescolarPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				HorarioescolarPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addHorarioescolar($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinTurno(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HorarioescolarPeer::addSelectColumns($c);
		$startcol = (HorarioescolarPeer::NUM_COLUMNS - HorarioescolarPeer::NUM_LAZY_LOAD_COLUMNS);
		TurnoPeer::addSelectColumns($c);

		$c->addJoin(array(HorarioescolarPeer::FK_TURNO_ID,), array(TurnoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = HorarioescolarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = HorarioescolarPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = HorarioescolarPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				HorarioescolarPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = TurnoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = TurnoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = TurnoPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					TurnoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addHorarioescolar($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinHorarioescolartipo(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HorarioescolarPeer::addSelectColumns($c);
		$startcol = (HorarioescolarPeer::NUM_COLUMNS - HorarioescolarPeer::NUM_LAZY_LOAD_COLUMNS);
		HorarioescolartipoPeer::addSelectColumns($c);

		$c->addJoin(array(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID,), array(HorarioescolartipoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = HorarioescolarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = HorarioescolarPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = HorarioescolarPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				HorarioescolarPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = HorarioescolartipoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = HorarioescolartipoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = HorarioescolartipoPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					HorarioescolartipoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addHorarioescolar($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(HorarioescolarPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			HorarioescolarPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(HorarioescolarPeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);
		$criteria->addJoin(array(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
		$criteria->addJoin(array(HorarioescolarPeer::FK_TURNO_ID,), array(TurnoPeer::ID,), $join_behavior);
		$criteria->addJoin(array(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID,), array(HorarioescolartipoPeer::ID,), $join_behavior);
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

		HorarioescolarPeer::addSelectColumns($c);
		$startcol2 = (HorarioescolarPeer::NUM_COLUMNS - HorarioescolarPeer::NUM_LAZY_LOAD_COLUMNS);

		EventoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EventoPeer::NUM_COLUMNS - EventoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		TurnoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (TurnoPeer::NUM_COLUMNS - TurnoPeer::NUM_LAZY_LOAD_COLUMNS);

		HorarioescolartipoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (HorarioescolartipoPeer::NUM_COLUMNS - HorarioescolartipoPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(HorarioescolarPeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);
		$c->addJoin(array(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
		$c->addJoin(array(HorarioescolarPeer::FK_TURNO_ID,), array(TurnoPeer::ID,), $join_behavior);
		$c->addJoin(array(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID,), array(HorarioescolartipoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = HorarioescolarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = HorarioescolarPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = HorarioescolarPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				HorarioescolarPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = EventoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = EventoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = EventoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EventoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addHorarioescolar($obj1);
			} 
			
			$key3 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = EstablecimientoPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					EstablecimientoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addHorarioescolar($obj1);
			} 
			
			$key4 = TurnoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = TurnoPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$omClass = TurnoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					TurnoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addHorarioescolar($obj1);
			} 
			
			$key5 = HorarioescolartipoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = HorarioescolartipoPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$omClass = HorarioescolartipoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					HorarioescolartipoPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addHorarioescolar($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptEvento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			HorarioescolarPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(HorarioescolarPeer::FK_TURNO_ID,), array(TurnoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID,), array(HorarioescolartipoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptEstablecimiento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			HorarioescolarPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(HorarioescolarPeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(HorarioescolarPeer::FK_TURNO_ID,), array(TurnoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID,), array(HorarioescolartipoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptTurno(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			HorarioescolarPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(HorarioescolarPeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID,), array(HorarioescolartipoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptHorarioescolartipo(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			HorarioescolarPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(HorarioescolarPeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(HorarioescolarPeer::FK_TURNO_ID,), array(TurnoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptEvento(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HorarioescolarPeer::addSelectColumns($c);
		$startcol2 = (HorarioescolarPeer::NUM_COLUMNS - HorarioescolarPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		TurnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (TurnoPeer::NUM_COLUMNS - TurnoPeer::NUM_LAZY_LOAD_COLUMNS);

		HorarioescolartipoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (HorarioescolartipoPeer::NUM_COLUMNS - HorarioescolartipoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$c->addJoin(array(HorarioescolarPeer::FK_TURNO_ID,), array(TurnoPeer::ID,), $join_behavior);
				$c->addJoin(array(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID,), array(HorarioescolartipoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = HorarioescolarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = HorarioescolarPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = HorarioescolarPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				HorarioescolarPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addHorarioescolar($obj1);

			} 
				
				$key3 = TurnoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = TurnoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = TurnoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					TurnoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addHorarioescolar($obj1);

			} 
				
				$key4 = HorarioescolartipoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = HorarioescolartipoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = HorarioescolartipoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					HorarioescolartipoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addHorarioescolar($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptEstablecimiento(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HorarioescolarPeer::addSelectColumns($c);
		$startcol2 = (HorarioescolarPeer::NUM_COLUMNS - HorarioescolarPeer::NUM_LAZY_LOAD_COLUMNS);

		EventoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EventoPeer::NUM_COLUMNS - EventoPeer::NUM_LAZY_LOAD_COLUMNS);

		TurnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (TurnoPeer::NUM_COLUMNS - TurnoPeer::NUM_LAZY_LOAD_COLUMNS);

		HorarioescolartipoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (HorarioescolartipoPeer::NUM_COLUMNS - HorarioescolartipoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(HorarioescolarPeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);
				$c->addJoin(array(HorarioescolarPeer::FK_TURNO_ID,), array(TurnoPeer::ID,), $join_behavior);
				$c->addJoin(array(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID,), array(HorarioescolartipoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = HorarioescolarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = HorarioescolarPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = HorarioescolarPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				HorarioescolarPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = EventoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EventoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = EventoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EventoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addHorarioescolar($obj1);

			} 
				
				$key3 = TurnoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = TurnoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = TurnoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					TurnoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addHorarioescolar($obj1);

			} 
				
				$key4 = HorarioescolartipoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = HorarioescolartipoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = HorarioescolartipoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					HorarioescolartipoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addHorarioescolar($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptTurno(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HorarioescolarPeer::addSelectColumns($c);
		$startcol2 = (HorarioescolarPeer::NUM_COLUMNS - HorarioescolarPeer::NUM_LAZY_LOAD_COLUMNS);

		EventoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EventoPeer::NUM_COLUMNS - EventoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		HorarioescolartipoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (HorarioescolartipoPeer::NUM_COLUMNS - HorarioescolartipoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(HorarioescolarPeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);
				$c->addJoin(array(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$c->addJoin(array(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID,), array(HorarioescolartipoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = HorarioescolarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = HorarioescolarPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = HorarioescolarPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				HorarioescolarPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = EventoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EventoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = EventoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EventoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addHorarioescolar($obj1);

			} 
				
				$key3 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = EstablecimientoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					EstablecimientoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addHorarioescolar($obj1);

			} 
				
				$key4 = HorarioescolartipoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = HorarioescolartipoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = HorarioescolartipoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					HorarioescolartipoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addHorarioescolar($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptHorarioescolartipo(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HorarioescolarPeer::addSelectColumns($c);
		$startcol2 = (HorarioescolarPeer::NUM_COLUMNS - HorarioescolarPeer::NUM_LAZY_LOAD_COLUMNS);

		EventoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EventoPeer::NUM_COLUMNS - EventoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		TurnoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (TurnoPeer::NUM_COLUMNS - TurnoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(HorarioescolarPeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);
				$c->addJoin(array(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$c->addJoin(array(HorarioescolarPeer::FK_TURNO_ID,), array(TurnoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = HorarioescolarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = HorarioescolarPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = HorarioescolarPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				HorarioescolarPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = EventoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EventoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = EventoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EventoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addHorarioescolar($obj1);

			} 
				
				$key3 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = EstablecimientoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					EstablecimientoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addHorarioescolar($obj1);

			} 
				
				$key4 = TurnoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = TurnoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = TurnoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					TurnoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addHorarioescolar($obj1);

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
		return HorarioescolarPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(HorarioescolarPeer::ID) && $criteria->keyContainsValue(HorarioescolarPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.HorarioescolarPeer::ID.')');
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
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(HorarioescolarPeer::ID);
			$selectCriteria->add(HorarioescolarPeer::ID, $criteria->remove(HorarioescolarPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(HorarioescolarPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												HorarioescolarPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof Horarioescolar) {
						HorarioescolarPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HorarioescolarPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								HorarioescolarPeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(Horarioescolar $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HorarioescolarPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HorarioescolarPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HorarioescolarPeer::DATABASE_NAME, HorarioescolarPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HorarioescolarPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = HorarioescolarPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(HorarioescolarPeer::DATABASE_NAME);
		$criteria->add(HorarioescolarPeer::ID, $pk);

		$v = HorarioescolarPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(HorarioescolarPeer::DATABASE_NAME);
			$criteria->add(HorarioescolarPeer::ID, $pks, Criteria::IN);
			$objs = HorarioescolarPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseHorarioescolarPeer::DATABASE_NAME)->addTableBuilder(BaseHorarioescolarPeer::TABLE_NAME, BaseHorarioescolarPeer::getMapBuilder());

