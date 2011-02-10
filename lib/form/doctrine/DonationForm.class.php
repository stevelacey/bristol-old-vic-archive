<?php

/**
 * Donation form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
class DonationForm extends BaseDonationForm {
  public function configure() {
    $this->widgetSchema['sponsor_id']->setOption('add_empty', true);

    $this->validatorSchema['sponsor_id']->setOption('required', false);
    $this->validatorSchema['description']->setOption('required', false);

    unset(
      $this['production_id'],
      $this['created_at'], $this['updated_at']
    );
  }
}