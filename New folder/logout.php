<?php
$url = 'index.html';
if (isset($_COOKIE['user_id'])) {
    echo "".$_COOKIE['user_id'];
    echo" has been successfully logged out."; 
    unset($_COOKIE['user_id']); 
    unset($_COOKIE['emp_id']);
    echo '<META HTTP-EQUIV=Refresh CONTENT="5; URL='.$url.'">'; 
    } 
else{
  echo"You are not logged in.";
  echo '<META HTTP-EQUIV=Refresh CONTENT="3; URL='.$url.'">'; 
}  



?>