<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Usuario filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseUsuarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario'               => new sfWidgetFormFilterInput(),
      'clave'                 => new sfWidgetFormFilterInput(),
      'correo_publico'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'activo'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fecha_creado'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_actualizado'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'seguridad_pregunta'    => new sfWidgetFormFilterInput(),
      'seguridad_respuesta'   => new sfWidgetFormFilterInput(),
      'email'                 => new sfWidgetFormFilterInput(),
      'fk_establecimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => true)),
      'borrado'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'usuario_rol_list'      => new sfWidgetFormPropelChoice(array('model' => 'Rol', 'add_empty' => true)),
      'usuario_permiso_list'  => new sfWidgetFormPropelChoice(array('model' => 'Permiso', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'usuario'               => new sfValidatorPass(array('required' => false)),
      'clave'                 => new sfValidatorPass(array('required' => false)),
      'correo_publico'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'activo'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fecha_creado'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fecha_actualizado'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'seguridad_pregunta'    => new sfValidatorPass(array('required' => false)),
      'seguridad_respuesta'   => new sfValidatorPass(array('required' => false)),
      'email'                 => new sfValidatorPass(array('required' => false)),
      'fk_establecimiento_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Establecimiento', 'column' => 'id')),
      'borrado'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'usuario_rol_list'      => new sfValidatorPropelChoice(array('model' => 'Rol', 'required' => false)),
      'usuario_permiso_list'  => new sfValidatorPropelChoice(array('model' => 'Permiso', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addUsuarioRolListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(UsuarioRolPeer::FK_USUARIO_ID, UsuarioPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(UsuarioRolPeer::FK_ROL_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(UsuarioRolPeer::FK_ROL_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addUsuarioPermisoListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(UsuarioPermisoPeer::FK_USUARIO_ID, UsuarioPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(UsuarioPermisoPeer::FK_PERMISO_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(UsuarioPermisoPeer::FK_PERMISO_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'usuario'               => 'Text',
      'clave'                 => 'Text',
      'correo_publico'        => 'Boolean',
      'activo'                => 'Boolean',
      'fecha_creado'          => 'Date',
      'fecha_actualizado'     => 'Date',
      'seguridad_pregunta'    => 'Text',
      'seguridad_respuesta'   => 'Text',
      'email'                 => 'Text',
      'fk_establecimiento_id' => 'ForeignKey',
      'borrado'               => 'Boolean',
      'usuario_rol_list'      => 'ManyKey',
      'usuario_permiso_list'  => 'ManyKey',
    );
  }
}
