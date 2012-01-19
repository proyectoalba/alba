<?php


abstract class BaseCarrera extends BaseObject  implements Persistent {


  const PEER = 'CarreraPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_establecimiento_id;

	
	protected $descripcion;

	
	protected $orden;

	
	protected $aEstablecimiento;

	
	protected $collAnios;

	
	private $lastAnioCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->fk_establecimiento_id = 0;
		$this->orden = 0;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFkEstablecimientoId()
	{
		return $this->fk_establecimiento_id;
	}

	
	public function getDescripcion()
	{
		return $this->descripcion;
	}

	
	public function getOrden()
	{
		return $this->orden;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CarreraPeer::ID;
		}

		return $this;
	} 
	
	public function setFkEstablecimientoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_establecimiento_id !== $v || $v === 0) {
			$this->fk_establecimiento_id = $v;
			$this->modifiedColumns[] = CarreraPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
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
			$this->modifiedColumns[] = CarreraPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setOrden($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->orden !== $v || $v === 0) {
			$this->orden = $v;
			$this->modifiedColumns[] = CarreraPeer::ORDEN;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(CarreraPeer::FK_ESTABLECIMIENTO_ID,CarreraPeer::ORDEN))) {
				return false;
			}

			if ($this->fk_establecimiento_id !== 0) {
				return false;
			}

			if ($this->orden !== 0) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_establecimiento_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->descripcion = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->orden = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Carrera object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aEstablecimiento !== null && $this->fk_establecimiento_id !== $this->aEstablecimiento->getId()) {
			$this->aEstablecimiento = null;
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
			$con = Propel::getConnection(CarreraPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = CarreraPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aEstablecimiento = null;
			$this->collAnios = null;
			$this->lastAnioCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CarreraPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			CarreraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CarreraPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			CarreraPeer::addInstanceToPool($this);
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

												
			if ($this->aEstablecimiento !== null) {
				if ($this->aEstablecimiento->isModified() || $this->aEstablecimiento->isNew()) {
					$affectedRows += $this->aEstablecimiento->save($con);
				}
				$this->setEstablecimiento($this->aEstablecimiento);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = CarreraPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CarreraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CarreraPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collAnios !== null) {
				foreach ($this->collAnios as $referrerFK) {
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


												
			if ($this->aEstablecimiento !== null) {
				if (!$this->aEstablecimiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstablecimiento->getValidationFailures());
				}
			}


			if (($retval = CarreraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAnios !== null) {
					foreach ($this->collAnios as $referrerFK) {
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
		$pos = CarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkEstablecimientoId();
				break;
			case 2:
				return $this->getDescripcion();
				break;
			case 3:
				return $this->getOrden();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = CarreraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkEstablecimientoId(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getOrden(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkEstablecimientoId($value);
				break;
			case 2:
				$this->setDescripcion($value);
				break;
			case 3:
				$this->setOrden($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CarreraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkEstablecimientoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOrden($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CarreraPeer::DATABASE_NAME);

		if ($this->isColumnModified(CarreraPeer::ID)) $criteria->add(CarreraPeer::ID, $this->id);
		if ($this->isColumnModified(CarreraPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(CarreraPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(CarreraPeer::DESCRIPCION)) $criteria->add(CarreraPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(CarreraPeer::ORDEN)) $criteria->add(CarreraPeer::ORDEN, $this->orden);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CarreraPeer::DATABASE_NAME);

		$criteria->add(CarreraPeer::ID, $this->id);

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

		$copyObj->setFkEstablecimientoId($this->fk_establecimiento_id);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setOrden($this->orden);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getAnios() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addAnio($relObj->copy($deepCopy));
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
			self::$peer = new CarreraPeer();
		}
		return self::$peer;
	}

	
	public function setEstablecimiento(Establecimiento $v = null)
	{
		if ($v === null) {
			$this->setFkEstablecimientoId(0);
		} else {
			$this->setFkEstablecimientoId($v->getId());
		}

		$this->aEstablecimiento = $v;

						if ($v !== null) {
			$v->addCarrera($this);
		}

		return $this;
	}


	
	public function getEstablecimiento(PropelPDO $con = null)
	{
		if ($this->aEstablecimiento === null && ($this->fk_establecimiento_id !== null)) {
			$c = new Criteria(EstablecimientoPeer::DATABASE_NAME);
			$c->add(EstablecimientoPeer::ID, $this->fk_establecimiento_id);
			$this->aEstablecimiento = EstablecimientoPeer::doSelectOne($c, $con);
			
		}
		return $this->aEstablecimiento;
	}

	
	public function clearAnios()
	{
		$this->collAnios = null; 	}

	
	public function initAnios()
	{
		$this->collAnios = array();
	}

	
	public function getAnios($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAnios === null) {
			if ($this->isNew()) {
			   $this->collAnios = array();
			} else {

				$criteria->add(AnioPeer::FK_CARRERA_ID, $this->id);

				AnioPeer::addSelectColumns($criteria);
				$this->collAnios = AnioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AnioPeer::FK_CARRERA_ID, $this->id);

				AnioPeer::addSelectColumns($criteria);
				if (!isset($this->lastAnioCriteria) || !$this->lastAnioCriteria->equals($criteria)) {
					$this->collAnios = AnioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAnioCriteria = $criteria;
		return $this->collAnios;
	}

	
	public function countAnios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAnios === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AnioPeer::FK_CARRERA_ID, $this->id);

				$count = AnioPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AnioPeer::FK_CARRERA_ID, $this->id);

				if (!isset($this->lastAnioCriteria) || !$this->lastAnioCriteria->equals($criteria)) {
					$count = AnioPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collAnios);
				}
			} else {
				$count = count($this->collAnios);
			}
		}
		return $count;
	}

	
	public function addAnio(Anio $l)
	{
		if ($this->collAnios === null) {
			$this->initAnios();
		}
		if (!in_array($l, $this->collAnios, true)) { 			array_push($this->collAnios, $l);
			$l->setCarrera($this);
		}
	}


	
	public function getAniosJoinEstablecimiento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAnios === null) {
			if ($this->isNew()) {
				$this->collAnios = array();
			} else {

				$criteria->add(AnioPeer::FK_CARRERA_ID, $this->id);

				$this->collAnios = AnioPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AnioPeer::FK_CARRERA_ID, $this->id);

			if (!isset($this->lastAnioCriteria) || !$this->lastAnioCriteria->equals($criteria)) {
				$this->collAnios = AnioPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		}
		$this->lastAnioCriteria = $criteria;

		return $this->collAnios;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collAnios) {
				foreach ((array) $this->collAnios as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collAnios = null;
			$this->aEstablecimiento = null;
	}

} 