<?php

/**
 * Donation filter form base class.
 *
 * @package    bristol-old-vic-archive
 * @subpackage filter
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseDonationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'production_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Production'), 'add_empty' => true)),
      'sponsor_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Sponsor'), 'add_empty' => true)),
      'amount'        => new sfWidgetFormFilterInput(),
      'description'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'production_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Production'), 'column' => 'id')),
      'sponsor_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Sponsor'), 'column' => 'id')),
      'amount'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'description'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('donation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Donation';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'production_id' => 'ForeignKey',
      'sponsor_id'    => 'ForeignKey',
      'amount'        => 'Number',
      'description'   => 'Text',
    );
  }
}
