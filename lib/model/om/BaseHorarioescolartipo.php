<?php


abstract class BaseHorarioescolartipo extends BaseObject  implements Persistent {


  const PEER = 'HorarioescolartipoPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $descripcion;

	
	protected $collHorarioescolars;

	
	private $lastHorarioescolarCriteria = null;

	
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
			$this->modifiedColumns[] = HorarioescolartipoPeer::ID;
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
			$this->modifiedColumns[] = HorarioescolartipoPeer::NOMBRE;
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
			$this->modifiedColumns[] = HorarioescolartipoPeer::DESCRIPCION;
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
			throw new PropelException("Error populating Horarioescolartipo object", $e);
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
			$con = Propel::getConnection(HorarioescolartipoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = HorarioescolartipoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collHorarioescolars = null;
			$this->lastHorarioescolarCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HorarioescolartipoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			HorarioescolartipoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HorarioescolartipoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			HorarioescolartipoPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = HorarioescolartipoPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = HorarioescolartipoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HorarioescolartipoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collHorarioescolars !== null) {
				foreach ($this->collHorarioescolars as $referrerFK) {
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


			if (($retval = HorarioescolartipoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collHorarioescolars !== null) {
					foreach ($this->collHorarioescolars as $referrerFK) {
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
		$pos = HorarioescolartipoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = HorarioescolartipoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HorarioescolartipoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = HorarioescolartipoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HorarioescolartipoPeer::DATABASE_NAME);

		if ($this->isColumnModified(HorarioescolartipoPeer::ID)) $criteria->add(HorarioescolartipoPeer::ID, $this->id);
		if ($this->isColumnModified(HorarioescolartipoPeer::NOMBRE)) $criteria->add(HorarioescolartipoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(HorarioescolartipoPeer::DESCRIPCION)) $criteria->add(HorarioescolartipoPeer::DESCRIPCION, $this->descripcion);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HorarioescolartipoPeer::DATABASE_NAME);

		$criteria->add(HorarioescolartipoPeer::ID, $this->id);

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

			foreach ($this->getHorarioescolars() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addHorarioescolar($relObj->copy($deepCopy));
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
			self::$peer = new HorarioescolartipoPeer();
		}
		return self::$peer;
	}

	
	public function clearHorarioescolars()
	{
		$this->collHorarioescolars = null; 	}

	
	public function initHorarioescolars()
	{
		$this->collHorarioescolars = array();
	}

	
	public function getHorarioescolars($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(HorarioescolartipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
			   $this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, $this->id);

				HorarioescolarPeer::addSelectColumns($criteria);
				$this->collHorarioescolars = HorarioescolarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, $this->id);

				HorarioescolarPeer::addSelectColumns($criteria);
				if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
					$this->collHorarioescolars = HorarioescolarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;
		return $this->collHorarioescolars;
	}

	
	public function countHorarioescolars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(HorarioescolartipoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, $this->id);

				$count = HorarioescolarPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, $this->id);

				if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
					$count = HorarioescolarPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collHorarioescolars);
				}
			} else {
				$count = count($this->collHorarioescolars);
			}
		}
		return $count;
	}

	
	public function addHorarioescolar(Horarioescolar $l)
	{
		if ($this->collHorarioescolars === null) {
			$this->initHorarioescolars();
		}
		if (!in_array($l, $this->collHorarioescolars, true)) { 			array_push($this->collHorarioescolars, $l);
			$l->setHorarioescolartipo($this);
		}
	}


	
	public function getHorarioescolarsJoinEvento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(HorarioescolartipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, $this->id);

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEvento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, $this->id);

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEvento($criteria, $con, $join_behavior);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}


	
	public function getHorarioescolarsJoinEstablecimiento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(HorarioescolartipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, $this->id);

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, $this->id);

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}


	
	public function getHorarioescolarsJoinTurno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(HorarioescolartipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, $this->id);

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinTurno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, $this->id);

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinTurno($criteria, $con, $join_behavior);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collHorarioescolars) {
				foreach ((array) $this->collHorarioescolars as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collHorarioescolars = null;
	}

} 