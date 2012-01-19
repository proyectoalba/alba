<?php


abstract class BaseUsuarioRol extends BaseObject  implements Persistent {


  const PEER = 'UsuarioRolPeer';

	
	protected static $peer;

	
	protected $fk_usuario_id;

	
	protected $fk_rol_id;

	
	protected $aUsuario;

	
	protected $aRol;

	
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

	
	public function getFkUsuarioId()
	{
		return $this->fk_usuario_id;
	}

	
	public function getFkRolId()
	{
		return $this->fk_rol_id;
	}

	
	public function setFkUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_usuario_id !== $v) {
			$this->fk_usuario_id = $v;
			$this->modifiedColumns[] = UsuarioRolPeer::FK_USUARIO_ID;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

		return $this;
	} 
	
	public function setFkRolId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_rol_id !== $v) {
			$this->fk_rol_id = $v;
			$this->modifiedColumns[] = UsuarioRolPeer::FK_ROL_ID;
		}

		if ($this->aRol !== null && $this->aRol->getId() !== $v) {
			$this->aRol = null;
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

			$this->fk_usuario_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_rol_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating UsuarioRol object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aUsuario !== null && $this->fk_usuario_id !== $this->aUsuario->getId()) {
			$this->aUsuario = null;
		}
		if ($this->aRol !== null && $this->fk_rol_id !== $this->aRol->getId()) {
			$this->aRol = null;
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
			$con = Propel::getConnection(UsuarioRolPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = UsuarioRolPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aUsuario = null;
			$this->aRol = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UsuarioRolPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			UsuarioRolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(UsuarioRolPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			UsuarioRolPeer::addInstanceToPool($this);
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

			if ($this->aRol !== null) {
				if ($this->aRol->isModified() || $this->aRol->isNew()) {
					$affectedRows += $this->aRol->save($con);
				}
				$this->setRol($this->aRol);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UsuarioRolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += UsuarioRolPeer::doUpdate($this, $con);
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

			if ($this->aRol !== null) {
				if (!$this->aRol->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRol->getValidationFailures());
				}
			}


			if (($retval = UsuarioRolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UsuarioRolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFkUsuarioId();
				break;
			case 1:
				return $this->getFkRolId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = UsuarioRolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFkUsuarioId(),
			$keys[1] => $this->getFkRolId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UsuarioRolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFkUsuarioId($value);
				break;
			case 1:
				$this->setFkRolId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UsuarioRolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFkUsuarioId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkRolId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UsuarioRolPeer::DATABASE_NAME);

		if ($this->isColumnModified(UsuarioRolPeer::FK_USUARIO_ID)) $criteria->add(UsuarioRolPeer::FK_USUARIO_ID, $this->fk_usuario_id);
		if ($this->isColumnModified(UsuarioRolPeer::FK_ROL_ID)) $criteria->add(UsuarioRolPeer::FK_ROL_ID, $this->fk_rol_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UsuarioRolPeer::DATABASE_NAME);

		$criteria->add(UsuarioRolPeer::FK_USUARIO_ID, $this->fk_usuario_id);
		$criteria->add(UsuarioRolPeer::FK_ROL_ID, $this->fk_rol_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getFkUsuarioId();

		$pks[1] = $this->getFkRolId();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setFkUsuarioId($keys[0]);

		$this->setFkRolId($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFkUsuarioId($this->fk_usuario_id);

		$copyObj->setFkRolId($this->fk_rol_id);


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
			self::$peer = new UsuarioRolPeer();
		}
		return self::$peer;
	}

	
	public function setUsuario(Usuario $v = null)
	{
		if ($v === null) {
			$this->setFkUsuarioId(NULL);
		} else {
			$this->setFkUsuarioId($v->getId());
		}

		$this->aUsuario = $v;

						if ($v !== null) {
			$v->addUsuarioRol($this);
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

	
	public function setRol(Rol $v = null)
	{
		if ($v === null) {
			$this->setFkRolId(NULL);
		} else {
			$this->setFkRolId($v->getId());
		}

		$this->aRol = $v;

						if ($v !== null) {
			$v->addUsuarioRol($this);
		}

		return $this;
	}


	
	public function getRol(PropelPDO $con = null)
	{
		if ($this->aRol === null && ($this->fk_rol_id !== null)) {
			$c = new Criteria(RolPeer::DATABASE_NAME);
			$c->add(RolPeer::ID, $this->fk_rol_id);
			$this->aRol = RolPeer::doSelectOne($c, $con);
			
		}
		return $this->aRol;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aUsuario = null;
			$this->aRol = null;
	}

} 