<?php

/**
 * Escalanota form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseEscalanotaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'fk_establecimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => false)),
      'nombre'                => new sfWidgetFormInput(),
      'descripcion'           => new sfWidgetFormInput(),
      'orden'                 => new sfWidgetFormInput(),
      'aprobado'              => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Escalanota', 'column' => 'id', 'required' => false)),
      'fk_establecimiento_id' => new sfValidatorPropelChoice(array('model' => 'Establecimiento', 'column' => 'id')),
      'nombre'                => new sfValidatorString(array('max_length' => 128)),
      'descripcion'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'orden'                 => new sfValidatorInteger(),
      'aprobado'              => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('escalanota[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Escalanota';
  }


}
