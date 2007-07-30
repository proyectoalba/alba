<?php


abstract class BaseModulo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $titulo;


	
	protected $descripcion;


	
	protected $activo = true;

	
	protected $collPermisos;

	
	protected $lastPermisoCriteria = null;

	
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

	
	public function getTitulo()
	{

		return $this->titulo;
	}

	
	public function getDescripcion()
	{

		return $this->descripcion;
	}

	
	public function getActivo()
	{

		return $this->activo;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ModuloPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = ModuloPeer::NOMBRE;
		}

	} 
	
	public function setTitulo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->titulo !== $v) {
			$this->titulo = $v;
			$this->modifiedColumns[] = ModuloPeer::TITULO;
		}

	} 
	
	public function setDescripcion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = ModuloPeer::DESCRIPCION;
		}

	} 
	
	public function setActivo($v)
	{

		if ($this->activo !== $v || $v === true) {
			$this->activo = $v;
			$this->modifiedColumns[] = ModuloPeer::ACTIVO;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->titulo = $rs->getString($startcol + 2);

			$this->descripcion = $rs->getString($startcol + 3);

			$this->activo = $rs->getBoolean($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Modulo object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ModuloPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ModuloPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ModuloPeer::DATABASE_NAME);
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
					$pk = ModuloPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ModuloPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collPermisos !== null) {
				foreach($this->collPermisos as $referrerFK) {
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


			if (($retval = ModuloPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPermisos !== null) {
					foreach($this->collPermisos as $referrerFK) {
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
		$pos = ModuloPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTitulo();
				break;
			case 3:
				return $this->getDescripcion();
				break;
			case 4:
				return $this->getActivo();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ModuloPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getTitulo(),
			$keys[3] => $this->getDescripcion(),
			$keys[4] => $this->getActivo(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ModuloPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTitulo($value);
				break;
			case 3:
				$this->setDescripcion($value);
				break;
			case 4:
				$this->setActivo($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ModuloPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitulo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescripcion($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setActivo($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ModuloPeer::DATABASE_NAME);

		if ($this->isColumnModified(ModuloPeer::ID)) $criteria->add(ModuloPeer::ID, $this->id);
		if ($this->isColumnModified(ModuloPeer::NOMBRE)) $criteria->add(ModuloPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(ModuloPeer::TITULO)) $criteria->add(ModuloPeer::TITULO, $this->titulo);
		if ($this->isColumnModified(ModuloPeer::DESCRIPCION)) $criteria->add(ModuloPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(ModuloPeer::ACTIVO)) $criteria->add(ModuloPeer::ACTIVO, $this->activo);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ModuloPeer::DATABASE_NAME);

		$criteria->add(ModuloPeer::ID, $this->id);

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

		$copyObj->setTitulo($this->titulo);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setActivo($this->activo);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getPermisos() as $relObj) {
				$copyObj->addPermiso($relObj->copy($deepCopy));
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
			self::$peer = new ModuloPeer();
		}
		return self::$peer;
	}

	
	public function initPermisos()
	{
		if ($this->collPermisos === null) {
			$this->collPermisos = array();
		}
	}

	
	public function getPermisos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPermisos === null) {
			if ($this->isNew()) {
			   $this->collPermisos = array();
			} else {

				$criteria->add(PermisoPeer::FK_MODULO_ID, $this->getId());

				PermisoPeer::addSelectColumns($criteria);
				$this->collPermisos = PermisoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PermisoPeer::FK_MODULO_ID, $this->getId());

				PermisoPeer::addSelectColumns($criteria);
				if (!isset($this->lastPermisoCriteria) || !$this->lastPermisoCriteria->equals($criteria)) {
					$this->collPermisos = PermisoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPermisoCriteria = $criteria;
		return $this->collPermisos;
	}

	
	public function countPermisos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasePermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PermisoPeer::FK_MODULO_ID, $this->getId());

		return PermisoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPermiso(Permiso $l)
	{
		$this->collPermisos[] = $l;
		$l->setModulo($this);
	}

} 