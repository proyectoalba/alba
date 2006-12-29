<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'model/ResponsablePeer.php';

/**
 * Base class that represents a row from the 'responsable' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseResponsable extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var ResponsablePeer
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
	 * The value for the apellido field.
	 * @var string
	 */
	protected $apellido = '';


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
	 * The value for the telefono field.
	 * @var string
	 */
	protected $telefono = '';


	/**
	 * The value for the telefono_movil field.
	 * @var string
	 */
	protected $telefono_movil = '';


	/**
	 * The value for the nro_documento field.
	 * @var string
	 */
	protected $nro_documento = '';


	/**
	 * The value for the fk_tipodocumento_id field.
	 * @var int
	 */
	protected $fk_tipodocumento_id = 0;


	/**
	 * The value for the sexo field.
	 * @var string
	 */
	protected $sexo = '';


	/**
	 * The value for the email field.
	 * @var string
	 */
	protected $email = '';


	/**
	 * The value for the relacion field.
	 * @var string
	 */
	protected $relacion = '';


	/**
	 * The value for the autorizacion_retiro field.
	 * @var boolean
	 */
	protected $autorizacion_retiro = true;


	/**
	 * The value for the fk_cuenta_id field.
	 * @var int
	 */
	protected $fk_cuenta_id = 0;

	/**
	 * @var Cuenta
	 */
	protected $aCuenta;

	/**
	 * @var Provincia
	 */
	protected $aProvincia;

	/**
	 * @var Tipodocumento
	 */
	protected $aTipodocumento;

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
	 * Get the [apellido] column value.
	 * 
	 * @return string
	 */
	public function getApellido()
	{

		return $this->apellido;
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
	 * Get the [telefono] column value.
	 * 
	 * @return string
	 */
	public function getTelefono()
	{

		return $this->telefono;
	}

	/**
	 * Get the [telefono_movil] column value.
	 * 
	 * @return string
	 */
	public function getTelefonoMovil()
	{

		return $this->telefono_movil;
	}

	/**
	 * Get the [nro_documento] column value.
	 * 
	 * @return string
	 */
	public function getNroDocumento()
	{

		return $this->nro_documento;
	}

	/**
	 * Get the [fk_tipodocumento_id] column value.
	 * 
	 * @return int
	 */
	public function getFkTipodocumentoId()
	{

		return $this->fk_tipodocumento_id;
	}

	/**
	 * Get the [sexo] column value.
	 * 
	 * @return string
	 */
	public function getSexo()
	{

		return $this->sexo;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return string
	 */
	public function getEmail()
	{

		return $this->email;
	}

	/**
	 * Get the [relacion] column value.
	 * 
	 * @return string
	 */
	public function getRelacion()
	{

		return $this->relacion;
	}

	/**
	 * Get the [autorizacion_retiro] column value.
	 * 
	 * @return boolean
	 */
	public function getAutorizacionRetiro()
	{

		return $this->autorizacion_retiro;
	}

	/**
	 * Get the [fk_cuenta_id] column value.
	 * 
	 * @return int
	 */
	public function getFkCuentaId()
	{

		return $this->fk_cuenta_id;
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
			$this->modifiedColumns[] = ResponsablePeer::ID;
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
			$this->modifiedColumns[] = ResponsablePeer::NOMBRE;
		}

	} // setNombre()

	/**
	 * Set the value of [apellido] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setApellido($v)
	{

		if ($this->apellido !== $v || $v === '') {
			$this->apellido = $v;
			$this->modifiedColumns[] = ResponsablePeer::APELLIDO;
		}

	} // setApellido()

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
			$this->modifiedColumns[] = ResponsablePeer::DIRECCION;
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
			$this->modifiedColumns[] = ResponsablePeer::CIUDAD;
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
			$this->modifiedColumns[] = ResponsablePeer::CODIGO_POSTAL;
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
			$this->modifiedColumns[] = ResponsablePeer::FK_PROVINCIA_ID;
		}

		if ($this->aProvincia !== null && $this->aProvincia->getId() !== $v) {
			$this->aProvincia = null;
		}

	} // setFkProvinciaId()

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
			$this->modifiedColumns[] = ResponsablePeer::TELEFONO;
		}

	} // setTelefono()

	/**
	 * Set the value of [telefono_movil] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setTelefonoMovil($v)
	{

		if ($this->telefono_movil !== $v || $v === '') {
			$this->telefono_movil = $v;
			$this->modifiedColumns[] = ResponsablePeer::TELEFONO_MOVIL;
		}

	} // setTelefonoMovil()

	/**
	 * Set the value of [nro_documento] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setNroDocumento($v)
	{

		if ($this->nro_documento !== $v || $v === '') {
			$this->nro_documento = $v;
			$this->modifiedColumns[] = ResponsablePeer::NRO_DOCUMENTO;
		}

	} // setNroDocumento()

	/**
	 * Set the value of [fk_tipodocumento_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkTipodocumentoId($v)
	{

		if ($this->fk_tipodocumento_id !== $v || $v === 0) {
			$this->fk_tipodocumento_id = $v;
			$this->modifiedColumns[] = ResponsablePeer::FK_TIPODOCUMENTO_ID;
		}

		if ($this->aTipodocumento !== null && $this->aTipodocumento->getId() !== $v) {
			$this->aTipodocumento = null;
		}

	} // setFkTipodocumentoId()

	/**
	 * Set the value of [sexo] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setSexo($v)
	{

		if ($this->sexo !== $v || $v === '') {
			$this->sexo = $v;
			$this->modifiedColumns[] = ResponsablePeer::SEXO;
		}

	} // setSexo()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setEmail($v)
	{

		if ($this->email !== $v || $v === '') {
			$this->email = $v;
			$this->modifiedColumns[] = ResponsablePeer::EMAIL;
		}

	} // setEmail()

	/**
	 * Set the value of [relacion] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setRelacion($v)
	{

		if ($this->relacion !== $v || $v === '') {
			$this->relacion = $v;
			$this->modifiedColumns[] = ResponsablePeer::RELACION;
		}

	} // setRelacion()

	/**
	 * Set the value of [autorizacion_retiro] column.
	 * 
	 * @param boolean $v new value
	 * @return void
	 */
	public function setAutorizacionRetiro($v)
	{

		if ($this->autorizacion_retiro !== $v || $v === true) {
			$this->autorizacion_retiro = $v;
			$this->modifiedColumns[] = ResponsablePeer::AUTORIZACION_RETIRO;
		}

	} // setAutorizacionRetiro()

	/**
	 * Set the value of [fk_cuenta_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkCuentaId($v)
	{

		if ($this->fk_cuenta_id !== $v || $v === 0) {
			$this->fk_cuenta_id = $v;
			$this->modifiedColumns[] = ResponsablePeer::FK_CUENTA_ID;
		}

		if ($this->aCuenta !== null && $this->aCuenta->getId() !== $v) {
			$this->aCuenta = null;
		}

	} // setFkCuentaId()

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

			$this->apellido = $rs->getString($startcol + 2);

			$this->direccion = $rs->getString($startcol + 3);

			$this->ciudad = $rs->getString($startcol + 4);

			$this->codigo_postal = $rs->getString($startcol + 5);

			$this->fk_provincia_id = $rs->getInt($startcol + 6);

			$this->telefono = $rs->getString($startcol + 7);

			$this->telefono_movil = $rs->getString($startcol + 8);

			$this->nro_documento = $rs->getString($startcol + 9);

			$this->fk_tipodocumento_id = $rs->getInt($startcol + 10);

			$this->sexo = $rs->getString($startcol + 11);

			$this->email = $rs->getString($startcol + 12);

			$this->relacion = $rs->getString($startcol + 13);

			$this->autorizacion_retiro = $rs->getBoolean($startcol + 14);

			$this->fk_cuenta_id = $rs->getInt($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 16; // 16 = ResponsablePeer::NUM_COLUMNS - ResponsablePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Responsable object", $e);
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
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ResponsablePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ResponsablePeer::DATABASE_NAME);
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

			if ($this->aCuenta !== null) {
				if ($this->aCuenta->isModified()) {
					$affectedRows += $this->aCuenta->save($con);
				}
				$this->setCuenta($this->aCuenta);
			}

			if ($this->aProvincia !== null) {
				if ($this->aProvincia->isModified()) {
					$affectedRows += $this->aProvincia->save($con);
				}
				$this->setProvincia($this->aProvincia);
			}

			if ($this->aTipodocumento !== null) {
				if ($this->aTipodocumento->isModified()) {
					$affectedRows += $this->aTipodocumento->save($con);
				}
				$this->setTipodocumento($this->aTipodocumento);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ResponsablePeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ResponsablePeer::doUpdate($this, $con);
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

			if ($this->aCuenta !== null) {
				if (!$this->aCuenta->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCuenta->getValidationFailures());
				}
			}

			if ($this->aProvincia !== null) {
				if (!$this->aProvincia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProvincia->getValidationFailures());
				}
			}

			if ($this->aTipodocumento !== null) {
				if (!$this->aTipodocumento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipodocumento->getValidationFailures());
				}
			}


			if (($retval = ResponsablePeer::doValidate($this, $columns)) !== true) {
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
		$pos = ResponsablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getApellido();
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
				return $this->getTelefono();
				break;
			case 8:
				return $this->getTelefonoMovil();
				break;
			case 9:
				return $this->getNroDocumento();
				break;
			case 10:
				return $this->getFkTipodocumentoId();
				break;
			case 11:
				return $this->getSexo();
				break;
			case 12:
				return $this->getEmail();
				break;
			case 13:
				return $this->getRelacion();
				break;
			case 14:
				return $this->getAutorizacionRetiro();
				break;
			case 15:
				return $this->getFkCuentaId();
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
		$keys = ResponsablePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getApellido(),
			$keys[3] => $this->getDireccion(),
			$keys[4] => $this->getCiudad(),
			$keys[5] => $this->getCodigoPostal(),
			$keys[6] => $this->getFkProvinciaId(),
			$keys[7] => $this->getTelefono(),
			$keys[8] => $this->getTelefonoMovil(),
			$keys[9] => $this->getNroDocumento(),
			$keys[10] => $this->getFkTipodocumentoId(),
			$keys[11] => $this->getSexo(),
			$keys[12] => $this->getEmail(),
			$keys[13] => $this->getRelacion(),
			$keys[14] => $this->getAutorizacionRetiro(),
			$keys[15] => $this->getFkCuentaId(),
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
		$pos = ResponsablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setApellido($value);
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
				$this->setTelefono($value);
				break;
			case 8:
				$this->setTelefonoMovil($value);
				break;
			case 9:
				$this->setNroDocumento($value);
				break;
			case 10:
				$this->setFkTipodocumentoId($value);
				break;
			case 11:
				$this->setSexo($value);
				break;
			case 12:
				$this->setEmail($value);
				break;
			case 13:
				$this->setRelacion($value);
				break;
			case 14:
				$this->setAutorizacionRetiro($value);
				break;
			case 15:
				$this->setFkCuentaId($value);
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
		$keys = ResponsablePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApellido($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDireccion($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCiudad($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodigoPostal($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFkProvinciaId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTelefono($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTelefonoMovil($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNroDocumento($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFkTipodocumentoId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSexo($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setEmail($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setRelacion($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAutorizacionRetiro($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFkCuentaId($arr[$keys[15]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ResponsablePeer::DATABASE_NAME);

		if ($this->isColumnModified(ResponsablePeer::ID)) $criteria->add(ResponsablePeer::ID, $this->id);
		if ($this->isColumnModified(ResponsablePeer::NOMBRE)) $criteria->add(ResponsablePeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(ResponsablePeer::APELLIDO)) $criteria->add(ResponsablePeer::APELLIDO, $this->apellido);
		if ($this->isColumnModified(ResponsablePeer::DIRECCION)) $criteria->add(ResponsablePeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(ResponsablePeer::CIUDAD)) $criteria->add(ResponsablePeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(ResponsablePeer::CODIGO_POSTAL)) $criteria->add(ResponsablePeer::CODIGO_POSTAL, $this->codigo_postal);
		if ($this->isColumnModified(ResponsablePeer::FK_PROVINCIA_ID)) $criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->fk_provincia_id);
		if ($this->isColumnModified(ResponsablePeer::TELEFONO)) $criteria->add(ResponsablePeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(ResponsablePeer::TELEFONO_MOVIL)) $criteria->add(ResponsablePeer::TELEFONO_MOVIL, $this->telefono_movil);
		if ($this->isColumnModified(ResponsablePeer::NRO_DOCUMENTO)) $criteria->add(ResponsablePeer::NRO_DOCUMENTO, $this->nro_documento);
		if ($this->isColumnModified(ResponsablePeer::FK_TIPODOCUMENTO_ID)) $criteria->add(ResponsablePeer::FK_TIPODOCUMENTO_ID, $this->fk_tipodocumento_id);
		if ($this->isColumnModified(ResponsablePeer::SEXO)) $criteria->add(ResponsablePeer::SEXO, $this->sexo);
		if ($this->isColumnModified(ResponsablePeer::EMAIL)) $criteria->add(ResponsablePeer::EMAIL, $this->email);
		if ($this->isColumnModified(ResponsablePeer::RELACION)) $criteria->add(ResponsablePeer::RELACION, $this->relacion);
		if ($this->isColumnModified(ResponsablePeer::AUTORIZACION_RETIRO)) $criteria->add(ResponsablePeer::AUTORIZACION_RETIRO, $this->autorizacion_retiro);
		if ($this->isColumnModified(ResponsablePeer::FK_CUENTA_ID)) $criteria->add(ResponsablePeer::FK_CUENTA_ID, $this->fk_cuenta_id);

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
		$criteria = new Criteria(ResponsablePeer::DATABASE_NAME);

		$criteria->add(ResponsablePeer::ID, $this->id);

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
	 * @param object $copyObj An object of Responsable (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNombre($this->nombre);

		$copyObj->setApellido($this->apellido);

		$copyObj->setDireccion($this->direccion);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCodigoPostal($this->codigo_postal);

		$copyObj->setFkProvinciaId($this->fk_provincia_id);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setTelefonoMovil($this->telefono_movil);

		$copyObj->setNroDocumento($this->nro_documento);

		$copyObj->setFkTipodocumentoId($this->fk_tipodocumento_id);

		$copyObj->setSexo($this->sexo);

		$copyObj->setEmail($this->email);

		$copyObj->setRelacion($this->relacion);

		$copyObj->setAutorizacionRetiro($this->autorizacion_retiro);

		$copyObj->setFkCuentaId($this->fk_cuenta_id);


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
	 * @return Responsable Clone of current object.
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
	 * @return ResponsablePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ResponsablePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Cuenta object.
	 *
	 * @param Cuenta $v
	 * @return void
	 * @throws PropelException
	 */
	public function setCuenta($v)
	{


		if ($v === null) {
			$this->setFkCuentaId('0');
		} else {
			$this->setFkCuentaId($v->getId());
		}


		$this->aCuenta = $v;
	}


	/**
	 * Get the associated Cuenta object
	 *
	 * @param Connection Optional Connection object.
	 * @return Cuenta The associated Cuenta object.
	 * @throws PropelException
	 */
	public function getCuenta($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseCuentaPeer.php';

		if ($this->aCuenta === null && ($this->fk_cuenta_id !== null)) {

			$this->aCuenta = CuentaPeer::retrieveByPK($this->fk_cuenta_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = CuentaPeer::retrieveByPK($this->fk_cuenta_id, $con);
			   $obj->addCuentas($this);
			 */
		}
		return $this->aCuenta;
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
	 * Declares an association between this object and a Tipodocumento object.
	 *
	 * @param Tipodocumento $v
	 * @return void
	 * @throws PropelException
	 */
	public function setTipodocumento($v)
	{


		if ($v === null) {
			$this->setFkTipodocumentoId('0');
		} else {
			$this->setFkTipodocumentoId($v->getId());
		}


		$this->aTipodocumento = $v;
	}


	/**
	 * Get the associated Tipodocumento object
	 *
	 * @param Connection Optional Connection object.
	 * @return Tipodocumento The associated Tipodocumento object.
	 * @throws PropelException
	 */
	public function getTipodocumento($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseTipodocumentoPeer.php';

		if ($this->aTipodocumento === null && ($this->fk_tipodocumento_id !== null)) {

			$this->aTipodocumento = TipodocumentoPeer::retrieveByPK($this->fk_tipodocumento_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = TipodocumentoPeer::retrieveByPK($this->fk_tipodocumento_id, $con);
			   $obj->addTipodocumentos($this);
			 */
		}
		return $this->aTipodocumento;
	}

} // BaseResponsable
