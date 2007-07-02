<?php


abstract class BaseRelRolPermiso extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fk_rol_id = 0;


	
	protected $fk_permiso_id = 0;

	
	protected $aRol;

	
	protected $aPermiso;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFkRolId()
	{

		return $this->fk_rol_id;
	}

	
	public function getFkPermisoId()
	{

		return $this->fk_permiso_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RelRolPermisoPeer::ID;
		}

	} 
	
	public function setFkRolId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_rol_id !== $v || $v === 0) {
			$this->fk_rol_id = $v;
			$this->modifiedColumns[] = RelRolPermisoPeer::FK_ROL_ID;
		}

		if ($this->aRol !== null && $this->aRol->getId() !== $v) {
			$this->aRol = null;
		}

	} 
	
	public function setFkPermisoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_permiso_id !== $v || $v === 0) {
			$this->fk_permiso_id = $v;
			$this->modifiedColumns[] = RelRolPermisoPeer::FK_PERMISO_ID;
		}

		if ($this->aPermiso !== null && $this->aPermiso->getId() !== $v) {
			$this->aPermiso = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fk_rol_id = $rs->getInt($startcol + 1);

			$this->fk_permiso_id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RelRolPermiso object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelRolPermisoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RelRolPermisoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RelRolPermisoPeer::DATABASE_NAME);
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


												
			if ($this->aRol !== null) {
				if ($this->aRol->isModified()) {
					$affectedRows += $this->aRol->save($con);
				}
				$this->setRol($this->aRol);
			}

			if ($this->aPermiso !== null) {
				if ($this->aPermiso->isModified()) {
					$affectedRows += $this->aPermiso->save($con);
				}
				$this->setPermiso($this->aPermiso);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RelRolPermisoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RelRolPermisoPeer::doUpdate($this, $con);
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


												
			if ($this->aRol !== null) {
				if (!$this->aRol->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRol->getValidationFailures());
				}
			}

			if ($this->aPermiso !== null) {
				if (!$this->aPermiso->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPermiso->getValidationFailures());
				}
			}


			if (($retval = RelRolPermisoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelRolPermisoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFkRolId();
				break;
			case 2:
				return $this->getFkPermisoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelRolPermisoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkRolId(),
			$keys[2] => $this->getFkPermisoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelRolPermisoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkRolId($value);
				break;
			case 2:
				$this->setFkPermisoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelRolPermisoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkRolId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkPermisoId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RelRolPermisoPeer::DATABASE_NAME);

		if ($this->isColumnModified(RelRolPermisoPeer::ID)) $criteria->add(RelRolPermisoPeer::ID, $this->id);
		if ($this->isColumnModified(RelRolPermisoPeer::FK_ROL_ID)) $criteria->add(RelRolPermisoPeer::FK_ROL_ID, $this->fk_rol_id);
		if ($this->isColumnModified(RelRolPermisoPeer::FK_PERMISO_ID)) $criteria->add(RelRolPermisoPeer::FK_PERMISO_ID, $this->fk_permiso_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RelRolPermisoPeer::DATABASE_NAME);

		$criteria->add(RelRolPermisoPeer::ID, $this->id);

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

		$copyObj->setFkRolId($this->fk_rol_id);

		$copyObj->setFkPermisoId($this->fk_permiso_id);


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
			self::$peer = new RelRolPermisoPeer();
		}
		return self::$peer;
	}

	
	public function setRol($v)
	{


		if ($v === null) {
			$this->setFkRolId('0');
		} else {
			$this->setFkRolId($v->getId());
		}


		$this->aRol = $v;
	}


	
	public function getRol($con = null)
	{
				include_once 'lib/model/om/BaseRolPeer.php';

		if ($this->aRol === null && ($this->fk_rol_id !== null)) {

			$this->aRol = RolPeer::retrieveByPK($this->fk_rol_id, $con);

			
		}
		return $this->aRol;
	}

	
	public function setPermiso($v)
	{


		if ($v === null) {
			$this->setFkPermisoId('0');
		} else {
			$this->setFkPermisoId($v->getId());
		}


		$this->aPermiso = $v;
	}


	
	public function getPermiso($con = null)
	{
				include_once 'lib/model/om/BasePermisoPeer.php';

		if ($this->aPermiso === null && ($this->fk_permiso_id !== null)) {

			$this->aPermiso = PermisoPeer::retrieveByPK($this->fk_permiso_id, $con);

			
		}
		return $this->aPermiso;
	}

} 