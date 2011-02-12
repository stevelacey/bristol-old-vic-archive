<?php use_helper('FrontendUrl') ?>
<?php echo link_to_frontend(image_tag(url_for_frontend('image', array('sf_subject' => $image, 'dimensions' => '300x200', 'v' => $image->getDateTimeObject('updated_at')->format('U'))), array('alt' => $image->getTitle(), 'title' => $image->getTitle())), 'image', array('sf_subject' => $image, 'dimensions' => '1024x768', 'v' => $image->getDateTimeObject('updated_at')->format('U')), array('rel' => 'thumbnails')) ?>
<br/>
%input%