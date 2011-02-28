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
      $form = new sfForm();

      $form->widgetSchema->setFormFormatterName('list');
      $form->widgetSchema->getFormFormatter()->setRowFormat('<li>%field%%help%%error%%hidden_fields%</li>');
      
      foreach($department->getRoles() as $role) {
        $productionStaff = Doctrine::getTable('ProductionStaff')->findOneByProductionRole($production, $role);

        if(!$productionStaff instanceOf ProductionStaff) {
          $productionStaff = new ProductionStaff();
          $productionStaff->setProduction($production);
          $productionStaff->setRole($role);
        }

        $productionStaffForm = new ProductionStaffForm($productionStaff);
        $productionStaffForm->widgetSchema->setFormFormatterName('list');
        $productionStaffForm->widgetSchema->getFormFormatter()->setDecoratorFormat('%content%');

        $productionStaffForm->widgetSchema->getFormFormatter()->setRowFormat('%label%%field%%help%%error%%hidden_fields%');
        $productionStaffForm->widgetSchema['staff_id']->setOption('add_empty', true);
        $productionStaffForm->widgetSchema['staff_id']->setLabel($role->getName());

        $productionStaffForm->validatorSchema['staff_id']->setOption('required', false);
        
        $form->embedForm($role->getName(), $productionStaffForm);
      }

      $this->embedForm($department->getName(), $form);
    }
    
    $this->mergePostValidator(new ProductionStaffValidatorSchema());
  }
}