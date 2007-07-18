<?php


abstract class BaseCiclolectivo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fk_establecimiento_id;


	
	protected $fecha_inicio;


	
	protected $fecha_fin;


	
	protected $descripcion = 'null';


	
	protected $actual = false;

	
	protected $aEstablecimiento;

	
	protected $collTurnoss;

	
	protected $lastTurnosCriteria = null;

	
	protected $collPeriodos;

	
	protected $lastPeriodoCriteria = null;

	
	protected $collFeriados;

	
	protected $lastFeriadoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFkEstablecimientoId()
	{

		return $this->fk_establecimiento_id;
	}

	
	public function getFechaInicio($format = 'Y-m-d H:i:s')
	{

		if ($this->fecha_inicio === null || $this->fecha_inicio === '') {
			return null;
		} elseif (!is_int($this->fecha_inicio)) {
						$ts = strtotime($this->fecha_inicio);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha_inicio] as date/time value: " . var_export($this->fecha_inicio, true));
			}
		} else {
			$ts = $this->fecha_inicio;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFechaFin($format = 'Y-m-d H:i:s')
	{

		if ($this->fecha_fin === null || $this->fecha_fin === '') {
			return null;
		} elseif (!is_int($this->fecha_fin)) {
						$ts = strtotime($this->fecha_fin);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha_fin] as date/time value: " . var_export($this->fecha_fin, true));
			}
		} else {
			$ts = $this->fecha_fin;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDescripcion()
	{

		return $this->descripcion;
	}

	
	public function getActual()
	{

		return $this->actual;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CiclolectivoPeer::ID;
		}

	} 
	
	public function setFkEstablecimientoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_establecimiento_id !== $v) {
			$this->fk_establecimiento_id = $v;
			$this->modifiedColumns[] = CiclolectivoPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
		}

	} 
	
	public function setFechaInicio($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha_inicio] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_inicio !== $ts) {
			$this->fecha_inicio = $ts;
			$this->modifiedColumns[] = CiclolectivoPeer::FECHA_INICIO;
		}

	} 
	
	public function setFechaFin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha_fin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_fin !== $ts) {
			$this->fecha_fin = $ts;
			$this->modifiedColumns[] = CiclolectivoPeer::FECHA_FIN;
		}

	} 
	
	public function setDescripcion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descripcion !== $v || $v === 'null') {
			$this->descripcion = $v;
			$this->modifiedColumns[] = CiclolectivoPeer::DESCRIPCION;
		}

	} 
	
	public function setActual($v)
	{

		if ($this->actual !== $v || $v === false) {
			$this->actual = $v;
			$this->modifiedColumns[] = CiclolectivoPeer::ACTUAL;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fk_establecimiento_id = $rs->getInt($startcol + 1);

			$this->fecha_inicio = $rs->getTimestamp($startcol + 2, null);

			$this->fecha_fin = $rs->getTimestamp($startcol + 3, null);

			$this->descripcion = $rs->getString($startcol + 4);

			$this->actual = $rs->getBoolean($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ciclolectivo object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CiclolectivoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aEstablecimiento !== null) {
				if ($this->aEstablecimiento->isModified()) {
					$affectedRows += $this->aEstablecimiento->save($con);
				}
				$this->setEstablecimiento($this->aEstablecimiento);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CiclolectivoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CiclolectivoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collTurnoss !== null) {
				foreach($this->collTurnoss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPeriodos !== null) {
				foreach($this->collPeriodos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFeriados !== null) {
				foreach($this->collFeriados as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aEstablecimiento !== null) {
				if (!$this->aEstablecimiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstablecimiento->getValidationFailures());
				}
			}


			if (($retval = CiclolectivoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collTurnoss !== null) {
					foreach($this->collTurnoss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPeriodos !== null) {
					foreach($this->collPeriodos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFeriados !== null) {
					foreach($this->collFeriados as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CiclolectivoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFkEstablecimientoId();
				break;
			case 2:
				return $this->getFechaInicio();
				break;
			case 3:
				return $this->getFechaFin();
				break;
			case 4:
				return $this->getDescripcion();
				break;
			case 5:
				return $this->getActual();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CiclolectivoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkEstablecimientoId(),
			$keys[2] => $this->getFechaInicio(),
			$keys[3] => $this->getFechaFin(),
			$keys[4] => $this->getDescripcion(),
			$keys[5] => $this->getActual(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CiclolectivoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkEstablecimientoId($value);
				break;
			case 2:
				$this->setFechaInicio($value);
				break;
			case 3:
				$this->setFechaFin($value);
				break;
			case 4:
				$this->setDescripcion($value);
				break;
			case 5:
				$this->setActual($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CiclolectivoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkEstablecimientoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFechaInicio($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFechaFin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescripcion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setActual($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CiclolectivoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CiclolectivoPeer::ID)) $criteria->add(CiclolectivoPeer::ID, $this->id);
		if ($this->isColumnModified(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(CiclolectivoPeer::FECHA_INICIO)) $criteria->add(CiclolectivoPeer::FECHA_INICIO, $this->fecha_inicio);
		if ($this->isColumnModified(CiclolectivoPeer::FECHA_FIN)) $criteria->add(CiclolectivoPeer::FECHA_FIN, $this->fecha_fin);
		if ($this->isColumnModified(CiclolectivoPeer::DESCRIPCION)) $criteria->add(CiclolectivoPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(CiclolectivoPeer::ACTUAL)) $criteria->add(CiclolectivoPeer::ACTUAL, $this->actual);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CiclolectivoPeer::DATABASE_NAME);

		$criteria->add(CiclolectivoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFkEstablecimientoId($this->fk_establecimiento_id);

		$copyObj->setFechaInicio($this->fecha_inicio);

		$copyObj->setFechaFin($this->fecha_fin);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setActual($this->actual);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getTurnoss() as $relObj) {
				$copyObj->addTurnos($relObj->copy($deepCopy));
			}

			foreach($this->getPeriodos() as $relObj) {
				$copyObj->addPeriodo($relObj->copy($deepCopy));
			}

			foreach($this->getFeriados() as $relObj) {
				$copyObj->addFeriado($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CiclolectivoPeer();
		}
		return self::$peer;
	}

	
	public function setEstablecimiento($v)
	{


		if ($v === null) {
			$this->setFkEstablecimientoId(NULL);
		} else {
			$this->setFkEstablecimientoId($v->getId());
		}


		$this->aEstablecimiento = $v;
	}


	
	public function getEstablecimiento($con = null)
	{
				include_once 'lib/model/om/BaseEstablecimientoPeer.php';

		if ($this->aEstablecimiento === null && ($this->fk_establecimiento_id !== null)) {

			$this->aEstablecimiento = EstablecimientoPeer::retrieveByPK($this->fk_establecimiento_id, $con);

			
		}
		return $this->aEstablecimiento;
	}

	
	public function initTurnoss()
	{
		if ($this->collTurnoss === null) {
			$this->collTurnoss = array();
		}
	}

	
	public function getTurnoss($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTurnosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTurnoss === null) {
			if ($this->isNew()) {
			   $this->collTurnoss = array();
			} else {

				$criteria->add(TurnosPeer::FK_CICLOLECTIVO_ID, $this->getId());

				TurnosPeer::addSelectColumns($criteria);
				$this->collTurnoss = TurnosPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TurnosPeer::FK_CICLOLECTIVO_ID, $this->getId());

				TurnosPeer::addSelectColumns($criteria);
				if (!isset($this->lastTurnosCriteria) || !$this->lastTurnosCriteria->equals($criteria)) {
					$this->collTurnoss = TurnosPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTurnosCriteria = $criteria;
		return $this->collTurnoss;
	}

	
	public function countTurnoss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTurnosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TurnosPeer::FK_CICLOLECTIVO_ID, $this->getId());

		return TurnosPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTurnos(Turnos $l)
	{
		$this->collTurnoss[] = $l;
		$l->setCiclolectivo($this);
	}

	
	public function initPeriodos()
	{
		if ($this->collPeriodos === null) {
			$this->collPeriodos = array();
		}
	}

	
	public function getPeriodos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePeriodoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPeriodos === null) {
			if ($this->isNew()) {
			   $this->collPeriodos = array();
			} else {

				$criteria->add(PeriodoPeer::FK_CICLOLECTIVO_ID, $this->getId());

				PeriodoPeer::addSelectColumns($criteria);
				$this->collPeriodos = PeriodoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PeriodoPeer::FK_CICLOLECTIVO_ID, $this->getId());

				PeriodoPeer::addSelectColumns($criteria);
				if (!isset($this->lastPeriodoCriteria) || !$this->lastPeriodoCriteria->equals($criteria)) {
					$this->collPeriodos = PeriodoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPeriodoCriteria = $criteria;
		return $this->collPeriodos;
	}

	
	public function countPeriodos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasePeriodoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PeriodoPeer::FK_CICLOLECTIVO_ID, $this->getId());

		return PeriodoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPeriodo(Periodo $l)
	{
		$this->collPeriodos[] = $l;
		$l->setCiclolectivo($this);
	}

	
	public function initFeriados()
	{
		if ($this->collFeriados === null) {
			$this->collFeriados = array();
		}
	}

	
	public function getFeriados($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFeriadoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFeriados === null) {
			if ($this->isNew()) {
			   $this->collFeriados = array();
			} else {

				$criteria->add(FeriadoPeer::FK_CICLOLECTIVO_ID, $this->getId());

				FeriadoPeer::addSelectColumns($criteria);
				$this->collFeriados = FeriadoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FeriadoPeer::FK_CICLOLECTIVO_ID, $this->getId());

				FeriadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastFeriadoCriteria) || !$this->lastFeriadoCriteria->equals($criteria)) {
					$this->collFeriados = FeriadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFeriadoCriteria = $criteria;
		return $this->collFeriados;
	}

	
	public function countFeriados($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFeriadoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FeriadoPeer::FK_CICLOLECTIVO_ID, $this->getId());

		return FeriadoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFeriado(Feriado $l)
	{
		$this->collFeriados[] = $l;
		$l->setCiclolectivo($this);
	}

} 