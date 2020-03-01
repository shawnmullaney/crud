 <?php  
 //sort.php  
 $connect = mysqli_connect("localhost", "root", "Frostfiredragon1!!", "minersdb");  
 $output = '';  
 $order = $_POST["order"];  
 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  
 $query = "SELECT * FROM miners ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $result = mysqli_query($connect, $query);  
 $output .= '  
 <table class="table table-bordered">  
      <tr>  
           <th><a class="column_sort" id="minerIp" data-order="'.$order.'" href="#">IP</a></th>  
           <th><a class="column_sort" id="macAddress" data-order="'.$order.'" href="#">MAC</a></th>  
           <th><a class="column_sort" id="minerType" data-order="'.$order.'" href="#">Type</a></th>  
           <th><a class="column_sort" id="plocation" data-order="'.$order.'" href="#">Location</a></th>  
           <th><a class="column_sort" id="hashrate" data-order="'.$order.'" href="#">Hashrate</a></th>  
           <th><a class="column_sort" id="maxTemp" data-order="'.$order.'" href="#">Temps</a></th>  
           <th><a class="column_sort" id="farmName" data-order="'.$order.'" href="#">Farm</a></th>  
           <th><a class="column_sort" id="numCards" data-order="'.$order.'" href="#">Cards</a></th>  
           <th><a class="column_sort" id="uptime" data-order="'.$order.'" href="#">Uptime</a></th>  
           <th><a class="column_sort" id="poolUser" data-order="'.$order.'" href="#">Worker</a></th>  
           <th><a class="column_sort" id="comments" data-order="'.$order.'" href="#">Comments</a></th>  
      </tr>  
 ';  
 while($user_data = mysqli_fetch_array($result))  
 {  
      $output .= '  
      <tr>  
           <td>' . $user_data["minerIp"] . '</td>  
           <td>' . $user_data["macAddress"] . '</td>  
           <td>' . $user_data["minerType"] . '</td>  
           <td>' . $user_data["plocation"] . '</td>  
           <td>' . $user_data["hashrate"] . '</td>  
           <td>' . $user_data["maxTemp"] . '</td>  
           <td>' . $user_data["farmName"] . '</td>  
           <td>' . $user_data["numCards"] . '</td>  
           <td>' . $user_data["uptime"] . '</td>  
           <td>' . $user_data["poolUser"] . '</td>  
           <td>' . $user_data["comments"] . '</td>  
      </tr>  
      ';  
 }  
 $output .= '</table>';  
 echo $output;  
 ?>  
