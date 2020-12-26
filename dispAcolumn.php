<!DOCTYPE html>
<html>
<head>
<title>Temperature Monitoring System</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style>
    #dept1
    {
      background-color:red;
    }
    #main
    {
      border: 15px solid mediumseagreen;
      width: 150%; 
      padding-left:20px;
      padding-right: 20px; 
      margin-left: -12px;
      
    }
    
    .rinner{
      border:0.1px solid white;
      
    }
    .cvalue{
      text-align: center;
      border:1px solid white;
      background-color: #a6a6a6;
      padding: 5px;

    }
    .rowcss
    {
      /*border: 1px solid;*/
      padding:2px;
      /*margin:5px;*/
    }
    .colcss
    {
      border: 1px solid white;
      padding:15px;
      margin:0px;
    }
    h3
    {
      text-align: center;
      padding:10px;
      margin:10px;
      color:dodgerblue;
    }
  
  </style>

</head>

<body>

<div class="container bg-white">
<h3 id="htitle" >TEMPERATURE MONITORING SYSTEM</h3>
<img src="logo1.jpg" style="width:100px;height:50px;">
<h6 style="text-align:right;">Powered by cognifront</h6>
	
		<div class="container " id="main">
		  
</div>
<script>
  var c=2;

  $(document).ready(function(){
    if(c==2)
    {
    for(var i=0;i<2;i++)
    {
      $('#main').append("<div class='row rowcss' id=r"+i+" >  ");
    // var rid=$("div.row").attr("id");
     
      for(var j=0;j<2;j++)
      {
        $('#r'+i).append("<div class='col-sm-6 colcss' id='d101'> <div class='row rinner' ><div class='col-sm-6 cvalue'><b>Location </div><div class='col-sm-6 cvalue' >Temperature</b></div></div><div class='row rinner'><div class='col-sm-6 cvalue'>A</div><div class='col-sm-6 cvalue'id='deval1'>35</div></div></div>");
      }
      $('#main').append("</div>");
  }
}
else
{

    for(var i=0;i<2;i++)
    {
      $('#main').append("<div class='row rowcss' id=r"+i+" >  ");
    // var rid=$("div.row").attr("id");
     
      for(var j=0;j<3;j++)
      {
        $('#r'+i).append("<div class='col-sm-4 colcss' id='d101'> <div class='row rinner' ><div class='col-sm-6 cvalue'><b>Location </div><div class='col-sm-6 cvalue' >Temperature</b></div></div><div class='row rinner'><div class='col-sm-6 cvalue'>A</div><div class='col-sm-6 cvalue'id='deval1'>35</div></div></div>");
      }
      $('#main').append("</div>");
  }

}
  
  });


</script>
</div>
</body>
</html>