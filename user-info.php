<?php
session_start();

// ตรวจสอบสถานะการเข้าสู่ระบบ
$isLoggedIn = isset($_SESSION['user_id']); // ตรวจสอบการเข้าสู่ระบบ
$isAdmin = isset($_SESSION['is_admin']) ? $_SESSION['is_admin'] : false; // ตรวจสอบว่าผู้ใช้เป็นแอดมินหรือไม่
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "Guest"; // แสดงชื่อผู้ใช้หากเข้าสู่ระบบแล้ว

// ถ้ายังไม่ล็อกอิน ให้เด้งไปหน้า login.php
if (!$isLoggedIn) {
    header("Location: login.php");
    exit();
}

// ดึงข้อมูลผู้ใช้จากฐานข้อมูล (จำลองในที่นี้)
$userId = $_SESSION['user_id'];
// ในที่นี้ให้จำลองข้อมูล
$currentUser = [
    'username' => $username,
    'email' => 'user@example.com', // เปลี่ยนเป็นข้อมูลจริงจากฐานข้อมูล
    'created_at' => '2024-01-01' // วันที่สมัครสมาชิก
];
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลส่วนตัว - ระบบส่งเอกสารออนไลน์</title>
    <style>
        /* CSS สำหรับ user-info.php */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #4CAF50;
            padding: 10px 20px;
            color: white;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
        }

        .navbar a:hover {
            background-color: #45a049;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            min-width: 160px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .content {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .user-info {
            margin-bottom: 15px;
        }

        .user-info label {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div>
            <a href="index.php">หน้าแรก</a>
            <a href="upload.php">อัปโหลดเอกสาร</a>

            <?php if ($isLoggedIn): ?>
                <div class="dropdown">
                    <a href="dashboard.php">แดชบอร์ด</a>
                    <div class="dropdown-content">
                        <a href="user-info.php">ข้อมูลส่วนตัว</a>
                        <a href="edit-profile.php">แก้ไขข้อมูลส่วนตัว</a>
                        <a href="user-documents.php">เอกสารของฉัน</a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($isAdmin): ?>
                <div class="dropdown">
                    <a href="admin-dashboard.php">แดชบอร์ดแอดมิน</a>
                    <div class="dropdown-content">
                        <a href="manage-users.php">จัดการผู้ใช้</a>
                        <a href="manage-documents.php">จัดการเอกสาร</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($isLoggedIn): ?>
                <span>สวัสดี, <?php echo htmlspecialchars($username); ?></span>
                <a href="logout.php">ออกจากระบบ</a>
            <?php else: ?>
                <a href="login.php">เข้าสู่ระบบ</a>
                <a href="register.php">ลงทะเบียน</a>
            <?php endif; ?>
        </div>
    </nav>

    <!-- เนื้อหาข้อมูลส่วนตัว -->
    <div class="content">
        <h1>ข้อมูลส่วนตัว</h1>

        <div class="user-info">
            <label>ชื่อผู้ใช้:</label>
            <p><?php echo htmlspecialchars($currentUser['username']); ?></p>
        </div>

        <div class="user-info">
            <label>อีเมล:</label>
            <p><?php echo htmlspecialchars($currentUser['email']); ?></p>
        </div>

        <div class="user-info">
            <label>วันที่สมัครสมาชิก:</label>
            <p><?php echo htmlspecialchars($currentUser['created_at']); ?></p>
        </div>

        <div class="form-group">
            <a href="edit-profile.php">แก้ไขข้อมูลส่วนตัว</a>
        </div>
    </div>

</body>

</html>
