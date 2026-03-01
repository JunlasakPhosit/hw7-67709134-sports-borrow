
---

# 📄 task.md

```markdown
# 🗂 Development Task Checklist

---

# ✅ Phase 1: Database & Authentication

- [ ] ออกแบบ Database
- [ ] สร้างตาราง users
- [ ] สร้างตาราง equipment
- [ ] สร้างตาราง borrowings
- [ ] สร้าง database.php (PDO)
- [ ] สร้างระบบ Login (AJAX)
- [ ] Hash password
- [ ] สร้าง Session Middleware
- [ ] สร้าง Logout

---

# ✅ Phase 2: Equipment Management (Admin)

- [ ] หน้าแสดงรายการอุปกรณ์
- [ ] เพิ่มอุปกรณ์ (Create)
- [ ] แก้ไขอุปกรณ์ (Update)
- [ ] ลบอุปกรณ์ (Delete)
- [ ] Validation ฝั่ง Server
- [ ] Confirm Modal ด้วย jQuery Confirm

---

# ✅ Phase 3: Borrowing System

- [ ] หน้าเลือกอุปกรณ์
- [ ] ระบบยืมอุปกรณ์ (AJAX)
- [ ] ลด available_quantity อัตโนมัติ
- [ ] หน้าแสดงประวัติการยืม
- [ ] ระบบคืนอุปกรณ์
- [ ] Update สถานะเป็น returned

---

# ✅ Phase 4: UX & Security

- [ ] เพิ่ม CSRF Token
- [ ] ตรวจสอบสิทธิ์ role
- [ ] Dashboard Summary
- [ ] Tailwind UI Enhancement
- [ ] Error Handling มาตรฐาน JSON