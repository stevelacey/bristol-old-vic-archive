<?php

/**
 * ProductionImage form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductionImageCollectionForm extends sfForm {
  public function configure() {
    if(!$production = $this->getOption('production')) {
      throw new InvalidArgumentException('You must provide a production object.');
    }

    /* Production Shot Image */
    $shot = $production->getShot();

    if(!$shot instanceOf Image) {
      $shot = new Image();
      $production->setShot($shot);
    }

    /* Set Design Image */
    $design = $production->getSetDesign();

    if(!$design instanceOf Image) {
      $design = new Image();
      $production->setSetDesign($design);
    }

    $this->embedForm('production shot', new ImageForm($shot));
    $this->embedForm('set design', new ImageForm($design));

    $this->mergePostValidator(new ImageValidatorSchema());
  }
}