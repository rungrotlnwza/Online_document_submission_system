<?php
session_start();

// ตรวจสอบสถานะการเข้าสู่ระบบ
$isLoggedIn = isset($_SESSION['user_id']); // ตรวจสอบการเข้าสู่ระบบ
$isAdmin = isset($_SESSION['is_admin']) ? $_SESSION['is_admin'] : false; // ตรวจสอบว่าผู้ใช้เป็นแอดมินหรือไม่
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "Guest"; // แสดงชื่อผู้ใช้หากเข้าสู่ระบบแล้ว

// ถ้ายังไม่ล็อกอิน หรือไม่ใช่แอดมิน ให้เด้งไปหน้า login.php
if (!$isLoggedIn || !$isAdmin) {
    header("Location: login.php");
    exit();
}

// ข้อมูลตัวอย่างสำหรับการจัดการผู้ใช้และเอกสาร (ควรแทนที่ด้วยการดึงข้อมูลจริงจากฐานข้อมูล)
$users = [
    ['id' => 1, 'username' => 'user1', 'email' => 'user1@example.com', 'role' => 'User'],
    ['id' => 2, 'username' => 'admin', 'email' => 'admin@example.com', 'role' => 'Admin'],
];

$documents = [
    ['id' => 1, 'name' => 'เอกสาร A', 'uploaded_by' => 'user1', 'status' => 'Active'],
    ['id' => 2, 'name' => 'เอกสาร B', 'uploaded_by' => 'admin', 'status' => 'Active'],
];

?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แดชบอร์ดแอดมิน - ระบบส่งเอกสารออนไลน์</title>
    <style>
        /* CSS สำหรับ admin-dashboard.php */
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

        .content {
            max-width: 800px;
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

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .table th {
            background-color: #4CAF50;
            color: white;
        }

        .button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #45a049;
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

    <!-- เนื้อหาสำหรับแดชบอร์ดแอดมิน -->
    <div class="content">
        <h1>แดชบอร์ดแอดมิน</h1>

        <h2>ผู้ใช้</h2>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>ชื่อผู้ใช้</th>
                <th>อีเมล</th>
                <th>บทบาท</th>
                <th>จัดการ</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['role']); ?></td>
                    <td>
                        <a href="edit-user.php?id=<?php echo $user['id']; ?>" class="button">แก้ไข</a>
                        <a href="delete-user.php?id=<?php echo $user['id']; ?>" class="button">ลบ</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>เอกสาร</h2>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>ชื่อเอกสาร</th>
                <th>อัปโหลดโดย</th>
                <th>สถานะ</th>
                <th>จัดการ</th>
            </tr>
            <?php foreach ($documents as $document): ?>
                <tr>
                    <td><?php echo htmlspecialchars($document['id']); ?></td>
                    <td><?php echo htmlspecialchars($document['name']); ?></td>
                    <td><?php echo htmlspecialchars($document['uploaded_by']); ?></td>
                    <td><?php echo htmlspecialchars($document['status']); ?></td>
                    <td>
                        <a href="edit-document.php?id=<?php echo $document['id']; ?>" class="button">แก้ไข</a>
                        <a href="delete-document.php?id=<?php echo $document['id']; ?>" class="button">ลบ</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>

</html>
