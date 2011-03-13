<?php if($characters->count()) : ?>
  <ul>
    <?php foreach($characters as $character) : ?>
      <li><?php echo $character ?></li>
    <?php endforeach ?>
  </ul>
<?php endif ?>