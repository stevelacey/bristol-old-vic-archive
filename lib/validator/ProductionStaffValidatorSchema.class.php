<?php

class ProductionStaffValidatorSchema extends sfValidatorSchema {
  protected function doClean($values) {

    foreach($values as $key => $value) {
      if (!$value['staff_id']) {
        unset($values[$key]);
      }
    }

    return $values;
  }
}