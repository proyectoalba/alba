<?php


abstract class BaseRolResponsable extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre = '';


	
	protected $descripcion = '';


	
	protected $activo = true;

	
	protected $collResponsables;

	
	protected $lastResponsableCriteria = null;

	
	protected $collRelRolresponsableResponsables;

	
	protected $lastRelRolresponsableResponsableCriteria = null;

	
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

	
	public function getActivo()
	{

		return $this->activo;
	}

	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RolResponsablePeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

		if ($this->nombre !== $v || $v === '') {
			$this->nombre = $v;
			$this->modifiedColumns[] = RolResponsablePeer::NOMBRE;
		}

	} 
	
	public function setDescripcion($v)
	{

		if ($this->descripcion !== $v || $v === '') {
			$this->descripcion = $v;
			$this->modifiedColumns[] = RolResponsablePeer::DESCRIPCION;
		}

	} 
	
	public function setActivo($v)
	{

		if ($this->activo !== $v || $v === true) {
			$this->activo = $v;
			$this->modifiedColumns[] = RolResponsablePeer::ACTIVO;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->descripcion = $rs->getString($startcol + 2);

			$this->activo = $rs->getBoolean($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RolResponsable object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RolResponsablePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RolResponsablePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RolResponsablePeer::DATABASE_NAME);
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
					$pk = RolResponsablePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RolResponsablePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collResponsables !== null) {
				foreach($this->collResponsables as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelRolresponsableResponsables !== null) {
				foreach($this->collRelRolresponsableResponsables as $referrerFK) {
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


			if (($retval = RolResponsablePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collResponsables !== null) {
					foreach($this->collResponsables as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelRolresponsableResponsables !== null) {
					foreach($this->collRelRolresponsableResponsables as $referrerFK) {
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
		$pos = RolResponsablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getActivo();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RolResponsablePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getActivo(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RolResponsablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setActivo($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RolResponsablePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setActivo($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RolResponsablePeer::DATABASE_NAME);

		if ($this->isColumnModified(RolResponsablePeer::ID)) $criteria->add(RolResponsablePeer::ID, $this->id);
		if ($this->isColumnModified(RolResponsablePeer::NOMBRE)) $criteria->add(RolResponsablePeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(RolResponsablePeer::DESCRIPCION)) $criteria->add(RolResponsablePeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(RolResponsablePeer::ACTIVO)) $criteria->add(RolResponsablePeer::ACTIVO, $this->activo);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RolResponsablePeer::DATABASE_NAME);

		$criteria->add(RolResponsablePeer::ID, $this->id);

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

		$copyObj->setActivo($this->activo);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getResponsables() as $relObj) {
				$copyObj->addResponsable($relObj->copy($deepCopy));
			}

			foreach($this->getRelRolresponsableResponsables() as $relObj) {
				$copyObj->addRelRolresponsableResponsable($relObj->copy($deepCopy));
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
			self::$peer = new RolResponsablePeer();
		}
		return self::$peer;
	}

	
	public function initResponsables()
	{
		if ($this->collResponsables === null) {
			$this->collResponsables = array();
		}
	}

	
	public function getResponsables($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseResponsablePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
			   $this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->getId());

				ResponsablePeer::addSelectColumns($criteria);
				$this->collResponsables = ResponsablePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->getId());

				ResponsablePeer::addSelectColumns($criteria);
				if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
					$this->collResponsables = ResponsablePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastResponsableCriteria = $criteria;
		return $this->collResponsables;
	}

	
	public function countResponsables($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseResponsablePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->getId());

		return ResponsablePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addResponsable(Responsable $l)
	{
		$this->collResponsables[] = $l;
		$l->setRolResponsable($this);
	}


	
	public function getResponsablesJoinCuenta($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseResponsablePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
				$this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->getId());

				$this->collResponsables = ResponsablePeer::doSelectJoinCuenta($criteria, $con);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->getId());

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinCuenta($criteria, $con);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}


	
	public function getResponsablesJoinProvincia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseResponsablePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
				$this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->getId());

				$this->collResponsables = ResponsablePeer::doSelectJoinProvincia($criteria, $con);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->getId());

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinProvincia($criteria, $con);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}


	
	public function getResponsablesJoinTipodocumento($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseResponsablePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
				$this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->getId());

				$this->collResponsables = ResponsablePeer::doSelectJoinTipodocumento($criteria, $con);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->getId());

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinTipodocumento($criteria, $con);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}

	
	public function initRelRolresponsableResponsables()
	{
		if ($this->collRelRolresponsableResponsables === null) {
			$this->collRelRolresponsableResponsables = array();
		}
	}

	
	public function getRelRolresponsableResponsables($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelRolresponsableResponsablePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelRolresponsableResponsables === null) {
			if ($this->isNew()) {
			   $this->collRelRolresponsableResponsables = array();
			} else {

				$criteria->add(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, $this->getId());

				RelRolresponsableResponsablePeer::addSelectColumns($criteria);
				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, $this->getId());

				RelRolresponsableResponsablePeer::addSelectColumns($criteria);
				if (!isset($this->lastRelRolresponsableResponsableCriteria) || !$this->lastRelRolresponsableResponsableCriteria->equals($criteria)) {
					$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelRolresponsableResponsableCriteria = $criteria;
		return $this->collRelRolresponsableResponsables;
	}

	
	public function countRelRolresponsableResponsables($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRelRolresponsableResponsablePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, $this->getId());

		return RelRolresponsableResponsablePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelRolresponsableResponsable(RelRolresponsableResponsable $l)
	{
		$this->collRelRolresponsableResponsables[] = $l;
		$l->setRolResponsable($this);
	}


	
	public function getRelRolresponsableResponsablesJoinResponsable($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelRolresponsableResponsablePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelRolresponsableResponsables === null) {
			if ($this->isNew()) {
				$this->collRelRolresponsableResponsables = array();
			} else {

				$criteria->add(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, $this->getId());

				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinResponsable($criteria, $con);
			}
		} else {
									
			$criteria->add(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, $this->getId());

			if (!isset($this->lastRelRolresponsableResponsableCriteria) || !$this->lastRelRolresponsableResponsableCriteria->equals($criteria)) {
				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinResponsable($criteria, $con);
			}
		}
		$this->lastRelRolresponsableResponsableCriteria = $criteria;

		return $this->collRelRolresponsableResponsables;
	}

} 