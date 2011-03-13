<?php

/**
 * Production staff collection form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 */
class ProductionCastCollectionForm extends sfForm {
  public function configure() {
    if(!$production = $this->getOption('production')) {
      throw new InvalidArgumentException('You must provide a production object.');
    }

    $characters = $production->getCharacters();

    foreach($characters as $character) {
      $this->embedForm($character->getName(), new CharacterForm($character));
    }

    $min = sfConfig::get('app_forms_min_production_character_forms');
    $min_blank = sfConfig::get('app_forms_min_production_character_blank_forms');

    $forms_to_render = $characters->count() + $min_blank > $min ? $characters->count() + $min_blank : $min;

    for($i=$characters->count()+1; $i<=$forms_to_render; $i++) {
      $character = new Character();
      $character->setProduction($production);
      $this->embedForm('Character '.$i, new CharacterForm($character));
    }
    
    $this->mergePostValidator(new ProductionCastValidatorSchema());
  }
}