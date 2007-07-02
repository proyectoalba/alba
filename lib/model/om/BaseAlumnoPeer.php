<?php


abstract class BaseAlumnoPeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'alumno';

	
	const CLASS_DEFAULT = 'lib.model.Alumno';

	
	const NUM_COLUMNS = 23;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'alumno.ID';

	
	const NOMBRE = 'alumno.NOMBRE';

	
	const APELLIDO = 'alumno.APELLIDO';

	
	const FECHA_NACIMIENTO = 'alumno.FECHA_NACIMIENTO';

	
	const DIRECCION = 'alumno.DIRECCION';

	
	const CIUDAD = 'alumno.CIUDAD';

	
	const CODIGO_POSTAL = 'alumno.CODIGO_POSTAL';

	
	const FK_PROVINCIA_ID = 'alumno.FK_PROVINCIA_ID';

	
	const TELEFONO = 'alumno.TELEFONO';

	
	const LUGAR_NACIMIENTO = 'alumno.LUGAR_NACIMIENTO';

	
	const FK_TIPODOCUMENTO_ID = 'alumno.FK_TIPODOCUMENTO_ID';

	
	const NRO_DOCUMENTO = 'alumno.NRO_DOCUMENTO';

	
	const SEXO = 'alumno.SEXO';

	
	const EMAIL = 'alumno.EMAIL';

	
	const DISTANCIA_ESCUELA = 'alumno.DISTANCIA_ESCUELA';

	
	const HERMANOS_ESCUELA = 'alumno.HERMANOS_ESCUELA';

	
	const HIJO_MAESTRO_ESCUELA = 'alumno.HIJO_MAESTRO_ESCUELA';

	
	const FK_ESTABLECIMIENTO_ID = 'alumno.FK_ESTABLECIMIENTO_ID';

	
	const FK_CUENTA_ID = 'alumno.FK_CUENTA_ID';

	
	const CERTIFICADO_MEDICO = 'alumno.CERTIFICADO_MEDICO';

	
	const ACTIVO = 'alumno.ACTIVO';

	
	const FK_CONCEPTOBAJA_ID = 'alumno.FK_CONCEPTOBAJA_ID';

	
	const FK_PAIS_ID = 'alumno.FK_PAIS_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nombre', 'Apellido', 'FechaNacimiento', 'Direccion', 'Ciudad', 'CodigoPostal', 'FkProvinciaId', 'Telefono', 'LugarNacimiento', 'FkTipodocumentoId', 'NroDocumento', 'Sexo', 'Email', 'DistanciaEscuela', 'HermanosEscuela', 'HijoMaestroEscuela', 'FkEstablecimientoId', 'FkCuentaId', 'CertificadoMedico', 'Activo', 'FkConceptobajaId', 'FkPaisId', ),
		BasePeer::TYPE_COLNAME => array (AlumnoPeer::ID, AlumnoPeer::NOMBRE, AlumnoPeer::APELLIDO, AlumnoPeer::FECHA_NACIMIENTO, AlumnoPeer::DIRECCION, AlumnoPeer::CIUDAD, AlumnoPeer::CODIGO_POSTAL, AlumnoPeer::FK_PROVINCIA_ID, AlumnoPeer::TELEFONO, AlumnoPeer::LUGAR_NACIMIENTO, AlumnoPeer::FK_TIPODOCUMENTO_ID, AlumnoPeer::NRO_DOCUMENTO, AlumnoPeer::SEXO, AlumnoPeer::EMAIL, AlumnoPeer::DISTANCIA_ESCUELA, AlumnoPeer::HERMANOS_ESCUELA, AlumnoPeer::HIJO_MAESTRO_ESCUELA, AlumnoPeer::FK_ESTABLECIMIENTO_ID, AlumnoPeer::FK_CUENTA_ID, AlumnoPeer::CERTIFICADO_MEDICO, AlumnoPeer::ACTIVO, AlumnoPeer::FK_CONCEPTOBAJA_ID, AlumnoPeer::FK_PAIS_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nombre', 'apellido', 'fecha_nacimiento', 'direccion', 'ciudad', 'codigo_postal', 'fk_provincia_id', 'telefono', 'lugar_nacimiento', 'fk_tipodocumento_id', 'nro_documento', 'sexo', 'email', 'distancia_escuela', 'hermanos_escuela', 'hijo_maestro_escuela', 'fk_establecimiento_id', 'fk_cuenta_id', 'certificado_medico', 'activo', 'fk_conceptobaja_id', 'fk_pais_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nombre' => 1, 'Apellido' => 2, 'FechaNacimiento' => 3, 'Direccion' => 4, 'Ciudad' => 5, 'CodigoPostal' => 6, 'FkProvinciaId' => 7, 'Telefono' => 8, 'LugarNacimiento' => 9, 'FkTipodocumentoId' => 10, 'NroDocumento' => 11, 'Sexo' => 12, 'Email' => 13, 'DistanciaEscuela' => 14, 'HermanosEscuela' => 15, 'HijoMaestroEscuela' => 16, 'FkEstablecimientoId' => 17, 'FkCuentaId' => 18, 'CertificadoMedico' => 19, 'Activo' => 20, 'FkConceptobajaId' => 21, 'FkPaisId' => 22, ),
		BasePeer::TYPE_COLNAME => array (AlumnoPeer::ID => 0, AlumnoPeer::NOMBRE => 1, AlumnoPeer::APELLIDO => 2, AlumnoPeer::FECHA_NACIMIENTO => 3, AlumnoPeer::DIRECCION => 4, AlumnoPeer::CIUDAD => 5, AlumnoPeer::CODIGO_POSTAL => 6, AlumnoPeer::FK_PROVINCIA_ID => 7, AlumnoPeer::TELEFONO => 8, AlumnoPeer::LUGAR_NACIMIENTO => 9, AlumnoPeer::FK_TIPODOCUMENTO_ID => 10, AlumnoPeer::NRO_DOCUMENTO => 11, AlumnoPeer::SEXO => 12, AlumnoPeer::EMAIL => 13, AlumnoPeer::DISTANCIA_ESCUELA => 14, AlumnoPeer::HERMANOS_ESCUELA => 15, AlumnoPeer::HIJO_MAESTRO_ESCUELA => 16, AlumnoPeer::FK_ESTABLECIMIENTO_ID => 17, AlumnoPeer::FK_CUENTA_ID => 18, AlumnoPeer::CERTIFICADO_MEDICO => 19, AlumnoPeer::ACTIVO => 20, AlumnoPeer::FK_CONCEPTOBAJA_ID => 21, AlumnoPeer::FK_PAIS_ID => 22, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nombre' => 1, 'apellido' => 2, 'fecha_nacimiento' => 3, 'direccion' => 4, 'ciudad' => 5, 'codigo_postal' => 6, 'fk_provincia_id' => 7, 'telefono' => 8, 'lugar_nacimiento' => 9, 'fk_tipodocumento_id' => 10, 'nro_documento' => 11, 'sexo' => 12, 'email' => 13, 'distancia_escuela' => 14, 'hermanos_escuela' => 15, 'hijo_maestro_escuela' => 16, 'fk_establecimiento_id' => 17, 'fk_cuenta_id' => 18, 'certificado_medico' => 19, 'activo' => 20, 'fk_conceptobaja_id' => 21, 'fk_pais_id' => 22, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AlumnoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AlumnoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AlumnoPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
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
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(AlumnoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AlumnoPeer::ID);

		$criteria->addSelectColumn(AlumnoPeer::NOMBRE);

		$criteria->addSelectColumn(AlumnoPeer::APELLIDO);

		$criteria->addSelectColumn(AlumnoPeer::FECHA_NACIMIENTO);

		$criteria->addSelectColumn(AlumnoPeer::DIRECCION);

		$criteria->addSelectColumn(AlumnoPeer::CIUDAD);

		$criteria->addSelectColumn(AlumnoPeer::CODIGO_POSTAL);

		$criteria->addSelectColumn(AlumnoPeer::FK_PROVINCIA_ID);

		$criteria->addSelectColumn(AlumnoPeer::TELEFONO);

		$criteria->addSelectColumn(AlumnoPeer::LUGAR_NACIMIENTO);

		$criteria->addSelectColumn(AlumnoPeer::FK_TIPODOCUMENTO_ID);

		$criteria->addSelectColumn(AlumnoPeer::NRO_DOCUMENTO);

		$criteria->addSelectColumn(AlumnoPeer::SEXO);

		$criteria->addSelectColumn(AlumnoPeer::EMAIL);

		$criteria->addSelectColumn(AlumnoPeer::DISTANCIA_ESCUELA);

		$criteria->addSelectColumn(AlumnoPeer::HERMANOS_ESCUELA);

		$criteria->addSelectColumn(AlumnoPeer::HIJO_MAESTRO_ESCUELA);

		$criteria->addSelectColumn(AlumnoPeer::FK_ESTABLECIMIENTO_ID);

		$criteria->addSelectColumn(AlumnoPeer::FK_CUENTA_ID);

		$criteria->addSelectColumn(AlumnoPeer::CERTIFICADO_MEDICO);

		$criteria->addSelectColumn(AlumnoPeer::ACTIVO);

		$criteria->addSelectColumn(AlumnoPeer::FK_CONCEPTOBAJA_ID);

		$criteria->addSelectColumn(AlumnoPeer::FK_PAIS_ID);

	}

	const COUNT = 'COUNT(alumno.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT alumno.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = AlumnoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AlumnoPeer::populateObjects(AlumnoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AlumnoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AlumnoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinTipodocumento(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCuenta(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinEstablecimiento(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinProvincia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinConceptobaja(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinPais(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_PAIS_ID, PaisPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinTipodocumento(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TipodocumentoPeer::addSelectColumns($c);

		$c->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipodocumentoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTipodocumento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAlumno($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCuenta(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CuentaPeer::addSelectColumns($c);

		$c->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CuentaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCuenta(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAlumno($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinEstablecimiento(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EstablecimientoPeer::addSelectColumns($c);

		$c->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EstablecimientoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEstablecimiento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAlumno($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinProvincia(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProvinciaPeer::addSelectColumns($c);

		$c->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProvinciaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getProvincia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAlumno($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinConceptobaja(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ConceptobajaPeer::addSelectColumns($c);

		$c->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ConceptobajaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getConceptobaja(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAlumno($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinPais(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PaisPeer::addSelectColumns($c);

		$c->addJoin(AlumnoPeer::FK_PAIS_ID, PaisPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PaisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getPais(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAlumno($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_PAIS_ID, PaisPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol2 = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TipodocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipodocumentoPeer::NUM_COLUMNS;

		CuentaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CuentaPeer::NUM_COLUMNS;

		EstablecimientoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + EstablecimientoPeer::NUM_COLUMNS;

		ProvinciaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ProvinciaPeer::NUM_COLUMNS;

		ConceptobajaPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ConceptobajaPeer::NUM_COLUMNS;

		PaisPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + PaisPeer::NUM_COLUMNS;

		$c->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$c->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$c->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_PAIS_ID, PaisPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlumnoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = TipodocumentoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipodocumento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAlumno($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1);
			}


					
			$omClass = CuentaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCuenta(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAlumno($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initAlumnos();
				$obj3->addAlumno($obj1);
			}


					
			$omClass = EstablecimientoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getEstablecimiento(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAlumno($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initAlumnos();
				$obj4->addAlumno($obj1);
			}


					
			$omClass = ProvinciaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getProvincia(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAlumno($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initAlumnos();
				$obj5->addAlumno($obj1);
			}


					
			$omClass = ConceptobajaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getConceptobaja(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAlumno($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initAlumnos();
				$obj6->addAlumno($obj1);
			}


					
			$omClass = PaisPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getPais(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAlumno($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initAlumnos();
				$obj7->addAlumno($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptTipodocumento(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_PAIS_ID, PaisPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCuenta(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_PAIS_ID, PaisPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptEstablecimiento(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_PAIS_ID, PaisPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptProvincia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_PAIS_ID, PaisPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptConceptobaja(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_PAIS_ID, PaisPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptPais(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptTipodocumento(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol2 = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CuentaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CuentaPeer::NUM_COLUMNS;

		EstablecimientoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EstablecimientoPeer::NUM_COLUMNS;

		ProvinciaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ProvinciaPeer::NUM_COLUMNS;

		ConceptobajaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ConceptobajaPeer::NUM_COLUMNS;

		PaisPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaisPeer::NUM_COLUMNS;

		$c->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$c->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_PAIS_ID, PaisPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CuentaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCuenta(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1);
			}

			$omClass = EstablecimientoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEstablecimiento(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAlumnos();
				$obj3->addAlumno($obj1);
			}

			$omClass = ProvinciaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getProvincia(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAlumnos();
				$obj4->addAlumno($obj1);
			}

			$omClass = ConceptobajaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getConceptobaja(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAlumnos();
				$obj5->addAlumno($obj1);
			}

			$omClass = PaisPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getPais(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAlumnos();
				$obj6->addAlumno($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCuenta(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol2 = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TipodocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipodocumentoPeer::NUM_COLUMNS;

		EstablecimientoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EstablecimientoPeer::NUM_COLUMNS;

		ProvinciaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ProvinciaPeer::NUM_COLUMNS;

		ConceptobajaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ConceptobajaPeer::NUM_COLUMNS;

		PaisPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaisPeer::NUM_COLUMNS;

		$c->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$c->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$c->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_PAIS_ID, PaisPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipodocumentoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipodocumento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1);
			}

			$omClass = EstablecimientoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEstablecimiento(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAlumnos();
				$obj3->addAlumno($obj1);
			}

			$omClass = ProvinciaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getProvincia(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAlumnos();
				$obj4->addAlumno($obj1);
			}

			$omClass = ConceptobajaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getConceptobaja(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAlumnos();
				$obj5->addAlumno($obj1);
			}

			$omClass = PaisPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getPais(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAlumnos();
				$obj6->addAlumno($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptEstablecimiento(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol2 = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TipodocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipodocumentoPeer::NUM_COLUMNS;

		CuentaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CuentaPeer::NUM_COLUMNS;

		ProvinciaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ProvinciaPeer::NUM_COLUMNS;

		ConceptobajaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ConceptobajaPeer::NUM_COLUMNS;

		PaisPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaisPeer::NUM_COLUMNS;

		$c->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$c->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_PAIS_ID, PaisPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipodocumentoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipodocumento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1);
			}

			$omClass = CuentaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCuenta(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAlumnos();
				$obj3->addAlumno($obj1);
			}

			$omClass = ProvinciaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getProvincia(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAlumnos();
				$obj4->addAlumno($obj1);
			}

			$omClass = ConceptobajaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getConceptobaja(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAlumnos();
				$obj5->addAlumno($obj1);
			}

			$omClass = PaisPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getPais(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAlumnos();
				$obj6->addAlumno($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptProvincia(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol2 = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TipodocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipodocumentoPeer::NUM_COLUMNS;

		CuentaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CuentaPeer::NUM_COLUMNS;

		EstablecimientoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + EstablecimientoPeer::NUM_COLUMNS;

		ConceptobajaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ConceptobajaPeer::NUM_COLUMNS;

		PaisPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaisPeer::NUM_COLUMNS;

		$c->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$c->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$c->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_PAIS_ID, PaisPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipodocumentoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipodocumento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1);
			}

			$omClass = CuentaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCuenta(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAlumnos();
				$obj3->addAlumno($obj1);
			}

			$omClass = EstablecimientoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getEstablecimiento(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAlumnos();
				$obj4->addAlumno($obj1);
			}

			$omClass = ConceptobajaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getConceptobaja(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAlumnos();
				$obj5->addAlumno($obj1);
			}

			$omClass = PaisPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getPais(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAlumnos();
				$obj6->addAlumno($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptConceptobaja(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol2 = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TipodocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipodocumentoPeer::NUM_COLUMNS;

		CuentaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CuentaPeer::NUM_COLUMNS;

		EstablecimientoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + EstablecimientoPeer::NUM_COLUMNS;

		ProvinciaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ProvinciaPeer::NUM_COLUMNS;

		PaisPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaisPeer::NUM_COLUMNS;

		$c->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$c->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$c->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_PAIS_ID, PaisPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipodocumentoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipodocumento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1);
			}

			$omClass = CuentaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCuenta(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAlumnos();
				$obj3->addAlumno($obj1);
			}

			$omClass = EstablecimientoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getEstablecimiento(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAlumnos();
				$obj4->addAlumno($obj1);
			}

			$omClass = ProvinciaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getProvincia(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAlumnos();
				$obj5->addAlumno($obj1);
			}

			$omClass = PaisPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getPais(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAlumnos();
				$obj6->addAlumno($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptPais(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol2 = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TipodocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipodocumentoPeer::NUM_COLUMNS;

		CuentaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CuentaPeer::NUM_COLUMNS;

		EstablecimientoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + EstablecimientoPeer::NUM_COLUMNS;

		ProvinciaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ProvinciaPeer::NUM_COLUMNS;

		ConceptobajaPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ConceptobajaPeer::NUM_COLUMNS;

		$c->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$c->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$c->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipodocumentoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipodocumento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1);
			}

			$omClass = CuentaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCuenta(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAlumnos();
				$obj3->addAlumno($obj1);
			}

			$omClass = EstablecimientoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getEstablecimiento(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAlumnos();
				$obj4->addAlumno($obj1);
			}

			$omClass = ProvinciaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getProvincia(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAlumnos();
				$obj5->addAlumno($obj1);
			}

			$omClass = ConceptobajaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getConceptobaja(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAlumnos();
				$obj6->addAlumno($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return AlumnoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AlumnoPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(AlumnoPeer::ID);
			$selectCriteria->add(AlumnoPeer::ID, $criteria->remove(AlumnoPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(AlumnoPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Alumno) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AlumnoPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Alumno $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AlumnoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AlumnoPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(AlumnoPeer::DATABASE_NAME, AlumnoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AlumnoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);

		$criteria->add(AlumnoPeer::ID, $pk);


		$v = AlumnoPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(AlumnoPeer::ID, $pks, Criteria::IN);
			$objs = AlumnoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAlumnoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AlumnoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AlumnoMapBuilder');
}
