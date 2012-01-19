<?php

/**
 * Docente form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseDocenteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                              => new sfWidgetFormInputHidden(),
      'apellido'                        => new sfWidgetFormInput(),
      'apellido_materno'                => new sfWidgetFormInput(),
      'nombre'                          => new sfWidgetFormInput(),
      'estado_civil'                    => new sfWidgetFormInput(),
      'sexo'                            => new sfWidgetFormInput(),
      'fecha_nacimiento'                => new sfWidgetFormDateTime(),
      'fk_tipodocumento_id'             => new sfWidgetFormPropelChoice(array('model' => 'Tipodocumento', 'add_empty' => false)),
      'nro_documento'                   => new sfWidgetFormInput(),
      'lugar_nacimiento'                => new sfWidgetFormInput(),
      'direccion'                       => new sfWidgetFormInput(),
      'ciudad'                          => new sfWidgetFormInput(),
      'codigo_postal'                   => new sfWidgetFormInput(),
      'email'                           => new sfWidgetFormInput(),
      'telefono'                        => new sfWidgetFormInput(),
      'telefono_movil'                  => new sfWidgetFormInput(),
      'titulo'                          => new sfWidgetFormInput(),
      'libreta_sanitaria'               => new sfWidgetFormInputCheckbox(),
      'psicofisico'                     => new sfWidgetFormInputCheckbox(),
      'observacion'                     => new sfWidgetFormInput(),
      'activo'                          => new sfWidgetFormInputCheckbox(),
      'fk_provincia_id'                 => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => false)),
      'fk_pais_id'                      => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => false)),
      'docente_horario_list'            => new sfWidgetFormPropelChoiceMany(array('model' => 'Evento')),
      'rel_anio_actividad_docente_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'RelAnioActividad')),
    ));

    $this->setValidators(array(
      'id'                              => new sfValidatorPropelChoice(array('model' => 'Docente', 'column' => 'id', 'required' => false)),
      'apellido'                        => new sfValidatorString(array('max_length' => 128)),
      'apellido_materno'                => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'nombre'                          => new sfValidatorString(array('max_length' => 128)),
      'estado_civil'                    => new sfValidatorString(array('max_length' => 1)),
      'sexo'                            => new sfValidatorString(array('max_length' => 1)),
      'fecha_nacimiento'                => new sfValidatorDateTime(),
      'fk_tipodocumento_id'             => new sfValidatorPropelChoice(array('model' => 'Tipodocumento', 'column' => 'id')),
      'nro_documento'                   => new sfValidatorString(array('max_length' => 16)),
      'lugar_nacimiento'                => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'direccion'                       => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'ciudad'                          => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'codigo_postal'                   => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'email'                           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono'                        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'telefono_movil'                  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'titulo'                          => new sfValidatorString(array('max_length' => 128)),
      'libreta_sanitaria'               => new sfValidatorBoolean(array('required' => false)),
      'psicofisico'                     => new sfValidatorBoolean(array('required' => false)),
      'observacion'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'activo'                          => new sfValidatorBoolean(array('required' => false)),
      'fk_provincia_id'                 => new sfValidatorPropelChoice(array('model' => 'Provincia', 'column' => 'id')),
      'fk_pais_id'                      => new sfValidatorPropelChoice(array('model' => 'Pais', 'column' => 'id')),
      'docente_horario_list'            => new sfValidatorPropelChoiceMany(array('model' => 'Evento', 'required' => false)),
      'rel_anio_actividad_docente_list' => new sfValidatorPropelChoiceMany(array('model' => 'RelAnioActividad', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('docente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Docente';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['docente_horario_list']))
    {
      $values = array();
      foreach ($this->object->getDocenteHorarios() as $obj)
      {
        $values[] = $obj->getFkEventoId();
      }

      $this->setDefault('docente_horario_list', $values);
    }

    if (isset($this->widgetSchema['rel_anio_actividad_docente_list']))
    {
      $values = array();
      foreach ($this->object->getRelAnioActividadDocentes() as $obj)
      {
        $values[] = $obj->getFkAnioActividadId();
      }

      $this->setDefault('rel_anio_actividad_docente_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveDocenteHorarioList($con);
    $this->saveRelAnioActividadDocenteList($con);
  }

  public function saveDocenteHorarioList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['docente_horario_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->object->getPrimaryKey());
    DocenteHorarioPeer::doDelete($c, $con);

    $values = $this->getValue('docente_horario_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new DocenteHorario();
        $obj->setFkDocenteId($this->object->getPrimaryKey());
        $obj->setFkEventoId($value);
        $obj->save();
      }
    }
  }

  public function saveRelAnioActividadDocenteList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['rel_anio_actividad_docente_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $this->object->getPrimaryKey());
    RelAnioActividadDocentePeer::doDelete($c, $con);

    $values = $this->getValue('rel_anio_actividad_docente_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new RelAnioActividadDocente();
        $obj->setFkDocenteId($this->object->getPrimaryKey());
        $obj->setFkAnioActividadId($value);
        $obj->save();
      }
    }
  }

}
