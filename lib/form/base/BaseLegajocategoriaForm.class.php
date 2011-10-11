<?php

/**
 * Legajocategoria form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseLegajocategoriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Legajocategoria', 'column' => 'id', 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('legajocategoria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Legajocategoria';
  }


}
