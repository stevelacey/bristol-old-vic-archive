<?php

/**
 * Genre form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GenreForm extends BaseGenreForm {
  public function configure() {
    unset($this['created_at'], $this['updated_at']);
  }
}