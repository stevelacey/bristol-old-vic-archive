<?php

/**
 * Production form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductionForm extends BaseProductionForm {
  public function configure() {
    $this->widgetSchema['start_at'] = new sfWidgetFormDate();
    $this->widgetSchema['end_at'] = new sfWidgetFormDate();

    $form = new ProductionStaffCollectionForm(null, array(
      'production' => $this->getObject()
    ));

    $this->embedForm('staff', $form);

    unset(
      $this['image_id'],
      $this['staff_list'], $this['sponsors_list'], $this['roles_list'],
      $this['created_at'], $this['updated_at']
    );
  }

  public function saveEmbeddedForms($con = null, $forms = null) {
    if (null === $forms) {
      $roles = $this->getValue('staff');
      $forms = $this->embeddedForms;
      foreach ($this->embeddedForms['staff'] as $name => $form) {
        if (!isset($roles[$name])) {
          unset($forms['staff'][$name]);
        }
      }
    }
    
    return parent::saveEmbeddedForms($con, $forms);
  }
}