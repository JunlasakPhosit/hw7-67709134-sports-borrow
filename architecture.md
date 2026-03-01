
---

# 📄 architecture.md

```markdown
# 🏗 System Architecture

## 1️⃣ Database Design

### ตาราง users

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_code VARCHAR(20) UNIQUE NULL,
    full_name VARCHAR(150) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin','user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
#ตาราง equipment
CREATE TABLE equipment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    category VARCHAR(100) NOT NULL,
    total_quantity INT NOT NULL DEFAULT 0,
    available_quantity INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
#ตาราง borrowings
CREATE TABLE borrowings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    equipment_id INT NOT NULL,
    quantity INT NOT NULL,
    borrow_date DATETIME NOT NULL,
    due_date DATETIME NOT NULL,
    return_date DATETIME NULL,
    status ENUM('borrowed','returned','cancelled') DEFAULT 'borrowed',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (equipment_id) REFERENCES equipment(id)
);
2️⃣ Database Relationship

users (1) ---- (N) borrowings (N) ---- (1) equipment

3️⃣ Folder Structure
/sports-borrowing-system
│
├── /app
│   ├── controllers
│   ├── models
│   └── middleware
│
├── /api
│   ├── auth
│   │   ├── login.php
│   │   └── logout.php
│   ├── equipment
│   └── borrowing
│
├── /config
│   └── database.php
│
├── /public
│   ├── login.php
│   ├── dashboard.php
│   ├── assets
│
├── docker-compose.yml
└── README.md
4️⃣ Data Flow (Login Example)

User กรอกข้อมูลที่ login.php

AJAX ส่งไปที่ /api/auth/login.php

PHP ตรวจสอบด้วย PDO

ส่ง JSON Response

Frontend แสดงผลด้วย jQuery Confirm