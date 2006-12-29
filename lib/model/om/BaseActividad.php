<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/ActividadPeer.php';

/**
 * Base class that represents a row from the 'actividad' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseActividad extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var ActividadPeer
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
	protected $fk_establecimiento_id = 0;


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
	 * @var Establecimiento
	 */
	protected $aEstablecimiento;

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
	 * Collection to store aggregation of collRelAnioActividads.
	 * @var array
	 */
	protected $collRelAnioActividads;

	/**
	 * The criteria used to select the current contents of collRelAnioActividads.
	 * @var Criteria
	 */
	protected $lastRelAnioActividadCriteria = null;

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
	 * Set the value of [id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ActividadPeer::ID;
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

		if ($this->fk_establecimiento_id !== $v || $v === 0) {
			$this->fk_establecimiento_id = $v;
			$this->modifiedColumns[] = ActividadPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
		}

	} // setFkEstablecimientoId()

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
			$this->modifiedColumns[] = ActividadPeer::NOMBRE;
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
			$this->modifiedColumns[] = ActividadPeer::DESCRIPCION;
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

			$this->fk_establecimiento_id = $rs->getInt($startcol + 1);

			$this->nombre = $rs->getString($startcol + 2);

			$this->descripcion = $rs->getString($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 4; // 4 = ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Actividad object", $e);
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
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ActividadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME);
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
					$pk = ActividadPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ActividadPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
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

			if ($this->collRelAnioActividads !== null) {
				foreach($this->collRelAnioActividads as $referrerFK) {
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

			if ($this->collRelActividadDocentes !== null) {
				foreach($this->collRelActividadDocentes as $referrerFK) {
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


			if (($retval = ActividadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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

				if ($this->collRelAnioActividads !== null) {
					foreach($this->collRelAnioActividads as $referrerFK) {
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

				if ($this->collRelActividadDocentes !== null) {
					foreach($this->collRelActividadDocentes as $referrerFK) {
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
		$pos = ActividadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNombre();
				break;
			case 3:
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
		$keys = ActividadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkEstablecimientoId(),
			$keys[2] => $this->getNombre(),
			$keys[3] => $this->getDescripcion(),
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
		$pos = ActividadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setNombre($value);
				break;
			case 3:
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
		$keys = ActividadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkEstablecimientoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescripcion($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ActividadPeer::DATABASE_NAME);

		if ($this->isColumnModified(ActividadPeer::ID)) $criteria->add(ActividadPeer::ID, $this->id);
		if ($this->isColumnModified(ActividadPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(ActividadPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(ActividadPeer::NOMBRE)) $criteria->add(ActividadPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(ActividadPeer::DESCRIPCION)) $criteria->add(ActividadPeer::DESCRIPCION, $this->descripcion);

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
		$criteria = new Criteria(ActividadPeer::DATABASE_NAME);

		$criteria->add(ActividadPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Actividad (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFkEstablecimientoId($this->fk_establecimiento_id);

		$copyObj->setNombre($this->nombre);

		$copyObj->setDescripcion($this->descripcion);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getBoletinActividadess() as $relObj) {
				$copyObj->addBoletinActividades($relObj->copy($deepCopy));
			}

			foreach($this->getExamens() as $relObj) {
				$copyObj->addExamen($relObj->copy($deepCopy));
			}

			foreach($this->getRelAnioActividads() as $relObj) {
				$copyObj->addRelAnioActividad($relObj->copy($deepCopy));
			}

			foreach($this->getRelDivisionActividadDocentes() as $relObj) {
				$copyObj->addRelDivisionActividadDocente($relObj->copy($deepCopy));
			}

			foreach($this->getRelActividadDocentes() as $relObj) {
				$copyObj->addRelActividadDocente($relObj->copy($deepCopy));
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
	 * @return Actividad Clone of current object.
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
	 * @return ActividadPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ActividadPeer();
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
	 * Otherwise if this Actividad has previously
	 * been saved, it will retrieve related BoletinActividadess from storage.
	 * If this Actividad is new, it will return
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

				$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->getId());

				BoletinActividadesPeer::addSelectColumns($criteria);
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->getId());

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

		$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->getId());

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
		$l->setActividad($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Actividad is new, it will return
	 * an empty collection; or if this Actividad has previously
	 * been saved, it will retrieve related BoletinActividadess from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Actividad.
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

				$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->getId());

				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinEscalanota($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->getId());

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
	 * Otherwise if this Actividad is new, it will return
	 * an empty collection; or if this Actividad has previously
	 * been saved, it will retrieve related BoletinActividadess from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Actividad.
	 */
	public function getBoletinActividadessJoinAlumno($criteria = null, $con = null)
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

				$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->getId());

				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinAlumno($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->getId());

			if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinAlumno($criteria, $con);
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;

		return $this->collBoletinActividadess;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Actividad is new, it will return
	 * an empty collection; or if this Actividad has previously
	 * been saved, it will retrieve related BoletinActividadess from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Actividad.
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

				$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->getId());

				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinPeriodo($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $this->getId());

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
	 * Otherwise if this Actividad has previously
	 * been saved, it will retrieve related Examens from storage.
	 * If this Actividad is new, it will return
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

				$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->getId());

				ExamenPeer::addSelectColumns($criteria);
				$this->collExamens = ExamenPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->getId());

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

		$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->getId());

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
		$l->setActividad($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Actividad is new, it will return
	 * an empty collection; or if this Actividad has previously
	 * been saved, it will retrieve related Examens from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Actividad.
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

				$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->getId());

				$this->collExamens = ExamenPeer::doSelectJoinEscalanota($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->getId());

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
	 * Otherwise if this Actividad is new, it will return
	 * an empty collection; or if this Actividad has previously
	 * been saved, it will retrieve related Examens from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Actividad.
	 */
	public function getExamensJoinAlumno($criteria = null, $con = null)
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

				$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->getId());

				$this->collExamens = ExamenPeer::doSelectJoinAlumno($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->getId());

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinAlumno($criteria, $con);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Actividad is new, it will return
	 * an empty collection; or if this Actividad has previously
	 * been saved, it will retrieve related Examens from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Actividad.
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

				$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->getId());

				$this->collExamens = ExamenPeer::doSelectJoinPeriodo($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ExamenPeer::FK_ACTIVIDAD_ID, $this->getId());

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinPeriodo($criteria, $con);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
	}

	/**
	 * Temporary storage of collRelAnioActividads to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initRelAnioActividads()
	{
		if ($this->collRelAnioActividads === null) {
			$this->collRelAnioActividads = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Actividad has previously
	 * been saved, it will retrieve related RelAnioActividads from storage.
	 * If this Actividad is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getRelAnioActividads($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelAnioActividadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividads === null) {
			if ($this->isNew()) {
			   $this->collRelAnioActividads = array();
			} else {

				$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->getId());

				RelAnioActividadPeer::addSelectColumns($criteria);
				$this->collRelAnioActividads = RelAnioActividadPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->getId());

				RelAnioActividadPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelAnioActividadCriteria) || !$this->lastRelAnioActividadCriteria->equals($criteria)) {
					$this->collRelAnioActividads = RelAnioActividadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelAnioActividadCriteria = $criteria;
		return $this->collRelAnioActividads;
	}

	/**
	 * Returns the number of related RelAnioActividads.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countRelAnioActividads($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelAnioActividadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->getId());

		return RelAnioActividadPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a RelAnioActividad object to this object
	 * through the RelAnioActividad foreign key attribute
	 *
	 * @param RelAnioActividad $l RelAnioActividad
	 * @return void
	 * @throws PropelException
	 */
	public function addRelAnioActividad(RelAnioActividad $l)
	{
		$this->collRelAnioActividads[] = $l;
		$l->setActividad($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Actividad is new, it will return
	 * an empty collection; or if this Actividad has previously
	 * been saved, it will retrieve related RelAnioActividads from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Actividad.
	 */
	public function getRelAnioActividadsJoinAnio($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelAnioActividadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividads === null) {
			if ($this->isNew()) {
				$this->collRelAnioActividads = array();
			} else {

				$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->getId());

				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinAnio($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->getId());

			if (!isset($this->lastRelAnioActividadCriteria) || !$this->lastRelAnioActividadCriteria->equals($criteria)) {
				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinAnio($criteria, $con);
			}
		}
		$this->lastRelAnioActividadCriteria = $criteria;

		return $this->collRelAnioActividads;
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
	 * Otherwise if this Actividad has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 * If this Actividad is new, it will return
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

				RelDivisionActividadDocentePeer::addSelectColumns($criteria);
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

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

		$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

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
		$l->setActividad($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Actividad is new, it will return
	 * an empty collection; or if this Actividad has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Actividad.
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDivision($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

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
	 * Otherwise if this Actividad is new, it will return
	 * an empty collection; or if this Actividad has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Actividad.
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinTipodocente($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

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
	 * Otherwise if this Actividad is new, it will return
	 * an empty collection; or if this Actividad has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Actividad.
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinCargobaja($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

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
	 * Otherwise if this Actividad is new, it will return
	 * an empty collection; or if this Actividad has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Actividad.
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDocente($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

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
	 * Otherwise if this Actividad is new, it will return
	 * an empty collection; or if this Actividad has previously
	 * been saved, it will retrieve related RelDivisionActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Actividad.
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

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinRepeticion($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinRepeticion($criteria, $con);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
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
	 * Otherwise if this Actividad has previously
	 * been saved, it will retrieve related RelActividadDocentes from storage.
	 * If this Actividad is new, it will return
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

				$criteria->add(RelActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

				RelActividadDocentePeer::addSelectColumns($criteria);
				$this->collRelActividadDocentes = RelActividadDocentePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(RelActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

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

		$criteria->add(RelActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

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
		$l->setActividad($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Actividad is new, it will return
	 * an empty collection; or if this Actividad has previously
	 * been saved, it will retrieve related RelActividadDocentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Actividad.
	 */
	public function getRelActividadDocentesJoinDocente($criteria = null, $con = null)
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

				$criteria->add(RelActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

				$this->collRelActividadDocentes = RelActividadDocentePeer::doSelectJoinDocente($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelActividadDocentePeer::FK_ACTIVIDAD_ID, $this->getId());

			if (!isset($this->lastRelActividadDocenteCriteria) || !$this->lastRelActividadDocenteCriteria->equals($criteria)) {
				$this->collRelActividadDocentes = RelActividadDocentePeer::doSelectJoinDocente($criteria, $con);
			}
		}
		$this->lastRelActividadDocenteCriteria = $criteria;

		return $this->collRelActividadDocentes;
	}

} // BaseActividad
