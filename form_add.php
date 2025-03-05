<?php
// ตรวจสอบว่ามีการส่งข้อมูลแบบ POST มาไหม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // เชื่อมต่อ Database
    include 'condb.php';

    // ประกาศตัวแปรรับค่าจาก form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // รับค่าจาก form
    $sql = "INSERT INTO tbl_member
            (name, username, password, phone, email)
            VALUES
            ('$name', '$username', '$password', '$phone', '$email')";

    // ส่งค่าไปให้ database
    $result = mysqli_query($condb, $sql);

    if ($result) {
        // เปลี่ยนเส้นทางไปยัง member_list.php
        header("Location: member_list.php");
        exit();
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($condb);
    }

    mysqli_close($condb);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Themed Form</title>
    <style>
        body {
            background-color: #0d1117;
            color: #c9d1d9;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(22, 27, 34, 0.9);
            padding: 15px 0;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }
        .menu header ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        .menu header ul li {
            margin: 0 30px;
        }
        .menu header ul li a {
            text-decoration: none;
            font-size: 18px;
            color: #c9d1d9;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 6px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .menu header ul li a.active {
            border-bottom: 3px solid #2575fc;
            color: #2575fc;
        }
        .menu header ul li a:hover {
            background-color: #2575fc;
            color: white;
        }
        .container {
            background-color: #161b22;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
            margin-top: 80px;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
        }
        input {
            width: 90%;
            padding: 12px;
            margin: 8px 0;
            border: none;
            border-radius: 6px;
            background-color: #21262d;
            color: #c9d1d9;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }
        input:focus {
            background-color: #30363d;
        }
        button {
            width: 90%;
            padding: 9px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
        }
        button:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <!-- เมนูส่วนบน -->
    <div class="menu">
        <header>
            <ul>
                <li><a href="form_add.php" class="active">Form Add</a></li>
                <li><a href="member_list.php">Member List</a></li>
            </ul>
        </header>
    </div>

    <!-- ฟอร์มกรอกข้อมูล -->
    <div class="container">
        <h1>Form Krab Babe</h1>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="phone" placeholder="Phone Number (10 digits)" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>