<?php


abstract class BaseBoletinConceptualPeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'boletin_conceptual';

	
	const CLASS_DEFAULT = 'lib.model.BoletinConceptual';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'boletin_conceptual.ID';

	
	const FK_ESCALANOTA_ID = 'boletin_conceptual.FK_ESCALANOTA_ID';

	
	const FK_ALUMNO_ID = 'boletin_conceptual.FK_ALUMNO_ID';

	
	const FK_CONCEPTO_ID = 'boletin_conceptual.FK_CONCEPTO_ID';

	
	const FK_PERIODO_ID = 'boletin_conceptual.FK_PERIODO_ID';

	
	const OBSERVACION = 'boletin_conceptual.OBSERVACION';

	
	const FECHA = 'boletin_conceptual.FECHA';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkEscalanotaId', 'FkAlumnoId', 'FkConceptoId', 'FkPeriodoId', 'Observacion', 'Fecha', ),
		BasePeer::TYPE_COLNAME => array (BoletinConceptualPeer::ID, BoletinConceptualPeer::FK_ESCALANOTA_ID, BoletinConceptualPeer::FK_ALUMNO_ID, BoletinConceptualPeer::FK_CONCEPTO_ID, BoletinConceptualPeer::FK_PERIODO_ID, BoletinConceptualPeer::OBSERVACION, BoletinConceptualPeer::FECHA, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_escalanota_id', 'fk_alumno_id', 'fk_concepto_id', 'fk_periodo_id', 'observacion', 'fecha', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkEscalanotaId' => 1, 'FkAlumnoId' => 2, 'FkConceptoId' => 3, 'FkPeriodoId' => 4, 'Observacion' => 5, 'Fecha' => 6, ),
		BasePeer::TYPE_COLNAME => array (BoletinConceptualPeer::ID => 0, BoletinConceptualPeer::FK_ESCALANOTA_ID => 1, BoletinConceptualPeer::FK_ALUMNO_ID => 2, BoletinConceptualPeer::FK_CONCEPTO_ID => 3, BoletinConceptualPeer::FK_PERIODO_ID => 4, BoletinConceptualPeer::OBSERVACION => 5, BoletinConceptualPeer::FECHA => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_escalanota_id' => 1, 'fk_alumno_id' => 2, 'fk_concepto_id' => 3, 'fk_periodo_id' => 4, 'observacion' => 5, 'fecha' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BoletinConceptualMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BoletinConceptualMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BoletinConceptualPeer::getTableMap();
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
		return str_replace(BoletinConceptualPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BoletinConceptualPeer::ID);

		$criteria->addSelectColumn(BoletinConceptualPeer::FK_ESCALANOTA_ID);

		$criteria->addSelectColumn(BoletinConceptualPeer::FK_ALUMNO_ID);

		$criteria->addSelectColumn(BoletinConceptualPeer::FK_CONCEPTO_ID);

		$criteria->addSelectColumn(BoletinConceptualPeer::FK_PERIODO_ID);

		$criteria->addSelectColumn(BoletinConceptualPeer::OBSERVACION);

		$criteria->addSelectColumn(BoletinConceptualPeer::FECHA);

	}

	const COUNT = 'COUNT(boletin_conceptual.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT boletin_conceptual.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
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
		$objects = BoletinConceptualPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BoletinConceptualPeer::populateObjects(BoletinConceptualPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BoletinConceptualPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BoletinConceptualPeer::getOMClass();
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
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinConcepto(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
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

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EscalanotaPeer::addSelectColumns($c);

		$c->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

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
										$temp_obj2->addBoletinConceptual($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1); 			}
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

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AlumnoPeer::addSelectColumns($c);

		$c->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

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
										$temp_obj2->addBoletinConceptual($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinConcepto(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ConceptoPeer::addSelectColumns($c);

		$c->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ConceptoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getConcepto(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addBoletinConceptual($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1); 			}
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

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PeriodoPeer::addSelectColumns($c);

		$c->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

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
										$temp_obj2->addBoletinConceptual($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
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

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol2 = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EscalanotaPeer::NUM_COLUMNS;

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AlumnoPeer::NUM_COLUMNS;

		ConceptoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ConceptoPeer::NUM_COLUMNS;

		PeriodoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + PeriodoPeer::NUM_COLUMNS;

		$c->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();


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
					$temp_obj2->addBoletinConceptual($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1);
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
					$temp_obj3->addBoletinConceptual($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initBoletinConceptuals();
				$obj3->addBoletinConceptual($obj1);
			}


					
			$omClass = ConceptoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getConcepto(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBoletinConceptual($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initBoletinConceptuals();
				$obj4->addBoletinConceptual($obj1);
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
					$temp_obj5->addBoletinConceptual($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initBoletinConceptuals();
				$obj5->addBoletinConceptual($obj1);
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
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptConcepto(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BoletinConceptualPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);

		$rs = BoletinConceptualPeer::doSelectRS($criteria, $con);
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

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol2 = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AlumnoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AlumnoPeer::NUM_COLUMNS;

		ConceptoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ConceptoPeer::NUM_COLUMNS;

		PeriodoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PeriodoPeer::NUM_COLUMNS;

		$c->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

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
					$temp_obj2->addBoletinConceptual($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1);
			}

			$omClass = ConceptoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getConcepto(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBoletinConceptual($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initBoletinConceptuals();
				$obj3->addBoletinConceptual($obj1);
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
					$temp_obj4->addBoletinConceptual($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initBoletinConceptuals();
				$obj4->addBoletinConceptual($obj1);
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

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol2 = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EscalanotaPeer::NUM_COLUMNS;

		ConceptoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ConceptoPeer::NUM_COLUMNS;

		PeriodoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PeriodoPeer::NUM_COLUMNS;

		$c->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

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
					$temp_obj2->addBoletinConceptual($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1);
			}

			$omClass = ConceptoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getConcepto(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBoletinConceptual($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initBoletinConceptuals();
				$obj3->addBoletinConceptual($obj1);
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
					$temp_obj4->addBoletinConceptual($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initBoletinConceptuals();
				$obj4->addBoletinConceptual($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptConcepto(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol2 = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EscalanotaPeer::NUM_COLUMNS;

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AlumnoPeer::NUM_COLUMNS;

		PeriodoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PeriodoPeer::NUM_COLUMNS;

		$c->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_PERIODO_ID, PeriodoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

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
					$temp_obj2->addBoletinConceptual($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1);
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
					$temp_obj3->addBoletinConceptual($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initBoletinConceptuals();
				$obj3->addBoletinConceptual($obj1);
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
					$temp_obj4->addBoletinConceptual($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initBoletinConceptuals();
				$obj4->addBoletinConceptual($obj1);
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

		BoletinConceptualPeer::addSelectColumns($c);
		$startcol2 = (BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EscalanotaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EscalanotaPeer::NUM_COLUMNS;

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AlumnoPeer::NUM_COLUMNS;

		ConceptoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ConceptoPeer::NUM_COLUMNS;

		$c->addJoin(BoletinConceptualPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(BoletinConceptualPeer::FK_CONCEPTO_ID, ConceptoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BoletinConceptualPeer::getOMClass();

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
					$temp_obj2->addBoletinConceptual($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initBoletinConceptuals();
				$obj2->addBoletinConceptual($obj1);
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
					$temp_obj3->addBoletinConceptual($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initBoletinConceptuals();
				$obj3->addBoletinConceptual($obj1);
			}

			$omClass = ConceptoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getConcepto(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBoletinConceptual($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initBoletinConceptuals();
				$obj4->addBoletinConceptual($obj1);
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
		return BoletinConceptualPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BoletinConceptualPeer::ID); 

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
			$comparison = $criteria->getComparison(BoletinConceptualPeer::ID);
			$selectCriteria->add(BoletinConceptualPeer::ID, $criteria->remove(BoletinConceptualPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BoletinConceptualPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BoletinConceptualPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof BoletinConceptual) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BoletinConceptualPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(BoletinConceptual $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BoletinConceptualPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BoletinConceptualPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BoletinConceptualPeer::DATABASE_NAME, BoletinConceptualPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BoletinConceptualPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BoletinConceptualPeer::DATABASE_NAME);

		$criteria->add(BoletinConceptualPeer::ID, $pk);


		$v = BoletinConceptualPeer::doSelect($criteria, $con);

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
			$criteria->add(BoletinConceptualPeer::ID, $pks, Criteria::IN);
			$objs = BoletinConceptualPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBoletinConceptualPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BoletinConceptualMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BoletinConceptualMapBuilder');
}
