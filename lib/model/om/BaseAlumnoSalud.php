<?php


abstract class BaseAlumnoSalud extends BaseObject  implements Persistent {


  const PEER = 'AlumnoSaludPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_alumno_id;

	
	protected $cobertura_medica;

	
	protected $cobertura_telefono;

	
	protected $cobertura_observaciones;

	
	protected $medico_nombre;

	
	protected $medico_domicilio;

	
	protected $medico_telefono;

	
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

	
	public function getCoberturaTelefono()
	{
		return $this->cobertura_telefono;
	}

	
	public function getCoberturaObservaciones()
	{
		return $this->cobertura_observaciones;
	}

	
	public function getMedicoNombre()
	{
		return $this->medico_nombre;
	}

	
	public function getMedicoDomicilio()
	{
		return $this->medico_domicilio;
	}

	
	public function getMedicoTelefono()
	{
		return $this->medico_telefono;
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
	
	public function setCoberturaTelefono($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cobertura_telefono !== $v) {
			$this->cobertura_telefono = $v;
			$this->modifiedColumns[] = AlumnoSaludPeer::COBERTURA_TELEFONO;
		}

		return $this;
	} 
	
	public function setCoberturaObservaciones($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cobertura_observaciones !== $v) {
			$this->cobertura_observaciones = $v;
			$this->modifiedColumns[] = AlumnoSaludPeer::COBERTURA_OBSERVACIONES;
		}

		return $this;
	} 
	
	public function setMedicoNombre($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->medico_nombre !== $v) {
			$this->medico_nombre = $v;
			$this->modifiedColumns[] = AlumnoSaludPeer::MEDICO_NOMBRE;
		}

		return $this;
	} 
	
	public function setMedicoDomicilio($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->medico_domicilio !== $v) {
			$this->medico_domicilio = $v;
			$this->modifiedColumns[] = AlumnoSaludPeer::MEDICO_DOMICILIO;
		}

		return $this;
	} 
	
	public function setMedicoTelefono($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->medico_telefono !== $v) {
			$this->medico_telefono = $v;
			$this->modifiedColumns[] = AlumnoSaludPeer::MEDICO_TELEFONO;
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
			$this->cobertura_telefono = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->cobertura_observaciones = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->medico_nombre = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->medico_domicilio = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->medico_telefono = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 8; 
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
				return $this->getCoberturaTelefono();
				break;
			case 4:
				return $this->getCoberturaObservaciones();
				break;
			case 5:
				return $this->getMedicoNombre();
				break;
			case 6:
				return $this->getMedicoDomicilio();
				break;
			case 7:
				return $this->getMedicoTelefono();
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
			$keys[3] => $this->getCoberturaTelefono(),
			$keys[4] => $this->getCoberturaObservaciones(),
			$keys[5] => $this->getMedicoNombre(),
			$keys[6] => $this->getMedicoDomicilio(),
			$keys[7] => $this->getMedicoTelefono(),
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
				$this->setCoberturaTelefono($value);
				break;
			case 4:
				$this->setCoberturaObservaciones($value);
				break;
			case 5:
				$this->setMedicoNombre($value);
				break;
			case 6:
				$this->setMedicoDomicilio($value);
				break;
			case 7:
				$this->setMedicoTelefono($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AlumnoSaludPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkAlumnoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoberturaMedica($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCoberturaTelefono($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoberturaObservaciones($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMedicoNombre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMedicoDomicilio($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMedicoTelefono($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AlumnoSaludPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlumnoSaludPeer::ID)) $criteria->add(AlumnoSaludPeer::ID, $this->id);
		if ($this->isColumnModified(AlumnoSaludPeer::FK_ALUMNO_ID)) $criteria->add(AlumnoSaludPeer::FK_ALUMNO_ID, $this->fk_alumno_id);
		if ($this->isColumnModified(AlumnoSaludPeer::COBERTURA_MEDICA)) $criteria->add(AlumnoSaludPeer::COBERTURA_MEDICA, $this->cobertura_medica);
		if ($this->isColumnModified(AlumnoSaludPeer::COBERTURA_TELEFONO)) $criteria->add(AlumnoSaludPeer::COBERTURA_TELEFONO, $this->cobertura_telefono);
		if ($this->isColumnModified(AlumnoSaludPeer::COBERTURA_OBSERVACIONES)) $criteria->add(AlumnoSaludPeer::COBERTURA_OBSERVACIONES, $this->cobertura_observaciones);
		if ($this->isColumnModified(AlumnoSaludPeer::MEDICO_NOMBRE)) $criteria->add(AlumnoSaludPeer::MEDICO_NOMBRE, $this->medico_nombre);
		if ($this->isColumnModified(AlumnoSaludPeer::MEDICO_DOMICILIO)) $criteria->add(AlumnoSaludPeer::MEDICO_DOMICILIO, $this->medico_domicilio);
		if ($this->isColumnModified(AlumnoSaludPeer::MEDICO_TELEFONO)) $criteria->add(AlumnoSaludPeer::MEDICO_TELEFONO, $this->medico_telefono);

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

		$copyObj->setCoberturaTelefono($this->cobertura_telefono);

		$copyObj->setCoberturaObservaciones($this->cobertura_observaciones);

		$copyObj->setMedicoNombre($this->medico_nombre);

		$copyObj->setMedicoDomicilio($this->medico_domicilio);

		$copyObj->setMedicoTelefono($this->medico_telefono);


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