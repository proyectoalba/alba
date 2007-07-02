<?php


abstract class BaseLegajocategoria extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $descripcion;

	
	protected $collLegajopedagogicos;

	
	protected $lastLegajopedagogicoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
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
			$this->modifiedColumns[] = LegajocategoriaPeer::ID;
		}

	} 
	
	public function setDescripcion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = LegajocategoriaPeer::DESCRIPCION;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->descripcion = $rs->getString($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Legajocategoria object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LegajocategoriaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LegajocategoriaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LegajocategoriaPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LegajocategoriaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LegajocategoriaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLegajopedagogicos !== null) {
				foreach($this->collLegajopedagogicos as $referrerFK) {
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


			if (($retval = LegajocategoriaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLegajopedagogicos !== null) {
					foreach($this->collLegajopedagogicos as $referrerFK) {
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
		$pos = LegajocategoriaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getDescripcion();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LegajocategoriaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDescripcion(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LegajocategoriaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDescripcion($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LegajocategoriaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescripcion($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LegajocategoriaPeer::DATABASE_NAME);

		if ($this->isColumnModified(LegajocategoriaPeer::ID)) $criteria->add(LegajocategoriaPeer::ID, $this->id);
		if ($this->isColumnModified(LegajocategoriaPeer::DESCRIPCION)) $criteria->add(LegajocategoriaPeer::DESCRIPCION, $this->descripcion);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LegajocategoriaPeer::DATABASE_NAME);

		$criteria->add(LegajocategoriaPeer::ID, $this->id);

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

		$copyObj->setDescripcion($this->descripcion);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLegajopedagogicos() as $relObj) {
				$copyObj->addLegajopedagogico($relObj->copy($deepCopy));
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
			self::$peer = new LegajocategoriaPeer();
		}
		return self::$peer;
	}

	
	public function initLegajopedagogicos()
	{
		if ($this->collLegajopedagogicos === null) {
			$this->collLegajopedagogicos = array();
		}
	}

	
	public function getLegajopedagogicos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLegajopedagogicoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
			   $this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->getId());

				LegajopedagogicoPeer::addSelectColumns($criteria);
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->getId());

				LegajopedagogicoPeer::addSelectColumns($criteria);
				if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
					$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;
		return $this->collLegajopedagogicos;
	}

	
	public function countLegajopedagogicos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLegajopedagogicoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->getId());

		return LegajopedagogicoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLegajopedagogico(Legajopedagogico $l)
	{
		$this->collLegajopedagogicos[] = $l;
		$l->setLegajocategoria($this);
	}


	
	public function getLegajopedagogicosJoinAlumno($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLegajopedagogicoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->getId());

				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinAlumno($criteria, $con);
			}
		} else {
									
			$criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->getId());

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinAlumno($criteria, $con);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}


	
	public function getLegajopedagogicosJoinUsuario($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLegajopedagogicoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->getId());

				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinUsuario($criteria, $con);
			}
		} else {
									
			$criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->getId());

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinUsuario($criteria, $con);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}

} 