<?php

/**
 * Layout filter form base class.
 *
 * @package    bristol-old-vic-archive
 * @subpackage filter
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseLayoutFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'venue_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Venue'), 'add_empty' => true)),
      'capacity' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'     => new sfValidatorPass(array('required' => false)),
      'venue_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Venue'), 'column' => 'id')),
      'capacity' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('layout_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Layout';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'name'     => 'Text',
      'venue_id' => 'ForeignKey',
      'capacity' => 'Number',
    );
  }
}
