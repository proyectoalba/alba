<?php


abstract class BaseExamenPeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'examen';

	
	const CLASS_DEFAULT = 'lib.model.Examen';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'examen.ID';

	
	const FK_ESCALANOTA_ID = 'examen.FK_ESCALANOTA_ID';

	
	const FK_ALUMNO_ID = 'examen.FK_ALUMNO_ID';

	
	const FK_ACTIVIDAD_ID = 'examen.FK_ACTIVIDAD_ID';

	
	const FK_PERIODO_ID = 'examen.FK_PERIODO_ID';

	
	const NOMBRE = 'examen.NOMBRE';

	
	const OBSERVACION = 'examen.OBSERVACION';

	
	const FECHA = 'examen.FECHA';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkEscalanotaId', 'FkAlumnoId', 'FkActividadId', 'FkPeriodoId', 'Nombre', 'Observacion', 'Fecha', ),
		BasePeer::TYPE_COLNAME => array (ExamenPeer::ID, ExamenPeer::FK_ESCALANOTA_ID, ExamenPeer::FK_ALUMNO_ID, ExamenPeer::FK_ACTIVIDAD_ID, ExamenPeer::FK_PERIODO_ID, ExamenPeer::NOMBRE, ExamenPeer::OBSERVACION, ExamenPeer::FECHA, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_escalanota_id', 'fk_alumno_id', 'fk_actividad_id', 'fk_periodo_id', 'nombre', 'observacion', 'fecha', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkEscalanotaId' => 1, 'FkAlumnoId' => 2, 'FkActividadId' => 3, 'FkPeriodoId' => 4, 'Nombre' => 5, 'Observacion' => 6, 'Fecha' => 7, ),
		BasePeer::TYPE_COLNAME => array (ExamenPeer::ID => 0, ExamenPeer::FK_ESCALANOTA_ID => 1, ExamenPeer::FK_ALUMNO_ID => 2, ExamenPeer::FK_ACTIVIDAD_ID => 3, ExamenPeer::FK_PERIODO_ID => 4, ExamenPeer::NOMBRE => 5, ExamenPeer::OBSERVACION => 6, ExamenPeer::FECHA => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_escalanota_id' => 1, 'fk_alumno_id' => 2, 'fk_actividad_id' => 3, 'fk_periodo_id' => 4, 'nombre' => 5, 'observacion' => 6, 'fecha' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ExamenMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ExamenMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ExamenPeer::getTableMap();
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
		return str_replace(ExamenPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ExamenPeer::ID);

		$criteria->addSelectColumn(ExamenPeer::FK_ESCALANOTA_ID);

		$criteria->addSelectColumn(ExamenPeer::FK_ALUMNO_ID);

		$criteria->addSelectColumn(ExamenPeer::FK_ACTIVIDAD_ID);

		$criteria->addSelectColumn(ExamenPeer::FK_PERIODO_ID);

		$criteria->addSelectColumn(ExamenPeer::NOMBRE);

		$criteria->addSelectColumn(ExamenPeer::OBSERVACION);

		$criteria->addSelectColumn(ExamenPeer::FECHA);

	}

	const COUNT = 'COUNT(examen.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT examen.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ExamenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExamenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ExamenPeer::doSelectRS($criteria, $con);
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
		$objects = ExamenPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ExamenPeer::populateObjects(ExamenPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ExamenPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ExamenPeer::getOMClass();
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
			$criteria->addSelectColumn(ExamenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExamenPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExamenPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$rs = ExamenPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExamenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExamenPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExamenPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$rs = ExamenPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExamenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExamenPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExamenPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$rs = ExamenPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExamenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExamenPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExamenPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = ExamenPeer::doSelectRS($criteria, $con);
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

		ExamenPeer::addSelectColumns($c);
		$startcol = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EscalanotaPeer::addSelectColumns($c);

		$c->addJoin(ExamenPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExamenPeer::getOMClass();

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
										$temp_obj2->addExamen($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initExamens();
				$obj2->addExamen($obj1); 			}
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

		ExamenPeer::addSelectColumns($c);
		$startcol = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AlumnoPeer::addSelectColumns($c);

		$c->addJoin(ExamenPeer::FK_ALUMNO_ID, AlumnoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExamenPeer::getOMClass();

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
										$temp_obj2->addExamen($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initExamens();
				$obj2->addExamen($obj1); 			}
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

		ExamenPeer::addSelectColumns($c);
		$startcol = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ActividadPeer::addSelectColumns($c);

		$c->addJoin(ExamenPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExamenPeer::getOMClass();

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
										$temp_obj2->addExamen($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initExamens();
				$obj2->addExamen($obj1); 			}
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

		ExamenPeer::addSelectColumns($c);
		$startcol = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PeriodoPeer::addSelectColumns($c);

		$c->addJoin(ExamenPeer::FK_PERIODO_ID, PeriodoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExamenPeer::getOMClass();

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
										$temp_obj2->addExamen($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initExamens();
				$obj2->addExamen($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ExamenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExamenPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExamenPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$criteria->addJoin(ExamenPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(ExamenPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$criteria->addJoin(ExamenPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = ExamenPeer::doSelectRS($criteria, $con);
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

		ExamenPeer::addSelectColumns($c);
		$startcol2 = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EscalanotaPeer::NUM_COLUMNS;

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AlumnoPeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ActividadPeer::NUM_COLUMNS;

		PeriodoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + PeriodoPeer::NUM_COLUMNS;

		$c->addJoin(ExamenPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$c->addJoin(ExamenPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(ExamenPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$c->addJoin(ExamenPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = ExamenPeer::getOMClass();

			
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
					$temp_obj2->addExamen($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj2->initExamens();
				$obj2->addExamen($obj1);
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
					$temp_obj3->addExamen($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj3->initExamens();
				$obj3->addExamen($obj1);
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
					$temp_obj4->addExamen($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj4->initExamens();
				$obj4->addExamen($obj1);
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
					$temp_obj5->addExamen($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj5->initExamens();
				$obj5->addExamen($obj1);
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
			$criteria->addSelectColumn(ExamenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExamenPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExamenPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(ExamenPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$criteria->addJoin(ExamenPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = ExamenPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExamenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExamenPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExamenPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$criteria->addJoin(ExamenPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$criteria->addJoin(ExamenPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = ExamenPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExamenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExamenPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExamenPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$criteria->addJoin(ExamenPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(ExamenPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = ExamenPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExamenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExamenPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExamenPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$criteria->addJoin(ExamenPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(ExamenPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$rs = ExamenPeer::doSelectRS($criteria, $con);
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

		ExamenPeer::addSelectColumns($c);
		$startcol2 = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AlumnoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AlumnoPeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ActividadPeer::NUM_COLUMNS;

		PeriodoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PeriodoPeer::NUM_COLUMNS;

		$c->addJoin(ExamenPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(ExamenPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$c->addJoin(ExamenPeer::FK_PERIODO_ID, PeriodoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = ExamenPeer::getOMClass();

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
					$temp_obj2->addExamen($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initExamens();
				$obj2->addExamen($obj1);
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
					$temp_obj3->addExamen($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initExamens();
				$obj3->addExamen($obj1);
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
					$temp_obj4->addExamen($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initExamens();
				$obj4->addExamen($obj1);
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

		ExamenPeer::addSelectColumns($c);
		$startcol2 = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EscalanotaPeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ActividadPeer::NUM_COLUMNS;

		PeriodoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PeriodoPeer::NUM_COLUMNS;

		$c->addJoin(ExamenPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$c->addJoin(ExamenPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$c->addJoin(ExamenPeer::FK_PERIODO_ID, PeriodoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = ExamenPeer::getOMClass();

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
					$temp_obj2->addExamen($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initExamens();
				$obj2->addExamen($obj1);
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
					$temp_obj3->addExamen($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initExamens();
				$obj3->addExamen($obj1);
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
					$temp_obj4->addExamen($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initExamens();
				$obj4->addExamen($obj1);
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

		ExamenPeer::addSelectColumns($c);
		$startcol2 = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EscalanotaPeer::NUM_COLUMNS;

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AlumnoPeer::NUM_COLUMNS;

		PeriodoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PeriodoPeer::NUM_COLUMNS;

		$c->addJoin(ExamenPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$c->addJoin(ExamenPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(ExamenPeer::FK_PERIODO_ID, PeriodoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = ExamenPeer::getOMClass();

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
					$temp_obj2->addExamen($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initExamens();
				$obj2->addExamen($obj1);
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
					$temp_obj3->addExamen($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initExamens();
				$obj3->addExamen($obj1);
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
					$temp_obj4->addExamen($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initExamens();
				$obj4->addExamen($obj1);
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

		ExamenPeer::addSelectColumns($c);
		$startcol2 = (ExamenPeer::NUM_COLUMNS - ExamenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EscalanotaPeer::NUM_COLUMNS;

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AlumnoPeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ActividadPeer::NUM_COLUMNS;

		$c->addJoin(ExamenPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$c->addJoin(ExamenPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(ExamenPeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = ExamenPeer::getOMClass();

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
					$temp_obj2->addExamen($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initExamens();
				$obj2->addExamen($obj1);
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
					$temp_obj3->addExamen($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initExamens();
				$obj3->addExamen($obj1);
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
					$temp_obj4->addExamen($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initExamens();
				$obj4->addExamen($obj1);
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
		return ExamenPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ExamenPeer::ID); 

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
			$comparison = $criteria->getComparison(ExamenPeer::ID);
			$selectCriteria->add(ExamenPeer::ID, $criteria->remove(ExamenPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ExamenPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ExamenPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Examen) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ExamenPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Examen $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ExamenPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ExamenPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ExamenPeer::DATABASE_NAME, ExamenPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ExamenPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ExamenPeer::DATABASE_NAME);

		$criteria->add(ExamenPeer::ID, $pk);


		$v = ExamenPeer::doSelect($criteria, $con);

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
			$criteria->add(ExamenPeer::ID, $pks, Criteria::IN);
			$objs = ExamenPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseExamenPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ExamenMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ExamenMapBuilder');
}
