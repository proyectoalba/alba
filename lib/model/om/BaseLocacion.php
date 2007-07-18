<?php


abstract class BaseLocacion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre = 'null';


	
	protected $descripcion;


	
	protected $direccion = 'null';


	
	protected $ciudad = 'null';


	
	protected $codigo_postal = 'null';


	
	protected $fk_provincia_id = 0;


	
	protected $fk_tipolocacion_id = 0;


	
	protected $telefono;


	
	protected $fax;


	
	protected $encargado;


	
	protected $encargado_telefono;


	
	protected $principal = false;

	
	protected $aProvincia;

	
	protected $aTipolocacion;

	
	protected $collEspacios;

	
	protected $lastEspacioCriteria = null;

	
	protected $collRelEstablecimientoLocacions;

	
	protected $lastRelEstablecimientoLocacionCriteria = null;

	
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

	
	public function getFkProvinciaId()
	{

		return $this->fk_provincia_id;
	}

	
	public function getFkTipolocacionId()
	{

		return $this->fk_tipolocacion_id;
	}

	
	public function getTelefono()
	{

		return $this->telefono;
	}

	
	public function getFax()
	{

		return $this->fax;
	}

	
	public function getEncargado()
	{

		return $this->encargado;
	}

	
	public function getEncargadoTelefono()
	{

		return $this->encargado_telefono;
	}

	
	public function getPrincipal()
	{

		return $this->principal;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = LocacionPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v || $v === 'null') {
			$this->nombre = $v;
			$this->modifiedColumns[] = LocacionPeer::NOMBRE;
		}

	} 
	
	public function setDescripcion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = LocacionPeer::DESCRIPCION;
		}

	} 
	
	public function setDireccion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->direccion !== $v || $v === 'null') {
			$this->direccion = $v;
			$this->modifiedColumns[] = LocacionPeer::DIRECCION;
		}

	} 
	
	public function setCiudad($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ciudad !== $v || $v === 'null') {
			$this->ciudad = $v;
			$this->modifiedColumns[] = LocacionPeer::CIUDAD;
		}

	} 
	
	public function setCodigoPostal($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->codigo_postal !== $v || $v === 'null') {
			$this->codigo_postal = $v;
			$this->modifiedColumns[] = LocacionPeer::CODIGO_POSTAL;
		}

	} 
	
	public function setFkProvinciaId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_provincia_id !== $v || $v === 0) {
			$this->fk_provincia_id = $v;
			$this->modifiedColumns[] = LocacionPeer::FK_PROVINCIA_ID;
		}

		if ($this->aProvincia !== null && $this->aProvincia->getId() !== $v) {
			$this->aProvincia = null;
		}

	} 
	
	public function setFkTipolocacionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_tipolocacion_id !== $v || $v === 0) {
			$this->fk_tipolocacion_id = $v;
			$this->modifiedColumns[] = LocacionPeer::FK_TIPOLOCACION_ID;
		}

		if ($this->aTipolocacion !== null && $this->aTipolocacion->getId() !== $v) {
			$this->aTipolocacion = null;
		}

	} 
	
	public function setTelefono($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono !== $v) {
			$this->telefono = $v;
			$this->modifiedColumns[] = LocacionPeer::TELEFONO;
		}

	} 
	
	public function setFax($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->fax !== $v) {
			$this->fax = $v;
			$this->modifiedColumns[] = LocacionPeer::FAX;
		}

	} 
	
	public function setEncargado($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->encargado !== $v) {
			$this->encargado = $v;
			$this->modifiedColumns[] = LocacionPeer::ENCARGADO;
		}

	} 
	
	public function setEncargadoTelefono($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->encargado_telefono !== $v) {
			$this->encargado_telefono = $v;
			$this->modifiedColumns[] = LocacionPeer::ENCARGADO_TELEFONO;
		}

	} 
	
	public function setPrincipal($v)
	{

		if ($this->principal !== $v || $v === false) {
			$this->principal = $v;
			$this->modifiedColumns[] = LocacionPeer::PRINCIPAL;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->descripcion = $rs->getString($startcol + 2);

			$this->direccion = $rs->getString($startcol + 3);

			$this->ciudad = $rs->getString($startcol + 4);

			$this->codigo_postal = $rs->getString($startcol + 5);

			$this->fk_provincia_id = $rs->getInt($startcol + 6);

			$this->fk_tipolocacion_id = $rs->getInt($startcol + 7);

			$this->telefono = $rs->getString($startcol + 8);

			$this->fax = $rs->getString($startcol + 9);

			$this->encargado = $rs->getString($startcol + 10);

			$this->encargado_telefono = $rs->getString($startcol + 11);

			$this->principal = $rs->getBoolean($startcol + 12);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Locacion object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LocacionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME);
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


												
			if ($this->aProvincia !== null) {
				if ($this->aProvincia->isModified()) {
					$affectedRows += $this->aProvincia->save($con);
				}
				$this->setProvincia($this->aProvincia);
			}

			if ($this->aTipolocacion !== null) {
				if ($this->aTipolocacion->isModified()) {
					$affectedRows += $this->aTipolocacion->save($con);
				}
				$this->setTipolocacion($this->aTipolocacion);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LocacionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LocacionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collEspacios !== null) {
				foreach($this->collEspacios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelEstablecimientoLocacions !== null) {
				foreach($this->collRelEstablecimientoLocacions as $referrerFK) {
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


												
			if ($this->aProvincia !== null) {
				if (!$this->aProvincia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProvincia->getValidationFailures());
				}
			}

			if ($this->aTipolocacion !== null) {
				if (!$this->aTipolocacion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipolocacion->getValidationFailures());
				}
			}


			if (($retval = LocacionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEspacios !== null) {
					foreach($this->collEspacios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelEstablecimientoLocacions !== null) {
					foreach($this->collRelEstablecimientoLocacions as $referrerFK) {
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
		$pos = LocacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDireccion();
				break;
			case 4:
				return $this->getCiudad();
				break;
			case 5:
				return $this->getCodigoPostal();
				break;
			case 6:
				return $this->getFkProvinciaId();
				break;
			case 7:
				return $this->getFkTipolocacionId();
				break;
			case 8:
				return $this->getTelefono();
				break;
			case 9:
				return $this->getFax();
				break;
			case 10:
				return $this->getEncargado();
				break;
			case 11:
				return $this->getEncargadoTelefono();
				break;
			case 12:
				return $this->getPrincipal();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LocacionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getDireccion(),
			$keys[4] => $this->getCiudad(),
			$keys[5] => $this->getCodigoPostal(),
			$keys[6] => $this->getFkProvinciaId(),
			$keys[7] => $this->getFkTipolocacionId(),
			$keys[8] => $this->getTelefono(),
			$keys[9] => $this->getFax(),
			$keys[10] => $this->getEncargado(),
			$keys[11] => $this->getEncargadoTelefono(),
			$keys[12] => $this->getPrincipal(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LocacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDireccion($value);
				break;
			case 4:
				$this->setCiudad($value);
				break;
			case 5:
				$this->setCodigoPostal($value);
				break;
			case 6:
				$this->setFkProvinciaId($value);
				break;
			case 7:
				$this->setFkTipolocacionId($value);
				break;
			case 8:
				$this->setTelefono($value);
				break;
			case 9:
				$this->setFax($value);
				break;
			case 10:
				$this->setEncargado($value);
				break;
			case 11:
				$this->setEncargadoTelefono($value);
				break;
			case 12:
				$this->setPrincipal($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LocacionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDireccion($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCiudad($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodigoPostal($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFkProvinciaId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFkTipolocacionId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTelefono($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFax($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEncargado($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setEncargadoTelefono($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPrincipal($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LocacionPeer::DATABASE_NAME);

		if ($this->isColumnModified(LocacionPeer::ID)) $criteria->add(LocacionPeer::ID, $this->id);
		if ($this->isColumnModified(LocacionPeer::NOMBRE)) $criteria->add(LocacionPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(LocacionPeer::DESCRIPCION)) $criteria->add(LocacionPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(LocacionPeer::DIRECCION)) $criteria->add(LocacionPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(LocacionPeer::CIUDAD)) $criteria->add(LocacionPeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(LocacionPeer::CODIGO_POSTAL)) $criteria->add(LocacionPeer::CODIGO_POSTAL, $this->codigo_postal);
		if ($this->isColumnModified(LocacionPeer::FK_PROVINCIA_ID)) $criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->fk_provincia_id);
		if ($this->isColumnModified(LocacionPeer::FK_TIPOLOCACION_ID)) $criteria->add(LocacionPeer::FK_TIPOLOCACION_ID, $this->fk_tipolocacion_id);
		if ($this->isColumnModified(LocacionPeer::TELEFONO)) $criteria->add(LocacionPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(LocacionPeer::FAX)) $criteria->add(LocacionPeer::FAX, $this->fax);
		if ($this->isColumnModified(LocacionPeer::ENCARGADO)) $criteria->add(LocacionPeer::ENCARGADO, $this->encargado);
		if ($this->isColumnModified(LocacionPeer::ENCARGADO_TELEFONO)) $criteria->add(LocacionPeer::ENCARGADO_TELEFONO, $this->encargado_telefono);
		if ($this->isColumnModified(LocacionPeer::PRINCIPAL)) $criteria->add(LocacionPeer::PRINCIPAL, $this->principal);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LocacionPeer::DATABASE_NAME);

		$criteria->add(LocacionPeer::ID, $this->id);

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

		$copyObj->setDireccion($this->direccion);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCodigoPostal($this->codigo_postal);

		$copyObj->setFkProvinciaId($this->fk_provincia_id);

		$copyObj->setFkTipolocacionId($this->fk_tipolocacion_id);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setFax($this->fax);

		$copyObj->setEncargado($this->encargado);

		$copyObj->setEncargadoTelefono($this->encargado_telefono);

		$copyObj->setPrincipal($this->principal);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getEspacios() as $relObj) {
				$copyObj->addEspacio($relObj->copy($deepCopy));
			}

			foreach($this->getRelEstablecimientoLocacions() as $relObj) {
				$copyObj->addRelEstablecimientoLocacion($relObj->copy($deepCopy));
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
			self::$peer = new LocacionPeer();
		}
		return self::$peer;
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

	
	public function setTipolocacion($v)
	{


		if ($v === null) {
			$this->setFkTipolocacionId('0');
		} else {
			$this->setFkTipolocacionId($v->getId());
		}


		$this->aTipolocacion = $v;
	}


	
	public function getTipolocacion($con = null)
	{
				include_once 'lib/model/om/BaseTipolocacionPeer.php';

		if ($this->aTipolocacion === null && ($this->fk_tipolocacion_id !== null)) {

			$this->aTipolocacion = TipolocacionPeer::retrieveByPK($this->fk_tipolocacion_id, $con);

			
		}
		return $this->aTipolocacion;
	}

	
	public function initEspacios()
	{
		if ($this->collEspacios === null) {
			$this->collEspacios = array();
		}
	}

	
	public function getEspacios($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEspacioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEspacios === null) {
			if ($this->isNew()) {
			   $this->collEspacios = array();
			} else {

				$criteria->add(EspacioPeer::FK_LOCACION_ID, $this->getId());

				EspacioPeer::addSelectColumns($criteria);
				$this->collEspacios = EspacioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EspacioPeer::FK_LOCACION_ID, $this->getId());

				EspacioPeer::addSelectColumns($criteria);
				if (!isset($this->lastEspacioCriteria) || !$this->lastEspacioCriteria->equals($criteria)) {
					$this->collEspacios = EspacioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEspacioCriteria = $criteria;
		return $this->collEspacios;
	}

	
	public function countEspacios($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEspacioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EspacioPeer::FK_LOCACION_ID, $this->getId());

		return EspacioPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEspacio(Espacio $l)
	{
		$this->collEspacios[] = $l;
		$l->setLocacion($this);
	}


	
	public function getEspaciosJoinTipoespacio($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEspacioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEspacios === null) {
			if ($this->isNew()) {
				$this->collEspacios = array();
			} else {

				$criteria->add(EspacioPeer::FK_LOCACION_ID, $this->getId());

				$this->collEspacios = EspacioPeer::doSelectJoinTipoespacio($criteria, $con);
			}
		} else {
									
			$criteria->add(EspacioPeer::FK_LOCACION_ID, $this->getId());

			if (!isset($this->lastEspacioCriteria) || !$this->lastEspacioCriteria->equals($criteria)) {
				$this->collEspacios = EspacioPeer::doSelectJoinTipoespacio($criteria, $con);
			}
		}
		$this->lastEspacioCriteria = $criteria;

		return $this->collEspacios;
	}

	
	public function initRelEstablecimientoLocacions()
	{
		if ($this->collRelEstablecimientoLocacions === null) {
			$this->collRelEstablecimientoLocacions = array();
		}
	}

	
	public function getRelEstablecimientoLocacions($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelEstablecimientoLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelEstablecimientoLocacions === null) {
			if ($this->isNew()) {
			   $this->collRelEstablecimientoLocacions = array();
			} else {

				$criteria->add(RelEstablecimientoLocacionPeer::FK_LOCACION_ID, $this->getId());

				RelEstablecimientoLocacionPeer::addSelectColumns($criteria);
				$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelEstablecimientoLocacionPeer::FK_LOCACION_ID, $this->getId());

				RelEstablecimientoLocacionPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelEstablecimientoLocacionCriteria) || !$this->lastRelEstablecimientoLocacionCriteria->equals($criteria)) {
					$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelEstablecimientoLocacionCriteria = $criteria;
		return $this->collRelEstablecimientoLocacions;
	}

	
	public function countRelEstablecimientoLocacions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRelEstablecimientoLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelEstablecimientoLocacionPeer::FK_LOCACION_ID, $this->getId());

		return RelEstablecimientoLocacionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelEstablecimientoLocacion(RelEstablecimientoLocacion $l)
	{
		$this->collRelEstablecimientoLocacions[] = $l;
		$l->setLocacion($this);
	}


	
	public function getRelEstablecimientoLocacionsJoinEstablecimiento($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelEstablecimientoLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelEstablecimientoLocacions === null) {
			if ($this->isNew()) {
				$this->collRelEstablecimientoLocacions = array();
			} else {

				$criteria->add(RelEstablecimientoLocacionPeer::FK_LOCACION_ID, $this->getId());

				$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		} else {
									
			$criteria->add(RelEstablecimientoLocacionPeer::FK_LOCACION_ID, $this->getId());

			if (!isset($this->lastRelEstablecimientoLocacionCriteria) || !$this->lastRelEstablecimientoLocacionCriteria->equals($criteria)) {
				$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		}
		$this->lastRelEstablecimientoLocacionCriteria = $criteria;

		return $this->collRelEstablecimientoLocacions;
	}

} 