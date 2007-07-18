<?php


abstract class BaseDocenteHorario extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fk_docente_id;


	
	protected $fk_evento_id;

	
	protected $aEvento;

	
	protected $aDocente;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getFkDocenteId()
	{

		return $this->fk_docente_id;
	}

	
	public function getFkEventoId()
	{

		return $this->fk_evento_id;
	}

	
	public function setFkDocenteId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_docente_id !== $v) {
			$this->fk_docente_id = $v;
			$this->modifiedColumns[] = DocenteHorarioPeer::FK_DOCENTE_ID;
		}

		if ($this->aDocente !== null && $this->aDocente->getId() !== $v) {
			$this->aDocente = null;
		}

	} 
	
	public function setFkEventoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_evento_id !== $v) {
			$this->fk_evento_id = $v;
			$this->modifiedColumns[] = DocenteHorarioPeer::FK_EVENTO_ID;
		}

		if ($this->aEvento !== null && $this->aEvento->getId() !== $v) {
			$this->aEvento = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->fk_docente_id = $rs->getInt($startcol + 0);

			$this->fk_evento_id = $rs->getInt($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DocenteHorario object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DocenteHorarioPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DocenteHorarioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DocenteHorarioPeer::DATABASE_NAME);
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


												
			if ($this->aEvento !== null) {
				if ($this->aEvento->isModified()) {
					$affectedRows += $this->aEvento->save($con);
				}
				$this->setEvento($this->aEvento);
			}

			if ($this->aDocente !== null) {
				if ($this->aDocente->isModified()) {
					$affectedRows += $this->aDocente->save($con);
				}
				$this->setDocente($this->aDocente);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DocenteHorarioPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += DocenteHorarioPeer::doUpdate($this, $con);
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


												
			if ($this->aEvento !== null) {
				if (!$this->aEvento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEvento->getValidationFailures());
				}
			}

			if ($this->aDocente !== null) {
				if (!$this->aDocente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDocente->getValidationFailures());
				}
			}


			if (($retval = DocenteHorarioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DocenteHorarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFkDocenteId();
				break;
			case 1:
				return $this->getFkEventoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DocenteHorarioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFkDocenteId(),
			$keys[1] => $this->getFkEventoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DocenteHorarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFkDocenteId($value);
				break;
			case 1:
				$this->setFkEventoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DocenteHorarioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFkDocenteId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkEventoId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DocenteHorarioPeer::DATABASE_NAME);

		if ($this->isColumnModified(DocenteHorarioPeer::FK_DOCENTE_ID)) $criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->fk_docente_id);
		if ($this->isColumnModified(DocenteHorarioPeer::FK_EVENTO_ID)) $criteria->add(DocenteHorarioPeer::FK_EVENTO_ID, $this->fk_evento_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DocenteHorarioPeer::DATABASE_NAME);

		$criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->fk_docente_id);
		$criteria->add(DocenteHorarioPeer::FK_EVENTO_ID, $this->fk_evento_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getFkDocenteId();

		$pks[1] = $this->getFkEventoId();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setFkDocenteId($keys[0]);

		$this->setFkEventoId($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{


		$copyObj->setNew(true);

		$copyObj->setFkDocenteId(NULL); 
		$copyObj->setFkEventoId(NULL); 
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
			self::$peer = new DocenteHorarioPeer();
		}
		return self::$peer;
	}

	
	public function setEvento($v)
	{


		if ($v === null) {
			$this->setFkEventoId(NULL);
		} else {
			$this->setFkEventoId($v->getId());
		}


		$this->aEvento = $v;
	}


	
	public function getEvento($con = null)
	{
				include_once 'lib/model/om/BaseEventoPeer.php';

		if ($this->aEvento === null && ($this->fk_evento_id !== null)) {

			$this->aEvento = EventoPeer::retrieveByPK($this->fk_evento_id, $con);

			
		}
		return $this->aEvento;
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