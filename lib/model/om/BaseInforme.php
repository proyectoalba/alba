<?php


abstract class BaseInforme extends BaseObject  implements Persistent {


  const PEER = 'InformePeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $descripcion;

	
	protected $fk_adjunto_id;

	
	protected $fk_tipoinforme_id;

	
	protected $listado;

	
	protected $variables;

	
	protected $aAdjunto;

	
	protected $aTipoinforme;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->listado = false;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getNombre()
	{
		return $this->nombre;
	}

	
	public function getDescripcion()
	{
		return $this->descripcion;
	}

	
	public function getFkAdjuntoId()
	{
		return $this->fk_adjunto_id;
	}

	
	public function getFkTipoinformeId()
	{
		return $this->fk_tipoinforme_id;
	}

	
	public function getListado()
	{
		return $this->listado;
	}

	
	public function getVariables()
	{
		return $this->variables;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = InformePeer::ID;
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
			$this->modifiedColumns[] = InformePeer::NOMBRE;
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
			$this->modifiedColumns[] = InformePeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setFkAdjuntoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_adjunto_id !== $v) {
			$this->fk_adjunto_id = $v;
			$this->modifiedColumns[] = InformePeer::FK_ADJUNTO_ID;
		}

		if ($this->aAdjunto !== null && $this->aAdjunto->getId() !== $v) {
			$this->aAdjunto = null;
		}

		return $this;
	} 
	
	public function setFkTipoinformeId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_tipoinforme_id !== $v) {
			$this->fk_tipoinforme_id = $v;
			$this->modifiedColumns[] = InformePeer::FK_TIPOINFORME_ID;
		}

		if ($this->aTipoinforme !== null && $this->aTipoinforme->getId() !== $v) {
			$this->aTipoinforme = null;
		}

		return $this;
	} 
	
	public function setListado($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->listado !== $v || $v === false) {
			$this->listado = $v;
			$this->modifiedColumns[] = InformePeer::LISTADO;
		}

		return $this;
	} 
	
	public function setVariables($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->variables !== $v) {
			$this->variables = $v;
			$this->modifiedColumns[] = InformePeer::VARIABLES;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(InformePeer::LISTADO))) {
				return false;
			}

			if ($this->listado !== false) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->nombre = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->descripcion = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->fk_adjunto_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->fk_tipoinforme_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->listado = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->variables = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Informe object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aAdjunto !== null && $this->fk_adjunto_id !== $this->aAdjunto->getId()) {
			$this->aAdjunto = null;
		}
		if ($this->aTipoinforme !== null && $this->fk_tipoinforme_id !== $this->aTipoinforme->getId()) {
			$this->aTipoinforme = null;
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
			$con = Propel::getConnection(InformePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = InformePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aAdjunto = null;
			$this->aTipoinforme = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(InformePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			InformePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InformePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			InformePeer::addInstanceToPool($this);
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

												
			if ($this->aAdjunto !== null) {
				if ($this->aAdjunto->isModified() || $this->aAdjunto->isNew()) {
					$affectedRows += $this->aAdjunto->save($con);
				}
				$this->setAdjunto($this->aAdjunto);
			}

			if ($this->aTipoinforme !== null) {
				if ($this->aTipoinforme->isModified() || $this->aTipoinforme->isNew()) {
					$affectedRows += $this->aTipoinforme->save($con);
				}
				$this->setTipoinforme($this->aTipoinforme);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = InformePeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = InformePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InformePeer::doUpdate($this, $con);
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


												
			if ($this->aAdjunto !== null) {
				if (!$this->aAdjunto->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAdjunto->getValidationFailures());
				}
			}

			if ($this->aTipoinforme !== null) {
				if (!$this->aTipoinforme->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipoinforme->getValidationFailures());
				}
			}


			if (($retval = InformePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InformePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDescripcion();
				break;
			case 3:
				return $this->getFkAdjuntoId();
				break;
			case 4:
				return $this->getFkTipoinformeId();
				break;
			case 5:
				return $this->getListado();
				break;
			case 6:
				return $this->getVariables();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = InformePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getFkAdjuntoId(),
			$keys[4] => $this->getFkTipoinformeId(),
			$keys[5] => $this->getListado(),
			$keys[6] => $this->getVariables(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InformePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDescripcion($value);
				break;
			case 3:
				$this->setFkAdjuntoId($value);
				break;
			case 4:
				$this->setFkTipoinformeId($value);
				break;
			case 5:
				$this->setListado($value);
				break;
			case 6:
				$this->setVariables($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InformePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkAdjuntoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFkTipoinformeId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setListado($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setVariables($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InformePeer::DATABASE_NAME);

		if ($this->isColumnModified(InformePeer::ID)) $criteria->add(InformePeer::ID, $this->id);
		if ($this->isColumnModified(InformePeer::NOMBRE)) $criteria->add(InformePeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(InformePeer::DESCRIPCION)) $criteria->add(InformePeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(InformePeer::FK_ADJUNTO_ID)) $criteria->add(InformePeer::FK_ADJUNTO_ID, $this->fk_adjunto_id);
		if ($this->isColumnModified(InformePeer::FK_TIPOINFORME_ID)) $criteria->add(InformePeer::FK_TIPOINFORME_ID, $this->fk_tipoinforme_id);
		if ($this->isColumnModified(InformePeer::LISTADO)) $criteria->add(InformePeer::LISTADO, $this->listado);
		if ($this->isColumnModified(InformePeer::VARIABLES)) $criteria->add(InformePeer::VARIABLES, $this->variables);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InformePeer::DATABASE_NAME);

		$criteria->add(InformePeer::ID, $this->id);

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

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setFkAdjuntoId($this->fk_adjunto_id);

		$copyObj->setFkTipoinformeId($this->fk_tipoinforme_id);

		$copyObj->setListado($this->listado);

		$copyObj->setVariables($this->variables);


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
			self::$peer = new InformePeer();
		}
		return self::$peer;
	}

	
	public function setAdjunto(Adjunto $v = null)
	{
		if ($v === null) {
			$this->setFkAdjuntoId(NULL);
		} else {
			$this->setFkAdjuntoId($v->getId());
		}

		$this->aAdjunto = $v;

						if ($v !== null) {
			$v->addInforme($this);
		}

		return $this;
	}


	
	public function getAdjunto(PropelPDO $con = null)
	{
		if ($this->aAdjunto === null && ($this->fk_adjunto_id !== null)) {
			$c = new Criteria(AdjuntoPeer::DATABASE_NAME);
			$c->add(AdjuntoPeer::ID, $this->fk_adjunto_id);
			$this->aAdjunto = AdjuntoPeer::doSelectOne($c, $con);
			
		}
		return $this->aAdjunto;
	}

	
	public function setTipoinforme(Tipoinforme $v = null)
	{
		if ($v === null) {
			$this->setFkTipoinformeId(NULL);
		} else {
			$this->setFkTipoinformeId($v->getId());
		}

		$this->aTipoinforme = $v;

						if ($v !== null) {
			$v->addInforme($this);
		}

		return $this;
	}


	
	public function getTipoinforme(PropelPDO $con = null)
	{
		if ($this->aTipoinforme === null && ($this->fk_tipoinforme_id !== null)) {
			$c = new Criteria(TipoinformePeer::DATABASE_NAME);
			$c->add(TipoinformePeer::ID, $this->fk_tipoinforme_id);
			$this->aTipoinforme = TipoinformePeer::doSelectOne($c, $con);
			
		}
		return $this->aTipoinforme;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aAdjunto = null;
			$this->aTipoinforme = null;
	}

} 