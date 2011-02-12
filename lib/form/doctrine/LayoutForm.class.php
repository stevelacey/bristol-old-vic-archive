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
    $this->embedRelation('Image');
    $this->mergePostValidator(new ImageValidatorSchema());

    if(!$this->isNew() && !$this->getObject()->getProductions()->count()) {
      $this->widgetSchema['delete'] = new sfWidgetFormInputCheckbox();

      $this->validatorSchema['delete'] = new sfValidatorPass();
    }

    $this->getObject()->setUpdatedAt(date('c')); // Hack to force new images on existing object to be bound.
    
    unset(
      $this['image_id'], $this['venue_id'],
      $this['created_at'], $this['updated_at']
    );
  }
}