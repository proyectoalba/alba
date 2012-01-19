<?php


abstract class BaseRol extends BaseObject  implements Persistent {


  const PEER = 'RolPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $descripcion;

	
	protected $activo;

	
	protected $collRolPermisos;

	
	private $lastRolPermisoCriteria = null;

	
	protected $collUsuarioRols;

	
	private $lastUsuarioRolCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->activo = true;
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

	
	public function getActivo()
	{
		return $this->activo;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RolPeer::ID;
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
			$this->modifiedColumns[] = RolPeer::NOMBRE;
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
			$this->modifiedColumns[] = RolPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setActivo($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->activo !== $v || $v === true) {
			$this->activo = $v;
			$this->modifiedColumns[] = RolPeer::ACTIVO;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(RolPeer::ACTIVO))) {
				return false;
			}

			if ($this->activo !== true) {
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
			$this->activo = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Rol object", $e);
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
			$con = Propel::getConnection(RolPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = RolPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collRolPermisos = null;
			$this->lastRolPermisoCriteria = null;

			$this->collUsuarioRols = null;
			$this->lastUsuarioRolCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RolPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			RolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RolPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			RolPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = RolPeer::ID;
			}

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

			if ($this->collRolPermisos !== null) {
				foreach ($this->collRolPermisos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUsuarioRols !== null) {
				foreach ($this->collUsuarioRols as $referrerFK) {
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


				if ($this->collRolPermisos !== null) {
					foreach ($this->collRolPermisos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUsuarioRols !== null) {
					foreach ($this->collUsuarioRols as $referrerFK) {
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
			case 3:
				return $this->getActivo();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
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

			foreach ($this->getRolPermisos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRolPermiso($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUsuarioRols() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addUsuarioRol($relObj->copy($deepCopy));
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
			self::$peer = new RolPeer();
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
			$criteria = new Criteria(RolPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRolPermisos === null) {
			if ($this->isNew()) {
			   $this->collRolPermisos = array();
			} else {

				$criteria->add(RolPermisoPeer::FK_ROL_ID, $this->id);

				RolPermisoPeer::addSelectColumns($criteria);
				$this->collRolPermisos = RolPermisoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RolPermisoPeer::FK_ROL_ID, $this->id);

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
			$criteria = new Criteria(RolPeer::DATABASE_NAME);
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

				$criteria->add(RolPermisoPeer::FK_ROL_ID, $this->id);

				$count = RolPermisoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RolPermisoPeer::FK_ROL_ID, $this->id);

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
			$l->setRol($this);
		}
	}


	
	public function getRolPermisosJoinPermiso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RolPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRolPermisos === null) {
			if ($this->isNew()) {
				$this->collRolPermisos = array();
			} else {

				$criteria->add(RolPermisoPeer::FK_ROL_ID, $this->id);

				$this->collRolPermisos = RolPermisoPeer::doSelectJoinPermiso($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RolPermisoPeer::FK_ROL_ID, $this->id);

			if (!isset($this->lastRolPermisoCriteria) || !$this->lastRolPermisoCriteria->equals($criteria)) {
				$this->collRolPermisos = RolPermisoPeer::doSelectJoinPermiso($criteria, $con, $join_behavior);
			}
		}
		$this->lastRolPermisoCriteria = $criteria;

		return $this->collRolPermisos;
	}

	
	public function clearUsuarioRols()
	{
		$this->collUsuarioRols = null; 	}

	
	public function initUsuarioRols()
	{
		$this->collUsuarioRols = array();
	}

	
	public function getUsuarioRols($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RolPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarioRols === null) {
			if ($this->isNew()) {
			   $this->collUsuarioRols = array();
			} else {

				$criteria->add(UsuarioRolPeer::FK_ROL_ID, $this->id);

				UsuarioRolPeer::addSelectColumns($criteria);
				$this->collUsuarioRols = UsuarioRolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UsuarioRolPeer::FK_ROL_ID, $this->id);

				UsuarioRolPeer::addSelectColumns($criteria);
				if (!isset($this->lastUsuarioRolCriteria) || !$this->lastUsuarioRolCriteria->equals($criteria)) {
					$this->collUsuarioRols = UsuarioRolPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUsuarioRolCriteria = $criteria;
		return $this->collUsuarioRols;
	}

	
	public function countUsuarioRols(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RolPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collUsuarioRols === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(UsuarioRolPeer::FK_ROL_ID, $this->id);

				$count = UsuarioRolPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UsuarioRolPeer::FK_ROL_ID, $this->id);

				if (!isset($this->lastUsuarioRolCriteria) || !$this->lastUsuarioRolCriteria->equals($criteria)) {
					$count = UsuarioRolPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collUsuarioRols);
				}
			} else {
				$count = count($this->collUsuarioRols);
			}
		}
		return $count;
	}

	
	public function addUsuarioRol(UsuarioRol $l)
	{
		if ($this->collUsuarioRols === null) {
			$this->initUsuarioRols();
		}
		if (!in_array($l, $this->collUsuarioRols, true)) { 			array_push($this->collUsuarioRols, $l);
			$l->setRol($this);
		}
	}


	
	public function getUsuarioRolsJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RolPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarioRols === null) {
			if ($this->isNew()) {
				$this->collUsuarioRols = array();
			} else {

				$criteria->add(UsuarioRolPeer::FK_ROL_ID, $this->id);

				$this->collUsuarioRols = UsuarioRolPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(UsuarioRolPeer::FK_ROL_ID, $this->id);

			if (!isset($this->lastUsuarioRolCriteria) || !$this->lastUsuarioRolCriteria->equals($criteria)) {
				$this->collUsuarioRols = UsuarioRolPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastUsuarioRolCriteria = $criteria;

		return $this->collUsuarioRols;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collRolPermisos) {
				foreach ((array) $this->collRolPermisos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUsuarioRols) {
				foreach ((array) $this->collUsuarioRols as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collRolPermisos = null;
		$this->collUsuarioRols = null;
	}

} 