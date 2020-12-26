<?php
include 'config.php';
?>
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
  <script>

    $(document).ready(function(){

        $("#myModal").modal('show');

    });

</script>
</head>
  <body>
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Device Management</h4>
        </div>
        <div class="modal-body">
        <form action="sendData.php" method="post">
        <div class="form-group form-row" >
        <label for="did" class="col-sm-4 col-form-label">Device Id</label>
        <input type="text" class="form-control col-sm-4"name="did" id="did" >  </div>
        <div class="form-group form-row">
        <label for="loc" class="col-sm-4">Location
        </label>
        <input type="text" class="form-control col-sm-4" name="loc" id="loc"></div>
        <div class="form-group form-row">
        <label for="temp" class="col-sm-4">Temperature</label>
        <input type="text" class="form-control col-sm-4" name="temp" id="tmp"></div>
        <div class="form-group form-row">
        <div class="col-sm-4"></div>
        <div class="col-sm-2"><input type="submit" class="btn btn-info " value="OK" name="submit"></div>
        </div>
        </form>
        </div>
      </div>
    </div>
 
</body>
</html>
