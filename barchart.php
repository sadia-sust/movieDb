<?php

// The Chart table contains two fields: weekly_task and percentage
// This example will display a pie chart. If you need other charts such as a Bar chart, you will need to modify the code a little to make it work with bar chart and other charts
  include_once 'dbconfig.php'; 

$sth = mysql_query("SELECT * FROM movie_chart");

/*
---------------------------
example data: Table (Chart)
--------------------------
weekly_task     percentage
Sleep           30
Watching Movie  40
work            44
*/

$rows3 = array();

//flag is not needed
$flag3 = true;
$table3 = array();
$table3['cols'] = array(

    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
    array('label' => 'name', 'type' => 'string'),
    array('label' => 'percentage', 'type' => 'number')

);

$rows3 = array();
while($r = mysql_fetch_assoc($sth)) {
    $temp3 = array();
    // the following line will be used to slice the Pie chart
    $temp3[] = array('v' => (string) $r['name']); 

    // Values of each slice
    $temp3[] = array('v' => (int) $r['percentage']); 
    $rows3[] = array('c' => $temp3);
}

$table3['rows'] = $rows3;
$jsonTable3 = json_encode($table3);
//echo $jsonTable;
?>
