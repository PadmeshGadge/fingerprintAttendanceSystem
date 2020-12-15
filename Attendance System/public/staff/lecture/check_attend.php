<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'Check Attendance'; ?>
<?php include(SHARED_PATH.'/header.php'); ?>
    <navigation>
      <ul>
        <li><a href="<?php echo WWW_ROOT.'/staff/index.php' ?>" >Menu</a></li>
      </ul>
    </navigation>

    <div id="content">
      <a href="<?php echo WWW_ROOT.'/staff/lecture/newlec.php' ?>"><button type="button" name="new-lec">NEW LECTURE</button></a>
      <a href="<?php echo WWW_ROOT.'/staff/lecture/check_attend.php' ?>"><button type="button" name="attendance">CHECK ATTENDANCE</button></a>
    </div>

<?php include(SHARED_PATH.'/footer.php'); ?>
