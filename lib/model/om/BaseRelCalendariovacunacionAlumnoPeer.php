<?php


abstract class BaseRelCalendariovacunacionAlumnoPeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'rel_calendariovacunacion_alumno';

	
	const CLASS_DEFAULT = 'lib.model.RelCalendariovacunacionAlumno';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'rel_calendariovacunacion_alumno.ID';

	
	const FK_ALUMNO_ID = 'rel_calendariovacunacion_alumno.FK_ALUMNO_ID';

	
	const FK_CALENDARIOVACUNACION_ID = 'rel_calendariovacunacion_alumno.FK_CALENDARIOVACUNACION_ID';

	
	const OBSERVACION = 'rel_calendariovacunacion_alumno.OBSERVACION';

	
	const COMPROBANTE = 'rel_calendariovacunacion_alumno.COMPROBANTE';

	
	const FECHA = 'rel_calendariovacunacion_alumno.FECHA';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkAlumnoId', 'FkCalendariovacunacionId', 'Observacion', 'Comprobante', 'Fecha', ),
		BasePeer::TYPE_COLNAME => array (RelCalendariovacunacionAlumnoPeer::ID, RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, RelCalendariovacunacionAlumnoPeer::OBSERVACION, RelCalendariovacunacionAlumnoPeer::COMPROBANTE, RelCalendariovacunacionAlumnoPeer::FECHA, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_alumno_id', 'fk_calendariovacunacion_id', 'observacion', 'comprobante', 'fecha', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkAlumnoId' => 1, 'FkCalendariovacunacionId' => 2, 'Observacion' => 3, 'Comprobante' => 4, 'Fecha' => 5, ),
		BasePeer::TYPE_COLNAME => array (RelCalendariovacunacionAlumnoPeer::ID => 0, RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID => 1, RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID => 2, RelCalendariovacunacionAlumnoPeer::OBSERVACION => 3, RelCalendariovacunacionAlumnoPeer::COMPROBANTE => 4, RelCalendariovacunacionAlumnoPeer::FECHA => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_alumno_id' => 1, 'fk_calendariovacunacion_id' => 2, 'observacion' => 3, 'comprobante' => 4, 'fecha' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/RelCalendariovacunacionAlumnoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.RelCalendariovacunacionAlumnoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = RelCalendariovacunacionAlumnoPeer::getTableMap();
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
		return str_replace(RelCalendariovacunacionAlumnoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::ID);

		$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID);

		$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID);

		$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::OBSERVACION);

		$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::COMPROBANTE);

		$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::FECHA);

	}

	const COUNT = 'COUNT(rel_calendariovacunacion_alumno.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT rel_calendariovacunacion_alumno.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RelCalendariovacunacionAlumnoPeer::doSelectRS($criteria, $con);
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
		$objects = RelCalendariovacunacionAlumnoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return RelCalendariovacunacionAlumnoPeer::populateObjects(RelCalendariovacunacionAlumnoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = RelCalendariovacunacionAlumnoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCalendariovacunacion(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, CalendariovacunacionPeer::ID);

		$rs = RelCalendariovacunacionAlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAlumno(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$rs = RelCalendariovacunacionAlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCalendariovacunacion(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelCalendariovacunacionAlumnoPeer::addSelectColumns($c);
		$startcol = (RelCalendariovacunacionAlumnoPeer::NUM_COLUMNS - RelCalendariovacunacionAlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CalendariovacunacionPeer::addSelectColumns($c);

		$c->addJoin(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, CalendariovacunacionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelCalendariovacunacionAlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CalendariovacunacionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCalendariovacunacion(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRelCalendariovacunacionAlumno($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRelCalendariovacunacionAlumnos();
				$obj2->addRelCalendariovacunacionAlumno($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAlumno(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelCalendariovacunacionAlumnoPeer::addSelectColumns($c);
		$startcol = (RelCalendariovacunacionAlumnoPeer::NUM_COLUMNS - RelCalendariovacunacionAlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AlumnoPeer::addSelectColumns($c);

		$c->addJoin(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, AlumnoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelCalendariovacunacionAlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAlumno(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRelCalendariovacunacionAlumno($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRelCalendariovacunacionAlumnos();
				$obj2->addRelCalendariovacunacionAlumno($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, CalendariovacunacionPeer::ID);

		$criteria->addJoin(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$rs = RelCalendariovacunacionAlumnoPeer::doSelectRS($criteria, $con);
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

		RelCalendariovacunacionAlumnoPeer::addSelectColumns($c);
		$startcol2 = (RelCalendariovacunacionAlumnoPeer::NUM_COLUMNS - RelCalendariovacunacionAlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CalendariovacunacionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CalendariovacunacionPeer::NUM_COLUMNS;

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AlumnoPeer::NUM_COLUMNS;

		$c->addJoin(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, CalendariovacunacionPeer::ID);

		$c->addJoin(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelCalendariovacunacionAlumnoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CalendariovacunacionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCalendariovacunacion(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelCalendariovacunacionAlumno($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initRelCalendariovacunacionAlumnos();
				$obj2->addRelCalendariovacunacionAlumno($obj1);
			}


					
			$omClass = AlumnoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAlumno(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRelCalendariovacunacionAlumno($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initRelCalendariovacunacionAlumnos();
				$obj3->addRelCalendariovacunacionAlumno($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptCalendariovacunacion(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$rs = RelCalendariovacunacionAlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAlumno(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelCalendariovacunacionAlumnoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, CalendariovacunacionPeer::ID);

		$rs = RelCalendariovacunacionAlumnoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptCalendariovacunacion(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelCalendariovacunacionAlumnoPeer::addSelectColumns($c);
		$startcol2 = (RelCalendariovacunacionAlumnoPeer::NUM_COLUMNS - RelCalendariovacunacionAlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AlumnoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AlumnoPeer::NUM_COLUMNS;

		$c->addJoin(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, AlumnoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelCalendariovacunacionAlumnoPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getAlumno(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelCalendariovacunacionAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRelCalendariovacunacionAlumnos();
				$obj2->addRelCalendariovacunacionAlumno($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAlumno(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelCalendariovacunacionAlumnoPeer::addSelectColumns($c);
		$startcol2 = (RelCalendariovacunacionAlumnoPeer::NUM_COLUMNS - RelCalendariovacunacionAlumnoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CalendariovacunacionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CalendariovacunacionPeer::NUM_COLUMNS;

		$c->addJoin(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, CalendariovacunacionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelCalendariovacunacionAlumnoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CalendariovacunacionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCalendariovacunacion(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelCalendariovacunacionAlumno($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRelCalendariovacunacionAlumnos();
				$obj2->addRelCalendariovacunacionAlumno($obj1);
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
		return RelCalendariovacunacionAlumnoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(RelCalendariovacunacionAlumnoPeer::ID); 

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
			$comparison = $criteria->getComparison(RelCalendariovacunacionAlumnoPeer::ID);
			$selectCriteria->add(RelCalendariovacunacionAlumnoPeer::ID, $criteria->remove(RelCalendariovacunacionAlumnoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(RelCalendariovacunacionAlumnoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof RelCalendariovacunacionAlumno) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RelCalendariovacunacionAlumnoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(RelCalendariovacunacionAlumno $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RelCalendariovacunacionAlumnoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME, RelCalendariovacunacionAlumnoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RelCalendariovacunacionAlumnoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME);

		$criteria->add(RelCalendariovacunacionAlumnoPeer::ID, $pk);


		$v = RelCalendariovacunacionAlumnoPeer::doSelect($criteria, $con);

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
			$criteria->add(RelCalendariovacunacionAlumnoPeer::ID, $pks, Criteria::IN);
			$objs = RelCalendariovacunacionAlumnoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseRelCalendariovacunacionAlumnoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/RelCalendariovacunacionAlumnoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.RelCalendariovacunacionAlumnoMapBuilder');
}
