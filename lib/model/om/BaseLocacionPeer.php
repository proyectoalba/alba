<?php


abstract class BaseLocacionPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'locacion';

	
	const CLASS_DEFAULT = 'lib.model.Locacion';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'locacion.ID';

	
	const NOMBRE = 'locacion.NOMBRE';

	
	const DESCRIPCION = 'locacion.DESCRIPCION';

	
	const DIRECCION = 'locacion.DIRECCION';

	
	const CIUDAD = 'locacion.CIUDAD';

	
	const CODIGO_POSTAL = 'locacion.CODIGO_POSTAL';

	
	const FK_PROVINCIA_ID = 'locacion.FK_PROVINCIA_ID';

	
	const FK_TIPOLOCACION_ID = 'locacion.FK_TIPOLOCACION_ID';

	
	const TELEFONO = 'locacion.TELEFONO';

	
	const FAX = 'locacion.FAX';

	
	const ENCARGADO = 'locacion.ENCARGADO';

	
	const ENCARGADO_TELEFONO = 'locacion.ENCARGADO_TELEFONO';

	
	const PRINCIPAL = 'locacion.PRINCIPAL';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nombre', 'Descripcion', 'Direccion', 'Ciudad', 'CodigoPostal', 'FkProvinciaId', 'FkTipolocacionId', 'Telefono', 'Fax', 'Encargado', 'EncargadoTelefono', 'Principal', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'nombre', 'descripcion', 'direccion', 'ciudad', 'codigoPostal', 'fkProvinciaId', 'fkTipolocacionId', 'telefono', 'fax', 'encargado', 'encargadoTelefono', 'principal', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::NOMBRE, self::DESCRIPCION, self::DIRECCION, self::CIUDAD, self::CODIGO_POSTAL, self::FK_PROVINCIA_ID, self::FK_TIPOLOCACION_ID, self::TELEFONO, self::FAX, self::ENCARGADO, self::ENCARGADO_TELEFONO, self::PRINCIPAL, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nombre', 'descripcion', 'direccion', 'ciudad', 'codigo_postal', 'fk_provincia_id', 'fk_tipolocacion_id', 'telefono', 'fax', 'encargado', 'encargado_telefono', 'principal', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nombre' => 1, 'Descripcion' => 2, 'Direccion' => 3, 'Ciudad' => 4, 'CodigoPostal' => 5, 'FkProvinciaId' => 6, 'FkTipolocacionId' => 7, 'Telefono' => 8, 'Fax' => 9, 'Encargado' => 10, 'EncargadoTelefono' => 11, 'Principal' => 12, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'nombre' => 1, 'descripcion' => 2, 'direccion' => 3, 'ciudad' => 4, 'codigoPostal' => 5, 'fkProvinciaId' => 6, 'fkTipolocacionId' => 7, 'telefono' => 8, 'fax' => 9, 'encargado' => 10, 'encargadoTelefono' => 11, 'principal' => 12, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::NOMBRE => 1, self::DESCRIPCION => 2, self::DIRECCION => 3, self::CIUDAD => 4, self::CODIGO_POSTAL => 5, self::FK_PROVINCIA_ID => 6, self::FK_TIPOLOCACION_ID => 7, self::TELEFONO => 8, self::FAX => 9, self::ENCARGADO => 10, self::ENCARGADO_TELEFONO => 11, self::PRINCIPAL => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nombre' => 1, 'descripcion' => 2, 'direccion' => 3, 'ciudad' => 4, 'codigo_postal' => 5, 'fk_provincia_id' => 6, 'fk_tipolocacion_id' => 7, 'telefono' => 8, 'fax' => 9, 'encargado' => 10, 'encargado_telefono' => 11, 'principal' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new LocacionMapBuilder();
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
		return str_replace(LocacionPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LocacionPeer::ID);

		$criteria->addSelectColumn(LocacionPeer::NOMBRE);

		$criteria->addSelectColumn(LocacionPeer::DESCRIPCION);

		$criteria->addSelectColumn(LocacionPeer::DIRECCION);

		$criteria->addSelectColumn(LocacionPeer::CIUDAD);

		$criteria->addSelectColumn(LocacionPeer::CODIGO_POSTAL);

		$criteria->addSelectColumn(LocacionPeer::FK_PROVINCIA_ID);

		$criteria->addSelectColumn(LocacionPeer::FK_TIPOLOCACION_ID);

		$criteria->addSelectColumn(LocacionPeer::TELEFONO);

		$criteria->addSelectColumn(LocacionPeer::FAX);

		$criteria->addSelectColumn(LocacionPeer::ENCARGADO);

		$criteria->addSelectColumn(LocacionPeer::ENCARGADO_TELEFONO);

		$criteria->addSelectColumn(LocacionPeer::PRINCIPAL);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(LocacionPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LocacionPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = LocacionPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return LocacionPeer::populateObjects(LocacionPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			LocacionPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(Locacion $obj, $key = null)
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
			if (is_object($value) && $value instanceof Locacion) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Locacion object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = LocacionPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = LocacionPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = LocacionPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				LocacionPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinProvincia(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(LocacionPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LocacionPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(LocacionPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinTipolocacion(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(LocacionPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LocacionPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(LocacionPeer::FK_TIPOLOCACION_ID,), array(TipolocacionPeer::ID,), $join_behavior);

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

		LocacionPeer::addSelectColumns($c);
		$startcol = (LocacionPeer::NUM_COLUMNS - LocacionPeer::NUM_LAZY_LOAD_COLUMNS);
		ProvinciaPeer::addSelectColumns($c);

		$c->addJoin(array(LocacionPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LocacionPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LocacionPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = LocacionPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				LocacionPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addLocacion($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinTipolocacion(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LocacionPeer::addSelectColumns($c);
		$startcol = (LocacionPeer::NUM_COLUMNS - LocacionPeer::NUM_LAZY_LOAD_COLUMNS);
		TipolocacionPeer::addSelectColumns($c);

		$c->addJoin(array(LocacionPeer::FK_TIPOLOCACION_ID,), array(TipolocacionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LocacionPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LocacionPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = LocacionPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				LocacionPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = TipolocacionPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = TipolocacionPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = TipolocacionPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					TipolocacionPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addLocacion($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(LocacionPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LocacionPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(LocacionPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$criteria->addJoin(array(LocacionPeer::FK_TIPOLOCACION_ID,), array(TipolocacionPeer::ID,), $join_behavior);
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

		LocacionPeer::addSelectColumns($c);
		$startcol2 = (LocacionPeer::NUM_COLUMNS - LocacionPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		TipolocacionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (TipolocacionPeer::NUM_COLUMNS - TipolocacionPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(LocacionPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$c->addJoin(array(LocacionPeer::FK_TIPOLOCACION_ID,), array(TipolocacionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LocacionPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LocacionPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = LocacionPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				LocacionPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addLocacion($obj1);
			} 
			
			$key3 = TipolocacionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = TipolocacionPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = TipolocacionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					TipolocacionPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addLocacion($obj1);
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
			LocacionPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(LocacionPeer::FK_TIPOLOCACION_ID,), array(TipolocacionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptTipolocacion(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LocacionPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(LocacionPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
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

		LocacionPeer::addSelectColumns($c);
		$startcol2 = (LocacionPeer::NUM_COLUMNS - LocacionPeer::NUM_LAZY_LOAD_COLUMNS);

		TipolocacionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (TipolocacionPeer::NUM_COLUMNS - TipolocacionPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(LocacionPeer::FK_TIPOLOCACION_ID,), array(TipolocacionPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LocacionPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LocacionPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = LocacionPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				LocacionPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = TipolocacionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = TipolocacionPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = TipolocacionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					TipolocacionPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addLocacion($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptTipolocacion(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LocacionPeer::addSelectColumns($c);
		$startcol2 = (LocacionPeer::NUM_COLUMNS - LocacionPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(LocacionPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LocacionPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LocacionPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = LocacionPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				LocacionPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addLocacion($obj1);

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
		return LocacionPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(LocacionPeer::ID) && $criteria->keyContainsValue(LocacionPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.LocacionPeer::ID.')');
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
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(LocacionPeer::ID);
			$selectCriteria->add(LocacionPeer::ID, $criteria->remove(LocacionPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(LocacionPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												LocacionPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof Locacion) {
						LocacionPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LocacionPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								LocacionPeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(Locacion $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LocacionPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LocacionPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LocacionPeer::DATABASE_NAME, LocacionPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LocacionPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = LocacionPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(LocacionPeer::DATABASE_NAME);
		$criteria->add(LocacionPeer::ID, $pk);

		$v = LocacionPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(LocacionPeer::DATABASE_NAME);
			$criteria->add(LocacionPeer::ID, $pks, Criteria::IN);
			$objs = LocacionPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseLocacionPeer::DATABASE_NAME)->addTableBuilder(BaseLocacionPeer::TABLE_NAME, BaseLocacionPeer::getMapBuilder());

