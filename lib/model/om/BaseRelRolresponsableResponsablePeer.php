<?php


abstract class BaseRelRolresponsableResponsablePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'rel_rolresponsable_responsable';

	
	const CLASS_DEFAULT = 'lib.model.RelRolresponsableResponsable';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'rel_rolresponsable_responsable.ID';

	
	const FK_ROLRESPONSABLE_ID = 'rel_rolresponsable_responsable.FK_ROLRESPONSABLE_ID';

	
	const FK_RESPONSABLE_ID = 'rel_rolresponsable_responsable.FK_RESPONSABLE_ID';

	
	const FK_ALUMNO_ID = 'rel_rolresponsable_responsable.FK_ALUMNO_ID';

	
	const DESCRIPCION = 'rel_rolresponsable_responsable.DESCRIPCION';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkRolresponsableId', 'FkResponsableId', 'FkAlumnoId', 'Descripcion', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'fkRolresponsableId', 'fkResponsableId', 'fkAlumnoId', 'descripcion', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::FK_ROLRESPONSABLE_ID, self::FK_RESPONSABLE_ID, self::FK_ALUMNO_ID, self::DESCRIPCION, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_rolresponsable_id', 'fk_responsable_id', 'fk_alumno_id', 'descripcion', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkRolresponsableId' => 1, 'FkResponsableId' => 2, 'FkAlumnoId' => 3, 'Descripcion' => 4, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'fkRolresponsableId' => 1, 'fkResponsableId' => 2, 'fkAlumnoId' => 3, 'descripcion' => 4, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::FK_ROLRESPONSABLE_ID => 1, self::FK_RESPONSABLE_ID => 2, self::FK_ALUMNO_ID => 3, self::DESCRIPCION => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_rolresponsable_id' => 1, 'fk_responsable_id' => 2, 'fk_alumno_id' => 3, 'descripcion' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new RelRolresponsableResponsableMapBuilder();
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
		return str_replace(RelRolresponsableResponsablePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RelRolresponsableResponsablePeer::ID);

		$criteria->addSelectColumn(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID);

		$criteria->addSelectColumn(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID);

		$criteria->addSelectColumn(RelRolresponsableResponsablePeer::FK_ALUMNO_ID);

		$criteria->addSelectColumn(RelRolresponsableResponsablePeer::DESCRIPCION);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelRolresponsableResponsablePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelRolresponsableResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = RelRolresponsableResponsablePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return RelRolresponsableResponsablePeer::populateObjects(RelRolresponsableResponsablePeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			RelRolresponsableResponsablePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(RelRolresponsableResponsable $obj, $key = null)
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
			if (is_object($value) && $value instanceof RelRolresponsableResponsable) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RelRolresponsableResponsable object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = RelRolresponsableResponsablePeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = RelRolresponsableResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = RelRolresponsableResponsablePeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				RelRolresponsableResponsablePeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinRolResponsable(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelRolresponsableResponsablePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelRolresponsableResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinResponsable(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelRolresponsableResponsablePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelRolresponsableResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID,), array(ResponsablePeer::ID,), $join_behavior);

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

								$criteria->setPrimaryTableName(RelRolresponsableResponsablePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelRolresponsableResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelRolresponsableResponsablePeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinRolResponsable(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelRolresponsableResponsablePeer::addSelectColumns($c);
		$startcol = (RelRolresponsableResponsablePeer::NUM_COLUMNS - RelRolresponsableResponsablePeer::NUM_LAZY_LOAD_COLUMNS);
		RolResponsablePeer::addSelectColumns($c);

		$c->addJoin(array(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelRolresponsableResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelRolresponsableResponsablePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = RelRolresponsableResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelRolresponsableResponsablePeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = RolResponsablePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = RolResponsablePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = RolResponsablePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					RolResponsablePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelRolresponsableResponsable($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinResponsable(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelRolresponsableResponsablePeer::addSelectColumns($c);
		$startcol = (RelRolresponsableResponsablePeer::NUM_COLUMNS - RelRolresponsableResponsablePeer::NUM_LAZY_LOAD_COLUMNS);
		ResponsablePeer::addSelectColumns($c);

		$c->addJoin(array(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID,), array(ResponsablePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelRolresponsableResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelRolresponsableResponsablePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = RelRolresponsableResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelRolresponsableResponsablePeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = ResponsablePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ResponsablePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = ResponsablePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ResponsablePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelRolresponsableResponsable($obj1);

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

		RelRolresponsableResponsablePeer::addSelectColumns($c);
		$startcol = (RelRolresponsableResponsablePeer::NUM_COLUMNS - RelRolresponsableResponsablePeer::NUM_LAZY_LOAD_COLUMNS);
		AlumnoPeer::addSelectColumns($c);

		$c->addJoin(array(RelRolresponsableResponsablePeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelRolresponsableResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelRolresponsableResponsablePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = RelRolresponsableResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelRolresponsableResponsablePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addRelRolresponsableResponsable($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelRolresponsableResponsablePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelRolresponsableResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
		$criteria->addJoin(array(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID,), array(ResponsablePeer::ID,), $join_behavior);
		$criteria->addJoin(array(RelRolresponsableResponsablePeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
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

		RelRolresponsableResponsablePeer::addSelectColumns($c);
		$startcol2 = (RelRolresponsableResponsablePeer::NUM_COLUMNS - RelRolresponsableResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		RolResponsablePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (RolResponsablePeer::NUM_COLUMNS - RolResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		ResponsablePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
		$c->addJoin(array(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID,), array(ResponsablePeer::ID,), $join_behavior);
		$c->addJoin(array(RelRolresponsableResponsablePeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelRolresponsableResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelRolresponsableResponsablePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelRolresponsableResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelRolresponsableResponsablePeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = RolResponsablePeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = RolResponsablePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = RolResponsablePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					RolResponsablePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelRolresponsableResponsable($obj1);
			} 
			
			$key3 = ResponsablePeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = ResponsablePeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = ResponsablePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ResponsablePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addRelRolresponsableResponsable($obj1);
			} 
			
			$key4 = AlumnoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = AlumnoPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$omClass = AlumnoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					AlumnoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addRelRolresponsableResponsable($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptRolResponsable(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelRolresponsableResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID,), array(ResponsablePeer::ID,), $join_behavior);
				$criteria->addJoin(array(RelRolresponsableResponsablePeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptResponsable(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelRolresponsableResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
				$criteria->addJoin(array(RelRolresponsableResponsablePeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
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
			RelRolresponsableResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
				$criteria->addJoin(array(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID,), array(ResponsablePeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptRolResponsable(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelRolresponsableResponsablePeer::addSelectColumns($c);
		$startcol2 = (RelRolresponsableResponsablePeer::NUM_COLUMNS - RelRolresponsableResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		ResponsablePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID,), array(ResponsablePeer::ID,), $join_behavior);
				$c->addJoin(array(RelRolresponsableResponsablePeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelRolresponsableResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelRolresponsableResponsablePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelRolresponsableResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelRolresponsableResponsablePeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = ResponsablePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ResponsablePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = ResponsablePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ResponsablePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelRolresponsableResponsable($obj1);

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
								$obj3->addRelRolresponsableResponsable($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptResponsable(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelRolresponsableResponsablePeer::addSelectColumns($c);
		$startcol2 = (RelRolresponsableResponsablePeer::NUM_COLUMNS - RelRolresponsableResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		RolResponsablePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (RolResponsablePeer::NUM_COLUMNS - RolResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
				$c->addJoin(array(RelRolresponsableResponsablePeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelRolresponsableResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelRolresponsableResponsablePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelRolresponsableResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelRolresponsableResponsablePeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = RolResponsablePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = RolResponsablePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = RolResponsablePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					RolResponsablePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelRolresponsableResponsable($obj1);

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
								$obj3->addRelRolresponsableResponsable($obj1);

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

		RelRolresponsableResponsablePeer::addSelectColumns($c);
		$startcol2 = (RelRolresponsableResponsablePeer::NUM_COLUMNS - RelRolresponsableResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		RolResponsablePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (RolResponsablePeer::NUM_COLUMNS - RolResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		ResponsablePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
				$c->addJoin(array(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID,), array(ResponsablePeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelRolresponsableResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelRolresponsableResponsablePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelRolresponsableResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelRolresponsableResponsablePeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = RolResponsablePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = RolResponsablePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = RolResponsablePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					RolResponsablePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelRolresponsableResponsable($obj1);

			} 
				
				$key3 = ResponsablePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ResponsablePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ResponsablePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ResponsablePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addRelRolresponsableResponsable($obj1);

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
		return RelRolresponsableResponsablePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(RelRolresponsableResponsablePeer::ID) && $criteria->keyContainsValue(RelRolresponsableResponsablePeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.RelRolresponsableResponsablePeer::ID.')');
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
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(RelRolresponsableResponsablePeer::ID);
			$selectCriteria->add(RelRolresponsableResponsablePeer::ID, $criteria->remove(RelRolresponsableResponsablePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(RelRolresponsableResponsablePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												RelRolresponsableResponsablePeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof RelRolresponsableResponsable) {
						RelRolresponsableResponsablePeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RelRolresponsableResponsablePeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								RelRolresponsableResponsablePeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(RelRolresponsableResponsable $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RelRolresponsableResponsablePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RelRolresponsableResponsablePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RelRolresponsableResponsablePeer::DATABASE_NAME, RelRolresponsableResponsablePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RelRolresponsableResponsablePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = RelRolresponsableResponsablePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(RelRolresponsableResponsablePeer::DATABASE_NAME);
		$criteria->add(RelRolresponsableResponsablePeer::ID, $pk);

		$v = RelRolresponsableResponsablePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(RelRolresponsableResponsablePeer::DATABASE_NAME);
			$criteria->add(RelRolresponsableResponsablePeer::ID, $pks, Criteria::IN);
			$objs = RelRolresponsableResponsablePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseRelRolresponsableResponsablePeer::DATABASE_NAME)->addTableBuilder(BaseRelRolresponsableResponsablePeer::TABLE_NAME, BaseRelRolresponsableResponsablePeer::getMapBuilder());

