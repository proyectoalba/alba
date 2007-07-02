<?php


abstract class BaseOrganizacion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre = '';


	
	protected $descripcion;


	
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

	
	protected $collEstablecimientos;

	
	protected $lastEstablecimientoCriteria = null;

	
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
			$this->modifiedColumns[] = OrganizacionPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v || $v === '') {
			$this->nombre = $v;
			$this->modifiedColumns[] = OrganizacionPeer::NOMBRE;
		}

	} 
	
	public function setDescripcion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = OrganizacionPeer::DESCRIPCION;
		}

	} 
	
	public function setRazonSocial($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->razon_social !== $v || $v === '') {
			$this->razon_social = $v;
			$this->modifiedColumns[] = OrganizacionPeer::RAZON_SOCIAL;
		}

	} 
	
	public function setCuit($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cuit !== $v || $v === '') {
			$this->cuit = $v;
			$this->modifiedColumns[] = OrganizacionPeer::CUIT;
		}

	} 
	
	public function setDireccion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->direccion !== $v || $v === '') {
			$this->direccion = $v;
			$this->modifiedColumns[] = OrganizacionPeer::DIRECCION;
		}

	} 
	
	public function setCiudad($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ciudad !== $v || $v === '') {
			$this->ciudad = $v;
			$this->modifiedColumns[] = OrganizacionPeer::CIUDAD;
		}

	} 
	
	public function setCodigoPostal($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->codigo_postal !== $v || $v === '') {
			$this->codigo_postal = $v;
			$this->modifiedColumns[] = OrganizacionPeer::CODIGO_POSTAL;
		}

	} 
	
	public function setTelefono($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono !== $v || $v === '') {
			$this->telefono = $v;
			$this->modifiedColumns[] = OrganizacionPeer::TELEFONO;
		}

	} 
	
	public function setFkProvinciaId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_provincia_id !== $v || $v === 0) {
			$this->fk_provincia_id = $v;
			$this->modifiedColumns[] = OrganizacionPeer::FK_PROVINCIA_ID;
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
			$this->modifiedColumns[] = OrganizacionPeer::FK_TIPOIVA_ID;
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

			$this->descripcion = $rs->getString($startcol + 2);

			$this->razon_social = $rs->getString($startcol + 3);

			$this->cuit = $rs->getString($startcol + 4);

			$this->direccion = $rs->getString($startcol + 5);

			$this->ciudad = $rs->getString($startcol + 6);

			$this->codigo_postal = $rs->getString($startcol + 7);

			$this->telefono = $rs->getString($startcol + 8);

			$this->fk_provincia_id = $rs->getInt($startcol + 9);

			$this->fk_tipoiva_id = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Organizacion object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OrganizacionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OrganizacionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OrganizacionPeer::DATABASE_NAME);
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
					$pk = OrganizacionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OrganizacionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collEstablecimientos !== null) {
				foreach($this->collEstablecimientos as $referrerFK) {
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


			if (($retval = OrganizacionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEstablecimientos !== null) {
					foreach($this->collEstablecimientos as $referrerFK) {
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
		$pos = OrganizacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getRazonSocial();
				break;
			case 4:
				return $this->getCuit();
				break;
			case 5:
				return $this->getDireccion();
				break;
			case 6:
				return $this->getCiudad();
				break;
			case 7:
				return $this->getCodigoPostal();
				break;
			case 8:
				return $this->getTelefono();
				break;
			case 9:
				return $this->getFkProvinciaId();
				break;
			case 10:
				return $this->getFkTipoivaId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OrganizacionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getRazonSocial(),
			$keys[4] => $this->getCuit(),
			$keys[5] => $this->getDireccion(),
			$keys[6] => $this->getCiudad(),
			$keys[7] => $this->getCodigoPostal(),
			$keys[8] => $this->getTelefono(),
			$keys[9] => $this->getFkProvinciaId(),
			$keys[10] => $this->getFkTipoivaId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OrganizacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setRazonSocial($value);
				break;
			case 4:
				$this->setCuit($value);
				break;
			case 5:
				$this->setDireccion($value);
				break;
			case 6:
				$this->setCiudad($value);
				break;
			case 7:
				$this->setCodigoPostal($value);
				break;
			case 8:
				$this->setTelefono($value);
				break;
			case 9:
				$this->setFkProvinciaId($value);
				break;
			case 10:
				$this->setFkTipoivaId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OrganizacionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRazonSocial($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCuit($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDireccion($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCiudad($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodigoPostal($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTelefono($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFkProvinciaId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFkTipoivaId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OrganizacionPeer::DATABASE_NAME);

		if ($this->isColumnModified(OrganizacionPeer::ID)) $criteria->add(OrganizacionPeer::ID, $this->id);
		if ($this->isColumnModified(OrganizacionPeer::NOMBRE)) $criteria->add(OrganizacionPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(OrganizacionPeer::DESCRIPCION)) $criteria->add(OrganizacionPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(OrganizacionPeer::RAZON_SOCIAL)) $criteria->add(OrganizacionPeer::RAZON_SOCIAL, $this->razon_social);
		if ($this->isColumnModified(OrganizacionPeer::CUIT)) $criteria->add(OrganizacionPeer::CUIT, $this->cuit);
		if ($this->isColumnModified(OrganizacionPeer::DIRECCION)) $criteria->add(OrganizacionPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(OrganizacionPeer::CIUDAD)) $criteria->add(OrganizacionPeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(OrganizacionPeer::CODIGO_POSTAL)) $criteria->add(OrganizacionPeer::CODIGO_POSTAL, $this->codigo_postal);
		if ($this->isColumnModified(OrganizacionPeer::TELEFONO)) $criteria->add(OrganizacionPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(OrganizacionPeer::FK_PROVINCIA_ID)) $criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->fk_provincia_id);
		if ($this->isColumnModified(OrganizacionPeer::FK_TIPOIVA_ID)) $criteria->add(OrganizacionPeer::FK_TIPOIVA_ID, $this->fk_tipoiva_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OrganizacionPeer::DATABASE_NAME);

		$criteria->add(OrganizacionPeer::ID, $this->id);

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

			foreach($this->getEstablecimientos() as $relObj) {
				$copyObj->addEstablecimiento($relObj->copy($deepCopy));
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
			self::$peer = new OrganizacionPeer();
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

	
	public function initEstablecimientos()
	{
		if ($this->collEstablecimientos === null) {
			$this->collEstablecimientos = array();
		}
	}

	
	public function getEstablecimientos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEstablecimientoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
			   $this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->getId());

				EstablecimientoPeer::addSelectColumns($criteria);
				$this->collEstablecimientos = EstablecimientoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->getId());

				EstablecimientoPeer::addSelectColumns($criteria);
				if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
					$this->collEstablecimientos = EstablecimientoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;
		return $this->collEstablecimientos;
	}

	
	public function countEstablecimientos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEstablecimientoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->getId());

		return EstablecimientoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEstablecimiento(Establecimiento $l)
	{
		$this->collEstablecimientos[] = $l;
		$l->setOrganizacion($this);
	}


	
	public function getEstablecimientosJoinNiveltipo($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEstablecimientoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->getId());

				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinNiveltipo($criteria, $con);
			}
		} else {
									
			$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->getId());

			if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinNiveltipo($criteria, $con);
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;

		return $this->collEstablecimientos;
	}


	
	public function getEstablecimientosJoinDistritoescolar($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEstablecimientoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->getId());

				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinDistritoescolar($criteria, $con);
			}
		} else {
									
			$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->getId());

			if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinDistritoescolar($criteria, $con);
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;

		return $this->collEstablecimientos;
	}

} 