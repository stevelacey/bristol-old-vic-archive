<?php

/**
 * Venue filter form base class.
 *
 * @package    bristol-old-vic-archive
 * @subpackage filter
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseVenueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telephone' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'      => new sfValidatorPass(array('required' => false)),
      'telephone' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('venue_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Venue';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'name'      => 'Text',
      'telephone' => 'Text',
    );
  }
}
