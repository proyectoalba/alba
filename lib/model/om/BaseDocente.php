<?php


abstract class BaseDocente extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $apellido;


	
	protected $nombre;


	
	protected $sexo;


	
	protected $fecha_nacimiento;


	
	protected $fk_tipodocumento_id = 0;


	
	protected $nro_documento;


	
	protected $direccion;


	
	protected $ciudad;


	
	protected $codigo_postal;


	
	protected $email;


	
	protected $telefono;


	
	protected $telefono_movil;


	
	protected $titulo;


	
	protected $libreta_sanitaria = false;


	
	protected $psicofisico = false;


	
	protected $activo = true;


	
	protected $fk_provincia_id = 0;

	
	protected $aTipodocumento;

	
	protected $aProvincia;

	
	protected $collRelDivisionActividadDocentes;

	
	protected $lastRelDivisionActividadDocenteCriteria = null;

	
	protected $collRelDocenteEstablecimientos;

	
	protected $lastRelDocenteEstablecimientoCriteria = null;

	
	protected $collDocenteHorarios;

	
	protected $lastDocenteHorarioCriteria = null;

	
	protected $collRelAnioActividadDocentes;

	
	protected $lastRelAnioActividadDocenteCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getApellido()
	{

		return $this->apellido;
	}

	
	public function getNombre()
	{

		return $this->nombre;
	}

	
	public function getSexo()
	{

		return $this->sexo;
	}

	
	public function getFechaNacimiento($format = 'Y-m-d H:i:s')
	{

		if ($this->fecha_nacimiento === null || $this->fecha_nacimiento === '') {
			return null;
		} elseif (!is_int($this->fecha_nacimiento)) {
						$ts = strtotime($this->fecha_nacimiento);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha_nacimiento] as date/time value: " . var_export($this->fecha_nacimiento, true));
			}
		} else {
			$ts = $this->fecha_nacimiento;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFkTipodocumentoId()
	{

		return $this->fk_tipodocumento_id;
	}

	
	public function getNroDocumento()
	{

		return $this->nro_documento;
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

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getTelefono()
	{

		return $this->telefono;
	}

	
	public function getTelefonoMovil()
	{

		return $this->telefono_movil;
	}

	
	public function getTitulo()
	{

		return $this->titulo;
	}

	
	public function getLibretaSanitaria()
	{

		return $this->libreta_sanitaria;
	}

	
	public function getPsicofisico()
	{

		return $this->psicofisico;
	}

	
	public function getActivo()
	{

		return $this->activo;
	}

	
	public function getFkProvinciaId()
	{

		return $this->fk_provincia_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DocentePeer::ID;
		}

	} 
	
	public function setApellido($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->apellido !== $v) {
			$this->apellido = $v;
			$this->modifiedColumns[] = DocentePeer::APELLIDO;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = DocentePeer::NOMBRE;
		}

	} 
	
	public function setSexo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sexo !== $v) {
			$this->sexo = $v;
			$this->modifiedColumns[] = DocentePeer::SEXO;
		}

	} 
	
	public function setFechaNacimiento($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha_nacimiento] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_nacimiento !== $ts) {
			$this->fecha_nacimiento = $ts;
			$this->modifiedColumns[] = DocentePeer::FECHA_NACIMIENTO;
		}

	} 
	
	public function setFkTipodocumentoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_tipodocumento_id !== $v || $v === 0) {
			$this->fk_tipodocumento_id = $v;
			$this->modifiedColumns[] = DocentePeer::FK_TIPODOCUMENTO_ID;
		}

		if ($this->aTipodocumento !== null && $this->aTipodocumento->getId() !== $v) {
			$this->aTipodocumento = null;
		}

	} 
	
	public function setNroDocumento($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nro_documento !== $v) {
			$this->nro_documento = $v;
			$this->modifiedColumns[] = DocentePeer::NRO_DOCUMENTO;
		}

	} 
	
	public function setDireccion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->direccion !== $v) {
			$this->direccion = $v;
			$this->modifiedColumns[] = DocentePeer::DIRECCION;
		}

	} 
	
	public function setCiudad($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ciudad !== $v) {
			$this->ciudad = $v;
			$this->modifiedColumns[] = DocentePeer::CIUDAD;
		}

	} 
	
	public function setCodigoPostal($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->codigo_postal !== $v) {
			$this->codigo_postal = $v;
			$this->modifiedColumns[] = DocentePeer::CODIGO_POSTAL;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = DocentePeer::EMAIL;
		}

	} 
	
	public function setTelefono($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono !== $v) {
			$this->telefono = $v;
			$this->modifiedColumns[] = DocentePeer::TELEFONO;
		}

	} 
	
	public function setTelefonoMovil($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono_movil !== $v) {
			$this->telefono_movil = $v;
			$this->modifiedColumns[] = DocentePeer::TELEFONO_MOVIL;
		}

	} 
	
	public function setTitulo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->titulo !== $v) {
			$this->titulo = $v;
			$this->modifiedColumns[] = DocentePeer::TITULO;
		}

	} 
	
	public function setLibretaSanitaria($v)
	{

		if ($this->libreta_sanitaria !== $v || $v === false) {
			$this->libreta_sanitaria = $v;
			$this->modifiedColumns[] = DocentePeer::LIBRETA_SANITARIA;
		}

	} 
	
	public function setPsicofisico($v)
	{

		if ($this->psicofisico !== $v || $v === false) {
			$this->psicofisico = $v;
			$this->modifiedColumns[] = DocentePeer::PSICOFISICO;
		}

	} 
	
	public function setActivo($v)
	{

		if ($this->activo !== $v || $v === true) {
			$this->activo = $v;
			$this->modifiedColumns[] = DocentePeer::ACTIVO;
		}

	} 
	
	public function setFkProvinciaId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_provincia_id !== $v || $v === 0) {
			$this->fk_provincia_id = $v;
			$this->modifiedColumns[] = DocentePeer::FK_PROVINCIA_ID;
		}

		if ($this->aProvincia !== null && $this->aProvincia->getId() !== $v) {
			$this->aProvincia = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->apellido = $rs->getString($startcol + 1);

			$this->nombre = $rs->getString($startcol + 2);

			$this->sexo = $rs->getString($startcol + 3);

			$this->fecha_nacimiento = $rs->getTimestamp($startcol + 4, null);

			$this->fk_tipodocumento_id = $rs->getInt($startcol + 5);

			$this->nro_documento = $rs->getString($startcol + 6);

			$this->direccion = $rs->getString($startcol + 7);

			$this->ciudad = $rs->getString($startcol + 8);

			$this->codigo_postal = $rs->getString($startcol + 9);

			$this->email = $rs->getString($startcol + 10);

			$this->telefono = $rs->getString($startcol + 11);

			$this->telefono_movil = $rs->getString($startcol + 12);

			$this->titulo = $rs->getString($startcol + 13);

			$this->libreta_sanitaria = $rs->getBoolean($startcol + 14);

			$this->psicofisico = $rs->getBoolean($startcol + 15);

			$this->activo = $rs->getBoolean($startcol + 16);

			$this->fk_provincia_id = $rs->getInt($startcol + 17);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 18; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Docente object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DocentePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME);
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


												
			if ($this->aTipodocumento !== null) {
				if ($this->aTipodocumento->isModified()) {
					$affectedRows += $this->aTipodocumento->save($con);
				}
				$this->setTipodocumento($this->aTipodocumento);
			}

			if ($this->aProvincia !== null) {
				if ($this->aProvincia->isModified()) {
					$affectedRows += $this->aProvincia->save($con);
				}
				$this->setProvincia($this->aProvincia);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DocentePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DocentePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collRelDivisionActividadDocentes !== null) {
				foreach($this->collRelDivisionActividadDocentes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelDocenteEstablecimientos !== null) {
				foreach($this->collRelDocenteEstablecimientos as $referrerFK) {
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

			if ($this->collRelAnioActividadDocentes !== null) {
				foreach($this->collRelAnioActividadDocentes as $referrerFK) {
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


												
			if ($this->aTipodocumento !== null) {
				if (!$this->aTipodocumento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipodocumento->getValidationFailures());
				}
			}

			if ($this->aProvincia !== null) {
				if (!$this->aProvincia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProvincia->getValidationFailures());
				}
			}


			if (($retval = DocentePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelDivisionActividadDocentes !== null) {
					foreach($this->collRelDivisionActividadDocentes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelDocenteEstablecimientos !== null) {
					foreach($this->collRelDocenteEstablecimientos as $referrerFK) {
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

				if ($this->collRelAnioActividadDocentes !== null) {
					foreach($this->collRelAnioActividadDocentes as $referrerFK) {
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
		$pos = DocentePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getApellido();
				break;
			case 2:
				return $this->getNombre();
				break;
			case 3:
				return $this->getSexo();
				break;
			case 4:
				return $this->getFechaNacimiento();
				break;
			case 5:
				return $this->getFkTipodocumentoId();
				break;
			case 6:
				return $this->getNroDocumento();
				break;
			case 7:
				return $this->getDireccion();
				break;
			case 8:
				return $this->getCiudad();
				break;
			case 9:
				return $this->getCodigoPostal();
				break;
			case 10:
				return $this->getEmail();
				break;
			case 11:
				return $this->getTelefono();
				break;
			case 12:
				return $this->getTelefonoMovil();
				break;
			case 13:
				return $this->getTitulo();
				break;
			case 14:
				return $this->getLibretaSanitaria();
				break;
			case 15:
				return $this->getPsicofisico();
				break;
			case 16:
				return $this->getActivo();
				break;
			case 17:
				return $this->getFkProvinciaId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DocentePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getApellido(),
			$keys[2] => $this->getNombre(),
			$keys[3] => $this->getSexo(),
			$keys[4] => $this->getFechaNacimiento(),
			$keys[5] => $this->getFkTipodocumentoId(),
			$keys[6] => $this->getNroDocumento(),
			$keys[7] => $this->getDireccion(),
			$keys[8] => $this->getCiudad(),
			$keys[9] => $this->getCodigoPostal(),
			$keys[10] => $this->getEmail(),
			$keys[11] => $this->getTelefono(),
			$keys[12] => $this->getTelefonoMovil(),
			$keys[13] => $this->getTitulo(),
			$keys[14] => $this->getLibretaSanitaria(),
			$keys[15] => $this->getPsicofisico(),
			$keys[16] => $this->getActivo(),
			$keys[17] => $this->getFkProvinciaId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DocentePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setApellido($value);
				break;
			case 2:
				$this->setNombre($value);
				break;
			case 3:
				$this->setSexo($value);
				break;
			case 4:
				$this->setFechaNacimiento($value);
				break;
			case 5:
				$this->setFkTipodocumentoId($value);
				break;
			case 6:
				$this->setNroDocumento($value);
				break;
			case 7:
				$this->setDireccion($value);
				break;
			case 8:
				$this->setCiudad($value);
				break;
			case 9:
				$this->setCodigoPostal($value);
				break;
			case 10:
				$this->setEmail($value);
				break;
			case 11:
				$this->setTelefono($value);
				break;
			case 12:
				$this->setTelefonoMovil($value);
				break;
			case 13:
				$this->setTitulo($value);
				break;
			case 14:
				$this->setLibretaSanitaria($value);
				break;
			case 15:
				$this->setPsicofisico($value);
				break;
			case 16:
				$this->setActivo($value);
				break;
			case 17:
				$this->setFkProvinciaId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DocentePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setApellido($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSexo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFechaNacimiento($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFkTipodocumentoId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNroDocumento($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDireccion($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCiudad($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodigoPostal($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEmail($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTelefono($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTelefonoMovil($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTitulo($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setLibretaSanitaria($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setPsicofisico($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setActivo($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFkProvinciaId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DocentePeer::DATABASE_NAME);

		if ($this->isColumnModified(DocentePeer::ID)) $criteria->add(DocentePeer::ID, $this->id);
		if ($this->isColumnModified(DocentePeer::APELLIDO)) $criteria->add(DocentePeer::APELLIDO, $this->apellido);
		if ($this->isColumnModified(DocentePeer::NOMBRE)) $criteria->add(DocentePeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(DocentePeer::SEXO)) $criteria->add(DocentePeer::SEXO, $this->sexo);
		if ($this->isColumnModified(DocentePeer::FECHA_NACIMIENTO)) $criteria->add(DocentePeer::FECHA_NACIMIENTO, $this->fecha_nacimiento);
		if ($this->isColumnModified(DocentePeer::FK_TIPODOCUMENTO_ID)) $criteria->add(DocentePeer::FK_TIPODOCUMENTO_ID, $this->fk_tipodocumento_id);
		if ($this->isColumnModified(DocentePeer::NRO_DOCUMENTO)) $criteria->add(DocentePeer::NRO_DOCUMENTO, $this->nro_documento);
		if ($this->isColumnModified(DocentePeer::DIRECCION)) $criteria->add(DocentePeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(DocentePeer::CIUDAD)) $criteria->add(DocentePeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(DocentePeer::CODIGO_POSTAL)) $criteria->add(DocentePeer::CODIGO_POSTAL, $this->codigo_postal);
		if ($this->isColumnModified(DocentePeer::EMAIL)) $criteria->add(DocentePeer::EMAIL, $this->email);
		if ($this->isColumnModified(DocentePeer::TELEFONO)) $criteria->add(DocentePeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(DocentePeer::TELEFONO_MOVIL)) $criteria->add(DocentePeer::TELEFONO_MOVIL, $this->telefono_movil);
		if ($this->isColumnModified(DocentePeer::TITULO)) $criteria->add(DocentePeer::TITULO, $this->titulo);
		if ($this->isColumnModified(DocentePeer::LIBRETA_SANITARIA)) $criteria->add(DocentePeer::LIBRETA_SANITARIA, $this->libreta_sanitaria);
		if ($this->isColumnModified(DocentePeer::PSICOFISICO)) $criteria->add(DocentePeer::PSICOFISICO, $this->psicofisico);
		if ($this->isColumnModified(DocentePeer::ACTIVO)) $criteria->add(DocentePeer::ACTIVO, $this->activo);
		if ($this->isColumnModified(DocentePeer::FK_PROVINCIA_ID)) $criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->fk_provincia_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DocentePeer::DATABASE_NAME);

		$criteria->add(DocentePeer::ID, $this->id);

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

		$copyObj->setApellido($this->apellido);

		$copyObj->setNombre($this->nombre);

		$copyObj->setSexo($this->sexo);

		$copyObj->setFechaNacimiento($this->fecha_nacimiento);

		$copyObj->setFkTipodocumentoId($this->fk_tipodocumento_id);

		$copyObj->setNroDocumento($this->nro_documento);

		$copyObj->setDireccion($this->direccion);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCodigoPostal($this->codigo_postal);

		$copyObj->setEmail($this->email);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setTelefonoMovil($this->telefono_movil);

		$copyObj->setTitulo($this->titulo);

		$copyObj->setLibretaSanitaria($this->libreta_sanitaria);

		$copyObj->setPsicofisico($this->psicofisico);

		$copyObj->setActivo($this->activo);

		$copyObj->setFkProvinciaId($this->fk_provincia_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getRelDivisionActividadDocentes() as $relObj) {
				$copyObj->addRelDivisionActividadDocente($relObj->copy($deepCopy));
			}

			foreach($this->getRelDocenteEstablecimientos() as $relObj) {
				$copyObj->addRelDocenteEstablecimiento($relObj->copy($deepCopy));
			}

			foreach($this->getDocenteHorarios() as $relObj) {
				$copyObj->addDocenteHorario($relObj->copy($deepCopy));
			}

			foreach($this->getRelAnioActividadDocentes() as $relObj) {
				$copyObj->addRelAnioActividadDocente($relObj->copy($deepCopy));
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
			self::$peer = new DocentePeer();
		}
		return self::$peer;
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

				RelDivisionActividadDocentePeer::addSelectColumns($criteria);
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

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

		$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

		return RelDivisionActividadDocentePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelDivisionActividadDocente(RelDivisionActividadDocente $l)
	{
		$this->collRelDivisionActividadDocentes[] = $l;
		$l->setDocente($this);
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDivision($criteria, $con);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDivision($criteria, $con);
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinActividad($criteria, $con);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinActividad($criteria, $con);
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinEvento($criteria, $con);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinEvento($criteria, $con);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}

	
	public function initRelDocenteEstablecimientos()
	{
		if ($this->collRelDocenteEstablecimientos === null) {
			$this->collRelDocenteEstablecimientos = array();
		}
	}

	
	public function getRelDocenteEstablecimientos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelDocenteEstablecimientoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDocenteEstablecimientos === null) {
			if ($this->isNew()) {
			   $this->collRelDocenteEstablecimientos = array();
			} else {

				$criteria->add(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID, $this->getId());

				RelDocenteEstablecimientoPeer::addSelectColumns($criteria);
				$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID, $this->getId());

				RelDocenteEstablecimientoPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelDocenteEstablecimientoCriteria) || !$this->lastRelDocenteEstablecimientoCriteria->equals($criteria)) {
					$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelDocenteEstablecimientoCriteria = $criteria;
		return $this->collRelDocenteEstablecimientos;
	}

	
	public function countRelDocenteEstablecimientos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRelDocenteEstablecimientoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID, $this->getId());

		return RelDocenteEstablecimientoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelDocenteEstablecimiento(RelDocenteEstablecimiento $l)
	{
		$this->collRelDocenteEstablecimientos[] = $l;
		$l->setDocente($this);
	}


	
	public function getRelDocenteEstablecimientosJoinEstablecimiento($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelDocenteEstablecimientoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDocenteEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collRelDocenteEstablecimientos = array();
			} else {

				$criteria->add(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID, $this->getId());

				$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		} else {
									
			$criteria->add(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID, $this->getId());

			if (!isset($this->lastRelDocenteEstablecimientoCriteria) || !$this->lastRelDocenteEstablecimientoCriteria->equals($criteria)) {
				$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		}
		$this->lastRelDocenteEstablecimientoCriteria = $criteria;

		return $this->collRelDocenteEstablecimientos;
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

				$criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->getId());

				DocenteHorarioPeer::addSelectColumns($criteria);
				$this->collDocenteHorarios = DocenteHorarioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->getId());

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

		$criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->getId());

		return DocenteHorarioPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDocenteHorario(DocenteHorario $l)
	{
		$this->collDocenteHorarios[] = $l;
		$l->setDocente($this);
	}


	
	public function getDocenteHorariosJoinEvento($criteria = null, $con = null)
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

				$criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->getId());

				$this->collDocenteHorarios = DocenteHorarioPeer::doSelectJoinEvento($criteria, $con);
			}
		} else {
									
			$criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->getId());

			if (!isset($this->lastDocenteHorarioCriteria) || !$this->lastDocenteHorarioCriteria->equals($criteria)) {
				$this->collDocenteHorarios = DocenteHorarioPeer::doSelectJoinEvento($criteria, $con);
			}
		}
		$this->lastDocenteHorarioCriteria = $criteria;

		return $this->collDocenteHorarios;
	}

	
	public function initRelAnioActividadDocentes()
	{
		if ($this->collRelAnioActividadDocentes === null) {
			$this->collRelAnioActividadDocentes = array();
		}
	}

	
	public function getRelAnioActividadDocentes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelAnioActividadDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividadDocentes === null) {
			if ($this->isNew()) {
			   $this->collRelAnioActividadDocentes = array();
			} else {

				$criteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

				RelAnioActividadDocentePeer::addSelectColumns($criteria);
				$this->collRelAnioActividadDocentes = RelAnioActividadDocentePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

				RelAnioActividadDocentePeer::addSelectColumns($criteria);
				if (!isset($this->lastRelAnioActividadDocenteCriteria) || !$this->lastRelAnioActividadDocenteCriteria->equals($criteria)) {
					$this->collRelAnioActividadDocentes = RelAnioActividadDocentePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelAnioActividadDocenteCriteria = $criteria;
		return $this->collRelAnioActividadDocentes;
	}

	
	public function countRelAnioActividadDocentes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRelAnioActividadDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

		return RelAnioActividadDocentePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelAnioActividadDocente(RelAnioActividadDocente $l)
	{
		$this->collRelAnioActividadDocentes[] = $l;
		$l->setDocente($this);
	}


	
	public function getRelAnioActividadDocentesJoinRelAnioActividad($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelAnioActividadDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelAnioActividadDocentes = array();
			} else {

				$criteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

				$this->collRelAnioActividadDocentes = RelAnioActividadDocentePeer::doSelectJoinRelAnioActividad($criteria, $con);
			}
		} else {
									
			$criteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

			if (!isset($this->lastRelAnioActividadDocenteCriteria) || !$this->lastRelAnioActividadDocenteCriteria->equals($criteria)) {
				$this->collRelAnioActividadDocentes = RelAnioActividadDocentePeer::doSelectJoinRelAnioActividad($criteria, $con);
			}
		}
		$this->lastRelAnioActividadDocenteCriteria = $criteria;

		return $this->collRelAnioActividadDocentes;
	}

} 