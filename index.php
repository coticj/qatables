<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	require_once('header.html');
	require_once 'rb.php';
    R::setup('sqlite:./db/directory.db');
	$db = new SQLite3('./db/directory.db');
	
	
?> 
 <!-- Begin page content -->
<div class="container-fluid">
  <div class="page-header">
	<div class="pull-right"><p class="lead"><a href="admin/">Admin</a></p></div>
	<h1>QATables</h1>
  </div>
  <form id="phones">
  <div class='row'>
    <div class='col-md-2'>
        <h3>Select gateway</h3>
		
		<?php
			$gateways = R::findAll( 'gateway' );
			foreach($gateways as $gateway) {
				echo '<div class="radio"><label><input type="radio" name="gateway" value="'.$gateway->id.'">'.$gateway->name.'</label></div>';
			}
		?>
        
    </div>
      
	<div class='col-md-10'>
        <h3>Select phones</h3>
		
		<?php
			$phones = R::findAll( 'phone' );
			foreach($phones as $phone) {
				echo '<div class="item"><img src="'.$phone->image.'" class="image img-responsive"><div class="checkbox"><label><input type="checkbox" name="phones[]" value="'.$phone->id.'">'.$phone->manufacturer.' '.$phone->model. '</label></div></div>';
			}
		?>
		<div style="clear: both;"></div>
        
      </div>
      
    </div>
  </form>
	
</div>

<?php
	require_once('footer.html');
?>   
