<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RelEstablecimientoLocacion filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseRelEstablecimientoLocacionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_establecimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => true)),
      'fk_locacion_id'        => new sfWidgetFormPropelChoice(array('model' => 'Locacion', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'fk_establecimiento_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Establecimiento', 'column' => 'id')),
      'fk_locacion_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Locacion', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('rel_establecimiento_locacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelEstablecimientoLocacion';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'fk_establecimiento_id' => 'ForeignKey',
      'fk_locacion_id'        => 'ForeignKey',
    );
  }
}
