<?php


abstract class BaseRelAnioActividadDocente extends BaseObject  implements Persistent {


  const PEER = 'RelAnioActividadDocentePeer';

	
	protected static $peer;

	
	protected $fk_anio_actividad_id;

	
	protected $fk_docente_id;

	
	protected $aRelAnioActividad;

	
	protected $aDocente;

	
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

	
	public function getFkAnioActividadId()
	{
		return $this->fk_anio_actividad_id;
	}

	
	public function getFkDocenteId()
	{
		return $this->fk_docente_id;
	}

	
	public function setFkAnioActividadId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_anio_actividad_id !== $v) {
			$this->fk_anio_actividad_id = $v;
			$this->modifiedColumns[] = RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID;
		}

		if ($this->aRelAnioActividad !== null && $this->aRelAnioActividad->getId() !== $v) {
			$this->aRelAnioActividad = null;
		}

		return $this;
	} 
	
	public function setFkDocenteId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_docente_id !== $v) {
			$this->fk_docente_id = $v;
			$this->modifiedColumns[] = RelAnioActividadDocentePeer::FK_DOCENTE_ID;
		}

		if ($this->aDocente !== null && $this->aDocente->getId() !== $v) {
			$this->aDocente = null;
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

			$this->fk_anio_actividad_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_docente_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RelAnioActividadDocente object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aRelAnioActividad !== null && $this->fk_anio_actividad_id !== $this->aRelAnioActividad->getId()) {
			$this->aRelAnioActividad = null;
		}
		if ($this->aDocente !== null && $this->fk_docente_id !== $this->aDocente->getId()) {
			$this->aDocente = null;
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
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = RelAnioActividadDocentePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aRelAnioActividad = null;
			$this->aDocente = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			RelAnioActividadDocentePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			RelAnioActividadDocentePeer::addInstanceToPool($this);
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

												
			if ($this->aRelAnioActividad !== null) {
				if ($this->aRelAnioActividad->isModified() || $this->aRelAnioActividad->isNew()) {
					$affectedRows += $this->aRelAnioActividad->save($con);
				}
				$this->setRelAnioActividad($this->aRelAnioActividad);
			}

			if ($this->aDocente !== null) {
				if ($this->aDocente->isModified() || $this->aDocente->isNew()) {
					$affectedRows += $this->aDocente->save($con);
				}
				$this->setDocente($this->aDocente);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RelAnioActividadDocentePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += RelAnioActividadDocentePeer::doUpdate($this, $con);
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


												
			if ($this->aRelAnioActividad !== null) {
				if (!$this->aRelAnioActividad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRelAnioActividad->getValidationFailures());
				}
			}

			if ($this->aDocente !== null) {
				if (!$this->aDocente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDocente->getValidationFailures());
				}
			}


			if (($retval = RelAnioActividadDocentePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelAnioActividadDocentePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFkAnioActividadId();
				break;
			case 1:
				return $this->getFkDocenteId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = RelAnioActividadDocentePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFkAnioActividadId(),
			$keys[1] => $this->getFkDocenteId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelAnioActividadDocentePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFkAnioActividadId($value);
				break;
			case 1:
				$this->setFkDocenteId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelAnioActividadDocentePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFkAnioActividadId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkDocenteId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RelAnioActividadDocentePeer::DATABASE_NAME);

		if ($this->isColumnModified(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID)) $criteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $this->fk_anio_actividad_id);
		if ($this->isColumnModified(RelAnioActividadDocentePeer::FK_DOCENTE_ID)) $criteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $this->fk_docente_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RelAnioActividadDocentePeer::DATABASE_NAME);

		$criteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $this->fk_anio_actividad_id);
		$criteria->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $this->fk_docente_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getFkAnioActividadId();

		$pks[1] = $this->getFkDocenteId();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setFkAnioActividadId($keys[0]);

		$this->setFkDocenteId($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFkAnioActividadId($this->fk_anio_actividad_id);

		$copyObj->setFkDocenteId($this->fk_docente_id);


		$copyObj->setNew(true);

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
			self::$peer = new RelAnioActividadDocentePeer();
		}
		return self::$peer;
	}

	
	public function setRelAnioActividad(RelAnioActividad $v = null)
	{
		if ($v === null) {
			$this->setFkAnioActividadId(NULL);
		} else {
			$this->setFkAnioActividadId($v->getId());
		}

		$this->aRelAnioActividad = $v;

						if ($v !== null) {
			$v->addRelAnioActividadDocente($this);
		}

		return $this;
	}


	
	public function getRelAnioActividad(PropelPDO $con = null)
	{
		if ($this->aRelAnioActividad === null && ($this->fk_anio_actividad_id !== null)) {
			$c = new Criteria(RelAnioActividadPeer::DATABASE_NAME);
			$c->add(RelAnioActividadPeer::ID, $this->fk_anio_actividad_id);
			$this->aRelAnioActividad = RelAnioActividadPeer::doSelectOne($c, $con);
			
		}
		return $this->aRelAnioActividad;
	}

	
	public function setDocente(Docente $v = null)
	{
		if ($v === null) {
			$this->setFkDocenteId(NULL);
		} else {
			$this->setFkDocenteId($v->getId());
		}

		$this->aDocente = $v;

						if ($v !== null) {
			$v->addRelAnioActividadDocente($this);
		}

		return $this;
	}


	
	public function getDocente(PropelPDO $con = null)
	{
		if ($this->aDocente === null && ($this->fk_docente_id !== null)) {
			$c = new Criteria(DocentePeer::DATABASE_NAME);
			$c->add(DocentePeer::ID, $this->fk_docente_id);
			$this->aDocente = DocentePeer::doSelectOne($c, $con);
			
		}
		return $this->aDocente;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aRelAnioActividad = null;
			$this->aDocente = null;
	}

} 