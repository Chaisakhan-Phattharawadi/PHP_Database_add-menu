<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit</title>
    <style>
        /* General styles for dark theme */
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #ffffff;
            margin-top: 30px;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            padding: 30px;
            background-color: #1d1d1d;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"] {
            padding: 10px;
            background-color: #333;
            border: 1px solid #444;
            color: #e0e0e0;
            border-radius: 5px;
            font-size: 14px;
        }

        input[type="text"]:focus {
            outline: none;
        }

        button {
            padding: 10px 20px;
            background-color:rgb(207, 2, 2);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color:rgb(94, 0, 0);
        }

        input::placeholder {
            color: #bbb;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <?php
        include 'condb.php';
        $id = $_GET['id'];
        $query = "SELECT * FROM tbl_member WHERE id = '$id'";
        $result = mysqli_query($condb, $query) or die("error : $query" . mysqli_error($condb));
        $row = mysqli_fetch_array($result);
    ?>

    <div class="container">
        <h1>Edit Member</h1>
        <form action="form_edit_db.php" method="post">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" name="id" value="<?php echo $row['id']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" value="<?php echo $row['username']; ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" value="<?php echo $row['password']; ?>" required>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="<?php echo $row['email']; ?>" required>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>

</body>
</html>
