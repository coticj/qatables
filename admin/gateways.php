<?php

require_once '../rb.php';
    R::setup('sqlite:../db/qat.db');
require_once("header.php");


?>


      <div class="starter-template">
        <h1>All gateways</h1>
		
		<table class="table table-striped">
		<thead>
			<tr>
				<th>Owner</th>
				<th>IP</th>
				<th>Port</th>
			</tr>
		</thead>
		<tbody>
        <?php 
			$gateways = R::findAll( 'gateway' );
			foreach($gateways as $gateway) {
				echo '<tr>';
				
				echo '<td>';
					echo "<a href='edit_gateway.php?id=".$gateway->id."'>".$gateway->name."</a>";
				echo '</td>';
				
				echo '<td>';
					echo $gateway->ip;
				echo '</td>';
				
				echo '<td>';
					echo $gateway->port;
				echo '</td>';
				
				echo '<td>';
					echo '<a type="button" class="btn btn-default btn-s" href="edit_gateway.php?id='.$gateway->id.'">Edit</a>';
				
				echo '<a href="delete_gateway.php?id='.$gateway->id.'" title="Delete" onclick="return confirm(\'Delete this gateway?\');" type="button" class="btn btn-default btn-s">Delete</a>';
					
				echo '</td>';
				
				echo '</tr>';
			}

		?>
		</tbody>
		</table>
      </div>

 

<?php
require_once("footer.php");
?> 