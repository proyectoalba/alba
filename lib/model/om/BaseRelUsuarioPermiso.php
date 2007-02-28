<?php


abstract class BaseRelUsuarioPermiso extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fk_usuario_id = 0;


	
	protected $fk_permiso_id = 0;

	
	protected $aUsuario;

	
	protected $aPermiso;

	
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

	
	public function getFkPermisoId()
	{

		return $this->fk_permiso_id;
	}

	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RelUsuarioPermisoPeer::ID;
		}

	} 
	
	public function setFkUsuarioId($v)
	{

		if ($this->fk_usuario_id !== $v || $v === 0) {
			$this->fk_usuario_id = $v;
			$this->modifiedColumns[] = RelUsuarioPermisoPeer::FK_USUARIO_ID;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

	} 
	
	public function setFkPermisoId($v)
	{

		if ($this->fk_permiso_id !== $v || $v === 0) {
			$this->fk_permiso_id = $v;
			$this->modifiedColumns[] = RelUsuarioPermisoPeer::FK_PERMISO_ID;
		}

		if ($this->aPermiso !== null && $this->aPermiso->getId() !== $v) {
			$this->aPermiso = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fk_usuario_id = $rs->getInt($startcol + 1);

			$this->fk_permiso_id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RelUsuarioPermiso object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelUsuarioPermisoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RelUsuarioPermisoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RelUsuarioPermisoPeer::DATABASE_NAME);
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


												
			if ($this->aUsuario !== null) {
				if ($this->aUsuario->isModified()) {
					$affectedRows += $this->aUsuario->save($con);
				}
				$this->setUsuario($this->aUsuario);
			}

			if ($this->aPermiso !== null) {
				if ($this->aPermiso->isModified()) {
					$affectedRows += $this->aPermiso->save($con);
				}
				$this->setPermiso($this->aPermiso);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RelUsuarioPermisoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RelUsuarioPermisoPeer::doUpdate($this, $con);
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


												
			if ($this->aUsuario !== null) {
				if (!$this->aUsuario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuario->getValidationFailures());
				}
			}

			if ($this->aPermiso !== null) {
				if (!$this->aPermiso->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPermiso->getValidationFailures());
				}
			}


			if (($retval = RelUsuarioPermisoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelUsuarioPermisoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkPermisoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelUsuarioPermisoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkUsuarioId(),
			$keys[2] => $this->getFkPermisoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelUsuarioPermisoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFkPermisoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelUsuarioPermisoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkUsuarioId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkPermisoId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RelUsuarioPermisoPeer::DATABASE_NAME);

		if ($this->isColumnModified(RelUsuarioPermisoPeer::ID)) $criteria->add(RelUsuarioPermisoPeer::ID, $this->id);
		if ($this->isColumnModified(RelUsuarioPermisoPeer::FK_USUARIO_ID)) $criteria->add(RelUsuarioPermisoPeer::FK_USUARIO_ID, $this->fk_usuario_id);
		if ($this->isColumnModified(RelUsuarioPermisoPeer::FK_PERMISO_ID)) $criteria->add(RelUsuarioPermisoPeer::FK_PERMISO_ID, $this->fk_permiso_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RelUsuarioPermisoPeer::DATABASE_NAME);

		$criteria->add(RelUsuarioPermisoPeer::ID, $this->id);

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
			self::$peer = new RelUsuarioPermisoPeer();
		}
		return self::$peer;
	}

	
	public function setUsuario($v)
	{


		if ($v === null) {
			$this->setFkUsuarioId('0');
		} else {
			$this->setFkUsuarioId($v->getId());
		}


		$this->aUsuario = $v;
	}


	
	public function getUsuario($con = null)
	{
				include_once 'lib/model/om/BaseUsuarioPeer.php';

		if ($this->aUsuario === null && ($this->fk_usuario_id !== null)) {

			$this->aUsuario = UsuarioPeer::retrieveByPK($this->fk_usuario_id, $con);

			
		}
		return $this->aUsuario;
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