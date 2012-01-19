<?php

/**
 * Periodo form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BasePeriodoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'fk_ciclolectivo_id' => new sfWidgetFormPropelChoice(array('model' => 'Ciclolectivo', 'add_empty' => false)),
      'fecha_inicio'       => new sfWidgetFormDateTime(),
      'fecha_fin'          => new sfWidgetFormDateTime(),
      'descripcion'        => new sfWidgetFormInput(),
      'calcular'           => new sfWidgetFormInputCheckbox(),
      'formula'            => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'Periodo', 'column' => 'id', 'required' => false)),
      'fk_ciclolectivo_id' => new sfValidatorPropelChoice(array('model' => 'Ciclolectivo', 'column' => 'id')),
      'fecha_inicio'       => new sfValidatorDateTime(),
      'fecha_fin'          => new sfValidatorDateTime(),
      'descripcion'        => new sfValidatorString(array('max_length' => 255)),
      'calcular'           => new sfValidatorBoolean(),
      'formula'            => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('periodo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Periodo';
  }


}
