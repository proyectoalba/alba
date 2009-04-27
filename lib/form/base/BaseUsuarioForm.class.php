<?php

/**
 * Usuario form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseUsuarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'usuario'               => new sfWidgetFormInput(),
      'clave'                 => new sfWidgetFormInput(),
      'correo_publico'        => new sfWidgetFormInputCheckbox(),
      'activo'                => new sfWidgetFormInputCheckbox(),
      'fecha_creado'          => new sfWidgetFormDateTime(),
      'fecha_actualizado'     => new sfWidgetFormDateTime(),
      'seguridad_pregunta'    => new sfWidgetFormInput(),
      'seguridad_respuesta'   => new sfWidgetFormInput(),
      'email'                 => new sfWidgetFormInput(),
      'fk_establecimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => false)),
      'borrado'               => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'usuario'               => new sfValidatorString(array('max_length' => 32)),
      'clave'                 => new sfValidatorString(array('max_length' => 48)),
      'correo_publico'        => new sfValidatorBoolean(array('required' => false)),
      'activo'                => new sfValidatorBoolean(),
      'fecha_creado'          => new sfValidatorDateTime(),
      'fecha_actualizado'     => new sfValidatorDateTime(),
      'seguridad_pregunta'    => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'seguridad_respuesta'   => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'email'                 => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'fk_establecimiento_id' => new sfValidatorPropelChoice(array('model' => 'Establecimiento', 'column' => 'id')),
      'borrado'               => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }


}
