<?php

require '../boolcrud-engine.php';

//true fa restituire una risposta come json_encode
echo json_encode(deleteGuestFrom($_POST['id']));


 ?>
