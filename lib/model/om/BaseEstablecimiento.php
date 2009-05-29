<?php


abstract class BaseEstablecimiento extends BaseObject  implements Persistent {


  const PEER = 'EstablecimientoPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $descripcion;

	
	protected $cuit;

	
	protected $legajoprefijo;

	
	protected $legajosiguiente;

	
	protected $fk_distritoescolar_id;

	
	protected $fk_organizacion_id;

	
	protected $fk_niveltipo_id;

	
	protected $direccion;

	
	protected $ciudad;

	
	protected $codigo_postal;

	
	protected $telefono;

	
	protected $fk_provincia_id;

	
	protected $rector;

	
	protected $aDistritoescolar;

	
	protected $aOrganizacion;

	
	protected $aNiveltipo;

	
	protected $aProvincia;

	
	protected $collUsuarios;

	
	private $lastUsuarioCriteria = null;

	
	protected $collRelEstablecimientoLocacions;

	
	private $lastRelEstablecimientoLocacionCriteria = null;

	
	protected $collAlumnos;

	
	private $lastAlumnoCriteria = null;

	
	protected $collCiclolectivos;

	
	private $lastCiclolectivoCriteria = null;

	
	protected $collConceptos;

	
	private $lastConceptoCriteria = null;

	
	protected $collEscalanotas;

	
	private $lastEscalanotaCriteria = null;

	
	protected $collActividads;

	
	private $lastActividadCriteria = null;

	
	protected $collCarreras;

	
	private $lastCarreraCriteria = null;

	
	protected $collAnios;

	
	private $lastAnioCriteria = null;

	
	protected $collRelDocenteEstablecimientos;

	
	private $lastRelDocenteEstablecimientoCriteria = null;

	
	protected $collHorarioescolars;

	
	private $lastHorarioescolarCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->fk_distritoescolar_id = 0;
		$this->fk_organizacion_id = 0;
		$this->fk_niveltipo_id = 0;
		$this->fk_provincia_id = 0;
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

	
	public function getCuit()
	{
		return $this->cuit;
	}

	
	public function getLegajoprefijo()
	{
		return $this->legajoprefijo;
	}

	
	public function getLegajosiguiente()
	{
		return $this->legajosiguiente;
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

	
	public function getDireccion()
	{
		return $this->direccion;
	}

	
	public function getCiudad()
	{
		return $this->ciudad;
	}

	
	public function getCodigoPostal()
	{
		return $this->codigo_postal;
	}

	
	public function getTelefono()
	{
		return $this->telefono;
	}

	
	public function getFkProvinciaId()
	{
		return $this->fk_provincia_id;
	}

	
	public function getRector()
	{
		return $this->rector;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::ID;
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
			$this->modifiedColumns[] = EstablecimientoPeer::NOMBRE;
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
			$this->modifiedColumns[] = EstablecimientoPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setCuit($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cuit !== $v) {
			$this->cuit = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::CUIT;
		}

		return $this;
	} 
	
	public function setLegajoprefijo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->legajoprefijo !== $v) {
			$this->legajoprefijo = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::LEGAJOPREFIJO;
		}

