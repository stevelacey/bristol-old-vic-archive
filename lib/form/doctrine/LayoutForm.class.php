<?php

/**
 * Layout form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
class LayoutForm extends BaseLayoutForm {
  public function configure() {
    $this->validatorSchema['name']->setOption('required', false);

    $form = new ImageForm($this->getObject()->getImage());
    $form->getWidgetSchema()->getFormFormatter()->setRowFormat('<div>%field%%help%%error%%hidden_fields%</div>');
    unset($form['title']);

    $this->embedForm('image', $form);

    $this->mergePostValidator(new ImageValidatorSchema(null, array('require_title' => false)));

    $this->getObject()->setUpdatedAt(date('c')); // Hack to force new images on existing object to be bound.
    
    unset(
      $this['image_id'], $this['venue_id'],
      $this['created_at'], $this['updated_at']
    );
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
}