<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Locacion filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseLocacionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'             => new sfWidgetFormFilterInput(),
      'descripcion'        => new sfWidgetFormFilterInput(),
      'direccion'          => new sfWidgetFormFilterInput(),
      'ciudad'             => new sfWidgetFormFilterInput(),
      'codigo_postal'      => new sfWidgetFormFilterInput(),
      'fk_provincia_id'    => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => true)),
      'fk_tipolocacion_id' => new sfWidgetFormPropelChoice(array('model' => 'Tipolocacion', 'add_empty' => true)),
      'telefono'           => new sfWidgetFormFilterInput(),
      'fax'                => new sfWidgetFormFilterInput(),
      'encargado'          => new sfWidgetFormFilterInput(),
      'encargado_telefono' => new sfWidgetFormFilterInput(),
      'principal'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'nombre'             => new sfValidatorPass(array('required' => false)),
      'descripcion'        => new sfValidatorPass(array('required' => false)),
      'direccion'          => new sfValidatorPass(array('required' => false)),
      'ciudad'             => new sfValidatorPass(array('required' => false)),
      'codigo_postal'      => new sfValidatorPass(array('required' => false)),
      'fk_provincia_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Provincia', 'column' => 'id')),
      'fk_tipolocacion_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tipolocacion', 'column' => 'id')),
      'telefono'           => new sfValidatorPass(array('required' => false)),
      'fax'                => new sfValidatorPass(array('required' => false)),
      'encargado'          => new sfValidatorPass(array('required' => false)),
      'encargado_telefono' => new sfValidatorPass(array('required' => false)),
      'principal'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('locacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Locacion';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'nombre'             => 'Text',
      'descripcion'        => 'Text',
      'direccion'          => 'Text',
      'ciudad'             => 'Text',
      'codigo_postal'      => 'Text',
      'fk_provincia_id'    => 'ForeignKey',
      'fk_tipolocacion_id' => 'ForeignKey',
      'telefono'           => 'Text',
      'fax'                => 'Text',
      'encargado'          => 'Text',
      'encargado_telefono' => 'Text',
      'principal'          => 'Boolean',
    );
  }
}
