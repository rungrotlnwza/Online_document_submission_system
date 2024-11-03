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

// ข้อมูลตัวอย่างสำหรับเอกสาร (ควรแทนที่ด้วยการดึงข้อมูลจริงจากฐานข้อมูล)
$documents = [
    ['id' => 1, 'name' => 'Document 1', 'description' => 'Description of document 1', 'type' => 'pdf'],
    ['id' => 2, 'name' => 'Document 2', 'description' => 'Description of document 2', 'type' => 'docx'],
    ['id' => 3, 'name' => 'Document 3', 'description' => 'Description of document 3', 'type' => 'png'],
];

?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการเอกสาร - ระบบส่งเอกสารออนไลน์</title>
    <style>
        /* CSS สำหรับ manage-documents.php */
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

    <!-- เนื้อหาสำหรับจัดการเอกสาร -->
    <div class="content">
        <h1>จัดการเอกสาร</h1>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>ชื่อเอกสาร</th>
                <th>รายละเอียด</th>
                <th>ประเภท</th>
                <th>จัดการ</th>
            </tr>
            <?php foreach ($documents as $document): ?>
                <tr>
                    <td><?php echo htmlspecialchars($document['id']); ?></td>
                    <td><?php echo htmlspecialchars($document['name']); ?></td>
                    <td><?php echo htmlspecialchars($document['description']); ?></td>
                    <td><?php echo htmlspecialchars($document['type']); ?></td>
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
