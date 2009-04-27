<?php

/**
 * Establecimiento form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseEstablecimientoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'nombre'                => new sfWidgetFormInput(),
      'descripcion'           => new sfWidgetFormInput(),
      'fk_distritoescolar_id' => new sfWidgetFormPropelChoice(array('model' => 'Distritoescolar', 'add_empty' => false)),
      'fk_organizacion_id'    => new sfWidgetFormPropelChoice(array('model' => 'Organizacion', 'add_empty' => false)),
      'fk_niveltipo_id'       => new sfWidgetFormPropelChoice(array('model' => 'Niveltipo', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Establecimiento', 'column' => 'id', 'required' => false)),
      'nombre'                => new sfValidatorString(array('max_length' => 128)),
      'descripcion'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fk_distritoescolar_id' => new sfValidatorPropelChoice(array('model' => 'Distritoescolar', 'column' => 'id')),
      'fk_organizacion_id'    => new sfValidatorPropelChoice(array('model' => 'Organizacion', 'column' => 'id')),
      'fk_niveltipo_id'       => new sfValidatorPropelChoice(array('model' => 'Niveltipo', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('establecimiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Establecimiento';
  }


}
