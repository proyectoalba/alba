<?php


abstract class BaseDocente extends BaseObject  implements Persistent {


  const PEER = 'DocentePeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $apellido;

	
	protected $apellido_materno;

	
	protected $nombre;

	
	protected $estado_civil;

	
	protected $sexo;

	
	protected $fecha_nacimiento;

	
	protected $fk_tipodocumento_id;

	
	protected $nro_documento;

	
	protected $lugar_nacimiento;

	
	protected $direccion;

	
	protected $ciudad;

	
	protected $codigo_postal;

	
	protected $email;

	
	protected $telefono;

	
	protected $telefono_movil;

	
	protected $titulo;

	
	protected $libreta_sanitaria;

	
	protected $psicofisico;

	
	protected $observacion;

	
	protected $activo;

	
	protected $fk_provincia_id;

	
	protected $fk_pais_id;

	
	protected $aTipodocumento;

	
	protected $aProvincia;

	
	protected $aPais;

	
	protected $collRelDivisionActividadDocentes;

	
	private $lastRelDivisionActividadDocenteCriteria = null;

	
	protected $collRelDocenteEstablecimientos;

	
	private $lastRelDocenteEstablecimientoCriteria = null;

	
	protected $collDocenteHorarios;

	
	private $lastDocenteHorarioCriteria = null;

	
	protected $collRelAnioActividadDocentes;

	
	private $lastRelAnioActividadDocenteCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->fk_tipodocumento_id = 0;
		$this->libreta_sanitaria = false;
		$this->psicofisico = false;
		$this->activo = true;
		$this->fk_provincia_id = 0;
		$this->fk_pais_id = 0;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getApellido()
	{
		return $this->apellido;
	}

	
	public function getApellidoMaterno()
	{
		return $this->apellido_materno;
	}

	
	public function getNombre()
	{
		return $this->nombre;
	}

	
	public function getEstadoCivil()
	{
		return $this->estado_civil;
	}

	
	public function getSexo()
	{
		return $this->sexo;
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

	
	public function getFkTipodocumentoId()
	{
		return $this->fk_tipodocumento_id;
	}

	
	public function getNroDocumento()
	{
		return $this->nro_documento;
	}

	
	public function getLugarNacimiento()
	{
		return $this->lugar_nacimiento;
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

	
	public function getObservacion()
	{
		return $this->observacion;
	}

	
	public function getActivo()
	{
		return $this->activo;
	}

	
	public function getFkProvinciaId()
	{
		return $this->fk_provincia_id;
	}

	
	public function getFkPaisId()
	{
		return $this->fk_pais_id;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DocentePeer::ID;
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
			$this->modifiedColumns[] = DocentePeer::APELLIDO;
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
			$this->modifiedColumns[] = DocentePeer::APELLIDO_MATERNO;
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
			$this->modifiedColumns[] = DocentePeer::NOMBRE;
		}

		return $this;
	} 
	
	public function setEstadoCivil($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->estado_civil !== $v) {
			$this->estado_civil = $v;
			$this->modifiedColumns[] = DocentePeer::ESTADO_CIVIL;
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
			$this->modifiedColumns[] = DocentePeer::SEXO;
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
				$this->modifiedColumns[] = DocentePeer::FECHA_NACIMIENTO;
			}
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
			$this->modifiedColumns[] = DocentePeer::FK_TIPODOCUMENTO_ID;
		}

		if ($this->aTipodocumento !== null && $this->aTipodocumento->getId() !== $v) {
			$this->aTipodocumento = null;
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
			$this->modifiedColumns[] = DocentePeer::NRO_DOCUMENTO;
		}

