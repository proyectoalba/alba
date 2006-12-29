<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/EstablecimientoPeer.php';

/**
 * Base class that represents a row from the 'establecimiento' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseEstablecimiento extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var EstablecimientoPeer
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
	 * The value for the descripcion field.
	 * @var string
	 */
	protected $descripcion;


	/**
	 * The value for the fk_distritoescolar_id field.
	 * @var int
	 */
	protected $fk_distritoescolar_id = 0;


	/**
	 * The value for the fk_organizacion_id field.
	 * @var int
	 */
	protected $fk_organizacion_id = 0;


	/**
	 * The value for the fk_niveltipo_id field.
	 * @var int
	 */
	protected $fk_niveltipo_id = 0;

	/**
	 * @var Niveltipo
	 */
	protected $aNiveltipo;

	/**
	 * @var Organizacion
	 */
	protected $aOrganizacion;

	/**
	 * @var Distritoescolar
	 */
	protected $aDistritoescolar;

	/**
	 * Collection to store aggregation of collRelEstablecimientoLocacions.
	 * @var array
	 */
	protected $collRelEstablecimientoLocacions;

	/**
	 * The criteria used to select the current contents of collRelEstablecimientoLocacions.
	 * @var Criteria
	 */
	protected $lastRelEstablecimientoLocacionCriteria = null;

	/**
	 * Collection to store aggregation of collUsuarios.
	 * @var array
	 */
	protected $collUsuarios;

	/**
	 * The criteria used to select the current contents of collUsuarios.
	 * @var Criteria
	 */
	protected $lastUsuarioCriteria = null;

	/**
	 * Collection to store aggregation of collAlumnos.
	 * @var array
	 */
	protected $collAlumnos;

	/**
	 * The criteria used to select the current contents of collAlumnos.
	 * @var Criteria
	 */
	protected $lastAlumnoCriteria = null;

	/**
	 * Collection to store aggregation of collCiclolectivos.
	 * @var array
	 */
	protected $collCiclolectivos;

	/**
	 * The criteria used to select the current contents of collCiclolectivos.
	 * @var Criteria
	 */
	protected $lastCiclolectivoCriteria = null;

	/**
	 * Collection to store aggregation of collConceptos.
	 * @var array
	 */
	protected $collConceptos;

	/**
	 * The criteria used to select the current contents of collConceptos.
	 * @var Criteria
	 */
	protected $lastConceptoCriteria = null;

	/**
	 * Collection to store aggregation of collEscalanotas.
	 * @var array
	 */
	protected $collEscalanotas;

	/**
	 * The criteria used to select the current contents of collEscalanotas.
	 * @var Criteria
	 */
	protected $lastEscalanotaCriteria = null;

	/**
	 * Collection to store aggregation of collAnios.
	 * @var array
	 */
	protected $collAnios;

	/**
	 * The criteria used to select the current contents of collAnios.
	 * @var Criteria
	 */
	protected $lastAnioCriteria = null;

	/**
	 * Collection to store aggregation of collActividads.
	 * @var array
	 */
	protected $collActividads;

	/**
	 * The criteria used to select the current contents of collActividads.
	 * @var Criteria
	 */
	protected $lastActividadCriteria = null;

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
	 * Collection to store aggregation of collHorarioescolars.
	 * @var array
	 */
	protected $collHorarioescolars;

	/**
	 * The criteria used to select the current contents of collHorarioescolars.
	 * @var Criteria
	 */
	protected $lastHorarioescolarCriteria = null;

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
	 * Get the [descripcion] column value.
	 * 
	 * @return string
	 */
	public function getDescripcion()
	{

		return $this->descripcion;
	}

	/**
	 * Get the [fk_distritoescolar_id] column value.
	 * 
	 * @return int
	 */
	public function getFkDistritoescolarId()
	{

		return $this->fk_distritoescolar_id;
	}

	/**
	 * Get the [fk_organizacion_id] column value.
	 * 
	 * @return int
	 */
	public function getFkOrganizacionId()
	{

		return $this->fk_organizacion_id;
	}

	/**
	 * Get the [fk_niveltipo_id] column value.
	 * 
	 * @return int
	 */
	public function getFkNiveltipoId()
	{

		return $this->fk_niveltipo_id;
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
			$this->modifiedColumns[] = EstablecimientoPeer::ID;
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
			$this->modifiedColumns[] = EstablecimientoPeer::NOMBRE;
		}

	} // setNombre()

	/**
	 * Set the value of [descripcion] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setDescripcion($v)
	{

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::DESCRIPCION;
		}

	} // setDescripcion()

	/**
	 * Set the value of [fk_distritoescolar_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkDistritoescolarId($v)
	{

		if ($this->fk_distritoescolar_id !== $v || $v === 0) {
			$this->fk_distritoescolar_id = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::FK_DISTRITOESCOLAR_ID;
		}

		if ($this->aDistritoescolar !== null && $this->aDistritoescolar->getId() !== $v) {
			$this->aDistritoescolar = null;
		}

	} // setFkDistritoescolarId()

	/**
	 * Set the value of [fk_organizacion_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkOrganizacionId($v)
	{

		if ($this->fk_organizacion_id !== $v || $v === 0) {
			$this->fk_organizacion_id = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::FK_ORGANIZACION_ID;
		}

		if ($this->aOrganizacion !== null && $this->aOrganizacion->getId() !== $v) {
			$this->aOrganizacion = null;
		}

	} // setFkOrganizacionId()

	/**
	 * Set the value of [fk_niveltipo_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkNiveltipoId($v)
	{

		if ($this->fk_niveltipo_id !== $v || $v === 0) {
			$this->fk_niveltipo_id = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::FK_NIVELTIPO_ID;
		}

		if ($this->aNiveltipo !== null && $this->aNiveltipo->getId() !== $v) {
			$this->aNiveltipo = null;
		}

	} // setFkNiveltipoId()

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

			$this->descripcion = $rs->getString($startcol + 2);

			$this->fk_distritoescolar_id = $rs->getInt($startcol + 3);

			$this->fk_organizacion_id = $rs->getInt($startcol + 4);

			$this->fk_niveltipo_id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 6; // 6 = EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Establecimiento object", $e);
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
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EstablecimientoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME);
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

			if ($this->aNiveltipo !== null) {
				if ($this->aNiveltipo->isModified()) {
					$affectedRows += $this->aNiveltipo->save($con);
				}
				$this->setNiveltipo($this->aNiveltipo);
			}

			if ($this->aOrganizacion !== null) {
				if ($this->aOrganizacion->isModified()) {
					$affectedRows += $this->aOrganizacion->save($con);
				}
				$this->setOrganizacion($this->aOrganizacion);
			}

			if ($this->aDistritoescolar !== null) {
				if ($this->aDistritoescolar->isModified()) {
					$affectedRows += $this->aDistritoescolar->save($con);
				}
				$this->setDistritoescolar($this->aDistritoescolar);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EstablecimientoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += EstablecimientoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collRelEstablecimientoLocacions !== null) {
				foreach($this->collRelEstablecimientoLocacions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUsuarios !== null) {
				foreach($this->collUsuarios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAlumnos !== null) {
				foreach($this->collAlumnos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCiclolectivos !== null) {
				foreach($this->collCiclolectivos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collConceptos !== null) {
				foreach($this->collConceptos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEscalanotas !== null) {
				foreach($this->collEscalanotas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAnios !== null) {
				foreach($this->collAnios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collActividads !== null) {
				foreach($this->collActividads as $referrerFK) {
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

			if ($this->collHorarioescolars !== null) {
				foreach($this->collHorarioescolars as $referrerFK) {
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

			if ($this->aNiveltipo !== null) {
				if (!$this->aNiveltipo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aNiveltipo->getValidationFailures());
				}
			}

			if ($this->aOrganizacion !== null) {
				if (!$this->aOrganizacion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOrganizacion->getValidationFailures());
				}
			}

			if ($this->aDistritoescolar !== null) {
				if (!$this->aDistritoescolar->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDistritoescolar->getValidationFailures());
				}
			}


			if (($retval = EstablecimientoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelEstablecimientoLocacions !== null) {
					foreach($this->collRelEstablecimientoLocacions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUsuarios !== null) {
					foreach($this->collUsuarios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAlumnos !== null) {
					foreach($this->collAlumnos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCiclolectivos !== null) {
					foreach($this->collCiclolectivos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collConceptos !== null) {
					foreach($this->collConceptos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEscalanotas !== null) {
					foreach($this->collEscalanotas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAnios !== null) {
					foreach($this->collAnios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collActividads !== null) {
					foreach($this->collActividads as $referrerFK) {
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

				if ($this->collHorarioescolars !== null) {
					foreach($this->collHorarioescolars as $referrerFK) {
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
		$pos = EstablecimientoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDescripcion();
				break;
			case 3:
				return $this->getFkDistritoescolarId();
				break;
			case 4:
				return $this->getFkOrganizacionId();
				break;
			case 5:
				return $this->getFkNiveltipoId();
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
		$keys = EstablecimientoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getFkDistritoescolarId(),
			$keys[4] => $this->getFkOrganizacionId(),
			$keys[5] => $this->getFkNiveltipoId(),
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
		$pos = EstablecimientoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDescripcion($value);
				break;
			case 3:
				$this->setFkDistritoescolarId($value);
				break;
			case 4:
				$this->setFkOrganizacionId($value);
				break;
			case 5:
				$this->setFkNiveltipoId($value);
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
		$keys = EstablecimientoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkDistritoescolarId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFkOrganizacionId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFkNiveltipoId($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);

		if ($this->isColumnModified(EstablecimientoPeer::ID)) $criteria->add(EstablecimientoPeer::ID, $this->id);
		if ($this->isColumnModified(EstablecimientoPeer::NOMBRE)) $criteria->add(EstablecimientoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(EstablecimientoPeer::DESCRIPCION)) $criteria->add(EstablecimientoPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID)) $criteria->add(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, $this->fk_distritoescolar_id);
		if ($this->isColumnModified(EstablecimientoPeer::FK_ORGANIZACION_ID)) $criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->fk_organizacion_id);
		if ($this->isColumnModified(EstablecimientoPeer::FK_NIVELTIPO_ID)) $criteria->add(EstablecimientoPeer::FK_NIVELTIPO_ID, $this->fk_niveltipo_id);

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
		$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);

		$criteria->add(EstablecimientoPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Establecimiento (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNombre($this->nombre);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setFkDistritoescolarId($this->fk_distritoescolar_id);

		$copyObj->setFkOrganizacionId($this->fk_organizacion_id);

		$copyObj->setFkNiveltipoId($this->fk_niveltipo_id);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getRelEstablecimientoLocacions() as $relObj) {
				$copyObj->addRelEstablecimientoLocacion($relObj->copy($deepCopy));
			}

			foreach($this->getUsuarios() as $relObj) {
				$copyObj->addUsuario($relObj->copy($deepCopy));
			}

			foreach($this->getAlumnos() as $relObj) {
				$copyObj->addAlumno($relObj->copy($deepCopy));
			}

			foreach($this->getCiclolectivos() as $relObj) {
				$copyObj->addCiclolectivo($relObj->copy($deepCopy));
			}

			foreach($this->getConceptos() as $relObj) {
				$copyObj->addConcepto($relObj->copy($deepCopy));
			}

			foreach($this->getEscalanotas() as $relObj) {
				$copyObj->addEscalanota($relObj->copy($deepCopy));
			}

			foreach($this->getAnios() as $relObj) {
				$copyObj->addAnio($relObj->copy($deepCopy));
			}

			foreach($this->getActividads() as $relObj) {
				$copyObj->addActividad($relObj->copy($deepCopy));
			}

			foreach($this->getRelDocenteEstablecimientos() as $relObj) {
				$copyObj->addRelDocenteEstablecimiento($relObj->copy($deepCopy));
			}

			foreach($this->getHorarioescolars() as $relObj) {
				$copyObj->addHorarioescolar($relObj->copy($deepCopy));
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
	 * @return Establecimiento Clone of current object.
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
	 * @return EstablecimientoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new EstablecimientoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Niveltipo object.
	 *
	 * @param Niveltipo $v
	 * @return void
	 * @throws PropelException
	 */
	public function setNiveltipo($v)
	{


		if ($v === null) {
			$this->setFkNiveltipoId('0');
		} else {
			$this->setFkNiveltipoId($v->getId());
		}


		$this->aNiveltipo = $v;
	}


	/**
	 * Get the associated Niveltipo object
	 *
	 * @param Connection Optional Connection object.
	 * @return Niveltipo The associated Niveltipo object.
	 * @throws PropelException
	 */
	public function getNiveltipo($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseNiveltipoPeer.php';

		if ($this->aNiveltipo === null && ($this->fk_niveltipo_id !== null)) {

			$this->aNiveltipo = NiveltipoPeer::retrieveByPK($this->fk_niveltipo_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = NiveltipoPeer::retrieveByPK($this->fk_niveltipo_id, $con);
			   $obj->addNiveltipos($this);
			 */
		}
		return $this->aNiveltipo;
	}

	/**
	 * Declares an association between this object and a Organizacion object.
	 *
	 * @param Organizacion $v
	 * @return void
	 * @throws PropelException
	 */
	public function setOrganizacion($v)
	{


		if ($v === null) {
			$this->setFkOrganizacionId('0');
		} else {
			$this->setFkOrganizacionId($v->getId());
		}


		$this->aOrganizacion = $v;
	}


	/**
	 * Get the associated Organizacion object
	 *
	 * @param Connection Optional Connection object.
	 * @return Organizacion The associated Organizacion object.
	 * @throws PropelException
	 */
	public function getOrganizacion($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseOrganizacionPeer.php';

		if ($this->aOrganizacion === null && ($this->fk_organizacion_id !== null)) {

			$this->aOrganizacion = OrganizacionPeer::retrieveByPK($this->fk_organizacion_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = OrganizacionPeer::retrieveByPK($this->fk_organizacion_id, $con);
			   $obj->addOrganizacions($this);
			 */
		}
		return $this->aOrganizacion;
	}

	/**
	 * Declares an association between this object and a Distritoescolar object.
	 *
	 * @param Distritoescolar $v
	 * @return void
	 * @throws PropelException
	 */
	public function setDistritoescolar($v)
	{


		if ($v === null) {
			$this->setFkDistritoescolarId('0');
		} else {
			$this->setFkDistritoescolarId($v->getId());
		}


		$this->aDistritoescolar = $v;
	}


	/**
	 * Get the associated Distritoescolar object
	 *
	 * @param Connection Optional Connection object.
	 * @return Distritoescolar The associated Distritoescolar object.
	 * @throws PropelException
	 */
	public function getDistritoescolar($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseDistritoescolarPeer.php';

		if ($this->aDistritoescolar === null && ($this->fk_distritoescolar_id !== null)) {

			$this->aDistritoescolar = DistritoescolarPeer::retrieveByPK($this->fk_distritoescolar_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = DistritoescolarPeer::retrieveByPK($this->fk_distritoescolar_id, $con);
			   $obj->addDistritoescolars($this);
			 */
		}
		return $this->aDistritoescolar;
	}

	/**
	 * Temporary storage of collRelEstablecimientoLocacions to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initRelEstablecimientoLocacions()
	{
		if ($this->collRelEstablecimientoLocacions === null) {
			$this->collRelEstablecimientoLocacions = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento has previously
	 * been saved, it will retrieve related RelEstablecimientoLocacions from storage.
	 * If this Establecimiento is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getRelEstablecimientoLocacions($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelEstablecimientoLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelEstablecimientoLocacions === null) {
			if ($this->isNew()) {
			   $this->collRelEstablecimientoLocacions = array();
			} else {

				$criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				RelEstablecimientoLocacionPeer::addSelectColumns($criteria);
				$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				RelEstablecimientoLocacionPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelEstablecimientoLocacionCriteria) || !$this->lastRelEstablecimientoLocacionCriteria->equals($criteria)) {
					$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelEstablecimientoLocacionCriteria = $criteria;
		return $this->collRelEstablecimientoLocacions;
	}

	/**
	 * Returns the number of related RelEstablecimientoLocacions.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countRelEstablecimientoLocacions($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelEstablecimientoLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return RelEstablecimientoLocacionPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a RelEstablecimientoLocacion object to this object
	 * through the RelEstablecimientoLocacion foreign key attribute
	 *
	 * @param RelEstablecimientoLocacion $l RelEstablecimientoLocacion
	 * @return void
	 * @throws PropelException
	 */
	public function addRelEstablecimientoLocacion(RelEstablecimientoLocacion $l)
	{
		$this->collRelEstablecimientoLocacions[] = $l;
		$l->setEstablecimiento($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento is new, it will return
	 * an empty collection; or if this Establecimiento has previously
	 * been saved, it will retrieve related RelEstablecimientoLocacions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Establecimiento.
	 */
	public function getRelEstablecimientoLocacionsJoinLocacion($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelEstablecimientoLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelEstablecimientoLocacions === null) {
			if ($this->isNew()) {
				$this->collRelEstablecimientoLocacions = array();
			} else {

				$criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelectJoinLocacion($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastRelEstablecimientoLocacionCriteria) || !$this->lastRelEstablecimientoLocacionCriteria->equals($criteria)) {
				$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelectJoinLocacion($criteria, $con);
			}
		}
		$this->lastRelEstablecimientoLocacionCriteria = $criteria;

		return $this->collRelEstablecimientoLocacions;
	}

	/**
	 * Temporary storage of collUsuarios to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initUsuarios()
	{
		if ($this->collUsuarios === null) {
			$this->collUsuarios = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento has previously
	 * been saved, it will retrieve related Usuarios from storage.
	 * If this Establecimiento is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getUsuarios($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseUsuarioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarios === null) {
			if ($this->isNew()) {
			   $this->collUsuarios = array();
			} else {

				$criteria->add(UsuarioPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				UsuarioPeer::addSelectColumns($criteria);
				$this->collUsuarios = UsuarioPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(UsuarioPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				UsuarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastUsuarioCriteria) || !$this->lastUsuarioCriteria->equals($criteria)) {
					$this->collUsuarios = UsuarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUsuarioCriteria = $criteria;
		return $this->collUsuarios;
	}

	/**
	 * Returns the number of related Usuarios.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countUsuarios($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseUsuarioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UsuarioPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return UsuarioPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Usuario object to this object
	 * through the Usuario foreign key attribute
	 *
	 * @param Usuario $l Usuario
	 * @return void
	 * @throws PropelException
	 */
	public function addUsuario(Usuario $l)
	{
		$this->collUsuarios[] = $l;
		$l->setEstablecimiento($this);
	}

	/**
	 * Temporary storage of collAlumnos to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initAlumnos()
	{
		if ($this->collAlumnos === null) {
			$this->collAlumnos = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento has previously
	 * been saved, it will retrieve related Alumnos from storage.
	 * If this Establecimiento is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getAlumnos($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
			   $this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				AlumnoPeer::addSelectColumns($criteria);
				$this->collAlumnos = AlumnoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				AlumnoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
					$this->collAlumnos = AlumnoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAlumnoCriteria = $criteria;
		return $this->collAlumnos;
	}

	/**
	 * Returns the number of related Alumnos.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countAlumnos($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return AlumnoPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Alumno object to this object
	 * through the Alumno foreign key attribute
	 *
	 * @param Alumno $l Alumno
	 * @return void
	 * @throws PropelException
	 */
	public function addAlumno(Alumno $l)
	{
		$this->collAlumnos[] = $l;
		$l->setEstablecimiento($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento is new, it will return
	 * an empty collection; or if this Establecimiento has previously
	 * been saved, it will retrieve related Alumnos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Establecimiento.
	 */
	public function getAlumnosJoinTipodocumento($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinTipodocumento($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinTipodocumento($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento is new, it will return
	 * an empty collection; or if this Establecimiento has previously
	 * been saved, it will retrieve related Alumnos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Establecimiento.
	 */
	public function getAlumnosJoinCuenta($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinCuenta($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinCuenta($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento is new, it will return
	 * an empty collection; or if this Establecimiento has previously
	 * been saved, it will retrieve related Alumnos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Establecimiento.
	 */
	public function getAlumnosJoinProvincia($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinProvincia($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinProvincia($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento is new, it will return
	 * an empty collection; or if this Establecimiento has previously
	 * been saved, it will retrieve related Alumnos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Establecimiento.
	 */
	public function getAlumnosJoinConceptobaja($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinConceptobaja($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinConceptobaja($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}

	/**
	 * Temporary storage of collCiclolectivos to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initCiclolectivos()
	{
		if ($this->collCiclolectivos === null) {
			$this->collCiclolectivos = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento has previously
	 * been saved, it will retrieve related Ciclolectivos from storage.
	 * If this Establecimiento is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getCiclolectivos($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseCiclolectivoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCiclolectivos === null) {
			if ($this->isNew()) {
			   $this->collCiclolectivos = array();
			} else {

				$criteria->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				CiclolectivoPeer::addSelectColumns($criteria);
				$this->collCiclolectivos = CiclolectivoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				CiclolectivoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCiclolectivoCriteria) || !$this->lastCiclolectivoCriteria->equals($criteria)) {
					$this->collCiclolectivos = CiclolectivoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCiclolectivoCriteria = $criteria;
		return $this->collCiclolectivos;
	}

	/**
	 * Returns the number of related Ciclolectivos.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countCiclolectivos($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseCiclolectivoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return CiclolectivoPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Ciclolectivo object to this object
	 * through the Ciclolectivo foreign key attribute
	 *
	 * @param Ciclolectivo $l Ciclolectivo
	 * @return void
	 * @throws PropelException
	 */
	public function addCiclolectivo(Ciclolectivo $l)
	{
		$this->collCiclolectivos[] = $l;
		$l->setEstablecimiento($this);
	}

	/**
	 * Temporary storage of collConceptos to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initConceptos()
	{
		if ($this->collConceptos === null) {
			$this->collConceptos = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento has previously
	 * been saved, it will retrieve related Conceptos from storage.
	 * If this Establecimiento is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getConceptos($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseConceptoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collConceptos === null) {
			if ($this->isNew()) {
			   $this->collConceptos = array();
			} else {

				$criteria->add(ConceptoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				ConceptoPeer::addSelectColumns($criteria);
				$this->collConceptos = ConceptoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ConceptoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				ConceptoPeer::addSelectColumns($criteria);
				if (!isset($this->lastConceptoCriteria) || !$this->lastConceptoCriteria->equals($criteria)) {
					$this->collConceptos = ConceptoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastConceptoCriteria = $criteria;
		return $this->collConceptos;
	}

	/**
	 * Returns the number of related Conceptos.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countConceptos($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseConceptoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ConceptoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return ConceptoPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Concepto object to this object
	 * through the Concepto foreign key attribute
	 *
	 * @param Concepto $l Concepto
	 * @return void
	 * @throws PropelException
	 */
	public function addConcepto(Concepto $l)
	{
		$this->collConceptos[] = $l;
		$l->setEstablecimiento($this);
	}

	/**
	 * Temporary storage of collEscalanotas to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initEscalanotas()
	{
		if ($this->collEscalanotas === null) {
			$this->collEscalanotas = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento has previously
	 * been saved, it will retrieve related Escalanotas from storage.
	 * If this Establecimiento is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getEscalanotas($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseEscalanotaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEscalanotas === null) {
			if ($this->isNew()) {
			   $this->collEscalanotas = array();
			} else {

				$criteria->add(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				EscalanotaPeer::addSelectColumns($criteria);
				$this->collEscalanotas = EscalanotaPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				EscalanotaPeer::addSelectColumns($criteria);
				if (!isset($this->lastEscalanotaCriteria) || !$this->lastEscalanotaCriteria->equals($criteria)) {
					$this->collEscalanotas = EscalanotaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEscalanotaCriteria = $criteria;
		return $this->collEscalanotas;
	}

	/**
	 * Returns the number of related Escalanotas.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countEscalanotas($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseEscalanotaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return EscalanotaPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Escalanota object to this object
	 * through the Escalanota foreign key attribute
	 *
	 * @param Escalanota $l Escalanota
	 * @return void
	 * @throws PropelException
	 */
	public function addEscalanota(Escalanota $l)
	{
		$this->collEscalanotas[] = $l;
		$l->setEstablecimiento($this);
	}

	/**
	 * Temporary storage of collAnios to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initAnios()
	{
		if ($this->collAnios === null) {
			$this->collAnios = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento has previously
	 * been saved, it will retrieve related Anios from storage.
	 * If this Establecimiento is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getAnios($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseAnioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAnios === null) {
			if ($this->isNew()) {
			   $this->collAnios = array();
			} else {

				$criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				AnioPeer::addSelectColumns($criteria);
				$this->collAnios = AnioPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				AnioPeer::addSelectColumns($criteria);
				if (!isset($this->lastAnioCriteria) || !$this->lastAnioCriteria->equals($criteria)) {
					$this->collAnios = AnioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAnioCriteria = $criteria;
		return $this->collAnios;
	}

	/**
	 * Returns the number of related Anios.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countAnios($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseAnioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return AnioPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Anio object to this object
	 * through the Anio foreign key attribute
	 *
	 * @param Anio $l Anio
	 * @return void
	 * @throws PropelException
	 */
	public function addAnio(Anio $l)
	{
		$this->collAnios[] = $l;
		$l->setEstablecimiento($this);
	}

	/**
	 * Temporary storage of collActividads to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initActividads()
	{
		if ($this->collActividads === null) {
			$this->collActividads = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento has previously
	 * been saved, it will retrieve related Actividads from storage.
	 * If this Establecimiento is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getActividads($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseActividadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActividads === null) {
			if ($this->isNew()) {
			   $this->collActividads = array();
			} else {

				$criteria->add(ActividadPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				ActividadPeer::addSelectColumns($criteria);
				$this->collActividads = ActividadPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ActividadPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				ActividadPeer::addSelectColumns($criteria);
				if (!isset($this->lastActividadCriteria) || !$this->lastActividadCriteria->equals($criteria)) {
					$this->collActividads = ActividadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastActividadCriteria = $criteria;
		return $this->collActividads;
	}

	/**
	 * Returns the number of related Actividads.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countActividads($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseActividadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ActividadPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return ActividadPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Actividad object to this object
	 * through the Actividad foreign key attribute
	 *
	 * @param Actividad $l Actividad
	 * @return void
	 * @throws PropelException
	 */
	public function addActividad(Actividad $l)
	{
		$this->collActividads[] = $l;
		$l->setEstablecimiento($this);
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
	 * Otherwise if this Establecimiento has previously
	 * been saved, it will retrieve related RelDocenteEstablecimientos from storage.
	 * If this Establecimiento is new, it will return
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

				$criteria->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				RelDocenteEstablecimientoPeer::addSelectColumns($criteria);
				$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

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

		$criteria->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

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
		$l->setEstablecimiento($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento is new, it will return
	 * an empty collection; or if this Establecimiento has previously
	 * been saved, it will retrieve related RelDocenteEstablecimientos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Establecimiento.
	 */
	public function getRelDocenteEstablecimientosJoinDocente($criteria = null, $con = null)
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

				$criteria->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelectJoinDocente($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastRelDocenteEstablecimientoCriteria) || !$this->lastRelDocenteEstablecimientoCriteria->equals($criteria)) {
				$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelectJoinDocente($criteria, $con);
			}
		}
		$this->lastRelDocenteEstablecimientoCriteria = $criteria;

		return $this->collRelDocenteEstablecimientos;
	}

	/**
	 * Temporary storage of collHorarioescolars to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initHorarioescolars()
	{
		if ($this->collHorarioescolars === null) {
			$this->collHorarioescolars = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento has previously
	 * been saved, it will retrieve related Horarioescolars from storage.
	 * If this Establecimiento is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getHorarioescolars($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseHorarioescolarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
			   $this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				HorarioescolarPeer::addSelectColumns($criteria);
				$this->collHorarioescolars = HorarioescolarPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				HorarioescolarPeer::addSelectColumns($criteria);
				if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
					$this->collHorarioescolars = HorarioescolarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;
		return $this->collHorarioescolars;
	}

	/**
	 * Returns the number of related Horarioescolars.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countHorarioescolars($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseHorarioescolarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return HorarioescolarPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Horarioescolar object to this object
	 * through the Horarioescolar foreign key attribute
	 *
	 * @param Horarioescolar $l Horarioescolar
	 * @return void
	 * @throws PropelException
	 */
	public function addHorarioescolar(Horarioescolar $l)
	{
		$this->collHorarioescolars[] = $l;
		$l->setEstablecimiento($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento is new, it will return
	 * an empty collection; or if this Establecimiento has previously
	 * been saved, it will retrieve related Horarioescolars from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Establecimiento.
	 */
	public function getHorarioescolarsJoinHorarioescolartipo($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseHorarioescolarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinHorarioescolartipo($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinHorarioescolartipo($criteria, $con);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Establecimiento is new, it will return
	 * an empty collection; or if this Establecimiento has previously
	 * been saved, it will retrieve related Horarioescolars from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Establecimiento.
	 */
	public function getHorarioescolarsJoinTurnos($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseHorarioescolarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinTurnos($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinTurnos($criteria, $con);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}

} // BaseEstablecimiento
