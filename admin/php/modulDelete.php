
<?php
session_start();
include "./connect.php";
$connect = new DB;
if ($connect) {
    $db = $connect->getConnect();
    $delete = $_POST['delete'];
    $id = $_POST['id'];
    if (isset($delete)) {
        $cat = $db->query(" DELETE FROM logotips WHERE id = $id");
        if ($cat) {
            header("Location: ../modul_table.php");
        } else {
            echo "data not save" . $db->error;
        }
    } else {
        echo "no date";
    }
}


