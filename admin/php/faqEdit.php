<?php
session_start();
include "./connect.php";
$connect = new DB();
if ($connect) {
    $db = $connect -> getConnect();
    if (isset($_POST)) {
        $id = $_POST['id'];
        $name = $_POST['name'] == '' ? null : $_POST['name'];
        $title = $_POST['title'] ;
        $description = $_POST['description'] ;
        $image = $_FILES['image'];
        if (isset($_FILES['image'])) {
            $folder_read = '/assets/images/';
            $folder = '../../assets/images/';
            $path = $folder . $_FILES['image']['name'];
            if (file_exists($path)) {
                unlink($path);
            };
            if ($_FILES['image']['size'] > 50000000) {
                echo "faylni hajmi 5mb dan ortib ketdi";
            } else {
                $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                if ($ext === 'jpg' || $ext === 'jpeg' || $ext === 'png' || $ext === 'gif' || $ext === 'bmp') {
                    if (!move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
                        echo "error IMAGE";
                    } else {
                        $path2 = $folder_read . $_FILES['image']['name'];
                    }
                }
            }
        }
    } else {
        echo "Image null!!";
    }
    if (isset( $path2)){

        $news = $db->query("UPDATE faqs SET title='$title',image ='$path2',name='$name',description='$description' where id ='$id'  ");

        if ($news) {
            header("Location: ../faq_table.php");
        } else {
            echo "data not save" . $db->error;
        }
    } else {
        echo "no date";
    }





}
?>


