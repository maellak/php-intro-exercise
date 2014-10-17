<html>
  <head>
       <link rel="stylesheet" type="text/css" href="style.css">     
  </head>	

<?php
session_start();
if(isset($_SESSION['results_array']))
{
    $results_arr = $_SESSION['results_array'];
   if(count($results_arr)>=1)
   {
     echo '<table id="customers">';
     echo '<tr>';
     echo '<th>Movies</th>';
     echo '</tr>';
       
       for($i=0; $i<count($results_arr); $i++)
       {
           if($i % 2)
           echo '<tr><td>'.$results_arr[$i].'</td></tr>';
           else
           echo '<tr class="alt"><td>'.$results_arr[$i].'</td></tr>';  
       }
       echo '</table>';
   }
    else
    {
        echo 'There are not movies.';
    }
}
?>
    
</html>