<?php

function link_to_frontend() {
  // for BC with 1.1
  $arguments = func_get_args();
  if (empty($arguments[1]) || is_array($arguments[1]) || '@' == substr($arguments[1], 0, 1) || false !== strpos($arguments[1], '/')) {
    return call_user_func_array('link_to_frontend1', $arguments);
  } else {
    if (!array_key_exists(2, $arguments)) {
      $arguments[2] = array();
    }
    return call_user_func_array('link_to_frontend2', $arguments);
  }
}

function link_to_frontend1($name, $routeName, $params, $options = array()) {
  $html_options = _parse_attributes($options);

  $html_options = _convert_options_to_javascript($html_options);

  $html_options['href'] = url_for_frontend($routeName, $params);

  if (isset($html_options['query_string'])) {
    $html_options['href'] .= '?'.$html_options['query_string'];
    unset($html_options['query_string']);
  }

  if (isset($html_options['anchor'])) {
    $html_options['href'] .= '#'.$html_options['anchor'];
    unset($html_options['anchor']);
  }

  if (is_object($name)) {
    if (method_exists($name, '__toString')) {
      $name = $name->__toString();
    } else {
      throw new sfException(sprintf('Object of class "%s" cannot be converted to string (Please create a __toString() method).', get_class($name)));
    }
  }

  if (!strlen($name)) {
    $name = $html_options['href'];
  }

  return content_tag('a', $name, $html_options);
}

function link_to_frontend2($name, $routeName, $params, $options = array()) {
  $params = is_object($params) ? array('sf_subject' => $params) : $params;
  return link_to_frontend1($name, $routeName, $params, $options);
}

function url_for_frontend() {
  // for BC with 1.1
  $arguments = func_get_args();
  if (is_array($arguments[0]) || '@' == substr($arguments[0], 0, 1) || false !== strpos($arguments[0], '/')) {
    return call_user_func_array('url_for_frontend1', $arguments);
  } else {
    return call_user_func_array('url_for_frontend2', $arguments);
  }
}

function url_for_frontend1($routeName, $params = array()) {
  return sfProjectConfiguration::getActive()->generateFrontendUrl($routeName, $params);
}

function url_for_frontend2($routeName, $params = array()) {
  $params = is_object($params) ? array('sf_subject' => $params) : $params;
  return url_for_frontend1($routeName, $params);
}