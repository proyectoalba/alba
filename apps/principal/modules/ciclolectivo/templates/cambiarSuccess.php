<?php use_helper('Object')?>
<div id="sf_admin_container">
<?php if (count($cicloslectivos) != 0) :?>
    <?php echo form_tag('ciclolectivo/actual')?>

        <div align="center">Seleccione el Ciclo Lectivo para administrar
        <br><br>
        <?php echo select_tag('ciclolectivo',objects_for_select($cicloslectivos,'getId','getDescripcion',$sf_user->getAttribute('fk_ciclolectivo_id')))?>
        <?php echo input_hidden_tag('referer', $referer) ?>
        <br><br>
        <?php echo submit_tag('Seleccionar')?>
        </div>
        
    </form>
<?php endif;?>
</div>