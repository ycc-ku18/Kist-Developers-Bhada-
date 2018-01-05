
  <?php
  include 'header.php';
  include 'sidebar.php';
  ?>
<?
 $id = $_GET['id'];

  if(isset($_POST['btnsubmit']))
  {
 
   

  


    try {
        $firstname=$_POST['firstname'];
  $middlename=$_POST['middlename'];
  $lastname=$_POST['lastname'];

   $gender=$_POST['gender'];
  $address=$_POST['address'];
    $contact=$_POST['contact'];
    

    // set the PDO error mode to exception

    // prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE tbl_traffic SET tra_firstname=:tra_firstname,tra_middlename=:tra_middlename,tra_lastname=:tra_lastname,tra_gender=:tra_gender,tra_address=:tra_address,tra_contact=:tra_contact WHERE tra_id=:tra_id ");
      $stmt->bindparam(':tra_id',$id);
    $stmt->bindparam(':tra_firstname',$firstname);
  $stmt->bindparam(':tra_middlename',$middlename);
     $stmt->bindparam(':tra_lastname',$lastname);
  
   $stmt->bindparam(':tra_gender',$gender);
  $stmt->bindparam(':tra_address',$address);
   $stmt->bindparam(':tra_contact',$contact);



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
                   window.location.href = "index.php"; //will redirect to your blog page (an ex: blog.html)
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
      $stmt = $conn->prepare("SELECT * FROM tbl_traffic where tra_id='$id'");
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
           <h3 align="center">AddUser</h>
            </div>
            <div class="form-horizantal">
              <div class="form-group input-group">

              
              <input type="text" class="form-control" placeholder="Firstname" name="firstname" id="firstname" size="50" value="<?php echo $result['tra_firstname'];?>" required>


              </div>
              <div class="form-group input-group">

              
              <input type="text" class="form-control" placeholder="middlename" name="middlename" id="middlename" value="<?php echo $result['tra_middlename'];?>"  size="50" >


              </div>
               <div class="form-group input-group">

              
              <input type="text" class="form-control" placeholder="lastname" name="lastname" id="lastname"  size="50"value="<?php echo $result['tra_lastname'];?>" required >


              </div>
               

         <div class="form-group input-group">

              
            <select  id="gender" name="gender" >
    
                       
                                   
                                      <option value="male"<?php if($result['tra_gender']=='Male') echo 'selected="selected"' ?>>Male</option>
                                       <option value="female"<?php if($result['tra_gender']=='Female') echo 'selected="selected"' ?>>female</option>
                                   
                                   
                                   
                                    </select>


              </div>
              <div class="form-group input-group">

              
              <input type="text" class="form-control" placeholder="Address" name="address" id="address" value="<?php echo $result['tra_address'];?>"  size="50" required>


              </div>


        <div class="form-group input-group">

              
              <input type="number" class="form-control" placeholder="contact" name="contact" id="contact" value="<?php echo $result['tra_contact'];?>" size="50" min="10" max="1o" required>


              </div>

 
               

                <button type="submit" class="btn btn-success " name="btnsubmit">Submit</button> 
               


              </div>

          </form>
        </div>
        
      </div>
    </div>
 
  


</div>

<script type="text/javascript">
  $('#signupform').submit(function() {
    /*alert("Hello");*/
  var filter = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var number= /[0-9 -()+]+$/;
  var alpha= /^[a-zA-Z0-9!-”$%&’()*\+,\/;\[\\\]\/\s^_.`{|}~]+$/;  
  var phone_no=/^(?:\+\d{2})?\d{10}(?:,(?:\+\d{2})?\d{10})*$/;


 var symbols = /[-!$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/;
  var firstname=$('#firstname').val();
  /*alert(firstname);*/
  var middlename=$('#middlename').val();
  /*alert(middlename);*/
  var lastname=$('#lastname').val();
  /*alert(lastname);*/
   var contact =$('#contact').val();

  var address =$('#address').val();
  var admin =$('#admin').val();
  var gender =$('#gender').val();


  if(!alpha.test(firstname))
  {
    /*alert(firstname);*/
    $("#firstname").css({"border": "1px solid red"});
    $('#firstname').focus();
    setTimeout(function() {
       $('#firstname').css({"border": "1px solid #ddd"});
   }, 3000);
        return false;
  }
 
 if(symbols.test(firstname))
  {
    /*alert(firstname);*/
    $("#firstname").css({"border": "1px solid red"});
    $('#firstname').focus();
    setTimeout(function() {
       $('#firstname').css({"border": "1px solid #ddd"});
   }, 3000);
        return false;
  }

if(number.test(firstname))
  {
    /*alert(firstname);*/
    $("#firstname").css({"border": "1px solid red"});
    $('#firstname').focus();
    setTimeout(function() {
       $('#firstname').css({"border": "1px solid #ddd"});
   }, 3000);
        return false;
  }
   if(symbols.test(firstname))
  {
    /*alert(firstname);*/
    $("#firstname").css({"border": "1px solid red"});
    $('#firstname').focus();
    setTimeout(function() {
       $('#firstname').css({"border": "1px solid #ddd"});
   }, 3000);
        return false;
  }


if(symbols.test(middlename))
  {
    /*alert(firstname);*/
    $("#middlename").css({"border": "1px solid red"});
    $('#middlename').focus();
    setTimeout(function() {
       $('#middlename').css({"border": "1px solid #ddd"});
   }, 3000);
        return false;
  }

  if(number.test(middlename))
  {
    /*alert(firstname);*/
    $("#middlename").css({"border": "1px solid red"});
    $('#middlename').focus();
    setTimeout(function() {
       $('#middlename').css({"border": "1px solid #ddd"});
   }, 3000);
        return false;
  }



   if(!alpha.test(lastname))
  {
    /*alert(firstname);*/
    $("#lastname").css({"border": "1px solid red"});
    $('#lastname').focus();
    setTimeout(function() {
       $('#lastname').css({"border": "1px solid #ddd"});
   }, 3000);
        return false;
  }
   if(number.test(lastname))
  {
    /*alert(firstname);*/
    $("#lastname").css({"border": "1px solid red"});
    $('#lastname').focus();
    setTimeout(function() {
       $('#lastname').css({"border": "1px solid #ddd"});
   }, 3000);
        return false;
  }

  
  if(symbols.test(lastname))
  {
    /*alert(firstname);*/
    $("#lastname").css({"border": "1px solid red"});
    $('#lastname').focus();
    setTimeout(function() {
       $('#lastname').css({"border": "1px solid #ddd"});
   }, 3000);
        return false;
  }

   if(!phone_no.test(contact))
  {
    $('#contact').css({"border": "1px solid red"});
    $('#contact').focus();
    setTimeout(function(){
      $('#contact').css({"border":"1px solid #ddd "});
    },3000);
    return false;
  }

if(address=='')
  {
    $("#address").css({"border": "1px solid red"});
     $('#address').focus();
    setTimeout(function() {
       $('#address').css({"border": "1px solid #ddd"});
   }, 5000);
        return false;
  }
  
  

  

 
if(gender=='')
  {
    $("#gender").css({"border": "1px solid red"});
     $('#gender').focus();
    setTimeout(function() {
       $('#gender').css({"border": "1px solid #ddd"});
   }, 5000);
        return false;
  }

if(admin=='')
  {
    $("#admin").css({"border": "1px solid red"});
     $('#admin').focus();
    setTimeout(function() {
       $('#admin').css({"border": "1px solid #ddd"});
   }, 5000);
        return false;
  }
  else 
  {
    return true;
  }
});
        </script>

</body>
</html>

