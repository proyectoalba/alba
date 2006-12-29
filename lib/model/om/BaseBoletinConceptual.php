<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';

include_once 'creole/util/Clob.php';
include_once 'creole/util/Blob.php';


include_once 'propel/util/Criteria.php';

include_once 'model/BoletinConceptualPeer.php';

/**
 * Base class that represents a row from the 'boletin_conceptual' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseBoletinConceptual extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var BoletinConceptualPeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var int
	 */
	protected $id;


	/**
	 * The value for the fk_escalanota_id field.
	 * @var int
	 */
	protected $fk_escalanota_id = 0;


	/**
	 * The value for the fk_alumno_id field.
	 * @var int
	 */
	protected $fk_alumno_id = 0;


	/**
	 * The value for the fk_concepto_id field.
	 * @var int
	 */
	protected $fk_concepto_id = 0;


	/**
	 * The value for the fk_periodo_id field.
	 * @var int
	 */
	protected $fk_periodo_id = 0;


	/**
	 * The value for the observacion field.
	 * @var string
	 */
	protected $observacion;


	/**
	 * The value for the fecha field.
	 * @var int
	 */
	protected $fecha;

	/**
	 * @var Escalanota
	 */
	protected $aEscalanota;

	/**
	 * @var Alumno
	 */
	protected $aAlumno;

	/**
	 * @var Concepto
	 */
	protected $aConcepto;

	/**
	 * @var Periodo
	 */
	protected $aPeriodo;

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
	 * Get the [fk_escalanota_id] column value.
	 * 
	 * @return int
	 */
	public function getFkEscalanotaId()
	{

		return $this->fk_escalanota_id;
	}

	/**
	 * Get the [fk_alumno_id] column value.
	 * 
	 * @return int
	 */
	public function getFkAlumnoId()
	{

		return $this->fk_alumno_id;
	}

	/**
	 * Get the [fk_concepto_id] column value.
	 * 
	 * @return int
	 */
	public function getFkConceptoId()
	{

		return $this->fk_concepto_id;
	}

	/**
	 * Get the [fk_periodo_id] column value.
	 * 
	 * @return int
	 */
	public function getFkPeriodoId()
	{

		return $this->fk_periodo_id;
	}

	/**
	 * Get the [observacion] column value.
	 * 
	 * @return string
	 */
	public function getObservacion()
	{

		return $this->observacion;
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
	 * Set the value of [id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BoletinConceptualPeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [fk_escalanota_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkEscalanotaId($v)
	{

		if ($this->fk_escalanota_id !== $v || $v === 0) {
			$this->fk_escalanota_id = $v;
			$this->modifiedColumns[] = BoletinConceptualPeer::FK_ESCALANOTA_ID;
		}

		if ($this->aEscalanota !== null && $this->aEscalanota->getId() !== $v) {
			$this->aEscalanota = null;
		}

	} // setFkEscalanotaId()

	/**
	 * Set the value of [fk_alumno_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkAlumnoId($v)
	{

		if ($this->fk_alumno_id !== $v || $v === 0) {
			$this->fk_alumno_id = $v;
			$this->modifiedColumns[] = BoletinConceptualPeer::FK_ALUMNO_ID;
		}

		if ($this->aAlumno !== null && $this->aAlumno->getId() !== $v) {
			$this->aAlumno = null;
		}

	} // setFkAlumnoId()

	/**
	 * Set the value of [fk_concepto_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkConceptoId($v)
	{

		if ($this->fk_concepto_id !== $v || $v === 0) {
			$this->fk_concepto_id = $v;
			$this->modifiedColumns[] = BoletinConceptualPeer::FK_CONCEPTO_ID;
		}

		if ($this->aConcepto !== null && $this->aConcepto->getId() !== $v) {
			$this->aConcepto = null;
		}

	} // setFkConceptoId()

	/**
	 * Set the value of [fk_periodo_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkPeriodoId($v)
	{

		if ($this->fk_periodo_id !== $v || $v === 0) {
			$this->fk_periodo_id = $v;
			$this->modifiedColumns[] = BoletinConceptualPeer::FK_PERIODO_ID;
		}

		if ($this->aPeriodo !== null && $this->aPeriodo->getId() !== $v) {
			$this->aPeriodo = null;
		}

	} // setFkPeriodoId()

	/**
	 * Set the value of [observacion] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setObservacion($v)
	{

		// if the passed in parameter is the *same* object that
		// is stored internally then we use the Lob->isModified()
		// method to know whether contents changed.
		if ($v instanceof Lob && $v === $this->observacion) {
			$changed = $v->isModified();
		} else {
			$changed = ($this->observacion !== $v);
		}
		if ($changed) {
			if ( !($v instanceof Lob) ) {
				$obj = new Blob();
				$obj->setContents($v);
			} else {
				$obj = $v;
			}
			$this->observacion = $obj;
			$this->modifiedColumns[] = BoletinConceptualPeer::OBSERVACION;
		}

	} // setObservacion()

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
			$this->modifiedColumns[] = BoletinConceptualPeer::FECHA;
		}

	} // setFecha()

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

			$this->fk_escalanota_id = $rs->getInt($startcol + 1);

			$this->fk_alumno_id = $rs->getInt($startcol + 2);

			$this->fk_concepto_id = $rs->getInt($startcol + 3);

			$this->fk_periodo_id = $rs->getInt($startcol + 4);

			$this->observacion = $rs->getBlob($startcol + 5);

			$this->fecha = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 7; // 7 = BoletinConceptualPeer::NUM_COLUMNS - BoletinConceptualPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating BoletinConceptual object", $e);
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
			$con = Propel::getConnection(BoletinConceptualPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BoletinConceptualPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BoletinConceptualPeer::DATABASE_NAME);
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

			if ($this->aEscalanota !== null) {
				if ($this->aEscalanota->isModified()) {
					$affectedRows += $this->aEscalanota->save($con);
				}
				$this->setEscalanota($this->aEscalanota);
			}

			if ($this->aAlumno !== null) {
				if ($this->aAlumno->isModified()) {
					$affectedRows += $this->aAlumno->save($con);
				}
				$this->setAlumno($this->aAlumno);
			}

			if ($this->aConcepto !== null) {
				if ($this->aConcepto->isModified()) {
					$affectedRows += $this->aConcepto->save($con);
				}
				$this->setConcepto($this->aConcepto);
			}

			if ($this->aPeriodo !== null) {
				if ($this->aPeriodo->isModified()) {
					$affectedRows += $this->aPeriodo->save($con);
				}
				$this->setPeriodo($this->aPeriodo);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = BoletinConceptualPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += BoletinConceptualPeer::doUpdate($this, $con);
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

			if ($this->aEscalanota !== null) {
				if (!$this->aEscalanota->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEscalanota->getValidationFailures());
				}
			}

			if ($this->aAlumno !== null) {
				if (!$this->aAlumno->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAlumno->getValidationFailures());
				}
			}

			if ($this->aConcepto !== null) {
				if (!$this->aConcepto->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aConcepto->getValidationFailures());
				}
			}

			if ($this->aPeriodo !== null) {
				if (!$this->aPeriodo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPeriodo->getValidationFailures());
				}
			}


			if (($retval = BoletinConceptualPeer::doValidate($this, $columns)) !== true) {
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
		$pos = BoletinConceptualPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkEscalanotaId();
				break;
			case 2:
				return $this->getFkAlumnoId();
				break;
			case 3:
				return $this->getFkConceptoId();
				break;
			case 4:
				return $this->getFkPeriodoId();
				break;
			case 5:
				return $this->getObservacion();
				break;
			case 6:
				return $this->getFecha();
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
		$keys = BoletinConceptualPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkEscalanotaId(),
			$keys[2] => $this->getFkAlumnoId(),
			$keys[3] => $this->getFkConceptoId(),
			$keys[4] => $this->getFkPeriodoId(),
			$keys[5] => $this->getObservacion(),
			$keys[6] => $this->getFecha(),
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
		$pos = BoletinConceptualPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFkEscalanotaId($value);
				break;
			case 2:
				$this->setFkAlumnoId($value);
				break;
			case 3:
				$this->setFkConceptoId($value);
				break;
			case 4:
				$this->setFkPeriodoId($value);
				break;
			case 5:
				$this->setObservacion($value);
				break;
			case 6:
				$this->setFecha($value);
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
		$keys = BoletinConceptualPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkEscalanotaId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkAlumnoId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkConceptoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFkPeriodoId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObservacion($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecha($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(BoletinConceptualPeer::DATABASE_NAME);

		if ($this->isColumnModified(BoletinConceptualPeer::ID)) $criteria->add(BoletinConceptualPeer::ID, $this->id);
		if ($this->isColumnModified(BoletinConceptualPeer::FK_ESCALANOTA_ID)) $criteria->add(BoletinConceptualPeer::FK_ESCALANOTA_ID, $this->fk_escalanota_id);
		if ($this->isColumnModified(BoletinConceptualPeer::FK_ALUMNO_ID)) $criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->fk_alumno_id);
		if ($this->isColumnModified(BoletinConceptualPeer::FK_CONCEPTO_ID)) $criteria->add(BoletinConceptualPeer::FK_CONCEPTO_ID, $this->fk_concepto_id);
		if ($this->isColumnModified(BoletinConceptualPeer::FK_PERIODO_ID)) $criteria->add(BoletinConceptualPeer::FK_PERIODO_ID, $this->fk_periodo_id);
		if ($this->isColumnModified(BoletinConceptualPeer::OBSERVACION)) $criteria->add(BoletinConceptualPeer::OBSERVACION, $this->observacion);
		if ($this->isColumnModified(BoletinConceptualPeer::FECHA)) $criteria->add(BoletinConceptualPeer::FECHA, $this->fecha);

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
		$criteria = new Criteria(BoletinConceptualPeer::DATABASE_NAME);

		$criteria->add(BoletinConceptualPeer::ID, $this->id);

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
	 * @param object $copyObj An object of BoletinConceptual (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFkEscalanotaId($this->fk_escalanota_id);

		$copyObj->setFkAlumnoId($this->fk_alumno_id);

		$copyObj->setFkConceptoId($this->fk_concepto_id);

		$copyObj->setFkPeriodoId($this->fk_periodo_id);

		$copyObj->setObservacion($this->observacion);

		$copyObj->setFecha($this->fecha);


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
	 * @return BoletinConceptual Clone of current object.
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
	 * @return BoletinConceptualPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new BoletinConceptualPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Escalanota object.
	 *
	 * @param Escalanota $v
	 * @return void
	 * @throws PropelException
	 */
	public function setEscalanota($v)
	{


		if ($v === null) {
			$this->setFkEscalanotaId('0');
		} else {
			$this->setFkEscalanotaId($v->getId());
		}


		$this->aEscalanota = $v;
	}


	/**
	 * Get the associated Escalanota object
	 *
	 * @param Connection Optional Connection object.
	 * @return Escalanota The associated Escalanota object.
	 * @throws PropelException
	 */
	public function getEscalanota($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseEscalanotaPeer.php';

		if ($this->aEscalanota === null && ($this->fk_escalanota_id !== null)) {

			$this->aEscalanota = EscalanotaPeer::retrieveByPK($this->fk_escalanota_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = EscalanotaPeer::retrieveByPK($this->fk_escalanota_id, $con);
			   $obj->addEscalanotas($this);
			 */
		}
		return $this->aEscalanota;
	}

	/**
	 * Declares an association between this object and a Alumno object.
	 *
	 * @param Alumno $v
	 * @return void
	 * @throws PropelException
	 */
	public function setAlumno($v)
	{


		if ($v === null) {
			$this->setFkAlumnoId('0');
		} else {
			$this->setFkAlumnoId($v->getId());
		}


		$this->aAlumno = $v;
	}


	/**
	 * Get the associated Alumno object
	 *
	 * @param Connection Optional Connection object.
	 * @return Alumno The associated Alumno object.
	 * @throws PropelException
	 */
	public function getAlumno($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseAlumnoPeer.php';

		if ($this->aAlumno === null && ($this->fk_alumno_id !== null)) {

			$this->aAlumno = AlumnoPeer::retrieveByPK($this->fk_alumno_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = AlumnoPeer::retrieveByPK($this->fk_alumno_id, $con);
			   $obj->addAlumnos($this);
			 */
		}
		return $this->aAlumno;
	}

	/**
	 * Declares an association between this object and a Concepto object.
	 *
	 * @param Concepto $v
	 * @return void
	 * @throws PropelException
	 */
	public function setConcepto($v)
	{


		if ($v === null) {
			$this->setFkConceptoId('0');
		} else {
			$this->setFkConceptoId($v->getId());
		}


		$this->aConcepto = $v;
	}


	/**
	 * Get the associated Concepto object
	 *
	 * @param Connection Optional Connection object.
	 * @return Concepto The associated Concepto object.
	 * @throws PropelException
	 */
	public function getConcepto($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseConceptoPeer.php';

		if ($this->aConcepto === null && ($this->fk_concepto_id !== null)) {

			$this->aConcepto = ConceptoPeer::retrieveByPK($this->fk_concepto_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = ConceptoPeer::retrieveByPK($this->fk_concepto_id, $con);
			   $obj->addConceptos($this);
			 */
		}
		return $this->aConcepto;
	}

	/**
	 * Declares an association between this object and a Periodo object.
	 *
	 * @param Periodo $v
	 * @return void
	 * @throws PropelException
	 */
	public function setPeriodo($v)
	{


		if ($v === null) {
			$this->setFkPeriodoId('0');
		} else {
			$this->setFkPeriodoId($v->getId());
		}


		$this->aPeriodo = $v;
	}


	/**
	 * Get the associated Periodo object
	 *
	 * @param Connection Optional Connection object.
	 * @return Periodo The associated Periodo object.
	 * @throws PropelException
	 */
	public function getPeriodo($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BasePeriodoPeer.php';

		if ($this->aPeriodo === null && ($this->fk_periodo_id !== null)) {

			$this->aPeriodo = PeriodoPeer::retrieveByPK($this->fk_periodo_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = PeriodoPeer::retrieveByPK($this->fk_periodo_id, $con);
			   $obj->addPeriodos($this);
			 */
		}
		return $this->aPeriodo;
	}

} // BaseBoletinConceptual
