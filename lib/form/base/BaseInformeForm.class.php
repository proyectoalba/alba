<?php

/**
 * Informe form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseInformeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'nombre'            => new sfWidgetFormInput(),
      'descripcion'       => new sfWidgetFormInput(),
      'fk_adjunto_id'     => new sfWidgetFormPropelChoice(array('model' => 'Adjunto', 'add_empty' => false)),
      'fk_tipoinforme_id' => new sfWidgetFormPropelChoice(array('model' => 'Tipoinforme', 'add_empty' => false)),
      'listado'           => new sfWidgetFormInputCheckbox(),
      'variables'         => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Informe', 'column' => 'id', 'required' => false)),
      'nombre'            => new sfValidatorString(array('max_length' => 128)),
      'descripcion'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fk_adjunto_id'     => new sfValidatorPropelChoice(array('model' => 'Adjunto', 'column' => 'id')),
      'fk_tipoinforme_id' => new sfValidatorPropelChoice(array('model' => 'Tipoinforme', 'column' => 'id')),
      'listado'           => new sfValidatorBoolean(),
      'variables'         => new sfValidatorString(array('max_length' => 128, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('informe[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Informe';
  }


}
