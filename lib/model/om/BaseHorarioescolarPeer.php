<?php


abstract class BaseHorarioescolarPeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'horarioescolar';

	
	const CLASS_DEFAULT = 'lib.model.Horarioescolar';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'horarioescolar.ID';

	
	const DIA = 'horarioescolar.DIA';

	
	const HORA_INICIO = 'horarioescolar.HORA_INICIO';

	
	const HORA_FIN = 'horarioescolar.HORA_FIN';

	
	const NOMBRE = 'horarioescolar.NOMBRE';

	
	const DESCRIPCION = 'horarioescolar.DESCRIPCION';

	
	const FK_ESTABLECIMIENTO_ID = 'horarioescolar.FK_ESTABLECIMIENTO_ID';

	
	const FK_TURNOS_ID = 'horarioescolar.FK_TURNOS_ID';

	
	const FK_HORARIOESCOLARTIPO_ID = 'horarioescolar.FK_HORARIOESCOLARTIPO_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Dia', 'HoraInicio', 'HoraFin', 'Nombre', 'Descripcion', 'FkEstablecimientoId', 'FkTurnosId', 'FkHorarioescolartipoId', ),
		BasePeer::TYPE_COLNAME => array (HorarioescolarPeer::ID, HorarioescolarPeer::DIA, HorarioescolarPeer::HORA_INICIO, HorarioescolarPeer::HORA_FIN, HorarioescolarPeer::NOMBRE, HorarioescolarPeer::DESCRIPCION, HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, HorarioescolarPeer::FK_TURNOS_ID, HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'dia', 'hora_inicio', 'hora_fin', 'nombre', 'descripcion', 'fk_establecimiento_id', 'fk_turnos_id', 'fk_horarioescolartipo_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Dia' => 1, 'HoraInicio' => 2, 'HoraFin' => 3, 'Nombre' => 4, 'Descripcion' => 5, 'FkEstablecimientoId' => 6, 'FkTurnosId' => 7, 'FkHorarioescolartipoId' => 8, ),
		BasePeer::TYPE_COLNAME => array (HorarioescolarPeer::ID => 0, HorarioescolarPeer::DIA => 1, HorarioescolarPeer::HORA_INICIO => 2, HorarioescolarPeer::HORA_FIN => 3, HorarioescolarPeer::NOMBRE => 4, HorarioescolarPeer::DESCRIPCION => 5, HorarioescolarPeer::FK_ESTABLECIMIENTO_ID => 6, HorarioescolarPeer::FK_TURNOS_ID => 7, HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'dia' => 1, 'hora_inicio' => 2, 'hora_fin' => 3, 'nombre' => 4, 'descripcion' => 5, 'fk_establecimiento_id' => 6, 'fk_turnos_id' => 7, 'fk_horarioescolartipo_id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/HorarioescolarMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.HorarioescolarMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HorarioescolarPeer::getTableMap();
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
		return str_replace(HorarioescolarPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HorarioescolarPeer::ID);

		$criteria->addSelectColumn(HorarioescolarPeer::DIA);

		$criteria->addSelectColumn(HorarioescolarPeer::HORA_INICIO);

		$criteria->addSelectColumn(HorarioescolarPeer::HORA_FIN);

		$criteria->addSelectColumn(HorarioescolarPeer::NOMBRE);

		$criteria->addSelectColumn(HorarioescolarPeer::DESCRIPCION);

		$criteria->addSelectColumn(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID);

		$criteria->addSelectColumn(HorarioescolarPeer::FK_TURNOS_ID);

		$criteria->addSelectColumn(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID);

	}

	const COUNT = 'COUNT(horarioescolar.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT horarioescolar.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HorarioescolarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HorarioescolarPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HorarioescolarPeer::doSelectRS($criteria, $con);
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
		$objects = HorarioescolarPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HorarioescolarPeer::populateObjects(HorarioescolarPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HorarioescolarPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HorarioescolarPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinHorarioescolartipo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HorarioescolarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HorarioescolarPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, HorarioescolartipoPeer::ID);

		$rs = HorarioescolarPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinEstablecimiento(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HorarioescolarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HorarioescolarPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$rs = HorarioescolarPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTurnos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HorarioescolarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HorarioescolarPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HorarioescolarPeer::FK_TURNOS_ID, TurnosPeer::ID);

		$rs = HorarioescolarPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinHorarioescolartipo(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HorarioescolarPeer::addSelectColumns($c);
		$startcol = (HorarioescolarPeer::NUM_COLUMNS - HorarioescolarPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		HorarioescolartipoPeer::addSelectColumns($c);

		$c->addJoin(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, HorarioescolartipoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HorarioescolarPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = HorarioescolartipoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getHorarioescolartipo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addHorarioescolar($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initHorarioescolars();
				$obj2->addHorarioescolar($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinEstablecimiento(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HorarioescolarPeer::addSelectColumns($c);
		$startcol = (HorarioescolarPeer::NUM_COLUMNS - HorarioescolarPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EstablecimientoPeer::addSelectColumns($c);

		$c->addJoin(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HorarioescolarPeer::getOMClass();

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
										$temp_obj2->addHorarioescolar($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initHorarioescolars();
				$obj2->addHorarioescolar($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTurnos(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HorarioescolarPeer::addSelectColumns($c);
		$startcol = (HorarioescolarPeer::NUM_COLUMNS - HorarioescolarPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TurnosPeer::addSelectColumns($c);

		$c->addJoin(HorarioescolarPeer::FK_TURNOS_ID, TurnosPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HorarioescolarPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TurnosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTurnos(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addHorarioescolar($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initHorarioescolars();
				$obj2->addHorarioescolar($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HorarioescolarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HorarioescolarPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, HorarioescolartipoPeer::ID);

		$criteria->addJoin(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$criteria->addJoin(HorarioescolarPeer::FK_TURNOS_ID, TurnosPeer::ID);

		$rs = HorarioescolarPeer::doSelectRS($criteria, $con);
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

		HorarioescolarPeer::addSelectColumns($c);
		$startcol2 = (HorarioescolarPeer::NUM_COLUMNS - HorarioescolarPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		HorarioescolartipoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + HorarioescolartipoPeer::NUM_COLUMNS;

		EstablecimientoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EstablecimientoPeer::NUM_COLUMNS;

		TurnosPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + TurnosPeer::NUM_COLUMNS;

		$c->addJoin(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, HorarioescolartipoPeer::ID);

		$c->addJoin(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$c->addJoin(HorarioescolarPeer::FK_TURNOS_ID, TurnosPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = HorarioescolarPeer::getOMClass();

			
			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				
					
			$omClass = HorarioescolartipoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getHorarioescolartipo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addHorarioescolar($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj2->initHorarioescolars();
				$obj2->addHorarioescolar($obj1);
			}

				
					
			$omClass = EstablecimientoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEstablecimiento(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addHorarioescolar($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj3->initHorarioescolars();
				$obj3->addHorarioescolar($obj1);
			}

				
					
			$omClass = TurnosPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getTurnos(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addHorarioescolar($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj4->initHorarioescolars();
				$obj4->addHorarioescolar($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptHorarioescolartipo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HorarioescolarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HorarioescolarPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$criteria->addJoin(HorarioescolarPeer::FK_TURNOS_ID, TurnosPeer::ID);

		$rs = HorarioescolarPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptEstablecimiento(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HorarioescolarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HorarioescolarPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, HorarioescolartipoPeer::ID);

		$criteria->addJoin(HorarioescolarPeer::FK_TURNOS_ID, TurnosPeer::ID);

		$rs = HorarioescolarPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptTurnos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HorarioescolarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HorarioescolarPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, HorarioescolartipoPeer::ID);

		$criteria->addJoin(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$rs = HorarioescolarPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptHorarioescolartipo(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HorarioescolarPeer::addSelectColumns($c);
		$startcol2 = (HorarioescolarPeer::NUM_COLUMNS - HorarioescolarPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EstablecimientoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EstablecimientoPeer::NUM_COLUMNS;

		TurnosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TurnosPeer::NUM_COLUMNS;

		$c->addJoin(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$c->addJoin(HorarioescolarPeer::FK_TURNOS_ID, TurnosPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = HorarioescolarPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = EstablecimientoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEstablecimiento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addHorarioescolar($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initHorarioescolars();
				$obj2->addHorarioescolar($obj1);
			}

			$omClass = TurnosPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTurnos(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addHorarioescolar($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initHorarioescolars();
				$obj3->addHorarioescolar($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptEstablecimiento(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HorarioescolarPeer::addSelectColumns($c);
		$startcol2 = (HorarioescolarPeer::NUM_COLUMNS - HorarioescolarPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		HorarioescolartipoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + HorarioescolartipoPeer::NUM_COLUMNS;

		TurnosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TurnosPeer::NUM_COLUMNS;

		$c->addJoin(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, HorarioescolartipoPeer::ID);

		$c->addJoin(HorarioescolarPeer::FK_TURNOS_ID, TurnosPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = HorarioescolarPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = HorarioescolartipoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getHorarioescolartipo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addHorarioescolar($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initHorarioescolars();
				$obj2->addHorarioescolar($obj1);
			}

			$omClass = TurnosPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTurnos(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addHorarioescolar($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initHorarioescolars();
				$obj3->addHorarioescolar($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTurnos(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HorarioescolarPeer::addSelectColumns($c);
		$startcol2 = (HorarioescolarPeer::NUM_COLUMNS - HorarioescolarPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		HorarioescolartipoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + HorarioescolartipoPeer::NUM_COLUMNS;

		EstablecimientoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EstablecimientoPeer::NUM_COLUMNS;

		$c->addJoin(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, HorarioescolartipoPeer::ID);

		$c->addJoin(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = HorarioescolarPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = HorarioescolartipoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getHorarioescolartipo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addHorarioescolar($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initHorarioescolars();
				$obj2->addHorarioescolar($obj1);
			}

			$omClass = EstablecimientoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEstablecimiento(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addHorarioescolar($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initHorarioescolars();
				$obj3->addHorarioescolar($obj1);
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
		return HorarioescolarPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HorarioescolarPeer::ID); 

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
			$comparison = $criteria->getComparison(HorarioescolarPeer::ID);
			$selectCriteria->add(HorarioescolarPeer::ID, $criteria->remove(HorarioescolarPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HorarioescolarPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Horarioescolar) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HorarioescolarPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Horarioescolar $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HorarioescolarPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HorarioescolarPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HorarioescolarPeer::DATABASE_NAME, HorarioescolarPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HorarioescolarPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HorarioescolarPeer::DATABASE_NAME);

		$criteria->add(HorarioescolarPeer::ID, $pk);


		$v = HorarioescolarPeer::doSelect($criteria, $con);

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
			$criteria->add(HorarioescolarPeer::ID, $pks, Criteria::IN);
			$objs = HorarioescolarPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHorarioescolarPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/HorarioescolarMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.HorarioescolarMapBuilder');
}
