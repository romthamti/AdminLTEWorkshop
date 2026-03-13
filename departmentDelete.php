<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//ตรวจสอบข้อมูลมาไหม?
if(isset($_POST['inputDepIDDel']) && isset($_POST['btnDeleteDep'])){

    // 2 รับข้อมูล
    $pDepartmentID = $_POST['inputDepIDDel'];
    $pageSts = "departmentViewAll.php";
    // 3 เชื่อฐานข้อมูล
    require('config.php');
    require('connectMySQL.php');
    // 4  สร้างคำสั่ง SQL โดยใช่ "SELECT"
    //เพื่อตรวจสอบหรือล็อคข้อมูลไว้
    $sqlDelete = "SELECT * FROM personal ";
    $sqlDelete = "WHERE departmemt = '$pDepartmentID' ";
    // echo $sqlLogin ;

    $resultDelete = $connDB->query($sqlDelete);

    // 7 ตรวยสอบผลของการบันทึกข้อมูลว่าได้รึป่าว
    $msgStatus =0;

            if ($resultInsert == true) {
                $msgStatus =3;
            } else {
                $msgStatus =4;
            } 

    $connDB->close();
    header("location:departmentViewAll.php?msg=$msgStatus");
    exit();

}else{
    echo "ส่งค่ามาไม่ถูกต้อง";
}


?>