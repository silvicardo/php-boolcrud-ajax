<?php $deletionSuccess = deleteGuestFrom($_POST['id']); ?>

<?php if ($deletionSuccess){ ?>

  <h3>Deletion Succesful, back to the Homepage</h3>

<?php } else { ?>

  <h3>Deletion Failed, back to Homepage</h3>
  
<?php } ?>
