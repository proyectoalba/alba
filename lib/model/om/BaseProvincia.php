<?php


abstract class BaseProvincia extends BaseObject  implements Persistent {


  const PEER = 'ProvinciaPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre_corto;

	
	protected $nombre_largo;

	
	protected $fk_pais_id;

	
	protected $orden;

	
	protected $aPais;

	
	protected $collLocacions;

	
	private $lastLocacionCriteria = null;

	
	protected $collOrganizacions;

	
	private $lastOrganizacionCriteria = null;

	
	protected $collEstablecimientos;

	
	private $lastEstablecimientoCriteria = null;

	
	protected $collCuentas;

	
	private $lastCuentaCriteria = null;

	
	protected $collAlumnos;

	
	private $lastAlumnoCriteria = null;

	
	protected $collResponsables;

	
	private $lastResponsableCriteria = null;

	
	protected $collDocentes;

	
	private $lastDocenteCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->fk_pais_id = 0;
		$this->orden = 0;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getNombreCorto()
	{
		return $this->nombre_corto;
	}

	
	public function getNombreLargo()
	{
		return $this->nombre_largo;
	}

	
	public function getFkPaisId()
	{
		return $this->fk_pais_id;
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
			$this->modifiedColumns[] = ProvinciaPeer::ID;
		}

