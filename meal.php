<?php
  include_once 'dbconfig.php';
  
  $tot = 0;  // list of blog title to display
  $userName = array();
  $k =0;
  $a =0;
  $nis =0;
  $ams =0;
  $seh =0;
  $n =0;
  $r =0;
  $o =0;
  $r =0;
  $d =0;

  
  $query = "SELECT * from  meal ";
  $recent_blog_query_run = mysql_query($query);
  $row = mysql_num_rows($recent_blog_query_run);
  for($i = 1;$i < $row; $i++)
  {
    $k = $k + mysql_result($recent_blog_query_run, $i , 'Kollol' );
    $a = $a + mysql_result($recent_blog_query_run, $i , 'Abdullah' );
    $nis = $nis + mysql_result($recent_blog_query_run, $i , 'Shorot' );
    $ams = $ams + mysql_result($recent_blog_query_run, $i , 'Saumik' );
    $seh = $seh + mysql_result($recent_blog_query_run, $i , 'Shamim' );
    $n = $n + mysql_result($recent_blog_query_run, $i , 'Nirob' );
    $o = $o + mysql_result($recent_blog_query_run, $i , 'Opu' );
    $r = $r + mysql_result($recent_blog_query_run, $i , 'Rafi' );
  $d = $d + mysql_result($recent_blog_query_run, $i , 'DJ' );
  



  }
  $i =0;
  $sum = 0;
  {
    $sum = $sum + mysql_result($recent_blog_query_run, $i , 'Kollol' );
    $sum = $sum + mysql_result($recent_blog_query_run, $i , 'Abdullah' );
    $sum = $sum + mysql_result($recent_blog_query_run, $i , 'Shorot' );
    $sum = $sum + mysql_result($recent_blog_query_run, $i , 'Saumik' );
    $sum = $sum + mysql_result($recent_blog_query_run, $i , 'Shamim' );
    $sum = $sum + mysql_result($recent_blog_query_run, $i , 'Nirob' );
    $sum = $sum + mysql_result($recent_blog_query_run, $i , 'Opu' );
    $sum = $sum + mysql_result($recent_blog_query_run, $i , 'Rafi' );
    $sum = $sum + mysql_result($recent_blog_query_run, $i , 'DJ' );
  



  }
    $sum_k =  mysql_result($recent_blog_query_run, $i , 'Kollol' );
    $sum_a =  mysql_result($recent_blog_query_run, $i , 'Abdullah' );
    $sum_nis =  mysql_result($recent_blog_query_run, $i , 'Shorot' );
    $sum_ams =  mysql_result($recent_blog_query_run, $i , 'Saumik' );
    $sum_seh =  mysql_result($recent_blog_query_run, $i , 'Shamim' );
    $sum_n =  mysql_result($recent_blog_query_run, $i , 'Nirob' );
    $sum_o =  mysql_result($recent_blog_query_run, $i , 'Opu' );
    $sum_r =  mysql_result($recent_blog_query_run, $i , 'Rafi' );
    $sum_d =  mysql_result($recent_blog_query_run, $i , 'DJ' );

  $tot =  $k+ $a+ $nis+ $ams+ $seh+ $n+ $o+ $r+ $d;
  $m_r =  $sum/ $tot;
  $k2 = $sum_k - ($k * $m_r);
  $a2 = $sum_a - ($a * $m_r);
  $nis2 = $sum_nis - ($nis * $m_r);
  $ams2 = $sum_ams - ($ams * $m_r);
  $seh2 = $sum_seh - ($seh * $m_r);
  $n2 = $sum_n - ($n * $m_r);
  $r2 = $sum_r - ($r * $m_r);
  $o2 = $sum_o - ($o * $m_r);
  $d2 = $sum_d - ($d * $m_r);


//  echo $k."   ".$a."   ".$nis."   ".$ams."   ".$seh."   ".$n."   ".$o."   ".$r."   ";
?>
<html>
  <body>
    <div>
      <?php echo "Kollol ".$k."  (".$k2.")"?>
    </div>
    <div>
      <?php echo "Abdullah ".$a."  (".$a2.")"?>
    </div>
    <div>
      <?php echo "Shorot ".$nis."  (".$nis2.")"?>
    </div>
    <div>
      <?php echo "Saumik ".$ams."  (".$ams2.")"?>
    </div>
    <div>
      <?php echo "Shamim ".$seh."  (".$seh2.")"?>
    </div>
    <div>
      <?php echo "Nirob ".$n."  (".$n2.")"?>
    </div>
    <div>
      <?php echo "Apu ".$o."  (".$o2.")"?>
    </div>
    <div>
      <?php echo "Rafi ".$r."  (".$r2.")"?>
    </div>
    <div>
      <?php echo "Dhananjoy ".$d."  (".$d2.")"?>
    </div>
    <div>
      <?php echo "Meal Rate ".$m_r?>
    </div>

  
  </body>
</html>