<?php
// เชื่อมต่อDatabase
include 'condb.php';

// echo '<pre>';
// print_r($_GET);
// echo '</pre>';

// echo '<hr>';

// exit;

// ประกาศตัวแปรรับค่าจาก form

$id = $_GET['id'];

// อัปเดตจาก form
$sql = "DELETE FROM tbl_member WHERE id = $id";

// ส่งค่าไปให้ database
$result = mysqli_query($condb, $sql) or die("error : " . mysqli_error($condb));

mysqli_close($condb);

echo $sql;
echo "<hr>";

if($result){
    echo "<script type='text/javascript'>";
        echo "alert('ลบข้อมูลสำเร็จ');";
        echo "window.location = 'member_list.php'; ";
    echo "</script>";
}else{
    echo "<script type='text/javascript'>";
        echo "alert('error!');";
        echo "window.location = 'member_list.php'; ";
    echo "</script>";
}
?>
