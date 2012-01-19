<?php

/**
 * RelAnioActividad form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseRelAnioActividadForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                              => new sfWidgetFormInputHidden(),
      'fk_anio_id'                      => new sfWidgetFormPropelChoice(array('model' => 'Anio', 'add_empty' => false)),
      'fk_actividad_id'                 => new sfWidgetFormPropelChoice(array('model' => 'Actividad', 'add_empty' => false)),
      'fk_orientacion_id'               => new sfWidgetFormPropelChoice(array('model' => 'Orientacion', 'add_empty' => true)),
      'horas'                           => new sfWidgetFormInput(),
      'rel_anio_actividad_docente_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Docente')),
    ));

    $this->setValidators(array(
      'id'                              => new sfValidatorPropelChoice(array('model' => 'RelAnioActividad', 'column' => 'id', 'required' => false)),
      'fk_anio_id'                      => new sfValidatorPropelChoice(array('model' => 'Anio', 'column' => 'id')),
      'fk_actividad_id'                 => new sfValidatorPropelChoice(array('model' => 'Actividad', 'column' => 'id')),
      'fk_orientacion_id'               => new sfValidatorPropelChoice(array('model' => 'Orientacion', 'column' => 'id', 'required' => false)),
      'horas'                           => new sfValidatorNumber(),
      'rel_anio_actividad_docente_list' => new sfValidatorPropelChoiceMany(array('model' => 'Docente', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rel_anio_actividad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelAnioActividad';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['rel_anio_actividad_docente_list']))
    {
      $values = array();
      foreach ($this->object->getRelAnioActividadDocentes() as $obj)
      {
        $values[] = $obj->getFkDocenteId();
      }

      $this->setDefault('rel_anio_actividad_docente_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveRelAnioActividadDocenteList($con);
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
    $c->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $this->object->getPrimaryKey());
    RelAnioActividadDocentePeer::doDelete($c, $con);

    $values = $this->getValue('rel_anio_actividad_docente_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new RelAnioActividadDocente();
        $obj->setFkAnioActividadId($this->object->getPrimaryKey());
        $obj->setFkDocenteId($value);
        $obj->save();
      }
    }
  }

}
