<?php

/**
 * Permiso form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BasePermisoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'nombre'       => new sfWidgetFormInput(),
      'descripcion'  => new sfWidgetFormInput(),
      'fk_modulo_id' => new sfWidgetFormPropelChoice(array('model' => 'Modulo', 'add_empty' => false)),
      'credencial'   => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Permiso', 'column' => 'id', 'required' => false)),
      'nombre'       => new sfValidatorString(array('max_length' => 128)),
      'descripcion'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fk_modulo_id' => new sfValidatorPropelChoice(array('model' => 'Modulo', 'column' => 'id')),
      'credencial'   => new sfValidatorString(array('max_length' => 32, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('permiso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Permiso';
  }


}
