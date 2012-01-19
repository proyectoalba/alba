<div class="error">
    No es posible eliminar &eacute;ste Ciclo Lectivo:
    <ul>
        <li><?php echo $error?></li>
    </ul>
</div>
<br/>
<div><?php echo link_to('Volver al ciclo lectivo','ciclolectivo/edit?id=' . $ciclolectivo->getId())?></div>
