<?php
class ProductController {
    private $model;

    public function __construct() {
        $this->model = new ProductModel(); // This will work due to the autoloader
    }

    public function insert() { // The method name should match the action name
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productData = $_POST['product'];
            $detailsData = $_POST['details'];
            $statusData = $_POST['status'];
            $optionsData = $_POST['options'];
            $imageData = $_POST['images'];
            $categoryData = $_POST['categories'];

            $productId = $this->model->insertProduct($productData, $detailsData, $statusData, $optionsData, $imageData, $categoryData);

            if ($productId) {
                echo "Product inserted successfully with the ID: " . $productId;
            } else {
                echo "An error occurred while inserting the product.";
            }
        } else {
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->getAllCategories();
            load_view('products/product_form', ['categories' => $categories]);
        }
    }

    public function productsByCategoryJson() {
        $categoryId = $_GET['categoryId'];
        $products = $this->model->getProductsByCategory($categoryId);
        header('Content-Type: application/json');
        echo json_encode($products);
    }

    public function view() {
        $productId = $_GET['id'];
        $product = $this->model->getProductById($productId);
        load_view('products/product_view', ['product' => $product]);
    }
}