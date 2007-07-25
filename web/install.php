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
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */
 

    define("OS_WINDOWS",((strtoupper(substr(PHP_OS,0,3))=='WIN'))?true:false);
    
    define("APACHE_REQUIRED_VERSION","2.0.0");
    define("PHP_REQUIRED_VERSION","5.0.0");
    define("MEMORY_LIMIT_REQUIRED", "16");
    define("MYSQL_REQUIRED_VERSION","4.1.0");

    define("INSTALL_DIR", realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR). DIRECTORY_SEPARATOR);
    define("DEBUG_LOG",INSTALL_DIR."log".DIRECTORY_SEPARATOR."install.log");
    define("ALBA_WEB",INSTALL_DIR."web" . DIRECTORY_SEPARATOR);
    define("ALBA_CONFIG", INSTALL_DIR."config".DIRECTORY_SEPARATOR);

    define("APACHE_CONFIG_DIST", ALBA_CONFIG."apache.conf.dist");
    define("DATABASE_CONFIG_DIST", ALBA_CONFIG."databases.yml.dist");
    define("PROPEL_CONFIG_DIST", ALBA_CONFIG."propel.ini.dist");
    define("HTACCESS_DIST", ALBA_WEB.".htaccess.dist");

    define("DATABASE_CONFIG", ALBA_CONFIG."databases.yml");
    define("PROPEL_CONFIG", ALBA_CONFIG."propel.ini");
    define("HTACCESS", ALBA_WEB.".htaccess");
    define("SCHEMA", ALBA_CONFIG."schema.xml");

 
    define("IMG_OK", "<img src='installer/images/save.png'>");
    define("IMG_NOT_OK", "<img src='installer/images/delete.png'>");
    
    define("SQL_CREATE_DB", INSTALL_DIR."data".DIRECTORY_SEPARATOR."sql".DIRECTORY_SEPARATOR."create-db.sql");
    define("SQL_CREATE", INSTALL_DIR."data".DIRECTORY_SEPARATOR."sql".DIRECTORY_SEPARATOR."schema.sql");
    define("SQL_INSERT_INICIAL", INSTALL_DIR."data".DIRECTORY_SEPARATOR."sql".DIRECTORY_SEPARATOR."datos_desde_cero.sql");
    define("SQL_INSERT_EJEMPLO", INSTALL_DIR."data".DIRECTORY_SEPARATOR."sql".DIRECTORY_SEPARATOR."datos_ejemplo.sql");
            
    if(!file_exists(INSTALL_COMPLETE_FILE)) {
        
        $fp = fopen(DEBUG_LOG, "at" );
        fputs( $fp,date( "d/m/Y H:m:s")." ---- INICIO DE VERIFICACIONES ----\n\n" );
        
    if(OS_WINDOWS) {
        @unlink(ALBA_PATH.".htaccess");
        @unlink(INSTALL_DIR."dist/.htaccess");
        fputs( $fp,date( "d/m/Y H:m:s")."   SO: Windows \n\n" );
    }
    else
        fputs( $fp,date( "d/m/Y H:m:s")."   SO: Linux \n\n" );
        
    //muchas veces tarda demasiado por lo que es prudente ponerle un infinito tiempo de ejecucion
    set_time_limit(0);    
    

    

    $f_phpversion = function_exists ("phpversion");
    $f_apache_get_version = function_exists ("apache_get_version");
    $f_get_magic_quotes_gpc = function_exists ("get_magic_quotes_gpc");
    $f_mysql_module = function_exists ("mysql_connect");

    $msg_phpversion = "";
    $msg_apache_get_version = "";
    $msg_mysql_module  = "";
    $msg_mod_rewrite  = "";
    $msg_get_magic_quotes_gpc = "";

    $bool_mysql_module  = false;
    $bool_phpversion = false;
    $bool_apache_get_version = false;
    $bool_gd = estaExtensionPHP("gd");
    $bool_mod_rewrite = false;
    $bool_get_magic_quotes_gpc  = false;
    
    $memory_limit = ini_get('memory_limit');
    if($memory_limit != '') {
        $bool_memory_limit = compruebaMemoriaMaxima($memory_limit);
        $bool_memory_no_chequeo = true;
    } else {
        $bool_memory_limit  = true;
        $memory_limit = "No se pudo conocer la cantidad de memoria disponible en su PHP.";
        $bool_memory_no_chequeo = false;
    }
    fputs( $fp,date( "d/m/Y H:m:s")."   memory_limit: $memory_limit\n\n" );

    $bool_cache = tienePermisoEscritura(ALBA_PATH."cache");
    $bool_log = tienePermisoEscritura(ALBA_PATH."log");
    $bool_upload = tienePermisoEscritura(ALBA_WEB."uploads");
    $bool_tmp = tienePermisoEscritura(ALBA_WEB."tmp");
    $bool_config = tienePermisoEscritura(ALBA_PATH."config");

    if($f_phpversion) {
        $bool_phpversion = compruebaVersion(phpversion(),PHP_REQUIRED_VERSION);
        $msg_phpversion = "Su versi&oacute;n de PHP es ".phpversion();
    } else {
        $msg_phpversion = "No se pudo verificar la versi&oacute;n de PHP";
        
    }
    fputs( $fp,date( "d/m/Y H:m:s")."   phpversion: $msg_phpversion\n\n" );
    
    if($f_apache_get_version) {
        preg_match('!Apache/(.*) !U', apache_get_version(), $v);
        $apache_installed_version = $v[1];
        $bool_apache_get_version = compruebaVersion($apache_installed_version, APACHE_REQUIRED_VERSION);
        $msg_apache_get_version = "Su versi&oacute;n de APACHE es ".$apache_installed_version;
        $bool_mod_rewrite = estaExtensionApache("mod_rewrite");

        if($bool_mod_rewrite) {
            $msg_mod_rewrite  = "";
        } else {
            $msg_mod_rewrite  = "Por favor instale el mod_rewrite en el apache";
        }

    } else {
        $msg_apache_get_version = "No se pudo verificar la versi&oacute;n de APACHE";
        $msg_mod_rewrite = "( Al no poder verificar la versi&oacute;n de APACHE, tampoco pudo hacerlo para el mod_rewrite )";
    }
    fputs( $fp,date( "d/m/Y H:m:s")."   apache_get_version: $msg_apache_get_version\n\n" );
    fputs( $fp,date( "d/m/Y H:m:s")."   mod_rewrite: $msg_mod_rewrite\n\n" );
    
    if($f_mysql_module) {
        $bool_mysql_module = true;        
        $msg_mysql_module = "Tiene instalado el modulo MYSQL en PHP";
    } else 
        $msg_mysql_module = "No tiene instalado el modulo MYSQL en PHP";
    
    fputs( $fp,date( "d/m/Y H:m:s")."   mysql_module: $msg_mysql_module\n\n" );

    if($f_get_magic_quotes_gpc) {
        $bool_get_magic_quotes_gpc = get_magic_quotes_gpc();
        if(!$bool_get_magic_quotes_gpc) {
            $bool_get_magic_quotes_gpc = true;
            $msg_get_magic_quotes_gpc = "";
        } else {
            $msg_get_magic_quotes_gpc = "Tiene que cambiar el valor de la variable magic_quotes_gpc de On a Off";
        }
    } else {
        $msg_get_magic_quotes_gpc = " No se pudo verificar si usted tiene (magic_quotes_gpc = off) en el php.ini";
    }   
    fputs( $fp,date( "d/m/Y H:m:s")."   magic_quotes: $msg_get_magic_quotes_gpc\n\n" );
    
    $hasErrors = false;
    $aError = array();
    $aDb = array( 'server' => '', 'user' => '', 'password' => '', 'name' => '', 'createdb' => '' ) ;

    if(!file_exists(SQL_CREATE)) {
        $hasErrors = true;
        $aError['sql_files'] = 'El archivo para el SQL no puede abrirse';
        fputs( $fp,date( "d/m/Y H:m:s")."   SQL_CREATE: ".$aError['sql_files']."\n\n" );
    }
    else
        fputs( $fp,date( "d/m/Y H:m:s")."   SQL_CREATE: OK \n\n" );
    
    if(!file_exists(SQL_INSERT_INICIAL)){
        $hasErrors = true;
        $aError['sql_files'] = 'El archivo para el SQL no puede abrirse';
        fputs( $fp,date( "d/m/Y H:m:s")."   SQL_INSERT_INICIAL: ".$aError['sql_files']."\n\n" );
    }
    else
        fputs( $fp,date( "d/m/Y H:m:s")."   SQL_INSERT_INICIAL: OK \n\n" );
    
    if(!file_exists(SQL_INSERT_EJEMPLO)){
        $hasErrors = true;
        $aError['sql_files'] = 'El archivo para el SQL no puede abrirse';
        fputs( $fp,date( "d/m/Y H:m:s")."   SQL_INSERT_EJEMPLO: ".$aError['sql_files']."\n\n" );
    }
    else
        fputs( $fp,date( "d/m/Y H:m:s")."   SQL_INSERT_EJEMPLO: OK \n\n" );
   
    fputs( $fp,date( "d/m/Y H:m:s")."  ---- FIN DE VERIFICACIONES ----\n\n" );
    fputs( $fp,date( "d/m/Y H:m:s")."  ---- INICIO DB ----\n\n" );
    if ($_SERVER['REQUEST_METHOD'] == "POST")  {
    
        if(!isset($_POST['db']['createdb']))
            $_POST['db']['createdb'] = false;
                
        $db_connection = @mysql_connect( $_POST['db']['server'], $_POST['db']['user'], $_POST['db']['password']);
        if ($db_connection) {
            $mysql_server_version = mysql_get_server_info();
            fputs( $fp,date( "d/m/Y H:m:s")."   mysql_server_version: ".$mysql_server_version ."\n\n" );
            if(compruebaVersion($mysql_server_version, MYSQL_REQUIRED_VERSION)) {
                if($_POST['db']['createdb']) {
                    fputs( $fp,date( "d/m/Y H:m:s")."   -- Create DB --\n\n" );
                    if(!@mysql_query('CREATE DATABASE '.$_POST['db']['name'].' DEFAULT CHARACTER SET utf8 COLLATE utf8_bin')) {
                        $hasErrors = true;
                        $aError['newdb'] = 'No se pudo crear la base de datos ('.mysql_error().')';
                        fputs( $fp,date( "d/m/Y H:m:s")."   newdb: ".$aError['newdb']."\n\n" );
                        $aDb = array( 'server' => $_POST['db']['server'] , 'user' => $_POST['db']['user'], 'password' => $_POST['db']['password'], 'name' => $_POST['db']['name'], 'createdb' => $_POST['db']['createdb']) ;
                    } else {
                        fputs( $fp,date( "d/m/Y H:m:s")."  Se creo la base de datos OK--\n\n" );
                        if(doInstall($fp)) {
                            fputs( $fp,date( "d/m/Y H:m:s")."   Fin doInstall (create_db): OK \n\n" );
                            fclose( $fp );
                            header("Location: ".REDIRECT_URL);
                        } else {
                            fputs( $fp,date( "d/m/Y H:m:s")."   Fin doInstall (create_db): con Error \n\n" );
                            if (!@mysql_query('DROP DATABASE '.$_POST['db']['name'])){
                                $aError['insert_create'] = 'No se pudo eliminar la base de datos creada ('.mysql_error().')';
                                fputs( $fp,date( "d/m/Y H:m:s")."   insert_create (create_db): ".$aError['insert_create']."\n\n" );
                            }
                            else {
                                $aError['insert_create'] = 'Se elimino la base de datos creada ('.mysql_error().')';
                                fputs( $fp,date( "d/m/Y H:m:s")."   insert_create (create_db): ".$aError['insert_create']."\n\n" );
                            }
                            $hasErrors = true;
                        }
                    }
                } else {
                    fputs( $fp,date( "d/m/Y H:m:s")."   -- Select DB --\n\n" );
                    if(@mysql_select_db($_POST['db']['name'])) {
                        if(doInstall($fp)) {
                            fputs( $fp,date( "d/m/Y H:m:s")."   Fin doInstall (select_db): OK \n\n" );
                            fclose( $fp );
                            header("Location: ".REDIRECT_URL);
                        } else {
                            $aError['insert_create'] = 'No se pudo agregar los datos a la base de datos existente ('.mysql_error().')';
                            fputs( $fp,date( "d/m/Y H:m:s")."   insert_create (select_db): ".$aError['insert_create']."\n\n" );
                            $hasErrors = true;
                        }
                    } else {
                        $hasErrors = true;
                        $aError['currentdb'] = 'No se pudo usar la base de datos ('.mysql_error().')';
                        fputs( $fp,date( "d/m/Y H:m:s")."   currentdb (select_db): ".$aError['currentdb']."\n\n" );
                        $aDb = array( 'server' => $_POST['db']['server'] , 'user' => $_POST['db']['user'], 'password' => $_POST['db']['password'], 'name' =>    $_POST['db']['name'], 'createdb' =>  $_POST['db']['createdb']) ;
                    }
                }
            } else {
                $hasErrors = true;
                $aError['mysql_version'] = 'Usted tiene una versi&oacute;n de MYSQL inferior a la'.MYSQL_REQUIRED_VERSION. '(Su versi&oacute;n actual es '.$mysql_server_version. ')';
                fputs( $fp,date( "d/m/Y H:m:s")."   mysql_server_version: ".$aError['mysql_version']."\n\n" );
                $aDb = array( 'server' => $_POST['db']['server'] , 'user' => $_POST['db']['user'], 'password' => $_POST['db']['password'], 'name' => $_POST['db']['name'], 'createdb' =>  $_POST['db']['createdb'] );
            }

            mysql_close($db_connection);            
        } else {
            $hasErrors = true;
            $aError['connect'] = 'No pudo conectarse al Servidor de Base de datos ('.mysql_error().')';
            fputs( $fp,date( "d/m/Y H:m:s")."   connect: ".$aError['connect']."\n\n" );
            $aDb = array( 'server' => $_POST['db']['server'] , 'user' => $_POST['db']['user'], 'password' => $_POST['db']['password'], 'name' => $_POST['db']['name'], 'createdb' =>  $_POST['db']['createdb'] );
        }

    }
    fclose( $fp );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2000/REC-xhtml1-200000126/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="title" content="Proyecto ALBA" />
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Proyecto de Gestión Educativa ALBA" />
    <meta name="keywords" content="alba, proyecto, software libre, educacion" />
    <meta name="language" content="es" />
    <title>Proyecto ALBA</title>
    <link rel="stylesheet" type="text/css" href="installer/css/main.css"/>
</head>

<body>
<div id ="sf_admin_container">
<h2>Verificaciones necesarias para la instalaci&oacute;n</h2>
<br>
<h2>Programas</h2>

<table border="0" cellpadding="3" width="600" class="sf_admin_list">
    <thead>
        <tr>
            <th id="sf_admin_list_th_verfica">Verificaci&oacute;n</th>
            <th id="sf_admin_list_th_resultado">Resultado</th>
        </tr>
    </thead>
    <tr class="sf_admin_row_0" >
        <td>Versi&oacute;n de PHP >= 5.0.0</td>
        <td>
            <?=($bool_phpversion)?IMG_OK:IMG_NOT_OK?>(<?=$msg_phpversion?>)
        </td>
    </tr>

    <tr class="sf_admin_row_1" >
        <td>&#191; Esta instalado MYSQL en PHP ?</td>
        <td>
            <?=($bool_mysql_module)?IMG_OK:IMG_NOT_OK?>(<?=$msg_mysql_module?>)
        </td>
    </tr>
        

    <tr class="sf_admin_row_0">
        <td>&#191; Esta Instalado GD en PHP ? (optativo) </td>
        <td><?=($bool_gd)?IMG_OK:IMG_NOT_OK." (Si queres ver los gr&aacute;ficos de estad&iacute;sticas necesitas instalar GD  - http://www.php.net/manual/es/ref.image.php)";?></td>
    </tr>

    <tr class="sf_admin_row_1">
        <td>En php.ini memory_limit >= 32</td>
        <td><?=($bool_memory_limit AND $bool_memory_no_chequeo)?IMG_OK:IMG_NOT_OK;?>(<?=$memory_limit?>)</td>
    </tr>

    <tr class="sf_admin_row_1">
        <td>En php.ini magic_quotes_gpc = off</td>
        <td><?=($bool_get_magic_quotes_gpc)?IMG_OK:IMG_NOT_OK;?><?=$msg_get_magic_quotes_gpc?></td>
    </tr>



    <tr class="sf_admin_row_0">
        <td>Versi&oacute;on de APACHE >= 2.0</td>
        <td><?=($bool_apache_get_version)?IMG_OK:IMG_NOT_OK?>(<?=$msg_apache_get_version?>)</td>
    </tr>

    <tr class="sf_admin_row_1">
        <td>&#191; Esta instalado MOD_REWRITE en APACHE ?</td>
        <td><?=($bool_mod_rewrite)?IMG_OK:IMG_NOT_OK.$msg_mod_rewrite?></td>
    </tr>

</table>
<br>
<h2>Directorios con permisos para escritura:</h2>
<table border="0" cellpadding="3" width="600" class="sf_admin_list">
    <thead>
        <tr>
            <th id="sf_admin_list_th_dir">Directorios</th>
            <th id="sf_admin_list_th_resultado">Resultados</th>
        </tr>
    </thead>
    <tr class="sf_admin_row_0" >
        <td>/cache</td>
        <td><?=($bool_cache)?IMG_OK:IMG_NOT_OK." (chmod 777 ./alba/cache)";?></td>
    </tr>
    <tr class="sf_admin_row_1">
        <td>/log</td>
        <td><?=($bool_log)?IMG_OK:IMG_NOT_OK." (chmod 777 ./alba/logs)";?></td>
    </tr>
    <tr class="sf_admin_row_0">
        <td>/uploads</td>
        <td><?=($bool_upload)?IMG_OK:IMG_NOT_OK." (chmod 777 ./alba/web/uploads)";?></td>
    </tr>
    <tr class="sf_admin_row_1">
        <td>/config</td>
        <td><?=($bool_config)?IMG_OK:IMG_NOT_OK." (chmod 777 ./alba/config)";?></td>
<?php // Aqui no deberiamos probar si tienen permisos los archivos databases.yml, propel.ini y web/.htaccess ?>
    </tr>
    <tr class="sf_admin_row_0">
        <td>/tmp</td>
        <td><?=($bool_tmp)?IMG_OK:IMG_NOT_OK." (chmod 777 ./alba/web/tmp)";?></td>
    </tr>

</table>

<?php if($bool_config AND $bool_upload AND $bool_tmp AND $bool_log AND $bool_cache AND $bool_memory_limit AND $bool_apache_get_version AND $bool_phpversion AND $bool_mysql_module AND $bool_mod_rewrite AND $bool_get_magic_quotes_gpc) { ?>

<?php if($hasErrors) { ?>
    <br><br>
    <div class="form-errors">
        <h2>Arreglar errores para continuar</h2>
        <ul>
        <?php foreach ($aError as $idx => $name) { ?>
            <li><?php echo $name; ?></li>
        <?php } ?>
        </ul>
    </div>
<?php } ?>



<br>
<h2>Datos para la instalaci&oacute;n</h2>
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" >
    <fieldset id="sf_fieldset_base_de_datos" class="">
        <h2>Conecci&oacute;n a la base de datos</h2>
        <div class="form-row">
            <label for="db_server" class="required">Servidor:</label><div class="content"><input type="text" name="db[server]" value="<?=$aDb['server']?>" size="64" /></div>
        </div>
        <div class="form-row">
            <label for="db_user" class="required">Usuario:</label><div class="content"><input type="text" name="db[user]" value="<?=$aDb['user']?>" size="64" /></div>
        </div>
        <div class="form-row">
            <label for="db_password" class="required">Contrase&ntilde;a:</label><div class="content"><input type="password" name="db[password]" value="<?=$aDb['password']?>" size="64" /></div>
        </div>
        <div class="form-row">
            <label for="db_name" class="required">Nombre de base de datos:</label><div class="content"><input type="text" name="db[name]" value="<?=$aDb['name']?>" size="64" />
            Crear Base de datos <input type="checkbox" name="db[createdb]" value="crear" <?=($aDb['createdb'])?'checked':''?>> 
        </div>

        <div class="form-row">
            <label for="db_name" class="required">¿Que datos quiere por defecto?:</label>
            <div class="content">
            Datos m&iacute;nimos<input type="radio" name="db[datos]" value="minimos" checked >&nbsp;&nbsp;&nbsp;
            Caso de Ejemplo<input type="radio" name="db[datos]" value="ejemplo">
            </div>
        </div>
    </fieldset>

    <ul class="sf_admin_actions">
        <li><input type="submit" name="instalar" value="Instalar" class="sf_admin_action_instalar" /></li>
        <li><input type="reset" name="borrar" value="Borrar" class="sf_admin_action_borrar" /></li>
    </ul>
</form>
<? } else { ?>
<br>
<div align="center"><h2 style="color: #FF0000;">Para poder seguir con la instalci&oacute;n debe pasar completa la verificaci&oacute;n.</h2></div>
<? } ?>
</div>
</body>
</html>


<? 
// si existe el archivo de flag para la instacion
} else { ?>
<html>
<body>
Usted ya ha instalado el Proyetco ALBA. Si quiere volver a instalarlo debe borra el archivo alba/log/instalacion_completa.
</body>
</html>
<? } ?>


