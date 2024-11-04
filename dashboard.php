<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ระบบส่งเอกสารออนไลน์</title>
    <style>
    /* CSS สำหรับ dashboard.php */

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

    .user-info,
    .user-options {
        margin-bottom: 20px;
    }

    .user-info p {
        font-size: 18px;
        color: #333;
    }

    .user-options a {
        display: inline-block;
        margin: 5px 0;
        padding: 10px 15px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        text-align: center;
    }

    .user-options a:hover {
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


            <div class="dropdown">
                <a href="dashboard.php">แดชบอร์ด</a>
                <div class="dropdown-content">
                    <a href="user-info.php">ข้อมูลส่วนตัว</a>
                    <a href="edit-profile.php">แก้ไขข้อมูลส่วนตัว</a>
                    <a href="user-documents.php">เอกสารของฉัน</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="admin-dashboard.php">แดชบอร์ดแอดมิน</a>
                <div class="dropdown-content">
                    <a href="manage-users.php">จัดการผู้ใช้</a>
                    <a href="manage-documents.php">จัดการเอกสาร</a>
                </div>
            </div>

        </div>
        <div>

            <span>สวัสดี, username</span>
            <a href="logout.php">ออกจากระบบ</a>
            <a href="login.php">เข้าสู่ระบบ</a>
            <a href="register.php">ลงทะเบียน</a>
        </div>
    </nav>

    <!-- เนื้อหาของ Dashboard -->
    <div class="content">
        <h1>แดชบอร์ดของผู้ใช้</h1>
        <div class="user-info">
            <h2>ข้อมูลผู้ใช้</h2>
            <p>ชื่อผู้ใช้:
                username
            </p>
        </div>

        <div class="user-options">
            <h2>จัดการข้อมูลส่วนตัว</h2>
            <a href="edit-profile.php">แก้ไขข้อมูลส่วนตัว</a>
            <a href="user-documents.php">เอกสารของฉัน</a>
        </div>

        <div class="user-options">
            <h2>เอกสารที่ถูกส่งจากแอดมิน</h2>
            <!-- ลิงก์หรือข้อมูลเพิ่มเติมที่เกี่ยวข้องกับเอกสารจากแอดมิน -->
            <a href="admin-documents.php">ดูเอกสารจากแอดมิน</a>
        </div>
    </div>

</body>

</html>