




<?php
session_start();
include "./connect.php";
$connect = new DB();
if ($connect) {
    $db = $connect -> getConnect();
    if (isset($_POST)) {
        $name = $_POST['name'] == '' ? null : $_POST['name'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $time = $_POST['time'];
        $email = $_POST['email'];

        if ($name && $description  && $title  && $time && $email ) {
            $news = $db->query("INSERT INTO news (name,description,title,time,email) values
             (  \"$name\", \"$description\", '$title',\"$time\" ,\" $email\")");
            if ($news) {
                header("Location: ../NewTable.php");
            } else {
                echo "data not save" . $db->error;
            }
        } else {
            echo "no date";
        }
    }
}
?>




















<?php
//session_start();
//include "./connect.php";
//$connect = new DB;
//if ($connect) {
//    $db = $connect->getConnect();
//    if (isset($_POST)) {
//        $name = $_POST['name'];
//        $title = $_POST['title'];
//        $description = $_POST['description'];
//        $time = $_POST['time'];
//        $email = $_POST['email'];
//        $new_category_id = $_POST['new_category_id'];
//        $about = $db->query("insert into news (name,description,title,time,email,new_category_id) values ('$name','$description','$title','$time','$email','$new_category_id')");
//        if ($about) {
//            header("Location: ../new_table.php");
//        } else {
//            echo "data not save" . $db->error;
//        }
//    }
//}else {
//    echo "No Connection";
//}
//?>
