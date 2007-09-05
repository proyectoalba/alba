<?php


abstract class BaseHorarioescolar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $descripcion;


	
	protected $fk_evento_id;


	
	protected $fk_establecimiento_id = 0;


	
	protected $fk_turno_id = 0;


	
	protected $fk_horarioescolartipo_id = 0;

	
	protected $aEvento;

	
	protected $aEstablecimiento;

	
	protected $aTurno;

	
	protected $aHorarioescolartipo;

	
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

	
	public function getFkEventoId()
	{

		return $this->fk_evento_id;
	}

	
	public function getFkEstablecimientoId()
	{

		return $this->fk_establecimiento_id;
	}

	
	public function getFkTurnoId()
	{

		return $this->fk_turno_id;
	}

	
	public function getFkHorarioescolartipoId()
	{

		return $this->fk_horarioescolartipo_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::NOMBRE;
		}

	} 
	
	public function setDescripcion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::DESCRIPCION;
		}

	} 
	
	public function setFkEventoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_evento_id !== $v) {
			$this->fk_evento_id = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::FK_EVENTO_ID;
		}

		if ($this->aEvento !== null && $this->aEvento->getId() !== $v) {
			$this->aEvento = null;
		}

	} 
	
	public function setFkEstablecimientoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_establecimiento_id !== $v || $v === 0) {
			$this->fk_establecimiento_id = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
		}

	} 
	
	public function setFkTurnoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_turno_id !== $v || $v === 0) {
			$this->fk_turno_id = $v;
			$this->modifiedColumns[] = HorarioescolarPeer::FK_TURNO_ID;
		}

		if ($this->aTurno !== null && $this->aTurno->getId() !== $v) {
			$this->aTurno = null;
		}

	} 
	
	public function setFkHorarioescolartipoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

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

			$this->nombre = $rs->getString($startcol + 1);

			$this->descripcion = $rs->getString($startcol + 2);

			$this->fk_evento_id = $rs->getInt($startcol + 3);

			$this->fk_establecimiento_id = $rs->getInt($startcol + 4);

			$this->fk_turno_id = $rs->getInt($startcol + 5);

			$this->fk_horarioescolartipo_id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
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


												
			if ($this->aEvento !== null) {
				if ($this->aEvento->isModified()) {
					$affectedRows += $this->aEvento->save($con);
				}
				$this->setEvento($this->aEvento);
			}

			if ($this->aEstablecimiento !== null) {
				if ($this->aEstablecimiento->isModified()) {
					$affectedRows += $this->aEstablecimiento->save($con);
				}
				$this->setEstablecimiento($this->aEstablecimiento);
			}

			if ($this->aTurno !== null) {
				if ($this->aTurno->isModified()) {
					$affectedRows += $this->aTurno->save($con);
				}
				$this->setTurno($this->aTurno);
			}

			if ($this->aHorarioescolartipo !== null) {
				if ($this->aHorarioescolartipo->isModified()) {
					$affectedRows += $this->aHorarioescolartipo->save($con);
				}
				$this->setHorarioescolartipo($this->aHorarioescolartipo);
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


												
			if ($this->aEvento !== null) {
				if (!$this->aEvento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEvento->getValidationFailures());
				}
			}

			if ($this->aEstablecimiento !== null) {
				if (!$this->aEstablecimiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstablecimiento->getValidationFailures());
				}
			}

			if ($this->aTurno !== null) {
				if (!$this->aTurno->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTurno->getValidationFailures());
				}
			}

			if ($this->aHorarioescolartipo !== null) {
				if (!$this->aHorarioescolartipo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aHorarioescolartipo->getValidationFailures());
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
				return $this->getNombre();
				break;
			case 2:
				return $this->getDescripcion();
				break;
			case 3:
				return $this->getFkEventoId();
				break;
			case 4:
				return $this->getFkEstablecimientoId();
				break;
			case 5:
				return $this->getFkTurnoId();
				break;
			case 6:
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
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getFkEventoId(),
			$keys[4] => $this->getFkEstablecimientoId(),
			$keys[5] => $this->getFkTurnoId(),
			$keys[6] => $this->getFkHorarioescolartipoId(),
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
				$this->setNombre($value);
				break;
			case 2:
				$this->setDescripcion($value);
				break;
			case 3:
				$this->setFkEventoId($value);
				break;
			case 4:
				$this->setFkEstablecimientoId($value);
				break;
			case 5:
				$this->setFkTurnoId($value);
				break;
			case 6:
				$this->setFkHorarioescolartipoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HorarioescolarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkEventoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFkEstablecimientoId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFkTurnoId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFkHorarioescolartipoId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HorarioescolarPeer::DATABASE_NAME);

		if ($this->isColumnModified(HorarioescolarPeer::ID)) $criteria->add(HorarioescolarPeer::ID, $this->id);
		if ($this->isColumnModified(HorarioescolarPeer::NOMBRE)) $criteria->add(HorarioescolarPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(HorarioescolarPeer::DESCRIPCION)) $criteria->add(HorarioescolarPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(HorarioescolarPeer::FK_EVENTO_ID)) $criteria->add(HorarioescolarPeer::FK_EVENTO_ID, $this->fk_evento_id);
		if ($this->isColumnModified(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(HorarioescolarPeer::FK_TURNO_ID)) $criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->fk_turno_id);
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

		$copyObj->setNombre($this->nombre);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setFkEventoId($this->fk_evento_id);

		$copyObj->setFkEstablecimientoId($this->fk_establecimiento_id);

		$copyObj->setFkTurnoId($this->fk_turno_id);

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

	
	public function setEvento($v)
	{


		if ($v === null) {
			$this->setFkEventoId(NULL);
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

	
	public function setTurno($v)
	{


		if ($v === null) {
			$this->setFkTurnoId('0');
		} else {
			$this->setFkTurnoId($v->getId());
		}


		$this->aTurno = $v;
	}


	
	public function getTurno($con = null)
	{
				include_once 'lib/model/om/BaseTurnoPeer.php';

		if ($this->aTurno === null && ($this->fk_turno_id !== null)) {

			$this->aTurno = TurnoPeer::retrieveByPK($this->fk_turno_id, $con);

			
		}
		return $this->aTurno;
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

} 