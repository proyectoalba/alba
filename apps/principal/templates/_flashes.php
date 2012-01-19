<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="notice"><?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?></div>
<?php endif; ?>

<?php if ($sf_user->hasFlash('error')): ?>
  <div class="error"><?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?></div>
<?php endif; ?>
<?php if ($sf_request->hasErrors()): ?>
<div class="form-errors">
    <h2><?php echo __('There are some errors that prevent the form to validate') ?></h2>
    <ul>
        <?php foreach ($sf_request->getErrorNames() as $name): ?>
          <li title="<?php echo $name?>"><?php echo $sf_request->getError($name) ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif;?>
