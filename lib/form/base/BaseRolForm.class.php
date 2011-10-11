<?php

/**
 * Rol form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseRolForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'nombre'           => new sfWidgetFormInput(),
      'descripcion'      => new sfWidgetFormInput(),
      'activo'           => new sfWidgetFormInputCheckbox(),
      'usuario_rol_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Usuario')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'Rol', 'column' => 'id', 'required' => false)),
      'nombre'           => new sfValidatorString(array('max_length' => 128)),
      'descripcion'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'activo'           => new sfValidatorBoolean(),
      'usuario_rol_list' => new sfValidatorPropelChoiceMany(array('model' => 'Usuario', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rol[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Rol';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['usuario_rol_list']))
    {
      $values = array();
      foreach ($this->object->getUsuarioRols() as $obj)
      {
        $values[] = $obj->getFkUsuarioId();
      }

      $this->setDefault('usuario_rol_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveUsuarioRolList($con);
  }

  public function saveUsuarioRolList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['usuario_rol_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(UsuarioRolPeer::FK_ROL_ID, $this->object->getPrimaryKey());
    UsuarioRolPeer::doDelete($c, $con);

    $values = $this->getValue('usuario_rol_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new UsuarioRol();
        $obj->setFkRolId($this->object->getPrimaryKey());
        $obj->setFkUsuarioId($value);
        $obj->save();
      }
    }
  }

}
