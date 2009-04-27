<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Establecimiento filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseEstablecimientoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'                => new sfWidgetFormFilterInput(),
      'descripcion'           => new sfWidgetFormFilterInput(),
      'fk_distritoescolar_id' => new sfWidgetFormPropelChoice(array('model' => 'Distritoescolar', 'add_empty' => true)),
      'fk_organizacion_id'    => new sfWidgetFormPropelChoice(array('model' => 'Organizacion', 'add_empty' => true)),
      'fk_niveltipo_id'       => new sfWidgetFormPropelChoice(array('model' => 'Niveltipo', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'                => new sfValidatorPass(array('required' => false)),
      'descripcion'           => new sfValidatorPass(array('required' => false)),
      'fk_distritoescolar_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Distritoescolar', 'column' => 'id')),
      'fk_organizacion_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Organizacion', 'column' => 'id')),
      'fk_niveltipo_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Niveltipo', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('establecimiento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Establecimiento';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'nombre'                => 'Text',
      'descripcion'           => 'Text',
      'fk_distritoescolar_id' => 'ForeignKey',
      'fk_organizacion_id'    => 'ForeignKey',
      'fk_niveltipo_id'       => 'ForeignKey',
    );
  }
}
