<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/AlumnoPeer.php';

/**
 * Base class that represents a row from the 'alumno' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseAlumno extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var AlumnoPeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var int
	 */
	protected $id;


	/**
	 * The value for the nombre field.
	 * @var string
	 */
	protected $nombre = '';


	/**
	 * The value for the apellido field.
	 * @var string
	 */
	protected $apellido = '';


	/**
	 * The value for the fecha_nacimiento field.
	 * @var int
	 */
	protected $fecha_nacimiento;


	/**
	 * The value for the direccion field.
	 * @var string
	 */
	protected $direccion = '';


	/**
	 * The value for the ciudad field.
	 * @var string
	 */
	protected $ciudad = '';


	/**
	 * The value for the codigo_postal field.
	 * @var string
	 */
	protected $codigo_postal = '';


	/**
	 * The value for the fk_provincia_id field.
	 * @var int
	 */
	protected $fk_provincia_id = 0;


	/**
	 * The value for the telefono field.
	 * @var string
	 */
	protected $telefono = '';


	/**
	 * The value for the lugar_nacimiento field.
	 * @var string
	 */
	protected $lugar_nacimiento = '';


	/**
	 * The value for the fk_tipodocumento_id field.
	 * @var int
	 */
	protected $fk_tipodocumento_id = 0;


	/**
	 * The value for the nro_documento field.
	 * @var string
	 */
	protected $nro_documento = '';


	/**
	 * The value for the sexo field.
	 * @var string
	 */
	protected $sexo = '';


	/**
	 * The value for the email field.
	 * @var string
	 */
	protected $email = '';


	/**
	 * The value for the distancia_escuela field.
	 * @var int
	 */
	protected $distancia_escuela = 0;


	/**
	 * The value for the hermanos_escuela field.
	 * @var boolean
	 */
	protected $hermanos_escuela = false;


	/**
	 * The value for the hijo_maestro_escuela field.
	 * @var boolean
	 */
	protected $hijo_maestro_escuela = false;


	/**
	 * The value for the fk_establecimiento_id field.
	 * @var int
	 */
	protected $fk_establecimiento_id = 0;


	/**
	 * The value for the fk_cuenta_id field.
	 * @var int
	 */
	protected $fk_cuenta_id = 0;


	/**
	 * The value for the certificado_medico field.
	 * @var boolean
	 */
	protected $certificado_medico = false;


	/**
	 * The value for the activo field.
	 * @var boolean
	 */
	protected $activo = true;


	/**
	 * The value for the fk_conceptobaja_id field.
	 * @var int
	 */
	protected $fk_conceptobaja_id;


	/**
	 * The value for the fk_pais_id field.
	 * @var int
	 */
	protected $fk_pais_id = 0;

	/**
	 * @var Tipodocumento
	 */
	protected $aTipodocumento;

	/**
	 * @var Cuenta
	 */
	protected $aCuenta;

	/**
	 * @var Establecimiento
	 */
	protected $aEstablecimiento;

	/**
	 * @var Provincia
	 */
	protected $aProvincia;

	/**
	 * @var Conceptobaja
	 */
	protected $aConceptobaja;

	/**
	 * @var Pais
	 */
	protected $aPais;

	/**
	 * Collection to store aggregation of collRelCalendariovacunacionAlumnos.
	 * @var array
	 */
	protected $collRelCalendariovacunacionAlumnos;

	/**
	 * The criteria used to select the current contents of collRelCalendariovacunacionAlumnos.
	 * @var Criteria
	 */
	protected $lastRelCalendariovacunacionAlumnoCriteria = null;

	/**
	 * Collection to store aggregation of collLegajopedagogicos.
	 * @var array
	 */
	protected $collLegajopedagogicos;

	/**
	 * The criteria used to select the current contents of collLegajopedagogicos.
	 * @var Criteria
	 */
	protected $lastLegajopedagogicoCriteria = null;

	/**
	 * Collection to store aggregation of collAsistencias.
	 * @var array
	 */
	protected $collAsistencias;

	/**
	 * The criteria used to select the current contents of collAsistencias.
	 * @var Criteria
	 */
	protected $lastAsistenciaCriteria = null;

	/**
	 * Collection to store aggregation of collBoletinConceptuals.
	 * @var array
	 */
	protected $collBoletinConceptuals;

	/**
	 * The criteria used to select the current contents of collBoletinConceptuals.
	 * @var Criteria
	 */
	protected $lastBoletinConceptualCriteria = null;

	/**
	 * Collection to store aggregation of collBoletinActividadess.
	 * @var array
	 */
	protected $collBoletinActividadess;

	/**
	 * The criteria used to select the current contents of collBoletinActividadess.
	 * @var Criteria
	 */
	protected $lastBoletinActividadesCriteria = null;

	/**
	 * Collection to store aggregation of collExamens.
	 * @var array
	 */
	protected $collExamens;

	/**
	 * The criteria used to select the current contents of collExamens.
	 * @var Criteria
	 */
	protected $lastExamenCriteria = null;

	/**
	 * Collection to store aggregation of collRelAlumnoDivisions.
	 * @var array
	 */
	protected $collRelAlumnoDivisions;

	/**
	 * The criteria used to select the current contents of collRelAlumnoDivisions.
	 * @var Criteria
	 */
	protected $lastRelAlumnoDivisionCriteria = null;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Get the [id] column value.
	 * 
	 * @return int
	 */
	public function getId()
	{

		return $this->id;
	}

	/**
	 * Get the [nombre] column value.
	 * 
	 * @return string
	 */
	public function getNombre()
	{

		return $this->nombre;
	}

	/**
	 * Get the [apellido] column value.
	 * 
	 * @return string
	 */
	public function getApellido()
	{

		return $this->apellido;
	}

	/**
	 * Get the [optionally formatted] [fecha_nacimiento] column value.
	 * 
	 * @param string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getFechaNacimiento($format = 'Y-m-d H:i:s')
	{

		if ($this->fecha_nacimiento === null || $this->fecha_nacimiento === '') {
			return null;
		} elseif (!is_int($this->fecha_nacimiento)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->fecha_nacimiento);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse value of [fecha_nacimiento] as date/time value: " . var_export($this->fecha_nacimiento, true));
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

	/**
	 * Get the [direccion] column value.
	 * 
	 * @return string
	 */
	public function getDireccion()
	{

		return $this->direccion;
	}

	/**
	 * Get the [ciudad] column value.
	 * 
	 * @return string
	 */
	public function getCiudad()
	{

		return $this->ciudad;
	}

	/**
	 * Get the [codigo_postal] column value.
	 * 
	 * @return string
	 */
	public function getCodigoPostal()
	{

		return $this->codigo_postal;
	}

	/**
	 * Get the [fk_provincia_id] column value.
	 * 
	 * @return int
	 */
	public function getFkProvinciaId()
	{

		return $this->fk_provincia_id;
	}

	/**
	 * Get the [telefono] column value.
	 * 
	 * @return string
	 */
	public function getTelefono()
	{

		return $this->telefono;
	}

	/**
	 * Get the [lugar_nacimiento] column value.
	 * 
	 * @return string
	 */
	public function getLugarNacimiento()
	{

		return $this->lugar_nacimiento;
	}

	/**
	 * Get the [fk_tipodocumento_id] column value.
	 * 
	 * @return int
	 */
	public function getFkTipodocumentoId()
	{

		return $this->fk_tipodocumento_id;
	}

	/**
	 * Get the [nro_documento] column value.
	 * 
	 * @return string
	 */
	public function getNroDocumento()
	{

		return $this->nro_documento;
	}

	/**
	 * Get the [sexo] column value.
	 * 
	 * @return string
	 */
	public function getSexo()
	{

		return $this->sexo;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return string
	 */
	public function getEmail()
	{

		return $this->email;
	}

	/**
	 * Get the [distancia_escuela] column value.
	 * 
	 * @return int
	 */
	public function getDistanciaEscuela()
	{

		return $this->distancia_escuela;
	}

	/**
	 * Get the [hermanos_escuela] column value.
	 * 
	 * @return boolean
	 */
	public function getHermanosEscuela()
	{

		return $this->hermanos_escuela;
	}

	/**
	 * Get the [hijo_maestro_escuela] column value.
	 * 
	 * @return boolean
	 */
	public function getHijoMaestroEscuela()
	{

		return $this->hijo_maestro_escuela;
	}

	/**
	 * Get the [fk_establecimiento_id] column value.
	 * 
	 * @return int
	 */
	public function getFkEstablecimientoId()
	{

		return $this->fk_establecimiento_id;
	}

	/**
	 * Get the [fk_cuenta_id] column value.
	 * 
	 * @return int
	 */
	public function getFkCuentaId()
	{

		return $this->fk_cuenta_id;
	}

	/**
	 * Get the [certificado_medico] column value.
	 * 
	 * @return boolean
	 */
	public function getCertificadoMedico()
	{

		return $this->certificado_medico;
	}

	/**
	 * Get the [activo] column value.
	 * 
	 * @return boolean
	 */
	public function getActivo()
	{

		return $this->activo;
	}

	/**
	 * Get the [fk_conceptobaja_id] column value.
	 * 
	 * @return int
	 */
	public function getFkConceptobajaId()
	{

		return $this->fk_conceptobaja_id;
	}

	/**
	 * Get the [fk_pais_id] column value.
	 * 
	 * @return int
	 */
	public function getFkPaisId()
	{

		return $this->fk_pais_id;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AlumnoPeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [nombre] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setNombre($v)
	{

		if ($this->nombre !== $v || $v === '') {
			$this->nombre = $v;
			$this->modifiedColumns[] = AlumnoPeer::NOMBRE;
		}

	} // setNombre()

	/**
	 * Set the value of [apellido] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setApellido($v)
	{

		if ($this->apellido !== $v || $v === '') {
			$this->apellido = $v;
			$this->modifiedColumns[] = AlumnoPeer::APELLIDO;
		}

	} // setApellido()

	/**
	 * Set the value of [fecha_nacimiento] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFechaNacimiento($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse date/time value for [fecha_nacimiento] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_nacimiento !== $ts) {
			$this->fecha_nacimiento = $ts;
			$this->modifiedColumns[] = AlumnoPeer::FECHA_NACIMIENTO;
		}

	} // setFechaNacimiento()

	/**
	 * Set the value of [direccion] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setDireccion($v)
	{

		if ($this->direccion !== $v || $v === '') {
			$this->direccion = $v;
			$this->modifiedColumns[] = AlumnoPeer::DIRECCION;
		}

	} // setDireccion()

	/**
	 * Set the value of [ciudad] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setCiudad($v)
	{

		if ($this->ciudad !== $v || $v === '') {
			$this->ciudad = $v;
			$this->modifiedColumns[] = AlumnoPeer::CIUDAD;
		}

	} // setCiudad()

	/**
	 * Set the value of [codigo_postal] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setCodigoPostal($v)
	{

		if ($this->codigo_postal !== $v || $v === '') {
			$this->codigo_postal = $v;
			$this->modifiedColumns[] = AlumnoPeer::CODIGO_POSTAL;
		}

	} // setCodigoPostal()

	/**
	 * Set the value of [fk_provincia_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkProvinciaId($v)
	{

		if ($this->fk_provincia_id !== $v || $v === 0) {
			$this->fk_provincia_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_PROVINCIA_ID;
		}

		if ($this->aProvincia !== null && $this->aProvincia->getId() !== $v) {
			$this->aProvincia = null;
		}

	} // setFkProvinciaId()

	/**
	 * Set the value of [telefono] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setTelefono($v)
	{

		if ($this->telefono !== $v || $v === '') {
			$this->telefono = $v;
			$this->modifiedColumns[] = AlumnoPeer::TELEFONO;
		}

	} // setTelefono()

	/**
	 * Set the value of [lugar_nacimiento] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setLugarNacimiento($v)
	{

		if ($this->lugar_nacimiento !== $v || $v === '') {
			$this->lugar_nacimiento = $v;
			$this->modifiedColumns[] = AlumnoPeer::LUGAR_NACIMIENTO;
		}

	} // setLugarNacimiento()

	/**
	 * Set the value of [fk_tipodocumento_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkTipodocumentoId($v)
	{

		if ($this->fk_tipodocumento_id !== $v || $v === 0) {
			$this->fk_tipodocumento_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_TIPODOCUMENTO_ID;
		}

		if ($this->aTipodocumento !== null && $this->aTipodocumento->getId() !== $v) {
			$this->aTipodocumento = null;
		}

	} // setFkTipodocumentoId()

	/**
	 * Set the value of [nro_documento] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setNroDocumento($v)
	{

		if ($this->nro_documento !== $v || $v === '') {
			$this->nro_documento = $v;
			$this->modifiedColumns[] = AlumnoPeer::NRO_DOCUMENTO;
		}

	} // setNroDocumento()

	/**
	 * Set the value of [sexo] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setSexo($v)
	{

		if ($this->sexo !== $v || $v === '') {
			$this->sexo = $v;
			$this->modifiedColumns[] = AlumnoPeer::SEXO;
		}

	} // setSexo()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setEmail($v)
	{

		if ($this->email !== $v || $v === '') {
			$this->email = $v;
			$this->modifiedColumns[] = AlumnoPeer::EMAIL;
		}

	} // setEmail()

	/**
	 * Set the value of [distancia_escuela] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setDistanciaEscuela($v)
	{

		if ($this->distancia_escuela !== $v || $v === 0) {
			$this->distancia_escuela = $v;
			$this->modifiedColumns[] = AlumnoPeer::DISTANCIA_ESCUELA;
		}

	} // setDistanciaEscuela()

	/**
	 * Set the value of [hermanos_escuela] column.
	 * 
	 * @param boolean $v new value
	 * @return void
	 */
	public function setHermanosEscuela($v)
	{

		if ($this->hermanos_escuela !== $v || $v === false) {
			$this->hermanos_escuela = $v;
			$this->modifiedColumns[] = AlumnoPeer::HERMANOS_ESCUELA;
		}

	} // setHermanosEscuela()

	/**
	 * Set the value of [hijo_maestro_escuela] column.
	 * 
	 * @param boolean $v new value
	 * @return void
	 */
	public function setHijoMaestroEscuela($v)
	{

		if ($this->hijo_maestro_escuela !== $v || $v === false) {
			$this->hijo_maestro_escuela = $v;
			$this->modifiedColumns[] = AlumnoPeer::HIJO_MAESTRO_ESCUELA;
		}

	} // setHijoMaestroEscuela()

	/**
	 * Set the value of [fk_establecimiento_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkEstablecimientoId($v)
	{

		if ($this->fk_establecimiento_id !== $v || $v === 0) {
			$this->fk_establecimiento_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
		}

	} // setFkEstablecimientoId()

	/**
	 * Set the value of [fk_cuenta_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkCuentaId($v)
	{

		if ($this->fk_cuenta_id !== $v || $v === 0) {
			$this->fk_cuenta_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_CUENTA_ID;
		}

		if ($this->aCuenta !== null && $this->aCuenta->getId() !== $v) {
			$this->aCuenta = null;
		}

	} // setFkCuentaId()

	/**
	 * Set the value of [certificado_medico] column.
	 * 
	 * @param boolean $v new value
	 * @return void
	 */
	public function setCertificadoMedico($v)
	{

		if ($this->certificado_medico !== $v || $v === false) {
			$this->certificado_medico = $v;
			$this->modifiedColumns[] = AlumnoPeer::CERTIFICADO_MEDICO;
		}

	} // setCertificadoMedico()

	/**
	 * Set the value of [activo] column.
	 * 
	 * @param boolean $v new value
	 * @return void
	 */
	public function setActivo($v)
	{

		if ($this->activo !== $v || $v === true) {
			$this->activo = $v;
			$this->modifiedColumns[] = AlumnoPeer::ACTIVO;
		}

	} // setActivo()

	/**
	 * Set the value of [fk_conceptobaja_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkConceptobajaId($v)
	{

		if ($this->fk_conceptobaja_id !== $v) {
			$this->fk_conceptobaja_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_CONCEPTOBAJA_ID;
		}

		if ($this->aConceptobaja !== null && $this->aConceptobaja->getId() !== $v) {
			$this->aConceptobaja = null;
		}

	} // setFkConceptobajaId()

	/**
	 * Set the value of [fk_pais_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkPaisId($v)
	{

		if ($this->fk_pais_id !== $v || $v === 0) {
			$this->fk_pais_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_PAIS_ID;
		}

		if ($this->aPais !== null && $this->aPais->getId() !== $v) {
			$this->aPais = null;
		}

	} // setFkPaisId()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (1-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param ResultSet $rs The ResultSet class with cursor advanced to desired record pos.
	 * @param int $startcol 1-based offset column which indicates which restultset column to start with.
	 * @return int next starting column
	 * @throws PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
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

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 23; // 23 = AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Alumno object", $e);
		}
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param Connection $con
	 * @return void
	 * @throws PropelException
	 * @see BaseObject::setDeleted()
	 * @see BaseObject::isDeleted()
	 */
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

	/**
	 * Stores the object in the database.  If the object is new,
	 * it inserts it; otherwise an update is performed.  This method
	 * wraps the doSave() worker method in a transaction.
	 *
	 * @param Connection $con
	 * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws PropelException
	 * @see doSave()
	 */
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

	/**
	 * Stores the object in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param Connection $con
	 * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws PropelException
	 * @see save()
	 */
	protected function doSave($con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

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


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AlumnoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += AlumnoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

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
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return array ValidationFailed[]
	 * @see validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param mixed $columns Column name or an array of column names.
	 * @return boolean Whether all columns pass validation.
	 * @see doValidate()
	 * @see getValidationFailures()
	 */
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

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param array $columns Array of column names to validate.
	 * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

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

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param string $name name
	 * @param string $type The type of fieldname the $name is of:
	 *                     one of the class type constants TYPE_PHPNAME,
	 *                     TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM
	 * @return mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlumnoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param int $pos position in xml schema
	 * @return mixed Value of field at $pos
	 */
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
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param string $keyType One of the class type constants TYPE_PHPNAME,
	 *                        TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM
	 * @return an associative array containing the field names (as keys) and field values
	 */
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

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param string $name peer name
	 * @param mixed $value field value
	 * @param string $type The type of fieldname the $name is of:
	 *                     one of the class type constants TYPE_PHPNAME,
	 *                     TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM
	 * @return void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlumnoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param int $pos position in xml schema
	 * @param mixed $value field value
	 * @return void
	 */
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
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME,
	 * TYPE_NUM. The default key type is the column's phpname (e.g. 'authorId')
	 *
	 * @param array  $arr     An array to populate the object from.
	 * @param string $keyType The type of keys the array uses.
	 * @return void
	 */
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

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
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

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);

		$criteria->add(AlumnoPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param int $key Primary key.
	 * @return void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param object $copyObj An object of Alumno (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
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
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
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

		} // if ($deepCopy)


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a pkey column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return Alumno Clone of current object.
	 * @throws PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return AlumnoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AlumnoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Tipodocumento object.
	 *
	 * @param Tipodocumento $v
	 * @return void
	 * @throws PropelException
	 */
	public function setTipodocumento($v)
	{


		if ($v === null) {
			$this->setFkTipodocumentoId('0');
		} else {
			$this->setFkTipodocumentoId($v->getId());
		}


		$this->aTipodocumento = $v;
	}


	/**
	 * Get the associated Tipodocumento object
	 *
	 * @param Connection Optional Connection object.
	 * @return Tipodocumento The associated Tipodocumento object.
	 * @throws PropelException
	 */
	public function getTipodocumento($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseTipodocumentoPeer.php';

		if ($this->aTipodocumento === null && ($this->fk_tipodocumento_id !== null)) {

			$this->aTipodocumento = TipodocumentoPeer::retrieveByPK($this->fk_tipodocumento_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = TipodocumentoPeer::retrieveByPK($this->fk_tipodocumento_id, $con);
			   $obj->addTipodocumentos($this);
			 */
		}
		return $this->aTipodocumento;
	}

	/**
	 * Declares an association between this object and a Cuenta object.
	 *
	 * @param Cuenta $v
	 * @return void
	 * @throws PropelException
	 */
	public function setCuenta($v)
	{


		if ($v === null) {
			$this->setFkCuentaId('0');
		} else {
			$this->setFkCuentaId($v->getId());
		}


		$this->aCuenta = $v;
	}


	/**
	 * Get the associated Cuenta object
	 *
	 * @param Connection Optional Connection object.
	 * @return Cuenta The associated Cuenta object.
	 * @throws PropelException
	 */
	public function getCuenta($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseCuentaPeer.php';

		if ($this->aCuenta === null && ($this->fk_cuenta_id !== null)) {

			$this->aCuenta = CuentaPeer::retrieveByPK($this->fk_cuenta_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = CuentaPeer::retrieveByPK($this->fk_cuenta_id, $con);
			   $obj->addCuentas($this);
			 */
		}
		return $this->aCuenta;
	}

	/**
	 * Declares an association between this object and a Establecimiento object.
	 *
	 * @param Establecimiento $v
	 * @return void
	 * @throws PropelException
	 */
	public function setEstablecimiento($v)
	{


		if ($v === null) {
			$this->setFkEstablecimientoId('0');
		} else {
			$this->setFkEstablecimientoId($v->getId());
		}


		$this->aEstablecimiento = $v;
	}


	/**
	 * Get the associated Establecimiento object
	 *
	 * @param Connection Optional Connection object.
	 * @return Establecimiento The associated Establecimiento object.
	 * @throws PropelException
	 */
	public function getEstablecimiento($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseEstablecimientoPeer.php';

		if ($this->aEstablecimiento === null && ($this->fk_establecimiento_id !== null)) {

			$this->aEstablecimiento = EstablecimientoPeer::retrieveByPK($this->fk_establecimiento_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = EstablecimientoPeer::retrieveByPK($this->fk_establecimiento_id, $con);
			   $obj->addEstablecimientos($this);
			 */
		}
		return $this->aEstablecimiento;
	}

	/**
	 * Declares an association between this object and a Provincia object.
	 *
	 * @param Provincia $v
	 * @return void
	 * @throws PropelException
	 */
	public function setProvincia($v)
	{


		if ($v === null) {
			$this->setFkProvinciaId('0');
		} else {
			$this->setFkProvinciaId($v->getId());
		}


		$this->aProvincia = $v;
	}


	/**
	 * Get the associated Provincia object
	 *
	 * @param Connection Optional Connection object.
	 * @return Provincia The associated Provincia object.
	 * @throws PropelException
	 */
	public function getProvincia($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseProvinciaPeer.php';

		if ($this->aProvincia === null && ($this->fk_provincia_id !== null)) {

			$this->aProvincia = ProvinciaPeer::retrieveByPK($this->fk_provincia_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = ProvinciaPeer::retrieveByPK($this->fk_provincia_id, $con);
			   $obj->addProvincias($this);
			 */
		}
		return $this->aProvincia;
	}

	/**
	 * Declares an association between this object and a Conceptobaja object.
	 *
	 * @param Conceptobaja $v
	 * @return void
	 * @throws PropelException
	 */
	public function setConceptobaja($v)
	{


		if ($v === null) {
			$this->setFkConceptobajaId(NULL);
		} else {
			$this->setFkConceptobajaId($v->getId());
		}


		$this->aConceptobaja = $v;
	}


	/**
	 * Get the associated Conceptobaja object
	 *
	 * @param Connection Optional Connection object.
	 * @return Conceptobaja The associated Conceptobaja object.
	 * @throws PropelException
	 */
	public function getConceptobaja($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseConceptobajaPeer.php';

		if ($this->aConceptobaja === null && ($this->fk_conceptobaja_id !== null)) {

			$this->aConceptobaja = ConceptobajaPeer::retrieveByPK($this->fk_conceptobaja_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = ConceptobajaPeer::retrieveByPK($this->fk_conceptobaja_id, $con);
			   $obj->addConceptobajas($this);
			 */
		}
		return $this->aConceptobaja;
	}

	/**
	 * Declares an association between this object and a Pais object.
	 *
	 * @param Pais $v
	 * @return void
	 * @throws PropelException
	 */
	public function setPais($v)
	{


		if ($v === null) {
			$this->setFkPaisId('0');
		} else {
			$this->setFkPaisId($v->getId());
		}


		$this->aPais = $v;
	}


	/**
	 * Get the associated Pais object
	 *
	 * @param Connection Optional Connection object.
	 * @return Pais The associated Pais object.
	 * @throws PropelException
	 */
	public function getPais($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BasePaisPeer.php';

		if ($this->aPais === null && ($this->fk_pais_id !== null)) {

			$this->aPais = PaisPeer::retrieveByPK($this->fk_pais_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = PaisPeer::retrieveByPK($this->fk_pais_id, $con);
			   $obj->addPaiss($this);
			 */
		}
		return $this->aPais;
	}

	/**
	 * Temporary storage of collRelCalendariovacunacionAlumnos to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initRelCalendariovacunacionAlumnos()
	{
		if ($this->collRelCalendariovacunacionAlumnos === null) {
			$this->collRelCalendariovacunacionAlumnos = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno has previously
	 * been saved, it will retrieve related RelCalendariovacunacionAlumnos from storage.
	 * If this Alumno is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getRelCalendariovacunacionAlumnos($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelCalendariovacunacionAlumnoPeer.php';
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
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


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

	/**
	 * Returns the number of related RelCalendariovacunacionAlumnos.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countRelCalendariovacunacionAlumnos($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelCalendariovacunacionAlumnoPeer.php';
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

	/**
	 * Method called to associate a RelCalendariovacunacionAlumno object to this object
	 * through the RelCalendariovacunacionAlumno foreign key attribute
	 *
	 * @param RelCalendariovacunacionAlumno $l RelCalendariovacunacionAlumno
	 * @return void
	 * @throws PropelException
	 */
	public function addRelCalendariovacunacionAlumno(RelCalendariovacunacionAlumno $l)
	{
		$this->collRelCalendariovacunacionAlumnos[] = $l;
		$l->setAlumno($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno is new, it will return
	 * an empty collection; or if this Alumno has previously
	 * been saved, it will retrieve related RelCalendariovacunacionAlumnos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Alumno.
	 */
	public function getRelCalendariovacunacionAlumnosJoinCalendariovacunacion($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelCalendariovacunacionAlumnoPeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastRelCalendariovacunacionAlumnoCriteria) || !$this->lastRelCalendariovacunacionAlumnoCriteria->equals($criteria)) {
				$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelectJoinCalendariovacunacion($criteria, $con);
			}
		}
		$this->lastRelCalendariovacunacionAlumnoCriteria = $criteria;

		return $this->collRelCalendariovacunacionAlumnos;
	}

	/**
	 * Temporary storage of collLegajopedagogicos to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initLegajopedagogicos()
	{
		if ($this->collLegajopedagogicos === null) {
			$this->collLegajopedagogicos = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno has previously
	 * been saved, it will retrieve related Legajopedagogicos from storage.
	 * If this Alumno is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getLegajopedagogicos($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseLegajopedagogicoPeer.php';
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
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


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

	/**
	 * Returns the number of related Legajopedagogicos.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countLegajopedagogicos($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseLegajopedagogicoPeer.php';
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

	/**
	 * Method called to associate a Legajopedagogico object to this object
	 * through the Legajopedagogico foreign key attribute
	 *
	 * @param Legajopedagogico $l Legajopedagogico
	 * @return void
	 * @throws PropelException
	 */
	public function addLegajopedagogico(Legajopedagogico $l)
	{
		$this->collLegajopedagogicos[] = $l;
		$l->setAlumno($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno is new, it will return
	 * an empty collection; or if this Alumno has previously
	 * been saved, it will retrieve related Legajopedagogicos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Alumno.
	 */
	public function getLegajopedagogicosJoinLegajocategoria($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseLegajopedagogicoPeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinLegajocategoria($criteria, $con);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno is new, it will return
	 * an empty collection; or if this Alumno has previously
	 * been saved, it will retrieve related Legajopedagogicos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Alumno.
	 */
	public function getLegajopedagogicosJoinUsuario($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseLegajopedagogicoPeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinUsuario($criteria, $con);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}

	/**
	 * Temporary storage of collAsistencias to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initAsistencias()
	{
		if ($this->collAsistencias === null) {
			$this->collAsistencias = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno has previously
	 * been saved, it will retrieve related Asistencias from storage.
	 * If this Alumno is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getAsistencias($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseAsistenciaPeer.php';
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
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


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

	/**
	 * Returns the number of related Asistencias.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countAsistencias($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseAsistenciaPeer.php';
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

	/**
	 * Method called to associate a Asistencia object to this object
	 * through the Asistencia foreign key attribute
	 *
	 * @param Asistencia $l Asistencia
	 * @return void
	 * @throws PropelException
	 */
	public function addAsistencia(Asistencia $l)
	{
		$this->collAsistencias[] = $l;
		$l->setAlumno($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno is new, it will return
	 * an empty collection; or if this Alumno has previously
	 * been saved, it will retrieve related Asistencias from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Alumno.
	 */
	public function getAsistenciasJoinTipoasistencia($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseAsistenciaPeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AsistenciaPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastAsistenciaCriteria) || !$this->lastAsistenciaCriteria->equals($criteria)) {
				$this->collAsistencias = AsistenciaPeer::doSelectJoinTipoasistencia($criteria, $con);
			}
		}
		$this->lastAsistenciaCriteria = $criteria;

		return $this->collAsistencias;
	}

	/**
	 * Temporary storage of collBoletinConceptuals to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initBoletinConceptuals()
	{
		if ($this->collBoletinConceptuals === null) {
			$this->collBoletinConceptuals = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno has previously
	 * been saved, it will retrieve related BoletinConceptuals from storage.
	 * If this Alumno is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getBoletinConceptuals($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseBoletinConceptualPeer.php';
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
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


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

	/**
	 * Returns the number of related BoletinConceptuals.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countBoletinConceptuals($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseBoletinConceptualPeer.php';
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

	/**
	 * Method called to associate a BoletinConceptual object to this object
	 * through the BoletinConceptual foreign key attribute
	 *
	 * @param BoletinConceptual $l BoletinConceptual
	 * @return void
	 * @throws PropelException
	 */
	public function addBoletinConceptual(BoletinConceptual $l)
	{
		$this->collBoletinConceptuals[] = $l;
		$l->setAlumno($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno is new, it will return
	 * an empty collection; or if this Alumno has previously
	 * been saved, it will retrieve related BoletinConceptuals from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Alumno.
	 */
	public function getBoletinConceptualsJoinEscalanota($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseBoletinConceptualPeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinEscalanota($criteria, $con);
			}
		}
		$this->lastBoletinConceptualCriteria = $criteria;

		return $this->collBoletinConceptuals;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno is new, it will return
	 * an empty collection; or if this Alumno has previously
	 * been saved, it will retrieve related BoletinConceptuals from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Alumno.
	 */
	public function getBoletinConceptualsJoinConcepto($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseBoletinConceptualPeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinConcepto($criteria, $con);
			}
		}
		$this->lastBoletinConceptualCriteria = $criteria;

		return $this->collBoletinConceptuals;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno is new, it will return
	 * an empty collection; or if this Alumno has previously
	 * been saved, it will retrieve related BoletinConceptuals from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Alumno.
	 */
	public function getBoletinConceptualsJoinPeriodo($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseBoletinConceptualPeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinPeriodo($criteria, $con);
			}
		}
		$this->lastBoletinConceptualCriteria = $criteria;

		return $this->collBoletinConceptuals;
	}

	/**
	 * Temporary storage of collBoletinActividadess to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initBoletinActividadess()
	{
		if ($this->collBoletinActividadess === null) {
			$this->collBoletinActividadess = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno has previously
	 * been saved, it will retrieve related BoletinActividadess from storage.
	 * If this Alumno is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getBoletinActividadess($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseBoletinActividadesPeer.php';
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
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


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

	/**
	 * Returns the number of related BoletinActividadess.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countBoletinActividadess($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseBoletinActividadesPeer.php';
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

	/**
	 * Method called to associate a BoletinActividades object to this object
	 * through the BoletinActividades foreign key attribute
	 *
	 * @param BoletinActividades $l BoletinActividades
	 * @return void
	 * @throws PropelException
	 */
	public function addBoletinActividades(BoletinActividades $l)
	{
		$this->collBoletinActividadess[] = $l;
		$l->setAlumno($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno is new, it will return
	 * an empty collection; or if this Alumno has previously
	 * been saved, it will retrieve related BoletinActividadess from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Alumno.
	 */
	public function getBoletinActividadessJoinEscalanota($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseBoletinActividadesPeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinEscalanota($criteria, $con);
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;

		return $this->collBoletinActividadess;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno is new, it will return
	 * an empty collection; or if this Alumno has previously
	 * been saved, it will retrieve related BoletinActividadess from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Alumno.
	 */
	public function getBoletinActividadessJoinActividad($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseBoletinActividadesPeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinActividad($criteria, $con);
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;

		return $this->collBoletinActividadess;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno is new, it will return
	 * an empty collection; or if this Alumno has previously
	 * been saved, it will retrieve related BoletinActividadess from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Alumno.
	 */
	public function getBoletinActividadessJoinPeriodo($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseBoletinActividadesPeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinPeriodo($criteria, $con);
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;

		return $this->collBoletinActividadess;
	}

	/**
	 * Temporary storage of collExamens to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initExamens()
	{
		if ($this->collExamens === null) {
			$this->collExamens = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno has previously
	 * been saved, it will retrieve related Examens from storage.
	 * If this Alumno is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getExamens($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseExamenPeer.php';
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
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


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

	/**
	 * Returns the number of related Examens.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countExamens($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseExamenPeer.php';
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

	/**
	 * Method called to associate a Examen object to this object
	 * through the Examen foreign key attribute
	 *
	 * @param Examen $l Examen
	 * @return void
	 * @throws PropelException
	 */
	public function addExamen(Examen $l)
	{
		$this->collExamens[] = $l;
		$l->setAlumno($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno is new, it will return
	 * an empty collection; or if this Alumno has previously
	 * been saved, it will retrieve related Examens from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Alumno.
	 */
	public function getExamensJoinEscalanota($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseExamenPeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinEscalanota($criteria, $con);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno is new, it will return
	 * an empty collection; or if this Alumno has previously
	 * been saved, it will retrieve related Examens from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Alumno.
	 */
	public function getExamensJoinActividad($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseExamenPeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinActividad($criteria, $con);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno is new, it will return
	 * an empty collection; or if this Alumno has previously
	 * been saved, it will retrieve related Examens from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Alumno.
	 */
	public function getExamensJoinPeriodo($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseExamenPeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ExamenPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinPeriodo($criteria, $con);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
	}

	/**
	 * Temporary storage of collRelAlumnoDivisions to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initRelAlumnoDivisions()
	{
		if ($this->collRelAlumnoDivisions === null) {
			$this->collRelAlumnoDivisions = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno has previously
	 * been saved, it will retrieve related RelAlumnoDivisions from storage.
	 * If this Alumno is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getRelAlumnoDivisions($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelAlumnoDivisionPeer.php';
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
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


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

	/**
	 * Returns the number of related RelAlumnoDivisions.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countRelAlumnoDivisions($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelAlumnoDivisionPeer.php';
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

	/**
	 * Method called to associate a RelAlumnoDivision object to this object
	 * through the RelAlumnoDivision foreign key attribute
	 *
	 * @param RelAlumnoDivision $l RelAlumnoDivision
	 * @return void
	 * @throws PropelException
	 */
	public function addRelAlumnoDivision(RelAlumnoDivision $l)
	{
		$this->collRelAlumnoDivisions[] = $l;
		$l->setAlumno($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alumno is new, it will return
	 * an empty collection; or if this Alumno has previously
	 * been saved, it will retrieve related RelAlumnoDivisions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Alumno.
	 */
	public function getRelAlumnoDivisionsJoinDivision($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelAlumnoDivisionPeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->getId());

			if (!isset($this->lastRelAlumnoDivisionCriteria) || !$this->lastRelAlumnoDivisionCriteria->equals($criteria)) {
				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelectJoinDivision($criteria, $con);
			}
		}
		$this->lastRelAlumnoDivisionCriteria = $criteria;

		return $this->collRelAlumnoDivisions;
	}

} // BaseAlumno
