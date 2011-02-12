<?php

class ImageValidatorSchema extends sfValidatorSchema {
  protected function configure($options = array(), $messages = array()) {
    $this->addOption('require_title', true);
    $this->addMessage('title', 'The title is required.');
    $this->addMessage('path', 'The path is required.');
  }

  protected function doClean($values) {
    $errorSchema = new sfValidatorErrorSchema($this);
    
    foreach ($values as $key => $value) {
      if(!is_array($value)) {
        continue;
      }
      
      // no title and no path, remove the empty values
      if (($this->getOption('require_title') && !$value['title'] && !$value['path']) || (!$this->getOption('require_title') && !$value['path'])) {
        unset($values[$key]);
      } else {
        $errorSchemaLocal = new sfValidatorErrorSchema($this);

        // path is filled but no title
        if ($value['path'] && $this->getOption('require_title') && !$value['title']) {
          $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'title');
        }

        // the image is new and there is no path
        if (!$value['id'] && !$value['path']) {
          $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'path');
        }

        // some error for this embedded-form
        if (count($errorSchemaLocal)) {
          $errorSchema->addError($errorSchemaLocal, (string) $key);
        }
      }
    }

    // throws the error for the main form
    if (count($errorSchema)) {
      throw new sfValidatorErrorSchema($this, $errorSchema);
    }

    return $values;
  }
}