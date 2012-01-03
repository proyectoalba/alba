<?php


abstract class BaseRolResponsable extends BaseObject  implements Persistent {


  const PEER = 'RolResponsablePeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $descripcion;

	
	protected $activo;

	
	protected $collResponsables;

	
	private $lastResponsableCriteria = null;

	
	protected $collRelRolresponsableResponsables;

	
	private $lastRelRolresponsableResponsableCriteria = null;

	
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
			$this->modifiedColumns[] = RolResponsablePeer::ID;
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
			$this->modifiedColumns[] = RolResponsablePeer::NOMBRE;
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
			$this->modifiedColumns[] = RolResponsablePeer::DESCRIPCION;
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
			$this->modifiedColumns[] = RolResponsablePeer::ACTIVO;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(RolResponsablePeer::ACTIVO))) {
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
			throw new PropelException("Error populating RolResponsable object", $e);
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
			$con = Propel::getConnection(RolResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = RolResponsablePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collResponsables = null;
			$this->lastResponsableCriteria = null;

			$this->collRelRolresponsableResponsables = null;
			$this->lastRelRolresponsableResponsableCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RolResponsablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			RolResponsablePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RolResponsablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			RolResponsablePeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = RolResponsablePeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RolResponsablePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RolResponsablePeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collResponsables !== null) {
				foreach ($this->collResponsables as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelRolresponsableResponsables !== null) {
				foreach ($this->collRelRolresponsableResponsables as $referrerFK) {
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


			if (($retval = RolResponsablePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collResponsables !== null) {
					foreach ($this->collResponsables as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelRolresponsableResponsables !== null) {
					foreach ($this->collRelRolresponsableResponsables as $referrerFK) {
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
		$pos = RolResponsablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = RolResponsablePeer::getFieldNames($keyType);
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
		$pos = RolResponsablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = RolResponsablePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setActivo($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RolResponsablePeer::DATABASE_NAME);

		if ($this->isColumnModified(RolResponsablePeer::ID)) $criteria->add(RolResponsablePeer::ID, $this->id);
		if ($this->isColumnModified(RolResponsablePeer::NOMBRE)) $criteria->add(RolResponsablePeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(RolResponsablePeer::DESCRIPCION)) $criteria->add(RolResponsablePeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(RolResponsablePeer::ACTIVO)) $criteria->add(RolResponsablePeer::ACTIVO, $this->activo);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RolResponsablePeer::DATABASE_NAME);

		$criteria->add(RolResponsablePeer::ID, $this->id);

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

			foreach ($this->getResponsables() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addResponsable($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRelRolresponsableResponsables() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelRolresponsableResponsable($relObj->copy($deepCopy));
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
			self::$peer = new RolResponsablePeer();
		}
		return self::$peer;
	}

	
	public function clearResponsables()
	{
		$this->collResponsables = null; 	}

	
	public function initResponsables()
	{
		$this->collResponsables = array();
	}

	
	public function getResponsables($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RolResponsablePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
			   $this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

				ResponsablePeer::addSelectColumns($criteria);
				$this->collResponsables = ResponsablePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

				ResponsablePeer::addSelectColumns($criteria);
				if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
					$this->collResponsables = ResponsablePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastResponsableCriteria = $criteria;
		return $this->collResponsables;
	}

	
	public function countResponsables(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RolResponsablePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

				$count = ResponsablePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

				if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
					$count = ResponsablePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collResponsables);
				}
			} else {
				$count = count($this->collResponsables);
			}
		}
		return $count;
	}

	
	public function addResponsable(Responsable $l)
	{
		if ($this->collResponsables === null) {
			$this->initResponsables();
		}
		if (!in_array($l, $this->collResponsables, true)) { 			array_push($this->collResponsables, $l);
			$l->setRolResponsable($this);
		}
	}


	
	public function getResponsablesJoinProvincia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RolResponsablePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
				$this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

				$this->collResponsables = ResponsablePeer::doSelectJoinProvincia($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinProvincia($criteria, $con, $join_behavior);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}


	
	public function getResponsablesJoinTipodocumento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RolResponsablePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
				$this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

				$this->collResponsables = ResponsablePeer::doSelectJoinTipodocumento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinTipodocumento($criteria, $con, $join_behavior);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}


	
	public function getResponsablesJoinCuenta($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RolResponsablePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
				$this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

				$this->collResponsables = ResponsablePeer::doSelectJoinCuenta($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinCuenta($criteria, $con, $join_behavior);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}


	
	public function getResponsablesJoinNivelInstruccion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RolResponsablePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
				$this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

				$this->collResponsables = ResponsablePeer::doSelectJoinNivelInstruccion($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinNivelInstruccion($criteria, $con, $join_behavior);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}

	
	public function clearRelRolresponsableResponsables()
	{
		$this->collRelRolresponsableResponsables = null; 	}

	
	public function initRelRolresponsableResponsables()
	{
		$this->collRelRolresponsableResponsables = array();
	}

	
	public function getRelRolresponsableResponsables($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RolResponsablePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelRolresponsableResponsables === null) {
			if ($this->isNew()) {
			   $this->collRelRolresponsableResponsables = array();
			} else {

				$criteria->add(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

				RelRolresponsableResponsablePeer::addSelectColumns($criteria);
				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

				RelRolresponsableResponsablePeer::addSelectColumns($criteria);
				if (!isset($this->lastRelRolresponsableResponsableCriteria) || !$this->lastRelRolresponsableResponsableCriteria->equals($criteria)) {
					$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelRolresponsableResponsableCriteria = $criteria;
		return $this->collRelRolresponsableResponsables;
	}

	
	public function countRelRolresponsableResponsables(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RolResponsablePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelRolresponsableResponsables === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

				$count = RelRolresponsableResponsablePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

				if (!isset($this->lastRelRolresponsableResponsableCriteria) || !$this->lastRelRolresponsableResponsableCriteria->equals($criteria)) {
					$count = RelRolresponsableResponsablePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelRolresponsableResponsables);
				}
			} else {
				$count = count($this->collRelRolresponsableResponsables);
			}
		}
		return $count;
	}

	
	public function addRelRolresponsableResponsable(RelRolresponsableResponsable $l)
	{
		if ($this->collRelRolresponsableResponsables === null) {
			$this->initRelRolresponsableResponsables();
		}
		if (!in_array($l, $this->collRelRolresponsableResponsables, true)) { 			array_push($this->collRelRolresponsableResponsables, $l);
			$l->setRolResponsable($this);
		}
	}


	
	public function getRelRolresponsableResponsablesJoinResponsable($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RolResponsablePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelRolresponsableResponsables === null) {
			if ($this->isNew()) {
				$this->collRelRolresponsableResponsables = array();
			} else {

				$criteria->add(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinResponsable($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

			if (!isset($this->lastRelRolresponsableResponsableCriteria) || !$this->lastRelRolresponsableResponsableCriteria->equals($criteria)) {
				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinResponsable($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelRolresponsableResponsableCriteria = $criteria;

		return $this->collRelRolresponsableResponsables;
	}


	
	public function getRelRolresponsableResponsablesJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RolResponsablePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelRolresponsableResponsables === null) {
			if ($this->isNew()) {
				$this->collRelRolresponsableResponsables = array();
			} else {

				$criteria->add(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, $this->id);

			if (!isset($this->lastRelRolresponsableResponsableCriteria) || !$this->lastRelRolresponsableResponsableCriteria->equals($criteria)) {
				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelRolresponsableResponsableCriteria = $criteria;

		return $this->collRelRolresponsableResponsables;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collResponsables) {
				foreach ((array) $this->collResponsables as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRelRolresponsableResponsables) {
				foreach ((array) $this->collRelRolresponsableResponsables as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collResponsables = null;
		$this->collRelRolresponsableResponsables = null;
	}

} 