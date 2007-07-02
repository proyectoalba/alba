<?php


abstract class BaseEspacioPeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'espacio';

	
	const CLASS_DEFAULT = 'lib.model.Espacio';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'espacio.ID';

	
	const NOMBRE = 'espacio.NOMBRE';

	
	const M2 = 'espacio.M2';

	
	const CAPACIDAD = 'espacio.CAPACIDAD';

	
	const DESCRIPCION = 'espacio.DESCRIPCION';

	
	const ESTADO = 'espacio.ESTADO';

	
	const FK_TIPOESPACIO_ID = 'espacio.FK_TIPOESPACIO_ID';

	
	const FK_LOCACION_ID = 'espacio.FK_LOCACION_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nombre', 'M2', 'Capacidad', 'Descripcion', 'Estado', 'FkTipoespacioId', 'FkLocacionId', ),
		BasePeer::TYPE_COLNAME => array (EspacioPeer::ID, EspacioPeer::NOMBRE, EspacioPeer::M2, EspacioPeer::CAPACIDAD, EspacioPeer::DESCRIPCION, EspacioPeer::ESTADO, EspacioPeer::FK_TIPOESPACIO_ID, EspacioPeer::FK_LOCACION_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nombre', 'm2', 'capacidad', 'descripcion', 'estado', 'fk_tipoespacio_id', 'fk_locacion_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nombre' => 1, 'M2' => 2, 'Capacidad' => 3, 'Descripcion' => 4, 'Estado' => 5, 'FkTipoespacioId' => 6, 'FkLocacionId' => 7, ),
		BasePeer::TYPE_COLNAME => array (EspacioPeer::ID => 0, EspacioPeer::NOMBRE => 1, EspacioPeer::M2 => 2, EspacioPeer::CAPACIDAD => 3, EspacioPeer::DESCRIPCION => 4, EspacioPeer::ESTADO => 5, EspacioPeer::FK_TIPOESPACIO_ID => 6, EspacioPeer::FK_LOCACION_ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nombre' => 1, 'm2' => 2, 'capacidad' => 3, 'descripcion' => 4, 'estado' => 5, 'fk_tipoespacio_id' => 6, 'fk_locacion_id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EspacioMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EspacioMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EspacioPeer::getTableMap();
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
		return str_replace(EspacioPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EspacioPeer::ID);

		$criteria->addSelectColumn(EspacioPeer::NOMBRE);

		$criteria->addSelectColumn(EspacioPeer::M2);

		$criteria->addSelectColumn(EspacioPeer::CAPACIDAD);

		$criteria->addSelectColumn(EspacioPeer::DESCRIPCION);

		$criteria->addSelectColumn(EspacioPeer::ESTADO);

		$criteria->addSelectColumn(EspacioPeer::FK_TIPOESPACIO_ID);

		$criteria->addSelectColumn(EspacioPeer::FK_LOCACION_ID);

	}

	const COUNT = 'COUNT(espacio.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT espacio.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EspacioPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EspacioPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EspacioPeer::doSelectRS($criteria, $con);
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
		$objects = EspacioPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EspacioPeer::populateObjects(EspacioPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EspacioPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EspacioPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinTipoespacio(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EspacioPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EspacioPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EspacioPeer::FK_TIPOESPACIO_ID, TipoespacioPeer::ID);

		$rs = EspacioPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLocacion(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EspacioPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EspacioPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EspacioPeer::FK_LOCACION_ID, LocacionPeer::ID);

		$rs = EspacioPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinTipoespacio(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EspacioPeer::addSelectColumns($c);
		$startcol = (EspacioPeer::NUM_COLUMNS - EspacioPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TipoespacioPeer::addSelectColumns($c);

		$c->addJoin(EspacioPeer::FK_TIPOESPACIO_ID, TipoespacioPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EspacioPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipoespacioPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTipoespacio(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addEspacio($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEspacios();
				$obj2->addEspacio($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLocacion(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EspacioPeer::addSelectColumns($c);
		$startcol = (EspacioPeer::NUM_COLUMNS - EspacioPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LocacionPeer::addSelectColumns($c);

		$c->addJoin(EspacioPeer::FK_LOCACION_ID, LocacionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EspacioPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LocacionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLocacion(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addEspacio($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEspacios();
				$obj2->addEspacio($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EspacioPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EspacioPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EspacioPeer::FK_TIPOESPACIO_ID, TipoespacioPeer::ID);

		$criteria->addJoin(EspacioPeer::FK_LOCACION_ID, LocacionPeer::ID);

		$rs = EspacioPeer::doSelectRS($criteria, $con);
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

		EspacioPeer::addSelectColumns($c);
		$startcol2 = (EspacioPeer::NUM_COLUMNS - EspacioPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TipoespacioPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipoespacioPeer::NUM_COLUMNS;

		LocacionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LocacionPeer::NUM_COLUMNS;

		$c->addJoin(EspacioPeer::FK_TIPOESPACIO_ID, TipoespacioPeer::ID);

		$c->addJoin(EspacioPeer::FK_LOCACION_ID, LocacionPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EspacioPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = TipoespacioPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipoespacio(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEspacio($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initEspacios();
				$obj2->addEspacio($obj1);
			}


					
			$omClass = LocacionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLocacion(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEspacio($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initEspacios();
				$obj3->addEspacio($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptTipoespacio(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EspacioPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EspacioPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EspacioPeer::FK_LOCACION_ID, LocacionPeer::ID);

		$rs = EspacioPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptLocacion(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EspacioPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EspacioPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EspacioPeer::FK_TIPOESPACIO_ID, TipoespacioPeer::ID);

		$rs = EspacioPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptTipoespacio(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EspacioPeer::addSelectColumns($c);
		$startcol2 = (EspacioPeer::NUM_COLUMNS - EspacioPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LocacionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LocacionPeer::NUM_COLUMNS;

		$c->addJoin(EspacioPeer::FK_LOCACION_ID, LocacionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EspacioPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LocacionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLocacion(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEspacio($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEspacios();
				$obj2->addEspacio($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLocacion(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EspacioPeer::addSelectColumns($c);
		$startcol2 = (EspacioPeer::NUM_COLUMNS - EspacioPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TipoespacioPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipoespacioPeer::NUM_COLUMNS;

		$c->addJoin(EspacioPeer::FK_TIPOESPACIO_ID, TipoespacioPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EspacioPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipoespacioPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipoespacio(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEspacio($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEspacios();
				$obj2->addEspacio($obj1);
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
		return EspacioPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(EspacioPeer::ID); 

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
			$comparison = $criteria->getComparison(EspacioPeer::ID);
			$selectCriteria->add(EspacioPeer::ID, $criteria->remove(EspacioPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(EspacioPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EspacioPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Espacio) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EspacioPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Espacio $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EspacioPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EspacioPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EspacioPeer::DATABASE_NAME, EspacioPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EspacioPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(EspacioPeer::DATABASE_NAME);

		$criteria->add(EspacioPeer::ID, $pk);


		$v = EspacioPeer::doSelect($criteria, $con);

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
			$criteria->add(EspacioPeer::ID, $pks, Criteria::IN);
			$objs = EspacioPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEspacioPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EspacioMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EspacioMapBuilder');
}
