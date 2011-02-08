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

    $this->widgetSchema['performer_id'] = new sfWidgetFormDoctrineChoice(array(
      'model' => 'Performer',
      'add_empty' => true
    ));

    unset(
      $this['production_id'], $this['image_id'],
      $this['created_at'], $this['updated_at']
    );
  }
}