<?php


abstract class BaseLegajocategoria extends BaseObject  implements Persistent {


  const PEER = 'LegajocategoriaPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $descripcion;

	
	protected $collLegajopedagogicos;

	
	private $lastLegajopedagogicoCriteria = null;

	
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
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = LegajocategoriaPeer::ID;
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
			$this->modifiedColumns[] = LegajocategoriaPeer::DESCRIPCION;
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

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->descripcion = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Legajocategoria object", $e);
		}
	}

	
	public function ensureConsistency()
	{

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
			$con = Propel::getConnection(LegajocategoriaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = LegajocategoriaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collLegajopedagogicos = null;
			$this->lastLegajopedagogicoCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LegajocategoriaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			LegajocategoriaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LegajocategoriaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			LegajocategoriaPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = LegajocategoriaPeer::ID;
			}

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
				foreach ($this->collLegajopedagogicos as $referrerFK) {
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
					foreach ($this->collLegajopedagogicos as $referrerFK) {
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
				return $this->getDescripcion();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
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

			foreach ($this->getLegajopedagogicos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addLegajopedagogico($relObj->copy($deepCopy));
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
			self::$peer = new LegajocategoriaPeer();
		}
		return self::$peer;
	}

	
	public function clearLegajopedagogicos()
	{
		$this->collLegajopedagogicos = null; 	}

	
	public function initLegajopedagogicos()
	{
		$this->collLegajopedagogicos = array();
	}

	
	public function getLegajopedagogicos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LegajocategoriaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
			   $this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->id);

				LegajopedagogicoPeer::addSelectColumns($criteria);
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->id);

				LegajopedagogicoPeer::addSelectColumns($criteria);
				if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
					$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;
		return $this->collLegajopedagogicos;
	}

	
	public function countLegajopedagogicos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LegajocategoriaPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->id);

				$count = LegajopedagogicoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->id);

				if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
					$count = LegajopedagogicoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collLegajopedagogicos);
				}
			} else {
				$count = count($this->collLegajopedagogicos);
			}
		}
		return $count;
	}

	
	public function addLegajopedagogico(Legajopedagogico $l)
	{
		if ($this->collLegajopedagogicos === null) {
			$this->initLegajopedagogicos();
		}
		if (!in_array($l, $this->collLegajopedagogicos, true)) { 			array_push($this->collLegajopedagogicos, $l);
			$l->setLegajocategoria($this);
		}
	}


	
	public function getLegajopedagogicosJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LegajocategoriaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->id);

				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->id);

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}


	
	public function getLegajopedagogicosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LegajocategoriaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->id);

				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->id);

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collLegajopedagogicos) {
				foreach ((array) $this->collLegajopedagogicos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collLegajopedagogicos = null;
	}

} 