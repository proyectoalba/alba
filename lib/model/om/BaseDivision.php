<?php


abstract class BaseDivision extends BaseObject  implements Persistent {


  const PEER = 'DivisionPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_anio_id;

	
	protected $descripcion;

	
	protected $fk_turno_id;

	
	protected $fk_orientacion_id;

	
	protected $orden;

	
	protected $aAnio;

	
	protected $aTurno;

	
	protected $aOrientacion;

	
	protected $collRelAlumnoDivisions;

	
	private $lastRelAlumnoDivisionCriteria = null;

	
	protected $collRelDivisionActividadDocentes;

	
	private $lastRelDivisionActividadDocenteCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->fk_anio_id = 0;
		$this->fk_turno_id = 0;
		$this->orden = 0;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFkAnioId()
	{
		return $this->fk_anio_id;
	}

	
	public function getDescripcion()
	{
		return $this->descripcion;
	}

	
	public function getFkTurnoId()
	{
		return $this->fk_turno_id;
	}

	
	public function getFkOrientacionId()
	{
		return $this->fk_orientacion_id;
	}

	
	public function getOrden()
	{
		return $this->orden;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DivisionPeer::ID;
		}

		return $this;
	} 
	
	public function setFkAnioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_anio_id !== $v || $v === 0) {
			$this->fk_anio_id = $v;
			$this->modifiedColumns[] = DivisionPeer::FK_ANIO_ID;
		}

		if ($this->aAnio !== null && $this->aAnio->getId() !== $v) {
			$this->aAnio = null;
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
			$this->modifiedColumns[] = DivisionPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setFkTurnoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_turno_id !== $v || $v === 0) {
			$this->fk_turno_id = $v;
			$this->modifiedColumns[] = DivisionPeer::FK_TURNO_ID;
		}

		if ($this->aTurno !== null && $this->aTurno->getId() !== $v) {
			$this->aTurno = null;
		}

		return $this;
	} 
	
	public function setFkOrientacionId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_orientacion_id !== $v) {
			$this->fk_orientacion_id = $v;
			$this->modifiedColumns[] = DivisionPeer::FK_ORIENTACION_ID;
		}

		if ($this->aOrientacion !== null && $this->aOrientacion->getId() !== $v) {
			$this->aOrientacion = null;
		}

		return $this;
	} 
	
	public function setOrden($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->orden !== $v || $v === 0) {
			$this->orden = $v;
			$this->modifiedColumns[] = DivisionPeer::ORDEN;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(DivisionPeer::FK_ANIO_ID,DivisionPeer::FK_TURNO_ID,DivisionPeer::ORDEN))) {
				return false;
			}

			if ($this->fk_anio_id !== 0) {
				return false;
			}

			if ($this->fk_turno_id !== 0) {
				return false;
			}

			if ($this->orden !== 0) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_anio_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->descripcion = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->fk_turno_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->fk_orientacion_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->orden = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Division object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aAnio !== null && $this->fk_anio_id !== $this->aAnio->getId()) {
			$this->aAnio = null;
		}
		if ($this->aTurno !== null && $this->fk_turno_id !== $this->aTurno->getId()) {
			$this->aTurno = null;
		}
		if ($this->aOrientacion !== null && $this->fk_orientacion_id !== $this->aOrientacion->getId()) {
			$this->aOrientacion = null;
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
			$con = Propel::getConnection(DivisionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DivisionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aAnio = null;
			$this->aTurno = null;
			$this->aOrientacion = null;
			$this->collRelAlumnoDivisions = null;
			$this->lastRelAlumnoDivisionCriteria = null;

			$this->collRelDivisionActividadDocentes = null;
			$this->lastRelDivisionActividadDocenteCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DivisionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DivisionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DivisionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			DivisionPeer::addInstanceToPool($this);
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

												
			if ($this->aAnio !== null) {
				if ($this->aAnio->isModified() || $this->aAnio->isNew()) {
					$affectedRows += $this->aAnio->save($con);
				}
				$this->setAnio($this->aAnio);
			}

			if ($this->aTurno !== null) {
				if ($this->aTurno->isModified() || $this->aTurno->isNew()) {
					$affectedRows += $this->aTurno->save($con);
				}
				$this->setTurno($this->aTurno);
			}

			if ($this->aOrientacion !== null) {
				if ($this->aOrientacion->isModified() || $this->aOrientacion->isNew()) {
					$affectedRows += $this->aOrientacion->save($con);
				}
				$this->setOrientacion($this->aOrientacion);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = DivisionPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DivisionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DivisionPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collRelAlumnoDivisions !== null) {
				foreach ($this->collRelAlumnoDivisions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelDivisionActividadDocentes !== null) {
				foreach ($this->collRelDivisionActividadDocentes as $referrerFK) {
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


												
			if ($this->aAnio !== null) {
				if (!$this->aAnio->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAnio->getValidationFailures());
				}
			}

			if ($this->aTurno !== null) {
				if (!$this->aTurno->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTurno->getValidationFailures());
				}
			}

			if ($this->aOrientacion !== null) {
				if (!$this->aOrientacion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOrientacion->getValidationFailures());
				}
			}


			if (($retval = DivisionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelAlumnoDivisions !== null) {
					foreach ($this->collRelAlumnoDivisions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelDivisionActividadDocentes !== null) {
					foreach ($this->collRelDivisionActividadDocentes as $referrerFK) {
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
		$pos = DivisionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkAnioId();
				break;
			case 2:
				return $this->getDescripcion();
				break;
			case 3:
				return $this->getFkTurnoId();
				break;
			case 4:
				return $this->getFkOrientacionId();
				break;
			case 5:
				return $this->getOrden();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DivisionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkAnioId(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getFkTurnoId(),
			$keys[4] => $this->getFkOrientacionId(),
			$keys[5] => $this->getOrden(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DivisionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkAnioId($value);
				break;
			case 2:
				$this->setDescripcion($value);
				break;
			case 3:
				$this->setFkTurnoId($value);
				break;
			case 4:
				$this->setFkOrientacionId($value);
				break;
			case 5:
				$this->setOrden($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DivisionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkAnioId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkTurnoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFkOrientacionId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOrden($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DivisionPeer::DATABASE_NAME);

		if ($this->isColumnModified(DivisionPeer::ID)) $criteria->add(DivisionPeer::ID, $this->id);
		if ($this->isColumnModified(DivisionPeer::FK_ANIO_ID)) $criteria->add(DivisionPeer::FK_ANIO_ID, $this->fk_anio_id);
		if ($this->isColumnModified(DivisionPeer::DESCRIPCION)) $criteria->add(DivisionPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(DivisionPeer::FK_TURNO_ID)) $criteria->add(DivisionPeer::FK_TURNO_ID, $this->fk_turno_id);
		if ($this->isColumnModified(DivisionPeer::FK_ORIENTACION_ID)) $criteria->add(DivisionPeer::FK_ORIENTACION_ID, $this->fk_orientacion_id);
		if ($this->isColumnModified(DivisionPeer::ORDEN)) $criteria->add(DivisionPeer::ORDEN, $this->orden);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DivisionPeer::DATABASE_NAME);

		$criteria->add(DivisionPeer::ID, $this->id);

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

		$copyObj->setFkAnioId($this->fk_anio_id);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setFkTurnoId($this->fk_turno_id);

		$copyObj->setFkOrientacionId($this->fk_orientacion_id);

		$copyObj->setOrden($this->orden);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getRelAlumnoDivisions() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelAlumnoDivision($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRelDivisionActividadDocentes() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelDivisionActividadDocente($relObj->copy($deepCopy));
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
			self::$peer = new DivisionPeer();
		}
		return self::$peer;
	}

	
	public function setAnio(Anio $v = null)
	{
		if ($v === null) {
			$this->setFkAnioId(0);
		} else {
			$this->setFkAnioId($v->getId());
		}

		$this->aAnio = $v;

						if ($v !== null) {
			$v->addDivision($this);
		}

		return $this;
	}


	
	public function getAnio(PropelPDO $con = null)
	{
		if ($this->aAnio === null && ($this->fk_anio_id !== null)) {
			$c = new Criteria(AnioPeer::DATABASE_NAME);
			$c->add(AnioPeer::ID, $this->fk_anio_id);
			$this->aAnio = AnioPeer::doSelectOne($c, $con);
			
		}
		return $this->aAnio;
	}

	
	public function setTurno(Turno $v = null)
	{
		if ($v === null) {
			$this->setFkTurnoId(0);
		} else {
			$this->setFkTurnoId($v->getId());
		}

		$this->aTurno = $v;

						if ($v !== null) {
			$v->addDivision($this);
		}

		return $this;
	}


	
	public function getTurno(PropelPDO $con = null)
	{
		if ($this->aTurno === null && ($this->fk_turno_id !== null)) {
			$c = new Criteria(TurnoPeer::DATABASE_NAME);
			$c->add(TurnoPeer::ID, $this->fk_turno_id);
			$this->aTurno = TurnoPeer::doSelectOne($c, $con);
			
		}
		return $this->aTurno;
	}

	
	public function setOrientacion(Orientacion $v = null)
	{
		if ($v === null) {
			$this->setFkOrientacionId(NULL);
		} else {
			$this->setFkOrientacionId($v->getId());
		}

		$this->aOrientacion = $v;

						if ($v !== null) {
			$v->addDivision($this);
		}

		return $this;
	}


	
	public function getOrientacion(PropelPDO $con = null)
	{
		if ($this->aOrientacion === null && ($this->fk_orientacion_id !== null)) {
			$c = new Criteria(OrientacionPeer::DATABASE_NAME);
			$c->add(OrientacionPeer::ID, $this->fk_orientacion_id);
			$this->aOrientacion = OrientacionPeer::doSelectOne($c, $con);
			
		}
		return $this->aOrientacion;
	}

	
	public function clearRelAlumnoDivisions()
	{
		$this->collRelAlumnoDivisions = null; 	}

	
	public function initRelAlumnoDivisions()
	{
		$this->collRelAlumnoDivisions = array();
	}

	
	public function getRelAlumnoDivisions($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DivisionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAlumnoDivisions === null) {
			if ($this->isNew()) {
			   $this->collRelAlumnoDivisions = array();
			} else {

				$criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->id);

				RelAlumnoDivisionPeer::addSelectColumns($criteria);
				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->id);

				RelAlumnoDivisionPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelAlumnoDivisionCriteria) || !$this->lastRelAlumnoDivisionCriteria->equals($criteria)) {
					$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelAlumnoDivisionCriteria = $criteria;
		return $this->collRelAlumnoDivisions;
	}

	
	public function countRelAlumnoDivisions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DivisionPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelAlumnoDivisions === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->id);

				$count = RelAlumnoDivisionPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->id);

				if (!isset($this->lastRelAlumnoDivisionCriteria) || !$this->lastRelAlumnoDivisionCriteria->equals($criteria)) {
					$count = RelAlumnoDivisionPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelAlumnoDivisions);
				}
			} else {
				$count = count($this->collRelAlumnoDivisions);
			}
		}
		return $count;
	}

	
	public function addRelAlumnoDivision(RelAlumnoDivision $l)
	{
		if ($this->collRelAlumnoDivisions === null) {
			$this->initRelAlumnoDivisions();
		}
		if (!in_array($l, $this->collRelAlumnoDivisions, true)) { 			array_push($this->collRelAlumnoDivisions, $l);
			$l->setDivision($this);
		}
	}


	
	public function getRelAlumnoDivisionsJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DivisionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAlumnoDivisions === null) {
			if ($this->isNew()) {
				$this->collRelAlumnoDivisions = array();
			} else {

				$criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->id);

				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->id);

			if (!isset($this->lastRelAlumnoDivisionCriteria) || !$this->lastRelAlumnoDivisionCriteria->equals($criteria)) {
				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelAlumnoDivisionCriteria = $criteria;

		return $this->collRelAlumnoDivisions;
	}

	
	public function clearRelDivisionActividadDocentes()
	{
		$this->collRelDivisionActividadDocentes = null; 	}

	
	public function initRelDivisionActividadDocentes()
	{
		$this->collRelDivisionActividadDocentes = array();
	}

	
	public function getRelDivisionActividadDocentes($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DivisionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
			   $this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->id);

				RelDivisionActividadDocentePeer::addSelectColumns($criteria);
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->id);

				RelDivisionActividadDocentePeer::addSelectColumns($criteria);
				if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
					$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;
		return $this->collRelDivisionActividadDocentes;
	}

	
	public function countRelDivisionActividadDocentes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DivisionPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->id);

				$count = RelDivisionActividadDocentePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->id);

				if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
					$count = RelDivisionActividadDocentePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelDivisionActividadDocentes);
				}
			} else {
				$count = count($this->collRelDivisionActividadDocentes);
			}
		}
		return $count;
	}

	
	public function addRelDivisionActividadDocente(RelDivisionActividadDocente $l)
	{
		if ($this->collRelDivisionActividadDocentes === null) {
			$this->initRelDivisionActividadDocentes();
		}
		if (!in_array($l, $this->collRelDivisionActividadDocentes, true)) { 			array_push($this->collRelDivisionActividadDocentes, $l);
			$l->setDivision($this);
		}
	}


	
	public function getRelDivisionActividadDocentesJoinActividad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DivisionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->id);

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->id);

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}


	
	public function getRelDivisionActividadDocentesJoinDocente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DivisionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->id);

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDocente($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->id);

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDocente($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}


	
	public function getRelDivisionActividadDocentesJoinEvento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DivisionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->id);

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinEvento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->id);

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinEvento($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collRelAlumnoDivisions) {
				foreach ((array) $this->collRelAlumnoDivisions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRelDivisionActividadDocentes) {
				foreach ((array) $this->collRelDivisionActividadDocentes as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collRelAlumnoDivisions = null;
		$this->collRelDivisionActividadDocentes = null;
			$this->aAnio = null;
			$this->aTurno = null;
			$this->aOrientacion = null;
	}

} 