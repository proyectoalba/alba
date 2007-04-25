<?php


abstract class BaseEventoPeer {

	
	const DATABASE_NAME = 'alba';

	
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

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Titulo', 'FechaInicio', 'FechaFin', 'Tipo', 'Frecuencia', 'FrecuenciaIntervalo', 'RecurrenciaFin', 'RecurrenciaDias', 'Estado', ),
		BasePeer::TYPE_COLNAME => array (EventoPeer::ID, EventoPeer::TITULO, EventoPeer::FECHA_INICIO, EventoPeer::FECHA_FIN, EventoPeer::TIPO, EventoPeer::FRECUENCIA, EventoPeer::FRECUENCIA_INTERVALO, EventoPeer::RECURRENCIA_FIN, EventoPeer::RECURRENCIA_DIAS, EventoPeer::ESTADO, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'titulo', 'fecha_inicio', 'fecha_fin', 'tipo', 'frecuencia', 'frecuencia_intervalo', 'recurrencia_fin', 'recurrencia_dias', 'estado', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Titulo' => 1, 'FechaInicio' => 2, 'FechaFin' => 3, 'Tipo' => 4, 'Frecuencia' => 5, 'FrecuenciaIntervalo' => 6, 'RecurrenciaFin' => 7, 'RecurrenciaDias' => 8, 'Estado' => 9, ),
		BasePeer::TYPE_COLNAME => array (EventoPeer::ID => 0, EventoPeer::TITULO => 1, EventoPeer::FECHA_INICIO => 2, EventoPeer::FECHA_FIN => 3, EventoPeer::TIPO => 4, EventoPeer::FRECUENCIA => 5, EventoPeer::FRECUENCIA_INTERVALO => 6, EventoPeer::RECURRENCIA_FIN => 7, EventoPeer::RECURRENCIA_DIAS => 8, EventoPeer::ESTADO => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'titulo' => 1, 'fecha_inicio' => 2, 'fecha_fin' => 3, 'tipo' => 4, 'frecuencia' => 5, 'frecuencia_intervalo' => 6, 'recurrencia_fin' => 7, 'recurrencia_dias' => 8, 'estado' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EventoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EventoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EventoPeer::getTableMap();
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

	const COUNT = 'COUNT(evento.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT evento.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EventoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EventoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EventoPeer::doSelectRS($criteria, $con);
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
		$objects = EventoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EventoPeer::populateObjects(EventoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EventoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EventoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return EventoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(EventoPeer::ID); 

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
			$comparison = $criteria->getComparison(EventoPeer::ID);
			$selectCriteria->add(EventoPeer::ID, $criteria->remove(EventoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(EventoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EventoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Evento) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EventoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Evento $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EventoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EventoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EventoPeer::DATABASE_NAME, EventoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EventoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(EventoPeer::DATABASE_NAME);

		$criteria->add(EventoPeer::ID, $pk);


		$v = EventoPeer::doSelect($criteria, $con);

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
			$criteria->add(EventoPeer::ID, $pks, Criteria::IN);
			$objs = EventoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEventoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EventoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EventoMapBuilder');
}
