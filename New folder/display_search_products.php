// display_search_products.php
<?php
include 'dbconfig.php';
$q = mysqli_real_escape_string($con,$_GET['keyword']);
$ck = $_COOKIE['user_id']; 



if ($q!='*'){
                $sql =$sql = "Select a.p_id,a.v_id,a.e_id,a.name,a.description,a.type,a.sell_price,a.cost,a.quantity,v.name as Vendor_Name, e.name as ADDED_BY_EMPLOYEE from TECH3740_2022S.Products_desousja as a  join TECH3740.EMPLOYEE as e on a.e_id=e.employee_id join TECH3740.VENDOR as v on v.vendor_id=a.v_id where a.name  LIKE '%".$q."%' or a.description LIKE '%".$q."%' ORDER BY a.p_id ";
                $sql2 = ("SELECT count(*) FROM TECH3740.EMPLOYEE WHERE (`Address` LIKE '%".$q."%')");
                $sql3 = "SELECT SUM(sell_price-cost)*quantity as profit FROM TECH3740_2022S.Products_desousja where name  LIKE '%".$q."%' or description LIKE '%".$q."%'";
                        }      
else{ 
                $sql = "Select a.p_id,a.v_id,a.e_id,a.name,a.description,a.type,a.sell_price,a.cost,a.quantity,v.name as Vendor_Name, e.name as ADDED_BY_EMPLOYEE from TECH3740_2022S.Products_desousja as a join TECH3740.EMPLOYEE as e on a.e_id=e.employee_id join TECH3740.VENDOR as v on v.vendor_id=a.v_id ORDER BY a.p_id";
                 $sql2 = "SELECT count(*) FROM TECH3740_2022S.Products_desousja;";
                 $sql3 = "SELECT SUM(sell_price-cost)*quantity as profit FROM TECH3740_2022S.Products_desousja";
                        }



$result = mysqli_query($con, $sql);  



if(!empty($result)) {
    
    if(mysqli_num_rows($result)<1){
        $rs = mysqli_query($con,$sql2);
        $result3 = mysqli_fetch_array($rs);
        echo"No records in the database for the keyword: <b>$q</b>";
    }
    if (mysqli_num_rows($result)>0){
        $rs = mysqli_query($con,$sql2);
        $result3 = mysqli_fetch_array($rs);
        echo"The following products were match search keyword <b>$q</b>.<BR>";
        echo"<TABLE BORDER=\n>";
        echo"<TR><TD><b>ID</b><TD><b>Name</b><TD><b>Description</b><TD><b>Type</b><TD><b>Cost</b><TD><b>Sell Price</b><TD><b>Quantity</b><TD><b>Vendor Name</b><TD><b>Added by employee</b>";
        while($row = mysqli_fetch_assoc($result)){
            $idn = $row["p_id"];
            $n = $row["name"];
            $d = $row["description"];
            $t = $row["type"];
            $c = $row["cost"];
            $sellp = $row["sell_price"];
            $qu = $row["quantity"];
            $ed = $row["e_id"];
            $vi = $row["v_id"];
            $vn = $row["Vendor_Name"];
            $abe = $row["ADDED_BY_EMPLOYEE"];                       
            if($qu<5){
                echo"<TR><TD>$idn<TD>$n<TD>$d<TD>$t<TD>$c<TD>$sellp<TD><font color='red'>$qu</font><TD>$vn<TD>$abe";
             }
            else{
                echo"<TR><TD>$idn<TD>$n<TD>$d<TD>$t<TD>$c<TD>$sellp<TD>$qu<TD>$vn<TD>$abe";
             }
             }                
            echo"</TABLE\n>";$rt = mysqli_query($con,$sql3);
            while($row = mysqli_fetch_array($rt)){
                echo "<TR>Total profit: USD ".number_format($row['profit'],2,'.',',');        
            }
                }
            }
                    


mysqli_close($con);

?>