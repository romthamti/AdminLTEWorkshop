<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['inputDepIDDel']) && isset($_POST['btnDeleteDep'])){

    $pDepartmentID = $_POST['inputDepIDDel'];
    $pageSts = "departmentViewAll.php";

    require('config.php');
    require('connectMySQLi.php');

    // คำสั่งลบข้อมูล
    $sqlDelete = "DELETE FROM `departmemt` WHERE departmemt_id = '$pDepartmentID'";

    $resultDelete = $connDB->query($sqlDelete);

    $msgStatus = 0;

    if ($resultDelete == true) {
        $msgStatus = 3;
    } else {
        $msgStatus = 4;
    }

    $connDB->close();
    header("location:departmentViewAll.php?msg=$msgStatus");
    exit();

}else{
    echo "ส่งค่ามาไม่ถูกต้อง";
}

?>