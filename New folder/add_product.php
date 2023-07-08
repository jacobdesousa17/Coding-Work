// add_product.php
<?php 
if(!isset($_COOKIE['user_id'])==true) {
  echo "You must login first!";
  $url = 'index.html';
  echo '<META HTTP-EQUIV=Refresh CONTENT="3; URL='.$url.'">'; 
} else {
  ab();
}
?>

<?php 

function ab(){
  echo "<html>
  <a href='logout.php'>Logout</a><br>
  <b><font size=4>Add product</font></b>
  <form name='input' action='insert_product.php' method='post' required='required'>
  Product Name:  <input type='text' name='product_name' required='required'>
  <br> description:  <input type='text' name='description' required='required'>
  <br><input type='radio' name='product_type' value='electronic' required>Electronic
  <input type='radio' name='product_type' value='appliance'>Appliance
  <input type='radio' name='product_type' value='Home Goods'>Home Goods
  <br> Cost:  <input type='text' name='cost' required='required'>
  <br> Sell Price:  <input type='text' name='sell_price' required='required'>
  <br> Quantity:  <input type='text' name='quantity' required='required'>
  <br>Select a vendor:  <select name='vendor_id'>
  <option value='1001'> XYZ3 </option>
  <option value='1002'> York </option>
  <option value='1003'> TTT </option>
  <option value='1004'> QQQ </option>
  <option value='1005'> WWW </option>
  </select>
  <input type='submit' value='Submit'>

  </form>




</html>";

}
?>