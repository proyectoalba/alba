<?php


abstract class BaseLegajopedagogico extends BaseObject  implements Persistent {


  const PEER = 'LegajopedagogicoPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_alumno_id;

	
	protected $titulo;

	
	protected $resumen;

	
	protected $texto;

	
	protected $fecha;

	
	protected $fk_usuario_id;

	
	protected $fk_legajocategoria_id;

	
	protected $aAlumno;

	
	protected $aUsuario;

	
	protected $aLegajocategoria;

	
	protected $collLegajoadjuntos;

	
	private $lastLegajoadjuntoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFkAlumnoId()
	{
		return $this->fk_alumno_id;
	}

	
	public function getTitulo()
	{
		return $this->titulo;
	}

	
	public function getResumen()
	{
		return $this->resumen;
	}

	
	public function getTexto()
	{
		return $this->texto;
	}

	
	public function getFecha($format = 'Y-m-d H:i:s')
	{
		if ($this->fecha === null) {
			return null;
		}


		if ($this->fecha === '0000-00-00 00:00:00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->fecha);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha, true), $x);
			}
		}

		if ($format === null) {
						return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	
	public function getFkUsuarioId()
	{
		return $this->fk_usuario_id;
	}

	
	public function getFkLegajocategoriaId()
	{
		return $this->fk_legajocategoria_id;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = LegajopedagogicoPeer::ID;
		}

		return $this;
	} 
	
