<?php

/**
 * Organizacion form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseOrganizacionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'nombre'          => new sfWidgetFormInput(),
      'descripcion'     => new sfWidgetFormInput(),
      'razon_social'    => new sfWidgetFormInput(),
      'cuit'            => new sfWidgetFormInput(),
      'direccion'       => new sfWidgetFormInput(),
      'ciudad'          => new sfWidgetFormInput(),
      'codigo_postal'   => new sfWidgetFormInput(),
      'telefono'        => new sfWidgetFormInput(),
      'fk_provincia_id' => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => false)),
      'fk_tipoiva_id'   => new sfWidgetFormPropelChoice(array('model' => 'Tipoiva', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'Organizacion', 'column' => 'id', 'required' => false)),
      'nombre'          => new sfValidatorString(array('max_length' => 128)),
      'descripcion'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'razon_social'    => new sfValidatorString(array('max_length' => 128)),
      'cuit'            => new sfValidatorString(array('max_length' => 20)),
      'direccion'       => new sfValidatorString(array('max_length' => 128)),
      'ciudad'          => new sfValidatorString(array('max_length' => 128)),
      'codigo_postal'   => new sfValidatorString(array('max_length' => 20)),
      'telefono'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'fk_provincia_id' => new sfValidatorPropelChoice(array('model' => 'Provincia', 'column' => 'id')),
      'fk_tipoiva_id'   => new sfValidatorPropelChoice(array('model' => 'Tipoiva', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('organizacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Organizacion';
  }


}
