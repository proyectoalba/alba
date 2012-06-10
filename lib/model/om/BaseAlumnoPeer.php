<?php


abstract class BaseAlumnoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'alumno';

	
	const CLASS_DEFAULT = 'lib.model.Alumno';

	
	const NUM_COLUMNS = 32;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'alumno.ID';

	
	const LEGAJO_PREFIJO = 'alumno.LEGAJO_PREFIJO';

	
	const LEGAJO_NUMERO = 'alumno.LEGAJO_NUMERO';

	
	const NOMBRE = 'alumno.NOMBRE';

	
	const APELLIDO_MATERNO = 'alumno.APELLIDO_MATERNO';

	
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

	
	const PROCEDENCIA = 'alumno.PROCEDENCIA';

	
	const FK_ESTADOALUMNO_ID = 'alumno.FK_ESTADOALUMNO_ID';

	
	const OBSERVACION = 'alumno.OBSERVACION';

	
	const EMAIL_PADRE = 'alumno.EMAIL_PADRE';

	
	const CELULAR_PADRE = 'alumno.CELULAR_PADRE';

	
	const CELULAR_MADRE = 'alumno.CELULAR_MADRE';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'LegajoPrefijo', 'LegajoNumero', 'Nombre', 'ApellidoMaterno', 'Apellido', 'FechaNacimiento', 'Direccion', 'Ciudad', 'CodigoPostal', 'FkProvinciaId', 'Telefono', 'LugarNacimiento', 'FkTipodocumentoId', 'NroDocumento', 'Sexo', 'Email', 'DistanciaEscuela', 'HermanosEscuela', 'HijoMaestroEscuela', 'FkEstablecimientoId', 'FkCuentaId', 'CertificadoMedico', 'Activo', 'FkConceptobajaId', 'FkPaisId', 'Procedencia', 'FkEstadoalumnoId', 'Observacion', 'EmailPadre', 'CelularPadre', 'CelularMadre', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'legajoPrefijo', 'legajoNumero', 'nombre', 'apellidoMaterno', 'apellido', 'fechaNacimiento', 'direccion', 'ciudad', 'codigoPostal', 'fkProvinciaId', 'telefono', 'lugarNacimiento', 'fkTipodocumentoId', 'nroDocumento', 'sexo', 'email', 'distanciaEscuela', 'hermanosEscuela', 'hijoMaestroEscuela', 'fkEstablecimientoId', 'fkCuentaId', 'certificadoMedico', 'activo', 'fkConceptobajaId', 'fkPaisId', 'procedencia', 'fkEstadoalumnoId', 'observacion', 'emailPadre', 'celularPadre', 'celularMadre', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::LEGAJO_PREFIJO, self::LEGAJO_NUMERO, self::NOMBRE, self::APELLIDO_MATERNO, self::APELLIDO, self::FECHA_NACIMIENTO, self::DIRECCION, self::CIUDAD, self::CODIGO_POSTAL, self::FK_PROVINCIA_ID, self::TELEFONO, self::LUGAR_NACIMIENTO, self::FK_TIPODOCUMENTO_ID, self::NRO_DOCUMENTO, self::SEXO, self::EMAIL, self::DISTANCIA_ESCUELA, self::HERMANOS_ESCUELA, self::HIJO_MAESTRO_ESCUELA, self::FK_ESTABLECIMIENTO_ID, self::FK_CUENTA_ID, self::CERTIFICADO_MEDICO, self::ACTIVO, self::FK_CONCEPTOBAJA_ID, self::FK_PAIS_ID, self::PROCEDENCIA, self::FK_ESTADOALUMNO_ID, self::OBSERVACION, self::EMAIL_PADRE, self::CELULAR_PADRE, self::CELULAR_MADRE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'legajo_prefijo', 'legajo_numero', 'nombre', 'apellido_materno', 'apellido', 'fecha_nacimiento', 'direccion', 'ciudad', 'codigo_postal', 'fk_provincia_id', 'telefono', 'lugar_nacimiento', 'fk_tipodocumento_id', 'nro_documento', 'sexo', 'email', 'distancia_escuela', 'hermanos_escuela', 'hijo_maestro_escuela', 'fk_establecimiento_id', 'fk_cuenta_id', 'certificado_medico', 'activo', 'fk_conceptobaja_id', 'fk_pais_id', 'procedencia', 'fk_estadoalumno_id', 'observacion', 'email_padre', 'celular_padre', 'celular_madre', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'LegajoPrefijo' => 1, 'LegajoNumero' => 2, 'Nombre' => 3, 'ApellidoMaterno' => 4, 'Apellido' => 5, 'FechaNacimiento' => 6, 'Direccion' => 7, 'Ciudad' => 8, 'CodigoPostal' => 9, 'FkProvinciaId' => 10, 'Telefono' => 11, 'LugarNacimiento' => 12, 'FkTipodocumentoId' => 13, 'NroDocumento' => 14, 'Sexo' => 15, 'Email' => 16, 'DistanciaEscuela' => 17, 'HermanosEscuela' => 18, 'HijoMaestroEscuela' => 19, 'FkEstablecimientoId' => 20, 'FkCuentaId' => 21, 'CertificadoMedico' => 22, 'Activo' => 23, 'FkConceptobajaId' => 24, 'FkPaisId' => 25, 'Procedencia' => 26, 'FkEstadoalumnoId' => 27, 'Observacion' => 28, 'EmailPadre' => 29, 'CelularPadre' => 30, 'CelularMadre' => 31, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'legajoPrefijo' => 1, 'legajoNumero' => 2, 'nombre' => 3, 'apellidoMaterno' => 4, 'apellido' => 5, 'fechaNacimiento' => 6, 'direccion' => 7, 'ciudad' => 8, 'codigoPostal' => 9, 'fkProvinciaId' => 10, 'telefono' => 11, 'lugarNacimiento' => 12, 'fkTipodocumentoId' => 13, 'nroDocumento' => 14, 'sexo' => 15, 'email' => 16, 'distanciaEscuela' => 17, 'hermanosEscuela' => 18, 'hijoMaestroEscuela' => 19, 'fkEstablecimientoId' => 20, 'fkCuentaId' => 21, 'certificadoMedico' => 22, 'activo' => 23, 'fkConceptobajaId' => 24, 'fkPaisId' => 25, 'procedencia' => 26, 'fkEstadoalumnoId' => 27, 'observacion' => 28, 'emailPadre' => 29, 'celularPadre' => 30, 'celularMadre' => 31, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::LEGAJO_PREFIJO => 1, self::LEGAJO_NUMERO => 2, self::NOMBRE => 3, self::APELLIDO_MATERNO => 4, self::APELLIDO => 5, self::FECHA_NACIMIENTO => 6, self::DIRECCION => 7, self::CIUDAD => 8, self::CODIGO_POSTAL => 9, self::FK_PROVINCIA_ID => 10, self::TELEFONO => 11, self::LUGAR_NACIMIENTO => 12, self::FK_TIPODOCUMENTO_ID => 13, self::NRO_DOCUMENTO => 14, self::SEXO => 15, self::EMAIL => 16, self::DISTANCIA_ESCUELA => 17, self::HERMANOS_ESCUELA => 18, self::HIJO_MAESTRO_ESCUELA => 19, self::FK_ESTABLECIMIENTO_ID => 20, self::FK_CUENTA_ID => 21, self::CERTIFICADO_MEDICO => 22, self::ACTIVO => 23, self::FK_CONCEPTOBAJA_ID => 24, self::FK_PAIS_ID => 25, self::PROCEDENCIA => 26, self::FK_ESTADOALUMNO_ID => 27, self::OBSERVACION => 28, self::EMAIL_PADRE => 29, self::CELULAR_PADRE => 30, self::CELULAR_MADRE => 31, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'legajo_prefijo' => 1, 'legajo_numero' => 2, 'nombre' => 3, 'apellido_materno' => 4, 'apellido' => 5, 'fecha_nacimiento' => 6, 'direccion' => 7, 'ciudad' => 8, 'codigo_postal' => 9, 'fk_provincia_id' => 10, 'telefono' => 11, 'lugar_nacimiento' => 12, 'fk_tipodocumento_id' => 13, 'nro_documento' => 14, 'sexo' => 15, 'email' => 16, 'distancia_escuela' => 17, 'hermanos_escuela' => 18, 'hijo_maestro_escuela' => 19, 'fk_establecimiento_id' => 20, 'fk_cuenta_id' => 21, 'certificado_medico' => 22, 'activo' => 23, 'fk_conceptobaja_id' => 24, 'fk_pais_id' => 25, 'procedencia' => 26, 'fk_estadoalumno_id' => 27, 'observacion' => 28, 'email_padre' => 29, 'celular_padre' => 30, 'celular_madre' => 31, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new AlumnoMapBuilder();
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
		return str_replace(AlumnoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AlumnoPeer::ID);

		$criteria->addSelectColumn(AlumnoPeer::LEGAJO_PREFIJO);

		$criteria->addSelectColumn(AlumnoPeer::LEGAJO_NUMERO);

		$criteria->addSelectColumn(AlumnoPeer::NOMBRE);

		$criteria->addSelectColumn(AlumnoPeer::APELLIDO_MATERNO);

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

		$criteria->addSelectColumn(AlumnoPeer::PROCEDENCIA);

		$criteria->addSelectColumn(AlumnoPeer::FK_ESTADOALUMNO_ID);

		$criteria->addSelectColumn(AlumnoPeer::OBSERVACION);

		$criteria->addSelectColumn(AlumnoPeer::EMAIL_PADRE);

		$criteria->addSelectColumn(AlumnoPeer::CELULAR_PADRE);

		$criteria->addSelectColumn(AlumnoPeer::CELULAR_MADRE);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(AlumnoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = AlumnoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return AlumnoPeer::populateObjects(AlumnoPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			AlumnoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(Alumno $obj, $key = null)
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
			if (is_object($value) && $value instanceof Alumno) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Alumno object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = AlumnoPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = AlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = AlumnoPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				AlumnoPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinProvincia(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(AlumnoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(AlumnoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);

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

								$criteria->setPrimaryTableName(AlumnoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(AlumnoPeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);

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

								$criteria->setPrimaryTableName(AlumnoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(AlumnoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);

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

								$criteria->setPrimaryTableName(AlumnoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(AlumnoPeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinConceptobaja(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(AlumnoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(AlumnoPeer::FK_CONCEPTOBAJA_ID,), array(ConceptobajaPeer::ID,), $join_behavior);

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

								$criteria->setPrimaryTableName(AlumnoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(AlumnoPeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinEstadosalumnos(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(AlumnoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(AlumnoPeer::FK_ESTADOALUMNO_ID,), array(EstadosalumnosPeer::ID,), $join_behavior);

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

		AlumnoPeer::addSelectColumns($c);
		$startcol = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);
		ProvinciaPeer::addSelectColumns($c);

		$c->addJoin(array(AlumnoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = AlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addAlumno($obj1);

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

		AlumnoPeer::addSelectColumns($c);
		$startcol = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);
		TipodocumentoPeer::addSelectColumns($c);

		$c->addJoin(array(AlumnoPeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = AlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addAlumno($obj1);

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

		AlumnoPeer::addSelectColumns($c);
		$startcol = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);
		EstablecimientoPeer::addSelectColumns($c);

		$c->addJoin(array(AlumnoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = AlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addAlumno($obj1);

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

		AlumnoPeer::addSelectColumns($c);
		$startcol = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);
		CuentaPeer::addSelectColumns($c);

		$c->addJoin(array(AlumnoPeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = AlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addAlumno($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinConceptobaja(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);
		ConceptobajaPeer::addSelectColumns($c);

		$c->addJoin(array(AlumnoPeer::FK_CONCEPTOBAJA_ID,), array(ConceptobajaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = AlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = ConceptobajaPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ConceptobajaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = ConceptobajaPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ConceptobajaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addAlumno($obj1);

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

		AlumnoPeer::addSelectColumns($c);
		$startcol = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);
		PaisPeer::addSelectColumns($c);

		$c->addJoin(array(AlumnoPeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = AlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addAlumno($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinEstadosalumnos(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);
		EstadosalumnosPeer::addSelectColumns($c);

		$c->addJoin(array(AlumnoPeer::FK_ESTADOALUMNO_ID,), array(EstadosalumnosPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = AlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = EstadosalumnosPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = EstadosalumnosPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = EstadosalumnosPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					EstadosalumnosPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addAlumno($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(AlumnoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(AlumnoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$criteria->addJoin(array(AlumnoPeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
		$criteria->addJoin(array(AlumnoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
		$criteria->addJoin(array(AlumnoPeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
		$criteria->addJoin(array(AlumnoPeer::FK_CONCEPTOBAJA_ID,), array(ConceptobajaPeer::ID,), $join_behavior);
		$criteria->addJoin(array(AlumnoPeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
		$criteria->addJoin(array(AlumnoPeer::FK_ESTADOALUMNO_ID,), array(EstadosalumnosPeer::ID,), $join_behavior);
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

		AlumnoPeer::addSelectColumns($c);
		$startcol2 = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		TipodocumentoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (TipodocumentoPeer::NUM_COLUMNS - TipodocumentoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		CuentaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);

		ConceptobajaPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (ConceptobajaPeer::NUM_COLUMNS - ConceptobajaPeer::NUM_LAZY_LOAD_COLUMNS);

		PaisPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (PaisPeer::NUM_COLUMNS - PaisPeer::NUM_LAZY_LOAD_COLUMNS);

		EstadosalumnosPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + (EstadosalumnosPeer::NUM_COLUMNS - EstadosalumnosPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(AlumnoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
		$c->addJoin(array(AlumnoPeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
		$c->addJoin(array(AlumnoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
		$c->addJoin(array(AlumnoPeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
		$c->addJoin(array(AlumnoPeer::FK_CONCEPTOBAJA_ID,), array(ConceptobajaPeer::ID,), $join_behavior);
		$c->addJoin(array(AlumnoPeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
		$c->addJoin(array(AlumnoPeer::FK_ESTADOALUMNO_ID,), array(EstadosalumnosPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = AlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addAlumno($obj1);
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
								$obj3->addAlumno($obj1);
			} 
			
			$key4 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = EstablecimientoPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EstablecimientoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addAlumno($obj1);
			} 
			
			$key5 = CuentaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = CuentaPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$omClass = CuentaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					CuentaPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addAlumno($obj1);
			} 
			
			$key6 = ConceptobajaPeer::getPrimaryKeyHashFromRow($row, $startcol6);
			if ($key6 !== null) {
				$obj6 = ConceptobajaPeer::getInstanceFromPool($key6);
				if (!$obj6) {

					$omClass = ConceptobajaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					ConceptobajaPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addAlumno($obj1);
			} 
			
			$key7 = PaisPeer::getPrimaryKeyHashFromRow($row, $startcol7);
			if ($key7 !== null) {
				$obj7 = PaisPeer::getInstanceFromPool($key7);
				if (!$obj7) {

					$omClass = PaisPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					PaisPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addAlumno($obj1);
			} 
			
			$key8 = EstadosalumnosPeer::getPrimaryKeyHashFromRow($row, $startcol8);
			if ($key8 !== null) {
				$obj8 = EstadosalumnosPeer::getInstanceFromPool($key8);
				if (!$obj8) {

					$omClass = EstadosalumnosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					EstadosalumnosPeer::addInstanceToPool($obj8, $key8);
				} 
								$obj8->addAlumno($obj1);
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
			AlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(AlumnoPeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_CONCEPTOBAJA_ID,), array(ConceptobajaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_ESTADOALUMNO_ID,), array(EstadosalumnosPeer::ID,), $join_behavior);
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
			AlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(AlumnoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_CONCEPTOBAJA_ID,), array(ConceptobajaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_ESTADOALUMNO_ID,), array(EstadosalumnosPeer::ID,), $join_behavior);
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
			AlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(AlumnoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_CONCEPTOBAJA_ID,), array(ConceptobajaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_ESTADOALUMNO_ID,), array(EstadosalumnosPeer::ID,), $join_behavior);
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
			AlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(AlumnoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_CONCEPTOBAJA_ID,), array(ConceptobajaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_ESTADOALUMNO_ID,), array(EstadosalumnosPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptConceptobaja(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(AlumnoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_ESTADOALUMNO_ID,), array(EstadosalumnosPeer::ID,), $join_behavior);
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
			AlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(AlumnoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_CONCEPTOBAJA_ID,), array(ConceptobajaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_ESTADOALUMNO_ID,), array(EstadosalumnosPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptEstadosalumnos(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AlumnoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(AlumnoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_CONCEPTOBAJA_ID,), array(ConceptobajaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(AlumnoPeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
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

		AlumnoPeer::addSelectColumns($c);
		$startcol2 = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		TipodocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (TipodocumentoPeer::NUM_COLUMNS - TipodocumentoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		CuentaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);

		ConceptobajaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (ConceptobajaPeer::NUM_COLUMNS - ConceptobajaPeer::NUM_LAZY_LOAD_COLUMNS);

		PaisPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (PaisPeer::NUM_COLUMNS - PaisPeer::NUM_LAZY_LOAD_COLUMNS);

		EstadosalumnosPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (EstadosalumnosPeer::NUM_COLUMNS - EstadosalumnosPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(AlumnoPeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_CONCEPTOBAJA_ID,), array(ConceptobajaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_ESTADOALUMNO_ID,), array(EstadosalumnosPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = AlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addAlumno($obj1);

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
								$obj3->addAlumno($obj1);

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
								$obj4->addAlumno($obj1);

			} 
				
				$key5 = ConceptobajaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = ConceptobajaPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = ConceptobajaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					ConceptobajaPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addAlumno($obj1);

			} 
				
				$key6 = PaisPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = PaisPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = PaisPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					PaisPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addAlumno($obj1);

			} 
				
				$key7 = EstadosalumnosPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = EstadosalumnosPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = EstadosalumnosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					EstadosalumnosPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addAlumno($obj1);

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

		AlumnoPeer::addSelectColumns($c);
		$startcol2 = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		CuentaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);

		ConceptobajaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (ConceptobajaPeer::NUM_COLUMNS - ConceptobajaPeer::NUM_LAZY_LOAD_COLUMNS);

		PaisPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (PaisPeer::NUM_COLUMNS - PaisPeer::NUM_LAZY_LOAD_COLUMNS);

		EstadosalumnosPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (EstadosalumnosPeer::NUM_COLUMNS - EstadosalumnosPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(AlumnoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_CONCEPTOBAJA_ID,), array(ConceptobajaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_ESTADOALUMNO_ID,), array(EstadosalumnosPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = AlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addAlumno($obj1);

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
								$obj3->addAlumno($obj1);

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
								$obj4->addAlumno($obj1);

			} 
				
				$key5 = ConceptobajaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = ConceptobajaPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = ConceptobajaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					ConceptobajaPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addAlumno($obj1);

			} 
				
				$key6 = PaisPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = PaisPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = PaisPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					PaisPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addAlumno($obj1);

			} 
				
				$key7 = EstadosalumnosPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = EstadosalumnosPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = EstadosalumnosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					EstadosalumnosPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addAlumno($obj1);

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

		AlumnoPeer::addSelectColumns($c);
		$startcol2 = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		TipodocumentoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (TipodocumentoPeer::NUM_COLUMNS - TipodocumentoPeer::NUM_LAZY_LOAD_COLUMNS);

		CuentaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);

		ConceptobajaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (ConceptobajaPeer::NUM_COLUMNS - ConceptobajaPeer::NUM_LAZY_LOAD_COLUMNS);

		PaisPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (PaisPeer::NUM_COLUMNS - PaisPeer::NUM_LAZY_LOAD_COLUMNS);

		EstadosalumnosPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (EstadosalumnosPeer::NUM_COLUMNS - EstadosalumnosPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(AlumnoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_CONCEPTOBAJA_ID,), array(ConceptobajaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_ESTADOALUMNO_ID,), array(EstadosalumnosPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = AlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addAlumno($obj1);

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
								$obj3->addAlumno($obj1);

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
								$obj4->addAlumno($obj1);

			} 
				
				$key5 = ConceptobajaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = ConceptobajaPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = ConceptobajaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					ConceptobajaPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addAlumno($obj1);

			} 
				
				$key6 = PaisPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = PaisPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = PaisPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					PaisPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addAlumno($obj1);

			} 
				
				$key7 = EstadosalumnosPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = EstadosalumnosPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = EstadosalumnosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					EstadosalumnosPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addAlumno($obj1);

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

		AlumnoPeer::addSelectColumns($c);
		$startcol2 = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		TipodocumentoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (TipodocumentoPeer::NUM_COLUMNS - TipodocumentoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		ConceptobajaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (ConceptobajaPeer::NUM_COLUMNS - ConceptobajaPeer::NUM_LAZY_LOAD_COLUMNS);

		PaisPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (PaisPeer::NUM_COLUMNS - PaisPeer::NUM_LAZY_LOAD_COLUMNS);

		EstadosalumnosPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (EstadosalumnosPeer::NUM_COLUMNS - EstadosalumnosPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(AlumnoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_CONCEPTOBAJA_ID,), array(ConceptobajaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_ESTADOALUMNO_ID,), array(EstadosalumnosPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = AlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addAlumno($obj1);

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
								$obj3->addAlumno($obj1);

			} 
				
				$key4 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = EstablecimientoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EstablecimientoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addAlumno($obj1);

			} 
				
				$key5 = ConceptobajaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = ConceptobajaPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = ConceptobajaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					ConceptobajaPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addAlumno($obj1);

			} 
				
				$key6 = PaisPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = PaisPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = PaisPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					PaisPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addAlumno($obj1);

			} 
				
				$key7 = EstadosalumnosPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = EstadosalumnosPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = EstadosalumnosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					EstadosalumnosPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addAlumno($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptConceptobaja(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol2 = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		TipodocumentoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (TipodocumentoPeer::NUM_COLUMNS - TipodocumentoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		CuentaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);

		PaisPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (PaisPeer::NUM_COLUMNS - PaisPeer::NUM_LAZY_LOAD_COLUMNS);

		EstadosalumnosPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (EstadosalumnosPeer::NUM_COLUMNS - EstadosalumnosPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(AlumnoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_ESTADOALUMNO_ID,), array(EstadosalumnosPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = AlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addAlumno($obj1);

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
								$obj3->addAlumno($obj1);

			} 
				
				$key4 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = EstablecimientoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EstablecimientoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addAlumno($obj1);

			} 
				
				$key5 = CuentaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = CuentaPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = CuentaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					CuentaPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addAlumno($obj1);

			} 
				
				$key6 = PaisPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = PaisPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = PaisPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					PaisPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addAlumno($obj1);

			} 
				
				$key7 = EstadosalumnosPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = EstadosalumnosPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = EstadosalumnosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					EstadosalumnosPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addAlumno($obj1);

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

		AlumnoPeer::addSelectColumns($c);
		$startcol2 = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		TipodocumentoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (TipodocumentoPeer::NUM_COLUMNS - TipodocumentoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		CuentaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);

		ConceptobajaPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (ConceptobajaPeer::NUM_COLUMNS - ConceptobajaPeer::NUM_LAZY_LOAD_COLUMNS);

		EstadosalumnosPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (EstadosalumnosPeer::NUM_COLUMNS - EstadosalumnosPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(AlumnoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_CONCEPTOBAJA_ID,), array(ConceptobajaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_ESTADOALUMNO_ID,), array(EstadosalumnosPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = AlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addAlumno($obj1);

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
								$obj3->addAlumno($obj1);

			} 
				
				$key4 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = EstablecimientoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EstablecimientoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addAlumno($obj1);

			} 
				
				$key5 = CuentaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = CuentaPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = CuentaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					CuentaPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addAlumno($obj1);

			} 
				
				$key6 = ConceptobajaPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = ConceptobajaPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = ConceptobajaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					ConceptobajaPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addAlumno($obj1);

			} 
				
				$key7 = EstadosalumnosPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = EstadosalumnosPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = EstadosalumnosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					EstadosalumnosPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addAlumno($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptEstadosalumnos(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoPeer::addSelectColumns($c);
		$startcol2 = (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS);

		TipodocumentoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (TipodocumentoPeer::NUM_COLUMNS - TipodocumentoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		CuentaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS);

		ConceptobajaPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (ConceptobajaPeer::NUM_COLUMNS - ConceptobajaPeer::NUM_LAZY_LOAD_COLUMNS);

		PaisPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (PaisPeer::NUM_COLUMNS - PaisPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(AlumnoPeer::FK_PROVINCIA_ID,), array(ProvinciaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_TIPODOCUMENTO_ID,), array(TipodocumentoPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_CUENTA_ID,), array(CuentaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_CONCEPTOBAJA_ID,), array(ConceptobajaPeer::ID,), $join_behavior);
				$c->addJoin(array(AlumnoPeer::FK_PAIS_ID,), array(PaisPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = AlumnoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addAlumno($obj1);

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
								$obj3->addAlumno($obj1);

			} 
				
				$key4 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = EstablecimientoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EstablecimientoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addAlumno($obj1);

			} 
				
				$key5 = CuentaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = CuentaPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = CuentaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					CuentaPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addAlumno($obj1);

			} 
				
				$key6 = ConceptobajaPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = ConceptobajaPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = ConceptobajaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					ConceptobajaPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addAlumno($obj1);

			} 
				
				$key7 = PaisPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = PaisPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$omClass = PaisPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					PaisPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addAlumno($obj1);

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
		return AlumnoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(AlumnoPeer::ID) && $criteria->keyContainsValue(AlumnoPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.AlumnoPeer::ID.')');
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
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(AlumnoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												AlumnoPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof Alumno) {
						AlumnoPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AlumnoPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								AlumnoPeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(Alumno $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AlumnoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AlumnoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AlumnoPeer::DATABASE_NAME, AlumnoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AlumnoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = AlumnoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		$criteria->add(AlumnoPeer::ID, $pk);

		$v = AlumnoPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
			$criteria->add(AlumnoPeer::ID, $pks, Criteria::IN);
			$objs = AlumnoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseAlumnoPeer::DATABASE_NAME)->addTableBuilder(BaseAlumnoPeer::TABLE_NAME, BaseAlumnoPeer::getMapBuilder());

