<?php


abstract class BaseRol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre = '';


	
	protected $descripcion = '';


	
	protected $activo = true;

	
	protected $collRelRolPermisos;

	
	protected $lastRelRolPermisoCriteria = null;

	
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

	
	public function getActivo()
	{

		return $this->activo;
	}

	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RolPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

		if ($this->nombre !== $v || $v === '') {
			$this->nombre = $v;
			$this->modifiedColumns[] = RolPeer::NOMBRE;
		}

	} 
	
	public function setDescripcion($v)
	{

		if ($this->descripcion !== $v || $v === '') {
			$this->descripcion = $v;
			$this->modifiedColumns[] = RolPeer::DESCRIPCION;
		}

	} 
	
	public function setActivo($v)
	{

		if ($this->activo !== $v || $v === true) {
			$this->activo = $v;
			$this->modifiedColumns[] = RolPeer::ACTIVO;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->descripcion = $rs->getString($startcol + 2);

			$this->activo = $rs->getBoolean($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Rol object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RolPeer::DATABASE_NAME);
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
					$pk = RolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RolPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collRelRolPermisos !== null) {
				foreach($this->collRelRolPermisos as $referrerFK) {
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


			if (($retval = RolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelRolPermisos !== null) {
					foreach($this->collRelRolPermisos as $referrerFK) {
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
		$pos = RolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getActivo();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getActivo(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setActivo($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setActivo($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RolPeer::DATABASE_NAME);

		if ($this->isColumnModified(RolPeer::ID)) $criteria->add(RolPeer::ID, $this->id);
		if ($this->isColumnModified(RolPeer::NOMBRE)) $criteria->add(RolPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(RolPeer::DESCRIPCION)) $criteria->add(RolPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(RolPeer::ACTIVO)) $criteria->add(RolPeer::ACTIVO, $this->activo);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RolPeer::DATABASE_NAME);

		$criteria->add(RolPeer::ID, $this->id);

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

		$copyObj->setActivo($this->activo);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getRelRolPermisos() as $relObj) {
				$copyObj->addRelRolPermiso($relObj->copy($deepCopy));
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
			self::$peer = new RolPeer();
		}
		return self::$peer;
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

				$criteria->add(RelRolPermisoPeer::FK_ROL_ID, $this->getId());

				RelRolPermisoPeer::addSelectColumns($criteria);
				$this->collRelRolPermisos = RelRolPermisoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelRolPermisoPeer::FK_ROL_ID, $this->getId());

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

		$criteria->add(RelRolPermisoPeer::FK_ROL_ID, $this->getId());

		return RelRolPermisoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelRolPermiso(RelRolPermiso $l)
	{
		$this->collRelRolPermisos[] = $l;
		$l->setRol($this);
	}


	
	public function getRelRolPermisosJoinPermiso($criteria = null, $con = null)
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

				$criteria->add(RelRolPermisoPeer::FK_ROL_ID, $this->getId());

				$this->collRelRolPermisos = RelRolPermisoPeer::doSelectJoinPermiso($criteria, $con);
			}
		} else {
									
			$criteria->add(RelRolPermisoPeer::FK_ROL_ID, $this->getId());

			if (!isset($this->lastRelRolPermisoCriteria) || !$this->lastRelRolPermisoCriteria->equals($criteria)) {
				$this->collRelRolPermisos = RelRolPermisoPeer::doSelectJoinPermiso($criteria, $con);
			}
		}
		$this->lastRelRolPermisoCriteria = $criteria;

		return $this->collRelRolPermisos;
	}

} 