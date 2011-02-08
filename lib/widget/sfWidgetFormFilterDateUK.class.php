<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfWidgetFormFilterDate represents a date filter widget.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id$
 */
class sfWidgetFormFilterDateUK extends sfWidgetFormFilterDate {

  /**
   * Configures the current widget.
   *
   * Available options:
   *
   *  * with_empty:      Whether to add the empty checkbox (true by default)
   *  * empty_label:     The label to use when using an empty checkbox
   *  * template:        The template used for from date and to date
   *                     Available placeholders: %from_date%, %to_date%
   *  * filter_template: The template to use to render the widget
   *                     Available placeholders: %date_range%, %empty_checkbox%, %empty_label%
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array()) {
    parent::configure($options, $attributes);

    $this->addOption('from_date', new sfWidgetFormDateUK());
    $this->addOption('to_date', new sfWidgetFormDateUK());
  }
}