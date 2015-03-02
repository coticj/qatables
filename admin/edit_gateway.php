<?php
require_once '../rb.php';
    R::setup('sqlite:../db/qat.db');

if (!empty($_POST)){
	$gateway = R::load( 'gateway', $_GET['id'] );
	$gateway->name = $_POST["name"];
	$gateway->ip = $_POST["surname"];
	$gateway->port = $_POST["port"];
	$id = R::store( $gateway );
	R::close();
	
	header('Location: gateways.php');
}else{
$gateway = R::load( 'gateway', $_GET['id'] );
	
	R::close();

require_once("header.php");
?>


      <div class="starter-template">
        <h1>Edit gateway</h1>
        <form role="form" method="post">
  <div class="form-group">
    <label for="name">Gateway owner (name)</label>
    <input type="text" name="name" value="<?php echo $gateway->name;?>" class="form-control" id="name" placeholder="Gateway owner">
  </div>
   <div class="form-group">
    <label for="ip">IP</label>
    <input type="text" name="ip" value="<?php echo $gateway->ip;?>" class="form-control" id="ip" placeholder="IP">
  </div>
  <div class="form-group">
    <label for="port">Port</label>
    <input type="text" class="form-control" value="<?php echo $gateway->port;?>" id="port" placeholder="Port" name="port">
  </div>
    
  <button type="submit" class="btn btn-default">Edit</button>
</form>
	  
	  </div>

 

<?php
require_once("footer.php");

}
?> 