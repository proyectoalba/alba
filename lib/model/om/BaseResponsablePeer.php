<?php


abstract class BaseResponsablePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'responsable';

	
	const CLASS_DEFAULT = 'lib.model.Responsable';

	
	const NUM_COLUMNS = 24;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'responsable.ID';

	
	const NOMBRE = 'responsable.NOMBRE';

	
	const APELLIDO = 'responsable.APELLIDO';

	
	const APELLIDO_MATERNO = 'responsable.APELLIDO_MATERNO';

	
	const DIRECCION = 'responsable.DIRECCION';

	
	const DIRECCION_LABORAL = 'responsable.DIRECCION_LABORAL';

	
	const CIUDAD = 'responsable.CIUDAD';

	
	const CODIGO_POSTAL = 'responsable.CODIGO_POSTAL';

	
	const FK_PROVINCIA_ID = 'responsable.FK_PROVINCIA_ID';

	
	const TELEFONO = 'responsable.TELEFONO';

	
	const TELEFONO_LABORAL = 'responsable.TELEFONO_LABORAL';

	
	const TELEFONO_MOVIL = 'responsable.TELEFONO_MOVIL';

	
	const NRO_DOCUMENTO = 'responsable.NRO_DOCUMENTO';

	
	const FK_TIPODOCUMENTO_ID = 'responsable.FK_TIPODOCUMENTO_ID';

	
	const SEXO = 'responsable.SEXO';

	
	const EMAIL = 'responsable.EMAIL';

	
	const OBSERVACION = 'responsable.OBSERVACION';

	
	const AUTORIZACION_RETIRO = 'responsable.AUTORIZACION_RETIRO';

	
	const LLAMAR_EMERGENCIA = 'responsable.LLAMAR_EMERGENCIA';

	
	const FK_CUENTA_ID = 'responsable.FK_CUENTA_ID';

	
	const FK_ROLRESPONSABLE_ID = 'responsable.FK_ROLRESPONSABLE_ID';

	
	const OCUPACION = 'responsable.OCUPACION';

	
	const FECHA_NACIMIENTO = 'responsable.FECHA_NACIMIENTO';

	
	const FK_NIVEL_INSTRUCCION_ID = 'responsable.FK_NIVEL_INSTRUCCION_ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nombre', 'Apellido', 'ApellidoMaterno', 'Direccion', 'DireccionLaboral', 'Ciudad', 'CodigoPostal', 'FkProvinciaId', 'Telefono', 'TelefonoLaboral', 'TelefonoMovil', 'NroDocumento', 'FkTipodocumentoId', 'Sexo', 'Email', 'Observacion', 'AutorizacionRetiro', 'LlamarEmergencia', 'FkCuentaId', 'FkRolresponsableId', 'Ocupacion', 'FechaNacimiento', 'FkNivelInstruccionId', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'nombre', 'apellido', 'apellidoMaterno', 'direccion', 'direccionLaboral', 'ciudad', 'codigoPostal', 'fkProvinciaId', 'telefono', 'telefonoLaboral', 'telefonoMovil', 'nroDocumento', 'fkTipodocumentoId', 'sexo', 'email', 'observacion', 'autorizacionRetiro', 'llamarEmergencia', 'fkCuentaId', 'fkRolresponsableId', 'ocupacion', 'fechaNacimiento', 'fkNivelInstruccionId', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::NOMBRE, self::APELLIDO, self::APELLIDO_MATERNO, self::DIRECCION, self::DIRECCION_LABORAL, self::CIUDAD, self::CODIGO_POSTAL, self::FK_PROVINCIA_ID, self::TELEFONO, self::TELEFONO_LABORAL, self::TELEFONO_MOVIL, self::NRO_DOCUMENTO, self::FK_TIPODOCUMENTO_ID, self::SEXO, self::EMAIL, self::OBSERVACION, self::AUTORIZACION_RETIRO, self::LLAMAR_EMERGENCIA, self::FK_CUENTA_ID, self::FK_ROLRESPONSABLE_ID, self::OCUPACION, self::FECHA_NACIMIENTO, self::FK_NIVEL_INSTRUCCION_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nombre', 'apellido', 'apellido_materno', 'direccion', 'direccion_laboral', 'ciudad', 'codigo_postal', 'fk_provincia_id', 'telefono', 'telefono_laboral', 'telefono_movil', 'nro_documento', 'fk_tipodocumento_id', 'sexo', 'email', 'observacion', 'autorizacion_retiro', 'llamar_emergencia', 'fk_cuenta_id', 'fk_rolresponsable_id', 'ocupacion', 'fecha_nacimiento', 'fk_nivel_instruccion_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nombre' => 1, 'Apellido' => 2, 'ApellidoMaterno' => 3, 'Direccion' => 4, 'DireccionLaboral' => 5, 'Ciudad' => 6, 'CodigoPostal' => 7, 'FkProvinciaId' => 8, 'Telefono' => 9, 'TelefonoLaboral' => 10, 'TelefonoMovil' => 11, 'NroDocumento' => 12, 'FkTipodocumentoId' => 13, 'Sexo' => 14, 'Email' => 15, 'Observacion' => 16, 'AutorizacionRetiro' => 17, 'LlamarEmergencia' => 18, 'FkCuentaId' => 19, 'FkRolresponsableId' => 20, 'Ocupacion' => 21, 'FechaNacimiento' => 22, 'FkNivelInstruccionId' => 23, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'nombre' => 1, 'apellido' => 2, 'apellidoMaterno' => 3, 'direccion' => 4, 'direccionLaboral' => 5, 'ciudad' => 6, 'codigoPostal' => 7, 'fkProvinciaId' => 8, 'telefono' => 9, 'telefonoLaboral' => 10, 'telefonoMovil' => 11, 'nroDocumento' => 12, 'fkTipodocumentoId' => 13, 'sexo' => 14, 'email' => 15, 'observacion' => 16, 'autorizacionRetiro' => 17, 'llamarEmergencia' => 18, 'fkCuentaId' => 19, 'fkRolresponsableId' => 20, 'ocupacion' => 21, 'fechaNacimiento' => 22, 'fkNivelInstruccionId' => 23, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::NOMBRE => 1, self::APELLIDO => 2, self::APELLIDO_MATERNO => 3, self::DIRECCION => 4, self::DIRECCION_LABORAL => 5, self::CIUDAD => 6, self::CODIGO_POSTAL => 7, self::FK_PROVINCIA_ID => 8, self::TELEFONO => 9, self::TELEFONO_LABORAL => 10, self::TELEFONO_MOVIL => 11, self::NRO_DOCUMENTO => 12, self::FK_TIPODOCUMENTO_ID => 13, self::SEXO => 14, self::EMAIL => 15, self::OBSERVACION => 16, self::AUTORIZACION_RETIRO => 17, self::LLAMAR_EMERGENCIA => 18, self::FK_CUENTA_ID => 19, self::FK_ROLRESPONSABLE_ID => 20, self::OCUPACION => 21, self::FECHA_NACIMIENTO => 22, self::FK_NIVEL_INSTRUCCION_ID => 23, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nombre' => 1, 'apellido' => 2, 'apellido_materno' => 3, 'direccion' => 4, 'direccion_laboral' => 5, 'ciudad' => 6, 'codigo_postal' => 7, 'fk_provincia_id' => 8, 'telefono' => 9, 'telefono_laboral' => 10, 'telefono_movil' => 11, 'nro_documento' => 12, 'fk_tipodocumento_id' => 13, 'sexo' => 14, 'email' => 15, 'observacion' => 16, 'autorizacion_retiro' => 17, 'llamar_emergencia' => 18, 'fk_cuenta_id' => 19, 'fk_rolresponsable_id' => 20, 'ocupacion' => 21, 'fecha_nacimiento' => 22, 'fk_nivel_instruccion_id' => 23, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new ResponsableMapBuilder();
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
		return str_replace(ResponsablePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ResponsablePeer::ID);

		$criteria->addSelectColumn(ResponsablePeer::NOMBRE);

		$criteria->addSelectColumn(ResponsablePeer::APELLIDO);

		$criteria->addSelectColumn(ResponsablePeer::APELLIDO_MATERNO);

		$criteria->addSelectColumn(ResponsablePeer::DIRECCION);

		$criteria->addSelectColumn(ResponsablePeer::DIRECCION_LABORAL);

		$criteria->addSelectColumn(ResponsablePeer::CIUDAD);

		$criteria->addSelectColumn(ResponsablePeer::CODIGO_POSTAL);

		$criteria->addSelectColumn(ResponsablePeer::FK_PROVINCIA_ID);

		$criteria->addSelectColumn(ResponsablePeer::TELEFONO);

		$criteria->addSelectColumn(ResponsablePeer::TELEFONO_LABORAL);

		$criteria->addSelectColumn(ResponsablePeer::TELEFONO_MOVIL);

		$criteria->addSelectColumn(ResponsablePeer::NRO_DOCUMENTO);

		$criteria->addSelectColumn(ResponsablePeer::FK_TIPODOCUMENTO_ID);

		$criteria->addSelectColumn(ResponsablePeer::SEXO);

		$criteria->addSelectColumn(ResponsablePeer::EMAIL);

		$criteria->addSelectColumn(ResponsablePeer::OBSERVACION);

		$criteria->addSelectColumn(ResponsablePeer::AUTORIZACION_RETIRO);

		$criteria->addSelectColumn(ResponsablePeer::LLAMAR_EMERGENCIA);

		$criteria->addSelectColumn(ResponsablePeer::FK_CUENTA_ID);

		$criteria->addSelectColumn(ResponsablePeer::FK_ROLRESPONSABLE_ID);

		$criteria->addSelectColumn(ResponsablePeer::OCUPACION);

		$criteria->addSelectColumn(ResponsablePeer::FECHA_NACIMIENTO);

		$criteria->addSelectColumn(ResponsablePeer::FK_NIVEL_INSTRUCCION_ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ResponsablePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = ResponsablePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return ResponsablePeer::populateObjects(ResponsablePeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ResponsablePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(Responsable $obj, $key = null)
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
			if (is_object($value) && $value instanceof Responsable) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Responsable object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = ResponsablePeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ResponsablePeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ResponsablePeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinProvincia(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ResponsablePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ResponsablePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinTipodocumento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ResponsablePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ResponsablePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinCuenta(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ResponsablePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ResponsablePeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinRolResponsable(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ResponsablePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinNivelInstruccion(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ResponsablePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ResponsablePeer::FK_NIVEL_INSTRUCCION_ID,), array(NivelInstruccionPeer::ID,), $join_behavior);

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

		ResponsablePeer::addSelectColumns($c);
		$startcol = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS);
		ProvinciaPeer::addSelectColumns($c);

		$c->addJoin(array(ResponsablePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ResponsablePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ResponsablePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addResponsable($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinTipodocumento(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResponsablePeer::addSelectColumns($c);
		$startcol = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS);
		TipodocumentoPeer::addSelectColumns($c);

		$c->addJoin(array(ResponsablePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ResponsablePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ResponsablePeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = TipodocumentoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = TipodocumentoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = TipodocumentoPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					TipodocumentoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addResponsable($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinCuenta(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResponsablePeer::addSelectColumns($c);
		$startcol = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS);
		CuentaPeer::addSelectColumns($c);

		$c->addJoin(array(ResponsablePeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ResponsablePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ResponsablePeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = CuentaPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = CuentaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = CuentaPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					CuentaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addResponsable($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinRolResponsable(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResponsablePeer::addSelectColumns($c);
		$startcol = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS);
		RolResponsablePeer::addSelectColumns($c);

		$c->addJoin(array(ResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ResponsablePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ResponsablePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addResponsable($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinNivelInstruccion(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResponsablePeer::addSelectColumns($c);
		$startcol = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS);
		NivelInstruccionPeer::addSelectColumns($c);

		$c->addJoin(array(ResponsablePeer::FK_NIVEL_INSTRUCCION_ID,), array(NivelInstruccionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ResponsablePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ResponsablePeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = NivelInstruccionPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = NivelInstruccionPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = NivelInstruccionPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					NivelInstruccionPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addResponsable($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ResponsablePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ResponsablePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$criteria->addJoin(array(ResponsablePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
		$criteria->addJoin(array(ResponsablePeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
		$criteria->addJoin(array(ResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
		$criteria->addJoin(array(ResponsablePeer::FK_NIVEL_INSTRUCCION_ID,), array(NivelInstruccionPeer::ID,), $join_behavior);
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

		ResponsablePeer::addSelectColumns($c);
		$startcol2 = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		TipodocumentoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (TipodocumentoPeer::NUM_COLUMNS - TipodocumentoPeer::NUM_LAZY_LOAD_COLUMNS);

		CuentaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);

		RolResponsablePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (RolResponsablePeer::NUM_COLUMNS - RolResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		NivelInstruccionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (NivelInstruccionPeer::NUM_COLUMNS - NivelInstruccionPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(ResponsablePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$c->addJoin(array(ResponsablePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
		$c->addJoin(array(ResponsablePeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
		$c->addJoin(array(ResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
		$c->addJoin(array(ResponsablePeer::FK_NIVEL_INSTRUCCION_ID,), array(NivelInstruccionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ResponsablePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ResponsablePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addResponsable($obj1);
			} 
			
			$key3 = TipodocumentoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = TipodocumentoPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = TipodocumentoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					TipodocumentoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addResponsable($obj1);
			} 
			
			$key4 = CuentaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = CuentaPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$omClass = CuentaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CuentaPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addResponsable($obj1);
			} 
			
			$key5 = RolResponsablePeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = RolResponsablePeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$omClass = RolResponsablePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					RolResponsablePeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addResponsable($obj1);
			} 
			
			$key6 = NivelInstruccionPeer::getPrimaryKeyHashFromRow($row, $startcol6);
			if ($key6 !== null) {
				$obj6 = NivelInstruccionPeer::getInstanceFromPool($key6);
				if (!$obj6) {

					$omClass = NivelInstruccionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					NivelInstruccionPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addResponsable($obj1);
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
			ResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ResponsablePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ResponsablePeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ResponsablePeer::FK_NIVEL_INSTRUCCION_ID,), array(NivelInstruccionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptTipodocumento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ResponsablePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ResponsablePeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ResponsablePeer::FK_NIVEL_INSTRUCCION_ID,), array(NivelInstruccionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptCuenta(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ResponsablePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ResponsablePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ResponsablePeer::FK_NIVEL_INSTRUCCION_ID,), array(NivelInstruccionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptRolResponsable(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ResponsablePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ResponsablePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ResponsablePeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ResponsablePeer::FK_NIVEL_INSTRUCCION_ID,), array(NivelInstruccionPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptNivelInstruccion(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ResponsablePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ResponsablePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ResponsablePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ResponsablePeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
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

		ResponsablePeer::addSelectColumns($c);
		$startcol2 = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		TipodocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (TipodocumentoPeer::NUM_COLUMNS - TipodocumentoPeer::NUM_LAZY_LOAD_COLUMNS);

		CuentaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);

		RolResponsablePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (RolResponsablePeer::NUM_COLUMNS - RolResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		NivelInstruccionPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (NivelInstruccionPeer::NUM_COLUMNS - NivelInstruccionPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ResponsablePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$c->addJoin(array(ResponsablePeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$c->addJoin(array(ResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
				$c->addJoin(array(ResponsablePeer::FK_NIVEL_INSTRUCCION_ID,), array(NivelInstruccionPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ResponsablePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ResponsablePeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = TipodocumentoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = TipodocumentoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = TipodocumentoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					TipodocumentoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addResponsable($obj1);

			} 
				
				$key3 = CuentaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = CuentaPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = CuentaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					CuentaPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addResponsable($obj1);

			} 
				
				$key4 = RolResponsablePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = RolResponsablePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = RolResponsablePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					RolResponsablePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addResponsable($obj1);

			} 
				
				$key5 = NivelInstruccionPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = NivelInstruccionPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = NivelInstruccionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					NivelInstruccionPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addResponsable($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptTipodocumento(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResponsablePeer::addSelectColumns($c);
		$startcol2 = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		CuentaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);

		RolResponsablePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (RolResponsablePeer::NUM_COLUMNS - RolResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		NivelInstruccionPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (NivelInstruccionPeer::NUM_COLUMNS - NivelInstruccionPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ResponsablePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$c->addJoin(array(ResponsablePeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$c->addJoin(array(ResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
				$c->addJoin(array(ResponsablePeer::FK_NIVEL_INSTRUCCION_ID,), array(NivelInstruccionPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ResponsablePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ResponsablePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addResponsable($obj1);

			} 
				
				$key3 = CuentaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = CuentaPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = CuentaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					CuentaPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addResponsable($obj1);

			} 
				
				$key4 = RolResponsablePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = RolResponsablePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = RolResponsablePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					RolResponsablePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addResponsable($obj1);

			} 
				
				$key5 = NivelInstruccionPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = NivelInstruccionPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = NivelInstruccionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					NivelInstruccionPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addResponsable($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptCuenta(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResponsablePeer::addSelectColumns($c);
		$startcol2 = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		TipodocumentoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (TipodocumentoPeer::NUM_COLUMNS - TipodocumentoPeer::NUM_LAZY_LOAD_COLUMNS);

		RolResponsablePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (RolResponsablePeer::NUM_COLUMNS - RolResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		NivelInstruccionPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (NivelInstruccionPeer::NUM_COLUMNS - NivelInstruccionPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ResponsablePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$c->addJoin(array(ResponsablePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$c->addJoin(array(ResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);
				$c->addJoin(array(ResponsablePeer::FK_NIVEL_INSTRUCCION_ID,), array(NivelInstruccionPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ResponsablePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ResponsablePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addResponsable($obj1);

			} 
				
				$key3 = TipodocumentoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = TipodocumentoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = TipodocumentoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					TipodocumentoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addResponsable($obj1);

			} 
				
				$key4 = RolResponsablePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = RolResponsablePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = RolResponsablePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					RolResponsablePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addResponsable($obj1);

			} 
				
				$key5 = NivelInstruccionPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = NivelInstruccionPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = NivelInstruccionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					NivelInstruccionPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addResponsable($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptRolResponsable(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResponsablePeer::addSelectColumns($c);
		$startcol2 = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		TipodocumentoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (TipodocumentoPeer::NUM_COLUMNS - TipodocumentoPeer::NUM_LAZY_LOAD_COLUMNS);

		CuentaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);

		NivelInstruccionPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (NivelInstruccionPeer::NUM_COLUMNS - NivelInstruccionPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ResponsablePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$c->addJoin(array(ResponsablePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$c->addJoin(array(ResponsablePeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$c->addJoin(array(ResponsablePeer::FK_NIVEL_INSTRUCCION_ID,), array(NivelInstruccionPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ResponsablePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ResponsablePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addResponsable($obj1);

			} 
				
				$key3 = TipodocumentoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = TipodocumentoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = TipodocumentoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					TipodocumentoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addResponsable($obj1);

			} 
				
				$key4 = CuentaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CuentaPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = CuentaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CuentaPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addResponsable($obj1);

			} 
				
				$key5 = NivelInstruccionPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = NivelInstruccionPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = NivelInstruccionPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					NivelInstruccionPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addResponsable($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptNivelInstruccion(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResponsablePeer::addSelectColumns($c);
		$startcol2 = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		TipodocumentoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (TipodocumentoPeer::NUM_COLUMNS - TipodocumentoPeer::NUM_LAZY_LOAD_COLUMNS);

		CuentaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);

		RolResponsablePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (RolResponsablePeer::NUM_COLUMNS - RolResponsablePeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ResponsablePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$c->addJoin(array(ResponsablePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$c->addJoin(array(ResponsablePeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$c->addJoin(array(ResponsablePeer::FK_ROLRESPONSABLE_ID,), array(RolResponsablePeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ResponsablePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ResponsablePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ResponsablePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ResponsablePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addResponsable($obj1);

			} 
				
				$key3 = TipodocumentoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = TipodocumentoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = TipodocumentoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					TipodocumentoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addResponsable($obj1);

			} 
				
				$key4 = CuentaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CuentaPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = CuentaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CuentaPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addResponsable($obj1);

			} 
				
				$key5 = RolResponsablePeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = RolResponsablePeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = RolResponsablePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					RolResponsablePeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addResponsable($obj1);

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
		return ResponsablePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(ResponsablePeer::ID) && $criteria->keyContainsValue(ResponsablePeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ResponsablePeer::ID.')');
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
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(ResponsablePeer::ID);
			$selectCriteria->add(ResponsablePeer::ID, $criteria->remove(ResponsablePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ResponsablePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												ResponsablePeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof Responsable) {
						ResponsablePeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ResponsablePeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								ResponsablePeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(Responsable $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ResponsablePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ResponsablePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ResponsablePeer::DATABASE_NAME, ResponsablePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ResponsablePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ResponsablePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ResponsablePeer::DATABASE_NAME);
		$criteria->add(ResponsablePeer::ID, $pk);

		$v = ResponsablePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ResponsablePeer::DATABASE_NAME);
			$criteria->add(ResponsablePeer::ID, $pks, Criteria::IN);
			$objs = ResponsablePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseResponsablePeer::DATABASE_NAME)->addTableBuilder(BaseResponsablePeer::TABLE_NAME, BaseResponsablePeer::getMapBuilder());

