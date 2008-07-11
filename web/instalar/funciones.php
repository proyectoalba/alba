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

function dump2Array($file) { 
    $aSql = array();
    $res_sql = "";
    DebugLog ("dump2Array(): Comprobando si existe el archivo");
    if(file_exists($file)) {
        $sql = file($file);        
        DebugLog("dump2Array(): Leyendo archivo .SQL");
        foreach($sql as $sql_line) {
             $sql_line = trim($sql_line);
            if (($sql_line != "") && (substr($sql_line, 0, 2) != "--") && (substr($sql_line, 0, 1) != "#") ) {
                $res_sql .= $sql_line."\n"; 
            }
        }    
        $aSql= array_slice(explode(";\n", $res_sql),0,-1);
        DebugLog ("dump2Array(): Total de lineas :" . count($aSql));
    }
    else {
        DebugLog ("dump2Array(): El archivo no existe: $file");
        return array();
    }
        
    return $aSql;
}

function executeDump($file, $protocol, $host, $user, $pass, $db) {
    DebugLog("executeDump(): file: $file");
    DebugLog("executeDump(): user: $user");
    DebugLog("executeDump(): db: $db");
    $aSql = dump2Array($file);
    $error = false;    
    if(count($aSql) > 0 && file_exists($file)) {
        if($protocol == 'mysql' OR $protocol == 'pgsql') {
            $dsn = "$protocol:host=$host;dbname=$db"; // necesito saber como hacer conexion utf8

            try {
                $dbh = new PDO($dsn, $user, $pass);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                DebugLog("excuteDump(): No se puede conectar ala base de datos. " . $e->getMessage());
                return false;
            }

            try {
                DebugLog("executeDump(): ejecutando BEGIN" );
                $dbh->beginTransaction();

                if($protocol == 'pgsql') { 
                    DebugLog("executeDump(): ejecutando SET CONSTRAINTS ALL DEFERRED" );
                    $dbh->exec("SET CONSTRAINTS ALL DEFERRED");
                }

                foreach($aSql as $sql_line) {
                    // esto es lamentable: saco los drop que genera el propel
//                    if($protocol == 'pgsql' AND ( strstr($sql_line,'DROP') !== false)) {
                        //                        continue;
                    if($protocol == 'pgsql') {
                        $sql_line = str_replace('DROP TABLE', 'DROP TABLE IF EXISTS', $sql_line);
                        $sql_line = str_replace('DROP SEQUENCE', 'DROP SEQUENCE IF EXISTS', $sql_line);
                    }
                    $dbh->exec(trim($sql_line));
                }

                DebugLog("executeDump(): Sin errores ejecutando COMMIT y saliendo");
                $dbh->commit();
            }
            catch (PDOException $e) {
                DebugLog("executeDump(): Error en". $e->getMessage());
                DebugLog("executeDump(): Se encontraron errores ejecutando ROLLBACK y saliendo");
                $dbh->rollBack();
                return false;
            }

            return true;

        } else {
            DebugLog("executeDump(): El protocolo no es ni mysql ni pgsql");
            return false;
        }
    } else {
        DebugLog("executeDump(): No hay instrucciones SQL en el archivo");
        return false;
    }

}
/**
* genera el archivo de conexion a la base de datos
*/
function generate_databases_yml($protocol,$host,$user,$pass,$db) {
    $yml = AlbaPath() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "databases.yml";
    DebugLog ("generate_databases_yml(): generando archivo de conexion $yml");
    if ($fp = @fopen ($yml,'w')) {
        fwrite ($fp,"# Archivo generado por el instalador de Alba " . date('m/d/Y H:i:s') . "\n");
        fwrite ($fp,"all:\n");
        fwrite ($fp,"  propel:\n");
        fwrite ($fp,"    class: sfPropelDatabase\n");
        fwrite ($fp,"    param:\n");
        if ($pass != "") {
            fwrite ($fp,"      dsn: $protocol://$user:$pass@$host/$db\n");
        } else {
            fwrite ($fp,"      dsn: $protocol://$user@$host/$db\n");
        }
        fwrite ($fp,"      datasource: alba\n");
        fwrite ($fp,"      encoding: utf8\n");
        fwrite ($fp, "\n");
        DebugLog("generate_databases_yml(): archivo yml generado");
        return true;
    }
    else {
        DebugLog("generate_databases_yml(): no se puede abrir el archivo. ");
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
    $ini = AlbaPath() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "propel.ini";
    DebugLog ("generate_propel_ini(): generando archivo de propel $ini");
    if ($fp = @fopen ($ini,'w')) {
        fwrite ($fp,"# Archivo generado por el instalador de Alba " . date('m/d/Y H:i:s') . "\n\n");
        fwrite ($fp,"propel.targetPackage       = alba\n");
        fwrite ($fp,"propel.project             = alba\n");
        fwrite ($fp,"propel.database            = $protocol\n");
        fwrite ($fp,"propel.database.createUrl  = $protocol://$user:$pass@$host/\n");
        fwrite ($fp,"propel.database.url        = $protocol://$user:$pass@$host/$db\n");
        fwrite ($fp,"propel.addGenericAccessors = true\n");
        fwrite ($fp,"propel.addGenericMutators  = true\n");
        fwrite ($fp,"propel.addTimeStamp        = false\n");
        fwrite ($fp,"propel.schema.validate     = false\n\n");
        fwrite ($fp,"; directories\n");
        fwrite ($fp,"propel.home                    = .\n");
        fwrite ($fp,'propel.output.dir              = ${propel.home}'."\n");
        fwrite ($fp,'propel.schema.dir              = ${propel.output.dir}/config'."\n");
        fwrite ($fp,'propel.conf.dir                = ${propel.output.dir}/config'."\n");
        fwrite ($fp,'propel.phpconf.dir             = ${propel.output.dir}/config'."\n");
        fwrite ($fp,'propel.sql.dir                 = ${propel.output.dir}/data/sql'."\n");
        fwrite ($fp,"propel.runtime.conf.file       = runtime-conf.xml\n");
        fwrite ($fp,'propel.php.dir                 = ${propel.output.dir}'."\n");
        fwrite ($fp,"propel.default.schema.basename = schema\n");
        fwrite ($fp,"propel.datadump.mapper.from    = *schema.xml\n");
        fwrite ($fp,"propel.datadump.mapper.to      = *data.xml\n\n");
        fwrite ($fp,"; builder settings\n");
        fwrite ($fp,"propel.builder.peer.class              = addon.propel.builder.SfPeerBuilder\n");
        fwrite ($fp,"propel.builder.object.class            = addon.propel.builder.SfObjectBuilder\n");
        fwrite ($fp,"propel.builder.objectstub.class        = addon.propel.builder.SfExtensionObjectBuilder\n");
        fwrite ($fp,"propel.builder.peerstub.class          = addon.propel.builder.SfExtensionPeerBuilder\n");
        fwrite ($fp,"propel.builder.objectmultiextend.class = addon.propel.builder.SfMultiExtendObjectBuilder\n");
        fwrite ($fp,"propel.builder.mapbuilder.class        = addon.propel.builder.SfMapBuilderBuilder\n");
        fwrite ($fp,"propel.builder.interface.class         = propel.engine.builder.om.php5.PHP5InterfaceBuilder\n");
        fwrite ($fp,"propel.builder.node.class              = propel.engine.builder.om.php5.PHP5NodeBuilder\n");
        fwrite ($fp,"propel.builder.nodepeer.class          = propel.engine.builder.om.php5.PHP5NodePeerBuilder\n");
        fwrite ($fp,"propel.builder.nodestub.class          = propel.engine.builder.om.php5.PHP5ExtensionNodeBuilder\n");
        fwrite ($fp,"propel.builder.nodepeerstub.class      = propel.engine.builder.om.php5.PHP5ExtensionNodePeerBuilder\n\n");
        fwrite ($fp,"propel.mysql.tableType = InnoDB\n");
        fwrite ($fp,"propel.mysql.encoding = utf8\n");
        fwrite ($fp,"propel.packageObjectModel = true\n\n");
        fwrite ($fp,"propel.builder.addIncludes  = false\n");
        fwrite ($fp,"propel.builder.addComments  = false\n");
        fwrite ($fp,"propel.builder.addBehaviors = false\n");

        DebugLog("generate_propel_ini(): archivo ini generado");
        return true;
    } else {
        DebugLog("generate_propel_ini(): no se puede abrir el archivo. ");
        return false;
    }
}




/**
* carga el schema a l abase de datos
*/
function crear_schema ($filesql, $protocol, $host, $user, $pass, $db) {
    DebugLog ("crear_schema(): Agregando $filesql");
    if ($filesql == "")
        return false;
    else
        return executeDump(AlbaPath() . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'sql'  . DIRECTORY_SEPARATOR .$filesql, $protocol, $host, $user, $pass, $db);
}

/**
* carga los datos ejemplo/minima
*/
function crear_base_modelo($filesql, $protocol, $host, $user, $pass, $db) {
    DebugLog("crear_base_modelo(): Creado base de datos modelo: $filesql");
    if ($filesql == "")
        return false;
    else
        return executeDump(AlbaPath() . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'sql'  . DIRECTORY_SEPARATOR .$filesql, $protocol, $host, $user, $pass, $db);
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


function build_model_sql() {
    chdir('../../');

    define('SF_ROOT_DIR',    realpath(dirname(__FILE__).'/../..'));
    define('SF_APP',         'principal');
    define('SF_ENVIRONMENT', 'dev');
    define('SF_DEBUG',       true);
    define('STDOUT','');
    define('STDERR','');

    require_once(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

    require_once($sf_symfony_lib_dir.'/vendor/pake/pakeFunction.php');
    require_once($sf_symfony_lib_dir.'/vendor/pake/pakeGetopt.class.php');


    $dirs = array(
    sfConfig::get('sf_data_dir').DIRECTORY_SEPARATOR.'tasks'         => 'myPake*.php', // project tasks
    sfConfig::get('sf_symfony_data_dir').DIRECTORY_SEPARATOR.'tasks' => 'sfPake*.php', // symfony tasks
    sfConfig::get('sf_root_dir').'/plugins/*/data/tasks'             => '*.php',       // plugin tasks
    );

    foreach ($dirs as $globDir => $name)
    {
        if ($dirs = glob($globDir))
        {
            $tasks = pakeFinder::type('file')->name($name)->in($dirs);
            foreach ($tasks as $task)
            {
                include_once($task);
            }
        }
    }
    $pake = pakeApp::get_instance();

    try
    {
        $ret = $pake->run(sfConfig::get('sf_symfony_data_dir').DIRECTORY_SEPARATOR.'tasks'.DIRECTORY_SEPARATOR.'sfPakePropel.php', array('propel-build-model','--quiet') , true);
    }
    catch (pakeException $e)
    {
        print "<strong>ERROR</strong>: ".$e->getMessage();
    }

    try
    {
        $ret = $pake->run(sfConfig::get('sf_symfony_data_dir').DIRECTORY_SEPARATOR.'tasks'.DIRECTORY_SEPARATOR.'sfPakePropel.php', array('propel-build-sql','--quiet') , true);
    }
    catch (pakeException $e)
    {
        print "<strong>ERROR</strong>: ".$e->getMessage();
    }

}




?>
