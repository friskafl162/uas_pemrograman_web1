<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Trifting</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/trifting/assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/product/index">Trifting</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <?php if(isset($_SESSION['user'])): ?>
          <?php if($_SESSION['user']['role']=='admin'): ?>
          <li class="nav-item"><a class="nav-link" href="/trifting/product/create">Add Product</a></li>
          <li class="nav-item"><a class="nav-link" href="/trifting/about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="/trifting/contact/index">Contact</a></li>
          <?php endif; ?>
          <li class="nav-item"><a class="nav-link" href="/trifting/auth/logout">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="/trifting/auth/login">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<div class="container my-4">
