
<?php
session_start();
include "./connect.php";
$connect = new DB();
if ($connect) {
    $db = $connect->getConnect();
    if (isset($_POST)) {
        $id = $_POST['id'];
        $name = $_POST['name'] == '' ? null : $_POST['name'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $time = $_POST['time'];
        $email = $_POST['email'];

        if ($name) {
            $news = $db->query("UPDATE news SET name='$name',description ='$description', email='$email',time='$time', title='$title' where id ='$id' ");
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


