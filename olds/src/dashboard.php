<?php
session_start();

/*
|--------------------------------------------------------------------------
| Auth Guard
|--------------------------------------------------------------------------
| ถ้ายังไม่ได้ Login ให้กลับไปหน้า Login
*/
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// ป้องกัน XSS
$fullName = htmlspecialchars($_SESSION['full_name']);
$role     = htmlspecialchars($_SESSION['role']);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | ระบบยืม-คืนอุปกรณ์กีฬา</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Kanit', sans-serif; }
    </style>
</head>

<body class="bg-slate-900 min-h-screen text-white">

    <!-- 🔷 Navbar -->
    <nav class="bg-slate-800 border-b border-slate-700 px-6 py-4 flex justify-between items-center">
        <div class="text-lg font-semibold tracking-wide">
            🏀 ระบบยืม-คืนอุปกรณ์กีฬา
        </div>

        <div class="flex items-center gap-4 text-sm">
            <span class="text-slate-300">
                👤 <?= $fullName ?> (<?= $role ?>)
            </span>

            <a href="logout.php"
               class="bg-red-600 hover:bg-red-500 px-4 py-2 rounded-lg transition">
                ออกจากระบบ
            </a>
        </div>
    </nav>

    <!-- 🔷 Main Content -->
    <div class="p-8">

        <!-- Welcome Card -->
        <div class="bg-slate-800 border border-slate-700 p-6 rounded-2xl shadow-lg mb-8">
            <h1 class="text-2xl font-bold mb-2">
                ยินดีต้อนรับคุณ <?= $fullName ?> 🎉
            </h1>
            <p class="text-slate-400">
                คุณกำลังใช้งานระบบในสิทธิ์: <span class="text-cyan-400 font-medium"><?= $role ?></span>
            </p>
        </div>

        <!-- Menu Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Card 1 -->
            <div class="bg-slate-800 hover:bg-slate-700 transition p-6 rounded-2xl border border-slate-700 cursor-pointer">
                <h2 class="text-lg font-semibold mb-2">📦 จัดการอุปกรณ์</h2>
                <p class="text-slate-400 text-sm">
                    เพิ่ม แก้ไข หรือลบข้อมูลอุปกรณ์กีฬา
                </p>
            </div>

            <!-- Card 2 -->
            <div class="bg-slate-800 hover:bg-slate-700 transition p-6 rounded-2xl border border-slate-700 cursor-pointer">
                <h2 class="text-lg font-semibold mb-2">📋 รายการยืม-คืน</h2>
                <p class="text-slate-400 text-sm">
                    ตรวจสอบสถานะการยืมและคืนอุปกรณ์
                </p>
            </div>

            <!-- Card 3 -->
            <div class="bg-slate-800 hover:bg-slate-700 transition p-6 rounded-2xl border border-slate-700 cursor-pointer">
                <h2 class="text-lg font-semibold mb-2">👥 จัดการผู้ใช้งาน</h2>
                <p class="text-slate-400 text-sm">
                    สำหรับผู้ดูแลระบบ (Admin)
                </p>
            </div>

        </div>

    </div>

</body>
</html>