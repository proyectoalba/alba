<?php


abstract class BaseAsistencia extends BaseObject  implements Persistent {


  const PEER = 'AsistenciaPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_alumno_id;

	
	protected $fk_tipoasistencia_id;

	
	protected $fecha;

	
	protected $aAlumno;

	
	protected $aTipoasistencia;

	
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

	
	public function getFkTipoasistenciaId()
	{
		return $this->fk_tipoasistencia_id;
	}

	
	public function getFecha($format = 'Y-m-d H:i:s')
	{
		if ($this->fecha === null) {
			return null;
		}


		if ($this->fecha === '0000-00-00 00:00:00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->fecha);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha, true), $x);
			}
		}

		if ($format === null) {
						return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AsistenciaPeer::ID;
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
			$this->modifiedColumns[] = AsistenciaPeer::FK_ALUMNO_ID;
		}

		if ($this->aAlumno !== null && $this->aAlumno->getId() !== $v) {
			$this->aAlumno = null;
		}

		return $this;
	} 
	
	public function setFkTipoasistenciaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_tipoasistencia_id !== $v) {
			$this->fk_tipoasistencia_id = $v;
			$this->modifiedColumns[] = AsistenciaPeer::FK_TIPOASISTENCIA_ID;
		}

		if ($this->aTipoasistencia !== null && $this->aTipoasistencia->getId() !== $v) {
			$this->aTipoasistencia = null;
		}

		return $this;
	} 
	
	public function setFecha($v)
	{
						if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
									try {
				if (is_numeric($v)) { 					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
															$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->fecha !== null || $dt !== null ) {
			
			$currNorm = ($this->fecha !== null && $tmpDt = new DateTime($this->fecha)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->fecha = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = AsistenciaPeer::FECHA;
			}
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
			$this->fk_tipoasistencia_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->fecha = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Asistencia object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aAlumno !== null && $this->fk_alumno_id !== $this->aAlumno->getId()) {
			$this->aAlumno = null;
		}
		if ($this->aTipoasistencia !== null && $this->fk_tipoasistencia_id !== $this->aTipoasistencia->getId()) {
			$this->aTipoasistencia = null;
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
			$con = Propel::getConnection(AsistenciaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = AsistenciaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aAlumno = null;
			$this->aTipoasistencia = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AsistenciaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			AsistenciaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AsistenciaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			AsistenciaPeer::addInstanceToPool($this);
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

			if ($this->aTipoasistencia !== null) {
				if ($this->aTipoasistencia->isModified() || $this->aTipoasistencia->isNew()) {
					$affectedRows += $this->aTipoasistencia->save($con);
				}
				$this->setTipoasistencia($this->aTipoasistencia);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AsistenciaPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AsistenciaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AsistenciaPeer::doUpdate($this, $con);
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

			if ($this->aTipoasistencia !== null) {
				if (!$this->aTipoasistencia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipoasistencia->getValidationFailures());
				}
			}


			if (($retval = AsistenciaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AsistenciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkTipoasistenciaId();
				break;
			case 3:
				return $this->getFecha();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = AsistenciaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkAlumnoId(),
			$keys[2] => $this->getFkTipoasistenciaId(),
			$keys[3] => $this->getFecha(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AsistenciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFkTipoasistenciaId($value);
				break;
			case 3:
				$this->setFecha($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AsistenciaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkAlumnoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkTipoasistenciaId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecha($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AsistenciaPeer::DATABASE_NAME);

		if ($this->isColumnModified(AsistenciaPeer::ID)) $criteria->add(AsistenciaPeer::ID, $this->id);
		if ($this->isColumnModified(AsistenciaPeer::FK_ALUMNO_ID)) $criteria->add(AsistenciaPeer::FK_ALUMNO_ID, $this->fk_alumno_id);
		if ($this->isColumnModified(AsistenciaPeer::FK_TIPOASISTENCIA_ID)) $criteria->add(AsistenciaPeer::FK_TIPOASISTENCIA_ID, $this->fk_tipoasistencia_id);
		if ($this->isColumnModified(AsistenciaPeer::FECHA)) $criteria->add(AsistenciaPeer::FECHA, $this->fecha);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AsistenciaPeer::DATABASE_NAME);

		$criteria->add(AsistenciaPeer::ID, $this->id);

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

		$copyObj->setFkTipoasistenciaId($this->fk_tipoasistencia_id);

		$copyObj->setFecha($this->fecha);


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
			self::$peer = new AsistenciaPeer();
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
			$v->addAsistencia($this);
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

	
	public function setTipoasistencia(Tipoasistencia $v = null)
	{
		if ($v === null) {
			$this->setFkTipoasistenciaId(NULL);
		} else {
			$this->setFkTipoasistenciaId($v->getId());
		}

		$this->aTipoasistencia = $v;

						if ($v !== null) {
			$v->addAsistencia($this);
		}

		return $this;
	}


	
	public function getTipoasistencia(PropelPDO $con = null)
	{
		if ($this->aTipoasistencia === null && ($this->fk_tipoasistencia_id !== null)) {
			$c = new Criteria(TipoasistenciaPeer::DATABASE_NAME);
			$c->add(TipoasistenciaPeer::ID, $this->fk_tipoasistencia_id);
			$this->aTipoasistencia = TipoasistenciaPeer::doSelectOne($c, $con);
			
		}
		return $this->aTipoasistencia;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aAlumno = null;
			$this->aTipoasistencia = null;
	}

} 