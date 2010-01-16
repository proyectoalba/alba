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
 * instalador
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: instalar.php 4883 2007-07-30 21:41:42Z ftoledo $
 * @filesource
 * @license GPL
 */

function AlbaPath() {
    return realpath(dirname(__FILE__) .DIRECTORY_SEPARATOR. ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR);
}


function logFile() {
    return AlbaPath() . DIRECTORY_SEPARATOR . "log" . DIRECTORY_SEPARATOR . "install.log";
}


function DebugLog($str,$modo = 'I') {
    $log = logFile();
    $fp = @fopen($log,"a+");
    if ($fp) {
        fwrite($fp,date('d/m/Y H:i:s') . " $modo: $str\n");
        fclose($fp);
    }
}

/**
* genera el archivo de conexion a la base de datos
*/
function generate_databases_yml($protocol,$host,$user,$pass,$db) {
    $dist = AlbaPath() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "databases.yml.dist";
    $out = AlbaPath() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "databases.yml";
    $vars = array(
      'PROTOCOL'=> $protocol,
      'USERDB'=> $user,
      'PASSDB'=> $pass,
      'DBNAME'=> $db,
      'SERVER'=> $host
    );
    DebugLog ("generate_databases_yml(): generando archivo de conexion " . $dist);
    if (template_file($dist,$out, $vars)) {
        DebugLog("generate_databases_yml(): archivo yml generado");
        return true;
    }
    else {
        DebugLog("generate_databases_yml(): no se puede generar el archivo. ");
        return false;
    }
}

/**
 * abre el archivo de texto, y remplaza %VARIABLE% por la del array
 * y lo guarda en el archivo destino
 * el path de los archivos debe ser absoluto
 */
function template_file($origen = '', $destino = '', $variables = array())
{
  //cargamos algunas variables propias
  $variables['TIMESTAMP'] = date('d/m/Y H:i:s');
  DebugLog('template_file: comprobando si existe el archivo de origen ' .$origen);
  if (file_exists($origen)) {
    DebugLog('template_file: cargando contenidos de '. $origen);
    $contenido = file_get_contents($origen);
    foreach ($variables as $variable => $valor) {
      DebugLog('template_file: reemplazando var: ' . $variable. '=' . $valor);
      $contenido = str_replace('%'.strtoupper($variable).'%', $valor, $contenido);
    }
    DebugLog('template_file: guardando contenido en ' . $destino);
    return file_put_contents($destino, $contenido);
  }
  else {
    DebugLog('template_file: no se puede abrir el archivo de origen: ' . $origen);
    return false;
  }
}

/**
* genera el archivo autoload.yml para que no se autocarguen todos los modelos de DB
*/
function generate_autoload_yml($protocol) {
    $yml = AlbaPath() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "autoload.yml";
    DebugLog ("generate_autoload_yml(): generando archivo de autoload $yml");
    if ($fp = @fopen ($yml,'w')) {
        fwrite ($fp,"# Archivo generado por el instalador de Alba " . date('m/d/Y H:i:s') . "\n");
        fwrite ($fp,"autoload:\n");
        fwrite ($fp,"  project_model:\n");
        fwrite ($fp,"    name: project model\n");
        fwrite ($fp,"    path: %SF_MODEL_LIB_DIR%/$protocol\n");
        fwrite ($fp,"    recursive: on\n");
        fwrite ($fp, "\n");
        DebugLog("generate_autoload_yml(): archivo yml generado");
        return true;
    } else {
        DebugLog("generate_autoload_yml(): no se puede abrir el archivo. ");
        return false;
    }
}


/**
* genera el archivo propel.ini para configurar el acceso a la base de datos para tareas
*/
function generate_propel_ini($protocol,$host,$user,$pass,$db) {
    $dist = AlbaPath() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "propel.ini.dist";
    $out = AlbaPath() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "propel.ini";

    $vars = array(
      'PROTOCOL' => $protocol,
      'SERVER' => $host,
      'DBNAME' => $db,
      'USERDB' => $user,
      'PASSDB' => $pass
    );
    DebugLog ("generate_propel_ini(): generando archivo de propel ". $out);

    if (template_file($dist,$out,$vars)) {
        DebugLog("generate_propel_ini(): archivo ini generado");
        return true;
    } else {
        DebugLog("generate_propel_ini(): no se pudo generar " . $out);
        return false;
    }
}


