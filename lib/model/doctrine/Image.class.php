<?php

/**
 * Image
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    bristol-old-vic-archive
 * @subpackage model
 * @author     Steve Lacey
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Image extends BaseImage {
  public function getThumbnail($width, $height) {
    return $this->getThumbnailPath($width, $height).'/'.$this->getSlug().'.png';
  }

  public function getThumbnailPath($width, $height) {
    return sfConfig::get('sf_upload_dir').'/thumbnails/'.$width.'x'.$height;
  }

  public function getFullPath() {
    return sfConfig::get('sf_upload_dir').'/images/'.$this->getPath();
  }

  public function preSave($event) {
    if(!$this->isNew()) {
      $this->deleteThumbnailCache();
    }
  }

  public function postDelete($event) {
    $this->deleteThumbnailCache();
  }

  public function deleteThumbnailCache() {
    $fs = new sfFileSystem();
    $fs->execute('find '.sfConfig::get('sf_upload_dir').'/thumbnails/ -iname '.$this->getSlug().'.* -exec rm {} \;');
  }
}