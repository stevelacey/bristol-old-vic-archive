<?php

class ProductionCastValidatorSchema extends sfValidatorSchema {
  protected function configure($options = array(), $messages = array()) {
    $this->addMessage('name', 'The name is required.');
    $this->addMessage('performer_id', 'The performer is required.');
  }

  protected function doClean($values) {
    $errorSchema = new sfValidatorErrorSchema($this);

    foreach ($values as $key => $value) {
      $errorSchemaLocal = new sfValidatorErrorSchema($this);

      // performer_id is filled but no name
      if ($value['performer_id'] && !$value['name']) {
        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'name');
      }

      // name is filled but no performer_id
      if ($value['name'] && !$value['performer_id']) {
        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'performer_id');
      }

      // no name and no performer_id, remove the empty values
      if (!$value['performer_id'] && !$value['name']) {
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