/**
* carga el schema a l abase de datos
* hace el build-sql y el insert-sql
*/
function crear_schema () {
  DebugLog('crear_schema: lanzando tarea propel-build-sql');
  if (run_sf_task('sfPropelBuildSqlTask')) {
    DebugLog('crear_schema: lanzando tarea propel-insert-sql');
    if (run_sf_task('sfPropelInsertSqlTask')) {
      return true;
    }
    else {
      DebugLog('crear_schema: Error al ejecutar insert-sql' , 'E');
      return false;
    }
  }
  else {
    DebugLog ('crear_schema: error al ejecutar build-sql', 'E');
    return false;
  }
}

/**
* carga los datos base y si se selecciono algun ejemplo
* lo agrega.
*/
function cargar_base_modelo($modelo) {

  DebugLog('cargar_base_modelo: lanzando LoadData con fixture base');
  if (!run_sf_task('sfPropelLoadDataTask',array(),'--dir=data'.DIRECTORY_SEPARATOR.'base')) {
    return false;
  }
  if ($modelo != '') {
    DebugLog('cargar_base_modelo: lanazando LoadData con Base seleccionada: '. $modelo);
    if (!run_sf_task('sfPropelLoadDataTask',array(),'--append --dir=data'.DIRECTORY_SEPARATOR. $modelo)) {
      return false;
    }
  }
  return true;
}

/**
* helpers para comprobaciones
*/
function check_php() {
    DebugLog ("Comprobando version de php");
    return version_compare(phpversion(),'5.0.0','>=');
}
function check_mysql() {
    DebugLog("Comprobando extension de mysql");
    return extension_loaded('mysql');
}
function check_memorylimit() {
    DebugLog("Comprobando limite de memoria de php");
    $limite = ini_get('memory_limit');
    return ($limite >= 32);
}
function check_magicquotes() {
    DebugLog("Comprobando magic_quotes");
    return !get_magic_quotes_gpc();
}
function check_gd() {
    DebugLog("Comprobando extension GD de php");
    return extension_loaded('gd');
}
function check_apache2() {
    DebugLog("Comprobando version de apache");
    if (extension_loaded('apache')) {
        $version = 0;
        preg_match('!Apache/(.*) !U', apache_get_version(), $version);
        return version_compare($version[1],'2.0.0','>=');
    }
    else
        return 0;
}
function check_rewrite() {
    DebugLog("Comprobando mod_rewrite");
    if (extension_loaded('apache')) {
        $modulos = apache_get_modules();
        if(count($modulos)>0) {
            $res = array_search('mod_rewrite', $modulos);
            if($res === false) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
    else
        return false;
}

function run_sf_task($tarea ='', $args = array(), $options = array()) {
    if (!defined('STDOUT')) {
      define ('STDOUT','');
    }
    $pconfig = dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'ProjectConfiguration.class.php';
    DebugLog('run_sf_task: pconfig: ' . $pconfig);
    require_once($pconfig);
    $configuration = ProjectConfiguration::getApplicationConfiguration('principal', 'dev', true);
    sfContext::createInstance($configuration);

    $dispatcher = sfContext::getInstance()->getEventDispatcher();
    $formatter = new sfFormatter();
    $old_cwd = getcwd();
    DebugLog('run_sf_task: cambiado a: ' . sfConfig::get('sf_root_dir'));
    chdir(sfConfig::get('sf_root_dir'));

    DebugLog('run_sf_task: creando instancia de ' . $tarea);
    $task = new $tarea($dispatcher,$formatter);
    try {
      DebugLog('run_sf_task: ejecutando tarea '  . $tarea);
      $task->run($args, $options);
      DebugLog('run_sf_task: fin de tarea, volviendo a ' . $old_cwd);
      chdir($old_cwd);
      return true;
    }
    catch (Exception $e) {
        DebugLog('run_sf_task: volviendo a ' . $old_cwd ,"E");
        chdir($old_cwd);
        DebugLog('run_sf_task: error al ejecutar tarea: ' . $e->getMessage() ,"E");
        return $e->getMessage();
    }

}
function build_model_sql() {
    DebugLog('build_model_sql: lanzando tarea');
    return run_sf_task('sfPropelBuildModelTask');

}
