<?php
require_once 'config/database.php';

$db = Database::connect();

$admin = password_hash("friska16", PASSWORD_DEFAULT);
$user  = password_hash("friska02", PASSWORD_DEFAULT);

$db->exec("UPDATE users SET password='$admin' WHERE username='admin'");
$db->exec("UPDATE users SET password='$user' WHERE username='user1'");

echo "PASSWORD DI-FIX";
