<?php

/**
 * Venue layout collection form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 */
class VenueLayoutCollectionForm extends sfForm {
  public function configure() {
    if(!$venue = $this->getOption('venue')) {
      throw new InvalidArgumentException('You must provide a venue object.');
    }

    $layouts = $venue->getLayouts()->getData();

    for($i=0; $i<sfConfig::get('app_forms_min_venue_layout_blank_forms'); $i++) {
      $layouts[] = new Layout();
    }

    foreach($layouts as $i => $layout) {
      $layout->setVenue($venue);
      $this->embedForm('Layout '.($i + 1), new LayoutForm($layout));
    }

    $this->mergePostValidator(new VenueLayoutValidatorSchema());
  }
}