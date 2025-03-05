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


    // รับค่าจาก form
    $sql = "INSERT INTO tbl_member
    (username, password, name, phone, email)
    VALUES
    ('$username', '$password', '$name', '$phone', '$email')
    ";

    // ส่งค่าไปให้ database
    $result = mysqli_query($condb, $sql) or die("error : $sql".mysqli_error($sql));

    mysqli_close($condb);
    
    echo $sql;

    echo "<hr>";

    if($result){
        echo "เพิ่มได้ง้าบเบ้บ";
    }else{
        echo "เพิ่มไม่ได้";
    }
 
?>
