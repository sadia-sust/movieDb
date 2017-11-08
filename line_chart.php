<?php

// The Chart table contains two fields: weekly_task and percentage
// This example will display a pie chart. If you need other charts such as a Bar chart, you will need to modify the code a little to make it work with bar chart and other charts
  include_once 'dbconfig.php'; 

$sth = mysql_query("SELECT * FROM visit_chart");

/*
---------------------------
example data: Table (Chart)
--------------------------
weekly_task     percentage
Sleep           30
Watching Movie  40
work            44
*/

$rows2 = array();

//flag is not needed
$flag = true;
$table2 = array();
$table2['cols'] = array(

    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
    array('label' => 'visit', 'type' => 'string'),
    array('label' => 'percentage', 'type' => 'number')

);

$rows2 = array();
while($r = mysql_fetch_assoc($sth)) {
    $temp2 = array();
    // the following line will be used to slice the Pie chart
    $temp2[] = array('v' => (string) $r['visit']); 

    // Values of each slice
    $temp2[] = array('v' => (int) $r['percentage']); 
    $rows2[] = array('c' => $temp2);
}

$table2['rows'] = $rows2;
$jsonTable2 = json_encode($table2);
//echo $jsonTable;
?>
