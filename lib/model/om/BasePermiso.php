<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/PermisoPeer.php';

/**
 * Base class that represents a row from the 'permiso' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BasePermiso extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var PermisoPeer
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
	 * The value for the fk_modulo_id field.
	 * @var int
	 */
	protected $fk_modulo_id = 0;


	/**
	 * The value for the credencial field.
	 * @var string
	 */
	protected $credencial;

	/**
	 * @var Modulo
	 */
	protected $aModulo;

	/**
	 * Collection to store aggregation of collRelRolPermisos.
	 * @var array
	 */
	protected $collRelRolPermisos;

	/**
	 * The criteria used to select the current contents of collRelRolPermisos.
	 * @var Criteria
	 */
	protected $lastRelRolPermisoCriteria = null;

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
	 * Get the [fk_modulo_id] column value.
	 * 
	 * @return int
	 */
	public function getFkModuloId()
	{

		return $this->fk_modulo_id;
	}

	/**
	 * Get the [credencial] column value.
	 * 
	 * @return string
	 */
	public function getCredencial()
	{

		return $this->credencial;
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
			$this->modifiedColumns[] = PermisoPeer::ID;
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
			$this->modifiedColumns[] = PermisoPeer::NOMBRE;
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
			$this->modifiedColumns[] = PermisoPeer::DESCRIPCION;
		}

	} // setDescripcion()

	/**
	 * Set the value of [fk_modulo_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkModuloId($v)
	{

		if ($this->fk_modulo_id !== $v || $v === 0) {
			$this->fk_modulo_id = $v;
			$this->modifiedColumns[] = PermisoPeer::FK_MODULO_ID;
		}

		if ($this->aModulo !== null && $this->aModulo->getId() !== $v) {
			$this->aModulo = null;
		}

	} // setFkModuloId()

	/**
	 * Set the value of [credencial] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setCredencial($v)
	{

		if ($this->credencial !== $v) {
			$this->credencial = $v;
			$this->modifiedColumns[] = PermisoPeer::CREDENCIAL;
		}

	} // setCredencial()

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

			$this->fk_modulo_id = $rs->getInt($startcol + 3);

			$this->credencial = $rs->getString($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 5; // 5 = PermisoPeer::NUM_COLUMNS - PermisoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Permiso object", $e);
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
			$con = Propel::getConnection(PermisoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PermisoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PermisoPeer::DATABASE_NAME);
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

			if ($this->aModulo !== null) {
				if ($this->aModulo->isModified()) {
					$affectedRows += $this->aModulo->save($con);
				}
				$this->setModulo($this->aModulo);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PermisoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += PermisoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collRelRolPermisos !== null) {
				foreach($this->collRelRolPermisos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelUsuarioPermisos !== null) {
				foreach($this->collRelUsuarioPermisos as $referrerFK) {
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

			if ($this->aModulo !== null) {
				if (!$this->aModulo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aModulo->getValidationFailures());
				}
			}


			if (($retval = PermisoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelRolPermisos !== null) {
					foreach($this->collRelRolPermisos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelUsuarioPermisos !== null) {
					foreach($this->collRelUsuarioPermisos as $referrerFK) {
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
		$pos = PermisoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkModuloId();
				break;
			case 4:
				return $this->getCredencial();
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
		$keys = PermisoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getFkModuloId(),
			$keys[4] => $this->getCredencial(),
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
		$pos = PermisoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFkModuloId($value);
				break;
			case 4:
				$this->setCredencial($value);
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
		$keys = PermisoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkModuloId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCredencial($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(PermisoPeer::DATABASE_NAME);

		if ($this->isColumnModified(PermisoPeer::ID)) $criteria->add(PermisoPeer::ID, $this->id);
		if ($this->isColumnModified(PermisoPeer::NOMBRE)) $criteria->add(PermisoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(PermisoPeer::DESCRIPCION)) $criteria->add(PermisoPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(PermisoPeer::FK_MODULO_ID)) $criteria->add(PermisoPeer::FK_MODULO_ID, $this->fk_modulo_id);
		if ($this->isColumnModified(PermisoPeer::CREDENCIAL)) $criteria->add(PermisoPeer::CREDENCIAL, $this->credencial);

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
		$criteria = new Criteria(PermisoPeer::DATABASE_NAME);

		$criteria->add(PermisoPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Permiso (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNombre($this->nombre);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setFkModuloId($this->fk_modulo_id);

		$copyObj->setCredencial($this->credencial);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getRelRolPermisos() as $relObj) {
				$copyObj->addRelRolPermiso($relObj->copy($deepCopy));
			}

			foreach($this->getRelUsuarioPermisos() as $relObj) {
				$copyObj->addRelUsuarioPermiso($relObj->copy($deepCopy));
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
	 * @return Permiso Clone of current object.
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
	 * @return PermisoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PermisoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Modulo object.
	 *
	 * @param Modulo $v
	 * @return void
	 * @throws PropelException
	 */
	public function setModulo($v)
	{


		if ($v === null) {
			$this->setFkModuloId('0');
		} else {
			$this->setFkModuloId($v->getId());
		}


		$this->aModulo = $v;
	}


	/**
	 * Get the associated Modulo object
	 *
	 * @param Connection Optional Connection object.
	 * @return Modulo The associated Modulo object.
	 * @throws PropelException
	 */
	public function getModulo($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseModuloPeer.php';

		if ($this->aModulo === null && ($this->fk_modulo_id !== null)) {

			$this->aModulo = ModuloPeer::retrieveByPK($this->fk_modulo_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = ModuloPeer::retrieveByPK($this->fk_modulo_id, $con);
			   $obj->addModulos($this);
			 */
		}
		return $this->aModulo;
	}

	/**
	 * Temporary storage of collRelRolPermisos to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initRelRolPermisos()
	{
		if ($this->collRelRolPermisos === null) {
			$this->collRelRolPermisos = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Permiso has previously
	 * been saved, it will retrieve related RelRolPermisos from storage.
	 * If this Permiso is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getRelRolPermisos($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelRolPermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelRolPermisos === null) {
			if ($this->isNew()) {
			   $this->collRelRolPermisos = array();
			} else {

				$criteria->add(RelRolPermisoPeer::FK_PERMISO_ID, $this->getId());

				RelRolPermisoPeer::addSelectColumns($criteria);
				$this->collRelRolPermisos = RelRolPermisoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(RelRolPermisoPeer::FK_PERMISO_ID, $this->getId());

				RelRolPermisoPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelRolPermisoCriteria) || !$this->lastRelRolPermisoCriteria->equals($criteria)) {
					$this->collRelRolPermisos = RelRolPermisoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelRolPermisoCriteria = $criteria;
		return $this->collRelRolPermisos;
	}

	/**
	 * Returns the number of related RelRolPermisos.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countRelRolPermisos($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelRolPermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelRolPermisoPeer::FK_PERMISO_ID, $this->getId());

		return RelRolPermisoPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a RelRolPermiso object to this object
	 * through the RelRolPermiso foreign key attribute
	 *
	 * @param RelRolPermiso $l RelRolPermiso
	 * @return void
	 * @throws PropelException
	 */
	public function addRelRolPermiso(RelRolPermiso $l)
	{
		$this->collRelRolPermisos[] = $l;
		$l->setPermiso($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Permiso is new, it will return
	 * an empty collection; or if this Permiso has previously
	 * been saved, it will retrieve related RelRolPermisos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Permiso.
	 */
	public function getRelRolPermisosJoinRol($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelRolPermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelRolPermisos === null) {
			if ($this->isNew()) {
				$this->collRelRolPermisos = array();
			} else {

				$criteria->add(RelRolPermisoPeer::FK_PERMISO_ID, $this->getId());

				$this->collRelRolPermisos = RelRolPermisoPeer::doSelectJoinRol($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelRolPermisoPeer::FK_PERMISO_ID, $this->getId());

			if (!isset($this->lastRelRolPermisoCriteria) || !$this->lastRelRolPermisoCriteria->equals($criteria)) {
				$this->collRelRolPermisos = RelRolPermisoPeer::doSelectJoinRol($criteria, $con);
			}
		}
		$this->lastRelRolPermisoCriteria = $criteria;

		return $this->collRelRolPermisos;
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
	 * Otherwise if this Permiso has previously
	 * been saved, it will retrieve related RelUsuarioPermisos from storage.
	 * If this Permiso is new, it will return
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

				$criteria->add(RelUsuarioPermisoPeer::FK_PERMISO_ID, $this->getId());

				RelUsuarioPermisoPeer::addSelectColumns($criteria);
				$this->collRelUsuarioPermisos = RelUsuarioPermisoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(RelUsuarioPermisoPeer::FK_PERMISO_ID, $this->getId());

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

		$criteria->add(RelUsuarioPermisoPeer::FK_PERMISO_ID, $this->getId());

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
		$l->setPermiso($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Permiso is new, it will return
	 * an empty collection; or if this Permiso has previously
	 * been saved, it will retrieve related RelUsuarioPermisos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Permiso.
	 */
	public function getRelUsuarioPermisosJoinUsuario($criteria = null, $con = null)
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

				$criteria->add(RelUsuarioPermisoPeer::FK_PERMISO_ID, $this->getId());

				$this->collRelUsuarioPermisos = RelUsuarioPermisoPeer::doSelectJoinUsuario($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelUsuarioPermisoPeer::FK_PERMISO_ID, $this->getId());

			if (!isset($this->lastRelUsuarioPermisoCriteria) || !$this->lastRelUsuarioPermisoCriteria->equals($criteria)) {
				$this->collRelUsuarioPermisos = RelUsuarioPermisoPeer::doSelectJoinUsuario($criteria, $con);
			}
		}
		$this->lastRelUsuarioPermisoCriteria = $criteria;

		return $this->collRelUsuarioPermisos;
	}

} // BasePermiso
