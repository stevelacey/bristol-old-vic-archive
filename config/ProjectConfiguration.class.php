<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration {
  public function setup() {
    $this->enableAllPluginsExcept('sfPropelPlugin');

    // Check if being executed on UWE servers (cli-compatible for elsewhere).
    if(strpos(__FILE__, '/students/') !== false) {
      self::setUWEGlobals();
    }
  }

  public function getEnvironment() {
    if (strstr($_SERVER['HTTP_HOST'], 'archive.bristololdvic.org.uk')) {
      return 'live';
    } else if (strstr($_SERVER['HTTP_HOST'], 'bristololdvic.demo.stevelacey.net')) {
      return 'demo';
    } else {
      return 'dev';
    }
  }

  public function configureDoctrine(Doctrine_Manager $manager) {
    $manager->setAttribute(Doctrine::ATTR_QUOTE_IDENTIFIER, true);
  }
  
  public function setUWEGlobals() {
    // Standardise UWE variables
    if(php_sapi_name() != 'cli') {
      // Fix www.cems URI encoding
      $_SERVER['REQUEST_URI'] = urldecode($_SERVER['REQUEST_URI']);

      // Correct comma deliminated URIs
      $_SERVER['HTTP_X_FORWARDED_HOST'] = current(explode(', ', $_SERVER['HTTP_X_FORWARDED_HOST']));
      $_SERVER['HTTP_X_FORWARDED_SERVER'] = current(explode(', ', $_SERVER['HTTP_X_FORWARDED_SERVER']));
    }
  }
}
