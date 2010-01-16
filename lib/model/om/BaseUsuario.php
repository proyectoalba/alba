<?php


abstract class BaseUsuario extends BaseObject  implements Persistent {


  const PEER = 'UsuarioPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $usuario;

	
	protected $clave;

	
	protected $correo_publico;

	
	protected $activo;

	
	protected $fecha_creado;

	
	protected $fecha_actualizado;

	
	protected $seguridad_pregunta;

	
	protected $seguridad_respuesta;

	
	protected $email;

	
	protected $fk_establecimiento_id;

	
	protected $borrado;

	
	protected $aEstablecimiento;

	
	protected $collUsuarioRols;

	
	private $lastUsuarioRolCriteria = null;

	
	protected $collUsuarioPermisos;

	
	private $lastUsuarioPermisoCriteria = null;

	
	protected $collLegajopedagogicos;

	
	private $lastLegajopedagogicoCriteria = null;

	
	protected $collLegajosaluds;

	
	private $lastLegajosaludCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->correo_publico = true;
		$this->activo = true;
		$this->fk_establecimiento_id = 0;
		$this->borrado = false;
	}

	
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
		if ($this->fecha_creado === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->fecha_creado);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_creado, true), $x);
		}

		if ($format === null) {
						return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	
	public function getFechaActualizado($format = 'Y-m-d H:i:s')
	{
		if ($this->fecha_actualizado === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->fecha_actualizado);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_actualizado, true), $x);
		}

		if ($format === null) {
						return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
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
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UsuarioPeer::ID;
		}

		return $this;
	} 
	
	public function setUsuario($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->usuario !== $v) {
			$this->usuario = $v;
			$this->modifiedColumns[] = UsuarioPeer::USUARIO;
		}

		return $this;
	} 
	
	public function setClave($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->clave !== $v) {
			$this->clave = $v;
			$this->modifiedColumns[] = UsuarioPeer::CLAVE;
		}

		return $this;
	} 
	
	public function setCorreoPublico($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->correo_publico !== $v || $v === true) {
			$this->correo_publico = $v;
			$this->modifiedColumns[] = UsuarioPeer::CORREO_PUBLICO;
		}

		return $this;
	} 
	
	public function setActivo($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->activo !== $v || $v === true) {
			$this->activo = $v;
			$this->modifiedColumns[] = UsuarioPeer::ACTIVO;
		}

		return $this;
	} 
	
	public function setFechaCreado($v)
	{
						if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
									try {
				if (is_numeric($v)) { 					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
															$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->fecha_creado !== null || $dt !== null ) {
			
			$currNorm = ($this->fecha_creado !== null && $tmpDt = new DateTime($this->fecha_creado)) ? $tmpDt->format('Y-m-d\\TH:i:sO') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d\\TH:i:sO') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->fecha_creado = ($dt ? $dt->format('Y-m-d\\TH:i:sO') : null);
				$this->modifiedColumns[] = UsuarioPeer::FECHA_CREADO;
			}
		} 
		return $this;
	} 
	
	public function setFechaActualizado($v)
	{
						if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
									try {
				if (is_numeric($v)) { 					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
															$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->fecha_actualizado !== null || $dt !== null ) {
			
			$currNorm = ($this->fecha_actualizado !== null && $tmpDt = new DateTime($this->fecha_actualizado)) ? $tmpDt->format('Y-m-d\\TH:i:sO') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d\\TH:i:sO') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->fecha_actualizado = ($dt ? $dt->format('Y-m-d\\TH:i:sO') : null);
				$this->modifiedColumns[] = UsuarioPeer::FECHA_ACTUALIZADO;
			}
		} 
		return $this;
	} 
	
	public function setSeguridadPregunta($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->seguridad_pregunta !== $v) {
			$this->seguridad_pregunta = $v;
			$this->modifiedColumns[] = UsuarioPeer::SEGURIDAD_PREGUNTA;
		}

		return $this;
	} 
	
	public function setSeguridadRespuesta($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->seguridad_respuesta !== $v) {
			$this->seguridad_respuesta = $v;
			$this->modifiedColumns[] = UsuarioPeer::SEGURIDAD_RESPUESTA;
		}

		return $this;
	} 
	
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = UsuarioPeer::EMAIL;
		}

		return $this;
	} 
	
	public function setFkEstablecimientoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_establecimiento_id !== $v || $v === 0) {
			$this->fk_establecimiento_id = $v;
			$this->modifiedColumns[] = UsuarioPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
		}

		return $this;
	} 
	
	public function setBorrado($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->borrado !== $v || $v === false) {
			$this->borrado = $v;
			$this->modifiedColumns[] = UsuarioPeer::BORRADO;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(UsuarioPeer::CORREO_PUBLICO,UsuarioPeer::ACTIVO,UsuarioPeer::FK_ESTABLECIMIENTO_ID,UsuarioPeer::BORRADO))) {
				return false;
			}

			if ($this->correo_publico !== true) {
				return false;
			}

			if ($this->activo !== true) {
				return false;
			}

			if ($this->fk_establecimiento_id !== 0) {
				return false;
			}

			if ($this->borrado !== false) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->usuario = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->clave = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->correo_publico = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->activo = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->fecha_creado = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->fecha_actualizado = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->seguridad_pregunta = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->seguridad_respuesta = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->email = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->fk_establecimiento_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->borrado = ($row[$startcol + 11] !== null) ? (boolean) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Usuario object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aEstablecimiento !== null && $this->fk_establecimiento_id !== $this->aEstablecimiento->getId()) {
			$this->aEstablecimiento = null;
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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = UsuarioPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aEstablecimiento = null;
			$this->collUsuarioRols = null;
			$this->lastUsuarioRolCriteria = null;

			$this->collUsuarioPermisos = null;
			$this->lastUsuarioPermisoCriteria = null;

			$this->collLegajopedagogicos = null;
			$this->lastLegajopedagogicoCriteria = null;

			$this->collLegajosaluds = null;
			$this->lastLegajosaludCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			UsuarioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			UsuarioPeer::addInstanceToPool($this);
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

												
			if ($this->aEstablecimiento !== null) {
				if ($this->aEstablecimiento->isModified() || $this->aEstablecimiento->isNew()) {
					$affectedRows += $this->aEstablecimiento->save($con);
				}
				$this->setEstablecimiento($this->aEstablecimiento);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = UsuarioPeer::ID;
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

			if ($this->collUsuarioRols !== null) {
				foreach ($this->collUsuarioRols as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUsuarioPermisos !== null) {
				foreach ($this->collUsuarioPermisos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLegajopedagogicos !== null) {
				foreach ($this->collLegajopedagogicos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLegajosaluds !== null) {
				foreach ($this->collLegajosaluds as $referrerFK) {
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


				if ($this->collUsuarioRols !== null) {
					foreach ($this->collUsuarioRols as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUsuarioPermisos !== null) {
					foreach ($this->collUsuarioPermisos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLegajopedagogicos !== null) {
					foreach ($this->collLegajopedagogicos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLegajosaluds !== null) {
					foreach ($this->collLegajosaluds as $referrerFK) {
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

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
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

			foreach ($this->getUsuarioRols() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addUsuarioRol($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUsuarioPermisos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addUsuarioPermiso($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLegajopedagogicos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addLegajopedagogico($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLegajosaluds() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addLegajosalud($relObj->copy($deepCopy));
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
			self::$peer = new UsuarioPeer();
		}
		return self::$peer;
	}

	
	public function setEstablecimiento(Establecimiento $v = null)
	{
		if ($v === null) {
			$this->setFkEstablecimientoId(0);
		} else {
			$this->setFkEstablecimientoId($v->getId());
		}

		$this->aEstablecimiento = $v;

						if ($v !== null) {
			$v->addUsuario($this);
		}

		return $this;
	}


	
	public function getEstablecimiento(PropelPDO $con = null)
	{
		if ($this->aEstablecimiento === null && ($this->fk_establecimiento_id !== null)) {
			$c = new Criteria(EstablecimientoPeer::DATABASE_NAME);
			$c->add(EstablecimientoPeer::ID, $this->fk_establecimiento_id);
			$this->aEstablecimiento = EstablecimientoPeer::doSelectOne($c, $con);
			
		}
		return $this->aEstablecimiento;
	}

	
	public function clearUsuarioRols()
	{
		$this->collUsuarioRols = null; 	}

	
	public function initUsuarioRols()
	{
		$this->collUsuarioRols = array();
	}

	
	public function getUsuarioRols($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarioRols === null) {
			if ($this->isNew()) {
			   $this->collUsuarioRols = array();
			} else {

				$criteria->add(UsuarioRolPeer::FK_USUARIO_ID, $this->id);

				UsuarioRolPeer::addSelectColumns($criteria);
				$this->collUsuarioRols = UsuarioRolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UsuarioRolPeer::FK_USUARIO_ID, $this->id);

				UsuarioRolPeer::addSelectColumns($criteria);
				if (!isset($this->lastUsuarioRolCriteria) || !$this->lastUsuarioRolCriteria->equals($criteria)) {
					$this->collUsuarioRols = UsuarioRolPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUsuarioRolCriteria = $criteria;
		return $this->collUsuarioRols;
	}

	
	public function countUsuarioRols(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collUsuarioRols === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(UsuarioRolPeer::FK_USUARIO_ID, $this->id);

				$count = UsuarioRolPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UsuarioRolPeer::FK_USUARIO_ID, $this->id);

				if (!isset($this->lastUsuarioRolCriteria) || !$this->lastUsuarioRolCriteria->equals($criteria)) {
					$count = UsuarioRolPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collUsuarioRols);
				}
			} else {
				$count = count($this->collUsuarioRols);
			}
		}
		return $count;
	}

	
	public function addUsuarioRol(UsuarioRol $l)
	{
		if ($this->collUsuarioRols === null) {
			$this->initUsuarioRols();
		}
		if (!in_array($l, $this->collUsuarioRols, true)) { 			array_push($this->collUsuarioRols, $l);
			$l->setUsuario($this);
		}
	}


	
	public function getUsuarioRolsJoinRol($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarioRols === null) {
			if ($this->isNew()) {
				$this->collUsuarioRols = array();
			} else {

				$criteria->add(UsuarioRolPeer::FK_USUARIO_ID, $this->id);

				$this->collUsuarioRols = UsuarioRolPeer::doSelectJoinRol($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(UsuarioRolPeer::FK_USUARIO_ID, $this->id);

			if (!isset($this->lastUsuarioRolCriteria) || !$this->lastUsuarioRolCriteria->equals($criteria)) {
				$this->collUsuarioRols = UsuarioRolPeer::doSelectJoinRol($criteria, $con, $join_behavior);
			}
		}
		$this->lastUsuarioRolCriteria = $criteria;

		return $this->collUsuarioRols;
	}

	
	public function clearUsuarioPermisos()
	{
		$this->collUsuarioPermisos = null; 	}

	
	public function initUsuarioPermisos()
	{
		$this->collUsuarioPermisos = array();
	}

	
	public function getUsuarioPermisos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarioPermisos === null) {
			if ($this->isNew()) {
			   $this->collUsuarioPermisos = array();
			} else {

				$criteria->add(UsuarioPermisoPeer::FK_USUARIO_ID, $this->id);

				UsuarioPermisoPeer::addSelectColumns($criteria);
				$this->collUsuarioPermisos = UsuarioPermisoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UsuarioPermisoPeer::FK_USUARIO_ID, $this->id);

				UsuarioPermisoPeer::addSelectColumns($criteria);
				if (!isset($this->lastUsuarioPermisoCriteria) || !$this->lastUsuarioPermisoCriteria->equals($criteria)) {
					$this->collUsuarioPermisos = UsuarioPermisoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUsuarioPermisoCriteria = $criteria;
		return $this->collUsuarioPermisos;
	}

	
	public function countUsuarioPermisos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collUsuarioPermisos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(UsuarioPermisoPeer::FK_USUARIO_ID, $this->id);

				$count = UsuarioPermisoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UsuarioPermisoPeer::FK_USUARIO_ID, $this->id);

				if (!isset($this->lastUsuarioPermisoCriteria) || !$this->lastUsuarioPermisoCriteria->equals($criteria)) {
					$count = UsuarioPermisoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collUsuarioPermisos);
				}
			} else {
				$count = count($this->collUsuarioPermisos);
			}
		}
		return $count;
	}

	
	public function addUsuarioPermiso(UsuarioPermiso $l)
	{
		if ($this->collUsuarioPermisos === null) {
			$this->initUsuarioPermisos();
		}
		if (!in_array($l, $this->collUsuarioPermisos, true)) { 			array_push($this->collUsuarioPermisos, $l);
			$l->setUsuario($this);
		}
	}


	
	public function getUsuarioPermisosJoinPermiso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarioPermisos === null) {
			if ($this->isNew()) {
				$this->collUsuarioPermisos = array();
			} else {

				$criteria->add(UsuarioPermisoPeer::FK_USUARIO_ID, $this->id);

				$this->collUsuarioPermisos = UsuarioPermisoPeer::doSelectJoinPermiso($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(UsuarioPermisoPeer::FK_USUARIO_ID, $this->id);

			if (!isset($this->lastUsuarioPermisoCriteria) || !$this->lastUsuarioPermisoCriteria->equals($criteria)) {
				$this->collUsuarioPermisos = UsuarioPermisoPeer::doSelectJoinPermiso($criteria, $con, $join_behavior);
			}
		}
		$this->lastUsuarioPermisoCriteria = $criteria;

		return $this->collUsuarioPermisos;
	}

	
	public function clearLegajopedagogicos()
	{
		$this->collLegajopedagogicos = null; 	}

	
	public function initLegajopedagogicos()
	{
		$this->collLegajopedagogicos = array();
	}

	
	public function getLegajopedagogicos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
			   $this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->id);

				LegajopedagogicoPeer::addSelectColumns($criteria);
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->id);

				LegajopedagogicoPeer::addSelectColumns($criteria);
				if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
					$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;
		return $this->collLegajopedagogicos;
	}

	
	public function countLegajopedagogicos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->id);

				$count = LegajopedagogicoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->id);

				if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
					$count = LegajopedagogicoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collLegajopedagogicos);
				}
			} else {
				$count = count($this->collLegajopedagogicos);
			}
		}
		return $count;
	}

	
	public function addLegajopedagogico(Legajopedagogico $l)
	{
		if ($this->collLegajopedagogicos === null) {
			$this->initLegajopedagogicos();
		}
		if (!in_array($l, $this->collLegajopedagogicos, true)) { 			array_push($this->collLegajopedagogicos, $l);
			$l->setUsuario($this);
		}
	}


	
	public function getLegajopedagogicosJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->id);

				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->id);

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}


	
	public function getLegajopedagogicosJoinLegajocategoria($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->id);

				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinLegajocategoria($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->id);

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinLegajocategoria($criteria, $con, $join_behavior);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}

	
	public function clearLegajosaluds()
	{
		$this->collLegajosaluds = null; 	}

	
	public function initLegajosaluds()
	{
		$this->collLegajosaluds = array();
	}

	
	public function getLegajosaluds($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajosaluds === null) {
			if ($this->isNew()) {
			   $this->collLegajosaluds = array();
			} else {

				$criteria->add(LegajosaludPeer::FK_USUARIO_ID, $this->id);

				LegajosaludPeer::addSelectColumns($criteria);
				$this->collLegajosaluds = LegajosaludPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajosaludPeer::FK_USUARIO_ID, $this->id);

				LegajosaludPeer::addSelectColumns($criteria);
				if (!isset($this->lastLegajosaludCriteria) || !$this->lastLegajosaludCriteria->equals($criteria)) {
					$this->collLegajosaluds = LegajosaludPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLegajosaludCriteria = $criteria;
		return $this->collLegajosaluds;
	}

	
	public function countLegajosaluds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLegajosaluds === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LegajosaludPeer::FK_USUARIO_ID, $this->id);

				$count = LegajosaludPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajosaludPeer::FK_USUARIO_ID, $this->id);

				if (!isset($this->lastLegajosaludCriteria) || !$this->lastLegajosaludCriteria->equals($criteria)) {
					$count = LegajosaludPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collLegajosaluds);
				}
			} else {
				$count = count($this->collLegajosaluds);
			}
		}
		return $count;
	}

	
	public function addLegajosalud(Legajosalud $l)
	{
		if ($this->collLegajosaluds === null) {
			$this->initLegajosaluds();
		}
		if (!in_array($l, $this->collLegajosaluds, true)) { 			array_push($this->collLegajosaluds, $l);
			$l->setUsuario($this);
		}
	}


	
	public function getLegajosaludsJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajosaluds === null) {
			if ($this->isNew()) {
				$this->collLegajosaluds = array();
			} else {

				$criteria->add(LegajosaludPeer::FK_USUARIO_ID, $this->id);

				$this->collLegajosaluds = LegajosaludPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(LegajosaludPeer::FK_USUARIO_ID, $this->id);

			if (!isset($this->lastLegajosaludCriteria) || !$this->lastLegajosaludCriteria->equals($criteria)) {
				$this->collLegajosaluds = LegajosaludPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastLegajosaludCriteria = $criteria;

		return $this->collLegajosaluds;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collUsuarioRols) {
				foreach ((array) $this->collUsuarioRols as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUsuarioPermisos) {
				foreach ((array) $this->collUsuarioPermisos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLegajopedagogicos) {
				foreach ((array) $this->collLegajopedagogicos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLegajosaluds) {
				foreach ((array) $this->collLegajosaluds as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collUsuarioRols = null;
		$this->collUsuarioPermisos = null;
		$this->collLegajopedagogicos = null;
		$this->collLegajosaluds = null;
			$this->aEstablecimiento = null;
	}

} 