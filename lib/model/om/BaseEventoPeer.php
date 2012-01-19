<?php


abstract class BaseEventoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'evento';

	
	const CLASS_DEFAULT = 'lib.model.Evento';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'evento.ID';

	
	const TITULO = 'evento.TITULO';

	
	const FECHA_INICIO = 'evento.FECHA_INICIO';

	
	const FECHA_FIN = 'evento.FECHA_FIN';

	
	const TIPO = 'evento.TIPO';

	
	const FRECUENCIA = 'evento.FRECUENCIA';

	
	const FRECUENCIA_INTERVALO = 'evento.FRECUENCIA_INTERVALO';

	
	const RECURRENCIA_FIN = 'evento.RECURRENCIA_FIN';

	
	const RECURRENCIA_DIAS = 'evento.RECURRENCIA_DIAS';

	
	const ESTADO = 'evento.ESTADO';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Titulo', 'FechaInicio', 'FechaFin', 'Tipo', 'Frecuencia', 'FrecuenciaIntervalo', 'RecurrenciaFin', 'RecurrenciaDias', 'Estado', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'titulo', 'fechaInicio', 'fechaFin', 'tipo', 'frecuencia', 'frecuenciaIntervalo', 'recurrenciaFin', 'recurrenciaDias', 'estado', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::TITULO, self::FECHA_INICIO, self::FECHA_FIN, self::TIPO, self::FRECUENCIA, self::FRECUENCIA_INTERVALO, self::RECURRENCIA_FIN, self::RECURRENCIA_DIAS, self::ESTADO, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'titulo', 'fecha_inicio', 'fecha_fin', 'tipo', 'frecuencia', 'frecuencia_intervalo', 'recurrencia_fin', 'recurrencia_dias', 'estado', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Titulo' => 1, 'FechaInicio' => 2, 'FechaFin' => 3, 'Tipo' => 4, 'Frecuencia' => 5, 'FrecuenciaIntervalo' => 6, 'RecurrenciaFin' => 7, 'RecurrenciaDias' => 8, 'Estado' => 9, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'titulo' => 1, 'fechaInicio' => 2, 'fechaFin' => 3, 'tipo' => 4, 'frecuencia' => 5, 'frecuenciaIntervalo' => 6, 'recurrenciaFin' => 7, 'recurrenciaDias' => 8, 'estado' => 9, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::TITULO => 1, self::FECHA_INICIO => 2, self::FECHA_FIN => 3, self::TIPO => 4, self::FRECUENCIA => 5, self::FRECUENCIA_INTERVALO => 6, self::RECURRENCIA_FIN => 7, self::RECURRENCIA_DIAS => 8, self::ESTADO => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'titulo' => 1, 'fecha_inicio' => 2, 'fecha_fin' => 3, 'tipo' => 4, 'frecuencia' => 5, 'frecuencia_intervalo' => 6, 'recurrencia_fin' => 7, 'recurrencia_dias' => 8, 'estado' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new EventoMapBuilder();
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
		return str_replace(EventoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EventoPeer::ID);

		$criteria->addSelectColumn(EventoPeer::TITULO);

		$criteria->addSelectColumn(EventoPeer::FECHA_INICIO);

		$criteria->addSelectColumn(EventoPeer::FECHA_FIN);

		$criteria->addSelectColumn(EventoPeer::TIPO);

		$criteria->addSelectColumn(EventoPeer::FRECUENCIA);

		$criteria->addSelectColumn(EventoPeer::FRECUENCIA_INTERVALO);

		$criteria->addSelectColumn(EventoPeer::RECURRENCIA_FIN);

		$criteria->addSelectColumn(EventoPeer::RECURRENCIA_DIAS);

		$criteria->addSelectColumn(EventoPeer::ESTADO);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(EventoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EventoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(EventoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = EventoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return EventoPeer::populateObjects(EventoPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(EventoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			EventoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(Evento $obj, $key = null)
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
			if (is_object($value) && $value instanceof Evento) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Evento object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = EventoPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = EventoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = EventoPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				EventoPeer::addInstanceToPool($obj, $key);
			} 		}
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
		return EventoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(EventoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(EventoPeer::ID) && $criteria->keyContainsValue(EventoPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.EventoPeer::ID.')');
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
			$con = Propel::getConnection(EventoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(EventoPeer::ID);
			$selectCriteria->add(EventoPeer::ID, $criteria->remove(EventoPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(EventoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(EventoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EventoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												EventoPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof Evento) {
						EventoPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EventoPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								EventoPeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

						RelDivisionActividadDocentePeer::clearInstancePool();

						DocenteHorarioPeer::clearInstancePool();

						HorarioescolarPeer::clearInstancePool();

			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	public static function doValidate(Evento $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EventoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EventoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EventoPeer::DATABASE_NAME, EventoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EventoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = EventoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(EventoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(EventoPeer::DATABASE_NAME);
		$criteria->add(EventoPeer::ID, $pk);

		$v = EventoPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(EventoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(EventoPeer::DATABASE_NAME);
			$criteria->add(EventoPeer::ID, $pks, Criteria::IN);
			$objs = EventoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseEventoPeer::DATABASE_NAME)->addTableBuilder(BaseEventoPeer::TABLE_NAME, BaseEventoPeer::getMapBuilder());

