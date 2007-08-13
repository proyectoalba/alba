<?php


abstract class BaseRelAnioActividadDocentePeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'rel_anio_actividad_docente';

	
	const CLASS_DEFAULT = 'lib.model.RelAnioActividadDocente';

	
	const NUM_COLUMNS = 2;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const FK_ANIO_ACTIVIDAD_ID = 'rel_anio_actividad_docente.FK_ANIO_ACTIVIDAD_ID';

	
	const FK_DOCENTE_ID = 'rel_anio_actividad_docente.FK_DOCENTE_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('FkAnioActividadId', 'FkDocenteId', ),
		BasePeer::TYPE_COLNAME => array (RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, RelAnioActividadDocentePeer::FK_DOCENTE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('fk_anio_actividad_id', 'fk_docente_id', ),
		BasePeer::TYPE_NUM => array (0, 1, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('FkAnioActividadId' => 0, 'FkDocenteId' => 1, ),
		BasePeer::TYPE_COLNAME => array (RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID => 0, RelAnioActividadDocentePeer::FK_DOCENTE_ID => 1, ),
		BasePeer::TYPE_FIELDNAME => array ('fk_anio_actividad_id' => 0, 'fk_docente_id' => 1, ),
		BasePeer::TYPE_NUM => array (0, 1, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/RelAnioActividadDocenteMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.RelAnioActividadDocenteMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = RelAnioActividadDocentePeer::getTableMap();
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
		return str_replace(RelAnioActividadDocentePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID);

		$criteria->addSelectColumn(RelAnioActividadDocentePeer::FK_DOCENTE_ID);

	}

	const COUNT = 'COUNT(rel_anio_actividad_docente.FK_ANIO_ACTIVIDAD_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT rel_anio_actividad_docente.FK_ANIO_ACTIVIDAD_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelAnioActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelAnioActividadDocentePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RelAnioActividadDocentePeer::doSelectRS($criteria, $con);
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
		$objects = RelAnioActividadDocentePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return RelAnioActividadDocentePeer::populateObjects(RelAnioActividadDocentePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			RelAnioActividadDocentePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = RelAnioActividadDocentePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinRelAnioActividad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelAnioActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelAnioActividadDocentePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, RelAnioActividadPeer::ID);

		$rs = RelAnioActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinDocente(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelAnioActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelAnioActividadDocentePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelAnioActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$rs = RelAnioActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinRelAnioActividad(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelAnioActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelAnioActividadDocentePeer::NUM_COLUMNS - RelAnioActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		RelAnioActividadPeer::addSelectColumns($c);

		$c->addJoin(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, RelAnioActividadPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelAnioActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = RelAnioActividadPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getRelAnioActividad(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRelAnioActividadDocente($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRelAnioActividadDocentes();
				$obj2->addRelAnioActividadDocente($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinDocente(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelAnioActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelAnioActividadDocentePeer::NUM_COLUMNS - RelAnioActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DocentePeer::addSelectColumns($c);

		$c->addJoin(RelAnioActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelAnioActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDocente(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRelAnioActividadDocente($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRelAnioActividadDocentes();
				$obj2->addRelAnioActividadDocente($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelAnioActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelAnioActividadDocentePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, RelAnioActividadPeer::ID);

		$criteria->addJoin(RelAnioActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$rs = RelAnioActividadDocentePeer::doSelectRS($criteria, $con);
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

		RelAnioActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelAnioActividadDocentePeer::NUM_COLUMNS - RelAnioActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		RelAnioActividadPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + RelAnioActividadPeer::NUM_COLUMNS;

		DocentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + DocentePeer::NUM_COLUMNS;

		$c->addJoin(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, RelAnioActividadPeer::ID);

		$c->addJoin(RelAnioActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelAnioActividadDocentePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = RelAnioActividadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getRelAnioActividad(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelAnioActividadDocente($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initRelAnioActividadDocentes();
				$obj2->addRelAnioActividadDocente($obj1);
			}


					
			$omClass = DocentePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getDocente(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRelAnioActividadDocente($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initRelAnioActividadDocentes();
				$obj3->addRelAnioActividadDocente($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptRelAnioActividad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelAnioActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelAnioActividadDocentePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelAnioActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$rs = RelAnioActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptDocente(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelAnioActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelAnioActividadDocentePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, RelAnioActividadPeer::ID);

		$rs = RelAnioActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptRelAnioActividad(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelAnioActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelAnioActividadDocentePeer::NUM_COLUMNS - RelAnioActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DocentePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DocentePeer::NUM_COLUMNS;

		$c->addJoin(RelAnioActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelAnioActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DocentePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDocente(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelAnioActividadDocente($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRelAnioActividadDocentes();
				$obj2->addRelAnioActividadDocente($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptDocente(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelAnioActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelAnioActividadDocentePeer::NUM_COLUMNS - RelAnioActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		RelAnioActividadPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + RelAnioActividadPeer::NUM_COLUMNS;

		$c->addJoin(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, RelAnioActividadPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelAnioActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = RelAnioActividadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getRelAnioActividad(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelAnioActividadDocente($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRelAnioActividadDocentes();
				$obj2->addRelAnioActividadDocente($obj1);
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
		return RelAnioActividadDocentePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID);
			$selectCriteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $criteria->remove(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID), $comparison);

			$comparison = $criteria->getComparison(RelAnioActividadDocentePeer::FK_DOCENTE_ID);
			$selectCriteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $criteria->remove(RelAnioActividadDocentePeer::FK_DOCENTE_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(RelAnioActividadDocentePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof RelAnioActividadDocente) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
												if(count($values) == count($values, COUNT_RECURSIVE))
			{
								$values = array($values);
			}
			$vals = array();
			foreach($values as $value)
			{

				$vals[0][] = $value[0];
				$vals[1][] = $value[1];
			}

			$criteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $vals[0], Criteria::IN);
			$criteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $vals[1], Criteria::IN);
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

	
	public static function doValidate(RelAnioActividadDocente $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RelAnioActividadDocentePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RelAnioActividadDocentePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RelAnioActividadDocentePeer::DATABASE_NAME, RelAnioActividadDocentePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RelAnioActividadDocentePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK( $fk_anio_actividad_id, $fk_docente_id, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $fk_anio_actividad_id);
		$criteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $fk_docente_id);
		$v = RelAnioActividadDocentePeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BaseRelAnioActividadDocentePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/RelAnioActividadDocenteMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.RelAnioActividadDocenteMapBuilder');
}
