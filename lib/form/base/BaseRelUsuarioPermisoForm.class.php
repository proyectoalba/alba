<?php

/**
 * RelUsuarioPermiso form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseRelUsuarioPermisoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'fk_usuario_id' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => false)),
      'fk_permiso_id' => new sfWidgetFormPropelChoice(array('model' => 'Permiso', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'RelUsuarioPermiso', 'column' => 'id', 'required' => false)),
      'fk_usuario_id' => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id')),
      'fk_permiso_id' => new sfValidatorPropelChoice(array('model' => 'Permiso', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('rel_usuario_permiso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelUsuarioPermiso';
  }


}
