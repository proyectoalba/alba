<?php


abstract class BaseAnio extends BaseObject  implements Persistent {


  const PEER = 'AnioPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_establecimiento_id;

	
	protected $fk_carrera_id;

	
	protected $descripcion;

	
	protected $orden;

	
	protected $aEstablecimiento;

	
	protected $aCarrera;

	
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
		$this->fk_establecimiento_id = 0;
		$this->fk_carrera_id = 0;
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

	
	public function getFkCarreraId()
	{
		return $this->fk_carrera_id;
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
			$this->modifiedColumns[] = AnioPeer::ID;
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
			$this->modifiedColumns[] = AnioPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
		}

		return $this;
	} 
	
	public function setFkCarreraId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_carrera_id !== $v || $v === 0) {
			$this->fk_carrera_id = $v;
			$this->modifiedColumns[] = AnioPeer::FK_CARRERA_ID;
		}

		if ($this->aCarrera !== null && $this->aCarrera->getId() !== $v) {
			$this->aCarrera = null;
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
			$this->modifiedColumns[] = AnioPeer::DESCRIPCION;
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
			$this->modifiedColumns[] = AnioPeer::ORDEN;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(AnioPeer::FK_ESTABLECIMIENTO_ID,AnioPeer::FK_CARRERA_ID,AnioPeer::ORDEN))) {
				return false;
			}

			if ($this->fk_establecimiento_id !== 0) {
				return false;
			}

			if ($this->fk_carrera_id !== 0) {
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
			$this->fk_carrera_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->descripcion = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->orden = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Anio object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aEstablecimiento !== null && $this->fk_establecimiento_id !== $this->aEstablecimiento->getId()) {
			$this->aEstablecimiento = null;
		}
		if ($this->aCarrera !== null && $this->fk_carrera_id !== $this->aCarrera->getId()) {
			$this->aCarrera = null;
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
			$con = Propel::getConnection(AnioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = AnioPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aEstablecimiento = null;
			$this->aCarrera = null;
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
			$con = Propel::getConnection(AnioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			AnioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AnioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			AnioPeer::addInstanceToPool($this);
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

			if ($this->aCarrera !== null) {
				if ($this->aCarrera->isModified() || $this->aCarrera->isNew()) {
					$affectedRows += $this->aCarrera->save($con);
				}
				$this->setCarrera($this->aCarrera);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AnioPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AnioPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AnioPeer::doUpdate($this, $con);
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


												
			if ($this->aEstablecimiento !== null) {
				if (!$this->aEstablecimiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstablecimiento->getValidationFailures());
				}
			}

			if ($this->aCarrera !== null) {
				if (!$this->aCarrera->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCarrera->getValidationFailures());
				}
			}


			if (($retval = AnioPeer::doValidate($this, $columns)) !== true) {
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
		$pos = AnioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkCarreraId();
				break;
			case 3:
				return $this->getDescripcion();
				break;
			case 4:
				return $this->getOrden();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = AnioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkEstablecimientoId(),
			$keys[2] => $this->getFkCarreraId(),
			$keys[3] => $this->getDescripcion(),
			$keys[4] => $this->getOrden(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AnioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFkCarreraId($value);
				break;
			case 3:
				$this->setDescripcion($value);
				break;
			case 4:
				$this->setOrden($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AnioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkEstablecimientoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkCarreraId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescripcion($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOrden($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AnioPeer::DATABASE_NAME);

		if ($this->isColumnModified(AnioPeer::ID)) $criteria->add(AnioPeer::ID, $this->id);
		if ($this->isColumnModified(AnioPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(AnioPeer::FK_CARRERA_ID)) $criteria->add(AnioPeer::FK_CARRERA_ID, $this->fk_carrera_id);
		if ($this->isColumnModified(AnioPeer::DESCRIPCION)) $criteria->add(AnioPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(AnioPeer::ORDEN)) $criteria->add(AnioPeer::ORDEN, $this->orden);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AnioPeer::DATABASE_NAME);

		$criteria->add(AnioPeer::ID, $this->id);

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

		$copyObj->setFkCarreraId($this->fk_carrera_id);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setOrden($this->orden);


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
			self::$peer = new AnioPeer();
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
			$v->addAnio($this);
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

	
	public function setCarrera(Carrera $v = null)
	{
		if ($v === null) {
			$this->setFkCarreraId(0);
		} else {
			$this->setFkCarreraId($v->getId());
		}

		$this->aCarrera = $v;

						if ($v !== null) {
			$v->addAnio($this);
		}

		return $this;
	}


	
	public function getCarrera(PropelPDO $con = null)
	{
		if ($this->aCarrera === null && ($this->fk_carrera_id !== null)) {
			$c = new Criteria(CarreraPeer::DATABASE_NAME);
			$c->add(CarreraPeer::ID, $this->fk_carrera_id);
			$this->aCarrera = CarreraPeer::doSelectOne($c, $con);
			
		}
		return $this->aCarrera;
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
			$criteria = new Criteria(AnioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDivisions === null) {
			if ($this->isNew()) {
			   $this->collDivisions = array();
			} else {

				$criteria->add(DivisionPeer::FK_ANIO_ID, $this->id);

				DivisionPeer::addSelectColumns($criteria);
				$this->collDivisions = DivisionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DivisionPeer::FK_ANIO_ID, $this->id);

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
			$criteria = new Criteria(AnioPeer::DATABASE_NAME);
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

				$criteria->add(DivisionPeer::FK_ANIO_ID, $this->id);

				$count = DivisionPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DivisionPeer::FK_ANIO_ID, $this->id);

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
			$l->setAnio($this);
		}
	}


	
	public function getDivisionsJoinTurno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AnioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDivisions === null) {
			if ($this->isNew()) {
				$this->collDivisions = array();
			} else {

				$criteria->add(DivisionPeer::FK_ANIO_ID, $this->id);

				$this->collDivisions = DivisionPeer::doSelectJoinTurno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DivisionPeer::FK_ANIO_ID, $this->id);

			if (!isset($this->lastDivisionCriteria) || !$this->lastDivisionCriteria->equals($criteria)) {
				$this->collDivisions = DivisionPeer::doSelectJoinTurno($criteria, $con, $join_behavior);
			}
		}
		$this->lastDivisionCriteria = $criteria;

		return $this->collDivisions;
	}


	
	public function getDivisionsJoinOrientacion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AnioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDivisions === null) {
			if ($this->isNew()) {
				$this->collDivisions = array();
			} else {

				$criteria->add(DivisionPeer::FK_ANIO_ID, $this->id);

				$this->collDivisions = DivisionPeer::doSelectJoinOrientacion($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DivisionPeer::FK_ANIO_ID, $this->id);

			if (!isset($this->lastDivisionCriteria) || !$this->lastDivisionCriteria->equals($criteria)) {
				$this->collDivisions = DivisionPeer::doSelectJoinOrientacion($criteria, $con, $join_behavior);
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
			$criteria = new Criteria(AnioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividads === null) {
			if ($this->isNew()) {
			   $this->collRelAnioActividads = array();
			} else {

				$criteria->add(RelAnioActividadPeer::FK_ANIO_ID, $this->id);

				RelAnioActividadPeer::addSelectColumns($criteria);
				$this->collRelAnioActividads = RelAnioActividadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAnioActividadPeer::FK_ANIO_ID, $this->id);

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
			$criteria = new Criteria(AnioPeer::DATABASE_NAME);
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

				$criteria->add(RelAnioActividadPeer::FK_ANIO_ID, $this->id);

				$count = RelAnioActividadPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAnioActividadPeer::FK_ANIO_ID, $this->id);

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
			$l->setAnio($this);
		}
	}


	
	public function getRelAnioActividadsJoinActividad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AnioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividads === null) {
			if ($this->isNew()) {
				$this->collRelAnioActividads = array();
			} else {

				$criteria->add(RelAnioActividadPeer::FK_ANIO_ID, $this->id);

				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelAnioActividadPeer::FK_ANIO_ID, $this->id);

			if (!isset($this->lastRelAnioActividadCriteria) || !$this->lastRelAnioActividadCriteria->equals($criteria)) {
				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelAnioActividadCriteria = $criteria;

		return $this->collRelAnioActividads;
	}


	
	public function getRelAnioActividadsJoinOrientacion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AnioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividads === null) {
			if ($this->isNew()) {
				$this->collRelAnioActividads = array();
			} else {

				$criteria->add(RelAnioActividadPeer::FK_ANIO_ID, $this->id);

				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinOrientacion($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelAnioActividadPeer::FK_ANIO_ID, $this->id);

			if (!isset($this->lastRelAnioActividadCriteria) || !$this->lastRelAnioActividadCriteria->equals($criteria)) {
				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinOrientacion($criteria, $con, $join_behavior);
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
			$this->aEstablecimiento = null;
			$this->aCarrera = null;
	}

} 