<?php
	
 
  include 'header.php';
  include 'sidebar.php';
  

	 $id = $_GET['id'];

	try
	{
		$stmt = $conn->prepare("DELETE from tbl_traffic where tra_id='$id'");
		if($stmt->execute())
		{
			header('location:index.php');
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