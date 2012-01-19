<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Permiso filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BasePermisoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'               => new sfWidgetFormFilterInput(),
      'descripcion'          => new sfWidgetFormFilterInput(),
      'usuario_permiso_list' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'               => new sfValidatorPass(array('required' => false)),
      'descripcion'          => new sfValidatorPass(array('required' => false)),
      'usuario_permiso_list' => new sfValidatorPropelChoice(array('model' => 'Usuario', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('permiso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
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

    $criteria->addJoin(UsuarioPermisoPeer::FK_PERMISO_ID, PermisoPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(UsuarioPermisoPeer::FK_USUARIO_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(UsuarioPermisoPeer::FK_USUARIO_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Permiso';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'nombre'               => 'Text',
      'descripcion'          => 'Text',
      'usuario_permiso_list' => 'ManyKey',
    );
  }
}
