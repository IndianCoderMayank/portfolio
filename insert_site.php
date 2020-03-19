<!DOCTYPE html>
<html>
<head>
	<title> Search Engine</title>
    <!--bootstrap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>

<div class="container">
	<br>
	<center>
		<h2>
			Insert Website
		</h2><br>
	</center>

	<form action="insert_site.php" method="post" enctype ="multipart/form-data">

		<div class="form-group">
			<div class="row">
				<label class="col-sm-2" for="stitle">
					 Site Title
				</label>

				<div class="col-sm-10">
					<input type="text" class="form-control" id="stitle" name="s_title" placeholder="Enter Site Title" required>
				</div>
			</div>
		</div>

		<div class="form-group">
 
		<div class="row">
				<label class="col-sm-2" for="stitle">
					 Site Link
				</label>

				<div class="col-sm-10">
					<input type="text" class="form-control" id="slink" name="s_link" placeholder="Enter Site link"required>
				</div>
			</div>
		</div>
		<div class="form-group">
		<div class="row">
				<label class="col-sm-2" for="stitle">
					 Site Keywords
				</label>

				<div class="col-sm-10">
					<input type="text" class="form-control" id="sKey" name="s_Key" placeholder="Enter Site Keywords"required>
				</div>
			</div>
		</div>

		<div class="form-group">
		<div class="row">
				<label class="col-sm-2" for="stitle">
					 Site Description
				</label>

				<div class="col-sm-10">
					<textarea class="form-control" id="sdis" name="s_dis" placeholder="Enter Site Description"required></textarea>
				</div>
			</div>
		</div>

		<div class="form-group">
		<div class="row">
				<label class="col-sm-2" for="stitle">
					 Site Image
				</label>

				<div class="col-sm-10">
					<input type="file" name="s_img" class="form-control">
				</div>
			</div>
		</div>	

		<div class="form-group">
	    <center>
			<input type="submit" name="submit" class="btn btn-outline-success" value="Add Website">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="reset" name="cancel" class="btn btn-outline-danger" value="Cancel">
	    </center>
		</div>
		
	</form>
</div>



<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php

   $con = mysqli_connect("localhost","root","","search");

if (isset($_POST["submit"]))
{
	$s_title = addslashes($_POST["s_title"]);
	$s_link =  addslashes($_POST["s_link"]);
	$s_Key =  addslashes($_POST["s_Key"]);
	$s_dis =  addslashes($_POST["s_dis"]);
	$s_img =  addslashes($_FILES["s_img"] ["name"]);

	if (move_uploaded_file($_FILES["s_img"]["tmp_name"],"img/".$_FILES["s_img"] ["name"])) 
	{
		$sql1 = "insert into website(site_title , site_link , site_key , site_dis , site_img) values('$s_title','$s_link', '$s_Key' , '$s_dis', '$s_img')";

		$rs = mysqli_query($con ,$sql1 );
		if ($rs) 
		{
			echo "<script> alert('Site Uploaded Successfuly') </script>";
		}

		else
		{

			echo "<script> alert('Site Uploading Faild, Please try again') </script";
		}
	}
}

?>