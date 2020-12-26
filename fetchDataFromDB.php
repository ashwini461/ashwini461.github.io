<?php
function getCount()
{
include "config.php";
$sql="SELECT COUNT(*) FROM stud";

$result=mysqli_query($con,$sql);  
$row = mysqli_fetch_array($result);

$total = $row[0];


    return $total;
}
function getVal($id)
{
include "config.php";
$sql="SELECT * FROM stud WHERE rno=$id";
$result=mysqli_query($con,$sql);
    $name = "";
    while($row=mysqli_fetch_assoc($result))
    {
        $name=$row['name'];
    }
    return $name;
}
?>
<html>   
<head>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>  
      
        $(document).ready(function() {

              
              <?php
              for ($i = 1; $i <= getCount(); $i++)
              {
                
              ?>
               $("#textboxDiv").append("<div><br><label for='name'><?php echo getVal($i)?></label><br></div>");
                alert("hello"); 
              <?php
              }
              ?>
        });  
    </script>  
</head>  
  
<body>  
    <div id="textboxDiv">  HEllo
        <?php $no=getCount();echo $no; ?></div>  
       
     
</body>  
  
</html>  