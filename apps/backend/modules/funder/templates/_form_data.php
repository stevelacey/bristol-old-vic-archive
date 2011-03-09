  <div class="sf_admin_data">
    <h2>Productions</h2>
    <?php if($funder->getProductions()->count()) : ?>
      <ul>
        <?php foreach($funder->getProductions() as $production) : ?>
          <li>
            <h3><?php echo link_to($production, 'production_edit', $production) ?></h3>
            <time><?php echo $production->getStartDate(sfConfig::get('app_data_date_format')) ?></time>
            <?php use_helper('Number') ?>
            <?php include_partial('donations_list', array('donations' => $funder->getProductionDonations($production->getRawValue()))) ?>
          </li>
        <?php endforeach ?>
      </ul>
    <?php else : ?>
      <p>No associated productions.</p>
    <?php endif ?>
  </div>