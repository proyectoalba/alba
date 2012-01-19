<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Distritoescolar filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseDistritoescolarFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'    => new sfWidgetFormFilterInput(),
      'direccion' => new sfWidgetFormFilterInput(),
      'telefono'  => new sfWidgetFormFilterInput(),
      'ciudad'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'    => new sfValidatorPass(array('required' => false)),
      'direccion' => new sfValidatorPass(array('required' => false)),
      'telefono'  => new sfValidatorPass(array('required' => false)),
      'ciudad'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('distritoescolar_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Distritoescolar';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'nombre'    => 'Text',
      'direccion' => 'Text',
      'telefono'  => 'Text',
      'ciudad'    => 'Text',
    );
  }
}
