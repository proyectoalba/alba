<?php


abstract class BaseUsuarioPermisoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'usuario_permiso';

	
	const CLASS_DEFAULT = 'lib.model.UsuarioPermiso';

	
	const NUM_COLUMNS = 2;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const FK_USUARIO_ID = 'usuario_permiso.FK_USUARIO_ID';

	
	const FK_PERMISO_ID = 'usuario_permiso.FK_PERMISO_ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('FkUsuarioId', 'FkPermisoId', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('fkUsuarioId', 'fkPermisoId', ),
		BasePeer::TYPE_COLNAME => array (self::FK_USUARIO_ID, self::FK_PERMISO_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('fk_usuario_id', 'fk_permiso_id', ),
		BasePeer::TYPE_NUM => array (0, 1, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('FkUsuarioId' => 0, 'FkPermisoId' => 1, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('fkUsuarioId' => 0, 'fkPermisoId' => 1, ),
		BasePeer::TYPE_COLNAME => array (self::FK_USUARIO_ID => 0, self::FK_PERMISO_ID => 1, ),
		BasePeer::TYPE_FIELDNAME => array ('fk_usuario_id' => 0, 'fk_permiso_id' => 1, ),
		BasePeer::TYPE_NUM => array (0, 1, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new UsuarioPermisoMapBuilder();
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
		return str_replace(UsuarioPermisoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(UsuarioPermisoPeer::FK_USUARIO_ID);

		$criteria->addSelectColumn(UsuarioPermisoPeer::FK_PERMISO_ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(UsuarioPermisoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPermisoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(UsuarioPermisoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = UsuarioPermisoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return UsuarioPermisoPeer::populateObjects(UsuarioPermisoPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(UsuarioPermisoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			UsuarioPermisoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(UsuarioPermiso $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = serialize(array((string) $obj->getFkUsuarioId(), (string) $obj->getFkPermisoId()));
			} 			self::$instances[$key] = $obj;
		}
	}

	
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof UsuarioPermiso) {
				$key = serialize(array((string) $value->getFkUsuarioId(), (string) $value->getFkPermisoId()));
			} elseif (is_array($value) && count($value) === 2) {
								$key = serialize(array((string) $value[0], (string) $value[1]));
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or UsuarioPermiso object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = UsuarioPermisoPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = UsuarioPermisoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = UsuarioPermisoPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				UsuarioPermisoPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinUsuario(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(UsuarioPermisoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPermisoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPermisoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(UsuarioPermisoPeer::FK_USUARIO_ID,), array(UsuarioPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinPermiso(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(UsuarioPermisoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPermisoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPermisoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(UsuarioPermisoPeer::FK_PERMISO_ID,), array(PermisoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinUsuario(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		UsuarioPermisoPeer::addSelectColumns($c);
		$startcol = (UsuarioPermisoPeer::NUM_COLUMNS - UsuarioPermisoPeer::NUM_LAZY_LOAD_COLUMNS);
		UsuarioPeer::addSelectColumns($c);

		$c->addJoin(array(UsuarioPermisoPeer::FK_USUARIO_ID,), array(UsuarioPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPermisoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPermisoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = UsuarioPermisoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPermisoPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = UsuarioPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = UsuarioPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					UsuarioPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addUsuarioPermiso($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinPermiso(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		UsuarioPermisoPeer::addSelectColumns($c);
		$startcol = (UsuarioPermisoPeer::NUM_COLUMNS - UsuarioPermisoPeer::NUM_LAZY_LOAD_COLUMNS);
		PermisoPeer::addSelectColumns($c);

		$c->addJoin(array(UsuarioPermisoPeer::FK_PERMISO_ID,), array(PermisoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPermisoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPermisoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = UsuarioPermisoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPermisoPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = PermisoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = PermisoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = PermisoPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					PermisoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addUsuarioPermiso($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(UsuarioPermisoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPermisoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPermisoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(UsuarioPermisoPeer::FK_USUARIO_ID,), array(UsuarioPeer::ID,), $join_behavior);
		$criteria->addJoin(array(UsuarioPermisoPeer::FK_PERMISO_ID,), array(PermisoPeer::ID,), $join_behavior);
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

		UsuarioPermisoPeer::addSelectColumns($c);
		$startcol2 = (UsuarioPermisoPeer::NUM_COLUMNS - UsuarioPermisoPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		PermisoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (PermisoPeer::NUM_COLUMNS - PermisoPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(UsuarioPermisoPeer::FK_USUARIO_ID,), array(UsuarioPeer::ID,), $join_behavior);
		$c->addJoin(array(UsuarioPermisoPeer::FK_PERMISO_ID,), array(PermisoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPermisoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPermisoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = UsuarioPermisoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPermisoPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = UsuarioPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = UsuarioPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					UsuarioPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addUsuarioPermiso($obj1);
			} 
			
			$key3 = PermisoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = PermisoPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = PermisoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					PermisoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addUsuarioPermiso($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptUsuario(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPermisoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPermisoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(UsuarioPermisoPeer::FK_PERMISO_ID,), array(PermisoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptPermiso(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPermisoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPermisoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(UsuarioPermisoPeer::FK_USUARIO_ID,), array(UsuarioPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptUsuario(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		UsuarioPermisoPeer::addSelectColumns($c);
		$startcol2 = (UsuarioPermisoPeer::NUM_COLUMNS - UsuarioPermisoPeer::NUM_LAZY_LOAD_COLUMNS);

		PermisoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (PermisoPeer::NUM_COLUMNS - PermisoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(UsuarioPermisoPeer::FK_PERMISO_ID,), array(PermisoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPermisoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPermisoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = UsuarioPermisoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPermisoPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = PermisoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = PermisoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = PermisoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					PermisoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addUsuarioPermiso($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptPermiso(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		UsuarioPermisoPeer::addSelectColumns($c);
		$startcol2 = (UsuarioPermisoPeer::NUM_COLUMNS - UsuarioPermisoPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(UsuarioPermisoPeer::FK_USUARIO_ID,), array(UsuarioPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPermisoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPermisoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = UsuarioPermisoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPermisoPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = UsuarioPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = UsuarioPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					UsuarioPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addUsuarioPermiso($obj1);

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
		return UsuarioPermisoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(UsuarioPermisoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
			$con = Propel::getConnection(UsuarioPermisoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(UsuarioPermisoPeer::FK_USUARIO_ID);
			$selectCriteria->add(UsuarioPermisoPeer::FK_USUARIO_ID, $criteria->remove(UsuarioPermisoPeer::FK_USUARIO_ID), $comparison);

			$comparison = $criteria->getComparison(UsuarioPermisoPeer::FK_PERMISO_ID);
			$selectCriteria->add(UsuarioPermisoPeer::FK_PERMISO_ID, $criteria->remove(UsuarioPermisoPeer::FK_PERMISO_ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(UsuarioPermisoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(UsuarioPermisoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(UsuarioPermisoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												UsuarioPermisoPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof UsuarioPermiso) {
						UsuarioPermisoPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
												if (count($values) == count($values, COUNT_RECURSIVE)) {
								$values = array($values);
			}

			foreach ($values as $value) {

				$criterion = $criteria->getNewCriterion(UsuarioPermisoPeer::FK_USUARIO_ID, $value[0]);
				$criterion->addAnd($criteria->getNewCriterion(UsuarioPermisoPeer::FK_PERMISO_ID, $value[1]));
				$criteria->addOr($criterion);

								UsuarioPermisoPeer::removeInstanceFromPool($value);
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

	
	public static function doValidate(UsuarioPermiso $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(UsuarioPermisoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(UsuarioPermisoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(UsuarioPermisoPeer::DATABASE_NAME, UsuarioPermisoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = UsuarioPermisoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($fk_usuario_id, $fk_permiso_id, PropelPDO $con = null) {
		$key = serialize(array((string) $fk_usuario_id, (string) $fk_permiso_id));
 		if (null !== ($obj = UsuarioPermisoPeer::getInstanceFromPool($key))) {
 			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPermisoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$criteria = new Criteria(UsuarioPermisoPeer::DATABASE_NAME);
		$criteria->add(UsuarioPermisoPeer::FK_USUARIO_ID, $fk_usuario_id);
		$criteria->add(UsuarioPermisoPeer::FK_PERMISO_ID, $fk_permiso_id);
		$v = UsuarioPermisoPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 

Propel::getDatabaseMap(BaseUsuarioPermisoPeer::DATABASE_NAME)->addTableBuilder(BaseUsuarioPermisoPeer::TABLE_NAME, BaseUsuarioPermisoPeer::getMapBuilder());

