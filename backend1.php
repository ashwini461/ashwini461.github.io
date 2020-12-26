<?php
 include 'connection1.php';
 extract($_POST);

 //insert data
 if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['mobile']))
 {
    $sql="INSERT INTO registration(name,email,mobile)VALUES('$name','$email','$mobile')";
    mysqli_query($con,$sql);
 }

 //display data
 if(isset($_POST['readrecord']))
 {
 	$data='<table class="table table-bordered table-striped"> 
 	 <tr><thead>
 	    <th>Uid</th>
 		<th>Name</th>
 		<th>Email</th>
 		<th>Mobile</th>
 		<th>Action</th>
 		</thead>
 		</tr>';

 	$sql="SELECT * FROM registration";
 	$result=mysqli_query($con,$sql);
 	if(mysqli_num_rows($result)>0)
 	{
 		$number =1;
	 	while($row=mysqli_fetch_array($result))
	 	{
	 		$data.=' <tbody> <tr>
		 		<td>'.$number.'</td>
		 		<td>'.$row['name'].'</td>
		 		<td>'.$row['email'].'</td>
		 		<td>'.$row['mobile'].'</td>              
		 	    <td><button class="btn btn-warning" onclick="getDevice('.$row['uid'].') ">Edit</button> 
		 	    <button class="btn btn-danger" onclick="deleteDevice('.$row['uid'].') ">Delete</button></td> </tbody> </tr>';
		 	    	$number++;
	 	}
	 
 	}
 	$data.='</table>';
 	echo $data;
}

//delete record
if(isset($_POST['deleteid']))
{
	$id=$_POST['deleteid'];
	$sql="DELETE FROM `registration` WHERE uid='$id'";
	mysqli_query($con,$sql);
}
//update record
if(isset($_POST['Id'])&& isset($_POST['Id'])!= "")
{
	$id=$_POST['Id'];
	$sql="SELECT * FROM registration WHERE uid='$id'";
	$result=mysqli_query($con, $sql);
	$response=array();
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$response=$row;
		}
	}else{
		$response['status']=200;
		$response['message']="Data not found";

	}
	echo json_encode($response);
}

else{
	$response['status']=200;
		$response['message']="Invalid Request";

}
    // update table
    if(isset($_POST['hiddenidupd']))
    {
    	$uhiddenid=$_POST['hiddenidupd'];
    	$uname=$_POST['nameupd'];
		$uemail=$_POST['emailupd'];
		$umobile=$_POST['mobileupd'];
		 
		  $sql="UPDATE `registration` SET `name`='$uname',`email`='$uemail',`mobile`='$umobile' WHERE  `uid`='$uhiddenid'";
		 mysqli_query($con,$sql);
    }
 
 	?>