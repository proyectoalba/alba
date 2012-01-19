<?php


abstract class BaseRelDivisionActividadDocentePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'rel_division_actividad_docente';

	
	const CLASS_DEFAULT = 'lib.model.RelDivisionActividadDocente';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'rel_division_actividad_docente.ID';

	
	const FK_DIVISION_ID = 'rel_division_actividad_docente.FK_DIVISION_ID';

	
	const FK_ACTIVIDAD_ID = 'rel_division_actividad_docente.FK_ACTIVIDAD_ID';

	
	const FK_DOCENTE_ID = 'rel_division_actividad_docente.FK_DOCENTE_ID';

	
	const FK_EVENTO_ID = 'rel_division_actividad_docente.FK_EVENTO_ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkDivisionId', 'FkActividadId', 'FkDocenteId', 'FkEventoId', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'fkDivisionId', 'fkActividadId', 'fkDocenteId', 'fkEventoId', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::FK_DIVISION_ID, self::FK_ACTIVIDAD_ID, self::FK_DOCENTE_ID, self::FK_EVENTO_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_division_id', 'fk_actividad_id', 'fk_docente_id', 'fk_evento_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkDivisionId' => 1, 'FkActividadId' => 2, 'FkDocenteId' => 3, 'FkEventoId' => 4, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'fkDivisionId' => 1, 'fkActividadId' => 2, 'fkDocenteId' => 3, 'fkEventoId' => 4, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::FK_DIVISION_ID => 1, self::FK_ACTIVIDAD_ID => 2, self::FK_DOCENTE_ID => 3, self::FK_EVENTO_ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_division_id' => 1, 'fk_actividad_id' => 2, 'fk_docente_id' => 3, 'fk_evento_id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new RelDivisionActividadDocenteMapBuilder();
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
		return str_replace(RelDivisionActividadDocentePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FK_DIVISION_ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FK_DOCENTE_ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FK_EVENTO_ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelDivisionActividadDocentePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelDivisionActividadDocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = RelDivisionActividadDocentePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return RelDivisionActividadDocentePeer::populateObjects(RelDivisionActividadDocentePeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			RelDivisionActividadDocentePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(RelDivisionActividadDocente $obj, $key = null)
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
			if (is_object($value) && $value instanceof RelDivisionActividadDocente) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RelDivisionActividadDocente object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = RelDivisionActividadDocentePeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = RelDivisionActividadDocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = RelDivisionActividadDocentePeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				RelDivisionActividadDocentePeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinDivision(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelDivisionActividadDocentePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelDivisionActividadDocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_DIVISION_ID,), array(DivisionPeer::ID,), $join_behavior);

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

								$criteria->setPrimaryTableName(RelDivisionActividadDocentePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelDivisionActividadDocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);

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

								$criteria->setPrimaryTableName(RelDivisionActividadDocentePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelDivisionActividadDocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinEvento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelDivisionActividadDocentePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelDivisionActividadDocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinDivision(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS);
		DivisionPeer::addSelectColumns($c);

		$c->addJoin(array(RelDivisionActividadDocentePeer::FK_DIVISION_ID,), array(DivisionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelDivisionActividadDocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelDivisionActividadDocentePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = RelDivisionActividadDocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelDivisionActividadDocentePeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DivisionPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DivisionPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DivisionPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DivisionPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelDivisionActividadDocente($obj1);

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

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS);
		ActividadPeer::addSelectColumns($c);

		$c->addJoin(array(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelDivisionActividadDocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelDivisionActividadDocentePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = RelDivisionActividadDocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelDivisionActividadDocentePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addRelDivisionActividadDocente($obj1);

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

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS);
		DocentePeer::addSelectColumns($c);

		$c->addJoin(array(RelDivisionActividadDocentePeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelDivisionActividadDocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelDivisionActividadDocentePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = RelDivisionActividadDocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelDivisionActividadDocentePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addRelDivisionActividadDocente($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinEvento(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS);
		EventoPeer::addSelectColumns($c);

		$c->addJoin(array(RelDivisionActividadDocentePeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelDivisionActividadDocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelDivisionActividadDocentePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = RelDivisionActividadDocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelDivisionActividadDocentePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addRelDivisionActividadDocente($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelDivisionActividadDocentePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelDivisionActividadDocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_DIVISION_ID,), array(DivisionPeer::ID,), $join_behavior);
		$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);
		$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);
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

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS);

		DivisionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DivisionPeer::NUM_COLUMNS - DivisionPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		EventoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (EventoPeer::NUM_COLUMNS - EventoPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(RelDivisionActividadDocentePeer::FK_DIVISION_ID,), array(DivisionPeer::ID,), $join_behavior);
		$c->addJoin(array(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$c->addJoin(array(RelDivisionActividadDocentePeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);
		$c->addJoin(array(RelDivisionActividadDocentePeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelDivisionActividadDocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelDivisionActividadDocentePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelDivisionActividadDocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelDivisionActividadDocentePeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = DivisionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = DivisionPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DivisionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DivisionPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelDivisionActividadDocente($obj1);
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
								$obj3->addRelDivisionActividadDocente($obj1);
			} 
			
			$key4 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = DocentePeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					DocentePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addRelDivisionActividadDocente($obj1);
			} 
			
			$key5 = EventoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = EventoPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$omClass = EventoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					EventoPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addRelDivisionActividadDocente($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptDivision(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelDivisionActividadDocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);
				$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);
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
			RelDivisionActividadDocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_DIVISION_ID,), array(DivisionPeer::ID,), $join_behavior);
				$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);
				$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);
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
			RelDivisionActividadDocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_DIVISION_ID,), array(DivisionPeer::ID,), $join_behavior);
				$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptEvento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelDivisionActividadDocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_DIVISION_ID,), array(DivisionPeer::ID,), $join_behavior);
				$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$criteria->addJoin(array(RelDivisionActividadDocentePeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptDivision(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		EventoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (EventoPeer::NUM_COLUMNS - EventoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$c->addJoin(array(RelDivisionActividadDocentePeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);
				$c->addJoin(array(RelDivisionActividadDocentePeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelDivisionActividadDocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelDivisionActividadDocentePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelDivisionActividadDocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelDivisionActividadDocentePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addRelDivisionActividadDocente($obj1);

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
								$obj3->addRelDivisionActividadDocente($obj1);

			} 
				
				$key4 = EventoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = EventoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = EventoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EventoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addRelDivisionActividadDocente($obj1);

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

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS);

		DivisionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DivisionPeer::NUM_COLUMNS - DivisionPeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		EventoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (EventoPeer::NUM_COLUMNS - EventoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(RelDivisionActividadDocentePeer::FK_DIVISION_ID,), array(DivisionPeer::ID,), $join_behavior);
				$c->addJoin(array(RelDivisionActividadDocentePeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);
				$c->addJoin(array(RelDivisionActividadDocentePeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelDivisionActividadDocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelDivisionActividadDocentePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelDivisionActividadDocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelDivisionActividadDocentePeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = DivisionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DivisionPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = DivisionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DivisionPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelDivisionActividadDocente($obj1);

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
								$obj3->addRelDivisionActividadDocente($obj1);

			} 
				
				$key4 = EventoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = EventoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = EventoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EventoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addRelDivisionActividadDocente($obj1);

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

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS);

		DivisionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DivisionPeer::NUM_COLUMNS - DivisionPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		EventoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (EventoPeer::NUM_COLUMNS - EventoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(RelDivisionActividadDocentePeer::FK_DIVISION_ID,), array(DivisionPeer::ID,), $join_behavior);
				$c->addJoin(array(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$c->addJoin(array(RelDivisionActividadDocentePeer::FK_EVENTO_ID,), array(EventoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelDivisionActividadDocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelDivisionActividadDocentePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelDivisionActividadDocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelDivisionActividadDocentePeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = DivisionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DivisionPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = DivisionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DivisionPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelDivisionActividadDocente($obj1);

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
								$obj3->addRelDivisionActividadDocente($obj1);

			} 
				
				$key4 = EventoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = EventoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = EventoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EventoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addRelDivisionActividadDocente($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptEvento(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS);

		DivisionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DivisionPeer::NUM_COLUMNS - DivisionPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(RelDivisionActividadDocentePeer::FK_DIVISION_ID,), array(DivisionPeer::ID,), $join_behavior);
				$c->addJoin(array(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$c->addJoin(array(RelDivisionActividadDocentePeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelDivisionActividadDocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelDivisionActividadDocentePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelDivisionActividadDocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelDivisionActividadDocentePeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = DivisionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DivisionPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = DivisionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DivisionPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelDivisionActividadDocente($obj1);

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
								$obj3->addRelDivisionActividadDocente($obj1);

			} 
				
				$key4 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = DocentePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					DocentePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addRelDivisionActividadDocente($obj1);

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
		return RelDivisionActividadDocentePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(RelDivisionActividadDocentePeer::ID) && $criteria->keyContainsValue(RelDivisionActividadDocentePeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.RelDivisionActividadDocentePeer::ID.')');
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
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(RelDivisionActividadDocentePeer::ID);
			$selectCriteria->add(RelDivisionActividadDocentePeer::ID, $criteria->remove(RelDivisionActividadDocentePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(RelDivisionActividadDocentePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												RelDivisionActividadDocentePeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof RelDivisionActividadDocente) {
						RelDivisionActividadDocentePeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RelDivisionActividadDocentePeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								RelDivisionActividadDocentePeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(RelDivisionActividadDocente $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RelDivisionActividadDocentePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RelDivisionActividadDocentePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RelDivisionActividadDocentePeer::DATABASE_NAME, RelDivisionActividadDocentePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RelDivisionActividadDocentePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = RelDivisionActividadDocentePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(RelDivisionActividadDocentePeer::DATABASE_NAME);
		$criteria->add(RelDivisionActividadDocentePeer::ID, $pk);

		$v = RelDivisionActividadDocentePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(RelDivisionActividadDocentePeer::DATABASE_NAME);
			$criteria->add(RelDivisionActividadDocentePeer::ID, $pks, Criteria::IN);
			$objs = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseRelDivisionActividadDocentePeer::DATABASE_NAME)->addTableBuilder(BaseRelDivisionActividadDocentePeer::TABLE_NAME, BaseRelDivisionActividadDocentePeer::getMapBuilder());

