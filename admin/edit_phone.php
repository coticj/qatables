<?php
require_once '../rb.php';
    R::setup('sqlite:../db/qat.db');

if (!empty($_POST)){
	$phone = R::load( 'phone', $_GET['id'] );
	$phone->manufacturer = $_POST["manufacturer"];
	$phone->model = $_POST["model"];
	$phone->ip = $_POST["ip"];
	$phone->mac = $_POST["mac"];
	$phone->image = $_POST["image"];
	$id = R::store( $phone );
	R::close();
	
	header('Location: index.php');
}else{
$phone = R::load( 'phone', $_GET['id'] );
	
	R::close();

require_once("header.php");
?>


      <div class="starter-template">
        <h1>Edit phone</h1>
        <form role="form" method="post">
  <div class="form-group">
    <label for="manufacturer">Manufacturer</label>
    <input type="text" name="manufacturer" value="<?php echo $phone->manufacturer;?>" class="form-control" id="manufacturer" placeholder="Manufacturer">
  </div>
   <div class="form-group">
    <label for="model">Model</label>
    <input type="text" name="model" value="<?php echo $phone->model;?>" class="form-control" id="model" placeholder="Model">
  </div>
  <div class="form-group">
    <label for="ip">IP</label>
    <input type="text" class="form-control" value="<?php echo $phone->ip;?>" id="ip" placeholder="IP" name="ip">
  </div>
  <div class="form-group">
    <label for="mac">MAC</label>
    <input type="text" class="form-control" value="<?php echo $phone->mac;?>" id="mac" placeholder="MAC" name="mac">
  </div>
   <div class="form-group">
    <label for="image">Thumbnail (URL)</label>
    <input type="text" name="image" value="<?php echo $phone->image;?>" class="form-control" id="image" placeholder="Thumbnail (URL)">
  </div>
  
  <button type="submit" class="btn btn-default">Edit phone</button>
</form>
	  
	  </div>

 

<?php
require_once("footer.php");

}
?> 