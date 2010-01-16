<?php


abstract class BaseCiclolectivo extends BaseObject  implements Persistent {


  const PEER = 'CiclolectivoPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_establecimiento_id;

	
	protected $fecha_inicio;

	
	protected $fecha_fin;

	
	protected $descripcion;

	
	protected $actual;

	
	protected $aEstablecimiento;

	
	protected $collTurnos;

	
	private $lastTurnoCriteria = null;

	
	protected $collPeriodos;

	
	private $lastPeriodoCriteria = null;

	
	protected $collFeriados;

	
	private $lastFeriadoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->actual = false;
	}

	
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
		if ($this->fecha_inicio === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->fecha_inicio);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_inicio, true), $x);
		}

		if ($format === null) {
						return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	
	public function getFechaFin($format = 'Y-m-d H:i:s')
	{
		if ($this->fecha_fin === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->fecha_fin);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_fin, true), $x);
		}

		if ($format === null) {
						return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
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
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CiclolectivoPeer::ID;
		}

		return $this;
	} 
	
	public function setFkEstablecimientoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_establecimiento_id !== $v) {
			$this->fk_establecimiento_id = $v;
			$this->modifiedColumns[] = CiclolectivoPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
		}

		return $this;
	} 
	
	public function setFechaInicio($v)
	{
						if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
									try {
				if (is_numeric($v)) { 					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
															$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->fecha_inicio !== null || $dt !== null ) {
			
			$currNorm = ($this->fecha_inicio !== null && $tmpDt = new DateTime($this->fecha_inicio)) ? $tmpDt->format('Y-m-d\\TH:i:sO') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d\\TH:i:sO') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->fecha_inicio = ($dt ? $dt->format('Y-m-d\\TH:i:sO') : null);
				$this->modifiedColumns[] = CiclolectivoPeer::FECHA_INICIO;
			}
		} 
		return $this;
	} 
	
	public function setFechaFin($v)
	{
						if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
									try {
				if (is_numeric($v)) { 					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
															$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->fecha_fin !== null || $dt !== null ) {
			
			$currNorm = ($this->fecha_fin !== null && $tmpDt = new DateTime($this->fecha_fin)) ? $tmpDt->format('Y-m-d\\TH:i:sO') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d\\TH:i:sO') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->fecha_fin = ($dt ? $dt->format('Y-m-d\\TH:i:sO') : null);
				$this->modifiedColumns[] = CiclolectivoPeer::FECHA_FIN;
			}
		} 
		return $this;
	} 
	
	public function setDescripcion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = CiclolectivoPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setActual($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->actual !== $v || $v === false) {
			$this->actual = $v;
			$this->modifiedColumns[] = CiclolectivoPeer::ACTUAL;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(CiclolectivoPeer::ACTUAL))) {
				return false;
			}

			if ($this->actual !== false) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_establecimiento_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->fecha_inicio = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->fecha_fin = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->descripcion = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->actual = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ciclolectivo object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aEstablecimiento !== null && $this->fk_establecimiento_id !== $this->aEstablecimiento->getId()) {
			$this->aEstablecimiento = null;
		}
	} 
	
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = CiclolectivoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aEstablecimiento = null;
			$this->collTurnos = null;
			$this->lastTurnoCriteria = null;

			$this->collPeriodos = null;
			$this->lastPeriodoCriteria = null;

			$this->collFeriados = null;
			$this->lastFeriadoCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			CiclolectivoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			CiclolectivoPeer::addInstanceToPool($this);
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

												
			if ($this->aEstablecimiento !== null) {
				if ($this->aEstablecimiento->isModified() || $this->aEstablecimiento->isNew()) {
					$affectedRows += $this->aEstablecimiento->save($con);
				}
				$this->setEstablecimiento($this->aEstablecimiento);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = CiclolectivoPeer::ID;
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

			if ($this->collTurnos !== null) {
				foreach ($this->collTurnos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPeriodos !== null) {
				foreach ($this->collPeriodos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFeriados !== null) {
				foreach ($this->collFeriados as $referrerFK) {
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


				if ($this->collTurnos !== null) {
					foreach ($this->collTurnos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPeriodos !== null) {
					foreach ($this->collPeriodos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFeriados !== null) {
					foreach ($this->collFeriados as $referrerFK) {
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
		$field = $this->getByPosition($pos);
		return $field;
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

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
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

			foreach ($this->getTurnos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addTurno($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPeriodos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addPeriodo($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getFeriados() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addFeriado($relObj->copy($deepCopy));
				}
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

	
	public function setEstablecimiento(Establecimiento $v = null)
	{
		if ($v === null) {
			$this->setFkEstablecimientoId(NULL);
		} else {
			$this->setFkEstablecimientoId($v->getId());
		}

		$this->aEstablecimiento = $v;

						if ($v !== null) {
			$v->addCiclolectivo($this);
		}

		return $this;
	}


	
	public function getEstablecimiento(PropelPDO $con = null)
	{
		if ($this->aEstablecimiento === null && ($this->fk_establecimiento_id !== null)) {
			$c = new Criteria(EstablecimientoPeer::DATABASE_NAME);
			$c->add(EstablecimientoPeer::ID, $this->fk_establecimiento_id);
			$this->aEstablecimiento = EstablecimientoPeer::doSelectOne($c, $con);
			
		}
		return $this->aEstablecimiento;
	}

	
	public function clearTurnos()
	{
		$this->collTurnos = null; 	}

	
	public function initTurnos()
	{
		$this->collTurnos = array();
	}

	
	public function getTurnos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CiclolectivoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTurnos === null) {
			if ($this->isNew()) {
			   $this->collTurnos = array();
			} else {

				$criteria->add(TurnoPeer::FK_CICLOLECTIVO_ID, $this->id);

				TurnoPeer::addSelectColumns($criteria);
				$this->collTurnos = TurnoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TurnoPeer::FK_CICLOLECTIVO_ID, $this->id);

				TurnoPeer::addSelectColumns($criteria);
				if (!isset($this->lastTurnoCriteria) || !$this->lastTurnoCriteria->equals($criteria)) {
					$this->collTurnos = TurnoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTurnoCriteria = $criteria;
		return $this->collTurnos;
	}

	
	public function countTurnos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CiclolectivoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collTurnos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(TurnoPeer::FK_CICLOLECTIVO_ID, $this->id);

				$count = TurnoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TurnoPeer::FK_CICLOLECTIVO_ID, $this->id);

				if (!isset($this->lastTurnoCriteria) || !$this->lastTurnoCriteria->equals($criteria)) {
					$count = TurnoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collTurnos);
				}
			} else {
				$count = count($this->collTurnos);
			}
		}
		return $count;
	}

	
	public function addTurno(Turno $l)
	{
		if ($this->collTurnos === null) {
			$this->initTurnos();
		}
		if (!in_array($l, $this->collTurnos, true)) { 			array_push($this->collTurnos, $l);
			$l->setCiclolectivo($this);
		}
	}

	
	public function clearPeriodos()
	{
		$this->collPeriodos = null; 	}

	
	public function initPeriodos()
	{
		$this->collPeriodos = array();
	}

	
	public function getPeriodos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CiclolectivoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPeriodos === null) {
			if ($this->isNew()) {
			   $this->collPeriodos = array();
			} else {

				$criteria->add(PeriodoPeer::FK_CICLOLECTIVO_ID, $this->id);

				PeriodoPeer::addSelectColumns($criteria);
				$this->collPeriodos = PeriodoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PeriodoPeer::FK_CICLOLECTIVO_ID, $this->id);

				PeriodoPeer::addSelectColumns($criteria);
				if (!isset($this->lastPeriodoCriteria) || !$this->lastPeriodoCriteria->equals($criteria)) {
					$this->collPeriodos = PeriodoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPeriodoCriteria = $criteria;
		return $this->collPeriodos;
	}

	
	public function countPeriodos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CiclolectivoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collPeriodos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(PeriodoPeer::FK_CICLOLECTIVO_ID, $this->id);

				$count = PeriodoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PeriodoPeer::FK_CICLOLECTIVO_ID, $this->id);

				if (!isset($this->lastPeriodoCriteria) || !$this->lastPeriodoCriteria->equals($criteria)) {
					$count = PeriodoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collPeriodos);
				}
			} else {
				$count = count($this->collPeriodos);
			}
		}
		return $count;
	}

	
	public function addPeriodo(Periodo $l)
	{
		if ($this->collPeriodos === null) {
			$this->initPeriodos();
		}
		if (!in_array($l, $this->collPeriodos, true)) { 			array_push($this->collPeriodos, $l);
			$l->setCiclolectivo($this);
		}
	}

	
	public function clearFeriados()
	{
		$this->collFeriados = null; 	}

	
	public function initFeriados()
	{
		$this->collFeriados = array();
	}

	
	public function getFeriados($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CiclolectivoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFeriados === null) {
			if ($this->isNew()) {
			   $this->collFeriados = array();
			} else {

				$criteria->add(FeriadoPeer::FK_CICLOLECTIVO_ID, $this->id);

				FeriadoPeer::addSelectColumns($criteria);
				$this->collFeriados = FeriadoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FeriadoPeer::FK_CICLOLECTIVO_ID, $this->id);

				FeriadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastFeriadoCriteria) || !$this->lastFeriadoCriteria->equals($criteria)) {
					$this->collFeriados = FeriadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFeriadoCriteria = $criteria;
		return $this->collFeriados;
	}

	
	public function countFeriados(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CiclolectivoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collFeriados === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(FeriadoPeer::FK_CICLOLECTIVO_ID, $this->id);

				$count = FeriadoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FeriadoPeer::FK_CICLOLECTIVO_ID, $this->id);

				if (!isset($this->lastFeriadoCriteria) || !$this->lastFeriadoCriteria->equals($criteria)) {
					$count = FeriadoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collFeriados);
				}
			} else {
				$count = count($this->collFeriados);
			}
		}
		return $count;
	}

	
	public function addFeriado(Feriado $l)
	{
		if ($this->collFeriados === null) {
			$this->initFeriados();
		}
		if (!in_array($l, $this->collFeriados, true)) { 			array_push($this->collFeriados, $l);
			$l->setCiclolectivo($this);
		}
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collTurnos) {
				foreach ((array) $this->collTurnos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPeriodos) {
				foreach ((array) $this->collPeriodos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collFeriados) {
				foreach ((array) $this->collFeriados as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collTurnos = null;
		$this->collPeriodos = null;
		$this->collFeriados = null;
			$this->aEstablecimiento = null;
	}

} 