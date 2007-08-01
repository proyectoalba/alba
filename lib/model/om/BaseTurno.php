<?php


abstract class BaseTurno extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fk_ciclolectivo_id;


	
	protected $hora_inicio;


	
	protected $hora_fin;


	
	protected $descripcion = 'null';

	
	protected $aCiclolectivo;

	
	protected $collDivisions;

	
	protected $lastDivisionCriteria = null;

	
	protected $collHorarioescolars;

	
	protected $lastHorarioescolarCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFkCiclolectivoId()
	{

		return $this->fk_ciclolectivo_id;
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

	
	public function getDescripcion()
	{

		return $this->descripcion;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TurnoPeer::ID;
		}

	} 
	
	public function setFkCiclolectivoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_ciclolectivo_id !== $v) {
			$this->fk_ciclolectivo_id = $v;
			$this->modifiedColumns[] = TurnoPeer::FK_CICLOLECTIVO_ID;
		}

		if ($this->aCiclolectivo !== null && $this->aCiclolectivo->getId() !== $v) {
			$this->aCiclolectivo = null;
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
			$this->modifiedColumns[] = TurnoPeer::HORA_INICIO;
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
			$this->modifiedColumns[] = TurnoPeer::HORA_FIN;
		}

	} 
	
	public function setDescripcion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descripcion !== $v || $v === 'null') {
			$this->descripcion = $v;
			$this->modifiedColumns[] = TurnoPeer::DESCRIPCION;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fk_ciclolectivo_id = $rs->getInt($startcol + 1);

			$this->hora_inicio = $rs->getTime($startcol + 2, null);

			$this->hora_fin = $rs->getTime($startcol + 3, null);

			$this->descripcion = $rs->getString($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Turno object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TurnoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TurnoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TurnoPeer::DATABASE_NAME);
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


												
			if ($this->aCiclolectivo !== null) {
				if ($this->aCiclolectivo->isModified()) {
					$affectedRows += $this->aCiclolectivo->save($con);
				}
				$this->setCiclolectivo($this->aCiclolectivo);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TurnoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TurnoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collDivisions !== null) {
				foreach($this->collDivisions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collHorarioescolars !== null) {
				foreach($this->collHorarioescolars as $referrerFK) {
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


												
			if ($this->aCiclolectivo !== null) {
				if (!$this->aCiclolectivo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCiclolectivo->getValidationFailures());
				}
			}


			if (($retval = TurnoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDivisions !== null) {
					foreach($this->collDivisions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collHorarioescolars !== null) {
					foreach($this->collHorarioescolars as $referrerFK) {
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
		$pos = TurnoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFkCiclolectivoId();
				break;
			case 2:
				return $this->getHoraInicio();
				break;
			case 3:
				return $this->getHoraFin();
				break;
			case 4:
				return $this->getDescripcion();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TurnoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkCiclolectivoId(),
			$keys[2] => $this->getHoraInicio(),
			$keys[3] => $this->getHoraFin(),
			$keys[4] => $this->getDescripcion(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TurnoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkCiclolectivoId($value);
				break;
			case 2:
				$this->setHoraInicio($value);
				break;
			case 3:
				$this->setHoraFin($value);
				break;
			case 4:
				$this->setDescripcion($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TurnoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkCiclolectivoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHoraInicio($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHoraFin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescripcion($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TurnoPeer::DATABASE_NAME);

		if ($this->isColumnModified(TurnoPeer::ID)) $criteria->add(TurnoPeer::ID, $this->id);
		if ($this->isColumnModified(TurnoPeer::FK_CICLOLECTIVO_ID)) $criteria->add(TurnoPeer::FK_CICLOLECTIVO_ID, $this->fk_ciclolectivo_id);
		if ($this->isColumnModified(TurnoPeer::HORA_INICIO)) $criteria->add(TurnoPeer::HORA_INICIO, $this->hora_inicio);
		if ($this->isColumnModified(TurnoPeer::HORA_FIN)) $criteria->add(TurnoPeer::HORA_FIN, $this->hora_fin);
		if ($this->isColumnModified(TurnoPeer::DESCRIPCION)) $criteria->add(TurnoPeer::DESCRIPCION, $this->descripcion);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TurnoPeer::DATABASE_NAME);

		$criteria->add(TurnoPeer::ID, $this->id);

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

		$copyObj->setFkCiclolectivoId($this->fk_ciclolectivo_id);

		$copyObj->setHoraInicio($this->hora_inicio);

		$copyObj->setHoraFin($this->hora_fin);

		$copyObj->setDescripcion($this->descripcion);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getDivisions() as $relObj) {
				$copyObj->addDivision($relObj->copy($deepCopy));
			}

			foreach($this->getHorarioescolars() as $relObj) {
				$copyObj->addHorarioescolar($relObj->copy($deepCopy));
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
			self::$peer = new TurnoPeer();
		}
		return self::$peer;
	}

	
	public function setCiclolectivo($v)
	{


		if ($v === null) {
			$this->setFkCiclolectivoId(NULL);
		} else {
			$this->setFkCiclolectivoId($v->getId());
		}


		$this->aCiclolectivo = $v;
	}


	
	public function getCiclolectivo($con = null)
	{
				include_once 'lib/model/om/BaseCiclolectivoPeer.php';

		if ($this->aCiclolectivo === null && ($this->fk_ciclolectivo_id !== null)) {

			$this->aCiclolectivo = CiclolectivoPeer::retrieveByPK($this->fk_ciclolectivo_id, $con);

			
		}
		return $this->aCiclolectivo;
	}

	
	public function initDivisions()
	{
		if ($this->collDivisions === null) {
			$this->collDivisions = array();
		}
	}

	
	public function getDivisions($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDivisionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDivisions === null) {
			if ($this->isNew()) {
			   $this->collDivisions = array();
			} else {

				$criteria->add(DivisionPeer::FK_TURNO_ID, $this->getId());

				DivisionPeer::addSelectColumns($criteria);
				$this->collDivisions = DivisionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DivisionPeer::FK_TURNO_ID, $this->getId());

				DivisionPeer::addSelectColumns($criteria);
				if (!isset($this->lastDivisionCriteria) || !$this->lastDivisionCriteria->equals($criteria)) {
					$this->collDivisions = DivisionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDivisionCriteria = $criteria;
		return $this->collDivisions;
	}

	
	public function countDivisions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDivisionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DivisionPeer::FK_TURNO_ID, $this->getId());

		return DivisionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDivision(Division $l)
	{
		$this->collDivisions[] = $l;
		$l->setTurno($this);
	}


	
	public function getDivisionsJoinAnio($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDivisionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDivisions === null) {
			if ($this->isNew()) {
				$this->collDivisions = array();
			} else {

				$criteria->add(DivisionPeer::FK_TURNO_ID, $this->getId());

				$this->collDivisions = DivisionPeer::doSelectJoinAnio($criteria, $con);
			}
		} else {
									
			$criteria->add(DivisionPeer::FK_TURNO_ID, $this->getId());

			if (!isset($this->lastDivisionCriteria) || !$this->lastDivisionCriteria->equals($criteria)) {
				$this->collDivisions = DivisionPeer::doSelectJoinAnio($criteria, $con);
			}
		}
		$this->lastDivisionCriteria = $criteria;

		return $this->collDivisions;
	}

	
	public function initHorarioescolars()
	{
		if ($this->collHorarioescolars === null) {
			$this->collHorarioescolars = array();
		}
	}

	
	public function getHorarioescolars($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseHorarioescolarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
			   $this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->getId());

				HorarioescolarPeer::addSelectColumns($criteria);
				$this->collHorarioescolars = HorarioescolarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->getId());

				HorarioescolarPeer::addSelectColumns($criteria);
				if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
					$this->collHorarioescolars = HorarioescolarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;
		return $this->collHorarioescolars;
	}

	
	public function countHorarioescolars($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseHorarioescolarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->getId());

		return HorarioescolarPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addHorarioescolar(Horarioescolar $l)
	{
		$this->collHorarioescolars[] = $l;
		$l->setTurno($this);
	}


	
	public function getHorarioescolarsJoinEvento($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseHorarioescolarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->getId());

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEvento($criteria, $con);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->getId());

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEvento($criteria, $con);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}


	
	public function getHorarioescolarsJoinEstablecimiento($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseHorarioescolarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->getId());

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->getId());

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}


	
	public function getHorarioescolarsJoinHorarioescolartipo($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseHorarioescolarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->getId());

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinHorarioescolartipo($criteria, $con);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_TURNO_ID, $this->getId());

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinHorarioescolartipo($criteria, $con);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}

} 