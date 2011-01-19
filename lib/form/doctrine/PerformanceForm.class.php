<?php

/**
 * Performance form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PerformanceForm extends BasePerformanceForm {
  public function configure() {
    // Existing show forms
    $this->embedRelation('Shows');

    // Show creation form
    $show = new Show();
    $show->setPerformance($this->getObject());
    $this->embedForm('Add Show', new ShowForm($show));

    unset(
      $this['production_id'],
      $this['created_at'], $this['updated_at']
    );
  }
}