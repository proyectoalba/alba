<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/ProvinciaPeer.php';

/**
 * Base class that represents a row from the 'provincia' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseProvincia extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var ProvinciaPeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var int
	 */
	protected $id;


	/**
	 * The value for the nombre_corto field.
	 * @var string
	 */
	protected $nombre_corto = '';


	/**
	 * The value for the nombre_largo field.
	 * @var string
	 */
	protected $nombre_largo = '';


	/**
	 * The value for the fk_pais_id field.
	 * @var int
	 */
	protected $fk_pais_id = 0;


	/**
	 * The value for the orden field.
	 * @var int
	 */
	protected $orden = 0;

	/**
	 * @var Pais
	 */
	protected $aPais;

	/**
	 * Collection to store aggregation of collLocacions.
	 * @var array
	 */
	protected $collLocacions;

	/**
	 * The criteria used to select the current contents of collLocacions.
	 * @var Criteria
	 */
	protected $lastLocacionCriteria = null;

	/**
	 * Collection to store aggregation of collOrganizacions.
	 * @var array
	 */
	protected $collOrganizacions;

	/**
	 * The criteria used to select the current contents of collOrganizacions.
	 * @var Criteria
	 */
	protected $lastOrganizacionCriteria = null;

	/**
	 * Collection to store aggregation of collCuentas.
	 * @var array
	 */
	protected $collCuentas;

	/**
	 * The criteria used to select the current contents of collCuentas.
	 * @var Criteria
	 */
	protected $lastCuentaCriteria = null;

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
	 * Collection to store aggregation of collResponsables.
	 * @var array
	 */
	protected $collResponsables;

	/**
	 * The criteria used to select the current contents of collResponsables.
	 * @var Criteria
	 */
	protected $lastResponsableCriteria = null;

	/**
	 * Collection to store aggregation of collDocentes.
	 * @var array
	 */
	protected $collDocentes;

	/**
	 * The criteria used to select the current contents of collDocentes.
	 * @var Criteria
	 */
	protected $lastDocenteCriteria = null;

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
	 * Get the [nombre_corto] column value.
	 * 
	 * @return string
	 */
	public function getNombreCorto()
	{

		return $this->nombre_corto;
	}

	/**
	 * Get the [nombre_largo] column value.
	 * 
	 * @return string
	 */
	public function getNombreLargo()
	{

		return $this->nombre_largo;
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
	 * Get the [orden] column value.
	 * 
	 * @return int
	 */
	public function getOrden()
	{

		return $this->orden;
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
			$this->modifiedColumns[] = ProvinciaPeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [nombre_corto] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setNombreCorto($v)
	{

		if ($this->nombre_corto !== $v || $v === '') {
			$this->nombre_corto = $v;
			$this->modifiedColumns[] = ProvinciaPeer::NOMBRE_CORTO;
		}

	} // setNombreCorto()

	/**
	 * Set the value of [nombre_largo] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setNombreLargo($v)
	{

		if ($this->nombre_largo !== $v || $v === '') {
			$this->nombre_largo = $v;
			$this->modifiedColumns[] = ProvinciaPeer::NOMBRE_LARGO;
		}

	} // setNombreLargo()

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
			$this->modifiedColumns[] = ProvinciaPeer::FK_PAIS_ID;
		}

		if ($this->aPais !== null && $this->aPais->getId() !== $v) {
			$this->aPais = null;
		}

	} // setFkPaisId()

	/**
	 * Set the value of [orden] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setOrden($v)
	{

		if ($this->orden !== $v || $v === 0) {
			$this->orden = $v;
			$this->modifiedColumns[] = ProvinciaPeer::ORDEN;
		}

	} // setOrden()

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

			$this->nombre_corto = $rs->getString($startcol + 1);

			$this->nombre_largo = $rs->getString($startcol + 2);

			$this->fk_pais_id = $rs->getInt($startcol + 3);

			$this->orden = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 5; // 5 = ProvinciaPeer::NUM_COLUMNS - ProvinciaPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Provincia object", $e);
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
			$con = Propel::getConnection(ProvinciaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ProvinciaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ProvinciaPeer::DATABASE_NAME);
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

			if ($this->aPais !== null) {
				if ($this->aPais->isModified()) {
					$affectedRows += $this->aPais->save($con);
				}
				$this->setPais($this->aPais);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProvinciaPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ProvinciaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collLocacions !== null) {
				foreach($this->collLocacions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collOrganizacions !== null) {
				foreach($this->collOrganizacions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCuentas !== null) {
				foreach($this->collCuentas as $referrerFK) {
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

			if ($this->collResponsables !== null) {
				foreach($this->collResponsables as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDocentes !== null) {
				foreach($this->collDocentes as $referrerFK) {
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

			if ($this->aPais !== null) {
				if (!$this->aPais->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPais->getValidationFailures());
				}
			}


			if (($retval = ProvinciaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLocacions !== null) {
					foreach($this->collLocacions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collOrganizacions !== null) {
					foreach($this->collOrganizacions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCuentas !== null) {
					foreach($this->collCuentas as $referrerFK) {
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

				if ($this->collResponsables !== null) {
					foreach($this->collResponsables as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDocentes !== null) {
					foreach($this->collDocentes as $referrerFK) {
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
		$pos = ProvinciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNombreCorto();
				break;
			case 2:
				return $this->getNombreLargo();
				break;
			case 3:
				return $this->getFkPaisId();
				break;
			case 4:
				return $this->getOrden();
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
		$keys = ProvinciaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombreCorto(),
			$keys[2] => $this->getNombreLargo(),
			$keys[3] => $this->getFkPaisId(),
			$keys[4] => $this->getOrden(),
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
		$pos = ProvinciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setNombreCorto($value);
				break;
			case 2:
				$this->setNombreLargo($value);
				break;
			case 3:
				$this->setFkPaisId($value);
				break;
			case 4:
				$this->setOrden($value);
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
		$keys = ProvinciaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombreCorto($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombreLargo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkPaisId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOrden($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProvinciaPeer::ID)) $criteria->add(ProvinciaPeer::ID, $this->id);
		if ($this->isColumnModified(ProvinciaPeer::NOMBRE_CORTO)) $criteria->add(ProvinciaPeer::NOMBRE_CORTO, $this->nombre_corto);
		if ($this->isColumnModified(ProvinciaPeer::NOMBRE_LARGO)) $criteria->add(ProvinciaPeer::NOMBRE_LARGO, $this->nombre_largo);
		if ($this->isColumnModified(ProvinciaPeer::FK_PAIS_ID)) $criteria->add(ProvinciaPeer::FK_PAIS_ID, $this->fk_pais_id);
		if ($this->isColumnModified(ProvinciaPeer::ORDEN)) $criteria->add(ProvinciaPeer::ORDEN, $this->orden);

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
		$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);

		$criteria->add(ProvinciaPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Provincia (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNombreCorto($this->nombre_corto);

		$copyObj->setNombreLargo($this->nombre_largo);

		$copyObj->setFkPaisId($this->fk_pais_id);

		$copyObj->setOrden($this->orden);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getLocacions() as $relObj) {
				$copyObj->addLocacion($relObj->copy($deepCopy));
			}

			foreach($this->getOrganizacions() as $relObj) {
				$copyObj->addOrganizacion($relObj->copy($deepCopy));
			}

			foreach($this->getCuentas() as $relObj) {
				$copyObj->addCuenta($relObj->copy($deepCopy));
			}

			foreach($this->getAlumnos() as $relObj) {
				$copyObj->addAlumno($relObj->copy($deepCopy));
			}

			foreach($this->getResponsables() as $relObj) {
				$copyObj->addResponsable($relObj->copy($deepCopy));
			}

			foreach($this->getDocentes() as $relObj) {
				$copyObj->addDocente($relObj->copy($deepCopy));
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
	 * @return Provincia Clone of current object.
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
	 * @return ProvinciaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ProvinciaPeer();
		}
		return self::$peer;
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
	 * Temporary storage of collLocacions to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initLocacions()
	{
		if ($this->collLocacions === null) {
			$this->collLocacions = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Provincia has previously
	 * been saved, it will retrieve related Locacions from storage.
	 * If this Provincia is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getLocacions($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLocacions === null) {
			if ($this->isNew()) {
			   $this->collLocacions = array();
			} else {

				$criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->getId());

				LocacionPeer::addSelectColumns($criteria);
				$this->collLocacions = LocacionPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->getId());

				LocacionPeer::addSelectColumns($criteria);
				if (!isset($this->lastLocacionCriteria) || !$this->lastLocacionCriteria->equals($criteria)) {
					$this->collLocacions = LocacionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLocacionCriteria = $criteria;
		return $this->collLocacions;
	}

	/**
	 * Returns the number of related Locacions.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countLocacions($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->getId());

		return LocacionPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Locacion object to this object
	 * through the Locacion foreign key attribute
	 *
	 * @param Locacion $l Locacion
	 * @return void
	 * @throws PropelException
	 */
	public function addLocacion(Locacion $l)
	{
		$this->collLocacions[] = $l;
		$l->setProvincia($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Provincia is new, it will return
	 * an empty collection; or if this Provincia has previously
	 * been saved, it will retrieve related Locacions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Provincia.
	 */
	public function getLocacionsJoinTipolocacion($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLocacions === null) {
			if ($this->isNew()) {
				$this->collLocacions = array();
			} else {

				$criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->getId());

				$this->collLocacions = LocacionPeer::doSelectJoinTipolocacion($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastLocacionCriteria) || !$this->lastLocacionCriteria->equals($criteria)) {
				$this->collLocacions = LocacionPeer::doSelectJoinTipolocacion($criteria, $con);
			}
		}
		$this->lastLocacionCriteria = $criteria;

		return $this->collLocacions;
	}

	/**
	 * Temporary storage of collOrganizacions to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initOrganizacions()
	{
		if ($this->collOrganizacions === null) {
			$this->collOrganizacions = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Provincia has previously
	 * been saved, it will retrieve related Organizacions from storage.
	 * If this Provincia is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getOrganizacions($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseOrganizacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrganizacions === null) {
			if ($this->isNew()) {
			   $this->collOrganizacions = array();
			} else {

				$criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->getId());

				OrganizacionPeer::addSelectColumns($criteria);
				$this->collOrganizacions = OrganizacionPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->getId());

				OrganizacionPeer::addSelectColumns($criteria);
				if (!isset($this->lastOrganizacionCriteria) || !$this->lastOrganizacionCriteria->equals($criteria)) {
					$this->collOrganizacions = OrganizacionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastOrganizacionCriteria = $criteria;
		return $this->collOrganizacions;
	}

	/**
	 * Returns the number of related Organizacions.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countOrganizacions($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseOrganizacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->getId());

		return OrganizacionPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Organizacion object to this object
	 * through the Organizacion foreign key attribute
	 *
	 * @param Organizacion $l Organizacion
	 * @return void
	 * @throws PropelException
	 */
	public function addOrganizacion(Organizacion $l)
	{
		$this->collOrganizacions[] = $l;
		$l->setProvincia($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Provincia is new, it will return
	 * an empty collection; or if this Provincia has previously
	 * been saved, it will retrieve related Organizacions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Provincia.
	 */
	public function getOrganizacionsJoinTipoiva($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseOrganizacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrganizacions === null) {
			if ($this->isNew()) {
				$this->collOrganizacions = array();
			} else {

				$criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->getId());

				$this->collOrganizacions = OrganizacionPeer::doSelectJoinTipoiva($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastOrganizacionCriteria) || !$this->lastOrganizacionCriteria->equals($criteria)) {
				$this->collOrganizacions = OrganizacionPeer::doSelectJoinTipoiva($criteria, $con);
			}
		}
		$this->lastOrganizacionCriteria = $criteria;

		return $this->collOrganizacions;
	}

	/**
	 * Temporary storage of collCuentas to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initCuentas()
	{
		if ($this->collCuentas === null) {
			$this->collCuentas = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Provincia has previously
	 * been saved, it will retrieve related Cuentas from storage.
	 * If this Provincia is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getCuentas($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseCuentaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuentas === null) {
			if ($this->isNew()) {
			   $this->collCuentas = array();
			} else {

				$criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->getId());

				CuentaPeer::addSelectColumns($criteria);
				$this->collCuentas = CuentaPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->getId());

				CuentaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCuentaCriteria) || !$this->lastCuentaCriteria->equals($criteria)) {
					$this->collCuentas = CuentaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCuentaCriteria = $criteria;
		return $this->collCuentas;
	}

	/**
	 * Returns the number of related Cuentas.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countCuentas($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseCuentaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->getId());

		return CuentaPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Cuenta object to this object
	 * through the Cuenta foreign key attribute
	 *
	 * @param Cuenta $l Cuenta
	 * @return void
	 * @throws PropelException
	 */
	public function addCuenta(Cuenta $l)
	{
		$this->collCuentas[] = $l;
		$l->setProvincia($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Provincia is new, it will return
	 * an empty collection; or if this Provincia has previously
	 * been saved, it will retrieve related Cuentas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Provincia.
	 */
	public function getCuentasJoinTipoiva($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseCuentaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuentas === null) {
			if ($this->isNew()) {
				$this->collCuentas = array();
			} else {

				$criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->getId());

				$this->collCuentas = CuentaPeer::doSelectJoinTipoiva($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastCuentaCriteria) || !$this->lastCuentaCriteria->equals($criteria)) {
				$this->collCuentas = CuentaPeer::doSelectJoinTipoiva($criteria, $con);
			}
		}
		$this->lastCuentaCriteria = $criteria;

		return $this->collCuentas;
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
	 * Otherwise if this Provincia has previously
	 * been saved, it will retrieve related Alumnos from storage.
	 * If this Provincia is new, it will return
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

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

				AlumnoPeer::addSelectColumns($criteria);
				$this->collAlumnos = AlumnoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

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

		$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

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
		$l->setProvincia($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Provincia is new, it will return
	 * an empty collection; or if this Provincia has previously
	 * been saved, it will retrieve related Alumnos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Provincia.
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

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinTipodocumento($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

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
	 * Otherwise if this Provincia is new, it will return
	 * an empty collection; or if this Provincia has previously
	 * been saved, it will retrieve related Alumnos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Provincia.
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

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinCuenta($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

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
	 * Otherwise if this Provincia is new, it will return
	 * an empty collection; or if this Provincia has previously
	 * been saved, it will retrieve related Alumnos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Provincia.
	 */
	public function getAlumnosJoinEstablecimiento($criteria = null, $con = null)
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

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Provincia is new, it will return
	 * an empty collection; or if this Provincia has previously
	 * been saved, it will retrieve related Alumnos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Provincia.
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

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinConceptobaja($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinConceptobaja($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}

	/**
	 * Temporary storage of collResponsables to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initResponsables()
	{
		if ($this->collResponsables === null) {
			$this->collResponsables = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Provincia has previously
	 * been saved, it will retrieve related Responsables from storage.
	 * If this Provincia is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getResponsables($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseResponsablePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
			   $this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->getId());

				ResponsablePeer::addSelectColumns($criteria);
				$this->collResponsables = ResponsablePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->getId());

				ResponsablePeer::addSelectColumns($criteria);
				if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
					$this->collResponsables = ResponsablePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastResponsableCriteria = $criteria;
		return $this->collResponsables;
	}

	/**
	 * Returns the number of related Responsables.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countResponsables($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseResponsablePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->getId());

		return ResponsablePeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Responsable object to this object
	 * through the Responsable foreign key attribute
	 *
	 * @param Responsable $l Responsable
	 * @return void
	 * @throws PropelException
	 */
	public function addResponsable(Responsable $l)
	{
		$this->collResponsables[] = $l;
		$l->setProvincia($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Provincia is new, it will return
	 * an empty collection; or if this Provincia has previously
	 * been saved, it will retrieve related Responsables from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Provincia.
	 */
	public function getResponsablesJoinCuenta($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseResponsablePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
				$this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->getId());

				$this->collResponsables = ResponsablePeer::doSelectJoinCuenta($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinCuenta($criteria, $con);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Provincia is new, it will return
	 * an empty collection; or if this Provincia has previously
	 * been saved, it will retrieve related Responsables from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Provincia.
	 */
	public function getResponsablesJoinTipodocumento($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseResponsablePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
				$this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->getId());

				$this->collResponsables = ResponsablePeer::doSelectJoinTipodocumento($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinTipodocumento($criteria, $con);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}

	/**
	 * Temporary storage of collDocentes to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initDocentes()
	{
		if ($this->collDocentes === null) {
			$this->collDocentes = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Provincia has previously
	 * been saved, it will retrieve related Docentes from storage.
	 * If this Provincia is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getDocentes($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDocentes === null) {
			if ($this->isNew()) {
			   $this->collDocentes = array();
			} else {

				$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->getId());

				DocentePeer::addSelectColumns($criteria);
				$this->collDocentes = DocentePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->getId());

				DocentePeer::addSelectColumns($criteria);
				if (!isset($this->lastDocenteCriteria) || !$this->lastDocenteCriteria->equals($criteria)) {
					$this->collDocentes = DocentePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDocenteCriteria = $criteria;
		return $this->collDocentes;
	}

	/**
	 * Returns the number of related Docentes.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countDocentes($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->getId());

		return DocentePeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Docente object to this object
	 * through the Docente foreign key attribute
	 *
	 * @param Docente $l Docente
	 * @return void
	 * @throws PropelException
	 */
	public function addDocente(Docente $l)
	{
		$this->collDocentes[] = $l;
		$l->setProvincia($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Provincia is new, it will return
	 * an empty collection; or if this Provincia has previously
	 * been saved, it will retrieve related Docentes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Provincia.
	 */
	public function getDocentesJoinTipodocumento($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDocentes === null) {
			if ($this->isNew()) {
				$this->collDocentes = array();
			} else {

				$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->getId());

				$this->collDocentes = DocentePeer::doSelectJoinTipodocumento($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->getId());

			if (!isset($this->lastDocenteCriteria) || !$this->lastDocenteCriteria->equals($criteria)) {
				$this->collDocentes = DocentePeer::doSelectJoinTipodocumento($criteria, $con);
			}
		}
		$this->lastDocenteCriteria = $criteria;

		return $this->collDocentes;
	}

} // BaseProvincia
