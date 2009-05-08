<?php
/**
 *    This file is part of Alba.
 *
 *    Alba is free software; you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation; either version 2 of the License, or
 *    (at your option) any later version.
 *
 *    Alba is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with Alba; if not, write to the Free Software
 *    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */


/**
 * Seguridad Acciones
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class seguridadActions extends sfActions
{

    public function executeLogin() {
        $this->error_inicio_sesion = false;

         $login = $this->getRequestParameter('login');
         $password = $this->getRequestParameter('password');

        if (isset($login)){

            $c = new Criteria();
            $c->add(UsuarioPeer::USUARIO, $login);
            $c->add(UsuarioPeer::BORRADO, false);
            $user = UsuarioPeer::doSelectOne($c);
            if ($user){
                // password OK?
                if (md5($password) == $user->getClave()) {
                    $this->getUser()->setAuthenticated(true);

                    // agrego atributos del usuario
                    $this->getUser()->setAttribute('id',$user->getId());
                    $this->getUser()->setAttribute('email', $user->getEmail());
                    $this->getUser()->setAttribute('fk_establecimiento_id',$user->getFkEstablecimientoId());
                    $this->getUser()->setAttribute('establecimiento_nombre',$user->getEstablecimiento()->getNombre());
                    $this->getUser()->setAttribute('fk_organizacion_id',$user->getEstablecimiento()->getFkOrganizacionId());
                    $this->getUser()->setAttribute('organizacion_nombre',$user->getEstablecimiento()->getOrganizacion()->getNombre());

                    $this->getUser()->setTheme('moderno');

                    //obtengo el ciclo lectivo actual del establecimiento
                    $c = new Criteria();
                    $c->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID,$user->getFkEstablecimientoId());
                    $c->add(CiclolectivoPeer::ACTUAL,1);
                    $ciclo_actual = CiclolectivoPeer::doSelectOne($c);
                    if ($ciclo_actual) {
                        $this->getUser()->setAttribute('fk_ciclolectivo_id',$ciclo_actual->getId());
                        $this->getUser()->setAttribute('ciclolectivo_descripcion',$ciclo_actual->getDescripcion());
                    }
                    else {
                        $this->getUser()->setAttribute('fk_ciclolectivo_id',0);
                        $this->getUser()->setAttribute('ciclolectivo_descripcion','No Seleccionado');
                    }


                    $this->getUser()->setAttribute('usuario',$user->getUsuario());
                    $this->getUser()->setCulture('es_AR');

                    //cargo las credenciales del usuario ylos roles
                    $this->getUser()->cargarCredenciales($user->getId());

                    $this->logMessage('Login ok','debug');
                    return $this->redirect($this->getRequestParameter('referer', '@homepage'));
                }
                else {
                    $this->error_inicio_sesion = true;
                    return sfView::SUCCESS;
                }

            }
            else {
                $this->logMessage('Login Error','debug');
                $this->error_inicio_sesion = true;
                return sfView::SUCCESS;
            }
        }
        else {
            $this->referer =  $this->getRequest()->getReferer();
            $this->getRequest()->getParameterHolder()->set('referer', $this->getRequest()->getReferer());
        }
    }

    /* cierre de session */
    public function executeLogout() {
        $this->logMessage("Logout", 'debug');
        $this->getUser()->clearCredentials();
        $this->getUser()->setAuthenticated(false);
        $this->redirect('default/index');
    }
    /* pagina de ingreso del usuario */
    public function executeEnviarclave() {


    }
    public function executeEnviar() {

        require_once (sfConfig::get('sf_symfony_lib_dir').'/addon/sfMail/sfMail.class.php');

        $c = new Criteria();
        $c->add(UsuarioPeer::USUARIO, $this->getRequestParameter('usuario'));
        $user = UsuarioPeer::doSelectOne($c);

        if ($user) {
            if ($user->getEmail() != "") {
            $clave = $this->_generar_clave();
                $user->setClave(md5($clave));
                $user->save();

                $mail = new sfMail();
                $mail->initialize();
                $mail->setMailer("sendmail");
                $mail->setFrom("webmaster@proyecto-alba.com.ar","WebMaster");
                $mail->addAddress($user->getEmail());
                $mail->setSubject("Cambio de clave en ". $_SERVER['SERVER_NAME']);

                $body = "Su clave ha sido modificada :\n\n";
                $body .= "\t" . $clave;
                $mail->setBody($body);
                $mail->send();
                $this->resultado = "El mail ha sido enviado a " . $user->getEmail();
            }
            else
                $this->resultado = "El usuario no posee una direccion de correo electronico valida";


        }
        else
            $this->resultado = "El usuario no existe";

    }

/*    public function handleError()
    {
        $this->debugMessase("error general");
        return sfView::ERROR;
    }
*/
    /* capturo el error de login */
   public function handleErrorLogin()
    {
        $this->logMessage("Error inicio de sesion", 'debug');
        $this->error_inicio_sesion = true;
        return sfView::SUCCESS;
    }


    /* Genera una clave aleatoria de 4 letras y 4 numeros */
    private function _generar_clave(){

        $letras = "abcdefghijklmnopqrstuvwxyz";
        $clave = "";

        for ($i=0;$i<4;$i++) {
            $clave .= substr($letras,rand(1,strlen($letras)),1);
        }
        for ($i=0;$i<4;$i++) {
            $numero = rand(0,9);
            $clave .= $numero;
        }

        return $clave;
    }
}

?>
