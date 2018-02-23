<?php
include 'managerheader.php';
?>


<?php
if(isset($_POST['selectbtn']))
{
          $eid = mysqli_real_escape_string($db,$_POST['ID']);

           $sql = "SELECT * FROM prodata WHERE empid = '$eid' "; 
           $result = mysqli_query($db,$sql);
           $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
           //defiantley an integer
          settype($monval, "integer");
          settype($tueval, "integer");
          settype($wedval, "integer");
          settype($thuval, "integer");
          settype($frival, "integer");

          	// Set variables
           $monval = $row['monval'];
           $tueval = $row['tueval'];
           $wedval = $row['wedval'];
           $thuval = $row['thuval'];
           $frival = $row['frival'];
           //error handling: avoid 0's
           if ($monval == 0){
           	 $monval = 'null';
          } 
          if ($tueval == 0){
          	 $tueval = 'null';
          } 
          if ($wedval == 0){
          	  $wedval = 'null';
          } 
          if ($thuval == 0){
          	 $thuval = 'null';
          } 
          if ($frival == 0){
          	 $frival = 'null';
          }

        }
          ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'day'); // horizontal line <<>>
        data.addColumn('number', 'task achieved' ); //verticl line VV^^
        data.addRows([
          [1, <?php echo $monval; ?>],
          [2, <?php echo $tueval ;?>], //data brought from SQL query
          [3, <?php echo $wedval ;?>],
          [4, <?php echo $thuval ;?>],
          [5, <?php echo $frival ;?>]
        ]);
  
        
        // Set chart options
        var options = {'title':'Employee Performance',
                       'width':600, 'height':300, 'hAxis': {title: 'Day'}, 'vAxis': {title: 'Amount'}, 
                       'trendlines': { 0: {
                       	 type: 'exponential',
                       	 opacity: 0.6,
                       	 lineWidth: 5,
                       	 enableInteractivity: 'false',
        				color: 'purple', 
                       },
                        }
                   		};     		

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
   

<section class="main-container">
	<div class="main-wrapper">
		<div class="div2"> Search for an employee's Performance </div>
		<div class="div3">
		<div class="searchdel3">
            <table class="emprec2">
                <tr>     
                  <td>ID</td>                           
                  <td>First</td>
                  <td>Last</td>                 
                </tr>

                <?php
                include '../server/dbh.php';
                $sql = "SELECT empid, empfirst, emplast FROM users WHERE level = 2 ORDER BY empid ASC";
                $result = mysqli_query($db, $sql);
                while($res = mysqli_fetch_array($result)) {         
                  echo "<tr>";
                  echo "<td>".$res['empid']."</td>";
                  echo "<td>".$res['empfirst']."</td>";
                  echo "<td>".$res['emplast']."</td>";
                  }
                  ?>
              </table>
      </div>
			<div id="chart_div"></div>
			 <form action="employees.php" method="POST"> 
              <input type="text" name="ID" placeholder="ID"></input>
              <button type="submit" name="selectbtn">Show Progress</button>
            </form>					
			</form>
		</div>
	</div>
</section>





<?php
include 'footer.php';
?>