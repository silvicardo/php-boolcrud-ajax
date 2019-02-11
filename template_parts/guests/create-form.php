<form method="POST" action="http://localhost/FEBBRAIO/php-boolcrud/guests/new.php">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" placeholder="New guest Name">
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" name="lastname" placeholder="New guest Last Name">
  </div>
  <div class="form-group">
    <label>Date of birth</label>
  <input type="date" class="form-control" name="date_of_birth" value="1980-12-24">
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
    <input type="text" class="form-control" name="document_number" placeholder="example : 899.1221.5256 x375">
  </div>
  <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
