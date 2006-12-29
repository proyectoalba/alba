<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/CiclolectivoPeer.php';

/**
 * Base class that represents a row from the 'ciclolectivo' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseCiclolectivo extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var CiclolectivoPeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var int
	 */
	protected $id;


	/**
	 * The value for the fk_establecimiento_id field.
	 * @var int
	 */
	protected $fk_establecimiento_id;


	/**
	 * The value for the fecha_inicio field.
	 * @var int
	 */
	protected $fecha_inicio;


	/**
	 * The value for the fecha_fin field.
	 * @var int
	 */
	protected $fecha_fin;


	/**
	 * The value for the descripcion field.
	 * @var string
	 */
	protected $descripcion = '';


	/**
	 * The value for the actual field.
	 * @var boolean
	 */
	protected $actual = true;

	/**
	 * @var Establecimiento
	 */
	protected $aEstablecimiento;

	/**
	 * Collection to store aggregation of collTurnoss.
	 * @var array
	 */
	protected $collTurnoss;

	/**
	 * The criteria used to select the current contents of collTurnoss.
	 * @var Criteria
	 */
	protected $lastTurnosCriteria = null;

	/**
	 * Collection to store aggregation of collPeriodos.
	 * @var array
	 */
	protected $collPeriodos;

	/**
	 * The criteria used to select the current contents of collPeriodos.
	 * @var Criteria
	 */
	protected $lastPeriodoCriteria = null;

	/**
	 * Collection to store aggregation of collFeriados.
	 * @var array
	 */
	protected $collFeriados;

	/**
	 * The criteria used to select the current contents of collFeriados.
	 * @var Criteria
	 */
	protected $lastFeriadoCriteria = null;

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
	 * Get the [fk_establecimiento_id] column value.
	 * 
	 * @return int
	 */
	public function getFkEstablecimientoId()
	{

		return $this->fk_establecimiento_id;
	}

	/**
	 * Get the [optionally formatted] [fecha_inicio] column value.
	 * 
	 * @param string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getFechaInicio($format = 'Y-m-d H:i:s')
	{

		if ($this->fecha_inicio === null || $this->fecha_inicio === '') {
			return null;
		} elseif (!is_int($this->fecha_inicio)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->fecha_inicio);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse value of [fecha_inicio] as date/time value: " . var_export($this->fecha_inicio, true));
			}
		} else {
			$ts = $this->fecha_inicio;
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
	 * Get the [optionally formatted] [fecha_fin] column value.
	 * 
	 * @param string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getFechaFin($format = 'Y-m-d H:i:s')
	{

		if ($this->fecha_fin === null || $this->fecha_fin === '') {
			return null;
		} elseif (!is_int($this->fecha_fin)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->fecha_fin);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse value of [fecha_fin] as date/time value: " . var_export($this->fecha_fin, true));
			}
		} else {
			$ts = $this->fecha_fin;
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
	 * Get the [descripcion] column value.
	 * 
	 * @return string
	 */
	public function getDescripcion()
	{

		return $this->descripcion;
	}

	/**
	 * Get the [actual] column value.
	 * 
	 * @return boolean
	 */
	public function getActual()
	{

		return $this->actual;
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
			$this->modifiedColumns[] = CiclolectivoPeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [fk_establecimiento_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkEstablecimientoId($v)
	{

		if ($this->fk_establecimiento_id !== $v) {
			$this->fk_establecimiento_id = $v;
			$this->modifiedColumns[] = CiclolectivoPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
		}

	} // setFkEstablecimientoId()

	/**
	 * Set the value of [fecha_inicio] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFechaInicio($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse date/time value for [fecha_inicio] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_inicio !== $ts) {
			$this->fecha_inicio = $ts;
			$this->modifiedColumns[] = CiclolectivoPeer::FECHA_INICIO;
		}

	} // setFechaInicio()

	/**
	 * Set the value of [fecha_fin] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFechaFin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse date/time value for [fecha_fin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_fin !== $ts) {
			$this->fecha_fin = $ts;
			$this->modifiedColumns[] = CiclolectivoPeer::FECHA_FIN;
		}

	} // setFechaFin()

	/**
	 * Set the value of [descripcion] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setDescripcion($v)
	{

		if ($this->descripcion !== $v || $v === '') {
			$this->descripcion = $v;
			$this->modifiedColumns[] = CiclolectivoPeer::DESCRIPCION;
		}

	} // setDescripcion()

	/**
	 * Set the value of [actual] column.
	 * 
	 * @param boolean $v new value
	 * @return void
	 */
	public function setActual($v)
	{

		if ($this->actual !== $v || $v === true) {
			$this->actual = $v;
			$this->modifiedColumns[] = CiclolectivoPeer::ACTUAL;
		}

	} // setActual()

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

			$this->fk_establecimiento_id = $rs->getInt($startcol + 1);

			$this->fecha_inicio = $rs->getTimestamp($startcol + 2, null);

			$this->fecha_fin = $rs->getTimestamp($startcol + 3, null);

			$this->descripcion = $rs->getString($startcol + 4);

			$this->actual = $rs->getBoolean($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 6; // 6 = CiclolectivoPeer::NUM_COLUMNS - CiclolectivoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Ciclolectivo object", $e);
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
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CiclolectivoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CiclolectivoPeer::DATABASE_NAME);
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
					$pk = CiclolectivoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += CiclolectivoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collTurnoss !== null) {
				foreach($this->collTurnoss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPeriodos !== null) {
				foreach($this->collPeriodos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFeriados !== null) {
				foreach($this->collFeriados as $referrerFK) {
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


			if (($retval = CiclolectivoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collTurnoss !== null) {
					foreach($this->collTurnoss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPeriodos !== null) {
					foreach($this->collPeriodos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFeriados !== null) {
					foreach($this->collFeriados as $referrerFK) {
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
		$pos = CiclolectivoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkEstablecimientoId();
				break;
			case 2:
				return $this->getFechaInicio();
				break;
			case 3:
				return $this->getFechaFin();
				break;
			case 4:
				return $this->getDescripcion();
				break;
			case 5:
				return $this->getActual();
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
		$keys = CiclolectivoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkEstablecimientoId(),
			$keys[2] => $this->getFechaInicio(),
			$keys[3] => $this->getFechaFin(),
			$keys[4] => $this->getDescripcion(),
			$keys[5] => $this->getActual(),
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
		$pos = CiclolectivoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFkEstablecimientoId($value);
				break;
			case 2:
				$this->setFechaInicio($value);
				break;
			case 3:
				$this->setFechaFin($value);
				break;
			case 4:
				$this->setDescripcion($value);
				break;
			case 5:
				$this->setActual($value);
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
		$keys = CiclolectivoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkEstablecimientoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFechaInicio($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFechaFin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescripcion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setActual($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(CiclolectivoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CiclolectivoPeer::ID)) $criteria->add(CiclolectivoPeer::ID, $this->id);
		if ($this->isColumnModified(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(CiclolectivoPeer::FECHA_INICIO)) $criteria->add(CiclolectivoPeer::FECHA_INICIO, $this->fecha_inicio);
		if ($this->isColumnModified(CiclolectivoPeer::FECHA_FIN)) $criteria->add(CiclolectivoPeer::FECHA_FIN, $this->fecha_fin);
		if ($this->isColumnModified(CiclolectivoPeer::DESCRIPCION)) $criteria->add(CiclolectivoPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(CiclolectivoPeer::ACTUAL)) $criteria->add(CiclolectivoPeer::ACTUAL, $this->actual);

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
		$criteria = new Criteria(CiclolectivoPeer::DATABASE_NAME);

		$criteria->add(CiclolectivoPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Ciclolectivo (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFkEstablecimientoId($this->fk_establecimiento_id);

		$copyObj->setFechaInicio($this->fecha_inicio);

		$copyObj->setFechaFin($this->fecha_fin);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setActual($this->actual);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getTurnoss() as $relObj) {
				$copyObj->addTurnos($relObj->copy($deepCopy));
			}

			foreach($this->getPeriodos() as $relObj) {
				$copyObj->addPeriodo($relObj->copy($deepCopy));
			}

			foreach($this->getFeriados() as $relObj) {
				$copyObj->addFeriado($relObj->copy($deepCopy));
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
	 * @return Ciclolectivo Clone of current object.
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
	 * @return CiclolectivoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CiclolectivoPeer();
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
			$this->setFkEstablecimientoId(NULL);
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
	 * Temporary storage of collTurnoss to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initTurnoss()
	{
		if ($this->collTurnoss === null) {
			$this->collTurnoss = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Ciclolectivo has previously
	 * been saved, it will retrieve related Turnoss from storage.
	 * If this Ciclolectivo is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getTurnoss($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseTurnosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTurnoss === null) {
			if ($this->isNew()) {
			   $this->collTurnoss = array();
			} else {

				$criteria->add(TurnosPeer::FK_CICLOLECTIVO_ID, $this->getId());

				TurnosPeer::addSelectColumns($criteria);
				$this->collTurnoss = TurnosPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(TurnosPeer::FK_CICLOLECTIVO_ID, $this->getId());

				TurnosPeer::addSelectColumns($criteria);
				if (!isset($this->lastTurnosCriteria) || !$this->lastTurnosCriteria->equals($criteria)) {
					$this->collTurnoss = TurnosPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTurnosCriteria = $criteria;
		return $this->collTurnoss;
	}

	/**
	 * Returns the number of related Turnoss.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countTurnoss($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseTurnosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TurnosPeer::FK_CICLOLECTIVO_ID, $this->getId());

		return TurnosPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Turnos object to this object
	 * through the Turnos foreign key attribute
	 *
	 * @param Turnos $l Turnos
	 * @return void
	 * @throws PropelException
	 */
	public function addTurnos(Turnos $l)
	{
		$this->collTurnoss[] = $l;
		$l->setCiclolectivo($this);
	}

	/**
	 * Temporary storage of collPeriodos to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initPeriodos()
	{
		if ($this->collPeriodos === null) {
			$this->collPeriodos = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Ciclolectivo has previously
	 * been saved, it will retrieve related Periodos from storage.
	 * If this Ciclolectivo is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getPeriodos($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BasePeriodoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPeriodos === null) {
			if ($this->isNew()) {
			   $this->collPeriodos = array();
			} else {

				$criteria->add(PeriodoPeer::FK_CICLOLECTIVO_ID, $this->getId());

				PeriodoPeer::addSelectColumns($criteria);
				$this->collPeriodos = PeriodoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(PeriodoPeer::FK_CICLOLECTIVO_ID, $this->getId());

				PeriodoPeer::addSelectColumns($criteria);
				if (!isset($this->lastPeriodoCriteria) || !$this->lastPeriodoCriteria->equals($criteria)) {
					$this->collPeriodos = PeriodoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPeriodoCriteria = $criteria;
		return $this->collPeriodos;
	}

	/**
	 * Returns the number of related Periodos.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countPeriodos($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BasePeriodoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PeriodoPeer::FK_CICLOLECTIVO_ID, $this->getId());

		return PeriodoPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Periodo object to this object
	 * through the Periodo foreign key attribute
	 *
	 * @param Periodo $l Periodo
	 * @return void
	 * @throws PropelException
	 */
	public function addPeriodo(Periodo $l)
	{
		$this->collPeriodos[] = $l;
		$l->setCiclolectivo($this);
	}

	/**
	 * Temporary storage of collFeriados to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initFeriados()
	{
		if ($this->collFeriados === null) {
			$this->collFeriados = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Ciclolectivo has previously
	 * been saved, it will retrieve related Feriados from storage.
	 * If this Ciclolectivo is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getFeriados($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseFeriadoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFeriados === null) {
			if ($this->isNew()) {
			   $this->collFeriados = array();
			} else {

				$criteria->add(FeriadoPeer::FK_CICLOLECTIVO_ID, $this->getId());

				FeriadoPeer::addSelectColumns($criteria);
				$this->collFeriados = FeriadoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(FeriadoPeer::FK_CICLOLECTIVO_ID, $this->getId());

				FeriadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastFeriadoCriteria) || !$this->lastFeriadoCriteria->equals($criteria)) {
					$this->collFeriados = FeriadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFeriadoCriteria = $criteria;
		return $this->collFeriados;
	}

	/**
	 * Returns the number of related Feriados.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countFeriados($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseFeriadoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FeriadoPeer::FK_CICLOLECTIVO_ID, $this->getId());

		return FeriadoPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Feriado object to this object
	 * through the Feriado foreign key attribute
	 *
	 * @param Feriado $l Feriado
	 * @return void
	 * @throws PropelException
	 */
	public function addFeriado(Feriado $l)
	{
		$this->collFeriados[] = $l;
		$l->setCiclolectivo($this);
	}

} // BaseCiclolectivo
