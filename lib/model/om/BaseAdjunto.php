<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/AdjuntoPeer.php';

/**
 * Base class that represents a row from the 'adjunto' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseAdjunto extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var AdjuntoPeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var int
	 */
	protected $id;


	/**
	 * The value for the descripcion field.
	 * @var string
	 */
	protected $descripcion;


	/**
	 * The value for the titulo field.
	 * @var string
	 */
	protected $titulo;


	/**
	 * The value for the nombre_archivo field.
	 * @var string
	 */
	protected $nombre_archivo;


	/**
	 * The value for the tipo_archivo field.
	 * @var string
	 */
	protected $tipo_archivo;


	/**
	 * The value for the ruta field.
	 * @var string
	 */
	protected $ruta;


	/**
	 * The value for the fecha field.
	 * @var int
	 */
	protected $fecha;

	/**
	 * Collection to store aggregation of collLegajoadjuntos.
	 * @var array
	 */
	protected $collLegajoadjuntos;

	/**
	 * The criteria used to select the current contents of collLegajoadjuntos.
	 * @var Criteria
	 */
	protected $lastLegajoadjuntoCriteria = null;

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
	 * Get the [descripcion] column value.
	 * 
	 * @return string
	 */
	public function getDescripcion()
	{

		return $this->descripcion;
	}

	/**
	 * Get the [titulo] column value.
	 * 
	 * @return string
	 */
	public function getTitulo()
	{

		return $this->titulo;
	}

	/**
	 * Get the [nombre_archivo] column value.
	 * 
	 * @return string
	 */
	public function getNombreArchivo()
	{

		return $this->nombre_archivo;
	}

	/**
	 * Get the [tipo_archivo] column value.
	 * 
	 * @return string
	 */
	public function getTipoArchivo()
	{

		return $this->tipo_archivo;
	}

	/**
	 * Get the [ruta] column value.
	 * 
	 * @return string
	 */
	public function getRuta()
	{

		return $this->ruta;
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
			$this->modifiedColumns[] = AdjuntoPeer::ID;
		}

	} // setId()

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
			$this->modifiedColumns[] = AdjuntoPeer::DESCRIPCION;
		}

	} // setDescripcion()

	/**
	 * Set the value of [titulo] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setTitulo($v)
	{

		if ($this->titulo !== $v) {
			$this->titulo = $v;
			$this->modifiedColumns[] = AdjuntoPeer::TITULO;
		}

	} // setTitulo()

	/**
	 * Set the value of [nombre_archivo] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setNombreArchivo($v)
	{

		if ($this->nombre_archivo !== $v) {
			$this->nombre_archivo = $v;
			$this->modifiedColumns[] = AdjuntoPeer::NOMBRE_ARCHIVO;
		}

	} // setNombreArchivo()

	/**
	 * Set the value of [tipo_archivo] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setTipoArchivo($v)
	{

		if ($this->tipo_archivo !== $v) {
			$this->tipo_archivo = $v;
			$this->modifiedColumns[] = AdjuntoPeer::TIPO_ARCHIVO;
		}

	} // setTipoArchivo()

	/**
	 * Set the value of [ruta] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setRuta($v)
	{

		if ($this->ruta !== $v) {
			$this->ruta = $v;
			$this->modifiedColumns[] = AdjuntoPeer::RUTA;
		}

	} // setRuta()

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
			$this->modifiedColumns[] = AdjuntoPeer::FECHA;
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

			$this->descripcion = $rs->getString($startcol + 1);

			$this->titulo = $rs->getString($startcol + 2);

			$this->nombre_archivo = $rs->getString($startcol + 3);

			$this->tipo_archivo = $rs->getString($startcol + 4);

			$this->ruta = $rs->getString($startcol + 5);

			$this->fecha = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 7; // 7 = AdjuntoPeer::NUM_COLUMNS - AdjuntoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Adjunto object", $e);
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
			$con = Propel::getConnection(AdjuntoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AdjuntoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AdjuntoPeer::DATABASE_NAME);
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


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AdjuntoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += AdjuntoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collLegajoadjuntos !== null) {
				foreach($this->collLegajoadjuntos as $referrerFK) {
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


			if (($retval = AdjuntoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLegajoadjuntos !== null) {
					foreach($this->collLegajoadjuntos as $referrerFK) {
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
		$pos = AdjuntoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDescripcion();
				break;
			case 2:
				return $this->getTitulo();
				break;
			case 3:
				return $this->getNombreArchivo();
				break;
			case 4:
				return $this->getTipoArchivo();
				break;
			case 5:
				return $this->getRuta();
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
		$keys = AdjuntoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDescripcion(),
			$keys[2] => $this->getTitulo(),
			$keys[3] => $this->getNombreArchivo(),
			$keys[4] => $this->getTipoArchivo(),
			$keys[5] => $this->getRuta(),
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
		$pos = AdjuntoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDescripcion($value);
				break;
			case 2:
				$this->setTitulo($value);
				break;
			case 3:
				$this->setNombreArchivo($value);
				break;
			case 4:
				$this->setTipoArchivo($value);
				break;
			case 5:
				$this->setRuta($value);
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
		$keys = AdjuntoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescripcion($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitulo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNombreArchivo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipoArchivo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRuta($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecha($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AdjuntoPeer::DATABASE_NAME);

		if ($this->isColumnModified(AdjuntoPeer::ID)) $criteria->add(AdjuntoPeer::ID, $this->id);
		if ($this->isColumnModified(AdjuntoPeer::DESCRIPCION)) $criteria->add(AdjuntoPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(AdjuntoPeer::TITULO)) $criteria->add(AdjuntoPeer::TITULO, $this->titulo);
		if ($this->isColumnModified(AdjuntoPeer::NOMBRE_ARCHIVO)) $criteria->add(AdjuntoPeer::NOMBRE_ARCHIVO, $this->nombre_archivo);
		if ($this->isColumnModified(AdjuntoPeer::TIPO_ARCHIVO)) $criteria->add(AdjuntoPeer::TIPO_ARCHIVO, $this->tipo_archivo);
		if ($this->isColumnModified(AdjuntoPeer::RUTA)) $criteria->add(AdjuntoPeer::RUTA, $this->ruta);
		if ($this->isColumnModified(AdjuntoPeer::FECHA)) $criteria->add(AdjuntoPeer::FECHA, $this->fecha);

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
		$criteria = new Criteria(AdjuntoPeer::DATABASE_NAME);

		$criteria->add(AdjuntoPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Adjunto (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setTitulo($this->titulo);

		$copyObj->setNombreArchivo($this->nombre_archivo);

		$copyObj->setTipoArchivo($this->tipo_archivo);

		$copyObj->setRuta($this->ruta);

		$copyObj->setFecha($this->fecha);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getLegajoadjuntos() as $relObj) {
				$copyObj->addLegajoadjunto($relObj->copy($deepCopy));
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
	 * @return Adjunto Clone of current object.
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
	 * @return AdjuntoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AdjuntoPeer();
		}
		return self::$peer;
	}

	/**
	 * Temporary storage of collLegajoadjuntos to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initLegajoadjuntos()
	{
		if ($this->collLegajoadjuntos === null) {
			$this->collLegajoadjuntos = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Adjunto has previously
	 * been saved, it will retrieve related Legajoadjuntos from storage.
	 * If this Adjunto is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getLegajoadjuntos($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseLegajoadjuntoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajoadjuntos === null) {
			if ($this->isNew()) {
			   $this->collLegajoadjuntos = array();
			} else {

				$criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->getId());

				LegajoadjuntoPeer::addSelectColumns($criteria);
				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->getId());

				LegajoadjuntoPeer::addSelectColumns($criteria);
				if (!isset($this->lastLegajoadjuntoCriteria) || !$this->lastLegajoadjuntoCriteria->equals($criteria)) {
					$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLegajoadjuntoCriteria = $criteria;
		return $this->collLegajoadjuntos;
	}

	/**
	 * Returns the number of related Legajoadjuntos.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countLegajoadjuntos($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseLegajoadjuntoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->getId());

		return LegajoadjuntoPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Legajoadjunto object to this object
	 * through the Legajoadjunto foreign key attribute
	 *
	 * @param Legajoadjunto $l Legajoadjunto
	 * @return void
	 * @throws PropelException
	 */
	public function addLegajoadjunto(Legajoadjunto $l)
	{
		$this->collLegajoadjuntos[] = $l;
		$l->setAdjunto($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Adjunto is new, it will return
	 * an empty collection; or if this Adjunto has previously
	 * been saved, it will retrieve related Legajoadjuntos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Adjunto.
	 */
	public function getLegajoadjuntosJoinLegajopedagogico($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseLegajoadjuntoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajoadjuntos === null) {
			if ($this->isNew()) {
				$this->collLegajoadjuntos = array();
			} else {

				$criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->getId());

				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelectJoinLegajopedagogico($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->getId());

			if (!isset($this->lastLegajoadjuntoCriteria) || !$this->lastLegajoadjuntoCriteria->equals($criteria)) {
				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelectJoinLegajopedagogico($criteria, $con);
			}
		}
		$this->lastLegajoadjuntoCriteria = $criteria;

		return $this->collLegajoadjuntos;
	}

} // BaseAdjunto
