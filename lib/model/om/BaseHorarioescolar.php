<?php


abstract class BaseHorarioescolar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $dia = 0;


	
	protected $hora_inicio;


	
	protected $hora_fin;


	
	protected $nombre;


	
	protected $descripcion;


	
	protected $fk_establecimiento_id = 0;


	
	protected $fk_turnos_id = 0;


	
	protected $fk_horarioescolartipo_id = 0;

	
	protected $aHorarioescolartipo;

	
	protected $aEstablecimiento;

	
	protected $aTurnos;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getDia()
	{

		return $this->dia;
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

	
	public function getNombre()
	{

		return $this->nombre;
	}

	
	public function getDescripcion()
	{

		return $this->descripcion;
	}

	
	public function getFkEstablecimientoId()
	{

		return $this->fk_establecimiento_id;
	}

	
	public function getFkTurnosId()
	{

		return $this->fk_turnos_id;
	}

	
	public function getFkHorarioescolartipoId()
	{

		return $this->fk_horarioescolartipo_id;
	}

	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::ID;
		}

	} 
	
	public function setDia($v)
	{

		if ($this->dia !== $v || $v === 0) {
			$this->dia = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::DIA;
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
			$this->modifiedColumns[] = HorarioescolarPeer::HORA_INICIO;
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
			$this->modifiedColumns[] = HorarioescolarPeer::HORA_FIN;
		}

	} 
	
	public function setNombre($v)
	{

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::NOMBRE;
		}

	} 
	
	public function setDescripcion($v)
	{

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::DESCRIPCION;
		}

	} 
	
	public function setFkEstablecimientoId($v)
	{

		if ($this->fk_establecimiento_id !== $v || $v === 0) {
			$this->fk_establecimiento_id = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
		}

	} 
	
	public function setFkTurnosId($v)
	{

		if ($this->fk_turnos_id !== $v || $v === 0) {
			$this->fk_turnos_id = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::FK_TURNOS_ID;
		}

		if ($this->aTurnos !== null && $this->aTurnos->getId() !== $v) {
			$this->aTurnos = null;
		}

	} 
	
	public function setFkHorarioescolartipoId($v)
	{

		if ($this->fk_horarioescolartipo_id !== $v || $v === 0) {
			$this->fk_horarioescolartipo_id = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID;
		}

		if ($this->aHorarioescolartipo !== null && $this->aHorarioescolartipo->getId() !== $v) {
			$this->aHorarioescolartipo = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->dia = $rs->getInt($startcol + 1);

			$this->hora_inicio = $rs->getTime($startcol + 2, null);

			$this->hora_fin = $rs->getTime($startcol + 3, null);

			$this->nombre = $rs->getString($startcol + 4);

			$this->descripcion = $rs->getString($startcol + 5);

			$this->fk_establecimiento_id = $rs->getInt($startcol + 6);

			$this->fk_turnos_id = $rs->getInt($startcol + 7);

			$this->fk_horarioescolartipo_id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Horarioescolar object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HorarioescolarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HorarioescolarPeer::DATABASE_NAME);
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


												
			if ($this->aHorarioescolartipo !== null) {
				if ($this->aHorarioescolartipo->isModified()) {
					$affectedRows += $this->aHorarioescolartipo->save($con);
				}
				$this->setHorarioescolartipo($this->aHorarioescolartipo);
			}

			if ($this->aEstablecimiento !== null) {
				if ($this->aEstablecimiento->isModified()) {
					$affectedRows += $this->aEstablecimiento->save($con);
				}
				$this->setEstablecimiento($this->aEstablecimiento);
			}

			if ($this->aTurnos !== null) {
				if ($this->aTurnos->isModified()) {
					$affectedRows += $this->aTurnos->save($con);
				}
				$this->setTurnos($this->aTurnos);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = HorarioescolarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HorarioescolarPeer::doUpdate($this, $con);
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


												
			if ($this->aHorarioescolartipo !== null) {
				if (!$this->aHorarioescolartipo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aHorarioescolartipo->getValidationFailures());
				}
			}

			if ($this->aEstablecimiento !== null) {
				if (!$this->aEstablecimiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstablecimiento->getValidationFailures());
				}
			}

			if ($this->aTurnos !== null) {
				if (!$this->aTurnos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTurnos->getValidationFailures());
				}
			}


			if (($retval = HorarioescolarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HorarioescolarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getDia();
				break;
			case 2:
				return $this->getHoraInicio();
				break;
			case 3:
				return $this->getHoraFin();
				break;
			case 4:
				return $this->getNombre();
				break;
			case 5:
				return $this->getDescripcion();
				break;
			case 6:
				return $this->getFkEstablecimientoId();
				break;
			case 7:
				return $this->getFkTurnosId();
				break;
			case 8:
				return $this->getFkHorarioescolartipoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HorarioescolarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDia(),
			$keys[2] => $this->getHoraInicio(),
			$keys[3] => $this->getHoraFin(),
			$keys[4] => $this->getNombre(),
			$keys[5] => $this->getDescripcion(),
			$keys[6] => $this->getFkEstablecimientoId(),
			$keys[7] => $this->getFkTurnosId(),
			$keys[8] => $this->getFkHorarioescolartipoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HorarioescolarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDia($value);
				break;
			case 2:
				$this->setHoraInicio($value);
				break;
			case 3:
				$this->setHoraFin($value);
				break;
			case 4:
				$this->setNombre($value);
				break;
			case 5:
				$this->setDescripcion($value);
				break;
			case 6:
				$this->setFkEstablecimientoId($value);
				break;
			case 7:
				$this->setFkTurnosId($value);
				break;
			case 8:
				$this->setFkHorarioescolartipoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HorarioescolarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDia($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHoraInicio($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHoraFin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNombre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDescripcion($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFkEstablecimientoId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFkTurnosId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFkHorarioescolartipoId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HorarioescolarPeer::DATABASE_NAME);

		if ($this->isColumnModified(HorarioescolarPeer::ID)) $criteria->add(HorarioescolarPeer::ID, $this->id);
		if ($this->isColumnModified(HorarioescolarPeer::DIA)) $criteria->add(HorarioescolarPeer::DIA, $this->dia);
		if ($this->isColumnModified(HorarioescolarPeer::HORA_INICIO)) $criteria->add(HorarioescolarPeer::HORA_INICIO, $this->hora_inicio);
		if ($this->isColumnModified(HorarioescolarPeer::HORA_FIN)) $criteria->add(HorarioescolarPeer::HORA_FIN, $this->hora_fin);
		if ($this->isColumnModified(HorarioescolarPeer::NOMBRE)) $criteria->add(HorarioescolarPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(HorarioescolarPeer::DESCRIPCION)) $criteria->add(HorarioescolarPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(HorarioescolarPeer::FK_TURNOS_ID)) $criteria->add(HorarioescolarPeer::FK_TURNOS_ID, $this->fk_turnos_id);
		if ($this->isColumnModified(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID)) $criteria->add(HorarioescolarPeer::FK_HORARIOESCOLARTIPO_ID, $this->fk_horarioescolartipo_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HorarioescolarPeer::DATABASE_NAME);

		$criteria->add(HorarioescolarPeer::ID, $this->id);

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

		$copyObj->setDia($this->dia);

		$copyObj->setHoraInicio($this->hora_inicio);

		$copyObj->setHoraFin($this->hora_fin);

		$copyObj->setNombre($this->nombre);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setFkEstablecimientoId($this->fk_establecimiento_id);

		$copyObj->setFkTurnosId($this->fk_turnos_id);

		$copyObj->setFkHorarioescolartipoId($this->fk_horarioescolartipo_id);


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
			self::$peer = new HorarioescolarPeer();
		}
		return self::$peer;
	}

	
	public function setHorarioescolartipo($v)
	{


		if ($v === null) {
			$this->setFkHorarioescolartipoId('0');
		} else {
			$this->setFkHorarioescolartipoId($v->getId());
		}


		$this->aHorarioescolartipo = $v;
	}


	
	public function getHorarioescolartipo($con = null)
	{
				include_once 'lib/model/om/BaseHorarioescolartipoPeer.php';

		if ($this->aHorarioescolartipo === null && ($this->fk_horarioescolartipo_id !== null)) {

			$this->aHorarioescolartipo = HorarioescolartipoPeer::retrieveByPK($this->fk_horarioescolartipo_id, $con);

			
		}
		return $this->aHorarioescolartipo;
	}

	
	public function setEstablecimiento($v)
	{


		if ($v === null) {
			$this->setFkEstablecimientoId('0');
		} else {
			$this->setFkEstablecimientoId($v->getId());
		}


		$this->aEstablecimiento = $v;
	}


	
	public function getEstablecimiento($con = null)
	{
				include_once 'lib/model/om/BaseEstablecimientoPeer.php';

		if ($this->aEstablecimiento === null && ($this->fk_establecimiento_id !== null)) {

			$this->aEstablecimiento = EstablecimientoPeer::retrieveByPK($this->fk_establecimiento_id, $con);

			
		}
		return $this->aEstablecimiento;
	}

	
	public function setTurnos($v)
	{


		if ($v === null) {
			$this->setFkTurnosId('0');
		} else {
			$this->setFkTurnosId($v->getId());
		}


		$this->aTurnos = $v;
	}


	
	public function getTurnos($con = null)
	{
				include_once 'lib/model/om/BaseTurnosPeer.php';

		if ($this->aTurnos === null && ($this->fk_turnos_id !== null)) {

			$this->aTurnos = TurnosPeer::retrieveByPK($this->fk_turnos_id, $con);

			
		}
		return $this->aTurnos;
	}

} 