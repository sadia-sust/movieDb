<?php
$var = "Guest";
?>
<html>
<script type="text/javascript">
	 function test() {
	 	var con = "<?php echo $var?>";
	 	//if(con=='Guest')


	 		alert("TESTR");
     
    }

</script>
<body onload="test()">
	


</body>

</html>