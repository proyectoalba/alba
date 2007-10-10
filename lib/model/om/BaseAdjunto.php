<?php


abstract class BaseAdjunto extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $descripcion;


	
	protected $titulo;


	
	protected $nombre_archivo;


	
	protected $tipo_archivo;


	
	protected $ruta;


	
	protected $fecha;

	
	protected $collLegajoadjuntos;

	
	protected $lastLegajoadjuntoCriteria = null;

	
	protected $collInformes;

	
	protected $lastInformeCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
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

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AdjuntoPeer::ID;
		}

	} 
	
	public function setDescripcion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = AdjuntoPeer::DESCRIPCION;
		}

	} 
	
	public function setTitulo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->titulo !== $v) {
			$this->titulo = $v;
			$this->modifiedColumns[] = AdjuntoPeer::TITULO;
		}

	} 
	
	public function setNombreArchivo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre_archivo !== $v) {
			$this->nombre_archivo = $v;
			$this->modifiedColumns[] = AdjuntoPeer::NOMBRE_ARCHIVO;
		}

	} 
	
	public function setTipoArchivo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->tipo_archivo !== $v) {
			$this->tipo_archivo = $v;
			$this->modifiedColumns[] = AdjuntoPeer::TIPO_ARCHIVO;
		}

	} 
	
	public function setRuta($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ruta !== $v) {
			$this->ruta = $v;
			$this->modifiedColumns[] = AdjuntoPeer::RUTA;
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
			$this->modifiedColumns[] = AdjuntoPeer::FECHA;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->descripcion = $rs->getString($startcol + 1);

			$this->titulo = $rs->getString($startcol + 2);

			$this->nombre_archivo = $rs->getString($startcol + 3);

			$this->tipo_archivo = $rs->getString($startcol + 4);

			$this->ruta = $rs->getString($startcol + 5);

			$this->fecha = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Adjunto object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AdjuntoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AdjuntoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AdjuntoPeer::DATABASE_NAME);
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
					$pk = AdjuntoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AdjuntoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLegajoadjuntos !== null) {
				foreach($this->collLegajoadjuntos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collInformes !== null) {
				foreach($this->collInformes as $referrerFK) {
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
					foreach($this->collLegajoadjuntos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collInformes !== null) {
					foreach($this->collInformes as $referrerFK) {
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
		return $this->getByPosition($pos);
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

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
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

			foreach($this->getLegajoadjuntos() as $relObj) {
				$copyObj->addLegajoadjunto($relObj->copy($deepCopy));
			}

			foreach($this->getInformes() as $relObj) {
				$copyObj->addInforme($relObj->copy($deepCopy));
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

	
	public function initLegajoadjuntos()
	{
		if ($this->collLegajoadjuntos === null) {
			$this->collLegajoadjuntos = array();
		}
	}

	
	public function getLegajoadjuntos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLegajoadjuntoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajoadjuntos === null) {
			if ($this->isNew()) {
			   $this->collLegajoadjuntos = array();
			} else {

				$criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->getId());

				LegajoadjuntoPeer::addSelectColumns($criteria);
				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->getId());

				LegajoadjuntoPeer::addSelectColumns($criteria);
				if (!isset($this->lastLegajoadjuntoCriteria) || !$this->lastLegajoadjuntoCriteria->equals($criteria)) {
					$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLegajoadjuntoCriteria = $criteria;
		return $this->collLegajoadjuntos;
	}

	
	public function countLegajoadjuntos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLegajoadjuntoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->getId());

		return LegajoadjuntoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLegajoadjunto(Legajoadjunto $l)
	{
		$this->collLegajoadjuntos[] = $l;
		$l->setAdjunto($this);
	}


	
	public function getLegajoadjuntosJoinLegajopedagogico($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLegajoadjuntoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajoadjuntos === null) {
			if ($this->isNew()) {
				$this->collLegajoadjuntos = array();
			} else {

				$criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->getId());

				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelectJoinLegajopedagogico($criteria, $con);
			}
		} else {
									
			$criteria->add(LegajoadjuntoPeer::FK_ADJUNTO_ID, $this->getId());

			if (!isset($this->lastLegajoadjuntoCriteria) || !$this->lastLegajoadjuntoCriteria->equals($criteria)) {
				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelectJoinLegajopedagogico($criteria, $con);
			}
		}
		$this->lastLegajoadjuntoCriteria = $criteria;

		return $this->collLegajoadjuntos;
	}

	
	public function initInformes()
	{
		if ($this->collInformes === null) {
			$this->collInformes = array();
		}
	}

	
	public function getInformes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInformePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInformes === null) {
			if ($this->isNew()) {
			   $this->collInformes = array();
			} else {

				$criteria->add(InformePeer::FK_ADJUNTO_ID, $this->getId());

				InformePeer::addSelectColumns($criteria);
				$this->collInformes = InformePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InformePeer::FK_ADJUNTO_ID, $this->getId());

				InformePeer::addSelectColumns($criteria);
				if (!isset($this->lastInformeCriteria) || !$this->lastInformeCriteria->equals($criteria)) {
					$this->collInformes = InformePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInformeCriteria = $criteria;
		return $this->collInformes;
	}

	
	public function countInformes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInformePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InformePeer::FK_ADJUNTO_ID, $this->getId());

		return InformePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInforme(Informe $l)
	{
		$this->collInformes[] = $l;
		$l->setAdjunto($this);
	}


	
	public function getInformesJoinTipoinforme($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInformePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInformes === null) {
			if ($this->isNew()) {
				$this->collInformes = array();
			} else {

				$criteria->add(InformePeer::FK_ADJUNTO_ID, $this->getId());

				$this->collInformes = InformePeer::doSelectJoinTipoinforme($criteria, $con);
			}
		} else {
									
			$criteria->add(InformePeer::FK_ADJUNTO_ID, $this->getId());

			if (!isset($this->lastInformeCriteria) || !$this->lastInformeCriteria->equals($criteria)) {
				$this->collInformes = InformePeer::doSelectJoinTipoinforme($criteria, $con);
			}
		}
		$this->lastInformeCriteria = $criteria;

		return $this->collInformes;
	}

} 