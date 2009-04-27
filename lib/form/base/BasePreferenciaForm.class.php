<?php

/**
 * Preferencia form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BasePreferenciaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'nombre'            => new sfWidgetFormInput(),
      'valor_por_defecto' => new sfWidgetFormInput(),
      'activo'            => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Preferencia', 'column' => 'id', 'required' => false)),
      'nombre'            => new sfValidatorString(array('max_length' => 128)),
      'valor_por_defecto' => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'activo'            => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('preferencia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Preferencia';
  }


}
