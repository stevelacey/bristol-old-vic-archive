<?php

class ProductionDonationValidatorSchema extends sfValidatorSchema {
  protected function configure($options = array(), $messages = array()) {
    $this->addMessage('description', 'The description is required.');
    $this->addMessage('funder_id', 'The funder is required.');
  }

  protected function doClean($values) {
    $errorSchema = new sfValidatorErrorSchema($this);

    foreach ($values as $key => $value) {
      $errorSchemaLocal = new sfValidatorErrorSchema($this);

      // description is filled but no funder_id
      if ($value['description'] && !$value['funder_id']) {
        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'funder_id');
      }

      // amount is filled but no funder_id
      if ($value['amount'] && !$value['funder_id']) {
        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'funder_id');
      }

      // no description, amount or funder_id, remove the empty values
      if (!$value['amount'] && !$value['description'] && !$value['funder_id']) {
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