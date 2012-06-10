<?php

/**
 * Usuario form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
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
      'usuario_rol_list'      => new sfWidgetFormPropelChoiceMany(array('model' => 'Rol')),
      'usuario_permiso_list'  => new sfWidgetFormPropelChoiceMany(array('model' => 'Permiso')),
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
      'usuario_rol_list'      => new sfValidatorPropelChoiceMany(array('model' => 'Rol', 'required' => false)),
      'usuario_permiso_list'  => new sfValidatorPropelChoiceMany(array('model' => 'Permiso', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['usuario_rol_list']))
    {
      $values = array();
      foreach ($this->object->getUsuarioRols() as $obj)
      {
        $values[] = $obj->getFkRolId();
      }

      $this->setDefault('usuario_rol_list', $values);
    }

    if (isset($this->widgetSchema['usuario_permiso_list']))
    {
      $values = array();
      foreach ($this->object->getUsuarioPermisos() as $obj)
      {
        $values[] = $obj->getFkPermisoId();
      }

      $this->setDefault('usuario_permiso_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveUsuarioRolList($con);
    $this->saveUsuarioPermisoList($con);
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
    $c->add(UsuarioRolPeer::FK_USUARIO_ID, $this->object->getPrimaryKey());
    UsuarioRolPeer::doDelete($c, $con);

    $values = $this->getValue('usuario_rol_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new UsuarioRol();
        $obj->setFkUsuarioId($this->object->getPrimaryKey());
        $obj->setFkRolId($value);
        $obj->save();
      }
    }
  }

  public function saveUsuarioPermisoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['usuario_permiso_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(UsuarioPermisoPeer::FK_USUARIO_ID, $this->object->getPrimaryKey());
    UsuarioPermisoPeer::doDelete($c, $con);

    $values = $this->getValue('usuario_permiso_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new UsuarioPermiso();
        $obj->setFkUsuarioId($this->object->getPrimaryKey());
        $obj->setFkPermisoId($value);
        $obj->save();
      }
    }
  }

}
