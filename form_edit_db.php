<?php
// เชื่อมต่อDatabase
include 'condb.php';

echo '<pre>';
print_r($_POST);
echo '</pre>';

// ประกาศตัวแปรรับค่าจาก form
$name = $_POST['name'];
$password = $_POST['password'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$id = $_POST['id'];

// อัปเดตจาก form
$sql = "UPDATE tbl_member SET 
    username='$username',
    password='$password',
    name='$name',
    phone='$phone',
    email='$email'
    WHERE id=$id";

// ส่งค่าไปให้ database
$result = mysqli_query($condb, $sql) or die("error: " . mysqli_error($condb));

mysqli_close($condb);

echo $sql;
echo "<hr>";

if($result){
    echo "<script type='text/javascript'>";
        echo "alert('อัพเดทข้อมูลสำเร็จ');";
        echo "window.location = 'member_list.php'; ";
    echo "</script>";
}else{
    echo "<script type='text/javascript'>";
        echo "alert('error!');";
        echo "window.location = 'member_list.php'; ";
    echo "</script>";
}
?>
