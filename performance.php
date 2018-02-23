<?php
include 'employeeheader.php';
?>
<?php

 $sql = "SELECT * FROM prodata WHERE empid = '$id'";// empid = '$id'"; - MUST WORK ON THIS 
 $result = mysqli_query($db,$sql);
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  //set values to usable variable
 
settype($monval, "integer");
settype($tueval, "integer");
settype($wedval, "integer");
settype($thuval, "integer");
settype($frival, "integer");


 $monval = $row['monval'];
 $tueval = $row['tueval'];
 $wedval = $row['wedval'];
 $thuval = $row['thuval'];
 $frival = $row['frival'];

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


?>

<!--Load the AJAX API-->
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
                       'width':600,
                       'height':300,
                        'hAxis': {title: 'Day'},
      					'vAxis': {title: 'Amount'},
                       'trendlines': { 0: {
                       	 type: 'exponential',
                         opacity: 0.6,
                         lineWidth: 5,
                       	 enableInteractivity: 'false',
        				color: 'purple', 
                       },
                       1: {
            				color: 'green',
            				enableInteractivity: 'false',
            				visibleInLegend: 'false',

       					 } }
                   		};     		

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>



<section class="main-container">
	<div class="main-wrapper">
		<div class="div2"> Your Performance </div>
		<div class="div3">
		
			<div id="chart_div"></div>
			
		</div>
	</div>
</section>





<?php
include 'footer.php';
?>