
  <?php
  include 'header.php';
  include 'sidebar.php';
  ?>
<?
 $id = $_GET['id'];
  if(isset($_POST['btnsubmit']))
  {
  echo "string";
  


    try {
        $km=$_POST['km'];
  $fare=$_POST['fare'];
  
    

    // set the PDO error mode to exception

    // prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE  tbl_bhada SET bha_km=:bha_km, bha_fare=:bha_fare Where bha_id=:bha_id");
     $stmt->bindparam(':bha_id',$id);
     $stmt->bindparam(':bha_km',$km);
    $stmt->bindparam(':bha_fare',$fare);
 
    
 

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
                   window.location.href = "fartable.php"; //will redirect to your blog page (an ex: blog.html)
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
try
     {
      $stmt = $conn->prepare("SELECT * FROM tbl_bhada where bha_id='$id'");
      $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
      $result=$stmt->fetch();
      /*print_r($result);*/
     }
     catch(PDOException $e)
     {?>
      <script>
        alert("Error while fetching data");
      </script>
     <?php
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

              
              <input type="number" class="form-control" placeholder="KM"value="<?php echo $result['bha_km'];?>" name="km" id="km" size="50" required>


              </div>
              <div class="form-group input-group">

              
              <input type="number" class="form-control" placeholder="Fare" name="fare" id="fare"value="<?php echo $result['bha_fare'];?>"  size="50" >


              </div>
               
               </div>
               
 
               

                <button type="submit" class="btn btn-success " name="btnsubmit">Submit</button> 
             


              </div>

          </form>
        </div>
        
      </div>
    </div>
 
  


</div>


