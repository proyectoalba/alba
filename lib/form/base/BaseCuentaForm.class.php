<?php

/**
 * Cuenta form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseCuentaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'nombre'          => new sfWidgetFormInput(),
      'razon_social'    => new sfWidgetFormInput(),
      'cuit'            => new sfWidgetFormInput(),
      'direccion'       => new sfWidgetFormInput(),
      'ciudad'          => new sfWidgetFormInput(),
      'codigo_postal'   => new sfWidgetFormInput(),
      'telefono'        => new sfWidgetFormInput(),
      'fk_provincia_id' => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => true)),
      'fk_tipoiva_id'   => new sfWidgetFormPropelChoice(array('model' => 'Tipoiva', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'Cuenta', 'column' => 'id', 'required' => false)),
      'nombre'          => new sfValidatorString(array('max_length' => 128)),
      'razon_social'    => new sfValidatorString(array('max_length' => 128)),
      'cuit'            => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'direccion'       => new sfValidatorString(array('max_length' => 128)),
      'ciudad'          => new sfValidatorString(array('max_length' => 128)),
      'codigo_postal'   => new sfValidatorString(array('max_length' => 20)),
      'telefono'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'fk_provincia_id' => new sfValidatorPropelChoice(array('model' => 'Provincia', 'column' => 'id', 'required' => false)),
      'fk_tipoiva_id'   => new sfValidatorPropelChoice(array('model' => 'Tipoiva', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('cuenta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cuenta';
  }


}
