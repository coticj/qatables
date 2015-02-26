<?php

require_once '../rb.php';
    R::setup('sqlite:../db/qat.db');
require_once("header.php");


?>


      <div class="starter-template">
        <h1>All phones</h1>
		
		<table class="table table-striped">
		<thead>
			<tr>
				<th>Manufacturer</th>
				<th>Model</th>
				<th>IP</th>
				<th>MAC</th>
				<th>Edit</th>
			</tr>
		</thead>
		<tbody>
        <?php 
			$phones = R::findAll( 'phone');
			foreach($phones as $phone) {
				echo '<tr>';
				
				echo '<td>';
					echo "<a href='edit_phone.php?id=".$phone->id."'>".$phone->manufacturer."</a>";
				echo '</td>';
				
				echo '<td>';
					echo $phone->model;
				echo '</td>';
				
				echo '<td>';
					echo $phone->ip;
				echo '</td>';
				
				echo '<td>';
					echo $phone->mac;
				echo '</td>';
				
				echo '<td>';
					echo '<a type="button" class="btn btn-default btn-s" href="edit_phone.php?id='.$phone->id.'">Edit</a>';
				
				echo '<a href="delete_phone.php?id='.$phone->id.'" title="Delete" onclick="return confirm(\'Delete this phone?\');" type="button" class="btn btn-default btn-s">Delete</a>';
					
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