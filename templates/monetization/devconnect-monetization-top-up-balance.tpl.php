<?php

?>
<div id="topUpBalanceContainer" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="topUpBalanceContainerLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="topUpLabel"><?php print t('Add Money to Account'); ?><span id="currency_title"></span></h3>
        <div id="topup_alert_minimum_required" class="alert alert-error hide">
          <?php print t('You have to add at least !minimum_amount to your account.', array('!minimum_amount' => '<span id="span-minimum-amount">0</span>')); ?>
        </div>
        <div id="topup_alert_maximum_required" class="alert alert-error hide">
          <?php print t('You cannot add more than !max_amount to your account.', array('!max_amount' => '<span id="span-maximum-amount">0</span>')); ?>
        </div>
      </div>
      <div class="modal-body">
        <p>To add money to your account you will be taken to World Pay to process your payment.<br />Please enter the desired balance amount below.</p>
        <?php print drupal_render($form['currency_id']); ?>
        <?php print drupal_render($form['current_balance']); ?>
        <?php print drupal_render($form['top_up_amount']); ?>
        <?php print drupal_render($form['new_balance']); ?>
      </div>
      <div class="modal-footer">
        <?php print drupal_render($form['submit']); ?>
        <a class="btn" data-dismiss="modal" aria-hidden="true">Cancel</a>
      </div>
    </div>
  </div>
</div>
<?php print drupal_render_children($form); ?>
