<?php use_helper('I18N') ?>

<?php include_partial('sfAdminDash/flash') ?>

<div id="ctr" align="center">
  <div class="login">
    <div class="login-form">
      <h2><?php echo __('Hello %name%', array('%name%' => $user->getName()), 'sf_guard') ?></h2>
      <h3><?php echo __('Enter your new password in the form below.', null, 'sf_guard') ?></h3>

      <form action="<?php echo url_for('@sf_guard_forgot_password_change?unique_key='.$sf_request->getParameter('unique_key')) ?>" method="POST">
        <div class="form-block">
          <?php echo $form->renderGlobalErrors(); ?>
          <?php if(isset($form['id'])): ?>
            <?php echo $form['id']->render(); ?>
			    <?php endif; ?>
          <?php if(isset($form['_csrf_token'])): ?>
            <?php echo $form['_csrf_token']->render(); ?>
			    <?php endif; ?>
          <div class="inputlabel"><?php echo $form['password']->renderLabel(__('Password', array(), 'sf_admin_dash')); ?>:</div>
          <div>
            <?php echo $form['password']->renderError(); ?>
            <?php echo $form['password']->render(array('class' => 'inputbox')); ?>
          </div>
          <div class="inputlabel"><?php echo $form['password_again']->renderLabel(__('Re-type password', array(), 'sf_admin_dash')); ?>:</div>
          <div>
            <?php echo $form['password_again']->renderError(); ?>
            <?php echo $form['password_again']->render(array('class' => 'inputbox')); ?>
          </div>
          <div align="left"><input type="submit" name="change" class="button clr" value="<?php echo __('Change password', null, 'sf_guard') ?>" /></div>
        </div>
      </form>
    </div>
    <div class="login-text">
      <div class="ctr"><img alt="Security" src="<?php echo image_path(sfAdminDash::getProperty('web_dir', '/sfAdminDashPlugin').'/images/login_security.png'); ?>" /></div>
    </div>

    <div class="clr"></div>
  </div>
</div>