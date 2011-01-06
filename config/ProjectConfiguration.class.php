<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration {
  public function setup() {
    $this->enableAllPluginsExcept('sfPropelPlugin');
  }

  public function getEnvironment() {
    if (strstr($_SERVER['HTTP_HOST'], 'archive.bristololdvic.org.uk')) {
      return 'live';
    } else if (strstr($_SERVER['HTTP_HOST'], 'bristololdvic.stevelacey.net')) {
      return 'demo';
    } else {
      return 'dev';
    }
  }
}