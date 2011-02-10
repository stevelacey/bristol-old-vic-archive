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
    $this->widgetSchema['start_at'] = new sfWidgetFormDateUK(array('label' => 'Performances start'));
    $this->widgetSchema['end_at'] = new sfWidgetFormDateUK(array('label' => 'Performances end'));

    $this->embedForm('staff', new ProductionStaffCollectionForm(null, array('production' => $this->getObject())));
    $this->embedForm('cast', new ProductionCastCollectionForm(null, array('production' => $this->getObject())));
//    $this->embedForm('sponsors', new ProductionSponsorCollectionForm(null, array('production' => $this->getObject())));

    unset(
      $this['image_id'],
      $this['staff_list'], $this['sponsors_list'], $this['roles_list'],
      $this['created_at'], $this['updated_at']
    );
  }

  public function saveEmbeddedForms($con = null, $forms = null) {
    if (null === $forms) {
      $forms = $this->embeddedForms;
      $roles = $this->getValue('staff');

      foreach(Doctrine::getTable('Department')->findAll() as $department) {
        foreach($this->embeddedForms['staff']->embeddedForms[$department->getName()] as $name => $form) {
          if (!isset($roles[$department->getName()][$name])) {
            unset($forms['staff']->widgetSchema[$department->getName()][$name]);
            unset($forms['staff']->validatorSchema[$department->getName()][$name]);
            unset($forms['staff']->defaults[$department->getName()][$name]);
            unset($forms['staff']->taintedValues[$department->getName()][$name]);
            unset($forms['staff']->values[$department->getName()][$name]);
            unset($forms['staff']->embeddedForms[$department->getName()][$name]);
          }
        }
      }

      $cast = $this->getValue('cast');

      foreach($this->embeddedForms['cast'] as $name => $form) {
        if(!isset($cast[$name])) {
          unset($forms['cast'][$name]);
        }
      }
    }

    return parent::saveEmbeddedForms($con, $forms);
  }
}