<?php

//include_once 'sessionValue.php';
	function find_levenshtein_distance($str1 , $str2)
	{
	
		$len1= strlen($str1);
		$len2 = strlen($str2);


		$dp = array(array());
		for($i = 0;$i<=max($len1,$len2);$i = $i+1)
		{
			$dp[0][$i]=$i;
			$dp[$i][0]=$i;

		}
	
	
		for($i = 1;$i<=$len1;$i = $i+1)
			for($j =1 ; $j <=$len2; $j = $j +1)
			{
				if($str1[$i-1] == $str2[$j-1])
				{
				
					$dp[$i][$j]= $dp[$i-1][$j-1]; 
				}
				else $dp[$i][$j] = min($dp[$i][$j-1] ,min($dp[$i-1][$j],$dp[$i-1][$j-1])) +1;
		
			}	

		return $dp[$len1][$len2];
	}
	function get_pursed_string ($test)
	{

		$test = strtolower($test);
		$in = 0;
		$ans = "a";
		for($i = 0; $i < strlen($test) ;$i = $i +1 )
		{

			if (($test[$i]>= 'a' && $test[$i]<= 'z' )  )
			{
				$ans[$in] =  $test[$i];
				$in = $in +1;
			}
			
		}
		return $ans;

	}
	


	


?>
