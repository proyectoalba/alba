<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Rol filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseRolFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'           => new sfWidgetFormFilterInput(),
      'descripcion'      => new sfWidgetFormFilterInput(),
      'activo'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'usuario_rol_list' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'           => new sfValidatorPass(array('required' => false)),
      'descripcion'      => new sfValidatorPass(array('required' => false)),
      'activo'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'usuario_rol_list' => new sfValidatorPropelChoice(array('model' => 'Usuario', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rol_filters[%s]');

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

    $criteria->addJoin(UsuarioRolPeer::FK_ROL_ID, RolPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(UsuarioRolPeer::FK_USUARIO_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(UsuarioRolPeer::FK_USUARIO_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Rol';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'nombre'           => 'Text',
      'descripcion'      => 'Text',
      'activo'           => 'Boolean',
      'usuario_rol_list' => 'ManyKey',
    );
  }
}
