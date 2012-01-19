<?php


abstract class BaseEvento extends BaseObject  implements Persistent {


  const PEER = 'EventoPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $titulo;

	
	protected $fecha_inicio;

	
	protected $fecha_fin;

	
	protected $tipo;

	
	protected $frecuencia;

	
	protected $frecuencia_intervalo;

	
	protected $recurrencia_fin;

	
	protected $recurrencia_dias;

	
	protected $estado;

	
	protected $collRelDivisionActividadDocentes;

	
	private $lastRelDivisionActividadDocenteCriteria = null;

	
	protected $collDocenteHorarios;

	
	private $lastDocenteHorarioCriteria = null;

	
	protected $collHorarioescolars;

	
	private $lastHorarioescolarCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->tipo = 0;
		$this->frecuencia = 0;
		$this->frecuencia_intervalo = 0;
		$this->recurrencia_dias = 0;
		$this->estado = 0;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getTitulo()
	{
		return $this->titulo;
	}

	
	public function getFechaInicio($format = 'Y-m-d H:i:s')
	{
		if ($this->fecha_inicio === null) {
			return null;
		}


		if ($this->fecha_inicio === '0000-00-00 00:00:00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->fecha_inicio);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_inicio, true), $x);
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

	
	public function getFechaFin($format = 'Y-m-d H:i:s')
	{
		if ($this->fecha_fin === null) {
			return null;
		}


		if ($this->fecha_fin === '0000-00-00 00:00:00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->fecha_fin);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_fin, true), $x);
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

	
	public function getTipo()
	{
		return $this->tipo;
	}

	
	public function getFrecuencia()
	{
		return $this->frecuencia;
	}

	
	public function getFrecuenciaIntervalo()
	{
		return $this->frecuencia_intervalo;
	}

	
	public function getRecurrenciaFin()
	{
		return $this->recurrencia_fin;
	}

	
	public function getRecurrenciaDias()
	{
		return $this->recurrencia_dias;
	}

	
	public function getEstado()
	{
		return $this->estado;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = EventoPeer::ID;
		}

		return $this;
	} 
	
	public function setTitulo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->titulo !== $v) {
			$this->titulo = $v;
			$this->modifiedColumns[] = EventoPeer::TITULO;
		}

		return $this;
	} 
	
	public function setFechaInicio($v)
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

		if ( $this->fecha_inicio !== null || $dt !== null ) {
			
			$currNorm = ($this->fecha_inicio !== null && $tmpDt = new DateTime($this->fecha_inicio)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->fecha_inicio = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = EventoPeer::FECHA_INICIO;
			}
		} 
		return $this;
	} 
	
	public function setFechaFin($v)
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

