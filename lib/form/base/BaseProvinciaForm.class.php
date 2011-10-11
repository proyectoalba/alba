<?php

/**
 * Provincia form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseProvinciaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'nombre_corto' => new sfWidgetFormInput(),
      'nombre_largo' => new sfWidgetFormInput(),
      'fk_pais_id'   => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => false)),
      'orden'        => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Provincia', 'column' => 'id', 'required' => false)),
      'nombre_corto' => new sfValidatorString(array('max_length' => 32)),
      'nombre_largo' => new sfValidatorString(array('max_length' => 128)),
      'fk_pais_id'   => new sfValidatorPropelChoice(array('model' => 'Pais', 'column' => 'id')),
      'orden'        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('provincia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Provincia';
  }


}
