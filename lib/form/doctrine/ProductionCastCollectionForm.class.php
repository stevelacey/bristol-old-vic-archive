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
      $characterForm = new CharacterForm($character);
      $this->addForm($character->getName(), $character);
    }

    for($i=$characters->count()+1; $i<=$characters->count()+10; $i++) {
      $character = new Character();
      $character->setProduction($production);;
      $this->addForm('Performer '.$i, $character);
    }
    
    $this->mergePostValidator(new ProductionCastValidatorSchema());
  }

  private function addForm($formName, Character $character) {
    $characterForm = new CharacterForm($character);

    $characterForm->widgetSchema['performer_id']->setOption('add_empty', true);

    $characterForm->validatorSchema['name']->setOption('required', false);
    $characterForm->validatorSchema['performer_id']->setOption('required', false);

    $this->embedForm($formName, $characterForm);
  }
}