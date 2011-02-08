  <div>
    <h2>Productions</h2>
    <ul>
      <?php foreach($performer->getProductions() as $production) : ?>
        <li>
          <h3><?php echo link_to($production, 'production_edit', $production) ?></h3>
          <time><?php echo $production->getStartDate('Y') ?></time>
          <ul>
            <?php foreach($performer->getProductionCharacters($production->getRawValue()) as $character) : ?>
              <li><?php echo $character ?></li>
            <?php endforeach ?>
          </ul>
        </li>
      <?php endforeach ?>
    </ul>
  </div>