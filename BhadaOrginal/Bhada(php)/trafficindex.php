
  <?php
  include 'trafficheader.php';
  include 'trafficsidebar.php';
  ?>
  
<div class="main" style=" margin-left: 200px;">
 



<div class="container">
 
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
                            <th>Title</th>
                            <th>Description</th>
                            
                            
                            <th>date</th>
                            
                         
        
      </tr>
    </thead>
    <tbody id="myTable">
      <tr><?
          $stmt = $conn->prepare("SELECT   * from tbl_complain where com_status='1' "); 
                   

                      $stmt->execute();
                      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                     
                    foreach($stmt->fetchAll() as $k=>$v)
                    {
                      $i=1;
                    
                      ?>
                        
                              <td><?php echo $v['com_title'];?></td>
                                
                                  
                          <td><?php echo $v['com_description'];?></td>
                              <td><?php echo $v['com_date'];?></td>
                              
                            
                                 

                                
                                 
                        
                              
                                <td>
                                
                                                 
                           
                       
                      </button> &nbsp;&nbsp;

                            <a href="complainupdate.php?id=<?php echo $v['com_id']; ?>"onclick="return confirm('Are you sure to delete?');"><button type="submit"  class="btn btn-danger btn-xs" ><i class="icon-trash"></i> View</button></a>&nbsp;
                        
                           
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

