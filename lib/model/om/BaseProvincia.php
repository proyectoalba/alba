<?php


abstract class BaseProvincia extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre_corto;


	
	protected $nombre_largo;


	
	protected $fk_pais_id = 0;


	
	protected $orden = 0;

	
	protected $aPais;

	
	protected $collLocacions;

	
	protected $lastLocacionCriteria = null;

	
	protected $collOrganizacions;

	
	protected $lastOrganizacionCriteria = null;

	
	protected $collCuentas;

	
	protected $lastCuentaCriteria = null;

	
	protected $collAlumnos;

	
	protected $lastAlumnoCriteria = null;

	
	protected $collResponsables;

	
	protected $lastResponsableCriteria = null;

	
	protected $collDocentes;

	
	protected $lastDocenteCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getNombreCorto()
	{

		return $this->nombre_corto;
	}

	
	public function getNombreLargo()
	{

		return $this->nombre_largo;
	}

	
	public function getFkPaisId()
	{

		return $this->fk_pais_id;
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
			$this->modifiedColumns[] = ProvinciaPeer::ID;
		}

	} 
	
	public function setNombreCorto($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre_corto !== $v) {
			$this->nombre_corto = $v;
			$this->modifiedColumns[] = ProvinciaPeer::NOMBRE_CORTO;
		}

	} 
	
	public function setNombreLargo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre_largo !== $v) {
			$this->nombre_largo = $v;
			$this->modifiedColumns[] = ProvinciaPeer::NOMBRE_LARGO;
		}

	} 
	
	public function setFkPaisId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_pais_id !== $v || $v === 0) {
			$this->fk_pais_id = $v;
			$this->modifiedColumns[] = ProvinciaPeer::FK_PAIS_ID;
		}

		if ($this->aPais !== null && $this->aPais->getId() !== $v) {
			$this->aPais = null;
		}

	} 
	
	public function setOrden($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->orden !== $v || $v === 0) {
			$this->orden = $v;
			$this->modifiedColumns[] = ProvinciaPeer::ORDEN;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre_corto = $rs->getString($startcol + 1);

			$this->nombre_largo = $rs->getString($startcol + 2);

			$this->fk_pais_id = $rs->getInt($startcol + 3);

			$this->orden = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Provincia object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProvinciaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ProvinciaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ProvinciaPeer::DATABASE_NAME);
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


												
			if ($this->aPais !== null) {
				if ($this->aPais->isModified()) {
					$affectedRows += $this->aPais->save($con);
				}
				$this->setPais($this->aPais);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProvinciaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ProvinciaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLocacions !== null) {
				foreach($this->collLocacions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collOrganizacions !== null) {
				foreach($this->collOrganizacions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCuentas !== null) {
				foreach($this->collCuentas as $referrerFK) {
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

			if ($this->collResponsables !== null) {
				foreach($this->collResponsables as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDocentes !== null) {
				foreach($this->collDocentes as $referrerFK) {
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


												
			if ($this->aPais !== null) {
				if (!$this->aPais->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPais->getValidationFailures());
				}
			}


			if (($retval = ProvinciaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLocacions !== null) {
					foreach($this->collLocacions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collOrganizacions !== null) {
					foreach($this->collOrganizacions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCuentas !== null) {
					foreach($this->collCuentas as $referrerFK) {
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

				if ($this->collResponsables !== null) {
					foreach($this->collResponsables as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDocentes !== null) {
					foreach($this->collDocentes as $referrerFK) {
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
		$pos = ProvinciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNombreCorto();
				break;
			case 2:
				return $this->getNombreLargo();
				break;
			case 3:
				return $this->getFkPaisId();
				break;
			case 4:
				return $this->getOrden();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProvinciaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombreCorto(),
			$keys[2] => $this->getNombreLargo(),
			$keys[3] => $this->getFkPaisId(),
			$keys[4] => $this->getOrden(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProvinciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNombreCorto($value);
				break;
			case 2:
				$this->setNombreLargo($value);
				break;
			case 3:
				$this->setFkPaisId($value);
				break;
			case 4:
				$this->setOrden($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProvinciaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombreCorto($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombreLargo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkPaisId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOrden($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProvinciaPeer::ID)) $criteria->add(ProvinciaPeer::ID, $this->id);
		if ($this->isColumnModified(ProvinciaPeer::NOMBRE_CORTO)) $criteria->add(ProvinciaPeer::NOMBRE_CORTO, $this->nombre_corto);
		if ($this->isColumnModified(ProvinciaPeer::NOMBRE_LARGO)) $criteria->add(ProvinciaPeer::NOMBRE_LARGO, $this->nombre_largo);
		if ($this->isColumnModified(ProvinciaPeer::FK_PAIS_ID)) $criteria->add(ProvinciaPeer::FK_PAIS_ID, $this->fk_pais_id);
		if ($this->isColumnModified(ProvinciaPeer::ORDEN)) $criteria->add(ProvinciaPeer::ORDEN, $this->orden);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);

		$criteria->add(ProvinciaPeer::ID, $this->id);

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

		$copyObj->setNombreCorto($this->nombre_corto);

		$copyObj->setNombreLargo($this->nombre_largo);

		$copyObj->setFkPaisId($this->fk_pais_id);

		$copyObj->setOrden($this->orden);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLocacions() as $relObj) {
				$copyObj->addLocacion($relObj->copy($deepCopy));
			}

			foreach($this->getOrganizacions() as $relObj) {
				$copyObj->addOrganizacion($relObj->copy($deepCopy));
			}

			foreach($this->getCuentas() as $relObj) {
				$copyObj->addCuenta($relObj->copy($deepCopy));
			}

			foreach($this->getAlumnos() as $relObj) {
				$copyObj->addAlumno($relObj->copy($deepCopy));
			}

			foreach($this->getResponsables() as $relObj) {
				$copyObj->addResponsable($relObj->copy($deepCopy));
			}

			foreach($this->getDocentes() as $relObj) {
				$copyObj->addDocente($relObj->copy($deepCopy));
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
			self::$peer = new ProvinciaPeer();
		}
		return self::$peer;
	}

	
	public function setPais($v)
	{


		if ($v === null) {
			$this->setFkPaisId('0');
		} else {
			$this->setFkPaisId($v->getId());
		}


		$this->aPais = $v;
	}


	
	public function getPais($con = null)
	{
				include_once 'lib/model/om/BasePaisPeer.php';

		if ($this->aPais === null && ($this->fk_pais_id !== null)) {

			$this->aPais = PaisPeer::retrieveByPK($this->fk_pais_id, $con);

			
		}
		return $this->aPais;
	}

	
	public function initLocacions()
	{
		if ($this->collLocacions === null) {
			$this->collLocacions = array();
		}
	}

	
	public function getLocacions($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLocacions === null) {
			if ($this->isNew()) {
			   $this->collLocacions = array();
			} else {

				$criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->getId());

				LocacionPeer::addSelectColumns($criteria);
				$this->collLocacions = LocacionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->getId());

				LocacionPeer::addSelectColumns($criteria);
				if (!isset($this->lastLocacionCriteria) || !$this->lastLocacionCriteria->equals($criteria)) {
					$this->collLocacions = LocacionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLocacionCriteria = $criteria;
		return $this->collLocacions;
	}

	
	public function countLocacions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->getId());

		return LocacionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLocacion(Locacion $l)
	{
		$this->collLocacions[] = $l;
		$l->setProvincia($this);
	}


	
	public function getLocacionsJoinTipolocacion($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLocacions === null) {
			if ($this->isNew()) {
				$this->collLocacions = array();
			} else {

				$criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->getId());

				$this->collLocacions = LocacionPeer::doSelectJoinTipolocacion($criteria, $con);
			}
		} else {
									
			$criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastLocacionCriteria) || !$this->lastLocacionCriteria->equals($criteria)) {
				$this->collLocacions = LocacionPeer::doSelectJoinTipolocacion($criteria, $con);
			}
		}
		$this->lastLocacionCriteria = $criteria;

		return $this->collLocacions;
	}

	
	public function initOrganizacions()
	{
		if ($this->collOrganizacions === null) {
			$this->collOrganizacions = array();
		}
	}

	
	public function getOrganizacions($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOrganizacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrganizacions === null) {
			if ($this->isNew()) {
			   $this->collOrganizacions = array();
			} else {

				$criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->getId());

				OrganizacionPeer::addSelectColumns($criteria);
				$this->collOrganizacions = OrganizacionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->getId());

				OrganizacionPeer::addSelectColumns($criteria);
				if (!isset($this->lastOrganizacionCriteria) || !$this->lastOrganizacionCriteria->equals($criteria)) {
					$this->collOrganizacions = OrganizacionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastOrganizacionCriteria = $criteria;
		return $this->collOrganizacions;
	}

	
	public function countOrganizacions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseOrganizacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->getId());

		return OrganizacionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addOrganizacion(Organizacion $l)
	{
		$this->collOrganizacions[] = $l;
		$l->setProvincia($this);
	}


	
	public function getOrganizacionsJoinTipoiva($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOrganizacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrganizacions === null) {
			if ($this->isNew()) {
				$this->collOrganizacions = array();
			} else {

				$criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->getId());

				$this->collOrganizacions = OrganizacionPeer::doSelectJoinTipoiva($criteria, $con);
			}
		} else {
									
			$criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastOrganizacionCriteria) || !$this->lastOrganizacionCriteria->equals($criteria)) {
				$this->collOrganizacions = OrganizacionPeer::doSelectJoinTipoiva($criteria, $con);
			}
		}
		$this->lastOrganizacionCriteria = $criteria;

		return $this->collOrganizacions;
	}

	
	public function initCuentas()
	{
		if ($this->collCuentas === null) {
			$this->collCuentas = array();
		}
	}

	
	public function getCuentas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCuentaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuentas === null) {
			if ($this->isNew()) {
			   $this->collCuentas = array();
			} else {

				$criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->getId());

				CuentaPeer::addSelectColumns($criteria);
				$this->collCuentas = CuentaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->getId());

				CuentaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCuentaCriteria) || !$this->lastCuentaCriteria->equals($criteria)) {
					$this->collCuentas = CuentaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCuentaCriteria = $criteria;
		return $this->collCuentas;
	}

	
	public function countCuentas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCuentaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->getId());

		return CuentaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCuenta(Cuenta $l)
	{
		$this->collCuentas[] = $l;
		$l->setProvincia($this);
	}


	
	public function getCuentasJoinTipoiva($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCuentaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuentas === null) {
			if ($this->isNew()) {
				$this->collCuentas = array();
			} else {

				$criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->getId());

				$this->collCuentas = CuentaPeer::doSelectJoinTipoiva($criteria, $con);
			}
		} else {
									
			$criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastCuentaCriteria) || !$this->lastCuentaCriteria->equals($criteria)) {
				$this->collCuentas = CuentaPeer::doSelectJoinTipoiva($criteria, $con);
			}
		}
		$this->lastCuentaCriteria = $criteria;

		return $this->collCuentas;
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

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

				AlumnoPeer::addSelectColumns($criteria);
				$this->collAlumnos = AlumnoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

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

		$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

		return AlumnoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAlumno(Alumno $l)
	{
		$this->collAlumnos[] = $l;
		$l->setProvincia($this);
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

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinTipodocumento($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

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

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

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

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinCuenta($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

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

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinConceptobaja($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinConceptobaja($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinPais($criteria = null, $con = null)
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

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinPais($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinPais($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
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

				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->getId());

				ResponsablePeer::addSelectColumns($criteria);
				$this->collResponsables = ResponsablePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->getId());

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

		$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->getId());

		return ResponsablePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addResponsable(Responsable $l)
	{
		$this->collResponsables[] = $l;
		$l->setProvincia($this);
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

				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->getId());

				$this->collResponsables = ResponsablePeer::doSelectJoinTipodocumento($criteria, $con);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinTipodocumento($criteria, $con);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
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

				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->getId());

				$this->collResponsables = ResponsablePeer::doSelectJoinCuenta($criteria, $con);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinCuenta($criteria, $con);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}


	
	public function getResponsablesJoinRolResponsable($criteria = null, $con = null)
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

				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->getId());

				$this->collResponsables = ResponsablePeer::doSelectJoinRolResponsable($criteria, $con);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinRolResponsable($criteria, $con);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}

	
	public function initDocentes()
	{
		if ($this->collDocentes === null) {
			$this->collDocentes = array();
		}
	}

	
	public function getDocentes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDocentes === null) {
			if ($this->isNew()) {
			   $this->collDocentes = array();
			} else {

				$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->getId());

				DocentePeer::addSelectColumns($criteria);
				$this->collDocentes = DocentePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->getId());

				DocentePeer::addSelectColumns($criteria);
				if (!isset($this->lastDocenteCriteria) || !$this->lastDocenteCriteria->equals($criteria)) {
					$this->collDocentes = DocentePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDocenteCriteria = $criteria;
		return $this->collDocentes;
	}

	
	public function countDocentes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->getId());

		return DocentePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDocente(Docente $l)
	{
		$this->collDocentes[] = $l;
		$l->setProvincia($this);
	}


	
	public function getDocentesJoinTipodocumento($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDocentes === null) {
			if ($this->isNew()) {
				$this->collDocentes = array();
			} else {

				$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->getId());

				$this->collDocentes = DocentePeer::doSelectJoinTipodocumento($criteria, $con);
			}
		} else {
									
			$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastDocenteCriteria) || !$this->lastDocenteCriteria->equals($criteria)) {
				$this->collDocentes = DocentePeer::doSelectJoinTipodocumento($criteria, $con);
			}
		}
		$this->lastDocenteCriteria = $criteria;

		return $this->collDocentes;
	}


	
	public function getDocentesJoinPais($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDocentes === null) {
			if ($this->isNew()) {
				$this->collDocentes = array();
			} else {

				$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->getId());

				$this->collDocentes = DocentePeer::doSelectJoinPais($criteria, $con);
			}
		} else {
									
			$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastDocenteCriteria) || !$this->lastDocenteCriteria->equals($criteria)) {
				$this->collDocentes = DocentePeer::doSelectJoinPais($criteria, $con);
			}
		}
		$this->lastDocenteCriteria = $criteria;

		return $this->collDocentes;
	}

} 