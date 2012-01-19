<?php


abstract class BaseRelRolresponsableResponsable extends BaseObject  implements Persistent {


  const PEER = 'RelRolresponsableResponsablePeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_rolresponsable_id;

	
	protected $fk_responsable_id;

	
	protected $fk_alumno_id;

	
	protected $descripcion;

	
	protected $aRolResponsable;

	
	protected $aResponsable;

	
	protected $aAlumno;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->fk_rolresponsable_id = 0;
		$this->fk_responsable_id = 0;
		$this->fk_alumno_id = 0;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFkRolresponsableId()
	{
		return $this->fk_rolresponsable_id;
	}

	
	public function getFkResponsableId()
	{
		return $this->fk_responsable_id;
	}

	
	public function getFkAlumnoId()
	{
		return $this->fk_alumno_id;
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
			$this->modifiedColumns[] = RelRolresponsableResponsablePeer::ID;
		}

		return $this;
	} 
	
	public function setFkRolresponsableId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_rolresponsable_id !== $v || $v === 0) {
			$this->fk_rolresponsable_id = $v;
			$this->modifiedColumns[] = RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID;
		}

		if ($this->aRolResponsable !== null && $this->aRolResponsable->getId() !== $v) {
			$this->aRolResponsable = null;
		}

		return $this;
	} 
	
	public function setFkResponsableId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_responsable_id !== $v || $v === 0) {
			$this->fk_responsable_id = $v;
			$this->modifiedColumns[] = RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID;
		}

		if ($this->aResponsable !== null && $this->aResponsable->getId() !== $v) {
			$this->aResponsable = null;
		}

		return $this;
	} 
	
	public function setFkAlumnoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_alumno_id !== $v || $v === 0) {
			$this->fk_alumno_id = $v;
			$this->modifiedColumns[] = RelRolresponsableResponsablePeer::FK_ALUMNO_ID;
		}

		if ($this->aAlumno !== null && $this->aAlumno->getId() !== $v) {
			$this->aAlumno = null;
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
			$this->modifiedColumns[] = RelRolresponsableResponsablePeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID,RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID,RelRolresponsableResponsablePeer::FK_ALUMNO_ID))) {
				return false;
			}

			if ($this->fk_rolresponsable_id !== 0) {
				return false;
			}

			if ($this->fk_responsable_id !== 0) {
				return false;
			}

			if ($this->fk_alumno_id !== 0) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_rolresponsable_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->fk_responsable_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->fk_alumno_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->descripcion = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RelRolresponsableResponsable object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aRolResponsable !== null && $this->fk_rolresponsable_id !== $this->aRolResponsable->getId()) {
			$this->aRolResponsable = null;
		}
		if ($this->aResponsable !== null && $this->fk_responsable_id !== $this->aResponsable->getId()) {
			$this->aResponsable = null;
		}
		if ($this->aAlumno !== null && $this->fk_alumno_id !== $this->aAlumno->getId()) {
			$this->aAlumno = null;
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
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = RelRolresponsableResponsablePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aRolResponsable = null;
			$this->aResponsable = null;
			$this->aAlumno = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			RelRolresponsableResponsablePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			RelRolresponsableResponsablePeer::addInstanceToPool($this);
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

												
			if ($this->aRolResponsable !== null) {
				if ($this->aRolResponsable->isModified() || $this->aRolResponsable->isNew()) {
					$affectedRows += $this->aRolResponsable->save($con);
				}
				$this->setRolResponsable($this->aRolResponsable);
			}

			if ($this->aResponsable !== null) {
				if ($this->aResponsable->isModified() || $this->aResponsable->isNew()) {
					$affectedRows += $this->aResponsable->save($con);
				}
				$this->setResponsable($this->aResponsable);
			}

			if ($this->aAlumno !== null) {
				if ($this->aAlumno->isModified() || $this->aAlumno->isNew()) {
					$affectedRows += $this->aAlumno->save($con);
				}
				$this->setAlumno($this->aAlumno);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = RelRolresponsableResponsablePeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RelRolresponsableResponsablePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RelRolresponsableResponsablePeer::doUpdate($this, $con);
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


												
			if ($this->aRolResponsable !== null) {
				if (!$this->aRolResponsable->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRolResponsable->getValidationFailures());
				}
			}

			if ($this->aResponsable !== null) {
				if (!$this->aResponsable->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aResponsable->getValidationFailures());
				}
			}

			if ($this->aAlumno !== null) {
				if (!$this->aAlumno->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAlumno->getValidationFailures());
				}
			}


			if (($retval = RelRolresponsableResponsablePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelRolresponsableResponsablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkRolresponsableId();
				break;
			case 2:
				return $this->getFkResponsableId();
				break;
			case 3:
				return $this->getFkAlumnoId();
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
		$keys = RelRolresponsableResponsablePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkRolresponsableId(),
			$keys[2] => $this->getFkResponsableId(),
			$keys[3] => $this->getFkAlumnoId(),
			$keys[4] => $this->getDescripcion(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelRolresponsableResponsablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkRolresponsableId($value);
				break;
			case 2:
				$this->setFkResponsableId($value);
				break;
			case 3:
				$this->setFkAlumnoId($value);
				break;
			case 4:
				$this->setDescripcion($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelRolresponsableResponsablePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkRolresponsableId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkResponsableId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkAlumnoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescripcion($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RelRolresponsableResponsablePeer::DATABASE_NAME);

		if ($this->isColumnModified(RelRolresponsableResponsablePeer::ID)) $criteria->add(RelRolresponsableResponsablePeer::ID, $this->id);
		if ($this->isColumnModified(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID)) $criteria->add(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, $this->fk_rolresponsable_id);
		if ($this->isColumnModified(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID)) $criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->fk_responsable_id);
		if ($this->isColumnModified(RelRolresponsableResponsablePeer::FK_ALUMNO_ID)) $criteria->add(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, $this->fk_alumno_id);
		if ($this->isColumnModified(RelRolresponsableResponsablePeer::DESCRIPCION)) $criteria->add(RelRolresponsableResponsablePeer::DESCRIPCION, $this->descripcion);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RelRolresponsableResponsablePeer::DATABASE_NAME);

		$criteria->add(RelRolresponsableResponsablePeer::ID, $this->id);

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

		$copyObj->setFkRolresponsableId($this->fk_rolresponsable_id);

		$copyObj->setFkResponsableId($this->fk_responsable_id);

		$copyObj->setFkAlumnoId($this->fk_alumno_id);

		$copyObj->setDescripcion($this->descripcion);


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
			self::$peer = new RelRolresponsableResponsablePeer();
		}
		return self::$peer;
	}

	
	public function setRolResponsable(RolResponsable $v = null)
	{
		if ($v === null) {
			$this->setFkRolresponsableId(0);
		} else {
			$this->setFkRolresponsableId($v->getId());
		}

		$this->aRolResponsable = $v;

						if ($v !== null) {
			$v->addRelRolresponsableResponsable($this);
		}

		return $this;
	}


	
	public function getRolResponsable(PropelPDO $con = null)
	{
		if ($this->aRolResponsable === null && ($this->fk_rolresponsable_id !== null)) {
			$c = new Criteria(RolResponsablePeer::DATABASE_NAME);
			$c->add(RolResponsablePeer::ID, $this->fk_rolresponsable_id);
			$this->aRolResponsable = RolResponsablePeer::doSelectOne($c, $con);
			
		}
		return $this->aRolResponsable;
	}

	
	public function setResponsable(Responsable $v = null)
	{
		if ($v === null) {
			$this->setFkResponsableId(0);
		} else {
			$this->setFkResponsableId($v->getId());
		}

		$this->aResponsable = $v;

						if ($v !== null) {
			$v->addRelRolresponsableResponsable($this);
		}

		return $this;
	}


	
	public function getResponsable(PropelPDO $con = null)
	{
		if ($this->aResponsable === null && ($this->fk_responsable_id !== null)) {
			$c = new Criteria(ResponsablePeer::DATABASE_NAME);
			$c->add(ResponsablePeer::ID, $this->fk_responsable_id);
			$this->aResponsable = ResponsablePeer::doSelectOne($c, $con);
			
		}
		return $this->aResponsable;
	}

	
	public function setAlumno(Alumno $v = null)
	{
		if ($v === null) {
			$this->setFkAlumnoId(0);
		} else {
			$this->setFkAlumnoId($v->getId());
		}

		$this->aAlumno = $v;

						if ($v !== null) {
			$v->addRelRolresponsableResponsable($this);
		}

		return $this;
	}


	
	public function getAlumno(PropelPDO $con = null)
	{
		if ($this->aAlumno === null && ($this->fk_alumno_id !== null)) {
			$c = new Criteria(AlumnoPeer::DATABASE_NAME);
			$c->add(AlumnoPeer::ID, $this->fk_alumno_id);
			$this->aAlumno = AlumnoPeer::doSelectOne($c, $con);
			
		}
		return $this->aAlumno;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aRolResponsable = null;
			$this->aResponsable = null;
			$this->aAlumno = null;
	}

} 