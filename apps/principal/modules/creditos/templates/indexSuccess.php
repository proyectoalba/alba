<h1>Creditos</h1>
<br>
<p><a href="http://www.proyectoalba.com.ar/spip.php?article4">Las caras detras del c&oacute;digo</a></p>

<br/>

<?php if (SF_DEBUG):?>
<ul>
    <li>Informaci&oacute;n del Sistema
        <ul>
            <li>PHP: <?echo phpversion()?></li>
        </ul>
    </li>
    <li>Permisos:
        <ul>
        <? foreach ($sf_user->listCredentials() as $permiso):?>
        <li><?echo $permiso?></li>
        <?endforeach;?>
        </ul>
    </li>
    <li>Establecimientos:
        <ul>
            <?php $establecimientos = $sf_user->getEstablecimientos()?>
            <?php foreach ($establecimientos as $establecimiento): ?>
                <li><?echo $establecimiento?></li>
            <?php endforeach; ?>
        </ul>
    </li>
    <li>Organizaci&oacute;n
        <ul>
            <?php echo "[" .$sf_user->getAttribute('fk_organizacion_id'). "] " . $sf_user->getAttribute('organizacion_nombre')?>
        </ul>
    </li>
    <li>Tema (interfaz):
        <ul>
            <?php echo $sf_user->getTheme()?>
        </ul>
    </li>
</ul>
<?php endif;?>
