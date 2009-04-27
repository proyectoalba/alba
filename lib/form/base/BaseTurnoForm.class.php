<?php

/**
 * Turno form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseTurnoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'fk_ciclolectivo_id' => new sfWidgetFormPropelChoice(array('model' => 'Ciclolectivo', 'add_empty' => false)),
      'hora_inicio'        => new sfWidgetFormTime(),
      'hora_fin'           => new sfWidgetFormTime(),
      'descripcion'        => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'Turno', 'column' => 'id', 'required' => false)),
      'fk_ciclolectivo_id' => new sfValidatorPropelChoice(array('model' => 'Ciclolectivo', 'column' => 'id')),
      'hora_inicio'        => new sfValidatorTime(),
      'hora_fin'           => new sfValidatorTime(),
      'descripcion'        => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('turno[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Turno';
  }


}
