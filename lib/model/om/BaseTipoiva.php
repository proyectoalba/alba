<?php


abstract class BaseTipoiva extends BaseObject  implements Persistent {


  const PEER = 'TipoivaPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $descripcion;

	
	protected $orden;

	
	protected $collOrganizacions;

	
	private $lastOrganizacionCriteria = null;

	
	protected $collCuentas;

	
	private $lastCuentaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->orden = 0;
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

	
	public function getOrden()
	{
		return $this->orden;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TipoivaPeer::ID;
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
			$this->modifiedColumns[] = TipoivaPeer::NOMBRE;
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
			$this->modifiedColumns[] = TipoivaPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setOrden($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->orden !== $v || $v === 0) {
			$this->orden = $v;
			$this->modifiedColumns[] = TipoivaPeer::ORDEN;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(TipoivaPeer::ORDEN))) {
				return false;
			}

			if ($this->orden !== 0) {
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
			$this->orden = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tipoiva object", $e);
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
			$con = Propel::getConnection(TipoivaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = TipoivaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collOrganizacions = null;
			$this->lastOrganizacionCriteria = null;

			$this->collCuentas = null;
			$this->lastCuentaCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TipoivaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			TipoivaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TipoivaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			TipoivaPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = TipoivaPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TipoivaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TipoivaPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collOrganizacions !== null) {
				foreach ($this->collOrganizacions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCuentas !== null) {
				foreach ($this->collCuentas as $referrerFK) {
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


			if (($retval = TipoivaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collOrganizacions !== null) {
					foreach ($this->collOrganizacions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCuentas !== null) {
					foreach ($this->collCuentas as $referrerFK) {
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
		$pos = TipoivaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getOrden();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = TipoivaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getOrden(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TipoivaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setOrden($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TipoivaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOrden($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TipoivaPeer::DATABASE_NAME);

		if ($this->isColumnModified(TipoivaPeer::ID)) $criteria->add(TipoivaPeer::ID, $this->id);
		if ($this->isColumnModified(TipoivaPeer::NOMBRE)) $criteria->add(TipoivaPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(TipoivaPeer::DESCRIPCION)) $criteria->add(TipoivaPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(TipoivaPeer::ORDEN)) $criteria->add(TipoivaPeer::ORDEN, $this->orden);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TipoivaPeer::DATABASE_NAME);

		$criteria->add(TipoivaPeer::ID, $this->id);

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

		$copyObj->setOrden($this->orden);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getOrganizacions() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addOrganizacion($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCuentas() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addCuenta($relObj->copy($deepCopy));
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
			self::$peer = new TipoivaPeer();
		}
		return self::$peer;
	}

	
	public function clearOrganizacions()
	{
		$this->collOrganizacions = null; 	}

	
	public function initOrganizacions()
	{
		$this->collOrganizacions = array();
	}

	
	public function getOrganizacions($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TipoivaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrganizacions === null) {
			if ($this->isNew()) {
			   $this->collOrganizacions = array();
			} else {

				$criteria->add(OrganizacionPeer::FK_TIPOIVA_ID, $this->id);

				OrganizacionPeer::addSelectColumns($criteria);
				$this->collOrganizacions = OrganizacionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OrganizacionPeer::FK_TIPOIVA_ID, $this->id);

				OrganizacionPeer::addSelectColumns($criteria);
				if (!isset($this->lastOrganizacionCriteria) || !$this->lastOrganizacionCriteria->equals($criteria)) {
					$this->collOrganizacions = OrganizacionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastOrganizacionCriteria = $criteria;
		return $this->collOrganizacions;
	}

	
	public function countOrganizacions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TipoivaPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collOrganizacions === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(OrganizacionPeer::FK_TIPOIVA_ID, $this->id);

				$count = OrganizacionPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OrganizacionPeer::FK_TIPOIVA_ID, $this->id);

				if (!isset($this->lastOrganizacionCriteria) || !$this->lastOrganizacionCriteria->equals($criteria)) {
					$count = OrganizacionPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collOrganizacions);
				}
			} else {
				$count = count($this->collOrganizacions);
			}
		}
		return $count;
	}

	
	public function addOrganizacion(Organizacion $l)
	{
		if ($this->collOrganizacions === null) {
			$this->initOrganizacions();
		}
		if (!in_array($l, $this->collOrganizacions, true)) { 			array_push($this->collOrganizacions, $l);
			$l->setTipoiva($this);
		}
	}


	
	public function getOrganizacionsJoinProvincia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TipoivaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrganizacions === null) {
			if ($this->isNew()) {
				$this->collOrganizacions = array();
			} else {

				$criteria->add(OrganizacionPeer::FK_TIPOIVA_ID, $this->id);

				$this->collOrganizacions = OrganizacionPeer::doSelectJoinProvincia($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(OrganizacionPeer::FK_TIPOIVA_ID, $this->id);

			if (!isset($this->lastOrganizacionCriteria) || !$this->lastOrganizacionCriteria->equals($criteria)) {
				$this->collOrganizacions = OrganizacionPeer::doSelectJoinProvincia($criteria, $con, $join_behavior);
			}
		}
		$this->lastOrganizacionCriteria = $criteria;

		return $this->collOrganizacions;
	}

	
	public function clearCuentas()
	{
		$this->collCuentas = null; 	}

	
	public function initCuentas()
	{
		$this->collCuentas = array();
	}

	
	public function getCuentas($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TipoivaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuentas === null) {
			if ($this->isNew()) {
			   $this->collCuentas = array();
			} else {

				$criteria->add(CuentaPeer::FK_TIPOIVA_ID, $this->id);

				CuentaPeer::addSelectColumns($criteria);
				$this->collCuentas = CuentaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CuentaPeer::FK_TIPOIVA_ID, $this->id);

				CuentaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCuentaCriteria) || !$this->lastCuentaCriteria->equals($criteria)) {
					$this->collCuentas = CuentaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCuentaCriteria = $criteria;
		return $this->collCuentas;
	}

	
	public function countCuentas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TipoivaPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCuentas === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CuentaPeer::FK_TIPOIVA_ID, $this->id);

				$count = CuentaPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CuentaPeer::FK_TIPOIVA_ID, $this->id);

				if (!isset($this->lastCuentaCriteria) || !$this->lastCuentaCriteria->equals($criteria)) {
					$count = CuentaPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collCuentas);
				}
			} else {
				$count = count($this->collCuentas);
			}
		}
		return $count;
	}

	
	public function addCuenta(Cuenta $l)
	{
		if ($this->collCuentas === null) {
			$this->initCuentas();
		}
		if (!in_array($l, $this->collCuentas, true)) { 			array_push($this->collCuentas, $l);
			$l->setTipoiva($this);
		}
	}


	
	public function getCuentasJoinProvincia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TipoivaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuentas === null) {
			if ($this->isNew()) {
				$this->collCuentas = array();
			} else {

				$criteria->add(CuentaPeer::FK_TIPOIVA_ID, $this->id);

				$this->collCuentas = CuentaPeer::doSelectJoinProvincia($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(CuentaPeer::FK_TIPOIVA_ID, $this->id);

			if (!isset($this->lastCuentaCriteria) || !$this->lastCuentaCriteria->equals($criteria)) {
				$this->collCuentas = CuentaPeer::doSelectJoinProvincia($criteria, $con, $join_behavior);
			}
		}
		$this->lastCuentaCriteria = $criteria;

		return $this->collCuentas;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collOrganizacions) {
				foreach ((array) $this->collOrganizacions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCuentas) {
				foreach ((array) $this->collCuentas as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collOrganizacions = null;
		$this->collCuentas = null;
	}

} 