<?php

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$env = ProjectConfiguration::getEnvironment();
$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', $env, in_array($env, array('dev')));
sfContext::createInstance($configuration)->dispatch();