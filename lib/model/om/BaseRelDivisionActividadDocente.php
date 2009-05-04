<?php


abstract class BaseRelDivisionActividadDocente extends BaseObject  implements Persistent {


  const PEER = 'RelDivisionActividadDocentePeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_division_id;

	
	protected $fk_actividad_id;

	
	protected $fk_docente_id;

	
	protected $fk_evento_id;

	
	protected $aDivision;

	
	protected $aActividad;

	
	protected $aDocente;

	
	protected $aEvento;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->fk_division_id = 0;
		$this->fk_actividad_id = 0;
		$this->fk_docente_id = 0;
		$this->fk_evento_id = 0;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFkDivisionId()
	{
		return $this->fk_division_id;
	}

	
	public function getFkActividadId()
	{
		return $this->fk_actividad_id;
	}

	
	public function getFkDocenteId()
	{
		return $this->fk_docente_id;
	}

	
	public function getFkEventoId()
	{
		return $this->fk_evento_id;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RelDivisionActividadDocentePeer::ID;
		}

		return $this;
	} 
	
	public function setFkDivisionId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_division_id !== $v || $v === 0) {
			$this->fk_division_id = $v;
			$this->modifiedColumns[] = RelDivisionActividadDocentePeer::FK_DIVISION_ID;
		}

		if ($this->aDivision !== null && $this->aDivision->getId() !== $v) {
			$this->aDivision = null;
		}

		return $this;
	} 
	
	public function setFkActividadId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_actividad_id !== $v || $v === 0) {
			$this->fk_actividad_id = $v;
			$this->modifiedColumns[] = RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID;
		}

		if ($this->aActividad !== null && $this->aActividad->getId() !== $v) {
			$this->aActividad = null;
		}

		return $this;
	} 
	
	public function setFkDocenteId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_docente_id !== $v || $v === 0) {
			$this->fk_docente_id = $v;
			$this->modifiedColumns[] = RelDivisionActividadDocentePeer::FK_DOCENTE_ID;
		}

		if ($this->aDocente !== null && $this->aDocente->getId() !== $v) {
			$this->aDocente = null;
		}

		return $this;
	} 
	
	public function setFkEventoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_evento_id !== $v || $v === 0) {
			$this->fk_evento_id = $v;
			$this->modifiedColumns[] = RelDivisionActividadDocentePeer::FK_EVENTO_ID;
		}

		if ($this->aEvento !== null && $this->aEvento->getId() !== $v) {
			$this->aEvento = null;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(RelDivisionActividadDocentePeer::FK_DIVISION_ID,RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID,RelDivisionActividadDocentePeer::FK_DOCENTE_ID,RelDivisionActividadDocentePeer::FK_EVENTO_ID))) {
				return false;
			}

			if ($this->fk_division_id !== 0) {
				return false;
			}

			if ($this->fk_actividad_id !== 0) {
				return false;
			}

			if ($this->fk_docente_id !== 0) {
				return false;
			}

			if ($this->fk_evento_id !== 0) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_division_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->fk_actividad_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->fk_docente_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->fk_evento_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RelDivisionActividadDocente object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aDivision !== null && $this->fk_division_id !== $this->aDivision->getId()) {
			$this->aDivision = null;
		}
		if ($this->aActividad !== null && $this->fk_actividad_id !== $this->aActividad->getId()) {
			$this->aActividad = null;
		}
		if ($this->aDocente !== null && $this->fk_docente_id !== $this->aDocente->getId()) {
			$this->aDocente = null;
		}
		if ($this->aEvento !== null && $this->fk_evento_id !== $this->aEvento->getId()) {
			$this->aEvento = null;
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
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = RelDivisionActividadDocentePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aDivision = null;
			$this->aActividad = null;
			$this->aDocente = null;
			$this->aEvento = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			RelDivisionActividadDocentePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			RelDivisionActividadDocentePeer::addInstanceToPool($this);
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

												
			if ($this->aDivision !== null) {
				if ($this->aDivision->isModified() || $this->aDivision->isNew()) {
					$affectedRows += $this->aDivision->save($con);
				}
				$this->setDivision($this->aDivision);
			}

			if ($this->aActividad !== null) {
				if ($this->aActividad->isModified() || $this->aActividad->isNew()) {
					$affectedRows += $this->aActividad->save($con);
				}
				$this->setActividad($this->aActividad);
			}

			if ($this->aDocente !== null) {
				if ($this->aDocente->isModified() || $this->aDocente->isNew()) {
					$affectedRows += $this->aDocente->save($con);
				}
				$this->setDocente($this->aDocente);
			}

			if ($this->aEvento !== null) {
				if ($this->aEvento->isModified() || $this->aEvento->isNew()) {
					$affectedRows += $this->aEvento->save($con);
				}
				$this->setEvento($this->aEvento);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = RelDivisionActividadDocentePeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RelDivisionActividadDocentePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RelDivisionActividadDocentePeer::doUpdate($this, $con);
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


												
			if ($this->aDivision !== null) {
				if (!$this->aDivision->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDivision->getValidationFailures());
				}
			}

			if ($this->aActividad !== null) {
				if (!$this->aActividad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aActividad->getValidationFailures());
				}
			}

			if ($this->aDocente !== null) {
				if (!$this->aDocente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDocente->getValidationFailures());
				}
			}

			if ($this->aEvento !== null) {
				if (!$this->aEvento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEvento->getValidationFailures());
				}
			}


			if (($retval = RelDivisionActividadDocentePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelDivisionActividadDocentePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkDivisionId();
				break;
			case 2:
				return $this->getFkActividadId();
				break;
			case 3:
				return $this->getFkDocenteId();
				break;
			case 4:
				return $this->getFkEventoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = RelDivisionActividadDocentePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkDivisionId(),
			$keys[2] => $this->getFkActividadId(),
			$keys[3] => $this->getFkDocenteId(),
			$keys[4] => $this->getFkEventoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelDivisionActividadDocentePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkDivisionId($value);
				break;
			case 2:
				$this->setFkActividadId($value);
				break;
			case 3:
				$this->setFkDocenteId($value);
				break;
			case 4:
				$this->setFkEventoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelDivisionActividadDocentePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkDivisionId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkActividadId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkDocenteId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFkEventoId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RelDivisionActividadDocentePeer::DATABASE_NAME);

		if ($this->isColumnModified(RelDivisionActividadDocentePeer::ID)) $criteria->add(RelDivisionActividadDocentePeer::ID, $this->id);
		if ($this->isColumnModified(RelDivisionActividadDocentePeer::FK_DIVISION_ID)) $criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->fk_division_id);
		if ($this->isColumnModified(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID)) $criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->fk_actividad_id);
		if ($this->isColumnModified(RelDivisionActividadDocentePeer::FK_DOCENTE_ID)) $criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->fk_docente_id);
		if ($this->isColumnModified(RelDivisionActividadDocentePeer::FK_EVENTO_ID)) $criteria->add(RelDivisionActividadDocentePeer::FK_EVENTO_ID, $this->fk_evento_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RelDivisionActividadDocentePeer::DATABASE_NAME);

		$criteria->add(RelDivisionActividadDocentePeer::ID, $this->id);

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

		$copyObj->setFkDivisionId($this->fk_division_id);

		$copyObj->setFkActividadId($this->fk_actividad_id);

		$copyObj->setFkDocenteId($this->fk_docente_id);

		$copyObj->setFkEventoId($this->fk_evento_id);


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
			self::$peer = new RelDivisionActividadDocentePeer();
		}
		return self::$peer;
	}

	
	public function setDivision(Division $v = null)
	{
		if ($v === null) {
			$this->setFkDivisionId(0);
		} else {
			$this->setFkDivisionId($v->getId());
		}

		$this->aDivision = $v;

						if ($v !== null) {
			$v->addRelDivisionActividadDocente($this);
		}

		return $this;
	}


	
	public function getDivision(PropelPDO $con = null)
	{
		if ($this->aDivision === null && ($this->fk_division_id !== null)) {
			$c = new Criteria(DivisionPeer::DATABASE_NAME);
			$c->add(DivisionPeer::ID, $this->fk_division_id);
			$this->aDivision = DivisionPeer::doSelectOne($c, $con);
			
		}
		return $this->aDivision;
	}

	
	public function setActividad(Actividad $v = null)
	{
		if ($v === null) {
			$this->setFkActividadId(0);
		} else {
			$this->setFkActividadId($v->getId());
		}

		$this->aActividad = $v;

						if ($v !== null) {
			$v->addRelDivisionActividadDocente($this);
		}

		return $this;
	}


	
	public function getActividad(PropelPDO $con = null)
	{
		if ($this->aActividad === null && ($this->fk_actividad_id !== null)) {
			$c = new Criteria(ActividadPeer::DATABASE_NAME);
			$c->add(ActividadPeer::ID, $this->fk_actividad_id);
			$this->aActividad = ActividadPeer::doSelectOne($c, $con);
			
		}
		return $this->aActividad;
	}

	
	public function setDocente(Docente $v = null)
	{
		if ($v === null) {
			$this->setFkDocenteId(0);
		} else {
			$this->setFkDocenteId($v->getId());
		}

		$this->aDocente = $v;

						if ($v !== null) {
			$v->addRelDivisionActividadDocente($this);
		}

		return $this;
	}


	
	public function getDocente(PropelPDO $con = null)
	{
		if ($this->aDocente === null && ($this->fk_docente_id !== null)) {
			$c = new Criteria(DocentePeer::DATABASE_NAME);
			$c->add(DocentePeer::ID, $this->fk_docente_id);
			$this->aDocente = DocentePeer::doSelectOne($c, $con);
			
		}
		return $this->aDocente;
	}

	
	public function setEvento(Evento $v = null)
	{
		if ($v === null) {
			$this->setFkEventoId(0);
		} else {
			$this->setFkEventoId($v->getId());
		}

		$this->aEvento = $v;

						if ($v !== null) {
			$v->addRelDivisionActividadDocente($this);
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

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aDivision = null;
			$this->aActividad = null;
			$this->aDocente = null;
			$this->aEvento = null;
	}

} 