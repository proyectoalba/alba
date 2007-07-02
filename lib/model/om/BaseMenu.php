<?php


abstract class BaseMenu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre = '';


	
	protected $link = '';


	
	protected $perm = '';


	
	protected $target = '';


	
	protected $fk_padre_menu_id;


	
	protected $orden;

	
	protected $aMenuRelatedByFkPadreMenuId;

	
	protected $collMenusRelatedByFkPadreMenuId;

	
	protected $lastMenuRelatedByFkPadreMenuIdCriteria = null;

	
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

	
	public function getLink()
	{

		return $this->link;
	}

	
	public function getPerm()
	{

		return $this->perm;
	}

	
	public function getTarget()
	{

		return $this->target;
	}

	
	public function getFkPadreMenuId()
	{

		return $this->fk_padre_menu_id;
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
			$this->modifiedColumns[] = MenuPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v || $v === '') {
			$this->nombre = $v;
			$this->modifiedColumns[] = MenuPeer::NOMBRE;
		}

	} 
	
	public function setLink($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->link !== $v || $v === '') {
			$this->link = $v;
			$this->modifiedColumns[] = MenuPeer::LINK;
		}

	} 
	
	public function setPerm($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->perm !== $v || $v === '') {
			$this->perm = $v;
			$this->modifiedColumns[] = MenuPeer::PERM;
		}

	} 
	
	public function setTarget($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->target !== $v || $v === '') {
			$this->target = $v;
			$this->modifiedColumns[] = MenuPeer::TARGET;
		}

	} 
	
	public function setFkPadreMenuId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_padre_menu_id !== $v) {
			$this->fk_padre_menu_id = $v;
			$this->modifiedColumns[] = MenuPeer::FK_PADRE_MENU_ID;
		}

		if ($this->aMenuRelatedByFkPadreMenuId !== null && $this->aMenuRelatedByFkPadreMenuId->getId() !== $v) {
			$this->aMenuRelatedByFkPadreMenuId = null;
		}

	} 
	
	public function setOrden($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->orden !== $v) {
			$this->orden = $v;
			$this->modifiedColumns[] = MenuPeer::ORDEN;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->link = $rs->getString($startcol + 2);

			$this->perm = $rs->getString($startcol + 3);

			$this->target = $rs->getString($startcol + 4);

			$this->fk_padre_menu_id = $rs->getInt($startcol + 5);

			$this->orden = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Menu object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MenuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MenuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(MenuPeer::DATABASE_NAME);
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


												
			if ($this->aMenuRelatedByFkPadreMenuId !== null) {
				if ($this->aMenuRelatedByFkPadreMenuId->isModified()) {
					$affectedRows += $this->aMenuRelatedByFkPadreMenuId->save($con);
				}
				$this->setMenuRelatedByFkPadreMenuId($this->aMenuRelatedByFkPadreMenuId);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MenuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MenuPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collMenusRelatedByFkPadreMenuId !== null) {
				foreach($this->collMenusRelatedByFkPadreMenuId as $referrerFK) {
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


												
			if ($this->aMenuRelatedByFkPadreMenuId !== null) {
				if (!$this->aMenuRelatedByFkPadreMenuId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMenuRelatedByFkPadreMenuId->getValidationFailures());
				}
			}


			if (($retval = MenuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MenuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getLink();
				break;
			case 3:
				return $this->getPerm();
				break;
			case 4:
				return $this->getTarget();
				break;
			case 5:
				return $this->getFkPadreMenuId();
				break;
			case 6:
				return $this->getOrden();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MenuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getLink(),
			$keys[3] => $this->getPerm(),
			$keys[4] => $this->getTarget(),
			$keys[5] => $this->getFkPadreMenuId(),
			$keys[6] => $this->getOrden(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MenuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setLink($value);
				break;
			case 3:
				$this->setPerm($value);
				break;
			case 4:
				$this->setTarget($value);
				break;
			case 5:
				$this->setFkPadreMenuId($value);
				break;
			case 6:
				$this->setOrden($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MenuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLink($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPerm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTarget($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFkPadreMenuId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setOrden($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MenuPeer::DATABASE_NAME);

		if ($this->isColumnModified(MenuPeer::ID)) $criteria->add(MenuPeer::ID, $this->id);
		if ($this->isColumnModified(MenuPeer::NOMBRE)) $criteria->add(MenuPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(MenuPeer::LINK)) $criteria->add(MenuPeer::LINK, $this->link);
		if ($this->isColumnModified(MenuPeer::PERM)) $criteria->add(MenuPeer::PERM, $this->perm);
		if ($this->isColumnModified(MenuPeer::TARGET)) $criteria->add(MenuPeer::TARGET, $this->target);
		if ($this->isColumnModified(MenuPeer::FK_PADRE_MENU_ID)) $criteria->add(MenuPeer::FK_PADRE_MENU_ID, $this->fk_padre_menu_id);
		if ($this->isColumnModified(MenuPeer::ORDEN)) $criteria->add(MenuPeer::ORDEN, $this->orden);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MenuPeer::DATABASE_NAME);

		$criteria->add(MenuPeer::ID, $this->id);

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

		$copyObj->setLink($this->link);

		$copyObj->setPerm($this->perm);

		$copyObj->setTarget($this->target);

		$copyObj->setFkPadreMenuId($this->fk_padre_menu_id);

		$copyObj->setOrden($this->orden);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getMenusRelatedByFkPadreMenuId() as $relObj) {
				if($this->getPrimaryKey() === $relObj->getPrimaryKey()) {
						continue;
				}

				$copyObj->addMenuRelatedByFkPadreMenuId($relObj->copy($deepCopy));
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
			self::$peer = new MenuPeer();
		}
		return self::$peer;
	}

	
	public function setMenuRelatedByFkPadreMenuId($v)
	{


		if ($v === null) {
			$this->setFkPadreMenuId(NULL);
		} else {
			$this->setFkPadreMenuId($v->getId());
		}


		$this->aMenuRelatedByFkPadreMenuId = $v;
	}


	
	public function getMenuRelatedByFkPadreMenuId($con = null)
	{
				include_once 'lib/model/om/BaseMenuPeer.php';

		if ($this->aMenuRelatedByFkPadreMenuId === null && ($this->fk_padre_menu_id !== null)) {

			$this->aMenuRelatedByFkPadreMenuId = MenuPeer::retrieveByPK($this->fk_padre_menu_id, $con);

			
		}
		return $this->aMenuRelatedByFkPadreMenuId;
	}

	
	public function initMenusRelatedByFkPadreMenuId()
	{
		if ($this->collMenusRelatedByFkPadreMenuId === null) {
			$this->collMenusRelatedByFkPadreMenuId = array();
		}
	}

	
	public function getMenusRelatedByFkPadreMenuId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMenuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMenusRelatedByFkPadreMenuId === null) {
			if ($this->isNew()) {
			   $this->collMenusRelatedByFkPadreMenuId = array();
			} else {

				$criteria->add(MenuPeer::FK_PADRE_MENU_ID, $this->getId());

				MenuPeer::addSelectColumns($criteria);
				$this->collMenusRelatedByFkPadreMenuId = MenuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MenuPeer::FK_PADRE_MENU_ID, $this->getId());

				MenuPeer::addSelectColumns($criteria);
				if (!isset($this->lastMenuRelatedByFkPadreMenuIdCriteria) || !$this->lastMenuRelatedByFkPadreMenuIdCriteria->equals($criteria)) {
					$this->collMenusRelatedByFkPadreMenuId = MenuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMenuRelatedByFkPadreMenuIdCriteria = $criteria;
		return $this->collMenusRelatedByFkPadreMenuId;
	}

	
	public function countMenusRelatedByFkPadreMenuId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMenuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MenuPeer::FK_PADRE_MENU_ID, $this->getId());

		return MenuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMenuRelatedByFkPadreMenuId(Menu $l)
	{
		$this->collMenusRelatedByFkPadreMenuId[] = $l;
		$l->setMenuRelatedByFkPadreMenuId($this);
	}

} 