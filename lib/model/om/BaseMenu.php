<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/MenuPeer.php';

/**
 * Base class that represents a row from the 'menu' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseMenu extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var MenuPeer
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
	 * The value for the link field.
	 * @var string
	 */
	protected $link = '';


	/**
	 * The value for the perm field.
	 * @var string
	 */
	protected $perm = '';


	/**
	 * The value for the target field.
	 * @var string
	 */
	protected $target = '';


	/**
	 * The value for the fk_padre_menu_id field.
	 * @var int
	 */
	protected $fk_padre_menu_id;


	/**
	 * The value for the orden field.
	 * @var int
	 */
	protected $orden;

	/**
	 * @var Menu
	 */
	protected $aMenuRelatedByFkPadreMenuId;

	/**
	 * Collection to store aggregation of collMenusRelatedByFkPadreMenuId.
	 * @var array
	 */
	protected $collMenusRelatedByFkPadreMenuId;

	/**
	 * The criteria used to select the current contents of collMenusRelatedByFkPadreMenuId.
	 * @var Criteria
	 */
	protected $lastMenuRelatedByFkPadreMenuIdCriteria = null;

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
	 * Get the [link] column value.
	 * 
	 * @return string
	 */
	public function getLink()
	{

		return $this->link;
	}

	/**
	 * Get the [perm] column value.
	 * 
	 * @return string
	 */
	public function getPerm()
	{

		return $this->perm;
	}

	/**
	 * Get the [target] column value.
	 * 
	 * @return string
	 */
	public function getTarget()
	{

		return $this->target;
	}

	/**
	 * Get the [fk_padre_menu_id] column value.
	 * 
	 * @return int
	 */
	public function getFkPadreMenuId()
	{

		return $this->fk_padre_menu_id;
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
			$this->modifiedColumns[] = MenuPeer::ID;
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
			$this->modifiedColumns[] = MenuPeer::NOMBRE;
		}

	} // setNombre()

	/**
	 * Set the value of [link] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setLink($v)
	{

		if ($this->link !== $v || $v === '') {
			$this->link = $v;
			$this->modifiedColumns[] = MenuPeer::LINK;
		}

	} // setLink()

	/**
	 * Set the value of [perm] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setPerm($v)
	{

		if ($this->perm !== $v || $v === '') {
			$this->perm = $v;
			$this->modifiedColumns[] = MenuPeer::PERM;
		}

	} // setPerm()

	/**
	 * Set the value of [target] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setTarget($v)
	{

		if ($this->target !== $v || $v === '') {
			$this->target = $v;
			$this->modifiedColumns[] = MenuPeer::TARGET;
		}

	} // setTarget()

	/**
	 * Set the value of [fk_padre_menu_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkPadreMenuId($v)
	{

		if ($this->fk_padre_menu_id !== $v) {
			$this->fk_padre_menu_id = $v;
			$this->modifiedColumns[] = MenuPeer::FK_PADRE_MENU_ID;
		}

		if ($this->aMenuRelatedByFkPadreMenuId !== null && $this->aMenuRelatedByFkPadreMenuId->getId() !== $v) {
			$this->aMenuRelatedByFkPadreMenuId = null;
		}

	} // setFkPadreMenuId()

	/**
	 * Set the value of [orden] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setOrden($v)
	{

		if ($this->orden !== $v) {
			$this->orden = $v;
			$this->modifiedColumns[] = MenuPeer::ORDEN;
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

			$this->nombre = $rs->getString($startcol + 1);

			$this->link = $rs->getString($startcol + 2);

			$this->perm = $rs->getString($startcol + 3);

			$this->target = $rs->getString($startcol + 4);

			$this->fk_padre_menu_id = $rs->getInt($startcol + 5);

			$this->orden = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 7; // 7 = MenuPeer::NUM_COLUMNS - MenuPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Menu object", $e);
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
			$con = Propel::getConnection(MenuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MenuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(MenuPeer::DATABASE_NAME);
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

			if ($this->aMenuRelatedByFkPadreMenuId !== null) {
				if ($this->aMenuRelatedByFkPadreMenuId->isModified()) {
					$affectedRows += $this->aMenuRelatedByFkPadreMenuId->save($con);
				}
				$this->setMenuRelatedByFkPadreMenuId($this->aMenuRelatedByFkPadreMenuId);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MenuPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += MenuPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collMenusRelatedByFkPadreMenuId !== null) {
				foreach($this->collMenusRelatedByFkPadreMenuId as $referrerFK) {
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

			if ($this->aMenuRelatedByFkPadreMenuId !== null) {
				if (!$this->aMenuRelatedByFkPadreMenuId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMenuRelatedByFkPadreMenuId->getValidationFailures());
				}
			}


			if (($retval = MenuPeer::doValidate($this, $columns)) !== true) {
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
		$pos = MenuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getLink();
				break;
			case 3:
				return $this->getPerm();
				break;
			case 4:
				return $this->getTarget();
				break;
			case 5:
				return $this->getFkPadreMenuId();
				break;
			case 6:
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
		$keys = MenuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getLink(),
			$keys[3] => $this->getPerm(),
			$keys[4] => $this->getTarget(),
			$keys[5] => $this->getFkPadreMenuId(),
			$keys[6] => $this->getOrden(),
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
		$pos = MenuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setLink($value);
				break;
			case 3:
				$this->setPerm($value);
				break;
			case 4:
				$this->setTarget($value);
				break;
			case 5:
				$this->setFkPadreMenuId($value);
				break;
			case 6:
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
		$keys = MenuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLink($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPerm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTarget($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFkPadreMenuId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setOrden($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(MenuPeer::DATABASE_NAME);

		if ($this->isColumnModified(MenuPeer::ID)) $criteria->add(MenuPeer::ID, $this->id);
		if ($this->isColumnModified(MenuPeer::NOMBRE)) $criteria->add(MenuPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(MenuPeer::LINK)) $criteria->add(MenuPeer::LINK, $this->link);
		if ($this->isColumnModified(MenuPeer::PERM)) $criteria->add(MenuPeer::PERM, $this->perm);
		if ($this->isColumnModified(MenuPeer::TARGET)) $criteria->add(MenuPeer::TARGET, $this->target);
		if ($this->isColumnModified(MenuPeer::FK_PADRE_MENU_ID)) $criteria->add(MenuPeer::FK_PADRE_MENU_ID, $this->fk_padre_menu_id);
		if ($this->isColumnModified(MenuPeer::ORDEN)) $criteria->add(MenuPeer::ORDEN, $this->orden);

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
		$criteria = new Criteria(MenuPeer::DATABASE_NAME);

		$criteria->add(MenuPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Menu (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNombre($this->nombre);

		$copyObj->setLink($this->link);

		$copyObj->setPerm($this->perm);

		$copyObj->setTarget($this->target);

		$copyObj->setFkPadreMenuId($this->fk_padre_menu_id);

		$copyObj->setOrden($this->orden);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getMenusRelatedByFkPadreMenuId() as $relObj) {
				if($this->getPrimaryKey() === $relObj->getPrimaryKey()) {
						continue;
				}

				$copyObj->addMenuRelatedByFkPadreMenuId($relObj->copy($deepCopy));
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
	 * @return Menu Clone of current object.
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
	 * @return MenuPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new MenuPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Menu object.
	 *
	 * @param Menu $v
	 * @return void
	 * @throws PropelException
	 */
	public function setMenuRelatedByFkPadreMenuId($v)
	{


		if ($v === null) {
			$this->setFkPadreMenuId(NULL);
		} else {
			$this->setFkPadreMenuId($v->getId());
		}


		$this->aMenuRelatedByFkPadreMenuId = $v;
	}


	/**
	 * Get the associated Menu object
	 *
	 * @param Connection Optional Connection object.
	 * @return Menu The associated Menu object.
	 * @throws PropelException
	 */
	public function getMenuRelatedByFkPadreMenuId($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseMenuPeer.php';

		if ($this->aMenuRelatedByFkPadreMenuId === null && ($this->fk_padre_menu_id !== null)) {

			$this->aMenuRelatedByFkPadreMenuId = MenuPeer::retrieveByPK($this->fk_padre_menu_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = MenuPeer::retrieveByPK($this->fk_padre_menu_id, $con);
			   $obj->addMenusRelatedByFkPadreMenuId($this);
			 */
		}
		return $this->aMenuRelatedByFkPadreMenuId;
	}

	/**
	 * Temporary storage of collMenusRelatedByFkPadreMenuId to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initMenusRelatedByFkPadreMenuId()
	{
		if ($this->collMenusRelatedByFkPadreMenuId === null) {
			$this->collMenusRelatedByFkPadreMenuId = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Menu has previously
	 * been saved, it will retrieve related MenusRelatedByFkPadreMenuId from storage.
	 * If this Menu is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getMenusRelatedByFkPadreMenuId($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseMenuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMenusRelatedByFkPadreMenuId === null) {
			if ($this->isNew()) {
			   $this->collMenusRelatedByFkPadreMenuId = array();
			} else {

				$criteria->add(MenuPeer::FK_PADRE_MENU_ID, $this->getId());

				MenuPeer::addSelectColumns($criteria);
				$this->collMenusRelatedByFkPadreMenuId = MenuPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(MenuPeer::FK_PADRE_MENU_ID, $this->getId());

				MenuPeer::addSelectColumns($criteria);
				if (!isset($this->lastMenuRelatedByFkPadreMenuIdCriteria) || !$this->lastMenuRelatedByFkPadreMenuIdCriteria->equals($criteria)) {
					$this->collMenusRelatedByFkPadreMenuId = MenuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMenuRelatedByFkPadreMenuIdCriteria = $criteria;
		return $this->collMenusRelatedByFkPadreMenuId;
	}

	/**
	 * Returns the number of related MenusRelatedByFkPadreMenuId.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countMenusRelatedByFkPadreMenuId($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseMenuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MenuPeer::FK_PADRE_MENU_ID, $this->getId());

		return MenuPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Menu object to this object
	 * through the Menu foreign key attribute
	 *
	 * @param Menu $l Menu
	 * @return void
	 * @throws PropelException
	 */
	public function addMenuRelatedByFkPadreMenuId(Menu $l)
	{
		$this->collMenusRelatedByFkPadreMenuId[] = $l;
		$l->setMenuRelatedByFkPadreMenuId($this);
	}

} // BaseMenu
