<?php

/**
 * Sponsor form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
class SponsorForm extends BaseSponsorForm {
  public function configure() {
    unset(
      $this['productions_list'],
      $this['created_at'], $this['updated_at']
    );
  }
}
