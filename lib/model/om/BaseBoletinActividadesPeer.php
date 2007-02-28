<?php


abstract class BaseBoletinActividadesPeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'boletin_actividades';

	
	const CLASS_DEFAULT = 'lib.model.BoletinActividades';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'boletin_actividades.ID';

	
	const FK_ESCALANOTA_ID = 'boletin_actividades.FK_ESCALANOTA_ID';

	
	const FK_ALUMNO_ID = 'boletin_actividades.FK_ALUMNO_ID';

	
	const FK_ACTIVIDAD_ID = 'boletin_actividades.FK_ACTIVIDAD_ID';

	
	const FK_PERIODO_ID = 'boletin_actividades.FK_PERIODO_ID';

	
	const OBSERVACION = 'boletin_actividades.OBSERVACION';

	
	const FECHA = 'boletin_actividades.FECHA';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkEscalanotaId', 'FkAlumnoId', 'FkActividadId', 'FkPeriodoId', 'Observacion', 'Fecha', ),
		BasePeer::TYPE_COLNAME => array (BoletinActividadesPeer::ID, BoletinActividadesPeer::FK_ESCALANOTA_ID, BoletinActividadesPeer::FK_ALUMNO_ID, BoletinActividadesPeer::FK_ACTIVIDAD_ID, BoletinActividadesPeer::FK_PERIODO_ID, BoletinActividadesPeer::OBSERVACION, BoletinActividadesPeer::FECHA, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_escalanota_id', 'fk_alumno_id', 'fk_actividad_id', 'fk_periodo_id', 'observacion', 'fecha', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkEscalanotaId' => 1, 'FkAlumnoId' => 2, 'FkActividadId' => 3, 'FkPeriodoId' => 4, 'Observacion' => 5, 'Fecha' => 6, ),
		BasePeer::TYPE_COLNAME => array (BoletinActividadesPeer::ID => 0, BoletinActividadesPeer::FK_ESCALANOTA_ID => 1, BoletinActividadesPeer::FK_ALUMNO_ID => 2, BoletinActividadesPeer::FK_ACTIVIDAD_ID => 3, BoletinActividadesPeer::FK_PERIODO_ID => 4, BoletinActividadesPeer::OBSERVACION => 5, BoletinActividadesPeer::FECHA => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_escalanota_id' => 1, 'fk_alumno_id' => 2, 'fk_actividad_id' => 3, 'fk_periodo_id' => 4, 'observacion' => 5, 'fecha' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BoletinActividadesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BoletinActividadesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BoletinActividadesPeer::getTableMap();
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
		return str_replace(BoletinActividadesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BoletinActividadesPeer::ID);

		$criteria->addSelectColumn(BoletinActividadesPeer::FK_ESCALANOTA_ID);

		$criteria->addSelectColumn(BoletinActividadesPeer::FK_ALUMNO_ID);

		$criteria->addSelectColumn(BoletinActividadesPeer::FK_ACTIVIDAD_ID);

		$criteria->addSelectColumn(BoletinActividadesPeer::FK_PERIODO_ID);

		$criteria->addSelectColumn(BoletinActividadesPeer::OBSERVACION);

		$criteria->addSelectColumn(BoletinActividadesPeer::FECHA);

	}

	const COUNT = 'COUNT(boletin_actividades.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT boletin_actividades.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BoletinActividadesPeer::doSelectRS($criteria, $con);
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
		$objects = BoletinActividadesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BoletinActividadesPeer::populateObjects(BoletinActividadesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BoletinActividadesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BoletinActividadesPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinEscalanota(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinActividadesPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$rs = BoletinActividadesPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinActividadesPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$rs = BoletinActividadesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinActividad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinActividadesPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$rs = BoletinActividadesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinPeriodo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinActividadesPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BoletinActividadesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinEscalanota(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BoletinActividadesPeer::addSelectColumns($c);
		$startcol = (BoletinActividadesPeer::NUM_COLUMNS - BoletinActividadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EscalanotaPeer::addSelectColumns($c);

		$c->addJoin(BoletinActividadesPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinActividadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EscalanotaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEscalanota(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addBoletinActividades($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBoletinActividadess();
				$obj2->addBoletinActividades($obj1); 			}
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

		BoletinActividadesPeer::addSelectColumns($c);
		$startcol = (BoletinActividadesPeer::NUM_COLUMNS - BoletinActividadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AlumnoPeer::addSelectColumns($c);

		$c->addJoin(BoletinActividadesPeer::FK_ALUMNO_ID, AlumnoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinActividadesPeer::getOMClass();

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
										$temp_obj2->addBoletinActividades($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBoletinActividadess();
				$obj2->addBoletinActividades($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinActividad(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BoletinActividadesPeer::addSelectColumns($c);
		$startcol = (BoletinActividadesPeer::NUM_COLUMNS - BoletinActividadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ActividadPeer::addSelectColumns($c);

		$c->addJoin(BoletinActividadesPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinActividadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ActividadPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getActividad(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addBoletinActividades($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBoletinActividadess();
				$obj2->addBoletinActividades($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinPeriodo(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BoletinActividadesPeer::addSelectColumns($c);
		$startcol = (BoletinActividadesPeer::NUM_COLUMNS - BoletinActividadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PeriodoPeer::addSelectColumns($c);

		$c->addJoin(BoletinActividadesPeer::FK_PERIODO_ID, PeriodoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinActividadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PeriodoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getPeriodo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addBoletinActividades($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBoletinActividadess();
				$obj2->addBoletinActividades($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinActividadesPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$criteria->addJoin(BoletinActividadesPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(BoletinActividadesPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$criteria->addJoin(BoletinActividadesPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BoletinActividadesPeer::doSelectRS($criteria, $con);
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

		BoletinActividadesPeer::addSelectColumns($c);
		$startcol2 = (BoletinActividadesPeer::NUM_COLUMNS - BoletinActividadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EscalanotaPeer::NUM_COLUMNS;

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AlumnoPeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ActividadPeer::NUM_COLUMNS;

		PeriodoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + PeriodoPeer::NUM_COLUMNS;

		$c->addJoin(BoletinActividadesPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$c->addJoin(BoletinActividadesPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(BoletinActividadesPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$c->addJoin(BoletinActividadesPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = BoletinActividadesPeer::getOMClass();

			
			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				
					
			$omClass = EscalanotaPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEscalanota(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBoletinActividades($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj2->initBoletinActividadess();
				$obj2->addBoletinActividades($obj1);
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
					$temp_obj3->addBoletinActividades($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj3->initBoletinActividadess();
				$obj3->addBoletinActividades($obj1);
			}

				
					
			$omClass = ActividadPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getActividad(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBoletinActividades($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj4->initBoletinActividadess();
				$obj4->addBoletinActividades($obj1);
			}

				
					
			$omClass = PeriodoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getPeriodo(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addBoletinActividades($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj5->initBoletinActividadess();
				$obj5->addBoletinActividades($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptEscalanota(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinActividadesPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(BoletinActividadesPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$criteria->addJoin(BoletinActividadesPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BoletinActividadesPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinActividadesPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$criteria->addJoin(BoletinActividadesPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$criteria->addJoin(BoletinActividadesPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BoletinActividadesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptActividad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinActividadesPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$criteria->addJoin(BoletinActividadesPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(BoletinActividadesPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BoletinActividadesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptPeriodo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinActividadesPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinActividadesPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$criteria->addJoin(BoletinActividadesPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(BoletinActividadesPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$rs = BoletinActividadesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptEscalanota(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BoletinActividadesPeer::addSelectColumns($c);
		$startcol2 = (BoletinActividadesPeer::NUM_COLUMNS - BoletinActividadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AlumnoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AlumnoPeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ActividadPeer::NUM_COLUMNS;

		PeriodoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PeriodoPeer::NUM_COLUMNS;

		$c->addJoin(BoletinActividadesPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(BoletinActividadesPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$c->addJoin(BoletinActividadesPeer::FK_PERIODO_ID, PeriodoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = BoletinActividadesPeer::getOMClass();

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
					$temp_obj2->addBoletinActividades($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initBoletinActividadess();
				$obj2->addBoletinActividades($obj1);
			}

			$omClass = ActividadPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getActividad(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBoletinActividades($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initBoletinActividadess();
				$obj3->addBoletinActividades($obj1);
			}

			$omClass = PeriodoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getPeriodo(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBoletinActividades($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initBoletinActividadess();
				$obj4->addBoletinActividades($obj1);
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

		BoletinActividadesPeer::addSelectColumns($c);
		$startcol2 = (BoletinActividadesPeer::NUM_COLUMNS - BoletinActividadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EscalanotaPeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ActividadPeer::NUM_COLUMNS;

		PeriodoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PeriodoPeer::NUM_COLUMNS;

		$c->addJoin(BoletinActividadesPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$c->addJoin(BoletinActividadesPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$c->addJoin(BoletinActividadesPeer::FK_PERIODO_ID, PeriodoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = BoletinActividadesPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getEscalanota(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBoletinActividades($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initBoletinActividadess();
				$obj2->addBoletinActividades($obj1);
			}

			$omClass = ActividadPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getActividad(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBoletinActividades($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initBoletinActividadess();
				$obj3->addBoletinActividades($obj1);
			}

			$omClass = PeriodoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getPeriodo(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBoletinActividades($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initBoletinActividadess();
				$obj4->addBoletinActividades($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptActividad(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BoletinActividadesPeer::addSelectColumns($c);
		$startcol2 = (BoletinActividadesPeer::NUM_COLUMNS - BoletinActividadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EscalanotaPeer::NUM_COLUMNS;

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AlumnoPeer::NUM_COLUMNS;

		PeriodoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PeriodoPeer::NUM_COLUMNS;

		$c->addJoin(BoletinActividadesPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$c->addJoin(BoletinActividadesPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(BoletinActividadesPeer::FK_PERIODO_ID, PeriodoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = BoletinActividadesPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getEscalanota(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBoletinActividades($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initBoletinActividadess();
				$obj2->addBoletinActividades($obj1);
			}

			$omClass = AlumnoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAlumno(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBoletinActividades($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initBoletinActividadess();
				$obj3->addBoletinActividades($obj1);
			}

			$omClass = PeriodoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getPeriodo(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBoletinActividades($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initBoletinActividadess();
				$obj4->addBoletinActividades($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptPeriodo(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BoletinActividadesPeer::addSelectColumns($c);
		$startcol2 = (BoletinActividadesPeer::NUM_COLUMNS - BoletinActividadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EscalanotaPeer::NUM_COLUMNS;

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AlumnoPeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ActividadPeer::NUM_COLUMNS;

		$c->addJoin(BoletinActividadesPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$c->addJoin(BoletinActividadesPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(BoletinActividadesPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = BoletinActividadesPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getEscalanota(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBoletinActividades($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initBoletinActividadess();
				$obj2->addBoletinActividades($obj1);
			}

			$omClass = AlumnoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAlumno(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBoletinActividades($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initBoletinActividadess();
				$obj3->addBoletinActividades($obj1);
			}

			$omClass = ActividadPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getActividad(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBoletinActividades($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initBoletinActividadess();
				$obj4->addBoletinActividades($obj1);
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
		return BoletinActividadesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BoletinActividadesPeer::ID); 

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
			$comparison = $criteria->getComparison(BoletinActividadesPeer::ID);
			$selectCriteria->add(BoletinActividadesPeer::ID, $criteria->remove(BoletinActividadesPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BoletinActividadesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BoletinActividadesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof BoletinActividades) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BoletinActividadesPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(BoletinActividades $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BoletinActividadesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BoletinActividadesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BoletinActividadesPeer::DATABASE_NAME, BoletinActividadesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BoletinActividadesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BoletinActividadesPeer::DATABASE_NAME);

		$criteria->add(BoletinActividadesPeer::ID, $pk);


		$v = BoletinActividadesPeer::doSelect($criteria, $con);

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
			$criteria->add(BoletinActividadesPeer::ID, $pks, Criteria::IN);
			$objs = BoletinActividadesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBoletinActividadesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BoletinActividadesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BoletinActividadesMapBuilder');
}
