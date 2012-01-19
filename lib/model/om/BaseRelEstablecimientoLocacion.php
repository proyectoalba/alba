<?php


abstract class BaseRelEstablecimientoLocacion extends BaseObject  implements Persistent {


  const PEER = 'RelEstablecimientoLocacionPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_establecimiento_id;

	
	protected $fk_locacion_id;

	
	protected $aEstablecimiento;

	
	protected $aLocacion;

	
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
		$this->fk_locacion_id = 0;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFkEstablecimientoId()
	{
		return $this->fk_establecimiento_id;
	}

	
	public function getFkLocacionId()
	{
		return $this->fk_locacion_id;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RelEstablecimientoLocacionPeer::ID;
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
			$this->modifiedColumns[] = RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
		}

		return $this;
	} 
	
	public function setFkLocacionId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_locacion_id !== $v || $v === 0) {
			$this->fk_locacion_id = $v;
			$this->modifiedColumns[] = RelEstablecimientoLocacionPeer::FK_LOCACION_ID;
		}

		if ($this->aLocacion !== null && $this->aLocacion->getId() !== $v) {
			$this->aLocacion = null;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID,RelEstablecimientoLocacionPeer::FK_LOCACION_ID))) {
				return false;
			}

			if ($this->fk_establecimiento_id !== 0) {
				return false;
			}

			if ($this->fk_locacion_id !== 0) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_establecimiento_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->fk_locacion_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RelEstablecimientoLocacion object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aEstablecimiento !== null && $this->fk_establecimiento_id !== $this->aEstablecimiento->getId()) {
			$this->aEstablecimiento = null;
		}
		if ($this->aLocacion !== null && $this->fk_locacion_id !== $this->aLocacion->getId()) {
			$this->aLocacion = null;
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
			$con = Propel::getConnection(RelEstablecimientoLocacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = RelEstablecimientoLocacionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aEstablecimiento = null;
			$this->aLocacion = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelEstablecimientoLocacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			RelEstablecimientoLocacionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RelEstablecimientoLocacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			RelEstablecimientoLocacionPeer::addInstanceToPool($this);
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

			if ($this->aLocacion !== null) {
				if ($this->aLocacion->isModified() || $this->aLocacion->isNew()) {
					$affectedRows += $this->aLocacion->save($con);
				}
				$this->setLocacion($this->aLocacion);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = RelEstablecimientoLocacionPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RelEstablecimientoLocacionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RelEstablecimientoLocacionPeer::doUpdate($this, $con);
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


												
			if ($this->aEstablecimiento !== null) {
				if (!$this->aEstablecimiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstablecimiento->getValidationFailures());
				}
			}

			if ($this->aLocacion !== null) {
				if (!$this->aLocacion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLocacion->getValidationFailures());
				}
			}


			if (($retval = RelEstablecimientoLocacionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelEstablecimientoLocacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkLocacionId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = RelEstablecimientoLocacionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkEstablecimientoId(),
			$keys[2] => $this->getFkLocacionId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelEstablecimientoLocacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFkLocacionId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelEstablecimientoLocacionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkEstablecimientoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkLocacionId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RelEstablecimientoLocacionPeer::DATABASE_NAME);

		if ($this->isColumnModified(RelEstablecimientoLocacionPeer::ID)) $criteria->add(RelEstablecimientoLocacionPeer::ID, $this->id);
		if ($this->isColumnModified(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(RelEstablecimientoLocacionPeer::FK_LOCACION_ID)) $criteria->add(RelEstablecimientoLocacionPeer::FK_LOCACION_ID, $this->fk_locacion_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RelEstablecimientoLocacionPeer::DATABASE_NAME);

		$criteria->add(RelEstablecimientoLocacionPeer::ID, $this->id);

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

		$copyObj->setFkLocacionId($this->fk_locacion_id);


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
			self::$peer = new RelEstablecimientoLocacionPeer();
		}
		return self::$peer;
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
			$v->addRelEstablecimientoLocacion($this);
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

	
	public function setLocacion(Locacion $v = null)
	{
		if ($v === null) {
			$this->setFkLocacionId(0);
		} else {
			$this->setFkLocacionId($v->getId());
		}

		$this->aLocacion = $v;

						if ($v !== null) {
			$v->addRelEstablecimientoLocacion($this);
		}

		return $this;
	}


	
	public function getLocacion(PropelPDO $con = null)
	{
		if ($this->aLocacion === null && ($this->fk_locacion_id !== null)) {
			$c = new Criteria(LocacionPeer::DATABASE_NAME);
			$c->add(LocacionPeer::ID, $this->fk_locacion_id);
			$this->aLocacion = LocacionPeer::doSelectOne($c, $con);
			
		}
		return $this->aLocacion;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aEstablecimiento = null;
			$this->aLocacion = null;
	}

} 