<?php


abstract class BaseNiveltipo extends BaseObject  implements Persistent {


  const PEER = 'NiveltipoPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $descripcion;

	
	protected $collEstablecimientos;

	
	private $lastEstablecimientoCriteria = null;

	
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
			$this->modifiedColumns[] = NiveltipoPeer::ID;
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
			$this->modifiedColumns[] = NiveltipoPeer::NOMBRE;
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
			$this->modifiedColumns[] = NiveltipoPeer::DESCRIPCION;
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
			throw new PropelException("Error populating Niveltipo object", $e);
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
			$con = Propel::getConnection(NiveltipoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = NiveltipoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collEstablecimientos = null;
			$this->lastEstablecimientoCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NiveltipoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			NiveltipoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NiveltipoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			NiveltipoPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = NiveltipoPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = NiveltipoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NiveltipoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collEstablecimientos !== null) {
				foreach ($this->collEstablecimientos as $referrerFK) {
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


			if (($retval = NiveltipoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEstablecimientos !== null) {
					foreach ($this->collEstablecimientos as $referrerFK) {
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
		$pos = NiveltipoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = NiveltipoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NiveltipoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = NiveltipoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NiveltipoPeer::DATABASE_NAME);

		if ($this->isColumnModified(NiveltipoPeer::ID)) $criteria->add(NiveltipoPeer::ID, $this->id);
		if ($this->isColumnModified(NiveltipoPeer::NOMBRE)) $criteria->add(NiveltipoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(NiveltipoPeer::DESCRIPCION)) $criteria->add(NiveltipoPeer::DESCRIPCION, $this->descripcion);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NiveltipoPeer::DATABASE_NAME);

		$criteria->add(NiveltipoPeer::ID, $this->id);

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

			foreach ($this->getEstablecimientos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addEstablecimiento($relObj->copy($deepCopy));
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
			self::$peer = new NiveltipoPeer();
		}
		return self::$peer;
	}

	
	public function clearEstablecimientos()
	{
		$this->collEstablecimientos = null; 	}

	
	public function initEstablecimientos()
	{
		$this->collEstablecimientos = array();
	}

	
	public function getEstablecimientos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(NiveltipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
			   $this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_NIVELTIPO_ID, $this->id);

				EstablecimientoPeer::addSelectColumns($criteria);
				$this->collEstablecimientos = EstablecimientoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EstablecimientoPeer::FK_NIVELTIPO_ID, $this->id);

				EstablecimientoPeer::addSelectColumns($criteria);
				if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
					$this->collEstablecimientos = EstablecimientoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;
		return $this->collEstablecimientos;
	}

	
	public function countEstablecimientos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(NiveltipoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(EstablecimientoPeer::FK_NIVELTIPO_ID, $this->id);

				$count = EstablecimientoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EstablecimientoPeer::FK_NIVELTIPO_ID, $this->id);

				if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
					$count = EstablecimientoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collEstablecimientos);
				}
			} else {
				$count = count($this->collEstablecimientos);
			}
		}
		return $count;
	}

	
	public function addEstablecimiento(Establecimiento $l)
	{
		if ($this->collEstablecimientos === null) {
			$this->initEstablecimientos();
		}
		if (!in_array($l, $this->collEstablecimientos, true)) { 			array_push($this->collEstablecimientos, $l);
			$l->setNiveltipo($this);
		}
	}


	
	public function getEstablecimientosJoinDistritoescolar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(NiveltipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_NIVELTIPO_ID, $this->id);

				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinDistritoescolar($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(EstablecimientoPeer::FK_NIVELTIPO_ID, $this->id);

			if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinDistritoescolar($criteria, $con, $join_behavior);
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;

		return $this->collEstablecimientos;
	}


	
	public function getEstablecimientosJoinOrganizacion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(NiveltipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_NIVELTIPO_ID, $this->id);

				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinOrganizacion($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(EstablecimientoPeer::FK_NIVELTIPO_ID, $this->id);

			if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinOrganizacion($criteria, $con, $join_behavior);
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;

		return $this->collEstablecimientos;
	}


	
	public function getEstablecimientosJoinProvincia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(NiveltipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_NIVELTIPO_ID, $this->id);

				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinProvincia($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(EstablecimientoPeer::FK_NIVELTIPO_ID, $this->id);

			if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinProvincia($criteria, $con, $join_behavior);
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;

		return $this->collEstablecimientos;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collEstablecimientos) {
				foreach ((array) $this->collEstablecimientos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collEstablecimientos = null;
	}

} 