<?php

require '../boolcrud-engine.php';

//true permette la restituzione del JSON
echo (empty($GET['id'])) ? getAllGuests(true) : getGuestsById($GET['id'], true);

 ?>
