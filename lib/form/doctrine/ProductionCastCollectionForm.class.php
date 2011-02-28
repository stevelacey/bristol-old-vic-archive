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

    for($i=$characters->count()+1; $i<=$characters->count()+10; $i++) {
      $character = new Character();
      $character->setProduction($production);;
      $this->embedForm('Character '.$i, new CharacterForm($character));
    }
    
    $this->mergePostValidator(new ProductionCastValidatorSchema());
  }
}