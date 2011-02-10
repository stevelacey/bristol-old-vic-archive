<?php

/**
 * Production staff collection form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 */
class ProductionSponsorCollectionForm extends sfForm {
  public function configure() {
    if(!$production = $this->getOption('production')) {
      throw new InvalidArgumentException('You must provide a production object.');
    }

    $sponsors = $production->getProductionSponsors();

    foreach($sponsors as $sponsor) {
      $sponsorForm = new ProductionSponsorForm($sponsor);
      $this->addForm($sponsor->getName(), $sponsor);
    }

    for($i=$sponsors->count()+1; $i<=$sponsors->count()+10; $i++) {
      $sponsor = new ProductionSponsor();
      $sponsor->setProduction($production);;
      $this->addForm('ProductionSponsor '.$i, $sponsor);
    }
    
//    $this->mergePostValidator(new ProductionProductionSponsorValidatorSchema());
  }

  private function addForm($formName, ProductionSponsor $sponsor) {
    $sponsorForm = new ProductionSponsorForm($sponsor);

    $sponsorForm->widgetSchema['sponsor_id']->setOption('add_empty', true);

    $sponsorForm->validatorSchema['name']->setOption('required', false);
    $sponsorForm->validatorSchema['sponsor_id']->setOption('required', false);

    $this->embedForm($formName, $sponsorForm);
  }
}