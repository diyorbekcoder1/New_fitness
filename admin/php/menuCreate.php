<?php
session_start();
include "./connect.php";
$connect = new DB;
if ($connect) {
    $db = $connect->getConnect();
    if (isset($_POST)) {
        $name = $_POST['name'];
        $link = $_POST['link'];
        $icon = $_POST['icon'];
        $about = $db->query("insert into menus (name, link,icon) values ('$name','$link','$icon')");
        if ($about) {
            header("Location: ../menu_table.php");
        } else {
            echo "data not save" . $db->error;
        }
    }
}else {
    echo "No Connection";
}
?>
