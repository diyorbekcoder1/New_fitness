

<?php
session_start();
include "./connect.php";
$connect = new DB();
if ($connect) {
    $db = $connect->getConnect();
    if (isset($_POST)) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone= $_POST['phone'];
        $address= $_POST['address'];
        $icon1 = $_POST['icon1'] == '' ? null : $_POST['icon1'];
        $icon2 = $_POST['icon2'] == '' ? null : $_POST['icon2'];
        $icon3 = $_POST['icon3'] == '' ? null : $_POST['icon3'];
        $icon4 = $_POST['icon4'] == '' ? null : $_POST['icon4'];
        $link1 = $_POST['link1'] == '' ? null : $_POST['link1'];
        $link2 = $_POST['link2'] == '' ? null : $_POST['link2'];
        $link3 = $_POST['link3'] == '' ? null : $_POST['link3'];
        $link4 = $_POST['link4'] == '' ? null : $_POST['link4'];
//        $fax= $_POST['faxs'];
        $agree= isset($_POST['agreement']) != null ? $_POST['agreement'] : null;
        if ($agree == "on") {

            if (validateContact($name, $email, $phone,$address) == "error") {
                echo "Barcha maydonlar bo'sh bo'lishi mumkin emas";
                return 0;
            }

            $category = $db->query("insert into contacts2 (name, email,phone,address,icon1,icon2,icon3,icon4,link1,link2,link3,link4) values (\"$name\",\"$email\",\"$phone\",\"$address\",\"$icon1\",\"$icon2\",\"$icon3\",\"$icon4\",\"$link1\",\"$link2\",\"$link3\",\"$link4\")");
            if ($category) {
                header("Location: ../ContactsaAbout.php");
            } else {
                echo "data not save" . $db->error;
            }

            return 0;
        }else {
            echo "Shartlarga rozilik berish lozim!";
        }
    }
}else {
    echo "No Connection";
}

function validateContact($name, $email,$phone,$address) {
    $name = trim($name);
    $email = trim($email);
    $phone = trim($phone);
    $address = trim($address);
//    $faxs = trim($faxs);

    if ($name == '' || $email == '' || $phone == '' || $address == '' ) {
        return "error";
    }else {
        return "success";
    }
}
?>
