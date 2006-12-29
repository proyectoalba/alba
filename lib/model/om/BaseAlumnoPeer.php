<?php

require_once 'propel/util/BasePeer.php';
// The object class -- needed for instanceof checks in this class.
// actual class may be a subclass -- as returned by AlumnoPeer::getOMClass()
include_once 'model/Alumno.php';

/**
 * Base static class for performing query and update operations on the 'alumno' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseAlumnoPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'alba';

	/** the table name for this class */
	const TABLE_NAME = 'alumno';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'model.Alumno';

	/** The total number of columns. */
	const NUM_COLUMNS = 21;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;


	/** the column name for the ID field */
	const ID = 'alumno.ID';

	/** the column name for the NOMBRE field */
	const NOMBRE = 'alumno.NOMBRE';

	/** the column name for the APELLIDO field */
	const APELLIDO = 'alumno.APELLIDO';

	/** the column name for the FECHA_NACIMIENTO field */
	const FECHA_NACIMIENTO = 'alumno.FECHA_NACIMIENTO';

	/** the column name for the DIRECCION field */
	const DIRECCION = 'alumno.DIRECCION';

	/** the column name for the CIUDAD field */
	const CIUDAD = 'alumno.CIUDAD';

	/** the column name for the CODIGO_POSTAL field */
	const CODIGO_POSTAL = 'alumno.CODIGO_POSTAL';

	/** the column name for the FK_PROVINCIA_ID field */
	const FK_PROVINCIA_ID = 'alumno.FK_PROVINCIA_ID';

	/** the column name for the TELEFONO field */
	const TELEFONO = 'alumno.TELEFONO';

	/** the column name for the FK_TIPODOCUMENTO_ID field */
	const FK_TIPODOCUMENTO_ID = 'alumno.FK_TIPODOCUMENTO_ID';

	/** the column name for the NRO_DOCUMENTO field */
	const NRO_DOCUMENTO = 'alumno.NRO_DOCUMENTO';

	/** the column name for the SEXO field */
	const SEXO = 'alumno.SEXO';

	/** the column name for the EMAIL field */
	const EMAIL = 'alumno.EMAIL';

	/** the column name for the DISTANCIA_ESCUELA field */
	const DISTANCIA_ESCUELA = 'alumno.DISTANCIA_ESCUELA';

	/** the column name for the HERMANOS_ESCUELA field */
	const HERMANOS_ESCUELA = 'alumno.HERMANOS_ESCUELA';

	/** the column name for the HIJO_MAESTRO_ESCUELA field */
	const HIJO_MAESTRO_ESCUELA = 'alumno.HIJO_MAESTRO_ESCUELA';

	/** the column name for the FK_ESTABLECIMIENTO_ID field */
	const FK_ESTABLECIMIENTO_ID = 'alumno.FK_ESTABLECIMIENTO_ID';

	/** the column name for the FK_CUENTA_ID field */
	const FK_CUENTA_ID = 'alumno.FK_CUENTA_ID';

	/** the column name for the CERTIFICADO_MEDICO field */
	const CERTIFICADO_MEDICO = 'alumno.CERTIFICADO_MEDICO';

	/** the column name for the ACTIVO field */
	const ACTIVO = 'alumno.ACTIVO';

	/** the column name for the FK_CONCEPTOBAJA_ID field */
	const FK_CONCEPTOBAJA_ID = 'alumno.FK_CONCEPTOBAJA_ID';

	/** The PHP to DB Name Mapping */
	private static $phpNameMap = null;


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nombre', 'Apellido', 'FechaNacimiento', 'Direccion', 'Ciudad', 'CodigoPostal', 'FkProvinciaId', 'Telefono', 'FkTipodocumentoId', 'NroDocumento', 'Sexo', 'Email', 'DistanciaEscuela', 'HermanosEscuela', 'HijoMaestroEscuela', 'FkEstablecimientoId', 'FkCuentaId', 'CertificadoMedico', 'Activo', 'FkConceptobajaId', ),
		BasePeer::TYPE_COLNAME => array (AlumnoPeer::ID, AlumnoPeer::NOMBRE, AlumnoPeer::APELLIDO, AlumnoPeer::FECHA_NACIMIENTO, AlumnoPeer::DIRECCION, AlumnoPeer::CIUDAD, AlumnoPeer::CODIGO_POSTAL, AlumnoPeer::FK_PROVINCIA_ID, AlumnoPeer::TELEFONO, AlumnoPeer::FK_TIPODOCUMENTO_ID, AlumnoPeer::NRO_DOCUMENTO, AlumnoPeer::SEXO, AlumnoPeer::EMAIL, AlumnoPeer::DISTANCIA_ESCUELA, AlumnoPeer::HERMANOS_ESCUELA, AlumnoPeer::HIJO_MAESTRO_ESCUELA, AlumnoPeer::FK_ESTABLECIMIENTO_ID, AlumnoPeer::FK_CUENTA_ID, AlumnoPeer::CERTIFICADO_MEDICO, AlumnoPeer::ACTIVO, AlumnoPeer::FK_CONCEPTOBAJA_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nombre', 'apellido', 'fecha_nacimiento', 'direccion', 'ciudad', 'codigo_postal', 'fk_provincia_id', 'telefono', 'fk_tipodocumento_id', 'nro_documento', 'sexo', 'email', 'distancia_escuela', 'hermanos_escuela', 'hijo_maestro_escuela', 'fk_establecimiento_id', 'fk_cuenta_id', 'certificado_medico', 'activo', 'fk_conceptobaja_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nombre' => 1, 'Apellido' => 2, 'FechaNacimiento' => 3, 'Direccion' => 4, 'Ciudad' => 5, 'CodigoPostal' => 6, 'FkProvinciaId' => 7, 'Telefono' => 8, 'FkTipodocumentoId' => 9, 'NroDocumento' => 10, 'Sexo' => 11, 'Email' => 12, 'DistanciaEscuela' => 13, 'HermanosEscuela' => 14, 'HijoMaestroEscuela' => 15, 'FkEstablecimientoId' => 16, 'FkCuentaId' => 17, 'CertificadoMedico' => 18, 'Activo' => 19, 'FkConceptobajaId' => 20, ),
		BasePeer::TYPE_COLNAME => array (AlumnoPeer::ID => 0, AlumnoPeer::NOMBRE => 1, AlumnoPeer::APELLIDO => 2, AlumnoPeer::FECHA_NACIMIENTO => 3, AlumnoPeer::DIRECCION => 4, AlumnoPeer::CIUDAD => 5, AlumnoPeer::CODIGO_POSTAL => 6, AlumnoPeer::FK_PROVINCIA_ID => 7, AlumnoPeer::TELEFONO => 8, AlumnoPeer::FK_TIPODOCUMENTO_ID => 9, AlumnoPeer::NRO_DOCUMENTO => 10, AlumnoPeer::SEXO => 11, AlumnoPeer::EMAIL => 12, AlumnoPeer::DISTANCIA_ESCUELA => 13, AlumnoPeer::HERMANOS_ESCUELA => 14, AlumnoPeer::HIJO_MAESTRO_ESCUELA => 15, AlumnoPeer::FK_ESTABLECIMIENTO_ID => 16, AlumnoPeer::FK_CUENTA_ID => 17, AlumnoPeer::CERTIFICADO_MEDICO => 18, AlumnoPeer::ACTIVO => 19, AlumnoPeer::FK_CONCEPTOBAJA_ID => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nombre' => 1, 'apellido' => 2, 'fecha_nacimiento' => 3, 'direccion' => 4, 'ciudad' => 5, 'codigo_postal' => 6, 'fk_provincia_id' => 7, 'telefono' => 8, 'fk_tipodocumento_id' => 9, 'nro_documento' => 10, 'sexo' => 11, 'email' => 12, 'distancia_escuela' => 13, 'hermanos_escuela' => 14, 'hijo_maestro_escuela' => 15, 'fk_establecimiento_id' => 16, 'fk_cuenta_id' => 17, 'certificado_medico' => 18, 'activo' => 19, 'fk_conceptobaja_id' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	/**
	 * @return MapBuilder the map builder for this peer
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getMapBuilder()
	{
		include_once 'model/map/AlumnoMapBuilder.php';
		return BasePeer::getMapBuilder('model.map.AlumnoMapBuilder');
	}
	/**
	 * Gets a map (hash) of PHP names to DB column names.
	 *
	 * @return array The PHP to DB name map for this peer
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @deprecated Use the getFieldNames() and translateFieldName() methods instead of this.
	 */
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
	/**
	 * Translates a fieldname to another type
	 *
	 * @param string $name field name
	 * @param string $fromType One of the class type constants TYPE_PHPNAME,
	 *                         TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM
	 * @param string $toType   One of the class type constants
	 * @return string translated name of the field.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of of field names.
	 *
	 * @param  string $type The type of fieldnames to return:
	 *                      One of the class type constants TYPE_PHPNAME,
	 *                      TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM
	 * @return array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param string $alias The alias for the current table.
	 * @param string $column The column name for current table. (i.e. AlumnoPeer::COLUMN_NAME).
	 * @return string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(AlumnoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param criteria object containing the columns to add.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
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

	}

	const COUNT = 'COUNT(alumno.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT alumno.ID)';

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param Criteria $criteria object used to create the SELECT statement.
	 * @param Connection $con
	 * @return Alumno
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
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
	/**
	 * Method to do selects.
	 *
	 * @param Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param Connection $con
	 * @return array Array of selected Objects
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AlumnoPeer::populateObjects(AlumnoPeer::doSelectRS($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect()
	 * method to get a ResultSet.
	 *
	 * Use this method directly if you want to just get the resultset
	 * (instead of an array of objects).
	 *
	 * @param Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param Connection $con the connection to use
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return ResultSet The resultset object with numerically-indexed fields.
	 * @see BasePeer::doSelect()
	 */
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AlumnoPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a Creole ResultSet, set to return
		// rows indexed numerically.
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = AlumnoPeer::getOMClass();
		$cls = Propel::import($cls);
		// populate the object(s)
		while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	/**
	 * Returns the number of rows matching criteria, joining the related Tipodocumento table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinTipodocumento(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Cuenta table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinCuenta(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Establecimiento table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinEstablecimiento(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Provincia table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinProvincia(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Conceptobaja table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinConceptobaja(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of Alumno objects pre-filled with their Tipodocumento objects.
	 *
	 * @return array Array of Alumno objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinTipodocumento(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
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
				$temp_obj2 = $temp_obj1->getTipodocumento(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addAlumno($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Alumno objects pre-filled with their Cuenta objects.
	 *
	 * @return array Array of Alumno objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinCuenta(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
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
				$temp_obj2 = $temp_obj1->getCuenta(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addAlumno($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Alumno objects pre-filled with their Establecimiento objects.
	 *
	 * @return array Array of Alumno objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinEstablecimiento(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
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
				$temp_obj2 = $temp_obj1->getEstablecimiento(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addAlumno($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Alumno objects pre-filled with their Provincia objects.
	 *
	 * @return array Array of Alumno objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinProvincia(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
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
				$temp_obj2 = $temp_obj1->getProvincia(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addAlumno($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Alumno objects pre-filled with their Conceptobaja objects.
	 *
	 * @return array Array of Alumno objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinConceptobaja(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
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
				$temp_obj2 = $temp_obj1->getConceptobaja(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addAlumno($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
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
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of Alumno objects pre-filled with all related objects.
	 *
	 * @return array Array of Alumno objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
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

				
				// Add objects for joined Tipodocumento rows
	
			$omClass = TipodocumentoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipodocumento(); // CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAlumno($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initAlumnos();
				$obj2->addAlumno($obj1);
			}

				
				// Add objects for joined Cuenta rows
	
			$omClass = CuentaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCuenta(); // CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAlumno($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initAlumnos();
				$obj3->addAlumno($obj1);
			}

				
				// Add objects for joined Establecimiento rows
	
			$omClass = EstablecimientoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getEstablecimiento(); // CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAlumno($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initAlumnos();
				$obj4->addAlumno($obj1);
			}

				
				// Add objects for joined Provincia rows
	
			$omClass = ProvinciaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getProvincia(); // CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAlumno($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initAlumnos();
				$obj5->addAlumno($obj1);
			}

				
				// Add objects for joined Conceptobaja rows
	
			$omClass = ConceptobajaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getConceptobaja(); // CHECKME
				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAlumno($obj1); // CHECKME
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


	/**
	 * Returns the number of rows matching criteria, joining the related Tipodocumento table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptTipodocumento(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Cuenta table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptCuenta(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Establecimiento table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptEstablecimiento(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Provincia table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptProvincia(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CONCEPTOBAJA_ID, ConceptobajaPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Conceptobaja table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptConceptobaja(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlumnoPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$criteria->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$rs = AlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of Alumno objects pre-filled with all related objects except Tipodocumento.
	 *
	 * @return array Array of Alumno objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptTipodocumento(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
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

			$omClass = CuentaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCuenta(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
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
				$temp_obj3 = $temp_obj1->getEstablecimiento(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
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
				$temp_obj4 = $temp_obj1->getProvincia(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
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
				$temp_obj5 = $temp_obj1->getConceptobaja(); //CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAlumno($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initAlumnos();
				$obj5->addAlumno($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Alumno objects pre-filled with all related objects except Cuenta.
	 *
	 * @return array Array of Alumno objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptCuenta(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
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

		$c->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

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
				$temp_obj2 = $temp_obj1->getTipodocumento(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
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
				$temp_obj3 = $temp_obj1->getEstablecimiento(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
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
				$temp_obj4 = $temp_obj1->getProvincia(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
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
				$temp_obj5 = $temp_obj1->getConceptobaja(); //CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAlumno($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initAlumnos();
				$obj5->addAlumno($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Alumno objects pre-filled with all related objects except Establecimiento.
	 *
	 * @return array Array of Alumno objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptEstablecimiento(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
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

		$c->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$c->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

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
				$temp_obj2 = $temp_obj1->getTipodocumento(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
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
				$temp_obj3 = $temp_obj1->getCuenta(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
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
				$temp_obj4 = $temp_obj1->getProvincia(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
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
				$temp_obj5 = $temp_obj1->getConceptobaja(); //CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAlumno($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initAlumnos();
				$obj5->addAlumno($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Alumno objects pre-filled with all related objects except Provincia.
	 *
	 * @return array Array of Alumno objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptProvincia(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
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

		$c->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$c->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

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
				$temp_obj2 = $temp_obj1->getTipodocumento(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
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
				$temp_obj3 = $temp_obj1->getCuenta(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
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
				$temp_obj4 = $temp_obj1->getEstablecimiento(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
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
				$temp_obj5 = $temp_obj1->getConceptobaja(); //CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAlumno($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initAlumnos();
				$obj5->addAlumno($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Alumno objects pre-filled with all related objects except Conceptobaja.
	 *
	 * @return array Array of Alumno objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptConceptobaja(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
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

		$c->addJoin(AlumnoPeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$c->addJoin(AlumnoPeer::FK_CUENTA_ID, CuentaPeer::ID);

		$c->addJoin(AlumnoPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$c->addJoin(AlumnoPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);


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
				$temp_obj2 = $temp_obj1->getTipodocumento(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
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
				$temp_obj3 = $temp_obj1->getCuenta(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
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
				$temp_obj4 = $temp_obj1->getEstablecimiento(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
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
				$temp_obj5 = $temp_obj1->getProvincia(); //CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAlumno($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initAlumnos();
				$obj5->addAlumno($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return TableMap
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * This uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @return string path.to.ClassName
	 */
	public static function getOMClass()
	{
		return AlumnoPeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a Alumno or Criteria object.
	 *
	 * @param mixed $values Criteria or Alumno object containing data that is used to create the INSERT statement.
	 * @param Connection $con the connection to use
	 * @return mixed The new primary key.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Alumno object
		}

		$criteria->remove(AlumnoPeer::ID); // remove pkey col since this table uses auto-increment


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a Alumno or Criteria object.
	 *
	 * @param mixed $values Criteria or Alumno object containing data that is used to create the UPDATE statement.
	 * @param Connection $con The connection to use (specify Connection object to exert more control over transactions).
	 * @return int The number of affected rows (if supported by underlying database driver).
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(AlumnoPeer::ID);
			$selectCriteria->add(AlumnoPeer::ID, $criteria->remove(AlumnoPeer::ID), $comparison);

		} else { // $values is Alumno object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the alumno table.
	 *
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->begin();
			$affectedRows += BasePeer::doDeleteAll(AlumnoPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Alumno or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or Alumno object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param Connection $con the connection to use
	 * @return int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} elseif ($values instanceof Alumno) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AlumnoPeer::ID, (array) $values, Criteria::IN);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Alumno object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param Alumno $obj The object to validate.
	 * @param mixed $cols Column name or array of column names.
	 *
	 * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
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

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param mixed $pk the primary key.
	 * @param Connection $con the connection to use
	 * @return Alumno
	 */
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

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param array $pks List of primary keys
	 * @param Connection $con the connection to use
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
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

} // BaseAlumnoPeer

// static code to register the map builder for this Peer with the main Propel class
if (Propel::isInit()) {
	// the MapBuilder classes register themselves with Propel during initialization
	// so we need to load them here.
	try {
		BaseAlumnoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	// even if Propel is not yet initialized, the map builder class can be registered
	// now and then it will be loaded when Propel initializes.
	require_once 'model/map/AlumnoMapBuilder.php';
	Propel::registerMapBuilder('model.map.AlumnoMapBuilder');
}
