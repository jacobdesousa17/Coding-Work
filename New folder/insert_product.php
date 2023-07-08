// insert_product.php
<?php 
#day 19
if(!isset($_COOKIE['user_id'])) {
  echo "You must login first!";
  $url = 'index.html';
  echo '<META HTTP-EQUIV=Refresh CONTENT="3; URL='.$url.'">'; 
} else {
  
  include 'dbconfig.php';

  echo"<a href='logout.php'>logout</a> <br>";
  $PN = mysqli_real_escape_string($con,$_POST['product_name']);
  $DS = mysqli_real_escape_string($con,$_POST['description']);
  $PT = $_POST['product_type'];
  $C = $_POST['cost'];
  $SP = $_POST['sell_price'];
  $QT = $_POST['quantity'];
  $VD = $_POST['vendor_id'];
  $EI = $_COOKIE['employee_id'];


if (($C > 0 && $SP > 0)&&($QT > 0)){
  if($C<$SP){
      $sql ="SELECT * FROM TECH3740_2022S.Products_nashask WHERE (name='$PN')";
      $result = mysqli_query($con, $sql);
      if($result)  {
        if (mysqli_num_rows($result)>0){
          echo"ERROR! There are same products in the database!";
          $url = 'http://obi.kean.edu/~nashask/TECH3740/add_product.php';
          echo '<META HTTP-EQUIV=Refresh CONTENT="3; URL='.$url.'">';
           }
        else{
          $sql2 = "INSERT INTO TECH3740_2022S.Products_nashask (p_id,name,description,type,sell_price,cost,quantity,e_id,v_id) VALUES ('null','$PN','$DS','$PT','$SP','$C','$QT','$EI','$VD');";
          $result2 = mysqli_query($con,$sql2);
          echo"Successfully insert the product: <b>".$PN."</b>";
          }       
}
  }
  else{
    echo"Sell price cannot be less than cost.";
  }
  }

if ($QT<=0){
    $url = 'http://obi.kean.edu/~nashask/TECH3740/add_product.php';
    echo "quantity must be greater than 0.";
    echo '<META HTTP-EQUIV=Refresh CONTENT="3; URL='.$url.'">'; }
if ($SP<=0){
    $url = 'http://obi.kean.edu/~nashask/TECH3740/add_product.php';
    echo "Sell price must be greater than 0.";
    echo '<META HTTP-EQUIV=Refresh CONTENT="3; URL='.$url.'">';} 
if ($C<=0){
    $url = 'http://obi.kean.edu/~nashask/TECH3740/add_product.php';
    echo "Cost must be greater than 0.";
    echo '<META HTTP-EQUIV=Refresh CONTENT="3; URL='.$url.'">'; 
  }
  else{

    echo"error!";
  }


  }



/*
  
  if($SP<$C){
    echo"Sell price cannot be less than cost.";
    $url = 'http://obi.kean.edu/~nashask/TECH3740/add_product.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="3; URL='.$url.'">';   
  }
*/


//$query="INSERT into Products_nashask VALUES " ; 
      



  //$sql4 = insert into Products_nashask VALUES (null,$PN,$DS,$PT,$SP,$C,$QT,$EI,$VD); 
  //$echo"Successfully insert the product: ".$EI;

mysqli_close($con);
#insert the information into table and return successfully insert the product
?>