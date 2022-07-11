<?php
session_start();
include "./connect.php";
$connect = new DB;
if ($connect) {
    $db = $connect->getConnect();
    if (isset($_POST)) {
        $id =$_POST['id'];
        $email = $_POST['email'];
        $abouts = $db->query("insert into subscribe (email) values ('$email')");


        if ($abouts) {
            header("Location:   /");
        } else {
            echo "data not save" . $db->error;
        }
    }
}else {
    echo "No Connection";
}
