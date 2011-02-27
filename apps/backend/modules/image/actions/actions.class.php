<?php

require_once dirname(__FILE__).'/../lib/imageGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/imageGeneratorHelper.class.php';

/**
 * image actions.
 *
 * @package    bristol-old-vic-archive
 * @subpackage image
 * @author     Steve Lacey
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class imageActions extends autoImageActions {
  public function executeShow(sfWebRequest $request) {
    list($width, $height) = explode('x', $request->getParameter('dimensions'));
    $this->generateThumbnail($this->getRoute()->getObject(), $width, $height);
    return sfView::NONE;
  }

  private function generateThumbnail($image, $width, $height) {
    $img = new sfImage($image->getFullPath());
    $img->thumbnail($width, $height, 'top');

    $fs = new sfFilesystem();

    if(!is_dir($image->getThumbnailPath($width, $height))) {
      $fs->mkdirs($image->getThumbnailPath($width, $height), 0777);
      $fs->chmod($image->getThumbnailPath($width, $height), 0777);
    }

    $img->saveAs($image->getThumbnail($width, $height));
    $fs->chmod($image->getThumbnail($width, $height), 0777);

    $this->getResponse()->setContentType($img->getMIMEType());
    $this->getResponse()->setContent($img);
  }
}