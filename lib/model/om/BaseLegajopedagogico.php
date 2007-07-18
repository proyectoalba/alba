<?php


abstract class BaseLegajopedagogico extends BaseObject  implements Persistent {


	
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

	
	protected $lastLegajoadjuntoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
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

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = LegajopedagogicoPeer::ID;
		}

	} 
	
	public function setFkAlumnoId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_alumno_id !== $v) {
			$this->fk_alumno_id = $v;
			$this->modifiedColumns[] = LegajopedagogicoPeer::FK_ALUMNO_ID;
		}

		if ($this->aAlumno !== null && $this->aAlumno->getId() !== $v) {
			$this->aAlumno = null;
		}

	} 
	
	public function setTitulo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->titulo !== $v) {
			$this->titulo = $v;
			$this->modifiedColumns[] = LegajopedagogicoPeer::TITULO;
		}

	} 
	
	public function setResumen($v)
	{

								if ($v instanceof Lob && $v === $this->resumen) {
			$changed = $v->isModified();
		} else {
			$changed = ($this->resumen !== $v);
		}
		if ($changed) {
			if ( !($v instanceof Lob) ) {
				$obj = new Blob();
				$obj->setContents($v);
			} else {
				$obj = $v;
			}
			$this->resumen = $obj;
			$this->modifiedColumns[] = LegajopedagogicoPeer::RESUMEN;
		}

	} 
	
	public function setTexto($v)
	{

								if ($v instanceof Lob && $v === $this->texto) {
			$changed = $v->isModified();
		} else {
			$changed = ($this->texto !== $v);
		}
		if ($changed) {
			if ( !($v instanceof Lob) ) {
				$obj = new Blob();
				$obj->setContents($v);
			} else {
				$obj = $v;
			}
			$this->texto = $obj;
			$this->modifiedColumns[] = LegajopedagogicoPeer::TEXTO;
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
			$this->modifiedColumns[] = LegajopedagogicoPeer::FECHA;
		}

	} 
	
	public function setFkUsuarioId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_usuario_id !== $v) {
			$this->fk_usuario_id = $v;
			$this->modifiedColumns[] = LegajopedagogicoPeer::FK_USUARIO_ID;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

	} 
	
	public function setFkLegajocategoriaId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_legajocategoria_id !== $v) {
			$this->fk_legajocategoria_id = $v;
			$this->modifiedColumns[] = LegajopedagogicoPeer::FK_LEGAJOCATEGORIA_ID;
		}

		if ($this->aLegajocategoria !== null && $this->aLegajocategoria->getId() !== $v) {
			$this->aLegajocategoria = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fk_alumno_id = $rs->getInt($startcol + 1);

			$this->titulo = $rs->getString($startcol + 2);

			$this->resumen = $rs->getBlob($startcol + 3);

			$this->texto = $rs->getBlob($startcol + 4);

			$this->fecha = $rs->getTimestamp($startcol + 5, null);

			$this->fk_usuario_id = $rs->getInt($startcol + 6);

			$this->fk_legajocategoria_id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Legajopedagogico object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LegajopedagogicoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LegajopedagogicoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LegajopedagogicoPeer::DATABASE_NAME);
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


												
			if ($this->aAlumno !== null) {
				if ($this->aAlumno->isModified()) {
					$affectedRows += $this->aAlumno->save($con);
				}
				$this->setAlumno($this->aAlumno);
			}

			if ($this->aUsuario !== null) {
				if ($this->aUsuario->isModified()) {
					$affectedRows += $this->aUsuario->save($con);
				}
				$this->setUsuario($this->aUsuario);
			}

			if ($this->aLegajocategoria !== null) {
				if ($this->aLegajocategoria->isModified()) {
					$affectedRows += $this->aLegajocategoria->save($con);
				}
				$this->setLegajocategoria($this->aLegajocategoria);
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
				foreach($this->collLegajoadjuntos as $referrerFK) {
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
					foreach($this->collLegajoadjuntos as $referrerFK) {
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
		return $this->getByPosition($pos);
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

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
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

			foreach($this->getLegajoadjuntos() as $relObj) {
				$copyObj->addLegajoadjunto($relObj->copy($deepCopy));
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

	
	public function setAlumno($v)
	{


		if ($v === null) {
			$this->setFkAlumnoId(NULL);
		} else {
			$this->setFkAlumnoId($v->getId());
		}


		$this->aAlumno = $v;
	}


	
	public function getAlumno($con = null)
	{
				include_once 'lib/model/om/BaseAlumnoPeer.php';

		if ($this->aAlumno === null && ($this->fk_alumno_id !== null)) {

			$this->aAlumno = AlumnoPeer::retrieveByPK($this->fk_alumno_id, $con);

			
		}
		return $this->aAlumno;
	}

	
	public function setUsuario($v)
	{


		if ($v === null) {
			$this->setFkUsuarioId(NULL);
		} else {
			$this->setFkUsuarioId($v->getId());
		}


		$this->aUsuario = $v;
	}


	
	public function getUsuario($con = null)
	{
				include_once 'lib/model/om/BaseUsuarioPeer.php';

		if ($this->aUsuario === null && ($this->fk_usuario_id !== null)) {

			$this->aUsuario = UsuarioPeer::retrieveByPK($this->fk_usuario_id, $con);

			
		}
		return $this->aUsuario;
	}

	
	public function setLegajocategoria($v)
	{


		if ($v === null) {
			$this->setFkLegajocategoriaId(NULL);
		} else {
			$this->setFkLegajocategoriaId($v->getId());
		}


		$this->aLegajocategoria = $v;
	}


	
	public function getLegajocategoria($con = null)
	{
				include_once 'lib/model/om/BaseLegajocategoriaPeer.php';

		if ($this->aLegajocategoria === null && ($this->fk_legajocategoria_id !== null)) {

			$this->aLegajocategoria = LegajocategoriaPeer::retrieveByPK($this->fk_legajocategoria_id, $con);

			
		}
		return $this->aLegajocategoria;
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

				$criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->getId());

				LegajoadjuntoPeer::addSelectColumns($criteria);
				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->getId());

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

		$criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->getId());

		return LegajoadjuntoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLegajoadjunto(Legajoadjunto $l)
	{
		$this->collLegajoadjuntos[] = $l;
		$l->setLegajopedagogico($this);
	}


	
	public function getLegajoadjuntosJoinAdjunto($criteria = null, $con = null)
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

				$criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->getId());

				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelectJoinAdjunto($criteria, $con);
			}
		} else {
									
			$criteria->add(LegajoadjuntoPeer::FK_LEGAJOPEDAGOGICO_ID, $this->getId());

			if (!isset($this->lastLegajoadjuntoCriteria) || !$this->lastLegajoadjuntoCriteria->equals($criteria)) {
				$this->collLegajoadjuntos = LegajoadjuntoPeer::doSelectJoinAdjunto($criteria, $con);
			}
		}
		$this->lastLegajoadjuntoCriteria = $criteria;

		return $this->collLegajoadjuntos;
	}

} 