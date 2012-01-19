<?php


abstract class BaseLegajoadjunto extends BaseObject  implements Persistent {


  const PEER = 'LegajoadjuntoPeer';

	
	protected static $peer;

	
	protected $fk_legajopedagogico_id;

	
	protected $fk_adjunto_id;

	
	protected $id;

	
	protected $aLegajopedagogico;

	
	protected $aAdjunto;

	
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

	
	public function getFkLegajopedagogicoId()
	{
		return $this->fk_legajopedagogico_id;
	}

	
	public function getFkAdjuntoId()
	{
		return $this->fk_adjunto_id;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function setFkLegajopedagogicoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_legajopedagogico_id !== $v) {
			$this->fk_legajopedagogico_id = $v;
			$this->modifiedColumns[] = LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID;
		}

		if ($this->aLegajopedagogico !== null && $this->aLegajopedagogico->getId() !== $v) {
			$this->aLegajopedagogico = null;
		}

		return $this;
	} 
	
	public function setFkAdjuntoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_adjunto_id !== $v) {
			$this->fk_adjunto_id = $v;
			$this->modifiedColumns[] = LegajoadjuntoPeer::FK_ADJUNTO_ID;
		}

		if ($this->aAdjunto !== null && $this->aAdjunto->getId() !== $v) {
			$this->aAdjunto = null;
		}

		return $this;
	} 
	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = LegajoadjuntoPeer::ID;
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

			$this->fk_legajopedagogico_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_adjunto_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Legajoadjunto object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aLegajopedagogico !== null && $this->fk_legajopedagogico_id !== $this->aLegajopedagogico->getId()) {
			$this->aLegajopedagogico = null;
		}
		if ($this->aAdjunto !== null && $this->fk_adjunto_id !== $this->aAdjunto->getId()) {
			$this->aAdjunto = null;
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
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = LegajoadjuntoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aLegajopedagogico = null;
			$this->aAdjunto = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			LegajoadjuntoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			LegajoadjuntoPeer::addInstanceToPool($this);
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

												
			if ($this->aLegajopedagogico !== null) {
				if ($this->aLegajopedagogico->isModified() || $this->aLegajopedagogico->isNew()) {
					$affectedRows += $this->aLegajopedagogico->save($con);
				}
				$this->setLegajopedagogico($this->aLegajopedagogico);
			}

			if ($this->aAdjunto !== null) {
				if ($this->aAdjunto->isModified() || $this->aAdjunto->isNew()) {
					$affectedRows += $this->aAdjunto->save($con);
				}
				$this->setAdjunto($this->aAdjunto);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = LegajoadjuntoPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LegajoadjuntoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LegajoadjuntoPeer::doUpdate($this, $con);
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


												
			if ($this->aLegajopedagogico !== null) {
				if (!$this->aLegajopedagogico->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLegajopedagogico->getValidationFailures());
				}
			}

			if ($this->aAdjunto !== null) {
				if (!$this->aAdjunto->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAdjunto->getValidationFailures());
				}
			}


			if (($retval = LegajoadjuntoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LegajoadjuntoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFkLegajopedagogicoId();
				break;
			case 1:
				return $this->getFkAdjuntoId();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = LegajoadjuntoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFkLegajopedagogicoId(),
			$keys[1] => $this->getFkAdjuntoId(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LegajoadjuntoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFkLegajopedagogicoId($value);
				break;
			case 1:
				$this->setFkAdjuntoId($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LegajoadjuntoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFkLegajopedagogicoId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkAdjuntoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LegajoadjuntoPeer::DATABASE_NAME);

		if ($this->isColumnModified(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID)) $criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->fk_legajopedagogico_id);
		if ($this->isColumnModified(LegajoadjuntoPeer::FK_ADJUNTO_ID)) $criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->fk_adjunto_id);
		if ($this->isColumnModified(LegajoadjuntoPeer::ID)) $criteria->add(LegajoadjuntoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LegajoadjuntoPeer::DATABASE_NAME);

		$criteria->add(LegajoadjuntoPeer::ID, $this->id);

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

		$copyObj->setFkLegajopedagogicoId($this->fk_legajopedagogico_id);

		$copyObj->setFkAdjuntoId($this->fk_adjunto_id);


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
			self::$peer = new LegajoadjuntoPeer();
		}
		return self::$peer;
	}

	
	public function setLegajopedagogico(Legajopedagogico $v = null)
	{
		if ($v === null) {
			$this->setFkLegajopedagogicoId(NULL);
		} else {
			$this->setFkLegajopedagogicoId($v->getId());
		}

		$this->aLegajopedagogico = $v;

						if ($v !== null) {
			$v->addLegajoadjunto($this);
		}

		return $this;
	}


	
	public function getLegajopedagogico(PropelPDO $con = null)
	{
		if ($this->aLegajopedagogico === null && ($this->fk_legajopedagogico_id !== null)) {
			$c = new Criteria(LegajopedagogicoPeer::DATABASE_NAME);
			$c->add(LegajopedagogicoPeer::ID, $this->fk_legajopedagogico_id);
			$this->aLegajopedagogico = LegajopedagogicoPeer::doSelectOne($c, $con);
			
		}
		return $this->aLegajopedagogico;
	}

	
	public function setAdjunto(Adjunto $v = null)
	{
		if ($v === null) {
			$this->setFkAdjuntoId(NULL);
		} else {
			$this->setFkAdjuntoId($v->getId());
		}

		$this->aAdjunto = $v;

						if ($v !== null) {
			$v->addLegajoadjunto($this);
		}

		return $this;
	}


	
	public function getAdjunto(PropelPDO $con = null)
	{
		if ($this->aAdjunto === null && ($this->fk_adjunto_id !== null)) {
			$c = new Criteria(AdjuntoPeer::DATABASE_NAME);
			$c->add(AdjuntoPeer::ID, $this->fk_adjunto_id);
			$this->aAdjunto = AdjuntoPeer::doSelectOne($c, $con);
			
		}
		return $this->aAdjunto;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aLegajopedagogico = null;
			$this->aAdjunto = null;
	}

} 