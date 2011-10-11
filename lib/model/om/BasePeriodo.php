<?php


abstract class BasePeriodo extends BaseObject  implements Persistent {


  const PEER = 'PeriodoPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_ciclolectivo_id;

	
	protected $fecha_inicio;

	
	protected $fecha_fin;

	
	protected $descripcion;

	
	protected $calcular;

	
	protected $formula;

	
	protected $aCiclolectivo;

	
	protected $collBoletinConceptuals;

	
	private $lastBoletinConceptualCriteria = null;

	
	protected $collBoletinActividadess;

	
	private $lastBoletinActividadesCriteria = null;

	
	protected $collExamens;

	
	private $lastExamenCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->calcular = false;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFkCiclolectivoId()
	{
		return $this->fk_ciclolectivo_id;
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

	
	public function getDescripcion()
	{
		return $this->descripcion;
	}

	
	public function getCalcular()
	{
		return $this->calcular;
	}

	
	public function getFormula()
	{
		return $this->formula;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PeriodoPeer::ID;
		}

		return $this;
	} 
	
	public function setFkCiclolectivoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_ciclolectivo_id !== $v) {
			$this->fk_ciclolectivo_id = $v;
			$this->modifiedColumns[] = PeriodoPeer::FK_CICLOLECTIVO_ID;
		}

		if ($this->aCiclolectivo !== null && $this->aCiclolectivo->getId() !== $v) {
			$this->aCiclolectivo = null;
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
				$this->modifiedColumns[] = PeriodoPeer::FECHA_INICIO;
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
				$this->modifiedColumns[] = PeriodoPeer::FECHA_FIN;
			}
		} 
		return $this;
	} 
	
	public function setDescripcion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = PeriodoPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setCalcular($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->calcular !== $v || $v === false) {
			$this->calcular = $v;
			$this->modifiedColumns[] = PeriodoPeer::CALCULAR;
		}

		return $this;
	} 
	
	public function setFormula($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->formula !== $v) {
			$this->formula = $v;
			$this->modifiedColumns[] = PeriodoPeer::FORMULA;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(PeriodoPeer::CALCULAR))) {
				return false;
			}

			if ($this->calcular !== false) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_ciclolectivo_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->fecha_inicio = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->fecha_fin = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->descripcion = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->calcular = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->formula = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Periodo object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aCiclolectivo !== null && $this->fk_ciclolectivo_id !== $this->aCiclolectivo->getId()) {
			$this->aCiclolectivo = null;
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
			$con = Propel::getConnection(PeriodoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = PeriodoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aCiclolectivo = null;
			$this->collBoletinConceptuals = null;
			$this->lastBoletinConceptualCriteria = null;

			$this->collBoletinActividadess = null;
			$this->lastBoletinActividadesCriteria = null;

			$this->collExamens = null;
			$this->lastExamenCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PeriodoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			PeriodoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PeriodoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			PeriodoPeer::addInstanceToPool($this);
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

												
			if ($this->aCiclolectivo !== null) {
				if ($this->aCiclolectivo->isModified() || $this->aCiclolectivo->isNew()) {
					$affectedRows += $this->aCiclolectivo->save($con);
				}
				$this->setCiclolectivo($this->aCiclolectivo);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = PeriodoPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PeriodoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PeriodoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collBoletinConceptuals !== null) {
				foreach ($this->collBoletinConceptuals as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collBoletinActividadess !== null) {
				foreach ($this->collBoletinActividadess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collExamens !== null) {
				foreach ($this->collExamens as $referrerFK) {
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


												
			if ($this->aCiclolectivo !== null) {
				if (!$this->aCiclolectivo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCiclolectivo->getValidationFailures());
				}
			}


			if (($retval = PeriodoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collBoletinConceptuals !== null) {
					foreach ($this->collBoletinConceptuals as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBoletinActividadess !== null) {
					foreach ($this->collBoletinActividadess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collExamens !== null) {
					foreach ($this->collExamens as $referrerFK) {
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
		$pos = PeriodoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkCiclolectivoId();
				break;
			case 2:
				return $this->getFechaInicio();
				break;
			case 3:
				return $this->getFechaFin();
				break;
			case 4:
				return $this->getDescripcion();
				break;
			case 5:
				return $this->getCalcular();
				break;
			case 6:
				return $this->getFormula();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = PeriodoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkCiclolectivoId(),
			$keys[2] => $this->getFechaInicio(),
			$keys[3] => $this->getFechaFin(),
			$keys[4] => $this->getDescripcion(),
			$keys[5] => $this->getCalcular(),
			$keys[6] => $this->getFormula(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PeriodoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkCiclolectivoId($value);
				break;
			case 2:
				$this->setFechaInicio($value);
				break;
			case 3:
				$this->setFechaFin($value);
				break;
			case 4:
				$this->setDescripcion($value);
				break;
			case 5:
				$this->setCalcular($value);
				break;
			case 6:
				$this->setFormula($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PeriodoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkCiclolectivoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFechaInicio($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFechaFin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescripcion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCalcular($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFormula($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);

		if ($this->isColumnModified(PeriodoPeer::ID)) $criteria->add(PeriodoPeer::ID, $this->id);
		if ($this->isColumnModified(PeriodoPeer::FK_CICLOLECTIVO_ID)) $criteria->add(PeriodoPeer::FK_CICLOLECTIVO_ID, $this->fk_ciclolectivo_id);
		if ($this->isColumnModified(PeriodoPeer::FECHA_INICIO)) $criteria->add(PeriodoPeer::FECHA_INICIO, $this->fecha_inicio);
		if ($this->isColumnModified(PeriodoPeer::FECHA_FIN)) $criteria->add(PeriodoPeer::FECHA_FIN, $this->fecha_fin);
		if ($this->isColumnModified(PeriodoPeer::DESCRIPCION)) $criteria->add(PeriodoPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(PeriodoPeer::CALCULAR)) $criteria->add(PeriodoPeer::CALCULAR, $this->calcular);
		if ($this->isColumnModified(PeriodoPeer::FORMULA)) $criteria->add(PeriodoPeer::FORMULA, $this->formula);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);

		$criteria->add(PeriodoPeer::ID, $this->id);

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

		$copyObj->setFkCiclolectivoId($this->fk_ciclolectivo_id);

		$copyObj->setFechaInicio($this->fecha_inicio);

		$copyObj->setFechaFin($this->fecha_fin);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setCalcular($this->calcular);

		$copyObj->setFormula($this->formula);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getBoletinConceptuals() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addBoletinConceptual($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getBoletinActividadess() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addBoletinActividades($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getExamens() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addExamen($relObj->copy($deepCopy));
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
			self::$peer = new PeriodoPeer();
		}
		return self::$peer;
	}

	
	public function setCiclolectivo(Ciclolectivo $v = null)
	{
		if ($v === null) {
			$this->setFkCiclolectivoId(NULL);
		} else {
			$this->setFkCiclolectivoId($v->getId());
		}

		$this->aCiclolectivo = $v;

						if ($v !== null) {
			$v->addPeriodo($this);
		}

		return $this;
	}


	
	public function getCiclolectivo(PropelPDO $con = null)
	{
		if ($this->aCiclolectivo === null && ($this->fk_ciclolectivo_id !== null)) {
			$c = new Criteria(CiclolectivoPeer::DATABASE_NAME);
			$c->add(CiclolectivoPeer::ID, $this->fk_ciclolectivo_id);
			$this->aCiclolectivo = CiclolectivoPeer::doSelectOne($c, $con);
			
		}
		return $this->aCiclolectivo;
	}

	
	public function clearBoletinConceptuals()
	{
		$this->collBoletinConceptuals = null; 	}

	
	public function initBoletinConceptuals()
	{
		$this->collBoletinConceptuals = array();
	}

	
	public function getBoletinConceptuals($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinConceptuals === null) {
			if ($this->isNew()) {
			   $this->collBoletinConceptuals = array();
			} else {

				$criteria->add(BoletinConceptualPeer::FK_PERIODO_ID, $this->id);

				BoletinConceptualPeer::addSelectColumns($criteria);
				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BoletinConceptualPeer::FK_PERIODO_ID, $this->id);

				BoletinConceptualPeer::addSelectColumns($criteria);
				if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
					$this->collBoletinConceptuals = BoletinConceptualPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBoletinConceptualCriteria = $criteria;
		return $this->collBoletinConceptuals;
	}

	
	public function countBoletinConceptuals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collBoletinConceptuals === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(BoletinConceptualPeer::FK_PERIODO_ID, $this->id);

				$count = BoletinConceptualPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BoletinConceptualPeer::FK_PERIODO_ID, $this->id);

				if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
					$count = BoletinConceptualPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collBoletinConceptuals);
				}
			} else {
				$count = count($this->collBoletinConceptuals);
			}
		}
		return $count;
	}

	
	public function addBoletinConceptual(BoletinConceptual $l)
	{
		if ($this->collBoletinConceptuals === null) {
			$this->initBoletinConceptuals();
		}
		if (!in_array($l, $this->collBoletinConceptuals, true)) { 			array_push($this->collBoletinConceptuals, $l);
			$l->setPeriodo($this);
		}
	}


	
	public function getBoletinConceptualsJoinEscalanota($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinConceptuals === null) {
			if ($this->isNew()) {
				$this->collBoletinConceptuals = array();
			} else {

				$criteria->add(BoletinConceptualPeer::FK_PERIODO_ID, $this->id);

				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinEscalanota($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(BoletinConceptualPeer::FK_PERIODO_ID, $this->id);

			if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinEscalanota($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletinConceptualCriteria = $criteria;

		return $this->collBoletinConceptuals;
	}


	
	public function getBoletinConceptualsJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinConceptuals === null) {
			if ($this->isNew()) {
				$this->collBoletinConceptuals = array();
			} else {

				$criteria->add(BoletinConceptualPeer::FK_PERIODO_ID, $this->id);

				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(BoletinConceptualPeer::FK_PERIODO_ID, $this->id);

			if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletinConceptualCriteria = $criteria;

		return $this->collBoletinConceptuals;
	}


	
	public function getBoletinConceptualsJoinConcepto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinConceptuals === null) {
			if ($this->isNew()) {
				$this->collBoletinConceptuals = array();
			} else {

				$criteria->add(BoletinConceptualPeer::FK_PERIODO_ID, $this->id);

				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinConcepto($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(BoletinConceptualPeer::FK_PERIODO_ID, $this->id);

			if (!isset($this->lastBoletinConceptualCriteria) || !$this->lastBoletinConceptualCriteria->equals($criteria)) {
				$this->collBoletinConceptuals = BoletinConceptualPeer::doSelectJoinConcepto($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletinConceptualCriteria = $criteria;

		return $this->collBoletinConceptuals;
	}

	
	public function clearBoletinActividadess()
	{
		$this->collBoletinActividadess = null; 	}

	
	public function initBoletinActividadess()
	{
		$this->collBoletinActividadess = array();
	}

	
	public function getBoletinActividadess($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
			   $this->collBoletinActividadess = array();
			} else {

				$criteria->add(BoletinActividadesPeer::FK_PERIODO_ID, $this->id);

				BoletinActividadesPeer::addSelectColumns($criteria);
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BoletinActividadesPeer::FK_PERIODO_ID, $this->id);

				BoletinActividadesPeer::addSelectColumns($criteria);
				if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
					$this->collBoletinActividadess = BoletinActividadesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;
		return $this->collBoletinActividadess;
	}

	
	public function countBoletinActividadess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(BoletinActividadesPeer::FK_PERIODO_ID, $this->id);

				$count = BoletinActividadesPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BoletinActividadesPeer::FK_PERIODO_ID, $this->id);

				if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
					$count = BoletinActividadesPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collBoletinActividadess);
				}
			} else {
				$count = count($this->collBoletinActividadess);
			}
		}
		return $count;
	}

	
	public function addBoletinActividades(BoletinActividades $l)
	{
		if ($this->collBoletinActividadess === null) {
			$this->initBoletinActividadess();
		}
		if (!in_array($l, $this->collBoletinActividadess, true)) { 			array_push($this->collBoletinActividadess, $l);
			$l->setPeriodo($this);
		}
	}


	
	public function getBoletinActividadessJoinEscalanota($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
				$this->collBoletinActividadess = array();
			} else {

				$criteria->add(BoletinActividadesPeer::FK_PERIODO_ID, $this->id);

				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinEscalanota($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(BoletinActividadesPeer::FK_PERIODO_ID, $this->id);

			if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinEscalanota($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;

		return $this->collBoletinActividadess;
	}


	
	public function getBoletinActividadessJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
				$this->collBoletinActividadess = array();
			} else {

				$criteria->add(BoletinActividadesPeer::FK_PERIODO_ID, $this->id);

				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(BoletinActividadesPeer::FK_PERIODO_ID, $this->id);

			if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;

		return $this->collBoletinActividadess;
	}


	
	public function getBoletinActividadessJoinActividad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletinActividadess === null) {
			if ($this->isNew()) {
				$this->collBoletinActividadess = array();
			} else {

				$criteria->add(BoletinActividadesPeer::FK_PERIODO_ID, $this->id);

				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(BoletinActividadesPeer::FK_PERIODO_ID, $this->id);

			if (!isset($this->lastBoletinActividadesCriteria) || !$this->lastBoletinActividadesCriteria->equals($criteria)) {
				$this->collBoletinActividadess = BoletinActividadesPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletinActividadesCriteria = $criteria;

		return $this->collBoletinActividadess;
	}

	
	public function clearExamens()
	{
		$this->collExamens = null; 	}

	
	public function initExamens()
	{
		$this->collExamens = array();
	}

	
	public function getExamens($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExamens === null) {
			if ($this->isNew()) {
			   $this->collExamens = array();
			} else {

				$criteria->add(ExamenPeer::FK_PERIODO_ID, $this->id);

				ExamenPeer::addSelectColumns($criteria);
				$this->collExamens = ExamenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExamenPeer::FK_PERIODO_ID, $this->id);

				ExamenPeer::addSelectColumns($criteria);
				if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
					$this->collExamens = ExamenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastExamenCriteria = $criteria;
		return $this->collExamens;
	}

	
	public function countExamens(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collExamens === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ExamenPeer::FK_PERIODO_ID, $this->id);

				$count = ExamenPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExamenPeer::FK_PERIODO_ID, $this->id);

				if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
					$count = ExamenPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collExamens);
				}
			} else {
				$count = count($this->collExamens);
			}
		}
		return $count;
	}

	
	public function addExamen(Examen $l)
	{
		if ($this->collExamens === null) {
			$this->initExamens();
		}
		if (!in_array($l, $this->collExamens, true)) { 			array_push($this->collExamens, $l);
			$l->setPeriodo($this);
		}
	}


	
	public function getExamensJoinEscalanota($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExamens === null) {
			if ($this->isNew()) {
				$this->collExamens = array();
			} else {

				$criteria->add(ExamenPeer::FK_PERIODO_ID, $this->id);

				$this->collExamens = ExamenPeer::doSelectJoinEscalanota($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ExamenPeer::FK_PERIODO_ID, $this->id);

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinEscalanota($criteria, $con, $join_behavior);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
	}


	
	public function getExamensJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExamens === null) {
			if ($this->isNew()) {
				$this->collExamens = array();
			} else {

				$criteria->add(ExamenPeer::FK_PERIODO_ID, $this->id);

				$this->collExamens = ExamenPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ExamenPeer::FK_PERIODO_ID, $this->id);

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
	}


	
	public function getExamensJoinActividad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExamens === null) {
			if ($this->isNew()) {
				$this->collExamens = array();
			} else {

				$criteria->add(ExamenPeer::FK_PERIODO_ID, $this->id);

				$this->collExamens = ExamenPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ExamenPeer::FK_PERIODO_ID, $this->id);

			if (!isset($this->lastExamenCriteria) || !$this->lastExamenCriteria->equals($criteria)) {
				$this->collExamens = ExamenPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		}
		$this->lastExamenCriteria = $criteria;

		return $this->collExamens;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collBoletinConceptuals) {
				foreach ((array) $this->collBoletinConceptuals as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collBoletinActividadess) {
				foreach ((array) $this->collBoletinActividadess as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collExamens) {
				foreach ((array) $this->collExamens as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collBoletinConceptuals = null;
		$this->collBoletinActividadess = null;
		$this->collExamens = null;
			$this->aCiclolectivo = null;
	}

} 