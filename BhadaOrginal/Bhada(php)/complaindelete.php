<?php
	
 include 'trafficheader.php';
  include 'trafficsidebar.php';
  

	 $id = $_GET['id'];

	try
	{
		$stmt = $conn->prepare("DELETE from tbl_complain where com_id='$id'");
		if($stmt->execute())
		{
			header('location:history.php');
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