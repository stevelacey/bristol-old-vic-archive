<?php

/**
 * Character form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CharacterForm extends BaseCharacterForm {
  public function configure() {
    $this->widgetSchema['performer_id']->setOption('add_empty', true);

    $this->validatorSchema['name']->setOption('required', false);
    $this->validatorSchema['performer_id']->setOption('required', false);

    unset(
      $this['production_id'],
      $this['created_at'], $this['updated_at']
    );
  }
}