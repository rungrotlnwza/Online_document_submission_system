<?php
session_start();

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบอยู่แล้ว ถ้าใช่ให้ส่งไปยังหน้า dashboard.php
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

// กำหนดค่าตัวแปรสำหรับข้อความแสดงผล
$message = '';

// ตรวจสอบการส่งฟอร์มเข้าสู่ระบบ
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับข้อมูลจากฟอร์ม
    $username = $_POST['username'];
    $password = $_POST['password'];

    // TODO: ตรวจสอบข้อมูลผู้ใช้ในฐานข้อมูล
    // นี่คือตัวอย่างการตั้งค่า (ควรเชื่อมต่อกับฐานข้อมูลจริง)
    $stored_username = 'admin'; // ตัวอย่างชื่อผู้ใช้
    $stored_password = 'password'; // ตัวอย่างรหัสผ่าน

    if ($username === $stored_username && $password === $stored_password) {
        // หากข้อมูลถูกต้องให้ตั้งค่า session
        $_SESSION['user_id'] = 1; // ตัวอย่าง ID ผู้ใช้
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = true; // กำหนดให้เป็นแอดมิน
        header("Location: dashboard.php");
        exit();
    } else {
        $message = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง';
    }
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - ระบบส่งเอกสารออนไลน์</title>
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
    </style>
</head>

<body>

    <div class="content">
        <h1>เข้าสู่ระบบ</h1>
        <?php if ($message): ?>
            <div class="error-message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">ชื่อผู้ใช้</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">รหัสผ่าน</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <button type="submit">เข้าสู่ระบบ</button>
            </div>
        </form>
    </div>

</body>

</html>