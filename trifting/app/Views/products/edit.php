<?php include 'app/Views/layouts/header.php'; ?>
<h2>Edit Product</h2>
<form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
  </div>
  <div class="mb-3">
    <label>Category</label>
    <input type="text" name="category" class="form-control" value="<?= $product['category'] ?>" required>
  </div>
  <div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="3"><?= $product['description'] ?></textarea>
  </div>
  <div class="mb-3">
    <label>Price</label>
    <input type="number" name="price" class="form-control" value="<?= $product['price'] ?>" required>
  </div>
  <div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    <img src="/assets/img/<?= $product['image'] ?>" style="height:100px; margin-top:5px;">
  </div>
  <button class="btn btn-primary">Update Product</button>
</form>
<?php include 'app/Views/layouts/footer.php'; ?>