<?php

/**
* Funciones del instalador
*/

function compruebaVersion($instalada, $requireda) {
    return (version_compare($instalada, $requireda, ">="));
}


function compruebaMemoriaMaxima($php_memory) {
    $memory_limit = eregi_replace('[gmk]','',$php_memory);
    return ($memory_limit >= MEMORY_LIMIT_REQUIRED);

}

function estaExtensionPHP($ext) {
    $aExtension  = get_loaded_extensions();
    if(count($aExtension)>0) {
        $res = array_search($ext, $aExtension);
        if($res === false) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}


function estaExtensionApache($ext) {
    $aApacheModulos = apache_get_modules();
    if(count($aApacheModulos)>0) {
        $res = array_search($ext, $aApacheModulos);
        if($res === false) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}


function tienePermisoEscritura($dir) {
    $octalPermiso = substr(sprintf('%o', @fileperms($dir)), -4);
    return ($octalPermiso == "0777" OR $octalPermiso == "1777");
}


function reemplzarArchivo($archivo, $aReemplazo) {
     $contenido = "";
     if(file_exists($archivo)) {
        $contenido = file_get_contents ($archivo);
        foreach($aReemplazo as $indice => $reemplazo) {
            $contenido = str_replace($indice, $reemplazo, $contenido);
        }
    }
    return $contenido;
}



// ojo que esto no funciona para cualquier cosa si dentro de un string de un insert hay un dato con ;\n se separa por eso tambien
function dump2Array($file) { 
    $aSql = array();
    $res_sql = "";
    if(file_exists($file)) {
        $sql = file($file);        
        foreach($sql as $sql_line) {
             $sql_line = trim($sql_line);
            if (($sql_line != "") && (substr($sql_line, 0, 2) != "--") && (substr($sql_line, 0, 1) != "#") ) {
                $res_sql .= $sql_line."\n"; 
            }
        }    
        $aSql= array_slice(explode(";\n", $res_sql),0,-1);
    } 
    return $aSql;
}

function executeDump($file, $db,$fp) {
    fputs( $fp,date( "d/m/Y H:m:s")."      Entrando ExecuteDump: $file - $db  \n\n" );    
    $aSql = dump2Array($file);
    $error = false;    
    if(count($aSql) > 0 AND file_exists($file)) {
        if(mysql_select_db($db)) {
            fputs( $fp,date( "d/m/Y H:m:s")."         ejecutando BEGIN  \n\n" );    
            mysql_query("BEGIN");
            foreach($aSql as $sql_line) {
                $res = mysql_query(trim($sql_line));
                if(!$res) {
                    fputs( $fp,date( "d/m/Y H:m:s")."         Fallo SQL: $sql_line \n\n" );
                    fputs( $fp,date( "d/m/Y H:m:s")."         error:". mysql_error()." \n\n" );
                    $error = true;
                }
            }
            if($error == true) {
                fputs( $fp,date( "d/m/Y H:m:s")."         Se encontraron errores ejecutando  ROLLBACK  y saliendo \n\n" );    
                mysql_query("ROLLBACK");
                return false;
            } else {
                fputs( $fp,date( "d/m/Y H:m:s")."         Sin errores ejecutando COMMIT y saliendo \n\n" );    
                mysql_query("COMMIT");
                return true;
            }
        }
        else {
            fputs( $fp,date( "d/m/Y H:m:s")."         Error al seleccionar la base: $db  \n\n" );    
            return false;
        }    
    } else {
        fputs( $fp,date( "d/m/Y H:m:s")."         Devuele false no ejecuta nada  : $db  \n\n" );    
        return false;
    }

}

function doInstall($fp) {
    global $_POST;
    fputs( $fp,date( "d/m/Y H:m:s")."   Entrando doInstall()  \n\n" );
    //verifica que base de datos instalar si la del ejemplo o solamente la 
    //de los datos_desde_cero iniciales
    switch($_POST['db']['datos']) {
        case "ejemplo": $sql_insert = SQL_INSERT_INICIAL; break;
        case "minimos": $sql_insert = SQL_INSERT_EJEMPLO; break;
        default: $sql_insert = SQL_INSERT_EJEMPLO;
    }
    fputs( $fp,date( "d/m/Y H:m:s")."      Utilizando SQL: $sql_insert  \n\n" );
    if(executeDump(SQL_CREATE, $_POST['db']['name'],$fp)) {
        if(executeDump($sql_insert, $_POST['db']['name'],$fp)) {
            $aReemplazo = array( 'USERDB' => $_POST['db']['user'], 'PASSDB' => $_POST['db']['password'], 'SERVER' => $_POST['db']['server'], 'DBNAME'=> $_POST['db']['name']);
            $contenido_archivo = reemplzarArchivo(DATABASE_CONFIG_DIST,$aReemplazo);
            file_put_contents(DATABASE_CONFIG, $contenido_archivo);

            $aReemplazo = array( 'USERDB' => $_POST['db']['user'], 'PASSDB' => $_POST['db']['password'], 'SERVER' => $_POST['db']['server'], 'DBNAME'=> $_POST['db']['name']);
            $contenido_archivo = reemplzarArchivo(PROPEL_CONFIG_DIST,$aReemplazo);
            file_put_contents(PROPEL_CONFIG, $contenido_archivo);


            _symlink(INSTALL_DIR."dist/".SYMFONY_DIR."/data/", ALBA_PATH."data/symfony");
            _symlink(INSTALL_DIR."dist/pake/", ALBA_PATH."lib/pake");
            _symlink(INSTALL_DIR."dist/phing.sandbox/", ALBA_PATH."lib/phing");
            _symlink(INSTALL_DIR."dist/".SYMFONY_DIR."/lib/", ALBA_PATH."lib/symfony");
            _symlink(INSTALL_DIR."alba/data/symfony/web/sf/", ALBA_WEB."sf");
            fputs( $fp,date( "d/m/Y H:m:s")."      Creando Links  \n\n" );    

            $rewrite_path = (OS_WINDOWS)?CURRENT_WEB_DIR.SYMFONY_WINDOWS_WEB_DIR:CURRENT_WEB_DIR.SYMFONY_WEB_DIR;
            
            if(!OS_WINDOWS)
                _symlink(ALBA_WEB, INSTALL_DIR.SYMFONY_WEB_DIR); // crea nuevo link afuera de la estructura de alba
            
            $aReemplazo = Array('REWRITE_PATH' => $rewrite_path);
            $contenido_archivo = reemplzarArchivo(HTACCESS_DIST,$aReemplazo);
            file_put_contents(HTACCESS, $contenido_archivo);
            touch(INSTALL_COMPLETE_FILE);
            fputs( $fp,date( "d/m/Y H:m:s")."      Creando bandera INSTALL_COMPLETE_FILE  \n\n" );    
            return true;
        }
        fputs( $fp,date( "d/m/Y H:m:s")."      Fallo ejecutando: $sql_insert  \n\n" );        
        return false;
    } else {
        fputs( $fp,date( "d/m/Y H:m:s")."      Fallo ejecutando: SQL_CREATE  \n\n" );    
        return false;
    }

}


function doUninstall() {

}

function _symlink( $target, $link ) {
      if (OS_WINDOWS) {
        @dircopy($target, $link);
      } else {
        @symlink($target,$link);
      }
}


function dircopy($srcdir, $dstdir, $verbose = false) {
  $num = 0;
  if(!is_dir($dstdir)) mkdir($dstdir);
  if($curdir = opendir($srcdir)) {
   while($file = readdir($curdir)) {
     if($file != '.' && $file != '..') {
       $srcfile = $srcdir . DIRECTORY_SEPARATOR . $file;
       $dstfile = $dstdir . DIRECTORY_SEPARATOR . $file;
       if(is_file($srcfile)) {
         if(is_file($dstfile)) $ow = filemtime($srcfile) - filemtime($dstfile); else $ow = 1;
         if($ow > 0) {
           if($verbose) echo "Copying '$srcfile' to '$dstfile'...";
           if(copy($srcfile, $dstfile)) {
             touch($dstfile, filemtime($srcfile)); $num++;
             if($verbose) echo "OK\n";
           }
           else echo "Error: File '$srcfile' could not be copied!\n";
         }                 
       }
       else if(is_dir($srcfile)) {
         $num += dircopy($srcfile, $dstfile, $verbose);
       }
     }
   }
   closedir($curdir);
  }
  return $num;
}
?>