<?php


abstract class BaseCuentaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cuenta';

	
	const CLASS_DEFAULT = 'lib.model.Cuenta';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'cuenta.ID';

	
	const NOMBRE = 'cuenta.NOMBRE';

	
	const RAZON_SOCIAL = 'cuenta.RAZON_SOCIAL';

	
	const CUIT = 'cuenta.CUIT';

	
	const DIRECCION = 'cuenta.DIRECCION';

	
	const CIUDAD = 'cuenta.CIUDAD';

	
	const CODIGO_POSTAL = 'cuenta.CODIGO_POSTAL';

	
	const TELEFONO = 'cuenta.TELEFONO';

	
	const FK_PROVINCIA_ID = 'cuenta.FK_PROVINCIA_ID';

	
	const FK_TIPOIVA_ID = 'cuenta.FK_TIPOIVA_ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nombre', 'RazonSocial', 'Cuit', 'Direccion', 'Ciudad', 'CodigoPostal', 'Telefono', 'FkProvinciaId', 'FkTipoivaId', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'nombre', 'razonSocial', 'cuit', 'direccion', 'ciudad', 'codigoPostal', 'telefono', 'fkProvinciaId', 'fkTipoivaId', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::NOMBRE, self::RAZON_SOCIAL, self::CUIT, self::DIRECCION, self::CIUDAD, self::CODIGO_POSTAL, self::TELEFONO, self::FK_PROVINCIA_ID, self::FK_TIPOIVA_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nombre', 'razon_social', 'cuit', 'direccion', 'ciudad', 'codigo_postal', 'telefono', 'fk_provincia_id', 'fk_tipoiva_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nombre' => 1, 'RazonSocial' => 2, 'Cuit' => 3, 'Direccion' => 4, 'Ciudad' => 5, 'CodigoPostal' => 6, 'Telefono' => 7, 'FkProvinciaId' => 8, 'FkTipoivaId' => 9, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'nombre' => 1, 'razonSocial' => 2, 'cuit' => 3, 'direccion' => 4, 'ciudad' => 5, 'codigoPostal' => 6, 'telefono' => 7, 'fkProvinciaId' => 8, 'fkTipoivaId' => 9, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::NOMBRE => 1, self::RAZON_SOCIAL => 2, self::CUIT => 3, self::DIRECCION => 4, self::CIUDAD => 5, self::CODIGO_POSTAL => 6, self::TELEFONO => 7, self::FK_PROVINCIA_ID => 8, self::FK_TIPOIVA_ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nombre' => 1, 'razon_social' => 2, 'cuit' => 3, 'direccion' => 4, 'ciudad' => 5, 'codigo_postal' => 6, 'telefono' => 7, 'fk_provincia_id' => 8, 'fk_tipoiva_id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new CuentaMapBuilder();
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
		return str_replace(CuentaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CuentaPeer::ID);

		$criteria->addSelectColumn(CuentaPeer::NOMBRE);

		$criteria->addSelectColumn(CuentaPeer::RAZON_SOCIAL);

		$criteria->addSelectColumn(CuentaPeer::CUIT);

		$criteria->addSelectColumn(CuentaPeer::DIRECCION);

		$criteria->addSelectColumn(CuentaPeer::CIUDAD);

		$criteria->addSelectColumn(CuentaPeer::CODIGO_POSTAL);

		$criteria->addSelectColumn(CuentaPeer::TELEFONO);

		$criteria->addSelectColumn(CuentaPeer::FK_PROVINCIA_ID);

		$criteria->addSelectColumn(CuentaPeer::FK_TIPOIVA_ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(CuentaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CuentaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = CuentaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return CuentaPeer::populateObjects(CuentaPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			CuentaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(Cuenta $obj, $key = null)
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
			if (is_object($value) && $value instanceof Cuenta) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Cuenta object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = CuentaPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = CuentaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = CuentaPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				CuentaPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinProvincia(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(CuentaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CuentaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(CuentaPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinTipoiva(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(CuentaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CuentaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(CuentaPeer::FK_TIPOIVA_ID,), array(TipoivaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinProvincia(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CuentaPeer::addSelectColumns($c);
		$startcol = (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);
		ProvinciaPeer::addSelectColumns($c);

		$c->addJoin(array(CuentaPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CuentaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CuentaPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = CuentaPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				CuentaPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = ProvinciaPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ProvinciaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = ProvinciaPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ProvinciaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addCuenta($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinTipoiva(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CuentaPeer::addSelectColumns($c);
		$startcol = (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);
		TipoivaPeer::addSelectColumns($c);

		$c->addJoin(array(CuentaPeer::FK_TIPOIVA_ID,), array(TipoivaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CuentaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CuentaPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = CuentaPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				CuentaPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = TipoivaPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = TipoivaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = TipoivaPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					TipoivaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addCuenta($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(CuentaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CuentaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(CuentaPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$criteria->addJoin(array(CuentaPeer::FK_TIPOIVA_ID,), array(TipoivaPeer::ID,), $join_behavior);
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

		CuentaPeer::addSelectColumns($c);
		$startcol2 = (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		TipoivaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (TipoivaPeer::NUM_COLUMNS - TipoivaPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(CuentaPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$c->addJoin(array(CuentaPeer::FK_TIPOIVA_ID,), array(TipoivaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CuentaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CuentaPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = CuentaPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				CuentaPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = ProvinciaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = ProvinciaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = ProvinciaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ProvinciaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addCuenta($obj1);
			} 
			
			$key3 = TipoivaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = TipoivaPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = TipoivaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					TipoivaPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addCuenta($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptProvincia(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CuentaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(CuentaPeer::FK_TIPOIVA_ID,), array(TipoivaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptTipoiva(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CuentaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(CuentaPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptProvincia(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CuentaPeer::addSelectColumns($c);
		$startcol2 = (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);

		TipoivaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (TipoivaPeer::NUM_COLUMNS - TipoivaPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(CuentaPeer::FK_TIPOIVA_ID,), array(TipoivaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CuentaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CuentaPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = CuentaPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				CuentaPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = TipoivaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = TipoivaPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = TipoivaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					TipoivaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addCuenta($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptTipoiva(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CuentaPeer::addSelectColumns($c);
		$startcol2 = (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(CuentaPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CuentaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CuentaPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = CuentaPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				CuentaPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = ProvinciaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ProvinciaPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = ProvinciaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ProvinciaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addCuenta($obj1);

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
		return CuentaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(CuentaPeer::ID) && $criteria->keyContainsValue(CuentaPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.CuentaPeer::ID.')');
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
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(CuentaPeer::ID);
			$selectCriteria->add(CuentaPeer::ID, $criteria->remove(CuentaPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(CuentaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												CuentaPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof Cuenta) {
						CuentaPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CuentaPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								CuentaPeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(Cuenta $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CuentaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CuentaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CuentaPeer::DATABASE_NAME, CuentaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CuentaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = CuentaPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(CuentaPeer::DATABASE_NAME);
		$criteria->add(CuentaPeer::ID, $pk);

		$v = CuentaPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(CuentaPeer::DATABASE_NAME);
			$criteria->add(CuentaPeer::ID, $pks, Criteria::IN);
			$objs = CuentaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseCuentaPeer::DATABASE_NAME)->addTableBuilder(BaseCuentaPeer::TABLE_NAME, BaseCuentaPeer::getMapBuilder());

