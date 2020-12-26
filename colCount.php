<?php

function getCount()
{
include "config1.php";
$sql="SELECT COUNT(*) FROM threshold";

$result=mysqli_query($con,$sql);  
$row = mysqli_fetch_array($result);

$total = $row[0];


    return $total;
}
function getTemp($id)
{
  include "config1.php";
               $sql="SELECT * FROM threshold WHERE devid='$id'";
$ctemp=0;
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
if($row=mysqli_fetch_assoc($result))
               $ctemp= $row['curtemp'];
}          
return $ctemp;              
}
function getLoc($id)
{
  include "config1.php";
               $sql="SELECT * FROM threshold WHERE devid= '$id'";
$loc=0;
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
if($row=mysqli_fetch_assoc($result))
               $loc= $row['location'];
}           
return $loc;              
}

?>
