<div class="sf_admin_data">
  <h2>Staff</h2>
  <?php if($role->getStaff()->count()) : ?>
    <ul>
      <?php foreach($role->getStaff() as $staff) : ?>
        <li>
          <h3><?php echo link_to($staff, 'staff_edit', $staff) ?></h3>
          <?php include_partial('production/short_list', array('productions' => $staff->getProductions())) ?>
        </li>
      <?php endforeach ?>
    </ul>
  <?php else : ?>
    <p>No associated staff.</p>
  <?php endif ?>
</div>