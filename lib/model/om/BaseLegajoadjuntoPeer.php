<?php


abstract class BaseLegajoadjuntoPeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'legajoadjunto';

	
	const CLASS_DEFAULT = 'lib.model.Legajoadjunto';

	
	const NUM_COLUMNS = 2;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const FK_LEGAJOPEDAGOGICO_ID = 'legajoadjunto.FK_LEGAJOPEDAGOGICO_ID';

	
	const FK_ADJUNTO_ID = 'legajoadjunto.FK_ADJUNTO_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('FkLegajopedagogicoId', 'FkAdjuntoId', ),
		BasePeer::TYPE_COLNAME => array (LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, LegajoadjuntoPeer::FK_ADJUNTO_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('fk_legajopedagogico_id', 'fk_adjunto_id', ),
		BasePeer::TYPE_NUM => array (0, 1, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('FkLegajopedagogicoId' => 0, 'FkAdjuntoId' => 1, ),
		BasePeer::TYPE_COLNAME => array (LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID => 0, LegajoadjuntoPeer::FK_ADJUNTO_ID => 1, ),
		BasePeer::TYPE_FIELDNAME => array ('fk_legajopedagogico_id' => 0, 'fk_adjunto_id' => 1, ),
		BasePeer::TYPE_NUM => array (0, 1, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LegajoadjuntoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LegajoadjuntoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LegajoadjuntoPeer::getTableMap();
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
		return str_replace(LegajoadjuntoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID);

		$criteria->addSelectColumn(LegajoadjuntoPeer::FK_ADJUNTO_ID);

	}

	const COUNT = 'COUNT(*)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT *)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LegajoadjuntoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LegajoadjuntoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LegajoadjuntoPeer::doSelectRS($criteria, $con);
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
		$objects = LegajoadjuntoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LegajoadjuntoPeer::populateObjects(LegajoadjuntoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LegajoadjuntoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LegajoadjuntoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAdjunto(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LegajoadjuntoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LegajoadjuntoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LegajoadjuntoPeer::FK_ADJUNTO_ID, AdjuntoPeer::ID);

		$rs = LegajoadjuntoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLegajopedagogico(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LegajoadjuntoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LegajoadjuntoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, LegajopedagogicoPeer::ID);

		$rs = LegajoadjuntoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAdjunto(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LegajoadjuntoPeer::addSelectColumns($c);
		$startcol = (LegajoadjuntoPeer::NUM_COLUMNS - LegajoadjuntoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AdjuntoPeer::addSelectColumns($c);

		$c->addJoin(LegajoadjuntoPeer::FK_ADJUNTO_ID, AdjuntoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LegajoadjuntoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AdjuntoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAdjunto(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLegajoadjunto($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLegajoadjuntos();
				$obj2->addLegajoadjunto($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLegajopedagogico(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LegajoadjuntoPeer::addSelectColumns($c);
		$startcol = (LegajoadjuntoPeer::NUM_COLUMNS - LegajoadjuntoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LegajopedagogicoPeer::addSelectColumns($c);

		$c->addJoin(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, LegajopedagogicoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LegajoadjuntoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LegajopedagogicoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLegajopedagogico(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLegajoadjunto($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLegajoadjuntos();
				$obj2->addLegajoadjunto($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LegajoadjuntoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LegajoadjuntoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LegajoadjuntoPeer::FK_ADJUNTO_ID, AdjuntoPeer::ID);

		$criteria->addJoin(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, LegajopedagogicoPeer::ID);

		$rs = LegajoadjuntoPeer::doSelectRS($criteria, $con);
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

		LegajoadjuntoPeer::addSelectColumns($c);
		$startcol2 = (LegajoadjuntoPeer::NUM_COLUMNS - LegajoadjuntoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AdjuntoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AdjuntoPeer::NUM_COLUMNS;

		LegajopedagogicoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LegajopedagogicoPeer::NUM_COLUMNS;

		$c->addJoin(LegajoadjuntoPeer::FK_ADJUNTO_ID, AdjuntoPeer::ID);

		$c->addJoin(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, LegajopedagogicoPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LegajoadjuntoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = AdjuntoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAdjunto(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLegajoadjunto($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initLegajoadjuntos();
				$obj2->addLegajoadjunto($obj1);
			}


					
			$omClass = LegajopedagogicoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLegajopedagogico(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addLegajoadjunto($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initLegajoadjuntos();
				$obj3->addLegajoadjunto($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptAdjunto(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LegajoadjuntoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LegajoadjuntoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, LegajopedagogicoPeer::ID);

		$rs = LegajoadjuntoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptLegajopedagogico(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LegajoadjuntoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LegajoadjuntoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LegajoadjuntoPeer::FK_ADJUNTO_ID, AdjuntoPeer::ID);

		$rs = LegajoadjuntoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptAdjunto(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LegajoadjuntoPeer::addSelectColumns($c);
		$startcol2 = (LegajoadjuntoPeer::NUM_COLUMNS - LegajoadjuntoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LegajopedagogicoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LegajopedagogicoPeer::NUM_COLUMNS;

		$c->addJoin(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, LegajopedagogicoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LegajoadjuntoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LegajopedagogicoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLegajopedagogico(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLegajoadjunto($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initLegajoadjuntos();
				$obj2->addLegajoadjunto($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLegajopedagogico(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LegajoadjuntoPeer::addSelectColumns($c);
		$startcol2 = (LegajoadjuntoPeer::NUM_COLUMNS - LegajoadjuntoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AdjuntoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AdjuntoPeer::NUM_COLUMNS;

		$c->addJoin(LegajoadjuntoPeer::FK_ADJUNTO_ID, AdjuntoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LegajoadjuntoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AdjuntoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAdjunto(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLegajoadjunto($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initLegajoadjuntos();
				$obj2->addLegajoadjunto($obj1);
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
		return LegajoadjuntoPeer::CLASS_DEFAULT;
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
			$affectedRows += BasePeer::doDeleteAll(LegajoadjuntoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Legajoadjunto) {

			$criteria = $values->buildCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
												if(count($values) == count($values, COUNT_RECURSIVE))
			{
								$values = array($values);
			}
			$vals = array();
			foreach($values as $value)
			{

			}

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

	
	public static function doValidate(Legajoadjunto $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LegajoadjuntoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LegajoadjuntoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LegajoadjuntoPeer::DATABASE_NAME, LegajoadjuntoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LegajoadjuntoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLegajoadjuntoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LegajoadjuntoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LegajoadjuntoMapBuilder');
}
