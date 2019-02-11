<?php

function getThePageName(){
  return basename($_SERVER['PHP_SELF']);
}

function convertDateToFormat($date,$format) {
  return  date_format(date_create($date), $format);
}
?>
