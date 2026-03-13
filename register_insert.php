<?php
//1-2 อยู่ที่ regouter.php

// 3 ครวจสอบข้อมูลอีกครั้งว่ามีการส่งข้อมูลที่บันทึกมาจริงหรือไม่
if(isset($_POST['inputemail']) && isset($_POST['inputpass'])){
    // 3.1 รับค่าหากนำตัวแปรมาใช่
    $pFullName = trim($_POST['inputFullname']);
    $nameParts = explode(" ",$pFullName);
    $fristName = $nameParts[0];
    $lastName = isset($nameParts[1])? $nameParts[1]:"";

    // 3 รับข้อมูล
    $pFullName = $_POST['inputFullname'];
    $pEmail = $_POST['inputemail'];
    $pPass = $_POST['inputpass'];
    $pConfrimPass = $_POST['inputconfirmpass'];
    $pageSts = "register.php";

        // 4 เชื่อฐานข้อมูล
    require('config.php');
    require('connectMySQLi.php');

    if ($pPass !== $pConfrimPass ) {
        $msgStatus =4;

        $connDB->close();
        header("location:register.php?msg=$msgStatus");
    }
    // ตรวจสอบระบบว่ามี Email รึยัง
    // 5 SQL เพิ่มตัวแปร 
    $sqlCheckEmail = "SELECT personal_email FROM personal WHERE personal_email ='$pEmail'";
    $resultCheckEmail = $connDB->query($sqlCheckEmail);

    if ($resultCheckEmail ->num_rows > 0) {
        $msgStatus =3; //แจ้งว่ามี Email อยู่แล้ว
    }else{

        $sqlInsertPer = "INSERT INTO personal (personal_name, personal_lastname, personal_email, personal_password) 
        VALUES ('$fristName', '$lastName', '$pEmail', '$pPass')";
        // echo $sqlInsertPer ;

        // 6 เขียนคำสั่ง ให้คำสั่ง SQL 
        $resultInsert = $connDB->query($sqlInsertPer);

        // 7 ตรวยสอบผลของการบันทึกข้อมูลว่าได้รึป่าว
        $msgStatus =0;

            if ($resultInsert == true) {
                $msgStatus =1;
            } else {
                $msgStatus =2;
                $msgStatus =3;
                $msgStatus =4;
            } 
    }

    header("location:register.php?msg=$msgStatus");
    exit();

}else{
    echo "ผิดดดดด";
}


    

?>