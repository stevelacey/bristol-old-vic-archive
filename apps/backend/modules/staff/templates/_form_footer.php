  <div>
    <h2>Productions</h2>
    <ul>
      <?php foreach($staff->getProductions() as $production) : ?>
        <li>
          <h3><?php echo link_to($production, 'production_edit', $production) ?></h3>
          <time><?php echo $production->getStartDate('Y') ?></time>
          <ul>
            <?php foreach($staff->getProductionRoles($production->getRawValue()) as $role) : ?>
              <li><?php echo $role ?></li>
            <?php endforeach ?>
          </ul>
        </li>
      <?php endforeach ?>
    </ul>
  </div>