<?php
session_start();

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบอยู่แล้ว ถ้าใช่ให้ส่งไปยังหน้า dashboard.php
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

// กำหนดค่าตัวแปรสำหรับข้อความแสดงผล
$message = '';

// ตรวจสอบการส่งฟอร์มการลงทะเบียน
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับข้อมูลจากฟอร์ม
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    // TODO: ตรวจสอบข้อมูลในฐานข้อมูล (เช่น ชื่อผู้ใช้ซ้ำ) และบันทึกผู้ใช้ใหม่
    // ตัวอย่างการเชื่อมต่อฐานข้อมูล
    // $conn = new mysqli('localhost', 'username', 'password', 'database');

    // ตรวจสอบการเชื่อมต่อ
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    // ตัวอย่างการตรวจสอบชื่อผู้ใช้ซ้ำ (ควรทำในฐานข้อมูลจริง)
    // $sql = "SELECT * FROM users WHERE username = '$username'";
    // $result = $conn->query($sql);
    // if ($result->num_rows > 0) {
    //     $message = "ชื่อผู้ใช้ซ้ำ กรุณาใช้ชื่ออื่น";
    // } else {
    //     // แฮชรหัสผ่านก่อนบันทึก
    //     $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //     // บันทึกผู้ใช้ใหม่
    //     $sql = "INSERT INTO users (username, password, name) VALUES ('$username', '$hashed_password', '$name')";
    //     if ($conn->query($sql) === TRUE) {
    //         $message = "ลงทะเบียนสำเร็จ! คุณสามารถเข้าสู่ระบบได้เลย";
    //     } else {
    //         $message = "เกิดข้อผิดพลาดในการลงทะเบียน: " . $conn->error;
    //     }
    // }

    // ปิดการเชื่อมต่อฐานข้อมูล
    // $conn->close();

    // สำหรับการทดสอบเราจะสมมุติว่าลงทะเบียนสำเร็จ
    $message = "ลงทะเบียนสำเร็จ! คุณสามารถเข้าสู่ระบบได้เลย";
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียน - ระบบส่งเอกสารออนไลน์</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .content {
            max-width: 400px;
            margin: 100px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            text-align: center;
        }

        .success-message {
            color: green;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="content">
        <h1>ลงทะเบียน</h1>
        <?php if ($message): ?>
            <div class="success-message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="username">ชื่อผู้ใช้</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">รหัสผ่าน</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="name">ชื่อ-นามสกุล</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <button type="submit">ลงทะเบียน</button>
            </div>
        </form>
    </div>

</body>

</html>
