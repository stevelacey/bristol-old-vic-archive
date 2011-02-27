<?php use_helper('I18N') ?>

<div id='sf_admin_theme_footer'>
  <cite><?php echo __('Copyright &copy; %current_year% <a href="%organisation_website%">%organisation_name%</a>. All rights reserved', array('%current_year%' => date('Y'), '%organisation_name%' => sfConfig::get('app_organisation_name'), '%organisation_website%' => sfConfig::get('app_organisation_website')), 'sf_admin_dash'); ?></cite>
  <span><?php echo __('<a href="%developer_website%">Web Development</a> by <a href="%developer_website%">%developer_name%</a>.', array('%developer_name%' => sfConfig::get('app_developer_name'), '%developer_website%' => sfConfig::get('app_developer_website')), 'sf_admin_dash'); ?></span>
</div>