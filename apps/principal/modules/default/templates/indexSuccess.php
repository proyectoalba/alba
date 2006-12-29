<?php if ($sf_user->isAuthenticated()): ?>
<div align="center">
<h1>¡Bienvenidos al Sistema de Gesti&oacute;n Educativa ALBA!</h1>
El Proyecto Alba, es un proyecto de desarrollo de Software para la realización de un “Sistema Informático Abierto de Gestión Unifidcada para Unidades Educacionales”
</div>
<br>
<br>
<table align="center">
    <tr>
        <td>
            <?=image_tag("gnu-head-banner.png");?>
        </td>
        <td>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td>
            &Eacute;ste aplicativo es <b><a href="http://es.wikipedia.org/wiki/Software_Libre">Software Libre</a></b>, de acuerdo con tal definición, el software es <b>"libre"</b> si garantiza las siguientes libertades:
            <ul>
                <li><b>"libertad 0"</b>, ejecutar el programa con cualquier propósito (privado, educativo, público, comercial, etc.)</li>
                <li><b>"libertad 1"</b>, estudiar y modificar el programa (para lo cual es necesario poder acceder al código fuente)</li>
                <li><b>"libertad 2"</b>, copiar el programa de manera que se pueda ayudar al vecino o a cualquiera</li>
                <li><b>"libertad 3"</b>, mejorar el programa, y hacer públicas las mejoras, de forma que se beneficie toda la comunidad.</li>
            </ul>
        </td>
    </tr>
</table>

<br>
<br>

<table align="center">
    <tr>
        <td>
            <?=image_tag("bug.jpg");?>
        </td>
        <td>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td>
            Como est&aacute; en continuo desarrollo, puede encontrar errores que todav&iacute;a no han sido descubiertos. <br>
            Si encuentra alguno, por favor rep&oacute;rtelo en nuestro sitio de seguimientos de errores: <b><a target="_blank" href="http://alba.pressenter.com.ar">http://alba.pressenter.com.ar</a></b>
            <br/>
        </td>
    </tr>

    <tr>
        <td>

        </td>
        <td>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td>
            <i>Para más informaci&oacute;n visite el Sitio Web del Proyecto Alba. <b><a href="http://www.proyectoalba.com.ar">P&aacute;gina Web del Proyecto.</a></b></i>
        </td>
    </tr>

</table>

<?php endif; ?>