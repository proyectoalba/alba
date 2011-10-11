<?php

/**
 * Evento form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseEventoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'titulo'               => new sfWidgetFormInput(),
      'fecha_inicio'         => new sfWidgetFormDateTime(),
      'fecha_fin'            => new sfWidgetFormDateTime(),
      'tipo'                 => new sfWidgetFormInput(),
      'frecuencia'           => new sfWidgetFormInput(),
      'frecuencia_intervalo' => new sfWidgetFormInput(),
      'recurrencia_fin'      => new sfWidgetFormInput(),
      'recurrencia_dias'     => new sfWidgetFormInput(),
      'estado'               => new sfWidgetFormInput(),
      'docente_horario_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Docente')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'Evento', 'column' => 'id', 'required' => false)),
      'titulo'               => new sfValidatorString(array('max_length' => 128)),
      'fecha_inicio'         => new sfValidatorDateTime(),
      'fecha_fin'            => new sfValidatorDateTime(),
      'tipo'                 => new sfValidatorInteger(),
      'frecuencia'           => new sfValidatorInteger(),
      'frecuencia_intervalo' => new sfValidatorInteger(),
      'recurrencia_fin'      => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'recurrencia_dias'     => new sfValidatorInteger(),
      'estado'               => new sfValidatorInteger(),
      'docente_horario_list' => new sfValidatorPropelChoiceMany(array('model' => 'Docente', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('evento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Evento';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['docente_horario_list']))
    {
      $values = array();
      foreach ($this->object->getDocenteHorarios() as $obj)
      {
        $values[] = $obj->getFkDocenteId();
      }

      $this->setDefault('docente_horario_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveDocenteHorarioList($con);
  }

  public function saveDocenteHorarioList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['docente_horario_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(DocenteHorarioPeer::FK_EVENTO_ID, $this->object->getPrimaryKey());
    DocenteHorarioPeer::doDelete($c, $con);

    $values = $this->getValue('docente_horario_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new DocenteHorario();
        $obj->setFkEventoId($this->object->getPrimaryKey());
        $obj->setFkDocenteId($value);
        $obj->save();
      }
    }
  }

}
