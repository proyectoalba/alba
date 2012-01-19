<?php

/**
 * Permiso form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BasePermisoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'nombre'               => new sfWidgetFormInput(),
      'descripcion'          => new sfWidgetFormInput(),
      'usuario_permiso_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Usuario')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'Permiso', 'column' => 'id', 'required' => false)),
      'nombre'               => new sfValidatorString(array('max_length' => 128)),
      'descripcion'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'usuario_permiso_list' => new sfValidatorPropelChoiceMany(array('model' => 'Usuario', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('permiso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Permiso';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['usuario_permiso_list']))
    {
      $values = array();
      foreach ($this->object->getUsuarioPermisos() as $obj)
      {
        $values[] = $obj->getFkUsuarioId();
      }

      $this->setDefault('usuario_permiso_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveUsuarioPermisoList($con);
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
    $c->add(UsuarioPermisoPeer::FK_PERMISO_ID, $this->object->getPrimaryKey());
    UsuarioPermisoPeer::doDelete($c, $con);

    $values = $this->getValue('usuario_permiso_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new UsuarioPermiso();
        $obj->setFkPermisoId($this->object->getPrimaryKey());
        $obj->setFkUsuarioId($value);
        $obj->save();
      }
    }
  }

}
