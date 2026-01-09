<?php
require_once 'config/database.php';
require_once 'app/Models/Product.php';

class ProductController {
    private $db;
    private $productModel;

    public function __construct(){
        $this->db = Database::connect();
        $this->productModel = new Product($this->db);

        if (!isset($_SESSION['user'])) {
            header("Location: /trifting/auth/login");
            exit;
        }
    }

    public function index(){
        $search = $_GET['search'] ?? null;
        $page = $_GET['page'] ?? 1;
        $limit = 12;
        $offset = ($page - 1) * $limit;

        $products = $this->productModel->all($search, $limit, $offset);
        $total = $this->productModel->count($search);
        $totalPages = ceil($total / $limit);

        require 'app/Views/products/index.php';
    }

    public function create(){
        if ($_SESSION['user']['role'] !== 'admin') {
            echo "Access denied";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'category' => $_POST['category'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'image' => $_FILES['image']['name']
            ];

            move_uploaded_file($_FILES['image']['tmp_name'], 'assets/img/' . $data['image']);
            $this->productModel->create($data);

            header("Location: /trifting/product");
            exit;
        }

        require 'app/Views/products/create.php';
    }

    public function edit($id){
        if ($_SESSION['user']['role'] !== 'admin') {
            echo "Access denied";
            return;
        }

        $product = $this->productModel->find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'category' => $_POST['category'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'image' => $_FILES['image']['name'] ?: $product['image']
            ];

            if ($_FILES['image']['name']) {
                move_uploaded_file($_FILES['image']['tmp_name'], 'assets/img/' . $data['image']);
            }

            $this->productModel->update($id, $data);
            header("Location: /trifting/product");
            exit;
        }

        require 'app/Views/products/edit.php';
    }

    public function delete($id){
        if ($_SESSION['user']['role'] !== 'admin') {
            echo "Access denied";
            return;
        }

        $this->productModel->delete($id);
        header("Location: /trifting/product");
        exit;
    }
}
