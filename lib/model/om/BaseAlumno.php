<?php


abstract class BaseAlumno extends BaseObject  implements Persistent {


  const PEER = 'AlumnoPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $legajo_prefijo;

	
	protected $legajo_numero;

	
	protected $nombre;

	
	protected $apellido_materno;

	
	protected $apellido;

	
	protected $fecha_nacimiento;

	
	protected $direccion;

	
	protected $ciudad;

	
	protected $codigo_postal;

	
	protected $fk_provincia_id;

	
	protected $telefono;

	
	protected $lugar_nacimiento;

	
	protected $fk_tipodocumento_id;

	
	protected $nro_documento;

	
	protected $sexo;

	
	protected $email;

	
	protected $distancia_escuela;

	
	protected $hermanos_escuela;

	
	protected $hijo_maestro_escuela;

	
	protected $fk_establecimiento_id;

	
	protected $fk_cuenta_id;

	
	protected $certificado_medico;

	
	protected $activo;

	
	protected $fk_conceptobaja_id;

	
	protected $fk_pais_id;

	
	protected $procedencia;

	
	protected $fk_estadoalumno_id;

	
	protected $observacion;

	
	protected $aProvincia;

	
	protected $aTipodocumento;

	
	protected $aEstablecimiento;

	
	protected $aCuenta;

	
	protected $aConceptobaja;

	
	protected $aPais;

	
	protected $aEstadosalumnos;

	
	protected $collRelCalendariovacunacionAlumnos;

	
	private $lastRelCalendariovacunacionAlumnoCriteria = null;

	
	protected $collLegajopedagogicos;

	
	private $lastLegajopedagogicoCriteria = null;

	
	protected $collAsistencias;

	
	private $lastAsistenciaCriteria = null;

	
	protected $collBoletinConceptuals;

	
	private $lastBoletinConceptualCriteria = null;

	
	protected $collBoletinActividadess;

	
	private $lastBoletinActividadesCriteria = null;

	
	protected $collExamens;

	
	private $lastExamenCriteria = null;

	
	protected $collRelAlumnoDivisions;

	
	private $lastRelAlumnoDivisionCriteria = null;

	
	protected $collRelRolresponsableResponsables;

	
	private $lastRelRolresponsableResponsableCriteria = null;

	
	protected $collLegajosaluds;

	
	private $lastLegajosaludCriteria = null;

	
	protected $collAlumnoSaluds;

	
	private $lastAlumnoSaludCriteria = null;

	
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
		$this->distancia_escuela = 0;
		$this->hermanos_escuela = false;
		$this->hijo_maestro_escuela = false;
		$this->fk_establecimiento_id = 0;
		$this->fk_cuenta_id = 0;
		$this->certificado_medico = false;
		$this->activo = true;
		$this->fk_pais_id = 0;
		$this->fk_estadoalumno_id = 1;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getLegajoPrefijo()
	{
		return $this->legajo_prefijo;
	}

	
	public function getLegajoNumero()
	{
		return $this->legajo_numero;
	}

	
	public function getNombre()
	{
		return $this->nombre;
	}

	
	public function getApellidoMaterno()
	{
		return $this->apellido_materno;
	}

	
	public function getApellido()
	{
		return $this->apellido;
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

	
	public function getProcedencia()
	{
		return $this->procedencia;
	}

	
	public function getFkEstadoalumnoId()
	{
		return $this->fk_estadoalumno_id;
	}

	
	public function getObservacion()
	{
		return $this->observacion;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AlumnoPeer::ID;
		}

		return $this;
	} 
	
