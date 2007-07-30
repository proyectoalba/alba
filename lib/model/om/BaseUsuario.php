<?php


abstract class BaseUsuario extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $usuario;


	
	protected $clave;


	
	protected $correo_publico = true;


	
	protected $activo = true;


	
	protected $fecha_creado;


	
	protected $fecha_actualizado;


	
	protected $seguridad_pregunta;


	
	protected $seguridad_respuesta;


	
	protected $email;


	
	protected $fk_establecimiento_id = 0;


	
	protected $borrado = false;

	
	protected $aEstablecimiento;

	
	protected $collRelUsuarioPermisos;

	
	protected $lastRelUsuarioPermisoCriteria = null;

	
	protected $collLegajopedagogicos;

	
	protected $lastLegajopedagogicoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getUsuario()
	{

		return $this->usuario;
	}

	
	public function getClave()
	{

		return $this->clave;
	}

	
	public function getCorreoPublico()
	{

		return $this->correo_publico;
	}

	
	public function getActivo()
	{

		return $this->activo;
	}

	
	public function getFechaCreado($format = 'Y-m-d H:i:s')
	{

		if ($this->fecha_creado === null || $this->fecha_creado === '') {
			return null;
		} elseif (!is_int($this->fecha_creado)) {
						$ts = strtotime($this->fecha_creado);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha_creado] as date/time value: " . var_export($this->fecha_creado, true));
			}
		} else {
			$ts = $this->fecha_creado;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFechaActualizado($format = 'Y-m-d H:i:s')
	{

		if ($this->fecha_actualizado === null || $this->fecha_actualizado === '') {
			return null;
		} elseif (!is_int($this->fecha_actualizado)) {
						$ts = strtotime($this->fecha_actualizado);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha_actualizado] as date/time value: " . var_export($this->fecha_actualizado, true));
			}
		} else {
			$ts = $this->fecha_actualizado;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getSeguridadPregunta()
	{

		return $this->seguridad_pregunta;
	}

	
	public function getSeguridadRespuesta()
	{

		return $this->seguridad_respuesta;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getFkEstablecimientoId()
	{

		return $this->fk_establecimiento_id;
	}

	
	public function getBorrado()
	{

		return $this->borrado;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UsuarioPeer::ID;
		}

	} 
	
	public function setUsuario($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->usuario !== $v) {
			$this->usuario = $v;
			$this->modifiedColumns[] = UsuarioPeer::USUARIO;
		}

	} 
	
	public function setClave($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->clave !== $v) {
			$this->clave = $v;
			$this->modifiedColumns[] = UsuarioPeer::CLAVE;
		}

	} 
	
	public function setCorreoPublico($v)
	{

		if ($this->correo_publico !== $v || $v === true) {
			$this->correo_publico = $v;
			$this->modifiedColumns[] = UsuarioPeer::CORREO_PUBLICO;
		}

	} 
	
	public function setActivo($v)
	{

		if ($this->activo !== $v || $v === true) {
			$this->activo = $v;
			$this->modifiedColumns[] = UsuarioPeer::ACTIVO;
		}

	} 
	
	public function setFechaCreado($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha_creado] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_creado !== $ts) {
			$this->fecha_creado = $ts;
			$this->modifiedColumns[] = UsuarioPeer::FECHA_CREADO;
		}

	} 
	
	public function setFechaActualizado($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha_actualizado] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_actualizado !== $ts) {
			$this->fecha_actualizado = $ts;
			$this->modifiedColumns[] = UsuarioPeer::FECHA_ACTUALIZADO;
		}

	} 
	
	public function setSeguridadPregunta($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->seguridad_pregunta !== $v) {
			$this->seguridad_pregunta = $v;
			$this->modifiedColumns[] = UsuarioPeer::SEGURIDAD_PREGUNTA;
		}

	} 
	
	public function setSeguridadRespuesta($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->seguridad_respuesta !== $v) {
			$this->seguridad_respuesta = $v;
			$this->modifiedColumns[] = UsuarioPeer::SEGURIDAD_RESPUESTA;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = UsuarioPeer::EMAIL;
		}

	} 
	
	public function setFkEstablecimientoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_establecimiento_id !== $v || $v === 0) {
			$this->fk_establecimiento_id = $v;
			$this->modifiedColumns[] = UsuarioPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
		}

	} 
	
	public function setBorrado($v)
	{

		if ($this->borrado !== $v || $v === false) {
			$this->borrado = $v;
			$this->modifiedColumns[] = UsuarioPeer::BORRADO;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->usuario = $rs->getString($startcol + 1);

			$this->clave = $rs->getString($startcol + 2);

			$this->correo_publico = $rs->getBoolean($startcol + 3);

			$this->activo = $rs->getBoolean($startcol + 4);

			$this->fecha_creado = $rs->getTimestamp($startcol + 5, null);

			$this->fecha_actualizado = $rs->getTimestamp($startcol + 6, null);

			$this->seguridad_pregunta = $rs->getString($startcol + 7);

			$this->seguridad_respuesta = $rs->getString($startcol + 8);

			$this->email = $rs->getString($startcol + 9);

			$this->fk_establecimiento_id = $rs->getInt($startcol + 10);

			$this->borrado = $rs->getBoolean($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Usuario object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UsuarioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME);
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


												
			if ($this->aEstablecimiento !== null) {
				if ($this->aEstablecimiento->isModified()) {
					$affectedRows += $this->aEstablecimiento->save($con);
				}
				$this->setEstablecimiento($this->aEstablecimiento);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UsuarioPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += UsuarioPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collRelUsuarioPermisos !== null) {
				foreach($this->collRelUsuarioPermisos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLegajopedagogicos !== null) {
				foreach($this->collLegajopedagogicos as $referrerFK) {
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


												
			if ($this->aEstablecimiento !== null) {
				if (!$this->aEstablecimiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstablecimiento->getValidationFailures());
				}
			}


			if (($retval = UsuarioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelUsuarioPermisos !== null) {
					foreach($this->collRelUsuarioPermisos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLegajopedagogicos !== null) {
					foreach($this->collLegajopedagogicos as $referrerFK) {
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
		$pos = UsuarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUsuario();
				break;
			case 2:
				return $this->getClave();
				break;
			case 3:
				return $this->getCorreoPublico();
				break;
			case 4:
				return $this->getActivo();
				break;
			case 5:
				return $this->getFechaCreado();
				break;
			case 6:
				return $this->getFechaActualizado();
				break;
			case 7:
				return $this->getSeguridadPregunta();
				break;
			case 8:
				return $this->getSeguridadRespuesta();
				break;
			case 9:
				return $this->getEmail();
				break;
			case 10:
				return $this->getFkEstablecimientoId();
				break;
			case 11:
				return $this->getBorrado();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UsuarioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUsuario(),
			$keys[2] => $this->getClave(),
			$keys[3] => $this->getCorreoPublico(),
			$keys[4] => $this->getActivo(),
			$keys[5] => $this->getFechaCreado(),
			$keys[6] => $this->getFechaActualizado(),
			$keys[7] => $this->getSeguridadPregunta(),
			$keys[8] => $this->getSeguridadRespuesta(),
			$keys[9] => $this->getEmail(),
			$keys[10] => $this->getFkEstablecimientoId(),
			$keys[11] => $this->getBorrado(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UsuarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUsuario($value);
				break;
			case 2:
				$this->setClave($value);
				break;
			case 3:
				$this->setCorreoPublico($value);
				break;
			case 4:
				$this->setActivo($value);
				break;
			case 5:
				$this->setFechaCreado($value);
				break;
			case 6:
				$this->setFechaActualizado($value);
				break;
			case 7:
				$this->setSeguridadPregunta($value);
				break;
			case 8:
				$this->setSeguridadRespuesta($value);
				break;
			case 9:
				$this->setEmail($value);
				break;
			case 10:
				$this->setFkEstablecimientoId($value);
				break;
			case 11:
				$this->setBorrado($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UsuarioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUsuario($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setClave($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCorreoPublico($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setActivo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFechaCreado($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFechaActualizado($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSeguridadPregunta($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSeguridadRespuesta($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEmail($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFkEstablecimientoId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setBorrado($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);

		if ($this->isColumnModified(UsuarioPeer::ID)) $criteria->add(UsuarioPeer::ID, $this->id);
		if ($this->isColumnModified(UsuarioPeer::USUARIO)) $criteria->add(UsuarioPeer::USUARIO, $this->usuario);
		if ($this->isColumnModified(UsuarioPeer::CLAVE)) $criteria->add(UsuarioPeer::CLAVE, $this->clave);
		if ($this->isColumnModified(UsuarioPeer::CORREO_PUBLICO)) $criteria->add(UsuarioPeer::CORREO_PUBLICO, $this->correo_publico);
		if ($this->isColumnModified(UsuarioPeer::ACTIVO)) $criteria->add(UsuarioPeer::ACTIVO, $this->activo);
		if ($this->isColumnModified(UsuarioPeer::FECHA_CREADO)) $criteria->add(UsuarioPeer::FECHA_CREADO, $this->fecha_creado);
		if ($this->isColumnModified(UsuarioPeer::FECHA_ACTUALIZADO)) $criteria->add(UsuarioPeer::FECHA_ACTUALIZADO, $this->fecha_actualizado);
		if ($this->isColumnModified(UsuarioPeer::SEGURIDAD_PREGUNTA)) $criteria->add(UsuarioPeer::SEGURIDAD_PREGUNTA, $this->seguridad_pregunta);
		if ($this->isColumnModified(UsuarioPeer::SEGURIDAD_RESPUESTA)) $criteria->add(UsuarioPeer::SEGURIDAD_RESPUESTA, $this->seguridad_respuesta);
		if ($this->isColumnModified(UsuarioPeer::EMAIL)) $criteria->add(UsuarioPeer::EMAIL, $this->email);
		if ($this->isColumnModified(UsuarioPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(UsuarioPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(UsuarioPeer::BORRADO)) $criteria->add(UsuarioPeer::BORRADO, $this->borrado);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);

		$criteria->add(UsuarioPeer::ID, $this->id);

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

		$copyObj->setUsuario($this->usuario);

		$copyObj->setClave($this->clave);

		$copyObj->setCorreoPublico($this->correo_publico);

		$copyObj->setActivo($this->activo);

		$copyObj->setFechaCreado($this->fecha_creado);

		$copyObj->setFechaActualizado($this->fecha_actualizado);

		$copyObj->setSeguridadPregunta($this->seguridad_pregunta);

		$copyObj->setSeguridadRespuesta($this->seguridad_respuesta);

		$copyObj->setEmail($this->email);

		$copyObj->setFkEstablecimientoId($this->fk_establecimiento_id);

		$copyObj->setBorrado($this->borrado);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getRelUsuarioPermisos() as $relObj) {
				$copyObj->addRelUsuarioPermiso($relObj->copy($deepCopy));
			}

			foreach($this->getLegajopedagogicos() as $relObj) {
				$copyObj->addLegajopedagogico($relObj->copy($deepCopy));
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
			self::$peer = new UsuarioPeer();
		}
		return self::$peer;
	}

	
	public function setEstablecimiento($v)
	{


		if ($v === null) {
			$this->setFkEstablecimientoId('0');
		} else {
			$this->setFkEstablecimientoId($v->getId());
		}


		$this->aEstablecimiento = $v;
	}


	
	public function getEstablecimiento($con = null)
	{
				include_once 'lib/model/om/BaseEstablecimientoPeer.php';

		if ($this->aEstablecimiento === null && ($this->fk_establecimiento_id !== null)) {

			$this->aEstablecimiento = EstablecimientoPeer::retrieveByPK($this->fk_establecimiento_id, $con);

			
		}
		return $this->aEstablecimiento;
	}

	
	public function initRelUsuarioPermisos()
	{
		if ($this->collRelUsuarioPermisos === null) {
			$this->collRelUsuarioPermisos = array();
		}
	}

	
	public function getRelUsuarioPermisos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelUsuarioPermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelUsuarioPermisos === null) {
			if ($this->isNew()) {
			   $this->collRelUsuarioPermisos = array();
			} else {

				$criteria->add(RelUsuarioPermisoPeer::FK_USUARIO_ID, $this->getId());

				RelUsuarioPermisoPeer::addSelectColumns($criteria);
				$this->collRelUsuarioPermisos = RelUsuarioPermisoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelUsuarioPermisoPeer::FK_USUARIO_ID, $this->getId());

				RelUsuarioPermisoPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelUsuarioPermisoCriteria) || !$this->lastRelUsuarioPermisoCriteria->equals($criteria)) {
					$this->collRelUsuarioPermisos = RelUsuarioPermisoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelUsuarioPermisoCriteria = $criteria;
		return $this->collRelUsuarioPermisos;
	}

	
	public function countRelUsuarioPermisos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRelUsuarioPermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelUsuarioPermisoPeer::FK_USUARIO_ID, $this->getId());

		return RelUsuarioPermisoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelUsuarioPermiso(RelUsuarioPermiso $l)
	{
		$this->collRelUsuarioPermisos[] = $l;
		$l->setUsuario($this);
	}


	
	public function getRelUsuarioPermisosJoinPermiso($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelUsuarioPermisoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelUsuarioPermisos === null) {
			if ($this->isNew()) {
				$this->collRelUsuarioPermisos = array();
			} else {

				$criteria->add(RelUsuarioPermisoPeer::FK_USUARIO_ID, $this->getId());

				$this->collRelUsuarioPermisos = RelUsuarioPermisoPeer::doSelectJoinPermiso($criteria, $con);
			}
		} else {
									
			$criteria->add(RelUsuarioPermisoPeer::FK_USUARIO_ID, $this->getId());

			if (!isset($this->lastRelUsuarioPermisoCriteria) || !$this->lastRelUsuarioPermisoCriteria->equals($criteria)) {
				$this->collRelUsuarioPermisos = RelUsuarioPermisoPeer::doSelectJoinPermiso($criteria, $con);
			}
		}
		$this->lastRelUsuarioPermisoCriteria = $criteria;

		return $this->collRelUsuarioPermisos;
	}

	
	public function initLegajopedagogicos()
	{
		if ($this->collLegajopedagogicos === null) {
			$this->collLegajopedagogicos = array();
		}
	}

	
	public function getLegajopedagogicos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLegajopedagogicoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
			   $this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->getId());

				LegajopedagogicoPeer::addSelectColumns($criteria);
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->getId());

				LegajopedagogicoPeer::addSelectColumns($criteria);
				if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
					$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;
		return $this->collLegajopedagogicos;
	}

	
	public function countLegajopedagogicos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLegajopedagogicoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->getId());

		return LegajopedagogicoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLegajopedagogico(Legajopedagogico $l)
	{
		$this->collLegajopedagogicos[] = $l;
		$l->setUsuario($this);
	}


	
	public function getLegajopedagogicosJoinAlumno($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLegajopedagogicoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->getId());

				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinAlumno($criteria, $con);
			}
		} else {
									
			$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->getId());

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinAlumno($criteria, $con);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}


	
	public function getLegajopedagogicosJoinLegajocategoria($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLegajopedagogicoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->getId());

				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinLegajocategoria($criteria, $con);
			}
		} else {
									
			$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->getId());

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinLegajocategoria($criteria, $con);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}

} 