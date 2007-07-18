<?php


abstract class BaseCalendariovacunacion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $descripcion;


	
	protected $periodo;


	
	protected $observacion = 'null';

	
	protected $collRelCalendariovacunacionAlumnos;

	
	protected $lastRelCalendariovacunacionAlumnoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
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

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CalendariovacunacionPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = CalendariovacunacionPeer::NOMBRE;
		}

	} 
	
	public function setDescripcion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = CalendariovacunacionPeer::DESCRIPCION;
		}

	} 
	
	public function setPeriodo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->periodo !== $v) {
			$this->periodo = $v;
			$this->modifiedColumns[] = CalendariovacunacionPeer::PERIODO;
		}

	} 
	
	public function setObservacion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->observacion !== $v || $v === 'null') {
			$this->observacion = $v;
			$this->modifiedColumns[] = CalendariovacunacionPeer::OBSERVACION;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->descripcion = $rs->getString($startcol + 2);

			$this->periodo = $rs->getString($startcol + 3);

			$this->observacion = $rs->getString($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Calendariovacunacion object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CalendariovacunacionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CalendariovacunacionPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CalendariovacunacionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


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
				foreach($this->collRelCalendariovacunacionAlumnos as $referrerFK) {
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
					foreach($this->collRelCalendariovacunacionAlumnos as $referrerFK) {
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
		return $this->getByPosition($pos);
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

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
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

			foreach($this->getRelCalendariovacunacionAlumnos() as $relObj) {
				$copyObj->addRelCalendariovacunacionAlumno($relObj->copy($deepCopy));
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

	
	public function initRelCalendariovacunacionAlumnos()
	{
		if ($this->collRelCalendariovacunacionAlumnos === null) {
			$this->collRelCalendariovacunacionAlumnos = array();
		}
	}

	
	public function getRelCalendariovacunacionAlumnos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelCalendariovacunacionAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelCalendariovacunacionAlumnos === null) {
			if ($this->isNew()) {
			   $this->collRelCalendariovacunacionAlumnos = array();
			} else {

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, $this->getId());

				RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
				$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, $this->getId());

				RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelCalendariovacunacionAlumnoCriteria) || !$this->lastRelCalendariovacunacionAlumnoCriteria->equals($criteria)) {
					$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelCalendariovacunacionAlumnoCriteria = $criteria;
		return $this->collRelCalendariovacunacionAlumnos;
	}

	
	public function countRelCalendariovacunacionAlumnos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRelCalendariovacunacionAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, $this->getId());

		return RelCalendariovacunacionAlumnoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelCalendariovacunacionAlumno(RelCalendariovacunacionAlumno $l)
	{
		$this->collRelCalendariovacunacionAlumnos[] = $l;
		$l->setCalendariovacunacion($this);
	}


	
	public function getRelCalendariovacunacionAlumnosJoinAlumno($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelCalendariovacunacionAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelCalendariovacunacionAlumnos === null) {
			if ($this->isNew()) {
				$this->collRelCalendariovacunacionAlumnos = array();
			} else {

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, $this->getId());

				$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelectJoinAlumno($criteria, $con);
			}
		} else {
									
			$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, $this->getId());

			if (!isset($this->lastRelCalendariovacunacionAlumnoCriteria) || !$this->lastRelCalendariovacunacionAlumnoCriteria->equals($criteria)) {
				$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelectJoinAlumno($criteria, $con);
			}
		}
		$this->lastRelCalendariovacunacionAlumnoCriteria = $criteria;

		return $this->collRelCalendariovacunacionAlumnos;
	}

} 