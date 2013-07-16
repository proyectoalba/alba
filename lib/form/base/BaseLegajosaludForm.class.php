<?php

/**
 * Legajosalud form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseLegajosaludForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'fk_alumno_id'  => new sfWidgetFormPropelChoice(array('model' => 'Alumno', 'add_empty' => false)),
      'titulo'        => new sfWidgetFormInput(),
      'descripcion'   => new sfWidgetFormTextarea(),
      'fecha'         => new sfWidgetFormDateTime(),
      'fk_usuario_id' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'Legajosalud', 'column' => 'id', 'required' => false)),
      'fk_alumno_id'  => new sfValidatorPropelChoice(array('model' => 'Alumno', 'column' => 'id')),
      'titulo'        => new sfValidatorString(array('max_length' => 255)),
      'descripcion'   => new sfValidatorString(),
      'fecha'         => new sfValidatorDateTime(),
      'fk_usuario_id' => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('legajosalud[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Legajosalud';
  }


}
