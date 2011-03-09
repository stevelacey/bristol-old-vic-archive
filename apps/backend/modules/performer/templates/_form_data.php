<div class="sf_admin_data">
  <h2>Productions</h2>
  <?php if($performer->getProductions()->count()) : ?>
    <ul>
      <?php foreach($performer->getProductions() as $production) : ?>
        <li>
          <h3><?php echo link_to($production, 'production_edit', $production) ?></h3>
          <?php include_partial('production/date', array('production' => $production)) ?>
          <?php include_partial('characters_list', array('characters' => $performer->getProductionCharacters($production->getRawValue()))) ?>
        </li>
      <?php endforeach ?>
    </ul>
  <?php else : ?>
    <p>No associated productions.</p>
  <?php endif ?>
</div>