<?php
require_once '../rb.php';
    R::setup('sqlite:../db/qat.db');

if (!empty($_POST)){
 
	$phone = R::dispense( 'phone' );
	$phone->manufacturer = $_POST["manufacturer"];
	$phone->model = $_POST["model"];
	$phone->ip = $_POST["ip"];
	$phone->mac = $_POST["mac"];
	$phone->image = $_POST["image"];
	$id = R::store( $phone );
	
	R::close();
  
	header('Location: index.php');
}else{


require_once("header.php");
?>


      <div class="starter-template">
        <h1>Add phone</h1>
       <form role="form" method="post">
  <div class="form-group">
    <label for="manufacturer">Manufacturer</label>
    <input type="text" name="manufacturer" class="form-control" id="manufacturer" placeholder="Manufacturer">
  </div>
   <div class="form-group">
    <label for="model">Model</label>
    <input type="text" name="model" class="form-control" id="model" placeholder="Model">
  </div>
  <div class="form-group">
    <label for="ip">IP</label>
    <input type="text" class="form-control" id="ip" placeholder="IP" name="ip">
  </div>
  <div class="form-group">
    <label for="mac">MAC</label>
    <input type="text" class="form-control" id="mac" placeholder="MAC" name="mac">
  </div>
   <div class="form-group">
    <label for="image">Thumbnail (URL)</label>
    <input type="text" class="form-control" id="image" placeholder="Thumbnail (URL)" name="image">
  </div>
  
  <button type="submit" class="btn btn-default">Add phone</button>
</form>

    
	  </div>

 

<?php
require_once("footer.php");

}
?> 