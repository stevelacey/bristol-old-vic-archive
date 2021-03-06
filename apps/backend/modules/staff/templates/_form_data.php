  <div class="sf_admin_data">
    <h2>Productions</h2>
    <?php if($staff->getProductions()->count()) : ?>
      <ul>
        <?php foreach($staff->getProductions() as $production) : ?>
          <li>
            <h3><?php echo link_to($production, 'production_edit', $production) ?></h3>
            <time><?php echo $production->getStartDate(sfConfig::get('app_data_date_format')) ?></time>
            <ul>
              <?php foreach($staff->getProductionRoles($production->getRawValue()) as $role) : ?>
                <li><?php echo $role ?></li>
              <?php endforeach ?>
            </ul>
          </li>
        <?php endforeach ?>
      </ul>
    <?php else : ?>
      <p>No associated productions.</p>
    <?php endif ?>
  </div>