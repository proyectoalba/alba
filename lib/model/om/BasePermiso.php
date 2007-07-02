<?php


abstract class BasePermiso extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre = '';


	
	protected $descripcion;


	
	protected $fk_modulo_id = 0;


	
	protected $credencial;

	
	protected $aModulo;

	
	protected $collRelRolPermisos;

	
	protected $lastRelRolPermisoCriteria = null;

	
	protected $collRelUsuarioPermisos;

	
	protected $lastRelUsuarioPermisoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getNombre()
	{

		return $this->nombre;
	}

	
	public function getDescripcion()
	{

		return $this->descripcion;
	}

	
	public function getFkModuloId()
	{

		return $this->fk_modulo_id;
	}

	
	public function getCredencial()
	{

		return $this->credencial;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PermisoPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v || $v === '') {
			$this->nombre = $v;
			$this->modifiedColumns[] = PermisoPeer::NOMBRE;
		}

	} 
	
	public function setDescripcion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = PermisoPeer::DESCRIPCION;
		}

	} 
	
	public function setFkModuloId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_modulo_id !== $v || $v === 0) {
			$this->fk_modulo_id = $v;
			$this->modifiedColumns[] = PermisoPeer::FK_MODULO_ID;
		}

		if ($this->aModulo !== null && $this->aModulo->getId() !== $v) {
			$this->aModulo = null;
		}

	} 
	
	public function setCredencial($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->credencial !== $v) {
			$this->credencial = $v;
			$this->modifiedColumns[] = PermisoPeer::CREDENCIAL;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->descripcion = $rs->getString($startcol + 2);

			$this->fk_modulo_id = $rs->getInt($startcol + 3);

			$this->credencial = $rs->getString($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Permiso object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PermisoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PermisoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PermisoPeer::DATABASE_NAME);
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


												
			if ($this->aModulo !== null) {
				if ($this->aModulo->isModified()) {
					$affectedRows += $this->aModulo->save($con);
				}
				$this->setModulo($this->aModulo);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PermisoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PermisoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collRelRolPermisos !== null) {
				foreach($this->collRelRolPermisos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelUsuarioPermisos !== null) {
				foreach($this->collRelUsuarioPermisos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aModulo !== null) {
				if (!$this->aModulo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aModulo->getValidationFailures());
				}
			}


			if (($retval = PermisoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelRolPermisos !== null) {
					foreach($this->collRelRolPermisos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelUsuarioPermisos !== null) {
					foreach($this->collRelUsuarioPermisos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PermisoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNombre();
				break;
			case 2:
				return $this->getDescripcion();
				break;
			case 3:
				return $this->getFkModuloId();
				break;
			case 4:
				return $this->getCredencial();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PermisoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getFkModuloId(),
			$keys[4] => $this->getCredencial(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PermisoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNombre($value);
				break;
			case 2:
				$this->setDescripcion($value);
				break;
			case 3:
				$this->setFkModuloId($value);
				break;
			case 4:
				$this->setCredencial($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PermisoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkModuloId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCredencial($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PermisoPeer::DATABASE_NAME);

		if ($this->isColumnModified(PermisoPeer::ID)) $criteria->add(PermisoPeer::ID, $this->id);
		if ($this->isColumnModified(PermisoPeer::NOMBRE)) $criteria->add(PermisoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(PermisoPeer::DESCRIPCION)) $criteria->add(PermisoPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(PermisoPeer::FK_MODULO_ID)) $criteria->add(PermisoPeer::FK_MODULO_ID, $this->fk_modulo_id);
		if ($this->isColumnModified(PermisoPeer::CREDENCIAL)) $criteria->add(PermisoPeer::CREDENCIAL, $this->credencial);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PermisoPeer::DATABASE_NAME);

		$criteria->add(PermisoPeer::ID, $this->id);

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

		$copyObj->setNombre($this->nombre);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setFkModuloId($this->fk_modulo_id);

		$copyObj->setCredencial($this->credencial);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getRelRolPermisos() as $relObj) {
				$copyObj->addRelRolPermiso($relObj->copy($deepCopy));
			}

			foreach($this->getRelUsuarioPermisos() as $relObj) {
				$copyObj->addRelUsuarioPermiso($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new PermisoPeer();
		}
		return self::$peer;
	}

	
	public function setModulo($v)
	{


		if ($v === null) {
			$this->setFkModuloId('0');
		} else {
			$this->setFkModuloId($v->getId());
		}


		$this->aModulo = $v;
	}


	
	public function getModulo($con = null)
	{
				include_once 'lib/model/om/BaseModuloPeer.php';

		if ($this->aModulo === null && ($this->fk_modulo_id !== null)) {

			$this->aModulo = ModuloPeer::retrieveByPK($this->fk_modulo_id, $con);

			
		}
		return $this->aModulo;
	}

	
	public function initRelRolPermisos()
	{
		if ($this->collRelRolPermisos === null) {
			$this->collRelRolPermisos = array();
		}
	}

	
	public function getRelRolPermisos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelRolPermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelRolPermisos === null) {
			if ($this->isNew()) {
			   $this->collRelRolPermisos = array();
			} else {

				$criteria->add(RelRolPermisoPeer::FK_PERMISO_ID, $this->getId());

				RelRolPermisoPeer::addSelectColumns($criteria);
				$this->collRelRolPermisos = RelRolPermisoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelRolPermisoPeer::FK_PERMISO_ID, $this->getId());

				RelRolPermisoPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelRolPermisoCriteria) || !$this->lastRelRolPermisoCriteria->equals($criteria)) {
					$this->collRelRolPermisos = RelRolPermisoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelRolPermisoCriteria = $criteria;
		return $this->collRelRolPermisos;
	}

	
	public function countRelRolPermisos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRelRolPermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelRolPermisoPeer::FK_PERMISO_ID, $this->getId());

		return RelRolPermisoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelRolPermiso(RelRolPermiso $l)
	{
		$this->collRelRolPermisos[] = $l;
		$l->setPermiso($this);
	}


	
	public function getRelRolPermisosJoinRol($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelRolPermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelRolPermisos === null) {
			if ($this->isNew()) {
				$this->collRelRolPermisos = array();
			} else {

				$criteria->add(RelRolPermisoPeer::FK_PERMISO_ID, $this->getId());

				$this->collRelRolPermisos = RelRolPermisoPeer::doSelectJoinRol($criteria, $con);
			}
		} else {
									
			$criteria->add(RelRolPermisoPeer::FK_PERMISO_ID, $this->getId());

			if (!isset($this->lastRelRolPermisoCriteria) || !$this->lastRelRolPermisoCriteria->equals($criteria)) {
				$this->collRelRolPermisos = RelRolPermisoPeer::doSelectJoinRol($criteria, $con);
			}
		}
		$this->lastRelRolPermisoCriteria = $criteria;

		return $this->collRelRolPermisos;
	}

	
	public function initRelUsuarioPermisos()
	{
		if ($this->collRelUsuarioPermisos === null) {
			$this->collRelUsuarioPermisos = array();
		}
	}

	
	public function getRelUsuarioPermisos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelUsuarioPermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelUsuarioPermisos === null) {
			if ($this->isNew()) {
			   $this->collRelUsuarioPermisos = array();
			} else {

				$criteria->add(RelUsuarioPermisoPeer::FK_PERMISO_ID, $this->getId());

				RelUsuarioPermisoPeer::addSelectColumns($criteria);
				$this->collRelUsuarioPermisos = RelUsuarioPermisoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelUsuarioPermisoPeer::FK_PERMISO_ID, $this->getId());

				RelUsuarioPermisoPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelUsuarioPermisoCriteria) || !$this->lastRelUsuarioPermisoCriteria->equals($criteria)) {
					$this->collRelUsuarioPermisos = RelUsuarioPermisoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelUsuarioPermisoCriteria = $criteria;
		return $this->collRelUsuarioPermisos;
	}

	
	public function countRelUsuarioPermisos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRelUsuarioPermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelUsuarioPermisoPeer::FK_PERMISO_ID, $this->getId());

		return RelUsuarioPermisoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelUsuarioPermiso(RelUsuarioPermiso $l)
	{
		$this->collRelUsuarioPermisos[] = $l;
		$l->setPermiso($this);
	}


	
	public function getRelUsuarioPermisosJoinUsuario($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelUsuarioPermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelUsuarioPermisos === null) {
			if ($this->isNew()) {
				$this->collRelUsuarioPermisos = array();
			} else {

				$criteria->add(RelUsuarioPermisoPeer::FK_PERMISO_ID, $this->getId());

				$this->collRelUsuarioPermisos = RelUsuarioPermisoPeer::doSelectJoinUsuario($criteria, $con);
			}
		} else {
									
			$criteria->add(RelUsuarioPermisoPeer::FK_PERMISO_ID, $this->getId());

			if (!isset($this->lastRelUsuarioPermisoCriteria) || !$this->lastRelUsuarioPermisoCriteria->equals($criteria)) {
				$this->collRelUsuarioPermisos = RelUsuarioPermisoPeer::doSelectJoinUsuario($criteria, $con);
			}
		}
		$this->lastRelUsuarioPermisoCriteria = $criteria;

		return $this->collRelUsuarioPermisos;
	}

} 