		if ( $this->fecha_fin !== null || $dt !== null ) {
			
			$currNorm = ($this->fecha_fin !== null && $tmpDt = new DateTime($this->fecha_fin)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->fecha_fin = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = EventoPeer::FECHA_FIN;
			}
		} 
		return $this;
	} 
	
	public function setTipo($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tipo !== $v || $v === 0) {
			$this->tipo = $v;
			$this->modifiedColumns[] = EventoPeer::TIPO;
		}

		return $this;
	} 
	
	public function setFrecuencia($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->frecuencia !== $v || $v === 0) {
			$this->frecuencia = $v;
			$this->modifiedColumns[] = EventoPeer::FRECUENCIA;
		}

		return $this;
	} 
	
	public function setFrecuenciaIntervalo($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->frecuencia_intervalo !== $v || $v === 0) {
			$this->frecuencia_intervalo = $v;
			$this->modifiedColumns[] = EventoPeer::FRECUENCIA_INTERVALO;
		}

		return $this;
	} 
	
	public function setRecurrenciaFin($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->recurrencia_fin !== $v) {
			$this->recurrencia_fin = $v;
			$this->modifiedColumns[] = EventoPeer::RECURRENCIA_FIN;
		}

		return $this;
	} 
	
	public function setRecurrenciaDias($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->recurrencia_dias !== $v || $v === 0) {
			$this->recurrencia_dias = $v;
			$this->modifiedColumns[] = EventoPeer::RECURRENCIA_DIAS;
		}

		return $this;
	} 
	
	public function setEstado($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->estado !== $v || $v === 0) {
			$this->estado = $v;
			$this->modifiedColumns[] = EventoPeer::ESTADO;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(EventoPeer::TIPO,EventoPeer::FRECUENCIA,EventoPeer::FRECUENCIA_INTERVALO,EventoPeer::RECURRENCIA_DIAS,EventoPeer::ESTADO))) {
				return false;
			}

			if ($this->tipo !== 0) {
				return false;
			}

			if ($this->frecuencia !== 0) {
				return false;
			}

			if ($this->frecuencia_intervalo !== 0) {
				return false;
			}

			if ($this->recurrencia_dias !== 0) {
				return false;
			}

			if ($this->estado !== 0) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->titulo = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->fecha_inicio = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->fecha_fin = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->tipo = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->frecuencia = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->frecuencia_intervalo = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->recurrencia_fin = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->recurrencia_dias = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->estado = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Evento object", $e);
		}
	}

	
	public function ensureConsistency()
	{

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
			$con = Propel::getConnection(EventoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = EventoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collRelDivisionActividadDocentes = null;
			$this->lastRelDivisionActividadDocenteCriteria = null;

			$this->collDocenteHorarios = null;
			$this->lastDocenteHorarioCriteria = null;

			$this->collHorarioescolars = null;
			$this->lastHorarioescolarCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EventoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			EventoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EventoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			EventoPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = EventoPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EventoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EventoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collRelDivisionActividadDocentes !== null) {
				foreach ($this->collRelDivisionActividadDocentes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDocenteHorarios !== null) {
				foreach ($this->collDocenteHorarios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collHorarioescolars !== null) {
				foreach ($this->collHorarioescolars as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = EventoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelDivisionActividadDocentes !== null) {
					foreach ($this->collRelDivisionActividadDocentes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDocenteHorarios !== null) {
					foreach ($this->collDocenteHorarios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collHorarioescolars !== null) {
					foreach ($this->collHorarioescolars as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EventoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTitulo();
				break;
			case 2:
				return $this->getFechaInicio();
				break;
			case 3:
				return $this->getFechaFin();
				break;
			case 4:
				return $this->getTipo();
				break;
			case 5:
				return $this->getFrecuencia();
				break;
			case 6:
				return $this->getFrecuenciaIntervalo();
				break;
			case 7:
				return $this->getRecurrenciaFin();
				break;
			case 8:
				return $this->getRecurrenciaDias();
				break;
			case 9:
				return $this->getEstado();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = EventoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTitulo(),
			$keys[2] => $this->getFechaInicio(),
			$keys[3] => $this->getFechaFin(),
			$keys[4] => $this->getTipo(),
			$keys[5] => $this->getFrecuencia(),
			$keys[6] => $this->getFrecuenciaIntervalo(),
			$keys[7] => $this->getRecurrenciaFin(),
			$keys[8] => $this->getRecurrenciaDias(),
			$keys[9] => $this->getEstado(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EventoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTitulo($value);
				break;
			case 2:
				$this->setFechaInicio($value);
				break;
			case 3:
				$this->setFechaFin($value);
				break;
			case 4:
				$this->setTipo($value);
				break;
			case 5:
				$this->setFrecuencia($value);
				break;
			case 6:
				$this->setFrecuenciaIntervalo($value);
				break;
			case 7:
				$this->setRecurrenciaFin($value);
				break;
			case 8:
				$this->setRecurrenciaDias($value);
				break;
			case 9:
				$this->setEstado($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EventoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitulo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFechaInicio($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFechaFin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFrecuencia($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFrecuenciaIntervalo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRecurrenciaFin($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRecurrenciaDias($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEstado($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EventoPeer::DATABASE_NAME);

		if ($this->isColumnModified(EventoPeer::ID)) $criteria->add(EventoPeer::ID, $this->id);
		if ($this->isColumnModified(EventoPeer::TITULO)) $criteria->add(EventoPeer::TITULO, $this->titulo);
		if ($this->isColumnModified(EventoPeer::FECHA_INICIO)) $criteria->add(EventoPeer::FECHA_INICIO, $this->fecha_inicio);
		if ($this->isColumnModified(EventoPeer::FECHA_FIN)) $criteria->add(EventoPeer::FECHA_FIN, $this->fecha_fin);
		if ($this->isColumnModified(EventoPeer::TIPO)) $criteria->add(EventoPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(EventoPeer::FRECUENCIA)) $criteria->add(EventoPeer::FRECUENCIA, $this->frecuencia);
		if ($this->isColumnModified(EventoPeer::FRECUENCIA_INTERVALO)) $criteria->add(EventoPeer::FRECUENCIA_INTERVALO, $this->frecuencia_intervalo);
		if ($this->isColumnModified(EventoPeer::RECURRENCIA_FIN)) $criteria->add(EventoPeer::RECURRENCIA_FIN, $this->recurrencia_fin);
		if ($this->isColumnModified(EventoPeer::RECURRENCIA_DIAS)) $criteria->add(EventoPeer::RECURRENCIA_DIAS, $this->recurrencia_dias);
		if ($this->isColumnModified(EventoPeer::ESTADO)) $criteria->add(EventoPeer::ESTADO, $this->estado);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EventoPeer::DATABASE_NAME);

		$criteria->add(EventoPeer::ID, $this->id);

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

		$copyObj->setTitulo($this->titulo);

		$copyObj->setFechaInicio($this->fecha_inicio);

		$copyObj->setFechaFin($this->fecha_fin);

		$copyObj->setTipo($this->tipo);

		$copyObj->setFrecuencia($this->frecuencia);

		$copyObj->setFrecuenciaIntervalo($this->frecuencia_intervalo);

		$copyObj->setRecurrenciaFin($this->recurrencia_fin);

		$copyObj->setRecurrenciaDias($this->recurrencia_dias);

		$copyObj->setEstado($this->estado);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getRelDivisionActividadDocentes() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelDivisionActividadDocente($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getDocenteHorarios() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDocenteHorario($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getHorarioescolars() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addHorarioescolar($relObj->copy($deepCopy));
				}
			}

		} 

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
			self::$peer = new EventoPeer();
		}
		return self::$peer;
	}

	
	public function clearRelDivisionActividadDocentes()
	{
		$this->collRelDivisionActividadDocentes = null; 	}

	
	public function initRelDivisionActividadDocentes()
	{
		$this->collRelDivisionActividadDocentes = array();
	}

	
	public function getRelDivisionActividadDocentes($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EventoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
			   $this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_EVENTO_ID, $this->id);

				RelDivisionActividadDocentePeer::addSelectColumns($criteria);
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDivisionActividadDocentePeer::FK_EVENTO_ID, $this->id);

				RelDivisionActividadDocentePeer::addSelectColumns($criteria);
				if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
					$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;
		return $this->collRelDivisionActividadDocentes;
	}

	
	public function countRelDivisionActividadDocentes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EventoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_EVENTO_ID, $this->id);

				$count = RelDivisionActividadDocentePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDivisionActividadDocentePeer::FK_EVENTO_ID, $this->id);

				if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
					$count = RelDivisionActividadDocentePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelDivisionActividadDocentes);
				}
			} else {
				$count = count($this->collRelDivisionActividadDocentes);
			}
		}
		return $count;
	}

	
	public function addRelDivisionActividadDocente(RelDivisionActividadDocente $l)
	{
		if ($this->collRelDivisionActividadDocentes === null) {
			$this->initRelDivisionActividadDocentes();
		}
		if (!in_array($l, $this->collRelDivisionActividadDocentes, true)) { 			array_push($this->collRelDivisionActividadDocentes, $l);
			$l->setEvento($this);
		}
	}


	
	public function getRelDivisionActividadDocentesJoinDivision($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EventoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_EVENTO_ID, $this->id);

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDivision($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_EVENTO_ID, $this->id);

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDivision($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}


	
	public function getRelDivisionActividadDocentesJoinActividad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EventoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_EVENTO_ID, $this->id);

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_EVENTO_ID, $this->id);

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}


	
	public function getRelDivisionActividadDocentesJoinDocente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EventoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_EVENTO_ID, $this->id);

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDocente($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_EVENTO_ID, $this->id);

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDocente($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}

	
	public function clearDocenteHorarios()
	{
		$this->collDocenteHorarios = null; 	}

	
	public function initDocenteHorarios()
	{
		$this->collDocenteHorarios = array();
	}

	
	public function getDocenteHorarios($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EventoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDocenteHorarios === null) {
			if ($this->isNew()) {
			   $this->collDocenteHorarios = array();
			} else {

				$criteria->add(DocenteHorarioPeer::FK_EVENTO_ID, $this->id);

				DocenteHorarioPeer::addSelectColumns($criteria);
				$this->collDocenteHorarios = DocenteHorarioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DocenteHorarioPeer::FK_EVENTO_ID, $this->id);

				DocenteHorarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastDocenteHorarioCriteria) || !$this->lastDocenteHorarioCriteria->equals($criteria)) {
					$this->collDocenteHorarios = DocenteHorarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDocenteHorarioCriteria = $criteria;
		return $this->collDocenteHorarios;
	}

	
	public function countDocenteHorarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EventoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDocenteHorarios === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DocenteHorarioPeer::FK_EVENTO_ID, $this->id);

				$count = DocenteHorarioPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DocenteHorarioPeer::FK_EVENTO_ID, $this->id);

				if (!isset($this->lastDocenteHorarioCriteria) || !$this->lastDocenteHorarioCriteria->equals($criteria)) {
					$count = DocenteHorarioPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDocenteHorarios);
				}
			} else {
				$count = count($this->collDocenteHorarios);
			}
		}
		return $count;
	}

	
	public function addDocenteHorario(DocenteHorario $l)
	{
		if ($this->collDocenteHorarios === null) {
			$this->initDocenteHorarios();
		}
		if (!in_array($l, $this->collDocenteHorarios, true)) { 			array_push($this->collDocenteHorarios, $l);
			$l->setEvento($this);
		}
	}


	
	public function getDocenteHorariosJoinDocente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EventoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDocenteHorarios === null) {
			if ($this->isNew()) {
				$this->collDocenteHorarios = array();
			} else {

				$criteria->add(DocenteHorarioPeer::FK_EVENTO_ID, $this->id);

				$this->collDocenteHorarios = DocenteHorarioPeer::doSelectJoinDocente($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DocenteHorarioPeer::FK_EVENTO_ID, $this->id);

			if (!isset($this->lastDocenteHorarioCriteria) || !$this->lastDocenteHorarioCriteria->equals($criteria)) {
				$this->collDocenteHorarios = DocenteHorarioPeer::doSelectJoinDocente($criteria, $con, $join_behavior);
			}
		}
		$this->lastDocenteHorarioCriteria = $criteria;

		return $this->collDocenteHorarios;
	}

	
	public function clearHorarioescolars()
	{
		$this->collHorarioescolars = null; 	}

	
	public function initHorarioescolars()
	{
		$this->collHorarioescolars = array();
	}

	
	public function getHorarioescolars($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EventoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
			   $this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_EVENTO_ID, $this->id);

				HorarioescolarPeer::addSelectColumns($criteria);
				$this->collHorarioescolars = HorarioescolarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(HorarioescolarPeer::FK_EVENTO_ID, $this->id);

				HorarioescolarPeer::addSelectColumns($criteria);
				if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
					$this->collHorarioescolars = HorarioescolarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;
		return $this->collHorarioescolars;
	}

	
	public function countHorarioescolars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EventoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(HorarioescolarPeer::FK_EVENTO_ID, $this->id);

				$count = HorarioescolarPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(HorarioescolarPeer::FK_EVENTO_ID, $this->id);

				if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
					$count = HorarioescolarPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collHorarioescolars);
				}
			} else {
				$count = count($this->collHorarioescolars);
			}
		}
		return $count;
	}

	
	public function addHorarioescolar(Horarioescolar $l)
	{
		if ($this->collHorarioescolars === null) {
			$this->initHorarioescolars();
		}
		if (!in_array($l, $this->collHorarioescolars, true)) { 			array_push($this->collHorarioescolars, $l);
			$l->setEvento($this);
		}
	}


	
	public function getHorarioescolarsJoinEstablecimiento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EventoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_EVENTO_ID, $this->id);

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_EVENTO_ID, $this->id);

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}


	
	public function getHorarioescolarsJoinTurno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EventoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_EVENTO_ID, $this->id);

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinTurno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_EVENTO_ID, $this->id);

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinTurno($criteria, $con, $join_behavior);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}


	
	public function getHorarioescolarsJoinHorarioescolartipo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EventoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_EVENTO_ID, $this->id);

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinHorarioescolartipo($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_EVENTO_ID, $this->id);

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinHorarioescolartipo($criteria, $con, $join_behavior);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collRelDivisionActividadDocentes) {
				foreach ((array) $this->collRelDivisionActividadDocentes as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collDocenteHorarios) {
				foreach ((array) $this->collDocenteHorarios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collHorarioescolars) {
				foreach ((array) $this->collHorarioescolars as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collRelDivisionActividadDocentes = null;
		$this->collDocenteHorarios = null;
		$this->collHorarioescolars = null;
	}

} 