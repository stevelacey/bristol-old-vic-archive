<?php

/**
 * ProductionGenre form base class.
 *
 * @method ProductionGenre getObject() Returns the current form's model object
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseProductionGenreForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'production_id' => new sfWidgetFormInputHidden(),
      'genre_id'      => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'production_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('production_id')), 'empty_value' => $this->getObject()->get('production_id'), 'required' => false)),
      'genre_id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('genre_id')), 'empty_value' => $this->getObject()->get('genre_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('production_genre[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductionGenre';
  }

}
