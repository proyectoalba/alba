<?php


abstract class BaseResponsable extends BaseObject  implements Persistent {


  const PEER = 'ResponsablePeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $apellido;

	
	protected $apellido_materno;

	
	protected $direccion;

	
	protected $direccion_laboral;

	
	protected $ciudad;

	
	protected $codigo_postal;

	
	protected $fk_provincia_id;

	
	protected $telefono;

	
	protected $telefono_laboral;

	
	protected $telefono_movil;

	
	protected $nro_documento;

	
	protected $fk_tipodocumento_id;

	
	protected $sexo;

	
	protected $email;

	
	protected $observacion;

	
	protected $autorizacion_retiro;

	
	protected $llamar_emergencia;

	
	protected $fk_cuenta_id;

	
	protected $fk_rolresponsable_id;

	
	protected $ocupacion;

	
	protected $fecha_nacimiento;

	
	protected $fk_nivel_instruccion_id;

	
	protected $aProvincia;

	
	protected $aTipodocumento;

	
	protected $aCuenta;

	
	protected $aRolResponsable;

	
	protected $aNivelInstruccion;

	
	protected $collRelRolresponsableResponsables;

	
	private $lastRelRolresponsableResponsableCriteria = null;

	
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
		$this->fk_tipodocumento_id = 0;
		$this->autorizacion_retiro = false;
		$this->llamar_emergencia = false;
		$this->fk_cuenta_id = 0;
		$this->fk_rolresponsable_id = 1;
	}

	
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

	
	public function getApellidoMaterno()
	{
		return $this->apellido_materno;
	}

	
	public function getDireccion()
	{
		return $this->direccion;
	}

	
	public function getDireccionLaboral()
	{
		return $this->direccion_laboral;
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

	
	public function getTelefonoLaboral()
	{
		return $this->telefono_laboral;
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

	
	public function getLlamarEmergencia()
	{
		return $this->llamar_emergencia;
	}

	
	public function getFkCuentaId()
	{
		return $this->fk_cuenta_id;
	}

	
	public function getFkRolresponsableId()
	{
		return $this->fk_rolresponsable_id;
	}

	
	public function getOcupacion()
	{
		return $this->ocupacion;
	}

	
	public function getFechaNacimiento($format = 'Y-m-d H:i:s')
	{
		if ($this->fecha_nacimiento === null) {
			return null;
		}


		if ($this->fecha_nacimiento === '0000-00-00 00:00:00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->fecha_nacimiento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_nacimiento, true), $x);
			}
		}

		if ($format === null) {
						return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	
	public function getFkNivelInstruccionId()
	{
		return $this->fk_nivel_instruccion_id;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ResponsablePeer::ID;
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
			$this->modifiedColumns[] = ResponsablePeer::NOMBRE;
		}

		return $this;
	} 
	
	public function setApellido($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->apellido !== $v) {
			$this->apellido = $v;
			$this->modifiedColumns[] = ResponsablePeer::APELLIDO;
		}

		return $this;
	} 
	
	public function setApellidoMaterno($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->apellido_materno !== $v) {
			$this->apellido_materno = $v;
			$this->modifiedColumns[] = ResponsablePeer::APELLIDO_MATERNO;
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
			$this->modifiedColumns[] = ResponsablePeer::DIRECCION;
		}

		return $this;
	} 
	
	public function setDireccionLaboral($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->direccion_laboral !== $v) {
			$this->direccion_laboral = $v;
			$this->modifiedColumns[] = ResponsablePeer::DIRECCION_LABORAL;
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
			$this->modifiedColumns[] = ResponsablePeer::CIUDAD;
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
			$this->modifiedColumns[] = ResponsablePeer::CODIGO_POSTAL;
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
			$this->modifiedColumns[] = ResponsablePeer::FK_PROVINCIA_ID;
		}

		if ($this->aProvincia !== null && $this->aProvincia->getId() !== $v) {
			$this->aProvincia = null;
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
			$this->modifiedColumns[] = ResponsablePeer::TELEFONO;
		}

		return $this;
	} 
	
	public function setTelefonoLaboral($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telefono_laboral !== $v) {
			$this->telefono_laboral = $v;
			$this->modifiedColumns[] = ResponsablePeer::TELEFONO_LABORAL;
		}

		return $this;
	} 
	
	public function setTelefonoMovil($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telefono_movil !== $v) {
			$this->telefono_movil = $v;
			$this->modifiedColumns[] = ResponsablePeer::TELEFONO_MOVIL;
		}

		return $this;
	} 
	
	public function setNroDocumento($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nro_documento !== $v) {
			$this->nro_documento = $v;
			$this->modifiedColumns[] = ResponsablePeer::NRO_DOCUMENTO;
		}

		return $this;
	} 
	
	public function setFkTipodocumentoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_tipodocumento_id !== $v || $v === 0) {
			$this->fk_tipodocumento_id = $v;
			$this->modifiedColumns[] = ResponsablePeer::FK_TIPODOCUMENTO_ID;
		}

		if ($this->aTipodocumento !== null && $this->aTipodocumento->getId() !== $v) {
			$this->aTipodocumento = null;
		}

		return $this;
	} 
	
	public function setSexo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sexo !== $v) {
			$this->sexo = $v;
			$this->modifiedColumns[] = ResponsablePeer::SEXO;
		}

		return $this;
	} 
	
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ResponsablePeer::EMAIL;
		}

		return $this;
	} 
	
	public function setObservacion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->observacion !== $v) {
			$this->observacion = $v;
			$this->modifiedColumns[] = ResponsablePeer::OBSERVACION;
		}

		return $this;
	} 
	
	public function setAutorizacionRetiro($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->autorizacion_retiro !== $v || $v === false) {
			$this->autorizacion_retiro = $v;
			$this->modifiedColumns[] = ResponsablePeer::AUTORIZACION_RETIRO;
		}

		return $this;
	} 
	
	public function setLlamarEmergencia($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->llamar_emergencia !== $v || $v === false) {
			$this->llamar_emergencia = $v;
			$this->modifiedColumns[] = ResponsablePeer::LLAMAR_EMERGENCIA;
		}

		return $this;
	} 
	
	public function setFkCuentaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_cuenta_id !== $v || $v === 0) {
			$this->fk_cuenta_id = $v;
			$this->modifiedColumns[] = ResponsablePeer::FK_CUENTA_ID;
		}

		if ($this->aCuenta !== null && $this->aCuenta->getId() !== $v) {
			$this->aCuenta = null;
		}

		return $this;
	} 
	
	public function setFkRolresponsableId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_rolresponsable_id !== $v || $v === 1) {
			$this->fk_rolresponsable_id = $v;
			$this->modifiedColumns[] = ResponsablePeer::FK_ROLRESPONSABLE_ID;
		}

		if ($this->aRolResponsable !== null && $this->aRolResponsable->getId() !== $v) {
			$this->aRolResponsable = null;
		}

		return $this;
	} 
	
	public function setOcupacion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->ocupacion !== $v) {
			$this->ocupacion = $v;
			$this->modifiedColumns[] = ResponsablePeer::OCUPACION;
		}

		return $this;
	} 
	
	public function setFechaNacimiento($v)
	{
						if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
									try {
				if (is_numeric($v)) { 					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
															$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->fecha_nacimiento !== null || $dt !== null ) {
			
			$currNorm = ($this->fecha_nacimiento !== null && $tmpDt = new DateTime($this->fecha_nacimiento)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->fecha_nacimiento = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ResponsablePeer::FECHA_NACIMIENTO;
			}
		} 
		return $this;
	} 
	
	public function setFkNivelInstruccionId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_nivel_instruccion_id !== $v) {
			$this->fk_nivel_instruccion_id = $v;
			$this->modifiedColumns[] = ResponsablePeer::FK_NIVEL_INSTRUCCION_ID;
		}

		if ($this->aNivelInstruccion !== null && $this->aNivelInstruccion->getId() !== $v) {
			$this->aNivelInstruccion = null;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(ResponsablePeer::FK_PROVINCIA_ID,ResponsablePeer::FK_TIPODOCUMENTO_ID,ResponsablePeer::AUTORIZACION_RETIRO,ResponsablePeer::LLAMAR_EMERGENCIA,ResponsablePeer::FK_CUENTA_ID,ResponsablePeer::FK_ROLRESPONSABLE_ID))) {
				return false;
			}

			if ($this->fk_provincia_id !== 0) {
				return false;
			}

			if ($this->fk_tipodocumento_id !== 0) {
				return false;
			}

			if ($this->autorizacion_retiro !== false) {
				return false;
			}

			if ($this->llamar_emergencia !== false) {
				return false;
			}

			if ($this->fk_cuenta_id !== 0) {
				return false;
			}

			if ($this->fk_rolresponsable_id !== 1) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->nombre = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->apellido = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->apellido_materno = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->direccion = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->direccion_laboral = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->ciudad = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->codigo_postal = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->fk_provincia_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->telefono = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->telefono_laboral = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->telefono_movil = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->nro_documento = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->fk_tipodocumento_id = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->sexo = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->email = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->observacion = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->autorizacion_retiro = ($row[$startcol + 17] !== null) ? (boolean) $row[$startcol + 17] : null;
			$this->llamar_emergencia = ($row[$startcol + 18] !== null) ? (boolean) $row[$startcol + 18] : null;
			$this->fk_cuenta_id = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
			$this->fk_rolresponsable_id = ($row[$startcol + 20] !== null) ? (int) $row[$startcol + 20] : null;
			$this->ocupacion = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
			$this->fecha_nacimiento = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
			$this->fk_nivel_instruccion_id = ($row[$startcol + 23] !== null) ? (int) $row[$startcol + 23] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 24; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Responsable object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aProvincia !== null && $this->fk_provincia_id !== $this->aProvincia->getId()) {
			$this->aProvincia = null;
		}
		if ($this->aTipodocumento !== null && $this->fk_tipodocumento_id !== $this->aTipodocumento->getId()) {
			$this->aTipodocumento = null;
		}
		if ($this->aCuenta !== null && $this->fk_cuenta_id !== $this->aCuenta->getId()) {
			$this->aCuenta = null;
		}
		if ($this->aRolResponsable !== null && $this->fk_rolresponsable_id !== $this->aRolResponsable->getId()) {
			$this->aRolResponsable = null;
		}
		if ($this->aNivelInstruccion !== null && $this->fk_nivel_instruccion_id !== $this->aNivelInstruccion->getId()) {
			$this->aNivelInstruccion = null;
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
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = ResponsablePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aProvincia = null;
			$this->aTipodocumento = null;
			$this->aCuenta = null;
			$this->aRolResponsable = null;
			$this->aNivelInstruccion = null;
			$this->collRelRolresponsableResponsables = null;
			$this->lastRelRolresponsableResponsableCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			ResponsablePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			ResponsablePeer::addInstanceToPool($this);
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

			if ($this->aTipodocumento !== null) {
				if ($this->aTipodocumento->isModified() || $this->aTipodocumento->isNew()) {
					$affectedRows += $this->aTipodocumento->save($con);
				}
				$this->setTipodocumento($this->aTipodocumento);
			}

			if ($this->aCuenta !== null) {
				if ($this->aCuenta->isModified() || $this->aCuenta->isNew()) {
					$affectedRows += $this->aCuenta->save($con);
				}
				$this->setCuenta($this->aCuenta);
			}

			if ($this->aRolResponsable !== null) {
				if ($this->aRolResponsable->isModified() || $this->aRolResponsable->isNew()) {
					$affectedRows += $this->aRolResponsable->save($con);
				}
				$this->setRolResponsable($this->aRolResponsable);
			}

			if ($this->aNivelInstruccion !== null) {
				if ($this->aNivelInstruccion->isModified() || $this->aNivelInstruccion->isNew()) {
					$affectedRows += $this->aNivelInstruccion->save($con);
				}
				$this->setNivelInstruccion($this->aNivelInstruccion);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ResponsablePeer::ID;
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
				foreach ($this->collRelRolresponsableResponsables as $referrerFK) {
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

			if ($this->aNivelInstruccion !== null) {
				if (!$this->aNivelInstruccion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aNivelInstruccion->getValidationFailures());
				}
			}


			if (($retval = ResponsablePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelRolresponsableResponsables !== null) {
					foreach ($this->collRelRolresponsableResponsables as $referrerFK) {
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
				return $this->getApellido();
				break;
			case 3:
				return $this->getApellidoMaterno();
				break;
			case 4:
				return $this->getDireccion();
				break;
			case 5:
				return $this->getDireccionLaboral();
				break;
			case 6:
				return $this->getCiudad();
				break;
			case 7:
				return $this->getCodigoPostal();
				break;
			case 8:
				return $this->getFkProvinciaId();
				break;
			case 9:
				return $this->getTelefono();
				break;
			case 10:
				return $this->getTelefonoLaboral();
				break;
			case 11:
				return $this->getTelefonoMovil();
				break;
			case 12:
				return $this->getNroDocumento();
				break;
			case 13:
				return $this->getFkTipodocumentoId();
				break;
			case 14:
				return $this->getSexo();
				break;
			case 15:
				return $this->getEmail();
				break;
			case 16:
				return $this->getObservacion();
				break;
			case 17:
				return $this->getAutorizacionRetiro();
				break;
			case 18:
				return $this->getLlamarEmergencia();
				break;
			case 19:
				return $this->getFkCuentaId();
				break;
			case 20:
				return $this->getFkRolresponsableId();
				break;
			case 21:
				return $this->getOcupacion();
				break;
			case 22:
				return $this->getFechaNacimiento();
				break;
			case 23:
				return $this->getFkNivelInstruccionId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = ResponsablePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getApellido(),
			$keys[3] => $this->getApellidoMaterno(),
			$keys[4] => $this->getDireccion(),
			$keys[5] => $this->getDireccionLaboral(),
			$keys[6] => $this->getCiudad(),
			$keys[7] => $this->getCodigoPostal(),
			$keys[8] => $this->getFkProvinciaId(),
			$keys[9] => $this->getTelefono(),
			$keys[10] => $this->getTelefonoLaboral(),
			$keys[11] => $this->getTelefonoMovil(),
			$keys[12] => $this->getNroDocumento(),
			$keys[13] => $this->getFkTipodocumentoId(),
			$keys[14] => $this->getSexo(),
			$keys[15] => $this->getEmail(),
			$keys[16] => $this->getObservacion(),
			$keys[17] => $this->getAutorizacionRetiro(),
			$keys[18] => $this->getLlamarEmergencia(),
			$keys[19] => $this->getFkCuentaId(),
			$keys[20] => $this->getFkRolresponsableId(),
			$keys[21] => $this->getOcupacion(),
			$keys[22] => $this->getFechaNacimiento(),
			$keys[23] => $this->getFkNivelInstruccionId(),
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
				$this->setApellidoMaterno($value);
				break;
			case 4:
				$this->setDireccion($value);
				break;
			case 5:
				$this->setDireccionLaboral($value);
				break;
			case 6:
				$this->setCiudad($value);
				break;
			case 7:
				$this->setCodigoPostal($value);
				break;
			case 8:
				$this->setFkProvinciaId($value);
				break;
			case 9:
				$this->setTelefono($value);
				break;
			case 10:
				$this->setTelefonoLaboral($value);
				break;
			case 11:
				$this->setTelefonoMovil($value);
				break;
			case 12:
				$this->setNroDocumento($value);
				break;
			case 13:
				$this->setFkTipodocumentoId($value);
				break;
			case 14:
				$this->setSexo($value);
				break;
			case 15:
				$this->setEmail($value);
				break;
			case 16:
				$this->setObservacion($value);
				break;
			case 17:
				$this->setAutorizacionRetiro($value);
				break;
			case 18:
				$this->setLlamarEmergencia($value);
				break;
			case 19:
				$this->setFkCuentaId($value);
				break;
			case 20:
				$this->setFkRolresponsableId($value);
				break;
			case 21:
				$this->setOcupacion($value);
				break;
			case 22:
				$this->setFechaNacimiento($value);
				break;
			case 23:
				$this->setFkNivelInstruccionId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ResponsablePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApellido($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setApellidoMaterno($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDireccion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDireccionLaboral($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCiudad($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodigoPostal($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFkProvinciaId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTelefono($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTelefonoLaboral($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTelefonoMovil($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNroDocumento($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFkTipodocumentoId($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setSexo($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setEmail($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setObservacion($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setAutorizacionRetiro($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setLlamarEmergencia($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFkCuentaId($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFkRolresponsableId($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setOcupacion($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFechaNacimiento($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setFkNivelInstruccionId($arr[$keys[23]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ResponsablePeer::DATABASE_NAME);

		if ($this->isColumnModified(ResponsablePeer::ID)) $criteria->add(ResponsablePeer::ID, $this->id);
		if ($this->isColumnModified(ResponsablePeer::NOMBRE)) $criteria->add(ResponsablePeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(ResponsablePeer::APELLIDO)) $criteria->add(ResponsablePeer::APELLIDO, $this->apellido);
		if ($this->isColumnModified(ResponsablePeer::APELLIDO_MATERNO)) $criteria->add(ResponsablePeer::APELLIDO_MATERNO, $this->apellido_materno);
		if ($this->isColumnModified(ResponsablePeer::DIRECCION)) $criteria->add(ResponsablePeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(ResponsablePeer::DIRECCION_LABORAL)) $criteria->add(ResponsablePeer::DIRECCION_LABORAL, $this->direccion_laboral);
		if ($this->isColumnModified(ResponsablePeer::CIUDAD)) $criteria->add(ResponsablePeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(ResponsablePeer::CODIGO_POSTAL)) $criteria->add(ResponsablePeer::CODIGO_POSTAL, $this->codigo_postal);
		if ($this->isColumnModified(ResponsablePeer::FK_PROVINCIA_ID)) $criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->fk_provincia_id);
		if ($this->isColumnModified(ResponsablePeer::TELEFONO)) $criteria->add(ResponsablePeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(ResponsablePeer::TELEFONO_LABORAL)) $criteria->add(ResponsablePeer::TELEFONO_LABORAL, $this->telefono_laboral);
		if ($this->isColumnModified(ResponsablePeer::TELEFONO_MOVIL)) $criteria->add(ResponsablePeer::TELEFONO_MOVIL, $this->telefono_movil);
		if ($this->isColumnModified(ResponsablePeer::NRO_DOCUMENTO)) $criteria->add(ResponsablePeer::NRO_DOCUMENTO, $this->nro_documento);
		if ($this->isColumnModified(ResponsablePeer::FK_TIPODOCUMENTO_ID)) $criteria->add(ResponsablePeer::FK_TIPODOCUMENTO_ID, $this->fk_tipodocumento_id);
		if ($this->isColumnModified(ResponsablePeer::SEXO)) $criteria->add(ResponsablePeer::SEXO, $this->sexo);
		if ($this->isColumnModified(ResponsablePeer::EMAIL)) $criteria->add(ResponsablePeer::EMAIL, $this->email);
		if ($this->isColumnModified(ResponsablePeer::OBSERVACION)) $criteria->add(ResponsablePeer::OBSERVACION, $this->observacion);
		if ($this->isColumnModified(ResponsablePeer::AUTORIZACION_RETIRO)) $criteria->add(ResponsablePeer::AUTORIZACION_RETIRO, $this->autorizacion_retiro);
		if ($this->isColumnModified(ResponsablePeer::LLAMAR_EMERGENCIA)) $criteria->add(ResponsablePeer::LLAMAR_EMERGENCIA, $this->llamar_emergencia);
		if ($this->isColumnModified(ResponsablePeer::FK_CUENTA_ID)) $criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->fk_cuenta_id);
		if ($this->isColumnModified(ResponsablePeer::FK_ROLRESPONSABLE_ID)) $criteria->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, $this->fk_rolresponsable_id);
		if ($this->isColumnModified(ResponsablePeer::OCUPACION)) $criteria->add(ResponsablePeer::OCUPACION, $this->ocupacion);
		if ($this->isColumnModified(ResponsablePeer::FECHA_NACIMIENTO)) $criteria->add(ResponsablePeer::FECHA_NACIMIENTO, $this->fecha_nacimiento);
		if ($this->isColumnModified(ResponsablePeer::FK_NIVEL_INSTRUCCION_ID)) $criteria->add(ResponsablePeer::FK_NIVEL_INSTRUCCION_ID, $this->fk_nivel_instruccion_id);

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

		$copyObj->setApellidoMaterno($this->apellido_materno);

		$copyObj->setDireccion($this->direccion);

		$copyObj->setDireccionLaboral($this->direccion_laboral);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCodigoPostal($this->codigo_postal);

		$copyObj->setFkProvinciaId($this->fk_provincia_id);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setTelefonoLaboral($this->telefono_laboral);

		$copyObj->setTelefonoMovil($this->telefono_movil);

		$copyObj->setNroDocumento($this->nro_documento);

		$copyObj->setFkTipodocumentoId($this->fk_tipodocumento_id);

		$copyObj->setSexo($this->sexo);

		$copyObj->setEmail($this->email);

		$copyObj->setObservacion($this->observacion);

		$copyObj->setAutorizacionRetiro($this->autorizacion_retiro);

		$copyObj->setLlamarEmergencia($this->llamar_emergencia);

		$copyObj->setFkCuentaId($this->fk_cuenta_id);

		$copyObj->setFkRolresponsableId($this->fk_rolresponsable_id);

		$copyObj->setOcupacion($this->ocupacion);

		$copyObj->setFechaNacimiento($this->fecha_nacimiento);

		$copyObj->setFkNivelInstruccionId($this->fk_nivel_instruccion_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getRelRolresponsableResponsables() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelRolresponsableResponsable($relObj->copy($deepCopy));
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
			self::$peer = new ResponsablePeer();
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
			$v->addResponsable($this);
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

	
	public function setTipodocumento(Tipodocumento $v = null)
	{
		if ($v === null) {
			$this->setFkTipodocumentoId(0);
		} else {
			$this->setFkTipodocumentoId($v->getId());
		}

		$this->aTipodocumento = $v;

						if ($v !== null) {
			$v->addResponsable($this);
		}

		return $this;
	}


	
	public function getTipodocumento(PropelPDO $con = null)
	{
		if ($this->aTipodocumento === null && ($this->fk_tipodocumento_id !== null)) {
			$c = new Criteria(TipodocumentoPeer::DATABASE_NAME);
			$c->add(TipodocumentoPeer::ID, $this->fk_tipodocumento_id);
			$this->aTipodocumento = TipodocumentoPeer::doSelectOne($c, $con);
			
		}
		return $this->aTipodocumento;
	}

	
	public function setCuenta(Cuenta $v = null)
	{
		if ($v === null) {
			$this->setFkCuentaId(0);
		} else {
			$this->setFkCuentaId($v->getId());
		}

		$this->aCuenta = $v;

						if ($v !== null) {
			$v->addResponsable($this);
		}

		return $this;
	}


	
	public function getCuenta(PropelPDO $con = null)
	{
		if ($this->aCuenta === null && ($this->fk_cuenta_id !== null)) {
			$c = new Criteria(CuentaPeer::DATABASE_NAME);
			$c->add(CuentaPeer::ID, $this->fk_cuenta_id);
			$this->aCuenta = CuentaPeer::doSelectOne($c, $con);
			
		}
		return $this->aCuenta;
	}

	
	public function setRolResponsable(RolResponsable $v = null)
	{
		if ($v === null) {
			$this->setFkRolresponsableId(1);
		} else {
			$this->setFkRolresponsableId($v->getId());
		}

		$this->aRolResponsable = $v;

						if ($v !== null) {
			$v->addResponsable($this);
		}

		return $this;
	}


	
	public function getRolResponsable(PropelPDO $con = null)
	{
		if ($this->aRolResponsable === null && ($this->fk_rolresponsable_id !== null)) {
			$c = new Criteria(RolResponsablePeer::DATABASE_NAME);
			$c->add(RolResponsablePeer::ID, $this->fk_rolresponsable_id);
			$this->aRolResponsable = RolResponsablePeer::doSelectOne($c, $con);
			
		}
		return $this->aRolResponsable;
	}

	
	public function setNivelInstruccion(NivelInstruccion $v = null)
	{
		if ($v === null) {
			$this->setFkNivelInstruccionId(NULL);
		} else {
			$this->setFkNivelInstruccionId($v->getId());
		}

		$this->aNivelInstruccion = $v;

						if ($v !== null) {
			$v->addResponsable($this);
		}

		return $this;
	}


	
	public function getNivelInstruccion(PropelPDO $con = null)
	{
		if ($this->aNivelInstruccion === null && ($this->fk_nivel_instruccion_id !== null)) {
			$c = new Criteria(NivelInstruccionPeer::DATABASE_NAME);
			$c->add(NivelInstruccionPeer::ID, $this->fk_nivel_instruccion_id);
			$this->aNivelInstruccion = NivelInstruccionPeer::doSelectOne($c, $con);
			
		}
		return $this->aNivelInstruccion;
	}

	
	public function clearRelRolresponsableResponsables()
	{
		$this->collRelRolresponsableResponsables = null; 	}

	
	public function initRelRolresponsableResponsables()
	{
		$this->collRelRolresponsableResponsables = array();
	}

	
	public function getRelRolresponsableResponsables($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ResponsablePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelRolresponsableResponsables === null) {
			if ($this->isNew()) {
			   $this->collRelRolresponsableResponsables = array();
			} else {

				$criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->id);

				RelRolresponsableResponsablePeer::addSelectColumns($criteria);
				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->id);

				RelRolresponsableResponsablePeer::addSelectColumns($criteria);
				if (!isset($this->lastRelRolresponsableResponsableCriteria) || !$this->lastRelRolresponsableResponsableCriteria->equals($criteria)) {
					$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelRolresponsableResponsableCriteria = $criteria;
		return $this->collRelRolresponsableResponsables;
	}

	
	public function countRelRolresponsableResponsables(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ResponsablePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelRolresponsableResponsables === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->id);

				$count = RelRolresponsableResponsablePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->id);

				if (!isset($this->lastRelRolresponsableResponsableCriteria) || !$this->lastRelRolresponsableResponsableCriteria->equals($criteria)) {
					$count = RelRolresponsableResponsablePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelRolresponsableResponsables);
				}
			} else {
				$count = count($this->collRelRolresponsableResponsables);
			}
		}
		return $count;
	}

	
	public function addRelRolresponsableResponsable(RelRolresponsableResponsable $l)
	{
		if ($this->collRelRolresponsableResponsables === null) {
			$this->initRelRolresponsableResponsables();
		}
		if (!in_array($l, $this->collRelRolresponsableResponsables, true)) { 			array_push($this->collRelRolresponsableResponsables, $l);
			$l->setResponsable($this);
		}
	}


	
	public function getRelRolresponsableResponsablesJoinRolResponsable($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ResponsablePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelRolresponsableResponsables === null) {
			if ($this->isNew()) {
				$this->collRelRolresponsableResponsables = array();
			} else {

				$criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->id);

				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinRolResponsable($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->id);

			if (!isset($this->lastRelRolresponsableResponsableCriteria) || !$this->lastRelRolresponsableResponsableCriteria->equals($criteria)) {
				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinRolResponsable($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelRolresponsableResponsableCriteria = $criteria;

		return $this->collRelRolresponsableResponsables;
	}


	
	public function getRelRolresponsableResponsablesJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ResponsablePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelRolresponsableResponsables === null) {
			if ($this->isNew()) {
				$this->collRelRolresponsableResponsables = array();
			} else {

				$criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->id);

				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->id);

			if (!isset($this->lastRelRolresponsableResponsableCriteria) || !$this->lastRelRolresponsableResponsableCriteria->equals($criteria)) {
				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelRolresponsableResponsableCriteria = $criteria;

		return $this->collRelRolresponsableResponsables;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collRelRolresponsableResponsables) {
				foreach ((array) $this->collRelRolresponsableResponsables as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collRelRolresponsableResponsables = null;
			$this->aProvincia = null;
			$this->aTipodocumento = null;
			$this->aCuenta = null;
			$this->aRolResponsable = null;
			$this->aNivelInstruccion = null;
	}

} 