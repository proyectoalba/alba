<?php


abstract class BaseAlumnoSalud extends BaseObject  implements Persistent {


  const PEER = 'AlumnoSaludPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_alumno_id;

	
	protected $cobertura_medica;

	
	protected $pediatra_apellido;

	
	protected $pediatra_nombre;

	
	protected $pediatra_domicilio;

	
	protected $pediatra_telefono;

	
	protected $aAlumno;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFkAlumnoId()
	{
		return $this->fk_alumno_id;
	}

	
	public function getCoberturaMedica()
	{
		return $this->cobertura_medica;
	}

	
	public function getPediatraApellido()
	{
		return $this->pediatra_apellido;
	}

	
	public function getPediatraNombre()
	{
		return $this->pediatra_nombre;
	}

	
	public function getPediatraDomicilio()
	{
		return $this->pediatra_domicilio;
	}

	
	public function getPediatraTelefono()
	{
		return $this->pediatra_telefono;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AlumnoSaludPeer::ID;
		}

		return $this;
	} 
	
	public function setFkAlumnoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_alumno_id !== $v) {
			$this->fk_alumno_id = $v;
			$this->modifiedColumns[] = AlumnoSaludPeer::FK_ALUMNO_ID;
		}

		if ($this->aAlumno !== null && $this->aAlumno->getId() !== $v) {
			$this->aAlumno = null;
		}

		return $this;
	} 
	
	public function setCoberturaMedica($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cobertura_medica !== $v) {
			$this->cobertura_medica = $v;
			$this->modifiedColumns[] = AlumnoSaludPeer::COBERTURA_MEDICA;
		}

		return $this;
	} 
	
	public function setPediatraApellido($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->pediatra_apellido !== $v) {
			$this->pediatra_apellido = $v;
			$this->modifiedColumns[] = AlumnoSaludPeer::PEDIATRA_APELLIDO;
		}

		return $this;
	} 
	
	public function setPediatraNombre($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->pediatra_nombre !== $v) {
			$this->pediatra_nombre = $v;
			$this->modifiedColumns[] = AlumnoSaludPeer::PEDIATRA_NOMBRE;
		}

		return $this;
	} 
	
	public function setPediatraDomicilio($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->pediatra_domicilio !== $v) {
			$this->pediatra_domicilio = $v;
			$this->modifiedColumns[] = AlumnoSaludPeer::PEDIATRA_DOMICILIO;
		}

		return $this;
	} 
	
	public function setPediatraTelefono($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->pediatra_telefono !== $v) {
			$this->pediatra_telefono = $v;
			$this->modifiedColumns[] = AlumnoSaludPeer::PEDIATRA_TELEFONO;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array())) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_alumno_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->cobertura_medica = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->pediatra_apellido = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->pediatra_nombre = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->pediatra_domicilio = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->pediatra_telefono = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AlumnoSalud object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aAlumno !== null && $this->fk_alumno_id !== $this->aAlumno->getId()) {
			$this->aAlumno = null;
		}
	} 
	
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AlumnoSaludPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = AlumnoSaludPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aAlumno = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AlumnoSaludPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			AlumnoSaludPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AlumnoSaludPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			AlumnoSaludPeer::addInstanceToPool($this);
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

												
			if ($this->aAlumno !== null) {
				if ($this->aAlumno->isModified() || $this->aAlumno->isNew()) {
					$affectedRows += $this->aAlumno->save($con);
				}
				$this->setAlumno($this->aAlumno);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AlumnoSaludPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AlumnoSaludPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AlumnoSaludPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
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

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aAlumno !== null) {
				if (!$this->aAlumno->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAlumno->getValidationFailures());
				}
			}


			if (($retval = AlumnoSaludPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlumnoSaludPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
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
				return $this->getCoberturaMedica();
				break;
			case 3:
				return $this->getPediatraApellido();
				break;
			case 4:
				return $this->getPediatraNombre();
				break;
			case 5:
				return $this->getPediatraDomicilio();
				break;
			case 6:
				return $this->getPediatraTelefono();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = AlumnoSaludPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkAlumnoId(),
			$keys[2] => $this->getCoberturaMedica(),
			$keys[3] => $this->getPediatraApellido(),
			$keys[4] => $this->getPediatraNombre(),
			$keys[5] => $this->getPediatraDomicilio(),
			$keys[6] => $this->getPediatraTelefono(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlumnoSaludPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
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
				$this->setCoberturaMedica($value);
				break;
			case 3:
				$this->setPediatraApellido($value);
				break;
			case 4:
				$this->setPediatraNombre($value);
				break;
			case 5:
				$this->setPediatraDomicilio($value);
				break;
			case 6:
				$this->setPediatraTelefono($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AlumnoSaludPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkAlumnoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoberturaMedica($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPediatraApellido($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPediatraNombre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPediatraDomicilio($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPediatraTelefono($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AlumnoSaludPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlumnoSaludPeer::ID)) $criteria->add(AlumnoSaludPeer::ID, $this->id);
		if ($this->isColumnModified(AlumnoSaludPeer::FK_ALUMNO_ID)) $criteria->add(AlumnoSaludPeer::FK_ALUMNO_ID, $this->fk_alumno_id);
		if ($this->isColumnModified(AlumnoSaludPeer::COBERTURA_MEDICA)) $criteria->add(AlumnoSaludPeer::COBERTURA_MEDICA, $this->cobertura_medica);
		if ($this->isColumnModified(AlumnoSaludPeer::PEDIATRA_APELLIDO)) $criteria->add(AlumnoSaludPeer::PEDIATRA_APELLIDO, $this->pediatra_apellido);
		if ($this->isColumnModified(AlumnoSaludPeer::PEDIATRA_NOMBRE)) $criteria->add(AlumnoSaludPeer::PEDIATRA_NOMBRE, $this->pediatra_nombre);
		if ($this->isColumnModified(AlumnoSaludPeer::PEDIATRA_DOMICILIO)) $criteria->add(AlumnoSaludPeer::PEDIATRA_DOMICILIO, $this->pediatra_domicilio);
		if ($this->isColumnModified(AlumnoSaludPeer::PEDIATRA_TELEFONO)) $criteria->add(AlumnoSaludPeer::PEDIATRA_TELEFONO, $this->pediatra_telefono);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AlumnoSaludPeer::DATABASE_NAME);

		$criteria->add(AlumnoSaludPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFkAlumnoId($this->fk_alumno_id);

		$copyObj->setCoberturaMedica($this->cobertura_medica);

		$copyObj->setPediatraApellido($this->pediatra_apellido);

		$copyObj->setPediatraNombre($this->pediatra_nombre);

		$copyObj->setPediatraDomicilio($this->pediatra_domicilio);

		$copyObj->setPediatraTelefono($this->pediatra_telefono);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AlumnoSaludPeer();
		}
		return self::$peer;
	}

	
	public function setAlumno(Alumno $v = null)
	{
		if ($v === null) {
			$this->setFkAlumnoId(NULL);
		} else {
			$this->setFkAlumnoId($v->getId());
		}

		$this->aAlumno = $v;

						if ($v !== null) {
			$v->addAlumnoSalud($this);
		}

		return $this;
	}


	
	public function getAlumno(PropelPDO $con = null)
	{
		if ($this->aAlumno === null && ($this->fk_alumno_id !== null)) {
			$c = new Criteria(AlumnoPeer::DATABASE_NAME);
			$c->add(AlumnoPeer::ID, $this->fk_alumno_id);
			$this->aAlumno = AlumnoPeer::doSelectOne($c, $con);
			
		}
		return $this->aAlumno;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aAlumno = null;
	}

} 