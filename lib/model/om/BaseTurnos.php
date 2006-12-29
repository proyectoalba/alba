<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/TurnosPeer.php';

/**
 * Base class that represents a row from the 'turnos' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseTurnos extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var TurnosPeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var int
	 */
	protected $id;


	/**
	 * The value for the fk_ciclolectivo_id field.
	 * @var int
	 */
	protected $fk_ciclolectivo_id;


	/**
	 * The value for the hora_inicio field.
	 * @var int
	 */
	protected $hora_inicio;


	/**
	 * The value for the hora_fin field.
	 * @var int
	 */
	protected $hora_fin;


	/**
	 * The value for the descripcion field.
	 * @var string
	 */
	protected $descripcion = '';

	/**
	 * @var Ciclolectivo
	 */
	protected $aCiclolectivo;

	/**
	 * Collection to store aggregation of collDivisions.
	 * @var array
	 */
	protected $collDivisions;

	/**
	 * The criteria used to select the current contents of collDivisions.
	 * @var Criteria
	 */
	protected $lastDivisionCriteria = null;

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
	 * Get the [fk_ciclolectivo_id] column value.
	 * 
	 * @return int
	 */
	public function getFkCiclolectivoId()
	{

		return $this->fk_ciclolectivo_id;
	}

	/**
	 * Get the [optionally formatted] [hora_inicio] column value.
	 * 
	 * @param string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getHoraInicio($format = '%X')
	{

		if ($this->hora_inicio === null || $this->hora_inicio === '') {
			return null;
		} elseif (!is_int($this->hora_inicio)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->hora_inicio);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse value of [hora_inicio] as date/time value: " . var_export($this->hora_inicio, true));
			}
		} else {
			$ts = $this->hora_inicio;
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
	 * Get the [optionally formatted] [hora_fin] column value.
	 * 
	 * @param string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getHoraFin($format = '%X')
	{

		if ($this->hora_fin === null || $this->hora_fin === '') {
			return null;
		} elseif (!is_int($this->hora_fin)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->hora_fin);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse value of [hora_fin] as date/time value: " . var_export($this->hora_fin, true));
			}
		} else {
			$ts = $this->hora_fin;
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
	 * Set the value of [id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TurnosPeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [fk_ciclolectivo_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkCiclolectivoId($v)
	{

		if ($this->fk_ciclolectivo_id !== $v) {
			$this->fk_ciclolectivo_id = $v;
			$this->modifiedColumns[] = TurnosPeer::FK_CICLOLECTIVO_ID;
		}

		if ($this->aCiclolectivo !== null && $this->aCiclolectivo->getId() !== $v) {
			$this->aCiclolectivo = null;
		}

	} // setFkCiclolectivoId()

	/**
	 * Set the value of [hora_inicio] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setHoraInicio($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse date/time value for [hora_inicio] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->hora_inicio !== $ts) {
			$this->hora_inicio = $ts;
			$this->modifiedColumns[] = TurnosPeer::HORA_INICIO;
		}

	} // setHoraInicio()

	/**
	 * Set the value of [hora_fin] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setHoraFin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse date/time value for [hora_fin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->hora_fin !== $ts) {
			$this->hora_fin = $ts;
			$this->modifiedColumns[] = TurnosPeer::HORA_FIN;
		}

	} // setHoraFin()

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
			$this->modifiedColumns[] = TurnosPeer::DESCRIPCION;
		}

	} // setDescripcion()

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

			$this->fk_ciclolectivo_id = $rs->getInt($startcol + 1);

			$this->hora_inicio = $rs->getTime($startcol + 2, null);

			$this->hora_fin = $rs->getTime($startcol + 3, null);

			$this->descripcion = $rs->getString($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 5; // 5 = TurnosPeer::NUM_COLUMNS - TurnosPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Turnos object", $e);
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
			$con = Propel::getConnection(TurnosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TurnosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TurnosPeer::DATABASE_NAME);
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

			if ($this->aCiclolectivo !== null) {
				if ($this->aCiclolectivo->isModified()) {
					$affectedRows += $this->aCiclolectivo->save($con);
				}
				$this->setCiclolectivo($this->aCiclolectivo);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TurnosPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += TurnosPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collDivisions !== null) {
				foreach($this->collDivisions as $referrerFK) {
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

			if ($this->aCiclolectivo !== null) {
				if (!$this->aCiclolectivo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCiclolectivo->getValidationFailures());
				}
			}


			if (($retval = TurnosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDivisions !== null) {
					foreach($this->collDivisions as $referrerFK) {
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
		$pos = TurnosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkCiclolectivoId();
				break;
			case 2:
				return $this->getHoraInicio();
				break;
			case 3:
				return $this->getHoraFin();
				break;
			case 4:
				return $this->getDescripcion();
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
		$keys = TurnosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkCiclolectivoId(),
			$keys[2] => $this->getHoraInicio(),
			$keys[3] => $this->getHoraFin(),
			$keys[4] => $this->getDescripcion(),
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
		$pos = TurnosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFkCiclolectivoId($value);
				break;
			case 2:
				$this->setHoraInicio($value);
				break;
			case 3:
				$this->setHoraFin($value);
				break;
			case 4:
				$this->setDescripcion($value);
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
		$keys = TurnosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkCiclolectivoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHoraInicio($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHoraFin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescripcion($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(TurnosPeer::DATABASE_NAME);

		if ($this->isColumnModified(TurnosPeer::ID)) $criteria->add(TurnosPeer::ID, $this->id);
		if ($this->isColumnModified(TurnosPeer::FK_CICLOLECTIVO_ID)) $criteria->add(TurnosPeer::FK_CICLOLECTIVO_ID, $this->fk_ciclolectivo_id);
		if ($this->isColumnModified(TurnosPeer::HORA_INICIO)) $criteria->add(TurnosPeer::HORA_INICIO, $this->hora_inicio);
		if ($this->isColumnModified(TurnosPeer::HORA_FIN)) $criteria->add(TurnosPeer::HORA_FIN, $this->hora_fin);
		if ($this->isColumnModified(TurnosPeer::DESCRIPCION)) $criteria->add(TurnosPeer::DESCRIPCION, $this->descripcion);

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
		$criteria = new Criteria(TurnosPeer::DATABASE_NAME);

		$criteria->add(TurnosPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Turnos (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFkCiclolectivoId($this->fk_ciclolectivo_id);

		$copyObj->setHoraInicio($this->hora_inicio);

		$copyObj->setHoraFin($this->hora_fin);

		$copyObj->setDescripcion($this->descripcion);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getDivisions() as $relObj) {
				$copyObj->addDivision($relObj->copy($deepCopy));
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
	 * @return Turnos Clone of current object.
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
	 * @return TurnosPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new TurnosPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Ciclolectivo object.
	 *
	 * @param Ciclolectivo $v
	 * @return void
	 * @throws PropelException
	 */
	public function setCiclolectivo($v)
	{


		if ($v === null) {
			$this->setFkCiclolectivoId(NULL);
		} else {
			$this->setFkCiclolectivoId($v->getId());
		}


		$this->aCiclolectivo = $v;
	}


	/**
	 * Get the associated Ciclolectivo object
	 *
	 * @param Connection Optional Connection object.
	 * @return Ciclolectivo The associated Ciclolectivo object.
	 * @throws PropelException
	 */
	public function getCiclolectivo($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseCiclolectivoPeer.php';

		if ($this->aCiclolectivo === null && ($this->fk_ciclolectivo_id !== null)) {

			$this->aCiclolectivo = CiclolectivoPeer::retrieveByPK($this->fk_ciclolectivo_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = CiclolectivoPeer::retrieveByPK($this->fk_ciclolectivo_id, $con);
			   $obj->addCiclolectivos($this);
			 */
		}
		return $this->aCiclolectivo;
	}

	/**
	 * Temporary storage of collDivisions to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initDivisions()
	{
		if ($this->collDivisions === null) {
			$this->collDivisions = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Turnos has previously
	 * been saved, it will retrieve related Divisions from storage.
	 * If this Turnos is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getDivisions($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseDivisionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDivisions === null) {
			if ($this->isNew()) {
			   $this->collDivisions = array();
			} else {

				$criteria->add(DivisionPeer::FK_TURNOS_ID, $this->getId());

				DivisionPeer::addSelectColumns($criteria);
				$this->collDivisions = DivisionPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(DivisionPeer::FK_TURNOS_ID, $this->getId());

				DivisionPeer::addSelectColumns($criteria);
				if (!isset($this->lastDivisionCriteria) || !$this->lastDivisionCriteria->equals($criteria)) {
					$this->collDivisions = DivisionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDivisionCriteria = $criteria;
		return $this->collDivisions;
	}

	/**
	 * Returns the number of related Divisions.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countDivisions($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseDivisionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DivisionPeer::FK_TURNOS_ID, $this->getId());

		return DivisionPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Division object to this object
	 * through the Division foreign key attribute
	 *
	 * @param Division $l Division
	 * @return void
	 * @throws PropelException
	 */
	public function addDivision(Division $l)
	{
		$this->collDivisions[] = $l;
		$l->setTurnos($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Turnos is new, it will return
	 * an empty collection; or if this Turnos has previously
	 * been saved, it will retrieve related Divisions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Turnos.
	 */
	public function getDivisionsJoinAnio($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseDivisionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDivisions === null) {
			if ($this->isNew()) {
				$this->collDivisions = array();
			} else {

				$criteria->add(DivisionPeer::FK_TURNOS_ID, $this->getId());

				$this->collDivisions = DivisionPeer::doSelectJoinAnio($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(DivisionPeer::FK_TURNOS_ID, $this->getId());

			if (!isset($this->lastDivisionCriteria) || !$this->lastDivisionCriteria->equals($criteria)) {
				$this->collDivisions = DivisionPeer::doSelectJoinAnio($criteria, $con);
			}
		}
		$this->lastDivisionCriteria = $criteria;

		return $this->collDivisions;
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
	 * Otherwise if this Turnos has previously
	 * been saved, it will retrieve related Horarioescolars from storage.
	 * If this Turnos is new, it will return
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

				$criteria->add(HorarioescolarPeer::FK_TURNOS_ID, $this->getId());

				HorarioescolarPeer::addSelectColumns($criteria);
				$this->collHorarioescolars = HorarioescolarPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(HorarioescolarPeer::FK_TURNOS_ID, $this->getId());

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

		$criteria->add(HorarioescolarPeer::FK_TURNOS_ID, $this->getId());

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
		$l->setTurnos($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Turnos is new, it will return
	 * an empty collection; or if this Turnos has previously
	 * been saved, it will retrieve related Horarioescolars from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Turnos.
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

				$criteria->add(HorarioescolarPeer::FK_TURNOS_ID, $this->getId());

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinHorarioescolartipo($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(HorarioescolarPeer::FK_TURNOS_ID, $this->getId());

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
	 * Otherwise if this Turnos is new, it will return
	 * an empty collection; or if this Turnos has previously
	 * been saved, it will retrieve related Horarioescolars from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Turnos.
	 */
	public function getHorarioescolarsJoinEstablecimiento($criteria = null, $con = null)
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

				$criteria->add(HorarioescolarPeer::FK_TURNOS_ID, $this->getId());

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(HorarioescolarPeer::FK_TURNOS_ID, $this->getId());

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}

} // BaseTurnos
