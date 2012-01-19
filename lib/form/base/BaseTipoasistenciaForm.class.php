<?php

/**
 * Tipoasistencia form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseTipoasistenciaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'nombre'      => new sfWidgetFormInput(),
      'descripcion' => new sfWidgetFormInput(),
      'valor'       => new sfWidgetFormInput(),
      'grupo'       => new sfWidgetFormInput(),
      'defecto'     => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Tipoasistencia', 'column' => 'id', 'required' => false)),
      'nombre'      => new sfValidatorString(array('max_length' => 10)),
      'descripcion' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'valor'       => new sfValidatorNumber(),
      'grupo'       => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'defecto'     => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('tipoasistencia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tipoasistencia';
  }


}
