<?php


abstract class BaseEspacio extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre = '';


	
	protected $m2;


	
	protected $capacidad;


	
	protected $descripcion;


	
	protected $estado;


	
	protected $fk_tipoespacio_id;


	
	protected $fk_locacion_id = 0;

	
	protected $aTipoespacio;

	
	protected $aLocacion;

	
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

	
	public function getM2()
	{

		return $this->m2;
	}

	
	public function getCapacidad()
	{

		return $this->capacidad;
	}

	
	public function getDescripcion()
	{

		return $this->descripcion;
	}

	
	public function getEstado()
	{

		return $this->estado;
	}

	
	public function getFkTipoespacioId()
	{

		return $this->fk_tipoespacio_id;
	}

	
	public function getFkLocacionId()
	{

		return $this->fk_locacion_id;
	}

	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = EspacioPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

		if ($this->nombre !== $v || $v === '') {
			$this->nombre = $v;
			$this->modifiedColumns[] = EspacioPeer::NOMBRE;
		}

	} 
	
	public function setM2($v)
	{

		if ($this->m2 !== $v) {
			$this->m2 = $v;
			$this->modifiedColumns[] = EspacioPeer::M2;
		}

	} 
	
	public function setCapacidad($v)
	{

		if ($this->capacidad !== $v) {
			$this->capacidad = $v;
			$this->modifiedColumns[] = EspacioPeer::CAPACIDAD;
		}

	} 
	
	public function setDescripcion($v)
	{

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = EspacioPeer::DESCRIPCION;
		}

	} 
	
	public function setEstado($v)
	{

		if ($this->estado !== $v) {
			$this->estado = $v;
			$this->modifiedColumns[] = EspacioPeer::ESTADO;
		}

	} 
	
	public function setFkTipoespacioId($v)
	{

		if ($this->fk_tipoespacio_id !== $v) {
			$this->fk_tipoespacio_id = $v;
			$this->modifiedColumns[] = EspacioPeer::FK_TIPOESPACIO_ID;
		}

		if ($this->aTipoespacio !== null && $this->aTipoespacio->getId() !== $v) {
			$this->aTipoespacio = null;
		}

	} 
	
	public function setFkLocacionId($v)
	{

		if ($this->fk_locacion_id !== $v || $v === 0) {
			$this->fk_locacion_id = $v;
			$this->modifiedColumns[] = EspacioPeer::FK_LOCACION_ID;
		}

		if ($this->aLocacion !== null && $this->aLocacion->getId() !== $v) {
			$this->aLocacion = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->m2 = $rs->getFloat($startcol + 2);

			$this->capacidad = $rs->getString($startcol + 3);

			$this->descripcion = $rs->getString($startcol + 4);

			$this->estado = $rs->getString($startcol + 5);

			$this->fk_tipoespacio_id = $rs->getInt($startcol + 6);

			$this->fk_locacion_id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Espacio object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EspacioPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EspacioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EspacioPeer::DATABASE_NAME);
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


												
			if ($this->aTipoespacio !== null) {
				if ($this->aTipoespacio->isModified()) {
					$affectedRows += $this->aTipoespacio->save($con);
				}
				$this->setTipoespacio($this->aTipoespacio);
			}

			if ($this->aLocacion !== null) {
				if ($this->aLocacion->isModified()) {
					$affectedRows += $this->aLocacion->save($con);
				}
				$this->setLocacion($this->aLocacion);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EspacioPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EspacioPeer::doUpdate($this, $con);
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


												
			if ($this->aTipoespacio !== null) {
				if (!$this->aTipoespacio->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipoespacio->getValidationFailures());
				}
			}

			if ($this->aLocacion !== null) {
				if (!$this->aLocacion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLocacion->getValidationFailures());
				}
			}


			if (($retval = EspacioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EspacioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getM2();
				break;
			case 3:
				return $this->getCapacidad();
				break;
			case 4:
				return $this->getDescripcion();
				break;
			case 5:
				return $this->getEstado();
				break;
			case 6:
				return $this->getFkTipoespacioId();
				break;
			case 7:
				return $this->getFkLocacionId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EspacioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getM2(),
			$keys[3] => $this->getCapacidad(),
			$keys[4] => $this->getDescripcion(),
			$keys[5] => $this->getEstado(),
			$keys[6] => $this->getFkTipoespacioId(),
			$keys[7] => $this->getFkLocacionId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EspacioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setM2($value);
				break;
			case 3:
				$this->setCapacidad($value);
				break;
			case 4:
				$this->setDescripcion($value);
				break;
			case 5:
				$this->setEstado($value);
				break;
			case 6:
				$this->setFkTipoespacioId($value);
				break;
			case 7:
				$this->setFkLocacionId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EspacioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setM2($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCapacidad($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescripcion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEstado($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFkTipoespacioId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFkLocacionId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EspacioPeer::DATABASE_NAME);

		if ($this->isColumnModified(EspacioPeer::ID)) $criteria->add(EspacioPeer::ID, $this->id);
		if ($this->isColumnModified(EspacioPeer::NOMBRE)) $criteria->add(EspacioPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(EspacioPeer::M2)) $criteria->add(EspacioPeer::M2, $this->m2);
		if ($this->isColumnModified(EspacioPeer::CAPACIDAD)) $criteria->add(EspacioPeer::CAPACIDAD, $this->capacidad);
		if ($this->isColumnModified(EspacioPeer::DESCRIPCION)) $criteria->add(EspacioPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(EspacioPeer::ESTADO)) $criteria->add(EspacioPeer::ESTADO, $this->estado);
		if ($this->isColumnModified(EspacioPeer::FK_TIPOESPACIO_ID)) $criteria->add(EspacioPeer::FK_TIPOESPACIO_ID, $this->fk_tipoespacio_id);
		if ($this->isColumnModified(EspacioPeer::FK_LOCACION_ID)) $criteria->add(EspacioPeer::FK_LOCACION_ID, $this->fk_locacion_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EspacioPeer::DATABASE_NAME);

		$criteria->add(EspacioPeer::ID, $this->id);

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

		$copyObj->setM2($this->m2);

		$copyObj->setCapacidad($this->capacidad);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setEstado($this->estado);

		$copyObj->setFkTipoespacioId($this->fk_tipoespacio_id);

		$copyObj->setFkLocacionId($this->fk_locacion_id);


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
			self::$peer = new EspacioPeer();
		}
		return self::$peer;
	}

	
	public function setTipoespacio($v)
	{


		if ($v === null) {
			$this->setFkTipoespacioId(NULL);
		} else {
			$this->setFkTipoespacioId($v->getId());
		}


		$this->aTipoespacio = $v;
	}


	
	public function getTipoespacio($con = null)
	{
				include_once 'lib/model/om/BaseTipoespacioPeer.php';

		if ($this->aTipoespacio === null && ($this->fk_tipoespacio_id !== null)) {

			$this->aTipoespacio = TipoespacioPeer::retrieveByPK($this->fk_tipoespacio_id, $con);

			
		}
		return $this->aTipoespacio;
	}

	
	public function setLocacion($v)
	{


		if ($v === null) {
			$this->setFkLocacionId('0');
		} else {
			$this->setFkLocacionId($v->getId());
		}


		$this->aLocacion = $v;
	}


	
	public function getLocacion($con = null)
	{
				include_once 'lib/model/om/BaseLocacionPeer.php';

		if ($this->aLocacion === null && ($this->fk_locacion_id !== null)) {

			$this->aLocacion = LocacionPeer::retrieveByPK($this->fk_locacion_id, $con);

			
		}
		return $this->aLocacion;
	}

} 