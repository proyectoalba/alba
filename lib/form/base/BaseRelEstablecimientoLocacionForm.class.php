<?php

/**
 * RelEstablecimientoLocacion form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseRelEstablecimientoLocacionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'fk_establecimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => false)),
      'fk_locacion_id'        => new sfWidgetFormPropelChoice(array('model' => 'Locacion', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'RelEstablecimientoLocacion', 'column' => 'id', 'required' => false)),
      'fk_establecimiento_id' => new sfValidatorPropelChoice(array('model' => 'Establecimiento', 'column' => 'id')),
      'fk_locacion_id'        => new sfValidatorPropelChoice(array('model' => 'Locacion', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('rel_establecimiento_locacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelEstablecimientoLocacion';
  }


}
