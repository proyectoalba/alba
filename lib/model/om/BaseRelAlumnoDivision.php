<?php


abstract class BaseRelAlumnoDivision extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fk_division_id = 0;


	
	protected $fk_alumno_id = 0;

	
	protected $aAlumno;

	
	protected $aDivision;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFkDivisionId()
	{

		return $this->fk_division_id;
	}

	
	public function getFkAlumnoId()
	{

		return $this->fk_alumno_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RelAlumnoDivisionPeer::ID;
		}

	} 
	
	public function setFkDivisionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_division_id !== $v || $v === 0) {
			$this->fk_division_id = $v;
			$this->modifiedColumns[] = RelAlumnoDivisionPeer::FK_DIVISION_ID;
		}

		if ($this->aDivision !== null && $this->aDivision->getId() !== $v) {
			$this->aDivision = null;
		}

	} 
	
	public function setFkAlumnoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_alumno_id !== $v || $v === 0) {
			$this->fk_alumno_id = $v;
			$this->modifiedColumns[] = RelAlumnoDivisionPeer::FK_ALUMNO_ID;
		}

		if ($this->aAlumno !== null && $this->aAlumno->getId() !== $v) {
			$this->aAlumno = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fk_division_id = $rs->getInt($startcol + 1);

			$this->fk_alumno_id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RelAlumnoDivision object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelAlumnoDivisionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RelAlumnoDivisionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RelAlumnoDivisionPeer::DATABASE_NAME);
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


												
			if ($this->aAlumno !== null) {
				if ($this->aAlumno->isModified()) {
					$affectedRows += $this->aAlumno->save($con);
				}
				$this->setAlumno($this->aAlumno);
			}

			if ($this->aDivision !== null) {
				if ($this->aDivision->isModified()) {
					$affectedRows += $this->aDivision->save($con);
				}
				$this->setDivision($this->aDivision);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RelAlumnoDivisionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RelAlumnoDivisionPeer::doUpdate($this, $con);
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

			if ($this->aDivision !== null) {
				if (!$this->aDivision->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDivision->getValidationFailures());
				}
			}


			if (($retval = RelAlumnoDivisionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelAlumnoDivisionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFkDivisionId();
				break;
			case 2:
				return $this->getFkAlumnoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelAlumnoDivisionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkDivisionId(),
			$keys[2] => $this->getFkAlumnoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelAlumnoDivisionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkDivisionId($value);
				break;
			case 2:
				$this->setFkAlumnoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelAlumnoDivisionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkDivisionId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkAlumnoId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RelAlumnoDivisionPeer::DATABASE_NAME);

		if ($this->isColumnModified(RelAlumnoDivisionPeer::ID)) $criteria->add(RelAlumnoDivisionPeer::ID, $this->id);
		if ($this->isColumnModified(RelAlumnoDivisionPeer::FK_DIVISION_ID)) $criteria->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->fk_division_id);
		if ($this->isColumnModified(RelAlumnoDivisionPeer::FK_ALUMNO_ID)) $criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->fk_alumno_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RelAlumnoDivisionPeer::DATABASE_NAME);

		$criteria->add(RelAlumnoDivisionPeer::ID, $this->id);

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

		$copyObj->setFkDivisionId($this->fk_division_id);

		$copyObj->setFkAlumnoId($this->fk_alumno_id);


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
			self::$peer = new RelAlumnoDivisionPeer();
		}
		return self::$peer;
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

	
	public function setDivision($v)
	{


		if ($v === null) {
			$this->setFkDivisionId('0');
		} else {
			$this->setFkDivisionId($v->getId());
		}


		$this->aDivision = $v;
	}


	
	public function getDivision($con = null)
	{
				include_once 'lib/model/om/BaseDivisionPeer.php';

		if ($this->aDivision === null && ($this->fk_division_id !== null)) {

			$this->aDivision = DivisionPeer::retrieveByPK($this->fk_division_id, $con);

			
		}
		return $this->aDivision;
	}

} 