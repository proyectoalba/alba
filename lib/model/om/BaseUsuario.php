<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/UsuarioPeer.php';

/**
 * Base class that represents a row from the 'usuario' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseUsuario extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var UsuarioPeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var int
	 */
	protected $id;


	/**
	 * The value for the usuario field.
	 * @var string
	 */
	protected $usuario = '';


	/**
	 * The value for the clave field.
	 * @var string
	 */
	protected $clave = '';


	/**
	 * The value for the correo_publico field.
	 * @var boolean
	 */
	protected $correo_publico = true;


	/**
	 * The value for the activo field.
	 * @var boolean
	 */
	protected $activo = true;


	/**
	 * The value for the fecha_creado field.
	 * @var int
	 */
	protected $fecha_creado;


	/**
	 * The value for the fecha_actualizado field.
	 * @var int
	 */
	protected $fecha_actualizado;


	/**
	 * The value for the seguridad_pregunta field.
	 * @var string
	 */
	protected $seguridad_pregunta;


	/**
	 * The value for the seguridad_respuesta field.
	 * @var string
	 */
	protected $seguridad_respuesta;


	/**
	 * The value for the email field.
	 * @var string
	 */
	protected $email;


	/**
	 * The value for the fk_establecimiento_id field.
	 * @var int
	 */
	protected $fk_establecimiento_id = 0;


	/**
	 * The value for the borrado field.
	 * @var boolean
	 */
	protected $borrado = true;

	/**
	 * @var Establecimiento
	 */
	protected $aEstablecimiento;

	/**
	 * Collection to store aggregation of collRelUsuarioPermisos.
	 * @var array
	 */
	protected $collRelUsuarioPermisos;

	/**
	 * The criteria used to select the current contents of collRelUsuarioPermisos.
	 * @var Criteria
	 */
	protected $lastRelUsuarioPermisoCriteria = null;

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
	 * Get the [usuario] column value.
	 * 
	 * @return string
	 */
	public function getUsuario()
	{

		return $this->usuario;
	}

	/**
	 * Get the [clave] column value.
	 * 
	 * @return string
	 */
	public function getClave()
	{

		return $this->clave;
	}

	/**
	 * Get the [correo_publico] column value.
	 * 
	 * @return boolean
	 */
	public function getCorreoPublico()
	{

		return $this->correo_publico;
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
	 * Get the [optionally formatted] [fecha_creado] column value.
	 * 
	 * @param string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getFechaCreado($format = 'Y-m-d H:i:s')
	{

		if ($this->fecha_creado === null || $this->fecha_creado === '') {
			return null;
		} elseif (!is_int($this->fecha_creado)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->fecha_creado);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse value of [fecha_creado] as date/time value: " . var_export($this->fecha_creado, true));
			}
		} else {
			$ts = $this->fecha_creado;
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
	 * Get the [optionally formatted] [fecha_actualizado] column value.
	 * 
	 * @param string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getFechaActualizado($format = 'Y-m-d H:i:s')
	{

		if ($this->fecha_actualizado === null || $this->fecha_actualizado === '') {
			return null;
		} elseif (!is_int($this->fecha_actualizado)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->fecha_actualizado);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse value of [fecha_actualizado] as date/time value: " . var_export($this->fecha_actualizado, true));
			}
		} else {
			$ts = $this->fecha_actualizado;
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
	 * Get the [seguridad_pregunta] column value.
	 * 
	 * @return string
	 */
	public function getSeguridadPregunta()
	{

		return $this->seguridad_pregunta;
	}

	/**
	 * Get the [seguridad_respuesta] column value.
	 * 
	 * @return string
	 */
	public function getSeguridadRespuesta()
	{

		return $this->seguridad_respuesta;
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
	 * Get the [fk_establecimiento_id] column value.
	 * 
	 * @return int
	 */
	public function getFkEstablecimientoId()
	{

		return $this->fk_establecimiento_id;
	}

	/**
	 * Get the [borrado] column value.
	 * 
	 * @return boolean
	 */
	public function getBorrado()
	{

		return $this->borrado;
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
			$this->modifiedColumns[] = UsuarioPeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [usuario] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setUsuario($v)
	{

		if ($this->usuario !== $v || $v === '') {
			$this->usuario = $v;
			$this->modifiedColumns[] = UsuarioPeer::USUARIO;
		}

	} // setUsuario()

	/**
	 * Set the value of [clave] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setClave($v)
	{

		if ($this->clave !== $v || $v === '') {
			$this->clave = $v;
			$this->modifiedColumns[] = UsuarioPeer::CLAVE;
		}

	} // setClave()

	/**
	 * Set the value of [correo_publico] column.
	 * 
	 * @param boolean $v new value
	 * @return void
	 */
	public function setCorreoPublico($v)
	{

		if ($this->correo_publico !== $v || $v === true) {
			$this->correo_publico = $v;
			$this->modifiedColumns[] = UsuarioPeer::CORREO_PUBLICO;
		}

	} // setCorreoPublico()

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
			$this->modifiedColumns[] = UsuarioPeer::ACTIVO;
		}

	} // setActivo()

	/**
	 * Set the value of [fecha_creado] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFechaCreado($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse date/time value for [fecha_creado] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_creado !== $ts) {
			$this->fecha_creado = $ts;
			$this->modifiedColumns[] = UsuarioPeer::FECHA_CREADO;
		}

	} // setFechaCreado()

	/**
	 * Set the value of [fecha_actualizado] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFechaActualizado($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse date/time value for [fecha_actualizado] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_actualizado !== $ts) {
			$this->fecha_actualizado = $ts;
			$this->modifiedColumns[] = UsuarioPeer::FECHA_ACTUALIZADO;
		}

	} // setFechaActualizado()

	/**
	 * Set the value of [seguridad_pregunta] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setSeguridadPregunta($v)
	{

		if ($this->seguridad_pregunta !== $v) {
			$this->seguridad_pregunta = $v;
			$this->modifiedColumns[] = UsuarioPeer::SEGURIDAD_PREGUNTA;
		}

	} // setSeguridadPregunta()

	/**
	 * Set the value of [seguridad_respuesta] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setSeguridadRespuesta($v)
	{

		if ($this->seguridad_respuesta !== $v) {
			$this->seguridad_respuesta = $v;
			$this->modifiedColumns[] = UsuarioPeer::SEGURIDAD_RESPUESTA;
		}

	} // setSeguridadRespuesta()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setEmail($v)
	{

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = UsuarioPeer::EMAIL;
		}

	} // setEmail()

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
			$this->modifiedColumns[] = UsuarioPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
		}

	} // setFkEstablecimientoId()

	/**
	 * Set the value of [borrado] column.
	 * 
	 * @param boolean $v new value
	 * @return void
	 */
	public function setBorrado($v)
	{

		if ($this->borrado !== $v || $v === true) {
			$this->borrado = $v;
			$this->modifiedColumns[] = UsuarioPeer::BORRADO;
		}

	} // setBorrado()

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

			$this->usuario = $rs->getString($startcol + 1);

			$this->clave = $rs->getString($startcol + 2);

			$this->correo_publico = $rs->getBoolean($startcol + 3);

			$this->activo = $rs->getBoolean($startcol + 4);

			$this->fecha_creado = $rs->getTimestamp($startcol + 5, null);

			$this->fecha_actualizado = $rs->getTimestamp($startcol + 6, null);

			$this->seguridad_pregunta = $rs->getString($startcol + 7);

			$this->seguridad_respuesta = $rs->getString($startcol + 8);

			$this->email = $rs->getString($startcol + 9);

			$this->fk_establecimiento_id = $rs->getInt($startcol + 10);

			$this->borrado = $rs->getBoolean($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 12; // 12 = UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Usuario object", $e);
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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UsuarioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME);
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

			if ($this->aEstablecimiento !== null) {
				if ($this->aEstablecimiento->isModified()) {
					$affectedRows += $this->aEstablecimiento->save($con);
				}
				$this->setEstablecimiento($this->aEstablecimiento);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UsuarioPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += UsuarioPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collRelUsuarioPermisos !== null) {
				foreach($this->collRelUsuarioPermisos as $referrerFK) {
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

			if ($this->aEstablecimiento !== null) {
				if (!$this->aEstablecimiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstablecimiento->getValidationFailures());
				}
			}


			if (($retval = UsuarioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelUsuarioPermisos !== null) {
					foreach($this->collRelUsuarioPermisos as $referrerFK) {
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
		$pos = UsuarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getUsuario();
				break;
			case 2:
				return $this->getClave();
				break;
			case 3:
				return $this->getCorreoPublico();
				break;
			case 4:
				return $this->getActivo();
				break;
			case 5:
				return $this->getFechaCreado();
				break;
			case 6:
				return $this->getFechaActualizado();
				break;
			case 7:
				return $this->getSeguridadPregunta();
				break;
			case 8:
				return $this->getSeguridadRespuesta();
				break;
			case 9:
				return $this->getEmail();
				break;
			case 10:
				return $this->getFkEstablecimientoId();
				break;
			case 11:
				return $this->getBorrado();
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
		$keys = UsuarioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUsuario(),
			$keys[2] => $this->getClave(),
			$keys[3] => $this->getCorreoPublico(),
			$keys[4] => $this->getActivo(),
			$keys[5] => $this->getFechaCreado(),
			$keys[6] => $this->getFechaActualizado(),
			$keys[7] => $this->getSeguridadPregunta(),
			$keys[8] => $this->getSeguridadRespuesta(),
			$keys[9] => $this->getEmail(),
			$keys[10] => $this->getFkEstablecimientoId(),
			$keys[11] => $this->getBorrado(),
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
		$pos = UsuarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setUsuario($value);
				break;
			case 2:
				$this->setClave($value);
				break;
			case 3:
				$this->setCorreoPublico($value);
				break;
			case 4:
				$this->setActivo($value);
				break;
			case 5:
				$this->setFechaCreado($value);
				break;
			case 6:
				$this->setFechaActualizado($value);
				break;
			case 7:
				$this->setSeguridadPregunta($value);
				break;
			case 8:
				$this->setSeguridadRespuesta($value);
				break;
			case 9:
				$this->setEmail($value);
				break;
			case 10:
				$this->setFkEstablecimientoId($value);
				break;
			case 11:
				$this->setBorrado($value);
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
		$keys = UsuarioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUsuario($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setClave($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCorreoPublico($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setActivo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFechaCreado($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFechaActualizado($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSeguridadPregunta($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSeguridadRespuesta($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEmail($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFkEstablecimientoId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setBorrado($arr[$keys[11]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);

		if ($this->isColumnModified(UsuarioPeer::ID)) $criteria->add(UsuarioPeer::ID, $this->id);
		if ($this->isColumnModified(UsuarioPeer::USUARIO)) $criteria->add(UsuarioPeer::USUARIO, $this->usuario);
		if ($this->isColumnModified(UsuarioPeer::CLAVE)) $criteria->add(UsuarioPeer::CLAVE, $this->clave);
		if ($this->isColumnModified(UsuarioPeer::CORREO_PUBLICO)) $criteria->add(UsuarioPeer::CORREO_PUBLICO, $this->correo_publico);
		if ($this->isColumnModified(UsuarioPeer::ACTIVO)) $criteria->add(UsuarioPeer::ACTIVO, $this->activo);
		if ($this->isColumnModified(UsuarioPeer::FECHA_CREADO)) $criteria->add(UsuarioPeer::FECHA_CREADO, $this->fecha_creado);
		if ($this->isColumnModified(UsuarioPeer::FECHA_ACTUALIZADO)) $criteria->add(UsuarioPeer::FECHA_ACTUALIZADO, $this->fecha_actualizado);
		if ($this->isColumnModified(UsuarioPeer::SEGURIDAD_PREGUNTA)) $criteria->add(UsuarioPeer::SEGURIDAD_PREGUNTA, $this->seguridad_pregunta);
		if ($this->isColumnModified(UsuarioPeer::SEGURIDAD_RESPUESTA)) $criteria->add(UsuarioPeer::SEGURIDAD_RESPUESTA, $this->seguridad_respuesta);
		if ($this->isColumnModified(UsuarioPeer::EMAIL)) $criteria->add(UsuarioPeer::EMAIL, $this->email);
		if ($this->isColumnModified(UsuarioPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(UsuarioPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(UsuarioPeer::BORRADO)) $criteria->add(UsuarioPeer::BORRADO, $this->borrado);

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
		$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);

		$criteria->add(UsuarioPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Usuario (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setUsuario($this->usuario);

		$copyObj->setClave($this->clave);

		$copyObj->setCorreoPublico($this->correo_publico);

		$copyObj->setActivo($this->activo);

		$copyObj->setFechaCreado($this->fecha_creado);

		$copyObj->setFechaActualizado($this->fecha_actualizado);

		$copyObj->setSeguridadPregunta($this->seguridad_pregunta);

		$copyObj->setSeguridadRespuesta($this->seguridad_respuesta);

		$copyObj->setEmail($this->email);

		$copyObj->setFkEstablecimientoId($this->fk_establecimiento_id);

		$copyObj->setBorrado($this->borrado);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getRelUsuarioPermisos() as $relObj) {
				$copyObj->addRelUsuarioPermiso($relObj->copy($deepCopy));
			}

			foreach($this->getLegajopedagogicos() as $relObj) {
				$copyObj->addLegajopedagogico($relObj->copy($deepCopy));
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
	 * @return Usuario Clone of current object.
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
	 * @return UsuarioPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UsuarioPeer();
		}
		return self::$peer;
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
	 * Temporary storage of collRelUsuarioPermisos to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initRelUsuarioPermisos()
	{
		if ($this->collRelUsuarioPermisos === null) {
			$this->collRelUsuarioPermisos = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario has previously
	 * been saved, it will retrieve related RelUsuarioPermisos from storage.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getRelUsuarioPermisos($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelUsuarioPermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelUsuarioPermisos === null) {
			if ($this->isNew()) {
			   $this->collRelUsuarioPermisos = array();
			} else {

				$criteria->add(RelUsuarioPermisoPeer::FK_USUARIO_ID, $this->getId());

				RelUsuarioPermisoPeer::addSelectColumns($criteria);
				$this->collRelUsuarioPermisos = RelUsuarioPermisoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(RelUsuarioPermisoPeer::FK_USUARIO_ID, $this->getId());

				RelUsuarioPermisoPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelUsuarioPermisoCriteria) || !$this->lastRelUsuarioPermisoCriteria->equals($criteria)) {
					$this->collRelUsuarioPermisos = RelUsuarioPermisoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelUsuarioPermisoCriteria = $criteria;
		return $this->collRelUsuarioPermisos;
	}

	/**
	 * Returns the number of related RelUsuarioPermisos.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countRelUsuarioPermisos($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelUsuarioPermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelUsuarioPermisoPeer::FK_USUARIO_ID, $this->getId());

		return RelUsuarioPermisoPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a RelUsuarioPermiso object to this object
	 * through the RelUsuarioPermiso foreign key attribute
	 *
	 * @param RelUsuarioPermiso $l RelUsuarioPermiso
	 * @return void
	 * @throws PropelException
	 */
	public function addRelUsuarioPermiso(RelUsuarioPermiso $l)
	{
		$this->collRelUsuarioPermisos[] = $l;
		$l->setUsuario($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related RelUsuarioPermisos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getRelUsuarioPermisosJoinPermiso($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelUsuarioPermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelUsuarioPermisos === null) {
			if ($this->isNew()) {
				$this->collRelUsuarioPermisos = array();
			} else {

				$criteria->add(RelUsuarioPermisoPeer::FK_USUARIO_ID, $this->getId());

				$this->collRelUsuarioPermisos = RelUsuarioPermisoPeer::doSelectJoinPermiso($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelUsuarioPermisoPeer::FK_USUARIO_ID, $this->getId());

			if (!isset($this->lastRelUsuarioPermisoCriteria) || !$this->lastRelUsuarioPermisoCriteria->equals($criteria)) {
				$this->collRelUsuarioPermisos = RelUsuarioPermisoPeer::doSelectJoinPermiso($criteria, $con);
			}
		}
		$this->lastRelUsuarioPermisoCriteria = $criteria;

		return $this->collRelUsuarioPermisos;
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
	 * Otherwise if this Usuario has previously
	 * been saved, it will retrieve related Legajopedagogicos from storage.
	 * If this Usuario is new, it will return
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

				$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->getId());

				LegajopedagogicoPeer::addSelectColumns($criteria);
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->getId());

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

		$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->getId());

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
		$l->setUsuario($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related Legajopedagogicos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
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

				$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->getId());

				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinLegajocategoria($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->getId());

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
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related Legajopedagogicos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 */
	public function getLegajopedagogicosJoinAlumno($criteria = null, $con = null)
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

				$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->getId());

				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinAlumno($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->getId());

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinAlumno($criteria, $con);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}

} // BaseUsuario
