<?php


abstract class BaseFeriado extends BaseObject  implements Persistent {


  const PEER = 'FeriadoPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $fecha;

	
	protected $repeticion_anual;

	
	protected $inamovible;

	
	protected $fk_ciclolectivo_id;

	
	protected $aCiclolectivo;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->repeticion_anual = false;
		$this->inamovible = false;
		$this->fk_ciclolectivo_id = 0;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getNombre()
	{
		return $this->nombre;
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

	
	public function getRepeticionAnual()
	{
		return $this->repeticion_anual;
	}

	
	public function getInamovible()
	{
		return $this->inamovible;
	}

	
	public function getFkCiclolectivoId()
	{
		return $this->fk_ciclolectivo_id;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FeriadoPeer::ID;
		}

		return $this;
	} 
	
	public function setNombre($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = FeriadoPeer::NOMBRE;
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
				$this->modifiedColumns[] = FeriadoPeer::FECHA;
			}
		} 
		return $this;
	} 
	
	public function setRepeticionAnual($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->repeticion_anual !== $v || $v === false) {
			$this->repeticion_anual = $v;
			$this->modifiedColumns[] = FeriadoPeer::REPETICION_ANUAL;
		}

		return $this;
	} 
	
	public function setInamovible($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->inamovible !== $v || $v === false) {
			$this->inamovible = $v;
			$this->modifiedColumns[] = FeriadoPeer::INAMOVIBLE;
		}

		return $this;
	} 
	
	public function setFkCiclolectivoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_ciclolectivo_id !== $v || $v === 0) {
			$this->fk_ciclolectivo_id = $v;
			$this->modifiedColumns[] = FeriadoPeer::FK_CICLOLECTIVO_ID;
		}

		if ($this->aCiclolectivo !== null && $this->aCiclolectivo->getId() !== $v) {
			$this->aCiclolectivo = null;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(FeriadoPeer::REPETICION_ANUAL,FeriadoPeer::INAMOVIBLE,FeriadoPeer::FK_CICLOLECTIVO_ID))) {
				return false;
			}

			if ($this->repeticion_anual !== false) {
				return false;
			}

			if ($this->inamovible !== false) {
				return false;
			}

			if ($this->fk_ciclolectivo_id !== 0) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->nombre = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->fecha = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->repeticion_anual = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->inamovible = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->fk_ciclolectivo_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Feriado object", $e);
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
			$con = Propel::getConnection(FeriadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = FeriadoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aCiclolectivo = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FeriadoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			FeriadoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FeriadoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			FeriadoPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = FeriadoPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FeriadoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FeriadoPeer::doUpdate($this, $con);
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


												
			if ($this->aCiclolectivo !== null) {
				if (!$this->aCiclolectivo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCiclolectivo->getValidationFailures());
				}
			}


			if (($retval = FeriadoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FeriadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNombre();
				break;
			case 2:
				return $this->getFecha();
				break;
			case 3:
				return $this->getRepeticionAnual();
				break;
			case 4:
				return $this->getInamovible();
				break;
			case 5:
				return $this->getFkCiclolectivoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = FeriadoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getFecha(),
			$keys[3] => $this->getRepeticionAnual(),
			$keys[4] => $this->getInamovible(),
			$keys[5] => $this->getFkCiclolectivoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FeriadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
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
				$this->setFecha($value);
				break;
			case 3:
				$this->setRepeticionAnual($value);
				break;
			case 4:
				$this->setInamovible($value);
				break;
			case 5:
				$this->setFkCiclolectivoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FeriadoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecha($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRepeticionAnual($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setInamovible($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFkCiclolectivoId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FeriadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(FeriadoPeer::ID)) $criteria->add(FeriadoPeer::ID, $this->id);
		if ($this->isColumnModified(FeriadoPeer::NOMBRE)) $criteria->add(FeriadoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(FeriadoPeer::FECHA)) $criteria->add(FeriadoPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(FeriadoPeer::REPETICION_ANUAL)) $criteria->add(FeriadoPeer::REPETICION_ANUAL, $this->repeticion_anual);
		if ($this->isColumnModified(FeriadoPeer::INAMOVIBLE)) $criteria->add(FeriadoPeer::INAMOVIBLE, $this->inamovible);
		if ($this->isColumnModified(FeriadoPeer::FK_CICLOLECTIVO_ID)) $criteria->add(FeriadoPeer::FK_CICLOLECTIVO_ID, $this->fk_ciclolectivo_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FeriadoPeer::DATABASE_NAME);

		$criteria->add(FeriadoPeer::ID, $this->id);

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

		$copyObj->setNombre($this->nombre);

		$copyObj->setFecha($this->fecha);

		$copyObj->setRepeticionAnual($this->repeticion_anual);

		$copyObj->setInamovible($this->inamovible);

		$copyObj->setFkCiclolectivoId($this->fk_ciclolectivo_id);


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
			self::$peer = new FeriadoPeer();
		}
		return self::$peer;
	}

	
	public function setCiclolectivo(Ciclolectivo $v = null)
	{
		if ($v === null) {
			$this->setFkCiclolectivoId(0);
		} else {
			$this->setFkCiclolectivoId($v->getId());
		}

		$this->aCiclolectivo = $v;

						if ($v !== null) {
			$v->addFeriado($this);
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

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aCiclolectivo = null;
	}

} 