<?php

/**
 * sfGuardUser form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends sfGuardUserAdminForm {
  public function configure() {
    $this->widgetSchema->setHelp('is_super_admin', 'Only super administrators have access to the user module, and thus can add/edit/delete users.');
    $this->widgetSchema->setHelp('is_active', 'Only active users can login to the archive, this option is available if you need to disable a user\'s account without deleting them from the system.');
  }
}