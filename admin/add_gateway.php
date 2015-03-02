<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../rb.php';
    R::setup('sqlite:../db/qat.db');

if (!empty($_POST)){
 
	$gateway = R::dispense( 'gateway' );
	$gateway->name = $_POST["name"];
	$gateway->ip = $_POST["ip"];
	$gateway->port = $_POST["port"];
	$id = R::store( $gateway );
	
	R::close();
  
	header('Location: gateways.php');
}else{


require_once("header.php");
?>


      <div class="starter-template">
        <h1>Add gateway</h1>
       <form role="form" method="post">
  <div class="form-group">
    <label for="name">Gateway owner (name)</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Gateway owner">
  </div>
   <div class="form-group">
    <label for="ip">IP</label>
    <input type="text" name="ip" class="form-control" id="ip" placeholder="IP">
  </div>
  <div class="form-group">
    <label for="port">Port</label>
    <input type="text" class="form-control" id="port" placeholder="Port" name="port">
  </div>
   
  <button type="submit" class="btn btn-default">Add gateway</button>
</form>

    
	  </div>

 

<?php
require_once("footer.php");

}
?> 