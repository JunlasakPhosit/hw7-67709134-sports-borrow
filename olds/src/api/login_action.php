<?php
session_start();
header('Content-Type: application/json');

require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username === '' || $password === '') {
    echo json_encode([
        'success' => false,
        'message' => 'กรุณากรอกข้อมูลให้ครบถ้วน'
    ]);
    exit;
}

try {

    $database = new Database();
    $conn = $database->getConnection();

    // ใช้ student_code หรือ email ก็ได้
    $sql = "SELECT id, full_name, password_hash, role 
            FROM users 
            WHERE student_code = :username 
               OR email = :username 
            LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {

        // ป้องกัน Session Fixation
        session_regenerate_id(true);

        $_SESSION['user_id']   = $user['id'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['role']      = $user['role'];

        echo json_encode([
            'success' => true
        ]);

    } else {
        echo json_encode([
            'success' => false,
            'message' => 'รหัสผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'
        ]);
    }

} catch (PDOException $e) {

    echo json_encode([
        'success' => false,
        'message' => 'Database error'
    ]);
}