		return $this;
	} 
	
	public function setNombreCorto($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nombre_corto !== $v) {
			$this->nombre_corto = $v;
			$this->modifiedColumns[] = ProvinciaPeer::NOMBRE_CORTO;
		}

		return $this;
	} 
	
	public function setNombreLargo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nombre_largo !== $v) {
			$this->nombre_largo = $v;
			$this->modifiedColumns[] = ProvinciaPeer::NOMBRE_LARGO;
		}

		return $this;
	} 
	
	public function setFkPaisId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_pais_id !== $v || $v === 0) {
			$this->fk_pais_id = $v;
			$this->modifiedColumns[] = ProvinciaPeer::FK_PAIS_ID;
		}

		if ($this->aPais !== null && $this->aPais->getId() !== $v) {
			$this->aPais = null;
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
			$this->modifiedColumns[] = ProvinciaPeer::ORDEN;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(ProvinciaPeer::FK_PAIS_ID,ProvinciaPeer::ORDEN))) {
				return false;
			}

			if ($this->fk_pais_id !== 0) {
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
			$this->nombre_corto = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->nombre_largo = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->fk_pais_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->orden = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Provincia object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aPais !== null && $this->fk_pais_id !== $this->aPais->getId()) {
			$this->aPais = null;
		}
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
			$con = Propel::getConnection(ProvinciaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = ProvinciaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aPais = null;
			$this->collLocacions = null;
			$this->lastLocacionCriteria = null;

			$this->collOrganizacions = null;
			$this->lastOrganizacionCriteria = null;

			$this->collEstablecimientos = null;
			$this->lastEstablecimientoCriteria = null;

			$this->collCuentas = null;
			$this->lastCuentaCriteria = null;

			$this->collAlumnos = null;
			$this->lastAlumnoCriteria = null;

			$this->collResponsables = null;
			$this->lastResponsableCriteria = null;

			$this->collDocentes = null;
			$this->lastDocenteCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProvinciaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			ProvinciaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ProvinciaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			ProvinciaPeer::addInstanceToPool($this);
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

												
			if ($this->aPais !== null) {
				if ($this->aPais->isModified() || $this->aPais->isNew()) {
					$affectedRows += $this->aPais->save($con);
				}
				$this->setPais($this->aPais);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ProvinciaPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProvinciaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ProvinciaPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collLocacions !== null) {
				foreach ($this->collLocacions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collOrganizacions !== null) {
				foreach ($this->collOrganizacions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEstablecimientos !== null) {
				foreach ($this->collEstablecimientos as $referrerFK) {
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

			if ($this->collAlumnos !== null) {
				foreach ($this->collAlumnos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collResponsables !== null) {
				foreach ($this->collResponsables as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDocentes !== null) {
				foreach ($this->collDocentes as $referrerFK) {
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


												
			if ($this->aPais !== null) {
				if (!$this->aPais->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPais->getValidationFailures());
				}
			}


			if (($retval = ProvinciaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLocacions !== null) {
					foreach ($this->collLocacions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collOrganizacions !== null) {
					foreach ($this->collOrganizacions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEstablecimientos !== null) {
					foreach ($this->collEstablecimientos as $referrerFK) {
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

				if ($this->collAlumnos !== null) {
					foreach ($this->collAlumnos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collResponsables !== null) {
					foreach ($this->collResponsables as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDocentes !== null) {
					foreach ($this->collDocentes as $referrerFK) {
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
		$pos = ProvinciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNombreCorto();
				break;
			case 2:
				return $this->getNombreLargo();
				break;
			case 3:
				return $this->getFkPaisId();
				break;
			case 4:
				return $this->getOrden();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = ProvinciaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombreCorto(),
			$keys[2] => $this->getNombreLargo(),
			$keys[3] => $this->getFkPaisId(),
			$keys[4] => $this->getOrden(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProvinciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNombreCorto($value);
				break;
			case 2:
				$this->setNombreLargo($value);
				break;
			case 3:
				$this->setFkPaisId($value);
				break;
			case 4:
				$this->setOrden($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProvinciaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombreCorto($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombreLargo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkPaisId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOrden($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProvinciaPeer::ID)) $criteria->add(ProvinciaPeer::ID, $this->id);
		if ($this->isColumnModified(ProvinciaPeer::NOMBRE_CORTO)) $criteria->add(ProvinciaPeer::NOMBRE_CORTO, $this->nombre_corto);
		if ($this->isColumnModified(ProvinciaPeer::NOMBRE_LARGO)) $criteria->add(ProvinciaPeer::NOMBRE_LARGO, $this->nombre_largo);
		if ($this->isColumnModified(ProvinciaPeer::FK_PAIS_ID)) $criteria->add(ProvinciaPeer::FK_PAIS_ID, $this->fk_pais_id);
		if ($this->isColumnModified(ProvinciaPeer::ORDEN)) $criteria->add(ProvinciaPeer::ORDEN, $this->orden);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);

		$criteria->add(ProvinciaPeer::ID, $this->id);

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

		$copyObj->setNombreCorto($this->nombre_corto);

		$copyObj->setNombreLargo($this->nombre_largo);

		$copyObj->setFkPaisId($this->fk_pais_id);

		$copyObj->setOrden($this->orden);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getLocacions() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addLocacion($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getOrganizacions() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addOrganizacion($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getEstablecimientos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addEstablecimiento($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCuentas() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addCuenta($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAlumnos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addAlumno($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getResponsables() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addResponsable($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getDocentes() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDocente($relObj->copy($deepCopy));
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
			self::$peer = new ProvinciaPeer();
		}
		return self::$peer;
	}

	
	public function setPais(Pais $v = null)
	{
		if ($v === null) {
			$this->setFkPaisId(0);
		} else {
			$this->setFkPaisId($v->getId());
		}

		$this->aPais = $v;

						if ($v !== null) {
			$v->addProvincia($this);
		}

		return $this;
	}


	
	public function getPais(PropelPDO $con = null)
	{
		if ($this->aPais === null && ($this->fk_pais_id !== null)) {
			$c = new Criteria(PaisPeer::DATABASE_NAME);
			$c->add(PaisPeer::ID, $this->fk_pais_id);
			$this->aPais = PaisPeer::doSelectOne($c, $con);
			
		}
		return $this->aPais;
	}

	
	public function clearLocacions()
	{
		$this->collLocacions = null; 	}

	
	public function initLocacions()
	{
		$this->collLocacions = array();
	}

	
	public function getLocacions($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLocacions === null) {
			if ($this->isNew()) {
			   $this->collLocacions = array();
			} else {

				$criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->id);

				LocacionPeer::addSelectColumns($criteria);
				$this->collLocacions = LocacionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->id);

				LocacionPeer::addSelectColumns($criteria);
				if (!isset($this->lastLocacionCriteria) || !$this->lastLocacionCriteria->equals($criteria)) {
					$this->collLocacions = LocacionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLocacionCriteria = $criteria;
		return $this->collLocacions;
	}

	
	public function countLocacions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLocacions === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->id);

				$count = LocacionPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->id);

				if (!isset($this->lastLocacionCriteria) || !$this->lastLocacionCriteria->equals($criteria)) {
					$count = LocacionPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collLocacions);
				}
			} else {
				$count = count($this->collLocacions);
			}
		}
		return $count;
	}

	
	public function addLocacion(Locacion $l)
	{
		if ($this->collLocacions === null) {
			$this->initLocacions();
		}
		if (!in_array($l, $this->collLocacions, true)) { 			array_push($this->collLocacions, $l);
			$l->setProvincia($this);
		}
	}


	
	public function getLocacionsJoinTipolocacion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLocacions === null) {
			if ($this->isNew()) {
				$this->collLocacions = array();
			} else {

				$criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->id);

				$this->collLocacions = LocacionPeer::doSelectJoinTipolocacion($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(LocacionPeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastLocacionCriteria) || !$this->lastLocacionCriteria->equals($criteria)) {
				$this->collLocacions = LocacionPeer::doSelectJoinTipolocacion($criteria, $con, $join_behavior);
			}
		}
		$this->lastLocacionCriteria = $criteria;

		return $this->collLocacions;
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
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrganizacions === null) {
			if ($this->isNew()) {
			   $this->collOrganizacions = array();
			} else {

				$criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->id);

				OrganizacionPeer::addSelectColumns($criteria);
				$this->collOrganizacions = OrganizacionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->id);

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
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
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

				$criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->id);

				$count = OrganizacionPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->id);

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
			$l->setProvincia($this);
		}
	}


	
	public function getOrganizacionsJoinTipoiva($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrganizacions === null) {
			if ($this->isNew()) {
				$this->collOrganizacions = array();
			} else {

				$criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->id);

				$this->collOrganizacions = OrganizacionPeer::doSelectJoinTipoiva($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(OrganizacionPeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastOrganizacionCriteria) || !$this->lastOrganizacionCriteria->equals($criteria)) {
				$this->collOrganizacions = OrganizacionPeer::doSelectJoinTipoiva($criteria, $con, $join_behavior);
			}
		}
		$this->lastOrganizacionCriteria = $criteria;

		return $this->collOrganizacions;
	}

	
	public function clearEstablecimientos()
	{
		$this->collEstablecimientos = null; 	}

	
	public function initEstablecimientos()
	{
		$this->collEstablecimientos = array();
	}

	
	public function getEstablecimientos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
			   $this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_PROVINCIA_ID, $this->id);

				EstablecimientoPeer::addSelectColumns($criteria);
				$this->collEstablecimientos = EstablecimientoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EstablecimientoPeer::FK_PROVINCIA_ID, $this->id);

				EstablecimientoPeer::addSelectColumns($criteria);
				if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
					$this->collEstablecimientos = EstablecimientoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;
		return $this->collEstablecimientos;
	}

	
	public function countEstablecimientos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(EstablecimientoPeer::FK_PROVINCIA_ID, $this->id);

				$count = EstablecimientoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EstablecimientoPeer::FK_PROVINCIA_ID, $this->id);

				if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
					$count = EstablecimientoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collEstablecimientos);
				}
			} else {
				$count = count($this->collEstablecimientos);
			}
		}
		return $count;
	}

	
	public function addEstablecimiento(Establecimiento $l)
	{
		if ($this->collEstablecimientos === null) {
			$this->initEstablecimientos();
		}
		if (!in_array($l, $this->collEstablecimientos, true)) { 			array_push($this->collEstablecimientos, $l);
			$l->setProvincia($this);
		}
	}


	
	public function getEstablecimientosJoinDistritoescolar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_PROVINCIA_ID, $this->id);

				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinDistritoescolar($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(EstablecimientoPeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinDistritoescolar($criteria, $con, $join_behavior);
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;

		return $this->collEstablecimientos;
	}


	
	public function getEstablecimientosJoinOrganizacion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_PROVINCIA_ID, $this->id);

				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinOrganizacion($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(EstablecimientoPeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinOrganizacion($criteria, $con, $join_behavior);
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;

		return $this->collEstablecimientos;
	}


	
	public function getEstablecimientosJoinNiveltipo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collEstablecimientos = array();
			} else {

				$criteria->add(EstablecimientoPeer::FK_PROVINCIA_ID, $this->id);

				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinNiveltipo($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(EstablecimientoPeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastEstablecimientoCriteria) || !$this->lastEstablecimientoCriteria->equals($criteria)) {
				$this->collEstablecimientos = EstablecimientoPeer::doSelectJoinNiveltipo($criteria, $con, $join_behavior);
			}
		}
		$this->lastEstablecimientoCriteria = $criteria;

		return $this->collEstablecimientos;
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
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuentas === null) {
			if ($this->isNew()) {
			   $this->collCuentas = array();
			} else {

				$criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->id);

				CuentaPeer::addSelectColumns($criteria);
				$this->collCuentas = CuentaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->id);

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
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
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

				$criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->id);

				$count = CuentaPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->id);

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
			$l->setProvincia($this);
		}
	}


	
	public function getCuentasJoinTipoiva($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuentas === null) {
			if ($this->isNew()) {
				$this->collCuentas = array();
			} else {

				$criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->id);

				$this->collCuentas = CuentaPeer::doSelectJoinTipoiva($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(CuentaPeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastCuentaCriteria) || !$this->lastCuentaCriteria->equals($criteria)) {
				$this->collCuentas = CuentaPeer::doSelectJoinTipoiva($criteria, $con, $join_behavior);
			}
		}
		$this->lastCuentaCriteria = $criteria;

		return $this->collCuentas;
	}

	
	public function clearAlumnos()
	{
		$this->collAlumnos = null; 	}

	
	public function initAlumnos()
	{
		$this->collAlumnos = array();
	}

	
	public function getAlumnos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
			   $this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->id);

				AlumnoPeer::addSelectColumns($criteria);
				$this->collAlumnos = AlumnoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->id);

				AlumnoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
					$this->collAlumnos = AlumnoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAlumnoCriteria = $criteria;
		return $this->collAlumnos;
	}

	
	public function countAlumnos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->id);

				$count = AlumnoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->id);

				if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
					$count = AlumnoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collAlumnos);
				}
			} else {
				$count = count($this->collAlumnos);
			}
		}
		return $count;
	}

	
	public function addAlumno(Alumno $l)
	{
		if ($this->collAlumnos === null) {
			$this->initAlumnos();
		}
		if (!in_array($l, $this->collAlumnos, true)) { 			array_push($this->collAlumnos, $l);
			$l->setProvincia($this);
		}
	}


	
	public function getAlumnosJoinTipodocumento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinTipodocumento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinTipodocumento($criteria, $con, $join_behavior);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinEstablecimiento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinCuenta($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinCuenta($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinCuenta($criteria, $con, $join_behavior);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinConceptobaja($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinConceptobaja($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinConceptobaja($criteria, $con, $join_behavior);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinPais($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinPais($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinPais($criteria, $con, $join_behavior);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinEstadosalumnos($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinEstadosalumnos($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinEstadosalumnos($criteria, $con, $join_behavior);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}

	
	public function clearResponsables()
	{
		$this->collResponsables = null; 	}

	
	public function initResponsables()
	{
		$this->collResponsables = array();
	}

	
	public function getResponsables($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
			   $this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->id);

				ResponsablePeer::addSelectColumns($criteria);
				$this->collResponsables = ResponsablePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->id);

				ResponsablePeer::addSelectColumns($criteria);
				if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
					$this->collResponsables = ResponsablePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastResponsableCriteria = $criteria;
		return $this->collResponsables;
	}

	
	public function countResponsables(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->id);

				$count = ResponsablePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->id);

				if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
					$count = ResponsablePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collResponsables);
				}
			} else {
				$count = count($this->collResponsables);
			}
		}
		return $count;
	}

	
	public function addResponsable(Responsable $l)
	{
		if ($this->collResponsables === null) {
			$this->initResponsables();
		}
		if (!in_array($l, $this->collResponsables, true)) { 			array_push($this->collResponsables, $l);
			$l->setProvincia($this);
		}
	}


	
	public function getResponsablesJoinTipodocumento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
				$this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->id);

				$this->collResponsables = ResponsablePeer::doSelectJoinTipodocumento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinTipodocumento($criteria, $con, $join_behavior);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}


	
	public function getResponsablesJoinCuenta($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
				$this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->id);

				$this->collResponsables = ResponsablePeer::doSelectJoinCuenta($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinCuenta($criteria, $con, $join_behavior);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}


	
	public function getResponsablesJoinRolResponsable($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
				$this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->id);

				$this->collResponsables = ResponsablePeer::doSelectJoinRolResponsable($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinRolResponsable($criteria, $con, $join_behavior);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}


	
	public function getResponsablesJoinNivelInstruccion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResponsables === null) {
			if ($this->isNew()) {
				$this->collResponsables = array();
			} else {

				$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->id);

				$this->collResponsables = ResponsablePeer::doSelectJoinNivelInstruccion($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ResponsablePeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastResponsableCriteria) || !$this->lastResponsableCriteria->equals($criteria)) {
				$this->collResponsables = ResponsablePeer::doSelectJoinNivelInstruccion($criteria, $con, $join_behavior);
			}
		}
		$this->lastResponsableCriteria = $criteria;

		return $this->collResponsables;
	}

	
	public function clearDocentes()
	{
		$this->collDocentes = null; 	}

	
	public function initDocentes()
	{
		$this->collDocentes = array();
	}

	
	public function getDocentes($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDocentes === null) {
			if ($this->isNew()) {
			   $this->collDocentes = array();
			} else {

				$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->id);

				DocentePeer::addSelectColumns($criteria);
				$this->collDocentes = DocentePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->id);

				DocentePeer::addSelectColumns($criteria);
				if (!isset($this->lastDocenteCriteria) || !$this->lastDocenteCriteria->equals($criteria)) {
					$this->collDocentes = DocentePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDocenteCriteria = $criteria;
		return $this->collDocentes;
	}

	
	public function countDocentes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDocentes === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->id);

				$count = DocentePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->id);

				if (!isset($this->lastDocenteCriteria) || !$this->lastDocenteCriteria->equals($criteria)) {
					$count = DocentePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDocentes);
				}
			} else {
				$count = count($this->collDocentes);
			}
		}
		return $count;
	}

	
	public function addDocente(Docente $l)
	{
		if ($this->collDocentes === null) {
			$this->initDocentes();
		}
		if (!in_array($l, $this->collDocentes, true)) { 			array_push($this->collDocentes, $l);
			$l->setProvincia($this);
		}
	}


	
	public function getDocentesJoinTipodocumento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDocentes === null) {
			if ($this->isNew()) {
				$this->collDocentes = array();
			} else {

				$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->id);

				$this->collDocentes = DocentePeer::doSelectJoinTipodocumento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastDocenteCriteria) || !$this->lastDocenteCriteria->equals($criteria)) {
				$this->collDocentes = DocentePeer::doSelectJoinTipodocumento($criteria, $con, $join_behavior);
			}
		}
		$this->lastDocenteCriteria = $criteria;

		return $this->collDocentes;
	}


	
	public function getDocentesJoinPais($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDocentes === null) {
			if ($this->isNew()) {
				$this->collDocentes = array();
			} else {

				$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->id);

				$this->collDocentes = DocentePeer::doSelectJoinPais($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DocentePeer::FK_PROVINCIA_ID, $this->id);

			if (!isset($this->lastDocenteCriteria) || !$this->lastDocenteCriteria->equals($criteria)) {
				$this->collDocentes = DocentePeer::doSelectJoinPais($criteria, $con, $join_behavior);
			}
		}
		$this->lastDocenteCriteria = $criteria;

		return $this->collDocentes;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collLocacions) {
				foreach ((array) $this->collLocacions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collOrganizacions) {
				foreach ((array) $this->collOrganizacions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collEstablecimientos) {
				foreach ((array) $this->collEstablecimientos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCuentas) {
				foreach ((array) $this->collCuentas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAlumnos) {
				foreach ((array) $this->collAlumnos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collResponsables) {
				foreach ((array) $this->collResponsables as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collDocentes) {
				foreach ((array) $this->collDocentes as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collLocacions = null;
		$this->collOrganizacions = null;
		$this->collEstablecimientos = null;
		$this->collCuentas = null;
		$this->collAlumnos = null;
		$this->collResponsables = null;
		$this->collDocentes = null;
			$this->aPais = null;
	}

} 