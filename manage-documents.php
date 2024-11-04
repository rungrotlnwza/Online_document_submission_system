
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
        
            <span>สวัสดี, message</span>
            <a href="logout.php">ออกจากระบบ</a>
            
            <a href="login.php">เข้าสู่ระบบ</a>
            <a href="register.php">ลงทะเบียน</a>
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
            
                <tr>
                    <td>id</td>
                    <td>name</td>
                    <td>discription</td>
                    <td>type</td>
                    <td>
                        <a href="edit-document.php" class="button">แก้ไข</a>
                        <a href="delete-document.php" class="button">ลบ</a>
                    </td>
                </tr>
            
        </table>
    </div>

</body>

</html>
