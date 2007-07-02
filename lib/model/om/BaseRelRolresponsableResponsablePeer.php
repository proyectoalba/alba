<?php


abstract class BaseRelRolresponsableResponsablePeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'rel_rolresponsable_responsable';

	
	const CLASS_DEFAULT = 'lib.model.RelRolresponsableResponsable';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'rel_rolresponsable_responsable.ID';

	
	const FK_ROLRESPONSABLE_ID = 'rel_rolresponsable_responsable.FK_ROLRESPONSABLE_ID';

	
	const FK_RESPONSABLE_ID = 'rel_rolresponsable_responsable.FK_RESPONSABLE_ID';

	
	const FK_ALUMNO_ID = 'rel_rolresponsable_responsable.FK_ALUMNO_ID';

	
	const DESCRIPCION = 'rel_rolresponsable_responsable.DESCRIPCION';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkRolresponsableId', 'FkResponsableId', 'FkAlumnoId', 'Descripcion', ),
		BasePeer::TYPE_COLNAME => array (RelRolresponsableResponsablePeer::ID, RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, RelRolresponsableResponsablePeer::FK_ALUMNO_ID, RelRolresponsableResponsablePeer::DESCRIPCION, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_rolresponsable_id', 'fk_responsable_id', 'fk_alumno_id', 'descripcion', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkRolresponsableId' => 1, 'FkResponsableId' => 2, 'FkAlumnoId' => 3, 'Descripcion' => 4, ),
		BasePeer::TYPE_COLNAME => array (RelRolresponsableResponsablePeer::ID => 0, RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID => 1, RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID => 2, RelRolresponsableResponsablePeer::FK_ALUMNO_ID => 3, RelRolresponsableResponsablePeer::DESCRIPCION => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_rolresponsable_id' => 1, 'fk_responsable_id' => 2, 'fk_alumno_id' => 3, 'descripcion' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/RelRolresponsableResponsableMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.RelRolresponsableResponsableMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = RelRolresponsableResponsablePeer::getTableMap();
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
		return str_replace(RelRolresponsableResponsablePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RelRolresponsableResponsablePeer::ID);

		$criteria->addSelectColumn(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID);

		$criteria->addSelectColumn(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID);

		$criteria->addSelectColumn(RelRolresponsableResponsablePeer::FK_ALUMNO_ID);

		$criteria->addSelectColumn(RelRolresponsableResponsablePeer::DESCRIPCION);

	}

	const COUNT = 'COUNT(rel_rolresponsable_responsable.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT rel_rolresponsable_responsable.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelRolresponsableResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelRolresponsableResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RelRolresponsableResponsablePeer::doSelectRS($criteria, $con);
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
		$objects = RelRolresponsableResponsablePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return RelRolresponsableResponsablePeer::populateObjects(RelRolresponsableResponsablePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			RelRolresponsableResponsablePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = RelRolresponsableResponsablePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinRolResponsable(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelRolresponsableResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelRolresponsableResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);

		$rs = RelRolresponsableResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinResponsable(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelRolresponsableResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelRolresponsableResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, ResponsablePeer::ID);

		$rs = RelRolresponsableResponsablePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(RelRolresponsableResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelRolresponsableResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$rs = RelRolresponsableResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinRolResponsable(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelRolresponsableResponsablePeer::addSelectColumns($c);
		$startcol = (RelRolresponsableResponsablePeer::NUM_COLUMNS - RelRolresponsableResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		RolResponsablePeer::addSelectColumns($c);

		$c->addJoin(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelRolresponsableResponsablePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = RolResponsablePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getRolResponsable(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRelRolresponsableResponsable($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRelRolresponsableResponsables();
				$obj2->addRelRolresponsableResponsable($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinResponsable(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelRolresponsableResponsablePeer::addSelectColumns($c);
		$startcol = (RelRolresponsableResponsablePeer::NUM_COLUMNS - RelRolresponsableResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ResponsablePeer::addSelectColumns($c);

		$c->addJoin(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, ResponsablePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelRolresponsableResponsablePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ResponsablePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getResponsable(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRelRolresponsableResponsable($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRelRolresponsableResponsables();
				$obj2->addRelRolresponsableResponsable($obj1); 			}
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

		RelRolresponsableResponsablePeer::addSelectColumns($c);
		$startcol = (RelRolresponsableResponsablePeer::NUM_COLUMNS - RelRolresponsableResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AlumnoPeer::addSelectColumns($c);

		$c->addJoin(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, AlumnoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelRolresponsableResponsablePeer::getOMClass();

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
										$temp_obj2->addRelRolresponsableResponsable($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRelRolresponsableResponsables();
				$obj2->addRelRolresponsableResponsable($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelRolresponsableResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelRolresponsableResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);

		$criteria->addJoin(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, ResponsablePeer::ID);

		$criteria->addJoin(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$rs = RelRolresponsableResponsablePeer::doSelectRS($criteria, $con);
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

		RelRolresponsableResponsablePeer::addSelectColumns($c);
		$startcol2 = (RelRolresponsableResponsablePeer::NUM_COLUMNS - RelRolresponsableResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		RolResponsablePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + RolResponsablePeer::NUM_COLUMNS;

		ResponsablePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ResponsablePeer::NUM_COLUMNS;

		AlumnoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AlumnoPeer::NUM_COLUMNS;

		$c->addJoin(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);

		$c->addJoin(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, ResponsablePeer::ID);

		$c->addJoin(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelRolresponsableResponsablePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = RolResponsablePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getRolResponsable(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelRolresponsableResponsable($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initRelRolresponsableResponsables();
				$obj2->addRelRolresponsableResponsable($obj1);
			}


					
			$omClass = ResponsablePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getResponsable(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRelRolresponsableResponsable($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initRelRolresponsableResponsables();
				$obj3->addRelRolresponsableResponsable($obj1);
			}


					
			$omClass = AlumnoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAlumno(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addRelRolresponsableResponsable($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initRelRolresponsableResponsables();
				$obj4->addRelRolresponsableResponsable($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptRolResponsable(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelRolresponsableResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelRolresponsableResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, ResponsablePeer::ID);

		$criteria->addJoin(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$rs = RelRolresponsableResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptResponsable(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RelRolresponsableResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelRolresponsableResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);

		$criteria->addJoin(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$rs = RelRolresponsableResponsablePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(RelRolresponsableResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RelRolresponsableResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);

		$criteria->addJoin(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, ResponsablePeer::ID);

		$rs = RelRolresponsableResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptRolResponsable(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelRolresponsableResponsablePeer::addSelectColumns($c);
		$startcol2 = (RelRolresponsableResponsablePeer::NUM_COLUMNS - RelRolresponsableResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ResponsablePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ResponsablePeer::NUM_COLUMNS;

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AlumnoPeer::NUM_COLUMNS;

		$c->addJoin(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, ResponsablePeer::ID);

		$c->addJoin(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, AlumnoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelRolresponsableResponsablePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ResponsablePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getResponsable(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelRolresponsableResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRelRolresponsableResponsables();
				$obj2->addRelRolresponsableResponsable($obj1);
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
					$temp_obj3->addRelRolresponsableResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initRelRolresponsableResponsables();
				$obj3->addRelRolresponsableResponsable($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptResponsable(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelRolresponsableResponsablePeer::addSelectColumns($c);
		$startcol2 = (RelRolresponsableResponsablePeer::NUM_COLUMNS - RelRolresponsableResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		RolResponsablePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + RolResponsablePeer::NUM_COLUMNS;

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AlumnoPeer::NUM_COLUMNS;

		$c->addJoin(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);

		$c->addJoin(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, AlumnoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelRolresponsableResponsablePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = RolResponsablePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getRolResponsable(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelRolresponsableResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRelRolresponsableResponsables();
				$obj2->addRelRolresponsableResponsable($obj1);
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
					$temp_obj3->addRelRolresponsableResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initRelRolresponsableResponsables();
				$obj3->addRelRolresponsableResponsable($obj1);
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

		RelRolresponsableResponsablePeer::addSelectColumns($c);
		$startcol2 = (RelRolresponsableResponsablePeer::NUM_COLUMNS - RelRolresponsableResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		RolResponsablePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + RolResponsablePeer::NUM_COLUMNS;

		ResponsablePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ResponsablePeer::NUM_COLUMNS;

		$c->addJoin(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);

		$c->addJoin(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, ResponsablePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RelRolresponsableResponsablePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = RolResponsablePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getRolResponsable(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRelRolresponsableResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRelRolresponsableResponsables();
				$obj2->addRelRolresponsableResponsable($obj1);
			}

			$omClass = ResponsablePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getResponsable(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRelRolresponsableResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initRelRolresponsableResponsables();
				$obj3->addRelRolresponsableResponsable($obj1);
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
		return RelRolresponsableResponsablePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(RelRolresponsableResponsablePeer::ID); 

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
			$comparison = $criteria->getComparison(RelRolresponsableResponsablePeer::ID);
			$selectCriteria->add(RelRolresponsableResponsablePeer::ID, $criteria->remove(RelRolresponsableResponsablePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(RelRolresponsableResponsablePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof RelRolresponsableResponsable) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RelRolresponsableResponsablePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(RelRolresponsableResponsable $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RelRolresponsableResponsablePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RelRolresponsableResponsablePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RelRolresponsableResponsablePeer::DATABASE_NAME, RelRolresponsableResponsablePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RelRolresponsableResponsablePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(RelRolresponsableResponsablePeer::DATABASE_NAME);

		$criteria->add(RelRolresponsableResponsablePeer::ID, $pk);


		$v = RelRolresponsableResponsablePeer::doSelect($criteria, $con);

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
			$criteria->add(RelRolresponsableResponsablePeer::ID, $pks, Criteria::IN);
			$objs = RelRolresponsableResponsablePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseRelRolresponsableResponsablePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/RelRolresponsableResponsableMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.RelRolresponsableResponsableMapBuilder');
}
