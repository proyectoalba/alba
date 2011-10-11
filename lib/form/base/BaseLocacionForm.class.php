<?php

/**
 * Locacion form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseLocacionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'nombre'             => new sfWidgetFormInput(),
      'descripcion'        => new sfWidgetFormInput(),
      'direccion'          => new sfWidgetFormInput(),
      'ciudad'             => new sfWidgetFormInput(),
      'codigo_postal'      => new sfWidgetFormInput(),
      'fk_provincia_id'    => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => false)),
      'fk_tipolocacion_id' => new sfWidgetFormPropelChoice(array('model' => 'Tipolocacion', 'add_empty' => false)),
      'telefono'           => new sfWidgetFormInput(),
      'fax'                => new sfWidgetFormInput(),
      'encargado'          => new sfWidgetFormInput(),
      'encargado_telefono' => new sfWidgetFormInput(),
      'principal'          => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'Locacion', 'column' => 'id', 'required' => false)),
      'nombre'             => new sfValidatorString(array('max_length' => 128)),
      'descripcion'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'direccion'          => new sfValidatorString(array('max_length' => 128)),
      'ciudad'             => new sfValidatorString(array('max_length' => 128)),
      'codigo_postal'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'fk_provincia_id'    => new sfValidatorPropelChoice(array('model' => 'Provincia', 'column' => 'id')),
      'fk_tipolocacion_id' => new sfValidatorPropelChoice(array('model' => 'Tipolocacion', 'column' => 'id')),
      'telefono'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'fax'                => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'encargado'          => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'encargado_telefono' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'principal'          => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('locacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Locacion';
  }


}
