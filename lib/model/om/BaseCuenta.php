<?php


abstract class BaseCuenta extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre = '';


	
	protected $razon_social = '';


	
	protected $cuit = '';


	
	protected $direccion = '';


	
	protected $ciudad = '';


	
	protected $codigo_postal = '';


	
	protected $telefono = '';


	
	protected $fk_provincia_id = 0;


	
	protected $fk_tipoiva_id = 0;

	
	protected $aTipoiva;

	
	protected $aProvincia;

	
	protected $collAlumnos;

	
	protected $lastAlumnoCriteria = null;

	
	protected $collResponsables;

	
	protected $lastResponsableCriteria = null;

	
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

	
	public function getRazonSocial()
	{

		return $this->razon_social;
	}

	
	public function getCuit()
	{

		return $this->cuit;
	}

	
	public function getDireccion()
	{

		return $this->direccion;
	}

	
	public function getCiudad()
	{

		return $this->ciudad;
	}

	
	public function getCodigoPostal()
	{

		return $this->codigo_postal;
	}

	
	public function getTelefono()
	{

		return $this->telefono;
	}

	
	public function getFkProvinciaId()
	{

		return $this->fk_provincia_id;
	}

	
	public function getFkTipoivaId()
	{

		return $this->fk_tipoiva_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CuentaPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v || $v === '') {
			$this->nombre = $v;
			$this->modifiedColumns[] = CuentaPeer::NOMBRE;
		}

	} 
	
	public function setRazonSocial($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->razon_social !== $v || $v === '') {
			$this->razon_social = $v;
			$this->modifiedColumns[] = CuentaPeer::RAZON_SOCIAL;
		}

	} 
	
	public function setCuit($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cuit !== $v || $v === '') {
			$this->cuit = $v;
			$this->modifiedColumns[] = CuentaPeer::CUIT;
		}

	} 
	
	public function setDireccion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->direccion !== $v || $v === '') {
			$this->direccion = $v;
			$this->modifiedColumns[] = CuentaPeer::DIRECCION;
		}

	} 
	
	public function setCiudad($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ciudad !== $v || $v === '') {
			$this->ciudad = $v;
			$this->modifiedColumns[] = CuentaPeer::CIUDAD;
		}

	} 
	
	public function setCodigoPostal($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->codigo_postal !== $v || $v === '') {
			$this->codigo_postal = $v;
			$this->modifiedColumns[] = CuentaPeer::CODIGO_POSTAL;
		}

	} 
	
	public function setTelefono($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono !== $v || $v === '') {
			$this->telefono = $v;
			$this->modifiedColumns[] = CuentaPeer::TELEFONO;
		}

	} 
	
	public function setFkProvinciaId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_provincia_id !== $v || $v === 0) {
			$this->fk_provincia_id = $v;
			$this->modifiedColumns[] = CuentaPeer::FK_PROVINCIA_ID;
		}

		if ($this->aProvincia !== null && $this->aProvincia->getId() !== $v) {
			$this->aProvincia = null;
		}

	} 
	
	public function setFkTipoivaId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_tipoiva_id !== $v || $v === 0) {
			$this->fk_tipoiva_id = $v;
			$this->modifiedColumns[] = CuentaPeer::FK_TIPOIVA_ID;
		}

		if ($this->aTipoiva !== null && $this->aTipoiva->getId() !== $v) {
			$this->aTipoiva = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->razon_social = $rs->getString($startcol + 2);

			$this->cuit = $rs->getString($startcol + 3);

			$this->direccion = $rs->getString($startcol + 4);

			$this->ciudad = $rs->getString($startcol + 5);

			$this->codigo_postal = $rs->getString($startcol + 6);

			$this->telefono = $rs->getString($startcol + 7);

			$this->fk_provincia_id = $rs->getInt($startcol + 8);

			$this->fk_tipoiva_id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cuenta object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CuentaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME);
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


												
			if ($this->aTipoiva !== null) {
				if ($this->aTipoiva->isModified()) {
					$affectedRows += $this->aTipoiva->save($con);
				}
				$this->setTipoiva($this->aTipoiva);
			}

			if ($this->aProvincia !== null) {
				if ($this->aProvincia->isModified()) {
					$affectedRows += $this->aProvincia->save($con);
				}
				$this->setProvincia($this->aProvincia);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CuentaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CuentaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aTipoiva !== null) {
				if (!$this->aTipoiva->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipoiva->getValidationFailures());
				}
			}

			if ($this->aProvincia !== null) {
				if (!$this->aProvincia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProvincia->getValidationFailures());
				}
			}


			if (($retval = CuentaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CuentaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getRazonSocial();
				break;
			case 3:
				return $this->getCuit();
				break;
			case 4:
				return $this->getDireccion();
				break;
			case 5:
				return $this->getCiudad();
				break;
			case 6:
				return $this->getCodigoPostal();
				break;
			case 7:
				return $this->getTelefono();
				break;
			case 8:
				return $this->getFkProvinciaId();
				break;
			case 9:
				return $this->getFkTipoivaId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CuentaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getRazonSocial(),
			$keys[3] => $this->getCuit(),
			$keys[4] => $this->getDireccion(),
			$keys[5] => $this->getCiudad(),
			$keys[6] => $this->getCodigoPostal(),
			$keys[7] => $this->getTelefono(),
			$keys[8] => $this->getFkProvinciaId(),
			$keys[9] => $this->getFkTipoivaId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CuentaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setRazonSocial($value);
				break;
			case 3:
				$this->setCuit($value);
				break;
			case 4:
				$this->setDireccion($value);
				break;
			case 5:
				$this->setCiudad($value);
				break;
			case 6:
				$this->setCodigoPostal($value);
				break;
			case 7:
				$this->setTelefono($value);
				break;
			case 8:
				$this->setFkProvinciaId($value);
				break;
			case 9:
				$this->setFkTipoivaId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CuentaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRazonSocial($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCuit($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDireccion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCiudad($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodigoPostal($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTelefono($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFkProvinciaId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFkTipoivaId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CuentaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CuentaPeer::ID)) $criteria->add(CuentaPeer::ID, $this->id);
		if ($this->isColumnModified(CuentaPeer::NOMBRE)) $criteria->add(CuentaPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(CuentaPeer::RAZON_SOCIAL)) $criteria->add(CuentaPeer::RAZON_SOCIAL, $this->razon_social);
		if ($this->isColumnModified(CuentaPeer::CUIT)) $criteria->add(CuentaPeer::CUIT, $this->cuit);
		if ($this->isColumnModified(CuentaPeer::DIRECCION)) $criteria->add(CuentaPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(CuentaPeer::CIUDAD)) $criteria->add(CuentaPeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(CuentaPeer::CODIGO_POSTAL)) $criteria->add(CuentaPeer::CODIGO_POSTAL, $this->codigo_postal);
		if ($this->isColumnModified(CuentaPeer::TELEFONO)) $criteria->add(CuentaPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(CuentaPeer::FK_PROVINCIA_ID)) $criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->fk_provincia_id);
		if ($this->isColumnModified(CuentaPeer::FK_TIPOIVA_ID)) $criteria->add(CuentaPeer::FK_TIPOIVA_ID, $this->fk_tipoiva_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CuentaPeer::DATABASE_NAME);

		$criteria->add(CuentaPeer::ID, $this->id);

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

		$copyObj->setRazonSocial($this->razon_social);

		$copyObj->setCuit($this->cuit);

		$copyObj->setDireccion($this->direccion);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCodigoPostal($this->codigo_postal);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setFkProvinciaId($this->fk_provincia_id);

		$copyObj->setFkTipoivaId($this->fk_tipoiva_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAlumnos() as $relObj) {
				$copyObj->addAlumno($relObj->copy($deepCopy));
			}

			foreach($this->getResponsables() as $relObj) {
				$copyObj->addResponsable($relObj->copy($deepCopy));
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
			self::$peer = new CuentaPeer();
		}
		return self::$peer;
	}

	
	public function setTipoiva($v)
	{


		if ($v === null) {
			$this->setFkTipoivaId('0');
		} else {
			$this->setFkTipoivaId($v->getId());
		}


		$this->aTipoiva = $v;
	}


	
	public function getTipoiva($con = null)
	{
				include_once 'lib/model/om/BaseTipoivaPeer.php';

		if ($this->aTipoiva === null && ($this->fk_tipoiva_id !== null)) {

			$this->aTipoiva = TipoivaPeer::retrieveByPK($this->fk_tipoiva_id, $con);

			
		}
		return $this->aTipoiva;
	}

	
	public function setProvincia($v)
	{


		if ($v === null) {
			$this->setFkProvinciaId('0');
		} else {
			$this->setFkProvinciaId($v->getId());
		}


		$this->aProvincia = $v;
	}


	
	public function getProvincia($con = null)
	{
				include_once 'lib/model/om/BaseProvinciaPeer.php';

		if ($this->aProvincia === null && ($this->fk_provincia_id !== null)) {

			$this->aProvincia = ProvinciaPeer::retrieveByPK($this->fk_provincia_id, $con);

			
		}
		return $this->aProvincia;
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

				$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

				AlumnoPeer::addSelectColumns($criteria);
				$this->collAlumnos = AlumnoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

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

		$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

		return AlumnoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAlumno(Alumno $l)
	{
		$this->collAlumnos[] = $l;
		$l->setCuenta($this);
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

				$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinTipodocumento($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

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

				$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
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

				$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinProvincia($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinProvincia($criteria, $con);
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

				$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinConceptobaja($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

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

				$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinPais($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

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

				$criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getId());

				ResponsablePeer::addSelectColumns($criteria);
				$this->collResponsables = ResponsablePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getId());

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

		$criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getId());

		return ResponsablePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addResponsable(Responsable $l)
	{
		$this->collResponsables[] = $l;
		$l->setCuenta($this);
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

				$criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getId());

				$this->collResponsables = ResponsablePeer::doSelectJoinProvincia($criteria, $con);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getId());

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

				$criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getId());

				$this->collResponsables = ResponsablePeer::doSelectJoinTipodocumento($criteria, $con);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getId());

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinTipodocumento($criteria, $con);
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

				$criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getId());

				$this->collResponsables = ResponsablePeer::doSelectJoinRolResponsable($criteria, $con);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getId());

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinRolResponsable($criteria, $con);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}

} 