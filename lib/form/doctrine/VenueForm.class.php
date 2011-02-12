<?php

/**
 * Venue form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VenueForm extends BaseVenueForm {
  public function configure() {
    $this->embedForm('layouts', new VenueLayoutCollectionForm(null, array('venue' => $this->getObject())));
    unset($this['created_at'], $this['updated_at']);
  }

  public function saveEmbeddedForms($con = null, $forms = null) {
    if (null === $forms) {
      $forms = $this->embeddedForms;
      $layouts = $this->getValue('layouts');

      foreach($this->embeddedForms['layouts'] as $name => $form) {
        if(!isset($layouts[$name])) {
          unset($forms['layouts'][$name]);
        }
      }
    }

    return parent::saveEmbeddedForms($con, $forms);
  }

  protected function doSave($con = null) {
    if (null === $con) {
      $con = $this->getConnection();
    }

    $this->updateObject();

    foreach($this->getObject()->getLayouts() as $layout) {
      $image = $layout->getImage();

      if($image instanceOf Image && $image->getPath()) {
        $image->setTitle($layout->getName());
      }
    }

    $this->getObject()->save($con);

    // embedded forms
    $this->saveEmbeddedForms($con);
  }
}