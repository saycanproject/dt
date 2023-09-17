     <?php
class ProductModel {
    private $db;
    private $categoryModel;

    public function __construct() {
        $this->db = new DB();
        $this->categoryModel = new CategoryModel();
    }

    public function insertProduct($productData, $detailsData, $statusData, $optionsData, $imageData, $categoryData) {
        // Insert into products table
        $sql = "INSERT INTO products (name, price, quantity, description) VALUES ('{$productData['name']}', {$productData['price']}, {$productData['quantity']}, '{$productData['description']}')";
        $this->db->query($sql);
        $productId = $this->db->getLastId();

        // Insert into product_details table
        $sql = "INSERT INTO product_details (product_id, weight, color, size, material) VALUES ($productId, '{$detailsData['weight']}', '{$detailsData['color']}', '{$detailsData['size']}', '{$detailsData['material']}')";
        $this->db->query($sql);

        // Insert into product_status table
        $sql = "INSERT INTO product_status (product_id, status) VALUES ($productId, '{$statusData['status']}')";
        $this->db->query($sql);

        // Insert into product_categories table
        foreach ($categoryData as $categoryId) {
            $category = $this->categoryModel->getCategoryById($categoryId);
            if ($category) {
                $sql = "INSERT INTO product_categories (product_id, category_id) VALUES ($productId, $categoryId)";
                $this->db->query($sql);
            } else {
                error_log("Category with ID $categoryId does not exist");
            }
        }

        return $productId;
    }

    public function getProductsByCategory($categoryId) {
        $sql = "SELECT p.* FROM products p
                INNER JOIN product_categories pc ON p.id = pc.product_id
                WHERE pc.category_id = $categoryId";
        $result = $this->db->query($sql);
        return $result->rows;
    }

    public function getProductById($productId) {
        $sql = "SELECT * FROM products WHERE id = $productId";
        $result = $this->db->query($sql);
        return $result->row;
    }
}
?>