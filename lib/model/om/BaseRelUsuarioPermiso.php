<?php


abstract class BaseRelUsuarioPermiso extends BaseObject  implements Persistent {


  const PEER = 'RelUsuarioPermisoPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_usuario_id;

	
	protected $fk_permiso_id;

	
	protected $aUsuario;

	
	protected $aPermiso;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->fk_usuario_id = 0;
		$this->fk_permiso_id = 0;
	}

	
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
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RelUsuarioPermisoPeer::ID;
		}

		return $this;
	} 
	
	public function setFkUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_usuario_id !== $v || $v === 0) {
			$this->fk_usuario_id = $v;
			$this->modifiedColumns[] = RelUsuarioPermisoPeer::FK_USUARIO_ID;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

		return $this;
	} 
	
	public function setFkPermisoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_permiso_id !== $v || $v === 0) {
			$this->fk_permiso_id = $v;
			$this->modifiedColumns[] = RelUsuarioPermisoPeer::FK_PERMISO_ID;
		}

		if ($this->aPermiso !== null && $this->aPermiso->getId() !== $v) {
			$this->aPermiso = null;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(RelUsuarioPermisoPeer::FK_USUARIO_ID,RelUsuarioPermisoPeer::FK_PERMISO_ID))) {
				return false;
			}

			if ($this->fk_usuario_id !== 0) {
				return false;
			}

			if ($this->fk_permiso_id !== 0) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_usuario_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->fk_permiso_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RelUsuarioPermiso object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aUsuario !== null && $this->fk_usuario_id !== $this->aUsuario->getId()) {
			$this->aUsuario = null;
		}
		if ($this->aPermiso !== null && $this->fk_permiso_id !== $this->aPermiso->getId()) {
			$this->aPermiso = null;
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
			$con = Propel::getConnection(RelUsuarioPermisoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = RelUsuarioPermisoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aUsuario = null;
			$this->aPermiso = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelUsuarioPermisoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			RelUsuarioPermisoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RelUsuarioPermisoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			RelUsuarioPermisoPeer::addInstanceToPool($this);
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

												
			if ($this->aUsuario !== null) {
				if ($this->aUsuario->isModified() || $this->aUsuario->isNew()) {
					$affectedRows += $this->aUsuario->save($con);
				}
				$this->setUsuario($this->aUsuario);
			}

			if ($this->aPermiso !== null) {
				if ($this->aPermiso->isModified() || $this->aPermiso->isNew()) {
					$affectedRows += $this->aPermiso->save($con);
				}
				$this->setPermiso($this->aPermiso);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = RelUsuarioPermisoPeer::ID;
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
				return $this->getFkUsuarioId();
				break;
			case 2:
				return $this->getFkPermisoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
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

	
	public function setUsuario(Usuario $v = null)
	{
		if ($v === null) {
			$this->setFkUsuarioId(0);
		} else {
			$this->setFkUsuarioId($v->getId());
		}

		$this->aUsuario = $v;

						if ($v !== null) {
			$v->addRelUsuarioPermiso($this);
		}

		return $this;
	}


	
	public function getUsuario(PropelPDO $con = null)
	{
		if ($this->aUsuario === null && ($this->fk_usuario_id !== null)) {
			$c = new Criteria(UsuarioPeer::DATABASE_NAME);
			$c->add(UsuarioPeer::ID, $this->fk_usuario_id);
			$this->aUsuario = UsuarioPeer::doSelectOne($c, $con);
			
		}
		return $this->aUsuario;
	}

	
	public function setPermiso(Permiso $v = null)
	{
		if ($v === null) {
			$this->setFkPermisoId(0);
		} else {
			$this->setFkPermisoId($v->getId());
		}

		$this->aPermiso = $v;

						if ($v !== null) {
			$v->addRelUsuarioPermiso($this);
		}

		return $this;
	}


	
	public function getPermiso(PropelPDO $con = null)
	{
		if ($this->aPermiso === null && ($this->fk_permiso_id !== null)) {
			$c = new Criteria(PermisoPeer::DATABASE_NAME);
			$c->add(PermisoPeer::ID, $this->fk_permiso_id);
			$this->aPermiso = PermisoPeer::doSelectOne($c, $con);
			
		}
		return $this->aPermiso;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aUsuario = null;
			$this->aPermiso = null;
	}

} 