		return $this;
	} 
	
	public function setLegajosiguiente($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->legajosiguiente !== $v) {
			$this->legajosiguiente = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::LEGAJOSIGUIENTE;
		}

		return $this;
	} 
	
	public function setFkDistritoescolarId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_distritoescolar_id !== $v || $v === 0) {
			$this->fk_distritoescolar_id = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::FK_DISTRITOESCOLAR_ID;
		}

		if ($this->aDistritoescolar !== null && $this->aDistritoescolar->getId() !== $v) {
			$this->aDistritoescolar = null;
		}

		return $this;
	} 
	
	public function setFkOrganizacionId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_organizacion_id !== $v || $v === 0) {
			$this->fk_organizacion_id = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::FK_ORGANIZACION_ID;
		}

		if ($this->aOrganizacion !== null && $this->aOrganizacion->getId() !== $v) {
			$this->aOrganizacion = null;
		}

		return $this;
	} 
	
	public function setFkNiveltipoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_niveltipo_id !== $v || $v === 0) {
			$this->fk_niveltipo_id = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::FK_NIVELTIPO_ID;
		}

		if ($this->aNiveltipo !== null && $this->aNiveltipo->getId() !== $v) {
			$this->aNiveltipo = null;
		}

		return $this;
	} 
	
	public function setDireccion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->direccion !== $v) {
			$this->direccion = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::DIRECCION;
		}

		return $this;
	} 
	
	public function setCiudad($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->ciudad !== $v) {
			$this->ciudad = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::CIUDAD;
		}

		return $this;
	} 
	
	public function setCodigoPostal($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->codigo_postal !== $v) {
			$this->codigo_postal = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::CODIGO_POSTAL;
		}

		return $this;
	} 
	
	public function setTelefono($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telefono !== $v) {
			$this->telefono = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::TELEFONO;
		}

		return $this;
	} 
	
	public function setFkProvinciaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_provincia_id !== $v || $v === 0) {
			$this->fk_provincia_id = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::FK_PROVINCIA_ID;
		}

		if ($this->aProvincia !== null && $this->aProvincia->getId() !== $v) {
			$this->aProvincia = null;
		}

		return $this;
	} 
	
	public function setRector($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->rector !== $v) {
			$this->rector = $v;
			$this->modifiedColumns[] = EstablecimientoPeer::RECTOR;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID,EstablecimientoPeer::FK_ORGANIZACION_ID,EstablecimientoPeer::FK_NIVELTIPO_ID,EstablecimientoPeer::FK_PROVINCIA_ID))) {
				return false;
			}

			if ($this->fk_distritoescolar_id !== 0) {
				return false;
			}

			if ($this->fk_organizacion_id !== 0) {
				return false;
			}

			if ($this->fk_niveltipo_id !== 0) {
				return false;
			}

			if ($this->fk_provincia_id !== 0) {
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
			$this->cuit = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->legajoprefijo = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->legajosiguiente = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->fk_distritoescolar_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->fk_organizacion_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->fk_niveltipo_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->direccion = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->ciudad = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->codigo_postal = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->telefono = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->fk_provincia_id = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->rector = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Establecimiento object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aDistritoescolar !== null && $this->fk_distritoescolar_id !== $this->aDistritoescolar->getId()) {
			$this->aDistritoescolar = null;
		}
		if ($this->aOrganizacion !== null && $this->fk_organizacion_id !== $this->aOrganizacion->getId()) {
			$this->aOrganizacion = null;
		}
		if ($this->aNiveltipo !== null && $this->fk_niveltipo_id !== $this->aNiveltipo->getId()) {
			$this->aNiveltipo = null;
		}
		if ($this->aProvincia !== null && $this->fk_provincia_id !== $this->aProvincia->getId()) {
			$this->aProvincia = null;
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
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = EstablecimientoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aDistritoescolar = null;
			$this->aOrganizacion = null;
			$this->aNiveltipo = null;
			$this->aProvincia = null;
			$this->collUsuarios = null;
			$this->lastUsuarioCriteria = null;

			$this->collRelEstablecimientoLocacions = null;
			$this->lastRelEstablecimientoLocacionCriteria = null;

			$this->collAlumnos = null;
			$this->lastAlumnoCriteria = null;

			$this->collCiclolectivos = null;
			$this->lastCiclolectivoCriteria = null;

			$this->collConceptos = null;
			$this->lastConceptoCriteria = null;

			$this->collEscalanotas = null;
			$this->lastEscalanotaCriteria = null;

			$this->collActividads = null;
			$this->lastActividadCriteria = null;

			$this->collCarreras = null;
			$this->lastCarreraCriteria = null;

			$this->collAnios = null;
			$this->lastAnioCriteria = null;

			$this->collRelDocenteEstablecimientos = null;
			$this->lastRelDocenteEstablecimientoCriteria = null;

			$this->collHorarioescolars = null;
			$this->lastHorarioescolarCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			EstablecimientoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			EstablecimientoPeer::addInstanceToPool($this);
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

												
			if ($this->aDistritoescolar !== null) {
				if ($this->aDistritoescolar->isModified() || $this->aDistritoescolar->isNew()) {
					$affectedRows += $this->aDistritoescolar->save($con);
				}
				$this->setDistritoescolar($this->aDistritoescolar);
			}

			if ($this->aOrganizacion !== null) {
				if ($this->aOrganizacion->isModified() || $this->aOrganizacion->isNew()) {
					$affectedRows += $this->aOrganizacion->save($con);
				}
				$this->setOrganizacion($this->aOrganizacion);
			}

			if ($this->aNiveltipo !== null) {
				if ($this->aNiveltipo->isModified() || $this->aNiveltipo->isNew()) {
					$affectedRows += $this->aNiveltipo->save($con);
				}
				$this->setNiveltipo($this->aNiveltipo);
			}

			if ($this->aProvincia !== null) {
				if ($this->aProvincia->isModified() || $this->aProvincia->isNew()) {
					$affectedRows += $this->aProvincia->save($con);
				}
				$this->setProvincia($this->aProvincia);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = EstablecimientoPeer::ID;
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

			if ($this->collUsuarios !== null) {
				foreach ($this->collUsuarios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelEstablecimientoLocacions !== null) {
				foreach ($this->collRelEstablecimientoLocacions as $referrerFK) {
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

			if ($this->collCiclolectivos !== null) {
				foreach ($this->collCiclolectivos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collConceptos !== null) {
				foreach ($this->collConceptos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEscalanotas !== null) {
				foreach ($this->collEscalanotas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collActividads !== null) {
				foreach ($this->collActividads as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCarreras !== null) {
				foreach ($this->collCarreras as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAnios !== null) {
				foreach ($this->collAnios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelDocenteEstablecimientos !== null) {
				foreach ($this->collRelDocenteEstablecimientos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collHorarioescolars !== null) {
				foreach ($this->collHorarioescolars as $referrerFK) {
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


												
			if ($this->aDistritoescolar !== null) {
				if (!$this->aDistritoescolar->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDistritoescolar->getValidationFailures());
				}
			}

			if ($this->aOrganizacion !== null) {
				if (!$this->aOrganizacion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOrganizacion->getValidationFailures());
				}
			}

			if ($this->aNiveltipo !== null) {
				if (!$this->aNiveltipo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aNiveltipo->getValidationFailures());
				}
			}

			if ($this->aProvincia !== null) {
				if (!$this->aProvincia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProvincia->getValidationFailures());
				}
			}


			if (($retval = EstablecimientoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUsuarios !== null) {
					foreach ($this->collUsuarios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelEstablecimientoLocacions !== null) {
					foreach ($this->collRelEstablecimientoLocacions as $referrerFK) {
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

				if ($this->collCiclolectivos !== null) {
					foreach ($this->collCiclolectivos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collConceptos !== null) {
					foreach ($this->collConceptos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEscalanotas !== null) {
					foreach ($this->collEscalanotas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collActividads !== null) {
					foreach ($this->collActividads as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCarreras !== null) {
					foreach ($this->collCarreras as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAnios !== null) {
					foreach ($this->collAnios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelDocenteEstablecimientos !== null) {
					foreach ($this->collRelDocenteEstablecimientos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collHorarioescolars !== null) {
					foreach ($this->collHorarioescolars as $referrerFK) {
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
				return $this->getCuit();
				break;
			case 4:
				return $this->getLegajoprefijo();
				break;
			case 5:
				return $this->getLegajosiguiente();
				break;
			case 6:
				return $this->getFkDistritoescolarId();
				break;
			case 7:
				return $this->getFkOrganizacionId();
				break;
			case 8:
				return $this->getFkNiveltipoId();
				break;
			case 9:
				return $this->getDireccion();
				break;
			case 10:
				return $this->getCiudad();
				break;
			case 11:
				return $this->getCodigoPostal();
				break;
			case 12:
				return $this->getTelefono();
				break;
			case 13:
				return $this->getFkProvinciaId();
				break;
			case 14:
				return $this->getRector();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = EstablecimientoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getCuit(),
			$keys[4] => $this->getLegajoprefijo(),
			$keys[5] => $this->getLegajosiguiente(),
			$keys[6] => $this->getFkDistritoescolarId(),
			$keys[7] => $this->getFkOrganizacionId(),
			$keys[8] => $this->getFkNiveltipoId(),
			$keys[9] => $this->getDireccion(),
			$keys[10] => $this->getCiudad(),
			$keys[11] => $this->getCodigoPostal(),
			$keys[12] => $this->getTelefono(),
			$keys[13] => $this->getFkProvinciaId(),
			$keys[14] => $this->getRector(),
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
				$this->setCuit($value);
				break;
			case 4:
				$this->setLegajoprefijo($value);
				break;
			case 5:
				$this->setLegajosiguiente($value);
				break;
			case 6:
				$this->setFkDistritoescolarId($value);
				break;
			case 7:
				$this->setFkOrganizacionId($value);
				break;
			case 8:
				$this->setFkNiveltipoId($value);
				break;
			case 9:
				$this->setDireccion($value);
				break;
			case 10:
				$this->setCiudad($value);
				break;
			case 11:
				$this->setCodigoPostal($value);
				break;
			case 12:
				$this->setTelefono($value);
				break;
			case 13:
				$this->setFkProvinciaId($value);
				break;
			case 14:
				$this->setRector($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EstablecimientoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCuit($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLegajoprefijo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLegajosiguiente($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFkDistritoescolarId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFkOrganizacionId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFkNiveltipoId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDireccion($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCiudad($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodigoPostal($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTelefono($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFkProvinciaId($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setRector($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);

		if ($this->isColumnModified(EstablecimientoPeer::ID)) $criteria->add(EstablecimientoPeer::ID, $this->id);
		if ($this->isColumnModified(EstablecimientoPeer::NOMBRE)) $criteria->add(EstablecimientoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(EstablecimientoPeer::DESCRIPCION)) $criteria->add(EstablecimientoPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(EstablecimientoPeer::CUIT)) $criteria->add(EstablecimientoPeer::CUIT, $this->cuit);
		if ($this->isColumnModified(EstablecimientoPeer::LEGAJOPREFIJO)) $criteria->add(EstablecimientoPeer::LEGAJOPREFIJO, $this->legajoprefijo);
		if ($this->isColumnModified(EstablecimientoPeer::LEGAJOSIGUIENTE)) $criteria->add(EstablecimientoPeer::LEGAJOSIGUIENTE, $this->legajosiguiente);
		if ($this->isColumnModified(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID)) $criteria->add(EstablecimientoPeer::FK_DISTRITOESCOLAR_ID, $this->fk_distritoescolar_id);
		if ($this->isColumnModified(EstablecimientoPeer::FK_ORGANIZACION_ID)) $criteria->add(EstablecimientoPeer::FK_ORGANIZACION_ID, $this->fk_organizacion_id);
		if ($this->isColumnModified(EstablecimientoPeer::FK_NIVELTIPO_ID)) $criteria->add(EstablecimientoPeer::FK_NIVELTIPO_ID, $this->fk_niveltipo_id);
		if ($this->isColumnModified(EstablecimientoPeer::DIRECCION)) $criteria->add(EstablecimientoPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(EstablecimientoPeer::CIUDAD)) $criteria->add(EstablecimientoPeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(EstablecimientoPeer::CODIGO_POSTAL)) $criteria->add(EstablecimientoPeer::CODIGO_POSTAL, $this->codigo_postal);
		if ($this->isColumnModified(EstablecimientoPeer::TELEFONO)) $criteria->add(EstablecimientoPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(EstablecimientoPeer::FK_PROVINCIA_ID)) $criteria->add(EstablecimientoPeer::FK_PROVINCIA_ID, $this->fk_provincia_id);
		if ($this->isColumnModified(EstablecimientoPeer::RECTOR)) $criteria->add(EstablecimientoPeer::RECTOR, $this->rector);

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

		$copyObj->setCuit($this->cuit);

		$copyObj->setLegajoprefijo($this->legajoprefijo);

		$copyObj->setLegajosiguiente($this->legajosiguiente);

		$copyObj->setFkDistritoescolarId($this->fk_distritoescolar_id);

		$copyObj->setFkOrganizacionId($this->fk_organizacion_id);

		$copyObj->setFkNiveltipoId($this->fk_niveltipo_id);

		$copyObj->setDireccion($this->direccion);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCodigoPostal($this->codigo_postal);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setFkProvinciaId($this->fk_provincia_id);

		$copyObj->setRector($this->rector);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getUsuarios() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addUsuario($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRelEstablecimientoLocacions() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelEstablecimientoLocacion($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAlumnos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addAlumno($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCiclolectivos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addCiclolectivo($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getConceptos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addConcepto($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getEscalanotas() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addEscalanota($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getActividads() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addActividad($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCarreras() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addCarrera($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAnios() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addAnio($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRelDocenteEstablecimientos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelDocenteEstablecimiento($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getHorarioescolars() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addHorarioescolar($relObj->copy($deepCopy));
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
			self::$peer = new EstablecimientoPeer();
		}
		return self::$peer;
	}

	
	public function setDistritoescolar(Distritoescolar $v = null)
	{
		if ($v === null) {
			$this->setFkDistritoescolarId(0);
		} else {
			$this->setFkDistritoescolarId($v->getId());
		}

		$this->aDistritoescolar = $v;

						if ($v !== null) {
			$v->addEstablecimiento($this);
		}

		return $this;
	}


	
	public function getDistritoescolar(PropelPDO $con = null)
	{
		if ($this->aDistritoescolar === null && ($this->fk_distritoescolar_id !== null)) {
			$c = new Criteria(DistritoescolarPeer::DATABASE_NAME);
			$c->add(DistritoescolarPeer::ID, $this->fk_distritoescolar_id);
			$this->aDistritoescolar = DistritoescolarPeer::doSelectOne($c, $con);
			
		}
		return $this->aDistritoescolar;
	}

	
	public function setOrganizacion(Organizacion $v = null)
	{
		if ($v === null) {
			$this->setFkOrganizacionId(0);
		} else {
			$this->setFkOrganizacionId($v->getId());
		}

		$this->aOrganizacion = $v;

						if ($v !== null) {
			$v->addEstablecimiento($this);
		}

		return $this;
	}


	
	public function getOrganizacion(PropelPDO $con = null)
	{
		if ($this->aOrganizacion === null && ($this->fk_organizacion_id !== null)) {
			$c = new Criteria(OrganizacionPeer::DATABASE_NAME);
			$c->add(OrganizacionPeer::ID, $this->fk_organizacion_id);
			$this->aOrganizacion = OrganizacionPeer::doSelectOne($c, $con);
			
		}
		return $this->aOrganizacion;
	}

	
	public function setNiveltipo(Niveltipo $v = null)
	{
		if ($v === null) {
			$this->setFkNiveltipoId(0);
		} else {
			$this->setFkNiveltipoId($v->getId());
		}

		$this->aNiveltipo = $v;

						if ($v !== null) {
			$v->addEstablecimiento($this);
		}

		return $this;
	}


	
	public function getNiveltipo(PropelPDO $con = null)
	{
		if ($this->aNiveltipo === null && ($this->fk_niveltipo_id !== null)) {
			$c = new Criteria(NiveltipoPeer::DATABASE_NAME);
			$c->add(NiveltipoPeer::ID, $this->fk_niveltipo_id);
			$this->aNiveltipo = NiveltipoPeer::doSelectOne($c, $con);
			
		}
		return $this->aNiveltipo;
	}

	
	public function setProvincia(Provincia $v = null)
	{
		if ($v === null) {
			$this->setFkProvinciaId(0);
		} else {
			$this->setFkProvinciaId($v->getId());
		}

		$this->aProvincia = $v;

						if ($v !== null) {
			$v->addEstablecimiento($this);
		}

		return $this;
	}


	
	public function getProvincia(PropelPDO $con = null)
	{
		if ($this->aProvincia === null && ($this->fk_provincia_id !== null)) {
			$c = new Criteria(ProvinciaPeer::DATABASE_NAME);
			$c->add(ProvinciaPeer::ID, $this->fk_provincia_id);
			$this->aProvincia = ProvinciaPeer::doSelectOne($c, $con);
			
		}
		return $this->aProvincia;
	}

	
	public function clearUsuarios()
	{
		$this->collUsuarios = null; 	}

	
	public function initUsuarios()
	{
		$this->collUsuarios = array();
	}

	
	public function getUsuarios($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarios === null) {
			if ($this->isNew()) {
			   $this->collUsuarios = array();
			} else {

				$criteria->add(UsuarioPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				UsuarioPeer::addSelectColumns($criteria);
				$this->collUsuarios = UsuarioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UsuarioPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				UsuarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastUsuarioCriteria) || !$this->lastUsuarioCriteria->equals($criteria)) {
					$this->collUsuarios = UsuarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUsuarioCriteria = $criteria;
		return $this->collUsuarios;
	}

	
	public function countUsuarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collUsuarios === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(UsuarioPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$count = UsuarioPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UsuarioPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				if (!isset($this->lastUsuarioCriteria) || !$this->lastUsuarioCriteria->equals($criteria)) {
					$count = UsuarioPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collUsuarios);
				}
			} else {
				$count = count($this->collUsuarios);
			}
		}
		return $count;
	}

	
	public function addUsuario(Usuario $l)
	{
		if ($this->collUsuarios === null) {
			$this->initUsuarios();
		}
		if (!in_array($l, $this->collUsuarios, true)) { 			array_push($this->collUsuarios, $l);
			$l->setEstablecimiento($this);
		}
	}

	
	public function clearRelEstablecimientoLocacions()
	{
		$this->collRelEstablecimientoLocacions = null; 	}

	
	public function initRelEstablecimientoLocacions()
	{
		$this->collRelEstablecimientoLocacions = array();
	}

	
	public function getRelEstablecimientoLocacions($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelEstablecimientoLocacions === null) {
			if ($this->isNew()) {
			   $this->collRelEstablecimientoLocacions = array();
			} else {

				$criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				RelEstablecimientoLocacionPeer::addSelectColumns($criteria);
				$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				RelEstablecimientoLocacionPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelEstablecimientoLocacionCriteria) || !$this->lastRelEstablecimientoLocacionCriteria->equals($criteria)) {
					$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelEstablecimientoLocacionCriteria = $criteria;
		return $this->collRelEstablecimientoLocacions;
	}

	
	public function countRelEstablecimientoLocacions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelEstablecimientoLocacions === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$count = RelEstablecimientoLocacionPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				if (!isset($this->lastRelEstablecimientoLocacionCriteria) || !$this->lastRelEstablecimientoLocacionCriteria->equals($criteria)) {
					$count = RelEstablecimientoLocacionPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelEstablecimientoLocacions);
				}
			} else {
				$count = count($this->collRelEstablecimientoLocacions);
			}
		}
		return $count;
	}

	
	public function addRelEstablecimientoLocacion(RelEstablecimientoLocacion $l)
	{
		if ($this->collRelEstablecimientoLocacions === null) {
			$this->initRelEstablecimientoLocacions();
		}
		if (!in_array($l, $this->collRelEstablecimientoLocacions, true)) { 			array_push($this->collRelEstablecimientoLocacions, $l);
			$l->setEstablecimiento($this);
		}
	}


	
	public function getRelEstablecimientoLocacionsJoinLocacion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelEstablecimientoLocacions === null) {
			if ($this->isNew()) {
				$this->collRelEstablecimientoLocacions = array();
			} else {

				$criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelectJoinLocacion($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $this->id);

			if (!isset($this->lastRelEstablecimientoLocacionCriteria) || !$this->lastRelEstablecimientoLocacionCriteria->equals($criteria)) {
				$this->collRelEstablecimientoLocacions = RelEstablecimientoLocacionPeer::doSelectJoinLocacion($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelEstablecimientoLocacionCriteria = $criteria;

		return $this->collRelEstablecimientoLocacions;
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
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
			   $this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				AlumnoPeer::addSelectColumns($criteria);
				$this->collAlumnos = AlumnoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

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
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
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

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$count = AlumnoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

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
			$l->setEstablecimiento($this);
		}
	}


	
	public function getAlumnosJoinProvincia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinProvincia($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinProvincia($criteria, $con, $join_behavior);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinTipodocumento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinTipodocumento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinTipodocumento($criteria, $con, $join_behavior);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinCuenta($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinCuenta($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

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
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinConceptobaja($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

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
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinPais($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

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
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinEstadosalumnos($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinEstadosalumnos($criteria, $con, $join_behavior);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}

	
	public function clearCiclolectivos()
	{
		$this->collCiclolectivos = null; 	}

	
	public function initCiclolectivos()
	{
		$this->collCiclolectivos = array();
	}

	
	public function getCiclolectivos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCiclolectivos === null) {
			if ($this->isNew()) {
			   $this->collCiclolectivos = array();
			} else {

				$criteria->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				CiclolectivoPeer::addSelectColumns($criteria);
				$this->collCiclolectivos = CiclolectivoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				CiclolectivoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCiclolectivoCriteria) || !$this->lastCiclolectivoCriteria->equals($criteria)) {
					$this->collCiclolectivos = CiclolectivoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCiclolectivoCriteria = $criteria;
		return $this->collCiclolectivos;
	}

	
	public function countCiclolectivos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCiclolectivos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$count = CiclolectivoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				if (!isset($this->lastCiclolectivoCriteria) || !$this->lastCiclolectivoCriteria->equals($criteria)) {
					$count = CiclolectivoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collCiclolectivos);
				}
			} else {
				$count = count($this->collCiclolectivos);
			}
		}
		return $count;
	}

	
	public function addCiclolectivo(Ciclolectivo $l)
	{
		if ($this->collCiclolectivos === null) {
			$this->initCiclolectivos();
		}
		if (!in_array($l, $this->collCiclolectivos, true)) { 			array_push($this->collCiclolectivos, $l);
			$l->setEstablecimiento($this);
		}
	}

	
	public function clearConceptos()
	{
		$this->collConceptos = null; 	}

	
	public function initConceptos()
	{
		$this->collConceptos = array();
	}

	
	public function getConceptos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collConceptos === null) {
			if ($this->isNew()) {
			   $this->collConceptos = array();
			} else {

				$criteria->add(ConceptoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				ConceptoPeer::addSelectColumns($criteria);
				$this->collConceptos = ConceptoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ConceptoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				ConceptoPeer::addSelectColumns($criteria);
				if (!isset($this->lastConceptoCriteria) || !$this->lastConceptoCriteria->equals($criteria)) {
					$this->collConceptos = ConceptoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastConceptoCriteria = $criteria;
		return $this->collConceptos;
	}

	
	public function countConceptos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collConceptos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ConceptoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$count = ConceptoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ConceptoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				if (!isset($this->lastConceptoCriteria) || !$this->lastConceptoCriteria->equals($criteria)) {
					$count = ConceptoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collConceptos);
				}
			} else {
				$count = count($this->collConceptos);
			}
		}
		return $count;
	}

	
	public function addConcepto(Concepto $l)
	{
		if ($this->collConceptos === null) {
			$this->initConceptos();
		}
		if (!in_array($l, $this->collConceptos, true)) { 			array_push($this->collConceptos, $l);
			$l->setEstablecimiento($this);
		}
	}

	
	public function clearEscalanotas()
	{
		$this->collEscalanotas = null; 	}

	
	public function initEscalanotas()
	{
		$this->collEscalanotas = array();
	}

	
	public function getEscalanotas($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEscalanotas === null) {
			if ($this->isNew()) {
			   $this->collEscalanotas = array();
			} else {

				$criteria->add(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				EscalanotaPeer::addSelectColumns($criteria);
				$this->collEscalanotas = EscalanotaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				EscalanotaPeer::addSelectColumns($criteria);
				if (!isset($this->lastEscalanotaCriteria) || !$this->lastEscalanotaCriteria->equals($criteria)) {
					$this->collEscalanotas = EscalanotaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEscalanotaCriteria = $criteria;
		return $this->collEscalanotas;
	}

	
	public function countEscalanotas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collEscalanotas === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$count = EscalanotaPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				if (!isset($this->lastEscalanotaCriteria) || !$this->lastEscalanotaCriteria->equals($criteria)) {
					$count = EscalanotaPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collEscalanotas);
				}
			} else {
				$count = count($this->collEscalanotas);
			}
		}
		return $count;
	}

	
	public function addEscalanota(Escalanota $l)
	{
		if ($this->collEscalanotas === null) {
			$this->initEscalanotas();
		}
		if (!in_array($l, $this->collEscalanotas, true)) { 			array_push($this->collEscalanotas, $l);
			$l->setEstablecimiento($this);
		}
	}

	
	public function clearActividads()
	{
		$this->collActividads = null; 	}

	
	public function initActividads()
	{
		$this->collActividads = array();
	}

	
	public function getActividads($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActividads === null) {
			if ($this->isNew()) {
			   $this->collActividads = array();
			} else {

				$criteria->add(ActividadPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				ActividadPeer::addSelectColumns($criteria);
				$this->collActividads = ActividadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ActividadPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				ActividadPeer::addSelectColumns($criteria);
				if (!isset($this->lastActividadCriteria) || !$this->lastActividadCriteria->equals($criteria)) {
					$this->collActividads = ActividadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastActividadCriteria = $criteria;
		return $this->collActividads;
	}

	
	public function countActividads(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collActividads === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ActividadPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$count = ActividadPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ActividadPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				if (!isset($this->lastActividadCriteria) || !$this->lastActividadCriteria->equals($criteria)) {
					$count = ActividadPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collActividads);
				}
			} else {
				$count = count($this->collActividads);
			}
		}
		return $count;
	}

	
	public function addActividad(Actividad $l)
	{
		if ($this->collActividads === null) {
			$this->initActividads();
		}
		if (!in_array($l, $this->collActividads, true)) { 			array_push($this->collActividads, $l);
			$l->setEstablecimiento($this);
		}
	}

	
	public function clearCarreras()
	{
		$this->collCarreras = null; 	}

	
	public function initCarreras()
	{
		$this->collCarreras = array();
	}

	
	public function getCarreras($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCarreras === null) {
			if ($this->isNew()) {
			   $this->collCarreras = array();
			} else {

				$criteria->add(CarreraPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				CarreraPeer::addSelectColumns($criteria);
				$this->collCarreras = CarreraPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CarreraPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				CarreraPeer::addSelectColumns($criteria);
				if (!isset($this->lastCarreraCriteria) || !$this->lastCarreraCriteria->equals($criteria)) {
					$this->collCarreras = CarreraPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCarreraCriteria = $criteria;
		return $this->collCarreras;
	}

	
	public function countCarreras(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCarreras === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CarreraPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$count = CarreraPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CarreraPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				if (!isset($this->lastCarreraCriteria) || !$this->lastCarreraCriteria->equals($criteria)) {
					$count = CarreraPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collCarreras);
				}
			} else {
				$count = count($this->collCarreras);
			}
		}
		return $count;
	}

	
	public function addCarrera(Carrera $l)
	{
		if ($this->collCarreras === null) {
			$this->initCarreras();
		}
		if (!in_array($l, $this->collCarreras, true)) { 			array_push($this->collCarreras, $l);
			$l->setEstablecimiento($this);
		}
	}

	
	public function clearAnios()
	{
		$this->collAnios = null; 	}

	
	public function initAnios()
	{
		$this->collAnios = array();
	}

	
	public function getAnios($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAnios === null) {
			if ($this->isNew()) {
			   $this->collAnios = array();
			} else {

				$criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				AnioPeer::addSelectColumns($criteria);
				$this->collAnios = AnioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				AnioPeer::addSelectColumns($criteria);
				if (!isset($this->lastAnioCriteria) || !$this->lastAnioCriteria->equals($criteria)) {
					$this->collAnios = AnioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAnioCriteria = $criteria;
		return $this->collAnios;
	}

	
	public function countAnios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAnios === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$count = AnioPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				if (!isset($this->lastAnioCriteria) || !$this->lastAnioCriteria->equals($criteria)) {
					$count = AnioPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collAnios);
				}
			} else {
				$count = count($this->collAnios);
			}
		}
		return $count;
	}

	
	public function addAnio(Anio $l)
	{
		if ($this->collAnios === null) {
			$this->initAnios();
		}
		if (!in_array($l, $this->collAnios, true)) { 			array_push($this->collAnios, $l);
			$l->setEstablecimiento($this);
		}
	}


	
	public function getAniosJoinCarrera($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAnios === null) {
			if ($this->isNew()) {
				$this->collAnios = array();
			} else {

				$criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$this->collAnios = AnioPeer::doSelectJoinCarrera($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $this->id);

			if (!isset($this->lastAnioCriteria) || !$this->lastAnioCriteria->equals($criteria)) {
				$this->collAnios = AnioPeer::doSelectJoinCarrera($criteria, $con, $join_behavior);
			}
		}
		$this->lastAnioCriteria = $criteria;

		return $this->collAnios;
	}

	
	public function clearRelDocenteEstablecimientos()
	{
		$this->collRelDocenteEstablecimientos = null; 	}

	
	public function initRelDocenteEstablecimientos()
	{
		$this->collRelDocenteEstablecimientos = array();
	}

	
	public function getRelDocenteEstablecimientos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDocenteEstablecimientos === null) {
			if ($this->isNew()) {
			   $this->collRelDocenteEstablecimientos = array();
			} else {

				$criteria->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				RelDocenteEstablecimientoPeer::addSelectColumns($criteria);
				$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				RelDocenteEstablecimientoPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelDocenteEstablecimientoCriteria) || !$this->lastRelDocenteEstablecimientoCriteria->equals($criteria)) {
					$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelDocenteEstablecimientoCriteria = $criteria;
		return $this->collRelDocenteEstablecimientos;
	}

	
	public function countRelDocenteEstablecimientos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelDocenteEstablecimientos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$count = RelDocenteEstablecimientoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				if (!isset($this->lastRelDocenteEstablecimientoCriteria) || !$this->lastRelDocenteEstablecimientoCriteria->equals($criteria)) {
					$count = RelDocenteEstablecimientoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelDocenteEstablecimientos);
				}
			} else {
				$count = count($this->collRelDocenteEstablecimientos);
			}
		}
		return $count;
	}

	
	public function addRelDocenteEstablecimiento(RelDocenteEstablecimiento $l)
	{
		if ($this->collRelDocenteEstablecimientos === null) {
			$this->initRelDocenteEstablecimientos();
		}
		if (!in_array($l, $this->collRelDocenteEstablecimientos, true)) { 			array_push($this->collRelDocenteEstablecimientos, $l);
			$l->setEstablecimiento($this);
		}
	}


	
	public function getRelDocenteEstablecimientosJoinDocente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDocenteEstablecimientos === null) {
			if ($this->isNew()) {
				$this->collRelDocenteEstablecimientos = array();
			} else {

				$criteria->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelectJoinDocente($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID, $this->id);

			if (!isset($this->lastRelDocenteEstablecimientoCriteria) || !$this->lastRelDocenteEstablecimientoCriteria->equals($criteria)) {
				$this->collRelDocenteEstablecimientos = RelDocenteEstablecimientoPeer::doSelectJoinDocente($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelDocenteEstablecimientoCriteria = $criteria;

		return $this->collRelDocenteEstablecimientos;
	}

	
	public function clearHorarioescolars()
	{
		$this->collHorarioescolars = null; 	}

	
	public function initHorarioescolars()
	{
		$this->collHorarioescolars = array();
	}

	
	public function getHorarioescolars($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
			   $this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				HorarioescolarPeer::addSelectColumns($criteria);
				$this->collHorarioescolars = HorarioescolarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				HorarioescolarPeer::addSelectColumns($criteria);
				if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
					$this->collHorarioescolars = HorarioescolarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;
		return $this->collHorarioescolars;
	}

	
	public function countHorarioescolars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$count = HorarioescolarPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
					$count = HorarioescolarPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collHorarioescolars);
				}
			} else {
				$count = count($this->collHorarioescolars);
			}
		}
		return $count;
	}

	
	public function addHorarioescolar(Horarioescolar $l)
	{
		if ($this->collHorarioescolars === null) {
			$this->initHorarioescolars();
		}
		if (!in_array($l, $this->collHorarioescolars, true)) { 			array_push($this->collHorarioescolars, $l);
			$l->setEstablecimiento($this);
		}
	}


	
	public function getHorarioescolarsJoinEvento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEvento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->id);

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinEvento($criteria, $con, $join_behavior);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}


	
	public function getHorarioescolarsJoinTurno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinTurno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->id);

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinTurno($criteria, $con, $join_behavior);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}


	
	public function getHorarioescolarsJoinHorarioescolartipo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstablecimientoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHorarioescolars === null) {
			if ($this->isNew()) {
				$this->collHorarioescolars = array();
			} else {

				$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->id);

				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinHorarioescolartipo($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(HorarioescolarPeer::FK_ESTABLECIMIENTO_ID, $this->id);

			if (!isset($this->lastHorarioescolarCriteria) || !$this->lastHorarioescolarCriteria->equals($criteria)) {
				$this->collHorarioescolars = HorarioescolarPeer::doSelectJoinHorarioescolartipo($criteria, $con, $join_behavior);
			}
		}
		$this->lastHorarioescolarCriteria = $criteria;

		return $this->collHorarioescolars;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collUsuarios) {
				foreach ((array) $this->collUsuarios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRelEstablecimientoLocacions) {
				foreach ((array) $this->collRelEstablecimientoLocacions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAlumnos) {
				foreach ((array) $this->collAlumnos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCiclolectivos) {
				foreach ((array) $this->collCiclolectivos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collConceptos) {
				foreach ((array) $this->collConceptos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collEscalanotas) {
				foreach ((array) $this->collEscalanotas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collActividads) {
				foreach ((array) $this->collActividads as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCarreras) {
				foreach ((array) $this->collCarreras as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAnios) {
				foreach ((array) $this->collAnios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRelDocenteEstablecimientos) {
				foreach ((array) $this->collRelDocenteEstablecimientos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collHorarioescolars) {
				foreach ((array) $this->collHorarioescolars as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collUsuarios = null;
		$this->collRelEstablecimientoLocacions = null;
		$this->collAlumnos = null;
		$this->collCiclolectivos = null;
		$this->collConceptos = null;
		$this->collEscalanotas = null;
		$this->collActividads = null;
		$this->collCarreras = null;
		$this->collAnios = null;
		$this->collRelDocenteEstablecimientos = null;
		$this->collHorarioescolars = null;
			$this->aDistritoescolar = null;
			$this->aOrganizacion = null;
			$this->aNiveltipo = null;
			$this->aProvincia = null;
	}

} 