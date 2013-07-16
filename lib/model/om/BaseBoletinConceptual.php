<?php


abstract class BaseBoletinConceptual extends BaseObject  implements Persistent {


  const PEER = 'BoletinConceptualPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_escalanota_id;

	
	protected $fk_alumno_id;

	
	protected $fk_concepto_id;

	
	protected $fk_periodo_id;

	
	protected $observacion;

	
	protected $fecha;

	
	protected $aEscalanota;

	
	protected $aAlumno;

	
	protected $aConcepto;

	
	protected $aPeriodo;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->fk_alumno_id = 0;
		$this->fk_concepto_id = 0;
		$this->fk_periodo_id = 0;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFkEscalanotaId()
	{
		return $this->fk_escalanota_id;
	}

	
	public function getFkAlumnoId()
	{
		return $this->fk_alumno_id;
	}

	
	public function getFkConceptoId()
	{
		return $this->fk_concepto_id;
	}

	
	public function getFkPeriodoId()
	{
		return $this->fk_periodo_id;
	}

	
	public function getObservacion()
	{
		return $this->observacion;
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
			$this->modifiedColumns[] = BoletinConceptualPeer::ID;
		}

		return $this;
	} 
	
	public function setFkEscalanotaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_escalanota_id !== $v) {
			$this->fk_escalanota_id = $v;
			$this->modifiedColumns[] = BoletinConceptualPeer::FK_ESCALANOTA_ID;
		}

		if ($this->aEscalanota !== null && $this->aEscalanota->getId() !== $v) {
			$this->aEscalanota = null;
		}

		return $this;
	} 
	
	public function setFkAlumnoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_alumno_id !== $v || $v === 0) {
			$this->fk_alumno_id = $v;
			$this->modifiedColumns[] = BoletinConceptualPeer::FK_ALUMNO_ID;
		}

		if ($this->aAlumno !== null && $this->aAlumno->getId() !== $v) {
			$this->aAlumno = null;
		}

		return $this;
	} 
	
	public function setFkConceptoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_concepto_id !== $v || $v === 0) {
			$this->fk_concepto_id = $v;
			$this->modifiedColumns[] = BoletinConceptualPeer::FK_CONCEPTO_ID;
		}

		if ($this->aConcepto !== null && $this->aConcepto->getId() !== $v) {
			$this->aConcepto = null;
		}

		return $this;
	} 
	
	public function setFkPeriodoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_periodo_id !== $v || $v === 0) {
			$this->fk_periodo_id = $v;
			$this->modifiedColumns[] = BoletinConceptualPeer::FK_PERIODO_ID;
		}

		if ($this->aPeriodo !== null && $this->aPeriodo->getId() !== $v) {
			$this->aPeriodo = null;
		}

		return $this;
	} 
	
	public function setObservacion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->observacion !== $v) {
			$this->observacion = $v;
			$this->modifiedColumns[] = BoletinConceptualPeer::OBSERVACION;
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
				$this->modifiedColumns[] = BoletinConceptualPeer::FECHA;
			}
		} 
		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(BoletinConceptualPeer::FK_ALUMNO_ID,BoletinConceptualPeer::FK_CONCEPTO_ID,BoletinConceptualPeer::FK_PERIODO_ID))) {
				return false;
			}

			if ($this->fk_alumno_id !== 0) {
				return false;
			}

			if ($this->fk_concepto_id !== 0) {
				return false;
			}

			if ($this->fk_periodo_id !== 0) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_escalanota_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->fk_alumno_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->fk_concepto_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->fk_periodo_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->observacion = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->fecha = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating BoletinConceptual object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aEscalanota !== null && $this->fk_escalanota_id !== $this->aEscalanota->getId()) {
			$this->aEscalanota = null;
		}
		if ($this->aAlumno !== null && $this->fk_alumno_id !== $this->aAlumno->getId()) {
			$this->aAlumno = null;
		}
		if ($this->aConcepto !== null && $this->fk_concepto_id !== $this->aConcepto->getId()) {
			$this->aConcepto = null;
		}
		if ($this->aPeriodo !== null && $this->fk_periodo_id !== $this->aPeriodo->getId()) {
			$this->aPeriodo = null;
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
			$con = Propel::getConnection(BoletinConceptualPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = BoletinConceptualPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aEscalanota = null;
			$this->aAlumno = null;
			$this->aConcepto = null;
			$this->aPeriodo = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BoletinConceptualPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			BoletinConceptualPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BoletinConceptualPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			BoletinConceptualPeer::addInstanceToPool($this);
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

												
			if ($this->aEscalanota !== null) {
				if ($this->aEscalanota->isModified() || $this->aEscalanota->isNew()) {
					$affectedRows += $this->aEscalanota->save($con);
				}
				$this->setEscalanota($this->aEscalanota);
			}

			if ($this->aAlumno !== null) {
				if ($this->aAlumno->isModified() || $this->aAlumno->isNew()) {
					$affectedRows += $this->aAlumno->save($con);
				}
				$this->setAlumno($this->aAlumno);
			}

			if ($this->aConcepto !== null) {
				if ($this->aConcepto->isModified() || $this->aConcepto->isNew()) {
					$affectedRows += $this->aConcepto->save($con);
				}
				$this->setConcepto($this->aConcepto);
			}

			if ($this->aPeriodo !== null) {
				if ($this->aPeriodo->isModified() || $this->aPeriodo->isNew()) {
					$affectedRows += $this->aPeriodo->save($con);
				}
				$this->setPeriodo($this->aPeriodo);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = BoletinConceptualPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = BoletinConceptualPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BoletinConceptualPeer::doUpdate($this, $con);
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


												
			if ($this->aEscalanota !== null) {
				if (!$this->aEscalanota->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEscalanota->getValidationFailures());
				}
			}

			if ($this->aAlumno !== null) {
				if (!$this->aAlumno->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAlumno->getValidationFailures());
				}
			}

			if ($this->aConcepto !== null) {
				if (!$this->aConcepto->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aConcepto->getValidationFailures());
				}
			}

			if ($this->aPeriodo !== null) {
				if (!$this->aPeriodo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPeriodo->getValidationFailures());
				}
			}


			if (($retval = BoletinConceptualPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BoletinConceptualPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkEscalanotaId();
				break;
			case 2:
				return $this->getFkAlumnoId();
				break;
			case 3:
				return $this->getFkConceptoId();
				break;
			case 4:
				return $this->getFkPeriodoId();
				break;
			case 5:
				return $this->getObservacion();
				break;
			case 6:
				return $this->getFecha();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = BoletinConceptualPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkEscalanotaId(),
			$keys[2] => $this->getFkAlumnoId(),
			$keys[3] => $this->getFkConceptoId(),
			$keys[4] => $this->getFkPeriodoId(),
			$keys[5] => $this->getObservacion(),
			$keys[6] => $this->getFecha(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BoletinConceptualPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkEscalanotaId($value);
				break;
			case 2:
				$this->setFkAlumnoId($value);
				break;
			case 3:
				$this->setFkConceptoId($value);
				break;
			case 4:
				$this->setFkPeriodoId($value);
				break;
			case 5:
				$this->setObservacion($value);
				break;
			case 6:
				$this->setFecha($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BoletinConceptualPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkEscalanotaId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkAlumnoId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkConceptoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFkPeriodoId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObservacion($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecha($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BoletinConceptualPeer::DATABASE_NAME);

		if ($this->isColumnModified(BoletinConceptualPeer::ID)) $criteria->add(BoletinConceptualPeer::ID, $this->id);
		if ($this->isColumnModified(BoletinConceptualPeer::FK_ESCALANOTA_ID)) $criteria->add(BoletinConceptualPeer::FK_ESCALANOTA_ID, $this->fk_escalanota_id);
		if ($this->isColumnModified(BoletinConceptualPeer::FK_ALUMNO_ID)) $criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $this->fk_alumno_id);
		if ($this->isColumnModified(BoletinConceptualPeer::FK_CONCEPTO_ID)) $criteria->add(BoletinConceptualPeer::FK_CONCEPTO_ID, $this->fk_concepto_id);
		if ($this->isColumnModified(BoletinConceptualPeer::FK_PERIODO_ID)) $criteria->add(BoletinConceptualPeer::FK_PERIODO_ID, $this->fk_periodo_id);
		if ($this->isColumnModified(BoletinConceptualPeer::OBSERVACION)) $criteria->add(BoletinConceptualPeer::OBSERVACION, $this->observacion);
		if ($this->isColumnModified(BoletinConceptualPeer::FECHA)) $criteria->add(BoletinConceptualPeer::FECHA, $this->fecha);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BoletinConceptualPeer::DATABASE_NAME);

		$criteria->add(BoletinConceptualPeer::ID, $this->id);

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

		$copyObj->setFkEscalanotaId($this->fk_escalanota_id);

		$copyObj->setFkAlumnoId($this->fk_alumno_id);

		$copyObj->setFkConceptoId($this->fk_concepto_id);

		$copyObj->setFkPeriodoId($this->fk_periodo_id);

		$copyObj->setObservacion($this->observacion);

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
			self::$peer = new BoletinConceptualPeer();
		}
		return self::$peer;
	}

	
	public function setEscalanota(Escalanota $v = null)
	{
		if ($v === null) {
			$this->setFkEscalanotaId(NULL);
		} else {
			$this->setFkEscalanotaId($v->getId());
		}

		$this->aEscalanota = $v;

						if ($v !== null) {
			$v->addBoletinConceptual($this);
		}

		return $this;
	}


	
	public function getEscalanota(PropelPDO $con = null)
	{
		if ($this->aEscalanota === null && ($this->fk_escalanota_id !== null)) {
			$c = new Criteria(EscalanotaPeer::DATABASE_NAME);
			$c->add(EscalanotaPeer::ID, $this->fk_escalanota_id);
			$this->aEscalanota = EscalanotaPeer::doSelectOne($c, $con);
			
		}
		return $this->aEscalanota;
	}

	
	public function setAlumno(Alumno $v = null)
	{
		if ($v === null) {
			$this->setFkAlumnoId(0);
		} else {
			$this->setFkAlumnoId($v->getId());
		}

		$this->aAlumno = $v;

						if ($v !== null) {
			$v->addBoletinConceptual($this);
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

	
	public function setConcepto(Concepto $v = null)
	{
		if ($v === null) {
			$this->setFkConceptoId(0);
		} else {
			$this->setFkConceptoId($v->getId());
		}

		$this->aConcepto = $v;

						if ($v !== null) {
			$v->addBoletinConceptual($this);
		}

		return $this;
	}


	
	public function getConcepto(PropelPDO $con = null)
	{
		if ($this->aConcepto === null && ($this->fk_concepto_id !== null)) {
			$c = new Criteria(ConceptoPeer::DATABASE_NAME);
			$c->add(ConceptoPeer::ID, $this->fk_concepto_id);
			$this->aConcepto = ConceptoPeer::doSelectOne($c, $con);
			
		}
		return $this->aConcepto;
	}

	
	public function setPeriodo(Periodo $v = null)
	{
		if ($v === null) {
			$this->setFkPeriodoId(0);
		} else {
			$this->setFkPeriodoId($v->getId());
		}

		$this->aPeriodo = $v;

						if ($v !== null) {
			$v->addBoletinConceptual($this);
		}

		return $this;
	}


	
	public function getPeriodo(PropelPDO $con = null)
	{
		if ($this->aPeriodo === null && ($this->fk_periodo_id !== null)) {
			$c = new Criteria(PeriodoPeer::DATABASE_NAME);
			$c->add(PeriodoPeer::ID, $this->fk_periodo_id);
			$this->aPeriodo = PeriodoPeer::doSelectOne($c, $con);
			
		}
		return $this->aPeriodo;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aEscalanota = null;
			$this->aAlumno = null;
			$this->aConcepto = null;
			$this->aPeriodo = null;
	}

} 