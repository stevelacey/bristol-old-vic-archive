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
    $form = new ImageForm($this->getObject()->getImage());
    $form->getWidgetSchema()->getFormFormatter()->setRowFormat('<div>%field%%help%%error%%hidden_fields%</div>');
    unset($form['title']);

    $this->embedForm('image', $form);

    $this->mergePostValidator(new ImageValidatorSchema(null, array('require_title' => false)));

    $this->getObject()->setUpdatedAt(date('c')); // Hack to force new images on existing object to be bound.

    unset($this['image_id'], $this['created_at'], $this['updated_at']);
  }

  public function saveEmbeddedForms($con = null, $forms = null) {
    if (null === $forms) {
      $forms = $this->embeddedForms;
      $value = $this->getValue('image');

      foreach($this->embeddedForms['image'] as $name => $form) {
        if(!isset($value[$name])) {
          unset($forms['image']);
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

    $image = $this->getObject()->getImage();

    if($image instanceOf Image && $image->getPath()) {
      $image->setTitle($this->getObject()->getName());
    }

    $this->getObject()->save($con);

    // embedded forms
    $this->saveEmbeddedForms($con);
  }
}