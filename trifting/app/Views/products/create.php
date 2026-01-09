<?php include 'app/Views/layouts/header.php'; ?>
<h2>Add Product</h2>
<form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Category</label>
    <input type="text" name="category" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="3"></textarea>
  </div>
  <div class="mb-3">
    <label>Price</label>
    <input type="number" name="price" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control" required>
  </div>
  <button class="btn btn-success">Add Product</button>
</form>
<?php include 'app/Views/layouts/footer.php'; ?>
