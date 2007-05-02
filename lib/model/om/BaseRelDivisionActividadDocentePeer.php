<?php


abstract class BaseRelDivisionActividadDocentePeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'rel_division_actividad_docente';

	
	const CLASS_DEFAULT = 'lib.model.RelDivisionActividadDocente';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'rel_division_actividad_docente.ID';

	
	const FK_DIVISION_ID = 'rel_division_actividad_docente.FK_DIVISION_ID';

	
	const FK_ACTIVIDAD_ID = 'rel_division_actividad_docente.FK_ACTIVIDAD_ID';

	
	const FK_DOCENTE_ID = 'rel_division_actividad_docente.FK_DOCENTE_ID';

	
	const FK_EVENTO_ID = 'rel_division_actividad_docente.FK_EVENTO_ID';

	
	const FK_REPETICION_ID = 'rel_division_actividad_docente.FK_REPETICION_ID';

	
	const FECHA_INICIO = 'rel_division_actividad_docente.FECHA_INICIO';

	
	const FECHA_FIN = 'rel_division_actividad_docente.FECHA_FIN';

	
	const HORA_INICIO = 'rel_division_actividad_docente.HORA_INICIO';

	
	const HORA_FIN = 'rel_division_actividad_docente.HORA_FIN';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkDivisionId', 'FkActividadId', 'FkDocenteId', 'FkEventoId', 'FkRepeticionId', 'FechaInicio', 'FechaFin', 'HoraInicio', 'HoraFin', ),
		BasePeer::TYPE_COLNAME => array (RelDivisionActividadDocentePeer::ID, RelDivisionActividadDocentePeer::FK_DIVISION_ID, RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, RelDivisionActividadDocentePeer::FK_DOCENTE_ID, RelDivisionActividadDocentePeer::FK_EVENTO_ID, RelDivisionActividadDocentePeer::FK_REPETICION_ID, RelDivisionActividadDocentePeer::FECHA_INICIO, RelDivisionActividadDocentePeer::FECHA_FIN, RelDivisionActividadDocentePeer::HORA_INICIO, RelDivisionActividadDocentePeer::HORA_FIN, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_division_id', 'fk_actividad_id', 'fk_docente_id', 'fk_evento_id', 'fk_repeticion_id', 'fecha_inicio', 'fecha_fin', 'hora_inicio', 'hora_fin', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkDivisionId' => 1, 'FkActividadId' => 2, 'FkDocenteId' => 3, 'FkEventoId' => 4, 'FkRepeticionId' => 5, 'FechaInicio' => 6, 'FechaFin' => 7, 'HoraInicio' => 8, 'HoraFin' => 9, ),
		BasePeer::TYPE_COLNAME => array (RelDivisionActividadDocentePeer::ID => 0, RelDivisionActividadDocentePeer::FK_DIVISION_ID => 1, RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID => 2, RelDivisionActividadDocentePeer::FK_DOCENTE_ID => 3, RelDivisionActividadDocentePeer::FK_EVENTO_ID => 4, RelDivisionActividadDocentePeer::FK_REPETICION_ID => 5, RelDivisionActividadDocentePeer::FECHA_INICIO => 6, RelDivisionActividadDocentePeer::FECHA_FIN => 7, RelDivisionActividadDocentePeer::HORA_INICIO => 8, RelDivisionActividadDocentePeer::HORA_FIN => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_division_id' => 1, 'fk_actividad_id' => 2, 'fk_docente_id' => 3, 'fk_evento_id' => 4, 'fk_repeticion_id' => 5, 'fecha_inicio' => 6, 'fecha_fin' => 7, 'hora_inicio' => 8, 'hora_fin' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/RelDivisionActividadDocenteMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.RelDivisionActividadDocenteMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = RelDivisionActividadDocentePeer::getTableMap();
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
		return str_replace(RelDivisionActividadDocentePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FK_DIVISION_ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FK_DOCENTE_ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FK_EVENTO_ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FK_REPETICION_ID);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FECHA_INICIO);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::FECHA_FIN);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::HORA_INICIO);

		$criteria->addSelectColumn(RelDivisionActividadDocentePeer::HORA_FIN);

	}

	const COUNT = 'COUNT(rel_division_actividad_docente.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT rel_division_actividad_docente.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
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
		$objects = RelDivisionActividadDocentePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return RelDivisionActividadDocentePeer::populateObjects(RelDivisionActividadDocentePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			RelDivisionActividadDocentePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = RelDivisionActividadDocentePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinDivision(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinRepeticion(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinEvento(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_EVENTO_ID, EventoPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinDivision(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DivisionPeer::addSelectColumns($c);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DivisionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDivision(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRelDivisionActividadDocente($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1); 			}
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

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DocentePeer::addSelectColumns($c);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

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
										$temp_obj2->addRelDivisionActividadDocente($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1); 			}
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

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ActividadPeer::addSelectColumns($c);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

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
										$temp_obj2->addRelDivisionActividadDocente($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinRepeticion(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		RepeticionPeer::addSelectColumns($c);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = RepeticionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getRepeticion(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRelDivisionActividadDocente($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinEvento(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EventoPeer::addSelectColumns($c);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_EVENTO_ID, EventoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EventoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEvento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRelDivisionActividadDocente($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_EVENTO_ID, EventoPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
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

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DivisionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DivisionPeer::NUM_COLUMNS;

		DocentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + DocentePeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ActividadPeer::NUM_COLUMNS;

		RepeticionPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + RepeticionPeer::NUM_COLUMNS;

		EventoPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + EventoPeer::NUM_COLUMNS;

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_EVENTO_ID, EventoPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			
			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				
					
			$omClass = DivisionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDivision(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelDivisionActividadDocente($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1);
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
					$temp_obj3->addRelDivisionActividadDocente($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj3->initRelDivisionActividadDocentes();
				$obj3->addRelDivisionActividadDocente($obj1);
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
					$temp_obj4->addRelDivisionActividadDocente($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj4->initRelDivisionActividadDocentes();
				$obj4->addRelDivisionActividadDocente($obj1);
			}

				
					
			$omClass = RepeticionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getRepeticion(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addRelDivisionActividadDocente($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj5->initRelDivisionActividadDocentes();
				$obj5->addRelDivisionActividadDocente($obj1);
			}

				
					
			$omClass = EventoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getEvento(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addRelDivisionActividadDocente($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj6->initRelDivisionActividadDocentes();
				$obj6->addRelDivisionActividadDocente($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptDivision(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_EVENTO_ID, EventoPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_EVENTO_ID, EventoPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_EVENTO_ID, EventoPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptRepeticion(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_EVENTO_ID, EventoPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptEvento(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelDivisionActividadDocentePeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$criteria->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$rs = RelDivisionActividadDocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptDivision(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DocentePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DocentePeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ActividadPeer::NUM_COLUMNS;

		RepeticionPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + RepeticionPeer::NUM_COLUMNS;

		EventoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + EventoPeer::NUM_COLUMNS;

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_EVENTO_ID, EventoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

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
					$temp_obj2->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1);
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
					$temp_obj3->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initRelDivisionActividadDocentes();
				$obj3->addRelDivisionActividadDocente($obj1);
			}

			$omClass = RepeticionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getRepeticion(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initRelDivisionActividadDocentes();
				$obj4->addRelDivisionActividadDocente($obj1);
			}

			$omClass = EventoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getEvento(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initRelDivisionActividadDocentes();
				$obj5->addRelDivisionActividadDocente($obj1);
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

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DivisionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DivisionPeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ActividadPeer::NUM_COLUMNS;

		RepeticionPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + RepeticionPeer::NUM_COLUMNS;

		EventoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + EventoPeer::NUM_COLUMNS;

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_EVENTO_ID, EventoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = DivisionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDivision(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1);
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
					$temp_obj3->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initRelDivisionActividadDocentes();
				$obj3->addRelDivisionActividadDocente($obj1);
			}

			$omClass = RepeticionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getRepeticion(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initRelDivisionActividadDocentes();
				$obj4->addRelDivisionActividadDocente($obj1);
			}

			$omClass = EventoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getEvento(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initRelDivisionActividadDocentes();
				$obj5->addRelDivisionActividadDocente($obj1);
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

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DivisionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DivisionPeer::NUM_COLUMNS;

		DocentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + DocentePeer::NUM_COLUMNS;

		RepeticionPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + RepeticionPeer::NUM_COLUMNS;

		EventoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + EventoPeer::NUM_COLUMNS;

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_EVENTO_ID, EventoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = DivisionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDivision(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1);
			}

			$omClass = DocentePeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getDocente(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initRelDivisionActividadDocentes();
				$obj3->addRelDivisionActividadDocente($obj1);
			}

			$omClass = RepeticionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getRepeticion(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initRelDivisionActividadDocentes();
				$obj4->addRelDivisionActividadDocente($obj1);
			}

			$omClass = EventoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getEvento(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initRelDivisionActividadDocentes();
				$obj5->addRelDivisionActividadDocente($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptRepeticion(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DivisionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DivisionPeer::NUM_COLUMNS;

		DocentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + DocentePeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ActividadPeer::NUM_COLUMNS;

		EventoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + EventoPeer::NUM_COLUMNS;

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_EVENTO_ID, EventoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = DivisionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDivision(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1);
			}

			$omClass = DocentePeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getDocente(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initRelDivisionActividadDocentes();
				$obj3->addRelDivisionActividadDocente($obj1);
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
					$temp_obj4->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initRelDivisionActividadDocentes();
				$obj4->addRelDivisionActividadDocente($obj1);
			}

			$omClass = EventoPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getEvento(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initRelDivisionActividadDocentes();
				$obj5->addRelDivisionActividadDocente($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptEvento(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDivisionActividadDocentePeer::addSelectColumns($c);
		$startcol2 = (RelDivisionActividadDocentePeer::NUM_COLUMNS - RelDivisionActividadDocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DivisionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DivisionPeer::NUM_COLUMNS;

		DocentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + DocentePeer::NUM_COLUMNS;

		ActividadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ActividadPeer::NUM_COLUMNS;

		RepeticionPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + RepeticionPeer::NUM_COLUMNS;

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DIVISION_ID, DivisionPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, ActividadPeer::ID);

		$c->addJoin(RelDivisionActividadDocentePeer::FK_REPETICION_ID, RepeticionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = RelDivisionActividadDocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = DivisionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDivision(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initRelDivisionActividadDocentes();
				$obj2->addRelDivisionActividadDocente($obj1);
			}

			$omClass = DocentePeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getDocente(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initRelDivisionActividadDocentes();
				$obj3->addRelDivisionActividadDocente($obj1);
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
					$temp_obj4->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initRelDivisionActividadDocentes();
				$obj4->addRelDivisionActividadDocente($obj1);
			}

			$omClass = RepeticionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getRepeticion(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addRelDivisionActividadDocente($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initRelDivisionActividadDocentes();
				$obj5->addRelDivisionActividadDocente($obj1);
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
		return RelDivisionActividadDocentePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(RelDivisionActividadDocentePeer::ID); 

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
			$comparison = $criteria->getComparison(RelDivisionActividadDocentePeer::ID);
			$selectCriteria->add(RelDivisionActividadDocentePeer::ID, $criteria->remove(RelDivisionActividadDocentePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(RelDivisionActividadDocentePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof RelDivisionActividadDocente) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RelDivisionActividadDocentePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(RelDivisionActividadDocente $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RelDivisionActividadDocentePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RelDivisionActividadDocentePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RelDivisionActividadDocentePeer::DATABASE_NAME, RelDivisionActividadDocentePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RelDivisionActividadDocentePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(RelDivisionActividadDocentePeer::DATABASE_NAME);

		$criteria->add(RelDivisionActividadDocentePeer::ID, $pk);


		$v = RelDivisionActividadDocentePeer::doSelect($criteria, $con);

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
			$criteria->add(RelDivisionActividadDocentePeer::ID, $pks, Criteria::IN);
			$objs = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseRelDivisionActividadDocentePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/RelDivisionActividadDocenteMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.RelDivisionActividadDocenteMapBuilder');
}
