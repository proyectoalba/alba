<?php


abstract class BaseOrientacion extends BaseObject  implements Persistent {


  const PEER = 'OrientacionPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $descripcion;

	
	protected $collDivisions;

	
	private $lastDivisionCriteria = null;

	
	protected $collRelAnioActividads;

	
	private $lastRelAnioActividadCriteria = null;

	
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
			$this->modifiedColumns[] = OrientacionPeer::ID;
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
			$this->modifiedColumns[] = OrientacionPeer::NOMBRE;
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
			$this->modifiedColumns[] = OrientacionPeer::DESCRIPCION;
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
			throw new PropelException("Error populating Orientacion object", $e);
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
			$con = Propel::getConnection(OrientacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = OrientacionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collDivisions = null;
			$this->lastDivisionCriteria = null;

			$this->collRelAnioActividads = null;
			$this->lastRelAnioActividadCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OrientacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			OrientacionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OrientacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			OrientacionPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = OrientacionPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = OrientacionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OrientacionPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collDivisions !== null) {
				foreach ($this->collDivisions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelAnioActividads !== null) {
				foreach ($this->collRelAnioActividads as $referrerFK) {
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


			if (($retval = OrientacionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDivisions !== null) {
					foreach ($this->collDivisions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelAnioActividads !== null) {
					foreach ($this->collRelAnioActividads as $referrerFK) {
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
		$pos = OrientacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = OrientacionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OrientacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = OrientacionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OrientacionPeer::DATABASE_NAME);

		if ($this->isColumnModified(OrientacionPeer::ID)) $criteria->add(OrientacionPeer::ID, $this->id);
		if ($this->isColumnModified(OrientacionPeer::NOMBRE)) $criteria->add(OrientacionPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(OrientacionPeer::DESCRIPCION)) $criteria->add(OrientacionPeer::DESCRIPCION, $this->descripcion);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OrientacionPeer::DATABASE_NAME);

		$criteria->add(OrientacionPeer::ID, $this->id);

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

			foreach ($this->getDivisions() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDivision($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRelAnioActividads() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelAnioActividad($relObj->copy($deepCopy));
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
			self::$peer = new OrientacionPeer();
		}
		return self::$peer;
	}

	
	public function clearDivisions()
	{
		$this->collDivisions = null; 	}

	
	public function initDivisions()
	{
		$this->collDivisions = array();
	}

	
	public function getDivisions($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(OrientacionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDivisions === null) {
			if ($this->isNew()) {
			   $this->collDivisions = array();
			} else {

				$criteria->add(DivisionPeer::FK_ORIENTACION_ID, $this->id);

				DivisionPeer::addSelectColumns($criteria);
				$this->collDivisions = DivisionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DivisionPeer::FK_ORIENTACION_ID, $this->id);

				DivisionPeer::addSelectColumns($criteria);
				if (!isset($this->lastDivisionCriteria) || !$this->lastDivisionCriteria->equals($criteria)) {
					$this->collDivisions = DivisionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDivisionCriteria = $criteria;
		return $this->collDivisions;
	}

	
	public function countDivisions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(OrientacionPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDivisions === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DivisionPeer::FK_ORIENTACION_ID, $this->id);

				$count = DivisionPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DivisionPeer::FK_ORIENTACION_ID, $this->id);

				if (!isset($this->lastDivisionCriteria) || !$this->lastDivisionCriteria->equals($criteria)) {
					$count = DivisionPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDivisions);
				}
			} else {
				$count = count($this->collDivisions);
			}
		}
		return $count;
	}

	
	public function addDivision(Division $l)
	{
		if ($this->collDivisions === null) {
			$this->initDivisions();
		}
		if (!in_array($l, $this->collDivisions, true)) { 			array_push($this->collDivisions, $l);
			$l->setOrientacion($this);
		}
	}


	
	public function getDivisionsJoinAnio($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(OrientacionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDivisions === null) {
			if ($this->isNew()) {
				$this->collDivisions = array();
			} else {

				$criteria->add(DivisionPeer::FK_ORIENTACION_ID, $this->id);

				$this->collDivisions = DivisionPeer::doSelectJoinAnio($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DivisionPeer::FK_ORIENTACION_ID, $this->id);

			if (!isset($this->lastDivisionCriteria) || !$this->lastDivisionCriteria->equals($criteria)) {
				$this->collDivisions = DivisionPeer::doSelectJoinAnio($criteria, $con, $join_behavior);
			}
		}
		$this->lastDivisionCriteria = $criteria;

		return $this->collDivisions;
	}


	
	public function getDivisionsJoinTurno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(OrientacionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDivisions === null) {
			if ($this->isNew()) {
				$this->collDivisions = array();
			} else {

				$criteria->add(DivisionPeer::FK_ORIENTACION_ID, $this->id);

				$this->collDivisions = DivisionPeer::doSelectJoinTurno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DivisionPeer::FK_ORIENTACION_ID, $this->id);

			if (!isset($this->lastDivisionCriteria) || !$this->lastDivisionCriteria->equals($criteria)) {
				$this->collDivisions = DivisionPeer::doSelectJoinTurno($criteria, $con, $join_behavior);
			}
		}
		$this->lastDivisionCriteria = $criteria;

		return $this->collDivisions;
	}

	
	public function clearRelAnioActividads()
	{
		$this->collRelAnioActividads = null; 	}

	
	public function initRelAnioActividads()
	{
		$this->collRelAnioActividads = array();
	}

	
	public function getRelAnioActividads($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(OrientacionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividads === null) {
			if ($this->isNew()) {
			   $this->collRelAnioActividads = array();
			} else {

				$criteria->add(RelAnioActividadPeer::FK_ORIENTACION_ID, $this->id);

				RelAnioActividadPeer::addSelectColumns($criteria);
				$this->collRelAnioActividads = RelAnioActividadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAnioActividadPeer::FK_ORIENTACION_ID, $this->id);

				RelAnioActividadPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelAnioActividadCriteria) || !$this->lastRelAnioActividadCriteria->equals($criteria)) {
					$this->collRelAnioActividads = RelAnioActividadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelAnioActividadCriteria = $criteria;
		return $this->collRelAnioActividads;
	}

	
	public function countRelAnioActividads(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(OrientacionPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelAnioActividads === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelAnioActividadPeer::FK_ORIENTACION_ID, $this->id);

				$count = RelAnioActividadPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAnioActividadPeer::FK_ORIENTACION_ID, $this->id);

				if (!isset($this->lastRelAnioActividadCriteria) || !$this->lastRelAnioActividadCriteria->equals($criteria)) {
					$count = RelAnioActividadPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelAnioActividads);
				}
			} else {
				$count = count($this->collRelAnioActividads);
			}
		}
		return $count;
	}

	
	public function addRelAnioActividad(RelAnioActividad $l)
	{
		if ($this->collRelAnioActividads === null) {
			$this->initRelAnioActividads();
		}
		if (!in_array($l, $this->collRelAnioActividads, true)) { 			array_push($this->collRelAnioActividads, $l);
			$l->setOrientacion($this);
		}
	}


	
	public function getRelAnioActividadsJoinAnio($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(OrientacionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividads === null) {
			if ($this->isNew()) {
				$this->collRelAnioActividads = array();
			} else {

				$criteria->add(RelAnioActividadPeer::FK_ORIENTACION_ID, $this->id);

				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinAnio($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelAnioActividadPeer::FK_ORIENTACION_ID, $this->id);

			if (!isset($this->lastRelAnioActividadCriteria) || !$this->lastRelAnioActividadCriteria->equals($criteria)) {
				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinAnio($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelAnioActividadCriteria = $criteria;

		return $this->collRelAnioActividads;
	}


	
	public function getRelAnioActividadsJoinActividad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(OrientacionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividads === null) {
			if ($this->isNew()) {
				$this->collRelAnioActividads = array();
			} else {

				$criteria->add(RelAnioActividadPeer::FK_ORIENTACION_ID, $this->id);

				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelAnioActividadPeer::FK_ORIENTACION_ID, $this->id);

			if (!isset($this->lastRelAnioActividadCriteria) || !$this->lastRelAnioActividadCriteria->equals($criteria)) {
				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelAnioActividadCriteria = $criteria;

		return $this->collRelAnioActividads;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collDivisions) {
				foreach ((array) $this->collDivisions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRelAnioActividads) {
				foreach ((array) $this->collRelAnioActividads as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collDivisions = null;
		$this->collRelAnioActividads = null;
	}

} 