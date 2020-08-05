
<?php
$connect = mysqli_connect("localhost", "root", "", "register");
$query = "SELECT * FROM user ORDER BY id DESC";
$result = mysqli_query($connect, $query);
?>
<html>  
 <head>  
          <title>Live Table Data Edit Delete using Tabledit Plugin in PHP</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="jquery.tabledit.min.js"></script>
    </head>  
    <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
            <div class="table-responsive">  
    <h3 align="center">Live Table Data Edit Delete using Tabledit Plugin in PHP</h3><br />  
    <table id="editable_table" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>First Name</th>
       <th>Last Name</th>
      </tr>
     </thead>
     <tbody>
     <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["id"].'</td>
       <td>'.$row['firstname'].'</td>
       <td>'.$row['lastname'].'</td>
      </tr>
      ';
     }
     ?>
     </tbody>
    </table>
   </div>  
  </div> 
 </body>  
</html>  
<script>  
$(document).ready(function(){  
     $('#editable_table').Tabledit({
      url:'process_tableadmin.php',
      columns:{
       identifier:[0, "id"],
       editable:[[1, 'firstname'], [2, 'lastname']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();
       }
      }
     });
 
});  

 </script>

 <div class="container">                 
  <ul class="pager">
    <li><a href="logout.php">Logout</a></li>
    <li><a href="">Next</a></li>
  </ul>
</div>
</html> 