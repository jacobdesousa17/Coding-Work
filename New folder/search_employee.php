// search_employee.php
<?php




$host = 'imc.kean.edu';

$username = 'desousja';

$password = '1093244';

$dbname = 'dreamhome';

$q = $_GET['keyword'];

$con = mysqli_connect($host, $username, $password, $dbname) or

die('Connection to database has failed. \n');


$sql ="SELECT * FROM TECH3740.EMPLOYEE WHERE (`Address` LIKE '%".$q."%')";
$result = mysqli_query($con, $sql);
    if($result)  {
        if (mysqli_num_rows($result)>0){
                echo"<TABLE BORDER=\n>";
                echo"<TR><TD>EMPLOYEE_ID<TD>LOGIN<TD>PASSWORD<TD>NAME<TD>ROLE<TD>SALARY<TD>GENDER<TD>ADDRESS";


                while($row = mysqli_fetch_assoc($result)){
                        $empid = $row["employee_id"];
                        $login = $row["login"];
                        $password = $row["password"];
                        $name = $row["name"];
                        $role = $row["role"];
                        $salary = $row["salary"];
                        $gender = $row["gender"];
                        $Address = $row["Address"];
			$nu = 'NULL';

			
							
                        if($gender=='F' AND $salary!='')
                                echo "<TR><TD>$empid<TD>$login<TD>$password<TD>$name<TD>$role<TD>$salary<TD><font color=red>$gender<font><TD>$Address";


			if($gender=='M' AND $salary!='')
		                 echo "<TR><TD>$empid<TD>$login<TD>$password<TD>$name<TD>$role<TD>$salary<TD><font color=blue>$gender<font><TD>$Address";
								

			if($gender=='F' AND $salary=='')
	                                echo "<TR><TD>$empid<TD>$login<TD>$password<TD>$name<TD>$role<TD><font color=red>$nu<font><TD><font color=red>$gender<font><TD>$Address";


                        if($gender=='M' AND $salary=='')
                                 echo "<TR><TD>$empid<TD>$login<TD>$password<TD>$name<TD>$role<TD><font color=red>$nu<font><TD><font color=blue>$gender<font><TD>$Address";			
		
		}
                echo"</TABLE\n>";
        }
		
				
else {
        echo"<br> No record found\n";
        }
		
$sql2 = ("SELECT count(*) FROM TECH3740.EMPLOYEE WHERE (`Address` LIKE '%".$q."%')");
$rs = mysqli_query($con,$sql2);
 //-----------^  need to run query here

 $result = mysqli_fetch_array($rs);
 //here you can echo the result of query
 echo"<br>There are " .$result[0]." employee(<font color=red>s</font>) in the database that the address contains search keyword: <b>$q</b><BR>";
		
$ip = $_SERVER['REMOTE_ADDR'];

if (strpos($ip, '10') !== false || strpos($ip, '131') !== false) {
	echo 'You are from Kean domain.';
}
else
	echo 'You are NOT from Kean University';


echo"\r\n YOUR IP IS ".$_SERVER['REMOTE_ADDR'];

    }

mysqli_close($con);

?>
   