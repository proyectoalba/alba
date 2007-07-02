<?php


abstract class BaseDocentePeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'docente';

	
	const CLASS_DEFAULT = 'lib.model.Docente';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'docente.ID';

	
	const APELLIDO = 'docente.APELLIDO';

	
	const NOMBRE = 'docente.NOMBRE';

	
	const SEXO = 'docente.SEXO';

	
	const FECHA_NACIMIENTO = 'docente.FECHA_NACIMIENTO';

	
	const FK_TIPODOCUMENTO_ID = 'docente.FK_TIPODOCUMENTO_ID';

	
	const NRO_DOCUMENTO = 'docente.NRO_DOCUMENTO';

	
	const DIRECCION = 'docente.DIRECCION';

	
	const CIUDAD = 'docente.CIUDAD';

	
	const CODIGO_POSTAL = 'docente.CODIGO_POSTAL';

	
	const EMAIL = 'docente.EMAIL';

	
	const TELEFONO = 'docente.TELEFONO';

	
	const TELEFONO_MOVIL = 'docente.TELEFONO_MOVIL';

	
	const TITULO = 'docente.TITULO';

	
	const LIBRETA_SANITARIA = 'docente.LIBRETA_SANITARIA';

	
	const PSICOFISICO = 'docente.PSICOFISICO';

	
	const ACTIVO = 'docente.ACTIVO';

	
	const FK_PROVINCIA_ID = 'docente.FK_PROVINCIA_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Apellido', 'Nombre', 'Sexo', 'FechaNacimiento', 'FkTipodocumentoId', 'NroDocumento', 'Direccion', 'Ciudad', 'CodigoPostal', 'Email', 'Telefono', 'TelefonoMovil', 'Titulo', 'LibretaSanitaria', 'Psicofisico', 'Activo', 'FkProvinciaId', ),
		BasePeer::TYPE_COLNAME => array (DocentePeer::ID, DocentePeer::APELLIDO, DocentePeer::NOMBRE, DocentePeer::SEXO, DocentePeer::FECHA_NACIMIENTO, DocentePeer::FK_TIPODOCUMENTO_ID, DocentePeer::NRO_DOCUMENTO, DocentePeer::DIRECCION, DocentePeer::CIUDAD, DocentePeer::CODIGO_POSTAL, DocentePeer::EMAIL, DocentePeer::TELEFONO, DocentePeer::TELEFONO_MOVIL, DocentePeer::TITULO, DocentePeer::LIBRETA_SANITARIA, DocentePeer::PSICOFISICO, DocentePeer::ACTIVO, DocentePeer::FK_PROVINCIA_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'apellido', 'nombre', 'sexo', 'fecha_nacimiento', 'fk_tipodocumento_id', 'nro_documento', 'direccion', 'ciudad', 'codigo_postal', 'email', 'telefono', 'telefono_movil', 'titulo', 'libreta_sanitaria', 'psicofisico', 'activo', 'fk_provincia_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Apellido' => 1, 'Nombre' => 2, 'Sexo' => 3, 'FechaNacimiento' => 4, 'FkTipodocumentoId' => 5, 'NroDocumento' => 6, 'Direccion' => 7, 'Ciudad' => 8, 'CodigoPostal' => 9, 'Email' => 10, 'Telefono' => 11, 'TelefonoMovil' => 12, 'Titulo' => 13, 'LibretaSanitaria' => 14, 'Psicofisico' => 15, 'Activo' => 16, 'FkProvinciaId' => 17, ),
		BasePeer::TYPE_COLNAME => array (DocentePeer::ID => 0, DocentePeer::APELLIDO => 1, DocentePeer::NOMBRE => 2, DocentePeer::SEXO => 3, DocentePeer::FECHA_NACIMIENTO => 4, DocentePeer::FK_TIPODOCUMENTO_ID => 5, DocentePeer::NRO_DOCUMENTO => 6, DocentePeer::DIRECCION => 7, DocentePeer::CIUDAD => 8, DocentePeer::CODIGO_POSTAL => 9, DocentePeer::EMAIL => 10, DocentePeer::TELEFONO => 11, DocentePeer::TELEFONO_MOVIL => 12, DocentePeer::TITULO => 13, DocentePeer::LIBRETA_SANITARIA => 14, DocentePeer::PSICOFISICO => 15, DocentePeer::ACTIVO => 16, DocentePeer::FK_PROVINCIA_ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'apellido' => 1, 'nombre' => 2, 'sexo' => 3, 'fecha_nacimiento' => 4, 'fk_tipodocumento_id' => 5, 'nro_documento' => 6, 'direccion' => 7, 'ciudad' => 8, 'codigo_postal' => 9, 'email' => 10, 'telefono' => 11, 'telefono_movil' => 12, 'titulo' => 13, 'libreta_sanitaria' => 14, 'psicofisico' => 15, 'activo' => 16, 'fk_provincia_id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/DocenteMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.DocenteMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DocentePeer::getTableMap();
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
		return str_replace(DocentePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DocentePeer::ID);

		$criteria->addSelectColumn(DocentePeer::APELLIDO);

		$criteria->addSelectColumn(DocentePeer::NOMBRE);

		$criteria->addSelectColumn(DocentePeer::SEXO);

		$criteria->addSelectColumn(DocentePeer::FECHA_NACIMIENTO);

		$criteria->addSelectColumn(DocentePeer::FK_TIPODOCUMENTO_ID);

		$criteria->addSelectColumn(DocentePeer::NRO_DOCUMENTO);

		$criteria->addSelectColumn(DocentePeer::DIRECCION);

		$criteria->addSelectColumn(DocentePeer::CIUDAD);

		$criteria->addSelectColumn(DocentePeer::CODIGO_POSTAL);

		$criteria->addSelectColumn(DocentePeer::EMAIL);

		$criteria->addSelectColumn(DocentePeer::TELEFONO);

		$criteria->addSelectColumn(DocentePeer::TELEFONO_MOVIL);

		$criteria->addSelectColumn(DocentePeer::TITULO);

		$criteria->addSelectColumn(DocentePeer::LIBRETA_SANITARIA);

		$criteria->addSelectColumn(DocentePeer::PSICOFISICO);

		$criteria->addSelectColumn(DocentePeer::ACTIVO);

		$criteria->addSelectColumn(DocentePeer::FK_PROVINCIA_ID);

	}

	const COUNT = 'COUNT(docente.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT docente.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DocentePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DocentePeer::doSelectRS($criteria, $con);
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
		$objects = DocentePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DocentePeer::populateObjects(DocentePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DocentePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DocentePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinTipodocumento(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DocentePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DocentePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$rs = DocentePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(DocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DocentePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DocentePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$rs = DocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinTipodocumento(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DocentePeer::addSelectColumns($c);
		$startcol = (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TipodocumentoPeer::addSelectColumns($c);

		$c->addJoin(DocentePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DocentePeer::getOMClass();

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
										$temp_obj2->addDocente($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDocentes();
				$obj2->addDocente($obj1); 			}
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

		DocentePeer::addSelectColumns($c);
		$startcol = (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProvinciaPeer::addSelectColumns($c);

		$c->addJoin(DocentePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DocentePeer::getOMClass();

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
										$temp_obj2->addDocente($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDocentes();
				$obj2->addDocente($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DocentePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DocentePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$criteria->addJoin(DocentePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$rs = DocentePeer::doSelectRS($criteria, $con);
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

		DocentePeer::addSelectColumns($c);
		$startcol2 = (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TipodocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipodocumentoPeer::NUM_COLUMNS;

		ProvinciaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProvinciaPeer::NUM_COLUMNS;

		$c->addJoin(DocentePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$c->addJoin(DocentePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DocentePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = TipodocumentoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipodocumento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addDocente($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initDocentes();
				$obj2->addDocente($obj1);
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
					$temp_obj3->addDocente($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initDocentes();
				$obj3->addDocente($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptTipodocumento(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DocentePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DocentePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);

		$rs = DocentePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(DocentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DocentePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DocentePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);

		$rs = DocentePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptTipodocumento(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DocentePeer::addSelectColumns($c);
		$startcol2 = (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProvinciaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProvinciaPeer::NUM_COLUMNS;

		$c->addJoin(DocentePeer::FK_PROVINCIA_ID, ProvinciaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DocentePeer::getOMClass();

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
					$temp_obj2->addDocente($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initDocentes();
				$obj2->addDocente($obj1);
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

		DocentePeer::addSelectColumns($c);
		$startcol2 = (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TipodocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipodocumentoPeer::NUM_COLUMNS;

		$c->addJoin(DocentePeer::FK_TIPODOCUMENTO_ID, TipodocumentoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DocentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipodocumentoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipodocumento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addDocente($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initDocentes();
				$obj2->addDocente($obj1);
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
		return DocentePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(DocentePeer::ID); 

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
			$comparison = $criteria->getComparison(DocentePeer::ID);
			$selectCriteria->add(DocentePeer::ID, $criteria->remove(DocentePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(DocentePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Docente) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DocentePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Docente $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DocentePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DocentePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DocentePeer::DATABASE_NAME, DocentePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DocentePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(DocentePeer::DATABASE_NAME);

		$criteria->add(DocentePeer::ID, $pk);


		$v = DocentePeer::doSelect($criteria, $con);

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
			$criteria->add(DocentePeer::ID, $pks, Criteria::IN);
			$objs = DocentePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDocentePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/DocenteMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.DocenteMapBuilder');
}
