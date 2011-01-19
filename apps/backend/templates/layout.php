<!doctype html>
<html lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <?php include_component('sfAdminDash','header'); ?>
    <?php echo $sf_content ?>
    <?php include_partial('sfAdminDash/footer'); ?>
  </body>
</html>