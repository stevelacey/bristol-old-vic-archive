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
    $this->embedRelation('Image');
    $this->mergePostValidator(new ImageValidatorSchema());

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
}