<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['inputEmail']) && isset($_POST['inputPass'])){

    $pEmail = $_POST['inputEmail'];
    $pPass = $_POST['inputPass'];
    $pageSts = "index.php";

    require('config.php');
    require('connectMySQLi.php');

    $pEmail = mysqli_real_escape_string($connDB,$pEmail);

    $sqlLogin = "SELECT * FROM personal 
                 WHERE personal_email='$pEmail' 
                 AND personal_sys_status=1";

    $resultLogin = $connDB->query($sqlLogin);

    if(!$resultLogin){
        die("SQL Error : ".$connDB->error);
    }

    if ($resultLogin->num_rows > 0) {

        $rowsItem = $resultLogin->fetch_assoc();

        $dbPerID = $rowsItem["personal_id"];
        $dbPerName = $rowsItem["personal_name"];
        $dbPerLastname = $rowsItem["personal_lastname"];
        $dbPerPhoto = $rowsItem["personal_photo"];
        $dbPerPass = $rowsItem["personal_password"];
        $dbPerPositionID = $rowsItem["position_id"];

        if ($dbPerPass == $pPass) {

            $_SESSION['pID']= $dbPerID;
            $_SESSION['imagesPer']= $dbPerPhoto;
            $_SESSION['perName']= $dbPerName;
            $_SESSION['perLastname']= $dbPerLastname;
            $_SESSION['positionID']= $dbPerPositionID;

            switch ($dbPerPositionID) {
                case '1':
                    $pageSts = "dashbordMain.php";
                    break;
                case '5':
                    $pageSts = "dashbordsele.php";
                    break;
                case '3':
                    $pageSts = "dashbordproduct.php";
                    break;
                default:
                    $pageSts = "index.php";
                    break;
            }

        }else{
            $pageSts = "index.php?msg=2";
        }

    }else{
        $pageSts = "index.php?msg=1";
    }

    $connDB->close();

    header("location:$pageSts");
    exit();

}else{
    echo "ส่งค่ามาไม่ถูกต้อง";
}
?>