<?php


abstract class BaseTipoasistencia extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $descripcion = '';


	
	protected $valor = 1;


	
	protected $grupo = '';


	
	protected $defecto = false;

	
	protected $collAsistencias;

	
	protected $lastAsistenciaCriteria = null;

	
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

	
	public function getValor()
	{

		return $this->valor;
	}

	
	public function getGrupo()
	{

		return $this->grupo;
	}

	
	public function getDefecto()
	{

		return $this->defecto;
	}

	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TipoasistenciaPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = TipoasistenciaPeer::NOMBRE;
		}

	} 
	
	public function setDescripcion($v)
	{

		if ($this->descripcion !== $v || $v === '') {
			$this->descripcion = $v;
			$this->modifiedColumns[] = TipoasistenciaPeer::DESCRIPCION;
		}

	} 
	
	public function setValor($v)
	{

		if ($this->valor !== $v || $v === 1) {
			$this->valor = $v;
			$this->modifiedColumns[] = TipoasistenciaPeer::VALOR;
		}

	} 
	
	public function setGrupo($v)
	{

		if ($this->grupo !== $v || $v === '') {
			$this->grupo = $v;
			$this->modifiedColumns[] = TipoasistenciaPeer::GRUPO;
		}

	} 
	
	public function setDefecto($v)
	{

		if ($this->defecto !== $v || $v === false) {
			$this->defecto = $v;
			$this->modifiedColumns[] = TipoasistenciaPeer::DEFECTO;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->descripcion = $rs->getString($startcol + 2);

			$this->valor = $rs->getFloat($startcol + 3);

			$this->grupo = $rs->getString($startcol + 4);

			$this->defecto = $rs->getBoolean($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tipoasistencia object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TipoasistenciaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TipoasistenciaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TipoasistenciaPeer::DATABASE_NAME);
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
					$pk = TipoasistenciaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TipoasistenciaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAsistencias !== null) {
				foreach($this->collAsistencias as $referrerFK) {
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


			if (($retval = TipoasistenciaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAsistencias !== null) {
					foreach($this->collAsistencias as $referrerFK) {
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
		$pos = TipoasistenciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getValor();
				break;
			case 4:
				return $this->getGrupo();
				break;
			case 5:
				return $this->getDefecto();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TipoasistenciaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getValor(),
			$keys[4] => $this->getGrupo(),
			$keys[5] => $this->getDefecto(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TipoasistenciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setValor($value);
				break;
			case 4:
				$this->setGrupo($value);
				break;
			case 5:
				$this->setDefecto($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TipoasistenciaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setGrupo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDefecto($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TipoasistenciaPeer::DATABASE_NAME);

		if ($this->isColumnModified(TipoasistenciaPeer::ID)) $criteria->add(TipoasistenciaPeer::ID, $this->id);
		if ($this->isColumnModified(TipoasistenciaPeer::NOMBRE)) $criteria->add(TipoasistenciaPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(TipoasistenciaPeer::DESCRIPCION)) $criteria->add(TipoasistenciaPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(TipoasistenciaPeer::VALOR)) $criteria->add(TipoasistenciaPeer::VALOR, $this->valor);
		if ($this->isColumnModified(TipoasistenciaPeer::GRUPO)) $criteria->add(TipoasistenciaPeer::GRUPO, $this->grupo);
		if ($this->isColumnModified(TipoasistenciaPeer::DEFECTO)) $criteria->add(TipoasistenciaPeer::DEFECTO, $this->defecto);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TipoasistenciaPeer::DATABASE_NAME);

		$criteria->add(TipoasistenciaPeer::ID, $this->id);

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

		$copyObj->setValor($this->valor);

		$copyObj->setGrupo($this->grupo);

		$copyObj->setDefecto($this->defecto);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAsistencias() as $relObj) {
				$copyObj->addAsistencia($relObj->copy($deepCopy));
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
			self::$peer = new TipoasistenciaPeer();
		}
		return self::$peer;
	}

	
	public function initAsistencias()
	{
		if ($this->collAsistencias === null) {
			$this->collAsistencias = array();
		}
	}

	
	public function getAsistencias($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAsistenciaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAsistencias === null) {
			if ($this->isNew()) {
			   $this->collAsistencias = array();
			} else {

				$criteria->add(AsistenciaPeer::FK_TIPOASISTENCIA_ID, $this->getId());

				AsistenciaPeer::addSelectColumns($criteria);
				$this->collAsistencias = AsistenciaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AsistenciaPeer::FK_TIPOASISTENCIA_ID, $this->getId());

				AsistenciaPeer::addSelectColumns($criteria);
				if (!isset($this->lastAsistenciaCriteria) || !$this->lastAsistenciaCriteria->equals($criteria)) {
					$this->collAsistencias = AsistenciaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAsistenciaCriteria = $criteria;
		return $this->collAsistencias;
	}

	
	public function countAsistencias($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAsistenciaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AsistenciaPeer::FK_TIPOASISTENCIA_ID, $this->getId());

		return AsistenciaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAsistencia(Asistencia $l)
	{
		$this->collAsistencias[] = $l;
		$l->setTipoasistencia($this);
	}


	
	public function getAsistenciasJoinAlumno($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAsistenciaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAsistencias === null) {
			if ($this->isNew()) {
				$this->collAsistencias = array();
			} else {

				$criteria->add(AsistenciaPeer::FK_TIPOASISTENCIA_ID, $this->getId());

				$this->collAsistencias = AsistenciaPeer::doSelectJoinAlumno($criteria, $con);
			}
		} else {
									
			$criteria->add(AsistenciaPeer::FK_TIPOASISTENCIA_ID, $this->getId());

			if (!isset($this->lastAsistenciaCriteria) || !$this->lastAsistenciaCriteria->equals($criteria)) {
				$this->collAsistencias = AsistenciaPeer::doSelectJoinAlumno($criteria, $con);
			}
		}
		$this->lastAsistenciaCriteria = $criteria;

		return $this->collAsistencias;
	}

} 