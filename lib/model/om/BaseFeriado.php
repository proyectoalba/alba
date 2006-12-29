<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/FeriadoPeer.php';

/**
 * Base class that represents a row from the 'feriado' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseFeriado extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var FeriadoPeer
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
	protected $nombre;


	/**
	 * The value for the fecha field.
	 * @var int
	 */
	protected $fecha;


	/**
	 * The value for the repeticion_anual field.
	 * @var boolean
	 */
	protected $repeticion_anual = true;


	/**
	 * The value for the inamovible field.
	 * @var boolean
	 */
	protected $inamovible = true;


	/**
	 * The value for the fk_ciclolectivo_id field.
	 * @var int
	 */
	protected $fk_ciclolectivo_id = 0;

	/**
	 * @var Ciclolectivo
	 */
	protected $aCiclolectivo;

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
	 * Get the [optionally formatted] [fecha] column value.
	 * 
	 * @param string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getFecha($format = 'Y-m-d H:i:s')
	{

		if ($this->fecha === null || $this->fecha === '') {
			return null;
		} elseif (!is_int($this->fecha)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->fecha);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
			}
		} else {
			$ts = $this->fecha;
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
	 * Get the [repeticion_anual] column value.
	 * 
	 * @return boolean
	 */
	public function getRepeticionAnual()
	{

		return $this->repeticion_anual;
	}

	/**
	 * Get the [inamovible] column value.
	 * 
	 * @return boolean
	 */
	public function getInamovible()
	{

		return $this->inamovible;
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
	 * Set the value of [id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FeriadoPeer::ID;
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

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = FeriadoPeer::NOMBRE;
		}

	} // setNombre()

	/**
	 * Set the value of [fecha] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFecha($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha !== $ts) {
			$this->fecha = $ts;
			$this->modifiedColumns[] = FeriadoPeer::FECHA;
		}

	} // setFecha()

	/**
	 * Set the value of [repeticion_anual] column.
	 * 
	 * @param boolean $v new value
	 * @return void
	 */
	public function setRepeticionAnual($v)
	{

		if ($this->repeticion_anual !== $v || $v === true) {
			$this->repeticion_anual = $v;
			$this->modifiedColumns[] = FeriadoPeer::REPETICION_ANUAL;
		}

	} // setRepeticionAnual()

	/**
	 * Set the value of [inamovible] column.
	 * 
	 * @param boolean $v new value
	 * @return void
	 */
	public function setInamovible($v)
	{

		if ($this->inamovible !== $v || $v === true) {
			$this->inamovible = $v;
			$this->modifiedColumns[] = FeriadoPeer::INAMOVIBLE;
		}

	} // setInamovible()

	/**
	 * Set the value of [fk_ciclolectivo_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkCiclolectivoId($v)
	{

		if ($this->fk_ciclolectivo_id !== $v || $v === 0) {
			$this->fk_ciclolectivo_id = $v;
			$this->modifiedColumns[] = FeriadoPeer::FK_CICLOLECTIVO_ID;
		}

		if ($this->aCiclolectivo !== null && $this->aCiclolectivo->getId() !== $v) {
			$this->aCiclolectivo = null;
		}

	} // setFkCiclolectivoId()

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

			$this->fecha = $rs->getTimestamp($startcol + 2, null);

			$this->repeticion_anual = $rs->getBoolean($startcol + 3);

			$this->inamovible = $rs->getBoolean($startcol + 4);

			$this->fk_ciclolectivo_id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 6; // 6 = FeriadoPeer::NUM_COLUMNS - FeriadoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Feriado object", $e);
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
			$con = Propel::getConnection(FeriadoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FeriadoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FeriadoPeer::DATABASE_NAME);
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
					$pk = FeriadoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += FeriadoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
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


			if (($retval = FeriadoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = FeriadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFecha();
				break;
			case 3:
				return $this->getRepeticionAnual();
				break;
			case 4:
				return $this->getInamovible();
				break;
			case 5:
				return $this->getFkCiclolectivoId();
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
		$keys = FeriadoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getFecha(),
			$keys[3] => $this->getRepeticionAnual(),
			$keys[4] => $this->getInamovible(),
			$keys[5] => $this->getFkCiclolectivoId(),
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
		$pos = FeriadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFecha($value);
				break;
			case 3:
				$this->setRepeticionAnual($value);
				break;
			case 4:
				$this->setInamovible($value);
				break;
			case 5:
				$this->setFkCiclolectivoId($value);
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
		$keys = FeriadoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecha($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRepeticionAnual($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setInamovible($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFkCiclolectivoId($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(FeriadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(FeriadoPeer::ID)) $criteria->add(FeriadoPeer::ID, $this->id);
		if ($this->isColumnModified(FeriadoPeer::NOMBRE)) $criteria->add(FeriadoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(FeriadoPeer::FECHA)) $criteria->add(FeriadoPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(FeriadoPeer::REPETICION_ANUAL)) $criteria->add(FeriadoPeer::REPETICION_ANUAL, $this->repeticion_anual);
		if ($this->isColumnModified(FeriadoPeer::INAMOVIBLE)) $criteria->add(FeriadoPeer::INAMOVIBLE, $this->inamovible);
		if ($this->isColumnModified(FeriadoPeer::FK_CICLOLECTIVO_ID)) $criteria->add(FeriadoPeer::FK_CICLOLECTIVO_ID, $this->fk_ciclolectivo_id);

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
		$criteria = new Criteria(FeriadoPeer::DATABASE_NAME);

		$criteria->add(FeriadoPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Feriado (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNombre($this->nombre);

		$copyObj->setFecha($this->fecha);

		$copyObj->setRepeticionAnual($this->repeticion_anual);

		$copyObj->setInamovible($this->inamovible);

		$copyObj->setFkCiclolectivoId($this->fk_ciclolectivo_id);


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
	 * @return Feriado Clone of current object.
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
	 * @return FeriadoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new FeriadoPeer();
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
			$this->setFkCiclolectivoId('0');
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

} // BaseFeriado
