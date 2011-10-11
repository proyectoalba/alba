<?php

/**
 * Anio form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseAnioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'fk_establecimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => false)),
      'fk_carrera_id'         => new sfWidgetFormPropelChoice(array('model' => 'Carrera', 'add_empty' => false)),
      'descripcion'           => new sfWidgetFormInput(),
      'orden'                 => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Anio', 'column' => 'id', 'required' => false)),
      'fk_establecimiento_id' => new sfValidatorPropelChoice(array('model' => 'Establecimiento', 'column' => 'id')),
      'fk_carrera_id'         => new sfValidatorPropelChoice(array('model' => 'Carrera', 'column' => 'id')),
      'descripcion'           => new sfValidatorString(array('max_length' => 255)),
      'orden'                 => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('anio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Anio';
  }


}
