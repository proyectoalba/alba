<?php


abstract class BaseActividad extends BaseObject  implements Persistent {


  const PEER = 'ActividadPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_establecimiento_id;

	
	protected $nombre;

	
	protected $descripcion;

	
	protected $aEstablecimiento;

	
	protected $collBoletinActividadess;

	
	private $lastBoletinActividadesCriteria = null;

	
	protected $collExamens;

	
	private $lastExamenCriteria = null;

	
	protected $collRelAnioActividads;

	
	private $lastRelAnioActividadCriteria = null;

	
	protected $collRelDivisionActividadDocentes;

	
	private $lastRelDivisionActividadDocenteCriteria = null;

	
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
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFkEstablecimientoId()
	{
		return $this->fk_establecimiento_id;
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
			$this->modifiedColumns[] = ActividadPeer::ID;
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
			$this->modifiedColumns[] = ActividadPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
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
			$this->modifiedColumns[] = ActividadPeer::NOMBRE;
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
			$this->modifiedColumns[] = ActividadPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(ActividadPeer::FK_ESTABLECIMIENTO_ID))) {
				return false;
			}

			if ($this->fk_establecimiento_id !== 0) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_establecimiento_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->nombre = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->descripcion = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Actividad object", $e);
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
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = ActividadPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aEstablecimiento = null;
			$this->collBoletinActividadess = null;
			$this->lastBoletinActividadesCriteria = null;

			$this->collExamens = null;
			$this->lastExamenCriteria = null;

			$this->collRelAnioActividads = null;
			$this->lastRelAnioActividadCriteria = null;

			$this->collRelDivisionActividadDocentes = null;
			$this->lastRelDivisionActividadDocenteCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			ActividadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			ActividadPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = ActividadPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ActividadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ActividadPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collBoletinActividadess !== null) {
				foreach ($this->collBoletinActividadess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collExamens !== null) {
				foreach ($this->collExamens as $referrerFK) {
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

			if ($this->collRelDivisionActividadDocentes !== null) {
				foreach ($this->collRelDivisionActividadDocentes as $referrerFK) {
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


			if (($retval = ActividadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collBoletinActividadess !== null) {
					foreach ($this->collBoletinActividadess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collExamens !== null) {
					foreach ($this->collExamens as $referrerFK) {
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

				if ($this->collRelDivisionActividadDocentes !== null) {
					foreach ($this->collRelDivisionActividadDocentes as $referrerFK) {
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
		$pos = ActividadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNombre();
				break;
			case 3:
				return $this->getDescripcion();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = ActividadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkEstablecimientoId(),
			$keys[2] => $this->getNombre(),
			$keys[3] => $this->getDescripcion(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ActividadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setNombre($value);
				break;
			case 3:
				$this->setDescripcion($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ActividadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkEstablecimientoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescripcion($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ActividadPeer::DATABASE_NAME);

		if ($this->isColumnModified(ActividadPeer::ID)) $criteria->add(ActividadPeer::ID, $this->id);
		if ($this->isColumnModified(ActividadPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(ActividadPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(ActividadPeer::NOMBRE)) $criteria->add(ActividadPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(ActividadPeer::DESCRIPCION)) $criteria->add(ActividadPeer::DESCRIPCION, $this->descripcion);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ActividadPeer::DATABASE_NAME);

		$criteria->add(ActividadPeer::ID, $this->id);

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

		$copyObj->setNombre($this->nombre);

		$copyObj->setDescripcion($this->descripcion);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getBoletinActividadess() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addBoletinActividades($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getExamens() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addExamen($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRelAnioActividads() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelAnioActividad($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRelDivisionActividadDocentes() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelDivisionActividadDocente($relObj->copy($deepCopy));
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
			self::$peer = new ActividadPeer();
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
			$v->addActividad($this);
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

	
	public function clearBoletinActividadess()
	{
		$this->collBoletinActividadess = null; 	}

	
	public function initBoletinActividadess()
	{
		$this->collBoletinActividadess = array();
	}

	
	public function getBoletinActividadess($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
			   $this->collBoletinActividadess = array();
			} else {

				$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->id);

				BoletinActividadesPeer::addSelectColumns($criteria);
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->id);

				BoletinActividadesPeer::addSelectColumns($criteria);
				if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
					$this->collBoletinActividadess = BoletinActividadesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;
		return $this->collBoletinActividadess;
	}

	
	public function countBoletinActividadess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->id);

				$count = BoletinActividadesPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->id);

				if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
					$count = BoletinActividadesPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collBoletinActividadess);
				}
			} else {
				$count = count($this->collBoletinActividadess);
			}
		}
		return $count;
	}

	
	public function addBoletinActividades(BoletinActividades $l)
	{
		if ($this->collBoletinActividadess === null) {
			$this->initBoletinActividadess();
		}
		if (!in_array($l, $this->collBoletinActividadess, true)) { 			array_push($this->collBoletinActividadess, $l);
			$l->setActividad($this);
		}
	}


	
	public function getBoletinActividadessJoinEscalanota($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
				$this->collBoletinActividadess = array();
			} else {

				$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinEscalanota($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinEscalanota($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;

		return $this->collBoletinActividadess;
	}


	
	public function getBoletinActividadessJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
				$this->collBoletinActividadess = array();
			} else {

				$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;

		return $this->collBoletinActividadess;
	}


	
	public function getBoletinActividadessJoinPeriodo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
				$this->collBoletinActividadess = array();
			} else {

				$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinPeriodo($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinPeriodo($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;

		return $this->collBoletinActividadess;
	}

	
	public function clearExamens()
	{
		$this->collExamens = null; 	}

	
	public function initExamens()
	{
		$this->collExamens = array();
	}

	
	public function getExamens($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExamens === null) {
			if ($this->isNew()) {
			   $this->collExamens = array();
			} else {

				$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->id);

				ExamenPeer::addSelectColumns($criteria);
				$this->collExamens = ExamenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->id);

				ExamenPeer::addSelectColumns($criteria);
				if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
					$this->collExamens = ExamenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastExamenCriteria = $criteria;
		return $this->collExamens;
	}

	
	public function countExamens(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collExamens === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->id);

				$count = ExamenPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->id);

				if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
					$count = ExamenPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collExamens);
				}
			} else {
				$count = count($this->collExamens);
			}
		}
		return $count;
	}

	
	public function addExamen(Examen $l)
	{
		if ($this->collExamens === null) {
			$this->initExamens();
		}
		if (!in_array($l, $this->collExamens, true)) { 			array_push($this->collExamens, $l);
			$l->setActividad($this);
		}
	}


	
	public function getExamensJoinEscalanota($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExamens === null) {
			if ($this->isNew()) {
				$this->collExamens = array();
			} else {

				$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collExamens = ExamenPeer::doSelectJoinEscalanota($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinEscalanota($criteria, $con, $join_behavior);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
	}


	
	public function getExamensJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExamens === null) {
			if ($this->isNew()) {
				$this->collExamens = array();
			} else {

				$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collExamens = ExamenPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
	}


	
	public function getExamensJoinPeriodo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExamens === null) {
			if ($this->isNew()) {
				$this->collExamens = array();
			} else {

				$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collExamens = ExamenPeer::doSelectJoinPeriodo($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinPeriodo($criteria, $con, $join_behavior);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
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
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividads === null) {
			if ($this->isNew()) {
			   $this->collRelAnioActividads = array();
			} else {

				$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->id);

				RelAnioActividadPeer::addSelectColumns($criteria);
				$this->collRelAnioActividads = RelAnioActividadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->id);

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
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
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

				$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->id);

				$count = RelAnioActividadPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->id);

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
			$l->setActividad($this);
		}
	}


	
	public function getRelAnioActividadsJoinAnio($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividads === null) {
			if ($this->isNew()) {
				$this->collRelAnioActividads = array();
			} else {

				$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinAnio($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastRelAnioActividadCriteria) || !$this->lastRelAnioActividadCriteria->equals($criteria)) {
				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinAnio($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelAnioActividadCriteria = $criteria;

		return $this->collRelAnioActividads;
	}


	
	public function getRelAnioActividadsJoinOrientacion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividads === null) {
			if ($this->isNew()) {
				$this->collRelAnioActividads = array();
			} else {

				$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinOrientacion($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastRelAnioActividadCriteria) || !$this->lastRelAnioActividadCriteria->equals($criteria)) {
				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinOrientacion($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelAnioActividadCriteria = $criteria;

		return $this->collRelAnioActividads;
	}

	
	public function clearRelDivisionActividadDocentes()
	{
		$this->collRelDivisionActividadDocentes = null; 	}

	
	public function initRelDivisionActividadDocentes()
	{
		$this->collRelDivisionActividadDocentes = array();
	}

	
	public function getRelDivisionActividadDocentes($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
			   $this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

				RelDivisionActividadDocentePeer::addSelectColumns($criteria);
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

				RelDivisionActividadDocentePeer::addSelectColumns($criteria);
				if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
					$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;
		return $this->collRelDivisionActividadDocentes;
	}

	
	public function countRelDivisionActividadDocentes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

				$count = RelDivisionActividadDocentePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

				if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
					$count = RelDivisionActividadDocentePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelDivisionActividadDocentes);
				}
			} else {
				$count = count($this->collRelDivisionActividadDocentes);
			}
		}
		return $count;
	}

	
	public function addRelDivisionActividadDocente(RelDivisionActividadDocente $l)
	{
		if ($this->collRelDivisionActividadDocentes === null) {
			$this->initRelDivisionActividadDocentes();
		}
		if (!in_array($l, $this->collRelDivisionActividadDocentes, true)) { 			array_push($this->collRelDivisionActividadDocentes, $l);
			$l->setActividad($this);
		}
	}


	
	public function getRelDivisionActividadDocentesJoinDivision($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDivision($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDivision($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}


	
	public function getRelDivisionActividadDocentesJoinDocente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDocente($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDocente($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}


	
	public function getRelDivisionActividadDocentesJoinEvento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinEvento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinEvento($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collBoletinActividadess) {
				foreach ((array) $this->collBoletinActividadess as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collExamens) {
				foreach ((array) $this->collExamens as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRelAnioActividads) {
				foreach ((array) $this->collRelAnioActividads as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRelDivisionActividadDocentes) {
				foreach ((array) $this->collRelDivisionActividadDocentes as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collBoletinActividadess = null;
		$this->collExamens = null;
		$this->collRelAnioActividads = null;
		$this->collRelDivisionActividadDocentes = null;
			$this->aEstablecimiento = null;
	}

} 