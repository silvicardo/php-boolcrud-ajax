<?php

//ROUTES FUNCTIONS

//SHOW

function getAllGuests($asJSON = false) {

  return getResultsFromQuery('SELECT `id`, `name`, `lastname` FROM `ospiti`', $asJSON);
}

function getGuestById($id, $asJSON = false) {

  $query = 'SELECT * FROM `ospiti` WHERE `id` = ' . $id;

  return getResultsFromQuery($query, $asJSON);
}

//CREATE

function createNewGuestFrom($data, $asJSON = false) {

  $query = generateCreateQueryFrom('ospiti', $data);

  return  ($asJSON) ? json_encode(performChangesFrom($query)) : performChangesFrom($query) ;

}

//UPDATE

function updateGuestFrom($id, $data) {

  if (getGuestById($id) === null) {
    return null;
  }

  $query = generateUpdateQueryFrom('ospiti', $data, $id);

  return performChangesFrom($query);

}

//DELETE

function deleteGuestFrom($id, $asJSON = false) {

  if (getGuestById($id) === null) {
    return null;
  }

  $query = "DELETE FROM `ospiti` WHERE `id` = $id;";

  return performChangesFrom($query,$asJSON);

}

 ?>
