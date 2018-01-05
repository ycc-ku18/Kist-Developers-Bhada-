

  <?php
  include 'trafficheader.php';
  include 'trafficsidebar.php';
  ?>
<?
 $id = $_GET['id'];
 
  echo "string";
  


    try {
        
  $status=0;
  
    

    // set the PDO error mode to exception

    // prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE  tbl_complain SET com_status=:com_status Where com_id=:com_id");
     $stmt->bindparam(':com_id',$id);
     $stmt->bindparam(':com_status',$status);
   
    
 

   if($stmt->execute())
        {
          $msg='<div class="alert alert-success"align="center">
                                  <button type="button" class="close" data-dismiss="alert">
                                    <i class="icon-remove"></i>
                                  </button>

                                  <strong>
                                    <i class="icon-ok"></i>
                                    Reoved!
                                  </strong>
                                  <br>
                                </div>';
           echo $msg;
            ?>
          <script type="text/javascript">
            setTimeout(function () {
                   window.location.href = "trafficindex.php"; //will redirect to your blog page (an ex: blog.html)
                }, 2000);
          </script>
          <?php
        }

    echo $msg;
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    
  }

?>
  