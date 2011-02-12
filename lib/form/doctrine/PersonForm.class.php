<?php

/**
 * Person form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PersonForm extends BasePersonForm {
  public function configure() {

    $image = $this->getObject()->getImage();

    if(!$image instanceOf Image) {
      $image = new Image();
    }

    $form = new ImageForm($image);
    unset($form['title']);

    $this->embedForm('Image', $form);
    $this->mergePostValidator(new ImageValidatorSchema(null, array('require_title' => false)));

    $this->getObject()->setUpdatedAt(date('c')); // Hack to force new images on existing object to be bound.

    unset($this['image_id'], $this['created_at'], $this['updated_at']);
  }

  public function saveEmbeddedForms($con = null, $forms = null) {
    if (null === $forms) {
      $forms = $this->embeddedForms;
      $value = $this->getValue('Image');

      foreach($this->embeddedForms['Image'] as $name => $form) {
        if(!isset($value[$name])) {
          unset($forms['Image'][$name]);
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

    $this->getObject()->save($con);

    $image = $this->getObject()->getImage();

    if($image instanceOf Image) {
      $image->setTitle($this->getObject()->getName());
    }

    // embedded forms
    $this->saveEmbeddedForms($con);
  }
}