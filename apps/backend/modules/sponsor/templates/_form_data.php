  <div class="sf_admin_data">
    <h2>Productions</h2>
    <?php if($sponsor->getProductions()->count()) : ?>
      <ul>
        <?php foreach($sponsor->getProductions() as $production) : ?>
          <li>
            <h3><?php echo link_to($production, 'production_edit', $production) ?></h3>
            <time><?php echo $production->getStartDate(sfConfig::get('app_data_date_format')) ?></time>
            <?php use_helper('Number') ?>
            <ul>
              <?php foreach($sponsor->getProductionDonations($production->getRawValue()) as $donation) : ?>
                <li>
                  <h4><?php echo format_currency($donation->getAmount(), 'GBP') ?></h4>
                  <p><?php echo $donation->getDescription() ?></p>
                </li>
              <?php endforeach ?>
            </ul>
          </li>
        <?php endforeach ?>
      </ul>
    <?php else : ?>
      <p>No associated productions.</p>
    <?php endif ?>
  </div>