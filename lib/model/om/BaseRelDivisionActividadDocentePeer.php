<?php

require_once 'propel/util/BasePeer.php';
// The object class -- needed for instanceof checks in this class.
// actual class may be a subclass -- as returned by RelDivisionActividadDocentePeer::getOMClass()
include_once 'model/RelDivisionActividadDocente.php';

/**
 * Base static class for performing query and update operations on the 'rel_division_actividad_docente' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseRelDivisionActividadDocentePeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'alba';

	/** the table name for this class */
	const TABLE_NAME = 'rel_division_actividad_docente';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'model.RelDivisionActividadDocente';

	/** The total number of columns. */
	const NUM_COLUMNS = 11;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;


	/** the column name for the ID field */
	const ID = 'rel_division_actividad_docente.ID';

	/** the column name for the FK_DIVISION_ID field */
	const FK_DIVISION_ID = 'rel_division_actividad_docente.FK_DIVISION_ID';

	/** the column name for the FK_ACTIVIDAD_ID field */
	const FK_ACTIVIDAD_ID = 'rel_division_actividad_docente.FK_ACTIVIDAD_ID';

	/** the column name for the FK_DOCENTE_ID field */
	const FK_DOCENTE_ID = 'rel_division_actividad_docente.FK_DOCENTE_ID';

	/** the column name for the FK_TIPODOCENTE_ID field */
	const FK_TIPODOCENTE_ID = 'rel_division_actividad_docente.FK_TIPODOCENTE_ID';

	/** the column name for the FK_CARGOBAJA_ID field */
	const FK_CARGOBAJA_ID = 'rel_division_actividad_docente.FK_CARGOBAJA_ID';

	/** the column name for the FK_REPETICION_ID field */
	const FK_REPETICION_ID = 'rel_division_actividad_docente.FK_REPETICION_ID';

	/** the column name for the FECHA_INICIO field */
	const FECHA_INICIO = 'rel_division_actividad_docente.FECHA_INICIO';

	/** the column name for the FECHA_FIN field */
	const FECHA_FIN = 'rel_division_actividad_docente.FECHA_FIN';

	/** the column name for the HORA_INICIO field */
	const HORA_INICIO = 'rel_division_actividad_docente.HORA_INICIO';

	/** the column name for the HORA_FIN field */
	const HORA_FIN = 'rel_division_actividad_docente.HORA_FIN';

	/** The PHP to DB Name Mapping */
	private static $phpNameMap = null;


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkDivisionId', 'FkActividadId', 'FkDocenteId', 'FkTipodocenteId', 'FkCargobajaId', 'FkRepeticionId', 'FechaInicio', 'FechaFin', 'HoraInicio', 'HoraFin', ),
		BasePeer::TYPE_COLNAME => array (RelDivisionActividadDocentePeer::ID, RelDivisionActividadDocentePeer::FK_DIVISION_ID, RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, RelDivisionActividadDocentePeer::FK_DOCENTE_ID, RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID, RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID, RelDivisionActividadDocentePeer::FK_REPETICION_ID, RelDivisionActividadDocentePeer::FECHA_INICIO, RelDivisionActividadDocentePeer::FECHA_FIN, RelDivisionActividadDocentePeer::HORA_INICIO, RelDivisionActividadDocentePeer::HORA_FIN, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_division_id', 'fk_actividad_id', 'fk_docente_id', 'fk_tipodocente_id', 'fk_cargobaja_id', 'fk_repeticion_id', 'fecha_inicio', 'fecha_fin', 'hora_inicio', 'hora_fin', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkDivisionId' => 1, 'FkActividadId' => 2, 'FkDocenteId' => 3, 'FkTipodocenteId' => 4, 'FkCargobajaId' => 5, 'FkRepeticionId' => 6, 'FechaInicio' => 7, 'FechaFin' => 8, 'HoraInicio' => 9, 'HoraFin' => 10, ),
		BasePeer::TYPE_COLNAME => array (RelDivisionActividadDocentePeer::ID => 0, RelDivisionActividadDocentePeer::FK_DIVISION_ID => 1, RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID => 2, RelDivisionActividadDocentePeer::FK_DOCENTE_ID => 3, RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID => 4, RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID => 5, RelDivisionActividadDocentePeer::FK_REPETICION_ID => 6, RelDivisionActividadDocentePeer::FECHA_INICIO => 7, RelDivisionActividadDocentePeer::FECHA_FIN => 8, RelDivisionActividadDocentePeer::HORA_INICIO => 9, RelDivisionActividadDocentePeer::HORA_FIN => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_division_id' => 1, 'fk_actividad_id' => 2, 'fk_docente_id' => 3, 'fk_tipodocente_id' => 4, 'fk_cargobaja_id' => 5, 'fk_repeticion_id' => 6, 'fecha_inicio' => 7, 'fecha_fin' => 8, 'hora_inicio' => 9, 'hora_fin' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	/**
	 * @return MapBuilder the map builder for this peer
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getMapBuilder()
	{
		include_once 'model/map/RelDivisionActividadDocenteMapBuilder.php';
		return BasePeer::getMapBuilder('model.map.RelDivisionActividadDocenteMapBuilder');
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
			$map = RelDivisionActividadDocentePeer::getTableMap();
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
	 * @param string $column The column name for current table. (i.e. RelDivisionActividadDocentePeer::COLUMN_NAME).
	 * @return string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(RelDivisionActividadDocentePeer::TABLE_NAME.'.', $alias.'.', $column);
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

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FK_DIVISION_ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FK_DOCENTE_ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FK_REPETICION_ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FECHA_INICIO);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FECHA_FIN);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::HORA_INICIO);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::HORA_FIN);

	}

	const COUNT = 'COUNT(rel_division_actividad_docente.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT rel_division_actividad_docente.ID)';

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
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
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
	 * @return RelDivisionActividadDocente
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = RelDivisionActividadDocentePeer::doSelect($critcopy, $con);
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
		return RelDivisionActividadDocentePeer::populateObjects(RelDivisionActividadDocentePeer::doSelectRS($criteria, $con));
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
			RelDivisionActividadDocentePeer::addSelectColumns($criteria);
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
		$cls = RelDivisionActividadDocentePeer::getOMClass();
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
	 * Returns the number of rows matching criteria, joining the related Division table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinDivision(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Tipodocente table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinTipodocente(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID, TipodocentePeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Cargobaja table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinCargobaja(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID, CargobajaPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Docente table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinDocente(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Actividad table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinActividad(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Repeticion table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinRepeticion(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of RelDivisionActividadDocente objects pre-filled with their Division objects.
	 *
	 * @return array Array of RelDivisionActividadDocente objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinDivision(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DivisionPeer::addSelectColumns($c);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DivisionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDivision(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addRelDivisionActividadDocente($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of RelDivisionActividadDocente objects pre-filled with their Tipodocente objects.
	 *
	 * @return array Array of RelDivisionActividadDocente objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinTipodocente(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TipodocentePeer::addSelectColumns($c);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID, TipodocentePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipodocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTipodocente(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addRelDivisionActividadDocente($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of RelDivisionActividadDocente objects pre-filled with their Cargobaja objects.
	 *
	 * @return array Array of RelDivisionActividadDocente objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinCargobaja(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CargobajaPeer::addSelectColumns($c);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID, CargobajaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CargobajaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCargobaja(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addRelDivisionActividadDocente($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of RelDivisionActividadDocente objects pre-filled with their Docente objects.
	 *
	 * @return array Array of RelDivisionActividadDocente objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinDocente(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DocentePeer::addSelectColumns($c);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDocente(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addRelDivisionActividadDocente($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of RelDivisionActividadDocente objects pre-filled with their Actividad objects.
	 *
	 * @return array Array of RelDivisionActividadDocente objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinActividad(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ActividadPeer::addSelectColumns($c);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ActividadPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getActividad(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addRelDivisionActividadDocente($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of RelDivisionActividadDocente objects pre-filled with their Repeticion objects.
	 *
	 * @return array Array of RelDivisionActividadDocente objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinRepeticion(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		RepeticionPeer::addSelectColumns($c);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = RepeticionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getRepeticion(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addRelDivisionActividadDocente($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1); //CHECKME
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
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID, TipodocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID, CargobajaPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of RelDivisionActividadDocente objects pre-filled with all related objects.
	 *
	 * @return array Array of RelDivisionActividadDocente objects.
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

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DivisionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DivisionPeer::NUM_COLUMNS;

		TipodocentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TipodocentePeer::NUM_COLUMNS;

		CargobajaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CargobajaPeer::NUM_COLUMNS;

		DocentePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + DocentePeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ActividadPeer::NUM_COLUMNS;

		RepeticionPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + RepeticionPeer::NUM_COLUMNS;

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID, TipodocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID, CargobajaPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			
			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				
				// Add objects for joined Division rows
	
			$omClass = DivisionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDivision(); // CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelDivisionActividadDocente($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1);
			}

				
				// Add objects for joined Tipodocente rows
	
			$omClass = TipodocentePeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTipodocente(); // CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRelDivisionActividadDocente($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initRelDivisionActividadDocentes();
				$obj3->addRelDivisionActividadDocente($obj1);
			}

				
				// Add objects for joined Cargobaja rows
	
			$omClass = CargobajaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCargobaja(); // CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addRelDivisionActividadDocente($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initRelDivisionActividadDocentes();
				$obj4->addRelDivisionActividadDocente($obj1);
			}

				
				// Add objects for joined Docente rows
	
			$omClass = DocentePeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getDocente(); // CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addRelDivisionActividadDocente($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initRelDivisionActividadDocentes();
				$obj5->addRelDivisionActividadDocente($obj1);
			}

				
				// Add objects for joined Actividad rows
	
			$omClass = ActividadPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getActividad(); // CHECKME
				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addRelDivisionActividadDocente($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj6->initRelDivisionActividadDocentes();
				$obj6->addRelDivisionActividadDocente($obj1);
			}

				
				// Add objects for joined Repeticion rows
	
			$omClass = RepeticionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getRepeticion(); // CHECKME
				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addRelDivisionActividadDocente($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj7->initRelDivisionActividadDocentes();
				$obj7->addRelDivisionActividadDocente($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Division table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptDivision(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID, TipodocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID, CargobajaPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Tipodocente table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptTipodocente(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID, CargobajaPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Cargobaja table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptCargobaja(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID, TipodocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Docente table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptDocente(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID, TipodocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID, CargobajaPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Actividad table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptActividad(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID, TipodocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID, CargobajaPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Repeticion table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptRepeticion(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID, TipodocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID, CargobajaPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of RelDivisionActividadDocente objects pre-filled with all related objects except Division.
	 *
	 * @return array Array of RelDivisionActividadDocente objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptDivision(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TipodocentePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipodocentePeer::NUM_COLUMNS;

		CargobajaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CargobajaPeer::NUM_COLUMNS;

		DocentePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + DocentePeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ActividadPeer::NUM_COLUMNS;

		RepeticionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + RepeticionPeer::NUM_COLUMNS;

		$c->addJoin(RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID, TipodocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID, CargobajaPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = TipodocentePeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipodocente(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1);
			}

			$omClass = CargobajaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCargobaja(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initRelDivisionActividadDocentes();
				$obj3->addRelDivisionActividadDocente($obj1);
			}

			$omClass = DocentePeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getDocente(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initRelDivisionActividadDocentes();
				$obj4->addRelDivisionActividadDocente($obj1);
			}

			$omClass = ActividadPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getActividad(); //CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initRelDivisionActividadDocentes();
				$obj5->addRelDivisionActividadDocente($obj1);
			}

			$omClass = RepeticionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getRepeticion(); //CHECKME
				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj6->initRelDivisionActividadDocentes();
				$obj6->addRelDivisionActividadDocente($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of RelDivisionActividadDocente objects pre-filled with all related objects except Tipodocente.
	 *
	 * @return array Array of RelDivisionActividadDocente objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptTipodocente(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DivisionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DivisionPeer::NUM_COLUMNS;

		CargobajaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CargobajaPeer::NUM_COLUMNS;

		DocentePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + DocentePeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ActividadPeer::NUM_COLUMNS;

		RepeticionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + RepeticionPeer::NUM_COLUMNS;

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID, CargobajaPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = DivisionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDivision(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1);
			}

			$omClass = CargobajaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCargobaja(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initRelDivisionActividadDocentes();
				$obj3->addRelDivisionActividadDocente($obj1);
			}

			$omClass = DocentePeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getDocente(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initRelDivisionActividadDocentes();
				$obj4->addRelDivisionActividadDocente($obj1);
			}

			$omClass = ActividadPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getActividad(); //CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initRelDivisionActividadDocentes();
				$obj5->addRelDivisionActividadDocente($obj1);
			}

			$omClass = RepeticionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getRepeticion(); //CHECKME
				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj6->initRelDivisionActividadDocentes();
				$obj6->addRelDivisionActividadDocente($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of RelDivisionActividadDocente objects pre-filled with all related objects except Cargobaja.
	 *
	 * @return array Array of RelDivisionActividadDocente objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptCargobaja(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DivisionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DivisionPeer::NUM_COLUMNS;

		TipodocentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TipodocentePeer::NUM_COLUMNS;

		DocentePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + DocentePeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ActividadPeer::NUM_COLUMNS;

		RepeticionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + RepeticionPeer::NUM_COLUMNS;

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID, TipodocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = DivisionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDivision(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1);
			}

			$omClass = TipodocentePeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTipodocente(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initRelDivisionActividadDocentes();
				$obj3->addRelDivisionActividadDocente($obj1);
			}

			$omClass = DocentePeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getDocente(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initRelDivisionActividadDocentes();
				$obj4->addRelDivisionActividadDocente($obj1);
			}

			$omClass = ActividadPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getActividad(); //CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initRelDivisionActividadDocentes();
				$obj5->addRelDivisionActividadDocente($obj1);
			}

			$omClass = RepeticionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getRepeticion(); //CHECKME
				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj6->initRelDivisionActividadDocentes();
				$obj6->addRelDivisionActividadDocente($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of RelDivisionActividadDocente objects pre-filled with all related objects except Docente.
	 *
	 * @return array Array of RelDivisionActividadDocente objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptDocente(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DivisionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DivisionPeer::NUM_COLUMNS;

		TipodocentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TipodocentePeer::NUM_COLUMNS;

		CargobajaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CargobajaPeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ActividadPeer::NUM_COLUMNS;

		RepeticionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + RepeticionPeer::NUM_COLUMNS;

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID, TipodocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID, CargobajaPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = DivisionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDivision(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1);
			}

			$omClass = TipodocentePeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTipodocente(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initRelDivisionActividadDocentes();
				$obj3->addRelDivisionActividadDocente($obj1);
			}

			$omClass = CargobajaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCargobaja(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initRelDivisionActividadDocentes();
				$obj4->addRelDivisionActividadDocente($obj1);
			}

			$omClass = ActividadPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getActividad(); //CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initRelDivisionActividadDocentes();
				$obj5->addRelDivisionActividadDocente($obj1);
			}

			$omClass = RepeticionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getRepeticion(); //CHECKME
				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj6->initRelDivisionActividadDocentes();
				$obj6->addRelDivisionActividadDocente($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of RelDivisionActividadDocente objects pre-filled with all related objects except Actividad.
	 *
	 * @return array Array of RelDivisionActividadDocente objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptActividad(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DivisionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DivisionPeer::NUM_COLUMNS;

		TipodocentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TipodocentePeer::NUM_COLUMNS;

		CargobajaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CargobajaPeer::NUM_COLUMNS;

		DocentePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + DocentePeer::NUM_COLUMNS;

		RepeticionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + RepeticionPeer::NUM_COLUMNS;

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID, TipodocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID, CargobajaPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = DivisionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDivision(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1);
			}

			$omClass = TipodocentePeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTipodocente(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initRelDivisionActividadDocentes();
				$obj3->addRelDivisionActividadDocente($obj1);
			}

			$omClass = CargobajaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCargobaja(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initRelDivisionActividadDocentes();
				$obj4->addRelDivisionActividadDocente($obj1);
			}

			$omClass = DocentePeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getDocente(); //CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initRelDivisionActividadDocentes();
				$obj5->addRelDivisionActividadDocente($obj1);
			}

			$omClass = RepeticionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getRepeticion(); //CHECKME
				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj6->initRelDivisionActividadDocentes();
				$obj6->addRelDivisionActividadDocente($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of RelDivisionActividadDocente objects pre-filled with all related objects except Repeticion.
	 *
	 * @return array Array of RelDivisionActividadDocente objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptRepeticion(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DivisionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DivisionPeer::NUM_COLUMNS;

		TipodocentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TipodocentePeer::NUM_COLUMNS;

		CargobajaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CargobajaPeer::NUM_COLUMNS;

		DocentePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + DocentePeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ActividadPeer::NUM_COLUMNS;

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_TIPODOCENTE_ID, TipodocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_CARGOBAJA_ID, CargobajaPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = DivisionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDivision(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1);
			}

			$omClass = TipodocentePeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTipodocente(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initRelDivisionActividadDocentes();
				$obj3->addRelDivisionActividadDocente($obj1);
			}

			$omClass = CargobajaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCargobaja(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initRelDivisionActividadDocentes();
				$obj4->addRelDivisionActividadDocente($obj1);
			}

			$omClass = DocentePeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getDocente(); //CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initRelDivisionActividadDocentes();
				$obj5->addRelDivisionActividadDocente($obj1);
			}

			$omClass = ActividadPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getActividad(); //CHECKME
				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj6->initRelDivisionActividadDocentes();
				$obj6->addRelDivisionActividadDocente($obj1);
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
		return RelDivisionActividadDocentePeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a RelDivisionActividadDocente or Criteria object.
	 *
	 * @param mixed $values Criteria or RelDivisionActividadDocente object containing data that is used to create the INSERT statement.
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
			$criteria = $values->buildCriteria(); // build Criteria from RelDivisionActividadDocente object
		}

		$criteria->remove(RelDivisionActividadDocentePeer::ID); // remove pkey col since this table uses auto-increment


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
	 * Method perform an UPDATE on the database, given a RelDivisionActividadDocente or Criteria object.
	 *
	 * @param mixed $values Criteria or RelDivisionActividadDocente object containing data that is used to create the UPDATE statement.
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

			$comparison = $criteria->getComparison(RelDivisionActividadDocentePeer::ID);
			$selectCriteria->add(RelDivisionActividadDocentePeer::ID, $criteria->remove(RelDivisionActividadDocentePeer::ID), $comparison);

		} else { // $values is RelDivisionActividadDocente object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the rel_division_actividad_docente table.
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
			$affectedRows += BasePeer::doDeleteAll(RelDivisionActividadDocentePeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a RelDivisionActividadDocente or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or RelDivisionActividadDocente object or primary key or array of primary keys
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
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} elseif ($values instanceof RelDivisionActividadDocente) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RelDivisionActividadDocentePeer::ID, (array) $values, Criteria::IN);
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
	 * Validates all modified columns of given RelDivisionActividadDocente object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param RelDivisionActividadDocente $obj The object to validate.
	 * @param mixed $cols Column name or array of column names.
	 *
	 * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(RelDivisionActividadDocente $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RelDivisionActividadDocentePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RelDivisionActividadDocentePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RelDivisionActividadDocentePeer::DATABASE_NAME, RelDivisionActividadDocentePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RelDivisionActividadDocentePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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
	 * @return RelDivisionActividadDocente
	 */
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(RelDivisionActividadDocentePeer::DATABASE_NAME);

		$criteria->add(RelDivisionActividadDocentePeer::ID, $pk);


		$v = RelDivisionActividadDocentePeer::doSelect($criteria, $con);

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
			$criteria->add(RelDivisionActividadDocentePeer::ID, $pks, Criteria::IN);
			$objs = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseRelDivisionActividadDocentePeer

// static code to register the map builder for this Peer with the main Propel class
if (Propel::isInit()) {
	// the MapBuilder classes register themselves with Propel during initialization
	// so we need to load them here.
	try {
		BaseRelDivisionActividadDocentePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	// even if Propel is not yet initialized, the map builder class can be registered
	// now and then it will be loaded when Propel initializes.
	require_once 'model/map/RelDivisionActividadDocenteMapBuilder.php';
	Propel::registerMapBuilder('model.map.RelDivisionActividadDocenteMapBuilder');
}
