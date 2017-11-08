<?php 
if(isset($_POST['search']))
{
    echo $search = $_POST['search'];
}
?>
<html>
<head>

<script>
    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13)
        {
            //your function call here
            document.test.submit();
        }
    }
</script>
</head>
<body>
<form name="test" action="#" method="POST">
<input type="text" name="search" />
</form>
</body>
</html>