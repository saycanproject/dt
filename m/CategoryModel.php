<?php
class CategoryModel {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function insertCategory($Category) {
        $name = $this->db->escape($Category['name']);
        $parentId = isset($Category['parent_id']) ? "'".$this->db->escape($Category['parent_id'])."'" : 'NULL';

        $sql = "INSERT INTO categories (name, parent_id) VALUES ('{$name}', {$parentId})";

        $this->db->query($sql);

        return $this->db->getLastId();
    }

    public function getCategoryById($categoryId) {
        $sql = "SELECT * FROM categories WHERE id = $categoryId";
        $result = $this->db->query($sql);
        return $result->row;
    }

    public function getAllCategories() {
        $sql = "SELECT * FROM categories";
        $result = $this->db->query($sql);
        return $result->rows;
    }

    public function updateCategory($id, $categoryData) {
        $sql = "UPDATE categories SET name='{$categoryData['name']}', parent_id='{$categoryData['parent_id']}' WHERE id=$id";
        return $this->db->query($sql);
    }

    public function deleteCategory($id) {
        $sql = "DELETE FROM categories WHERE id=$id";
        return $this->db->query($sql);
    }
}
?>