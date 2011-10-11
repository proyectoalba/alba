<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Legajoadjunto filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseLegajoadjuntoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_legajopedagogico_id' => new sfWidgetFormPropelChoice(array('model' => 'Legajopedagogico', 'add_empty' => true)),
      'fk_adjunto_id'          => new sfWidgetFormPropelChoice(array('model' => 'Adjunto', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'fk_legajopedagogico_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Legajopedagogico', 'column' => 'id')),
      'fk_adjunto_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Adjunto', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('legajoadjunto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Legajoadjunto';
  }

  public function getFields()
  {
    return array(
      'fk_legajopedagogico_id' => 'ForeignKey',
      'fk_adjunto_id'          => 'ForeignKey',
      'id'                     => 'Number',
    );
  }
}
