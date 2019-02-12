<?php

require '../boolcrud-engine.php';

//true permette la restituzione del JSON
echo (empty($_GET['id'])) ? getAllGuests(true) : getGuestById($_GET['id'], true);

 ?>
