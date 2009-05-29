<?php


abstract class BaseEstablecimientoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'establecimiento';

	
	const CLASS_DEFAULT = 'lib.model.Establecimiento';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'establecimiento.ID';

	
	const NOMBRE = 'establecimiento.NOMBRE';

	
	const DESCRIPCION = 'establecimiento.DESCRIPCION';

	
	const CUIT = 'establecimiento.CUIT';

	
	const LEGAJOPREFIJO = 'establecimiento.LEGAJOPREFIJO';

	
	const LEGAJOSIGUIENTE = 'establecimiento.LEGAJOSIGUIENTE';

	
	const FK_DISTRITOESCOLAR_ID = 'establecimiento.FK_DISTRITOESCOLAR_ID';

	
	const FK_ORGANIZACION_ID = 'establecimiento.FK_ORGANIZACION_ID';

	
	const FK_NIVELTIPO_ID = 'establecimiento.FK_NIVELTIPO_ID';

	
	const DIRECCION = 'establecimiento.DIRECCION';

	
	const CIUDAD = 'establecimiento.CIUDAD';

	
	const CODIGO_POSTAL = 'establecimiento.CODIGO_POSTAL';

	
	const TELEFONO = 'establecimiento.TELEFONO';

	
	const FK_PROVINCIA_ID = 'establecimiento.FK_PROVINCIA_ID';

	
	const RECTOR = 'establecimiento.RECTOR';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nombre', 'Descripcion', 'Cuit', 'Legajoprefijo', 'Legajosiguiente', 'FkDistritoescolarId', 'FkOrganizacionId', 'FkNiveltipoId', 'Direccion', 'Ciudad', 'CodigoPostal', 'Telefono', 'FkProvinciaId', 'Rector', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'nombre', 'descripcion', 'cuit', 'legajoprefijo', 'legajosiguiente', 'fkDistritoescolarId', 'fkOrganizacionId', 'fkNiveltipoId', 'direccion', 'ciudad', 'codigoPostal', 'telefono', 'fkProvinciaId', 'rector', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::NOMBRE, self::DESCRIPCION, self::CUIT, self::LEGAJOPREFIJO, self::LEGAJOSIGUIENTE, self::FK_DISTRITOESCOLAR_ID, self::FK_ORGANIZACION_ID, self::FK_NIVELTIPO_ID, self::DIRECCION, self::CIUDAD, self::CODIGO_POSTAL, self::TELEFONO, self::FK_PROVINCIA_ID, self::RECTOR, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nombre', 'descripcion', 'cuit', 'legajoprefijo', 'legajosiguiente', 'fk_distritoescolar_id', 'fk_organizacion_id', 'fk_niveltipo_id', 'direccion', 'ciudad', 'codigo_postal', 'telefono', 'fk_provincia_id', 'rector', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nombre' => 1, 'Descripcion' => 2, 'Cuit' => 3, 'Legajoprefijo' => 4, 'Legajosiguiente' => 5, 'FkDistritoescolarId' => 6, 'FkOrganizacionId' => 7, 'FkNiveltipoId' => 8, 'Direccion' => 9, 'Ciudad' => 10, 'CodigoPostal' => 11, 'Telefono' => 12, 'FkProvinciaId' => 13, 'Rector' => 14, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'nombre' => 1, 'descripcion' => 2, 'cuit' => 3, 'legajoprefijo' => 4, 'legajosiguiente' => 5, 'fkDistritoescolarId' => 6, 'fkOrganizacionId' => 7, 'fkNiveltipoId' => 8, 'direccion' => 9, 'ciudad' => 10, 'codigoPostal' => 11, 'telefono' => 12, 'fkProvinciaId' => 13, 'rector' => 14, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::NOMBRE => 1, self::DESCRIPCION => 2, self::CUIT => 3, self::LEGAJOPREFIJO => 4, self::LEGAJOSIGUIENTE => 5, self::FK_DISTRITOESCOLAR_ID => 6, self::FK_ORGANIZACION_ID => 7, self::FK_NIVELTIPO_ID => 8, self::DIRECCION => 9, self::CIUDAD => 10, self::CODIGO_POSTAL => 11, self::TELEFONO => 12, self::FK_PROVINCIA_ID => 13, self::RECTOR => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nombre' => 1, 'descripcion' => 2, 'cuit' => 3, 'legajoprefijo' => 4, 'legajosiguiente' => 5, 'fk_distritoescolar_id' => 6, 'fk_organizacion_id' => 7, 'fk_niveltipo_id' => 8, 'direccion' => 9, 'ciudad' => 10, 'codigo_postal' => 11, 'telefono' => 12, 'fk_provincia_id' => 13, 'rector' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new EstablecimientoMapBuilder();
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
		return str_replace(EstablecimientoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EstablecimientoPeer::ID);

		$criteria->addSelectColumn(EstablecimientoPeer::NOMBRE);

		$criteria->addSelectColumn(EstablecimientoPeer::DESCRIPCION);

		$criteria->addSelectColumn(EstablecimientoPeer::CUIT);

		$criteria->addSelectColumn(EstablecimientoPeer::LEGAJOPREFIJO);

		$criteria->addSelectColumn(EstablecimientoPeer::LEGAJOSIGUIENTE);

		$criteria->addSelectColumn(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID);

		$criteria->addSelectColumn(EstablecimientoPeer::FK_ORGANIZACION_ID);

		$criteria->addSelectColumn(EstablecimientoPeer::FK_NIVELTIPO_ID);

		$criteria->addSelectColumn(EstablecimientoPeer::DIRECCION);

		$criteria->addSelectColumn(EstablecimientoPeer::CIUDAD);

		$criteria->addSelectColumn(EstablecimientoPeer::CODIGO_POSTAL);

		$criteria->addSelectColumn(EstablecimientoPeer::TELEFONO);

		$criteria->addSelectColumn(EstablecimientoPeer::FK_PROVINCIA_ID);

		$criteria->addSelectColumn(EstablecimientoPeer::RECTOR);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(EstablecimientoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EstablecimientoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = EstablecimientoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return EstablecimientoPeer::populateObjects(EstablecimientoPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			EstablecimientoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(Establecimiento $obj, $key = null)
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
			if (is_object($value) && $value instanceof Establecimiento) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Establecimiento object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = EstablecimientoPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = EstablecimientoPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				EstablecimientoPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinDistritoescolar(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(EstablecimientoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EstablecimientoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID,), array(DistritoescolarPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinOrganizacion(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(EstablecimientoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EstablecimientoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(EstablecimientoPeer::FK_ORGANIZACION_ID,), array(OrganizacionPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinNiveltipo(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(EstablecimientoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EstablecimientoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(EstablecimientoPeer::FK_NIVELTIPO_ID,), array(NiveltipoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinProvincia(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(EstablecimientoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EstablecimientoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(EstablecimientoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinDistritoescolar(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EstablecimientoPeer::addSelectColumns($c);
		$startcol = (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);
		DistritoescolarPeer::addSelectColumns($c);

		$c->addJoin(array(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID,), array(DistritoescolarPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EstablecimientoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = EstablecimientoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				EstablecimientoPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DistritoescolarPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DistritoescolarPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DistritoescolarPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DistritoescolarPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addEstablecimiento($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinOrganizacion(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EstablecimientoPeer::addSelectColumns($c);
		$startcol = (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);
		OrganizacionPeer::addSelectColumns($c);

		$c->addJoin(array(EstablecimientoPeer::FK_ORGANIZACION_ID,), array(OrganizacionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EstablecimientoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = EstablecimientoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				EstablecimientoPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = OrganizacionPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = OrganizacionPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = OrganizacionPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					OrganizacionPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addEstablecimiento($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinNiveltipo(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EstablecimientoPeer::addSelectColumns($c);
		$startcol = (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);
		NiveltipoPeer::addSelectColumns($c);

		$c->addJoin(array(EstablecimientoPeer::FK_NIVELTIPO_ID,), array(NiveltipoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EstablecimientoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = EstablecimientoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				EstablecimientoPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = NiveltipoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = NiveltipoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = NiveltipoPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					NiveltipoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addEstablecimiento($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinProvincia(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EstablecimientoPeer::addSelectColumns($c);
		$startcol = (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);
		ProvinciaPeer::addSelectColumns($c);

		$c->addJoin(array(EstablecimientoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EstablecimientoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = EstablecimientoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				EstablecimientoPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addEstablecimiento($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(EstablecimientoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EstablecimientoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID,), array(DistritoescolarPeer::ID,), $join_behavior);
		$criteria->addJoin(array(EstablecimientoPeer::FK_ORGANIZACION_ID,), array(OrganizacionPeer::ID,), $join_behavior);
		$criteria->addJoin(array(EstablecimientoPeer::FK_NIVELTIPO_ID,), array(NiveltipoPeer::ID,), $join_behavior);
		$criteria->addJoin(array(EstablecimientoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
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

		EstablecimientoPeer::addSelectColumns($c);
		$startcol2 = (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		DistritoescolarPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DistritoescolarPeer::NUM_COLUMNS - DistritoescolarPeer::NUM_LAZY_LOAD_COLUMNS);

		OrganizacionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (OrganizacionPeer::NUM_COLUMNS - OrganizacionPeer::NUM_LAZY_LOAD_COLUMNS);

		NiveltipoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (NiveltipoPeer::NUM_COLUMNS - NiveltipoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID,), array(DistritoescolarPeer::ID,), $join_behavior);
		$c->addJoin(array(EstablecimientoPeer::FK_ORGANIZACION_ID,), array(OrganizacionPeer::ID,), $join_behavior);
		$c->addJoin(array(EstablecimientoPeer::FK_NIVELTIPO_ID,), array(NiveltipoPeer::ID,), $join_behavior);
		$c->addJoin(array(EstablecimientoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EstablecimientoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = EstablecimientoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				EstablecimientoPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = DistritoescolarPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = DistritoescolarPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DistritoescolarPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DistritoescolarPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addEstablecimiento($obj1);
			} 
			
			$key3 = OrganizacionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = OrganizacionPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = OrganizacionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					OrganizacionPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addEstablecimiento($obj1);
			} 
			
			$key4 = NiveltipoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = NiveltipoPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$omClass = NiveltipoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					NiveltipoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addEstablecimiento($obj1);
			} 
			
			$key5 = ProvinciaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = ProvinciaPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$omClass = ProvinciaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					ProvinciaPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addEstablecimiento($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptDistritoescolar(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EstablecimientoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(EstablecimientoPeer::FK_ORGANIZACION_ID,), array(OrganizacionPeer::ID,), $join_behavior);
				$criteria->addJoin(array(EstablecimientoPeer::FK_NIVELTIPO_ID,), array(NiveltipoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(EstablecimientoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptOrganizacion(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EstablecimientoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID,), array(DistritoescolarPeer::ID,), $join_behavior);
				$criteria->addJoin(array(EstablecimientoPeer::FK_NIVELTIPO_ID,), array(NiveltipoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(EstablecimientoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptNiveltipo(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EstablecimientoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID,), array(DistritoescolarPeer::ID,), $join_behavior);
				$criteria->addJoin(array(EstablecimientoPeer::FK_ORGANIZACION_ID,), array(OrganizacionPeer::ID,), $join_behavior);
				$criteria->addJoin(array(EstablecimientoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptProvincia(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EstablecimientoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID,), array(DistritoescolarPeer::ID,), $join_behavior);
				$criteria->addJoin(array(EstablecimientoPeer::FK_ORGANIZACION_ID,), array(OrganizacionPeer::ID,), $join_behavior);
				$criteria->addJoin(array(EstablecimientoPeer::FK_NIVELTIPO_ID,), array(NiveltipoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptDistritoescolar(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EstablecimientoPeer::addSelectColumns($c);
		$startcol2 = (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		OrganizacionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (OrganizacionPeer::NUM_COLUMNS - OrganizacionPeer::NUM_LAZY_LOAD_COLUMNS);

		NiveltipoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (NiveltipoPeer::NUM_COLUMNS - NiveltipoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(EstablecimientoPeer::FK_ORGANIZACION_ID,), array(OrganizacionPeer::ID,), $join_behavior);
				$c->addJoin(array(EstablecimientoPeer::FK_NIVELTIPO_ID,), array(NiveltipoPeer::ID,), $join_behavior);
				$c->addJoin(array(EstablecimientoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EstablecimientoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = EstablecimientoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				EstablecimientoPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = OrganizacionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = OrganizacionPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = OrganizacionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					OrganizacionPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addEstablecimiento($obj1);

			} 
				
				$key3 = NiveltipoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = NiveltipoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = NiveltipoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					NiveltipoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addEstablecimiento($obj1);

			} 
				
				$key4 = ProvinciaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ProvinciaPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = ProvinciaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ProvinciaPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addEstablecimiento($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptOrganizacion(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EstablecimientoPeer::addSelectColumns($c);
		$startcol2 = (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		DistritoescolarPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DistritoescolarPeer::NUM_COLUMNS - DistritoescolarPeer::NUM_LAZY_LOAD_COLUMNS);

		NiveltipoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (NiveltipoPeer::NUM_COLUMNS - NiveltipoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID,), array(DistritoescolarPeer::ID,), $join_behavior);
				$c->addJoin(array(EstablecimientoPeer::FK_NIVELTIPO_ID,), array(NiveltipoPeer::ID,), $join_behavior);
				$c->addJoin(array(EstablecimientoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EstablecimientoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = EstablecimientoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				EstablecimientoPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = DistritoescolarPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DistritoescolarPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = DistritoescolarPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DistritoescolarPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addEstablecimiento($obj1);

			} 
				
				$key3 = NiveltipoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = NiveltipoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = NiveltipoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					NiveltipoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addEstablecimiento($obj1);

			} 
				
				$key4 = ProvinciaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ProvinciaPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = ProvinciaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ProvinciaPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addEstablecimiento($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptNiveltipo(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EstablecimientoPeer::addSelectColumns($c);
		$startcol2 = (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		DistritoescolarPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DistritoescolarPeer::NUM_COLUMNS - DistritoescolarPeer::NUM_LAZY_LOAD_COLUMNS);

		OrganizacionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (OrganizacionPeer::NUM_COLUMNS - OrganizacionPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID,), array(DistritoescolarPeer::ID,), $join_behavior);
				$c->addJoin(array(EstablecimientoPeer::FK_ORGANIZACION_ID,), array(OrganizacionPeer::ID,), $join_behavior);
				$c->addJoin(array(EstablecimientoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EstablecimientoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = EstablecimientoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				EstablecimientoPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = DistritoescolarPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DistritoescolarPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = DistritoescolarPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DistritoescolarPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addEstablecimiento($obj1);

			} 
				
				$key3 = OrganizacionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = OrganizacionPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = OrganizacionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					OrganizacionPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addEstablecimiento($obj1);

			} 
				
				$key4 = ProvinciaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ProvinciaPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = ProvinciaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ProvinciaPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addEstablecimiento($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptProvincia(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EstablecimientoPeer::addSelectColumns($c);
		$startcol2 = (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		DistritoescolarPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DistritoescolarPeer::NUM_COLUMNS - DistritoescolarPeer::NUM_LAZY_LOAD_COLUMNS);

		OrganizacionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (OrganizacionPeer::NUM_COLUMNS - OrganizacionPeer::NUM_LAZY_LOAD_COLUMNS);

		NiveltipoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (NiveltipoPeer::NUM_COLUMNS - NiveltipoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID,), array(DistritoescolarPeer::ID,), $join_behavior);
				$c->addJoin(array(EstablecimientoPeer::FK_ORGANIZACION_ID,), array(OrganizacionPeer::ID,), $join_behavior);
				$c->addJoin(array(EstablecimientoPeer::FK_NIVELTIPO_ID,), array(NiveltipoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EstablecimientoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = EstablecimientoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				EstablecimientoPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = DistritoescolarPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DistritoescolarPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = DistritoescolarPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DistritoescolarPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addEstablecimiento($obj1);

			} 
				
				$key3 = OrganizacionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = OrganizacionPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = OrganizacionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					OrganizacionPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addEstablecimiento($obj1);

			} 
				
				$key4 = NiveltipoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = NiveltipoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = NiveltipoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					NiveltipoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addEstablecimiento($obj1);

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
		return EstablecimientoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(EstablecimientoPeer::ID) && $criteria->keyContainsValue(EstablecimientoPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.EstablecimientoPeer::ID.')');
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
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(EstablecimientoPeer::ID);
			$selectCriteria->add(EstablecimientoPeer::ID, $criteria->remove(EstablecimientoPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(EstablecimientoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												EstablecimientoPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof Establecimiento) {
						EstablecimientoPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EstablecimientoPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								EstablecimientoPeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(Establecimiento $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EstablecimientoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EstablecimientoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EstablecimientoPeer::DATABASE_NAME, EstablecimientoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EstablecimientoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = EstablecimientoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		$criteria->add(EstablecimientoPeer::ID, $pk);

		$v = EstablecimientoPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
			$criteria->add(EstablecimientoPeer::ID, $pks, Criteria::IN);
			$objs = EstablecimientoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseEstablecimientoPeer::DATABASE_NAME)->addTableBuilder(BaseEstablecimientoPeer::TABLE_NAME, BaseEstablecimientoPeer::getMapBuilder());

