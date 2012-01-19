<?php


abstract class BaseTipoasistencia extends BaseObject  implements Persistent {


  const PEER = 'TipoasistenciaPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $descripcion;

	
	protected $valor;

	
	protected $grupo;

	
	protected $defecto;

	
	protected $collAsistencias;

	
	private $lastAsistenciaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->valor = '1';
		$this->defecto = false;
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
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TipoasistenciaPeer::ID;
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
			$this->modifiedColumns[] = TipoasistenciaPeer::NOMBRE;
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
			$this->modifiedColumns[] = TipoasistenciaPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setValor($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->valor !== $v || $v === '1') {
			$this->valor = $v;
			$this->modifiedColumns[] = TipoasistenciaPeer::VALOR;
		}

		return $this;
	} 
	
	public function setGrupo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->grupo !== $v) {
			$this->grupo = $v;
			$this->modifiedColumns[] = TipoasistenciaPeer::GRUPO;
		}

		return $this;
	} 
	
	public function setDefecto($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->defecto !== $v || $v === false) {
			$this->defecto = $v;
			$this->modifiedColumns[] = TipoasistenciaPeer::DEFECTO;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(TipoasistenciaPeer::VALOR,TipoasistenciaPeer::DEFECTO))) {
				return false;
			}

			if ($this->valor !== '1') {
				return false;
			}

			if ($this->defecto !== false) {
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
			$this->valor = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->grupo = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->defecto = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tipoasistencia object", $e);
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
			$con = Propel::getConnection(TipoasistenciaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = TipoasistenciaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collAsistencias = null;
			$this->lastAsistenciaCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TipoasistenciaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			TipoasistenciaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TipoasistenciaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			TipoasistenciaPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = TipoasistenciaPeer::ID;
			}

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
				foreach ($this->collAsistencias as $referrerFK) {
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
					foreach ($this->collAsistencias as $referrerFK) {
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

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
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

			foreach ($this->getAsistencias() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addAsistencia($relObj->copy($deepCopy));
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
			self::$peer = new TipoasistenciaPeer();
		}
		return self::$peer;
	}

	
	public function clearAsistencias()
	{
		$this->collAsistencias = null; 	}

	
	public function initAsistencias()
	{
		$this->collAsistencias = array();
	}

	
	public function getAsistencias($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TipoasistenciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAsistencias === null) {
			if ($this->isNew()) {
			   $this->collAsistencias = array();
			} else {

				$criteria->add(AsistenciaPeer::FK_TIPOASISTENCIA_ID, $this->id);

				AsistenciaPeer::addSelectColumns($criteria);
				$this->collAsistencias = AsistenciaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AsistenciaPeer::FK_TIPOASISTENCIA_ID, $this->id);

				AsistenciaPeer::addSelectColumns($criteria);
				if (!isset($this->lastAsistenciaCriteria) || !$this->lastAsistenciaCriteria->equals($criteria)) {
					$this->collAsistencias = AsistenciaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAsistenciaCriteria = $criteria;
		return $this->collAsistencias;
	}

	
	public function countAsistencias(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TipoasistenciaPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAsistencias === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AsistenciaPeer::FK_TIPOASISTENCIA_ID, $this->id);

				$count = AsistenciaPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AsistenciaPeer::FK_TIPOASISTENCIA_ID, $this->id);

				if (!isset($this->lastAsistenciaCriteria) || !$this->lastAsistenciaCriteria->equals($criteria)) {
					$count = AsistenciaPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collAsistencias);
				}
			} else {
				$count = count($this->collAsistencias);
			}
		}
		return $count;
	}

	
	public function addAsistencia(Asistencia $l)
	{
		if ($this->collAsistencias === null) {
			$this->initAsistencias();
		}
		if (!in_array($l, $this->collAsistencias, true)) { 			array_push($this->collAsistencias, $l);
			$l->setTipoasistencia($this);
		}
	}


	
	public function getAsistenciasJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TipoasistenciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAsistencias === null) {
			if ($this->isNew()) {
				$this->collAsistencias = array();
			} else {

				$criteria->add(AsistenciaPeer::FK_TIPOASISTENCIA_ID, $this->id);

				$this->collAsistencias = AsistenciaPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AsistenciaPeer::FK_TIPOASISTENCIA_ID, $this->id);

			if (!isset($this->lastAsistenciaCriteria) || !$this->lastAsistenciaCriteria->equals($criteria)) {
				$this->collAsistencias = AsistenciaPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastAsistenciaCriteria = $criteria;

		return $this->collAsistencias;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collAsistencias) {
				foreach ((array) $this->collAsistencias as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collAsistencias = null;
	}

} 