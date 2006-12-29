<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/DocentePeer.php';

/**
 * Base class that represents a row from the 'docente' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseDocente extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var DocentePeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var int
	 */
	protected $id;


	/**
	 * The value for the apellido field.
	 * @var string
	 */
	protected $apellido = '';


	/**
	 * The value for the nombre field.
	 * @var string
	 */
	protected $nombre = '';


	/**
	 * The value for the sexo field.
	 * @var string
	 */
	protected $sexo = 'U';


	/**
	 * The value for the fecha_nacimiento field.
	 * @var int
	 */
	protected $fecha_nacimiento;


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
	 * The value for the email field.
	 * @var string
	 */
	protected $email = '';


	/**
	 * The value for the telefono field.
	 * @var string
	 */
	protected $telefono = '';


	/**
	 * The value for the telefono_movil field.
	 * @var string
	 */
	protected $telefono_movil = '';


	/**
	 * The value for the titulo field.
	 * @var string
	 */
	protected $titulo = '';


	/**
	 * The value for the libreta_sanitaria field.
	 * @var boolean
	 */
	protected $libreta_sanitaria = true;


	/**
	 * The value for the psicofisico field.
	 * @var boolean
	 */
	protected $psicofisico = true;


	/**
	 * The value for the activo field.
	 * @var boolean
	 */
	protected $activo = true;


	/**
	 * The value for the fk_provincia_id field.
	 * @var int
	 */
	protected $fk_provincia_id = 0;

	/**
	 * @var Tipodocumento
	 */
	protected $aTipodocumento;

	/**
	 * @var Provincia
	 */
	protected $aProvincia;

	/**
	 * Collection to store aggregation of collRelDivisionActividadDocentes.
	 * @var array
	 */
	protected $collRelDivisionActividadDocentes;

	/**
	 * The criteria used to select the current contents of collRelDivisionActividadDocentes.
	 * @var Criteria
	 */
	protected $lastRelDivisionActividadDocenteCriteria = null;

	/**
	 * Collection to store aggregation of collRelDocenteEstablecimientos.
	 * @var array
	 */
	protected $collRelDocenteEstablecimientos;

	/**
	 * The criteria used to select the current contents of collRelDocenteEstablecimientos.
	 * @var Criteria
	 */
	protected $lastRelDocenteEstablecimientoCriteria = null;

	/**
	 * Collection to store aggregation of collRelActividadDocentes.
	 * @var array
	 */
	protected $collRelActividadDocentes;

	/**
	 * The criteria used to select the current contents of collRelActividadDocentes.
	 * @var Criteria
	 */
	protected $lastRelActividadDocenteCriteria = null;

	/**
	 * Collection to store aggregation of collDocenteHorarios.
	 * @var array
	 */
	protected $collDocenteHorarios;

	/**
	 * The criteria used to select the current contents of collDocenteHorarios.
	 * @var Criteria
	 */
	protected $lastDocenteHorarioCriteria = null;

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
	 * Get the [apellido] column value.
	 * 
	 * @return string
	 */
	public function getApellido()
	{

		return $this->apellido;
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
	 * Get the [sexo] column value.
	 * 
	 * @return string
	 */
	public function getSexo()
	{

		return $this->sexo;
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
	 * Get the [email] column value.
	 * 
	 * @return string
	 */
	public function getEmail()
	{

		return $this->email;
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
	 * Get the [telefono_movil] column value.
	 * 
	 * @return string
	 */
	public function getTelefonoMovil()
	{

		return $this->telefono_movil;
	}

	/**
	 * Get the [titulo] column value.
	 * 
	 * @return string
	 */
	public function getTitulo()
	{

		return $this->titulo;
	}

	/**
	 * Get the [libreta_sanitaria] column value.
	 * 
	 * @return boolean
	 */
	public function getLibretaSanitaria()
	{

		return $this->libreta_sanitaria;
	}

	/**
	 * Get the [psicofisico] column value.
	 * 
	 * @return boolean
	 */
	public function getPsicofisico()
	{

		return $this->psicofisico;
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
	 * Get the [fk_provincia_id] column value.
	 * 
	 * @return int
	 */
	public function getFkProvinciaId()
	{

		return $this->fk_provincia_id;
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
			$this->modifiedColumns[] = DocentePeer::ID;
		}

	} // setId()

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
			$this->modifiedColumns[] = DocentePeer::APELLIDO;
		}

	} // setApellido()

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
			$this->modifiedColumns[] = DocentePeer::NOMBRE;
		}

	} // setNombre()

	/**
	 * Set the value of [sexo] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setSexo($v)
	{

		if ($this->sexo !== $v || $v === 'U') {
			$this->sexo = $v;
			$this->modifiedColumns[] = DocentePeer::SEXO;
		}

	} // setSexo()

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
			$this->modifiedColumns[] = DocentePeer::FECHA_NACIMIENTO;
		}

	} // setFechaNacimiento()

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
			$this->modifiedColumns[] = DocentePeer::FK_TIPODOCUMENTO_ID;
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
			$this->modifiedColumns[] = DocentePeer::NRO_DOCUMENTO;
		}

	} // setNroDocumento()

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
			$this->modifiedColumns[] = DocentePeer::DIRECCION;
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
			$this->modifiedColumns[] = DocentePeer::CIUDAD;
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
			$this->modifiedColumns[] = DocentePeer::CODIGO_POSTAL;
		}

	} // setCodigoPostal()

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
			$this->modifiedColumns[] = DocentePeer::EMAIL;
		}

	} // setEmail()

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
			$this->modifiedColumns[] = DocentePeer::TELEFONO;
		}

	} // setTelefono()

	/**
	 * Set the value of [telefono_movil] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setTelefonoMovil($v)
	{

		if ($this->telefono_movil !== $v || $v === '') {
			$this->telefono_movil = $v;
			$this->modifiedColumns[] = DocentePeer::TELEFONO_MOVIL;
		}

	} // setTelefonoMovil()

	/**
	 * Set the value of [titulo] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setTitulo($v)
	{

		if ($this->titulo !== $v || $v === '') {
			$this->titulo = $v;
			$this->modifiedColumns[] = DocentePeer::TITULO;
		}

	} // setTitulo()

	/**
	 * Set the value of [libreta_sanitaria] column.
	 * 
	 * @param boolean $v new value
	 * @return void
	 */
	public function setLibretaSanitaria($v)
	{

		if ($this->libreta_sanitaria !== $v || $v === true) {
			$this->libreta_sanitaria = $v;
			$this->modifiedColumns[] = DocentePeer::LIBRETA_SANITARIA;
		}

	} // setLibretaSanitaria()

	/**
	 * Set the value of [psicofisico] column.
	 * 
	 * @param boolean $v new value
	 * @return void
	 */
	public function setPsicofisico($v)
	{

		if ($this->psicofisico !== $v || $v === true) {
			$this->psicofisico = $v;
			$this->modifiedColumns[] = DocentePeer::PSICOFISICO;
		}

	} // setPsicofisico()

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
			$this->modifiedColumns[] = DocentePeer::ACTIVO;
		}

	} // setActivo()

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
			$this->modifiedColumns[] = DocentePeer::FK_PROVINCIA_ID;
		}

		if ($this->aProvincia !== null && $this->aProvincia->getId() !== $v) {
			$this->aProvincia = null;
		}

	} // setFkProvinciaId()

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

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 18; // 18 = DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Docente object", $e);
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

			if ($this->aProvincia !== null) {
				if ($this->aProvincia->isModified()) {
					$affectedRows += $this->aProvincia->save($con);
				}
				$this->setProvincia($this->aProvincia);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DocentePeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += DocentePeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

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

			if ($this->collRelActividadDocentes !== null) {
				foreach($this->collRelActividadDocentes as $referrerFK) {
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

				if ($this->collRelActividadDocentes !== null) {
					foreach($this->collRelActividadDocentes as $referrerFK) {
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
		$pos = DocentePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$pos = DocentePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
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
		$criteria = new Criteria(DocentePeer::DATABASE_NAME);

		$criteria->add(DocentePeer::ID, $this->id);

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
	 * @param object $copyObj An object of Docente (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
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
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getRelDivisionActividadDocentes() as $relObj) {
				$copyObj->addRelDivisionActividadDocente($relObj->copy($deepCopy));
			}

			foreach($this->getRelDocenteEstablecimientos() as $relObj) {
				$copyObj->addRelDocenteEstablecimiento($relObj->copy($deepCopy));
			}

			foreach($this->getRelActividadDocentes() as $relObj) {
				$copyObj->addRelActividadDocente($relObj->copy($deepCopy));
			}

			foreach($this->getDocenteHorarios() as $relObj) {
				$copyObj->addDocenteHorario($relObj->copy($deepCopy));
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
	 * @return Docente Clone of current object.
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
	 * @return DocentePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new DocentePeer();
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
	 * Temporary storage of collRelDivisionActividadDocentes to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initRelDivisionActividadDocentes()
	{
		if ($this->collRelDivisionActividadDocentes === null) {
			$this->collRelDivisionActividadDocentes = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Docente has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 * If this Docente is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getRelDivisionActividadDocentes($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelDivisionActividadDocentePeer.php';
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
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


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

	/**
	 * Returns the number of related RelDivisionActividadDocentes.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countRelDivisionActividadDocentes($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelDivisionActividadDocentePeer.php';
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

	/**
	 * Method called to associate a RelDivisionActividadDocente object to this object
	 * through the RelDivisionActividadDocente foreign key attribute
	 *
	 * @param RelDivisionActividadDocente $l RelDivisionActividadDocente
	 * @return void
	 * @throws PropelException
	 */
	public function addRelDivisionActividadDocente(RelDivisionActividadDocente $l)
	{
		$this->collRelDivisionActividadDocentes[] = $l;
		$l->setDocente($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Docente is new, it will return
	 * an empty collection; or if this Docente has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Docente.
	 */
	public function getRelDivisionActividadDocentesJoinDivision($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelDivisionActividadDocentePeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDivision($criteria, $con);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Docente is new, it will return
	 * an empty collection; or if this Docente has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Docente.
	 */
	public function getRelDivisionActividadDocentesJoinTipodocente($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelDivisionActividadDocentePeer.php';
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

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinTipodocente($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinTipodocente($criteria, $con);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Docente is new, it will return
	 * an empty collection; or if this Docente has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Docente.
	 */
	public function getRelDivisionActividadDocentesJoinCargobaja($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelDivisionActividadDocentePeer.php';
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

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinCargobaja($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinCargobaja($criteria, $con);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Docente is new, it will return
	 * an empty collection; or if this Docente has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Docente.
	 */
	public function getRelDivisionActividadDocentesJoinActividad($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelDivisionActividadDocentePeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinActividad($criteria, $con);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Docente is new, it will return
	 * an empty collection; or if this Docente has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Docente.
	 */
	public function getRelDivisionActividadDocentesJoinRepeticion($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelDivisionActividadDocentePeer.php';
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

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinRepeticion($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDivisionActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinRepeticion($criteria, $con);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}

	/**
	 * Temporary storage of collRelDocenteEstablecimientos to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initRelDocenteEstablecimientos()
	{
		if ($this->collRelDocenteEstablecimientos === null) {
			$this->collRelDocenteEstablecimientos = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Docente has previously
	 * been saved, it will retrieve related RelDocenteEstablecimientos from storage.
	 * If this Docente is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getRelDocenteEstablecimientos($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelDocenteEstablecimientoPeer.php';
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
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


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

	/**
	 * Returns the number of related RelDocenteEstablecimientos.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countRelDocenteEstablecimientos($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelDocenteEstablecimientoPeer.php';
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

	/**
	 * Method called to associate a RelDocenteEstablecimiento object to this object
	 * through the RelDocenteEstablecimiento foreign key attribute
	 *
	 * @param RelDocenteEstablecimiento $l RelDocenteEstablecimiento
	 * @return void
	 * @throws PropelException
	 */
	public function addRelDocenteEstablecimiento(RelDocenteEstablecimiento $l)
	{
		$this->collRelDocenteEstablecimientos[] = $l;
		$l->setDocente($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Docente is new, it will return
	 * an empty collection; or if this Docente has previously
	 * been saved, it will retrieve related RelDocenteEstablecimientos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Docente.
	 */
	public function getRelDocenteEstablecimientosJoinEstablecimiento($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelDocenteEstablecimientoPeer.php';
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
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID, $this->getId());

			if (!isset($this->lastRelDocenteEstablecimientoCriteria) || !$this->lastRelDocenteEstablecimientoCriteria->equals($criteria)) {
				$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		}
		$this->lastRelDocenteEstablecimientoCriteria = $criteria;

		return $this->collRelDocenteEstablecimientos;
	}

	/**
	 * Temporary storage of collRelActividadDocentes to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initRelActividadDocentes()
	{
		if ($this->collRelActividadDocentes === null) {
			$this->collRelActividadDocentes = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Docente has previously
	 * been saved, it will retrieve related RelActividadDocentes from storage.
	 * If this Docente is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getRelActividadDocentes($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelActividadDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelActividadDocentes === null) {
			if ($this->isNew()) {
			   $this->collRelActividadDocentes = array();
			} else {

				$criteria->add(RelActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

				RelActividadDocentePeer::addSelectColumns($criteria);
				$this->collRelActividadDocentes = RelActividadDocentePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(RelActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

				RelActividadDocentePeer::addSelectColumns($criteria);
				if (!isset($this->lastRelActividadDocenteCriteria) || !$this->lastRelActividadDocenteCriteria->equals($criteria)) {
					$this->collRelActividadDocentes = RelActividadDocentePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelActividadDocenteCriteria = $criteria;
		return $this->collRelActividadDocentes;
	}

	/**
	 * Returns the number of related RelActividadDocentes.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countRelActividadDocentes($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelActividadDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

		return RelActividadDocentePeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a RelActividadDocente object to this object
	 * through the RelActividadDocente foreign key attribute
	 *
	 * @param RelActividadDocente $l RelActividadDocente
	 * @return void
	 * @throws PropelException
	 */
	public function addRelActividadDocente(RelActividadDocente $l)
	{
		$this->collRelActividadDocentes[] = $l;
		$l->setDocente($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Docente is new, it will return
	 * an empty collection; or if this Docente has previously
	 * been saved, it will retrieve related RelActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Docente.
	 */
	public function getRelActividadDocentesJoinActividad($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelActividadDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelActividadDocentes = array();
			} else {

				$criteria->add(RelActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

				$this->collRelActividadDocentes = RelActividadDocentePeer::doSelectJoinActividad($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelActividadDocentePeer::FK_DOCENTE_ID, $this->getId());

			if (!isset($this->lastRelActividadDocenteCriteria) || !$this->lastRelActividadDocenteCriteria->equals($criteria)) {
				$this->collRelActividadDocentes = RelActividadDocentePeer::doSelectJoinActividad($criteria, $con);
			}
		}
		$this->lastRelActividadDocenteCriteria = $criteria;

		return $this->collRelActividadDocentes;
	}

	/**
	 * Temporary storage of collDocenteHorarios to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initDocenteHorarios()
	{
		if ($this->collDocenteHorarios === null) {
			$this->collDocenteHorarios = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Docente has previously
	 * been saved, it will retrieve related DocenteHorarios from storage.
	 * If this Docente is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getDocenteHorarios($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseDocenteHorarioPeer.php';
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
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


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

	/**
	 * Returns the number of related DocenteHorarios.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countDocenteHorarios($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseDocenteHorarioPeer.php';
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

	/**
	 * Method called to associate a DocenteHorario object to this object
	 * through the DocenteHorario foreign key attribute
	 *
	 * @param DocenteHorario $l DocenteHorario
	 * @return void
	 * @throws PropelException
	 */
	public function addDocenteHorario(DocenteHorario $l)
	{
		$this->collDocenteHorarios[] = $l;
		$l->setDocente($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Docente is new, it will return
	 * an empty collection; or if this Docente has previously
	 * been saved, it will retrieve related DocenteHorarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Docente.
	 */
	public function getDocenteHorariosJoinRepeticion($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseDocenteHorarioPeer.php';
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

				$this->collDocenteHorarios = DocenteHorarioPeer::doSelectJoinRepeticion($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->getId());

			if (!isset($this->lastDocenteHorarioCriteria) || !$this->lastDocenteHorarioCriteria->equals($criteria)) {
				$this->collDocenteHorarios = DocenteHorarioPeer::doSelectJoinRepeticion($criteria, $con);
			}
		}
		$this->lastDocenteHorarioCriteria = $criteria;

		return $this->collDocenteHorarios;
	}

} // BaseDocente
