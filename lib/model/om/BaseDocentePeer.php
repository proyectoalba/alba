<?php


abstract class BaseDocentePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'docente';

	
	const CLASS_DEFAULT = 'lib.model.Docente';

	
	const NUM_COLUMNS = 23;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'docente.ID';

	
	const APELLIDO = 'docente.APELLIDO';

	
	const APELLIDO_MATERNO = 'docente.APELLIDO_MATERNO';

	
	const NOMBRE = 'docente.NOMBRE';

	
	const ESTADO_CIVIL = 'docente.ESTADO_CIVIL';

	
	const SEXO = 'docente.SEXO';

	
	const FECHA_NACIMIENTO = 'docente.FECHA_NACIMIENTO';

	
	const FK_TIPODOCUMENTO_ID = 'docente.FK_TIPODOCUMENTO_ID';

	
	const NRO_DOCUMENTO = 'docente.NRO_DOCUMENTO';

	
	const LUGAR_NACIMIENTO = 'docente.LUGAR_NACIMIENTO';

	
	const DIRECCION = 'docente.DIRECCION';

	
	const CIUDAD = 'docente.CIUDAD';

	
	const CODIGO_POSTAL = 'docente.CODIGO_POSTAL';

	
	const EMAIL = 'docente.EMAIL';

	
	const TELEFONO = 'docente.TELEFONO';

	
	const TELEFONO_MOVIL = 'docente.TELEFONO_MOVIL';

	
	const TITULO = 'docente.TITULO';

	
	const LIBRETA_SANITARIA = 'docente.LIBRETA_SANITARIA';

	
	const PSICOFISICO = 'docente.PSICOFISICO';

	
	const OBSERVACION = 'docente.OBSERVACION';

	
	const ACTIVO = 'docente.ACTIVO';

	
	const FK_PROVINCIA_ID = 'docente.FK_PROVINCIA_ID';

	
	const FK_PAIS_ID = 'docente.FK_PAIS_ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Apellido', 'ApellidoMaterno', 'Nombre', 'EstadoCivil', 'Sexo', 'FechaNacimiento', 'FkTipodocumentoId', 'NroDocumento', 'LugarNacimiento', 'Direccion', 'Ciudad', 'CodigoPostal', 'Email', 'Telefono', 'TelefonoMovil', 'Titulo', 'LibretaSanitaria', 'Psicofisico', 'Observacion', 'Activo', 'FkProvinciaId', 'FkPaisId', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'apellido', 'apellidoMaterno', 'nombre', 'estadoCivil', 'sexo', 'fechaNacimiento', 'fkTipodocumentoId', 'nroDocumento', 'lugarNacimiento', 'direccion', 'ciudad', 'codigoPostal', 'email', 'telefono', 'telefonoMovil', 'titulo', 'libretaSanitaria', 'psicofisico', 'observacion', 'activo', 'fkProvinciaId', 'fkPaisId', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::APELLIDO, self::APELLIDO_MATERNO, self::NOMBRE, self::ESTADO_CIVIL, self::SEXO, self::FECHA_NACIMIENTO, self::FK_TIPODOCUMENTO_ID, self::NRO_DOCUMENTO, self::LUGAR_NACIMIENTO, self::DIRECCION, self::CIUDAD, self::CODIGO_POSTAL, self::EMAIL, self::TELEFONO, self::TELEFONO_MOVIL, self::TITULO, self::LIBRETA_SANITARIA, self::PSICOFISICO, self::OBSERVACION, self::ACTIVO, self::FK_PROVINCIA_ID, self::FK_PAIS_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'apellido', 'apellido_materno', 'nombre', 'estado_civil', 'sexo', 'fecha_nacimiento', 'fk_tipodocumento_id', 'nro_documento', 'lugar_nacimiento', 'direccion', 'ciudad', 'codigo_postal', 'email', 'telefono', 'telefono_movil', 'titulo', 'libreta_sanitaria', 'psicofisico', 'observacion', 'activo', 'fk_provincia_id', 'fk_pais_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Apellido' => 1, 'ApellidoMaterno' => 2, 'Nombre' => 3, 'EstadoCivil' => 4, 'Sexo' => 5, 'FechaNacimiento' => 6, 'FkTipodocumentoId' => 7, 'NroDocumento' => 8, 'LugarNacimiento' => 9, 'Direccion' => 10, 'Ciudad' => 11, 'CodigoPostal' => 12, 'Email' => 13, 'Telefono' => 14, 'TelefonoMovil' => 15, 'Titulo' => 16, 'LibretaSanitaria' => 17, 'Psicofisico' => 18, 'Observacion' => 19, 'Activo' => 20, 'FkProvinciaId' => 21, 'FkPaisId' => 22, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'apellido' => 1, 'apellidoMaterno' => 2, 'nombre' => 3, 'estadoCivil' => 4, 'sexo' => 5, 'fechaNacimiento' => 6, 'fkTipodocumentoId' => 7, 'nroDocumento' => 8, 'lugarNacimiento' => 9, 'direccion' => 10, 'ciudad' => 11, 'codigoPostal' => 12, 'email' => 13, 'telefono' => 14, 'telefonoMovil' => 15, 'titulo' => 16, 'libretaSanitaria' => 17, 'psicofisico' => 18, 'observacion' => 19, 'activo' => 20, 'fkProvinciaId' => 21, 'fkPaisId' => 22, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::APELLIDO => 1, self::APELLIDO_MATERNO => 2, self::NOMBRE => 3, self::ESTADO_CIVIL => 4, self::SEXO => 5, self::FECHA_NACIMIENTO => 6, self::FK_TIPODOCUMENTO_ID => 7, self::NRO_DOCUMENTO => 8, self::LUGAR_NACIMIENTO => 9, self::DIRECCION => 10, self::CIUDAD => 11, self::CODIGO_POSTAL => 12, self::EMAIL => 13, self::TELEFONO => 14, self::TELEFONO_MOVIL => 15, self::TITULO => 16, self::LIBRETA_SANITARIA => 17, self::PSICOFISICO => 18, self::OBSERVACION => 19, self::ACTIVO => 20, self::FK_PROVINCIA_ID => 21, self::FK_PAIS_ID => 22, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'apellido' => 1, 'apellido_materno' => 2, 'nombre' => 3, 'estado_civil' => 4, 'sexo' => 5, 'fecha_nacimiento' => 6, 'fk_tipodocumento_id' => 7, 'nro_documento' => 8, 'lugar_nacimiento' => 9, 'direccion' => 10, 'ciudad' => 11, 'codigo_postal' => 12, 'email' => 13, 'telefono' => 14, 'telefono_movil' => 15, 'titulo' => 16, 'libreta_sanitaria' => 17, 'psicofisico' => 18, 'observacion' => 19, 'activo' => 20, 'fk_provincia_id' => 21, 'fk_pais_id' => 22, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DocenteMapBuilder();
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
		return str_replace(DocentePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DocentePeer::ID);

		$criteria->addSelectColumn(DocentePeer::APELLIDO);

		$criteria->addSelectColumn(DocentePeer::APELLIDO_MATERNO);

		$criteria->addSelectColumn(DocentePeer::NOMBRE);

		$criteria->addSelectColumn(DocentePeer::ESTADO_CIVIL);

		$criteria->addSelectColumn(DocentePeer::SEXO);

		$criteria->addSelectColumn(DocentePeer::FECHA_NACIMIENTO);

		$criteria->addSelectColumn(DocentePeer::FK_TIPODOCUMENTO_ID);

		$criteria->addSelectColumn(DocentePeer::NRO_DOCUMENTO);

		$criteria->addSelectColumn(DocentePeer::LUGAR_NACIMIENTO);

		$criteria->addSelectColumn(DocentePeer::DIRECCION);

		$criteria->addSelectColumn(DocentePeer::CIUDAD);

		$criteria->addSelectColumn(DocentePeer::CODIGO_POSTAL);

		$criteria->addSelectColumn(DocentePeer::EMAIL);

		$criteria->addSelectColumn(DocentePeer::TELEFONO);

		$criteria->addSelectColumn(DocentePeer::TELEFONO_MOVIL);

		$criteria->addSelectColumn(DocentePeer::TITULO);

		$criteria->addSelectColumn(DocentePeer::LIBRETA_SANITARIA);

		$criteria->addSelectColumn(DocentePeer::PSICOFISICO);

		$criteria->addSelectColumn(DocentePeer::OBSERVACION);

		$criteria->addSelectColumn(DocentePeer::ACTIVO);

		$criteria->addSelectColumn(DocentePeer::FK_PROVINCIA_ID);

		$criteria->addSelectColumn(DocentePeer::FK_PAIS_ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DocentePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = DocentePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DocentePeer::populateObjects(DocentePeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DocentePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(Docente $obj, $key = null)
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
			if (is_object($value) && $value instanceof Docente) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Docente object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = DocentePeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DocentePeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DocentePeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinTipodocumento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DocentePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DocentePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);

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

								$criteria->setPrimaryTableName(DocentePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DocentePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinPais(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DocentePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DocentePeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinTipodocumento(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DocentePeer::addSelectColumns($c);
		$startcol = (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);
		TipodocumentoPeer::addSelectColumns($c);

		$c->addJoin(array(DocentePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DocentePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DocentePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDocente($obj1);

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

		DocentePeer::addSelectColumns($c);
		$startcol = (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);
		ProvinciaPeer::addSelectColumns($c);

		$c->addJoin(array(DocentePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DocentePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DocentePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDocente($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinPais(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DocentePeer::addSelectColumns($c);
		$startcol = (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);
		PaisPeer::addSelectColumns($c);

		$c->addJoin(array(DocentePeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DocentePeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DocentePeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = PaisPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = PaisPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = PaisPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					PaisPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDocente($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DocentePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DocentePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
		$criteria->addJoin(array(DocentePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$criteria->addJoin(array(DocentePeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
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

		DocentePeer::addSelectColumns($c);
		$startcol2 = (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		TipodocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (TipodocumentoPeer::NUM_COLUMNS - TipodocumentoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		PaisPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (PaisPeer::NUM_COLUMNS - PaisPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(DocentePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
		$c->addJoin(array(DocentePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$c->addJoin(array(DocentePeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DocentePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DocentePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDocente($obj1);
			} 
			
			$key3 = ProvinciaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = ProvinciaPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = ProvinciaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ProvinciaPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addDocente($obj1);
			} 
			
			$key4 = PaisPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = PaisPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$omClass = PaisPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					PaisPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addDocente($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptTipodocumento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DocentePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DocentePeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
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
			DocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DocentePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DocentePeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptPais(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DocentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DocentePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DocentePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptTipodocumento(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DocentePeer::addSelectColumns($c);
		$startcol2 = (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		PaisPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (PaisPeer::NUM_COLUMNS - PaisPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DocentePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$c->addJoin(array(DocentePeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DocentePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DocentePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDocente($obj1);

			} 
				
				$key3 = PaisPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = PaisPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = PaisPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					PaisPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addDocente($obj1);

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

		DocentePeer::addSelectColumns($c);
		$startcol2 = (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		TipodocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (TipodocumentoPeer::NUM_COLUMNS - TipodocumentoPeer::NUM_LAZY_LOAD_COLUMNS);

		PaisPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (PaisPeer::NUM_COLUMNS - PaisPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DocentePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$c->addJoin(array(DocentePeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DocentePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DocentePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDocente($obj1);

			} 
				
				$key3 = PaisPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = PaisPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = PaisPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					PaisPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addDocente($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptPais(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DocentePeer::addSelectColumns($c);
		$startcol2 = (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		TipodocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (TipodocumentoPeer::NUM_COLUMNS - TipodocumentoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DocentePeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$c->addJoin(array(DocentePeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DocentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DocentePeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DocentePeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DocentePeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDocente($obj1);

			} 
				
				$key3 = ProvinciaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ProvinciaPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ProvinciaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ProvinciaPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addDocente($obj1);

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
		return DocentePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(DocentePeer::ID) && $criteria->keyContainsValue(DocentePeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.DocentePeer::ID.')');
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
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DocentePeer::ID);
			$selectCriteria->add(DocentePeer::ID, $criteria->remove(DocentePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(DocentePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DocentePeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof Docente) {
						DocentePeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DocentePeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								DocentePeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(Docente $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DocentePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DocentePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DocentePeer::DATABASE_NAME, DocentePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DocentePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DocentePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DocentePeer::DATABASE_NAME);
		$criteria->add(DocentePeer::ID, $pk);

		$v = DocentePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DocentePeer::DATABASE_NAME);
			$criteria->add(DocentePeer::ID, $pks, Criteria::IN);
			$objs = DocentePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseDocentePeer::DATABASE_NAME)->addTableBuilder(BaseDocentePeer::TABLE_NAME, BaseDocentePeer::getMapBuilder());

