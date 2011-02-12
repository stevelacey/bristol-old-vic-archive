<?php

class VenueLayoutValidatorSchema extends sfValidatorSchema {
  protected function configure($options = array(), $messages = array()) {
    $this->addMessage('name', 'The name is required.');
  }

  protected function doClean($values) {
    $errorSchema = new sfValidatorErrorSchema($this);

    foreach ($values as $key => $value) {
      $errorSchemaLocal = new sfValidatorErrorSchema($this);

      // capacity is filled but no name
      if ($value['capacity'] && !$value['name']) {
        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'name');
      }

      // image is filled but no name
      if (isset($value['image']) && !$value['name']) {
        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'name');
      }

      // no name and no capacity, remove the empty values
      if (!$value['name'] && !$value['capacity']) {
        unset($values[$key]);
      }

      // some error for this embedded-form
      if (count($errorSchemaLocal)) {
        $errorSchema->addError($errorSchemaLocal, (string) $key);
      }
    }

    // throws the error for the main form
    if (count($errorSchema)) {
      throw new sfValidatorErrorSchema($this, $errorSchema);
    }

    return $values;
  }
}