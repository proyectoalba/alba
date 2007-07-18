<?php


abstract class BaseRelDivisionActividadDocente extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fk_division_id = 0;


	
	protected $fk_actividad_id = 0;


	
	protected $fk_docente_id = 0;


	
	protected $fk_evento_id = 0;


	
	protected $fk_repeticion_id = 0;


	
	protected $fecha_inicio;


	
	protected $fecha_fin;


	
	protected $hora_inicio;


	
	protected $hora_fin;

	
	protected $aDivision;

	
	protected $aActividad;

	
	protected $aDocente;

	
	protected $aEvento;

	
	protected $aRepeticion;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFkDivisionId()
	{

		return $this->fk_division_id;
	}

	
	public function getFkActividadId()
	{

		return $this->fk_actividad_id;
	}

	
	public function getFkDocenteId()
	{

		return $this->fk_docente_id;
	}

	
	public function getFkEventoId()
	{

		return $this->fk_evento_id;
	}

	
	public function getFkRepeticionId()
	{

		return $this->fk_repeticion_id;
	}

	
	public function getFechaInicio($format = 'Y-m-d H:i:s')
	{

		if ($this->fecha_inicio === null || $this->fecha_inicio === '') {
			return null;
		} elseif (!is_int($this->fecha_inicio)) {
						$ts = strtotime($this->fecha_inicio);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha_inicio] as date/time value: " . var_export($this->fecha_inicio, true));
			}
		} else {
			$ts = $this->fecha_inicio;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFechaFin($format = 'Y-m-d H:i:s')
	{

		if ($this->fecha_fin === null || $this->fecha_fin === '') {
			return null;
		} elseif (!is_int($this->fecha_fin)) {
						$ts = strtotime($this->fecha_fin);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha_fin] as date/time value: " . var_export($this->fecha_fin, true));
			}
		} else {
			$ts = $this->fecha_fin;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getHoraInicio($format = 'H:i:s')
	{

		if ($this->hora_inicio === null || $this->hora_inicio === '') {
			return null;
		} elseif (!is_int($this->hora_inicio)) {
						$ts = strtotime($this->hora_inicio);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [hora_inicio] as date/time value: " . var_export($this->hora_inicio, true));
			}
		} else {
			$ts = $this->hora_inicio;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getHoraFin($format = 'H:i:s')
	{

		if ($this->hora_fin === null || $this->hora_fin === '') {
			return null;
		} elseif (!is_int($this->hora_fin)) {
						$ts = strtotime($this->hora_fin);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [hora_fin] as date/time value: " . var_export($this->hora_fin, true));
			}
		} else {
			$ts = $this->hora_fin;
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
			$this->modifiedColumns[] = RelDivisionActividadDocentePeer::ID;
		}

	} 
	
	public function setFkDivisionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_division_id !== $v || $v === 0) {
			$this->fk_division_id = $v;
			$this->modifiedColumns[] = RelDivisionActividadDocentePeer::FK_DIVISION_ID;
		}

		if ($this->aDivision !== null && $this->aDivision->getId() !== $v) {
			$this->aDivision = null;
		}

	} 
	
	public function setFkActividadId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_actividad_id !== $v || $v === 0) {
			$this->fk_actividad_id = $v;
			$this->modifiedColumns[] = RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID;
		}

		if ($this->aActividad !== null && $this->aActividad->getId() !== $v) {
			$this->aActividad = null;
		}

	} 
	
	public function setFkDocenteId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_docente_id !== $v || $v === 0) {
			$this->fk_docente_id = $v;
			$this->modifiedColumns[] = RelDivisionActividadDocentePeer::FK_DOCENTE_ID;
		}

		if ($this->aDocente !== null && $this->aDocente->getId() !== $v) {
			$this->aDocente = null;
		}

	} 
	
	public function setFkEventoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_evento_id !== $v || $v === 0) {
			$this->fk_evento_id = $v;
			$this->modifiedColumns[] = RelDivisionActividadDocentePeer::FK_EVENTO_ID;
		}

		if ($this->aEvento !== null && $this->aEvento->getId() !== $v) {
			$this->aEvento = null;
		}

	} 
	
	public function setFkRepeticionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_repeticion_id !== $v || $v === 0) {
			$this->fk_repeticion_id = $v;
			$this->modifiedColumns[] = RelDivisionActividadDocentePeer::FK_REPETICION_ID;
		}

		if ($this->aRepeticion !== null && $this->aRepeticion->getId() !== $v) {
			$this->aRepeticion = null;
		}

	} 
	
	public function setFechaInicio($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha_inicio] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_inicio !== $ts) {
			$this->fecha_inicio = $ts;
			$this->modifiedColumns[] = RelDivisionActividadDocentePeer::FECHA_INICIO;
		}

	} 
	
	public function setFechaFin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha_fin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_fin !== $ts) {
			$this->fecha_fin = $ts;
			$this->modifiedColumns[] = RelDivisionActividadDocentePeer::FECHA_FIN;
		}

	} 
	
	public function setHoraInicio($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [hora_inicio] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->hora_inicio !== $ts) {
			$this->hora_inicio = $ts;
			$this->modifiedColumns[] = RelDivisionActividadDocentePeer::HORA_INICIO;
		}

	} 
	
	public function setHoraFin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [hora_fin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->hora_fin !== $ts) {
			$this->hora_fin = $ts;
			$this->modifiedColumns[] = RelDivisionActividadDocentePeer::HORA_FIN;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fk_division_id = $rs->getInt($startcol + 1);

			$this->fk_actividad_id = $rs->getInt($startcol + 2);

			$this->fk_docente_id = $rs->getInt($startcol + 3);

			$this->fk_evento_id = $rs->getInt($startcol + 4);

			$this->fk_repeticion_id = $rs->getInt($startcol + 5);

			$this->fecha_inicio = $rs->getTimestamp($startcol + 6, null);

			$this->fecha_fin = $rs->getTimestamp($startcol + 7, null);

			$this->hora_inicio = $rs->getTime($startcol + 8, null);

			$this->hora_fin = $rs->getTime($startcol + 9, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RelDivisionActividadDocente object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RelDivisionActividadDocentePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME);
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


												
			if ($this->aDivision !== null) {
				if ($this->aDivision->isModified()) {
					$affectedRows += $this->aDivision->save($con);
				}
				$this->setDivision($this->aDivision);
			}

			if ($this->aActividad !== null) {
				if ($this->aActividad->isModified()) {
					$affectedRows += $this->aActividad->save($con);
				}
				$this->setActividad($this->aActividad);
			}

			if ($this->aDocente !== null) {
				if ($this->aDocente->isModified()) {
					$affectedRows += $this->aDocente->save($con);
				}
				$this->setDocente($this->aDocente);
			}

			if ($this->aEvento !== null) {
				if ($this->aEvento->isModified()) {
					$affectedRows += $this->aEvento->save($con);
				}
				$this->setEvento($this->aEvento);
			}

			if ($this->aRepeticion !== null) {
				if ($this->aRepeticion->isModified()) {
					$affectedRows += $this->aRepeticion->save($con);
				}
				$this->setRepeticion($this->aRepeticion);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RelDivisionActividadDocentePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RelDivisionActividadDocentePeer::doUpdate($this, $con);
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


												
			if ($this->aDivision !== null) {
				if (!$this->aDivision->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDivision->getValidationFailures());
				}
			}

			if ($this->aActividad !== null) {
				if (!$this->aActividad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aActividad->getValidationFailures());
				}
			}

			if ($this->aDocente !== null) {
				if (!$this->aDocente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDocente->getValidationFailures());
				}
			}

			if ($this->aEvento !== null) {
				if (!$this->aEvento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEvento->getValidationFailures());
				}
			}

			if ($this->aRepeticion !== null) {
				if (!$this->aRepeticion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRepeticion->getValidationFailures());
				}
			}


			if (($retval = RelDivisionActividadDocentePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelDivisionActividadDocentePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFkDivisionId();
				break;
			case 2:
				return $this->getFkActividadId();
				break;
			case 3:
				return $this->getFkDocenteId();
				break;
			case 4:
				return $this->getFkEventoId();
				break;
			case 5:
				return $this->getFkRepeticionId();
				break;
			case 6:
				return $this->getFechaInicio();
				break;
			case 7:
				return $this->getFechaFin();
				break;
			case 8:
				return $this->getHoraInicio();
				break;
			case 9:
				return $this->getHoraFin();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelDivisionActividadDocentePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkDivisionId(),
			$keys[2] => $this->getFkActividadId(),
			$keys[3] => $this->getFkDocenteId(),
			$keys[4] => $this->getFkEventoId(),
			$keys[5] => $this->getFkRepeticionId(),
			$keys[6] => $this->getFechaInicio(),
			$keys[7] => $this->getFechaFin(),
			$keys[8] => $this->getHoraInicio(),
			$keys[9] => $this->getHoraFin(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelDivisionActividadDocentePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkDivisionId($value);
				break;
			case 2:
				$this->setFkActividadId($value);
				break;
			case 3:
				$this->setFkDocenteId($value);
				break;
			case 4:
				$this->setFkEventoId($value);
				break;
			case 5:
				$this->setFkRepeticionId($value);
				break;
			case 6:
				$this->setFechaInicio($value);
				break;
			case 7:
				$this->setFechaFin($value);
				break;
			case 8:
				$this->setHoraInicio($value);
				break;
			case 9:
				$this->setHoraFin($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelDivisionActividadDocentePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkDivisionId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkActividadId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkDocenteId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFkEventoId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFkRepeticionId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFechaInicio($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFechaFin($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setHoraInicio($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setHoraFin($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RelDivisionActividadDocentePeer::DATABASE_NAME);

		if ($this->isColumnModified(RelDivisionActividadDocentePeer::ID)) $criteria->add(RelDivisionActividadDocentePeer::ID, $this->id);
		if ($this->isColumnModified(RelDivisionActividadDocentePeer::FK_DIVISION_ID)) $criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->fk_division_id);
		if ($this->isColumnModified(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID)) $criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->fk_actividad_id);
		if ($this->isColumnModified(RelDivisionActividadDocentePeer::FK_DOCENTE_ID)) $criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->fk_docente_id);
		if ($this->isColumnModified(RelDivisionActividadDocentePeer::FK_EVENTO_ID)) $criteria->add(RelDivisionActividadDocentePeer::FK_EVENTO_ID, $this->fk_evento_id);
		if ($this->isColumnModified(RelDivisionActividadDocentePeer::FK_REPETICION_ID)) $criteria->add(RelDivisionActividadDocentePeer::FK_REPETICION_ID, $this->fk_repeticion_id);
		if ($this->isColumnModified(RelDivisionActividadDocentePeer::FECHA_INICIO)) $criteria->add(RelDivisionActividadDocentePeer::FECHA_INICIO, $this->fecha_inicio);
		if ($this->isColumnModified(RelDivisionActividadDocentePeer::FECHA_FIN)) $criteria->add(RelDivisionActividadDocentePeer::FECHA_FIN, $this->fecha_fin);
		if ($this->isColumnModified(RelDivisionActividadDocentePeer::HORA_INICIO)) $criteria->add(RelDivisionActividadDocentePeer::HORA_INICIO, $this->hora_inicio);
		if ($this->isColumnModified(RelDivisionActividadDocentePeer::HORA_FIN)) $criteria->add(RelDivisionActividadDocentePeer::HORA_FIN, $this->hora_fin);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RelDivisionActividadDocentePeer::DATABASE_NAME);

		$criteria->add(RelDivisionActividadDocentePeer::ID, $this->id);

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

		$copyObj->setFkDivisionId($this->fk_division_id);

		$copyObj->setFkActividadId($this->fk_actividad_id);

		$copyObj->setFkDocenteId($this->fk_docente_id);

		$copyObj->setFkEventoId($this->fk_evento_id);

		$copyObj->setFkRepeticionId($this->fk_repeticion_id);

		$copyObj->setFechaInicio($this->fecha_inicio);

		$copyObj->setFechaFin($this->fecha_fin);

		$copyObj->setHoraInicio($this->hora_inicio);

		$copyObj->setHoraFin($this->hora_fin);


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
			self::$peer = new RelDivisionActividadDocentePeer();
		}
		return self::$peer;
	}

	
	public function setDivision($v)
	{


		if ($v === null) {
			$this->setFkDivisionId('0');
		} else {
			$this->setFkDivisionId($v->getId());
		}


		$this->aDivision = $v;
	}


	
	public function getDivision($con = null)
	{
				include_once 'lib/model/om/BaseDivisionPeer.php';

		if ($this->aDivision === null && ($this->fk_division_id !== null)) {

			$this->aDivision = DivisionPeer::retrieveByPK($this->fk_division_id, $con);

			
		}
		return $this->aDivision;
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

	
	public function setDocente($v)
	{


		if ($v === null) {
			$this->setFkDocenteId('0');
		} else {
			$this->setFkDocenteId($v->getId());
		}


		$this->aDocente = $v;
	}


	
	public function getDocente($con = null)
	{
				include_once 'lib/model/om/BaseDocentePeer.php';

		if ($this->aDocente === null && ($this->fk_docente_id !== null)) {

			$this->aDocente = DocentePeer::retrieveByPK($this->fk_docente_id, $con);

			
		}
		return $this->aDocente;
	}

	
	public function setEvento($v)
	{


		if ($v === null) {
			$this->setFkEventoId('0');
		} else {
			$this->setFkEventoId($v->getId());
		}


		$this->aEvento = $v;
	}


	
	public function getEvento($con = null)
	{
				include_once 'lib/model/om/BaseEventoPeer.php';

		if ($this->aEvento === null && ($this->fk_evento_id !== null)) {

			$this->aEvento = EventoPeer::retrieveByPK($this->fk_evento_id, $con);

			
		}
		return $this->aEvento;
	}

	
	public function setRepeticion($v)
	{


		if ($v === null) {
			$this->setFkRepeticionId('0');
		} else {
			$this->setFkRepeticionId($v->getId());
		}


		$this->aRepeticion = $v;
	}


	
	public function getRepeticion($con = null)
	{
				include_once 'lib/model/om/BaseRepeticionPeer.php';

		if ($this->aRepeticion === null && ($this->fk_repeticion_id !== null)) {

			$this->aRepeticion = RepeticionPeer::retrieveByPK($this->fk_repeticion_id, $con);

			
		}
		return $this->aRepeticion;
	}

} 