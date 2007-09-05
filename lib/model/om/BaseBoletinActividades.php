<?php


abstract class BaseBoletinActividades extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fk_escalanota_id;


	
	protected $fk_alumno_id = 0;


	
	protected $fk_actividad_id = 0;


	
	protected $fk_periodo_id = 0;


	
	protected $observacion;


	
	protected $fecha;

	
	protected $aEscalanota;

	
	protected $aAlumno;

	
	protected $aActividad;

	
	protected $aPeriodo;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFkEscalanotaId()
	{

		return $this->fk_escalanota_id;
	}

	
	public function getFkAlumnoId()
	{

		return $this->fk_alumno_id;
	}

	
	public function getFkActividadId()
	{

		return $this->fk_actividad_id;
	}

	
	public function getFkPeriodoId()
	{

		return $this->fk_periodo_id;
	}

	
	public function getObservacion()
	{

		return $this->observacion;
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

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BoletinActividadesPeer::ID;
		}

	} 
	
	public function setFkEscalanotaId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_escalanota_id !== $v) {
			$this->fk_escalanota_id = $v;
			$this->modifiedColumns[] = BoletinActividadesPeer::FK_ESCALANOTA_ID;
		}

		if ($this->aEscalanota !== null && $this->aEscalanota->getId() !== $v) {
			$this->aEscalanota = null;
		}

	} 
	
	public function setFkAlumnoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_alumno_id !== $v || $v === 0) {
			$this->fk_alumno_id = $v;
			$this->modifiedColumns[] = BoletinActividadesPeer::FK_ALUMNO_ID;
		}

		if ($this->aAlumno !== null && $this->aAlumno->getId() !== $v) {
			$this->aAlumno = null;
		}

	} 
	
	public function setFkActividadId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_actividad_id !== $v || $v === 0) {
			$this->fk_actividad_id = $v;
			$this->modifiedColumns[] = BoletinActividadesPeer::FK_ACTIVIDAD_ID;
		}

		if ($this->aActividad !== null && $this->aActividad->getId() !== $v) {
			$this->aActividad = null;
		}

	} 
	
	public function setFkPeriodoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_periodo_id !== $v || $v === 0) {
			$this->fk_periodo_id = $v;
			$this->modifiedColumns[] = BoletinActividadesPeer::FK_PERIODO_ID;
		}

		if ($this->aPeriodo !== null && $this->aPeriodo->getId() !== $v) {
			$this->aPeriodo = null;
		}

	} 
	
	public function setObservacion($v)
	{

								if ($v instanceof Lob && $v === $this->observacion) {
			$changed = $v->isModified();
		} else {
			$changed = ($this->observacion !== $v);
		}
		if ($changed) {
			if ( !($v instanceof Lob) ) {
				$obj = new Blob();
				$obj->setContents($v);
			} else {
				$obj = $v;
			}
			$this->observacion = $obj;
			$this->modifiedColumns[] = BoletinActividadesPeer::OBSERVACION;
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
			$this->modifiedColumns[] = BoletinActividadesPeer::FECHA;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fk_escalanota_id = $rs->getInt($startcol + 1);

			$this->fk_alumno_id = $rs->getInt($startcol + 2);

			$this->fk_actividad_id = $rs->getInt($startcol + 3);

			$this->fk_periodo_id = $rs->getInt($startcol + 4);

			$this->observacion = $rs->getBlob($startcol + 5);

			$this->fecha = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating BoletinActividades object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BoletinActividadesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BoletinActividadesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BoletinActividadesPeer::DATABASE_NAME);
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


												
			if ($this->aEscalanota !== null) {
				if ($this->aEscalanota->isModified()) {
					$affectedRows += $this->aEscalanota->save($con);
				}
				$this->setEscalanota($this->aEscalanota);
			}

			if ($this->aAlumno !== null) {
				if ($this->aAlumno->isModified()) {
					$affectedRows += $this->aAlumno->save($con);
				}
				$this->setAlumno($this->aAlumno);
			}

			if ($this->aActividad !== null) {
				if ($this->aActividad->isModified()) {
					$affectedRows += $this->aActividad->save($con);
				}
				$this->setActividad($this->aActividad);
			}

			if ($this->aPeriodo !== null) {
				if ($this->aPeriodo->isModified()) {
					$affectedRows += $this->aPeriodo->save($con);
				}
				$this->setPeriodo($this->aPeriodo);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = BoletinActividadesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BoletinActividadesPeer::doUpdate($this, $con);
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


												
			if ($this->aEscalanota !== null) {
				if (!$this->aEscalanota->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEscalanota->getValidationFailures());
				}
			}

			if ($this->aAlumno !== null) {
				if (!$this->aAlumno->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAlumno->getValidationFailures());
				}
			}

			if ($this->aActividad !== null) {
				if (!$this->aActividad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aActividad->getValidationFailures());
				}
			}

			if ($this->aPeriodo !== null) {
				if (!$this->aPeriodo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPeriodo->getValidationFailures());
				}
			}


			if (($retval = BoletinActividadesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BoletinActividadesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFkEscalanotaId();
				break;
			case 2:
				return $this->getFkAlumnoId();
				break;
			case 3:
				return $this->getFkActividadId();
				break;
			case 4:
				return $this->getFkPeriodoId();
				break;
			case 5:
				return $this->getObservacion();
				break;
			case 6:
				return $this->getFecha();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BoletinActividadesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkEscalanotaId(),
			$keys[2] => $this->getFkAlumnoId(),
			$keys[3] => $this->getFkActividadId(),
			$keys[4] => $this->getFkPeriodoId(),
			$keys[5] => $this->getObservacion(),
			$keys[6] => $this->getFecha(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BoletinActividadesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkEscalanotaId($value);
				break;
			case 2:
				$this->setFkAlumnoId($value);
				break;
			case 3:
				$this->setFkActividadId($value);
				break;
			case 4:
				$this->setFkPeriodoId($value);
				break;
			case 5:
				$this->setObservacion($value);
				break;
			case 6:
				$this->setFecha($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BoletinActividadesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkEscalanotaId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkAlumnoId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkActividadId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFkPeriodoId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObservacion($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecha($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BoletinActividadesPeer::DATABASE_NAME);

		if ($this->isColumnModified(BoletinActividadesPeer::ID)) $criteria->add(BoletinActividadesPeer::ID, $this->id);
		if ($this->isColumnModified(BoletinActividadesPeer::FK_ESCALANOTA_ID)) $criteria->add(BoletinActividadesPeer::FK_ESCALANOTA_ID, $this->fk_escalanota_id);
		if ($this->isColumnModified(BoletinActividadesPeer::FK_ALUMNO_ID)) $criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->fk_alumno_id);
		if ($this->isColumnModified(BoletinActividadesPeer::FK_ACTIVIDAD_ID)) $criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->fk_actividad_id);
		if ($this->isColumnModified(BoletinActividadesPeer::FK_PERIODO_ID)) $criteria->add(BoletinActividadesPeer::FK_PERIODO_ID, $this->fk_periodo_id);
		if ($this->isColumnModified(BoletinActividadesPeer::OBSERVACION)) $criteria->add(BoletinActividadesPeer::OBSERVACION, $this->observacion);
		if ($this->isColumnModified(BoletinActividadesPeer::FECHA)) $criteria->add(BoletinActividadesPeer::FECHA, $this->fecha);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BoletinActividadesPeer::DATABASE_NAME);

		$criteria->add(BoletinActividadesPeer::ID, $this->id);

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

		$copyObj->setFkEscalanotaId($this->fk_escalanota_id);

		$copyObj->setFkAlumnoId($this->fk_alumno_id);

		$copyObj->setFkActividadId($this->fk_actividad_id);

		$copyObj->setFkPeriodoId($this->fk_periodo_id);

		$copyObj->setObservacion($this->observacion);

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
			self::$peer = new BoletinActividadesPeer();
		}
		return self::$peer;
	}

	
	public function setEscalanota($v)
	{


		if ($v === null) {
			$this->setFkEscalanotaId(NULL);
		} else {
			$this->setFkEscalanotaId($v->getId());
		}


		$this->aEscalanota = $v;
	}


	
	public function getEscalanota($con = null)
	{
				include_once 'lib/model/om/BaseEscalanotaPeer.php';

		if ($this->aEscalanota === null && ($this->fk_escalanota_id !== null)) {

			$this->aEscalanota = EscalanotaPeer::retrieveByPK($this->fk_escalanota_id, $con);

			
		}
		return $this->aEscalanota;
	}

	
	public function setAlumno($v)
	{


		if ($v === null) {
			$this->setFkAlumnoId('0');
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

	
	public function setActividad($v)
	{


		if ($v === null) {
			$this->setFkActividadId('0');
		} else {
			$this->setFkActividadId($v->getId());
		}


		$this->aActividad = $v;
	}


	
	public function getActividad($con = null)
	{
				include_once 'lib/model/om/BaseActividadPeer.php';

		if ($this->aActividad === null && ($this->fk_actividad_id !== null)) {

			$this->aActividad = ActividadPeer::retrieveByPK($this->fk_actividad_id, $con);

			
		}
		return $this->aActividad;
	}

	
	public function setPeriodo($v)
	{


		if ($v === null) {
			$this->setFkPeriodoId('0');
		} else {
			$this->setFkPeriodoId($v->getId());
		}


		$this->aPeriodo = $v;
	}


	
	public function getPeriodo($con = null)
	{
				include_once 'lib/model/om/BasePeriodoPeer.php';

		if ($this->aPeriodo === null && ($this->fk_periodo_id !== null)) {

			$this->aPeriodo = PeriodoPeer::retrieveByPK($this->fk_periodo_id, $con);

			
		}
		return $this->aPeriodo;
	}

} 