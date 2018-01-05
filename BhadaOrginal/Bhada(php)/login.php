<?php
include 'config/call.php';
session_start();

 if(isset($_SESSION['role']) && $_SESSION['role']=='user' )
{
  header('location:index.php');
}
	 

	# code...

?>
<?php
if (isset($_POST['btnsubmit'])) {

	$username=$_POST['username'];
	$password=$_POST['password'];
	$stmt=$conn->prepare("SELECT adm_id,adm_username,adm_pass from tbl_admin where adm_username=:adm_username And adm_pass=:adm_pass");
	$stmt->bindparam(':adm_username',$username);
	$stmt->bindparam(':adm_pass',$password);
	 $stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
	 if($stmt->rowCount()>0)
        {
          $user = $stmt->fetch();
          $_SESSION['id'] = $user['adm_id'];
          $_SESSION['username']= $user['adm_username'];
            $_SESSION['role']='user';
         
       header('location:index.php');

}


	# code...
}
?>




<!DOCTYPE <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Login form</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>


<body style="background:url(630.jpg)no-repeat; ">

	<div class="container"  >
	 <div class="row centered-form">
		<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4" >

			<div class="jumbotron" style="background:url(630.jpg)no-repeat;opacity:0.90;margin-top:20vh;">
				<form name="loginform" method="post" id="adminlogin">
						<div class="form-group ">
						<h1 align="center">Login</h1>
						</div>
						<div class="form-horizantal">
							<div class="form-group input-group">

							<span class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</span>
							<input type="text" class="form-control" placeholder="Username" name="username" required>


							</div>

								<div class="form-group input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-lock"></span>
								</span>
							<input type="password" class="form-control" placeholder="password" name="password"  required>


							</div>

								<button ype="submit" class="btn btn-success btn-block" name="btnsubmit">Submit</button> 


							</div>

					</form>
				</div>
				
			</div>
		</div>
	</div>
			
</body>
</html>