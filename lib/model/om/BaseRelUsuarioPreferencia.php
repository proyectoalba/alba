<?php


abstract class BaseRelUsuarioPreferencia extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fk_usuario_id = 0;


	
	protected $fk_preferencia_id = 0;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFkUsuarioId()
	{

		return $this->fk_usuario_id;
	}

	
	public function getFkPreferenciaId()
	{

		return $this->fk_preferencia_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RelUsuarioPreferenciaPeer::ID;
		}

	} 
	
	public function setFkUsuarioId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_usuario_id !== $v || $v === 0) {
			$this->fk_usuario_id = $v;
			$this->modifiedColumns[] = RelUsuarioPreferenciaPeer::FK_USUARIO_ID;
		}

	} 
	
	public function setFkPreferenciaId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_preferencia_id !== $v || $v === 0) {
			$this->fk_preferencia_id = $v;
			$this->modifiedColumns[] = RelUsuarioPreferenciaPeer::FK_PREFERENCIA_ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fk_usuario_id = $rs->getInt($startcol + 1);

			$this->fk_preferencia_id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RelUsuarioPreferencia object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelUsuarioPreferenciaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RelUsuarioPreferenciaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RelUsuarioPreferenciaPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RelUsuarioPreferenciaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RelUsuarioPreferenciaPeer::doUpdate($this, $con);
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


			if (($retval = RelUsuarioPreferenciaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelUsuarioPreferenciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFkUsuarioId();
				break;
			case 2:
				return $this->getFkPreferenciaId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelUsuarioPreferenciaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkUsuarioId(),
			$keys[2] => $this->getFkPreferenciaId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelUsuarioPreferenciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkUsuarioId($value);
				break;
			case 2:
				$this->setFkPreferenciaId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelUsuarioPreferenciaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkUsuarioId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkPreferenciaId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RelUsuarioPreferenciaPeer::DATABASE_NAME);

		if ($this->isColumnModified(RelUsuarioPreferenciaPeer::ID)) $criteria->add(RelUsuarioPreferenciaPeer::ID, $this->id);
		if ($this->isColumnModified(RelUsuarioPreferenciaPeer::FK_USUARIO_ID)) $criteria->add(RelUsuarioPreferenciaPeer::FK_USUARIO_ID, $this->fk_usuario_id);
		if ($this->isColumnModified(RelUsuarioPreferenciaPeer::FK_PREFERENCIA_ID)) $criteria->add(RelUsuarioPreferenciaPeer::FK_PREFERENCIA_ID, $this->fk_preferencia_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RelUsuarioPreferenciaPeer::DATABASE_NAME);

		$criteria->add(RelUsuarioPreferenciaPeer::ID, $this->id);

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

		$copyObj->setFkUsuarioId($this->fk_usuario_id);

		$copyObj->setFkPreferenciaId($this->fk_preferencia_id);


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
			self::$peer = new RelUsuarioPreferenciaPeer();
		}
		return self::$peer;
	}

} 