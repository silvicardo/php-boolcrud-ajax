
  <?php

  $updatedGuest = [];

  foreach ($_POST as $key => $value) {
    if ($key !== 'id') {
      $updatedGuest[$key] = $value;
    }
  }

  $updateSuccesful =  updateGuestFrom($_POST['id'], $updatedGuest);

   ?>

   <?php if ($updateSuccesful){ ?>
     <h3 class="text-center">Update Succesful, back to the Homepage</h3>
   <?php } else { ?>
     <h3 class="text-center">Update Failed, back to Homepage</h3>
   <?php } ?>
