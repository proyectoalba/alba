<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/LocacionPeer.php';

/**
 * Base class that represents a row from the 'locacion' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseLocacion extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var LocacionPeer
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
	 * The value for the fk_provincia_id field.
	 * @var int
	 */
	protected $fk_provincia_id = 0;


	/**
	 * The value for the fk_tipolocacion_id field.
	 * @var int
	 */
	protected $fk_tipolocacion_id = 0;


	/**
	 * The value for the telefono field.
	 * @var string
	 */
	protected $telefono;


	/**
	 * The value for the fax field.
	 * @var string
	 */
	protected $fax;


	/**
	 * The value for the encargado field.
	 * @var string
	 */
	protected $encargado;


	/**
	 * The value for the encargado_telefono field.
	 * @var string
	 */
	protected $encargado_telefono;

	/**
	 * @var Provincia
	 */
	protected $aProvincia;

	/**
	 * @var Tipolocacion
	 */
	protected $aTipolocacion;

	/**
	 * Collection to store aggregation of collEspacios.
	 * @var array
	 */
	protected $collEspacios;

	/**
	 * The criteria used to select the current contents of collEspacios.
	 * @var Criteria
	 */
	protected $lastEspacioCriteria = null;

	/**
	 * Collection to store aggregation of collRelEstablecimientoLocacions.
	 * @var array
	 */
	protected $collRelEstablecimientoLocacions;

	/**
	 * The criteria used to select the current contents of collRelEstablecimientoLocacions.
	 * @var Criteria
	 */
	protected $lastRelEstablecimientoLocacionCriteria = null;

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
	 * Get the [fk_provincia_id] column value.
	 * 
	 * @return int
	 */
	public function getFkProvinciaId()
	{

		return $this->fk_provincia_id;
	}

	/**
	 * Get the [fk_tipolocacion_id] column value.
	 * 
	 * @return int
	 */
	public function getFkTipolocacionId()
	{

		return $this->fk_tipolocacion_id;
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
	 * Get the [fax] column value.
	 * 
	 * @return string
	 */
	public function getFax()
	{

		return $this->fax;
	}

	/**
	 * Get the [encargado] column value.
	 * 
	 * @return string
	 */
	public function getEncargado()
	{

		return $this->encargado;
	}

	/**
	 * Get the [encargado_telefono] column value.
	 * 
	 * @return string
	 */
	public function getEncargadoTelefono()
	{

		return $this->encargado_telefono;
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
			$this->modifiedColumns[] = LocacionPeer::ID;
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
			$this->modifiedColumns[] = LocacionPeer::NOMBRE;
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
			$this->modifiedColumns[] = LocacionPeer::DESCRIPCION;
		}

	} // setDescripcion()

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
			$this->modifiedColumns[] = LocacionPeer::DIRECCION;
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
			$this->modifiedColumns[] = LocacionPeer::CIUDAD;
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
			$this->modifiedColumns[] = LocacionPeer::CODIGO_POSTAL;
		}

	} // setCodigoPostal()

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
			$this->modifiedColumns[] = LocacionPeer::FK_PROVINCIA_ID;
		}

		if ($this->aProvincia !== null && $this->aProvincia->getId() !== $v) {
			$this->aProvincia = null;
		}

	} // setFkProvinciaId()

	/**
	 * Set the value of [fk_tipolocacion_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkTipolocacionId($v)
	{

		if ($this->fk_tipolocacion_id !== $v || $v === 0) {
			$this->fk_tipolocacion_id = $v;
			$this->modifiedColumns[] = LocacionPeer::FK_TIPOLOCACION_ID;
		}

		if ($this->aTipolocacion !== null && $this->aTipolocacion->getId() !== $v) {
			$this->aTipolocacion = null;
		}

	} // setFkTipolocacionId()

	/**
	 * Set the value of [telefono] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setTelefono($v)
	{

		if ($this->telefono !== $v) {
			$this->telefono = $v;
			$this->modifiedColumns[] = LocacionPeer::TELEFONO;
		}

	} // setTelefono()

	/**
	 * Set the value of [fax] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setFax($v)
	{

		if ($this->fax !== $v) {
			$this->fax = $v;
			$this->modifiedColumns[] = LocacionPeer::FAX;
		}

	} // setFax()

	/**
	 * Set the value of [encargado] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setEncargado($v)
	{

		if ($this->encargado !== $v) {
			$this->encargado = $v;
			$this->modifiedColumns[] = LocacionPeer::ENCARGADO;
		}

	} // setEncargado()

	/**
	 * Set the value of [encargado_telefono] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setEncargadoTelefono($v)
	{

		if ($this->encargado_telefono !== $v) {
			$this->encargado_telefono = $v;
			$this->modifiedColumns[] = LocacionPeer::ENCARGADO_TELEFONO;
		}

	} // setEncargadoTelefono()

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

			$this->direccion = $rs->getString($startcol + 3);

			$this->ciudad = $rs->getString($startcol + 4);

			$this->codigo_postal = $rs->getString($startcol + 5);

			$this->fk_provincia_id = $rs->getInt($startcol + 6);

			$this->fk_tipolocacion_id = $rs->getInt($startcol + 7);

			$this->telefono = $rs->getString($startcol + 8);

			$this->fax = $rs->getString($startcol + 9);

			$this->encargado = $rs->getString($startcol + 10);

			$this->encargado_telefono = $rs->getString($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 12; // 12 = LocacionPeer::NUM_COLUMNS - LocacionPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Locacion object", $e);
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
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LocacionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LocacionPeer::DATABASE_NAME);
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

			if ($this->aProvincia !== null) {
				if ($this->aProvincia->isModified()) {
					$affectedRows += $this->aProvincia->save($con);
				}
				$this->setProvincia($this->aProvincia);
			}

			if ($this->aTipolocacion !== null) {
				if ($this->aTipolocacion->isModified()) {
					$affectedRows += $this->aTipolocacion->save($con);
				}
				$this->setTipolocacion($this->aTipolocacion);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LocacionPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += LocacionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collEspacios !== null) {
				foreach($this->collEspacios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelEstablecimientoLocacions !== null) {
				foreach($this->collRelEstablecimientoLocacions as $referrerFK) {
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

			if ($this->aProvincia !== null) {
				if (!$this->aProvincia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProvincia->getValidationFailures());
				}
			}

			if ($this->aTipolocacion !== null) {
				if (!$this->aTipolocacion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipolocacion->getValidationFailures());
				}
			}


			if (($retval = LocacionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEspacios !== null) {
					foreach($this->collEspacios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelEstablecimientoLocacions !== null) {
					foreach($this->collRelEstablecimientoLocacions as $referrerFK) {
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
		$pos = LocacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDireccion();
				break;
			case 4:
				return $this->getCiudad();
				break;
			case 5:
				return $this->getCodigoPostal();
				break;
			case 6:
				return $this->getFkProvinciaId();
				break;
			case 7:
				return $this->getFkTipolocacionId();
				break;
			case 8:
				return $this->getTelefono();
				break;
			case 9:
				return $this->getFax();
				break;
			case 10:
				return $this->getEncargado();
				break;
			case 11:
				return $this->getEncargadoTelefono();
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
		$keys = LocacionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getDireccion(),
			$keys[4] => $this->getCiudad(),
			$keys[5] => $this->getCodigoPostal(),
			$keys[6] => $this->getFkProvinciaId(),
			$keys[7] => $this->getFkTipolocacionId(),
			$keys[8] => $this->getTelefono(),
			$keys[9] => $this->getFax(),
			$keys[10] => $this->getEncargado(),
			$keys[11] => $this->getEncargadoTelefono(),
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
		$pos = LocacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDireccion($value);
				break;
			case 4:
				$this->setCiudad($value);
				break;
			case 5:
				$this->setCodigoPostal($value);
				break;
			case 6:
				$this->setFkProvinciaId($value);
				break;
			case 7:
				$this->setFkTipolocacionId($value);
				break;
			case 8:
				$this->setTelefono($value);
				break;
			case 9:
				$this->setFax($value);
				break;
			case 10:
				$this->setEncargado($value);
				break;
			case 11:
				$this->setEncargadoTelefono($value);
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
		$keys = LocacionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDireccion($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCiudad($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodigoPostal($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFkProvinciaId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFkTipolocacionId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTelefono($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFax($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEncargado($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setEncargadoTelefono($arr[$keys[11]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(LocacionPeer::DATABASE_NAME);

		if ($this->isColumnModified(LocacionPeer::ID)) $criteria->add(LocacionPeer::ID, $this->id);
		if ($this->isColumnModified(LocacionPeer::NOMBRE)) $criteria->add(LocacionPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(LocacionPeer::DESCRIPCION)) $criteria->add(LocacionPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(LocacionPeer::DIRECCION)) $criteria->add(LocacionPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(LocacionPeer::CIUDAD)) $criteria->add(LocacionPeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(LocacionPeer::CODIGO_POSTAL)) $criteria->add(LocacionPeer::CODIGO_POSTAL, $this->codigo_postal);
		if ($this->isColumnModified(LocacionPeer::FK_PROVINCIA_ID)) $criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->fk_provincia_id);
		if ($this->isColumnModified(LocacionPeer::FK_TIPOLOCACION_ID)) $criteria->add(LocacionPeer::FK_TIPOLOCACION_ID, $this->fk_tipolocacion_id);
		if ($this->isColumnModified(LocacionPeer::TELEFONO)) $criteria->add(LocacionPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(LocacionPeer::FAX)) $criteria->add(LocacionPeer::FAX, $this->fax);
		if ($this->isColumnModified(LocacionPeer::ENCARGADO)) $criteria->add(LocacionPeer::ENCARGADO, $this->encargado);
		if ($this->isColumnModified(LocacionPeer::ENCARGADO_TELEFONO)) $criteria->add(LocacionPeer::ENCARGADO_TELEFONO, $this->encargado_telefono);

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
		$criteria = new Criteria(LocacionPeer::DATABASE_NAME);

		$criteria->add(LocacionPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Locacion (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNombre($this->nombre);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setDireccion($this->direccion);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCodigoPostal($this->codigo_postal);

		$copyObj->setFkProvinciaId($this->fk_provincia_id);

		$copyObj->setFkTipolocacionId($this->fk_tipolocacion_id);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setFax($this->fax);

		$copyObj->setEncargado($this->encargado);

		$copyObj->setEncargadoTelefono($this->encargado_telefono);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getEspacios() as $relObj) {
				$copyObj->addEspacio($relObj->copy($deepCopy));
			}

			foreach($this->getRelEstablecimientoLocacions() as $relObj) {
				$copyObj->addRelEstablecimientoLocacion($relObj->copy($deepCopy));
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
	 * @return Locacion Clone of current object.
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
	 * @return LocacionPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new LocacionPeer();
		}
		return self::$peer;
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
	 * Declares an association between this object and a Tipolocacion object.
	 *
	 * @param Tipolocacion $v
	 * @return void
	 * @throws PropelException
	 */
	public function setTipolocacion($v)
	{


		if ($v === null) {
			$this->setFkTipolocacionId('0');
		} else {
			$this->setFkTipolocacionId($v->getId());
		}


		$this->aTipolocacion = $v;
	}


	/**
	 * Get the associated Tipolocacion object
	 *
	 * @param Connection Optional Connection object.
	 * @return Tipolocacion The associated Tipolocacion object.
	 * @throws PropelException
	 */
	public function getTipolocacion($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseTipolocacionPeer.php';

		if ($this->aTipolocacion === null && ($this->fk_tipolocacion_id !== null)) {

			$this->aTipolocacion = TipolocacionPeer::retrieveByPK($this->fk_tipolocacion_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = TipolocacionPeer::retrieveByPK($this->fk_tipolocacion_id, $con);
			   $obj->addTipolocacions($this);
			 */
		}
		return $this->aTipolocacion;
	}

	/**
	 * Temporary storage of collEspacios to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initEspacios()
	{
		if ($this->collEspacios === null) {
			$this->collEspacios = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Locacion has previously
	 * been saved, it will retrieve related Espacios from storage.
	 * If this Locacion is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getEspacios($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseEspacioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEspacios === null) {
			if ($this->isNew()) {
			   $this->collEspacios = array();
			} else {

				$criteria->add(EspacioPeer::FK_LOCACION_ID, $this->getId());

				EspacioPeer::addSelectColumns($criteria);
				$this->collEspacios = EspacioPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(EspacioPeer::FK_LOCACION_ID, $this->getId());

				EspacioPeer::addSelectColumns($criteria);
				if (!isset($this->lastEspacioCriteria) || !$this->lastEspacioCriteria->equals($criteria)) {
					$this->collEspacios = EspacioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEspacioCriteria = $criteria;
		return $this->collEspacios;
	}

	/**
	 * Returns the number of related Espacios.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countEspacios($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseEspacioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EspacioPeer::FK_LOCACION_ID, $this->getId());

		return EspacioPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Espacio object to this object
	 * through the Espacio foreign key attribute
	 *
	 * @param Espacio $l Espacio
	 * @return void
	 * @throws PropelException
	 */
	public function addEspacio(Espacio $l)
	{
		$this->collEspacios[] = $l;
		$l->setLocacion($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Locacion is new, it will return
	 * an empty collection; or if this Locacion has previously
	 * been saved, it will retrieve related Espacios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Locacion.
	 */
	public function getEspaciosJoinTipoespacio($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseEspacioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEspacios === null) {
			if ($this->isNew()) {
				$this->collEspacios = array();
			} else {

				$criteria->add(EspacioPeer::FK_LOCACION_ID, $this->getId());

				$this->collEspacios = EspacioPeer::doSelectJoinTipoespacio($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(EspacioPeer::FK_LOCACION_ID, $this->getId());

			if (!isset($this->lastEspacioCriteria) || !$this->lastEspacioCriteria->equals($criteria)) {
				$this->collEspacios = EspacioPeer::doSelectJoinTipoespacio($criteria, $con);
			}
		}
		$this->lastEspacioCriteria = $criteria;

		return $this->collEspacios;
	}

	/**
	 * Temporary storage of collRelEstablecimientoLocacions to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initRelEstablecimientoLocacions()
	{
		if ($this->collRelEstablecimientoLocacions === null) {
			$this->collRelEstablecimientoLocacions = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Locacion has previously
	 * been saved, it will retrieve related RelEstablecimientoLocacions from storage.
	 * If this Locacion is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getRelEstablecimientoLocacions($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelEstablecimientoLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelEstablecimientoLocacions === null) {
			if ($this->isNew()) {
			   $this->collRelEstablecimientoLocacions = array();
			} else {

				$criteria->add(RelEstablecimientoLocacionPeer::FK_LOCACION_ID, $this->getId());

				RelEstablecimientoLocacionPeer::addSelectColumns($criteria);
				$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(RelEstablecimientoLocacionPeer::FK_LOCACION_ID, $this->getId());

				RelEstablecimientoLocacionPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelEstablecimientoLocacionCriteria) || !$this->lastRelEstablecimientoLocacionCriteria->equals($criteria)) {
					$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelEstablecimientoLocacionCriteria = $criteria;
		return $this->collRelEstablecimientoLocacions;
	}

	/**
	 * Returns the number of related RelEstablecimientoLocacions.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countRelEstablecimientoLocacions($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelEstablecimientoLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelEstablecimientoLocacionPeer::FK_LOCACION_ID, $this->getId());

		return RelEstablecimientoLocacionPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a RelEstablecimientoLocacion object to this object
	 * through the RelEstablecimientoLocacion foreign key attribute
	 *
	 * @param RelEstablecimientoLocacion $l RelEstablecimientoLocacion
	 * @return void
	 * @throws PropelException
	 */
	public function addRelEstablecimientoLocacion(RelEstablecimientoLocacion $l)
	{
		$this->collRelEstablecimientoLocacions[] = $l;
		$l->setLocacion($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Locacion is new, it will return
	 * an empty collection; or if this Locacion has previously
	 * been saved, it will retrieve related RelEstablecimientoLocacions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Locacion.
	 */
	public function getRelEstablecimientoLocacionsJoinEstablecimiento($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'model/om/BaseRelEstablecimientoLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelEstablecimientoLocacions === null) {
			if ($this->isNew()) {
				$this->collRelEstablecimientoLocacions = array();
			} else {

				$criteria->add(RelEstablecimientoLocacionPeer::FK_LOCACION_ID, $this->getId());

				$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RelEstablecimientoLocacionPeer::FK_LOCACION_ID, $this->getId());

			if (!isset($this->lastRelEstablecimientoLocacionCriteria) || !$this->lastRelEstablecimientoLocacionCriteria->equals($criteria)) {
				$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelectJoinEstablecimiento($criteria, $con);
			}
		}
		$this->lastRelEstablecimientoLocacionCriteria = $criteria;

		return $this->collRelEstablecimientoLocacions;
	}

} // BaseLocacion
