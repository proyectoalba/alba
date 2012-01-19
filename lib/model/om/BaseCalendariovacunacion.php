<?php


abstract class BaseCalendariovacunacion extends BaseObject  implements Persistent {


  const PEER = 'CalendariovacunacionPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $descripcion;

	
	protected $periodo;

	
	protected $observacion;

	
	protected $collRelCalendariovacunacionAlumnos;

	
	private $lastRelCalendariovacunacionAlumnoCriteria = null;

	
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

	
	public function getPeriodo()
	{
		return $this->periodo;
	}

	
	public function getObservacion()
	{
		return $this->observacion;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CalendariovacunacionPeer::ID;
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
			$this->modifiedColumns[] = CalendariovacunacionPeer::NOMBRE;
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
			$this->modifiedColumns[] = CalendariovacunacionPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setPeriodo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->periodo !== $v) {
			$this->periodo = $v;
			$this->modifiedColumns[] = CalendariovacunacionPeer::PERIODO;
		}

		return $this;
	} 
	
	public function setObservacion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->observacion !== $v) {
			$this->observacion = $v;
			$this->modifiedColumns[] = CalendariovacunacionPeer::OBSERVACION;
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
			$this->periodo = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->observacion = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Calendariovacunacion object", $e);
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
			$con = Propel::getConnection(CalendariovacunacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = CalendariovacunacionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collRelCalendariovacunacionAlumnos = null;
			$this->lastRelCalendariovacunacionAlumnoCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CalendariovacunacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			CalendariovacunacionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CalendariovacunacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			CalendariovacunacionPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = CalendariovacunacionPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CalendariovacunacionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CalendariovacunacionPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collRelCalendariovacunacionAlumnos !== null) {
				foreach ($this->collRelCalendariovacunacionAlumnos as $referrerFK) {
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


			if (($retval = CalendariovacunacionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelCalendariovacunacionAlumnos !== null) {
					foreach ($this->collRelCalendariovacunacionAlumnos as $referrerFK) {
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
		$pos = CalendariovacunacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPeriodo();
				break;
			case 4:
				return $this->getObservacion();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = CalendariovacunacionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getPeriodo(),
			$keys[4] => $this->getObservacion(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CalendariovacunacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPeriodo($value);
				break;
			case 4:
				$this->setObservacion($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CalendariovacunacionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPeriodo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObservacion($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CalendariovacunacionPeer::DATABASE_NAME);

		if ($this->isColumnModified(CalendariovacunacionPeer::ID)) $criteria->add(CalendariovacunacionPeer::ID, $this->id);
		if ($this->isColumnModified(CalendariovacunacionPeer::NOMBRE)) $criteria->add(CalendariovacunacionPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(CalendariovacunacionPeer::DESCRIPCION)) $criteria->add(CalendariovacunacionPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(CalendariovacunacionPeer::PERIODO)) $criteria->add(CalendariovacunacionPeer::PERIODO, $this->periodo);
		if ($this->isColumnModified(CalendariovacunacionPeer::OBSERVACION)) $criteria->add(CalendariovacunacionPeer::OBSERVACION, $this->observacion);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CalendariovacunacionPeer::DATABASE_NAME);

		$criteria->add(CalendariovacunacionPeer::ID, $this->id);

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

		$copyObj->setPeriodo($this->periodo);

		$copyObj->setObservacion($this->observacion);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getRelCalendariovacunacionAlumnos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelCalendariovacunacionAlumno($relObj->copy($deepCopy));
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
			self::$peer = new CalendariovacunacionPeer();
		}
		return self::$peer;
	}

	
	public function clearRelCalendariovacunacionAlumnos()
	{
		$this->collRelCalendariovacunacionAlumnos = null; 	}

	
	public function initRelCalendariovacunacionAlumnos()
	{
		$this->collRelCalendariovacunacionAlumnos = array();
	}

	
	public function getRelCalendariovacunacionAlumnos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CalendariovacunacionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelCalendariovacunacionAlumnos === null) {
			if ($this->isNew()) {
			   $this->collRelCalendariovacunacionAlumnos = array();
			} else {

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, $this->id);

				RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
				$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, $this->id);

				RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelCalendariovacunacionAlumnoCriteria) || !$this->lastRelCalendariovacunacionAlumnoCriteria->equals($criteria)) {
					$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelCalendariovacunacionAlumnoCriteria = $criteria;
		return $this->collRelCalendariovacunacionAlumnos;
	}

	
	public function countRelCalendariovacunacionAlumnos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CalendariovacunacionPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelCalendariovacunacionAlumnos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, $this->id);

				$count = RelCalendariovacunacionAlumnoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, $this->id);

				if (!isset($this->lastRelCalendariovacunacionAlumnoCriteria) || !$this->lastRelCalendariovacunacionAlumnoCriteria->equals($criteria)) {
					$count = RelCalendariovacunacionAlumnoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelCalendariovacunacionAlumnos);
				}
			} else {
				$count = count($this->collRelCalendariovacunacionAlumnos);
			}
		}
		return $count;
	}

	
	public function addRelCalendariovacunacionAlumno(RelCalendariovacunacionAlumno $l)
	{
		if ($this->collRelCalendariovacunacionAlumnos === null) {
			$this->initRelCalendariovacunacionAlumnos();
		}
		if (!in_array($l, $this->collRelCalendariovacunacionAlumnos, true)) { 			array_push($this->collRelCalendariovacunacionAlumnos, $l);
			$l->setCalendariovacunacion($this);
		}
	}


	
	public function getRelCalendariovacunacionAlumnosJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CalendariovacunacionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelCalendariovacunacionAlumnos === null) {
			if ($this->isNew()) {
				$this->collRelCalendariovacunacionAlumnos = array();
			} else {

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, $this->id);

				$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, $this->id);

			if (!isset($this->lastRelCalendariovacunacionAlumnoCriteria) || !$this->lastRelCalendariovacunacionAlumnoCriteria->equals($criteria)) {
				$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelCalendariovacunacionAlumnoCriteria = $criteria;

		return $this->collRelCalendariovacunacionAlumnos;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collRelCalendariovacunacionAlumnos) {
				foreach ((array) $this->collRelCalendariovacunacionAlumnos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collRelCalendariovacunacionAlumnos = null;
	}

} 