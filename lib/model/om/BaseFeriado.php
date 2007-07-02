<?php


abstract class BaseFeriado extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $fecha;


	
	protected $repeticion_anual = true;


	
	protected $inamovible = true;


	
	protected $fk_ciclolectivo_id = 0;

	
	protected $aCiclolectivo;

	
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

	
	public function getFecha($format = 'Y-m-d H:i:s')
	{

		if ($this->fecha === null || $this->fecha === '') {
			return null;
		} elseif (!is_int($this->fecha)) {
						$ts = strtotime($this->fecha);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
			}
		} else {
			$ts = $this->fecha;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getRepeticionAnual()
	{

		return $this->repeticion_anual;
	}

	
	public function getInamovible()
	{

		return $this->inamovible;
	}

	
	public function getFkCiclolectivoId()
	{

		return $this->fk_ciclolectivo_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FeriadoPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = FeriadoPeer::NOMBRE;
		}

	} 
	
	public function setFecha($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha !== $ts) {
			$this->fecha = $ts;
			$this->modifiedColumns[] = FeriadoPeer::FECHA;
		}

	} 
	
	public function setRepeticionAnual($v)
	{

		if ($this->repeticion_anual !== $v || $v === true) {
			$this->repeticion_anual = $v;
			$this->modifiedColumns[] = FeriadoPeer::REPETICION_ANUAL;
		}

	} 
	
	public function setInamovible($v)
	{

		if ($this->inamovible !== $v || $v === true) {
			$this->inamovible = $v;
			$this->modifiedColumns[] = FeriadoPeer::INAMOVIBLE;
		}

	} 
	
	public function setFkCiclolectivoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_ciclolectivo_id !== $v || $v === 0) {
			$this->fk_ciclolectivo_id = $v;
			$this->modifiedColumns[] = FeriadoPeer::FK_CICLOLECTIVO_ID;
		}

		if ($this->aCiclolectivo !== null && $this->aCiclolectivo->getId() !== $v) {
			$this->aCiclolectivo = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->fecha = $rs->getTimestamp($startcol + 2, null);

			$this->repeticion_anual = $rs->getBoolean($startcol + 3);

			$this->inamovible = $rs->getBoolean($startcol + 4);

			$this->fk_ciclolectivo_id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Feriado object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FeriadoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FeriadoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FeriadoPeer::DATABASE_NAME);
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


												
			if ($this->aCiclolectivo !== null) {
				if ($this->aCiclolectivo->isModified()) {
					$affectedRows += $this->aCiclolectivo->save($con);
				}
				$this->setCiclolectivo($this->aCiclolectivo);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FeriadoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FeriadoPeer::doUpdate($this, $con);
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


												
			if ($this->aCiclolectivo !== null) {
				if (!$this->aCiclolectivo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCiclolectivo->getValidationFailures());
				}
			}


			if (($retval = FeriadoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FeriadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFecha();
				break;
			case 3:
				return $this->getRepeticionAnual();
				break;
			case 4:
				return $this->getInamovible();
				break;
			case 5:
				return $this->getFkCiclolectivoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FeriadoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getFecha(),
			$keys[3] => $this->getRepeticionAnual(),
			$keys[4] => $this->getInamovible(),
			$keys[5] => $this->getFkCiclolectivoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FeriadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFecha($value);
				break;
			case 3:
				$this->setRepeticionAnual($value);
				break;
			case 4:
				$this->setInamovible($value);
				break;
			case 5:
				$this->setFkCiclolectivoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FeriadoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecha($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRepeticionAnual($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setInamovible($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFkCiclolectivoId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FeriadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(FeriadoPeer::ID)) $criteria->add(FeriadoPeer::ID, $this->id);
		if ($this->isColumnModified(FeriadoPeer::NOMBRE)) $criteria->add(FeriadoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(FeriadoPeer::FECHA)) $criteria->add(FeriadoPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(FeriadoPeer::REPETICION_ANUAL)) $criteria->add(FeriadoPeer::REPETICION_ANUAL, $this->repeticion_anual);
		if ($this->isColumnModified(FeriadoPeer::INAMOVIBLE)) $criteria->add(FeriadoPeer::INAMOVIBLE, $this->inamovible);
		if ($this->isColumnModified(FeriadoPeer::FK_CICLOLECTIVO_ID)) $criteria->add(FeriadoPeer::FK_CICLOLECTIVO_ID, $this->fk_ciclolectivo_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FeriadoPeer::DATABASE_NAME);

		$criteria->add(FeriadoPeer::ID, $this->id);

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

		$copyObj->setFecha($this->fecha);

		$copyObj->setRepeticionAnual($this->repeticion_anual);

		$copyObj->setInamovible($this->inamovible);

		$copyObj->setFkCiclolectivoId($this->fk_ciclolectivo_id);


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
			self::$peer = new FeriadoPeer();
		}
		return self::$peer;
	}

	
	public function setCiclolectivo($v)
	{


		if ($v === null) {
			$this->setFkCiclolectivoId('0');
		} else {
			$this->setFkCiclolectivoId($v->getId());
		}


		$this->aCiclolectivo = $v;
	}


	
	public function getCiclolectivo($con = null)
	{
				include_once 'lib/model/om/BaseCiclolectivoPeer.php';

		if ($this->aCiclolectivo === null && ($this->fk_ciclolectivo_id !== null)) {

			$this->aCiclolectivo = CiclolectivoPeer::retrieveByPK($this->fk_ciclolectivo_id, $con);

			
		}
		return $this->aCiclolectivo;
	}

} 