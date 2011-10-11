<?php

/**
 * Carrera form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseCarreraForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'fk_establecimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => false)),
      'descripcion'           => new sfWidgetFormInput(),
      'orden'                 => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Carrera', 'column' => 'id', 'required' => false)),
      'fk_establecimiento_id' => new sfValidatorPropelChoice(array('model' => 'Establecimiento', 'column' => 'id')),
      'descripcion'           => new sfValidatorString(array('max_length' => 255)),
      'orden'                 => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('carrera[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Carrera';
  }


}
