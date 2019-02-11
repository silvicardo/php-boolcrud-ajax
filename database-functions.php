
<?php
//DB FUNCTIONS

function startNewDbConnection() {

  include 'env.php';

  return new mysqli($servername, $username, $password, $dbName);

}

function isEmptyQueryResult($result) {
  return !$result->num_rows > 0;
}

function prepareOutputDataFrom(&$result) {
  while ($row = $result->fetch_assoc()) {
    $outputData[] = $row;
  }
  return $outputData;
}

function getResultsFromQuery($query, $asJSON = false) {

  $connection = startNewDbConnection();

  if ($connection->connect_error) {
    $connection->close();
    return ($asJSON) ? json_encode(['Connection Error']) : null;
  }

  $result = $connection->query($query);

  if (isEmptyQueryResult($result)) {
    $connection->close();
    return ($asJSON) ? json_encode(['No results']) : null;
  }

  $outputData = prepareOutputDataFrom($result);

  $connection->close();

  return ($asJSON) ? json_encode($outputData) : $outputData;
}

function performChangesFrom($query, $asJSON = false) {

  $connection = startNewDbConnection();

  if ($connection->connect_error) {
    $connection->close();
    return ($asJSON) ? json_encode(['Connection Error']) : null;
  }

  $hasResults = $connection->query($query);

  $connection->close();

  return ($asJSON) ? json_encode($hasResults) : $hasResults;

}

function generateCreateQueryFrom($tableName, $data) {

  $setKeyValuePairs = array_merge(['created_at' => 'NOW()', 'updated_at' => 'NOW()'], $data);

  $fieldsArray = [];
  $valuesArray = [];

  foreach ($setKeyValuePairs as $key => $value) {
    $fieldsArray[] =  "`$key`";
    if ($value === 'NOW()') {
      $valuesArray[] = "$value";
    } else {
      $valuesArray[] = "'$value'";
    }

  }

  $fields = implode(', ', $fieldsArray);
  $values = implode(', ', $valuesArray);

  return "INSERT INTO `$tableName` ($fields) VALUES ($values);";
}

function generateUpdateQueryFrom($tableName, $data, $id) {

  $setKeyValuePairs = ["`updated_at` = NOW()"];

  foreach ($data as $key => $value) {
    if ($key === 'date_of_birth') {
      $dbDate =  convertDateToFormat($value,'Y-m-d');

      $setKeyValuePairs[] =  "`$key` = '$dbDate'";
    } else {
      $setKeyValuePairs[] =  "`$key` = '$value'";
    }
  }

  $set = implode(', ', $setKeyValuePairs);

  return "UPDATE `$tableName` SET $set WHERE `id` = $id;";
}

?>
