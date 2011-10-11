<?php

/**
 * Ciclolectivo form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseCiclolectivoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'fk_establecimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => false)),
      'fecha_inicio'          => new sfWidgetFormDateTime(),
      'fecha_fin'             => new sfWidgetFormDateTime(),
      'descripcion'           => new sfWidgetFormInput(),
      'actual'                => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Ciclolectivo', 'column' => 'id', 'required' => false)),
      'fk_establecimiento_id' => new sfValidatorPropelChoice(array('model' => 'Establecimiento', 'column' => 'id')),
      'fecha_inicio'          => new sfValidatorDateTime(),
      'fecha_fin'             => new sfValidatorDateTime(),
      'descripcion'           => new sfValidatorString(array('max_length' => 255)),
      'actual'                => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('ciclolectivo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ciclolectivo';
  }


}
