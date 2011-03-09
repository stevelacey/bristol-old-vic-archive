<?php if($productions->count()) : ?>
  <ul>
    <?php foreach($productions as $production) : ?>
      <li>
        <?php echo link_to($production, 'production_edit', $production) ?>
        <?php include_partial('production/date', array('production' => $production)) ?>
      </li>
    <?php endforeach ?>
  </ul>
<?php endif ?>