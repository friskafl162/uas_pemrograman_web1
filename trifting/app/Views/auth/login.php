<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config/database.php';
require_once 'app/Models/User.php';

$db = Database::connect();
$userModel = new User($db);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user = $userModel->findByUsername($_POST['username']);

    if($user && password_verify($_POST['password'], $user['password'])){
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'role' => $user['role']
        ];
        header("Location: /product/index");
        exit;
    } else {
        $error = "Username atau password salah";
    }
}
?>

<?php include 'app/Views/layouts/header.php'; ?>
<div class="d-flex justify-content-center align-items-center" style="height:70vh;">
  <div class="card p-4 shadow" style="width:350px;">
    <h3 class="text-center mb-3">Login</h3>
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST">
        <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
        <button class="btn btn-primary w-100">Login</button>
    </form>
  </div>
</div>
<?php include 'app/Views/layouts/footer.php'; ?>
