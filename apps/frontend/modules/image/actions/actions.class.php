<?php

class imageActions extends sfActions {
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