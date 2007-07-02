<?php


abstract class BaseDocenteHorario extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fk_docente_id = 0;


	
	protected $fk_repeticion_id = 0;


	
	protected $hora_inicio;


	
	protected $hora_fin;


	
	protected $dia = 0;

	
	protected $aRepeticion;

	
	protected $aDocente;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFkDocenteId()
	{

		return $this->fk_docente_id;
	}

	
	public function getFkRepeticionId()
	{

		return $this->fk_repeticion_id;
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

	
	public function getDia()
	{

		return $this->dia;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DocenteHorarioPeer::ID;
		}

	} 
	
	public function setFkDocenteId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_docente_id !== $v || $v === 0) {
			$this->fk_docente_id = $v;
			$this->modifiedColumns[] = DocenteHorarioPeer::FK_DOCENTE_ID;
		}

		if ($this->aDocente !== null && $this->aDocente->getId() !== $v) {
			$this->aDocente = null;
		}

	} 
	
	public function setFkRepeticionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_repeticion_id !== $v || $v === 0) {
			$this->fk_repeticion_id = $v;
			$this->modifiedColumns[] = DocenteHorarioPeer::FK_REPETICION_ID;
		}

		if ($this->aRepeticion !== null && $this->aRepeticion->getId() !== $v) {
			$this->aRepeticion = null;
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
			$this->modifiedColumns[] = DocenteHorarioPeer::HORA_INICIO;
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
			$this->modifiedColumns[] = DocenteHorarioPeer::HORA_FIN;
		}

	} 
	
	public function setDia($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dia !== $v || $v === 0) {
			$this->dia = $v;
			$this->modifiedColumns[] = DocenteHorarioPeer::DIA;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fk_docente_id = $rs->getInt($startcol + 1);

			$this->fk_repeticion_id = $rs->getInt($startcol + 2);

			$this->hora_inicio = $rs->getTime($startcol + 3, null);

			$this->hora_fin = $rs->getTime($startcol + 4, null);

			$this->dia = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DocenteHorario object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DocenteHorarioPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DocenteHorarioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DocenteHorarioPeer::DATABASE_NAME);
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


												
			if ($this->aRepeticion !== null) {
				if ($this->aRepeticion->isModified()) {
					$affectedRows += $this->aRepeticion->save($con);
				}
				$this->setRepeticion($this->aRepeticion);
			}

			if ($this->aDocente !== null) {
				if ($this->aDocente->isModified()) {
					$affectedRows += $this->aDocente->save($con);
				}
				$this->setDocente($this->aDocente);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DocenteHorarioPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DocenteHorarioPeer::doUpdate($this, $con);
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


												
			if ($this->aRepeticion !== null) {
				if (!$this->aRepeticion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRepeticion->getValidationFailures());
				}
			}

			if ($this->aDocente !== null) {
				if (!$this->aDocente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDocente->getValidationFailures());
				}
			}


			if (($retval = DocenteHorarioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DocenteHorarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFkDocenteId();
				break;
			case 2:
				return $this->getFkRepeticionId();
				break;
			case 3:
				return $this->getHoraInicio();
				break;
			case 4:
				return $this->getHoraFin();
				break;
			case 5:
				return $this->getDia();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DocenteHorarioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkDocenteId(),
			$keys[2] => $this->getFkRepeticionId(),
			$keys[3] => $this->getHoraInicio(),
			$keys[4] => $this->getHoraFin(),
			$keys[5] => $this->getDia(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DocenteHorarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkDocenteId($value);
				break;
			case 2:
				$this->setFkRepeticionId($value);
				break;
			case 3:
				$this->setHoraInicio($value);
				break;
			case 4:
				$this->setHoraFin($value);
				break;
			case 5:
				$this->setDia($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DocenteHorarioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkDocenteId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkRepeticionId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHoraInicio($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHoraFin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDia($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DocenteHorarioPeer::DATABASE_NAME);

		if ($this->isColumnModified(DocenteHorarioPeer::ID)) $criteria->add(DocenteHorarioPeer::ID, $this->id);
		if ($this->isColumnModified(DocenteHorarioPeer::FK_DOCENTE_ID)) $criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->fk_docente_id);
		if ($this->isColumnModified(DocenteHorarioPeer::FK_REPETICION_ID)) $criteria->add(DocenteHorarioPeer::FK_REPETICION_ID, $this->fk_repeticion_id);
		if ($this->isColumnModified(DocenteHorarioPeer::HORA_INICIO)) $criteria->add(DocenteHorarioPeer::HORA_INICIO, $this->hora_inicio);
		if ($this->isColumnModified(DocenteHorarioPeer::HORA_FIN)) $criteria->add(DocenteHorarioPeer::HORA_FIN, $this->hora_fin);
		if ($this->isColumnModified(DocenteHorarioPeer::DIA)) $criteria->add(DocenteHorarioPeer::DIA, $this->dia);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DocenteHorarioPeer::DATABASE_NAME);

		$criteria->add(DocenteHorarioPeer::ID, $this->id);

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

		$copyObj->setFkDocenteId($this->fk_docente_id);

		$copyObj->setFkRepeticionId($this->fk_repeticion_id);

		$copyObj->setHoraInicio($this->hora_inicio);

		$copyObj->setHoraFin($this->hora_fin);

		$copyObj->setDia($this->dia);


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
			self::$peer = new DocenteHorarioPeer();
		}
		return self::$peer;
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

} 