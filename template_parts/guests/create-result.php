<?php

$newGuest = [];

foreach ($_POST as $key => $value) {
  $newGuest[$key] = $value;
}

$creationSuccess =  createNewGuestFrom($newGuest); ?>

 <?php if ($creationSuccess){ ?>
   <h3 class="text-center">Creation Succesful, back to the Homepage</h3>
 <?php } else { ?>
   <h3 class="text-center">Creation Failed, back to Homepage</h3>
 <?php } ?>
