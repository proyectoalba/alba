<?php


abstract class BaseRelRolresponsableResponsable extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fk_rolresponsable_id = 0;


	
	protected $fk_responsable_id = 0;


	
	protected $fk_alumno_id = 0;


	
	protected $descripcion = 'null';

	
	protected $aRolResponsable;

	
	protected $aResponsable;

	
	protected $aAlumno;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFkRolresponsableId()
	{

		return $this->fk_rolresponsable_id;
	}

	
	public function getFkResponsableId()
	{

		return $this->fk_responsable_id;
	}

	
	public function getFkAlumnoId()
	{

		return $this->fk_alumno_id;
	}

	
	public function getDescripcion()
	{

		return $this->descripcion;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RelRolresponsableResponsablePeer::ID;
		}

	} 
	
	public function setFkRolresponsableId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_rolresponsable_id !== $v || $v === 0) {
			$this->fk_rolresponsable_id = $v;
			$this->modifiedColumns[] = RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID;
		}

		if ($this->aRolResponsable !== null && $this->aRolResponsable->getId() !== $v) {
			$this->aRolResponsable = null;
		}

	} 
	
	public function setFkResponsableId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_responsable_id !== $v || $v === 0) {
			$this->fk_responsable_id = $v;
			$this->modifiedColumns[] = RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID;
		}

		if ($this->aResponsable !== null && $this->aResponsable->getId() !== $v) {
			$this->aResponsable = null;
		}

	} 
	
	public function setFkAlumnoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_alumno_id !== $v || $v === 0) {
			$this->fk_alumno_id = $v;
			$this->modifiedColumns[] = RelRolresponsableResponsablePeer::FK_ALUMNO_ID;
		}

		if ($this->aAlumno !== null && $this->aAlumno->getId() !== $v) {
			$this->aAlumno = null;
		}

	} 
	
	public function setDescripcion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descripcion !== $v || $v === 'null') {
			$this->descripcion = $v;
			$this->modifiedColumns[] = RelRolresponsableResponsablePeer::DESCRIPCION;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fk_rolresponsable_id = $rs->getInt($startcol + 1);

			$this->fk_responsable_id = $rs->getInt($startcol + 2);

			$this->fk_alumno_id = $rs->getInt($startcol + 3);

			$this->descripcion = $rs->getString($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RelRolresponsableResponsable object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RelRolresponsableResponsablePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RelRolresponsableResponsablePeer::DATABASE_NAME);
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


												
			if ($this->aRolResponsable !== null) {
				if ($this->aRolResponsable->isModified()) {
					$affectedRows += $this->aRolResponsable->save($con);
				}
				$this->setRolResponsable($this->aRolResponsable);
			}

			if ($this->aResponsable !== null) {
				if ($this->aResponsable->isModified()) {
					$affectedRows += $this->aResponsable->save($con);
				}
				$this->setResponsable($this->aResponsable);
			}

			if ($this->aAlumno !== null) {
				if ($this->aAlumno->isModified()) {
					$affectedRows += $this->aAlumno->save($con);
				}
				$this->setAlumno($this->aAlumno);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RelRolresponsableResponsablePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RelRolresponsableResponsablePeer::doUpdate($this, $con);
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


												
			if ($this->aRolResponsable !== null) {
				if (!$this->aRolResponsable->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRolResponsable->getValidationFailures());
				}
			}

			if ($this->aResponsable !== null) {
				if (!$this->aResponsable->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aResponsable->getValidationFailures());
				}
			}

			if ($this->aAlumno !== null) {
				if (!$this->aAlumno->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAlumno->getValidationFailures());
				}
			}


			if (($retval = RelRolresponsableResponsablePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelRolresponsableResponsablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFkRolresponsableId();
				break;
			case 2:
				return $this->getFkResponsableId();
				break;
			case 3:
				return $this->getFkAlumnoId();
				break;
			case 4:
				return $this->getDescripcion();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelRolresponsableResponsablePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkRolresponsableId(),
			$keys[2] => $this->getFkResponsableId(),
			$keys[3] => $this->getFkAlumnoId(),
			$keys[4] => $this->getDescripcion(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelRolresponsableResponsablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkRolresponsableId($value);
				break;
			case 2:
				$this->setFkResponsableId($value);
				break;
			case 3:
				$this->setFkAlumnoId($value);
				break;
			case 4:
				$this->setDescripcion($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelRolresponsableResponsablePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkRolresponsableId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkResponsableId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkAlumnoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescripcion($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RelRolresponsableResponsablePeer::DATABASE_NAME);

		if ($this->isColumnModified(RelRolresponsableResponsablePeer::ID)) $criteria->add(RelRolresponsableResponsablePeer::ID, $this->id);
		if ($this->isColumnModified(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID)) $criteria->add(RelRolresponsableResponsablePeer::FK_ROLRESPONSABLE_ID, $this->fk_rolresponsable_id);
		if ($this->isColumnModified(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID)) $criteria->add(RelRolresponsableResponsablePeer::FK_RESPONSABLE_ID, $this->fk_responsable_id);
		if ($this->isColumnModified(RelRolresponsableResponsablePeer::FK_ALUMNO_ID)) $criteria->add(RelRolresponsableResponsablePeer::FK_ALUMNO_ID, $this->fk_alumno_id);
		if ($this->isColumnModified(RelRolresponsableResponsablePeer::DESCRIPCION)) $criteria->add(RelRolresponsableResponsablePeer::DESCRIPCION, $this->descripcion);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RelRolresponsableResponsablePeer::DATABASE_NAME);

		$criteria->add(RelRolresponsableResponsablePeer::ID, $this->id);

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

		$copyObj->setFkRolresponsableId($this->fk_rolresponsable_id);

		$copyObj->setFkResponsableId($this->fk_responsable_id);

		$copyObj->setFkAlumnoId($this->fk_alumno_id);

		$copyObj->setDescripcion($this->descripcion);


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
			self::$peer = new RelRolresponsableResponsablePeer();
		}
		return self::$peer;
	}

	
	public function setRolResponsable($v)
	{


		if ($v === null) {
			$this->setFkRolresponsableId('0');
		} else {
			$this->setFkRolresponsableId($v->getId());
		}


		$this->aRolResponsable = $v;
	}


	
	public function getRolResponsable($con = null)
	{
				include_once 'lib/model/om/BaseRolResponsablePeer.php';

		if ($this->aRolResponsable === null && ($this->fk_rolresponsable_id !== null)) {

			$this->aRolResponsable = RolResponsablePeer::retrieveByPK($this->fk_rolresponsable_id, $con);

			
		}
		return $this->aRolResponsable;
	}

	
	public function setResponsable($v)
	{


		if ($v === null) {
			$this->setFkResponsableId('0');
		} else {
			$this->setFkResponsableId($v->getId());
		}


		$this->aResponsable = $v;
	}


	
	public function getResponsable($con = null)
	{
				include_once 'lib/model/om/BaseResponsablePeer.php';

		if ($this->aResponsable === null && ($this->fk_responsable_id !== null)) {

			$this->aResponsable = ResponsablePeer::retrieveByPK($this->fk_responsable_id, $con);

			
		}
		return $this->aResponsable;
	}

	
	public function setAlumno($v)
	{


		if ($v === null) {
			$this->setFkAlumnoId('0');
		} else {
			$this->setFkAlumnoId($v->getId());
		}


		$this->aAlumno = $v;
	}


	
	public function getAlumno($con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';

		if ($this->aAlumno === null && ($this->fk_alumno_id !== null)) {

			$this->aAlumno = AlumnoPeer::retrieveByPK($this->fk_alumno_id, $con);

			
		}
		return $this->aAlumno;
	}

} 