		return $this;
	} 
	
	public function setLugarNacimiento($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->lugar_nacimiento !== $v) {
			$this->lugar_nacimiento = $v;
			$this->modifiedColumns[] = DocentePeer::LUGAR_NACIMIENTO;
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
			$this->modifiedColumns[] = DocentePeer::DIRECCION;
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
			$this->modifiedColumns[] = DocentePeer::CIUDAD;
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
			$this->modifiedColumns[] = DocentePeer::CODIGO_POSTAL;
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
			$this->modifiedColumns[] = DocentePeer::EMAIL;
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
			$this->modifiedColumns[] = DocentePeer::TELEFONO;
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
			$this->modifiedColumns[] = DocentePeer::TELEFONO_MOVIL;
		}

		return $this;
	} 
	
	public function setTitulo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->titulo !== $v) {
			$this->titulo = $v;
			$this->modifiedColumns[] = DocentePeer::TITULO;
		}

		return $this;
	} 
	
	public function setLibretaSanitaria($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->libreta_sanitaria !== $v || $v === false) {
			$this->libreta_sanitaria = $v;
			$this->modifiedColumns[] = DocentePeer::LIBRETA_SANITARIA;
		}

		return $this;
	} 
	
	public function setPsicofisico($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->psicofisico !== $v || $v === false) {
			$this->psicofisico = $v;
			$this->modifiedColumns[] = DocentePeer::PSICOFISICO;
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
			$this->modifiedColumns[] = DocentePeer::OBSERVACION;
		}

		return $this;
	} 
	
	public function setActivo($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->activo !== $v || $v === true) {
			$this->activo = $v;
			$this->modifiedColumns[] = DocentePeer::ACTIVO;
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
			$this->modifiedColumns[] = DocentePeer::FK_PROVINCIA_ID;
		}

		if ($this->aProvincia !== null && $this->aProvincia->getId() !== $v) {
			$this->aProvincia = null;
		}

		return $this;
	} 
	
	public function setFkPaisId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_pais_id !== $v || $v === 0) {
			$this->fk_pais_id = $v;
			$this->modifiedColumns[] = DocentePeer::FK_PAIS_ID;
		}

		if ($this->aPais !== null && $this->aPais->getId() !== $v) {
			$this->aPais = null;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(DocentePeer::FK_TIPODOCUMENTO_ID,DocentePeer::LIBRETA_SANITARIA,DocentePeer::PSICOFISICO,DocentePeer::ACTIVO,DocentePeer::FK_PROVINCIA_ID,DocentePeer::FK_PAIS_ID))) {
				return false;
			}

			if ($this->fk_tipodocumento_id !== 0) {
				return false;
			}

			if ($this->libreta_sanitaria !== false) {
				return false;
			}

			if ($this->psicofisico !== false) {
				return false;
			}

			if ($this->activo !== true) {
				return false;
			}

			if ($this->fk_provincia_id !== 0) {
				return false;
			}

			if ($this->fk_pais_id !== 0) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->apellido = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->apellido_materno = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->nombre = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->estado_civil = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->sexo = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->fecha_nacimiento = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->fk_tipodocumento_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->nro_documento = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->lugar_nacimiento = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->direccion = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->ciudad = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->codigo_postal = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->email = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->telefono = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->telefono_movil = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->titulo = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->libreta_sanitaria = ($row[$startcol + 17] !== null) ? (boolean) $row[$startcol + 17] : null;
			$this->psicofisico = ($row[$startcol + 18] !== null) ? (boolean) $row[$startcol + 18] : null;
			$this->observacion = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->activo = ($row[$startcol + 20] !== null) ? (boolean) $row[$startcol + 20] : null;
			$this->fk_provincia_id = ($row[$startcol + 21] !== null) ? (int) $row[$startcol + 21] : null;
			$this->fk_pais_id = ($row[$startcol + 22] !== null) ? (int) $row[$startcol + 22] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 23; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Docente object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aTipodocumento !== null && $this->fk_tipodocumento_id !== $this->aTipodocumento->getId()) {
			$this->aTipodocumento = null;
		}
		if ($this->aProvincia !== null && $this->fk_provincia_id !== $this->aProvincia->getId()) {
			$this->aProvincia = null;
		}
		if ($this->aPais !== null && $this->fk_pais_id !== $this->aPais->getId()) {
			$this->aPais = null;
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
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DocentePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aTipodocumento = null;
			$this->aProvincia = null;
			$this->aPais = null;
			$this->collRelDivisionActividadDocentes = null;
			$this->lastRelDivisionActividadDocenteCriteria = null;

			$this->collRelDocenteEstablecimientos = null;
			$this->lastRelDocenteEstablecimientoCriteria = null;

			$this->collDocenteHorarios = null;
			$this->lastDocenteHorarioCriteria = null;

			$this->collRelAnioActividadDocentes = null;
			$this->lastRelAnioActividadDocenteCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DocentePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			DocentePeer::addInstanceToPool($this);
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

												
			if ($this->aTipodocumento !== null) {
				if ($this->aTipodocumento->isModified() || $this->aTipodocumento->isNew()) {
					$affectedRows += $this->aTipodocumento->save($con);
				}
				$this->setTipodocumento($this->aTipodocumento);
			}

			if ($this->aProvincia !== null) {
				if ($this->aProvincia->isModified() || $this->aProvincia->isNew()) {
					$affectedRows += $this->aProvincia->save($con);
				}
				$this->setProvincia($this->aProvincia);
			}

			if ($this->aPais !== null) {
				if ($this->aPais->isModified() || $this->aPais->isNew()) {
					$affectedRows += $this->aPais->save($con);
				}
				$this->setPais($this->aPais);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = DocentePeer::ID;
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
				foreach ($this->collRelDivisionActividadDocentes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelDocenteEstablecimientos !== null) {
				foreach ($this->collRelDocenteEstablecimientos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDocenteHorarios !== null) {
				foreach ($this->collDocenteHorarios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelAnioActividadDocentes !== null) {
				foreach ($this->collRelAnioActividadDocentes as $referrerFK) {
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

			if ($this->aPais !== null) {
				if (!$this->aPais->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPais->getValidationFailures());
				}
			}


			if (($retval = DocentePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelDivisionActividadDocentes !== null) {
					foreach ($this->collRelDivisionActividadDocentes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelDocenteEstablecimientos !== null) {
					foreach ($this->collRelDocenteEstablecimientos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDocenteHorarios !== null) {
					foreach ($this->collDocenteHorarios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelAnioActividadDocentes !== null) {
					foreach ($this->collRelAnioActividadDocentes as $referrerFK) {
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
				return $this->getApellido();
				break;
			case 2:
				return $this->getApellidoMaterno();
				break;
			case 3:
				return $this->getNombre();
				break;
			case 4:
				return $this->getEstadoCivil();
				break;
			case 5:
				return $this->getSexo();
				break;
			case 6:
				return $this->getFechaNacimiento();
				break;
			case 7:
				return $this->getFkTipodocumentoId();
				break;
			case 8:
				return $this->getNroDocumento();
				break;
			case 9:
				return $this->getLugarNacimiento();
				break;
			case 10:
				return $this->getDireccion();
				break;
			case 11:
				return $this->getCiudad();
				break;
			case 12:
				return $this->getCodigoPostal();
				break;
			case 13:
				return $this->getEmail();
				break;
			case 14:
				return $this->getTelefono();
				break;
			case 15:
				return $this->getTelefonoMovil();
				break;
			case 16:
				return $this->getTitulo();
				break;
			case 17:
				return $this->getLibretaSanitaria();
				break;
			case 18:
				return $this->getPsicofisico();
				break;
			case 19:
				return $this->getObservacion();
				break;
			case 20:
				return $this->getActivo();
				break;
			case 21:
				return $this->getFkProvinciaId();
				break;
			case 22:
				return $this->getFkPaisId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DocentePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getApellido(),
			$keys[2] => $this->getApellidoMaterno(),
			$keys[3] => $this->getNombre(),
			$keys[4] => $this->getEstadoCivil(),
			$keys[5] => $this->getSexo(),
			$keys[6] => $this->getFechaNacimiento(),
			$keys[7] => $this->getFkTipodocumentoId(),
			$keys[8] => $this->getNroDocumento(),
			$keys[9] => $this->getLugarNacimiento(),
			$keys[10] => $this->getDireccion(),
			$keys[11] => $this->getCiudad(),
			$keys[12] => $this->getCodigoPostal(),
			$keys[13] => $this->getEmail(),
			$keys[14] => $this->getTelefono(),
			$keys[15] => $this->getTelefonoMovil(),
			$keys[16] => $this->getTitulo(),
			$keys[17] => $this->getLibretaSanitaria(),
			$keys[18] => $this->getPsicofisico(),
			$keys[19] => $this->getObservacion(),
			$keys[20] => $this->getActivo(),
			$keys[21] => $this->getFkProvinciaId(),
			$keys[22] => $this->getFkPaisId(),
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
				$this->setApellidoMaterno($value);
				break;
			case 3:
				$this->setNombre($value);
				break;
			case 4:
				$this->setEstadoCivil($value);
				break;
			case 5:
				$this->setSexo($value);
				break;
			case 6:
				$this->setFechaNacimiento($value);
				break;
			case 7:
				$this->setFkTipodocumentoId($value);
				break;
			case 8:
				$this->setNroDocumento($value);
				break;
			case 9:
				$this->setLugarNacimiento($value);
				break;
			case 10:
				$this->setDireccion($value);
				break;
			case 11:
				$this->setCiudad($value);
				break;
			case 12:
				$this->setCodigoPostal($value);
				break;
			case 13:
				$this->setEmail($value);
				break;
			case 14:
				$this->setTelefono($value);
				break;
			case 15:
				$this->setTelefonoMovil($value);
				break;
			case 16:
				$this->setTitulo($value);
				break;
			case 17:
				$this->setLibretaSanitaria($value);
				break;
			case 18:
				$this->setPsicofisico($value);
				break;
			case 19:
				$this->setObservacion($value);
				break;
			case 20:
				$this->setActivo($value);
				break;
			case 21:
				$this->setFkProvinciaId($value);
				break;
			case 22:
				$this->setFkPaisId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DocentePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setApellido($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApellidoMaterno($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNombre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEstadoCivil($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSexo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFechaNacimiento($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFkTipodocumentoId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNroDocumento($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setLugarNacimiento($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDireccion($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCiudad($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodigoPostal($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setEmail($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setTelefono($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTelefonoMovil($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setTitulo($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setLibretaSanitaria($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setPsicofisico($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setObservacion($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setActivo($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFkProvinciaId($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFkPaisId($arr[$keys[22]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DocentePeer::DATABASE_NAME);

		if ($this->isColumnModified(DocentePeer::ID)) $criteria->add(DocentePeer::ID, $this->id);
		if ($this->isColumnModified(DocentePeer::APELLIDO)) $criteria->add(DocentePeer::APELLIDO, $this->apellido);
		if ($this->isColumnModified(DocentePeer::APELLIDO_MATERNO)) $criteria->add(DocentePeer::APELLIDO_MATERNO, $this->apellido_materno);
		if ($this->isColumnModified(DocentePeer::NOMBRE)) $criteria->add(DocentePeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(DocentePeer::ESTADO_CIVIL)) $criteria->add(DocentePeer::ESTADO_CIVIL, $this->estado_civil);
		if ($this->isColumnModified(DocentePeer::SEXO)) $criteria->add(DocentePeer::SEXO, $this->sexo);
		if ($this->isColumnModified(DocentePeer::FECHA_NACIMIENTO)) $criteria->add(DocentePeer::FECHA_NACIMIENTO, $this->fecha_nacimiento);
		if ($this->isColumnModified(DocentePeer::FK_TIPODOCUMENTO_ID)) $criteria->add(DocentePeer::FK_TIPODOCUMENTO_ID, $this->fk_tipodocumento_id);
		if ($this->isColumnModified(DocentePeer::NRO_DOCUMENTO)) $criteria->add(DocentePeer::NRO_DOCUMENTO, $this->nro_documento);
		if ($this->isColumnModified(DocentePeer::LUGAR_NACIMIENTO)) $criteria->add(DocentePeer::LUGAR_NACIMIENTO, $this->lugar_nacimiento);
		if ($this->isColumnModified(DocentePeer::DIRECCION)) $criteria->add(DocentePeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(DocentePeer::CIUDAD)) $criteria->add(DocentePeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(DocentePeer::CODIGO_POSTAL)) $criteria->add(DocentePeer::CODIGO_POSTAL, $this->codigo_postal);
		if ($this->isColumnModified(DocentePeer::EMAIL)) $criteria->add(DocentePeer::EMAIL, $this->email);
		if ($this->isColumnModified(DocentePeer::TELEFONO)) $criteria->add(DocentePeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(DocentePeer::TELEFONO_MOVIL)) $criteria->add(DocentePeer::TELEFONO_MOVIL, $this->telefono_movil);
		if ($this->isColumnModified(DocentePeer::TITULO)) $criteria->add(DocentePeer::TITULO, $this->titulo);
		if ($this->isColumnModified(DocentePeer::LIBRETA_SANITARIA)) $criteria->add(DocentePeer::LIBRETA_SANITARIA, $this->libreta_sanitaria);
		if ($this->isColumnModified(DocentePeer::PSICOFISICO)) $criteria->add(DocentePeer::PSICOFISICO, $this->psicofisico);
		if ($this->isColumnModified(DocentePeer::OBSERVACION)) $criteria->add(DocentePeer::OBSERVACION, $this->observacion);
		if ($this->isColumnModified(DocentePeer::ACTIVO)) $criteria->add(DocentePeer::ACTIVO, $this->activo);
		if ($this->isColumnModified(DocentePeer::FK_PROVINCIA_ID)) $criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->fk_provincia_id);
		if ($this->isColumnModified(DocentePeer::FK_PAIS_ID)) $criteria->add(DocentePeer::FK_PAIS_ID, $this->fk_pais_id);

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

		$copyObj->setApellidoMaterno($this->apellido_materno);

		$copyObj->setNombre($this->nombre);

		$copyObj->setEstadoCivil($this->estado_civil);

		$copyObj->setSexo($this->sexo);

		$copyObj->setFechaNacimiento($this->fecha_nacimiento);

		$copyObj->setFkTipodocumentoId($this->fk_tipodocumento_id);

		$copyObj->setNroDocumento($this->nro_documento);

		$copyObj->setLugarNacimiento($this->lugar_nacimiento);

		$copyObj->setDireccion($this->direccion);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCodigoPostal($this->codigo_postal);

		$copyObj->setEmail($this->email);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setTelefonoMovil($this->telefono_movil);

		$copyObj->setTitulo($this->titulo);

		$copyObj->setLibretaSanitaria($this->libreta_sanitaria);

		$copyObj->setPsicofisico($this->psicofisico);

		$copyObj->setObservacion($this->observacion);

		$copyObj->setActivo($this->activo);

		$copyObj->setFkProvinciaId($this->fk_provincia_id);

		$copyObj->setFkPaisId($this->fk_pais_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getRelDivisionActividadDocentes() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelDivisionActividadDocente($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRelDocenteEstablecimientos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelDocenteEstablecimiento($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getDocenteHorarios() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDocenteHorario($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRelAnioActividadDocentes() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelAnioActividadDocente($relObj->copy($deepCopy));
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
			self::$peer = new DocentePeer();
		}
		return self::$peer;
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
			$v->addDocente($this);
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

	
	public function setProvincia(Provincia $v = null)
	{
		if ($v === null) {
			$this->setFkProvinciaId(0);
		} else {
			$this->setFkProvinciaId($v->getId());
		}

		$this->aProvincia = $v;

						if ($v !== null) {
			$v->addDocente($this);
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

	
	public function setPais(Pais $v = null)
	{
		if ($v === null) {
			$this->setFkPaisId(0);
		} else {
			$this->setFkPaisId($v->getId());
		}

		$this->aPais = $v;

						if ($v !== null) {
			$v->addDocente($this);
		}

		return $this;
	}


	
	public function getPais(PropelPDO $con = null)
	{
		if ($this->aPais === null && ($this->fk_pais_id !== null)) {
			$c = new Criteria(PaisPeer::DATABASE_NAME);
			$c->add(PaisPeer::ID, $this->fk_pais_id);
			$this->aPais = PaisPeer::doSelectOne($c, $con);
			
		}
		return $this->aPais;
	}

	
	public function clearRelDivisionActividadDocentes()
	{
		$this->collRelDivisionActividadDocentes = null; 	}

	
	public function initRelDivisionActividadDocentes()
	{
		$this->collRelDivisionActividadDocentes = array();
	}

	
	public function getRelDivisionActividadDocentes($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DocentePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
			   $this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->id);

				RelDivisionActividadDocentePeer::addSelectColumns($criteria);
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->id);

				RelDivisionActividadDocentePeer::addSelectColumns($criteria);
				if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
					$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;
		return $this->collRelDivisionActividadDocentes;
	}

	
	public function countRelDivisionActividadDocentes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DocentePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->id);

				$count = RelDivisionActividadDocentePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->id);

				if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
					$count = RelDivisionActividadDocentePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelDivisionActividadDocentes);
				}
			} else {
				$count = count($this->collRelDivisionActividadDocentes);
			}
		}
		return $count;
	}

	
	public function addRelDivisionActividadDocente(RelDivisionActividadDocente $l)
	{
		if ($this->collRelDivisionActividadDocentes === null) {
			$this->initRelDivisionActividadDocentes();
		}
		if (!in_array($l, $this->collRelDivisionActividadDocentes, true)) { 			array_push($this->collRelDivisionActividadDocentes, $l);
			$l->setDocente($this);
		}
	}


	
	public function getRelDivisionActividadDocentesJoinDivision($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DocentePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->id);

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDivision($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->id);

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDivision($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}


	
	public function getRelDivisionActividadDocentesJoinActividad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DocentePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->id);

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->id);

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}


	
	public function getRelDivisionActividadDocentesJoinEvento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DocentePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->id);

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinEvento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->id);

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinEvento($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}

	
	public function clearRelDocenteEstablecimientos()
	{
		$this->collRelDocenteEstablecimientos = null; 	}

	
	public function initRelDocenteEstablecimientos()
	{
		$this->collRelDocenteEstablecimientos = array();
	}

	
	public function getRelDocenteEstablecimientos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DocentePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDocenteEstablecimientos === null) {
			if ($this->isNew()) {
			   $this->collRelDocenteEstablecimientos = array();
			} else {

				$criteria->add(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID, $this->id);

				RelDocenteEstablecimientoPeer::addSelectColumns($criteria);
				$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID, $this->id);

				RelDocenteEstablecimientoPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelDocenteEstablecimientoCriteria) || !$this->lastRelDocenteEstablecimientoCriteria->equals($criteria)) {
					$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelDocenteEstablecimientoCriteria = $criteria;
		return $this->collRelDocenteEstablecimientos;
	}

	
	public function countRelDocenteEstablecimientos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DocentePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelDocenteEstablecimientos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID, $this->id);

				$count = RelDocenteEstablecimientoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID, $this->id);

				if (!isset($this->lastRelDocenteEstablecimientoCriteria) || !$this->lastRelDocenteEstablecimientoCriteria->equals($criteria)) {
					$count = RelDocenteEstablecimientoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelDocenteEstablecimientos);
				}
			} else {
				$count = count($this->collRelDocenteEstablecimientos);
			}
		}
		return $count;
	}

	
	public function addRelDocenteEstablecimiento(RelDocenteEstablecimiento $l)
	{
		if ($this->collRelDocenteEstablecimientos === null) {
			$this->initRelDocenteEstablecimientos();
		}
		if (!in_array($l, $this->collRelDocenteEstablecimientos, true)) { 			array_push($this->collRelDocenteEstablecimientos, $l);
			$l->setDocente($this);
		}
	}


	
	public function getRelDocenteEstablecimientosJoinEstablecimiento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DocentePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDocenteEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collRelDocenteEstablecimientos = array();
			} else {

				$criteria->add(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID, $this->id);

				$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID, $this->id);

			if (!isset($this->lastRelDocenteEstablecimientoCriteria) || !$this->lastRelDocenteEstablecimientoCriteria->equals($criteria)) {
				$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelDocenteEstablecimientoCriteria = $criteria;

		return $this->collRelDocenteEstablecimientos;
	}

	
	public function clearDocenteHorarios()
	{
		$this->collDocenteHorarios = null; 	}

	
	public function initDocenteHorarios()
	{
		$this->collDocenteHorarios = array();
	}

	
	public function getDocenteHorarios($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DocentePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDocenteHorarios === null) {
			if ($this->isNew()) {
			   $this->collDocenteHorarios = array();
			} else {

				$criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->id);

				DocenteHorarioPeer::addSelectColumns($criteria);
				$this->collDocenteHorarios = DocenteHorarioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->id);

				DocenteHorarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastDocenteHorarioCriteria) || !$this->lastDocenteHorarioCriteria->equals($criteria)) {
					$this->collDocenteHorarios = DocenteHorarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDocenteHorarioCriteria = $criteria;
		return $this->collDocenteHorarios;
	}

	
	public function countDocenteHorarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DocentePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDocenteHorarios === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->id);

				$count = DocenteHorarioPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->id);

				if (!isset($this->lastDocenteHorarioCriteria) || !$this->lastDocenteHorarioCriteria->equals($criteria)) {
					$count = DocenteHorarioPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDocenteHorarios);
				}
			} else {
				$count = count($this->collDocenteHorarios);
			}
		}
		return $count;
	}

	
	public function addDocenteHorario(DocenteHorario $l)
	{
		if ($this->collDocenteHorarios === null) {
			$this->initDocenteHorarios();
		}
		if (!in_array($l, $this->collDocenteHorarios, true)) { 			array_push($this->collDocenteHorarios, $l);
			$l->setDocente($this);
		}
	}


	
	public function getDocenteHorariosJoinEvento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DocentePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDocenteHorarios === null) {
			if ($this->isNew()) {
				$this->collDocenteHorarios = array();
			} else {

				$criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->id);

				$this->collDocenteHorarios = DocenteHorarioPeer::doSelectJoinEvento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->id);

			if (!isset($this->lastDocenteHorarioCriteria) || !$this->lastDocenteHorarioCriteria->equals($criteria)) {
				$this->collDocenteHorarios = DocenteHorarioPeer::doSelectJoinEvento($criteria, $con, $join_behavior);
			}
		}
		$this->lastDocenteHorarioCriteria = $criteria;

		return $this->collDocenteHorarios;
	}

	
	public function clearRelAnioActividadDocentes()
	{
		$this->collRelAnioActividadDocentes = null; 	}

	
	public function initRelAnioActividadDocentes()
	{
		$this->collRelAnioActividadDocentes = array();
	}

	
	public function getRelAnioActividadDocentes($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DocentePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividadDocentes === null) {
			if ($this->isNew()) {
			   $this->collRelAnioActividadDocentes = array();
			} else {

				$criteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $this->id);

				RelAnioActividadDocentePeer::addSelectColumns($criteria);
				$this->collRelAnioActividadDocentes = RelAnioActividadDocentePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $this->id);

				RelAnioActividadDocentePeer::addSelectColumns($criteria);
				if (!isset($this->lastRelAnioActividadDocenteCriteria) || !$this->lastRelAnioActividadDocenteCriteria->equals($criteria)) {
					$this->collRelAnioActividadDocentes = RelAnioActividadDocentePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelAnioActividadDocenteCriteria = $criteria;
		return $this->collRelAnioActividadDocentes;
	}

	
	public function countRelAnioActividadDocentes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DocentePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelAnioActividadDocentes === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $this->id);

				$count = RelAnioActividadDocentePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $this->id);

				if (!isset($this->lastRelAnioActividadDocenteCriteria) || !$this->lastRelAnioActividadDocenteCriteria->equals($criteria)) {
					$count = RelAnioActividadDocentePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelAnioActividadDocentes);
				}
			} else {
				$count = count($this->collRelAnioActividadDocentes);
			}
		}
		return $count;
	}

	
	public function addRelAnioActividadDocente(RelAnioActividadDocente $l)
	{
		if ($this->collRelAnioActividadDocentes === null) {
			$this->initRelAnioActividadDocentes();
		}
		if (!in_array($l, $this->collRelAnioActividadDocentes, true)) { 			array_push($this->collRelAnioActividadDocentes, $l);
			$l->setDocente($this);
		}
	}


	
	public function getRelAnioActividadDocentesJoinRelAnioActividad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(DocentePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelAnioActividadDocentes = array();
			} else {

				$criteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $this->id);

				$this->collRelAnioActividadDocentes = RelAnioActividadDocentePeer::doSelectJoinRelAnioActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $this->id);

			if (!isset($this->lastRelAnioActividadDocenteCriteria) || !$this->lastRelAnioActividadDocenteCriteria->equals($criteria)) {
				$this->collRelAnioActividadDocentes = RelAnioActividadDocentePeer::doSelectJoinRelAnioActividad($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelAnioActividadDocenteCriteria = $criteria;

		return $this->collRelAnioActividadDocentes;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collRelDivisionActividadDocentes) {
				foreach ((array) $this->collRelDivisionActividadDocentes as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRelDocenteEstablecimientos) {
				foreach ((array) $this->collRelDocenteEstablecimientos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collDocenteHorarios) {
				foreach ((array) $this->collDocenteHorarios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRelAnioActividadDocentes) {
				foreach ((array) $this->collRelAnioActividadDocentes as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collRelDivisionActividadDocentes = null;
		$this->collRelDocenteEstablecimientos = null;
		$this->collDocenteHorarios = null;
		$this->collRelAnioActividadDocentes = null;
			$this->aTipodocumento = null;
			$this->aProvincia = null;
			$this->aPais = null;
	}

} 