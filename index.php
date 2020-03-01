<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
/**
*my table is 
*div container 440X64008
* 	<link href="style.css" rel="stylesheet" type="text/css"/>
* 
* 689x63935**/
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database //  <link href="style2.css" rel="stylesheet" type="text/css"/>
$result = mysqli_query($mysqli, "SELECT * FROM miners ORDER BY plocation ASC");
?>

<html>
<head>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  	
    <title>O-Chit-Chawn</title>
</head>

<body>
<a href="add.php">Add New Miner</a><br/><br/>
<p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
    <table width='80%' border=1>
<div class="container" style="width:700px;" align="center">  
                <h3 class="text-center">2Chawnz Monitoring</h3><br />  
                <div class="table-responsive" id="employee_table">  
                     <table class="table table-bordered">  
   
<tr>  
            <th><a class="column_sort" id="minerIp" data-order="desc" href="#">IP</a></th>  
            <th><a class="column_sort" id="macAddress" data-order="desc" href="#">MAC</a></th>  
            <th><a class="column_sort" id="minerType" data-order="desc" href="#">Type</a></th>  
            <th><a class="column_sort" id="plocation" data-order="desc" href="#">Location</a></th>  
            <th><a class="column_sort" id="hashrate" data-order="desc" href="#">Hashrate</a></th>  
            <th><a class="column_sort" id="maxTemp" data-order="desc" href="#">Temps</a></th>  
            <th><a class="column_sort" id="farmName" data-order="desc" href="#">Farm</a></th>  
            <th><a class="column_sort" id="numCards" data-order="desc" href="#">Cards</a></th>  
            <th><a class="column_sort" id="uptime" data-order="desc" href="#">Uptime</a></th>  
            <th><a class="column_sort" id="poolUser" data-order="desc" href="#">Worker</a></th>  
            <th><a class="column_sort" id="comments" data-order="desc" href="#">Comments</a></th>  
</tr>     
    <?php  
    while($user_data = mysqli_fetch_array($result)) {     
        echo "<tr>";
        echo "<td>".$user_data['minerIp']."</td>";
        echo "<td>".$user_data['macAddress']."</td>";
        echo "<td>".$user_data['minerType']."</td>";    
        echo "<td>".$user_data['plocation']."</td>";
        echo "<td>".$user_data['hashrate']."</td>";  
        echo "<td>".$user_data['maxTemp']."</td>";  
        echo "<td>".$user_data['farmName']."</td>";    
        echo "<td>".$user_data['numCards']."</td>";
        echo "<td>".$user_data['uptime']."</td>";  
        echo "<td>".$user_data['poolUser']."</td>";  
        echo "<td>".$user_data['comments']."</td>";  
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
    </div>
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
