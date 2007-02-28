<?php


abstract class BaseEstablecimiento extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre = '';


	
	protected $descripcion;


	
	protected $fk_distritoescolar_id = 0;


	
	protected $fk_organizacion_id = 0;


	
	protected $fk_niveltipo_id = 0;

	
	protected $aNiveltipo;

	
	protected $aOrganizacion;

	
	protected $aDistritoescolar;

	
	protected $collRelEstablecimientoLocacions;

	
	protected $lastRelEstablecimientoLocacionCriteria = null;

	
	protected $collUsuarios;

	
	protected $lastUsuarioCriteria = null;

	
	protected $collAlumnos;

	
	protected $lastAlumnoCriteria = null;

	
	protected $collCiclolectivos;

	
	protected $lastCiclolectivoCriteria = null;

	
	protected $collConceptos;

	
	protected $lastConceptoCriteria = null;

	
	protected $collEscalanotas;

	
	protected $lastEscalanotaCriteria = null;

	
	protected $collAnios;

	
	protected $lastAnioCriteria = null;

	
	protected $collActividads;

	
	protected $lastActividadCriteria = null;

	
	protected $collRelDocenteEstablecimientos;

	
	protected $lastRelDocenteEstablecimientoCriteria = null;

	
	protected $collHorarioescolars;

	
	protected $lastHorarioescolarCriteria = null;

	
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

	
	public function getFkDistritoescolarId()
	{

		return $this->fk_distritoescolar_id;
	}

	
	public function getFkOrganizacionId()
	{

		return $this->fk_organizacion_id;
	}

	
	public function getFkNiveltipoId()
	{

		return $this->fk_niveltipo_id;
	}

	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

		if ($this->nombre !== $v || $v === '') {
			$this->nombre = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::NOMBRE;
		}

	} 
	
	public function setDescripcion($v)
	{

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::DESCRIPCION;
		}

	} 
	
	public function setFkDistritoescolarId($v)
	{

		if ($this->fk_distritoescolar_id !== $v || $v === 0) {
			$this->fk_distritoescolar_id = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::FK_DISTRITOESCOLAR_ID;
		}

		if ($this->aDistritoescolar !== null && $this->aDistritoescolar->getId() !== $v) {
			$this->aDistritoescolar = null;
		}

	} 
	
	public function setFkOrganizacionId($v)
	{

		if ($this->fk_organizacion_id !== $v || $v === 0) {
			$this->fk_organizacion_id = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::FK_ORGANIZACION_ID;
		}

		if ($this->aOrganizacion !== null && $this->aOrganizacion->getId() !== $v) {
			$this->aOrganizacion = null;
		}

	} 
	
	public function setFkNiveltipoId($v)
	{

		if ($this->fk_niveltipo_id !== $v || $v === 0) {
			$this->fk_niveltipo_id = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::FK_NIVELTIPO_ID;
		}

		if ($this->aNiveltipo !== null && $this->aNiveltipo->getId() !== $v) {
			$this->aNiveltipo = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->descripcion = $rs->getString($startcol + 2);

			$this->fk_distritoescolar_id = $rs->getInt($startcol + 3);

			$this->fk_organizacion_id = $rs->getInt($startcol + 4);

			$this->fk_niveltipo_id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Establecimiento object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EstablecimientoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME);
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


												
			if ($this->aNiveltipo !== null) {
				if ($this->aNiveltipo->isModified()) {
					$affectedRows += $this->aNiveltipo->save($con);
				}
				$this->setNiveltipo($this->aNiveltipo);
			}

			if ($this->aOrganizacion !== null) {
				if ($this->aOrganizacion->isModified()) {
					$affectedRows += $this->aOrganizacion->save($con);
				}
				$this->setOrganizacion($this->aOrganizacion);
			}

			if ($this->aDistritoescolar !== null) {
				if ($this->aDistritoescolar->isModified()) {
					$affectedRows += $this->aDistritoescolar->save($con);
				}
				$this->setDistritoescolar($this->aDistritoescolar);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EstablecimientoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EstablecimientoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collRelEstablecimientoLocacions !== null) {
				foreach($this->collRelEstablecimientoLocacions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUsuarios !== null) {
				foreach($this->collUsuarios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAlumnos !== null) {
				foreach($this->collAlumnos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCiclolectivos !== null) {
				foreach($this->collCiclolectivos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collConceptos !== null) {
				foreach($this->collConceptos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEscalanotas !== null) {
				foreach($this->collEscalanotas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAnios !== null) {
				foreach($this->collAnios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collActividads !== null) {
				foreach($this->collActividads as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelDocenteEstablecimientos !== null) {
				foreach($this->collRelDocenteEstablecimientos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collHorarioescolars !== null) {
				foreach($this->collHorarioescolars as $referrerFK) {
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


												
			if ($this->aNiveltipo !== null) {
				if (!$this->aNiveltipo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aNiveltipo->getValidationFailures());
				}
			}

			if ($this->aOrganizacion !== null) {
				if (!$this->aOrganizacion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOrganizacion->getValidationFailures());
				}
			}

			if ($this->aDistritoescolar !== null) {
				if (!$this->aDistritoescolar->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDistritoescolar->getValidationFailures());
				}
			}


			if (($retval = EstablecimientoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelEstablecimientoLocacions !== null) {
					foreach($this->collRelEstablecimientoLocacions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUsuarios !== null) {
					foreach($this->collUsuarios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAlumnos !== null) {
					foreach($this->collAlumnos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCiclolectivos !== null) {
					foreach($this->collCiclolectivos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collConceptos !== null) {
					foreach($this->collConceptos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEscalanotas !== null) {
					foreach($this->collEscalanotas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAnios !== null) {
					foreach($this->collAnios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collActividads !== null) {
					foreach($this->collActividads as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelDocenteEstablecimientos !== null) {
					foreach($this->collRelDocenteEstablecimientos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collHorarioescolars !== null) {
					foreach($this->collHorarioescolars as $referrerFK) {
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
		$pos = EstablecimientoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkDistritoescolarId();
				break;
			case 4:
				return $this->getFkOrganizacionId();
				break;
			case 5:
				return $this->getFkNiveltipoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EstablecimientoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getFkDistritoescolarId(),
			$keys[4] => $this->getFkOrganizacionId(),
			$keys[5] => $this->getFkNiveltipoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EstablecimientoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFkDistritoescolarId($value);
				break;
			case 4:
				$this->setFkOrganizacionId($value);
				break;
			case 5:
				$this->setFkNiveltipoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EstablecimientoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkDistritoescolarId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFkOrganizacionId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFkNiveltipoId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);

		if ($this->isColumnModified(EstablecimientoPeer::ID)) $criteria->add(EstablecimientoPeer::ID, $this->id);
		if ($this->isColumnModified(EstablecimientoPeer::NOMBRE)) $criteria->add(EstablecimientoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(EstablecimientoPeer::DESCRIPCION)) $criteria->add(EstablecimientoPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID)) $criteria->add(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, $this->fk_distritoescolar_id);
		if ($this->isColumnModified(EstablecimientoPeer::FK_ORGANIZACION_ID)) $criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->fk_organizacion_id);
		if ($this->isColumnModified(EstablecimientoPeer::FK_NIVELTIPO_ID)) $criteria->add(EstablecimientoPeer::FK_NIVELTIPO_ID, $this->fk_niveltipo_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);

		$criteria->add(EstablecimientoPeer::ID, $this->id);

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

		$copyObj->setFkDistritoescolarId($this->fk_distritoescolar_id);

		$copyObj->setFkOrganizacionId($this->fk_organizacion_id);

		$copyObj->setFkNiveltipoId($this->fk_niveltipo_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getRelEstablecimientoLocacions() as $relObj) {
				$copyObj->addRelEstablecimientoLocacion($relObj->copy($deepCopy));
			}

			foreach($this->getUsuarios() as $relObj) {
				$copyObj->addUsuario($relObj->copy($deepCopy));
			}

			foreach($this->getAlumnos() as $relObj) {
				$copyObj->addAlumno($relObj->copy($deepCopy));
			}

			foreach($this->getCiclolectivos() as $relObj) {
				$copyObj->addCiclolectivo($relObj->copy($deepCopy));
			}

			foreach($this->getConceptos() as $relObj) {
				$copyObj->addConcepto($relObj->copy($deepCopy));
			}

			foreach($this->getEscalanotas() as $relObj) {
				$copyObj->addEscalanota($relObj->copy($deepCopy));
			}

			foreach($this->getAnios() as $relObj) {
				$copyObj->addAnio($relObj->copy($deepCopy));
			}

			foreach($this->getActividads() as $relObj) {
				$copyObj->addActividad($relObj->copy($deepCopy));
			}

			foreach($this->getRelDocenteEstablecimientos() as $relObj) {
				$copyObj->addRelDocenteEstablecimiento($relObj->copy($deepCopy));
			}

			foreach($this->getHorarioescolars() as $relObj) {
				$copyObj->addHorarioescolar($relObj->copy($deepCopy));
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
			self::$peer = new EstablecimientoPeer();
		}
		return self::$peer;
	}

	
	public function setNiveltipo($v)
	{


		if ($v === null) {
			$this->setFkNiveltipoId('0');
		} else {
			$this->setFkNiveltipoId($v->getId());
		}


		$this->aNiveltipo = $v;
	}


	
	public function getNiveltipo($con = null)
	{
				include_once 'lib/model/om/BaseNiveltipoPeer.php';

		if ($this->aNiveltipo === null && ($this->fk_niveltipo_id !== null)) {

			$this->aNiveltipo = NiveltipoPeer::retrieveByPK($this->fk_niveltipo_id, $con);

			
		}
		return $this->aNiveltipo;
	}

	
	public function setOrganizacion($v)
	{


		if ($v === null) {
			$this->setFkOrganizacionId('0');
		} else {
			$this->setFkOrganizacionId($v->getId());
		}


		$this->aOrganizacion = $v;
	}


	
	public function getOrganizacion($con = null)
	{
				include_once 'lib/model/om/BaseOrganizacionPeer.php';

		if ($this->aOrganizacion === null && ($this->fk_organizacion_id !== null)) {

			$this->aOrganizacion = OrganizacionPeer::retrieveByPK($this->fk_organizacion_id, $con);

			
		}
		return $this->aOrganizacion;
	}

	
	public function setDistritoescolar($v)
	{


		if ($v === null) {
			$this->setFkDistritoescolarId('0');
		} else {
			$this->setFkDistritoescolarId($v->getId());
		}


		$this->aDistritoescolar = $v;
	}


	
	public function getDistritoescolar($con = null)
	{
				include_once 'lib/model/om/BaseDistritoescolarPeer.php';

		if ($this->aDistritoescolar === null && ($this->fk_distritoescolar_id !== null)) {

			$this->aDistritoescolar = DistritoescolarPeer::retrieveByPK($this->fk_distritoescolar_id, $con);

			
		}
		return $this->aDistritoescolar;
	}

	
	public function initRelEstablecimientoLocacions()
	{
		if ($this->collRelEstablecimientoLocacions === null) {
			$this->collRelEstablecimientoLocacions = array();
		}
	}

	
	public function getRelEstablecimientoLocacions($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelEstablecimientoLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelEstablecimientoLocacions === null) {
			if ($this->isNew()) {
			   $this->collRelEstablecimientoLocacions = array();
			} else {

				$criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				RelEstablecimientoLocacionPeer::addSelectColumns($criteria);
				$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				RelEstablecimientoLocacionPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelEstablecimientoLocacionCriteria) || !$this->lastRelEstablecimientoLocacionCriteria->equals($criteria)) {
					$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelEstablecimientoLocacionCriteria = $criteria;
		return $this->collRelEstablecimientoLocacions;
	}

	
	public function countRelEstablecimientoLocacions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRelEstablecimientoLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return RelEstablecimientoLocacionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelEstablecimientoLocacion(RelEstablecimientoLocacion $l)
	{
		$this->collRelEstablecimientoLocacions[] = $l;
		$l->setEstablecimiento($this);
	}


	
	public function getRelEstablecimientoLocacionsJoinLocacion($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelEstablecimientoLocacionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelEstablecimientoLocacions === null) {
			if ($this->isNew()) {
				$this->collRelEstablecimientoLocacions = array();
			} else {

				$criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelectJoinLocacion($criteria, $con);
			}
		} else {
									
			$criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastRelEstablecimientoLocacionCriteria) || !$this->lastRelEstablecimientoLocacionCriteria->equals($criteria)) {
				$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelectJoinLocacion($criteria, $con);
			}
		}
		$this->lastRelEstablecimientoLocacionCriteria = $criteria;

		return $this->collRelEstablecimientoLocacions;
	}

	
	public function initUsuarios()
	{
		if ($this->collUsuarios === null) {
			$this->collUsuarios = array();
		}
	}

	
	public function getUsuarios($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseUsuarioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarios === null) {
			if ($this->isNew()) {
			   $this->collUsuarios = array();
			} else {

				$criteria->add(UsuarioPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				UsuarioPeer::addSelectColumns($criteria);
				$this->collUsuarios = UsuarioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UsuarioPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				UsuarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastUsuarioCriteria) || !$this->lastUsuarioCriteria->equals($criteria)) {
					$this->collUsuarios = UsuarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUsuarioCriteria = $criteria;
		return $this->collUsuarios;
	}

	
	public function countUsuarios($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseUsuarioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UsuarioPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return UsuarioPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addUsuario(Usuario $l)
	{
		$this->collUsuarios[] = $l;
		$l->setEstablecimiento($this);
	}

	
	public function initAlumnos()
	{
		if ($this->collAlumnos === null) {
			$this->collAlumnos = array();
		}
	}

	
	public function getAlumnos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
			   $this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				AlumnoPeer::addSelectColumns($criteria);
				$this->collAlumnos = AlumnoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				AlumnoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
					$this->collAlumnos = AlumnoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAlumnoCriteria = $criteria;
		return $this->collAlumnos;
	}

	
	public function countAlumnos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return AlumnoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAlumno(Alumno $l)
	{
		$this->collAlumnos[] = $l;
		$l->setEstablecimiento($this);
	}


	
	public function getAlumnosJoinTipodocumento($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinTipodocumento($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinTipodocumento($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinCuenta($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinCuenta($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinCuenta($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinProvincia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinProvincia($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinProvincia($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinConceptobaja($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinConceptobaja($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinConceptobaja($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinPais($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collAlumnos = AlumnoPeer::doSelectJoinPais($criteria, $con);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinPais($criteria, $con);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}

	
	public function initCiclolectivos()
	{
		if ($this->collCiclolectivos === null) {
			$this->collCiclolectivos = array();
		}
	}

	
	public function getCiclolectivos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCiclolectivoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCiclolectivos === null) {
			if ($this->isNew()) {
			   $this->collCiclolectivos = array();
			} else {

				$criteria->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				CiclolectivoPeer::addSelectColumns($criteria);
				$this->collCiclolectivos = CiclolectivoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				CiclolectivoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCiclolectivoCriteria) || !$this->lastCiclolectivoCriteria->equals($criteria)) {
					$this->collCiclolectivos = CiclolectivoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCiclolectivoCriteria = $criteria;
		return $this->collCiclolectivos;
	}

	
	public function countCiclolectivos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCiclolectivoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return CiclolectivoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCiclolectivo(Ciclolectivo $l)
	{
		$this->collCiclolectivos[] = $l;
		$l->setEstablecimiento($this);
	}

	
	public function initConceptos()
	{
		if ($this->collConceptos === null) {
			$this->collConceptos = array();
		}
	}

	
	public function getConceptos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseConceptoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collConceptos === null) {
			if ($this->isNew()) {
			   $this->collConceptos = array();
			} else {

				$criteria->add(ConceptoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				ConceptoPeer::addSelectColumns($criteria);
				$this->collConceptos = ConceptoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ConceptoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				ConceptoPeer::addSelectColumns($criteria);
				if (!isset($this->lastConceptoCriteria) || !$this->lastConceptoCriteria->equals($criteria)) {
					$this->collConceptos = ConceptoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastConceptoCriteria = $criteria;
		return $this->collConceptos;
	}

	
	public function countConceptos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseConceptoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ConceptoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return ConceptoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addConcepto(Concepto $l)
	{
		$this->collConceptos[] = $l;
		$l->setEstablecimiento($this);
	}

	
	public function initEscalanotas()
	{
		if ($this->collEscalanotas === null) {
			$this->collEscalanotas = array();
		}
	}

	
	public function getEscalanotas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEscalanotaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEscalanotas === null) {
			if ($this->isNew()) {
			   $this->collEscalanotas = array();
			} else {

				$criteria->add(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				EscalanotaPeer::addSelectColumns($criteria);
				$this->collEscalanotas = EscalanotaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				EscalanotaPeer::addSelectColumns($criteria);
				if (!isset($this->lastEscalanotaCriteria) || !$this->lastEscalanotaCriteria->equals($criteria)) {
					$this->collEscalanotas = EscalanotaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEscalanotaCriteria = $criteria;
		return $this->collEscalanotas;
	}

	
	public function countEscalanotas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEscalanotaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return EscalanotaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEscalanota(Escalanota $l)
	{
		$this->collEscalanotas[] = $l;
		$l->setEstablecimiento($this);
	}

	
	public function initAnios()
	{
		if ($this->collAnios === null) {
			$this->collAnios = array();
		}
	}

	
	public function getAnios($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAnioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAnios === null) {
			if ($this->isNew()) {
			   $this->collAnios = array();
			} else {

				$criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				AnioPeer::addSelectColumns($criteria);
				$this->collAnios = AnioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				AnioPeer::addSelectColumns($criteria);
				if (!isset($this->lastAnioCriteria) || !$this->lastAnioCriteria->equals($criteria)) {
					$this->collAnios = AnioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAnioCriteria = $criteria;
		return $this->collAnios;
	}

	
	public function countAnios($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAnioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return AnioPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAnio(Anio $l)
	{
		$this->collAnios[] = $l;
		$l->setEstablecimiento($this);
	}

	
	public function initActividads()
	{
		if ($this->collActividads === null) {
			$this->collActividads = array();
		}
	}

	
	public function getActividads($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseActividadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActividads === null) {
			if ($this->isNew()) {
			   $this->collActividads = array();
			} else {

				$criteria->add(ActividadPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				ActividadPeer::addSelectColumns($criteria);
				$this->collActividads = ActividadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ActividadPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				ActividadPeer::addSelectColumns($criteria);
				if (!isset($this->lastActividadCriteria) || !$this->lastActividadCriteria->equals($criteria)) {
					$this->collActividads = ActividadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastActividadCriteria = $criteria;
		return $this->collActividads;
	}

	
	public function countActividads($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseActividadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ActividadPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return ActividadPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addActividad(Actividad $l)
	{
		$this->collActividads[] = $l;
		$l->setEstablecimiento($this);
	}

	
	public function initRelDocenteEstablecimientos()
	{
		if ($this->collRelDocenteEstablecimientos === null) {
			$this->collRelDocenteEstablecimientos = array();
		}
	}

	
	public function getRelDocenteEstablecimientos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelDocenteEstablecimientoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDocenteEstablecimientos === null) {
			if ($this->isNew()) {
			   $this->collRelDocenteEstablecimientos = array();
			} else {

				$criteria->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				RelDocenteEstablecimientoPeer::addSelectColumns($criteria);
				$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				RelDocenteEstablecimientoPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelDocenteEstablecimientoCriteria) || !$this->lastRelDocenteEstablecimientoCriteria->equals($criteria)) {
					$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelDocenteEstablecimientoCriteria = $criteria;
		return $this->collRelDocenteEstablecimientos;
	}

	
	public function countRelDocenteEstablecimientos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRelDocenteEstablecimientoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return RelDocenteEstablecimientoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelDocenteEstablecimiento(RelDocenteEstablecimiento $l)
	{
		$this->collRelDocenteEstablecimientos[] = $l;
		$l->setEstablecimiento($this);
	}


	
	public function getRelDocenteEstablecimientosJoinDocente($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelDocenteEstablecimientoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDocenteEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collRelDocenteEstablecimientos = array();
			} else {

				$criteria->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelectJoinDocente($criteria, $con);
			}
		} else {
									
			$criteria->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastRelDocenteEstablecimientoCriteria) || !$this->lastRelDocenteEstablecimientoCriteria->equals($criteria)) {
				$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelectJoinDocente($criteria, $con);
			}
		}
		$this->lastRelDocenteEstablecimientoCriteria = $criteria;

		return $this->collRelDocenteEstablecimientos;
	}

	
	public function initHorarioescolars()
	{
		if ($this->collHorarioescolars === null) {
			$this->collHorarioescolars = array();
		}
	}

	
	public function getHorarioescolars($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseHorarioescolarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
			   $this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				HorarioescolarPeer::addSelectColumns($criteria);
				$this->collHorarioescolars = HorarioescolarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				HorarioescolarPeer::addSelectColumns($criteria);
				if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
					$this->collHorarioescolars = HorarioescolarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;
		return $this->collHorarioescolars;
	}

	
	public function countHorarioescolars($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseHorarioescolarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

		return HorarioescolarPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addHorarioescolar(Horarioescolar $l)
	{
		$this->collHorarioescolars[] = $l;
		$l->setEstablecimiento($this);
	}


	
	public function getHorarioescolarsJoinHorarioescolartipo($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseHorarioescolarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinHorarioescolartipo($criteria, $con);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinHorarioescolartipo($criteria, $con);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}


	
	public function getHorarioescolarsJoinTurnos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseHorarioescolarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinTurnos($criteria, $con);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->getId());

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinTurnos($criteria, $con);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}

} 