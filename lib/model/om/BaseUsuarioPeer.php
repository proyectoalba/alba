<?php


abstract class BaseUsuarioPeer {

	
	const DATABASE_NAME = 'alba';

	
	const TABLE_NAME = 'usuario';

	
	const CLASS_DEFAULT = 'lib.model.Usuario';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'usuario.ID';

	
	const USUARIO = 'usuario.USUARIO';

	
	const CLAVE = 'usuario.CLAVE';

	
	const CORREO_PUBLICO = 'usuario.CORREO_PUBLICO';

	
	const ACTIVO = 'usuario.ACTIVO';

	
	const FECHA_CREADO = 'usuario.FECHA_CREADO';

	
	const FECHA_ACTUALIZADO = 'usuario.FECHA_ACTUALIZADO';

	
	const SEGURIDAD_PREGUNTA = 'usuario.SEGURIDAD_PREGUNTA';

	
	const SEGURIDAD_RESPUESTA = 'usuario.SEGURIDAD_RESPUESTA';

	
	const EMAIL = 'usuario.EMAIL';

	
	const FK_ESTABLECIMIENTO_ID = 'usuario.FK_ESTABLECIMIENTO_ID';

	
	const BORRADO = 'usuario.BORRADO';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Usuario', 'Clave', 'CorreoPublico', 'Activo', 'FechaCreado', 'FechaActualizado', 'SeguridadPregunta', 'SeguridadRespuesta', 'Email', 'FkEstablecimientoId', 'Borrado', ),
		BasePeer::TYPE_COLNAME => array (UsuarioPeer::ID, UsuarioPeer::USUARIO, UsuarioPeer::CLAVE, UsuarioPeer::CORREO_PUBLICO, UsuarioPeer::ACTIVO, UsuarioPeer::FECHA_CREADO, UsuarioPeer::FECHA_ACTUALIZADO, UsuarioPeer::SEGURIDAD_PREGUNTA, UsuarioPeer::SEGURIDAD_RESPUESTA, UsuarioPeer::EMAIL, UsuarioPeer::FK_ESTABLECIMIENTO_ID, UsuarioPeer::BORRADO, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'usuario', 'clave', 'correo_publico', 'activo', 'fecha_creado', 'fecha_actualizado', 'seguridad_pregunta', 'seguridad_respuesta', 'email', 'fk_establecimiento_id', 'borrado', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Usuario' => 1, 'Clave' => 2, 'CorreoPublico' => 3, 'Activo' => 4, 'FechaCreado' => 5, 'FechaActualizado' => 6, 'SeguridadPregunta' => 7, 'SeguridadRespuesta' => 8, 'Email' => 9, 'FkEstablecimientoId' => 10, 'Borrado' => 11, ),
		BasePeer::TYPE_COLNAME => array (UsuarioPeer::ID => 0, UsuarioPeer::USUARIO => 1, UsuarioPeer::CLAVE => 2, UsuarioPeer::CORREO_PUBLICO => 3, UsuarioPeer::ACTIVO => 4, UsuarioPeer::FECHA_CREADO => 5, UsuarioPeer::FECHA_ACTUALIZADO => 6, UsuarioPeer::SEGURIDAD_PREGUNTA => 7, UsuarioPeer::SEGURIDAD_RESPUESTA => 8, UsuarioPeer::EMAIL => 9, UsuarioPeer::FK_ESTABLECIMIENTO_ID => 10, UsuarioPeer::BORRADO => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'usuario' => 1, 'clave' => 2, 'correo_publico' => 3, 'activo' => 4, 'fecha_creado' => 5, 'fecha_actualizado' => 6, 'seguridad_pregunta' => 7, 'seguridad_respuesta' => 8, 'email' => 9, 'fk_establecimiento_id' => 10, 'borrado' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/UsuarioMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.UsuarioMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = UsuarioPeer::getTableMap();
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
		return str_replace(UsuarioPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(UsuarioPeer::ID);

		$criteria->addSelectColumn(UsuarioPeer::USUARIO);

		$criteria->addSelectColumn(UsuarioPeer::CLAVE);

		$criteria->addSelectColumn(UsuarioPeer::CORREO_PUBLICO);

		$criteria->addSelectColumn(UsuarioPeer::ACTIVO);

		$criteria->addSelectColumn(UsuarioPeer::FECHA_CREADO);

		$criteria->addSelectColumn(UsuarioPeer::FECHA_ACTUALIZADO);

		$criteria->addSelectColumn(UsuarioPeer::SEGURIDAD_PREGUNTA);

		$criteria->addSelectColumn(UsuarioPeer::SEGURIDAD_RESPUESTA);

		$criteria->addSelectColumn(UsuarioPeer::EMAIL);

		$criteria->addSelectColumn(UsuarioPeer::FK_ESTABLECIMIENTO_ID);

		$criteria->addSelectColumn(UsuarioPeer::BORRADO);

	}

	const COUNT = 'COUNT(usuario.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT usuario.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(UsuarioPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(UsuarioPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = UsuarioPeer::doSelectRS($criteria, $con);
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
		$objects = UsuarioPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return UsuarioPeer::populateObjects(UsuarioPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			UsuarioPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = UsuarioPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinEstablecimiento(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(UsuarioPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(UsuarioPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(UsuarioPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$rs = UsuarioPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinEstablecimiento(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		UsuarioPeer::addSelectColumns($c);
		$startcol = (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EstablecimientoPeer::addSelectColumns($c);

		$c->addJoin(UsuarioPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = UsuarioPeer::getOMClass();

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
										$temp_obj2->addUsuario($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initUsuarios();
				$obj2->addUsuario($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(UsuarioPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(UsuarioPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(UsuarioPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$rs = UsuarioPeer::doSelectRS($criteria, $con);
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

		UsuarioPeer::addSelectColumns($c);
		$startcol2 = (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EstablecimientoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EstablecimientoPeer::NUM_COLUMNS;

		$c->addJoin(UsuarioPeer::FK_ESTABLECIMIENTO_ID, EstablecimientoPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = UsuarioPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = EstablecimientoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEstablecimiento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addUsuario($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initUsuarios();
				$obj2->addUsuario($obj1);
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
		return UsuarioPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(UsuarioPeer::ID); 

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
			$comparison = $criteria->getComparison(UsuarioPeer::ID);
			$selectCriteria->add(UsuarioPeer::ID, $criteria->remove(UsuarioPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(UsuarioPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Usuario) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(UsuarioPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Usuario $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(UsuarioPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(UsuarioPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(UsuarioPeer::DATABASE_NAME, UsuarioPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = UsuarioPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);

		$criteria->add(UsuarioPeer::ID, $pk);


		$v = UsuarioPeer::doSelect($criteria, $con);

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
			$criteria->add(UsuarioPeer::ID, $pks, Criteria::IN);
			$objs = UsuarioPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseUsuarioPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/UsuarioMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.UsuarioMapBuilder');
}
