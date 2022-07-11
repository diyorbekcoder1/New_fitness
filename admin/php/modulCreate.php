<?php
session_start();
include "./connect.php";
$connect = new DB;
if ($connect) {
    $db = $connect->getConnect();
    if (isset($_POST)) {
        $title2 = $_POST['title2'];
        $bodytext = $_POST['bodytext'];
        $about = $db->query("insert into logotips (title2,bodytext) values ('$title2',\"$bodytext\")");
        if ($about) {
            header("Location: ../modul_table.php");
        } else {
            echo "data not save" . $db->error;
        }
    }
}else {
    echo "No Connection";
}
?>

