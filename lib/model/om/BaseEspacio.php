<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/EspacioPeer.php';

/**
 * Base class that represents a row from the 'espacio' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseEspacio extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var EspacioPeer
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
	 * The value for the m2 field.
	 * @var double
	 */
	protected $m2;


	/**
	 * The value for the capacidad field.
	 * @var string
	 */
	protected $capacidad;


	/**
	 * The value for the descripcion field.
	 * @var string
	 */
	protected $descripcion;


	/**
	 * The value for the estado field.
	 * @var string
	 */
	protected $estado;


	/**
	 * The value for the fk_tipoespacio_id field.
	 * @var int
	 */
	protected $fk_tipoespacio_id;


	/**
	 * The value for the fk_locacion_id field.
	 * @var int
	 */
	protected $fk_locacion_id = 0;

	/**
	 * @var Tipoespacio
	 */
	protected $aTipoespacio;

	/**
	 * @var Locacion
	 */
	protected $aLocacion;

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
	 * Get the [m2] column value.
	 * 
	 * @return double
	 */
	public function getM2()
	{

		return $this->m2;
	}

	/**
	 * Get the [capacidad] column value.
	 * 
	 * @return string
	 */
	public function getCapacidad()
	{

		return $this->capacidad;
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
	 * Get the [estado] column value.
	 * 
	 * @return string
	 */
	public function getEstado()
	{

		return $this->estado;
	}

	/**
	 * Get the [fk_tipoespacio_id] column value.
	 * 
	 * @return int
	 */
	public function getFkTipoespacioId()
	{

		return $this->fk_tipoespacio_id;
	}

	/**
	 * Get the [fk_locacion_id] column value.
	 * 
	 * @return int
	 */
	public function getFkLocacionId()
	{

		return $this->fk_locacion_id;
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
			$this->modifiedColumns[] = EspacioPeer::ID;
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
			$this->modifiedColumns[] = EspacioPeer::NOMBRE;
		}

	} // setNombre()

	/**
	 * Set the value of [m2] column.
	 * 
	 * @param double $v new value
	 * @return void
	 */
	public function setM2($v)
	{

		if ($this->m2 !== $v) {
			$this->m2 = $v;
			$this->modifiedColumns[] = EspacioPeer::M2;
		}

	} // setM2()

	/**
	 * Set the value of [capacidad] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setCapacidad($v)
	{

		if ($this->capacidad !== $v) {
			$this->capacidad = $v;
			$this->modifiedColumns[] = EspacioPeer::CAPACIDAD;
		}

	} // setCapacidad()

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
			$this->modifiedColumns[] = EspacioPeer::DESCRIPCION;
		}

	} // setDescripcion()

	/**
	 * Set the value of [estado] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setEstado($v)
	{

		if ($this->estado !== $v) {
			$this->estado = $v;
			$this->modifiedColumns[] = EspacioPeer::ESTADO;
		}

	} // setEstado()

	/**
	 * Set the value of [fk_tipoespacio_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkTipoespacioId($v)
	{

		if ($this->fk_tipoespacio_id !== $v) {
			$this->fk_tipoespacio_id = $v;
			$this->modifiedColumns[] = EspacioPeer::FK_TIPOESPACIO_ID;
		}

		if ($this->aTipoespacio !== null && $this->aTipoespacio->getId() !== $v) {
			$this->aTipoespacio = null;
		}

	} // setFkTipoespacioId()

	/**
	 * Set the value of [fk_locacion_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkLocacionId($v)
	{

		if ($this->fk_locacion_id !== $v || $v === 0) {
			$this->fk_locacion_id = $v;
			$this->modifiedColumns[] = EspacioPeer::FK_LOCACION_ID;
		}

		if ($this->aLocacion !== null && $this->aLocacion->getId() !== $v) {
			$this->aLocacion = null;
		}

	} // setFkLocacionId()

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

			$this->m2 = $rs->getFloat($startcol + 2);

			$this->capacidad = $rs->getString($startcol + 3);

			$this->descripcion = $rs->getString($startcol + 4);

			$this->estado = $rs->getString($startcol + 5);

			$this->fk_tipoespacio_id = $rs->getInt($startcol + 6);

			$this->fk_locacion_id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 8; // 8 = EspacioPeer::NUM_COLUMNS - EspacioPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Espacio object", $e);
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
			$con = Propel::getConnection(EspacioPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EspacioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EspacioPeer::DATABASE_NAME);
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

			if ($this->aTipoespacio !== null) {
				if ($this->aTipoespacio->isModified()) {
					$affectedRows += $this->aTipoespacio->save($con);
				}
				$this->setTipoespacio($this->aTipoespacio);
			}

			if ($this->aLocacion !== null) {
				if ($this->aLocacion->isModified()) {
					$affectedRows += $this->aLocacion->save($con);
				}
				$this->setLocacion($this->aLocacion);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EspacioPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += EspacioPeer::doUpdate($this, $con);
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

			if ($this->aTipoespacio !== null) {
				if (!$this->aTipoespacio->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipoespacio->getValidationFailures());
				}
			}

			if ($this->aLocacion !== null) {
				if (!$this->aLocacion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLocacion->getValidationFailures());
				}
			}


			if (($retval = EspacioPeer::doValidate($this, $columns)) !== true) {
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
		$pos = EspacioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getM2();
				break;
			case 3:
				return $this->getCapacidad();
				break;
			case 4:
				return $this->getDescripcion();
				break;
			case 5:
				return $this->getEstado();
				break;
			case 6:
				return $this->getFkTipoespacioId();
				break;
			case 7:
				return $this->getFkLocacionId();
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
		$keys = EspacioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getM2(),
			$keys[3] => $this->getCapacidad(),
			$keys[4] => $this->getDescripcion(),
			$keys[5] => $this->getEstado(),
			$keys[6] => $this->getFkTipoespacioId(),
			$keys[7] => $this->getFkLocacionId(),
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
		$pos = EspacioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setM2($value);
				break;
			case 3:
				$this->setCapacidad($value);
				break;
			case 4:
				$this->setDescripcion($value);
				break;
			case 5:
				$this->setEstado($value);
				break;
			case 6:
				$this->setFkTipoespacioId($value);
				break;
			case 7:
				$this->setFkLocacionId($value);
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
		$keys = EspacioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setM2($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCapacidad($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescripcion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEstado($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFkTipoespacioId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFkLocacionId($arr[$keys[7]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(EspacioPeer::DATABASE_NAME);

		if ($this->isColumnModified(EspacioPeer::ID)) $criteria->add(EspacioPeer::ID, $this->id);
		if ($this->isColumnModified(EspacioPeer::NOMBRE)) $criteria->add(EspacioPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(EspacioPeer::M2)) $criteria->add(EspacioPeer::M2, $this->m2);
		if ($this->isColumnModified(EspacioPeer::CAPACIDAD)) $criteria->add(EspacioPeer::CAPACIDAD, $this->capacidad);
		if ($this->isColumnModified(EspacioPeer::DESCRIPCION)) $criteria->add(EspacioPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(EspacioPeer::ESTADO)) $criteria->add(EspacioPeer::ESTADO, $this->estado);
		if ($this->isColumnModified(EspacioPeer::FK_TIPOESPACIO_ID)) $criteria->add(EspacioPeer::FK_TIPOESPACIO_ID, $this->fk_tipoespacio_id);
		if ($this->isColumnModified(EspacioPeer::FK_LOCACION_ID)) $criteria->add(EspacioPeer::FK_LOCACION_ID, $this->fk_locacion_id);

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
		$criteria = new Criteria(EspacioPeer::DATABASE_NAME);

		$criteria->add(EspacioPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Espacio (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNombre($this->nombre);

		$copyObj->setM2($this->m2);

		$copyObj->setCapacidad($this->capacidad);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setEstado($this->estado);

		$copyObj->setFkTipoespacioId($this->fk_tipoespacio_id);

		$copyObj->setFkLocacionId($this->fk_locacion_id);


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
	 * @return Espacio Clone of current object.
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
	 * @return EspacioPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new EspacioPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Tipoespacio object.
	 *
	 * @param Tipoespacio $v
	 * @return void
	 * @throws PropelException
	 */
	public function setTipoespacio($v)
	{


		if ($v === null) {
			$this->setFkTipoespacioId(NULL);
		} else {
			$this->setFkTipoespacioId($v->getId());
		}


		$this->aTipoespacio = $v;
	}


	/**
	 * Get the associated Tipoespacio object
	 *
	 * @param Connection Optional Connection object.
	 * @return Tipoespacio The associated Tipoespacio object.
	 * @throws PropelException
	 */
	public function getTipoespacio($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseTipoespacioPeer.php';

		if ($this->aTipoespacio === null && ($this->fk_tipoespacio_id !== null)) {

			$this->aTipoespacio = TipoespacioPeer::retrieveByPK($this->fk_tipoespacio_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = TipoespacioPeer::retrieveByPK($this->fk_tipoespacio_id, $con);
			   $obj->addTipoespacios($this);
			 */
		}
		return $this->aTipoespacio;
	}

	/**
	 * Declares an association between this object and a Locacion object.
	 *
	 * @param Locacion $v
	 * @return void
	 * @throws PropelException
	 */
	public function setLocacion($v)
	{


		if ($v === null) {
			$this->setFkLocacionId('0');
		} else {
			$this->setFkLocacionId($v->getId());
		}


		$this->aLocacion = $v;
	}


	/**
	 * Get the associated Locacion object
	 *
	 * @param Connection Optional Connection object.
	 * @return Locacion The associated Locacion object.
	 * @throws PropelException
	 */
	public function getLocacion($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseLocacionPeer.php';

		if ($this->aLocacion === null && ($this->fk_locacion_id !== null)) {

			$this->aLocacion = LocacionPeer::retrieveByPK($this->fk_locacion_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = LocacionPeer::retrieveByPK($this->fk_locacion_id, $con);
			   $obj->addLocacions($this);
			 */
		}
		return $this->aLocacion;
	}

} // BaseEspacio
