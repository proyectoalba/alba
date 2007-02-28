<?php


abstract class BaseLocacionPeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'locacion';

	
	const CLASS_DEFAULT = 'lib.model.Locacion';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'locacion.ID';

	
	const NOMBRE = 'locacion.NOMBRE';

	
	const DESCRIPCION = 'locacion.DESCRIPCION';

	
	const DIRECCION = 'locacion.DIRECCION';

	
	const CIUDAD = 'locacion.CIUDAD';

	
	const CODIGO_POSTAL = 'locacion.CODIGO_POSTAL';

	
	const FK_PROVINCIA_ID = 'locacion.FK_PROVINCIA_ID';

	
	const FK_TIPOLOCACION_ID = 'locacion.FK_TIPOLOCACION_ID';

	
	const TELEFONO = 'locacion.TELEFONO';

	
	const FAX = 'locacion.FAX';

	
	const ENCARGADO = 'locacion.ENCARGADO';

	
	const ENCARGADO_TELEFONO = 'locacion.ENCARGADO_TELEFONO';

	
	const PRINCIPAL = 'locacion.PRINCIPAL';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nombre', 'Descripcion', 'Direccion', 'Ciudad', 'CodigoPostal', 'FkProvinciaId', 'FkTipolocacionId', 'Telefono', 'Fax', 'Encargado', 'EncargadoTelefono', 'Principal', ),
		BasePeer::TYPE_COLNAME => array (LocacionPeer::ID, LocacionPeer::NOMBRE, LocacionPeer::DESCRIPCION, LocacionPeer::DIRECCION, LocacionPeer::CIUDAD, LocacionPeer::CODIGO_POSTAL, LocacionPeer::FK_PROVINCIA_ID, LocacionPeer::FK_TIPOLOCACION_ID, LocacionPeer::TELEFONO, LocacionPeer::FAX, LocacionPeer::ENCARGADO, LocacionPeer::ENCARGADO_TELEFONO, LocacionPeer::PRINCIPAL, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nombre', 'descripcion', 'direccion', 'ciudad', 'codigo_postal', 'fk_provincia_id', 'fk_tipolocacion_id', 'telefono', 'fax', 'encargado', 'encargado_telefono', 'principal', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nombre' => 1, 'Descripcion' => 2, 'Direccion' => 3, 'Ciudad' => 4, 'CodigoPostal' => 5, 'FkProvinciaId' => 6, 'FkTipolocacionId' => 7, 'Telefono' => 8, 'Fax' => 9, 'Encargado' => 10, 'EncargadoTelefono' => 11, 'Principal' => 12, ),
		BasePeer::TYPE_COLNAME => array (LocacionPeer::ID => 0, LocacionPeer::NOMBRE => 1, LocacionPeer::DESCRIPCION => 2, LocacionPeer::DIRECCION => 3, LocacionPeer::CIUDAD => 4, LocacionPeer::CODIGO_POSTAL => 5, LocacionPeer::FK_PROVINCIA_ID => 6, LocacionPeer::FK_TIPOLOCACION_ID => 7, LocacionPeer::TELEFONO => 8, LocacionPeer::FAX => 9, LocacionPeer::ENCARGADO => 10, LocacionPeer::ENCARGADO_TELEFONO => 11, LocacionPeer::PRINCIPAL => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nombre' => 1, 'descripcion' => 2, 'direccion' => 3, 'ciudad' => 4, 'codigo_postal' => 5, 'fk_provincia_id' => 6, 'fk_tipolocacion_id' => 7, 'telefono' => 8, 'fax' => 9, 'encargado' => 10, 'encargado_telefono' => 11, 'principal' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LocacionMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LocacionMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LocacionPeer::getTableMap();
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
		return str_replace(LocacionPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LocacionPeer::ID);

		$criteria->addSelectColumn(LocacionPeer::NOMBRE);

		$criteria->addSelectColumn(LocacionPeer::DESCRIPCION);

		$criteria->addSelectColumn(LocacionPeer::DIRECCION);

		$criteria->addSelectColumn(LocacionPeer::CIUDAD);

		$criteria->addSelectColumn(LocacionPeer::CODIGO_POSTAL);

		$criteria->addSelectColumn(LocacionPeer::FK_PROVINCIA_ID);

		$criteria->addSelectColumn(LocacionPeer::FK_TIPOLOCACION_ID);

		$criteria->addSelectColumn(LocacionPeer::TELEFONO);

		$criteria->addSelectColumn(LocacionPeer::FAX);

		$criteria->addSelectColumn(LocacionPeer::ENCARGADO);

		$criteria->addSelectColumn(LocacionPeer::ENCARGADO_TELEFONO);

		$criteria->addSelectColumn(LocacionPeer::PRINCIPAL);

	}

	const COUNT = 'COUNT(locacion.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT locacion.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LocacionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LocacionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LocacionPeer::doSelectRS($criteria, $con);
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
		$objects = LocacionPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LocacionPeer::populateObjects(LocacionPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LocacionPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LocacionPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinProvincia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LocacionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LocacionPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LocacionPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$rs = LocacionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTipolocacion(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LocacionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LocacionPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LocacionPeer::FK_TIPOLOCACION_ID, TipolocacionPeer::ID);

		$rs = LocacionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinProvincia(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LocacionPeer::addSelectColumns($c);
		$startcol = (LocacionPeer::NUM_COLUMNS - LocacionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProvinciaPeer::addSelectColumns($c);

		$c->addJoin(LocacionPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LocacionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProvinciaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getProvincia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLocacion($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLocacions();
				$obj2->addLocacion($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTipolocacion(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LocacionPeer::addSelectColumns($c);
		$startcol = (LocacionPeer::NUM_COLUMNS - LocacionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TipolocacionPeer::addSelectColumns($c);

		$c->addJoin(LocacionPeer::FK_TIPOLOCACION_ID, TipolocacionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LocacionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipolocacionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTipolocacion(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLocacion($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLocacions();
				$obj2->addLocacion($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LocacionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LocacionPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LocacionPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$criteria->addJoin(LocacionPeer::FK_TIPOLOCACION_ID, TipolocacionPeer::ID);

		$rs = LocacionPeer::doSelectRS($criteria, $con);
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

		LocacionPeer::addSelectColumns($c);
		$startcol2 = (LocacionPeer::NUM_COLUMNS - LocacionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProvinciaPeer::NUM_COLUMNS;

		TipolocacionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TipolocacionPeer::NUM_COLUMNS;

		$c->addJoin(LocacionPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$c->addJoin(LocacionPeer::FK_TIPOLOCACION_ID, TipolocacionPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = LocacionPeer::getOMClass();

			
			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				
					
			$omClass = ProvinciaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProvincia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLocacion($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj2->initLocacions();
				$obj2->addLocacion($obj1);
			}

				
					
			$omClass = TipolocacionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTipolocacion(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addLocacion($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj3->initLocacions();
				$obj3->addLocacion($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptProvincia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LocacionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LocacionPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LocacionPeer::FK_TIPOLOCACION_ID, TipolocacionPeer::ID);

		$rs = LocacionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptTipolocacion(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LocacionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LocacionPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LocacionPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$rs = LocacionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptProvincia(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LocacionPeer::addSelectColumns($c);
		$startcol2 = (LocacionPeer::NUM_COLUMNS - LocacionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TipolocacionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipolocacionPeer::NUM_COLUMNS;

		$c->addJoin(LocacionPeer::FK_TIPOLOCACION_ID, TipolocacionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = LocacionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = TipolocacionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipolocacion(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLocacion($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initLocacions();
				$obj2->addLocacion($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTipolocacion(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LocacionPeer::addSelectColumns($c);
		$startcol2 = (LocacionPeer::NUM_COLUMNS - LocacionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProvinciaPeer::NUM_COLUMNS;

		$c->addJoin(LocacionPeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = LocacionPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getProvincia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLocacion($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initLocacions();
				$obj2->addLocacion($obj1);
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
		return LocacionPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LocacionPeer::ID); 

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
			$comparison = $criteria->getComparison(LocacionPeer::ID);
			$selectCriteria->add(LocacionPeer::ID, $criteria->remove(LocacionPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LocacionPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Locacion) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LocacionPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Locacion $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LocacionPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LocacionPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LocacionPeer::DATABASE_NAME, LocacionPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LocacionPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LocacionPeer::DATABASE_NAME);

		$criteria->add(LocacionPeer::ID, $pk);


		$v = LocacionPeer::doSelect($criteria, $con);

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
			$criteria->add(LocacionPeer::ID, $pks, Criteria::IN);
			$objs = LocacionPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLocacionPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LocacionMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LocacionMapBuilder');
}
