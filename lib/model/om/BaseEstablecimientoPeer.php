<?php


abstract class BaseEstablecimientoPeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'establecimiento';

	
	const CLASS_DEFAULT = 'lib.model.Establecimiento';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'establecimiento.ID';

	
	const NOMBRE = 'establecimiento.NOMBRE';

	
	const DESCRIPCION = 'establecimiento.DESCRIPCION';

	
	const FK_DISTRITOESCOLAR_ID = 'establecimiento.FK_DISTRITOESCOLAR_ID';

	
	const FK_ORGANIZACION_ID = 'establecimiento.FK_ORGANIZACION_ID';

	
	const FK_NIVELTIPO_ID = 'establecimiento.FK_NIVELTIPO_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nombre', 'Descripcion', 'FkDistritoescolarId', 'FkOrganizacionId', 'FkNiveltipoId', ),
		BasePeer::TYPE_COLNAME => array (EstablecimientoPeer::ID, EstablecimientoPeer::NOMBRE, EstablecimientoPeer::DESCRIPCION, EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, EstablecimientoPeer::FK_ORGANIZACION_ID, EstablecimientoPeer::FK_NIVELTIPO_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nombre', 'descripcion', 'fk_distritoescolar_id', 'fk_organizacion_id', 'fk_niveltipo_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nombre' => 1, 'Descripcion' => 2, 'FkDistritoescolarId' => 3, 'FkOrganizacionId' => 4, 'FkNiveltipoId' => 5, ),
		BasePeer::TYPE_COLNAME => array (EstablecimientoPeer::ID => 0, EstablecimientoPeer::NOMBRE => 1, EstablecimientoPeer::DESCRIPCION => 2, EstablecimientoPeer::FK_DISTRITOESCOLAR_ID => 3, EstablecimientoPeer::FK_ORGANIZACION_ID => 4, EstablecimientoPeer::FK_NIVELTIPO_ID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nombre' => 1, 'descripcion' => 2, 'fk_distritoescolar_id' => 3, 'fk_organizacion_id' => 4, 'fk_niveltipo_id' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EstablecimientoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EstablecimientoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EstablecimientoPeer::getTableMap();
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
		return str_replace(EstablecimientoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EstablecimientoPeer::ID);

		$criteria->addSelectColumn(EstablecimientoPeer::NOMBRE);

		$criteria->addSelectColumn(EstablecimientoPeer::DESCRIPCION);

		$criteria->addSelectColumn(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID);

		$criteria->addSelectColumn(EstablecimientoPeer::FK_ORGANIZACION_ID);

		$criteria->addSelectColumn(EstablecimientoPeer::FK_NIVELTIPO_ID);

	}

	const COUNT = 'COUNT(establecimiento.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT establecimiento.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EstablecimientoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EstablecimientoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EstablecimientoPeer::doSelectRS($criteria, $con);
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
		$objects = EstablecimientoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EstablecimientoPeer::populateObjects(EstablecimientoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EstablecimientoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EstablecimientoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinNiveltipo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EstablecimientoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EstablecimientoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EstablecimientoPeer::FK_NIVELTIPO_ID, NiveltipoPeer::ID);

		$rs = EstablecimientoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinOrganizacion(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EstablecimientoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EstablecimientoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EstablecimientoPeer::FK_ORGANIZACION_ID, OrganizacionPeer::ID);

		$rs = EstablecimientoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinDistritoescolar(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EstablecimientoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EstablecimientoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, DistritoescolarPeer::ID);

		$rs = EstablecimientoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinNiveltipo(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EstablecimientoPeer::addSelectColumns($c);
		$startcol = (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		NiveltipoPeer::addSelectColumns($c);

		$c->addJoin(EstablecimientoPeer::FK_NIVELTIPO_ID, NiveltipoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EstablecimientoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = NiveltipoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getNiveltipo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addEstablecimiento($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEstablecimientos();
				$obj2->addEstablecimiento($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinOrganizacion(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EstablecimientoPeer::addSelectColumns($c);
		$startcol = (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		OrganizacionPeer::addSelectColumns($c);

		$c->addJoin(EstablecimientoPeer::FK_ORGANIZACION_ID, OrganizacionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EstablecimientoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = OrganizacionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getOrganizacion(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addEstablecimiento($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEstablecimientos();
				$obj2->addEstablecimiento($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinDistritoescolar(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EstablecimientoPeer::addSelectColumns($c);
		$startcol = (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DistritoescolarPeer::addSelectColumns($c);

		$c->addJoin(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, DistritoescolarPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EstablecimientoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DistritoescolarPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDistritoescolar(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addEstablecimiento($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEstablecimientos();
				$obj2->addEstablecimiento($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EstablecimientoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EstablecimientoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EstablecimientoPeer::FK_NIVELTIPO_ID, NiveltipoPeer::ID);

		$criteria->addJoin(EstablecimientoPeer::FK_ORGANIZACION_ID, OrganizacionPeer::ID);

		$criteria->addJoin(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, DistritoescolarPeer::ID);

		$rs = EstablecimientoPeer::doSelectRS($criteria, $con);
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

		EstablecimientoPeer::addSelectColumns($c);
		$startcol2 = (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		NiveltipoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + NiveltipoPeer::NUM_COLUMNS;

		OrganizacionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + OrganizacionPeer::NUM_COLUMNS;

		DistritoescolarPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + DistritoescolarPeer::NUM_COLUMNS;

		$c->addJoin(EstablecimientoPeer::FK_NIVELTIPO_ID, NiveltipoPeer::ID);

		$c->addJoin(EstablecimientoPeer::FK_ORGANIZACION_ID, OrganizacionPeer::ID);

		$c->addJoin(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, DistritoescolarPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EstablecimientoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = NiveltipoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getNiveltipo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEstablecimiento($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initEstablecimientos();
				$obj2->addEstablecimiento($obj1);
			}


					
			$omClass = OrganizacionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getOrganizacion(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEstablecimiento($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initEstablecimientos();
				$obj3->addEstablecimiento($obj1);
			}


					
			$omClass = DistritoescolarPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getDistritoescolar(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addEstablecimiento($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initEstablecimientos();
				$obj4->addEstablecimiento($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptNiveltipo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EstablecimientoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EstablecimientoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EstablecimientoPeer::FK_ORGANIZACION_ID, OrganizacionPeer::ID);

		$criteria->addJoin(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, DistritoescolarPeer::ID);

		$rs = EstablecimientoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptOrganizacion(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EstablecimientoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EstablecimientoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EstablecimientoPeer::FK_NIVELTIPO_ID, NiveltipoPeer::ID);

		$criteria->addJoin(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, DistritoescolarPeer::ID);

		$rs = EstablecimientoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptDistritoescolar(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EstablecimientoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EstablecimientoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EstablecimientoPeer::FK_NIVELTIPO_ID, NiveltipoPeer::ID);

		$criteria->addJoin(EstablecimientoPeer::FK_ORGANIZACION_ID, OrganizacionPeer::ID);

		$rs = EstablecimientoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptNiveltipo(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EstablecimientoPeer::addSelectColumns($c);
		$startcol2 = (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		OrganizacionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + OrganizacionPeer::NUM_COLUMNS;

		DistritoescolarPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + DistritoescolarPeer::NUM_COLUMNS;

		$c->addJoin(EstablecimientoPeer::FK_ORGANIZACION_ID, OrganizacionPeer::ID);

		$c->addJoin(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, DistritoescolarPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EstablecimientoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = OrganizacionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getOrganizacion(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEstablecimiento($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEstablecimientos();
				$obj2->addEstablecimiento($obj1);
			}

			$omClass = DistritoescolarPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getDistritoescolar(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEstablecimiento($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initEstablecimientos();
				$obj3->addEstablecimiento($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptOrganizacion(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EstablecimientoPeer::addSelectColumns($c);
		$startcol2 = (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		NiveltipoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + NiveltipoPeer::NUM_COLUMNS;

		DistritoescolarPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + DistritoescolarPeer::NUM_COLUMNS;

		$c->addJoin(EstablecimientoPeer::FK_NIVELTIPO_ID, NiveltipoPeer::ID);

		$c->addJoin(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, DistritoescolarPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EstablecimientoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = NiveltipoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getNiveltipo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEstablecimiento($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEstablecimientos();
				$obj2->addEstablecimiento($obj1);
			}

			$omClass = DistritoescolarPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getDistritoescolar(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEstablecimiento($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initEstablecimientos();
				$obj3->addEstablecimiento($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptDistritoescolar(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EstablecimientoPeer::addSelectColumns($c);
		$startcol2 = (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		NiveltipoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + NiveltipoPeer::NUM_COLUMNS;

		OrganizacionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + OrganizacionPeer::NUM_COLUMNS;

		$c->addJoin(EstablecimientoPeer::FK_NIVELTIPO_ID, NiveltipoPeer::ID);

		$c->addJoin(EstablecimientoPeer::FK_ORGANIZACION_ID, OrganizacionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EstablecimientoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = NiveltipoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getNiveltipo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEstablecimiento($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEstablecimientos();
				$obj2->addEstablecimiento($obj1);
			}

			$omClass = OrganizacionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getOrganizacion(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEstablecimiento($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initEstablecimientos();
				$obj3->addEstablecimiento($obj1);
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
		return EstablecimientoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(EstablecimientoPeer::ID); 

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
			$comparison = $criteria->getComparison(EstablecimientoPeer::ID);
			$selectCriteria->add(EstablecimientoPeer::ID, $criteria->remove(EstablecimientoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(EstablecimientoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Establecimiento) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EstablecimientoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Establecimiento $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EstablecimientoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EstablecimientoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EstablecimientoPeer::DATABASE_NAME, EstablecimientoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EstablecimientoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);

		$criteria->add(EstablecimientoPeer::ID, $pk);


		$v = EstablecimientoPeer::doSelect($criteria, $con);

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
			$criteria->add(EstablecimientoPeer::ID, $pks, Criteria::IN);
			$objs = EstablecimientoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEstablecimientoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EstablecimientoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EstablecimientoMapBuilder');
}
