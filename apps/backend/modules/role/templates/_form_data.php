  <div class="sf_admin_data">
    <h2>Staff</h2>
    <?php if($role->getStaff()->count()) : ?>
      <ul>
        <?php foreach($role->getStaff() as $staff) : ?>
          <li>
            <h3><?php echo link_to($staff, 'staff_edit', $staff) ?></h3>
            <ul>
              <?php foreach($staff->getProductions() as $production) : ?>
                <li>
                  <?php echo link_to($production, 'production_edit', $production) ?>
                  <time><?php echo $production->getStartDate(sfConfig::get('app_data_date_format')) ?></time>
                </li>
              <?php endforeach ?>
            </ul>
          </li>
        <?php endforeach ?>
      </ul>
    <?php else : ?>
      <p>No associated staff.</p>
    <?php endif ?>
  </div>