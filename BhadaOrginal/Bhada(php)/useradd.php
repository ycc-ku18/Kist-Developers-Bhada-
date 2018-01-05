
  <?php
  include 'header.php';
  include 'sidebar.php';
  ?>
<?

  if(isset($_POST['btnsubmit']))
  {
  echo "string";
  


    try {
        $firstname=$_POST['firstname'];
  $middlename=$_POST['middlename'];
  $lastname=$_POST['lastname'];
  $password=$_POST['password'];
   $gender=$_POST['gender'];
  $address=$_POST['address'];
  $username=$_POST['username'];
    $contact=$_POST['contact'];
    $admin= $_SESSION['id'];

    // set the PDO error mode to exception

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO  tbl_traffic(tra_username,tra_firstname,tra_middlename,tra_lastname,tra_password,tra_gender,tra_address,tra_contact,adm_id)
    VALUES (:tra_username,:tra_firstname,:tra_middlename,:tra_lastname,:tra_password,:tra_gender,:tra_address,:tra_contact,:adm_id)");
     $stmt->bindparam(':tra_username',$username);
    $stmt->bindparam(':tra_firstname',$firstname);
  $stmt->bindparam(':tra_middlename',$middlename);
     $stmt->bindparam(':tra_lastname',$lastname);
  $stmt->bindparam(':tra_password',$password);
   $stmt->bindparam(':tra_gender',$gender);
  $stmt->bindparam(':tra_address',$address);
   $stmt->bindparam(':tra_contact',$contact);
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
                   window.location.href = ".php"; //will redirect to your blog page (an ex: blog.html)
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
            <h3 align="center">AddUser</h>
            </div>
            <div class="form-horizantal">
              <div class="form-group input-group">

              
              <input type="text" class="form-control" placeholder="Firstname" name="firstname" id="firstname" size="50" required>


              </div>
              <div class="form-group input-group">

              
              <input type="text" class="form-control" placeholder="middlename" name="middlename" id="middlename"  size="50" >


              </div>
               <div class="form-group input-group">

              
              <input type="text" class="form-control" placeholder="lastname" name="lastname" id="lastname"  size="50" required >


              </div>
               </div>
               <div class="form-group input-group">

              
              <input type="text" class="form-control" placeholder="username" name="username" id="username"  size="50" required >


              </div>
               <div class="form-group input-group">

              
              <input type="password" class="form-control" placeholder="password" name="password" id="password" size="50" required>


              </div>

         <div class="form-group input-group">

              
            <select  id="gender" name="gender" >

                      
                                     <option value="0">Select gender</option>
                                      <option value="1">male</option>
                                       <option value="2">Female</option>
                                   
                                   
                                   
                                    </select>


              </div>
              <div class="form-group input-group">

              
              <input type="text" class="form-control" placeholder="Address" name="address" id="address"  size="50" required>


              </div>


        <div class="form-group input-group">

              
              <input type="number" class="form-control" placeholder="contact" name="contact" id="contact"  size="50" min="10" max="1o" required>


              </div>

 
               

                <button type="submit" class="btn btn-success " name="btnsubmit">Submit</button> 
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button> 
             


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

