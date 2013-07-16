<?php

class PreguntaSecretaForm extends sfForm {

  public function configure() {
    $this->setWidgets(array(
        'uid' => new sfWidgetFormInputHidden(),
        'respuesta' => new sfWidgetFormInput(array(), array('size' => 50)),
    ));

    $this->setValidators(array(
        'uid' => new sfValidatorPropelChoice(array('model' => 'Usuario')),
        'respuesta' => new sfValidatorString(array('required' => true)),
    ));
    $this->widgetSchema->setNameFormat('pregunta[%s]');
    $this->getValidatorSchema()->setPostValidator(
            new sfValidatorCallback(array('callback' => array($this, 'postValidate'))
    ));
    if ($this->getOption('usuario')) {
      $this->setDefault('uid', $this->getOption('usuario')->getId());
    }
  }

  public function postValidate($validator, $values) {

    if ($values['uid'] == null ) {
      throw new sfValidatorError($validator, 'Usuario incorrecto.');
    }
    $c = new Criteria();
    $c->add(UsuarioPeer::ID, $values['uid']);
    $usuario = UsuarioPeer::doSelectOne($c);
    if ($usuario->getSeguridadRespuesta() == $values['respuesta']) {
      return $values;
    } else {
      // throw new sfValidatorError($validator, 'Repuesta Incorrecta');
      $error = new sfValidatorError($validator, 'Respuesta Incorrecta');
      throw new sfValidatorErrorSchema($validator, array('respuesta' => $error));
    }
  }

}

?>