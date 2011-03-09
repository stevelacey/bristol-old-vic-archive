<?php use_helper('I18N') ?>

<?php include_partial('sfAdminDash/flash') ?>

<div id="ctr" align="center">
  <div class="login">
    <div class="login-form">
      <h2><?php echo __('Hello %name%', array('%name%' => $user->getName()), 'sf_guard') ?></h2>

      <h3><?php echo __('Enter your new password in the form below.', null, 'sf_guard') ?></h3>

      <form action="<?php echo url_for('@sf_guard_forgot_password_change?unique_key='.$sf_request->getParameter('unique_key')) ?>" method="POST">
        <table>
          <tbody>
            <?php echo $form ?>
          </tbody>
          <tfoot><tr><td><input type="submit" name="change" value="<?php echo __('Change', null, 'sf_guard') ?>" /></td></tr></tfoot>
        </table>
      </form>
    </div>
    <div class="login-text">
      <div class="ctr"><img alt="Security" src="<?php echo image_path(sfAdminDash::getProperty('web_dir', '/sfAdminDashPlugin').'/images/login_security.png'); ?>" /></div>
    </div>

    <div class="clr"></div>
  </div>
</div>