<?php


abstract class BaseEscalanotaPeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'escalanota';

	
	const CLASS_DEFAULT = 'lib.model.Escalanota';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'escalanota.ID';

	
	const FK_ESTABLECIMIENTO_ID = 'escalanota.FK_ESTABLECIMIENTO_ID';

	
	const NOMBRE = 'escalanota.NOMBRE';

	
	const DESCRIPCION = 'escalanota.DESCRIPCION';

	
	const ORDEN = 'escalanota.ORDEN';

	
	const APROBADO = 'escalanota.APROBADO';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkEstablecimientoId', 'Nombre', 'Descripcion', 'Orden', 'Aprobado', ),
		BasePeer::TYPE_COLNAME => array (EscalanotaPeer::ID, EscalanotaPeer::FK_ESTABLECIMIENTO_ID, EscalanotaPeer::NOMBRE, EscalanotaPeer::DESCRIPCION, EscalanotaPeer::ORDEN, EscalanotaPeer::APROBADO, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_establecimiento_id', 'nombre', 'descripcion', 'orden', 'aprobado', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkEstablecimientoId' => 1, 'Nombre' => 2, 'Descripcion' => 3, 'Orden' => 4, 'Aprobado' => 5, ),
		BasePeer::TYPE_COLNAME => array (EscalanotaPeer::ID => 0, EscalanotaPeer::FK_ESTABLECIMIENTO_ID => 1, EscalanotaPeer::NOMBRE => 2, EscalanotaPeer::DESCRIPCION => 3, EscalanotaPeer::ORDEN => 4, EscalanotaPeer::APROBADO => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_establecimiento_id' => 1, 'nombre' => 2, 'descripcion' => 3, 'orden' => 4, 'aprobado' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EscalanotaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EscalanotaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EscalanotaPeer::getTableMap();
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
		return str_replace(EscalanotaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EscalanotaPeer::ID);

		$criteria->addSelectColumn(EscalanotaPeer::FK_ESTABLECIMIENTO_ID);

		$criteria->addSelectColumn(EscalanotaPeer::NOMBRE);

		$criteria->addSelectColumn(EscalanotaPeer::DESCRIPCION);

		$criteria->addSelectColumn(EscalanotaPeer::ORDEN);

		$criteria->addSelectColumn(EscalanotaPeer::APROBADO);

	}

	const COUNT = 'COUNT(escalanota.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT escalanota.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EscalanotaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EscalanotaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EscalanotaPeer::doSelectRS($criteria, $con);
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
		$objects = EscalanotaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EscalanotaPeer::populateObjects(EscalanotaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EscalanotaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EscalanotaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinEstablecimiento(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EscalanotaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EscalanotaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$rs = EscalanotaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinEstablecimiento(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EscalanotaPeer::addSelectColumns($c);
		$startcol = (EscalanotaPeer::NUM_COLUMNS - EscalanotaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EstablecimientoPeer::addSelectColumns($c);

		$c->addJoin(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EscalanotaPeer::getOMClass();

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
										$temp_obj2->addEscalanota($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEscalanotas();
				$obj2->addEscalanota($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EscalanotaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EscalanotaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$rs = EscalanotaPeer::doSelectRS($criteria, $con);
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

		EscalanotaPeer::addSelectColumns($c);
		$startcol2 = (EscalanotaPeer::NUM_COLUMNS - EscalanotaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EstablecimientoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EstablecimientoPeer::NUM_COLUMNS;

		$c->addJoin(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EscalanotaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = EstablecimientoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEstablecimiento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEscalanota($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initEscalanotas();
				$obj2->addEscalanota($obj1);
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
		return EscalanotaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(EscalanotaPeer::ID); 

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
			$comparison = $criteria->getComparison(EscalanotaPeer::ID);
			$selectCriteria->add(EscalanotaPeer::ID, $criteria->remove(EscalanotaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(EscalanotaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EscalanotaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Escalanota) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EscalanotaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Escalanota $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EscalanotaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EscalanotaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EscalanotaPeer::DATABASE_NAME, EscalanotaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EscalanotaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(EscalanotaPeer::DATABASE_NAME);

		$criteria->add(EscalanotaPeer::ID, $pk);


		$v = EscalanotaPeer::doSelect($criteria, $con);

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
			$criteria->add(EscalanotaPeer::ID, $pks, Criteria::IN);
			$objs = EscalanotaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEscalanotaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EscalanotaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EscalanotaMapBuilder');
}
