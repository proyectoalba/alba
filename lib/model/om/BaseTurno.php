<?php


abstract class BaseTurno extends BaseObject  implements Persistent {


  const PEER = 'TurnoPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_ciclolectivo_id;

	
	protected $hora_inicio;

	
	protected $hora_fin;

	
	protected $descripcion;

	
	protected $aCiclolectivo;

	
	protected $collDivisions;

	
	private $lastDivisionCriteria = null;

	
	protected $collHorarioescolars;

	
	private $lastHorarioescolarCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFkCiclolectivoId()
	{
		return $this->fk_ciclolectivo_id;
	}

	
	public function getHoraInicio($format = 'H:i:s')
	{
		if ($this->hora_inicio === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->hora_inicio);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->hora_inicio, true), $x);
		}

		if ($format === null) {
						return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	
	public function getHoraFin($format = 'H:i:s')
	{
		if ($this->hora_fin === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->hora_fin);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->hora_fin, true), $x);
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

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TurnoPeer::ID;
		}

		return $this;
	} 
	
	public function setFkCiclolectivoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_ciclolectivo_id !== $v) {
			$this->fk_ciclolectivo_id = $v;
			$this->modifiedColumns[] = TurnoPeer::FK_CICLOLECTIVO_ID;
		}

		if ($this->aCiclolectivo !== null && $this->aCiclolectivo->getId() !== $v) {
			$this->aCiclolectivo = null;
		}

		return $this;
	} 
	
	public function setHoraInicio($v)
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

		if ( $this->hora_inicio !== null || $dt !== null ) {
			
			$currNorm = ($this->hora_inicio !== null && $tmpDt = new DateTime($this->hora_inicio)) ? $tmpDt->format('H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('H:i:s') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->hora_inicio = ($dt ? $dt->format('H:i:s') : null);
				$this->modifiedColumns[] = TurnoPeer::HORA_INICIO;
			}
		} 
		return $this;
	} 
	
	public function setHoraFin($v)
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

		if ( $this->hora_fin !== null || $dt !== null ) {
			
			$currNorm = ($this->hora_fin !== null && $tmpDt = new DateTime($this->hora_fin)) ? $tmpDt->format('H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('H:i:s') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->hora_fin = ($dt ? $dt->format('H:i:s') : null);
				$this->modifiedColumns[] = TurnoPeer::HORA_FIN;
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
			$this->modifiedColumns[] = TurnoPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array())) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_ciclolectivo_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->hora_inicio = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->hora_fin = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->descripcion = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Turno object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aCiclolectivo !== null && $this->fk_ciclolectivo_id !== $this->aCiclolectivo->getId()) {
			$this->aCiclolectivo = null;
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
			$con = Propel::getConnection(TurnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = TurnoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aCiclolectivo = null;
			$this->collDivisions = null;
			$this->lastDivisionCriteria = null;

			$this->collHorarioescolars = null;
			$this->lastHorarioescolarCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TurnoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			TurnoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TurnoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			TurnoPeer::addInstanceToPool($this);
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

												
			if ($this->aCiclolectivo !== null) {
				if ($this->aCiclolectivo->isModified() || $this->aCiclolectivo->isNew()) {
					$affectedRows += $this->aCiclolectivo->save($con);
				}
				$this->setCiclolectivo($this->aCiclolectivo);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = TurnoPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TurnoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TurnoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collDivisions !== null) {
				foreach ($this->collDivisions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collHorarioescolars !== null) {
				foreach ($this->collHorarioescolars as $referrerFK) {
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


												
			if ($this->aCiclolectivo !== null) {
				if (!$this->aCiclolectivo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCiclolectivo->getValidationFailures());
				}
			}


			if (($retval = TurnoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDivisions !== null) {
					foreach ($this->collDivisions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collHorarioescolars !== null) {
					foreach ($this->collHorarioescolars as $referrerFK) {
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
		$pos = TurnoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkCiclolectivoId();
				break;
			case 2:
				return $this->getHoraInicio();
				break;
			case 3:
				return $this->getHoraFin();
				break;
			case 4:
				return $this->getDescripcion();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = TurnoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkCiclolectivoId(),
			$keys[2] => $this->getHoraInicio(),
			$keys[3] => $this->getHoraFin(),
			$keys[4] => $this->getDescripcion(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TurnoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkCiclolectivoId($value);
				break;
			case 2:
				$this->setHoraInicio($value);
				break;
			case 3:
				$this->setHoraFin($value);
				break;
			case 4:
				$this->setDescripcion($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TurnoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkCiclolectivoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHoraInicio($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHoraFin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescripcion($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TurnoPeer::DATABASE_NAME);

		if ($this->isColumnModified(TurnoPeer::ID)) $criteria->add(TurnoPeer::ID, $this->id);
		if ($this->isColumnModified(TurnoPeer::FK_CICLOLECTIVO_ID)) $criteria->add(TurnoPeer::FK_CICLOLECTIVO_ID, $this->fk_ciclolectivo_id);
		if ($this->isColumnModified(TurnoPeer::HORA_INICIO)) $criteria->add(TurnoPeer::HORA_INICIO, $this->hora_inicio);
		if ($this->isColumnModified(TurnoPeer::HORA_FIN)) $criteria->add(TurnoPeer::HORA_FIN, $this->hora_fin);
		if ($this->isColumnModified(TurnoPeer::DESCRIPCION)) $criteria->add(TurnoPeer::DESCRIPCION, $this->descripcion);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TurnoPeer::DATABASE_NAME);

		$criteria->add(TurnoPeer::ID, $this->id);

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

		$copyObj->setFkCiclolectivoId($this->fk_ciclolectivo_id);

		$copyObj->setHoraInicio($this->hora_inicio);

		$copyObj->setHoraFin($this->hora_fin);

		$copyObj->setDescripcion($this->descripcion);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getDivisions() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDivision($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getHorarioescolars() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addHorarioescolar($relObj->copy($deepCopy));
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
			self::$peer = new TurnoPeer();
		}
		return self::$peer;
	}

	
	public function setCiclolectivo(Ciclolectivo $v = null)
	{
		if ($v === null) {
			$this->setFkCiclolectivoId(NULL);
		} else {
			$this->setFkCiclolectivoId($v->getId());
		}

		$this->aCiclolectivo = $v;

						if ($v !== null) {
			$v->addTurno($this);
		}

		return $this;
	}


	
	public function getCiclolectivo(PropelPDO $con = null)
	{
		if ($this->aCiclolectivo === null && ($this->fk_ciclolectivo_id !== null)) {
			$c = new Criteria(CiclolectivoPeer::DATABASE_NAME);
			$c->add(CiclolectivoPeer::ID, $this->fk_ciclolectivo_id);
			$this->aCiclolectivo = CiclolectivoPeer::doSelectOne($c, $con);
			
		}
		return $this->aCiclolectivo;
	}

	
	public function clearDivisions()
	{
		$this->collDivisions = null; 	}

	
	public function initDivisions()
	{
		$this->collDivisions = array();
	}

	
	public function getDivisions($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TurnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDivisions === null) {
			if ($this->isNew()) {
			   $this->collDivisions = array();
			} else {

				$criteria->add(DivisionPeer::FK_TURNO_ID, $this->id);

				DivisionPeer::addSelectColumns($criteria);
				$this->collDivisions = DivisionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DivisionPeer::FK_TURNO_ID, $this->id);

				DivisionPeer::addSelectColumns($criteria);
				if (!isset($this->lastDivisionCriteria) || !$this->lastDivisionCriteria->equals($criteria)) {
					$this->collDivisions = DivisionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDivisionCriteria = $criteria;
		return $this->collDivisions;
	}

	
	public function countDivisions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TurnoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDivisions === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DivisionPeer::FK_TURNO_ID, $this->id);

				$count = DivisionPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DivisionPeer::FK_TURNO_ID, $this->id);

				if (!isset($this->lastDivisionCriteria) || !$this->lastDivisionCriteria->equals($criteria)) {
					$count = DivisionPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDivisions);
				}
			} else {
				$count = count($this->collDivisions);
			}
		}
		return $count;
	}

	
	public function addDivision(Division $l)
	{
		if ($this->collDivisions === null) {
			$this->initDivisions();
		}
		if (!in_array($l, $this->collDivisions, true)) { 			array_push($this->collDivisions, $l);
			$l->setTurno($this);
		}
	}


	
	public function getDivisionsJoinAnio($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TurnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDivisions === null) {
			if ($this->isNew()) {
				$this->collDivisions = array();
			} else {

				$criteria->add(DivisionPeer::FK_TURNO_ID, $this->id);

				$this->collDivisions = DivisionPeer::doSelectJoinAnio($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DivisionPeer::FK_TURNO_ID, $this->id);

			if (!isset($this->lastDivisionCriteria) || !$this->lastDivisionCriteria->equals($criteria)) {
				$this->collDivisions = DivisionPeer::doSelectJoinAnio($criteria, $con, $join_behavior);
			}
		}
		$this->lastDivisionCriteria = $criteria;

		return $this->collDivisions;
	}


	
	public function getDivisionsJoinOrientacion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TurnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDivisions === null) {
			if ($this->isNew()) {
				$this->collDivisions = array();
			} else {

				$criteria->add(DivisionPeer::FK_TURNO_ID, $this->id);

				$this->collDivisions = DivisionPeer::doSelectJoinOrientacion($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DivisionPeer::FK_TURNO_ID, $this->id);

			if (!isset($this->lastDivisionCriteria) || !$this->lastDivisionCriteria->equals($criteria)) {
				$this->collDivisions = DivisionPeer::doSelectJoinOrientacion($criteria, $con, $join_behavior);
			}
		}
		$this->lastDivisionCriteria = $criteria;

		return $this->collDivisions;
	}

	
	public function clearHorarioescolars()
	{
		$this->collHorarioescolars = null; 	}

	
	public function initHorarioescolars()
	{
		$this->collHorarioescolars = array();
	}

	
	public function getHorarioescolars($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TurnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
			   $this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->id);

				HorarioescolarPeer::addSelectColumns($criteria);
				$this->collHorarioescolars = HorarioescolarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->id);

				HorarioescolarPeer::addSelectColumns($criteria);
				if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
					$this->collHorarioescolars = HorarioescolarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;
		return $this->collHorarioescolars;
	}

	
	public function countHorarioescolars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TurnoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->id);

				$count = HorarioescolarPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->id);

				if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
					$count = HorarioescolarPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collHorarioescolars);
				}
			} else {
				$count = count($this->collHorarioescolars);
			}
		}
		return $count;
	}

	
	public function addHorarioescolar(Horarioescolar $l)
	{
		if ($this->collHorarioescolars === null) {
			$this->initHorarioescolars();
		}
		if (!in_array($l, $this->collHorarioescolars, true)) { 			array_push($this->collHorarioescolars, $l);
			$l->setTurno($this);
		}
	}


	
	public function getHorarioescolarsJoinEvento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TurnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->id);

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEvento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->id);

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEvento($criteria, $con, $join_behavior);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}


	
	public function getHorarioescolarsJoinEstablecimiento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TurnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->id);

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->id);

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}


	
	public function getHorarioescolarsJoinHorarioescolartipo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TurnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->id);

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinHorarioescolartipo($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->id);

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinHorarioescolartipo($criteria, $con, $join_behavior);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collDivisions) {
				foreach ((array) $this->collDivisions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collHorarioescolars) {
				foreach ((array) $this->collHorarioescolars as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collDivisions = null;
		$this->collHorarioescolars = null;
			$this->aCiclolectivo = null;
	}

} 