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


function getLoc($id)
{
  include "config1.php";
  $sql="SELECT * FROM thresholdtbl WHERE devid= '$id'";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0)
  {
  if($row=mysqli_fetch_assoc($result))
  $loc= $row['location'];
  }           
  return $loc;              
}


function getMP($id)
{
  include "config1.php";
  $sql="SELECT * FROM thresholdtbl WHERE devid= '$id'";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0)
  {
  if($row=mysqli_fetch_assoc($result))
  $mp= $row['mp'];
  }           
  return $mp;              
}


function getVal($id)
{
	include "config1.php";
	$sql="SELECT * FROM thresholdtbl WHERE devid='$id'";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
	{
	   if($row=mysqli_fetch_assoc($result))
	   $cval= $row['curval'];
	}          
	return $cval;              
}


function getUnit($id)
{
  include "config1.php";
  $sql="SELECT * FROM thresholdtbl WHERE devid='$id'";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0)
  {
     if($row=mysqli_fetch_assoc($result))
     $unit= $row['unit'];
  }          
  return $unit;              
}



function getCval($id)
{
  include 'config1.php'; 
  $sql = "SELECT * FROM sensordata2 where devid='$id' ORDER BY devid DESC  LIMIT 1  "; 
  $result=mysqli_query($con, $sql);
  if(mysqli_num_rows($result)>0)
  {
  if($row=mysqli_fetch_assoc($result))
  $cmpval= $row['mpval'];
  $sql="UPDATE thresholdtbl SET curval='$cmpval' WHERE devid='$id'";
  mysqli_query($con,$sql);
  }

  $sql="SELECT * FROM thresholdtbl WHERE devid='$id'";
  $result = mysqli_query($con,$sql); 
   if(mysqli_num_rows($result)>0)
  {
  	while ($row = mysqli_fetch_array($result)) 
  	{
   	  if($row['maxthreshold'] < $row['curval'])
   	  {
    	$flag=1;
    	$sql="UPDATE thresholdtbl SET flag='$flag' WHERE devid='$id'";
  		mysqli_query($con,$sql);
      }
  	 else 
  	 {
      
      $flag=0;
      $sql="UPDATE thresholdtbl SET flag='$flag' WHERE devid='$id'";
    	mysqli_query($con,$sql);
     }
    }
 }
   return $flag;
}



?>
