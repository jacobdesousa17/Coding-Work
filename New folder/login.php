login.php

<!DOCTYPE html>
<html>
<head>

<body>
    
<?php

$servername = "imc.kean.edu";
$username = "desousja";
$password = "1093244";
$dbname = "TECH3740_2022S";

$conn = new mysqli('imc.kean.edu', 'desousja', '1093244', 'TECH3740_2022S');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ip = $_SERVER['REMOTE_ADDR']; 
echo "<br>Your IP: $ip\n";
$IPv4= explode(".",$ip);   #split token

if (($IPv4[0]=="131" && $IPv4[1]=="125") || ($IPv4[0]=="10"))
             { echo "<br>You are from Kean University.\n"; }
    else      
              { echo "<br>You are NOT from Kean University.\n"; }

	$username = mysqli_real_escape_string($conn,$_POST["username"]);

	$password= mysqli_real_escape_string($conn,$_POST["password"]);	

if (!isset($_POST['username'],$_POST['password']) ) {
    exit('Please fill both username and password fields!');

}

 $con = mysqli_connect('imc.kean.edu','desousja','1093244', 'TECH3740_2022S') or
    die("<br>Cannot connect to the database.\n");

$sql = "SELECT * FROM TECH3740.EMPLOYEE where login ='$username' and password = '$password'";
$result = mysqli_query($con, $sql);

if($result) {
    if (mysqli_num_rows($result)>0 ) {
        setcookie("username", $username, time() - 3600 , "/");

        while($row = mysqli_fetch_array($result)){
            $name = $row["name"];
            $Address = $row["Address"];
            $Gender = $row["gender"];
            //if ($name <>"")      
            
            echo "<br> Welcome user:". $name . "</br>";
            echo "<br> Address:". $Address . "</br>";
            echo "<br> Gender:". $Gender . "</br>";
        }
        echo "</TABLE>\n";
    } else {
        echo "<br> Username: ". $username . " is incorrect</br>";
        echo "<br> Password: ". $password . " is incorrect</br>";
        exit(1);
    }
} else {
    echo "<br>Something wrong with the SQL. \n" . mysqli_error($con);
}

$sql = "SELECT dob,join_date FROM TECH3740.Admin where login='$username'";
$result = mysqli_query($con, $sql);

if($result) {
    if (mysqli_num_rows($result)>0 ) {
        setcookie("username", $username, time() - 3600 , "/");

        while($row = mysqli_fetch_array($result)){
            $name = $row["dob"];
            $Address = $row["join_date"];     
            
            echo "<br> date of birth:". $name . "</br>";
            echo "<br> Join Date:". $Address . "</br>";
        }
        echo "</TABLE>\n";
    } else {
        echo "<br> Username: ". $username . " dont exist</br>";
        exit(1);
    }
} else {
    echo "<br>Something wrong with the SQL. \n" . mysqli_error($con);
}

if ($result)
   mysqli_free_result($result);
mysqli_close($con);

 ?>