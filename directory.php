<?php
 include 'adminheader.php';
?>

<?php
include '../server/dbh.php';
$sql = "SELECT * FROM users ORDER BY empid ASC";
$result = mysqli_query($db, $sql); 

?>
<section class="main-container">
	<div class="main-wrapper">
		
		<!--SEARCH & DELETE USERS-->
		
		<div class="searchdel4">
		<div class="div2">Employee Directory</div>
			<div class="searchdel3">
			  		<table class="emprec2">
			  			<tr>			  			            			
            			<td>First</td>
            			<td>Last</td>
            			<td>Email</td>
            			<td>Phone</td>
            			<td>Dept</td>           			
        				</tr>

        				<?php
        				while($res = mysqli_fetch_array($result)) {         
            			echo "<tr>";
            			echo "<td>".$res['empfirst']."</td>";
           				echo "<td>".$res['emplast']."</td>";
           				echo "<td>".$res['empeaddress']."</td>"; 
           				echo "<td>".$res['empphone']."</td>";
           				echo "<td>".$res['empdept']."</td>";  
            			}
            			?>
        			</table>
				<!--<form class="deleteform" action="../server/registration.php" method="post">
				</form>-->

			</div>
		
		</div>
	</div>
</section>

















<?php
include 'footer.php';
?>