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
    /* Widgets */
    $this->widgetSchema['layout_id'] = new sfWidgetFormDoctrineChoice(array(
      'model' => 'Layout',
      'method' => 'getVenueLayoutString',
      'add_empty' => true,
      'table_method' => 'findAllOrderedByVenue'
    ));

    /* Labels */
    $this->widgetSchema['start_at'] = new sfWidgetFormDateUK(array('label' => 'Performances start'));
    $this->widgetSchema['end_at'] = new sfWidgetFormDateUK(array('label' => 'Performances end'));

    /* Collection Forms */
    $this->embedForm('images', new ProductionImageCollectionForm(null, array('production' => $this->getObject())));
    $this->embedForm('staff', new ProductionStaffCollectionForm(null, array('production' => $this->getObject())));
    $this->embedForm('cast', new ProductionCastCollectionForm(null, array('production' => $this->getObject())));
    $this->embedForm('donations', new ProductionDonationCollectionForm(null, array('production' => $this->getObject())));

    $this->getObject()->setUpdatedAt(date('c')); // Hack to force new images on existing object to be bound.

    /* Remove Fields */
    unset(
      $this['shot_image_id'], $this['set_design_image_id'],
      $this['staff_list'], $this['funders_list'], $this['roles_list'],
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

      foreach(array('images', 'cast', 'donations') as $formName) {
        $value = $this->getValue($formName);

        foreach($this->embeddedForms[$formName] as $name => $form) {
          if(!isset($value[$name])) {
            unset($forms[$formName][$name]);
          }
        }
      }
    }

    return parent::saveEmbeddedForms($con, $forms);
  }
}