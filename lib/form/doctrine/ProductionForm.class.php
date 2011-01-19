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

    // Existing performance forms
    $this->embedRelation('Performances');

    // Performance creation form
    $newPerformanceForm = new PerformanceForm();
    $newPerformanceForm->setDefault('production_id', $this->object->getId());
    $this->embedForm('Add Performance', $newPerformanceForm);

    unset(
      $this['image_id'],
      $this['created_at'], $this['updated_at']
    );
  }
}