<?php
	
 
  include 'header.php';
  include 'sidebar.php';
  

	 $id = $_GET['id'];

	try
	{
		$stmt = $conn->prepare("DELETE from tbl_bhada where bha_id='$id'");
		if($stmt->execute())
		{
			header('location:faretable.php');
		}
	}
	catch(PDOException $e)
	{
	?>
		<script type="text/javascript">
		alert("error");
		</script>
	<?php

	}
?>