<?php
class CategoryController {
    private $model;

    public function __construct() {
        $this->model = new CategoryModel();
    }

    public function insertCategory() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $categoryData = $_POST['category'];
            
            // Check if parent_id is empty and set it to NULL
            if (empty($categoryData['parent_id'])) {
                $categoryData['parent_id'] = NULL;
            }

            $categoryId = $this->model->insertCategory($categoryData);

            if ($categoryId) {
                echo "Category inserted successfully with the ID: " . $categoryId;
            } else {
                echo "An error occurred while inserting the category.";
            }
        } else {
            load_view('categories/category_form');
        }
    }

    public function allCategoriesJson() {
        header('Content-Type: application/json');
        echo json_encode($this->model->getAllCategories());
    }

    public function readCategory() {
        $categories = $this->model->getAllCategories();
        load_view('categories/category_list', ['categories' => $categories]);
    }

    public function updateCategory() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $categoryData = $_POST['category'];
            $updated = $this->model->updateCategory($id, $categoryData);

            if ($updated) {
                echo "Category updated successfully.";
            } else {
                echo "An error occurred while updating the category.";
            }
        } else {
            $id = $_GET['id'];
            $category = $this->model->getCategoryById($id);
            load_view('categories/category_form', ['category' => $category]);
        }
    }

    public function deleteCategory() {
        $id = $_GET['id'];
        $deleted = $this->model->deleteCategory($id);

        if ($deleted) {
            echo "Category deleted successfully.";
        } else {
            echo "An error occurred while deleting the category.";
        }
    }
}
?>