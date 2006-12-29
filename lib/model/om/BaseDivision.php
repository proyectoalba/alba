<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/DivisionPeer.php';

/**
 * Base class that represents a row from the 'division' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseDivision extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var DivisionPeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var int
	 */
	protected $id;


	/**
	 * The value for the fk_anio_id field.
	 * @var int
	 */
	protected $fk_anio_id = 0;


	/**
	 * The value for the descripcion field.
	 * @var string
	 */
	protected $descripcion = '';


	/**
	 * The value for the fk_turnos_id field.
	 * @var int
	 */
	protected $fk_turnos_id = 0;

	/**
	 * @var Anio
	 */
	protected $aAnio;

	/**
	 * @var Turnos
	 */
	protected $aTurnos;

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
	 * Get the [fk_anio_id] column value.
	 * 
	 * @return int
	 */
	public function getFkAnioId()
	{

		return $this->fk_anio_id;
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
	 * Get the [fk_turnos_id] column value.
	 * 
	 * @return int
	 */
	public function getFkTurnosId()
	{

		return $this->fk_turnos_id;
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
			$this->modifiedColumns[] = DivisionPeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [fk_anio_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkAnioId($v)
	{

		if ($this->fk_anio_id !== $v || $v === 0) {
			$this->fk_anio_id = $v;
			$this->modifiedColumns[] = DivisionPeer::FK_ANIO_ID;
		}

		if ($this->aAnio !== null && $this->aAnio->getId() !== $v) {
			$this->aAnio = null;
		}

	} // setFkAnioId()

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
			$this->modifiedColumns[] = DivisionPeer::DESCRIPCION;
		}

	} // setDescripcion()

	/**
	 * Set the value of [fk_turnos_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkTurnosId($v)
	{

		if ($this->fk_turnos_id !== $v || $v === 0) {
			$this->fk_turnos_id = $v;
			$this->modifiedColumns[] = DivisionPeer::FK_TURNOS_ID;
		}

		if ($this->aTurnos !== null && $this->aTurnos->getId() !== $v) {
			$this->aTurnos = null;
		}

	} // setFkTurnosId()

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

			$this->fk_anio_id = $rs->getInt($startcol + 1);

			$this->descripcion = $rs->getString($startcol + 2);

			$this->fk_turnos_id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 4; // 4 = DivisionPeer::NUM_COLUMNS - DivisionPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Division object", $e);
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
			$con = Propel::getConnection(DivisionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DivisionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DivisionPeer::DATABASE_NAME);
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

			if ($this->aAnio !== null) {
				if ($this->aAnio->isModified()) {
					$affectedRows += $this->aAnio->save($con);
				}
				$this->setAnio($this->aAnio);
			}

			if ($this->aTurnos !== null) {
				if ($this->aTurnos->isModified()) {
					$affectedRows += $this->aTurnos->save($con);
				}
				$this->setTurnos($this->aTurnos);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DivisionPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += DivisionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collRelAlumnoDivisions !== null) {
				foreach($this->collRelAlumnoDivisions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelDivisionActividadDocentes !== null) {
				foreach($this->collRelDivisionActividadDocentes as $referrerFK) {
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

			if ($this->aAnio !== null) {
				if (!$this->aAnio->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAnio->getValidationFailures());
				}
			}

			if ($this->aTurnos !== null) {
				if (!$this->aTurnos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTurnos->getValidationFailures());
				}
			}


			if (($retval = DivisionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelAlumnoDivisions !== null) {
					foreach($this->collRelAlumnoDivisions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelDivisionActividadDocentes !== null) {
					foreach($this->collRelDivisionActividadDocentes as $referrerFK) {
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
		$pos = DivisionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkAnioId();
				break;
			case 2:
				return $this->getDescripcion();
				break;
			case 3:
				return $this->getFkTurnosId();
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
		$keys = DivisionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkAnioId(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getFkTurnosId(),
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
		$pos = DivisionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFkAnioId($value);
				break;
			case 2:
				$this->setDescripcion($value);
				break;
			case 3:
				$this->setFkTurnosId($value);
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
		$keys = DivisionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkAnioId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkTurnosId($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(DivisionPeer::DATABASE_NAME);

		if ($this->isColumnModified(DivisionPeer::ID)) $criteria->add(DivisionPeer::ID, $this->id);
		if ($this->isColumnModified(DivisionPeer::FK_ANIO_ID)) $criteria->add(DivisionPeer::FK_ANIO_ID, $this->fk_anio_id);
		if ($this->isColumnModified(DivisionPeer::DESCRIPCION)) $criteria->add(DivisionPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(DivisionPeer::FK_TURNOS_ID)) $criteria->add(DivisionPeer::FK_TURNOS_ID, $this->fk_turnos_id);

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
		$criteria = new Criteria(DivisionPeer::DATABASE_NAME);

		$criteria->add(DivisionPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Division (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFkAnioId($this->fk_anio_id);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setFkTurnosId($this->fk_turnos_id);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getRelAlumnoDivisions() as $relObj) {
				$copyObj->addRelAlumnoDivision($relObj->copy($deepCopy));
			}

			foreach($this->getRelDivisionActividadDocentes() as $relObj) {
				$copyObj->addRelDivisionActividadDocente($relObj->copy($deepCopy));
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
	 * @return Division Clone of current object.
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
	 * @return DivisionPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new DivisionPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Anio object.
	 *
	 * @param Anio $v
	 * @return void
	 * @throws PropelException
	 */
	public function setAnio($v)
	{


		if ($v === null) {
			$this->setFkAnioId('0');
		} else {
			$this->setFkAnioId($v->getId());
		}


		$this->aAnio = $v;
	}


	/**
	 * Get the associated Anio object
	 *
	 * @param Connection Optional Connection object.
	 * @return Anio The associated Anio object.
	 * @throws PropelException
	 */
	public function getAnio($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseAnioPeer.php';

		if ($this->aAnio === null && ($this->fk_anio_id !== null)) {

			$this->aAnio = AnioPeer::retrieveByPK($this->fk_anio_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = AnioPeer::retrieveByPK($this->fk_anio_id, $con);
			   $obj->addAnios($this);
			 */
		}
		return $this->aAnio;
	}

	/**
	 * Declares an association between this object and a Turnos object.
	 *
	 * @param Turnos $v
	 * @return void
	 * @throws PropelException
	 */
	public function setTurnos($v)
	{


		if ($v === null) {
			$this->setFkTurnosId('0');
		} else {
			$this->setFkTurnosId($v->getId());
		}


		$this->aTurnos = $v;
	}


	/**
	 * Get the associated Turnos object
	 *
	 * @param Connection Optional Connection object.
	 * @return Turnos The associated Turnos object.
	 * @throws PropelException
	 */
	public function getTurnos($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseTurnosPeer.php';

		if ($this->aTurnos === null && ($this->fk_turnos_id !== null)) {

			$this->aTurnos = TurnosPeer::retrieveByPK($this->fk_turnos_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = TurnosPeer::retrieveByPK($this->fk_turnos_id, $con);
			   $obj->addTurnoss($this);
			 */
		}
		return $this->aTurnos;
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
	 * Otherwise if this Division has previously
	 * been saved, it will retrieve related RelAlumnoDivisions from storage.
	 * If this Division is new, it will return
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

				$criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->getId());

				RelAlumnoDivisionPeer::addSelectColumns($criteria);
				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->getId());

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

		$criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->getId());

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
		$l->setDivision($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Division is new, it will return
	 * an empty collection; or if this Division has previously
	 * been saved, it will retrieve related RelAlumnoDivisions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Division.
	 */
	public function getRelAlumnoDivisionsJoinAlumno($criteria = null, $con = null)
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

				$criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->getId());

				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelectJoinAlumno($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->getId());

			if (!isset($this->lastRelAlumnoDivisionCriteria) || !$this->lastRelAlumnoDivisionCriteria->equals($criteria)) {
				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelectJoinAlumno($criteria, $con);
			}
		}
		$this->lastRelAlumnoDivisionCriteria = $criteria;

		return $this->collRelAlumnoDivisions;
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
	 * Otherwise if this Division has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 * If this Division is new, it will return
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

				RelDivisionActividadDocentePeer::addSelectColumns($criteria);
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

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

		$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

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
		$l->setDivision($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Division is new, it will return
	 * an empty collection; or if this Division has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Division.
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinTipodocente($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

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
	 * Otherwise if this Division is new, it will return
	 * an empty collection; or if this Division has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Division.
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinCargobaja($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

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
	 * Otherwise if this Division is new, it will return
	 * an empty collection; or if this Division has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Division.
	 */
	public function getRelDivisionActividadDocentesJoinDocente($criteria = null, $con = null)
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDocente($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDocente($criteria, $con);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Division is new, it will return
	 * an empty collection; or if this Division has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Division.
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinActividad($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

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
	 * Otherwise if this Division is new, it will return
	 * an empty collection; or if this Division has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Division.
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinRepeticion($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDivisionActividadDocentePeer::FK_DIVISION_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinRepeticion($criteria, $con);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}

} // BaseDivision
