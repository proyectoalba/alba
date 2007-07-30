<?php


abstract class BaseResponsable extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $apellido;


	
	protected $direccion;


	
	protected $ciudad;


	
	protected $codigo_postal;


	
	protected $fk_provincia_id = 0;


	
	protected $telefono;


	
	protected $telefono_movil;


	
	protected $nro_documento;


	
	protected $fk_tipodocumento_id = 0;


	
	protected $sexo;


	
	protected $email;


	
	protected $observacion;


	
	protected $autorizacion_retiro = false;


	
	protected $fk_cuenta_id = 0;


	
	protected $fk_rolresponsable_id = 1;

	
	protected $aProvincia;

	
	protected $aTipodocumento;

	
	protected $aCuenta;

	
	protected $aRolResponsable;

	
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

	
	public function getApellido()
	{

		return $this->apellido;
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

	
	public function getTelefono()
	{

		return $this->telefono;
	}

	
	public function getTelefonoMovil()
	{

		return $this->telefono_movil;
	}

	
	public function getNroDocumento()
	{

		return $this->nro_documento;
	}

	
	public function getFkTipodocumentoId()
	{

		return $this->fk_tipodocumento_id;
	}

	
	public function getSexo()
	{

		return $this->sexo;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getObservacion()
	{

		return $this->observacion;
	}

	
	public function getAutorizacionRetiro()
	{

		return $this->autorizacion_retiro;
	}

	
	public function getFkCuentaId()
	{

		return $this->fk_cuenta_id;
	}

	
	public function getFkRolresponsableId()
	{

		return $this->fk_rolresponsable_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ResponsablePeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = ResponsablePeer::NOMBRE;
		}

	} 
	
	public function setApellido($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->apellido !== $v) {
			$this->apellido = $v;
			$this->modifiedColumns[] = ResponsablePeer::APELLIDO;
		}

	} 
	
	public function setDireccion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->direccion !== $v) {
			$this->direccion = $v;
			$this->modifiedColumns[] = ResponsablePeer::DIRECCION;
		}

	} 
	
	public function setCiudad($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ciudad !== $v) {
			$this->ciudad = $v;
			$this->modifiedColumns[] = ResponsablePeer::CIUDAD;
		}

	} 
	
	public function setCodigoPostal($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->codigo_postal !== $v) {
			$this->codigo_postal = $v;
			$this->modifiedColumns[] = ResponsablePeer::CODIGO_POSTAL;
		}

	} 
	
	public function setFkProvinciaId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_provincia_id !== $v || $v === 0) {
			$this->fk_provincia_id = $v;
			$this->modifiedColumns[] = ResponsablePeer::FK_PROVINCIA_ID;
		}

		if ($this->aProvincia !== null && $this->aProvincia->getId() !== $v) {
			$this->aProvincia = null;
		}

	} 
	
	public function setTelefono($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono !== $v) {
			$this->telefono = $v;
			$this->modifiedColumns[] = ResponsablePeer::TELEFONO;
		}

	} 
	
	public function setTelefonoMovil($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono_movil !== $v) {
			$this->telefono_movil = $v;
			$this->modifiedColumns[] = ResponsablePeer::TELEFONO_MOVIL;
		}

	} 
	
	public function setNroDocumento($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nro_documento !== $v) {
			$this->nro_documento = $v;
			$this->modifiedColumns[] = ResponsablePeer::NRO_DOCUMENTO;
		}

	} 
	
	public function setFkTipodocumentoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_tipodocumento_id !== $v || $v === 0) {
			$this->fk_tipodocumento_id = $v;
			$this->modifiedColumns[] = ResponsablePeer::FK_TIPODOCUMENTO_ID;
		}

		if ($this->aTipodocumento !== null && $this->aTipodocumento->getId() !== $v) {
			$this->aTipodocumento = null;
		}

	} 
	
	public function setSexo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sexo !== $v) {
			$this->sexo = $v;
			$this->modifiedColumns[] = ResponsablePeer::SEXO;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ResponsablePeer::EMAIL;
		}

	} 
	
	public function setObservacion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->observacion !== $v) {
			$this->observacion = $v;
			$this->modifiedColumns[] = ResponsablePeer::OBSERVACION;
		}

	} 
	
	public function setAutorizacionRetiro($v)
	{

		if ($this->autorizacion_retiro !== $v || $v === false) {
			$this->autorizacion_retiro = $v;
			$this->modifiedColumns[] = ResponsablePeer::AUTORIZACION_RETIRO;
		}

	} 
	
	public function setFkCuentaId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_cuenta_id !== $v || $v === 0) {
			$this->fk_cuenta_id = $v;
			$this->modifiedColumns[] = ResponsablePeer::FK_CUENTA_ID;
		}

		if ($this->aCuenta !== null && $this->aCuenta->getId() !== $v) {
			$this->aCuenta = null;
		}

	} 
	
	public function setFkRolresponsableId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_rolresponsable_id !== $v || $v === 1) {
			$this->fk_rolresponsable_id = $v;
			$this->modifiedColumns[] = ResponsablePeer::FK_ROLRESPONSABLE_ID;
		}

		if ($this->aRolResponsable !== null && $this->aRolResponsable->getId() !== $v) {
			$this->aRolResponsable = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->apellido = $rs->getString($startcol + 2);

			$this->direccion = $rs->getString($startcol + 3);

			$this->ciudad = $rs->getString($startcol + 4);

			$this->codigo_postal = $rs->getString($startcol + 5);

			$this->fk_provincia_id = $rs->getInt($startcol + 6);

			$this->telefono = $rs->getString($startcol + 7);

			$this->telefono_movil = $rs->getString($startcol + 8);

			$this->nro_documento = $rs->getString($startcol + 9);

			$this->fk_tipodocumento_id = $rs->getInt($startcol + 10);

			$this->sexo = $rs->getString($startcol + 11);

			$this->email = $rs->getString($startcol + 12);

			$this->observacion = $rs->getString($startcol + 13);

			$this->autorizacion_retiro = $rs->getBoolean($startcol + 14);

			$this->fk_cuenta_id = $rs->getInt($startcol + 15);

			$this->fk_rolresponsable_id = $rs->getInt($startcol + 16);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 17; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Responsable object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ResponsablePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME);
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

			if ($this->aTipodocumento !== null) {
				if ($this->aTipodocumento->isModified()) {
					$affectedRows += $this->aTipodocumento->save($con);
				}
				$this->setTipodocumento($this->aTipodocumento);
			}

			if ($this->aCuenta !== null) {
				if ($this->aCuenta->isModified()) {
					$affectedRows += $this->aCuenta->save($con);
				}
				$this->setCuenta($this->aCuenta);
			}

			if ($this->aRolResponsable !== null) {
				if ($this->aRolResponsable->isModified()) {
					$affectedRows += $this->aRolResponsable->save($con);
				}
				$this->setRolResponsable($this->aRolResponsable);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ResponsablePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ResponsablePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aProvincia !== null) {
				if (!$this->aProvincia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProvincia->getValidationFailures());
				}
			}

			if ($this->aTipodocumento !== null) {
				if (!$this->aTipodocumento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipodocumento->getValidationFailures());
				}
			}

			if ($this->aCuenta !== null) {
				if (!$this->aCuenta->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCuenta->getValidationFailures());
				}
			}

			if ($this->aRolResponsable !== null) {
				if (!$this->aRolResponsable->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRolResponsable->getValidationFailures());
				}
			}


			if (($retval = ResponsablePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = ResponsablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getApellido();
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
				return $this->getTelefono();
				break;
			case 8:
				return $this->getTelefonoMovil();
				break;
			case 9:
				return $this->getNroDocumento();
				break;
			case 10:
				return $this->getFkTipodocumentoId();
				break;
			case 11:
				return $this->getSexo();
				break;
			case 12:
				return $this->getEmail();
				break;
			case 13:
				return $this->getObservacion();
				break;
			case 14:
				return $this->getAutorizacionRetiro();
				break;
			case 15:
				return $this->getFkCuentaId();
				break;
			case 16:
				return $this->getFkRolresponsableId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ResponsablePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getApellido(),
			$keys[3] => $this->getDireccion(),
			$keys[4] => $this->getCiudad(),
			$keys[5] => $this->getCodigoPostal(),
			$keys[6] => $this->getFkProvinciaId(),
			$keys[7] => $this->getTelefono(),
			$keys[8] => $this->getTelefonoMovil(),
			$keys[9] => $this->getNroDocumento(),
			$keys[10] => $this->getFkTipodocumentoId(),
			$keys[11] => $this->getSexo(),
			$keys[12] => $this->getEmail(),
			$keys[13] => $this->getObservacion(),
			$keys[14] => $this->getAutorizacionRetiro(),
			$keys[15] => $this->getFkCuentaId(),
			$keys[16] => $this->getFkRolresponsableId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ResponsablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setApellido($value);
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
				$this->setTelefono($value);
				break;
			case 8:
				$this->setTelefonoMovil($value);
				break;
			case 9:
				$this->setNroDocumento($value);
				break;
			case 10:
				$this->setFkTipodocumentoId($value);
				break;
			case 11:
				$this->setSexo($value);
				break;
			case 12:
				$this->setEmail($value);
				break;
			case 13:
				$this->setObservacion($value);
				break;
			case 14:
				$this->setAutorizacionRetiro($value);
				break;
			case 15:
				$this->setFkCuentaId($value);
				break;
			case 16:
				$this->setFkRolresponsableId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ResponsablePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApellido($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDireccion($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCiudad($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodigoPostal($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFkProvinciaId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTelefono($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTelefonoMovil($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNroDocumento($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFkTipodocumentoId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSexo($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setEmail($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setObservacion($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAutorizacionRetiro($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFkCuentaId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFkRolresponsableId($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ResponsablePeer::DATABASE_NAME);

		if ($this->isColumnModified(ResponsablePeer::ID)) $criteria->add(ResponsablePeer::ID, $this->id);
		if ($this->isColumnModified(ResponsablePeer::NOMBRE)) $criteria->add(ResponsablePeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(ResponsablePeer::APELLIDO)) $criteria->add(ResponsablePeer::APELLIDO, $this->apellido);
		if ($this->isColumnModified(ResponsablePeer::DIRECCION)) $criteria->add(ResponsablePeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(ResponsablePeer::CIUDAD)) $criteria->add(ResponsablePeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(ResponsablePeer::CODIGO_POSTAL)) $criteria->add(ResponsablePeer::CODIGO_POSTAL, $this->codigo_postal);
		if ($this->isColumnModified(ResponsablePeer::FK_PROVINCIA_ID)) $criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->fk_provincia_id);
		if ($this->isColumnModified(ResponsablePeer::TELEFONO)) $criteria->add(ResponsablePeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(ResponsablePeer::TELEFONO_MOVIL)) $criteria->add(ResponsablePeer::TELEFONO_MOVIL, $this->telefono_movil);
		if ($this->isColumnModified(ResponsablePeer::NRO_DOCUMENTO)) $criteria->add(ResponsablePeer::NRO_DOCUMENTO, $this->nro_documento);
		if ($this->isColumnModified(ResponsablePeer::FK_TIPODOCUMENTO_ID)) $criteria->add(ResponsablePeer::FK_TIPODOCUMENTO_ID, $this->fk_tipodocumento_id);
		if ($this->isColumnModified(ResponsablePeer::SEXO)) $criteria->add(ResponsablePeer::SEXO, $this->sexo);
		if ($this->isColumnModified(ResponsablePeer::EMAIL)) $criteria->add(ResponsablePeer::EMAIL, $this->email);
		if ($this->isColumnModified(ResponsablePeer::OBSERVACION)) $criteria->add(ResponsablePeer::OBSERVACION, $this->observacion);
		if ($this->isColumnModified(ResponsablePeer::AUTORIZACION_RETIRO)) $criteria->add(ResponsablePeer::AUTORIZACION_RETIRO, $this->autorizacion_retiro);
		if ($this->isColumnModified(ResponsablePeer::FK_CUENTA_ID)) $criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->fk_cuenta_id);
		if ($this->isColumnModified(ResponsablePeer::FK_ROLRESPONSABLE_ID)) $criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->fk_rolresponsable_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ResponsablePeer::DATABASE_NAME);

		$criteria->add(ResponsablePeer::ID, $this->id);

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

		$copyObj->setApellido($this->apellido);

		$copyObj->setDireccion($this->direccion);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCodigoPostal($this->codigo_postal);

		$copyObj->setFkProvinciaId($this->fk_provincia_id);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setTelefonoMovil($this->telefono_movil);

		$copyObj->setNroDocumento($this->nro_documento);

		$copyObj->setFkTipodocumentoId($this->fk_tipodocumento_id);

		$copyObj->setSexo($this->sexo);

		$copyObj->setEmail($this->email);

		$copyObj->setObservacion($this->observacion);

		$copyObj->setAutorizacionRetiro($this->autorizacion_retiro);

		$copyObj->setFkCuentaId($this->fk_cuenta_id);

		$copyObj->setFkRolresponsableId($this->fk_rolresponsable_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

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
			self::$peer = new ResponsablePeer();
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

	
	public function setTipodocumento($v)
	{


		if ($v === null) {
			$this->setFkTipodocumentoId('0');
		} else {
			$this->setFkTipodocumentoId($v->getId());
		}


		$this->aTipodocumento = $v;
	}


	
	public function getTipodocumento($con = null)
	{
				include_once 'lib/model/om/BaseTipodocumentoPeer.php';

		if ($this->aTipodocumento === null && ($this->fk_tipodocumento_id !== null)) {

			$this->aTipodocumento = TipodocumentoPeer::retrieveByPK($this->fk_tipodocumento_id, $con);

			
		}
		return $this->aTipodocumento;
	}

	
	public function setCuenta($v)
	{


		if ($v === null) {
			$this->setFkCuentaId('0');
		} else {
			$this->setFkCuentaId($v->getId());
		}


		$this->aCuenta = $v;
	}


	
	public function getCuenta($con = null)
	{
				include_once 'lib/model/om/BaseCuentaPeer.php';

		if ($this->aCuenta === null && ($this->fk_cuenta_id !== null)) {

			$this->aCuenta = CuentaPeer::retrieveByPK($this->fk_cuenta_id, $con);

			
		}
		return $this->aCuenta;
	}

	
	public function setRolResponsable($v)
	{


		if ($v === null) {
			$this->setFkRolresponsableId('1');
		} else {
			$this->setFkRolresponsableId($v->getId());
		}


		$this->aRolResponsable = $v;
	}


	
	public function getRolResponsable($con = null)
	{
				include_once 'lib/model/om/BaseRolResponsablePeer.php';

		if ($this->aRolResponsable === null && ($this->fk_rolresponsable_id !== null)) {

			$this->aRolResponsable = RolResponsablePeer::retrieveByPK($this->fk_rolresponsable_id, $con);

			
		}
		return $this->aRolResponsable;
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

				$criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->getId());

				RelRolresponsableResponsablePeer::addSelectColumns($criteria);
				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->getId());

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

		$criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->getId());

		return RelRolresponsableResponsablePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelRolresponsableResponsable(RelRolresponsableResponsable $l)
	{
		$this->collRelRolresponsableResponsables[] = $l;
		$l->setResponsable($this);
	}


	
	public function getRelRolresponsableResponsablesJoinRolResponsable($criteria = null, $con = null)
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

				$criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->getId());

				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinRolResponsable($criteria, $con);
			}
		} else {
									
			$criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->getId());

			if (!isset($this->lastRelRolresponsableResponsableCriteria) || !$this->lastRelRolresponsableResponsableCriteria->equals($criteria)) {
				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinRolResponsable($criteria, $con);
			}
		}
		$this->lastRelRolresponsableResponsableCriteria = $criteria;

		return $this->collRelRolresponsableResponsables;
	}


	
	public function getRelRolresponsableResponsablesJoinAlumno($criteria = null, $con = null)
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

				$criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->getId());

				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinAlumno($criteria, $con);
			}
		} else {
									
			$criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->getId());

			if (!isset($this->lastRelRolresponsableResponsableCriteria) || !$this->lastRelRolresponsableResponsableCriteria->equals($criteria)) {
				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinAlumno($criteria, $con);
			}
		}
		$this->lastRelRolresponsableResponsableCriteria = $criteria;

		return $this->collRelRolresponsableResponsables;
	}

} 