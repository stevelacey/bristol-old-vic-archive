<?php

/**
 * Production staff collection form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 */
class ProductionDonationCollectionForm extends sfForm {
  public function configure() {
    if(!$production = $this->getOption('production')) {
      throw new InvalidArgumentException('You must provide a production object.');
    }

    $donations = $production->getDonations()->getData();

    for($i=0; $i<sfConfig::get('app_forms_min_production_donation_blank_forms'); $i++) {
      $donations[] = new Donation();
    }

    foreach($donations as $i => $donation) {
      $donation->setProduction($production);
      $this->embedForm('Donation '.($i + 1), new DonationForm($donation));
    }
    
    $this->mergePostValidator(new ProductionDonationValidatorSchema());
  }
}