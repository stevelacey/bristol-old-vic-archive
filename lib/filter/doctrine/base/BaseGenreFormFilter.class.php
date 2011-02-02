<?php

/**
 * Genre filter form base class.
 *
 * @package    bristol-old-vic-archive
 * @subpackage filter
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseGenreFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'productions_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Production')),
    ));

    $this->setValidators(array(
      'name'             => new sfValidatorPass(array('required' => false)),
      'productions_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Production', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('genre_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addProductionsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ProductionGenre ProductionGenre')
      ->andWhereIn('ProductionGenre.production_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Genre';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'name'             => 'Text',
      'productions_list' => 'ManyKey',
    );
  }
}
