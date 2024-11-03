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

// ตัวอย่างการดึงข้อมูลเอกสารจากฐานข้อมูล (แทนที่ด้วยการเชื่อมต่อฐานข้อมูลจริง)
$documents = [
    [
        'id' => 1,
        'name' => 'เอกสาร A',
        'description' => 'รายละเอียดเอกสาร A',
        'type' => 'PDF',
        'uploaded_by' => $_SESSION['username']
    ],
    [
        'id' => 2,
        'name' => 'เอกสาร B',
        'description' => 'รายละเอียดเอกสาร B',
        'type' => 'DOCX',
        'uploaded_by' => $_SESSION['username']
    ],
    // เพิ่มเอกสารเพิ่มเติมตามต้องการ
];

?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เอกสารของฉัน - ระบบส่งเอกสารออนไลน์</title>
    <style>
        /* CSS สำหรับ user-documents.php */
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

        .document-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .document-card h3 {
            margin: 0;
            color: #4CAF50;
        }

        .document-card p {
            margin: 5px 0;
        }

        .button {
            display: inline-block;
            margin-top: 10px;
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

    <!-- เนื้อหาสำหรับเอกสารของผู้ใช้ -->
    <div class="content">
        <h1>เอกสารของฉัน</h1>

        <?php if (count($documents) > 0): ?>
            <?php foreach ($documents as $document): ?>
                <div class="document-card">
                    <h3><?php echo htmlspecialchars($document['name']); ?></h3>
                    <p>รายละเอียด: <?php echo htmlspecialchars($document['description']); ?></p>
                    <p>ประเภท: <?php echo htmlspecialchars($document['type']); ?></p>
                    <p>อัปโหลดโดย: <?php echo htmlspecialchars($document['uploaded_by']); ?></p>
                    <a href="view-document.php?id=<?php echo $document['id']; ?>" class="button">ดูเอกสาร</a>
                    <a href="delete-document.php?id=<?php echo $document['id']; ?>" class="button">ลบเอกสาร</a>
                    <a href="hide-document.php?id=<?php echo $document['id']; ?>" class="button">ซ่อนเอกสาร</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>ยังไม่มีเอกสารที่อัปโหลด</p>
        <?php endif; ?>
    </div>

</body>

</html>