	public function setLegajoPrefijo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->legajo_prefijo !== $v) {
			$this->legajo_prefijo = $v;
			$this->modifiedColumns[] = AlumnoPeer::LEGAJO_PREFIJO;
		}

		return $this;
	} 
	
	public function setLegajoNumero($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->legajo_numero !== $v) {
			$this->legajo_numero = $v;
			$this->modifiedColumns[] = AlumnoPeer::LEGAJO_NUMERO;
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
			$this->modifiedColumns[] = AlumnoPeer::NOMBRE;
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
			$this->modifiedColumns[] = AlumnoPeer::APELLIDO_MATERNO;
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
			$this->modifiedColumns[] = AlumnoPeer::APELLIDO;
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
				$this->modifiedColumns[] = AlumnoPeer::FECHA_NACIMIENTO;
			}
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
			$this->modifiedColumns[] = AlumnoPeer::DIRECCION;
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
			$this->modifiedColumns[] = AlumnoPeer::CIUDAD;
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
			$this->modifiedColumns[] = AlumnoPeer::CODIGO_POSTAL;
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
			$this->modifiedColumns[] = AlumnoPeer::FK_PROVINCIA_ID;
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
			$this->modifiedColumns[] = AlumnoPeer::TELEFONO;
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
			$this->modifiedColumns[] = AlumnoPeer::LUGAR_NACIMIENTO;
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
			$this->modifiedColumns[] = AlumnoPeer::FK_TIPODOCUMENTO_ID;
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
			$this->modifiedColumns[] = AlumnoPeer::NRO_DOCUMENTO;
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
			$this->modifiedColumns[] = AlumnoPeer::SEXO;
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
			$this->modifiedColumns[] = AlumnoPeer::EMAIL;
		}

		return $this;
	} 
	
	public function setDistanciaEscuela($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->distancia_escuela !== $v || $v === 0) {
			$this->distancia_escuela = $v;
			$this->modifiedColumns[] = AlumnoPeer::DISTANCIA_ESCUELA;
		}

		return $this;
	} 
	
	public function setHermanosEscuela($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->hermanos_escuela !== $v || $v === false) {
			$this->hermanos_escuela = $v;
			$this->modifiedColumns[] = AlumnoPeer::HERMANOS_ESCUELA;
		}

		return $this;
	} 
	
	public function setHijoMaestroEscuela($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->hijo_maestro_escuela !== $v || $v === false) {
			$this->hijo_maestro_escuela = $v;
			$this->modifiedColumns[] = AlumnoPeer::HIJO_MAESTRO_ESCUELA;
		}

		return $this;
	} 
	
	public function setFkEstablecimientoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_establecimiento_id !== $v || $v === 0) {
			$this->fk_establecimiento_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
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
			$this->modifiedColumns[] = AlumnoPeer::FK_CUENTA_ID;
		}

		if ($this->aCuenta !== null && $this->aCuenta->getId() !== $v) {
			$this->aCuenta = null;
		}

		return $this;
	} 
	
	public function setCertificadoMedico($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->certificado_medico !== $v || $v === false) {
			$this->certificado_medico = $v;
			$this->modifiedColumns[] = AlumnoPeer::CERTIFICADO_MEDICO;
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
			$this->modifiedColumns[] = AlumnoPeer::ACTIVO;
		}

		return $this;
	} 
	
	public function setFkConceptobajaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_conceptobaja_id !== $v) {
			$this->fk_conceptobaja_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_CONCEPTOBAJA_ID;
		}

		if ($this->aConceptobaja !== null && $this->aConceptobaja->getId() !== $v) {
			$this->aConceptobaja = null;
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
			$this->modifiedColumns[] = AlumnoPeer::FK_PAIS_ID;
		}

		if ($this->aPais !== null && $this->aPais->getId() !== $v) {
			$this->aPais = null;
		}

		return $this;
	} 
	
	public function setProcedencia($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->procedencia !== $v) {
			$this->procedencia = $v;
			$this->modifiedColumns[] = AlumnoPeer::PROCEDENCIA;
		}

		return $this;
	} 
	
	public function setFkEstadoalumnoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_estadoalumno_id !== $v || $v === 1) {
			$this->fk_estadoalumno_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_ESTADOALUMNO_ID;
		}

		if ($this->aEstadosalumnos !== null && $this->aEstadosalumnos->getId() !== $v) {
			$this->aEstadosalumnos = null;
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
			$this->modifiedColumns[] = AlumnoPeer::OBSERVACION;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(AlumnoPeer::FK_PROVINCIA_ID,AlumnoPeer::FK_TIPODOCUMENTO_ID,AlumnoPeer::DISTANCIA_ESCUELA,AlumnoPeer::HERMANOS_ESCUELA,AlumnoPeer::HIJO_MAESTRO_ESCUELA,AlumnoPeer::FK_ESTABLECIMIENTO_ID,AlumnoPeer::FK_CUENTA_ID,AlumnoPeer::CERTIFICADO_MEDICO,AlumnoPeer::ACTIVO,AlumnoPeer::FK_PAIS_ID,AlumnoPeer::FK_ESTADOALUMNO_ID))) {
				return false;
			}

			if ($this->fk_provincia_id !== 0) {
				return false;
			}

			if ($this->fk_tipodocumento_id !== 0) {
				return false;
			}

			if ($this->distancia_escuela !== 0) {
				return false;
			}

			if ($this->hermanos_escuela !== false) {
				return false;
			}

			if ($this->hijo_maestro_escuela !== false) {
				return false;
			}

			if ($this->fk_establecimiento_id !== 0) {
				return false;
			}

			if ($this->fk_cuenta_id !== 0) {
				return false;
			}

			if ($this->certificado_medico !== false) {
				return false;
			}

			if ($this->activo !== true) {
				return false;
			}

			if ($this->fk_pais_id !== 0) {
				return false;
			}

			if ($this->fk_estadoalumno_id !== 1) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->legajo_prefijo = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->legajo_numero = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->nombre = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->apellido_materno = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->apellido = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->fecha_nacimiento = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->direccion = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->ciudad = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->codigo_postal = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->fk_provincia_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->telefono = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->lugar_nacimiento = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->fk_tipodocumento_id = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->nro_documento = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->sexo = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->email = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->distancia_escuela = ($row[$startcol + 17] !== null) ? (int) $row[$startcol + 17] : null;
			$this->hermanos_escuela = ($row[$startcol + 18] !== null) ? (boolean) $row[$startcol + 18] : null;
			$this->hijo_maestro_escuela = ($row[$startcol + 19] !== null) ? (boolean) $row[$startcol + 19] : null;
			$this->fk_establecimiento_id = ($row[$startcol + 20] !== null) ? (int) $row[$startcol + 20] : null;
			$this->fk_cuenta_id = ($row[$startcol + 21] !== null) ? (int) $row[$startcol + 21] : null;
			$this->certificado_medico = ($row[$startcol + 22] !== null) ? (boolean) $row[$startcol + 22] : null;
			$this->activo = ($row[$startcol + 23] !== null) ? (boolean) $row[$startcol + 23] : null;
			$this->fk_conceptobaja_id = ($row[$startcol + 24] !== null) ? (int) $row[$startcol + 24] : null;
			$this->fk_pais_id = ($row[$startcol + 25] !== null) ? (int) $row[$startcol + 25] : null;
			$this->procedencia = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
			$this->fk_estadoalumno_id = ($row[$startcol + 27] !== null) ? (int) $row[$startcol + 27] : null;
			$this->observacion = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 29; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Alumno object", $e);
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
		if ($this->aEstablecimiento !== null && $this->fk_establecimiento_id !== $this->aEstablecimiento->getId()) {
			$this->aEstablecimiento = null;
		}
		if ($this->aCuenta !== null && $this->fk_cuenta_id !== $this->aCuenta->getId()) {
			$this->aCuenta = null;
		}
		if ($this->aConceptobaja !== null && $this->fk_conceptobaja_id !== $this->aConceptobaja->getId()) {
			$this->aConceptobaja = null;
		}
		if ($this->aPais !== null && $this->fk_pais_id !== $this->aPais->getId()) {
			$this->aPais = null;
		}
		if ($this->aEstadosalumnos !== null && $this->fk_estadoalumno_id !== $this->aEstadosalumnos->getId()) {
			$this->aEstadosalumnos = null;
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
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = AlumnoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aProvincia = null;
			$this->aTipodocumento = null;
			$this->aEstablecimiento = null;
			$this->aCuenta = null;
			$this->aConceptobaja = null;
			$this->aPais = null;
			$this->aEstadosalumnos = null;
			$this->collRelCalendariovacunacionAlumnos = null;
			$this->lastRelCalendariovacunacionAlumnoCriteria = null;

			$this->collLegajopedagogicos = null;
			$this->lastLegajopedagogicoCriteria = null;

			$this->collAsistencias = null;
			$this->lastAsistenciaCriteria = null;

			$this->collBoletinConceptuals = null;
			$this->lastBoletinConceptualCriteria = null;

			$this->collBoletinActividadess = null;
			$this->lastBoletinActividadesCriteria = null;

			$this->collExamens = null;
			$this->lastExamenCriteria = null;

			$this->collRelAlumnoDivisions = null;
			$this->lastRelAlumnoDivisionCriteria = null;

			$this->collRelRolresponsableResponsables = null;
			$this->lastRelRolresponsableResponsableCriteria = null;

			$this->collLegajosaluds = null;
			$this->lastLegajosaludCriteria = null;

			$this->collAlumnoSaluds = null;
			$this->lastAlumnoSaludCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			AlumnoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			AlumnoPeer::addInstanceToPool($this);
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

			if ($this->aEstablecimiento !== null) {
				if ($this->aEstablecimiento->isModified() || $this->aEstablecimiento->isNew()) {
					$affectedRows += $this->aEstablecimiento->save($con);
				}
				$this->setEstablecimiento($this->aEstablecimiento);
			}

			if ($this->aCuenta !== null) {
				if ($this->aCuenta->isModified() || $this->aCuenta->isNew()) {
					$affectedRows += $this->aCuenta->save($con);
				}
				$this->setCuenta($this->aCuenta);
			}

			if ($this->aConceptobaja !== null) {
				if ($this->aConceptobaja->isModified() || $this->aConceptobaja->isNew()) {
					$affectedRows += $this->aConceptobaja->save($con);
				}
				$this->setConceptobaja($this->aConceptobaja);
			}

			if ($this->aPais !== null) {
				if ($this->aPais->isModified() || $this->aPais->isNew()) {
					$affectedRows += $this->aPais->save($con);
				}
				$this->setPais($this->aPais);
			}

			if ($this->aEstadosalumnos !== null) {
				if ($this->aEstadosalumnos->isModified() || $this->aEstadosalumnos->isNew()) {
					$affectedRows += $this->aEstadosalumnos->save($con);
				}
				$this->setEstadosalumnos($this->aEstadosalumnos);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AlumnoPeer::ID;
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
				foreach ($this->collRelCalendariovacunacionAlumnos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLegajopedagogicos !== null) {
				foreach ($this->collLegajopedagogicos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAsistencias !== null) {
				foreach ($this->collAsistencias as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collBoletinConceptuals !== null) {
				foreach ($this->collBoletinConceptuals as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collBoletinActividadess !== null) {
				foreach ($this->collBoletinActividadess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collExamens !== null) {
				foreach ($this->collExamens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelAlumnoDivisions !== null) {
				foreach ($this->collRelAlumnoDivisions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelRolresponsableResponsables !== null) {
				foreach ($this->collRelRolresponsableResponsables as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLegajosaluds !== null) {
				foreach ($this->collLegajosaluds as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAlumnoSaluds !== null) {
				foreach ($this->collAlumnoSaluds as $referrerFK) {
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

			if ($this->aEstablecimiento !== null) {
				if (!$this->aEstablecimiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstablecimiento->getValidationFailures());
				}
			}

			if ($this->aCuenta !== null) {
				if (!$this->aCuenta->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCuenta->getValidationFailures());
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

			if ($this->aEstadosalumnos !== null) {
				if (!$this->aEstadosalumnos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstadosalumnos->getValidationFailures());
				}
			}


			if (($retval = AlumnoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelCalendariovacunacionAlumnos !== null) {
					foreach ($this->collRelCalendariovacunacionAlumnos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLegajopedagogicos !== null) {
					foreach ($this->collLegajopedagogicos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAsistencias !== null) {
					foreach ($this->collAsistencias as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBoletinConceptuals !== null) {
					foreach ($this->collBoletinConceptuals as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBoletinActividadess !== null) {
					foreach ($this->collBoletinActividadess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collExamens !== null) {
					foreach ($this->collExamens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelAlumnoDivisions !== null) {
					foreach ($this->collRelAlumnoDivisions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelRolresponsableResponsables !== null) {
					foreach ($this->collRelRolresponsableResponsables as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLegajosaluds !== null) {
					foreach ($this->collLegajosaluds as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAlumnoSaluds !== null) {
					foreach ($this->collAlumnoSaluds as $referrerFK) {
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
				return $this->getLegajoPrefijo();
				break;
			case 2:
				return $this->getLegajoNumero();
				break;
			case 3:
				return $this->getNombre();
				break;
			case 4:
				return $this->getApellidoMaterno();
				break;
			case 5:
				return $this->getApellido();
				break;
			case 6:
				return $this->getFechaNacimiento();
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
				return $this->getFkProvinciaId();
				break;
			case 11:
				return $this->getTelefono();
				break;
			case 12:
				return $this->getLugarNacimiento();
				break;
			case 13:
				return $this->getFkTipodocumentoId();
				break;
			case 14:
				return $this->getNroDocumento();
				break;
			case 15:
				return $this->getSexo();
				break;
			case 16:
				return $this->getEmail();
				break;
			case 17:
				return $this->getDistanciaEscuela();
				break;
			case 18:
				return $this->getHermanosEscuela();
				break;
			case 19:
				return $this->getHijoMaestroEscuela();
				break;
			case 20:
				return $this->getFkEstablecimientoId();
				break;
			case 21:
				return $this->getFkCuentaId();
				break;
			case 22:
				return $this->getCertificadoMedico();
				break;
			case 23:
				return $this->getActivo();
				break;
			case 24:
				return $this->getFkConceptobajaId();
				break;
			case 25:
				return $this->getFkPaisId();
				break;
			case 26:
				return $this->getProcedencia();
				break;
			case 27:
				return $this->getFkEstadoalumnoId();
				break;
			case 28:
				return $this->getObservacion();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = AlumnoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getLegajoPrefijo(),
			$keys[2] => $this->getLegajoNumero(),
			$keys[3] => $this->getNombre(),
			$keys[4] => $this->getApellidoMaterno(),
			$keys[5] => $this->getApellido(),
			$keys[6] => $this->getFechaNacimiento(),
			$keys[7] => $this->getDireccion(),
			$keys[8] => $this->getCiudad(),
			$keys[9] => $this->getCodigoPostal(),
			$keys[10] => $this->getFkProvinciaId(),
			$keys[11] => $this->getTelefono(),
			$keys[12] => $this->getLugarNacimiento(),
			$keys[13] => $this->getFkTipodocumentoId(),
			$keys[14] => $this->getNroDocumento(),
			$keys[15] => $this->getSexo(),
			$keys[16] => $this->getEmail(),
			$keys[17] => $this->getDistanciaEscuela(),
			$keys[18] => $this->getHermanosEscuela(),
			$keys[19] => $this->getHijoMaestroEscuela(),
			$keys[20] => $this->getFkEstablecimientoId(),
			$keys[21] => $this->getFkCuentaId(),
			$keys[22] => $this->getCertificadoMedico(),
			$keys[23] => $this->getActivo(),
			$keys[24] => $this->getFkConceptobajaId(),
			$keys[25] => $this->getFkPaisId(),
			$keys[26] => $this->getProcedencia(),
			$keys[27] => $this->getFkEstadoalumnoId(),
			$keys[28] => $this->getObservacion(),
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
				$this->setLegajoPrefijo($value);
				break;
			case 2:
				$this->setLegajoNumero($value);
				break;
			case 3:
				$this->setNombre($value);
				break;
			case 4:
				$this->setApellidoMaterno($value);
				break;
			case 5:
				$this->setApellido($value);
				break;
			case 6:
				$this->setFechaNacimiento($value);
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
				$this->setFkProvinciaId($value);
				break;
			case 11:
				$this->setTelefono($value);
				break;
			case 12:
				$this->setLugarNacimiento($value);
				break;
			case 13:
				$this->setFkTipodocumentoId($value);
				break;
			case 14:
				$this->setNroDocumento($value);
				break;
			case 15:
				$this->setSexo($value);
				break;
			case 16:
				$this->setEmail($value);
				break;
			case 17:
				$this->setDistanciaEscuela($value);
				break;
			case 18:
				$this->setHermanosEscuela($value);
				break;
			case 19:
				$this->setHijoMaestroEscuela($value);
				break;
			case 20:
				$this->setFkEstablecimientoId($value);
				break;
			case 21:
				$this->setFkCuentaId($value);
				break;
			case 22:
				$this->setCertificadoMedico($value);
				break;
			case 23:
				$this->setActivo($value);
				break;
			case 24:
				$this->setFkConceptobajaId($value);
				break;
			case 25:
				$this->setFkPaisId($value);
				break;
			case 26:
				$this->setProcedencia($value);
				break;
			case 27:
				$this->setFkEstadoalumnoId($value);
				break;
			case 28:
				$this->setObservacion($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AlumnoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLegajoPrefijo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLegajoNumero($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNombre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setApellidoMaterno($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setApellido($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFechaNacimiento($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDireccion($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCiudad($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodigoPostal($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFkProvinciaId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTelefono($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setLugarNacimiento($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFkTipodocumentoId($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setNroDocumento($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setSexo($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setEmail($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setDistanciaEscuela($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setHermanosEscuela($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setHijoMaestroEscuela($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFkEstablecimientoId($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFkCuentaId($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCertificadoMedico($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setActivo($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setFkConceptobajaId($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setFkPaisId($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setProcedencia($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setFkEstadoalumnoId($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setObservacion($arr[$keys[28]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlumnoPeer::ID)) $criteria->add(AlumnoPeer::ID, $this->id);
		if ($this->isColumnModified(AlumnoPeer::LEGAJO_PREFIJO)) $criteria->add(AlumnoPeer::LEGAJO_PREFIJO, $this->legajo_prefijo);
		if ($this->isColumnModified(AlumnoPeer::LEGAJO_NUMERO)) $criteria->add(AlumnoPeer::LEGAJO_NUMERO, $this->legajo_numero);
		if ($this->isColumnModified(AlumnoPeer::NOMBRE)) $criteria->add(AlumnoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(AlumnoPeer::APELLIDO_MATERNO)) $criteria->add(AlumnoPeer::APELLIDO_MATERNO, $this->apellido_materno);
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
		if ($this->isColumnModified(AlumnoPeer::PROCEDENCIA)) $criteria->add(AlumnoPeer::PROCEDENCIA, $this->procedencia);
		if ($this->isColumnModified(AlumnoPeer::FK_ESTADOALUMNO_ID)) $criteria->add(AlumnoPeer::FK_ESTADOALUMNO_ID, $this->fk_estadoalumno_id);
		if ($this->isColumnModified(AlumnoPeer::OBSERVACION)) $criteria->add(AlumnoPeer::OBSERVACION, $this->observacion);

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

		$copyObj->setLegajoPrefijo($this->legajo_prefijo);

		$copyObj->setLegajoNumero($this->legajo_numero);

		$copyObj->setNombre($this->nombre);

		$copyObj->setApellidoMaterno($this->apellido_materno);

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

		$copyObj->setProcedencia($this->procedencia);

		$copyObj->setFkEstadoalumnoId($this->fk_estadoalumno_id);

		$copyObj->setObservacion($this->observacion);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getRelCalendariovacunacionAlumnos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelCalendariovacunacionAlumno($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLegajopedagogicos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addLegajopedagogico($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAsistencias() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addAsistencia($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getBoletinConceptuals() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addBoletinConceptual($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getBoletinActividadess() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addBoletinActividades($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getExamens() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addExamen($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRelAlumnoDivisions() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelAlumnoDivision($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRelRolresponsableResponsables() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelRolresponsableResponsable($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLegajosaluds() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addLegajosalud($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAlumnoSaluds() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addAlumnoSalud($relObj->copy($deepCopy));
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
			self::$peer = new AlumnoPeer();
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
			$v->addAlumno($this);
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
			$v->addAlumno($this);
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

	
	public function setEstablecimiento(Establecimiento $v = null)
	{
		if ($v === null) {
			$this->setFkEstablecimientoId(0);
		} else {
			$this->setFkEstablecimientoId($v->getId());
		}

		$this->aEstablecimiento = $v;

						if ($v !== null) {
			$v->addAlumno($this);
		}

		return $this;
	}


	
	public function getEstablecimiento(PropelPDO $con = null)
	{
		if ($this->aEstablecimiento === null && ($this->fk_establecimiento_id !== null)) {
			$c = new Criteria(EstablecimientoPeer::DATABASE_NAME);
			$c->add(EstablecimientoPeer::ID, $this->fk_establecimiento_id);
			$this->aEstablecimiento = EstablecimientoPeer::doSelectOne($c, $con);
			
		}
		return $this->aEstablecimiento;
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
			$v->addAlumno($this);
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

	
	public function setConceptobaja(Conceptobaja $v = null)
	{
		if ($v === null) {
			$this->setFkConceptobajaId(NULL);
		} else {
			$this->setFkConceptobajaId($v->getId());
		}

		$this->aConceptobaja = $v;

						if ($v !== null) {
			$v->addAlumno($this);
		}

		return $this;
	}


	
	public function getConceptobaja(PropelPDO $con = null)
	{
		if ($this->aConceptobaja === null && ($this->fk_conceptobaja_id !== null)) {
			$c = new Criteria(ConceptobajaPeer::DATABASE_NAME);
			$c->add(ConceptobajaPeer::ID, $this->fk_conceptobaja_id);
			$this->aConceptobaja = ConceptobajaPeer::doSelectOne($c, $con);
			
		}
		return $this->aConceptobaja;
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
			$v->addAlumno($this);
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

	
	public function setEstadosalumnos(Estadosalumnos $v = null)
	{
		if ($v === null) {
			$this->setFkEstadoalumnoId(1);
		} else {
			$this->setFkEstadoalumnoId($v->getId());
		}

		$this->aEstadosalumnos = $v;

						if ($v !== null) {
			$v->addAlumno($this);
		}

		return $this;
	}


	
	public function getEstadosalumnos(PropelPDO $con = null)
	{
		if ($this->aEstadosalumnos === null && ($this->fk_estadoalumno_id !== null)) {
			$c = new Criteria(EstadosalumnosPeer::DATABASE_NAME);
			$c->add(EstadosalumnosPeer::ID, $this->fk_estadoalumno_id);
			$this->aEstadosalumnos = EstadosalumnosPeer::doSelectOne($c, $con);
			
		}
		return $this->aEstadosalumnos;
	}

	
	public function clearRelCalendariovacunacionAlumnos()
	{
		$this->collRelCalendariovacunacionAlumnos = null; 	}

	
	public function initRelCalendariovacunacionAlumnos()
	{
		$this->collRelCalendariovacunacionAlumnos = array();
	}

	
	public function getRelCalendariovacunacionAlumnos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelCalendariovacunacionAlumnos === null) {
			if ($this->isNew()) {
			   $this->collRelCalendariovacunacionAlumnos = array();
			} else {

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->id);

				RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
				$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->id);

				RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelCalendariovacunacionAlumnoCriteria) || !$this->lastRelCalendariovacunacionAlumnoCriteria->equals($criteria)) {
					$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelCalendariovacunacionAlumnoCriteria = $criteria;
		return $this->collRelCalendariovacunacionAlumnos;
	}

	
	public function countRelCalendariovacunacionAlumnos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelCalendariovacunacionAlumnos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->id);

				$count = RelCalendariovacunacionAlumnoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->id);

				if (!isset($this->lastRelCalendariovacunacionAlumnoCriteria) || !$this->lastRelCalendariovacunacionAlumnoCriteria->equals($criteria)) {
					$count = RelCalendariovacunacionAlumnoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelCalendariovacunacionAlumnos);
				}
			} else {
				$count = count($this->collRelCalendariovacunacionAlumnos);
			}
		}
		return $count;
	}

	
	public function addRelCalendariovacunacionAlumno(RelCalendariovacunacionAlumno $l)
	{
		if ($this->collRelCalendariovacunacionAlumnos === null) {
			$this->initRelCalendariovacunacionAlumnos();
		}
		if (!in_array($l, $this->collRelCalendariovacunacionAlumnos, true)) { 			array_push($this->collRelCalendariovacunacionAlumnos, $l);
			$l->setAlumno($this);
		}
	}


	
	public function getRelCalendariovacunacionAlumnosJoinCalendariovacunacion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelCalendariovacunacionAlumnos === null) {
			if ($this->isNew()) {
				$this->collRelCalendariovacunacionAlumnos = array();
			} else {

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->id);

				$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelectJoinCalendariovacunacion($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastRelCalendariovacunacionAlumnoCriteria) || !$this->lastRelCalendariovacunacionAlumnoCriteria->equals($criteria)) {
				$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelectJoinCalendariovacunacion($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelCalendariovacunacionAlumnoCriteria = $criteria;

		return $this->collRelCalendariovacunacionAlumnos;
	}

	
	public function clearLegajopedagogicos()
	{
		$this->collLegajopedagogicos = null; 	}

	
	public function initLegajopedagogicos()
	{
		$this->collLegajopedagogicos = array();
	}

	
	public function getLegajopedagogicos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
			   $this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->id);

				LegajopedagogicoPeer::addSelectColumns($criteria);
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->id);

				LegajopedagogicoPeer::addSelectColumns($criteria);
				if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
					$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;
		return $this->collLegajopedagogicos;
	}

	
	public function countLegajopedagogicos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->id);

				$count = LegajopedagogicoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->id);

				if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
					$count = LegajopedagogicoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collLegajopedagogicos);
				}
			} else {
				$count = count($this->collLegajopedagogicos);
			}
		}
		return $count;
	}

	
	public function addLegajopedagogico(Legajopedagogico $l)
	{
		if ($this->collLegajopedagogicos === null) {
			$this->initLegajopedagogicos();
		}
		if (!in_array($l, $this->collLegajopedagogicos, true)) { 			array_push($this->collLegajopedagogicos, $l);
			$l->setAlumno($this);
		}
	}


	
	public function getLegajopedagogicosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->id);

				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}


	
	public function getLegajopedagogicosJoinLegajocategoria($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->id);

				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinLegajocategoria($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinLegajocategoria($criteria, $con, $join_behavior);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}

	
	public function clearAsistencias()
	{
		$this->collAsistencias = null; 	}

	
	public function initAsistencias()
	{
		$this->collAsistencias = array();
	}

	
	public function getAsistencias($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAsistencias === null) {
			if ($this->isNew()) {
			   $this->collAsistencias = array();
			} else {

				$criteria->add(AsistenciaPeer::FK_ALUMNO_ID, $this->id);

				AsistenciaPeer::addSelectColumns($criteria);
				$this->collAsistencias = AsistenciaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AsistenciaPeer::FK_ALUMNO_ID, $this->id);

				AsistenciaPeer::addSelectColumns($criteria);
				if (!isset($this->lastAsistenciaCriteria) || !$this->lastAsistenciaCriteria->equals($criteria)) {
					$this->collAsistencias = AsistenciaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAsistenciaCriteria = $criteria;
		return $this->collAsistencias;
	}

	
	public function countAsistencias(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAsistencias === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AsistenciaPeer::FK_ALUMNO_ID, $this->id);

				$count = AsistenciaPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AsistenciaPeer::FK_ALUMNO_ID, $this->id);

				if (!isset($this->lastAsistenciaCriteria) || !$this->lastAsistenciaCriteria->equals($criteria)) {
					$count = AsistenciaPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collAsistencias);
				}
			} else {
				$count = count($this->collAsistencias);
			}
		}
		return $count;
	}

	
	public function addAsistencia(Asistencia $l)
	{
		if ($this->collAsistencias === null) {
			$this->initAsistencias();
		}
		if (!in_array($l, $this->collAsistencias, true)) { 			array_push($this->collAsistencias, $l);
			$l->setAlumno($this);
		}
	}


	
	public function getAsistenciasJoinTipoasistencia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAsistencias === null) {
			if ($this->isNew()) {
				$this->collAsistencias = array();
			} else {

				$criteria->add(AsistenciaPeer::FK_ALUMNO_ID, $this->id);

				$this->collAsistencias = AsistenciaPeer::doSelectJoinTipoasistencia($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AsistenciaPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastAsistenciaCriteria) || !$this->lastAsistenciaCriteria->equals($criteria)) {
				$this->collAsistencias = AsistenciaPeer::doSelectJoinTipoasistencia($criteria, $con, $join_behavior);
			}
		}
		$this->lastAsistenciaCriteria = $criteria;

		return $this->collAsistencias;
	}

	
	public function clearBoletinConceptuals()
	{
		$this->collBoletinConceptuals = null; 	}

	
	public function initBoletinConceptuals()
	{
		$this->collBoletinConceptuals = array();
	}

	
	public function getBoletinConceptuals($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinConceptuals === null) {
			if ($this->isNew()) {
			   $this->collBoletinConceptuals = array();
			} else {

				$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->id);

				BoletinConceptualPeer::addSelectColumns($criteria);
				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->id);

				BoletinConceptualPeer::addSelectColumns($criteria);
				if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
					$this->collBoletinConceptuals = BoletinConceptualPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBoletinConceptualCriteria = $criteria;
		return $this->collBoletinConceptuals;
	}

	
	public function countBoletinConceptuals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collBoletinConceptuals === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->id);

				$count = BoletinConceptualPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->id);

				if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
					$count = BoletinConceptualPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collBoletinConceptuals);
				}
			} else {
				$count = count($this->collBoletinConceptuals);
			}
		}
		return $count;
	}

	
	public function addBoletinConceptual(BoletinConceptual $l)
	{
		if ($this->collBoletinConceptuals === null) {
			$this->initBoletinConceptuals();
		}
		if (!in_array($l, $this->collBoletinConceptuals, true)) { 			array_push($this->collBoletinConceptuals, $l);
			$l->setAlumno($this);
		}
	}


	
	public function getBoletinConceptualsJoinEscalanota($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinConceptuals === null) {
			if ($this->isNew()) {
				$this->collBoletinConceptuals = array();
			} else {

				$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->id);

				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinEscalanota($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinEscalanota($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletinConceptualCriteria = $criteria;

		return $this->collBoletinConceptuals;
	}


	
	public function getBoletinConceptualsJoinConcepto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinConceptuals === null) {
			if ($this->isNew()) {
				$this->collBoletinConceptuals = array();
			} else {

				$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->id);

				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinConcepto($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinConcepto($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletinConceptualCriteria = $criteria;

		return $this->collBoletinConceptuals;
	}


	
	public function getBoletinConceptualsJoinPeriodo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinConceptuals === null) {
			if ($this->isNew()) {
				$this->collBoletinConceptuals = array();
			} else {

				$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->id);

				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinPeriodo($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinPeriodo($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletinConceptualCriteria = $criteria;

		return $this->collBoletinConceptuals;
	}

	
	public function clearBoletinActividadess()
	{
		$this->collBoletinActividadess = null; 	}

	
	public function initBoletinActividadess()
	{
		$this->collBoletinActividadess = array();
	}

	
	public function getBoletinActividadess($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
			   $this->collBoletinActividadess = array();
			} else {

				$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->id);

				BoletinActividadesPeer::addSelectColumns($criteria);
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->id);

				BoletinActividadesPeer::addSelectColumns($criteria);
				if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
					$this->collBoletinActividadess = BoletinActividadesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;
		return $this->collBoletinActividadess;
	}

	
	public function countBoletinActividadess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->id);

				$count = BoletinActividadesPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->id);

				if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
					$count = BoletinActividadesPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collBoletinActividadess);
				}
			} else {
				$count = count($this->collBoletinActividadess);
			}
		}
		return $count;
	}

	
	public function addBoletinActividades(BoletinActividades $l)
	{
		if ($this->collBoletinActividadess === null) {
			$this->initBoletinActividadess();
		}
		if (!in_array($l, $this->collBoletinActividadess, true)) { 			array_push($this->collBoletinActividadess, $l);
			$l->setAlumno($this);
		}
	}


	
	public function getBoletinActividadessJoinEscalanota($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
				$this->collBoletinActividadess = array();
			} else {

				$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->id);

				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinEscalanota($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinEscalanota($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;

		return $this->collBoletinActividadess;
	}


	
	public function getBoletinActividadessJoinActividad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
				$this->collBoletinActividadess = array();
			} else {

				$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->id);

				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;

		return $this->collBoletinActividadess;
	}


	
	public function getBoletinActividadessJoinPeriodo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
				$this->collBoletinActividadess = array();
			} else {

				$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->id);

				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinPeriodo($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinPeriodo($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;

		return $this->collBoletinActividadess;
	}

	
	public function clearExamens()
	{
		$this->collExamens = null; 	}

	
	public function initExamens()
	{
		$this->collExamens = array();
	}

	
	public function getExamens($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExamens === null) {
			if ($this->isNew()) {
			   $this->collExamens = array();
			} else {

				$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->id);

				ExamenPeer::addSelectColumns($criteria);
				$this->collExamens = ExamenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->id);

				ExamenPeer::addSelectColumns($criteria);
				if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
					$this->collExamens = ExamenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastExamenCriteria = $criteria;
		return $this->collExamens;
	}

	
	public function countExamens(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collExamens === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->id);

				$count = ExamenPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->id);

				if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
					$count = ExamenPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collExamens);
				}
			} else {
				$count = count($this->collExamens);
			}
		}
		return $count;
	}

	
	public function addExamen(Examen $l)
	{
		if ($this->collExamens === null) {
			$this->initExamens();
		}
		if (!in_array($l, $this->collExamens, true)) { 			array_push($this->collExamens, $l);
			$l->setAlumno($this);
		}
	}


	
	public function getExamensJoinEscalanota($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExamens === null) {
			if ($this->isNew()) {
				$this->collExamens = array();
			} else {

				$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->id);

				$this->collExamens = ExamenPeer::doSelectJoinEscalanota($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinEscalanota($criteria, $con, $join_behavior);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
	}


	
	public function getExamensJoinActividad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExamens === null) {
			if ($this->isNew()) {
				$this->collExamens = array();
			} else {

				$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->id);

				$this->collExamens = ExamenPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
	}


	
	public function getExamensJoinPeriodo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExamens === null) {
			if ($this->isNew()) {
				$this->collExamens = array();
			} else {

				$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->id);

				$this->collExamens = ExamenPeer::doSelectJoinPeriodo($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinPeriodo($criteria, $con, $join_behavior);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
	}

	
	public function clearRelAlumnoDivisions()
	{
		$this->collRelAlumnoDivisions = null; 	}

	
	public function initRelAlumnoDivisions()
	{
		$this->collRelAlumnoDivisions = array();
	}

	
	public function getRelAlumnoDivisions($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAlumnoDivisions === null) {
			if ($this->isNew()) {
			   $this->collRelAlumnoDivisions = array();
			} else {

				$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->id);

				RelAlumnoDivisionPeer::addSelectColumns($criteria);
				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->id);

				RelAlumnoDivisionPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelAlumnoDivisionCriteria) || !$this->lastRelAlumnoDivisionCriteria->equals($criteria)) {
					$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelAlumnoDivisionCriteria = $criteria;
		return $this->collRelAlumnoDivisions;
	}

	
	public function countRelAlumnoDivisions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelAlumnoDivisions === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->id);

				$count = RelAlumnoDivisionPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->id);

				if (!isset($this->lastRelAlumnoDivisionCriteria) || !$this->lastRelAlumnoDivisionCriteria->equals($criteria)) {
					$count = RelAlumnoDivisionPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelAlumnoDivisions);
				}
			} else {
				$count = count($this->collRelAlumnoDivisions);
			}
		}
		return $count;
	}

	
	public function addRelAlumnoDivision(RelAlumnoDivision $l)
	{
		if ($this->collRelAlumnoDivisions === null) {
			$this->initRelAlumnoDivisions();
		}
		if (!in_array($l, $this->collRelAlumnoDivisions, true)) { 			array_push($this->collRelAlumnoDivisions, $l);
			$l->setAlumno($this);
		}
	}


	
	public function getRelAlumnoDivisionsJoinDivision($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAlumnoDivisions === null) {
			if ($this->isNew()) {
				$this->collRelAlumnoDivisions = array();
			} else {

				$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->id);

				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelectJoinDivision($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastRelAlumnoDivisionCriteria) || !$this->lastRelAlumnoDivisionCriteria->equals($criteria)) {
				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelectJoinDivision($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelAlumnoDivisionCriteria = $criteria;

		return $this->collRelAlumnoDivisions;
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
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelRolresponsableResponsables === null) {
			if ($this->isNew()) {
			   $this->collRelRolresponsableResponsables = array();
			} else {

				$criteria->add(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, $this->id);

				RelRolresponsableResponsablePeer::addSelectColumns($criteria);
				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, $this->id);

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
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
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

				$criteria->add(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, $this->id);

				$count = RelRolresponsableResponsablePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, $this->id);

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
			$l->setAlumno($this);
		}
	}


	
	public function getRelRolresponsableResponsablesJoinRolResponsable($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelRolresponsableResponsables === null) {
			if ($this->isNew()) {
				$this->collRelRolresponsableResponsables = array();
			} else {

				$criteria->add(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, $this->id);

				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinRolResponsable($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastRelRolresponsableResponsableCriteria) || !$this->lastRelRolresponsableResponsableCriteria->equals($criteria)) {
				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinRolResponsable($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelRolresponsableResponsableCriteria = $criteria;

		return $this->collRelRolresponsableResponsables;
	}


	
	public function getRelRolresponsableResponsablesJoinResponsable($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelRolresponsableResponsables === null) {
			if ($this->isNew()) {
				$this->collRelRolresponsableResponsables = array();
			} else {

				$criteria->add(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, $this->id);

				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinResponsable($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastRelRolresponsableResponsableCriteria) || !$this->lastRelRolresponsableResponsableCriteria->equals($criteria)) {
				$this->collRelRolresponsableResponsables = RelRolresponsableResponsablePeer::doSelectJoinResponsable($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelRolresponsableResponsableCriteria = $criteria;

		return $this->collRelRolresponsableResponsables;
	}

	
	public function clearLegajosaluds()
	{
		$this->collLegajosaluds = null; 	}

	
	public function initLegajosaluds()
	{
		$this->collLegajosaluds = array();
	}

	
	public function getLegajosaluds($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajosaluds === null) {
			if ($this->isNew()) {
			   $this->collLegajosaluds = array();
			} else {

				$criteria->add(LegajosaludPeer::FK_ALUMNO_ID, $this->id);

				LegajosaludPeer::addSelectColumns($criteria);
				$this->collLegajosaluds = LegajosaludPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajosaludPeer::FK_ALUMNO_ID, $this->id);

				LegajosaludPeer::addSelectColumns($criteria);
				if (!isset($this->lastLegajosaludCriteria) || !$this->lastLegajosaludCriteria->equals($criteria)) {
					$this->collLegajosaluds = LegajosaludPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLegajosaludCriteria = $criteria;
		return $this->collLegajosaluds;
	}

	
	public function countLegajosaluds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLegajosaluds === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LegajosaludPeer::FK_ALUMNO_ID, $this->id);

				$count = LegajosaludPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajosaludPeer::FK_ALUMNO_ID, $this->id);

				if (!isset($this->lastLegajosaludCriteria) || !$this->lastLegajosaludCriteria->equals($criteria)) {
					$count = LegajosaludPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collLegajosaluds);
				}
			} else {
				$count = count($this->collLegajosaluds);
			}
		}
		return $count;
	}

	
	public function addLegajosalud(Legajosalud $l)
	{
		if ($this->collLegajosaluds === null) {
			$this->initLegajosaluds();
		}
		if (!in_array($l, $this->collLegajosaluds, true)) { 			array_push($this->collLegajosaluds, $l);
			$l->setAlumno($this);
		}
	}


	
	public function getLegajosaludsJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajosaluds === null) {
			if ($this->isNew()) {
				$this->collLegajosaluds = array();
			} else {

				$criteria->add(LegajosaludPeer::FK_ALUMNO_ID, $this->id);

				$this->collLegajosaluds = LegajosaludPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(LegajosaludPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastLegajosaludCriteria) || !$this->lastLegajosaludCriteria->equals($criteria)) {
				$this->collLegajosaluds = LegajosaludPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastLegajosaludCriteria = $criteria;

		return $this->collLegajosaluds;
	}

	
	public function clearAlumnoSaluds()
	{
		$this->collAlumnoSaluds = null; 	}

	
	public function initAlumnoSaluds()
	{
		$this->collAlumnoSaluds = array();
	}

	
	public function getAlumnoSaluds($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnoSaluds === null) {
			if ($this->isNew()) {
			   $this->collAlumnoSaluds = array();
			} else {

				$criteria->add(AlumnoSaludPeer::FK_ALUMNO_ID, $this->id);

				AlumnoSaludPeer::addSelectColumns($criteria);
				$this->collAlumnoSaluds = AlumnoSaludPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlumnoSaludPeer::FK_ALUMNO_ID, $this->id);

				AlumnoSaludPeer::addSelectColumns($criteria);
				if (!isset($this->lastAlumnoSaludCriteria) || !$this->lastAlumnoSaludCriteria->equals($criteria)) {
					$this->collAlumnoSaluds = AlumnoSaludPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAlumnoSaludCriteria = $criteria;
		return $this->collAlumnoSaluds;
	}

	
	public function countAlumnoSaluds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAlumnoSaluds === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AlumnoSaludPeer::FK_ALUMNO_ID, $this->id);

				$count = AlumnoSaludPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlumnoSaludPeer::FK_ALUMNO_ID, $this->id);

				if (!isset($this->lastAlumnoSaludCriteria) || !$this->lastAlumnoSaludCriteria->equals($criteria)) {
					$count = AlumnoSaludPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collAlumnoSaluds);
				}
			} else {
				$count = count($this->collAlumnoSaluds);
			}
		}
		return $count;
	}

	
	public function addAlumnoSalud(AlumnoSalud $l)
	{
		if ($this->collAlumnoSaluds === null) {
			$this->initAlumnoSaluds();
		}
		if (!in_array($l, $this->collAlumnoSaluds, true)) { 			array_push($this->collAlumnoSaluds, $l);
			$l->setAlumno($this);
		}
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collRelCalendariovacunacionAlumnos) {
				foreach ((array) $this->collRelCalendariovacunacionAlumnos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLegajopedagogicos) {
				foreach ((array) $this->collLegajopedagogicos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAsistencias) {
				foreach ((array) $this->collAsistencias as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collBoletinConceptuals) {
				foreach ((array) $this->collBoletinConceptuals as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collBoletinActividadess) {
				foreach ((array) $this->collBoletinActividadess as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collExamens) {
				foreach ((array) $this->collExamens as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRelAlumnoDivisions) {
				foreach ((array) $this->collRelAlumnoDivisions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRelRolresponsableResponsables) {
				foreach ((array) $this->collRelRolresponsableResponsables as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLegajosaluds) {
				foreach ((array) $this->collLegajosaluds as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAlumnoSaluds) {
				foreach ((array) $this->collAlumnoSaluds as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collRelCalendariovacunacionAlumnos = null;
		$this->collLegajopedagogicos = null;
		$this->collAsistencias = null;
		$this->collBoletinConceptuals = null;
		$this->collBoletinActividadess = null;
		$this->collExamens = null;
		$this->collRelAlumnoDivisions = null;
		$this->collRelRolresponsableResponsables = null;
		$this->collLegajosaluds = null;
		$this->collAlumnoSaluds = null;
			$this->aProvincia = null;
			$this->aTipodocumento = null;
			$this->aEstablecimiento = null;
			$this->aCuenta = null;
			$this->aConceptobaja = null;
			$this->aPais = null;
			$this->aEstadosalumnos = null;
	}

} 