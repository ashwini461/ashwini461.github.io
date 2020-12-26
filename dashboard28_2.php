<?php
include "function28_2.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Wheather Monitoring System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container bg-white">
<h3 id="htitle" >WEATHER MONITORING SYSTEM</h3>
<img src="logo1.jpg" style="width:100px;height:50px;">

<div class="form-inline">
    <select class="form-control mr-sm-2" id="cselect">
      <option>select column</option>
      <option>3</option>
      <option>4</option>
    </select>
    <a href="AddNewDevice28_2.php" class="btn btn-primary">Add More Device
    </a>
</div>  
<h6 style="text-align:right;">Powered by cognifront</h6>
<div class="container-fluid col-sm-12 col-12 " id="main"></div>

<script>
var cno;
var  rno=<?php $no=getCount();echo $no; ?>;
$(document).ready(function()
{
  $("#cselect").change(function()
  {
    cno=$("#cselect option:selected").text();
    alert("number of column:"+cno);
    var r=Math.ceil(rno/cno);
    $('#main').empty();

if(cno==3)
{
  <?php
     include 'config1.php';    
     $sql="SELECT * FROM thresholdtbl";
     $result=mysqli_query($con,$sql);
     for($i=0;$i<ceil(getCount()/3);$i++)
     {?>
      $('#main').append("<div class='row rowcss' id=r"+<?php echo $i;?>+" >  ");
       <?php
          
          for($j=0;$j<3;$j++)
          {
           if($row=mysqli_fetch_assoc($result))
           {
              $id=$row['devid'];
              if(mysqli_num_rows($result)>0)
              {
                ?> 
               $('#r'+<?php echo $i;?>).append("<div class='col-4 colcss' id='<?php echo $id;?>'> <div class='row rinner' ><div class='col-sm-6 cvalue'><b>Location</b> </div><div class='col-sm-6 cvalue' ><?php echo getLoc($id)?></div></div><div class='row rinner'><div class='col-sm-6 cvalue'><b><?php echo getMP($id)?></b></div><div class='col-sm-6 cvalue'><?php echo getVal($id)?></div></div><div class='row rinner' ><div class='col-sm-6 cvalue'><b>unit</b> </div><div class='col-sm-6 cvalue' ><?php echo getUnit($id)?></div></div></div>");
              <?php
              $flag=getCval($id);
               if($flag==1)
               {?>
                $('#<?php echo $id;?>').css('background-color', 'red');
                $('#<?php echo $id;?>').css('border-left', '14px solid red');
                $('#<?php echo $id;?>').css('border-right', '14px solid red');
               <?php
                }
               
              }
            }
          }
           ?>
       $('#main').append("</div>");
        <?php    
    }
    ?>
}
else if(cno==4)
{
  <?php
     include 'config1.php';    
     $sql="SELECT * FROM thresholdtbl";
     $result=mysqli_query($con,$sql);
     for($i=0;$i<ceil(getCount()/4);$i++)
     {?>
      $('#main').append("<div class='row rowcss' id=r"+<?php echo $i;?>+" >  ");
       <?php
         
          for($j=0;$j<4;$j++)
          {
           if($row=mysqli_fetch_assoc($result))
           {
              $id=$row['devid'];
              if(mysqli_num_rows($result)>0)
              {
                ?> 
               $('#r'+<?php echo $i;?>).append("<div class='col-3 colcss' id='<?php echo $id;?>'> <div class='row rinner' ><div class='col-sm-6 cvalue'><b>Location</b> </div><div class='col-sm-6 cvalue' ><?php echo getLoc($id)?></div></div><div class='row rinner'><div class='col-sm-6 cvalue'><b><?php echo getMP($id)?></b></div><div class='col-sm-6 cvalue'><?php echo getVal($id)?></div></div><div class='row rinner' ><div class='col-sm-6 cvalue'><b>unit</b> </div><div class='col-sm-6 cvalue' ><?php echo getUnit($id)?></div></div></div>");
              <?php
              $flag=getCval($id);
               if($flag==1)
               {?>
                $('#<?php echo $id;?>').css('background-color', 'red');
                $('#<?php echo $id;?>').css('border-left', '14px solid red');
                $('#<?php echo $id;?>').css('border-right', '14px solid red');
               <?php
                }
               
              }
            }
          }
           ?>
       $('#main').append("</div>");
        <?php    
    }
    ?>
}
else
{
  alert("Invalid move");
}

});
});
</script>
</div>
</body>
</html>