
  <?php
  include 'header.php';
  include 'sidebar.php';
  ?>
<?

  if(isset($_POST['btnsubmit']))
  {
  echo "string";
  


    try {
        $km=$_POST['km'];
  $fare=$_POST['fare'];
  
    $admin= $_SESSION['id'];

    // set the PDO error mode to exception

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO  tbl_bhada(bha_km,bha_fare,adm_id)
    VALUES (:bha_km,:bha_fare,:adm_id)");
     $stmt->bindparam(':bha_km',$km);
    $stmt->bindparam(':bha_fare',$fare);
 
     $stmt->bindparam(':adm_id',$admin);
 

   if($stmt->execute())
        {
          $msg='<div class="alert alert-success"align="center">
                                  <button type="button" class="close" data-dismiss="alert">
                                    <i class="icon-remove"></i>
                                  </button>

                                  <strong>
                                    <i class="icon-ok"></i>
                                    Inserted!
                                  </strong>
                                  <br>
                                </div>';
           echo $msg;
            ?>
          <script type="text/javascript">
            setTimeout(function () {
                   window.location.href = "faretable.php"; //will redirect to your blog page (an ex: blog.html)
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
  }

?>
  
<div class="main" style=" margin-left: 200px;">
 


<div class="container">
  <div class="row centered-form">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4" >

      <div class="jumbotron" >
        <form name="loginform" method="post" id="adminlogin">
            <div class="form-group ">
            <h3 align="center">Fare</h3>
            </div>
            <div class="form-horizantal">
              <div class="form-group input-group">

              
              <input type="number" class="form-control" placeholder="KM" name="km" id="km" size="50" required>


              </div>
              <div class="form-group input-group">

              
              <input type="number" class="form-control" placeholder="Fare" name="fare" id="fare"  size="50" >


              </div>
               
               </div>
               
 
               

                <button type="submit" class="btn btn-success " name="btnsubmit">Submit</button> 
                     <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button> 


              </div>

          </form>
        </div>
        
      </div>
    </div>
 
  


</div>


