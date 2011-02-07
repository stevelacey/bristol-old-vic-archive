<?php

/**
 * Production staff collection form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 */
class ProductionStaffCollectionForm extends sfForm {
  public function configure() {
    if(!$production = $this->getOption('production')) {
      throw new InvalidArgumentException('You must provide a production object.');
    }

    foreach(Doctrine::getTable('Department')->findAll() as $department) {
      foreach($department->getRoles() as $role) {
        $productionStaff = Doctrine::getTable('ProductionStaff')->findOneByProductionRole($production, $role);

        if(!$productionStaff instanceOf ProductionStaff) {
          $productionStaff = new ProductionStaff();
          $productionStaff->setProduction($production);
          $productionStaff->setRole($role);
        }

        $productionStaffForm = new ProductionStaffForm($productionStaff);

        $productionStaffForm->widgetSchema['staff_id'] = new sfWidgetFormDoctrineChoice(array(
          'model' => 'Staff',
          'add_empty' => true
        ));

        $productionStaffForm->validatorSchema['staff_id'] = new sfValidatorDoctrineChoice(array(
          'model' => 'Staff',
          'required' => false
        ));

        $this->embedForm($role->getName(), $productionStaffForm);
      }
    }
      $this->mergePostValidator(new ProductionStaffValidatorSchema());
  }
}