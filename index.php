<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	require_once('header.html');
	require_once 'rb.php';
    R::setup('sqlite:./db/qat.db');
	$db = new SQLite3('./db/directory.db');
	
	
?> 
 <!-- Begin page content -->
<div class="container-fluid">
  <div class="page-header">
	<div class="pull-right"><p class="lead"><a href="admin/">Admin</a></p></div>
	<h1>QATables1</h1>
  </div>
  <form id="phones">
  <div class='row'>
    <div class='col-md-2'>
        <h3>Select gateway</h3>

        <select name="gateway">
        	<option>-- Select a gateway --</option>
		  <?php
			$gateways = R::findAll( 'gateway' );
			foreach($gateways as $gateway) {
				echo '<option value="'.$gateway->id.'">'.$gateway->name.'</option>';
			}
		?>
		</select>
		
		
        
    </div>
      
	<div class='col-md-10'>
        <h3>Select phones</h3>
		
		<?php
			$phones = R::findAll( 'phone' );
			foreach($phones as $phone) {
				echo '<div class="item"><div class="owner">Jure</div><label><img src="'.$phone->image.'" class="image img-responsive"><div class="checkbox"><input type="checkbox" name="phones[]" value="'.$phone->id.'">'.$phone->manufacturer.' '.$phone->model. '</label></div></div>';
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
