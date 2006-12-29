<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/CuentaPeer.php';

/**
 * Base class that represents a row from the 'cuenta' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseCuenta extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var CuentaPeer
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
	 * The value for the razon_social field.
	 * @var string
	 */
	protected $razon_social = '';


	/**
	 * The value for the cuit field.
	 * @var string
	 */
	protected $cuit = '';


	/**
	 * The value for the direccion field.
	 * @var string
	 */
	protected $direccion = '';


	/**
	 * The value for the ciudad field.
	 * @var string
	 */
	protected $ciudad = '';


	/**
	 * The value for the codigo_postal field.
	 * @var string
	 */
	protected $codigo_postal = '';


	/**
	 * The value for the telefono field.
	 * @var string
	 */
	protected $telefono = '';


	/**
	 * The value for the fk_provincia_id field.
	 * @var int
	 */
	protected $fk_provincia_id = 0;


	/**
	 * The value for the fk_tipoiva_id field.
	 * @var int
	 */
	protected $fk_tipoiva_id = 0;

	/**
	 * @var Tipoiva
	 */
	protected $aTipoiva;

	/**
	 * @var Provincia
	 */
	protected $aProvincia;

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
	 * Get the [razon_social] column value.
	 * 
	 * @return string
	 */
	public function getRazonSocial()
	{

		return $this->razon_social;
	}

	/**
	 * Get the [cuit] column value.
	 * 
	 * @return string
	 */
	public function getCuit()
	{

		return $this->cuit;
	}

	/**
	 * Get the [direccion] column value.
	 * 
	 * @return string
	 */
	public function getDireccion()
	{

		return $this->direccion;
	}

	/**
	 * Get the [ciudad] column value.
	 * 
	 * @return string
	 */
	public function getCiudad()
	{

		return $this->ciudad;
	}

	/**
	 * Get the [codigo_postal] column value.
	 * 
	 * @return string
	 */
	public function getCodigoPostal()
	{

		return $this->codigo_postal;
	}

	/**
	 * Get the [telefono] column value.
	 * 
	 * @return string
	 */
	public function getTelefono()
	{

		return $this->telefono;
	}

	/**
	 * Get the [fk_provincia_id] column value.
	 * 
	 * @return int
	 */
	public function getFkProvinciaId()
	{

		return $this->fk_provincia_id;
	}

	/**
	 * Get the [fk_tipoiva_id] column value.
	 * 
	 * @return int
	 */
	public function getFkTipoivaId()
	{

		return $this->fk_tipoiva_id;
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
			$this->modifiedColumns[] = CuentaPeer::ID;
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
			$this->modifiedColumns[] = CuentaPeer::NOMBRE;
		}

	} // setNombre()

	/**
	 * Set the value of [razon_social] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setRazonSocial($v)
	{

		if ($this->razon_social !== $v || $v === '') {
			$this->razon_social = $v;
			$this->modifiedColumns[] = CuentaPeer::RAZON_SOCIAL;
		}

	} // setRazonSocial()

	/**
	 * Set the value of [cuit] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setCuit($v)
	{

		if ($this->cuit !== $v || $v === '') {
			$this->cuit = $v;
			$this->modifiedColumns[] = CuentaPeer::CUIT;
		}

	} // setCuit()

	/**
	 * Set the value of [direccion] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setDireccion($v)
	{

		if ($this->direccion !== $v || $v === '') {
			$this->direccion = $v;
			$this->modifiedColumns[] = CuentaPeer::DIRECCION;
		}

	} // setDireccion()

	/**
	 * Set the value of [ciudad] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setCiudad($v)
	{

		if ($this->ciudad !== $v || $v === '') {
			$this->ciudad = $v;
			$this->modifiedColumns[] = CuentaPeer::CIUDAD;
		}

	} // setCiudad()

	/**
	 * Set the value of [codigo_postal] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setCodigoPostal($v)
	{

		if ($this->codigo_postal !== $v || $v === '') {
			$this->codigo_postal = $v;
			$this->modifiedColumns[] = CuentaPeer::CODIGO_POSTAL;
		}

	} // setCodigoPostal()

	/**
	 * Set the value of [telefono] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setTelefono($v)
	{

		if ($this->telefono !== $v || $v === '') {
			$this->telefono = $v;
			$this->modifiedColumns[] = CuentaPeer::TELEFONO;
		}

	} // setTelefono()

	/**
	 * Set the value of [fk_provincia_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkProvinciaId($v)
	{

		if ($this->fk_provincia_id !== $v || $v === 0) {
			$this->fk_provincia_id = $v;
			$this->modifiedColumns[] = CuentaPeer::FK_PROVINCIA_ID;
		}

		if ($this->aProvincia !== null && $this->aProvincia->getId() !== $v) {
			$this->aProvincia = null;
		}

	} // setFkProvinciaId()

	/**
	 * Set the value of [fk_tipoiva_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkTipoivaId($v)
	{

		if ($this->fk_tipoiva_id !== $v || $v === 0) {
			$this->fk_tipoiva_id = $v;
			$this->modifiedColumns[] = CuentaPeer::FK_TIPOIVA_ID;
		}

		if ($this->aTipoiva !== null && $this->aTipoiva->getId() !== $v) {
			$this->aTipoiva = null;
		}

	} // setFkTipoivaId()

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

			$this->razon_social = $rs->getString($startcol + 2);

			$this->cuit = $rs->getString($startcol + 3);

			$this->direccion = $rs->getString($startcol + 4);

			$this->ciudad = $rs->getString($startcol + 5);

			$this->codigo_postal = $rs->getString($startcol + 6);

			$this->telefono = $rs->getString($startcol + 7);

			$this->fk_provincia_id = $rs->getInt($startcol + 8);

			$this->fk_tipoiva_id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 10; // 10 = CuentaPeer::NUM_COLUMNS - CuentaPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Cuenta object", $e);
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
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CuentaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CuentaPeer::DATABASE_NAME);
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

			if ($this->aTipoiva !== null) {
				if ($this->aTipoiva->isModified()) {
					$affectedRows += $this->aTipoiva->save($con);
				}
				$this->setTipoiva($this->aTipoiva);
			}

			if ($this->aProvincia !== null) {
				if ($this->aProvincia->isModified()) {
					$affectedRows += $this->aProvincia->save($con);
				}
				$this->setProvincia($this->aProvincia);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CuentaPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += CuentaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
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

			if ($this->aTipoiva !== null) {
				if (!$this->aTipoiva->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipoiva->getValidationFailures());
				}
			}

			if ($this->aProvincia !== null) {
				if (!$this->aProvincia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProvincia->getValidationFailures());
				}
			}


			if (($retval = CuentaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = CuentaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getRazonSocial();
				break;
			case 3:
				return $this->getCuit();
				break;
			case 4:
				return $this->getDireccion();
				break;
			case 5:
				return $this->getCiudad();
				break;
			case 6:
				return $this->getCodigoPostal();
				break;
			case 7:
				return $this->getTelefono();
				break;
			case 8:
				return $this->getFkProvinciaId();
				break;
			case 9:
				return $this->getFkTipoivaId();
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
		$keys = CuentaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getRazonSocial(),
			$keys[3] => $this->getCuit(),
			$keys[4] => $this->getDireccion(),
			$keys[5] => $this->getCiudad(),
			$keys[6] => $this->getCodigoPostal(),
			$keys[7] => $this->getTelefono(),
			$keys[8] => $this->getFkProvinciaId(),
			$keys[9] => $this->getFkTipoivaId(),
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
		$pos = CuentaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setRazonSocial($value);
				break;
			case 3:
				$this->setCuit($value);
				break;
			case 4:
				$this->setDireccion($value);
				break;
			case 5:
				$this->setCiudad($value);
				break;
			case 6:
				$this->setCodigoPostal($value);
				break;
			case 7:
				$this->setTelefono($value);
				break;
			case 8:
				$this->setFkProvinciaId($value);
				break;
			case 9:
				$this->setFkTipoivaId($value);
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
		$keys = CuentaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRazonSocial($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCuit($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDireccion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCiudad($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodigoPostal($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTelefono($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFkProvinciaId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFkTipoivaId($arr[$keys[9]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(CuentaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CuentaPeer::ID)) $criteria->add(CuentaPeer::ID, $this->id);
		if ($this->isColumnModified(CuentaPeer::NOMBRE)) $criteria->add(CuentaPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(CuentaPeer::RAZON_SOCIAL)) $criteria->add(CuentaPeer::RAZON_SOCIAL, $this->razon_social);
		if ($this->isColumnModified(CuentaPeer::CUIT)) $criteria->add(CuentaPeer::CUIT, $this->cuit);
		if ($this->isColumnModified(CuentaPeer::DIRECCION)) $criteria->add(CuentaPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(CuentaPeer::CIUDAD)) $criteria->add(CuentaPeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(CuentaPeer::CODIGO_POSTAL)) $criteria->add(CuentaPeer::CODIGO_POSTAL, $this->codigo_postal);
		if ($this->isColumnModified(CuentaPeer::TELEFONO)) $criteria->add(CuentaPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(CuentaPeer::FK_PROVINCIA_ID)) $criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->fk_provincia_id);
		if ($this->isColumnModified(CuentaPeer::FK_TIPOIVA_ID)) $criteria->add(CuentaPeer::FK_TIPOIVA_ID, $this->fk_tipoiva_id);

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
		$criteria = new Criteria(CuentaPeer::DATABASE_NAME);

		$criteria->add(CuentaPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Cuenta (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNombre($this->nombre);

		$copyObj->setRazonSocial($this->razon_social);

		$copyObj->setCuit($this->cuit);

		$copyObj->setDireccion($this->direccion);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCodigoPostal($this->codigo_postal);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setFkProvinciaId($this->fk_provincia_id);

		$copyObj->setFkTipoivaId($this->fk_tipoiva_id);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getAlumnos() as $relObj) {
				$copyObj->addAlumno($relObj->copy($deepCopy));
			}

			foreach($this->getResponsables() as $relObj) {
				$copyObj->addResponsable($relObj->copy($deepCopy));
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
	 * @return Cuenta Clone of current object.
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
	 * @return CuentaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CuentaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Tipoiva object.
	 *
	 * @param Tipoiva $v
	 * @return void
	 * @throws PropelException
	 */
	public function setTipoiva($v)
	{


		if ($v === null) {
			$this->setFkTipoivaId('0');
		} else {
			$this->setFkTipoivaId($v->getId());
		}


		$this->aTipoiva = $v;
	}


	/**
	 * Get the associated Tipoiva object
	 *
	 * @param Connection Optional Connection object.
	 * @return Tipoiva The associated Tipoiva object.
	 * @throws PropelException
	 */
	public function getTipoiva($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseTipoivaPeer.php';

		if ($this->aTipoiva === null && ($this->fk_tipoiva_id !== null)) {

			$this->aTipoiva = TipoivaPeer::retrieveByPK($this->fk_tipoiva_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = TipoivaPeer::retrieveByPK($this->fk_tipoiva_id, $con);
			   $obj->addTipoivas($this);
			 */
		}
		return $this->aTipoiva;
	}

	/**
	 * Declares an association between this object and a Provincia object.
	 *
	 * @param Provincia $v
	 * @return void
	 * @throws PropelException
	 */
	public function setProvincia($v)
	{


		if ($v === null) {
			$this->setFkProvinciaId('0');
		} else {
			$this->setFkProvinciaId($v->getId());
		}


		$this->aProvincia = $v;
	}


	/**
	 * Get the associated Provincia object
	 *
	 * @param Connection Optional Connection object.
	 * @return Provincia The associated Provincia object.
	 * @throws PropelException
	 */
	public function getProvincia($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseProvinciaPeer.php';

		if ($this->aProvincia === null && ($this->fk_provincia_id !== null)) {

			$this->aProvincia = ProvinciaPeer::retrieveByPK($this->fk_provincia_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = ProvinciaPeer::retrieveByPK($this->fk_provincia_id, $con);
			   $obj->addProvincias($this);
			 */
		}
		return $this->aProvincia;
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
	 * Otherwise if this Cuenta has previously
	 * been saved, it will retrieve related Alumnos from storage.
	 * If this Cuenta is new, it will return
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

				$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

				AlumnoPeer::addSelectColumns($criteria);
				$this->collAlumnos = AlumnoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

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

		$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

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
		$l->setCuenta($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cuenta is new, it will return
	 * an empty collection; or if this Cuenta has previously
	 * been saved, it will retrieve related Alumnos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cuenta.
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

				$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinTipodocumento($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

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
	 * Otherwise if this Cuenta is new, it will return
	 * an empty collection; or if this Cuenta has previously
	 * been saved, it will retrieve related Alumnos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cuenta.
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

				$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

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
	 * Otherwise if this Cuenta is new, it will return
	 * an empty collection; or if this Cuenta has previously
	 * been saved, it will retrieve related Alumnos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cuenta.
	 */
	public function getAlumnosJoinProvincia($criteria = null, $con = null)
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

				$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinProvincia($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinProvincia($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cuenta is new, it will return
	 * an empty collection; or if this Cuenta has previously
	 * been saved, it will retrieve related Alumnos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cuenta.
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

				$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinConceptobaja($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AlumnoPeer::FK_CUENTA_ID, $this->getId());

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
	 * Otherwise if this Cuenta has previously
	 * been saved, it will retrieve related Responsables from storage.
	 * If this Cuenta is new, it will return
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

				$criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getId());

				ResponsablePeer::addSelectColumns($criteria);
				$this->collResponsables = ResponsablePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getId());

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

		$criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getId());

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
		$l->setCuenta($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cuenta is new, it will return
	 * an empty collection; or if this Cuenta has previously
	 * been saved, it will retrieve related Responsables from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cuenta.
	 */
	public function getResponsablesJoinProvincia($criteria = null, $con = null)
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

				$criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getId());

				$this->collResponsables = ResponsablePeer::doSelectJoinProvincia($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getId());

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinProvincia($criteria, $con);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cuenta is new, it will return
	 * an empty collection; or if this Cuenta has previously
	 * been saved, it will retrieve related Responsables from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cuenta.
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

				$criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getId());

				$this->collResponsables = ResponsablePeer::doSelectJoinTipodocumento($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->getId());

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinTipodocumento($criteria, $con);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}

} // BaseCuenta
