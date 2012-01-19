<?php

/**
 * Legajoadjunto form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseLegajoadjuntoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_legajopedagogico_id' => new sfWidgetFormPropelChoice(array('model' => 'Legajopedagogico', 'add_empty' => false)),
      'fk_adjunto_id'          => new sfWidgetFormPropelChoice(array('model' => 'Adjunto', 'add_empty' => false)),
      'id'                     => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'fk_legajopedagogico_id' => new sfValidatorPropelChoice(array('model' => 'Legajopedagogico', 'column' => 'id')),
      'fk_adjunto_id'          => new sfValidatorPropelChoice(array('model' => 'Adjunto', 'column' => 'id')),
      'id'                     => new sfValidatorPropelChoice(array('model' => 'Legajoadjunto', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('legajoadjunto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Legajoadjunto';
  }


}
