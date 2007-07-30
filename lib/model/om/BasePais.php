<?php


abstract class BasePais extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre_largo;


	
	protected $nombre_corto;


	
	protected $orden = 0;

	
	protected $collProvincias;

	
	protected $lastProvinciaCriteria = null;

	
	protected $collAlumnos;

	
	protected $lastAlumnoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getNombreLargo()
	{

		return $this->nombre_largo;
	}

	
	public function getNombreCorto()
	{

		return $this->nombre_corto;
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
			$this->modifiedColumns[] = PaisPeer::ID;
		}

	} 
	
	public function setNombreLargo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre_largo !== $v) {
			$this->nombre_largo = $v;
			$this->modifiedColumns[] = PaisPeer::NOMBRE_LARGO;
		}

	} 
	
	public function setNombreCorto($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre_corto !== $v) {
			$this->nombre_corto = $v;
			$this->modifiedColumns[] = PaisPeer::NOMBRE_CORTO;
		}

	} 
	
	public function setOrden($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->orden !== $v || $v === 0) {
			$this->orden = $v;
			$this->modifiedColumns[] = PaisPeer::ORDEN;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre_largo = $rs->getString($startcol + 1);

			$this->nombre_corto = $rs->getString($startcol + 2);

			$this->orden = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Pais object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PaisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PaisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PaisPeer::DATABASE_NAME);
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
					$pk = PaisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PaisPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collProvincias !== null) {
				foreach($this->collProvincias as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAlumnos !== null) {
				foreach($this->collAlumnos as $referrerFK) {
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


			if (($retval = PaisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collProvincias !== null) {
					foreach($this->collProvincias as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAlumnos !== null) {
					foreach($this->collAlumnos as $referrerFK) {
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
		$pos = PaisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNombreLargo();
				break;
			case 2:
				return $this->getNombreCorto();
				break;
			case 3:
				return $this->getOrden();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PaisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombreLargo(),
			$keys[2] => $this->getNombreCorto(),
			$keys[3] => $this->getOrden(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PaisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNombreLargo($value);
				break;
			case 2:
				$this->setNombreCorto($value);
				break;
			case 3:
				$this->setOrden($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PaisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombreLargo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombreCorto($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOrden($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PaisPeer::DATABASE_NAME);

		if ($this->isColumnModified(PaisPeer::ID)) $criteria->add(PaisPeer::ID, $this->id);
		if ($this->isColumnModified(PaisPeer::NOMBRE_LARGO)) $criteria->add(PaisPeer::NOMBRE_LARGO, $this->nombre_largo);
		if ($this->isColumnModified(PaisPeer::NOMBRE_CORTO)) $criteria->add(PaisPeer::NOMBRE_CORTO, $this->nombre_corto);
		if ($this->isColumnModified(PaisPeer::ORDEN)) $criteria->add(PaisPeer::ORDEN, $this->orden);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PaisPeer::DATABASE_NAME);

		$criteria->add(PaisPeer::ID, $this->id);

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

		$copyObj->setNombreLargo($this->nombre_largo);

		$copyObj->setNombreCorto($this->nombre_corto);

		$copyObj->setOrden($this->orden);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getProvincias() as $relObj) {
				$copyObj->addProvincia($relObj->copy($deepCopy));
			}

			foreach($this->getAlumnos() as $relObj) {
				$copyObj->addAlumno($relObj->copy($deepCopy));
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
			self::$peer = new PaisPeer();
		}
		return self::$peer;
	}

	
	public function initProvincias()
	{
		if ($this->collProvincias === null) {
			$this->collProvincias = array();
		}
	}

	
	public function getProvincias($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProvinciaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProvincias === null) {
			if ($this->isNew()) {
			   $this->collProvincias = array();
			} else {

				$criteria->add(ProvinciaPeer::FK_PAIS_ID, $this->getId());

				ProvinciaPeer::addSelectColumns($criteria);
				$this->collProvincias = ProvinciaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProvinciaPeer::FK_PAIS_ID, $this->getId());

				ProvinciaPeer::addSelectColumns($criteria);
				if (!isset($this->lastProvinciaCriteria) || !$this->lastProvinciaCriteria->equals($criteria)) {
					$this->collProvincias = ProvinciaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProvinciaCriteria = $criteria;
		return $this->collProvincias;
	}

	
	public function countProvincias($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseProvinciaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProvinciaPeer::FK_PAIS_ID, $this->getId());

		return ProvinciaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProvincia(Provincia $l)
	{
		$this->collProvincias[] = $l;
		$l->setPais($this);
	}

	
	public function initAlumnos()
	{
		if ($this->collAlumnos === null) {
			$this->collAlumnos = array();
		}
	}

	
	public function getAlumnos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
			   $this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_PAIS_ID, $this->getId());

				AlumnoPeer::addSelectColumns($criteria);
				$this->collAlumnos = AlumnoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlumnoPeer::FK_PAIS_ID, $this->getId());

				AlumnoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
					$this->collAlumnos = AlumnoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAlumnoCriteria = $criteria;
		return $this->collAlumnos;
	}

	
	public function countAlumnos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AlumnoPeer::FK_PAIS_ID, $this->getId());

		return AlumnoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAlumno(Alumno $l)
	{
		$this->collAlumnos[] = $l;
		$l->setPais($this);
	}


	
	public function getAlumnosJoinProvincia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_PAIS_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinProvincia($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_PAIS_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinProvincia($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinTipodocumento($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_PAIS_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinTipodocumento($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_PAIS_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinTipodocumento($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinEstablecimiento($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_PAIS_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_PAIS_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinCuenta($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_PAIS_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinCuenta($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_PAIS_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinCuenta($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinConceptobaja($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_PAIS_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinConceptobaja($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_PAIS_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinConceptobaja($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}

} 