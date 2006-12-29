<?php

require_once 'propel/util/BasePeer.php';
// The object class -- needed for instanceof checks in this class.
// actual class may be a subclass -- as returned by ResponsablePeer::getOMClass()
include_once 'model/Responsable.php';

/**
 * Base static class for performing query and update operations on the 'responsable' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseResponsablePeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'alba';

	/** the table name for this class */
	const TABLE_NAME = 'responsable';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'model.Responsable';

	/** The total number of columns. */
	const NUM_COLUMNS = 16;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;


	/** the column name for the ID field */
	const ID = 'responsable.ID';

	/** the column name for the NOMBRE field */
	const NOMBRE = 'responsable.NOMBRE';

	/** the column name for the APELLIDO field */
	const APELLIDO = 'responsable.APELLIDO';

	/** the column name for the DIRECCION field */
	const DIRECCION = 'responsable.DIRECCION';

	/** the column name for the CIUDAD field */
	const CIUDAD = 'responsable.CIUDAD';

	/** the column name for the CODIGO_POSTAL field */
	const CODIGO_POSTAL = 'responsable.CODIGO_POSTAL';

	/** the column name for the FK_PROVINCIA_ID field */
	const FK_PROVINCIA_ID = 'responsable.FK_PROVINCIA_ID';

	/** the column name for the TELEFONO field */
	const TELEFONO = 'responsable.TELEFONO';

	/** the column name for the TELEFONO_MOVIL field */
	const TELEFONO_MOVIL = 'responsable.TELEFONO_MOVIL';

	/** the column name for the NRO_DOCUMENTO field */
	const NRO_DOCUMENTO = 'responsable.NRO_DOCUMENTO';

	/** the column name for the FK_TIPODOCUMENTO_ID field */
	const FK_TIPODOCUMENTO_ID = 'responsable.FK_TIPODOCUMENTO_ID';

	/** the column name for the SEXO field */
	const SEXO = 'responsable.SEXO';

	/** the column name for the EMAIL field */
	const EMAIL = 'responsable.EMAIL';

	/** the column name for the RELACION field */
	const RELACION = 'responsable.RELACION';

	/** the column name for the AUTORIZACION_RETIRO field */
	const AUTORIZACION_RETIRO = 'responsable.AUTORIZACION_RETIRO';

	/** the column name for the FK_CUENTA_ID field */
	const FK_CUENTA_ID = 'responsable.FK_CUENTA_ID';

	/** The PHP to DB Name Mapping */
	private static $phpNameMap = null;


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nombre', 'Apellido', 'Direccion', 'Ciudad', 'CodigoPostal', 'FkProvinciaId', 'Telefono', 'TelefonoMovil', 'NroDocumento', 'FkTipodocumentoId', 'Sexo', 'Email', 'Relacion', 'AutorizacionRetiro', 'FkCuentaId', ),
		BasePeer::TYPE_COLNAME => array (ResponsablePeer::ID, ResponsablePeer::NOMBRE, ResponsablePeer::APELLIDO, ResponsablePeer::DIRECCION, ResponsablePeer::CIUDAD, ResponsablePeer::CODIGO_POSTAL, ResponsablePeer::FK_PROVINCIA_ID, ResponsablePeer::TELEFONO, ResponsablePeer::TELEFONO_MOVIL, ResponsablePeer::NRO_DOCUMENTO, ResponsablePeer::FK_TIPODOCUMENTO_ID, ResponsablePeer::SEXO, ResponsablePeer::EMAIL, ResponsablePeer::RELACION, ResponsablePeer::AUTORIZACION_RETIRO, ResponsablePeer::FK_CUENTA_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nombre', 'apellido', 'direccion', 'ciudad', 'codigo_postal', 'fk_provincia_id', 'telefono', 'telefono_movil', 'nro_documento', 'fk_tipodocumento_id', 'sexo', 'email', 'relacion', 'autorizacion_retiro', 'fk_cuenta_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nombre' => 1, 'Apellido' => 2, 'Direccion' => 3, 'Ciudad' => 4, 'CodigoPostal' => 5, 'FkProvinciaId' => 6, 'Telefono' => 7, 'TelefonoMovil' => 8, 'NroDocumento' => 9, 'FkTipodocumentoId' => 10, 'Sexo' => 11, 'Email' => 12, 'Relacion' => 13, 'AutorizacionRetiro' => 14, 'FkCuentaId' => 15, ),
		BasePeer::TYPE_COLNAME => array (ResponsablePeer::ID => 0, ResponsablePeer::NOMBRE => 1, ResponsablePeer::APELLIDO => 2, ResponsablePeer::DIRECCION => 3, ResponsablePeer::CIUDAD => 4, ResponsablePeer::CODIGO_POSTAL => 5, ResponsablePeer::FK_PROVINCIA_ID => 6, ResponsablePeer::TELEFONO => 7, ResponsablePeer::TELEFONO_MOVIL => 8, ResponsablePeer::NRO_DOCUMENTO => 9, ResponsablePeer::FK_TIPODOCUMENTO_ID => 10, ResponsablePeer::SEXO => 11, ResponsablePeer::EMAIL => 12, ResponsablePeer::RELACION => 13, ResponsablePeer::AUTORIZACION_RETIRO => 14, ResponsablePeer::FK_CUENTA_ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nombre' => 1, 'apellido' => 2, 'direccion' => 3, 'ciudad' => 4, 'codigo_postal' => 5, 'fk_provincia_id' => 6, 'telefono' => 7, 'telefono_movil' => 8, 'nro_documento' => 9, 'fk_tipodocumento_id' => 10, 'sexo' => 11, 'email' => 12, 'relacion' => 13, 'autorizacion_retiro' => 14, 'fk_cuenta_id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	/**
	 * @return MapBuilder the map builder for this peer
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getMapBuilder()
	{
		include_once 'model/map/ResponsableMapBuilder.php';
		return BasePeer::getMapBuilder('model.map.ResponsableMapBuilder');
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
			$map = ResponsablePeer::getTableMap();
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
	 * @param string $column The column name for current table. (i.e. ResponsablePeer::COLUMN_NAME).
	 * @return string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ResponsablePeer::TABLE_NAME.'.', $alias.'.', $column);
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

		$criteria->addSelectColumn(ResponsablePeer::ID);

		$criteria->addSelectColumn(ResponsablePeer::NOMBRE);

		$criteria->addSelectColumn(ResponsablePeer::APELLIDO);

		$criteria->addSelectColumn(ResponsablePeer::DIRECCION);

		$criteria->addSelectColumn(ResponsablePeer::CIUDAD);

		$criteria->addSelectColumn(ResponsablePeer::CODIGO_POSTAL);

		$criteria->addSelectColumn(ResponsablePeer::FK_PROVINCIA_ID);

		$criteria->addSelectColumn(ResponsablePeer::TELEFONO);

		$criteria->addSelectColumn(ResponsablePeer::TELEFONO_MOVIL);

		$criteria->addSelectColumn(ResponsablePeer::NRO_DOCUMENTO);

		$criteria->addSelectColumn(ResponsablePeer::FK_TIPODOCUMENTO_ID);

		$criteria->addSelectColumn(ResponsablePeer::SEXO);

		$criteria->addSelectColumn(ResponsablePeer::EMAIL);

		$criteria->addSelectColumn(ResponsablePeer::RELACION);

		$criteria->addSelectColumn(ResponsablePeer::AUTORIZACION_RETIRO);

		$criteria->addSelectColumn(ResponsablePeer::FK_CUENTA_ID);

	}

	const COUNT = 'COUNT(responsable.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT responsable.ID)';

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
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
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
	 * @return Responsable
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ResponsablePeer::doSelect($critcopy, $con);
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
		return ResponsablePeer::populateObjects(ResponsablePeer::doSelectRS($criteria, $con));
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
			ResponsablePeer::addSelectColumns($criteria);
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
		$cls = ResponsablePeer::getOMClass();
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
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
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
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of Responsable objects pre-filled with their Cuenta objects.
	 *
	 * @return array Array of Responsable objects.
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

		ResponsablePeer::addSelectColumns($c);
		$startcol = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CuentaPeer::addSelectColumns($c);

		$c->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ResponsablePeer::getOMClass();

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
					$temp_obj2->addResponsable($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initResponsables();
				$obj2->addResponsable($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Responsable objects pre-filled with their Provincia objects.
	 *
	 * @return array Array of Responsable objects.
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

		ResponsablePeer::addSelectColumns($c);
		$startcol = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProvinciaPeer::addSelectColumns($c);

		$c->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ResponsablePeer::getOMClass();

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
					$temp_obj2->addResponsable($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initResponsables();
				$obj2->addResponsable($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Responsable objects pre-filled with their Tipodocumento objects.
	 *
	 * @return array Array of Responsable objects.
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

		ResponsablePeer::addSelectColumns($c);
		$startcol = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TipodocumentoPeer::addSelectColumns($c);

		$c->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ResponsablePeer::getOMClass();

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
					$temp_obj2->addResponsable($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initResponsables();
				$obj2->addResponsable($obj1); //CHECKME
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
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$criteria->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of Responsable objects pre-filled with all related objects.
	 *
	 * @return array Array of Responsable objects.
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

		ResponsablePeer::addSelectColumns($c);
		$startcol2 = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CuentaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CuentaPeer::NUM_COLUMNS;

		ProvinciaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProvinciaPeer::NUM_COLUMNS;

		TipodocumentoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + TipodocumentoPeer::NUM_COLUMNS;

		$c->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);

		$c->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$c->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = ResponsablePeer::getOMClass();

			
			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				
				// Add objects for joined Cuenta rows
	
			$omClass = CuentaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCuenta(); // CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addResponsable($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initResponsables();
				$obj2->addResponsable($obj1);
			}

				
				// Add objects for joined Provincia rows
	
			$omClass = ProvinciaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProvincia(); // CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addResponsable($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initResponsables();
				$obj3->addResponsable($obj1);
			}

				
				// Add objects for joined Tipodocumento rows
	
			$omClass = TipodocumentoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getTipodocumento(); // CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addResponsable($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initResponsables();
				$obj4->addResponsable($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
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
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$criteria->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
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
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of Responsable objects pre-filled with all related objects except Cuenta.
	 *
	 * @return array Array of Responsable objects.
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

		ResponsablePeer::addSelectColumns($c);
		$startcol2 = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProvinciaPeer::NUM_COLUMNS;

		TipodocumentoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TipodocumentoPeer::NUM_COLUMNS;

		$c->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$c->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = ResponsablePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = ProvinciaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProvincia(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addResponsable($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initResponsables();
				$obj2->addResponsable($obj1);
			}

			$omClass = TipodocumentoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTipodocumento(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addResponsable($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initResponsables();
				$obj3->addResponsable($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Responsable objects pre-filled with all related objects except Provincia.
	 *
	 * @return array Array of Responsable objects.
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

		ResponsablePeer::addSelectColumns($c);
		$startcol2 = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CuentaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CuentaPeer::NUM_COLUMNS;

		TipodocumentoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TipodocumentoPeer::NUM_COLUMNS;

		$c->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);

		$c->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = ResponsablePeer::getOMClass();

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
					$temp_obj2->addResponsable($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initResponsables();
				$obj2->addResponsable($obj1);
			}

			$omClass = TipodocumentoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTipodocumento(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addResponsable($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initResponsables();
				$obj3->addResponsable($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of Responsable objects pre-filled with all related objects except Tipodocumento.
	 *
	 * @return array Array of Responsable objects.
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

		ResponsablePeer::addSelectColumns($c);
		$startcol2 = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CuentaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CuentaPeer::NUM_COLUMNS;

		ProvinciaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProvinciaPeer::NUM_COLUMNS;

		$c->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);

		$c->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = ResponsablePeer::getOMClass();

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
					$temp_obj2->addResponsable($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initResponsables();
				$obj2->addResponsable($obj1);
			}

			$omClass = ProvinciaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProvincia(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addResponsable($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initResponsables();
				$obj3->addResponsable($obj1);
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
		return ResponsablePeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a Responsable or Criteria object.
	 *
	 * @param mixed $values Criteria or Responsable object containing data that is used to create the INSERT statement.
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
			$criteria = $values->buildCriteria(); // build Criteria from Responsable object
		}

		$criteria->remove(ResponsablePeer::ID); // remove pkey col since this table uses auto-increment


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
	 * Method perform an UPDATE on the database, given a Responsable or Criteria object.
	 *
	 * @param mixed $values Criteria or Responsable object containing data that is used to create the UPDATE statement.
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

			$comparison = $criteria->getComparison(ResponsablePeer::ID);
			$selectCriteria->add(ResponsablePeer::ID, $criteria->remove(ResponsablePeer::ID), $comparison);

		} else { // $values is Responsable object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the responsable table.
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
			$affectedRows += BasePeer::doDeleteAll(ResponsablePeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Responsable or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or Responsable object or primary key or array of primary keys
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
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} elseif ($values instanceof Responsable) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ResponsablePeer::ID, (array) $values, Criteria::IN);
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
	 * Validates all modified columns of given Responsable object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param Responsable $obj The object to validate.
	 * @param mixed $cols Column name or array of column names.
	 *
	 * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(Responsable $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ResponsablePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ResponsablePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ResponsablePeer::DATABASE_NAME, ResponsablePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ResponsablePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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
	 * @return Responsable
	 */
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(ResponsablePeer::DATABASE_NAME);

		$criteria->add(ResponsablePeer::ID, $pk);


		$v = ResponsablePeer::doSelect($criteria, $con);

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
			$criteria->add(ResponsablePeer::ID, $pks, Criteria::IN);
			$objs = ResponsablePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseResponsablePeer

// static code to register the map builder for this Peer with the main Propel class
if (Propel::isInit()) {
	// the MapBuilder classes register themselves with Propel during initialization
	// so we need to load them here.
	try {
		BaseResponsablePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	// even if Propel is not yet initialized, the map builder class can be registered
	// now and then it will be loaded when Propel initializes.
	require_once 'model/map/ResponsableMapBuilder.php';
	Propel::registerMapBuilder('model.map.ResponsableMapBuilder');
}
