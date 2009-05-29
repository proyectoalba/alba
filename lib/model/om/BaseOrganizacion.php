<?php


abstract class BaseOrganizacion extends BaseObject  implements Persistent {


  const PEER = 'OrganizacionPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $descripcion;

	
	protected $razon_social;

	
	protected $cuit;

	
	protected $direccion;

	
	protected $ciudad;

	
	protected $codigo_postal;

	
	protected $telefono;

	
	protected $fk_provincia_id;

	
	protected $fk_tipoiva_id;

	
	protected $aProvincia;

	
	protected $aTipoiva;

	
	protected $collEstablecimientos;

	
	private $lastEstablecimientoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->fk_provincia_id = 0;
		$this->fk_tipoiva_id = 0;
	}

	
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
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OrganizacionPeer::ID;
		}

		return $this;
	} 
	
	public function setNombre($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = OrganizacionPeer::NOMBRE;
		}

		return $this;
	} 
	
	public function setDescripcion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = OrganizacionPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setRazonSocial($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->razon_social !== $v) {
			$this->razon_social = $v;
			$this->modifiedColumns[] = OrganizacionPeer::RAZON_SOCIAL;
		}

		return $this;
	} 
	
	public function setCuit($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cuit !== $v) {
			$this->cuit = $v;
			$this->modifiedColumns[] = OrganizacionPeer::CUIT;
		}

		return $this;
	} 
	
	public function setDireccion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->direccion !== $v) {
			$this->direccion = $v;
			$this->modifiedColumns[] = OrganizacionPeer::DIRECCION;
		}

		return $this;
	} 
	
	public function setCiudad($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->ciudad !== $v) {
			$this->ciudad = $v;
			$this->modifiedColumns[] = OrganizacionPeer::CIUDAD;
		}

		return $this;
	} 
	
	public function setCodigoPostal($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->codigo_postal !== $v) {
			$this->codigo_postal = $v;
			$this->modifiedColumns[] = OrganizacionPeer::CODIGO_POSTAL;
		}

		return $this;
	} 
	
	public function setTelefono($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telefono !== $v) {
			$this->telefono = $v;
			$this->modifiedColumns[] = OrganizacionPeer::TELEFONO;
		}

		return $this;
	} 
	
	public function setFkProvinciaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_provincia_id !== $v || $v === 0) {
			$this->fk_provincia_id = $v;
			$this->modifiedColumns[] = OrganizacionPeer::FK_PROVINCIA_ID;
		}

		if ($this->aProvincia !== null && $this->aProvincia->getId() !== $v) {
			$this->aProvincia = null;
		}

		return $this;
	} 
	
	public function setFkTipoivaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_tipoiva_id !== $v || $v === 0) {
			$this->fk_tipoiva_id = $v;
			$this->modifiedColumns[] = OrganizacionPeer::FK_TIPOIVA_ID;
		}

		if ($this->aTipoiva !== null && $this->aTipoiva->getId() !== $v) {
			$this->aTipoiva = null;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(OrganizacionPeer::FK_PROVINCIA_ID,OrganizacionPeer::FK_TIPOIVA_ID))) {
				return false;
			}

			if ($this->fk_provincia_id !== 0) {
				return false;
			}

			if ($this->fk_tipoiva_id !== 0) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->nombre = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->descripcion = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->razon_social = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->cuit = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->direccion = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->ciudad = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->codigo_postal = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->telefono = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->fk_provincia_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->fk_tipoiva_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Organizacion object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aProvincia !== null && $this->fk_provincia_id !== $this->aProvincia->getId()) {
			$this->aProvincia = null;
		}
		if ($this->aTipoiva !== null && $this->fk_tipoiva_id !== $this->aTipoiva->getId()) {
			$this->aTipoiva = null;
		}
	} 
	
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OrganizacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = OrganizacionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aProvincia = null;
			$this->aTipoiva = null;
			$this->collEstablecimientos = null;
			$this->lastEstablecimientoCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OrganizacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			OrganizacionPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OrganizacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			OrganizacionPeer::addInstanceToPool($this);
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

												
			if ($this->aProvincia !== null) {
				if ($this->aProvincia->isModified() || $this->aProvincia->isNew()) {
					$affectedRows += $this->aProvincia->save($con);
				}
				$this->setProvincia($this->aProvincia);
			}

			if ($this->aTipoiva !== null) {
				if ($this->aTipoiva->isModified() || $this->aTipoiva->isNew()) {
					$affectedRows += $this->aTipoiva->save($con);
				}
				$this->setTipoiva($this->aTipoiva);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = OrganizacionPeer::ID;
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
				foreach ($this->collEstablecimientos as $referrerFK) {
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

			if ($this->aTipoiva !== null) {
				if (!$this->aTipoiva->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipoiva->getValidationFailures());
				}
			}


			if (($retval = OrganizacionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEstablecimientos !== null) {
					foreach ($this->collEstablecimientos as $referrerFK) {
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
		$field = $this->getByPosition($pos);
		return $field;
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

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
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

			foreach ($this->getEstablecimientos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addEstablecimiento($relObj->copy($deepCopy));
				}
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

	
	public function setProvincia(Provincia $v = null)
	{
		if ($v === null) {
			$this->setFkProvinciaId(0);
		} else {
			$this->setFkProvinciaId($v->getId());
		}

		$this->aProvincia = $v;

						if ($v !== null) {
			$v->addOrganizacion($this);
		}

		return $this;
	}


	
	public function getProvincia(PropelPDO $con = null)
	{
		if ($this->aProvincia === null && ($this->fk_provincia_id !== null)) {
			$c = new Criteria(ProvinciaPeer::DATABASE_NAME);
			$c->add(ProvinciaPeer::ID, $this->fk_provincia_id);
			$this->aProvincia = ProvinciaPeer::doSelectOne($c, $con);
			
		}
		return $this->aProvincia;
	}

	
	public function setTipoiva(Tipoiva $v = null)
	{
		if ($v === null) {
			$this->setFkTipoivaId(0);
		} else {
			$this->setFkTipoivaId($v->getId());
		}

		$this->aTipoiva = $v;

						if ($v !== null) {
			$v->addOrganizacion($this);
		}

		return $this;
	}


	
	public function getTipoiva(PropelPDO $con = null)
	{
		if ($this->aTipoiva === null && ($this->fk_tipoiva_id !== null)) {
			$c = new Criteria(TipoivaPeer::DATABASE_NAME);
			$c->add(TipoivaPeer::ID, $this->fk_tipoiva_id);
			$this->aTipoiva = TipoivaPeer::doSelectOne($c, $con);
			
		}
		return $this->aTipoiva;
	}

	
	public function clearEstablecimientos()
	{
		$this->collEstablecimientos = null; 	}

	
	public function initEstablecimientos()
	{
		$this->collEstablecimientos = array();
	}

	
	public function getEstablecimientos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(OrganizacionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
			   $this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->id);

				EstablecimientoPeer::addSelectColumns($criteria);
				$this->collEstablecimientos = EstablecimientoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->id);

				EstablecimientoPeer::addSelectColumns($criteria);
				if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
					$this->collEstablecimientos = EstablecimientoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;
		return $this->collEstablecimientos;
	}

	
	public function countEstablecimientos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(OrganizacionPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->id);

				$count = EstablecimientoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->id);

				if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
					$count = EstablecimientoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collEstablecimientos);
				}
			} else {
				$count = count($this->collEstablecimientos);
			}
		}
		return $count;
	}

	
	public function addEstablecimiento(Establecimiento $l)
	{
		if ($this->collEstablecimientos === null) {
			$this->initEstablecimientos();
		}
		if (!in_array($l, $this->collEstablecimientos, true)) { 			array_push($this->collEstablecimientos, $l);
			$l->setOrganizacion($this);
		}
	}


	
	public function getEstablecimientosJoinDistritoescolar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(OrganizacionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->id);

				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinDistritoescolar($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->id);

			if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinDistritoescolar($criteria, $con, $join_behavior);
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;

		return $this->collEstablecimientos;
	}


	
	public function getEstablecimientosJoinNiveltipo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(OrganizacionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->id);

				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinNiveltipo($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->id);

			if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinNiveltipo($criteria, $con, $join_behavior);
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;

		return $this->collEstablecimientos;
	}


	
	public function getEstablecimientosJoinProvincia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(OrganizacionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->id);

				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinProvincia($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->id);

			if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinProvincia($criteria, $con, $join_behavior);
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;

		return $this->collEstablecimientos;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collEstablecimientos) {
				foreach ((array) $this->collEstablecimientos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collEstablecimientos = null;
			$this->aProvincia = null;
			$this->aTipoiva = null;
	}

} 