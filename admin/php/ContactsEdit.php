<?php
session_start();
include "./connect.php";
$connect = new DB();
if ($connect) {
    $db = $connect->getConnect();
    if (isset($_POST)) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $phone= $_POST['phone'];
        $email = $_POST['email'];
        $address= $_POST['address'];
        $icon1 = $_POST['icon1'] == '' ? null : $_POST['icon1'];
        $icon2 = $_POST['icon2'] == '' ? null : $_POST['icon2'];
        $icon3 = $_POST['icon3'] == '' ? null : $_POST['icon3'];
        $icon4 = $_POST['icon4'] == '' ? null : $_POST['icon4'];
        $link1 = $_POST['link1'] == '' ? null : $_POST['link1'];
        $link2 = $_POST['link2'] == '' ? null : $_POST['link2'];
        $link3 = $_POST['link3'] == '' ? null : $_POST['link3'];
        $link4 = $_POST['link4'] == '' ? null : $_POST['link4'];
        if ($name) {
            $news = $db->query("UPDATE contacts2 SET name='$name',phone ='$phone', email='$email',address='$address',icon1='$icon1',icon2='$icon2',icon3='$icon3',icon4='$icon4',link1='$link1',link2='$link2',link3='$link3',link4='$link4'  where id ='$id' ");
            if ($news) {
                header("Location: /admin/ContactsaAbout.php");
            } else {
                echo "data not save" . $db->error;
            }
        } else {
            echo "no date";
        }
    }
}

?>


