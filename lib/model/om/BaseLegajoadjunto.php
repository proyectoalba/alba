<?php


abstract class BaseLegajoadjunto extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fk_legajopedagogico_id;


	
	protected $fk_adjunto_id;

	
	protected $aAdjunto;

	
	protected $aLegajopedagogico;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getFkLegajopedagogicoId()
	{

		return $this->fk_legajopedagogico_id;
	}

	
	public function getFkAdjuntoId()
	{

		return $this->fk_adjunto_id;
	}

	
	public function setFkLegajopedagogicoId($v)
	{

		if ($this->fk_legajopedagogico_id !== $v) {
			$this->fk_legajopedagogico_id = $v;
			$this->modifiedColumns[] = LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID;
		}

		if ($this->aLegajopedagogico !== null && $this->aLegajopedagogico->getId() !== $v) {
			$this->aLegajopedagogico = null;
		}

	} 
	
	public function setFkAdjuntoId($v)
	{

		if ($this->fk_adjunto_id !== $v) {
			$this->fk_adjunto_id = $v;
			$this->modifiedColumns[] = LegajoadjuntoPeer::FK_ADJUNTO_ID;
		}

		if ($this->aAdjunto !== null && $this->aAdjunto->getId() !== $v) {
			$this->aAdjunto = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->fk_legajopedagogico_id = $rs->getInt($startcol + 0);

			$this->fk_adjunto_id = $rs->getInt($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Legajoadjunto object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LegajoadjuntoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LegajoadjuntoPeer::DATABASE_NAME);
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


												
			if ($this->aAdjunto !== null) {
				if ($this->aAdjunto->isModified()) {
					$affectedRows += $this->aAdjunto->save($con);
				}
				$this->setAdjunto($this->aAdjunto);
			}

			if ($this->aLegajopedagogico !== null) {
				if ($this->aLegajopedagogico->isModified()) {
					$affectedRows += $this->aLegajopedagogico->save($con);
				}
				$this->setLegajopedagogico($this->aLegajopedagogico);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LegajoadjuntoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
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


												
			if ($this->aAdjunto !== null) {
				if (!$this->aAdjunto->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAdjunto->getValidationFailures());
				}
			}

			if ($this->aLegajopedagogico !== null) {
				if (!$this->aLegajopedagogico->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLegajopedagogico->getValidationFailures());
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
		return $this->getByPosition($pos);
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
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LegajoadjuntoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFkLegajopedagogicoId(),
			$keys[1] => $this->getFkAdjuntoId(),
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
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LegajoadjuntoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFkLegajopedagogicoId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkAdjuntoId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LegajoadjuntoPeer::DATABASE_NAME);

		if ($this->isColumnModified(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID)) $criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->fk_legajopedagogico_id);
		if ($this->isColumnModified(LegajoadjuntoPeer::FK_ADJUNTO_ID)) $criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->fk_adjunto_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LegajoadjuntoPeer::DATABASE_NAME);


		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return null;
	}

	
	 public function setPrimaryKey($pk)
	 {
		 	 }

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFkLegajopedagogicoId($this->fk_legajopedagogico_id);

		$copyObj->setFkAdjuntoId($this->fk_adjunto_id);


		$copyObj->setNew(true);

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

	
	public function setAdjunto($v)
	{


		if ($v === null) {
			$this->setFkAdjuntoId(NULL);
		} else {
			$this->setFkAdjuntoId($v->getId());
		}


		$this->aAdjunto = $v;
	}


	
	public function getAdjunto($con = null)
	{
				include_once 'lib/model/om/BaseAdjuntoPeer.php';

		if ($this->aAdjunto === null && ($this->fk_adjunto_id !== null)) {

			$this->aAdjunto = AdjuntoPeer::retrieveByPK($this->fk_adjunto_id, $con);

			
		}
		return $this->aAdjunto;
	}

	
	public function setLegajopedagogico($v)
	{


		if ($v === null) {
			$this->setFkLegajopedagogicoId(NULL);
		} else {
			$this->setFkLegajopedagogicoId($v->getId());
		}


		$this->aLegajopedagogico = $v;
	}


	
	public function getLegajopedagogico($con = null)
	{
				include_once 'lib/model/om/BaseLegajopedagogicoPeer.php';

		if ($this->aLegajopedagogico === null && ($this->fk_legajopedagogico_id !== null)) {

			$this->aLegajopedagogico = LegajopedagogicoPeer::retrieveByPK($this->fk_legajopedagogico_id, $con);

			
		}
		return $this->aLegajopedagogico;
	}

} 