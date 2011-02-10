<?php

class ProductionDonationValidatorSchema extends sfValidatorSchema {
  protected function configure($options = array(), $messages = array()) {
    $this->addMessage('description', 'The description is required.');
    $this->addMessage('sponsor_id', 'The sponsor is required.');
  }

  protected function doClean($values) {
    $errorSchema = new sfValidatorErrorSchema($this);

    foreach ($values as $key => $value) {
      $errorSchemaLocal = new sfValidatorErrorSchema($this);

      // description is filled but no sponsor_id
      if ($value['description'] && !$value['sponsor_id']) {
        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'sponsor_id');
      }

      // donation is filled but no sponsor_id
      if ($value['donation'] && !$value['sponsor_id']) {
        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'sponsor_id');
      }

      // no description, donation or sponsor_id, remove the empty values
      if (!$value['donation'] && !$value['description'] && !$value['sponsor_id']) {
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