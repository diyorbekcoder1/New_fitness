
<?php
session_start();
include "./connect.php";
$connect = new DB();
if ($connect) {
    $db = $connect->getConnect();
    if (isset($_POST)) {
        $id = $_POST['id'];
        $name = $_POST['name'] == '' ? null : $_POST['name'];
        $link = $_POST['link'];
        $icon = $_POST['icon'];
        if ($name) {
            $news = $db->query("UPDATE menus SET  name='$name',link='$link', icon='$icon' where id ='$id' ");
            if ($news) {
                header("Location: ../menu_table.php");
            } else {
                echo "data not save" . $db->error;
            }
        } else {
            echo "no date";
        }
    }
}

?>



