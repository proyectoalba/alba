<?php


abstract class BaseRelAnioActividadDocente extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fk_anio_actividad_id;


	
	protected $fk_docente_id;

	
	protected $aRelAnioActividad;

	
	protected $aDocente;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
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

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_anio_actividad_id !== $v) {
			$this->fk_anio_actividad_id = $v;
			$this->modifiedColumns[] = RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID;
		}

		if ($this->aRelAnioActividad !== null && $this->aRelAnioActividad->getId() !== $v) {
			$this->aRelAnioActividad = null;
		}

	} 
	
	public function setFkDocenteId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_docente_id !== $v) {
			$this->fk_docente_id = $v;
			$this->modifiedColumns[] = RelAnioActividadDocentePeer::FK_DOCENTE_ID;
		}

		if ($this->aDocente !== null && $this->aDocente->getId() !== $v) {
			$this->aDocente = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->fk_anio_actividad_id = $rs->getInt($startcol + 0);

			$this->fk_docente_id = $rs->getInt($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RelAnioActividadDocente object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RelAnioActividadDocentePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadDocentePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aRelAnioActividad !== null) {
				if ($this->aRelAnioActividad->isModified()) {
					$affectedRows += $this->aRelAnioActividad->save($con);
				}
				$this->setRelAnioActividad($this->aRelAnioActividad);
			}

			if ($this->aDocente !== null) {
				if ($this->aDocente->isModified()) {
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
		return $this->getByPosition($pos);
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

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
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


		$copyObj->setNew(true);

		$copyObj->setFkAnioActividadId(NULL); 
		$copyObj->setFkDocenteId(NULL); 
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

	
	public function setRelAnioActividad($v)
	{


		if ($v === null) {
			$this->setFkAnioActividadId(NULL);
		} else {
			$this->setFkAnioActividadId($v->getId());
		}


		$this->aRelAnioActividad = $v;
	}


	
	public function getRelAnioActividad($con = null)
	{
				include_once 'lib/model/om/BaseRelAnioActividadPeer.php';

		if ($this->aRelAnioActividad === null && ($this->fk_anio_actividad_id !== null)) {

			$this->aRelAnioActividad = RelAnioActividadPeer::retrieveByPK($this->fk_anio_actividad_id, $con);

			
		}
		return $this->aRelAnioActividad;
	}

	
	public function setDocente($v)
	{


		if ($v === null) {
			$this->setFkDocenteId(NULL);
		} else {
			$this->setFkDocenteId($v->getId());
		}


		$this->aDocente = $v;
	}


	
	public function getDocente($con = null)
	{
				include_once 'lib/model/om/BaseDocentePeer.php';

		if ($this->aDocente === null && ($this->fk_docente_id !== null)) {

			$this->aDocente = DocentePeer::retrieveByPK($this->fk_docente_id, $con);

			
		}
		return $this->aDocente;
	}

} 