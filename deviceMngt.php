<!DOCTYPE html>
<html>
<head>
	<title> Device Management</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h1 class="text-center text-primary text-upper">
		Device Management
	</h1>
	<div class="d-flex justify-content-end">
		<button type="button" class="btn  btn-warning" data-toggle="modal" data-target="#addModal">
       Add Device</button>
	</div>
	<h2 class="text-danger"> All Device</h2>
	<div id="alldevice"></div>

	<div class="modal" id="addModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
       <h4 class="modal-title">Device Registration</h4>
        </div>
        <div class="modal-body">
       
          <div class="form-group form-row" >
        <label for="sno" class="col-sm-4 col-form-label">Serial No:</label>
        <input type="text" class="form-control col-sm-4" id="sno" >  </div>
        <div class="form-group form-row" >
        <label for="did" class="col-sm-4 col-form-label">Device Id:</label>
        <input type="text" class="form-control col-sm-4" id="did" >  </div>
        <div class="form-group form-row" >
        <label for="mp" class="col-sm-4 col-form-label">Measuring Parameter:</label>
        <input type="text" class="form-control col-sm-4" id="mp" >  </div>
        <div class="form-group form-row" >
        <label for="unit" class="col-sm-4 col-form-label">Unit</label>
        <input type="text" class="form-control col-sm-4" id="unit" >  </div>
        <div class="form-group form-row">
        <label for="loc" class="col-sm-4">Location
        </label>
        <input type="text" class="form-control col-sm-4" id="loc"></div>
        <div class="form-group form-row">
        <div class="col-sm-4"></div>
        <div class="col-sm-2">
        	<button class="btn btn-success " id="save" onclick="addDevice()" data-dismiss="modal">Save</button></div>
       		<button class="btn btn-danger " id="close" data-dismiss="modal">close</button></div>
        </div>
       
        </div>
      </div>
    </div>
   <!-- update model -->
    <div class="modal" id="updateModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
       <h4 class="modal-title">Device Management</h4>
        </div>
        <div class="modal-body">
       
          <div class="form-group form-row" >
        <label for="usno" class="col-sm-4 col-form-label">Serial No:</label>
        <input type="text" class="form-control col-sm-4" id="usno" >  </div>
        <div class="form-group form-row" >
        <label for="udid" class="col-sm-4 col-form-label">Device Id:</label>
        <input type="text" class="form-control col-sm-4" id="udid" >  </div>
        <div class="form-group form-row" >
        <label for="ump" class="col-sm-4 col-form-label">Measuring Parameter:</label>
        <input type="text" class="form-control col-sm-4" id="ump" >  </div>
        <div class="form-group form-row" >
        <label for="unit1" class="col-sm-4 col-form-label">Unit</label>
        <input type="text" class="form-control col-sm-4" id="unit1" >  </div>
        <div class="form-group form-row">
        <label for="uloc" class="col-sm-4">Location
        </label>
        <input type="text" class="form-control col-sm-4" id="uloc"></div>
        <div class="form-group form-row">
        <div class="col-sm-4"></div>
        <div class="col-sm-2">
        	<button class="btn btn-success  " id="update" data-dismiss="modal" onclick="editDevice()" >Update</button></div>
       		<button class="btn btn-danger ml-sm-3 " id="close" data-dismiss="modal">close
       		</button>
       		<input type="hidden" name="" id="hiddenId">
       	</div>
        </div>
       
        </div>
      </div>
    </div>

</div>
<script>
	$(document).ready(function()
	{
		readData();
	});
	function readData()
	{
		var readrecord="readrecord";
		$.ajax
		({
			url:"backend.php",
			type:"post",
			data:{readrecord:readrecord},
			success:function(data,status)
			{
				$('#alldevice').html(data);
			}
		});
	}
	function addDevice()
	{
      var sno=$('#sno').val();
      var did=$('#did').val();
      var mp=$('#mp').val();
      var unit=$('#unit').val();
      var loc=$('#loc').val();
      $.ajax
      ({
      url:"backend.php",
      type:"post",
      data:{srno:sno,
            devid:did,
            mp:mp,
            unit:unit,
            location:loc
            },
       success: function(data,status){
         	readData();
         }  
      });

	}

	function deleteDevice(deleteid)
	{
		var cof=confirm("Are you sure");
		if(cof==true)
		{
			$.ajax
      		({
      			url:"backend.php",
      			type:"post",
      			data:{deleteid:deleteid},
       			success: function(data,status){
         				readData();
         				}  
      		});
		}	
	}


	function getDevice(Id)
	{
		$('#hiddenId').val(Id);
	 	$.post("backend.php",
      			{Id:Id},
       			 function(data,status){
       			var device=JSON.parse(data);
       			$('#usno').val(device.srno);
     			$('#udid').val(device.devid);
     			$('#ump').val(device.mp);
       			$('#unit1').val(device.unit);
      			$('#uloc').val(device.location);
  
      		});
      		$('#updateModal').modal("show");
		}

		function editDevice()
		{
			var snoupd=$('#usno').val();
			var idupd=$('#udid').val();
			var mpupd=$('#ump').val();
			var unitupd=$('#unit1').val();
			var locupd=$('#uloc').val();
			var hiddenidupd=$('#hiddenId').val();
			$.post("backend.php",{
				hiddenidupd:hiddenidupd,
				snoupd:snoupd,
				idupd:idupd,
				mpupd:mpupd,
				unitupd:unitupd,
				locupd:locupd
			},
			function(data,status)
			{
             $('#updateModal').modal("hide");
             readData();
			}

			);
		}	
	
</script>
</body>
</html>