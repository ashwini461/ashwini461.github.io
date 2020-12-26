<?php
/*$url1=$_SERVER['REQUEST_URI'];
header("Refresh:30; url=$url1");*/?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
 <title>Wheather Monitoring System</title>
 <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
 <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
  <script src="vdashchart1.js"></script>
<style>
      
html,
body {
  height: 100%;
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  padding: 0;
  margin: 0;
  overflow: auto;
}

.page-container {
  margin: 20px;
}


/* horizontal panel*/

.panel-container {
  display: flex;
  flex-direction: row;
  border: 1px solid silver;
  overflow: hidden;  
  /* avoid browser level touch actions */
  xtouch-action: none;
}

.panel-left {
  flex: 0 0 auto;
  /* only manually resize */
  padding: 10px;
  width: 300px;
  min-height: 200px;
  min-width: 150px;
  white-space: nowrap;
  background: #838383;
  color: white;
}

.splitter {
  flex: 0 0 auto;
  width: 18px;  
  background: url(https://raw.githubusercontent.com/RickStrahl/jquery-resizable/master/assets/vsizegrip.png) center center no-repeat #535353;
  min-height: 200px;
  cursor: col-resize;  
}

.panel-right {
  flex: 1 1 auto;
  /* resizable */
  padding: 10px;
  width: 100%;
  min-height: 200px;  
  background: #eee;
}

* {
  box-sizing: border-box;
}

input[type=text], select,input[type=datetime-local]{
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

button:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}


@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
#rpanel {  
  background: #1D1F20;
  padding: 16px;
}

canvas {
  border: 1px dotted red;
}

.chart-container {
 position: relative;
  margin: auto;
  height: 45vh;
  width: 60vw;
}


  </style>

  
</head>
<body style="">
    <div class="page-container">
        <h2 style="text-align: center;color:dodgerblue;">WEATHER MONITORING SYSTEM </h2>
        <div class="row"><img src="logo1.jpg" style="width:100px" >
        <h6 style="text-align:right;">Powered by cognifront</h6></div>
        <hr/>
        <label>Fill Device Information:</label>

        <div class="panel-container">

            <div class="panel-left">
                 <form >
    <div class="row">
      <div class="col-25">
        <label for="devid">Device Id</label>
      </div>
      <div class="col-75">
        <input type="text" id="devid" name="devid" placeholder="Enter device id.">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="loc">Location</label>
      </div>
      <div class="col-75">
         <select id="sloc" name="sloc">
          <option value="" disabled selected >Select Location</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="sdate">Start Date</label>
      </div>
      <div class="col-75">
        <input type="datetime-local" id="sdate" name="sdate">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="ldate">End Date</label>
      </div>
      <div class="col-75">
        <input type="datetime-local" id="ldate" name="ldate">
      </div>
    </div>
    <div class="row">
     <button id="btnshow"> show Graph</button>
    </div>
  </form>
</div>

              

            <div class="splitter">
            </div>

            <div class="panel-right" id="rpanel">
               <div class="chart-container">
                <canvas id="graphCanvas"></canvas>
              </div>

            </div>
        </div>



    </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://rawgit.com/RickStrahl/jquery-resizable/master/src/jquery-resizable.js'></script>

    <script  >

    
 $(".panel-left").resizable({
   handleSelector: ".splitter",
   resizeHeight: false   
 });

 $(".panel-top").resizable({
   handleSelector: ".splitter-horizontal",
   resizeWidth: false
   
 });
    </script>
    <script >
      $(document).ready(function () {
       showGraph();
         $("button").on("click", function(){
          addData();
         });
        });

      function addData()
     {
      var id=$('#devid').val();
      var loc=$('#sloc').val();
      var sdate=$('#sdate').val();
      var ldate=$('#ldate').val();
      alert(id+","+loc+","+sdate+","+ldate);
      $.ajax({
        url: "data1.php",
        type: "POST",
        data:{id: id,
          loc:loc,
          sdate: sdate,
          ldate: ldate        
        },
       success: function(data,status){
              alert("record inserted");      
          }
          
      });
       

  }

      
    </script>

</body>

</html>