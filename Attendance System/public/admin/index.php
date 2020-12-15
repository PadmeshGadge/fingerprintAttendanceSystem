<?php require_once('../../private/initialize.php'); ?>
<?php $page_title = 'Admin Area'; ?>
<?php include(SHARED_PATH.'/header.php'); ?>
    <navigation>
      <ul>
        <li><a href="index.php">Menu</a></li>
      </ul>
    </navigation>

    <div id="content">
      <button type="button" name="view-staff">VIEW STAFF</button>
      <button type="button" name="view-staff">EDIT STAFF</button>
      <button type="button" name="subjects">ADD/ASSIGN SUBJECT</button>
    </div>

<?php include(SHARED_PATH.'/footer.php'); ?>
