<?php


abstract class BaseAlumnoSaludPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'alumno_salud';

	
	const CLASS_DEFAULT = 'lib.model.AlumnoSalud';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'alumno_salud.ID';

	
	const FK_ALUMNO_ID = 'alumno_salud.FK_ALUMNO_ID';

	
	const COBERTURA_MEDICA = 'alumno_salud.COBERTURA_MEDICA';

	
	const COBERTURA_TELEFONO = 'alumno_salud.COBERTURA_TELEFONO';

	
	const COBERTURA_OBSERVACIONES = 'alumno_salud.COBERTURA_OBSERVACIONES';

	
	const MEDICO_NOMBRE = 'alumno_salud.MEDICO_NOMBRE';

	
	const MEDICO_DOMICILIO = 'alumno_salud.MEDICO_DOMICILIO';

	
	const MEDICO_TELEFONO = 'alumno_salud.MEDICO_TELEFONO';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkAlumnoId', 'CoberturaMedica', 'CoberturaTelefono', 'CoberturaObservaciones', 'MedicoNombre', 'MedicoDomicilio', 'MedicoTelefono', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'fkAlumnoId', 'coberturaMedica', 'coberturaTelefono', 'coberturaObservaciones', 'medicoNombre', 'medicoDomicilio', 'medicoTelefono', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::FK_ALUMNO_ID, self::COBERTURA_MEDICA, self::COBERTURA_TELEFONO, self::COBERTURA_OBSERVACIONES, self::MEDICO_NOMBRE, self::MEDICO_DOMICILIO, self::MEDICO_TELEFONO, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_alumno_id', 'cobertura_medica', 'cobertura_telefono', 'cobertura_observaciones', 'medico_nombre', 'medico_domicilio', 'medico_telefono', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkAlumnoId' => 1, 'CoberturaMedica' => 2, 'CoberturaTelefono' => 3, 'CoberturaObservaciones' => 4, 'MedicoNombre' => 5, 'MedicoDomicilio' => 6, 'MedicoTelefono' => 7, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'fkAlumnoId' => 1, 'coberturaMedica' => 2, 'coberturaTelefono' => 3, 'coberturaObservaciones' => 4, 'medicoNombre' => 5, 'medicoDomicilio' => 6, 'medicoTelefono' => 7, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::FK_ALUMNO_ID => 1, self::COBERTURA_MEDICA => 2, self::COBERTURA_TELEFONO => 3, self::COBERTURA_OBSERVACIONES => 4, self::MEDICO_NOMBRE => 5, self::MEDICO_DOMICILIO => 6, self::MEDICO_TELEFONO => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_alumno_id' => 1, 'cobertura_medica' => 2, 'cobertura_telefono' => 3, 'cobertura_observaciones' => 4, 'medico_nombre' => 5, 'medico_domicilio' => 6, 'medico_telefono' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new AlumnoSaludMapBuilder();
		}
		return self::$mapBuilder;
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
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(AlumnoSaludPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AlumnoSaludPeer::ID);

		$criteria->addSelectColumn(AlumnoSaludPeer::FK_ALUMNO_ID);

		$criteria->addSelectColumn(AlumnoSaludPeer::COBERTURA_MEDICA);

		$criteria->addSelectColumn(AlumnoSaludPeer::COBERTURA_TELEFONO);

		$criteria->addSelectColumn(AlumnoSaludPeer::COBERTURA_OBSERVACIONES);

		$criteria->addSelectColumn(AlumnoSaludPeer::MEDICO_NOMBRE);

		$criteria->addSelectColumn(AlumnoSaludPeer::MEDICO_DOMICILIO);

		$criteria->addSelectColumn(AlumnoSaludPeer::MEDICO_TELEFONO);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(AlumnoSaludPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AlumnoSaludPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(AlumnoSaludPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}
	
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = AlumnoSaludPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return AlumnoSaludPeer::populateObjects(AlumnoSaludPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AlumnoSaludPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			AlumnoSaludPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(AlumnoSalud $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} 			self::$instances[$key] = $obj;
		}
	}

	
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof AlumnoSalud) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or AlumnoSalud object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} 
	
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; 	}
	
	
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
				if ($row[$startcol + 0] === null) {
			return null;
		}
		return (string) $row[$startcol + 0];
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = AlumnoSaludPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = AlumnoSaludPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = AlumnoSaludPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				AlumnoSaludPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinAlumno(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(AlumnoSaludPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AlumnoSaludPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoSaludPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(AlumnoSaludPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAlumno(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoSaludPeer::addSelectColumns($c);
		$startcol = (AlumnoSaludPeer::NUM_COLUMNS - AlumnoSaludPeer::NUM_LAZY_LOAD_COLUMNS);
		AlumnoPeer::addSelectColumns($c);

		$c->addJoin(array(AlumnoSaludPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoSaludPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoSaludPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = AlumnoSaludPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoSaludPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = AlumnoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = AlumnoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = AlumnoPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					AlumnoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addAlumnoSalud($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(AlumnoSaludPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AlumnoSaludPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AlumnoSaludPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(AlumnoSaludPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}

	
	public static function doSelectJoinAll(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlumnoSaludPeer::addSelectColumns($c);
		$startcol2 = (AlumnoSaludPeer::NUM_COLUMNS - AlumnoSaludPeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(AlumnoSaludPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AlumnoSaludPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AlumnoSaludPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = AlumnoSaludPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				AlumnoSaludPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = AlumnoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = AlumnoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = AlumnoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AlumnoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addAlumnoSalud($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


  static public function getUniqueColumnNames()
  {
    return array();
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return AlumnoSaludPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AlumnoSaludPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(AlumnoSaludPeer::ID) && $criteria->keyContainsValue(AlumnoSaludPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.AlumnoSaludPeer::ID.')');
		}


				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AlumnoSaludPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(AlumnoSaludPeer::ID);
			$selectCriteria->add(AlumnoSaludPeer::ID, $criteria->remove(AlumnoSaludPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AlumnoSaludPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(AlumnoSaludPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(AlumnoSaludPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												AlumnoSaludPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof AlumnoSalud) {
						AlumnoSaludPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AlumnoSaludPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								AlumnoSaludPeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	public static function doValidate(AlumnoSalud $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AlumnoSaludPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AlumnoSaludPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(AlumnoSaludPeer::DATABASE_NAME, AlumnoSaludPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AlumnoSaludPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = AlumnoSaludPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(AlumnoSaludPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(AlumnoSaludPeer::DATABASE_NAME);
		$criteria->add(AlumnoSaludPeer::ID, $pk);

		$v = AlumnoSaludPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AlumnoSaludPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(AlumnoSaludPeer::DATABASE_NAME);
			$criteria->add(AlumnoSaludPeer::ID, $pks, Criteria::IN);
			$objs = AlumnoSaludPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseAlumnoSaludPeer::DATABASE_NAME)->addTableBuilder(BaseAlumnoSaludPeer::TABLE_NAME, BaseAlumnoSaludPeer::getMapBuilder());

