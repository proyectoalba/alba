<?php


abstract class BaseAlumno extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre = '';


	
	protected $apellido = '';


	
	protected $fecha_nacimiento;


	
	protected $direccion = '';


	
	protected $ciudad = '';


	
	protected $codigo_postal = '';


	
	protected $fk_provincia_id = 0;


	
	protected $telefono = '';


	
	protected $lugar_nacimiento = '';


	
	protected $fk_tipodocumento_id = 0;


	
	protected $nro_documento = '';


	
	protected $sexo = '';


	
	protected $email = '';


	
	protected $distancia_escuela = 0;


	
	protected $hermanos_escuela = false;


	
	protected $hijo_maestro_escuela = false;


	
	protected $fk_establecimiento_id = 0;


	
	protected $fk_cuenta_id = 0;


	
	protected $certificado_medico = false;


	
	protected $activo = true;


	
	protected $fk_conceptobaja_id;


	
	protected $fk_pais_id = 0;

	
	protected $aTipodocumento;

	
	protected $aCuenta;

	
	protected $aEstablecimiento;

	
	protected $aProvincia;

	
	protected $aConceptobaja;

	
	protected $aPais;

	
	protected $collRelCalendariovacunacionAlumnos;

	
	protected $lastRelCalendariovacunacionAlumnoCriteria = null;

	
	protected $collLegajopedagogicos;

	
	protected $lastLegajopedagogicoCriteria = null;

	
	protected $collAsistencias;

	
	protected $lastAsistenciaCriteria = null;

	
	protected $collBoletinConceptuals;

	
	protected $lastBoletinConceptualCriteria = null;

	
	protected $collBoletinActividadess;

	
	protected $lastBoletinActividadesCriteria = null;

	
	protected $collExamens;

	
	protected $lastExamenCriteria = null;

	
	protected $collRelAlumnoDivisions;

	
	protected $lastRelAlumnoDivisionCriteria = null;

	
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

	
	public function getLugarNacimiento()
	{

		return $this->lugar_nacimiento;
	}

	
	public function getFkTipodocumentoId()
	{

		return $this->fk_tipodocumento_id;
	}

	
	public function getNroDocumento()
	{

		return $this->nro_documento;
	}

	
	public function getSexo()
	{

		return $this->sexo;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getDistanciaEscuela()
	{

		return $this->distancia_escuela;
	}

	
	public function getHermanosEscuela()
	{

		return $this->hermanos_escuela;
	}

	
	public function getHijoMaestroEscuela()
	{

		return $this->hijo_maestro_escuela;
	}

	
	public function getFkEstablecimientoId()
	{

		return $this->fk_establecimiento_id;
	}

	
	public function getFkCuentaId()
	{

		return $this->fk_cuenta_id;
	}

	
	public function getCertificadoMedico()
	{

		return $this->certificado_medico;
	}

	
	public function getActivo()
	{

		return $this->activo;
	}

	
	public function getFkConceptobajaId()
	{

		return $this->fk_conceptobaja_id;
	}

	
	public function getFkPaisId()
	{

		return $this->fk_pais_id;
	}

	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AlumnoPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

		if ($this->nombre !== $v || $v === '') {
			$this->nombre = $v;
			$this->modifiedColumns[] = AlumnoPeer::NOMBRE;
		}

	} 
	
	public function setApellido($v)
	{

		if ($this->apellido !== $v || $v === '') {
			$this->apellido = $v;
			$this->modifiedColumns[] = AlumnoPeer::APELLIDO;
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
			$this->modifiedColumns[] = AlumnoPeer::FECHA_NACIMIENTO;
		}

	} 
	
	public function setDireccion($v)
	{

		if ($this->direccion !== $v || $v === '') {
			$this->direccion = $v;
			$this->modifiedColumns[] = AlumnoPeer::DIRECCION;
		}

	} 
	
	public function setCiudad($v)
	{

		if ($this->ciudad !== $v || $v === '') {
			$this->ciudad = $v;
			$this->modifiedColumns[] = AlumnoPeer::CIUDAD;
		}

	} 
	
	public function setCodigoPostal($v)
	{

		if ($this->codigo_postal !== $v || $v === '') {
			$this->codigo_postal = $v;
			$this->modifiedColumns[] = AlumnoPeer::CODIGO_POSTAL;
		}

	} 
	
	public function setFkProvinciaId($v)
	{

		if ($this->fk_provincia_id !== $v || $v === 0) {
			$this->fk_provincia_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_PROVINCIA_ID;
		}

		if ($this->aProvincia !== null && $this->aProvincia->getId() !== $v) {
			$this->aProvincia = null;
		}

	} 
	
	public function setTelefono($v)
	{

		if ($this->telefono !== $v || $v === '') {
			$this->telefono = $v;
			$this->modifiedColumns[] = AlumnoPeer::TELEFONO;
		}

	} 
	
	public function setLugarNacimiento($v)
	{

		if ($this->lugar_nacimiento !== $v || $v === '') {
			$this->lugar_nacimiento = $v;
			$this->modifiedColumns[] = AlumnoPeer::LUGAR_NACIMIENTO;
		}

	} 
	
	public function setFkTipodocumentoId($v)
	{

		if ($this->fk_tipodocumento_id !== $v || $v === 0) {
			$this->fk_tipodocumento_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_TIPODOCUMENTO_ID;
		}

		if ($this->aTipodocumento !== null && $this->aTipodocumento->getId() !== $v) {
			$this->aTipodocumento = null;
		}

	} 
	
	public function setNroDocumento($v)
	{

		if ($this->nro_documento !== $v || $v === '') {
			$this->nro_documento = $v;
			$this->modifiedColumns[] = AlumnoPeer::NRO_DOCUMENTO;
		}

	} 
	
	public function setSexo($v)
	{

		if ($this->sexo !== $v || $v === '') {
			$this->sexo = $v;
			$this->modifiedColumns[] = AlumnoPeer::SEXO;
		}

	} 
	
	public function setEmail($v)
	{

		if ($this->email !== $v || $v === '') {
			$this->email = $v;
			$this->modifiedColumns[] = AlumnoPeer::EMAIL;
		}

	} 
	
	public function setDistanciaEscuela($v)
	{

		if ($this->distancia_escuela !== $v || $v === 0) {
			$this->distancia_escuela = $v;
			$this->modifiedColumns[] = AlumnoPeer::DISTANCIA_ESCUELA;
		}

	} 
	
	public function setHermanosEscuela($v)
	{

		if ($this->hermanos_escuela !== $v || $v === false) {
			$this->hermanos_escuela = $v;
			$this->modifiedColumns[] = AlumnoPeer::HERMANOS_ESCUELA;
		}

	} 
	
	public function setHijoMaestroEscuela($v)
	{

		if ($this->hijo_maestro_escuela !== $v || $v === false) {
			$this->hijo_maestro_escuela = $v;
			$this->modifiedColumns[] = AlumnoPeer::HIJO_MAESTRO_ESCUELA;
		}

	} 
	
	public function setFkEstablecimientoId($v)
	{

		if ($this->fk_establecimiento_id !== $v || $v === 0) {
			$this->fk_establecimiento_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
		}

	} 
	
	public function setFkCuentaId($v)
	{

		if ($this->fk_cuenta_id !== $v || $v === 0) {
			$this->fk_cuenta_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_CUENTA_ID;
		}

		if ($this->aCuenta !== null && $this->aCuenta->getId() !== $v) {
			$this->aCuenta = null;
		}

	} 
	
	public function setCertificadoMedico($v)
	{

		if ($this->certificado_medico !== $v || $v === false) {
			$this->certificado_medico = $v;
			$this->modifiedColumns[] = AlumnoPeer::CERTIFICADO_MEDICO;
		}

	} 
	
	public function setActivo($v)
	{

		if ($this->activo !== $v || $v === true) {
			$this->activo = $v;
			$this->modifiedColumns[] = AlumnoPeer::ACTIVO;
		}

	} 
	
	public function setFkConceptobajaId($v)
	{

		if ($this->fk_conceptobaja_id !== $v) {
			$this->fk_conceptobaja_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_CONCEPTOBAJA_ID;
		}

		if ($this->aConceptobaja !== null && $this->aConceptobaja->getId() !== $v) {
			$this->aConceptobaja = null;
		}

	} 
	
	public function setFkPaisId($v)
	{

		if ($this->fk_pais_id !== $v || $v === 0) {
			$this->fk_pais_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_PAIS_ID;
		}

		if ($this->aPais !== null && $this->aPais->getId() !== $v) {
			$this->aPais = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->apellido = $rs->getString($startcol + 2);

			$this->fecha_nacimiento = $rs->getTimestamp($startcol + 3, null);

			$this->direccion = $rs->getString($startcol + 4);

			$this->ciudad = $rs->getString($startcol + 5);

			$this->codigo_postal = $rs->getString($startcol + 6);

			$this->fk_provincia_id = $rs->getInt($startcol + 7);

			$this->telefono = $rs->getString($startcol + 8);

			$this->lugar_nacimiento = $rs->getString($startcol + 9);

			$this->fk_tipodocumento_id = $rs->getInt($startcol + 10);

			$this->nro_documento = $rs->getString($startcol + 11);

			$this->sexo = $rs->getString($startcol + 12);

			$this->email = $rs->getString($startcol + 13);

			$this->distancia_escuela = $rs->getInt($startcol + 14);

			$this->hermanos_escuela = $rs->getBoolean($startcol + 15);

			$this->hijo_maestro_escuela = $rs->getBoolean($startcol + 16);

			$this->fk_establecimiento_id = $rs->getInt($startcol + 17);

			$this->fk_cuenta_id = $rs->getInt($startcol + 18);

			$this->certificado_medico = $rs->getBoolean($startcol + 19);

			$this->activo = $rs->getBoolean($startcol + 20);

			$this->fk_conceptobaja_id = $rs->getInt($startcol + 21);

			$this->fk_pais_id = $rs->getInt($startcol + 22);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 23; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Alumno object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AlumnoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME);
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

			if ($this->aCuenta !== null) {
				if ($this->aCuenta->isModified()) {
					$affectedRows += $this->aCuenta->save($con);
				}
				$this->setCuenta($this->aCuenta);
			}

			if ($this->aEstablecimiento !== null) {
				if ($this->aEstablecimiento->isModified()) {
					$affectedRows += $this->aEstablecimiento->save($con);
				}
				$this->setEstablecimiento($this->aEstablecimiento);
			}

			if ($this->aProvincia !== null) {
				if ($this->aProvincia->isModified()) {
					$affectedRows += $this->aProvincia->save($con);
				}
				$this->setProvincia($this->aProvincia);
			}

			if ($this->aConceptobaja !== null) {
				if ($this->aConceptobaja->isModified()) {
					$affectedRows += $this->aConceptobaja->save($con);
				}
				$this->setConceptobaja($this->aConceptobaja);
			}

			if ($this->aPais !== null) {
				if ($this->aPais->isModified()) {
					$affectedRows += $this->aPais->save($con);
				}
				$this->setPais($this->aPais);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AlumnoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AlumnoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collRelCalendariovacunacionAlumnos !== null) {
				foreach($this->collRelCalendariovacunacionAlumnos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLegajopedagogicos !== null) {
				foreach($this->collLegajopedagogicos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAsistencias !== null) {
				foreach($this->collAsistencias as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collBoletinConceptuals !== null) {
				foreach($this->collBoletinConceptuals as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collBoletinActividadess !== null) {
				foreach($this->collBoletinActividadess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collExamens !== null) {
				foreach($this->collExamens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelAlumnoDivisions !== null) {
				foreach($this->collRelAlumnoDivisions as $referrerFK) {
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

			if ($this->aCuenta !== null) {
				if (!$this->aCuenta->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCuenta->getValidationFailures());
				}
			}

			if ($this->aEstablecimiento !== null) {
				if (!$this->aEstablecimiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstablecimiento->getValidationFailures());
				}
			}

			if ($this->aProvincia !== null) {
				if (!$this->aProvincia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProvincia->getValidationFailures());
				}
			}

			if ($this->aConceptobaja !== null) {
				if (!$this->aConceptobaja->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aConceptobaja->getValidationFailures());
				}
			}

			if ($this->aPais !== null) {
				if (!$this->aPais->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPais->getValidationFailures());
				}
			}


			if (($retval = AlumnoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelCalendariovacunacionAlumnos !== null) {
					foreach($this->collRelCalendariovacunacionAlumnos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLegajopedagogicos !== null) {
					foreach($this->collLegajopedagogicos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAsistencias !== null) {
					foreach($this->collAsistencias as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBoletinConceptuals !== null) {
					foreach($this->collBoletinConceptuals as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBoletinActividadess !== null) {
					foreach($this->collBoletinActividadess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collExamens !== null) {
					foreach($this->collExamens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelAlumnoDivisions !== null) {
					foreach($this->collRelAlumnoDivisions as $referrerFK) {
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
		$pos = AlumnoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFechaNacimiento();
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
				return $this->getFkProvinciaId();
				break;
			case 8:
				return $this->getTelefono();
				break;
			case 9:
				return $this->getLugarNacimiento();
				break;
			case 10:
				return $this->getFkTipodocumentoId();
				break;
			case 11:
				return $this->getNroDocumento();
				break;
			case 12:
				return $this->getSexo();
				break;
			case 13:
				return $this->getEmail();
				break;
			case 14:
				return $this->getDistanciaEscuela();
				break;
			case 15:
				return $this->getHermanosEscuela();
				break;
			case 16:
				return $this->getHijoMaestroEscuela();
				break;
			case 17:
				return $this->getFkEstablecimientoId();
				break;
			case 18:
				return $this->getFkCuentaId();
				break;
			case 19:
				return $this->getCertificadoMedico();
				break;
			case 20:
				return $this->getActivo();
				break;
			case 21:
				return $this->getFkConceptobajaId();
				break;
			case 22:
				return $this->getFkPaisId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AlumnoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getApellido(),
			$keys[3] => $this->getFechaNacimiento(),
			$keys[4] => $this->getDireccion(),
			$keys[5] => $this->getCiudad(),
			$keys[6] => $this->getCodigoPostal(),
			$keys[7] => $this->getFkProvinciaId(),
			$keys[8] => $this->getTelefono(),
			$keys[9] => $this->getLugarNacimiento(),
			$keys[10] => $this->getFkTipodocumentoId(),
			$keys[11] => $this->getNroDocumento(),
			$keys[12] => $this->getSexo(),
			$keys[13] => $this->getEmail(),
			$keys[14] => $this->getDistanciaEscuela(),
			$keys[15] => $this->getHermanosEscuela(),
			$keys[16] => $this->getHijoMaestroEscuela(),
			$keys[17] => $this->getFkEstablecimientoId(),
			$keys[18] => $this->getFkCuentaId(),
			$keys[19] => $this->getCertificadoMedico(),
			$keys[20] => $this->getActivo(),
			$keys[21] => $this->getFkConceptobajaId(),
			$keys[22] => $this->getFkPaisId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlumnoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFechaNacimiento($value);
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
				$this->setFkProvinciaId($value);
				break;
			case 8:
				$this->setTelefono($value);
				break;
			case 9:
				$this->setLugarNacimiento($value);
				break;
			case 10:
				$this->setFkTipodocumentoId($value);
				break;
			case 11:
				$this->setNroDocumento($value);
				break;
			case 12:
				$this->setSexo($value);
				break;
			case 13:
				$this->setEmail($value);
				break;
			case 14:
				$this->setDistanciaEscuela($value);
				break;
			case 15:
				$this->setHermanosEscuela($value);
				break;
			case 16:
				$this->setHijoMaestroEscuela($value);
				break;
			case 17:
				$this->setFkEstablecimientoId($value);
				break;
			case 18:
				$this->setFkCuentaId($value);
				break;
			case 19:
				$this->setCertificadoMedico($value);
				break;
			case 20:
				$this->setActivo($value);
				break;
			case 21:
				$this->setFkConceptobajaId($value);
				break;
			case 22:
				$this->setFkPaisId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AlumnoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApellido($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFechaNacimiento($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDireccion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCiudad($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodigoPostal($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFkProvinciaId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTelefono($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setLugarNacimiento($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFkTipodocumentoId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNroDocumento($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setSexo($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setEmail($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDistanciaEscuela($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setHermanosEscuela($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setHijoMaestroEscuela($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFkEstablecimientoId($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setFkCuentaId($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCertificadoMedico($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setActivo($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFkConceptobajaId($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFkPaisId($arr[$keys[22]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlumnoPeer::ID)) $criteria->add(AlumnoPeer::ID, $this->id);
		if ($this->isColumnModified(AlumnoPeer::NOMBRE)) $criteria->add(AlumnoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(AlumnoPeer::APELLIDO)) $criteria->add(AlumnoPeer::APELLIDO, $this->apellido);
		if ($this->isColumnModified(AlumnoPeer::FECHA_NACIMIENTO)) $criteria->add(AlumnoPeer::FECHA_NACIMIENTO, $this->fecha_nacimiento);
		if ($this->isColumnModified(AlumnoPeer::DIRECCION)) $criteria->add(AlumnoPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(AlumnoPeer::CIUDAD)) $criteria->add(AlumnoPeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(AlumnoPeer::CODIGO_POSTAL)) $criteria->add(AlumnoPeer::CODIGO_POSTAL, $this->codigo_postal);
		if ($this->isColumnModified(AlumnoPeer::FK_PROVINCIA_ID)) $criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->fk_provincia_id);
		if ($this->isColumnModified(AlumnoPeer::TELEFONO)) $criteria->add(AlumnoPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(AlumnoPeer::LUGAR_NACIMIENTO)) $criteria->add(AlumnoPeer::LUGAR_NACIMIENTO, $this->lugar_nacimiento);
		if ($this->isColumnModified(AlumnoPeer::FK_TIPODOCUMENTO_ID)) $criteria->add(AlumnoPeer::FK_TIPODOCUMENTO_ID, $this->fk_tipodocumento_id);
		if ($this->isColumnModified(AlumnoPeer::NRO_DOCUMENTO)) $criteria->add(AlumnoPeer::NRO_DOCUMENTO, $this->nro_documento);
		if ($this->isColumnModified(AlumnoPeer::SEXO)) $criteria->add(AlumnoPeer::SEXO, $this->sexo);
		if ($this->isColumnModified(AlumnoPeer::EMAIL)) $criteria->add(AlumnoPeer::EMAIL, $this->email);
		if ($this->isColumnModified(AlumnoPeer::DISTANCIA_ESCUELA)) $criteria->add(AlumnoPeer::DISTANCIA_ESCUELA, $this->distancia_escuela);
		if ($this->isColumnModified(AlumnoPeer::HERMANOS_ESCUELA)) $criteria->add(AlumnoPeer::HERMANOS_ESCUELA, $this->hermanos_escuela);
		if ($this->isColumnModified(AlumnoPeer::HIJO_MAESTRO_ESCUELA)) $criteria->add(AlumnoPeer::HIJO_MAESTRO_ESCUELA, $this->hijo_maestro_escuela);
		if ($this->isColumnModified(AlumnoPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(AlumnoPeer::FK_CUENTA_ID)) $criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->fk_cuenta_id);
		if ($this->isColumnModified(AlumnoPeer::CERTIFICADO_MEDICO)) $criteria->add(AlumnoPeer::CERTIFICADO_MEDICO, $this->certificado_medico);
		if ($this->isColumnModified(AlumnoPeer::ACTIVO)) $criteria->add(AlumnoPeer::ACTIVO, $this->activo);
		if ($this->isColumnModified(AlumnoPeer::FK_CONCEPTOBAJA_ID)) $criteria->add(AlumnoPeer::FK_CONCEPTOBAJA_ID, $this->fk_conceptobaja_id);
		if ($this->isColumnModified(AlumnoPeer::FK_PAIS_ID)) $criteria->add(AlumnoPeer::FK_PAIS_ID, $this->fk_pais_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);

		$criteria->add(AlumnoPeer::ID, $this->id);

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

		$copyObj->setFechaNacimiento($this->fecha_nacimiento);

		$copyObj->setDireccion($this->direccion);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCodigoPostal($this->codigo_postal);

		$copyObj->setFkProvinciaId($this->fk_provincia_id);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setLugarNacimiento($this->lugar_nacimiento);

		$copyObj->setFkTipodocumentoId($this->fk_tipodocumento_id);

		$copyObj->setNroDocumento($this->nro_documento);

		$copyObj->setSexo($this->sexo);

		$copyObj->setEmail($this->email);

		$copyObj->setDistanciaEscuela($this->distancia_escuela);

		$copyObj->setHermanosEscuela($this->hermanos_escuela);

		$copyObj->setHijoMaestroEscuela($this->hijo_maestro_escuela);

		$copyObj->setFkEstablecimientoId($this->fk_establecimiento_id);

		$copyObj->setFkCuentaId($this->fk_cuenta_id);

		$copyObj->setCertificadoMedico($this->certificado_medico);

		$copyObj->setActivo($this->activo);

		$copyObj->setFkConceptobajaId($this->fk_conceptobaja_id);

		$copyObj->setFkPaisId($this->fk_pais_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getRelCalendariovacunacionAlumnos() as $relObj) {
				$copyObj->addRelCalendariovacunacionAlumno($relObj->copy($deepCopy));
			}

			foreach($this->getLegajopedagogicos() as $relObj) {
				$copyObj->addLegajopedagogico($relObj->copy($deepCopy));
			}

			foreach($this->getAsistencias() as $relObj) {
				$copyObj->addAsistencia($relObj->copy($deepCopy));
			}

			foreach($this->getBoletinConceptuals() as $relObj) {
				$copyObj->addBoletinConceptual($relObj->copy($deepCopy));
			}

			foreach($this->getBoletinActividadess() as $relObj) {
				$copyObj->addBoletinActividades($relObj->copy($deepCopy));
			}

			foreach($this->getExamens() as $relObj) {
				$copyObj->addExamen($relObj->copy($deepCopy));
			}

			foreach($this->getRelAlumnoDivisions() as $relObj) {
				$copyObj->addRelAlumnoDivision($relObj->copy($deepCopy));
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
			self::$peer = new AlumnoPeer();
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

	
	public function setEstablecimiento($v)
	{


		if ($v === null) {
			$this->setFkEstablecimientoId('0');
		} else {
			$this->setFkEstablecimientoId($v->getId());
		}


		$this->aEstablecimiento = $v;
	}


	
	public function getEstablecimiento($con = null)
	{
				include_once 'lib/model/om/BaseEstablecimientoPeer.php';

		if ($this->aEstablecimiento === null && ($this->fk_establecimiento_id !== null)) {

			$this->aEstablecimiento = EstablecimientoPeer::retrieveByPK($this->fk_establecimiento_id, $con);

			
		}
		return $this->aEstablecimiento;
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

	
	public function setConceptobaja($v)
	{


		if ($v === null) {
			$this->setFkConceptobajaId(NULL);
		} else {
			$this->setFkConceptobajaId($v->getId());
		}


		$this->aConceptobaja = $v;
	}


	
	public function getConceptobaja($con = null)
	{
				include_once 'lib/model/om/BaseConceptobajaPeer.php';

		if ($this->aConceptobaja === null && ($this->fk_conceptobaja_id !== null)) {

			$this->aConceptobaja = ConceptobajaPeer::retrieveByPK($this->fk_conceptobaja_id, $con);

			
		}
		return $this->aConceptobaja;
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

	
	public function initRelCalendariovacunacionAlumnos()
	{
		if ($this->collRelCalendariovacunacionAlumnos === null) {
			$this->collRelCalendariovacunacionAlumnos = array();
		}
	}

	
	public function getRelCalendariovacunacionAlumnos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelCalendariovacunacionAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelCalendariovacunacionAlumnos === null) {
			if ($this->isNew()) {
			   $this->collRelCalendariovacunacionAlumnos = array();
			} else {

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->getId());

				RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
				$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->getId());

				RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelCalendariovacunacionAlumnoCriteria) || !$this->lastRelCalendariovacunacionAlumnoCriteria->equals($criteria)) {
					$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelCalendariovacunacionAlumnoCriteria = $criteria;
		return $this->collRelCalendariovacunacionAlumnos;
	}

	
	public function countRelCalendariovacunacionAlumnos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRelCalendariovacunacionAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->getId());

		return RelCalendariovacunacionAlumnoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelCalendariovacunacionAlumno(RelCalendariovacunacionAlumno $l)
	{
		$this->collRelCalendariovacunacionAlumnos[] = $l;
		$l->setAlumno($this);
	}


	
	public function getRelCalendariovacunacionAlumnosJoinCalendariovacunacion($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelCalendariovacunacionAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelCalendariovacunacionAlumnos === null) {
			if ($this->isNew()) {
				$this->collRelCalendariovacunacionAlumnos = array();
			} else {

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->getId());

				$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelectJoinCalendariovacunacion($criteria, $con);
			}
		} else {
									
			$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastRelCalendariovacunacionAlumnoCriteria) || !$this->lastRelCalendariovacunacionAlumnoCriteria->equals($criteria)) {
				$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelectJoinCalendariovacunacion($criteria, $con);
			}
		}
		$this->lastRelCalendariovacunacionAlumnoCriteria = $criteria;

		return $this->collRelCalendariovacunacionAlumnos;
	}

	
	public function initLegajopedagogicos()
	{
		if ($this->collLegajopedagogicos === null) {
			$this->collLegajopedagogicos = array();
		}
	}

	
	public function getLegajopedagogicos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLegajopedagogicoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
			   $this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->getId());

				LegajopedagogicoPeer::addSelectColumns($criteria);
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->getId());

				LegajopedagogicoPeer::addSelectColumns($criteria);
				if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
					$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;
		return $this->collLegajopedagogicos;
	}

	
	public function countLegajopedagogicos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLegajopedagogicoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->getId());

		return LegajopedagogicoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLegajopedagogico(Legajopedagogico $l)
	{
		$this->collLegajopedagogicos[] = $l;
		$l->setAlumno($this);
	}


	
	public function getLegajopedagogicosJoinLegajocategoria($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLegajopedagogicoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->getId());

				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinLegajocategoria($criteria, $con);
			}
		} else {
									
			$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinLegajocategoria($criteria, $con);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}


	
	public function getLegajopedagogicosJoinUsuario($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLegajopedagogicoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->getId());

				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinUsuario($criteria, $con);
			}
		} else {
									
			$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinUsuario($criteria, $con);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}

	
	public function initAsistencias()
	{
		if ($this->collAsistencias === null) {
			$this->collAsistencias = array();
		}
	}

	
	public function getAsistencias($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAsistenciaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAsistencias === null) {
			if ($this->isNew()) {
			   $this->collAsistencias = array();
			} else {

				$criteria->add(AsistenciaPeer::FK_ALUMNO_ID, $this->getId());

				AsistenciaPeer::addSelectColumns($criteria);
				$this->collAsistencias = AsistenciaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AsistenciaPeer::FK_ALUMNO_ID, $this->getId());

				AsistenciaPeer::addSelectColumns($criteria);
				if (!isset($this->lastAsistenciaCriteria) || !$this->lastAsistenciaCriteria->equals($criteria)) {
					$this->collAsistencias = AsistenciaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAsistenciaCriteria = $criteria;
		return $this->collAsistencias;
	}

	
	public function countAsistencias($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAsistenciaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AsistenciaPeer::FK_ALUMNO_ID, $this->getId());

		return AsistenciaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAsistencia(Asistencia $l)
	{
		$this->collAsistencias[] = $l;
		$l->setAlumno($this);
	}


	
	public function getAsistenciasJoinTipoasistencia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAsistenciaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAsistencias === null) {
			if ($this->isNew()) {
				$this->collAsistencias = array();
			} else {

				$criteria->add(AsistenciaPeer::FK_ALUMNO_ID, $this->getId());

				$this->collAsistencias = AsistenciaPeer::doSelectJoinTipoasistencia($criteria, $con);
			}
		} else {
									
			$criteria->add(AsistenciaPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastAsistenciaCriteria) || !$this->lastAsistenciaCriteria->equals($criteria)) {
				$this->collAsistencias = AsistenciaPeer::doSelectJoinTipoasistencia($criteria, $con);
			}
		}
		$this->lastAsistenciaCriteria = $criteria;

		return $this->collAsistencias;
	}

	
	public function initBoletinConceptuals()
	{
		if ($this->collBoletinConceptuals === null) {
			$this->collBoletinConceptuals = array();
		}
	}

	
	public function getBoletinConceptuals($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBoletinConceptualPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinConceptuals === null) {
			if ($this->isNew()) {
			   $this->collBoletinConceptuals = array();
			} else {

				$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->getId());

				BoletinConceptualPeer::addSelectColumns($criteria);
				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->getId());

				BoletinConceptualPeer::addSelectColumns($criteria);
				if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
					$this->collBoletinConceptuals = BoletinConceptualPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBoletinConceptualCriteria = $criteria;
		return $this->collBoletinConceptuals;
	}

	
	public function countBoletinConceptuals($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseBoletinConceptualPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->getId());

		return BoletinConceptualPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBoletinConceptual(BoletinConceptual $l)
	{
		$this->collBoletinConceptuals[] = $l;
		$l->setAlumno($this);
	}


	
	public function getBoletinConceptualsJoinEscalanota($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBoletinConceptualPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinConceptuals === null) {
			if ($this->isNew()) {
				$this->collBoletinConceptuals = array();
			} else {

				$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->getId());

				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinEscalanota($criteria, $con);
			}
		} else {
									
			$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinEscalanota($criteria, $con);
			}
		}
		$this->lastBoletinConceptualCriteria = $criteria;

		return $this->collBoletinConceptuals;
	}


	
	public function getBoletinConceptualsJoinConcepto($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBoletinConceptualPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinConceptuals === null) {
			if ($this->isNew()) {
				$this->collBoletinConceptuals = array();
			} else {

				$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->getId());

				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinConcepto($criteria, $con);
			}
		} else {
									
			$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinConcepto($criteria, $con);
			}
		}
		$this->lastBoletinConceptualCriteria = $criteria;

		return $this->collBoletinConceptuals;
	}


	
	public function getBoletinConceptualsJoinPeriodo($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBoletinConceptualPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinConceptuals === null) {
			if ($this->isNew()) {
				$this->collBoletinConceptuals = array();
			} else {

				$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->getId());

				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinPeriodo($criteria, $con);
			}
		} else {
									
			$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinPeriodo($criteria, $con);
			}
		}
		$this->lastBoletinConceptualCriteria = $criteria;

		return $this->collBoletinConceptuals;
	}

	
	public function initBoletinActividadess()
	{
		if ($this->collBoletinActividadess === null) {
			$this->collBoletinActividadess = array();
		}
	}

	
	public function getBoletinActividadess($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBoletinActividadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
			   $this->collBoletinActividadess = array();
			} else {

				$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->getId());

				BoletinActividadesPeer::addSelectColumns($criteria);
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->getId());

				BoletinActividadesPeer::addSelectColumns($criteria);
				if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
					$this->collBoletinActividadess = BoletinActividadesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;
		return $this->collBoletinActividadess;
	}

	
	public function countBoletinActividadess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseBoletinActividadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->getId());

		return BoletinActividadesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBoletinActividades(BoletinActividades $l)
	{
		$this->collBoletinActividadess[] = $l;
		$l->setAlumno($this);
	}


	
	public function getBoletinActividadessJoinEscalanota($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBoletinActividadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
				$this->collBoletinActividadess = array();
			} else {

				$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->getId());

				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinEscalanota($criteria, $con);
			}
		} else {
									
			$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinEscalanota($criteria, $con);
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;

		return $this->collBoletinActividadess;
	}


	
	public function getBoletinActividadessJoinActividad($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBoletinActividadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
				$this->collBoletinActividadess = array();
			} else {

				$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->getId());

				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinActividad($criteria, $con);
			}
		} else {
									
			$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinActividad($criteria, $con);
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;

		return $this->collBoletinActividadess;
	}


	
	public function getBoletinActividadessJoinPeriodo($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBoletinActividadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
				$this->collBoletinActividadess = array();
			} else {

				$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->getId());

				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinPeriodo($criteria, $con);
			}
		} else {
									
			$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinPeriodo($criteria, $con);
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;

		return $this->collBoletinActividadess;
	}

	
	public function initExamens()
	{
		if ($this->collExamens === null) {
			$this->collExamens = array();
		}
	}

	
	public function getExamens($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExamenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExamens === null) {
			if ($this->isNew()) {
			   $this->collExamens = array();
			} else {

				$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->getId());

				ExamenPeer::addSelectColumns($criteria);
				$this->collExamens = ExamenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->getId());

				ExamenPeer::addSelectColumns($criteria);
				if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
					$this->collExamens = ExamenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastExamenCriteria = $criteria;
		return $this->collExamens;
	}

	
	public function countExamens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseExamenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->getId());

		return ExamenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addExamen(Examen $l)
	{
		$this->collExamens[] = $l;
		$l->setAlumno($this);
	}


	
	public function getExamensJoinEscalanota($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExamenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExamens === null) {
			if ($this->isNew()) {
				$this->collExamens = array();
			} else {

				$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->getId());

				$this->collExamens = ExamenPeer::doSelectJoinEscalanota($criteria, $con);
			}
		} else {
									
			$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinEscalanota($criteria, $con);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
	}


	
	public function getExamensJoinActividad($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExamenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExamens === null) {
			if ($this->isNew()) {
				$this->collExamens = array();
			} else {

				$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->getId());

				$this->collExamens = ExamenPeer::doSelectJoinActividad($criteria, $con);
			}
		} else {
									
			$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinActividad($criteria, $con);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
	}


	
	public function getExamensJoinPeriodo($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExamenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExamens === null) {
			if ($this->isNew()) {
				$this->collExamens = array();
			} else {

				$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->getId());

				$this->collExamens = ExamenPeer::doSelectJoinPeriodo($criteria, $con);
			}
		} else {
									
			$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinPeriodo($criteria, $con);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
	}

	
	public function initRelAlumnoDivisions()
	{
		if ($this->collRelAlumnoDivisions === null) {
			$this->collRelAlumnoDivisions = array();
		}
	}

	
	public function getRelAlumnoDivisions($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelAlumnoDivisionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAlumnoDivisions === null) {
			if ($this->isNew()) {
			   $this->collRelAlumnoDivisions = array();
			} else {

				$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->getId());

				RelAlumnoDivisionPeer::addSelectColumns($criteria);
				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->getId());

				RelAlumnoDivisionPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelAlumnoDivisionCriteria) || !$this->lastRelAlumnoDivisionCriteria->equals($criteria)) {
					$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelAlumnoDivisionCriteria = $criteria;
		return $this->collRelAlumnoDivisions;
	}

	
	public function countRelAlumnoDivisions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRelAlumnoDivisionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->getId());

		return RelAlumnoDivisionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelAlumnoDivision(RelAlumnoDivision $l)
	{
		$this->collRelAlumnoDivisions[] = $l;
		$l->setAlumno($this);
	}


	
	public function getRelAlumnoDivisionsJoinDivision($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelAlumnoDivisionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAlumnoDivisions === null) {
			if ($this->isNew()) {
				$this->collRelAlumnoDivisions = array();
			} else {

				$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->getId());

				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelectJoinDivision($criteria, $con);
			}
		} else {
									
			$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastRelAlumnoDivisionCriteria) || !$this->lastRelAlumnoDivisionCriteria->equals($criteria)) {
				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelectJoinDivision($criteria, $con);
			}
		}
		$this->lastRelAlumnoDivisionCriteria = $criteria;

		return $this->collRelAlumnoDivisions;
	}

} 