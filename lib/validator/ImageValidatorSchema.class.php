<?php

class ImageValidatorSchema extends sfValidatorSchema {
  protected function configure($options = array(), $messages = array()) {
    $this->addMessage('title', 'The title is required.');
    $this->addMessage('path', 'The path is required.');
  }

  protected function doClean($values) {
    $errorSchema = new sfValidatorErrorSchema($this);
    
    foreach ($values as $key => $value) {
      if(!is_array($value)) {
        continue;
      }
      
      $errorSchemaLocal = new sfValidatorErrorSchema($this);
      
      // path is filled but no title
      if ($value['path'] && !$value['title']) {
        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'title');
      }

      // title is filled but no path
      if (!$value['id'] && $value['title'] && !$value['path']) {
        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'path');
      }

      // no title and no path, remove the empty values
      if (!$value['path'] && !$value['title']) {
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