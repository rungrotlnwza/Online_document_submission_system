
    <!DOCTYPE html>
    <html lang="th">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ระบบส่งเอกสารออนไลน์ - หน้าแรก</title>
        <style>
            /* CSS สำหรับ Navbar */
            
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f9;
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
                padding: 20px;
            }
            /* ส่วนของการค้นหา */
            
            .search-bar {
                max-width: 600px;
                margin: 20px auto;
                display: flex;
                align-items: center;
            }
            
            .search-bar input[type="text"] {
                flex: 1;
                padding: 10px;
                font-size: 16px;
            }
            
            .search-bar button {
                padding: 10px;
                font-size: 16px;
                background-color: #4CAF50;
                color: white;
                border: none;
                cursor: pointer;
            }
            
            .search-bar button:hover {
                background-color: #45a049;
            }
            /* Card เอกสาร */
            
            .card-container {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                justify-content: center;
            }
            
            .card {
                width: 300px;
                background-color: white;
                border: 1px solid #ddd;
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                padding: 20px;
                text-align: center;
            }
            
            .card h3 {
                font-size: 20px;
                margin: 10px 0;
            }
            
            .card button {
                padding: 10px;
                font-size: 16px;
                background-color: #4CAF50;
                color: white;
                border: none;
                cursor: pointer;
                border-radius: 5px;
            }
            
            .card button:hover {
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
                
                <span>สวัสดี,username</span>
                <a href="logout.php">ออกจากระบบ</a>
                <a href="login.php">เข้าสู่ระบบ</a>
                <a href="register.php">ลงทะเบียน</a>
            </div>
        </nav>

        <!-- ส่วนของเนื้อหา -->
        <div class="content">
            <h1>ยินดีต้อนรับสู่ระบบส่งเอกสารออนไลน์</h1>

            <!-- แถบค้นหา -->
            <div class="search-bar">
                <input type="text" placeholder="ค้นหาเอกสาร..." name="search">
                <button type="button">ค้นหา</button>
            </div>

            <!-- การแสดงเอกสารแบบ Card -->
            <div class="card-container">
                <div class="card">
                    <h3>เอกสาร 1</h3>
                    <p>รายละเอียดเอกสาร 1</p>
                    <button onclick="location.href='preview.php?id=1'">ดูรายละเอียด</button>
                </div>
                <div class="card">
                    <h3>เอกสาร 2</h3>
                    <p>รายละเอียดเอกสาร 2</p>
                    <button onclick="location.href='preview.php?id=2'">ดูรายละเอียด</button>
                </div>
                <!-- สามารถเพิ่ม card ได้ตามต้องการ -->
            </div>
        </div>

    </body>

    </html>