	public function setFkAlumnoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_alumno_id !== $v) {
			$this->fk_alumno_id = $v;
			$this->modifiedColumns[] = LegajopedagogicoPeer::FK_ALUMNO_ID;
		}

		if ($this->aAlumno !== null && $this->aAlumno->getId() !== $v) {
			$this->aAlumno = null;
		}

		return $this;
	} 
	
	public function setTitulo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->titulo !== $v) {
			$this->titulo = $v;
			$this->modifiedColumns[] = LegajopedagogicoPeer::TITULO;
		}

		return $this;
	} 
	
	public function setResumen($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->resumen !== $v) {
			$this->resumen = $v;
			$this->modifiedColumns[] = LegajopedagogicoPeer::RESUMEN;
		}

		return $this;
	} 
	
	public function setTexto($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->texto !== $v) {
			$this->texto = $v;
			$this->modifiedColumns[] = LegajopedagogicoPeer::TEXTO;
		}

		return $this;
	} 
	
	public function setFecha($v)
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

		if ( $this->fecha !== null || $dt !== null ) {
			
			$currNorm = ($this->fecha !== null && $tmpDt = new DateTime($this->fecha)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->fecha = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = LegajopedagogicoPeer::FECHA;
			}
		} 
		return $this;
	} 
	
	public function setFkUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_usuario_id !== $v) {
			$this->fk_usuario_id = $v;
			$this->modifiedColumns[] = LegajopedagogicoPeer::FK_USUARIO_ID;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

		return $this;
	} 
	
	public function setFkLegajocategoriaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_legajocategoria_id !== $v) {
			$this->fk_legajocategoria_id = $v;
			$this->modifiedColumns[] = LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID;
		}

		if ($this->aLegajocategoria !== null && $this->aLegajocategoria->getId() !== $v) {
			$this->aLegajocategoria = null;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array())) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_alumno_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->titulo = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->resumen = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->texto = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->fecha = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->fk_usuario_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->fk_legajocategoria_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Legajopedagogico object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aAlumno !== null && $this->fk_alumno_id !== $this->aAlumno->getId()) {
			$this->aAlumno = null;
		}
		if ($this->aUsuario !== null && $this->fk_usuario_id !== $this->aUsuario->getId()) {
			$this->aUsuario = null;
		}
		if ($this->aLegajocategoria !== null && $this->fk_legajocategoria_id !== $this->aLegajocategoria->getId()) {
			$this->aLegajocategoria = null;
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
			$con = Propel::getConnection(LegajopedagogicoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = LegajopedagogicoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aAlumno = null;
			$this->aUsuario = null;
			$this->aLegajocategoria = null;
			$this->collLegajoadjuntos = null;
			$this->lastLegajoadjuntoCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LegajopedagogicoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			LegajopedagogicoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LegajopedagogicoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			LegajopedagogicoPeer::addInstanceToPool($this);
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

												
			if ($this->aAlumno !== null) {
				if ($this->aAlumno->isModified() || $this->aAlumno->isNew()) {
					$affectedRows += $this->aAlumno->save($con);
				}
				$this->setAlumno($this->aAlumno);
			}

			if ($this->aUsuario !== null) {
				if ($this->aUsuario->isModified() || $this->aUsuario->isNew()) {
					$affectedRows += $this->aUsuario->save($con);
				}
				$this->setUsuario($this->aUsuario);
			}

			if ($this->aLegajocategoria !== null) {
				if ($this->aLegajocategoria->isModified() || $this->aLegajocategoria->isNew()) {
					$affectedRows += $this->aLegajocategoria->save($con);
				}
				$this->setLegajocategoria($this->aLegajocategoria);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = LegajopedagogicoPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LegajopedagogicoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LegajopedagogicoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collLegajoadjuntos !== null) {
				foreach ($this->collLegajoadjuntos as $referrerFK) {
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


												
			if ($this->aAlumno !== null) {
				if (!$this->aAlumno->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAlumno->getValidationFailures());
				}
			}

			if ($this->aUsuario !== null) {
				if (!$this->aUsuario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuario->getValidationFailures());
				}
			}

			if ($this->aLegajocategoria !== null) {
				if (!$this->aLegajocategoria->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLegajocategoria->getValidationFailures());
				}
			}


			if (($retval = LegajopedagogicoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLegajoadjuntos !== null) {
					foreach ($this->collLegajoadjuntos as $referrerFK) {
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
		$pos = LegajopedagogicoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkAlumnoId();
				break;
			case 2:
				return $this->getTitulo();
				break;
			case 3:
				return $this->getResumen();
				break;
			case 4:
				return $this->getTexto();
				break;
			case 5:
				return $this->getFecha();
				break;
			case 6:
				return $this->getFkUsuarioId();
				break;
			case 7:
				return $this->getFkLegajocategoriaId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = LegajopedagogicoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkAlumnoId(),
			$keys[2] => $this->getTitulo(),
			$keys[3] => $this->getResumen(),
			$keys[4] => $this->getTexto(),
			$keys[5] => $this->getFecha(),
			$keys[6] => $this->getFkUsuarioId(),
			$keys[7] => $this->getFkLegajocategoriaId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LegajopedagogicoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkAlumnoId($value);
				break;
			case 2:
				$this->setTitulo($value);
				break;
			case 3:
				$this->setResumen($value);
				break;
			case 4:
				$this->setTexto($value);
				break;
			case 5:
				$this->setFecha($value);
				break;
			case 6:
				$this->setFkUsuarioId($value);
				break;
			case 7:
				$this->setFkLegajocategoriaId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LegajopedagogicoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkAlumnoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitulo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setResumen($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTexto($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecha($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFkUsuarioId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFkLegajocategoriaId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LegajopedagogicoPeer::DATABASE_NAME);

		if ($this->isColumnModified(LegajopedagogicoPeer::ID)) $criteria->add(LegajopedagogicoPeer::ID, $this->id);
		if ($this->isColumnModified(LegajopedagogicoPeer::FK_ALUMNO_ID)) $criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->fk_alumno_id);
		if ($this->isColumnModified(LegajopedagogicoPeer::TITULO)) $criteria->add(LegajopedagogicoPeer::TITULO, $this->titulo);
		if ($this->isColumnModified(LegajopedagogicoPeer::RESUMEN)) $criteria->add(LegajopedagogicoPeer::RESUMEN, $this->resumen);
		if ($this->isColumnModified(LegajopedagogicoPeer::TEXTO)) $criteria->add(LegajopedagogicoPeer::TEXTO, $this->texto);
		if ($this->isColumnModified(LegajopedagogicoPeer::FECHA)) $criteria->add(LegajopedagogicoPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(LegajopedagogicoPeer::FK_USUARIO_ID)) $criteria->add(LegajopedagogicoPeer::FK_USUARIO_ID, $this->fk_usuario_id);
		if ($this->isColumnModified(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID)) $criteria->add(LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID, $this->fk_legajocategoria_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LegajopedagogicoPeer::DATABASE_NAME);

		$criteria->add(LegajopedagogicoPeer::ID, $this->id);

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

		$copyObj->setFkAlumnoId($this->fk_alumno_id);

		$copyObj->setTitulo($this->titulo);

		$copyObj->setResumen($this->resumen);

		$copyObj->setTexto($this->texto);

		$copyObj->setFecha($this->fecha);

		$copyObj->setFkUsuarioId($this->fk_usuario_id);

		$copyObj->setFkLegajocategoriaId($this->fk_legajocategoria_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getLegajoadjuntos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addLegajoadjunto($relObj->copy($deepCopy));
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
			self::$peer = new LegajopedagogicoPeer();
		}
		return self::$peer;
	}

	
	public function setAlumno(Alumno $v = null)
	{
		if ($v === null) {
			$this->setFkAlumnoId(NULL);
		} else {
			$this->setFkAlumnoId($v->getId());
		}

		$this->aAlumno = $v;

						if ($v !== null) {
			$v->addLegajopedagogico($this);
		}

		return $this;
	}


	
	public function getAlumno(PropelPDO $con = null)
	{
		if ($this->aAlumno === null && ($this->fk_alumno_id !== null)) {
			$c = new Criteria(AlumnoPeer::DATABASE_NAME);
			$c->add(AlumnoPeer::ID, $this->fk_alumno_id);
			$this->aAlumno = AlumnoPeer::doSelectOne($c, $con);
			
		}
		return $this->aAlumno;
	}

	
	public function setUsuario(Usuario $v = null)
	{
		if ($v === null) {
			$this->setFkUsuarioId(NULL);
		} else {
			$this->setFkUsuarioId($v->getId());
		}

		$this->aUsuario = $v;

						if ($v !== null) {
			$v->addLegajopedagogico($this);
		}

		return $this;
	}


	
	public function getUsuario(PropelPDO $con = null)
	{
		if ($this->aUsuario === null && ($this->fk_usuario_id !== null)) {
			$c = new Criteria(UsuarioPeer::DATABASE_NAME);
			$c->add(UsuarioPeer::ID, $this->fk_usuario_id);
			$this->aUsuario = UsuarioPeer::doSelectOne($c, $con);
			
		}
		return $this->aUsuario;
	}

	
	public function setLegajocategoria(Legajocategoria $v = null)
	{
		if ($v === null) {
			$this->setFkLegajocategoriaId(NULL);
		} else {
			$this->setFkLegajocategoriaId($v->getId());
		}

		$this->aLegajocategoria = $v;

						if ($v !== null) {
			$v->addLegajopedagogico($this);
		}

		return $this;
	}


	
	public function getLegajocategoria(PropelPDO $con = null)
	{
		if ($this->aLegajocategoria === null && ($this->fk_legajocategoria_id !== null)) {
			$c = new Criteria(LegajocategoriaPeer::DATABASE_NAME);
			$c->add(LegajocategoriaPeer::ID, $this->fk_legajocategoria_id);
			$this->aLegajocategoria = LegajocategoriaPeer::doSelectOne($c, $con);
			
		}
		return $this->aLegajocategoria;
	}

	
	public function clearLegajoadjuntos()
	{
		$this->collLegajoadjuntos = null; 	}

	
	public function initLegajoadjuntos()
	{
		$this->collLegajoadjuntos = array();
	}

	
	public function getLegajoadjuntos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LegajopedagogicoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajoadjuntos === null) {
			if ($this->isNew()) {
			   $this->collLegajoadjuntos = array();
			} else {

				$criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->id);

				LegajoadjuntoPeer::addSelectColumns($criteria);
				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->id);

				LegajoadjuntoPeer::addSelectColumns($criteria);
				if (!isset($this->lastLegajoadjuntoCriteria) || !$this->lastLegajoadjuntoCriteria->equals($criteria)) {
					$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLegajoadjuntoCriteria = $criteria;
		return $this->collLegajoadjuntos;
	}

	
	public function countLegajoadjuntos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LegajopedagogicoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLegajoadjuntos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->id);

				$count = LegajoadjuntoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->id);

				if (!isset($this->lastLegajoadjuntoCriteria) || !$this->lastLegajoadjuntoCriteria->equals($criteria)) {
					$count = LegajoadjuntoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collLegajoadjuntos);
				}
			} else {
				$count = count($this->collLegajoadjuntos);
			}
		}
		return $count;
	}

	
	public function addLegajoadjunto(Legajoadjunto $l)
	{
		if ($this->collLegajoadjuntos === null) {
			$this->initLegajoadjuntos();
		}
		if (!in_array($l, $this->collLegajoadjuntos, true)) { 			array_push($this->collLegajoadjuntos, $l);
			$l->setLegajopedagogico($this);
		}
	}


	
	public function getLegajoadjuntosJoinAdjunto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LegajopedagogicoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajoadjuntos === null) {
			if ($this->isNew()) {
				$this->collLegajoadjuntos = array();
			} else {

				$criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->id);

				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelectJoinAdjunto($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->id);

			if (!isset($this->lastLegajoadjuntoCriteria) || !$this->lastLegajoadjuntoCriteria->equals($criteria)) {
				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelectJoinAdjunto($criteria, $con, $join_behavior);
			}
		}
		$this->lastLegajoadjuntoCriteria = $criteria;

		return $this->collLegajoadjuntos;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collLegajoadjuntos) {
				foreach ((array) $this->collLegajoadjuntos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collLegajoadjuntos = null;
			$this->aAlumno = null;
			$this->aUsuario = null;
			$this->aLegajocategoria = null;
	}

} 