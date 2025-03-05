<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member List</title>
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #ffffff;
            margin-top: 80px; /* เพิ่ม margin-top เพื่อไม่ให้เมนูบัง */
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
            width: 80%;
            margin: 80px auto 20px; /* ปรับ margin-top เพื่อไม่ให้เมนูบัง */
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #333;
        }
        table th {
            background-color: red;
            color: #ffffff;
        }
        table tr:nth-child(even) {
            background-color: #2b2b2b;
        }
        table tr:nth-child(odd) {
            background-color: #1d1d1d;
        }
        a {
            color: #4caf50;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #333;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #4caf50;
            color: #fff;
        }
        td a {
            color: #ff6347;
        }
        td a:hover {
            color: #fff;
            background-color: #ff6347;
        }
    </style>
</head>
<body>
    <!-- เมนูส่วนบน -->
    <div class="menu">
        <header>
            <ul>
                <li><a href="form_add.php">Form Add</a></li>
                <li><a href="member_list.php" class="active">Member List</a></li>
            </ul>
        </header>
    </div>

    <!-- ส่วนแสดงข้อมูลสมาชิก -->
    <div class="container">
        <h1>Member List</h1>
        <?php
        include 'condb.php';
        $query = "SELECT * FROM tbl_member";
        $result = mysqli_query($condb, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['username'] . '</td>
                        <td>' . $row['password'] . '</td>
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['phone'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td><a href="form_edit.php?id=' . $row['id'] . '">Edit</a></td>
                        <td><a href="form_del.php?id=' . $row['id'] . '">Delete</a></td>
                      </tr>';
            }
            echo '</tbody></table>';
        } else {
            echo "<p>ไม่มีข้อมูลในตาราง</p>";
        }

        mysqli_close($condb);
        ?>
    </div>
</body>
</html>