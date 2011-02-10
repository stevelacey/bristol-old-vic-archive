<?php

/**
 * ProductionSponsor filter form base class.
 *
 * @package    bristol-old-vic-archive
 * @subpackage filter
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseProductionSponsorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'donation'      => new sfWidgetFormFilterInput(),
      'description'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'donation'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'description'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('production_sponsor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductionSponsor';
  }

  public function getFields()
  {
    return array(
      'production_id' => 'Number',
      'sponsor_id'    => 'Number',
      'donation'      => 'Number',
      'description'   => 'Text',
    );
  }
}
