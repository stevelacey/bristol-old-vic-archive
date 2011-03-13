<?php use_helper('I18N') ?>

<?php include_partial('sfAdminDash/flash') ?>

<div id="ctr" align="center">
  <div class="login">
    <div class="login-form">
      <form action="<?php echo url_for('@sf_guard_forgot_password') ?>" method="post">
        <h2><?php echo __('Forgot your password?', null, 'sf_guard') ?></h2>
        <div class="form-block">
          <?php echo $form->renderGlobalErrors(); ?>
          <?php if(isset($form['_csrf_token'])): ?>
            <?php echo $form['_csrf_token']->render(); ?>
			    <?php endif; ?>
          <div class="inputlabel"><?php echo $form['email_address']->renderLabel(__('Username/E-mail Address', array(), 'sf_admin_dash')); ?>:</div>
          <div>
            <?php echo $form['email_address']->renderError(); ?>
            <?php echo $form['email_address']->render(array('class' => 'inputbox')); ?>
          </div>
          <div align="left"><input type="submit" name="change" class="button clr" value="<?php echo __('Request', null, 'sf_guard') ?>" /></div>
        </div>
      </form>
      <?php echo link_to('Back to login', '@sf_guard_signin') ?>
    </div>
    <div class="login-text">
      <div class="ctr"><img alt="Security" src="<?php echo image_path(sfAdminDash::getProperty('web_dir', '/sfAdminDashPlugin').'/images/login_security.png'); ?>" /></div>
      <p><?php echo __('Do not worry, we can help you get back in to your account safely!', null, 'sf_guard') ?></p>
      <p><?php echo __('Fill out the form below to request an e-mail with information on how to reset your password.', null, 'sf_guard') ?></p>
    </div>
    <div class="clr"></div>
  </div>
</div>