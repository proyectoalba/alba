<?php


abstract class BaseEspacio extends BaseObject  implements Persistent {


  const PEER = 'EspacioPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $m2;

	
	protected $capacidad;

	
	protected $descripcion;

	
	protected $estado;

	
	protected $fk_tipoespacio_id;

	
	protected $fk_locacion_id;

	
	protected $aTipoespacio;

	
	protected $aLocacion;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->fk_locacion_id = 0;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getNombre()
	{
		return $this->nombre;
	}

	
	public function getM2()
	{
		return $this->m2;
	}

	
	public function getCapacidad()
	{
		return $this->capacidad;
	}

	
	public function getDescripcion()
	{
		return $this->descripcion;
	}

	
	public function getEstado()
	{
		return $this->estado;
	}

	
	public function getFkTipoespacioId()
	{
		return $this->fk_tipoespacio_id;
	}

	
	public function getFkLocacionId()
	{
		return $this->fk_locacion_id;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = EspacioPeer::ID;
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
			$this->modifiedColumns[] = EspacioPeer::NOMBRE;
		}

		return $this;
	} 
	
	public function setM2($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->m2 !== $v) {
			$this->m2 = $v;
			$this->modifiedColumns[] = EspacioPeer::M2;
		}

		return $this;
	} 
	
	public function setCapacidad($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->capacidad !== $v) {
			$this->capacidad = $v;
			$this->modifiedColumns[] = EspacioPeer::CAPACIDAD;
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
			$this->modifiedColumns[] = EspacioPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setEstado($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->estado !== $v) {
			$this->estado = $v;
			$this->modifiedColumns[] = EspacioPeer::ESTADO;
		}

		return $this;
	} 
	
	public function setFkTipoespacioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_tipoespacio_id !== $v) {
			$this->fk_tipoespacio_id = $v;
			$this->modifiedColumns[] = EspacioPeer::FK_TIPOESPACIO_ID;
		}

		if ($this->aTipoespacio !== null && $this->aTipoespacio->getId() !== $v) {
			$this->aTipoespacio = null;
		}

		return $this;
	} 
	
	public function setFkLocacionId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_locacion_id !== $v || $v === 0) {
			$this->fk_locacion_id = $v;
			$this->modifiedColumns[] = EspacioPeer::FK_LOCACION_ID;
		}

		if ($this->aLocacion !== null && $this->aLocacion->getId() !== $v) {
			$this->aLocacion = null;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(EspacioPeer::FK_LOCACION_ID))) {
				return false;
			}

			if ($this->fk_locacion_id !== 0) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->nombre = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->m2 = ($row[$startcol + 2] !== null) ? (double) $row[$startcol + 2] : null;
			$this->capacidad = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->descripcion = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->estado = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->fk_tipoespacio_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->fk_locacion_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Espacio object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aTipoespacio !== null && $this->fk_tipoespacio_id !== $this->aTipoespacio->getId()) {
			$this->aTipoespacio = null;
		}
		if ($this->aLocacion !== null && $this->fk_locacion_id !== $this->aLocacion->getId()) {
			$this->aLocacion = null;
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
			$con = Propel::getConnection(EspacioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = EspacioPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aTipoespacio = null;
			$this->aLocacion = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EspacioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			EspacioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EspacioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			EspacioPeer::addInstanceToPool($this);
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

												
			if ($this->aTipoespacio !== null) {
				if ($this->aTipoespacio->isModified() || $this->aTipoespacio->isNew()) {
					$affectedRows += $this->aTipoespacio->save($con);
				}
				$this->setTipoespacio($this->aTipoespacio);
			}

			if ($this->aLocacion !== null) {
				if ($this->aLocacion->isModified() || $this->aLocacion->isNew()) {
					$affectedRows += $this->aLocacion->save($con);
				}
				$this->setLocacion($this->aLocacion);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = EspacioPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EspacioPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EspacioPeer::doUpdate($this, $con);
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


												
			if ($this->aTipoespacio !== null) {
				if (!$this->aTipoespacio->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipoespacio->getValidationFailures());
				}
			}

			if ($this->aLocacion !== null) {
				if (!$this->aLocacion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLocacion->getValidationFailures());
				}
			}


			if (($retval = EspacioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EspacioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getM2();
				break;
			case 3:
				return $this->getCapacidad();
				break;
			case 4:
				return $this->getDescripcion();
				break;
			case 5:
				return $this->getEstado();
				break;
			case 6:
				return $this->getFkTipoespacioId();
				break;
			case 7:
				return $this->getFkLocacionId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = EspacioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getM2(),
			$keys[3] => $this->getCapacidad(),
			$keys[4] => $this->getDescripcion(),
			$keys[5] => $this->getEstado(),
			$keys[6] => $this->getFkTipoespacioId(),
			$keys[7] => $this->getFkLocacionId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EspacioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setM2($value);
				break;
			case 3:
				$this->setCapacidad($value);
				break;
			case 4:
				$this->setDescripcion($value);
				break;
			case 5:
				$this->setEstado($value);
				break;
			case 6:
				$this->setFkTipoespacioId($value);
				break;
			case 7:
				$this->setFkLocacionId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EspacioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setM2($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCapacidad($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescripcion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEstado($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFkTipoespacioId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFkLocacionId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EspacioPeer::DATABASE_NAME);

		if ($this->isColumnModified(EspacioPeer::ID)) $criteria->add(EspacioPeer::ID, $this->id);
		if ($this->isColumnModified(EspacioPeer::NOMBRE)) $criteria->add(EspacioPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(EspacioPeer::M2)) $criteria->add(EspacioPeer::M2, $this->m2);
		if ($this->isColumnModified(EspacioPeer::CAPACIDAD)) $criteria->add(EspacioPeer::CAPACIDAD, $this->capacidad);
		if ($this->isColumnModified(EspacioPeer::DESCRIPCION)) $criteria->add(EspacioPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(EspacioPeer::ESTADO)) $criteria->add(EspacioPeer::ESTADO, $this->estado);
		if ($this->isColumnModified(EspacioPeer::FK_TIPOESPACIO_ID)) $criteria->add(EspacioPeer::FK_TIPOESPACIO_ID, $this->fk_tipoespacio_id);
		if ($this->isColumnModified(EspacioPeer::FK_LOCACION_ID)) $criteria->add(EspacioPeer::FK_LOCACION_ID, $this->fk_locacion_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EspacioPeer::DATABASE_NAME);

		$criteria->add(EspacioPeer::ID, $this->id);

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

		$copyObj->setM2($this->m2);

		$copyObj->setCapacidad($this->capacidad);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setEstado($this->estado);

		$copyObj->setFkTipoespacioId($this->fk_tipoespacio_id);

		$copyObj->setFkLocacionId($this->fk_locacion_id);


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
			self::$peer = new EspacioPeer();
		}
		return self::$peer;
	}

	
	public function setTipoespacio(Tipoespacio $v = null)
	{
		if ($v === null) {
			$this->setFkTipoespacioId(NULL);
		} else {
			$this->setFkTipoespacioId($v->getId());
		}

		$this->aTipoespacio = $v;

						if ($v !== null) {
			$v->addEspacio($this);
		}

		return $this;
	}


	
	public function getTipoespacio(PropelPDO $con = null)
	{
		if ($this->aTipoespacio === null && ($this->fk_tipoespacio_id !== null)) {
			$c = new Criteria(TipoespacioPeer::DATABASE_NAME);
			$c->add(TipoespacioPeer::ID, $this->fk_tipoespacio_id);
			$this->aTipoespacio = TipoespacioPeer::doSelectOne($c, $con);
			
		}
		return $this->aTipoespacio;
	}

	
	public function setLocacion(Locacion $v = null)
	{
		if ($v === null) {
			$this->setFkLocacionId(0);
		} else {
			$this->setFkLocacionId($v->getId());
		}

		$this->aLocacion = $v;

						if ($v !== null) {
			$v->addEspacio($this);
		}

		return $this;
	}


	
	public function getLocacion(PropelPDO $con = null)
	{
		if ($this->aLocacion === null && ($this->fk_locacion_id !== null)) {
			$c = new Criteria(LocacionPeer::DATABASE_NAME);
			$c->add(LocacionPeer::ID, $this->fk_locacion_id);
			$this->aLocacion = LocacionPeer::doSelectOne($c, $con);
			
		}
		return $this->aLocacion;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aTipoespacio = null;
			$this->aLocacion = null;
	}

} 