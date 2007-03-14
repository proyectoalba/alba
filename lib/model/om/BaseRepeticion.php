<?php


abstract class BaseRepeticion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $descripcion = '';


	
	protected $orden = 0;

	
	protected $collRelDivisionActividadDocentes;

	
	protected $lastRelDivisionActividadDocenteCriteria = null;

	
	protected $collDocenteHorarios;

	
	protected $lastDocenteHorarioCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getDescripcion()
	{

		return $this->descripcion;
	}

	
	public function getOrden()
	{

		return $this->orden;
	}

	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RepeticionPeer::ID;
		}

	} 
	
	public function setDescripcion($v)
	{

		if ($this->descripcion !== $v || $v === '') {
			$this->descripcion = $v;
			$this->modifiedColumns[] = RepeticionPeer::DESCRIPCION;
		}

	} 
	
	public function setOrden($v)
	{

		if ($this->orden !== $v || $v === 0) {
			$this->orden = $v;
			$this->modifiedColumns[] = RepeticionPeer::ORDEN;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->descripcion = $rs->getString($startcol + 1);

			$this->orden = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Repeticion object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RepeticionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RepeticionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RepeticionPeer::DATABASE_NAME);
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
					$pk = RepeticionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RepeticionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collRelDivisionActividadDocentes !== null) {
				foreach($this->collRelDivisionActividadDocentes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDocenteHorarios !== null) {
				foreach($this->collDocenteHorarios as $referrerFK) {
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


			if (($retval = RepeticionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelDivisionActividadDocentes !== null) {
					foreach($this->collRelDivisionActividadDocentes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDocenteHorarios !== null) {
					foreach($this->collDocenteHorarios as $referrerFK) {
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
		$pos = RepeticionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getDescripcion();
				break;
			case 2:
				return $this->getOrden();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RepeticionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDescripcion(),
			$keys[2] => $this->getOrden(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RepeticionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDescripcion($value);
				break;
			case 2:
				$this->setOrden($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RepeticionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescripcion($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOrden($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RepeticionPeer::DATABASE_NAME);

		if ($this->isColumnModified(RepeticionPeer::ID)) $criteria->add(RepeticionPeer::ID, $this->id);
		if ($this->isColumnModified(RepeticionPeer::DESCRIPCION)) $criteria->add(RepeticionPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(RepeticionPeer::ORDEN)) $criteria->add(RepeticionPeer::ORDEN, $this->orden);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RepeticionPeer::DATABASE_NAME);

		$criteria->add(RepeticionPeer::ID, $this->id);

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

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setOrden($this->orden);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getRelDivisionActividadDocentes() as $relObj) {
				$copyObj->addRelDivisionActividadDocente($relObj->copy($deepCopy));
			}

			foreach($this->getDocenteHorarios() as $relObj) {
				$copyObj->addDocenteHorario($relObj->copy($deepCopy));
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
			self::$peer = new RepeticionPeer();
		}
		return self::$peer;
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_REPETICION_ID, $this->getId());

				RelDivisionActividadDocentePeer::addSelectColumns($criteria);
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDivisionActividadDocentePeer::FK_REPETICION_ID, $this->getId());

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

		$criteria->add(RelDivisionActividadDocentePeer::FK_REPETICION_ID, $this->getId());

		return RelDivisionActividadDocentePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelDivisionActividadDocente(RelDivisionActividadDocente $l)
	{
		$this->collRelDivisionActividadDocentes[] = $l;
		$l->setRepeticion($this);
	}


	
	public function getRelDivisionActividadDocentesJoinDivision($criteria = null, $con = null)
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_REPETICION_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDivision($criteria, $con);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_REPETICION_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDivision($criteria, $con);
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_REPETICION_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDocente($criteria, $con);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_REPETICION_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDocente($criteria, $con);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_REPETICION_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinActividad($criteria, $con);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_REPETICION_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinActividad($criteria, $con);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}

	
	public function initDocenteHorarios()
	{
		if ($this->collDocenteHorarios === null) {
			$this->collDocenteHorarios = array();
		}
	}

	
	public function getDocenteHorarios($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDocenteHorarioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDocenteHorarios === null) {
			if ($this->isNew()) {
			   $this->collDocenteHorarios = array();
			} else {

				$criteria->add(DocenteHorarioPeer::FK_REPETICION_ID, $this->getId());

				DocenteHorarioPeer::addSelectColumns($criteria);
				$this->collDocenteHorarios = DocenteHorarioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DocenteHorarioPeer::FK_REPETICION_ID, $this->getId());

				DocenteHorarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastDocenteHorarioCriteria) || !$this->lastDocenteHorarioCriteria->equals($criteria)) {
					$this->collDocenteHorarios = DocenteHorarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDocenteHorarioCriteria = $criteria;
		return $this->collDocenteHorarios;
	}

	
	public function countDocenteHorarios($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDocenteHorarioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DocenteHorarioPeer::FK_REPETICION_ID, $this->getId());

		return DocenteHorarioPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDocenteHorario(DocenteHorario $l)
	{
		$this->collDocenteHorarios[] = $l;
		$l->setRepeticion($this);
	}


	
	public function getDocenteHorariosJoinDocente($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDocenteHorarioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDocenteHorarios === null) {
			if ($this->isNew()) {
				$this->collDocenteHorarios = array();
			} else {

				$criteria->add(DocenteHorarioPeer::FK_REPETICION_ID, $this->getId());

				$this->collDocenteHorarios = DocenteHorarioPeer::doSelectJoinDocente($criteria, $con);
			}
		} else {
									
			$criteria->add(DocenteHorarioPeer::FK_REPETICION_ID, $this->getId());

			if (!isset($this->lastDocenteHorarioCriteria) || !$this->lastDocenteHorarioCriteria->equals($criteria)) {
				$this->collDocenteHorarios = DocenteHorarioPeer::doSelectJoinDocente($criteria, $con);
			}
		}
		$this->lastDocenteHorarioCriteria = $criteria;

		return $this->collDocenteHorarios;
	}

} 