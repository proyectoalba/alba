    <br/>
    <br/>

    <div align="center">
        <h1>404 - No Encontrado</h1>
    
        <div class="error">
            <p>M&oacute;dulo: <?echo $sf_params->get('module')?>, Acci&oacute;n: <? echo $sf_params->get('action')?></p>
        </div>
        <p>
            <i>La direcci&oacute;n URL que ha requerido no se encontr&oacute; en &eacute;ste servidor.</i>
            <br/>
            <i>Puede volver hacia atras con su navegador, comprobar los datos y reintentar la acci&oacute;n.</i>
            <br/>
        </p>
        <p>&nbsp;</p>
        <p><?echo link_to("Volver al Inicio","/")?></p>
    </div>