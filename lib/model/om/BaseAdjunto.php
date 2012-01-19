<?php


abstract class BaseAdjunto extends BaseObject  implements Persistent {


  const PEER = 'AdjuntoPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $descripcion;

	
	protected $titulo;

	
	protected $nombre_archivo;

	
	protected $tipo_archivo;

	
	protected $ruta;

	
	protected $fecha;

	
	protected $collLegajoadjuntos;

	
	private $lastLegajoadjuntoCriteria = null;

	
	protected $collInformes;

	
	private $lastInformeCriteria = null;

	
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

	
	public function getDescripcion()
	{
		return $this->descripcion;
	}

	
	public function getTitulo()
	{
		return $this->titulo;
	}

	
	public function getNombreArchivo()
	{
		return $this->nombre_archivo;
	}

	
	public function getTipoArchivo()
	{
		return $this->tipo_archivo;
	}

	
	public function getRuta()
	{
		return $this->ruta;
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

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AdjuntoPeer::ID;
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
			$this->modifiedColumns[] = AdjuntoPeer::DESCRIPCION;
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
			$this->modifiedColumns[] = AdjuntoPeer::TITULO;
		}

		return $this;
	} 
	
	public function setNombreArchivo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nombre_archivo !== $v) {
			$this->nombre_archivo = $v;
			$this->modifiedColumns[] = AdjuntoPeer::NOMBRE_ARCHIVO;
		}

		return $this;
	} 
	
	public function setTipoArchivo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tipo_archivo !== $v) {
			$this->tipo_archivo = $v;
			$this->modifiedColumns[] = AdjuntoPeer::TIPO_ARCHIVO;
		}

		return $this;
	} 
	
	public function setRuta($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->ruta !== $v) {
			$this->ruta = $v;
			$this->modifiedColumns[] = AdjuntoPeer::RUTA;
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
				$this->modifiedColumns[] = AdjuntoPeer::FECHA;
			}
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
			$this->descripcion = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->titulo = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->nombre_archivo = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->tipo_archivo = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->ruta = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->fecha = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Adjunto object", $e);
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
			$con = Propel::getConnection(AdjuntoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = AdjuntoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collLegajoadjuntos = null;
			$this->lastLegajoadjuntoCriteria = null;

			$this->collInformes = null;
			$this->lastInformeCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AdjuntoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			AdjuntoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AdjuntoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			AdjuntoPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = AdjuntoPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AdjuntoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AdjuntoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collLegajoadjuntos !== null) {
				foreach ($this->collLegajoadjuntos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collInformes !== null) {
				foreach ($this->collInformes as $referrerFK) {
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


			if (($retval = AdjuntoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLegajoadjuntos !== null) {
					foreach ($this->collLegajoadjuntos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collInformes !== null) {
					foreach ($this->collInformes as $referrerFK) {
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
		$pos = AdjuntoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDescripcion();
				break;
			case 2:
				return $this->getTitulo();
				break;
			case 3:
				return $this->getNombreArchivo();
				break;
			case 4:
				return $this->getTipoArchivo();
				break;
			case 5:
				return $this->getRuta();
				break;
			case 6:
				return $this->getFecha();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = AdjuntoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDescripcion(),
			$keys[2] => $this->getTitulo(),
			$keys[3] => $this->getNombreArchivo(),
			$keys[4] => $this->getTipoArchivo(),
			$keys[5] => $this->getRuta(),
			$keys[6] => $this->getFecha(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AdjuntoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDescripcion($value);
				break;
			case 2:
				$this->setTitulo($value);
				break;
			case 3:
				$this->setNombreArchivo($value);
				break;
			case 4:
				$this->setTipoArchivo($value);
				break;
			case 5:
				$this->setRuta($value);
				break;
			case 6:
				$this->setFecha($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AdjuntoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescripcion($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitulo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNombreArchivo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipoArchivo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRuta($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecha($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AdjuntoPeer::DATABASE_NAME);

		if ($this->isColumnModified(AdjuntoPeer::ID)) $criteria->add(AdjuntoPeer::ID, $this->id);
		if ($this->isColumnModified(AdjuntoPeer::DESCRIPCION)) $criteria->add(AdjuntoPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(AdjuntoPeer::TITULO)) $criteria->add(AdjuntoPeer::TITULO, $this->titulo);
		if ($this->isColumnModified(AdjuntoPeer::NOMBRE_ARCHIVO)) $criteria->add(AdjuntoPeer::NOMBRE_ARCHIVO, $this->nombre_archivo);
		if ($this->isColumnModified(AdjuntoPeer::TIPO_ARCHIVO)) $criteria->add(AdjuntoPeer::TIPO_ARCHIVO, $this->tipo_archivo);
		if ($this->isColumnModified(AdjuntoPeer::RUTA)) $criteria->add(AdjuntoPeer::RUTA, $this->ruta);
		if ($this->isColumnModified(AdjuntoPeer::FECHA)) $criteria->add(AdjuntoPeer::FECHA, $this->fecha);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AdjuntoPeer::DATABASE_NAME);

		$criteria->add(AdjuntoPeer::ID, $this->id);

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

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setTitulo($this->titulo);

		$copyObj->setNombreArchivo($this->nombre_archivo);

		$copyObj->setTipoArchivo($this->tipo_archivo);

		$copyObj->setRuta($this->ruta);

		$copyObj->setFecha($this->fecha);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getLegajoadjuntos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addLegajoadjunto($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getInformes() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addInforme($relObj->copy($deepCopy));
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
			self::$peer = new AdjuntoPeer();
		}
		return self::$peer;
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
			$criteria = new Criteria(AdjuntoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajoadjuntos === null) {
			if ($this->isNew()) {
			   $this->collLegajoadjuntos = array();
			} else {

				$criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->id);

				LegajoadjuntoPeer::addSelectColumns($criteria);
				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->id);

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
			$criteria = new Criteria(AdjuntoPeer::DATABASE_NAME);
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

				$criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->id);

				$count = LegajoadjuntoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->id);

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
			$l->setAdjunto($this);
		}
	}


	
	public function getLegajoadjuntosJoinLegajopedagogico($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AdjuntoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajoadjuntos === null) {
			if ($this->isNew()) {
				$this->collLegajoadjuntos = array();
			} else {

				$criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->id);

				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelectJoinLegajopedagogico($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->id);

			if (!isset($this->lastLegajoadjuntoCriteria) || !$this->lastLegajoadjuntoCriteria->equals($criteria)) {
				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelectJoinLegajopedagogico($criteria, $con, $join_behavior);
			}
		}
		$this->lastLegajoadjuntoCriteria = $criteria;

		return $this->collLegajoadjuntos;
	}

	
	public function clearInformes()
	{
		$this->collInformes = null; 	}

	
	public function initInformes()
	{
		$this->collInformes = array();
	}

	
	public function getInformes($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AdjuntoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInformes === null) {
			if ($this->isNew()) {
			   $this->collInformes = array();
			} else {

				$criteria->add(InformePeer::FK_ADJUNTO_ID, $this->id);

				InformePeer::addSelectColumns($criteria);
				$this->collInformes = InformePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InformePeer::FK_ADJUNTO_ID, $this->id);

				InformePeer::addSelectColumns($criteria);
				if (!isset($this->lastInformeCriteria) || !$this->lastInformeCriteria->equals($criteria)) {
					$this->collInformes = InformePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInformeCriteria = $criteria;
		return $this->collInformes;
	}

	
	public function countInformes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AdjuntoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collInformes === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(InformePeer::FK_ADJUNTO_ID, $this->id);

				$count = InformePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InformePeer::FK_ADJUNTO_ID, $this->id);

				if (!isset($this->lastInformeCriteria) || !$this->lastInformeCriteria->equals($criteria)) {
					$count = InformePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collInformes);
				}
			} else {
				$count = count($this->collInformes);
			}
		}
		return $count;
	}

	
	public function addInforme(Informe $l)
	{
		if ($this->collInformes === null) {
			$this->initInformes();
		}
		if (!in_array($l, $this->collInformes, true)) { 			array_push($this->collInformes, $l);
			$l->setAdjunto($this);
		}
	}


	
	public function getInformesJoinTipoinforme($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AdjuntoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInformes === null) {
			if ($this->isNew()) {
				$this->collInformes = array();
			} else {

				$criteria->add(InformePeer::FK_ADJUNTO_ID, $this->id);

				$this->collInformes = InformePeer::doSelectJoinTipoinforme($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(InformePeer::FK_ADJUNTO_ID, $this->id);

			if (!isset($this->lastInformeCriteria) || !$this->lastInformeCriteria->equals($criteria)) {
				$this->collInformes = InformePeer::doSelectJoinTipoinforme($criteria, $con, $join_behavior);
			}
		}
		$this->lastInformeCriteria = $criteria;

		return $this->collInformes;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collLegajoadjuntos) {
				foreach ((array) $this->collLegajoadjuntos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collInformes) {
				foreach ((array) $this->collInformes as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collLegajoadjuntos = null;
		$this->collInformes = null;
	}

} 