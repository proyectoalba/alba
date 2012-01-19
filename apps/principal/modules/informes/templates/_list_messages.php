<?php if ($sf_request->getError('delete')): ?>
<div class="form-errors">
  <h2>Could not delete the selected Informe</h2>
  <ul>
    <li><?php echo $sf_request->getError('delete') ?></li>
  </ul>
</div>
<?php endif; ?>
