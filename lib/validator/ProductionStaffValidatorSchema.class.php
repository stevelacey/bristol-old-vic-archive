<?php

class ProductionStaffValidatorSchema extends sfValidatorSchema {
  protected function doClean($values) {

    foreach($values as $department => $roles) {
      foreach($roles as $key => $value) {
        if (!$value['staff_id']) {
          unset($values[$department][$key]);
        }
      }
    }

    return $values;
  }
}