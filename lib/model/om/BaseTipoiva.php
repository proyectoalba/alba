<?php


abstract class BaseTipoiva extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $descripcion;


	
	protected $orden = 0;

	
	protected $collOrganizacions;

	
	protected $lastOrganizacionCriteria = null;

	
	protected $collCuentas;

	
	protected $lastCuentaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
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

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TipoivaPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = TipoivaPeer::NOMBRE;
		}

	} 
	
	public function setDescripcion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = TipoivaPeer::DESCRIPCION;
		}

	} 
	
	public function setOrden($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->orden !== $v || $v === 0) {
			$this->orden = $v;
			$this->modifiedColumns[] = TipoivaPeer::ORDEN;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->descripcion = $rs->getString($startcol + 2);

			$this->orden = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tipoiva object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TipoivaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TipoivaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TipoivaPeer::DATABASE_NAME);
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
					$pk = TipoivaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TipoivaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collOrganizacions !== null) {
				foreach($this->collOrganizacions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCuentas !== null) {
				foreach($this->collCuentas as $referrerFK) {
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
					foreach($this->collOrganizacions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCuentas !== null) {
					foreach($this->collCuentas as $referrerFK) {
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
		return $this->getByPosition($pos);
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

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
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

			foreach($this->getOrganizacions() as $relObj) {
				$copyObj->addOrganizacion($relObj->copy($deepCopy));
			}

			foreach($this->getCuentas() as $relObj) {
				$copyObj->addCuenta($relObj->copy($deepCopy));
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

	
	public function initOrganizacions()
	{
		if ($this->collOrganizacions === null) {
			$this->collOrganizacions = array();
		}
	}

	
	public function getOrganizacions($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOrganizacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrganizacions === null) {
			if ($this->isNew()) {
			   $this->collOrganizacions = array();
			} else {

				$criteria->add(OrganizacionPeer::FK_TIPOIVA_ID, $this->getId());

				OrganizacionPeer::addSelectColumns($criteria);
				$this->collOrganizacions = OrganizacionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OrganizacionPeer::FK_TIPOIVA_ID, $this->getId());

				OrganizacionPeer::addSelectColumns($criteria);
				if (!isset($this->lastOrganizacionCriteria) || !$this->lastOrganizacionCriteria->equals($criteria)) {
					$this->collOrganizacions = OrganizacionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastOrganizacionCriteria = $criteria;
		return $this->collOrganizacions;
	}

	
	public function countOrganizacions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseOrganizacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(OrganizacionPeer::FK_TIPOIVA_ID, $this->getId());

		return OrganizacionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addOrganizacion(Organizacion $l)
	{
		$this->collOrganizacions[] = $l;
		$l->setTipoiva($this);
	}


	
	public function getOrganizacionsJoinProvincia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOrganizacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrganizacions === null) {
			if ($this->isNew()) {
				$this->collOrganizacions = array();
			} else {

				$criteria->add(OrganizacionPeer::FK_TIPOIVA_ID, $this->getId());

				$this->collOrganizacions = OrganizacionPeer::doSelectJoinProvincia($criteria, $con);
			}
		} else {
									
			$criteria->add(OrganizacionPeer::FK_TIPOIVA_ID, $this->getId());

			if (!isset($this->lastOrganizacionCriteria) || !$this->lastOrganizacionCriteria->equals($criteria)) {
				$this->collOrganizacions = OrganizacionPeer::doSelectJoinProvincia($criteria, $con);
			}
		}
		$this->lastOrganizacionCriteria = $criteria;

		return $this->collOrganizacions;
	}

	
	public function initCuentas()
	{
		if ($this->collCuentas === null) {
			$this->collCuentas = array();
		}
	}

	
	public function getCuentas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCuentaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuentas === null) {
			if ($this->isNew()) {
			   $this->collCuentas = array();
			} else {

				$criteria->add(CuentaPeer::FK_TIPOIVA_ID, $this->getId());

				CuentaPeer::addSelectColumns($criteria);
				$this->collCuentas = CuentaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CuentaPeer::FK_TIPOIVA_ID, $this->getId());

				CuentaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCuentaCriteria) || !$this->lastCuentaCriteria->equals($criteria)) {
					$this->collCuentas = CuentaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCuentaCriteria = $criteria;
		return $this->collCuentas;
	}

	
	public function countCuentas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCuentaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CuentaPeer::FK_TIPOIVA_ID, $this->getId());

		return CuentaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCuenta(Cuenta $l)
	{
		$this->collCuentas[] = $l;
		$l->setTipoiva($this);
	}


	
	public function getCuentasJoinProvincia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCuentaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuentas === null) {
			if ($this->isNew()) {
				$this->collCuentas = array();
			} else {

				$criteria->add(CuentaPeer::FK_TIPOIVA_ID, $this->getId());

				$this->collCuentas = CuentaPeer::doSelectJoinProvincia($criteria, $con);
			}
		} else {
									
			$criteria->add(CuentaPeer::FK_TIPOIVA_ID, $this->getId());

			if (!isset($this->lastCuentaCriteria) || !$this->lastCuentaCriteria->equals($criteria)) {
				$this->collCuentas = CuentaPeer::doSelectJoinProvincia($criteria, $con);
			}
		}
		$this->lastCuentaCriteria = $criteria;

		return $this->collCuentas;
	}

} 