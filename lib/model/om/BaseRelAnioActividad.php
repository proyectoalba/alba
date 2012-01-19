<?php


abstract class BaseRelAnioActividad extends BaseObject  implements Persistent {


  const PEER = 'RelAnioActividadPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_anio_id;

	
	protected $fk_actividad_id;

	
	protected $fk_orientacion_id;

	
	protected $horas;

	
	protected $aAnio;

	
	protected $aActividad;

	
	protected $aOrientacion;

	
	protected $collRelAnioActividadDocentes;

	
	private $lastRelAnioActividadDocenteCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->fk_anio_id = 0;
		$this->fk_actividad_id = 0;
		$this->horas = '0';
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFkAnioId()
	{
		return $this->fk_anio_id;
	}

	
	public function getFkActividadId()
	{
		return $this->fk_actividad_id;
	}

	
	public function getFkOrientacionId()
	{
		return $this->fk_orientacion_id;
	}

	
	public function getHoras()
	{
		return $this->horas;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RelAnioActividadPeer::ID;
		}

		return $this;
	} 
	
	public function setFkAnioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_anio_id !== $v || $v === 0) {
			$this->fk_anio_id = $v;
			$this->modifiedColumns[] = RelAnioActividadPeer::FK_ANIO_ID;
		}

		if ($this->aAnio !== null && $this->aAnio->getId() !== $v) {
			$this->aAnio = null;
		}

		return $this;
	} 
	
	public function setFkActividadId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_actividad_id !== $v || $v === 0) {
			$this->fk_actividad_id = $v;
			$this->modifiedColumns[] = RelAnioActividadPeer::FK_ACTIVIDAD_ID;
		}

		if ($this->aActividad !== null && $this->aActividad->getId() !== $v) {
			$this->aActividad = null;
		}

		return $this;
	} 
	
	public function setFkOrientacionId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_orientacion_id !== $v) {
			$this->fk_orientacion_id = $v;
			$this->modifiedColumns[] = RelAnioActividadPeer::FK_ORIENTACION_ID;
		}

		if ($this->aOrientacion !== null && $this->aOrientacion->getId() !== $v) {
			$this->aOrientacion = null;
		}

		return $this;
	} 
	
	public function setHoras($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->horas !== $v || $v === '0') {
			$this->horas = $v;
			$this->modifiedColumns[] = RelAnioActividadPeer::HORAS;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(RelAnioActividadPeer::FK_ANIO_ID,RelAnioActividadPeer::FK_ACTIVIDAD_ID,RelAnioActividadPeer::HORAS))) {
				return false;
			}

			if ($this->fk_anio_id !== 0) {
				return false;
			}

			if ($this->fk_actividad_id !== 0) {
				return false;
			}

			if ($this->horas !== '0') {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_anio_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->fk_actividad_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->fk_orientacion_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->horas = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RelAnioActividad object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aAnio !== null && $this->fk_anio_id !== $this->aAnio->getId()) {
			$this->aAnio = null;
		}
		if ($this->aActividad !== null && $this->fk_actividad_id !== $this->aActividad->getId()) {
			$this->aActividad = null;
		}
		if ($this->aOrientacion !== null && $this->fk_orientacion_id !== $this->aOrientacion->getId()) {
			$this->aOrientacion = null;
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
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = RelAnioActividadPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aAnio = null;
			$this->aActividad = null;
			$this->aOrientacion = null;
			$this->collRelAnioActividadDocentes = null;
			$this->lastRelAnioActividadDocenteCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			RelAnioActividadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			RelAnioActividadPeer::addInstanceToPool($this);
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

												
			if ($this->aAnio !== null) {
				if ($this->aAnio->isModified() || $this->aAnio->isNew()) {
					$affectedRows += $this->aAnio->save($con);
				}
				$this->setAnio($this->aAnio);
			}

			if ($this->aActividad !== null) {
				if ($this->aActividad->isModified() || $this->aActividad->isNew()) {
					$affectedRows += $this->aActividad->save($con);
				}
				$this->setActividad($this->aActividad);
			}

			if ($this->aOrientacion !== null) {
				if ($this->aOrientacion->isModified() || $this->aOrientacion->isNew()) {
					$affectedRows += $this->aOrientacion->save($con);
				}
				$this->setOrientacion($this->aOrientacion);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = RelAnioActividadPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RelAnioActividadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RelAnioActividadPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collRelAnioActividadDocentes !== null) {
				foreach ($this->collRelAnioActividadDocentes as $referrerFK) {
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


												
			if ($this->aAnio !== null) {
				if (!$this->aAnio->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAnio->getValidationFailures());
				}
			}

			if ($this->aActividad !== null) {
				if (!$this->aActividad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aActividad->getValidationFailures());
				}
			}

			if ($this->aOrientacion !== null) {
				if (!$this->aOrientacion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOrientacion->getValidationFailures());
				}
			}


			if (($retval = RelAnioActividadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelAnioActividadDocentes !== null) {
					foreach ($this->collRelAnioActividadDocentes as $referrerFK) {
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
		$pos = RelAnioActividadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkAnioId();
				break;
			case 2:
				return $this->getFkActividadId();
				break;
			case 3:
				return $this->getFkOrientacionId();
				break;
			case 4:
				return $this->getHoras();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = RelAnioActividadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkAnioId(),
			$keys[2] => $this->getFkActividadId(),
			$keys[3] => $this->getFkOrientacionId(),
			$keys[4] => $this->getHoras(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelAnioActividadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkAnioId($value);
				break;
			case 2:
				$this->setFkActividadId($value);
				break;
			case 3:
				$this->setFkOrientacionId($value);
				break;
			case 4:
				$this->setHoras($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelAnioActividadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkAnioId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkActividadId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkOrientacionId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHoras($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RelAnioActividadPeer::DATABASE_NAME);

		if ($this->isColumnModified(RelAnioActividadPeer::ID)) $criteria->add(RelAnioActividadPeer::ID, $this->id);
		if ($this->isColumnModified(RelAnioActividadPeer::FK_ANIO_ID)) $criteria->add(RelAnioActividadPeer::FK_ANIO_ID, $this->fk_anio_id);
		if ($this->isColumnModified(RelAnioActividadPeer::FK_ACTIVIDAD_ID)) $criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->fk_actividad_id);
		if ($this->isColumnModified(RelAnioActividadPeer::FK_ORIENTACION_ID)) $criteria->add(RelAnioActividadPeer::FK_ORIENTACION_ID, $this->fk_orientacion_id);
		if ($this->isColumnModified(RelAnioActividadPeer::HORAS)) $criteria->add(RelAnioActividadPeer::HORAS, $this->horas);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RelAnioActividadPeer::DATABASE_NAME);

		$criteria->add(RelAnioActividadPeer::ID, $this->id);

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

		$copyObj->setFkAnioId($this->fk_anio_id);

		$copyObj->setFkActividadId($this->fk_actividad_id);

		$copyObj->setFkOrientacionId($this->fk_orientacion_id);

		$copyObj->setHoras($this->horas);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getRelAnioActividadDocentes() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelAnioActividadDocente($relObj->copy($deepCopy));
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
			self::$peer = new RelAnioActividadPeer();
		}
		return self::$peer;
	}

	
	public function setAnio(Anio $v = null)
	{
		if ($v === null) {
			$this->setFkAnioId(0);
		} else {
			$this->setFkAnioId($v->getId());
		}

		$this->aAnio = $v;

						if ($v !== null) {
			$v->addRelAnioActividad($this);
		}

		return $this;
	}


	
	public function getAnio(PropelPDO $con = null)
	{
		if ($this->aAnio === null && ($this->fk_anio_id !== null)) {
			$c = new Criteria(AnioPeer::DATABASE_NAME);
			$c->add(AnioPeer::ID, $this->fk_anio_id);
			$this->aAnio = AnioPeer::doSelectOne($c, $con);
			
		}
		return $this->aAnio;
	}

	
	public function setActividad(Actividad $v = null)
	{
		if ($v === null) {
			$this->setFkActividadId(0);
		} else {
			$this->setFkActividadId($v->getId());
		}

		$this->aActividad = $v;

						if ($v !== null) {
			$v->addRelAnioActividad($this);
		}

		return $this;
	}


	
	public function getActividad(PropelPDO $con = null)
	{
		if ($this->aActividad === null && ($this->fk_actividad_id !== null)) {
			$c = new Criteria(ActividadPeer::DATABASE_NAME);
			$c->add(ActividadPeer::ID, $this->fk_actividad_id);
			$this->aActividad = ActividadPeer::doSelectOne($c, $con);
			
		}
		return $this->aActividad;
	}

	
	public function setOrientacion(Orientacion $v = null)
	{
		if ($v === null) {
			$this->setFkOrientacionId(NULL);
		} else {
			$this->setFkOrientacionId($v->getId());
		}

		$this->aOrientacion = $v;

						if ($v !== null) {
			$v->addRelAnioActividad($this);
		}

		return $this;
	}


	
	public function getOrientacion(PropelPDO $con = null)
	{
		if ($this->aOrientacion === null && ($this->fk_orientacion_id !== null)) {
			$c = new Criteria(OrientacionPeer::DATABASE_NAME);
			$c->add(OrientacionPeer::ID, $this->fk_orientacion_id);
			$this->aOrientacion = OrientacionPeer::doSelectOne($c, $con);
			
		}
		return $this->aOrientacion;
	}

	
	public function clearRelAnioActividadDocentes()
	{
		$this->collRelAnioActividadDocentes = null; 	}

	
	public function initRelAnioActividadDocentes()
	{
		$this->collRelAnioActividadDocentes = array();
	}

	
	public function getRelAnioActividadDocentes($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RelAnioActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividadDocentes === null) {
			if ($this->isNew()) {
			   $this->collRelAnioActividadDocentes = array();
			} else {

				$criteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $this->id);

				RelAnioActividadDocentePeer::addSelectColumns($criteria);
				$this->collRelAnioActividadDocentes = RelAnioActividadDocentePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $this->id);

				RelAnioActividadDocentePeer::addSelectColumns($criteria);
				if (!isset($this->lastRelAnioActividadDocenteCriteria) || !$this->lastRelAnioActividadDocenteCriteria->equals($criteria)) {
					$this->collRelAnioActividadDocentes = RelAnioActividadDocentePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelAnioActividadDocenteCriteria = $criteria;
		return $this->collRelAnioActividadDocentes;
	}

	
	public function countRelAnioActividadDocentes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RelAnioActividadPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelAnioActividadDocentes === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $this->id);

				$count = RelAnioActividadDocentePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $this->id);

				if (!isset($this->lastRelAnioActividadDocenteCriteria) || !$this->lastRelAnioActividadDocenteCriteria->equals($criteria)) {
					$count = RelAnioActividadDocentePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelAnioActividadDocentes);
				}
			} else {
				$count = count($this->collRelAnioActividadDocentes);
			}
		}
		return $count;
	}

	
	public function addRelAnioActividadDocente(RelAnioActividadDocente $l)
	{
		if ($this->collRelAnioActividadDocentes === null) {
			$this->initRelAnioActividadDocentes();
		}
		if (!in_array($l, $this->collRelAnioActividadDocentes, true)) { 			array_push($this->collRelAnioActividadDocentes, $l);
			$l->setRelAnioActividad($this);
		}
	}


	
	public function getRelAnioActividadDocentesJoinDocente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(RelAnioActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelAnioActividadDocentes = array();
			} else {

				$criteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $this->id);

				$this->collRelAnioActividadDocentes = RelAnioActividadDocentePeer::doSelectJoinDocente($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastRelAnioActividadDocenteCriteria) || !$this->lastRelAnioActividadDocenteCriteria->equals($criteria)) {
				$this->collRelAnioActividadDocentes = RelAnioActividadDocentePeer::doSelectJoinDocente($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelAnioActividadDocenteCriteria = $criteria;

		return $this->collRelAnioActividadDocentes;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collRelAnioActividadDocentes) {
				foreach ((array) $this->collRelAnioActividadDocentes as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collRelAnioActividadDocentes = null;
			$this->aAnio = null;
			$this->aActividad = null;
			$this->aOrientacion = null;
	}

} 