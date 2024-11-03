-- สร้างฐานข้อมูล
CREATE DATABASE IF NOT EXISTS document_system;

-- ใช้งานฐานข้อมูลที่สร้างขึ้น
USE document_system;

-- สร้างตารางสำหรับผู้ใช้
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    is_admin BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- สร้างตารางสำหรับเอกสาร
CREATE TABLE IF NOT EXISTS documents (
    document_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    document_name VARCHAR(255) NOT NULL,
    document_description TEXT,
    document_type ENUM('pdf', 'docx', 'png', 'jpg') NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- สร้างข้อมูลจำลองในตาราง users
INSERT INTO users (username, password, name, is_admin) VALUES
('admin', '$2y$10$eImiTXuWVxfL1cZ6Sx4p6e51aEivj5pzG1EJ8xydpSbyrO//U3jPe', 'Admin User', TRUE),  -- รหัสผ่าน: admin123
('user1', '$2y$10$eImiTXuWVxfL1cZ6Sx4p6e51aEivj5pzG1EJ8xydpSbyrO//U3jPe', 'User One', FALSE),    -- รหัสผ่าน: user123
('user2', '$2y$10$eImiTXuWVxfL1cZ6Sx4p6e51aEivj5pzG1EJ8xydpSbyrO//U3jPe', 'User Two', FALSE);    -- รหัสผ่าน: user123

-- สร้างข้อมูลจำลองในตาราง documents
INSERT INTO documents (user_id, document_name, document_description, document_type, file_path) VALUES
(1, 'เอกสารตัวอย่าง 1', 'รายละเอียดเอกสารตัวอย่าง 1', 'pdf', 'uploads/doc1.pdf'),
(2, 'เอกสารตัวอย่าง 2', 'รายละเอียดเอกสารตัวอย่าง 2', 'docx', 'uploads/doc2.docx'),
(2, 'เอกสารตัวอย่าง 3', 'รายละเอียดเอกสารตัวอย่าง 3', 'png', 'uploads/doc3.png');
