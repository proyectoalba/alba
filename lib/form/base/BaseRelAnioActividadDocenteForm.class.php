<?php

/**
 * RelAnioActividadDocente form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseRelAnioActividadDocenteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_anio_actividad_id' => new sfWidgetFormInputHidden(),
      'fk_docente_id'        => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'fk_anio_actividad_id' => new sfValidatorPropelChoice(array('model' => 'RelAnioActividad', 'column' => 'id', 'required' => false)),
      'fk_docente_id'        => new sfValidatorPropelChoice(array('model' => 'Docente', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rel_anio_actividad_docente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelAnioActividadDocente';
  }


}
