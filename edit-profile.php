<?php
session_start();

// ตรวจสอบสถานะการเข้าสู่ระบบ
$isLoggedIn = isset($_SESSION['user_id']); // ตรวจสอบการเข้าสู่ระบบ
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "Guest"; // แสดงชื่อผู้ใช้หากเข้าสู่ระบบแล้ว

// ถ้ายังไม่ล็อกอิน ให้เด้งไปหน้า login.php
if (!$isLoggedIn) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลส่วนตัว - ระบบส่งเอกสารออนไลน์</title>
    <style>
        /* CSS สำหรับ edit-profile.php */
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

        .message {
            color: green;
            text-align: center;
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

            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
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

    <!-- เนื้อหาสำหรับแก้ไขข้อมูลส่วนตัว -->
    <div class="content">
        <h1>แก้ไขข้อมูลส่วนตัว</h1>

        <?php if (isset($message)): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <form action="edit-profile.php" method="post">
            <div class="form-group">
                <label for="username">ชื่อผู้ใช้</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
            </div>

            <div class="form-group">
                <label for="new_password">รหัสผ่านใหม่</label>
                <input type="password" id="new_password" name="new_password" placeholder="กรุณากรอกรหัสผ่านใหม่">
            </div>

            <div class="form-group">
                <button type="submit">บันทึกการเปลี่ยนแปลง</button>
            </div>
        </form>
    </div>

</body>

</html>
