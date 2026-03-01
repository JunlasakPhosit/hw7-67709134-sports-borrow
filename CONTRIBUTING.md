# 🤝 Contribution Guidelines

## 📌 Coding Standard

### 1️⃣ Naming Convention

| Type | Format | Example |
|------|--------|----------|
| Variable | camelCase | $userId |
| Function | camelCase | getUserById() |
| Class | PascalCase | UserController |
| Constant | UPPER_CASE | DB_HOST |
| Table | snake_case | borrowings |
| Column | snake_case | created_at |

---

## 📌 PHP Rules

- ใช้ PDO เท่านั้น
- ห้ามใช้ mysqli
- ห้าม Query แบบต่อ String ตรง ๆ
- ต้องใช้ Prepared Statements ทุกครั้ง
- แยก Controller และ Model ชัดเจน

---

## 📌 Git Commit Format

ใช้ Conventional Commit:

---

## 📌 Branch Strategy

- main → production
- develop → staging
- feature/* → ฟีเจอร์ใหม่

---

## 📌 Pull Request Checklist

- [ ] โค้ดผ่านการทดสอบ
- [ ] ไม่มี SQL Injection
- [ ] ไม่มี Warning/Error
- [ ] มี Comment อธิบายส่วนสำคัญ
- [ ] ทดสอบ AJAX Response แล้ว