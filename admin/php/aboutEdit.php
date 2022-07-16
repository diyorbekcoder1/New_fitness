
<?php
session_start();
include "./connect.php";
$connect = new DB();
if ($connect) {
    $db = $connect -> getConnect();
    if (isset($_POST)) {
        $id = $_POST['id'];
        $title = $_POST['title'] == '' ? null : $_POST['title'];
        $phone = $_POST['phone'] == '' ? null : $_POST['phone'];
        $email = $_POST['email'] == '' ? null : $_POST['email'];
        $icon1 = $_POST['icon1'] == '' ? null : $_POST['icon1'];
        $icon2 = $_POST['icon2'] == '' ? null : $_POST['icon2'];
        $icon3 = $_POST['icon3'] == '' ? null : $_POST['icon3'];
        $icon4 = $_POST['icon4'] == '' ? null : $_POST['icon4'];
        $link1 = $_POST['link1'] == '' ? null : $_POST['link1'];
        $link2 = $_POST['link2'] == '' ? null : $_POST['link2'];
        $link3 = $_POST['link3'] == '' ? null : $_POST['link3'];
        $link4 = $_POST['link4'] == '' ? null : $_POST['link4'];
        $bodytext = $_POST['bodytext'] == '' ? null : $_POST['bodytext'];
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

        $news = $db->query("UPDATE about_com SET title='$title',image ='$path2',bodytext='$bodytext',phone='$phone',email='$email',icon1='$icon1',icon2='$icon2',icon3='$icon3',icon4='$icon4',link1='$link1',link2='$link2',link3='$link3',link4='$link4' where id ='$id'  ");

        if ($news) {
            header("Location: ../about_table.php");
        } else {
            echo "data not save" . $db->error;
        }
    } else {
        echo "no date";
    }





}
?>
