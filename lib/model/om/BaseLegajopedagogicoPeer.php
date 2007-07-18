<?php


abstract class BaseLegajopedagogicoPeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'legajopedagogico';

	
	const CLASS_DEFAULT = 'lib.model.Legajopedagogico';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'legajopedagogico.ID';

	
	const FK_ALUMNO_ID = 'legajopedagogico.FK_ALUMNO_ID';

	
	const TITULO = 'legajopedagogico.TITULO';

	
	const RESUMEN = 'legajopedagogico.RESUMEN';

	
	const TEXTO = 'legajopedagogico.TEXTO';

	
	const FECHA = 'legajopedagogico.FECHA';

	
	const FK_USUARIO_ID = 'legajopedagogico.FK_USUARIO_ID';

	
	const FK_LEGAJOCATEGORIA_ID = 'legajopedagogico.FK_LEGAJOCATEGORIA_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkAlumnoId', 'Titulo', 'Resumen', 'Texto', 'Fecha', 'FkUsuarioId', 'FkLegajocategoriaId', ),
		BasePeer::TYPE_COLNAME => array (LegajopedagogicoPeer::ID, LegajopedagogicoPeer::FK_ALUMNO_ID, LegajopedagogicoPeer::TITULO, LegajopedagogicoPeer::RESUMEN, LegajopedagogicoPeer::TEXTO, LegajopedagogicoPeer::FECHA, LegajopedagogicoPeer::FK_USUARIO_ID, LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_alumno_id', 'titulo', 'resumen', 'texto', 'fecha', 'fk_usuario_id', 'fk_legajocategoria_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkAlumnoId' => 1, 'Titulo' => 2, 'Resumen' => 3, 'Texto' => 4, 'Fecha' => 5, 'FkUsuarioId' => 6, 'FkLegajocategoriaId' => 7, ),
		BasePeer::TYPE_COLNAME => array (LegajopedagogicoPeer::ID => 0, LegajopedagogicoPeer::FK_ALUMNO_ID => 1, LegajopedagogicoPeer::TITULO => 2, LegajopedagogicoPeer::RESUMEN => 3, LegajopedagogicoPeer::TEXTO => 4, LegajopedagogicoPeer::FECHA => 5, LegajopedagogicoPeer::FK_USUARIO_ID => 6, LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_alumno_id' => 1, 'titulo' => 2, 'resumen' => 3, 'texto' => 4, 'fecha' => 5, 'fk_usuario_id' => 6, 'fk_legajocategoria_id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LegajopedagogicoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LegajopedagogicoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LegajopedagogicoPeer::getTableMap();
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
		return str_replace(LegajopedagogicoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LegajopedagogicoPeer::ID);

		$criteria->addSelectColumn(LegajopedagogicoPeer::FK_ALUMNO_ID);

		$criteria->addSelectColumn(LegajopedagogicoPeer::TITULO);

		$criteria->addSelectColumn(LegajopedagogicoPeer::RESUMEN);

		$criteria->addSelectColumn(LegajopedagogicoPeer::TEXTO);

		$criteria->addSelectColumn(LegajopedagogicoPeer::FECHA);

		$criteria->addSelectColumn(LegajopedagogicoPeer::FK_USUARIO_ID);

		$criteria->addSelectColumn(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID);

	}

	const COUNT = 'COUNT(legajopedagogico.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT legajopedagogico.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LegajopedagogicoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LegajopedagogicoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LegajopedagogicoPeer::doSelectRS($criteria, $con);
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
		$objects = LegajopedagogicoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LegajopedagogicoPeer::populateObjects(LegajopedagogicoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LegajopedagogicoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LegajopedagogicoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAlumno(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LegajopedagogicoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LegajopedagogicoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LegajopedagogicoPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$rs = LegajopedagogicoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinUsuario(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LegajopedagogicoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LegajopedagogicoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LegajopedagogicoPeer::FK_USUARIO_ID, UsuarioPeer::ID);

		$rs = LegajopedagogicoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLegajocategoria(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LegajopedagogicoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LegajopedagogicoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, LegajocategoriaPeer::ID);

		$rs = LegajopedagogicoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAlumno(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LegajopedagogicoPeer::addSelectColumns($c);
		$startcol = (LegajopedagogicoPeer::NUM_COLUMNS - LegajopedagogicoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AlumnoPeer::addSelectColumns($c);

		$c->addJoin(LegajopedagogicoPeer::FK_ALUMNO_ID, AlumnoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LegajopedagogicoPeer::getOMClass();

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
										$temp_obj2->addLegajopedagogico($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLegajopedagogicos();
				$obj2->addLegajopedagogico($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinUsuario(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LegajopedagogicoPeer::addSelectColumns($c);
		$startcol = (LegajopedagogicoPeer::NUM_COLUMNS - LegajopedagogicoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		UsuarioPeer::addSelectColumns($c);

		$c->addJoin(LegajopedagogicoPeer::FK_USUARIO_ID, UsuarioPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LegajopedagogicoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UsuarioPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getUsuario(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLegajopedagogico($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLegajopedagogicos();
				$obj2->addLegajopedagogico($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLegajocategoria(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LegajopedagogicoPeer::addSelectColumns($c);
		$startcol = (LegajopedagogicoPeer::NUM_COLUMNS - LegajopedagogicoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LegajocategoriaPeer::addSelectColumns($c);

		$c->addJoin(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, LegajocategoriaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LegajopedagogicoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LegajocategoriaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLegajocategoria(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLegajopedagogico($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLegajopedagogicos();
				$obj2->addLegajopedagogico($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LegajopedagogicoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LegajopedagogicoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LegajopedagogicoPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(LegajopedagogicoPeer::FK_USUARIO_ID, UsuarioPeer::ID);

		$criteria->addJoin(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, LegajocategoriaPeer::ID);

		$rs = LegajopedagogicoPeer::doSelectRS($criteria, $con);
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

		LegajopedagogicoPeer::addSelectColumns($c);
		$startcol2 = (LegajopedagogicoPeer::NUM_COLUMNS - LegajopedagogicoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AlumnoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AlumnoPeer::NUM_COLUMNS;

		UsuarioPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + UsuarioPeer::NUM_COLUMNS;

		LegajocategoriaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + LegajocategoriaPeer::NUM_COLUMNS;

		$c->addJoin(LegajopedagogicoPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(LegajopedagogicoPeer::FK_USUARIO_ID, UsuarioPeer::ID);

		$c->addJoin(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, LegajocategoriaPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LegajopedagogicoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = AlumnoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAlumno(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLegajopedagogico($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initLegajopedagogicos();
				$obj2->addLegajopedagogico($obj1);
			}


					
			$omClass = UsuarioPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getUsuario(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addLegajopedagogico($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initLegajopedagogicos();
				$obj3->addLegajopedagogico($obj1);
			}


					
			$omClass = LegajocategoriaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getLegajocategoria(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addLegajopedagogico($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initLegajopedagogicos();
				$obj4->addLegajopedagogico($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptAlumno(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LegajopedagogicoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LegajopedagogicoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LegajopedagogicoPeer::FK_USUARIO_ID, UsuarioPeer::ID);

		$criteria->addJoin(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, LegajocategoriaPeer::ID);

		$rs = LegajopedagogicoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptUsuario(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LegajopedagogicoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LegajopedagogicoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LegajopedagogicoPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, LegajocategoriaPeer::ID);

		$rs = LegajopedagogicoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptLegajocategoria(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LegajopedagogicoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LegajopedagogicoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LegajopedagogicoPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$criteria->addJoin(LegajopedagogicoPeer::FK_USUARIO_ID, UsuarioPeer::ID);

		$rs = LegajopedagogicoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptAlumno(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LegajopedagogicoPeer::addSelectColumns($c);
		$startcol2 = (LegajopedagogicoPeer::NUM_COLUMNS - LegajopedagogicoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UsuarioPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UsuarioPeer::NUM_COLUMNS;

		LegajocategoriaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LegajocategoriaPeer::NUM_COLUMNS;

		$c->addJoin(LegajopedagogicoPeer::FK_USUARIO_ID, UsuarioPeer::ID);

		$c->addJoin(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, LegajocategoriaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LegajopedagogicoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UsuarioPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUsuario(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLegajopedagogico($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initLegajopedagogicos();
				$obj2->addLegajopedagogico($obj1);
			}

			$omClass = LegajocategoriaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLegajocategoria(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addLegajopedagogico($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initLegajopedagogicos();
				$obj3->addLegajopedagogico($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptUsuario(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LegajopedagogicoPeer::addSelectColumns($c);
		$startcol2 = (LegajopedagogicoPeer::NUM_COLUMNS - LegajopedagogicoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AlumnoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AlumnoPeer::NUM_COLUMNS;

		LegajocategoriaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LegajocategoriaPeer::NUM_COLUMNS;

		$c->addJoin(LegajopedagogicoPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, LegajocategoriaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LegajopedagogicoPeer::getOMClass();

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
					$temp_obj2->addLegajopedagogico($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initLegajopedagogicos();
				$obj2->addLegajopedagogico($obj1);
			}

			$omClass = LegajocategoriaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLegajocategoria(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addLegajopedagogico($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initLegajopedagogicos();
				$obj3->addLegajopedagogico($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLegajocategoria(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LegajopedagogicoPeer::addSelectColumns($c);
		$startcol2 = (LegajopedagogicoPeer::NUM_COLUMNS - LegajopedagogicoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AlumnoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AlumnoPeer::NUM_COLUMNS;

		UsuarioPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + UsuarioPeer::NUM_COLUMNS;

		$c->addJoin(LegajopedagogicoPeer::FK_ALUMNO_ID, AlumnoPeer::ID);

		$c->addJoin(LegajopedagogicoPeer::FK_USUARIO_ID, UsuarioPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LegajopedagogicoPeer::getOMClass();

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
					$temp_obj2->addLegajopedagogico($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initLegajopedagogicos();
				$obj2->addLegajopedagogico($obj1);
			}

			$omClass = UsuarioPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getUsuario(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addLegajopedagogico($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initLegajopedagogicos();
				$obj3->addLegajopedagogico($obj1);
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
		return LegajopedagogicoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LegajopedagogicoPeer::ID); 

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
			$comparison = $criteria->getComparison(LegajopedagogicoPeer::ID);
			$selectCriteria->add(LegajopedagogicoPeer::ID, $criteria->remove(LegajopedagogicoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LegajopedagogicoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LegajopedagogicoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Legajopedagogico) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LegajopedagogicoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Legajopedagogico $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LegajopedagogicoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LegajopedagogicoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LegajopedagogicoPeer::DATABASE_NAME, LegajopedagogicoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LegajopedagogicoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LegajopedagogicoPeer::DATABASE_NAME);

		$criteria->add(LegajopedagogicoPeer::ID, $pk);


		$v = LegajopedagogicoPeer::doSelect($criteria, $con);

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
			$criteria->add(LegajopedagogicoPeer::ID, $pks, Criteria::IN);
			$objs = LegajopedagogicoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLegajopedagogicoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LegajopedagogicoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LegajopedagogicoMapBuilder');
}
