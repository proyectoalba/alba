<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';

include_once 'creole/util/Clob.php';
include_once 'creole/util/Blob.php';


include_once 'propel/util/Criteria.php';

include_once 'model/LegajopedagogicoPeer.php';

/**
 * Base class that represents a row from the 'legajopedagogico' table.
 *
 * 
 *
 * @package model.om
 */
abstract class BaseLegajopedagogico extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var LegajopedagogicoPeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var int
	 */
	protected $id;


	/**
	 * The value for the fk_alumno_id field.
	 * @var int
	 */
	protected $fk_alumno_id;


	/**
	 * The value for the titulo field.
	 * @var string
	 */
	protected $titulo;


	/**
	 * The value for the resumen field.
	 * @var string
	 */
	protected $resumen;


	/**
	 * The value for the texto field.
	 * @var string
	 */
	protected $texto;


	/**
	 * The value for the fecha field.
	 * @var int
	 */
	protected $fecha;


	/**
	 * The value for the fk_usuario_id field.
	 * @var int
	 */
	protected $fk_usuario_id;


	/**
	 * The value for the fk_legajocategoria_id field.
	 * @var int
	 */
	protected $fk_legajocategoria_id;

	/**
	 * @var Legajocategoria
	 */
	protected $aLegajocategoria;

	/**
	 * @var Alumno
	 */
	protected $aAlumno;

	/**
	 * @var Usuario
	 */
	protected $aUsuario;

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
	 * Get the [fk_alumno_id] column value.
	 * 
	 * @return int
	 */
	public function getFkAlumnoId()
	{

		return $this->fk_alumno_id;
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
	 * Get the [resumen] column value.
	 * 
	 * @return string
	 */
	public function getResumen()
	{

		return $this->resumen;
	}

	/**
	 * Get the [texto] column value.
	 * 
	 * @return string
	 */
	public function getTexto()
	{

		return $this->texto;
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
	 * Get the [fk_usuario_id] column value.
	 * 
	 * @return int
	 */
	public function getFkUsuarioId()
	{

		return $this->fk_usuario_id;
	}

	/**
	 * Get the [fk_legajocategoria_id] column value.
	 * 
	 * @return int
	 */
	public function getFkLegajocategoriaId()
	{

		return $this->fk_legajocategoria_id;
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
			$this->modifiedColumns[] = LegajopedagogicoPeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [fk_alumno_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkAlumnoId($v)
	{

		if ($this->fk_alumno_id !== $v) {
			$this->fk_alumno_id = $v;
			$this->modifiedColumns[] = LegajopedagogicoPeer::FK_ALUMNO_ID;
		}

		if ($this->aAlumno !== null && $this->aAlumno->getId() !== $v) {
			$this->aAlumno = null;
		}

	} // setFkAlumnoId()

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
			$this->modifiedColumns[] = LegajopedagogicoPeer::TITULO;
		}

	} // setTitulo()

	/**
	 * Set the value of [resumen] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setResumen($v)
	{

		// if the passed in parameter is the *same* object that
		// is stored internally then we use the Lob->isModified()
		// method to know whether contents changed.
		if ($v instanceof Lob && $v === $this->resumen) {
			$changed = $v->isModified();
		} else {
			$changed = ($this->resumen !== $v);
		}
		if ($changed) {
			if ( !($v instanceof Lob) ) {
				$obj = new Blob();
				$obj->setContents($v);
			} else {
				$obj = $v;
			}
			$this->resumen = $obj;
			$this->modifiedColumns[] = LegajopedagogicoPeer::RESUMEN;
		}

	} // setResumen()

	/**
	 * Set the value of [texto] column.
	 * 
	 * @param string $v new value
	 * @return void
	 */
	public function setTexto($v)
	{

		// if the passed in parameter is the *same* object that
		// is stored internally then we use the Lob->isModified()
		// method to know whether contents changed.
		if ($v instanceof Lob && $v === $this->texto) {
			$changed = $v->isModified();
		} else {
			$changed = ($this->texto !== $v);
		}
		if ($changed) {
			if ( !($v instanceof Lob) ) {
				$obj = new Blob();
				$obj->setContents($v);
			} else {
				$obj = $v;
			}
			$this->texto = $obj;
			$this->modifiedColumns[] = LegajopedagogicoPeer::TEXTO;
		}

	} // setTexto()

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
			$this->modifiedColumns[] = LegajopedagogicoPeer::FECHA;
		}

	} // setFecha()

	/**
	 * Set the value of [fk_usuario_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkUsuarioId($v)
	{

		if ($this->fk_usuario_id !== $v) {
			$this->fk_usuario_id = $v;
			$this->modifiedColumns[] = LegajopedagogicoPeer::FK_USUARIO_ID;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

	} // setFkUsuarioId()

	/**
	 * Set the value of [fk_legajocategoria_id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setFkLegajocategoriaId($v)
	{

		if ($this->fk_legajocategoria_id !== $v) {
			$this->fk_legajocategoria_id = $v;
			$this->modifiedColumns[] = LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID;
		}

		if ($this->aLegajocategoria !== null && $this->aLegajocategoria->getId() !== $v) {
			$this->aLegajocategoria = null;
		}

	} // setFkLegajocategoriaId()

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

			$this->fk_alumno_id = $rs->getInt($startcol + 1);

			$this->titulo = $rs->getString($startcol + 2);

			$this->resumen = $rs->getBlob($startcol + 3);

			$this->texto = $rs->getBlob($startcol + 4);

			$this->fecha = $rs->getTimestamp($startcol + 5, null);

			$this->fk_usuario_id = $rs->getInt($startcol + 6);

			$this->fk_legajocategoria_id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 8; // 8 = LegajopedagogicoPeer::NUM_COLUMNS - LegajopedagogicoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Legajopedagogico object", $e);
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
			$con = Propel::getConnection(LegajopedagogicoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LegajopedagogicoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LegajopedagogicoPeer::DATABASE_NAME);
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

			if ($this->aLegajocategoria !== null) {
				if ($this->aLegajocategoria->isModified()) {
					$affectedRows += $this->aLegajocategoria->save($con);
				}
				$this->setLegajocategoria($this->aLegajocategoria);
			}

			if ($this->aAlumno !== null) {
				if ($this->aAlumno->isModified()) {
					$affectedRows += $this->aAlumno->save($con);
				}
				$this->setAlumno($this->aAlumno);
			}

			if ($this->aUsuario !== null) {
				if ($this->aUsuario->isModified()) {
					$affectedRows += $this->aUsuario->save($con);
				}
				$this->setUsuario($this->aUsuario);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LegajopedagogicoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += LegajopedagogicoPeer::doUpdate($this, $con);
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


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aLegajocategoria !== null) {
				if (!$this->aLegajocategoria->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLegajocategoria->getValidationFailures());
				}
			}

			if ($this->aAlumno !== null) {
				if (!$this->aAlumno->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAlumno->getValidationFailures());
				}
			}

			if ($this->aUsuario !== null) {
				if (!$this->aUsuario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuario->getValidationFailures());
				}
			}


			if (($retval = LegajopedagogicoPeer::doValidate($this, $columns)) !== true) {
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
		$pos = LegajopedagogicoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkAlumnoId();
				break;
			case 2:
				return $this->getTitulo();
				break;
			case 3:
				return $this->getResumen();
				break;
			case 4:
				return $this->getTexto();
				break;
			case 5:
				return $this->getFecha();
				break;
			case 6:
				return $this->getFkUsuarioId();
				break;
			case 7:
				return $this->getFkLegajocategoriaId();
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
		$keys = LegajopedagogicoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkAlumnoId(),
			$keys[2] => $this->getTitulo(),
			$keys[3] => $this->getResumen(),
			$keys[4] => $this->getTexto(),
			$keys[5] => $this->getFecha(),
			$keys[6] => $this->getFkUsuarioId(),
			$keys[7] => $this->getFkLegajocategoriaId(),
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
		$pos = LegajopedagogicoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFkAlumnoId($value);
				break;
			case 2:
				$this->setTitulo($value);
				break;
			case 3:
				$this->setResumen($value);
				break;
			case 4:
				$this->setTexto($value);
				break;
			case 5:
				$this->setFecha($value);
				break;
			case 6:
				$this->setFkUsuarioId($value);
				break;
			case 7:
				$this->setFkLegajocategoriaId($value);
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
		$keys = LegajopedagogicoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkAlumnoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitulo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setResumen($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTexto($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecha($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFkUsuarioId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFkLegajocategoriaId($arr[$keys[7]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(LegajopedagogicoPeer::DATABASE_NAME);

		if ($this->isColumnModified(LegajopedagogicoPeer::ID)) $criteria->add(LegajopedagogicoPeer::ID, $this->id);
		if ($this->isColumnModified(LegajopedagogicoPeer::FK_ALUMNO_ID)) $criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->fk_alumno_id);
		if ($this->isColumnModified(LegajopedagogicoPeer::TITULO)) $criteria->add(LegajopedagogicoPeer::TITULO, $this->titulo);
		if ($this->isColumnModified(LegajopedagogicoPeer::RESUMEN)) $criteria->add(LegajopedagogicoPeer::RESUMEN, $this->resumen);
		if ($this->isColumnModified(LegajopedagogicoPeer::TEXTO)) $criteria->add(LegajopedagogicoPeer::TEXTO, $this->texto);
		if ($this->isColumnModified(LegajopedagogicoPeer::FECHA)) $criteria->add(LegajopedagogicoPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(LegajopedagogicoPeer::FK_USUARIO_ID)) $criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->fk_usuario_id);
		if ($this->isColumnModified(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID)) $criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->fk_legajocategoria_id);

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
		$criteria = new Criteria(LegajopedagogicoPeer::DATABASE_NAME);

		$criteria->add(LegajopedagogicoPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Legajopedagogico (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFkAlumnoId($this->fk_alumno_id);

		$copyObj->setTitulo($this->titulo);

		$copyObj->setResumen($this->resumen);

		$copyObj->setTexto($this->texto);

		$copyObj->setFecha($this->fecha);

		$copyObj->setFkUsuarioId($this->fk_usuario_id);

		$copyObj->setFkLegajocategoriaId($this->fk_legajocategoria_id);


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
	 * @return Legajopedagogico Clone of current object.
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
	 * @return LegajopedagogicoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new LegajopedagogicoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Legajocategoria object.
	 *
	 * @param Legajocategoria $v
	 * @return void
	 * @throws PropelException
	 */
	public function setLegajocategoria($v)
	{


		if ($v === null) {
			$this->setFkLegajocategoriaId(NULL);
		} else {
			$this->setFkLegajocategoriaId($v->getId());
		}


		$this->aLegajocategoria = $v;
	}


	/**
	 * Get the associated Legajocategoria object
	 *
	 * @param Connection Optional Connection object.
	 * @return Legajocategoria The associated Legajocategoria object.
	 * @throws PropelException
	 */
	public function getLegajocategoria($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseLegajocategoriaPeer.php';

		if ($this->aLegajocategoria === null && ($this->fk_legajocategoria_id !== null)) {

			$this->aLegajocategoria = LegajocategoriaPeer::retrieveByPK($this->fk_legajocategoria_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = LegajocategoriaPeer::retrieveByPK($this->fk_legajocategoria_id, $con);
			   $obj->addLegajocategorias($this);
			 */
		}
		return $this->aLegajocategoria;
	}

	/**
	 * Declares an association between this object and a Alumno object.
	 *
	 * @param Alumno $v
	 * @return void
	 * @throws PropelException
	 */
	public function setAlumno($v)
	{


		if ($v === null) {
			$this->setFkAlumnoId(NULL);
		} else {
			$this->setFkAlumnoId($v->getId());
		}


		$this->aAlumno = $v;
	}


	/**
	 * Get the associated Alumno object
	 *
	 * @param Connection Optional Connection object.
	 * @return Alumno The associated Alumno object.
	 * @throws PropelException
	 */
	public function getAlumno($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseAlumnoPeer.php';

		if ($this->aAlumno === null && ($this->fk_alumno_id !== null)) {

			$this->aAlumno = AlumnoPeer::retrieveByPK($this->fk_alumno_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = AlumnoPeer::retrieveByPK($this->fk_alumno_id, $con);
			   $obj->addAlumnos($this);
			 */
		}
		return $this->aAlumno;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param Usuario $v
	 * @return void
	 * @throws PropelException
	 */
	public function setUsuario($v)
	{


		if ($v === null) {
			$this->setFkUsuarioId(NULL);
		} else {
			$this->setFkUsuarioId($v->getId());
		}


		$this->aUsuario = $v;
	}


	/**
	 * Get the associated Usuario object
	 *
	 * @param Connection Optional Connection object.
	 * @return Usuario The associated Usuario object.
	 * @throws PropelException
	 */
	public function getUsuario($con = null)
	{
		// include the related Peer class
		include_once 'model/om/BaseUsuarioPeer.php';

		if ($this->aUsuario === null && ($this->fk_usuario_id !== null)) {

			$this->aUsuario = UsuarioPeer::retrieveByPK($this->fk_usuario_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = UsuarioPeer::retrieveByPK($this->fk_usuario_id, $con);
			   $obj->addUsuarios($this);
			 */
		}
		return $this->aUsuario;
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
	 * Otherwise if this Legajopedagogico has previously
	 * been saved, it will retrieve related Legajoadjuntos from storage.
	 * If this Legajopedagogico is new, it will return
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

				$criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->getId());

				LegajoadjuntoPeer::addSelectColumns($criteria);
				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->getId());

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

		$criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->getId());

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
		$l->setLegajopedagogico($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Legajopedagogico is new, it will return
	 * an empty collection; or if this Legajopedagogico has previously
	 * been saved, it will retrieve related Legajoadjuntos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Legajopedagogico.
	 */
	public function getLegajoadjuntosJoinAdjunto($criteria = null, $con = null)
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

				$criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->getId());

				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelectJoinAdjunto($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->getId());

			if (!isset($this->lastLegajoadjuntoCriteria) || !$this->lastLegajoadjuntoCriteria->equals($criteria)) {
				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelectJoinAdjunto($criteria, $con);
			}
		}
		$this->lastLegajoadjuntoCriteria = $criteria;

		return $this->collLegajoadjuntos;
	}

} // BaseLegajopedagogico
