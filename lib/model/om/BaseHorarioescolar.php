<?php


abstract class BaseHorarioescolar extends BaseObject  implements Persistent {


  const PEER = 'HorarioescolarPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $descripcion;

	
	protected $fk_evento_id;

	
	protected $fk_establecimiento_id;

	
	protected $fk_turno_id;

	
	protected $fk_horarioescolartipo_id;

	
	protected $aEvento;

	
	protected $aEstablecimiento;

	
	protected $aTurno;

	
	protected $aHorarioescolartipo;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->fk_establecimiento_id = 0;
		$this->fk_turno_id = 0;
		$this->fk_horarioescolartipo_id = 0;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getNombre()
	{
		return $this->nombre;
	}

	
	public function getDescripcion()
	{
		return $this->descripcion;
	}

	
	public function getFkEventoId()
	{
		return $this->fk_evento_id;
	}

	
	public function getFkEstablecimientoId()
	{
		return $this->fk_establecimiento_id;
	}

	
	public function getFkTurnoId()
	{
		return $this->fk_turno_id;
	}

	
	public function getFkHorarioescolartipoId()
	{
		return $this->fk_horarioescolartipo_id;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::ID;
		}

		return $this;
	} 
	
	public function setNombre($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::NOMBRE;
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
			$this->modifiedColumns[] = HorarioescolarPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setFkEventoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_evento_id !== $v) {
			$this->fk_evento_id = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::FK_EVENTO_ID;
		}

		if ($this->aEvento !== null && $this->aEvento->getId() !== $v) {
			$this->aEvento = null;
		}

		return $this;
	} 
	
	public function setFkEstablecimientoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_establecimiento_id !== $v || $v === 0) {
			$this->fk_establecimiento_id = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
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
			$this->modifiedColumns[] = HorarioescolarPeer::FK_TURNO_ID;
		}

		if ($this->aTurno !== null && $this->aTurno->getId() !== $v) {
			$this->aTurno = null;
		}

		return $this;
	} 
	
	public function setFkHorarioescolartipoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_horarioescolartipo_id !== $v || $v === 0) {
			$this->fk_horarioescolartipo_id = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID;
		}

		if ($this->aHorarioescolartipo !== null && $this->aHorarioescolartipo->getId() !== $v) {
			$this->aHorarioescolartipo = null;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID,HorarioescolarPeer::FK_TURNO_ID,HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID))) {
				return false;
			}

			if ($this->fk_establecimiento_id !== 0) {
				return false;
			}

			if ($this->fk_turno_id !== 0) {
				return false;
			}

			if ($this->fk_horarioescolartipo_id !== 0) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->nombre = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->descripcion = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->fk_evento_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->fk_establecimiento_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->fk_turno_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->fk_horarioescolartipo_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Horarioescolar object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aEvento !== null && $this->fk_evento_id !== $this->aEvento->getId()) {
			$this->aEvento = null;
		}
		if ($this->aEstablecimiento !== null && $this->fk_establecimiento_id !== $this->aEstablecimiento->getId()) {
			$this->aEstablecimiento = null;
		}
		if ($this->aTurno !== null && $this->fk_turno_id !== $this->aTurno->getId()) {
			$this->aTurno = null;
		}
		if ($this->aHorarioescolartipo !== null && $this->fk_horarioescolartipo_id !== $this->aHorarioescolartipo->getId()) {
			$this->aHorarioescolartipo = null;
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
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = HorarioescolarPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aEvento = null;
			$this->aEstablecimiento = null;
			$this->aTurno = null;
			$this->aHorarioescolartipo = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			HorarioescolarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			HorarioescolarPeer::addInstanceToPool($this);
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

												
			if ($this->aEvento !== null) {
				if ($this->aEvento->isModified() || $this->aEvento->isNew()) {
					$affectedRows += $this->aEvento->save($con);
				}
				$this->setEvento($this->aEvento);
			}

			if ($this->aEstablecimiento !== null) {
				if ($this->aEstablecimiento->isModified() || $this->aEstablecimiento->isNew()) {
					$affectedRows += $this->aEstablecimiento->save($con);
				}
				$this->setEstablecimiento($this->aEstablecimiento);
			}

			if ($this->aTurno !== null) {
				if ($this->aTurno->isModified() || $this->aTurno->isNew()) {
					$affectedRows += $this->aTurno->save($con);
				}
				$this->setTurno($this->aTurno);
			}

			if ($this->aHorarioescolartipo !== null) {
				if ($this->aHorarioescolartipo->isModified() || $this->aHorarioescolartipo->isNew()) {
					$affectedRows += $this->aHorarioescolartipo->save($con);
				}
				$this->setHorarioescolartipo($this->aHorarioescolartipo);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = HorarioescolarPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = HorarioescolarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HorarioescolarPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

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


												
			if ($this->aEvento !== null) {
				if (!$this->aEvento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEvento->getValidationFailures());
				}
			}

			if ($this->aEstablecimiento !== null) {
				if (!$this->aEstablecimiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstablecimiento->getValidationFailures());
				}
			}

			if ($this->aTurno !== null) {
				if (!$this->aTurno->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTurno->getValidationFailures());
				}
			}

			if ($this->aHorarioescolartipo !== null) {
				if (!$this->aHorarioescolartipo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aHorarioescolartipo->getValidationFailures());
				}
			}


			if (($retval = HorarioescolarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HorarioescolarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNombre();
				break;
			case 2:
				return $this->getDescripcion();
				break;
			case 3:
				return $this->getFkEventoId();
				break;
			case 4:
				return $this->getFkEstablecimientoId();
				break;
			case 5:
				return $this->getFkTurnoId();
				break;
			case 6:
				return $this->getFkHorarioescolartipoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = HorarioescolarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getFkEventoId(),
			$keys[4] => $this->getFkEstablecimientoId(),
			$keys[5] => $this->getFkTurnoId(),
			$keys[6] => $this->getFkHorarioescolartipoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HorarioescolarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNombre($value);
				break;
			case 2:
				$this->setDescripcion($value);
				break;
			case 3:
				$this->setFkEventoId($value);
				break;
			case 4:
				$this->setFkEstablecimientoId($value);
				break;
			case 5:
				$this->setFkTurnoId($value);
				break;
			case 6:
				$this->setFkHorarioescolartipoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HorarioescolarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkEventoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFkEstablecimientoId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFkTurnoId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFkHorarioescolartipoId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HorarioescolarPeer::DATABASE_NAME);

		if ($this->isColumnModified(HorarioescolarPeer::ID)) $criteria->add(HorarioescolarPeer::ID, $this->id);
		if ($this->isColumnModified(HorarioescolarPeer::NOMBRE)) $criteria->add(HorarioescolarPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(HorarioescolarPeer::DESCRIPCION)) $criteria->add(HorarioescolarPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(HorarioescolarPeer::FK_EVENTO_ID)) $criteria->add(HorarioescolarPeer::FK_EVENTO_ID, $this->fk_evento_id);
		if ($this->isColumnModified(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(HorarioescolarPeer::FK_TURNO_ID)) $criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->fk_turno_id);
		if ($this->isColumnModified(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID)) $criteria->add(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, $this->fk_horarioescolartipo_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HorarioescolarPeer::DATABASE_NAME);

		$criteria->add(HorarioescolarPeer::ID, $this->id);

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

		$copyObj->setNombre($this->nombre);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setFkEventoId($this->fk_evento_id);

		$copyObj->setFkEstablecimientoId($this->fk_establecimiento_id);

		$copyObj->setFkTurnoId($this->fk_turno_id);

		$copyObj->setFkHorarioescolartipoId($this->fk_horarioescolartipo_id);


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
			self::$peer = new HorarioescolarPeer();
		}
		return self::$peer;
	}

	
	public function setEvento(Evento $v = null)
	{
		if ($v === null) {
			$this->setFkEventoId(NULL);
		} else {
			$this->setFkEventoId($v->getId());
		}

		$this->aEvento = $v;

						if ($v !== null) {
			$v->addHorarioescolar($this);
		}

		return $this;
	}


	
	public function getEvento(PropelPDO $con = null)
	{
		if ($this->aEvento === null && ($this->fk_evento_id !== null)) {
			$c = new Criteria(EventoPeer::DATABASE_NAME);
			$c->add(EventoPeer::ID, $this->fk_evento_id);
			$this->aEvento = EventoPeer::doSelectOne($c, $con);
			
		}
		return $this->aEvento;
	}

	
	public function setEstablecimiento(Establecimiento $v = null)
	{
		if ($v === null) {
			$this->setFkEstablecimientoId(0);
		} else {
			$this->setFkEstablecimientoId($v->getId());
		}

		$this->aEstablecimiento = $v;

						if ($v !== null) {
			$v->addHorarioescolar($this);
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

	
	public function setTurno(Turno $v = null)
	{
		if ($v === null) {
			$this->setFkTurnoId(0);
		} else {
			$this->setFkTurnoId($v->getId());
		}

		$this->aTurno = $v;

						if ($v !== null) {
			$v->addHorarioescolar($this);
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

	
	public function setHorarioescolartipo(Horarioescolartipo $v = null)
	{
		if ($v === null) {
			$this->setFkHorarioescolartipoId(0);
		} else {
			$this->setFkHorarioescolartipoId($v->getId());
		}

		$this->aHorarioescolartipo = $v;

						if ($v !== null) {
			$v->addHorarioescolar($this);
		}

		return $this;
	}


	
	public function getHorarioescolartipo(PropelPDO $con = null)
	{
		if ($this->aHorarioescolartipo === null && ($this->fk_horarioescolartipo_id !== null)) {
			$c = new Criteria(HorarioescolartipoPeer::DATABASE_NAME);
			$c->add(HorarioescolartipoPeer::ID, $this->fk_horarioescolartipo_id);
			$this->aHorarioescolartipo = HorarioescolartipoPeer::doSelectOne($c, $con);
			
		}
		return $this->aHorarioescolartipo;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aEvento = null;
			$this->aEstablecimiento = null;
			$this->aTurno = null;
			$this->aHorarioescolartipo = null;
	}

} 