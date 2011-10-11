<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Cuenta filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseCuentaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'          => new sfWidgetFormFilterInput(),
      'razon_social'    => new sfWidgetFormFilterInput(),
      'cuit'            => new sfWidgetFormFilterInput(),
      'direccion'       => new sfWidgetFormFilterInput(),
      'ciudad'          => new sfWidgetFormFilterInput(),
      'codigo_postal'   => new sfWidgetFormFilterInput(),
      'telefono'        => new sfWidgetFormFilterInput(),
      'fk_provincia_id' => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => true)),
      'fk_tipoiva_id'   => new sfWidgetFormPropelChoice(array('model' => 'Tipoiva', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'          => new sfValidatorPass(array('required' => false)),
      'razon_social'    => new sfValidatorPass(array('required' => false)),
      'cuit'            => new sfValidatorPass(array('required' => false)),
      'direccion'       => new sfValidatorPass(array('required' => false)),
      'ciudad'          => new sfValidatorPass(array('required' => false)),
      'codigo_postal'   => new sfValidatorPass(array('required' => false)),
      'telefono'        => new sfValidatorPass(array('required' => false)),
      'fk_provincia_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Provincia', 'column' => 'id')),
      'fk_tipoiva_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tipoiva', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('cuenta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cuenta';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'nombre'          => 'Text',
      'razon_social'    => 'Text',
      'cuit'            => 'Text',
      'direccion'       => 'Text',
      'ciudad'          => 'Text',
      'codigo_postal'   => 'Text',
      'telefono'        => 'Text',
      'fk_provincia_id' => 'ForeignKey',
      'fk_tipoiva_id'   => 'ForeignKey',
    );
  }
}
