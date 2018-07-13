
<p><a href="robotcontrol.php?var=1" ">Move Forward</a>
<p><a href="robotcontrol.php?var=2" ">Turn Backward</a>
<p><a href="robotcontrol.php?var=3" ">Turn Right</a>
<p><a href="robotcontrol.php?var=4" ">Turn Left</a>
<p><a href="robotcontrol.php?var=5" ">Stop</a>
<br>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blynk App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  body  {
      background-image: url("backgroun.png") ;
      background-color: #070707;
  }
  .row img{
  	width: 260px;
  	height: 260px;
  	min-width: 3%;
  	min-width: 3%;
  }
  </style>
</head>

<body>

<div class="container">
		<div class="row">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				<a href="robotcontrol.php?var=1"  class="img-responsive" target="_self"><img src="henilforward.png" alt="a"></a>
			</div>
			<div class="col-md-4">
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<a href="robotcontrol.php?var=4"  class="img-responsive" target="_self"><img src="henilleft.png" alt="a"></a>
			</div>
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				<a href="robotcontrol.php?var=3" class="img-responsive" target="_self"><img src="henilright.png" alt="a"></a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				<a href="robotcontrol.php?var=2"  class="img-responsive" target="_self"><img src="henilbackward.png" alt="a"></a>
			</div>
			<div class="col-md-4">
				
			</div>
		</div>
	</div>
	<?php
include('connect.php');
$in=0;

if(!empty($_GET["var"]))
{
    $in=$_GET["var"];
    //echo $in;

$sql = "INSERT INTO henil (c)
                    VALUES ($in )";

switch($in){
    case 1: $str= "forward";
     break;
    case 2: $str= "backward";
     break;
    case 3: $str= "right";
     break;
    case 4: $str= "left";
     break;
     case 5: $str= "stop";
     break;
    
}
   if ($conn->query($sql) === TRUE) 
    {
      echo "<br> Last Command Saved as ".$str;
      
    } 
    else 
    {
    echo "<br>";
    echo "Error updating record: " . $conn->error;
    }

}

  
?>

</body>
</html>
<?php
include('connect.php');
$in=0;

if(!empty($_GET["var"]))
{
    $in=$_GET["var"];
    //echo $in;

$sql = "INSERT INTO henil (c)
                    VALUES ($in )";

switch($in){
    case 1: $str= "forward";
     break;
    case 2: $str= "backward";
     break;
    case 3: $str= "right";
     break;
    case 4: $str= "left";
     break;
     case 5: $str= "stop";
     break;
    
}
   if ($conn->query($sql) === TRUE) 
    {
      echo "<br> Last Command Saved as ".$str;
      
    } 
    else 
    {
    echo "<br>";
    echo "Error updating record: " . $conn->error;
    }

}

  
?>