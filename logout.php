<?php
session_start();

// ลบเซสชันทั้งหมด
$_SESSION = array(); // ทำให้ค่าเซสชันทั้งหมดเป็น array ว่าง

// ทำลายเซสชัน
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// ทำลายเซสชัน
session_destroy();

// เปลี่ยนเส้นทางไปยังหน้าเข้าสู่ระบบ
header("Location: login.php");
exit();
?>
