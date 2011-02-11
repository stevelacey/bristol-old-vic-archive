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
    
    unset($this['image_id'], $this['venue_id']);
  }
}