<?php  
 //index.php  
 $connect = mysqli_connect('localhost', 'root', '', 'testing');  
 $query = "SELECT * FROM tbl_employee ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Ajax Jquery Column Sort with PHP & MySql</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />            
           <div class="container" style="width:700px;" align="center">  
                <h3 class="text-center">Ajax Jquery Column Sort with PHP & MySql</h3><br />  
                <div class="table-responsive" id="employee_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th><a class="column_sort" id="id" data-order="desc" href="#">ID</a></th>  
                               <th><a class="column_sort" id="name" data-order="desc" href="#">Name</a></th>  
                               <th><a class="column_sort" id="gender" data-order="desc" href="#">Gender</a></th>  
                               <th><a class="column_sort" id="designation" data-order="desc" href="#">Designation</a></th>  
                               <th><a class="column_sort" id="age" data-order="desc" href="#">Age</a></th>  
                          </tr>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["id"]; ?></td>  
                               <td><?php echo $row["name"]; ?></td>  
                               <td><?php echo $row["gender"]; ?></td>  
                               <td><?php echo $row["designation"]; ?></td>  
                               <td><?php echo $row["age"]; ?></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $(document).on('click', '.column_sort', function(){  
           var column_name = $(this).attr("id");  
           var order = $(this).data("order");  
           var arrow = '';  
           //glyphicon glyphicon-arrow-up  
           //glyphicon glyphicon-arrow-down  
           if(order == 'desc')  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';  
           }  
           else  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';  
           }  
           $.ajax({  
                url:"sort.php",  
                method:"POST",  
                data:{column_name:column_name, order:order},  
                success:function(data)  
                {  
                     $('#employee_table').html(data);  
                     $('#'+column_name+'').append(arrow);  
                }  
           })  
      });  
 });  
 </script>  
