<?php include 'app/Views/layouts/header.php'; ?>

<h2 class="mb-4">Product List</h2>

<form class="d-flex mb-4" method="GET">
  <input class="form-control me-2" type="search" name="search"
         placeholder="Search by name or category"
         value="<?= $_GET['search'] ?? '' ?>">
  <button class="btn btn-outline-success">Search</button>
</form>

<div class="row g-3">
<?php foreach ($products as $product): ?>

  <?php
    $image = (!empty($product['image']) && file_exists('assets/img/'.$product['image']))
      ? '/trifting/assets/img/'.$product['image']
      : 'https://via.placeholder.com/300x200?text=No+Image';
  ?>

  <div class="col-6 col-sm-4 col-md-3 col-lg-2">
    <div class="card h-100 shadow-sm">
      <img src="<?= $image ?>" class="card-img-top img-fluid"
           style="height:180px; object-fit:cover;">
      <div class="card-body d-flex flex-column">
        <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
        <p class="card-text text-muted"><?= htmlspecialchars($product['category']) ?></p>
        <p class="card-text fw-bold">
          Rp <?= number_format($product['price'],0,",",".") ?>
        </p>

        <?php if ($_SESSION['user']['role'] === 'admin'): ?>
        <div class="mt-auto">
          <a href="/trifting/product/edit/<?= $product['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="/trifting/product/delete/<?= $product['id'] ?>"
             onclick="return confirm('Delete?')"
             class="btn btn-sm btn-danger">Delete</a>
        </div>
        <?php endif; ?>

      </div>
    </div>
  </div>

<?php endforeach; ?>
</div>

<br/>
<!-- Pagination -->
<?php if ($totalPages > 1): ?>
<nav>
  <ul class="pagination justify-content-center">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
        <a class="page-link" href="?page=<?= $i ?>&search=<?= $_GET['search'] ?? '' ?>">
          <?= $i ?>
        </a>
      </li>
    <?php endfor; ?>
  </ul>
</nav>
<?php endif; ?>

<?php include 'app/Views/layouts/footer.php'; ?>
