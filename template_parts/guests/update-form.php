<?php

$currentGuest = getGuestById($_GET['id'])[0];

$currentGuest['date_of_birth'] = convertDateToFormat($currentGuest['date_of_birth'],'Y-m-d');

?>

<form method="POST" action="http://localhost/FEBBRAIO/php-boolcrud/guests/update.php">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" placeholder="New guest Name" value="<?php echo $currentGuest['name'];?>">
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" name="lastname" placeholder="New guest Last Name" value="<?php  echo $currentGuest['lastname'];?>">
  </div>
  <div class="form-group">
    <label>Date of birth</label>
  <input type="date" class="form-control" name="date_of_birth" value="<?php echo $currentGuest['date_of_birth']; ?>">
  </div>
  <div class="form-group">
    <label>Document Type</label>
    <select class="form-control" name="document_type">
      <option value="CI">CI</option>
      <option value="Driver License">Driver License</option>
    </select>
  </div>
  <div class="form-group">
    <label>document_number</label>
    <input type="text" class="form-control" name="document_number" placeholder="example : 899.1221.5256 x375" value="<?php echo $currentGuest['document_number'] ?>">
  </div>
  <input type="hidden" name="id" value="<?php echo $currentGuest['id']; ?>">
  <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
