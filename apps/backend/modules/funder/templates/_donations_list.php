<?php if($donations->count()) : ?>
  <ul>
    <?php foreach($donations as $donation) : ?>
      <li>
        <h4><?php echo format_currency($donation->getAmount(), 'GBP') ?></h4>
        <p><?php echo $donation->getDescription() ?></p>
      </li>
    <?php endforeach ?>
  </ul>
<?php endif ?>