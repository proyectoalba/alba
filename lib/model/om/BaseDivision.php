<?php


abstract class BaseDivision extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fk_anio_id = 0;


	
	protected $descripcion;


	
	protected $fk_turno_id = 0;


	
	protected $fk_orientacion_id;


	
	protected $orden = 0;

	
	protected $aAnio;

	
	protected $aTurno;

	
	protected $aOrientacion;

	
	protected $collRelAlumnoDivisions;

	
	protected $lastRelAlumnoDivisionCriteria = null;

	
	protected $collRelDivisionActividadDocentes;

	
	protected $lastRelDivisionActividadDocenteCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFkAnioId()
	{

		return $this->fk_anio_id;
	}

	
	public function getDescripcion()
	{

		return $this->descripcion;
	}

	
	public function getFkTurnoId()
	{

		return $this->fk_turno_id;
	}

	
	public function getFkOrientacionId()
	{

		return $this->fk_orientacion_id;
	}

	
	public function getOrden()
	{

		return $this->orden;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DivisionPeer::ID;
		}

	} 
	
	public function setFkAnioId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_anio_id !== $v || $v === 0) {
			$this->fk_anio_id = $v;
			$this->modifiedColumns[] = DivisionPeer::FK_ANIO_ID;
		}

		if ($this->aAnio !== null && $this->aAnio->getId() !== $v) {
			$this->aAnio = null;
		}

	} 
	
	public function setDescripcion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = DivisionPeer::DESCRIPCION;
		}

	} 
	
	public function setFkTurnoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_turno_id !== $v || $v === 0) {
			$this->fk_turno_id = $v;
			$this->modifiedColumns[] = DivisionPeer::FK_TURNO_ID;
		}

		if ($this->aTurno !== null && $this->aTurno->getId() !== $v) {
			$this->aTurno = null;
		}

	} 
	
	public function setFkOrientacionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_orientacion_id !== $v) {
			$this->fk_orientacion_id = $v;
			$this->modifiedColumns[] = DivisionPeer::FK_ORIENTACION_ID;
		}

		if ($this->aOrientacion !== null && $this->aOrientacion->getId() !== $v) {
			$this->aOrientacion = null;
		}

	} 
	
	public function setOrden($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->orden !== $v || $v === 0) {
			$this->orden = $v;
			$this->modifiedColumns[] = DivisionPeer::ORDEN;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fk_anio_id = $rs->getInt($startcol + 1);

			$this->descripcion = $rs->getString($startcol + 2);

			$this->fk_turno_id = $rs->getInt($startcol + 3);

			$this->fk_orientacion_id = $rs->getInt($startcol + 4);

			$this->orden = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Division object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DivisionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DivisionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DivisionPeer::DATABASE_NAME);
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


												
			if ($this->aAnio !== null) {
				if ($this->aAnio->isModified()) {
					$affectedRows += $this->aAnio->save($con);
				}
				$this->setAnio($this->aAnio);
			}

			if ($this->aTurno !== null) {
				if ($this->aTurno->isModified()) {
					$affectedRows += $this->aTurno->save($con);
				}
				$this->setTurno($this->aTurno);
			}

			if ($this->aOrientacion !== null) {
				if ($this->aOrientacion->isModified()) {
					$affectedRows += $this->aOrientacion->save($con);
				}
				$this->setOrientacion($this->aOrientacion);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DivisionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DivisionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collRelAlumnoDivisions !== null) {
				foreach($this->collRelAlumnoDivisions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelDivisionActividadDocentes !== null) {
				foreach($this->collRelDivisionActividadDocentes as $referrerFK) {
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

			if ($this->aTurno !== null) {
				if (!$this->aTurno->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTurno->getValidationFailures());
				}
			}

			if ($this->aOrientacion !== null) {
				if (!$this->aOrientacion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOrientacion->getValidationFailures());
				}
			}


			if (($retval = DivisionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelAlumnoDivisions !== null) {
					foreach($this->collRelAlumnoDivisions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelDivisionActividadDocentes !== null) {
					foreach($this->collRelDivisionActividadDocentes as $referrerFK) {
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
		$pos = DivisionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
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
				return $this->getDescripcion();
				break;
			case 3:
				return $this->getFkTurnoId();
				break;
			case 4:
				return $this->getFkOrientacionId();
				break;
			case 5:
				return $this->getOrden();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DivisionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkAnioId(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getFkTurnoId(),
			$keys[4] => $this->getFkOrientacionId(),
			$keys[5] => $this->getOrden(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DivisionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDescripcion($value);
				break;
			case 3:
				$this->setFkTurnoId($value);
				break;
			case 4:
				$this->setFkOrientacionId($value);
				break;
			case 5:
				$this->setOrden($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DivisionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkAnioId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkTurnoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFkOrientacionId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOrden($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DivisionPeer::DATABASE_NAME);

		if ($this->isColumnModified(DivisionPeer::ID)) $criteria->add(DivisionPeer::ID, $this->id);
		if ($this->isColumnModified(DivisionPeer::FK_ANIO_ID)) $criteria->add(DivisionPeer::FK_ANIO_ID, $this->fk_anio_id);
		if ($this->isColumnModified(DivisionPeer::DESCRIPCION)) $criteria->add(DivisionPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(DivisionPeer::FK_TURNO_ID)) $criteria->add(DivisionPeer::FK_TURNO_ID, $this->fk_turno_id);
		if ($this->isColumnModified(DivisionPeer::FK_ORIENTACION_ID)) $criteria->add(DivisionPeer::FK_ORIENTACION_ID, $this->fk_orientacion_id);
		if ($this->isColumnModified(DivisionPeer::ORDEN)) $criteria->add(DivisionPeer::ORDEN, $this->orden);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DivisionPeer::DATABASE_NAME);

		$criteria->add(DivisionPeer::ID, $this->id);

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

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setFkTurnoId($this->fk_turno_id);

		$copyObj->setFkOrientacionId($this->fk_orientacion_id);

		$copyObj->setOrden($this->orden);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getRelAlumnoDivisions() as $relObj) {
				$copyObj->addRelAlumnoDivision($relObj->copy($deepCopy));
			}

			foreach($this->getRelDivisionActividadDocentes() as $relObj) {
				$copyObj->addRelDivisionActividadDocente($relObj->copy($deepCopy));
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
			self::$peer = new DivisionPeer();
		}
		return self::$peer;
	}

	
	public function setAnio($v)
	{


		if ($v === null) {
			$this->setFkAnioId('0');
		} else {
			$this->setFkAnioId($v->getId());
		}


		$this->aAnio = $v;
	}


	
	public function getAnio($con = null)
	{
				include_once 'lib/model/om/BaseAnioPeer.php';

		if ($this->aAnio === null && ($this->fk_anio_id !== null)) {

			$this->aAnio = AnioPeer::retrieveByPK($this->fk_anio_id, $con);

			
		}
		return $this->aAnio;
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

	
	public function setOrientacion($v)
	{


		if ($v === null) {
			$this->setFkOrientacionId(NULL);
		} else {
			$this->setFkOrientacionId($v->getId());
		}


		$this->aOrientacion = $v;
	}


	
	public function getOrientacion($con = null)
	{
				include_once 'lib/model/om/BaseOrientacionPeer.php';

		if ($this->aOrientacion === null && ($this->fk_orientacion_id !== null)) {

			$this->aOrientacion = OrientacionPeer::retrieveByPK($this->fk_orientacion_id, $con);

			
		}
		return $this->aOrientacion;
	}

	
	public function initRelAlumnoDivisions()
	{
		if ($this->collRelAlumnoDivisions === null) {
			$this->collRelAlumnoDivisions = array();
		}
	}

	
	public function getRelAlumnoDivisions($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelAlumnoDivisionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAlumnoDivisions === null) {
			if ($this->isNew()) {
			   $this->collRelAlumnoDivisions = array();
			} else {

				$criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->getId());

				RelAlumnoDivisionPeer::addSelectColumns($criteria);
				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->getId());

				RelAlumnoDivisionPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelAlumnoDivisionCriteria) || !$this->lastRelAlumnoDivisionCriteria->equals($criteria)) {
					$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelAlumnoDivisionCriteria = $criteria;
		return $this->collRelAlumnoDivisions;
	}

	
	public function countRelAlumnoDivisions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRelAlumnoDivisionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->getId());

		return RelAlumnoDivisionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelAlumnoDivision(RelAlumnoDivision $l)
	{
		$this->collRelAlumnoDivisions[] = $l;
		$l->setDivision($this);
	}


	
	public function getRelAlumnoDivisionsJoinAlumno($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelAlumnoDivisionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAlumnoDivisions === null) {
			if ($this->isNew()) {
				$this->collRelAlumnoDivisions = array();
			} else {

				$criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->getId());

				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelectJoinAlumno($criteria, $con);
			}
		} else {
									
			$criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->getId());

			if (!isset($this->lastRelAlumnoDivisionCriteria) || !$this->lastRelAlumnoDivisionCriteria->equals($criteria)) {
				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelectJoinAlumno($criteria, $con);
			}
		}
		$this->lastRelAlumnoDivisionCriteria = $criteria;

		return $this->collRelAlumnoDivisions;
	}

	
	public function initRelDivisionActividadDocentes()
	{
		if ($this->collRelDivisionActividadDocentes === null) {
			$this->collRelDivisionActividadDocentes = array();
		}
	}

	
	public function getRelDivisionActividadDocentes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelDivisionActividadDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
			   $this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

				RelDivisionActividadDocentePeer::addSelectColumns($criteria);
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

				RelDivisionActividadDocentePeer::addSelectColumns($criteria);
				if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
					$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;
		return $this->collRelDivisionActividadDocentes;
	}

	
	public function countRelDivisionActividadDocentes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRelDivisionActividadDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

		return RelDivisionActividadDocentePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelDivisionActividadDocente(RelDivisionActividadDocente $l)
	{
		$this->collRelDivisionActividadDocentes[] = $l;
		$l->setDivision($this);
	}


	
	public function getRelDivisionActividadDocentesJoinActividad($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelDivisionActividadDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinActividad($criteria, $con);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinActividad($criteria, $con);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}


	
	public function getRelDivisionActividadDocentesJoinDocente($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelDivisionActividadDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDocente($criteria, $con);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDocente($criteria, $con);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}


	
	public function getRelDivisionActividadDocentesJoinEvento($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelDivisionActividadDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinEvento($criteria, $con);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinEvento($criteria, $con);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}

} 