<?php

/**
 * RelUsuarioPreferencia form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseRelUsuarioPreferenciaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'fk_usuario_id'     => new sfWidgetFormInput(),
      'fk_preferencia_id' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'RelUsuarioPreferencia', 'column' => 'id', 'required' => false)),
      'fk_usuario_id'     => new sfValidatorInteger(),
      'fk_preferencia_id' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('rel_usuario_preferencia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelUsuarioPreferencia';
  }


}
