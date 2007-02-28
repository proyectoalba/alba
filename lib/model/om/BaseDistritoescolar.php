<?php


abstract class BaseDistritoescolar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre = '';


	
	protected $direccion;


	
	protected $telefono;


	
	protected $ciudad;

	
	protected $collEstablecimientos;

	
	protected $lastEstablecimientoCriteria = null;

	
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

	
	public function getDireccion()
	{

		return $this->direccion;
	}

	
	public function getTelefono()
	{

		return $this->telefono;
	}

	
	public function getCiudad()
	{

		return $this->ciudad;
	}

	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DistritoescolarPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

		if ($this->nombre !== $v || $v === '') {
			$this->nombre = $v;
			$this->modifiedColumns[] = DistritoescolarPeer::NOMBRE;
		}

	} 
	
	public function setDireccion($v)
	{

		if ($this->direccion !== $v) {
			$this->direccion = $v;
			$this->modifiedColumns[] = DistritoescolarPeer::DIRECCION;
		}

	} 
	
	public function setTelefono($v)
	{

		if ($this->telefono !== $v) {
			$this->telefono = $v;
			$this->modifiedColumns[] = DistritoescolarPeer::TELEFONO;
		}

	} 
	
	public function setCiudad($v)
	{

		if ($this->ciudad !== $v) {
			$this->ciudad = $v;
			$this->modifiedColumns[] = DistritoescolarPeer::CIUDAD;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->direccion = $rs->getString($startcol + 2);

			$this->telefono = $rs->getString($startcol + 3);

			$this->ciudad = $rs->getString($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Distritoescolar object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DistritoescolarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DistritoescolarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DistritoescolarPeer::DATABASE_NAME);
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
					$pk = DistritoescolarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DistritoescolarPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collEstablecimientos !== null) {
				foreach($this->collEstablecimientos as $referrerFK) {
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


			if (($retval = DistritoescolarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEstablecimientos !== null) {
					foreach($this->collEstablecimientos as $referrerFK) {
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
		$pos = DistritoescolarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDireccion();
				break;
			case 3:
				return $this->getTelefono();
				break;
			case 4:
				return $this->getCiudad();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DistritoescolarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDireccion(),
			$keys[3] => $this->getTelefono(),
			$keys[4] => $this->getCiudad(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DistritoescolarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDireccion($value);
				break;
			case 3:
				$this->setTelefono($value);
				break;
			case 4:
				$this->setCiudad($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DistritoescolarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDireccion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelefono($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCiudad($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DistritoescolarPeer::DATABASE_NAME);

		if ($this->isColumnModified(DistritoescolarPeer::ID)) $criteria->add(DistritoescolarPeer::ID, $this->id);
		if ($this->isColumnModified(DistritoescolarPeer::NOMBRE)) $criteria->add(DistritoescolarPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(DistritoescolarPeer::DIRECCION)) $criteria->add(DistritoescolarPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(DistritoescolarPeer::TELEFONO)) $criteria->add(DistritoescolarPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(DistritoescolarPeer::CIUDAD)) $criteria->add(DistritoescolarPeer::CIUDAD, $this->ciudad);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DistritoescolarPeer::DATABASE_NAME);

		$criteria->add(DistritoescolarPeer::ID, $this->id);

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

		$copyObj->setDireccion($this->direccion);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setCiudad($this->ciudad);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getEstablecimientos() as $relObj) {
				$copyObj->addEstablecimiento($relObj->copy($deepCopy));
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
			self::$peer = new DistritoescolarPeer();
		}
		return self::$peer;
	}

	
	public function initEstablecimientos()
	{
		if ($this->collEstablecimientos === null) {
			$this->collEstablecimientos = array();
		}
	}

	
	public function getEstablecimientos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEstablecimientoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
			   $this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, $this->getId());

				EstablecimientoPeer::addSelectColumns($criteria);
				$this->collEstablecimientos = EstablecimientoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, $this->getId());

				EstablecimientoPeer::addSelectColumns($criteria);
				if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
					$this->collEstablecimientos = EstablecimientoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;
		return $this->collEstablecimientos;
	}

	
	public function countEstablecimientos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEstablecimientoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, $this->getId());

		return EstablecimientoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEstablecimiento(Establecimiento $l)
	{
		$this->collEstablecimientos[] = $l;
		$l->setDistritoescolar($this);
	}


	
	public function getEstablecimientosJoinNiveltipo($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEstablecimientoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, $this->getId());

				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinNiveltipo($criteria, $con);
			}
		} else {
									
			$criteria->add(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, $this->getId());

			if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinNiveltipo($criteria, $con);
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;

		return $this->collEstablecimientos;
	}


	
	public function getEstablecimientosJoinOrganizacion($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEstablecimientoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, $this->getId());

				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinOrganizacion($criteria, $con);
			}
		} else {
									
			$criteria->add(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, $this->getId());

			if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinOrganizacion($criteria, $con);
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;

		return $this->collEstablecimientos;
	}

} 