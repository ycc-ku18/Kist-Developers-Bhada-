
  <?php
  include 'header.php';
  include 'sidebar.php';
  ?>
  
<div class="main" style=" margin-left: 200px;">
 



<div class="container">
 
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>

                            <th>Name</th>
                             <th>Username</th>
                            
                            <th>Phoneno</th>
                            <th>Address</th>
                            <th>gender</th>
        
      </tr>
    </thead>
    <tbody id="myTable">
      <tr><?
          $stmt = $conn->prepare("SELECT   * from tbl_traffic "); 
                   

                      $stmt->execute();
                      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                     
                    foreach($stmt->fetchAll() as $k=>$v)
                    {
                      $i=1;
                    
                      ?>

                          <td><?php echo $v['tra_firstname']." ".$v['tra_lastname'];?></td>
                            <td><?php echo $v['tra_username']?></td>
                              
                          <td><?php echo $v['tra_contact'];?></td>
                              <td><?php echo $v['tra_address'];?></td>
                              
                              <td><?php echo $v['tra_gender'];?></td>
                                
                                  
                                 

                                
                                 
                        
                              
                                <td>
                                
                                                 
                            <a href="traffic.php?id=<?php echo $v['tra_id'];?>"><button type="submit" class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil"></i>
                        EDIT
                      </button> &nbsp;&nbsp;

                            <a href="trafficdelete.php?id=<?php echo $v['tra_id']; ?>"onclick="return confirm('Are you sure to delete?');"><button type="submit"  class="btn btn-danger btn-xs" ><i class="icon-trash"></i> DELETE</button></a>&nbsp;
                        
                           
                              </td>
                            </tr> 
                          
                              
                                
                                
                                                     
                            
                          
                              <?php }
                            ?>
                              



                           
      </tr>
    </tbody>
  </table>
  


</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>

