<?php


abstract class BaseResponsablePeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'responsable';

	
	const CLASS_DEFAULT = 'lib.model.Responsable';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'responsable.ID';

	
	const NOMBRE = 'responsable.NOMBRE';

	
	const APELLIDO = 'responsable.APELLIDO';

	
	const DIRECCION = 'responsable.DIRECCION';

	
	const CIUDAD = 'responsable.CIUDAD';

	
	const CODIGO_POSTAL = 'responsable.CODIGO_POSTAL';

	
	const FK_PROVINCIA_ID = 'responsable.FK_PROVINCIA_ID';

	
	const TELEFONO = 'responsable.TELEFONO';

	
	const TELEFONO_MOVIL = 'responsable.TELEFONO_MOVIL';

	
	const NRO_DOCUMENTO = 'responsable.NRO_DOCUMENTO';

	
	const FK_TIPODOCUMENTO_ID = 'responsable.FK_TIPODOCUMENTO_ID';

	
	const SEXO = 'responsable.SEXO';

	
	const EMAIL = 'responsable.EMAIL';

	
	const OBSERVACION = 'responsable.OBSERVACION';

	
	const AUTORIZACION_RETIRO = 'responsable.AUTORIZACION_RETIRO';

	
	const FK_CUENTA_ID = 'responsable.FK_CUENTA_ID';

	
	const FK_ROLRESPONSABLE_ID = 'responsable.FK_ROLRESPONSABLE_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nombre', 'Apellido', 'Direccion', 'Ciudad', 'CodigoPostal', 'FkProvinciaId', 'Telefono', 'TelefonoMovil', 'NroDocumento', 'FkTipodocumentoId', 'Sexo', 'Email', 'Observacion', 'AutorizacionRetiro', 'FkCuentaId', 'FkRolresponsableId', ),
		BasePeer::TYPE_COLNAME => array (ResponsablePeer::ID, ResponsablePeer::NOMBRE, ResponsablePeer::APELLIDO, ResponsablePeer::DIRECCION, ResponsablePeer::CIUDAD, ResponsablePeer::CODIGO_POSTAL, ResponsablePeer::FK_PROVINCIA_ID, ResponsablePeer::TELEFONO, ResponsablePeer::TELEFONO_MOVIL, ResponsablePeer::NRO_DOCUMENTO, ResponsablePeer::FK_TIPODOCUMENTO_ID, ResponsablePeer::SEXO, ResponsablePeer::EMAIL, ResponsablePeer::OBSERVACION, ResponsablePeer::AUTORIZACION_RETIRO, ResponsablePeer::FK_CUENTA_ID, ResponsablePeer::FK_ROLRESPONSABLE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nombre', 'apellido', 'direccion', 'ciudad', 'codigo_postal', 'fk_provincia_id', 'telefono', 'telefono_movil', 'nro_documento', 'fk_tipodocumento_id', 'sexo', 'email', 'observacion', 'autorizacion_retiro', 'fk_cuenta_id', 'fk_rolresponsable_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nombre' => 1, 'Apellido' => 2, 'Direccion' => 3, 'Ciudad' => 4, 'CodigoPostal' => 5, 'FkProvinciaId' => 6, 'Telefono' => 7, 'TelefonoMovil' => 8, 'NroDocumento' => 9, 'FkTipodocumentoId' => 10, 'Sexo' => 11, 'Email' => 12, 'Observacion' => 13, 'AutorizacionRetiro' => 14, 'FkCuentaId' => 15, 'FkRolresponsableId' => 16, ),
		BasePeer::TYPE_COLNAME => array (ResponsablePeer::ID => 0, ResponsablePeer::NOMBRE => 1, ResponsablePeer::APELLIDO => 2, ResponsablePeer::DIRECCION => 3, ResponsablePeer::CIUDAD => 4, ResponsablePeer::CODIGO_POSTAL => 5, ResponsablePeer::FK_PROVINCIA_ID => 6, ResponsablePeer::TELEFONO => 7, ResponsablePeer::TELEFONO_MOVIL => 8, ResponsablePeer::NRO_DOCUMENTO => 9, ResponsablePeer::FK_TIPODOCUMENTO_ID => 10, ResponsablePeer::SEXO => 11, ResponsablePeer::EMAIL => 12, ResponsablePeer::OBSERVACION => 13, ResponsablePeer::AUTORIZACION_RETIRO => 14, ResponsablePeer::FK_CUENTA_ID => 15, ResponsablePeer::FK_ROLRESPONSABLE_ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nombre' => 1, 'apellido' => 2, 'direccion' => 3, 'ciudad' => 4, 'codigo_postal' => 5, 'fk_provincia_id' => 6, 'telefono' => 7, 'telefono_movil' => 8, 'nro_documento' => 9, 'fk_tipodocumento_id' => 10, 'sexo' => 11, 'email' => 12, 'observacion' => 13, 'autorizacion_retiro' => 14, 'fk_cuenta_id' => 15, 'fk_rolresponsable_id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ResponsableMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ResponsableMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ResponsablePeer::getTableMap();
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
		return str_replace(ResponsablePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ResponsablePeer::ID);

		$criteria->addSelectColumn(ResponsablePeer::NOMBRE);

		$criteria->addSelectColumn(ResponsablePeer::APELLIDO);

		$criteria->addSelectColumn(ResponsablePeer::DIRECCION);

		$criteria->addSelectColumn(ResponsablePeer::CIUDAD);

		$criteria->addSelectColumn(ResponsablePeer::CODIGO_POSTAL);

		$criteria->addSelectColumn(ResponsablePeer::FK_PROVINCIA_ID);

		$criteria->addSelectColumn(ResponsablePeer::TELEFONO);

		$criteria->addSelectColumn(ResponsablePeer::TELEFONO_MOVIL);

		$criteria->addSelectColumn(ResponsablePeer::NRO_DOCUMENTO);

		$criteria->addSelectColumn(ResponsablePeer::FK_TIPODOCUMENTO_ID);

		$criteria->addSelectColumn(ResponsablePeer::SEXO);

		$criteria->addSelectColumn(ResponsablePeer::EMAIL);

		$criteria->addSelectColumn(ResponsablePeer::OBSERVACION);

		$criteria->addSelectColumn(ResponsablePeer::AUTORIZACION_RETIRO);

		$criteria->addSelectColumn(ResponsablePeer::FK_CUENTA_ID);

		$criteria->addSelectColumn(ResponsablePeer::FK_ROLRESPONSABLE_ID);

	}

	const COUNT = 'COUNT(responsable.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT responsable.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
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
		$objects = ResponsablePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ResponsablePeer::populateObjects(ResponsablePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ResponsablePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ResponsablePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCuenta(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinProvincia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTipodocumento(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinRolResponsable(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCuenta(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResponsablePeer::addSelectColumns($c);
		$startcol = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CuentaPeer::addSelectColumns($c);

		$c->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ResponsablePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CuentaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCuenta(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addResponsable($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initResponsables();
				$obj2->addResponsable($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinProvincia(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResponsablePeer::addSelectColumns($c);
		$startcol = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProvinciaPeer::addSelectColumns($c);

		$c->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ResponsablePeer::getOMClass();

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
										$temp_obj2->addResponsable($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initResponsables();
				$obj2->addResponsable($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTipodocumento(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResponsablePeer::addSelectColumns($c);
		$startcol = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TipodocumentoPeer::addSelectColumns($c);

		$c->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ResponsablePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipodocumentoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTipodocumento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addResponsable($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initResponsables();
				$obj2->addResponsable($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinRolResponsable(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResponsablePeer::addSelectColumns($c);
		$startcol = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		RolResponsablePeer::addSelectColumns($c);

		$c->addJoin(ResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ResponsablePeer::getOMClass();

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
										$temp_obj2->addResponsable($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initResponsables();
				$obj2->addResponsable($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$criteria->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$criteria->addJoin(ResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
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

		ResponsablePeer::addSelectColumns($c);
		$startcol2 = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CuentaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CuentaPeer::NUM_COLUMNS;

		ProvinciaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProvinciaPeer::NUM_COLUMNS;

		TipodocumentoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + TipodocumentoPeer::NUM_COLUMNS;

		RolResponsablePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + RolResponsablePeer::NUM_COLUMNS;

		$c->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);

		$c->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$c->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$c->addJoin(ResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ResponsablePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CuentaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCuenta(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addResponsable($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initResponsables();
				$obj2->addResponsable($obj1);
			}


					
			$omClass = ProvinciaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProvincia(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addResponsable($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initResponsables();
				$obj3->addResponsable($obj1);
			}


					
			$omClass = TipodocumentoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getTipodocumento(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addResponsable($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initResponsables();
				$obj4->addResponsable($obj1);
			}


					
			$omClass = RolResponsablePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getRolResponsable(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addResponsable($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initResponsables();
				$obj5->addResponsable($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptCuenta(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$criteria->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$criteria->addJoin(ResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptProvincia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$criteria->addJoin(ResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptTipodocumento(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$criteria->addJoin(ResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptRolResponsable(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ResponsablePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResponsablePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);

		$criteria->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$criteria->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$rs = ResponsablePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptCuenta(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResponsablePeer::addSelectColumns($c);
		$startcol2 = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProvinciaPeer::NUM_COLUMNS;

		TipodocumentoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TipodocumentoPeer::NUM_COLUMNS;

		RolResponsablePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + RolResponsablePeer::NUM_COLUMNS;

		$c->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$c->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$c->addJoin(ResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ResponsablePeer::getOMClass();

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
					$temp_obj2->addResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initResponsables();
				$obj2->addResponsable($obj1);
			}

			$omClass = TipodocumentoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTipodocumento(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initResponsables();
				$obj3->addResponsable($obj1);
			}

			$omClass = RolResponsablePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getRolResponsable(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initResponsables();
				$obj4->addResponsable($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptProvincia(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResponsablePeer::addSelectColumns($c);
		$startcol2 = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CuentaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CuentaPeer::NUM_COLUMNS;

		TipodocumentoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TipodocumentoPeer::NUM_COLUMNS;

		RolResponsablePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + RolResponsablePeer::NUM_COLUMNS;

		$c->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);

		$c->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$c->addJoin(ResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ResponsablePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CuentaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCuenta(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initResponsables();
				$obj2->addResponsable($obj1);
			}

			$omClass = TipodocumentoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTipodocumento(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initResponsables();
				$obj3->addResponsable($obj1);
			}

			$omClass = RolResponsablePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getRolResponsable(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initResponsables();
				$obj4->addResponsable($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTipodocumento(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResponsablePeer::addSelectColumns($c);
		$startcol2 = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CuentaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CuentaPeer::NUM_COLUMNS;

		ProvinciaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProvinciaPeer::NUM_COLUMNS;

		RolResponsablePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + RolResponsablePeer::NUM_COLUMNS;

		$c->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);

		$c->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$c->addJoin(ResponsablePeer::FK_ROLRESPONSABLE_ID, RolResponsablePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ResponsablePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CuentaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCuenta(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initResponsables();
				$obj2->addResponsable($obj1);
			}

			$omClass = ProvinciaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProvincia(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initResponsables();
				$obj3->addResponsable($obj1);
			}

			$omClass = RolResponsablePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getRolResponsable(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initResponsables();
				$obj4->addResponsable($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptRolResponsable(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ResponsablePeer::addSelectColumns($c);
		$startcol2 = (ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CuentaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CuentaPeer::NUM_COLUMNS;

		ProvinciaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProvinciaPeer::NUM_COLUMNS;

		TipodocumentoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + TipodocumentoPeer::NUM_COLUMNS;

		$c->addJoin(ResponsablePeer::FK_CUENTA_ID, CuentaPeer::ID);

		$c->addJoin(ResponsablePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$c->addJoin(ResponsablePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ResponsablePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CuentaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCuenta(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initResponsables();
				$obj2->addResponsable($obj1);
			}

			$omClass = ProvinciaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProvincia(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initResponsables();
				$obj3->addResponsable($obj1);
			}

			$omClass = TipodocumentoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getTipodocumento(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addResponsable($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initResponsables();
				$obj4->addResponsable($obj1);
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
		return ResponsablePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ResponsablePeer::ID); 

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
			$comparison = $criteria->getComparison(ResponsablePeer::ID);
			$selectCriteria->add(ResponsablePeer::ID, $criteria->remove(ResponsablePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ResponsablePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Responsable) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ResponsablePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Responsable $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ResponsablePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ResponsablePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ResponsablePeer::DATABASE_NAME, ResponsablePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ResponsablePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ResponsablePeer::DATABASE_NAME);

		$criteria->add(ResponsablePeer::ID, $pk);


		$v = ResponsablePeer::doSelect($criteria, $con);

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
			$criteria->add(ResponsablePeer::ID, $pks, Criteria::IN);
			$objs = ResponsablePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseResponsablePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ResponsableMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ResponsableMapBuilder');
}
