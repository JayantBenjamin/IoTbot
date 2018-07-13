<?php
////////////////////////////////////// initialise sql variables/////////////////////////////////

///////////////////////////////////////variables //////////////
$last_id=0;
$id=0;
$com=0;
////////////////////////// getting last ID////////////////////////////////////////
// Create connection
include('connect.php');
$sql= "SELECT MAX(id) FROM henil";
$result = $conn->query($sql);
$max_public_id = mysqli_fetch_row($result);
$last_id = $max_public_id[0];
$conn->close();

///////////////////////////get data associated to id no///////////////////////////////////////////////////
// Create connection

$id=$last_id;
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM henil";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
      if($row["id"]==$last_id)
      {
        
        $com=$row["c"];
        
      }
     
    }
}

else 
{
    echo "0 results";
}

echo $com;

?>