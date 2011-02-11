<?php

/**
 * Image form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ImageForm extends BaseImageForm {
  public function configure() {
    sfProjectConfiguration::getActive()->loadHelpers('Partial');

    $this->validatorSchema['title']->setOption('required', false);

    $this->setWidget('path', new sfWidgetFormInputFileEditable(
      array(
        'file_src'    => '/uploads/images/'.$this->getObject()->getPath(),
        'edit_mode'   => !$this->isNew(),
        'is_image'    => true,
        'template'    => get_partial('image/form_preview', array('image' => $this->getObject()))
	    )
    ));

    $this->setValidator('path', new sfValidatorFile(
      array(
        'mime_types' => 'web_images',
        'path' => sfConfig::get('sf_upload_dir').'/images',
        'required' => false,
      )
    ));

    unset(
      $this['slug'],
      $this['created_at'], $this['updated_at']
    );
  }
}