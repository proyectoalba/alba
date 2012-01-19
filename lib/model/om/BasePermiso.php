<?php


abstract class BasePermiso extends BaseObject  implements Persistent {


  const PEER = 'PermisoPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $descripcion;

	
	protected $collRolPermisos;

	
	private $lastRolPermisoCriteria = null;

	
	protected $collUsuarioPermisos;

	
	private $lastUsuarioPermisoCriteria = null;

	
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

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PermisoPeer::ID;
		}

		return $this;
	} 
	
	public function setNombre($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = PermisoPeer::NOMBRE;
		}

		return $this;
	} 
	
	public function setDescripcion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = PermisoPeer::DESCRIPCION;
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

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->nombre = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->descripcion = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Permiso object", $e);
		}
	}

	
	public function ensureConsistency()
	{

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
			$con = Propel::getConnection(PermisoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = PermisoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collRolPermisos = null;
			$this->lastRolPermisoCriteria = null;

			$this->collUsuarioPermisos = null;
			$this->lastUsuarioPermisoCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PermisoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			PermisoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PermisoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			PermisoPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = PermisoPeer::ID;
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

			if ($this->collRolPermisos !== null) {
				foreach ($this->collRolPermisos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUsuarioPermisos !== null) {
				foreach ($this->collUsuarioPermisos as $referrerFK) {
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


			if (($retval = PermisoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRolPermisos !== null) {
					foreach ($this->collRolPermisos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUsuarioPermisos !== null) {
					foreach ($this->collUsuarioPermisos as $referrerFK) {
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
				return $this->getNombre();
				break;
			case 2:
				return $this->getDescripcion();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = PermisoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
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
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PermisoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PermisoPeer::DATABASE_NAME);

		if ($this->isColumnModified(PermisoPeer::ID)) $criteria->add(PermisoPeer::ID, $this->id);
		if ($this->isColumnModified(PermisoPeer::NOMBRE)) $criteria->add(PermisoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(PermisoPeer::DESCRIPCION)) $criteria->add(PermisoPeer::DESCRIPCION, $this->descripcion);

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


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getRolPermisos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRolPermiso($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUsuarioPermisos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addUsuarioPermiso($relObj->copy($deepCopy));
				}
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

	
	public function clearRolPermisos()
	{
		$this->collRolPermisos = null; 	}

	
	public function initRolPermisos()
	{
		$this->collRolPermisos = array();
	}

	
	public function getRolPermisos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PermisoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRolPermisos === null) {
			if ($this->isNew()) {
			   $this->collRolPermisos = array();
			} else {

				$criteria->add(RolPermisoPeer::FK_PERMISO_ID, $this->id);

				RolPermisoPeer::addSelectColumns($criteria);
				$this->collRolPermisos = RolPermisoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RolPermisoPeer::FK_PERMISO_ID, $this->id);

				RolPermisoPeer::addSelectColumns($criteria);
				if (!isset($this->lastRolPermisoCriteria) || !$this->lastRolPermisoCriteria->equals($criteria)) {
					$this->collRolPermisos = RolPermisoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRolPermisoCriteria = $criteria;
		return $this->collRolPermisos;
	}

	
	public function countRolPermisos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PermisoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRolPermisos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RolPermisoPeer::FK_PERMISO_ID, $this->id);

				$count = RolPermisoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RolPermisoPeer::FK_PERMISO_ID, $this->id);

				if (!isset($this->lastRolPermisoCriteria) || !$this->lastRolPermisoCriteria->equals($criteria)) {
					$count = RolPermisoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRolPermisos);
				}
			} else {
				$count = count($this->collRolPermisos);
			}
		}
		return $count;
	}

	
	public function addRolPermiso(RolPermiso $l)
	{
		if ($this->collRolPermisos === null) {
			$this->initRolPermisos();
		}
		if (!in_array($l, $this->collRolPermisos, true)) { 			array_push($this->collRolPermisos, $l);
			$l->setPermiso($this);
		}
	}


	
	public function getRolPermisosJoinRol($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PermisoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRolPermisos === null) {
			if ($this->isNew()) {
				$this->collRolPermisos = array();
			} else {

				$criteria->add(RolPermisoPeer::FK_PERMISO_ID, $this->id);

				$this->collRolPermisos = RolPermisoPeer::doSelectJoinRol($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RolPermisoPeer::FK_PERMISO_ID, $this->id);

			if (!isset($this->lastRolPermisoCriteria) || !$this->lastRolPermisoCriteria->equals($criteria)) {
				$this->collRolPermisos = RolPermisoPeer::doSelectJoinRol($criteria, $con, $join_behavior);
			}
		}
		$this->lastRolPermisoCriteria = $criteria;

		return $this->collRolPermisos;
	}

	
	public function clearUsuarioPermisos()
	{
		$this->collUsuarioPermisos = null; 	}

	
	public function initUsuarioPermisos()
	{
		$this->collUsuarioPermisos = array();
	}

	
	public function getUsuarioPermisos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PermisoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarioPermisos === null) {
			if ($this->isNew()) {
			   $this->collUsuarioPermisos = array();
			} else {

				$criteria->add(UsuarioPermisoPeer::FK_PERMISO_ID, $this->id);

				UsuarioPermisoPeer::addSelectColumns($criteria);
				$this->collUsuarioPermisos = UsuarioPermisoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UsuarioPermisoPeer::FK_PERMISO_ID, $this->id);

				UsuarioPermisoPeer::addSelectColumns($criteria);
				if (!isset($this->lastUsuarioPermisoCriteria) || !$this->lastUsuarioPermisoCriteria->equals($criteria)) {
					$this->collUsuarioPermisos = UsuarioPermisoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUsuarioPermisoCriteria = $criteria;
		return $this->collUsuarioPermisos;
	}

	
	public function countUsuarioPermisos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PermisoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collUsuarioPermisos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(UsuarioPermisoPeer::FK_PERMISO_ID, $this->id);

				$count = UsuarioPermisoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UsuarioPermisoPeer::FK_PERMISO_ID, $this->id);

				if (!isset($this->lastUsuarioPermisoCriteria) || !$this->lastUsuarioPermisoCriteria->equals($criteria)) {
					$count = UsuarioPermisoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collUsuarioPermisos);
				}
			} else {
				$count = count($this->collUsuarioPermisos);
			}
		}
		return $count;
	}

	
	public function addUsuarioPermiso(UsuarioPermiso $l)
	{
		if ($this->collUsuarioPermisos === null) {
			$this->initUsuarioPermisos();
		}
		if (!in_array($l, $this->collUsuarioPermisos, true)) { 			array_push($this->collUsuarioPermisos, $l);
			$l->setPermiso($this);
		}
	}


	
	public function getUsuarioPermisosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PermisoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarioPermisos === null) {
			if ($this->isNew()) {
				$this->collUsuarioPermisos = array();
			} else {

				$criteria->add(UsuarioPermisoPeer::FK_PERMISO_ID, $this->id);

				$this->collUsuarioPermisos = UsuarioPermisoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(UsuarioPermisoPeer::FK_PERMISO_ID, $this->id);

			if (!isset($this->lastUsuarioPermisoCriteria) || !$this->lastUsuarioPermisoCriteria->equals($criteria)) {
				$this->collUsuarioPermisos = UsuarioPermisoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastUsuarioPermisoCriteria = $criteria;

		return $this->collUsuarioPermisos;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collRolPermisos) {
				foreach ((array) $this->collRolPermisos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUsuarioPermisos) {
				foreach ((array) $this->collUsuarioPermisos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collRolPermisos = null;
		$this->collUsuarioPermisos = null;
	}

} 