// display_staff.php
<?php

$host = 'imc.kean.edu';

$username = 'desousja';

$password = '1093244';

$dbname = 'dreamhome';

$con = mysqli_connect($host, $username, $password, $dbname) or

die('Connection to database has failed. \n');


$sql = " SELECT * FROM dreamhome.Staff ";
$result = mysqli_query($con, $sql);

    if($result)  {
        if (mysqli_num_rows($result)>0){
                echo"<TABLE BORDER=\n>";
                echo"<TR><TD>staffNo<TD>fName<TD>lName<TD>position<TD>sex<TD>DOB<TD>salary<TD>branchNo";
                

                while($row = mysqli_fetch_assoc($result)){
                        $staffNo = $row["staffNo"];
                        $fn = $row["fName"];
                        $ln = $row["lName"];
                        $position = $row["position"];
                        $sex = $row["sex"];
                        $DOB = $row["DOB"];
                        $salary = $row["salary"];
                        $branchNo = $row["branchNo"];

                        if($sex=='F')
                                echo "<TR><TD>$staffNo<TD>$fn<TD>$ln<TD>$position<TD><font  color=red>$sex<font><TD>$DOB<TD>$salary<TD>$branchNo\n";
                
                        else

                                echo "<TR><TD>$staffNo<TD>$fn<TD>$ln<TD>$position<TD><font  color=blue>$sex<font><TD>$DOB<TD>$salary<TD>$branchNo\n";


        }
                echo"</TABLE\n>";
        }
else {
        echo"<br> No record found\n";
        }
}

mysqli_close($con);

?>