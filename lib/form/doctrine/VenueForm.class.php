<?php

/**
 * Venue form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VenueForm extends BaseVenueForm {
  /**
   * Layouts scheduled for deletion
   * @var array
   */
  protected $scheduledForDeletion = array();

  public function configure() {
    // Existing layout forms
    $this->embedRelation('Layouts');

    // Layout creation form
    $newLayout = new Layout();
    $newLayout->setVenue($this->getObject());
    $newLayoutForm = new LayoutForm($newLayout);
    $this->embedForm('New Layout', $newLayoutForm);
  }

  /**
   * Here we just drop the layout embedded creation form if no value has been
   * provided for it (it somewhat simulates a non-required embedded form)
   *
   * @see sfForm::doBind()
   */
  protected function doBind(array $values) {
    if ('' === trim($values['New Layout']['name'])) {
      unset($values['New Layout'], $this['New Layout']);
    }

    if (isset($values['Layouts'])) {
      foreach ($values['Layouts'] as $i => $layoutValues) {
        if (isset($layoutValues['delete']) && $layoutValues['id']) {
          $this->scheduledForDeletion[$i] = $layoutValues['id'];
        }
      }
    }

    parent::doBind($values);
  }

  /**
   * Updates object with provided values, dealing with eventual relation deletion
   *
   * @see sfFormDoctrine::doUpdateObject()
   */
  protected function doUpdateObject($values) {
    if (count($this->scheduledForDeletion)) {
      foreach ($this->scheduledForDeletion as $index => $id) {
        unset($values['Layouts'][$index]);
        unset($this->object['Layouts'][$index]);
        Doctrine::getTable('Layout')->findOneById($id)->delete();
      }
    }

    $this->getObject()->fromArray($values);
  }

  /**
   * Saves embedded form objects.
   *
   * @param mixed $con   An optional connection object
   * @param array $forms An array of forms
   */
  public function saveEmbeddedForms($con = null, $forms = null) {
    if (null === $con) {
      $con = $this->getConnection();
    }

    if (null === $forms) {
      $forms = $this->embeddedForms;
    }

    foreach ($forms as $form) {
      if ($form instanceof sfFormObject) {
        if (!in_array($form->getObject()->getId(), $this->scheduledForDeletion)) {
          $form->saveEmbeddedForms($con);
          $form->getObject()->save($con);
        }
      } else {
        $this->saveEmbeddedForms($con, $form->getEmbeddedForms());
      }
    }
  }
}