# 🏀 Sports Borrowing System
ระบบยืม-คืนอุปกรณ์กีฬา (Sports Borrowing System)

ระบบนี้พัฒนาด้วย:
- PHP 8.x (PDO)
- MySQL 8
- AJAX (jQuery)
- jQuery Confirm (Alert/Confirm Modal)
- Tailwind CSS
- Docker (สำหรับ Development Environment)

---

## 🎯 วัตถุประสงค์

เพื่อให้บุคลากรและนักศึกษา:
- ยืมอุปกรณ์กีฬาได้ง่าย
- ตรวจสอบสถานะการยืมได้
- คืนอุปกรณ์ได้สะดวก
- ผู้ดูแลสามารถจัดการข้อมูลได้ (CRUD)

ระบบถูกออกแบบให้:
- ใช้งานง่าย
- Responsive
- ปลอดภัยจาก SQL Injection (ใช้ PDO Prepared Statement)
- ใช้ AJAX เพื่อลดการ Refresh หน้า

---

## 👥 User Roles

1. Admin
   - จัดการข้อมูลอุปกรณ์
   - ดูรายการยืม-คืนทั้งหมด
   - อนุมัติ/ยกเลิกการยืม

2. User (นักศึกษา/บุคลากร)
   - ยืมอุปกรณ์
   - ดูประวัติการยืม
   - คืนอุปกรณ์

---

## 🚀 วิธีรันด้วย Docker

### 1️⃣ Clone Project

```bash
git clone https://github.com/your-org/sports-borrowing-system.git
cd sports-borrowing-system