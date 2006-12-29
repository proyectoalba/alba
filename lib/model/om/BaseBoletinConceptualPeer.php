<?php

require_once 'propel/util/BasePeer.php';
// The object class -- needed for instanceof checks in this class.
// actual class may be a subclass -- as returned by BoletinConceptualPeer::getOMClass()
include_once 'model/BoletinConceptual.php';

/**
 * Base static class for performing query and update operations on the 'boletin_conceptual' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseBoletinConceptualPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'alba';

	/** the table name for this class */
	const TABLE_NAME = 'boletin_conceptual';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'model.BoletinConceptual';

	/** The total number of columns. */
	const NUM_COLUMNS = 7;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;


	/** the column name for the ID field */
	const ID = 'boletin_conceptual.ID';

	/** the column name for the FK_ESCALANOTA_ID field */
	const FK_ESCALANOTA_ID = 'boletin_conceptual.FK_ESCALANOTA_ID';

	/** the column name for the FK_ALUMNO_ID field */
	const FK_ALUMNO_ID = 'boletin_conceptual.FK_ALUMNO_ID';

	/** the column name for the FK_CONCEPTO_ID field */
	const FK_CONCEPTO_ID = 'boletin_conceptual.FK_CONCEPTO_ID';

	/** the column name for the FK_PERIODO_ID field */
	const FK_PERIODO_ID = 'boletin_conceptual.FK_PERIODO_ID';

	/** the column name for the OBSERVACION field */
	const OBSERVACION = 'boletin_conceptual.OBSERVACION';

	/** the column name for the FECHA field */
	const FECHA = 'boletin_conceptual.FECHA';

	/** The PHP to DB Name Mapping */
	private static $phpNameMap = null;


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkEscalanotaId', 'FkAlumnoId', 'FkConceptoId', 'FkPeriodoId', 'Observacion', 'Fecha', ),
		BasePeer::TYPE_COLNAME => array (BoletinConceptualPeer::ID, BoletinConceptualPeer::FK_ESCALANOTA_ID, BoletinConceptualPeer::FK_ALUMNO_ID, BoletinConceptualPeer::FK_CONCEPTO_ID, BoletinConceptualPeer::FK_PERIODO_ID, BoletinConceptualPeer::OBSERVACION, BoletinConceptualPeer::FECHA, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_escalanota_id', 'fk_alumno_id', 'fk_concepto_id', 'fk_periodo_id', 'observacion', 'fecha', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkEscalanotaId' => 1, 'FkAlumnoId' => 2, 'FkConceptoId' => 3, 'FkPeriodoId' => 4, 'Observacion' => 5, 'Fecha' => 6, ),
		BasePeer::TYPE_COLNAME => array (BoletinConceptualPeer::ID => 0, BoletinConceptualPeer::FK_ESCALANOTA_ID => 1, BoletinConceptualPeer::FK_ALUMNO_ID => 2, BoletinConceptualPeer::FK_CONCEPTO_ID => 3, BoletinConceptualPeer::FK_PERIODO_ID => 4, BoletinConceptualPeer::OBSERVACION => 5, BoletinConceptualPeer::FECHA => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_escalanota_id' => 1, 'fk_alumno_id' => 2, 'fk_concepto_id' => 3, 'fk_periodo_id' => 4, 'observacion' => 5, 'fecha' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	/**
	 * @return MapBuilder the map builder for this peer
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getMapBuilder()
	{
		include_once 'model/map/BoletinConceptualMapBuilder.php';
		return BasePeer::getMapBuilder('model.map.BoletinConceptualMapBuilder');
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
			$map = BoletinConceptualPeer::getTableMap();
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
	 * @param string $column The column name for current table. (i.e. BoletinConceptualPeer::COLUMN_NAME).
	 * @return string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(BoletinConceptualPeer::TABLE_NAME.'.', $alias.'.', $column);
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

		$criteria->addSelectColumn(BoletinConceptualPeer::ID);

		$criteria->addSelectColumn(BoletinConceptualPeer::FK_ESCALANOTA_ID);

		$criteria->addSelectColumn(BoletinConceptualPeer::FK_ALUMNO_ID);

		$criteria->addSelectColumn(BoletinConceptualPeer::FK_CONCEPTO_ID);

		$criteria->addSelectColumn(BoletinConceptualPeer::FK_PERIODO_ID);

		$criteria->addSelectColumn(BoletinConceptualPeer::OBSERVACION);

		$criteria->addSelectColumn(BoletinConceptualPeer::FECHA);

	}

	const COUNT = 'COUNT(boletin_conceptual.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT boletin_conceptual.ID)';

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
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
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
	 * @return BoletinConceptual
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = BoletinConceptualPeer::doSelect($critcopy, $con);
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
		return BoletinConceptualPeer::populateObjects(BoletinConceptualPeer::doSelectRS($criteria, $con));
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
			BoletinConceptualPeer::addSelectColumns($criteria);
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
		$cls = BoletinConceptualPeer::getOMClass();
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
	 * Returns the number of rows matching criteria, joining the related Escalanota table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinEscalanota(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Alumno table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAlumno(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Concepto table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinConcepto(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Periodo table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinPeriodo(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of BoletinConceptual objects pre-filled with their Escalanota objects.
	 *
	 * @return array Array of BoletinConceptual objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinEscalanota(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EscalanotaPeer::addSelectColumns($c);

		$c->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EscalanotaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEscalanota(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addBoletinConceptual($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of BoletinConceptual objects pre-filled with their Alumno objects.
	 *
	 * @return array Array of BoletinConceptual objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAlumno(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AlumnoPeer::addSelectColumns($c);

		$c->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAlumno(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addBoletinConceptual($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of BoletinConceptual objects pre-filled with their Concepto objects.
	 *
	 * @return array Array of BoletinConceptual objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinConcepto(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ConceptoPeer::addSelectColumns($c);

		$c->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ConceptoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getConcepto(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addBoletinConceptual($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of BoletinConceptual objects pre-filled with their Periodo objects.
	 *
	 * @return array Array of BoletinConceptual objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinPeriodo(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PeriodoPeer::addSelectColumns($c);

		$c->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PeriodoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getPeriodo(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addBoletinConceptual($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1); //CHECKME
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
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of BoletinConceptual objects pre-filled with all related objects.
	 *
	 * @return array Array of BoletinConceptual objects.
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

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol2 = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EscalanotaPeer::NUM_COLUMNS;

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AlumnoPeer::NUM_COLUMNS;

		ConceptoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ConceptoPeer::NUM_COLUMNS;

		PeriodoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + PeriodoPeer::NUM_COLUMNS;

		$c->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

			
			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				
				// Add objects for joined Escalanota rows
	
			$omClass = EscalanotaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEscalanota(); // CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBoletinConceptual($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1);
			}

				
				// Add objects for joined Alumno rows
	
			$omClass = AlumnoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAlumno(); // CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBoletinConceptual($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initBoletinConceptuals();
				$obj3->addBoletinConceptual($obj1);
			}

				
				// Add objects for joined Concepto rows
	
			$omClass = ConceptoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getConcepto(); // CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBoletinConceptual($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initBoletinConceptuals();
				$obj4->addBoletinConceptual($obj1);
			}

				
				// Add objects for joined Periodo rows
	
			$omClass = PeriodoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getPeriodo(); // CHECKME
				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addBoletinConceptual($obj1); // CHECKME
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initBoletinConceptuals();
				$obj5->addBoletinConceptual($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Escalanota table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptEscalanota(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Alumno table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptAlumno(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Concepto table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptConcepto(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Periodo table
	 *
	 * @param Criteria $c
	 * @param boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptPeriodo(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}
		
		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of BoletinConceptual objects pre-filled with all related objects except Escalanota.
	 *
	 * @return array Array of BoletinConceptual objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptEscalanota(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol2 = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AlumnoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AlumnoPeer::NUM_COLUMNS;

		ConceptoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ConceptoPeer::NUM_COLUMNS;

		PeriodoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PeriodoPeer::NUM_COLUMNS;

		$c->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = AlumnoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAlumno(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBoletinConceptual($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1);
			}

			$omClass = ConceptoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getConcepto(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBoletinConceptual($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initBoletinConceptuals();
				$obj3->addBoletinConceptual($obj1);
			}

			$omClass = PeriodoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getPeriodo(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBoletinConceptual($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initBoletinConceptuals();
				$obj4->addBoletinConceptual($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of BoletinConceptual objects pre-filled with all related objects except Alumno.
	 *
	 * @return array Array of BoletinConceptual objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptAlumno(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol2 = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EscalanotaPeer::NUM_COLUMNS;

		ConceptoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ConceptoPeer::NUM_COLUMNS;

		PeriodoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PeriodoPeer::NUM_COLUMNS;

		$c->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = EscalanotaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEscalanota(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBoletinConceptual($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1);
			}

			$omClass = ConceptoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getConcepto(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBoletinConceptual($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initBoletinConceptuals();
				$obj3->addBoletinConceptual($obj1);
			}

			$omClass = PeriodoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getPeriodo(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBoletinConceptual($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initBoletinConceptuals();
				$obj4->addBoletinConceptual($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of BoletinConceptual objects pre-filled with all related objects except Concepto.
	 *
	 * @return array Array of BoletinConceptual objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptConcepto(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol2 = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EscalanotaPeer::NUM_COLUMNS;

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AlumnoPeer::NUM_COLUMNS;

		PeriodoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PeriodoPeer::NUM_COLUMNS;

		$c->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = EscalanotaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEscalanota(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBoletinConceptual($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1);
			}

			$omClass = AlumnoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAlumno(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBoletinConceptual($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initBoletinConceptuals();
				$obj3->addBoletinConceptual($obj1);
			}

			$omClass = PeriodoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getPeriodo(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBoletinConceptual($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initBoletinConceptuals();
				$obj4->addBoletinConceptual($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of BoletinConceptual objects pre-filled with all related objects except Periodo.
	 *
	 * @return array Array of BoletinConceptual objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptPeriodo(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol2 = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EscalanotaPeer::NUM_COLUMNS;

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AlumnoPeer::NUM_COLUMNS;

		ConceptoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ConceptoPeer::NUM_COLUMNS;

		$c->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = EscalanotaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEscalanota(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBoletinConceptual($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1);
			}

			$omClass = AlumnoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAlumno(); //CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBoletinConceptual($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initBoletinConceptuals();
				$obj3->addBoletinConceptual($obj1);
			}

			$omClass = ConceptoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getConcepto(); //CHECKME
				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBoletinConceptual($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initBoletinConceptuals();
				$obj4->addBoletinConceptual($obj1);
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
		return BoletinConceptualPeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a BoletinConceptual or Criteria object.
	 *
	 * @param mixed $values Criteria or BoletinConceptual object containing data that is used to create the INSERT statement.
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
			$criteria = $values->buildCriteria(); // build Criteria from BoletinConceptual object
		}

		$criteria->remove(BoletinConceptualPeer::ID); // remove pkey col since this table uses auto-increment


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
	 * Method perform an UPDATE on the database, given a BoletinConceptual or Criteria object.
	 *
	 * @param mixed $values Criteria or BoletinConceptual object containing data that is used to create the UPDATE statement.
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

			$comparison = $criteria->getComparison(BoletinConceptualPeer::ID);
			$selectCriteria->add(BoletinConceptualPeer::ID, $criteria->remove(BoletinConceptualPeer::ID), $comparison);

		} else { // $values is BoletinConceptual object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the boletin_conceptual table.
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
			$affectedRows += BasePeer::doDeleteAll(BoletinConceptualPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a BoletinConceptual or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or BoletinConceptual object or primary key or array of primary keys
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
			$con = Propel::getConnection(BoletinConceptualPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} elseif ($values instanceof BoletinConceptual) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BoletinConceptualPeer::ID, (array) $values, Criteria::IN);
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
	 * Validates all modified columns of given BoletinConceptual object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param BoletinConceptual $obj The object to validate.
	 * @param mixed $cols Column name or array of column names.
	 *
	 * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(BoletinConceptual $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BoletinConceptualPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BoletinConceptualPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BoletinConceptualPeer::DATABASE_NAME, BoletinConceptualPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BoletinConceptualPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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
	 * @return BoletinConceptual
	 */
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(BoletinConceptualPeer::DATABASE_NAME);

		$criteria->add(BoletinConceptualPeer::ID, $pk);


		$v = BoletinConceptualPeer::doSelect($criteria, $con);

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
			$criteria->add(BoletinConceptualPeer::ID, $pks, Criteria::IN);
			$objs = BoletinConceptualPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseBoletinConceptualPeer

// static code to register the map builder for this Peer with the main Propel class
if (Propel::isInit()) {
	// the MapBuilder classes register themselves with Propel during initialization
	// so we need to load them here.
	try {
		BaseBoletinConceptualPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	// even if Propel is not yet initialized, the map builder class can be registered
	// now and then it will be loaded when Propel initializes.
	require_once 'model/map/BoletinConceptualMapBuilder.php';
	Propel::registerMapBuilder('model.map.BoletinConceptualMapBuilder');
}
