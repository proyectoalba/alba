<?php


abstract class BaseRelCalendariovacunacionAlumno extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fk_alumno_id;


	
	protected $fk_calendariovacunacion_id;


	
	protected $observacion;


	
	protected $comprobante = true;


	
	protected $fecha;

	
	protected $aCalendariovacunacion;

	
	protected $aAlumno;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFkAlumnoId()
	{

		return $this->fk_alumno_id;
	}

	
	public function getFkCalendariovacunacionId()
	{

		return $this->fk_calendariovacunacion_id;
	}

	
	public function getObservacion()
	{

		return $this->observacion;
	}

	
	public function getComprobante()
	{

		return $this->comprobante;
	}

	
	public function getFecha($format = 'Y-m-d H:i:s')
	{

		if ($this->fecha === null || $this->fecha === '') {
			return null;
		} elseif (!is_int($this->fecha)) {
						$ts = strtotime($this->fecha);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
			}
		} else {
			$ts = $this->fecha;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RelCalendariovacunacionAlumnoPeer::ID;
		}

	} 
	
	public function setFkAlumnoId($v)
	{

		if ($this->fk_alumno_id !== $v) {
			$this->fk_alumno_id = $v;
			$this->modifiedColumns[] = RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID;
		}

		if ($this->aAlumno !== null && $this->aAlumno->getId() !== $v) {
			$this->aAlumno = null;
		}

	} 
	
	public function setFkCalendariovacunacionId($v)
	{

		if ($this->fk_calendariovacunacion_id !== $v) {
			$this->fk_calendariovacunacion_id = $v;
			$this->modifiedColumns[] = RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID;
		}

		if ($this->aCalendariovacunacion !== null && $this->aCalendariovacunacion->getId() !== $v) {
			$this->aCalendariovacunacion = null;
		}

	} 
	
	public function setObservacion($v)
	{

		if ($this->observacion !== $v) {
			$this->observacion = $v;
			$this->modifiedColumns[] = RelCalendariovacunacionAlumnoPeer::OBSERVACION;
		}

	} 
	
	public function setComprobante($v)
	{

		if ($this->comprobante !== $v || $v === true) {
			$this->comprobante = $v;
			$this->modifiedColumns[] = RelCalendariovacunacionAlumnoPeer::COMPROBANTE;
		}

	} 
	
	public function setFecha($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha !== $ts) {
			$this->fecha = $ts;
			$this->modifiedColumns[] = RelCalendariovacunacionAlumnoPeer::FECHA;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fk_alumno_id = $rs->getInt($startcol + 1);

			$this->fk_calendariovacunacion_id = $rs->getInt($startcol + 2);

			$this->observacion = $rs->getString($startcol + 3);

			$this->comprobante = $rs->getBoolean($startcol + 4);

			$this->fecha = $rs->getTimestamp($startcol + 5, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RelCalendariovacunacionAlumno object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RelCalendariovacunacionAlumnoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME);
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


												
			if ($this->aCalendariovacunacion !== null) {
				if ($this->aCalendariovacunacion->isModified()) {
					$affectedRows += $this->aCalendariovacunacion->save($con);
				}
				$this->setCalendariovacunacion($this->aCalendariovacunacion);
			}

			if ($this->aAlumno !== null) {
				if ($this->aAlumno->isModified()) {
					$affectedRows += $this->aAlumno->save($con);
				}
				$this->setAlumno($this->aAlumno);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RelCalendariovacunacionAlumnoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RelCalendariovacunacionAlumnoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aCalendariovacunacion !== null) {
				if (!$this->aCalendariovacunacion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCalendariovacunacion->getValidationFailures());
				}
			}

			if ($this->aAlumno !== null) {
				if (!$this->aAlumno->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAlumno->getValidationFailures());
				}
			}


			if (($retval = RelCalendariovacunacionAlumnoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelCalendariovacunacionAlumnoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFkAlumnoId();
				break;
			case 2:
				return $this->getFkCalendariovacunacionId();
				break;
			case 3:
				return $this->getObservacion();
				break;
			case 4:
				return $this->getComprobante();
				break;
			case 5:
				return $this->getFecha();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelCalendariovacunacionAlumnoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkAlumnoId(),
			$keys[2] => $this->getFkCalendariovacunacionId(),
			$keys[3] => $this->getObservacion(),
			$keys[4] => $this->getComprobante(),
			$keys[5] => $this->getFecha(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelCalendariovacunacionAlumnoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkAlumnoId($value);
				break;
			case 2:
				$this->setFkCalendariovacunacionId($value);
				break;
			case 3:
				$this->setObservacion($value);
				break;
			case 4:
				$this->setComprobante($value);
				break;
			case 5:
				$this->setFecha($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelCalendariovacunacionAlumnoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkAlumnoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkCalendariovacunacionId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObservacion($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setComprobante($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecha($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME);

		if ($this->isColumnModified(RelCalendariovacunacionAlumnoPeer::ID)) $criteria->add(RelCalendariovacunacionAlumnoPeer::ID, $this->id);
		if ($this->isColumnModified(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID)) $criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->fk_alumno_id);
		if ($this->isColumnModified(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID)) $criteria->add(RelCalendariovacunacionAlumnoPeer::FK_CALENDARIOVACUNACION_ID, $this->fk_calendariovacunacion_id);
		if ($this->isColumnModified(RelCalendariovacunacionAlumnoPeer::OBSERVACION)) $criteria->add(RelCalendariovacunacionAlumnoPeer::OBSERVACION, $this->observacion);
		if ($this->isColumnModified(RelCalendariovacunacionAlumnoPeer::COMPROBANTE)) $criteria->add(RelCalendariovacunacionAlumnoPeer::COMPROBANTE, $this->comprobante);
		if ($this->isColumnModified(RelCalendariovacunacionAlumnoPeer::FECHA)) $criteria->add(RelCalendariovacunacionAlumnoPeer::FECHA, $this->fecha);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME);

		$criteria->add(RelCalendariovacunacionAlumnoPeer::ID, $this->id);

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

		$copyObj->setFkAlumnoId($this->fk_alumno_id);

		$copyObj->setFkCalendariovacunacionId($this->fk_calendariovacunacion_id);

		$copyObj->setObservacion($this->observacion);

		$copyObj->setComprobante($this->comprobante);

		$copyObj->setFecha($this->fecha);


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
			self::$peer = new RelCalendariovacunacionAlumnoPeer();
		}
		return self::$peer;
	}

	
	public function setCalendariovacunacion($v)
	{


		if ($v === null) {
			$this->setFkCalendariovacunacionId(NULL);
		} else {
			$this->setFkCalendariovacunacionId($v->getId());
		}


		$this->aCalendariovacunacion = $v;
	}


	
	public function getCalendariovacunacion($con = null)
	{
				include_once 'lib/model/om/BaseCalendariovacunacionPeer.php';

		if ($this->aCalendariovacunacion === null && ($this->fk_calendariovacunacion_id !== null)) {

			$this->aCalendariovacunacion = CalendariovacunacionPeer::retrieveByPK($this->fk_calendariovacunacion_id, $con);

			
		}
		return $this->aCalendariovacunacion;
	}

	
	public function setAlumno($v)
	{


		if ($v === null) {
			$this->setFkAlumnoId(NULL);
		} else {
			$this->setFkAlumnoId($v->getId());
		}


		$this->aAlumno = $v;
	}


	
	public function getAlumno($con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';

		if ($this->aAlumno === null && ($this->fk_alumno_id !== null)) {

			$this->aAlumno = AlumnoPeer::retrieveByPK($this->fk_alumno_id, $con);

			
		}
		return $this->aAlumno;
	}

} 